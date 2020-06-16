<?php
class CieloPayment{
	protected $OrderNumber;
	protected $SoftDescriptor = 'AlgoMaisGrafi';
	protected $MerchantId = '7ad212aa-cf52-4c3b-ab46-4e335d388421';
	protected $Cart;
	protected $Shipping;
	protected $Payment;
	protected $Customer;
	protected $Options;


	public function __construct($vIPEDCODIGO){
		$this->OrderNumber = $vIPEDCODIGO;
		require_once $_SERVER['DOCUMENT_ROOT'].'admin/includes/constantes.php';
		$this->setDadosPedido();
		$this->setConfigs();
		$this->setProdutos();
		$this->serializeForm();
	}

	protected function setDadosPedido(){
		require_once $_SERVER['DOCUMENT_ROOT'].'admin/transaction/transactionPedidos.php';
		$pedido = fillPedidos($this->OrderNumber);
		$this->Shipping = new Shipping();
		$this->Shipping->SourceZipCode = filterNumber(getConfig('CFGCEPENVIO'));
		$services = new Services();
		switch ($pedido['PEDFORMAENVIO']) {
			case 'TRANSPORTADORA':
				require_once $_SERVER['DOCUMENT_ROOT'].'admin/transaction/transactionTransportadoras.php'; 
				$frete = fillTransportadoras($pedido['PEDCODIGOENVIO']);
				$services->Name = $frete['TRANOME'];
				$this->Shipping->Type = 'FixedAmount';
			break;
			case 'CORREIOS':
				$this->Shipping->Type = 'Correios';
				require_once $_SERVER['DOCUMENT_ROOT'].'admin/transaction/transactionFretesCorreios.php'; 
				$frete = fillFretesCorreios($pedido['PEDCODIGOENVIO']);
				$services->Name = $frete['FCOTIPO'];
			case 'GRATIS':
				$this->Shipping->Type = 'Free';
				$this->Shipping->Type_cod = 3;
				$services->Name = 'Frete Grátis';
				break;
		}
		$services->Price    = ($pedido['PEDVALORFRETE'])*100;
		$services->DeadLine = $pedido['PEDPRAZOENTREGA'];
		$this->Shipping->AddServices($services);
		$this->setDadosCliente($pedido['CLICODIGO']);
	}

	protected function setProdutos(){
		require_once $_SERVER['DOCUMENT_ROOT'].'admin/transaction/transactionPedidosxProdutos.php';
		$this->Cart = new Cart();
		$produtos = gridProdutosPedido($this->OrderNumber);
		foreach($produtos['dados'] as $produto){
			$item = new Item();
			$item->Name        = $produto['PRONOME'];
			$item->Description = $produto['PROPREDESCRICAO'];
			$item->UnitPrice   = $produto['PXPVALOR']*100;
			$item->Quantity    = $produto['PXPQUANTIDADE'];
			$item->Type        = 1;

			$this->Cart->AddItems($item);
		}
	}

	protected function setDadosCliente($vICLICODIGO){
		require_once $_SERVER['DOCUMENT_ROOT'].'admin/transaction/transactionClientes.php';
		$cliente = fillClientes($vICLICODIGO);
		$this->Customer           = new Customer();
		$this->Customer->Identity = filterNumber($cliente['CLICPFCNPJ']);
		$this->Customer->FullName = ($cliente['CLITIPOPESSOA'] == 'J') ? $cliente['CLIRAZAOSOCIAL'] : $cliente['CLINOME'];
		$this->Customer->Email    = $cliente['CLIEMAIL'];
		$this->Customer->Phone    = filterNumber($cliente['CLITELEFONE']);

		$this->setEndereco($vICLICODIGO);
	}

	protected function setEndereco($vICLICODIGO){
		require_once $_SERVER['DOCUMENT_ROOT'].'admin/transaction/transactionEnderecos.php';
		$endereco = fillEnderecosByCliente($vICLICODIGO);
		$this->Shipping->TargetZipCode       = filterNumber($endereco['ENDCEP']);
		$this->Shipping->Address             = new Address();
		$this->Shipping->Address->Street     = $endereco['ENDLOGRADOURO'];
		$this->Shipping->Address->Number     = $endereco['ENDNUMERO'];
		$this->Shipping->Address->Complement = $endereco['ENDCOMPLEMENTO'];
		$this->Shipping->Address->District   = $endereco['ENDBAIRRO'];
		$this->Shipping->Address->City       = $endereco['CIDDESCRICAO'];
		$this->Shipping->Address->State      = $endereco['ESTSIGLA'];
	}

	protected function setConfigs(){
		$this->Payment = new Payment();
		$this->Options = new Options();
	}

	protected function run(){
		$curl = curl_init();

		curl_setopt($curl, CURLOPT_URL, 'https://cieloecommerce.cielo.com.br/api/public/v1/orders');
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($this));
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'MerchantId: '.$this->MerchantId,
			'Content-Type: application/json'
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$json = json_decode($response);

		pre($this);
	}

	protected function serializeForm(){
		$dados = array(
			'merchant_id'     => $this->MerchantId,
			'order_number'    => $this->OrderNumber,
			'soft_descriptor' => $this->SoftDescriptor,
			'shipping_type'   => $this->Shipping->Type_cod
		);
		foreach($this->Cart->Items as $i => $item){
			$n = $i+1;
			$itemsArray = array(
				"cart_{$n}_name"        => $item->Name,
				"cart_{$n}_description" => $item->Description,
				"cart_{$n}_unitprice"   => $item->UnitPrice,
				"cart_{$n}_quantity"    => $item->Quantity,
				"cart_{$n}_type"        => $item->Type,
				"cart_{$n}_code"        => $item->Sku,
				"cart_{$n}_weight"      => $item->Weight,
				"cart_{$n}_zipcode"     => $this->Shipping->SourceZipCode
			);
			$dados += $itemsArray;
		}
		foreach($this->Shipping->Services as $i => $service){
			$n = $i+1;
			$servicesArray = array(
				"shipping_{$n}_name"  => $service->Name,
				"shipping_{$n}_price" => $service->Price
			);
			$dados += $servicesArray;
		}
		$dados += array(
			'shipping_address_name'       => $this->Shipping->Address->Street,
			'shipping_address_number'     => $this->Shipping->Address->Number,
			'shipping_address_complement' => $this->Shipping->Address->Complement,
			'shipping_address_complement' => $this->Shipping->Address->Complement,
			'shipping_address_district'   => $this->Shipping->Address->District,
			'shipping_address_city'       => $this->Shipping->Address->City,
			'shipping_address_state'      => $this->Shipping->Address->State,
			'shipping_zipcode'            => $this->Shipping->TargetZipCode,
			'customer_name'               => $this->Customer->FullName,
			'customer_identity'           => $this->Customer->Identity,
			'customer_email'              => $this->Customer->Email,
			'customer_phone'              => $this->Customer->Phone,
			'Antifraud_enabled'           => ($this->Options->AntifraudEnabled) ? 'TRUE' : 'FALSE'
		);
		$this->generateForm($dados);
	}

	private function generateForm(array $dados){
		echo "<form method=\"POST\" id=\"formCielo\" action=\"https://cieloecommerce.cielo.com.br/Transactional/Order/Index\">\n";
		foreach($dados as $key => $value)
			echo "\t<input type=\"hidden\" name=\"{$key}\" value=\"{$value}\">\n";
		echo "</form>";
		echo "<script src=\"libs/jquery/jquery.min.js\"></script>";
		echo "<script>\$(document).ready(function(){\$('form#formCielo').submit()});</script>";
	} 
}

class TwSet{
	public function __set($name, $value){
		$this->$name = $value;
	}

	public function __get($name){
		return $this->$name;
	}
}

class Cart extends TwSet{
	protected $Discount;
	protected $Items = array();

	public function AddItems(Item $item){
		$this->Items[] = $item;
	}
}

class Discount extends TwSet{
	protected $Type;
	protected $Value;
}

class Item extends TwSet{
	protected $Name;
	protected $Description;
	protected $UnitPrice;
	protected $Quantity;
	protected $Type;
	protected $Sku;
	protected $Weight;
}

class Shipping extends TwSet{
	protected $Type;
	protected $Type_cod = 2;
	protected $SourceZipCode;
	protected $TargetZipCode;
	protected $Address;
	protected $Services = array();

	public function AddServices(Services $service){
		$this->Services[] = $service;
	}
}

class Address extends TwSet{
	protected $Street;
	protected $Number;
	protected $Complement;
	protected $District;
	protected $City;
	protected $State;
}

class Services extends TwSet{
	protected $Name;
	protected $Price;
	protected $DeadLine;
}

class Customer extends TwSet{
	protected $Identity;
	protected $FullName;
	protected $Email;
	protected $Phone;
}

class Options extends TwSet{
	protected $AntifraudEnabled = false;
}

class Payment extends TwSet{
	protected $BoletoDiscount = 0;
	protected $DebitDiscount = 0;
}