<?php

include_once('../../include/constantes.php');
include_once("funcoes_bb.php");
function brdata($data) {
	$ano = substr($data,0,4);
	$mes = substr($data,5,2);
	$dia = substr($data,8,2);
	$brdata = $dia . "/" . $mes . "/" . $ano;
	return $brdata;
}

$SqlMainCobranca = "SELECT
						B.COBCODIGO,
						B.COBVALORCOBRANCA,
						B.COBVALORLIQUIDO,
						B.COBDATAVENCIMENTO,
						B.COBNRORECEITA,
						B.CLICODIGO,
						C.CLICODIGO,
						C.CLINOMEFANTASIA,
						C.CLIRAZAOSOCIAL,
						C.CLICPF,
						C.CLICNPJ,
						C.CLIIE,
						E.ENDLOGRADOURO,
						E.ENDNROLOGRADOURO,
						E.ENDBAIRRO,
						E.ENDCOMPLEMENTO,
						E.ENDCEP,
						D.CIDDESCRICAO,
						T.ESTSIGLA
					FROM
						COBRANCA B
						LEFT JOIN
							CLIENTES C
							ON C.CLICODIGO = B.CLICODIGO
						LEFT JOIN
							ENDERECOS E
							ON E.CLICODIGO = C.CLICODIGO
						LEFT JOIN
							CIDADES D
							ON D.CIDCODIGO = E.CIDCODIGO
						LEFT JOIN
							ESTADOS T
							ON T.ESTCODIGO = E.ESTCODIGO
					WHERE
						B.COBCODIGO IN (".$_GET["pOids"].")";
//echo $SqlMainCobranca;

$vConexao = sql_conectar_banco();
$RS_MAINCobranca = sql_executa(vGBancoSite, $vConexao, $SqlMainCobranca);

$i = 0;
while($tupla = sql_retorno_lista($RS_MAINCobranca)){
	$i++;

	// pega dados do boleto
	$valor = formatar_moeda($tupla['COBVALORLIQUIDO'], false);
	$valorBanco = $tupla['COBVALORLIQUIDO'];
	$vencimento = formatar_data($tupla['COBDATAVENCIMENTO']);
	$orgao = $tupla['CLIRAZAOSOCIAL'];
	$num_boleto = $tupla['COBCODIGO'];
	$hoje = date("Y-m-d");
	$emissao = brdata($hoje);
	$endereco	 = $tupla["ENDLOGRADOURO"].' '.$tupla["ENDNROLOGRADOURO"].' '.$tupla["ENDCOMPLEMENTO"];	
	$bairro 	 = $tupla['ENDBAIRRO'];
	$cidade 	 = $tupla["CIDDESCRICAO"];
	$estado 	 = $tupla["ESTSIGLA"];
	$cep 		 = formatar_cep($tupla["ENDCEP"]);
	$cnpj 		 = $tupla['CLICNPJ'];

	$dadosboleto["data_processamento"] = ""; // Data de processamento do boleto (opcional)
	$dadosboleto["nosso_numero"] 	 = $num_boleto;
	$dadosboleto["numero_documento"] = $num_boleto;	// Num do pedido ou nosso numero
	$dadosboleto["data_vencimento"]  = $vencimento; // Data de Vencimento do Boleto
	$dadosboleto["data_documento"] 	 = $emissao; // Data de emissão do Boleto (hoje)
	$dadosboleto["valor_boleto"] = $valor; 	// Valor do Boleto, com vírgula, sempre com duas casas depois da virgula

	// DADOS DO SEU CLIENTE
	$dadosboleto["sacado"] = "<b>$orgao</b>";
	// if ($responsavel!="") $dadosboleto["sacado"] .= " (Resp.: $responsavel)";
	$dadosboleto["endereco1"] = $endereco." ".$bairro." - ".$cidade." - ".$estado." ".$cep;
	$dadosboleto["endereco2"] = "CNPJ: ".$cnpj;

	// INFORMACOES PARA O CLIENTE
	$dadosboleto["instrucoes"]  = "Pagamento referente: Nota Fiscal n&ordm; ".$tupla['COBNRORECEITA'];
	$dadosboleto["instrucoes1"] = "Sr. Caixa: Este boleto poderá ser recebido sem multa ou juros,";
	$dadosboleto["instrucoes2"] = "até o último o dia útil do mês de seu vencimento.";
	$dadosboleto["instrucoes3"] = "";
	$dadosboleto["instrucoes4"] = "";

	// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
	$dadosboleto["valor_unitario"] = "";
	$dadosboleto["quantidade"]  = "";
	$dadosboleto["uso_banco"]   = "";
	$dadosboleto["especie_doc"] = "DM";
	$dadosboleto["aceite"]  = "N";
	$dadosboleto["especie"] = "R$";

	// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //

	// DADOS DA SUA CONTA - BANCO DO BRASIL
	$dadosboleto["agencia"] = "2813"; // Num da agencia, sem digito
	$dadosboleto["conta"] 	= "22161"; // Num da conta, sem digito

	// DADOS PERSONALIZADOS - BANCO DO BRASIL
	$dadosboleto["variacao_carteira"] = "-019";  // Variação da Carteira, com traço (opcional)
	$dadosboleto["convenio"] = "2431713";  // Num do convênio - REGRA: 6 ou 7 dígitos
	$dadosboleto["contrato"] = ""; // Num do seu contrato
	$dadosboleto["carteira"] = "18";  // Código da Carteira 18 - 17 ou 11

	// TIPO DO BOLETO
	$dadosboleto["formatacao_convenio"] = "7"; // REGRA: Informe 7 se for Convênio com 7 dígitos ou 6 se for Convênio com 6 dígitos
	$dadosboleto["formatacao_nosso_numero"] = "2"; // REGRA: Se for Convênio com 6 dígitos, informe 1 se for NossoNúmero de até 5 dígitos ou 2 para opção de até 17 dígitos

	/*
	#################################################
	DESENVOLVIDO PARA CARTEIRA 18

	- Carteira 18 com Convenio de 7 digitos
	  Nosso número: pode ser até 10 dígitos

	- Carteira 18 com Convenio de 6 digitos
	  Nosso número:
	  de 1 a 99999 para opção de até 5 dígitos
	  de 1 a 99999999999999999 para opção de até 17 dígitos

	#################################################
	*/

	// SEUS DADOS
	$dadosboleto["identificacao"] = "DPM - DELEGAÇÕES DE PREFEFEITURAS MUNICIPAIS LTDA";
	$dadosboleto["cpf_cnpj"]  = "CNPJ: 92.885.888/0001-05";
	$dadosboleto["endereco"]  = "Av. Pernambuco, 1001";
	$dadosboleto["cidade_uf"] = "Porto Alegre - RS";
	$dadosboleto["cedente"]   = "DPM - DELEG PREF MUNICIPAIS LTDA";

	// NÃO ALTERAR!
	$codigobanco = "001";
	$codigo_banco_com_dv = geraCodigoBanco($codigobanco);
	$nummoeda = "9";
	$fator_vencimento = fator_vencimento($dadosboleto["data_vencimento"]);

	//valor tem 10 digitos, sem virgula
	$valor = formata_numero(str_replace('.', '', $dadosboleto["valor_boleto"]),10,0,"valor");
	//agencia é sempre 4 digitos
	$agencia = formata_numero($dadosboleto["agencia"],4,0);
	//conta é sempre 8 digitos
	$conta = formata_numero($dadosboleto["conta"],8,0);
	//carteira 18
	$carteira = $dadosboleto["carteira"];
	//agencia e conta
	$agencia_codigo = $agencia."-". modulo_11($agencia) ." / ". $conta ."-". modulo_11($conta);
	//Zeros: usado quando convenio de 7 digitos
	$livre_zeros='000000';

	// Carteira 18 com Convênio de 7 dígitos
	if($dadosboleto["formatacao_convenio"] == "7"){
		$convenio = formata_numero($dadosboleto["convenio"],7,0,"convenio");
		// Nosso número de até 10 dígitos
		$nossonumero = formata_numero($dadosboleto["nosso_numero"],10,0);
		$dv=modulo_11("$codigobanco$nummoeda$fator_vencimento$valor$livre_zeros$convenio$nossonumero$carteira");
		$linha="$codigobanco$nummoeda$dv$fator_vencimento$valor$livre_zeros$convenio$nossonumero$carteira";
		//montando o nosso numero que aparecerá no boleto
		$nossonumero = $convenio.$nossonumero;
	}

	// Carteira 18 com Convênio de 6 dígitos
	if($dadosboleto["formatacao_convenio"] == "6"){
		$convenio = formata_numero($dadosboleto["convenio"],6,0,"convenio");

		if($dadosboleto["formatacao_nosso_numero"] == "1"){

			// Nosso número de até 5 dígitos
			$nossonumero = formata_numero($dadosboleto["nosso_numero"],5,0);
			$dv = modulo_11("$codigobanco$nummoeda$fator_vencimento$valor$convenio$nossonumero$agencia$conta$carteira");
			$linha = "$codigobanco$nummoeda$dv$fator_vencimento$valor$convenio$nossonumero$agencia$conta$carteira";
			//montando o nosso numero que aparecerá no boleto
			$nossonumero = $convenio . $nossonumero ."-". modulo_11("$convenio$nossonumero");
		}

		if($dadosboleto["formatacao_nosso_numero"] == "2"){

			// Nosso número de até 17 dígitos
			$nservico = "21";
			$nossonumero = formata_numero($dadosboleto["nosso_numero"],17,0);
			$dv = modulo_11("$codigobanco$nummoeda$fator_vencimento$valor$convenio$nossonumero$nservico");
			$linha = "$codigobanco$nummoeda$dv$fator_vencimento$valor$convenio$nossonumero$nservico";
		}
	}

	$dadosboleto["codigo_banco_com_dv"] = $codigo_banco_com_dv;
	$dadosboleto["codigo_barras"] 	= $linha;
	$dadosboleto["linha_digitavel"] = monta_linha_digitavel($linha);
	$dadosboleto["agencia_codigo"] 	= $agencia_codigo;
	$dadosboleto["nosso_numero"] = $nossonumero;

	include_once("boleto-bb.php");
}
?>