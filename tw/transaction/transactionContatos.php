<?php
function insertUpdateContatos($dados)
{
	$dadosBanco = array(
		'tabela'  => 'CONTATOS',
		'prefixo' => 'CON',
		'fields'  => $dados
	);
	return insertUpdate($dadosBanco);
}

if (isset($_POST['insertContato'])) {
	echo insertUpdateContatos($_POST);
}

function fillContatos($codigo = null)
{
	if ($codigo != null) {
		$arrayFill = array(
			'tabela'  => 'CONTATOS',
			'prefixo' => 'CON',
			'codigo'  => $codigo
		);
		return fillUnico($arrayFill);
	} else {
		return array(
			'CONCODIGO'   => '',
			'CONNOME'     => '',
			'CONTELEFONE' => '',
			'CONEMAIL'    => '',
			'CONMENSAGEM' => ''
		);
	}
}

if (isset($_GET['dadosList'])) {
	echo listContatos($_POST);
}

function listContatos($dados)
{
	require_once '../includes/constantes.php';
	$pesquisa = $dados['search']['value'];
	$ordemColunas = array('CONDATA_INC', 'CONNOME', 'CONTELEFONE', 'CONEMAIL'); //Colocar a ordem das COLUNAS DO BANCO DE DADOS como aparecem na tabela
	$sql = "SELECT
					CONCODIGO,
					CONDATA_INC,
					CONNOME,
					CONTELEFONE,
					CONEMAIL
				FROM
					CONTATOS
				WHERE
					(CONDATA_INC LIKE ? OR
					CONNOME LIKE ? OR
					CONTELEFONE LIKE ? OR
					CONEMAIL LIKE ?) AND
					CONSTATUS = 'S'
				ORDER BY ";
	$sql .= limitDataTables($ordemColunas, $dados);

	$arrayQuery = array(
		'query' => $sql,
		'parametros' => array(
			array("%$pesquisa%", PDO::PARAM_STR),
			array("%$pesquisa%", PDO::PARAM_STR),
			array("%$pesquisa%", PDO::PARAM_STR),
			array("%$pesquisa%", PDO::PARAM_STR)
		)
	);
	$list = consultaComposta($arrayQuery);

	$data = array();
	foreach ($list['dados'] as $value) {
		array_push($data, array(
			'DT_RowId' => 'row_' . $value['CONCODIGO'],
			formatar_data_hora($value['CONDATA_INC']),
			$value['CONNOME'],
			$value['CONTELEFONE'],
			$value['CONEMAIL'],
			botoesPadrao('CONTATOS', 'CON', $value['CONCODIGO'], 'contatos')
		));
	}
	return json_encode(array(
		"draw"            => intval($dados['draw']),
		"recordsTotal"    => intval($list['quantidadeRegistros']),
		"recordsFiltered" => countRegistros('CONTATOS', 'CON'),
		"data"            => $data
	));
}
