<?php
function insertUpdateCarreiras($dados, $arquivo)
{
	$dadosBanco = array(
		'tabela'  => 'CARREIRAS',
		'prefixo' => 'CAR',
		'fields'  => $dados
	);
	$id = insertUpdate($dadosBanco);
	if (!empty($arquivo['vFCARANEXO']['name'])) {
		unset($dados);
		$dados['vFCARANEXO'] = uploadArquivoUnico("curriculos/{$id}", $id, $arquivo['vFCARANEXO'], array('pdf', 'doc', 'docx', 'odt'));
		$dados['vICARCODIGO'] = $id;
		$dadosBanco = array(
			'tabela'  => 'CARREIRAS',
			'prefixo' => 'CAR',
			'fields'  => $dados
		);
		insertUpdate($dadosBanco);
	}

	return $id;
}

function fillCarreiras($codigo = null)
{
	if ($codigo != null) {
		$arrayFill = array(
			'tabela'  => 'CARREIRAS',
			'prefixo' => 'CAR',
			'codigo'  => $codigo
		);
		return fillUnico($arrayFill);
	} else {
		return array(
			'CARCODIGO'   => '',
			'CARNOME'     => '',
			'CAREMAIL'    => '',
			'CARVAGA' 	  => '',
			'CARANEXO'    => ''
		);
	}
}

if (isset($_GET['dadosList'])) {
	echo listCarreiras($_POST);
}

function listCarreiras($dados)
{
	require_once '../includes/constantes.php';
	$pesquisa = $dados['search']['value'];
	//Colocar a ordem das COLUNAS DO BANCO DE DADOS como aparecem na tabela
	$ordemColunas = array('CARDATA_INC', 'CARNOME', 'CAREMAIL', 'CARVAGA');
	$sql = "SELECT
					CARCODIGO,
					CARNOME,
					CAREMAIL,
					CARVAGA,
					CARDATA_INC
				FROM
					CARREIRAS
				WHERE
					(CARNOME LIKE ? OR
					CAREMAIL LIKE ? OR
					CARVAGA LIKE ? OR
					CARDATA_INC LIKE ?) AND
					CARSTATUS = 'S'
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
			'DT_RowId' => 'row_' . $value['CARCODIGO'],
			formatar_data_hora($value['CARDATA_INC']),
			$value['CARNOME'],
			$value['CAREMAIL'],
			$value['CARVAGA'],
			botoesPadrao('CARREIRAS', 'CAR', $value['CARCODIGO'], 'carreiras')
		));
	}
	return json_encode(
		array(
			"draw"            => intval($dados['draw']),
			"recordsTotal"    => intval($list['quantidadeRegistros']),
			"recordsFiltered" => countRegistros('CARREIRAS', 'CAR'),
			"data"            => $data
		)
	);
}
