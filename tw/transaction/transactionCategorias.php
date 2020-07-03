<?php
function insertUpdateCategorias($dados)
{
	$dadosBanco = array(
		'tabela'  => 'CATEGORIAS',
		'prefixo' => 'CAT',
		'fields'  => $dados
	);
	$id = insertUpdate($dadosBanco);
	return $id;
}
function fillCategorias($codigo = null)
{
	if ($codigo != null) {
		$arrayFill = array(
			'tabela'  => 'CATEGORIAS',
			'prefixo' => 'CAT',
			'codigo'  => $codigo
		);
		return fillUnico($arrayFill);
	} else {
		return array(
			'CATCODIGO'    => '',
			'CATCATEGORIA' => '',
		);
	}
}
if (isset($_GET['dadosList'])) {
	echo listCategorias($_POST, $_GET);
}
function listCategorias($dados, $params)
{
	require_once '../includes/constantes.php';
	$pesquisa = $dados['search']['value'];
	$ordemColunas = array('CATCATEGORIA'); //Colocar a ordem das COLUNAS DO BANCO DE DADOS como aparecem na tabela
	$sql = "SELECT
		CATCODIGO,
		CATCATEGORIA
		FROM
		CATEGORIAS
		WHERE
		CATCATEGORIA LIKE ? AND
		CATSTATUS = 'S'
		ORDER BY ";
	$sql .= limitDataTables($ordemColunas, $dados);

	$arrayQuery = array(
		'query' => $sql,
		'parametros' => array(
			array("%$pesquisa%", PDO::PARAM_STR),
		)
	);
	$list = consultaComposta($arrayQuery);
	$data = array();

	//Define a quantidade de registros
	$sqlQtd = "SELECT
		CATCODIGO
		FROM
		CATEGORIAS
		WHERE
		CATSTATUS = 'S' ";
	$qtd = consultaComposta(array(
		'query' => $sqlQtd
	));

	foreach ($list['dados'] as $value) {
		array_push($data, array(
			'DT_RowId' => 'row_' . $value['CATCODIGO'],
			$value['CATCATEGORIA'],
			botoesPadrao('CATEGORIAS', 'CAT', $value['CATCODIGO'], 'categorias')
		));
	}
	return json_encode(
		array(
			"draw"            => intval($dados['draw']),
			"recordsTotal"    => intval($list['quantidadeRegistros']),
			"recordsFiltered" => intval($qtd['quantidadeRegistros']),
			"data"            => $data
		)
	);
}

function comboCategorias()
{
	$sql = "SELECT
		CATCODIGO,
		CATCATEGORIA
		FROM
		CATEGORIAS
		WHERE
		CATSTATUS = 'S'
		ORDER BY CATCATEGORIA ASC";
	$arrayQuery = array(
		'query' => $sql
	);
	$result = consultaComposta($arrayQuery);
	return $result['dados'];
}
