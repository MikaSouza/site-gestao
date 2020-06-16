<?php
	require_once 'pimaco.class.php';

	class EtiquetaTransportadora extends Pimaco{
		function __construct() {
	       $this->margemEsquerda = '15';
	       $this->margemDireita = '70';
	       $this->margemSuperior = '45';
	       $this->larguraEtiqueta = '140';
	       $this->alturaEtiqueta = '98.5';
	       $this->espacoEntreLinhas = '8';
	       $this->quantidadeLinhas = 2;
	       $this->quantidadeColunas = 1;
	       $this->quantidadeLinhasEtiqueta = 22;
	       $this->quantidadeCaracteres = 75;
	       $this->tipoPapel = 'A4';
	       $this->linhaInicial = -1;
	   }
	}