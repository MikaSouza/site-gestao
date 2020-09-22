<?php
function insertUpdateFormulario($dados,  $arquivo)
{
	$dadosBanco = array(
		'tabela'  => 'FORMULARIO',
		'prefixo' => 'FOR',
		'fields'  => $dados
	);
	$id = insertUpdateSistema($dadosBanco);

	if (!empty($arquivo['vFFORANEXOLEGIS']['name'])) {
		unset($dados);
		$dados['vFFORANEXOLEGIS'] = uploadArquivoUnico("curriculos/{$id}", $id, $arquivo['vFFORANEXOLEGIS'], array('pdf', 'doc', 'docx', 'odt'));
		$dados['vIFORCODIGO'] = $id;
		$dadosBanco = array(
			'tabela'  => 'FORMULARIO',
			'prefixo' => 'FOR',
			'fields'  => $dados
		);
		insertUpdateSistema($dadosBanco);
	}

	return $id;
}

function fillFormulario($codigo = null)
{
	if ($codigo != null) {
		$arrayFill = array(
			'tabela'  => 'FORMULARIO',
			'prefixo' => 'FOR',
			'codigo'  => $codigo
		);
		return fillUnico($arrayFill);
	} else {
		return array(
			'FORCODIGO' => ''
		);
	}
}

if (isset($_GET['dadosList'])) {
	echo listFormulario($_POST);
}

function fill_InformacoesPreliminares($IdUsuario){
	$SqlMain = 'SELECT
					c.*
				FROM
					FORMULARIO c
				WHERE
					c.CLICODIGO = '.$IdUsuario;
	$arrayQuery = array(
		'query' => $SqlMain,
		'parametros' => array(
		)
	);
	$registro = consultaComposta($arrayQuery,'SIS');
	return $registro['dados'][0];
}

function listFormulario($dados)
{
	require_once '../includes/constantes.php';
	$pesquisa = $dados['search']['value'];
	$ordemColunas = array('FORDATA_INC', 'FORPERGUNTA1'); //Colocar a ordem das COLUNAS DO BANCO DE DADOS como aparecem na tabela
	$sql = "SELECT
					FORCODIGO,
					FORDATA_INC,
					FORPERGUNTA1
				FROM
					FORMULARIO
				WHERE
					(FORDATA_INC LIKE ? OR
					FORPERGUNTA1 LIKE ?) AND
					FORSTATUS = 'S'
				ORDER BY ";
	$sql .= limitDataTables($ordemColunas, $dados);

	$arrayQuery = array(
		'query' => $sql,
		'parametros' => array(
			array("%$pesquisa%", PDO::PARAM_STR),
			array("%$pesquisa%", PDO::PARAM_STR)
		)
	);
	$list = consultaComposta($arrayQuery);

	$data = array();
	foreach ($list['dados'] as $value) {
		array_push($data, array(
			'DT_RowId' => 'row_' . $value['FORCODIGO'],
			formatar_data_hora($value['FORDATA_INC']),
			$value['FORPERGUNTA1'],
			botoesPadrao('FORMULARIO', 'FOR', $value['FORCODIGO'], 'formulario')
		));
	}
	return json_encode(array(
		"draw"            => intval($dados['draw']),
		"recordsTotal"    => intval($list['quantidadeRegistros']),
		"recordsFiltered" => countRegistros('FORMULARIO', 'FOR'),
		"data"            => $data
	));
}
