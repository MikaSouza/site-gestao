<?php
	require_once '../includes/constantes.php';
	require_once '../transaction/transactionEstados.php';
	require_once '../transaction/transactionCidades.php';

	$cep     = filterNumber($_GET['cep']);

	$retorno = file_get_contents("https://webservice.uni5.net/web_cep.php?auth=".getConfig('CFGAPICEPKEY')."&formato=json&cep={$cep}");
	$retorno = json_decode($retorno, true);

	$logradouro = $retorno['tipo_logradouro'].' '.$retorno['logradouro'];
	$bairro     = $retorno['bairro'];
	$cidade     = $retorno['cidade'];
	$uf         = $retorno['uf'];

	echo json_encode(array(
						'logradouro'   => trim($logradouro),
						'bairro'       => trim($bairro),
						'cidadeCodigo' => getIdCidade($cidade),
						'estadoCodigo' => getIdUf($uf),
						'cidade'       => $cidade,
						'uf'           => $uf
					));