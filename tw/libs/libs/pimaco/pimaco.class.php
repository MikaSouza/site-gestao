<?php
require_once("{$_SERVER[DOCUMENT_ROOT]}/admin/libs/mpdf/mpdf.php");

abstract class Pimaco{
	// Atributos de Tamanho
	private $margemEsquerda;
	private $margemDireita;
	private $margemSuperior;
	private $larguraEtiqueta;
	private $alturaEtiqueta;
	//Atributos de espaçamento
	private $espacoEntreEtiquetas;
	private $espacoEntreLinhas=0;
	//Atributos de quantidade
	private $quantidadeLinhas;
	private $quantidadeColunas;
	private $quantidadeCaracteres;
	//Outros atributos
	private $tipoPapel;
	private $linhaInicial=0;
	private $colunaInicial=0;
	private $etiquetas = array(array());

	//Método mágico set
	public function __set($param, $value){
		$this->$param = $value;
	}

	//Método para adicionar etiquetas
	public function addEtiquetas($etiqueta){
		$this->etiquetas[] = $etiqueta;
	}

	public function generate(){
		//Configurações do PDF
		$pdf = new mPDF('P', $this->tipoPapel, 11);
		$pdf->AddPage();
		$pdf->SetMargins(0, 0, 0);
		$pdf->SetAuthor("Teraware");

		//Inicializando valores
		$coluna = $this->colunaInicial; 
		$linha = $this->linhaInicial;

		foreach($this->etiquetas as $etiqueta){
			//Verificação de reestabelecimento de linhas
			if($coluna == $this->quantidadeColunas){ // Se for a ultima coluna
				$coluna = 0; // $coluna volta para o valor inicial
				$linha++; // $linha é igual ela mesma +1
			}

			//Verificação de reestabelecimento de paginas
			if($linha == $this->quantidadeLinhas){ // Se for a última linha da página 
				$pdf->AddPage(); // Adiciona uma nova página
				$linha = 0; // $linha volta ao seu valor inicial
			}

			//Definição de posições
			$posicaoV = $linha*($this->alturaEtiqueta+$this->espacoEntreLinhas);
			$posicaoH = $coluna*($this->larguraEtiqueta+$this->espacoEntreEtiquetas);

			if($coluna == 0) // Se a coluna for 0 
				$somaH = $this->margemEsquerda; // Soma Horizontal é apenas a margem da esquerda inicial
			else // Senão
				$somaH = $this->margemEsquerda+$posicaoH; // Soma Horizontal é a margem inicial mais a posição horizontal 

			if($linha == 0) // Se a linha for 0 
				$somaV = $this->margemSuperior; // Soma Vertical é apenas a margem superior inicial
			else // Senão
				$somaV = $this->margemSuperior+$posicaoV; // Soma Vertical é a margem superior inicial mais a posicao vertical

			//Montagem das etiquetas
			foreach($etiqueta as $i => $linhaEtiqueta){
				if(is_array($linhaEtiqueta)){
					$textoLinha = $linhaEtiqueta[0];
					$pdf->SetFont('Arial',$linhaEtiqueta[2], $linhaEtiqueta[1]);
				}else{
					$pdf->SetFont('Arial','', 11);
					$textoLinha = $linhaEtiqueta;
				}
				$pdf->Text($somaH, $somaV+($i*4), substr($textoLinha, 0, $this->quantidadeCaracteres+1)); // Imprime o resultado da linha
			}

			$coluna++; //Avança para a etiqueta do lado
		}
		$pdf->Output("etiquetas.pdf", "I");
	}
}