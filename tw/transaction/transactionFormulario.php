<?php
function insertUpdateFormulario($dados)
{
	$dadosBanco = array(
		'tabela'  => 'FORMULARIO',
		'prefixo' => 'FOR',
		'fields'  => $dados
	);
	return insertUpdate($dadosBanco);
}

if (isset($_POST['insertContato'])) {
	echo insertUpdateFormulario($_POST);
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
			'FORCODIGO'     => '',
			'FORPERGUNTA1'  => '',
			'FORPERGUNTA2'  => '',
			'FORPERGUNTA3'  => '',
			'FORPERGUNTA4'  => '',
			'FORPERGUNTA5'  => '',
			'FORPERGUNTA6'  => '',
			'FORPERGUNTA7'  => '',
			'FORPERGUNTA8'  => '',
			'FORPERGUNTA9'  => '',
			'FORPERGUNTA10' => '',
			'FORPERGUNTA11' => '',
			'FORPERGUNTA12' => '',
			'FORPERGUNTA13' => '',
			'FORPERGUNTA14' => '',
			'FORPERGUNTA15' => '',
			'FORPERGUNTA16' => '',
			'FORPERGUNTA17' => '',
			'FORPERGUNTA18' => '',
			'FORPERGUNTA19' => '',
			'FORPERGUNTA20' => '',
			'FORPERGUNTA21' => '',
			'FORPERGUNTA22' => '',
			'FORPERGUNTA23' => '',
			'FORPERGUNTA24' => '',
			'FORPERGUNTA25' => '',
			'FORPERGUNTA26' => '',
			'FORPERGUNTA27' => '',
			'FORPERGUNTA28' => '',
			'FORPERGUNTA29' => '',
			'FORPERGUNTA30' => '',
			'FORPERGUNTA31' => '',
			'FORPERGUNTA32' => '',
			'FORPERGUNTA33' => '',
			'FORPERGUNTA34' => '',
			'FORPERGUNTA35' => '',
			'FORPERGUNTA36' => '',
			'FORPERGUNTA37' => '',
			'FORPERGUNTA38' => '',
			'FORPERGUNTA39' => '',
			'FORPERGUNTA40' => '',
			'FORPERGUNTA41' => '',
			'FORPERGUNTA42' => '',
			'FORPERGUNTA43' => '',
			'FORPERGUNTA44' => '',
			'FORPERGUNTA45' => '',
			'FORPERGUNTA46' => '',
			'FORPERGUNTA47' => '',
			'FORPERGUNTA48' => '',
			'FORPERGUNTA49' => '',
			'FORPERGUNTA50' => ''
		);
	}
}

if (isset($_GET['dadosList'])) {
	echo listFormulario($_POST);
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
