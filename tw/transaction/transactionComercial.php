<?php
function insertUpdateComercial($dados)
{
	$dadosBanco = array(
		'tabela'  => 'COMERCIAL',
		'prefixo' => 'COM',
		'debug'   => 'N', 
		'fields'  => $dados
	);
	return insertUpdate($dadosBanco);
}

if (isset($_POST['insertContato'])) {
	echo insertUpdateComercial($_POST);
}

function fillComercial($codigo = null)
{
	if ($codigo != null) {
		$arrayFill = array(
			'tabela'  => 'COMERCIAL',
			'prefixo' => 'COM',
			'codigo'  => $codigo
		);
		return fillUnico($arrayFill);
	} else {
		return array(
			'COMCODIGO'   => '',
			'COMNOME'     => '',
			'COMASSUNTO'  => '',
			'COMEMAIL'    => '',
			'COMTELEFONE'    => '',
			'COMMENSAGEM' => ''
		);
	}
}

if (isset($_GET['dadosList'])) {
	echo listComercial($_POST);
}

function listComercial($dados)
{
	require_once '../includes/constantes.php';
	$pesquisa = $dados['search']['value'];
	$ordemColunas = array('COMDATA_INC', 'COMNOME', 'COMEMAIL', 'COMTELEFONE', 'COMASSUNTO'); //Colocar a ordem das COLUNAS DO BANCO DE DADOS como aparecem na tabela
	$sql = "SELECT
					COMCODIGO,
					COMNOME,
					COMASSUNTO,
					COMTELEFONE,
					COMEMAIL,
					COMDATA_INC
				FROM
					COMERCIAL
				WHERE
					(COMNOME LIKE ? OR
					COMASSUNTO LIKE ? OR
					COMTELEFONE LIKE ? OR
					COMEMAIL LIKE ? OR
					COMDATA_INC LIKE ?) AND
					COMSTATUS = 'S'
				ORDER BY ";
	$sql .= limitDataTables($ordemColunas, $dados);

	$arrayQuery = array(
		'query' => $sql,
		'parametros' => array(
			array("%$pesquisa%", PDO::PARAM_STR),
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
			'DT_RowId' => 'row_' . $value['COMCODIGO'],
			formatar_data_hora($value['COMDATA_INC']),
			$value['COMNOME'],
			$value['COMEMAIL'],
			$value['COMTELEFONE'],
			$value['COMASSUNTO'],
			botoesPadrao('COMERCIAL', 'COM', $value['COMCODIGO'], 'COMERCIAL')
		));
	}
	return json_encode(
		array(
			"draw"            => intval($dados['draw']),
			"recordsTotal"    => intval($list['quantidadeRegistros']),
			"recordsFiltered" => countRegistros('COMERCIAL', 'COM'),
			"data"            => $data
		)
	);
}
