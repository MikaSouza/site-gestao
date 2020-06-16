<?php
	require_once 'pimaco.class.php';

	class Pimaco6080 extends Pimaco{
		function __construct() {
	       $this->margemEsquerda = '6';
	       $this->margemDireita = '6';
	       $this->margemSuperior = '21';
	       $this->larguraEtiqueta = '68.7';
	       $this->alturaEtiqueta = '25.5';
	       $this->espacoEntreEtiquetas = '3';
	       $this->quantidadeLinhas = 10;
	       $this->quantidadeColunas = 3;
	       $this->quantidadeLinhasEtiqueta = 5;
	       $this->quantidadeCaracteres = 33;
	       $this->colunaInicial = -1;
	       $this->tipoPapel = 'LETTER';
	   }
	}