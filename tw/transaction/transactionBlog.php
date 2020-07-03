<?php
function insertUpdateBlog($dados, $imagens = null)
{
	$dados['vSBLOURLAMIG'] = gerarUrlAmigavel($dados['vSBLOURLAMIG']);
	$dadosBanco = array(
		'tabela'  => 'BLOG',
		'prefixo' => 'BLO',
		'fields'  => $dados
	);

	$id = insertUpdate($dadosBanco);

	if (filter_var($dados['vSBLOIMAGEM'], FILTER_VALIDATE_URL)) {
		$dadosBanco['fields'] = array();
		$dadosBanco['fields']['vSBLOIMAGEM'] = saveImage('blog', $id, $dados['vSBLOIMAGEM']);
		$dadosBanco['fields']['vIBLOCODIGO'] = $id;

		insertUpdate($dadosBanco);
		echo "$dadosBanco";
	}

	foreach ($imagens as $k => $imagem) {
		if ($imagem['error'])
			unset($imagens[$k]);
	}

	if (!empty($imagens)) {
		$imagem = uploadImagemUnica('blog', $id, $imagens);

		$dadosBanco['fields'] = array();
		$dadosBanco['fields']['vSBLOIMAGEM'] = $imagem;
		$dadosBanco['fields']['vIBLOCODIGO'] = $id;

		return insertUpdate($dadosBanco);
	}
	return $id;
}

function fillBlog($codigo = null)
{
	if ($codigo != null) {
		$arrayFill = array(
			'tabela'  => 'BLOG',
			'prefixo' => 'BLO',
			'codigo'  => $codigo
		);
		return fillUnico($arrayFill);
	} else {
		return array(
			'BLOTITULO'    => '',
			'BLOCODIGO'    => '',
			'BLOCODIGO'    => '',
			'BLOCODIGO'    => '',
			'BLOCODIGO'    => '',
			'BLOCODIGO'    => ''
		);
	}
}

if (isset($_GET['dadosList'])) {
	echo listBlog($_POST);
}

function listBlog($dados)
{
	require_once '../includes/constantes.php';
	$pesquisa = $dados['search']['value'];
	$ordemColunas = array('BLOTIPO', 'BLODATA_INC', 'CATCATEGORIA', 'BLOTITULO'); //Colocar a ordem das COLUNAS DO BANCO DE DADOS como aparecem na tabela
	$sql = "SELECT
					n.BLOCODIGO,
					n.BLOTIPO,
					n.CATCODIGO,
					n.BLOTITULO,
					c.CATCATEGORIA,
					n.BLODATA_INC
				FROM
					BLOG n
				LEFT JOIN
					CATEGORIAS c
				ON
					n.CATCODIGO = c.CATCODIGO
				WHERE
				(n.BLOTIPO LIKE ? OR
				n.CATCODIGO LIKE ? OR
				n.BLOTITULO LIKE ? ) AND
				n.BLOSTATUS = 'S'
				ORDER BY ";
	$sql .= limitDataTables($ordemColunas, $dados);

	$arrayQuery = array(
		'query' => $sql,
		'parametros' => array(
			array("%$pesquisa%", PDO::PARAM_STR),
			array("%$pesquisa%", PDO::PARAM_INT),
			array("%$pesquisa%", PDO::PARAM_STR)
		)
	);

	$list = consultaComposta($arrayQuery);
	$data = array();

	foreach ($list['dados'] as $value) {
		array_push($data, array(
			'DT_RowId' => 'row_' . $value['BLOCODIGO'],
			$value['BLOTIPO'] = ($value['BLOTIPO'] == 'I') ? 'Interna' : 'Externa',
			formatar_data($value['BLODATA_INC']),
			$value['CATCATEGORIA'],
			$value['BLOTITULO'],
			botoesPadrao('BLOG', 'BLO', $value['BLOCODIGO'], 'blog')
		));
	}

	return json_encode(
		array(
			"draw"            => intval($dados['draw']),
			"recordsTotal"    => intval($list['quantidadeRegistros']),
			"recordsFiltered" => intval(countRegistros('BLOG', 'BLO')),
			"data"            => $data
		)
	);
}

function comboBlog($limite, $itensPorPagina)
{

	$sql = "SELECT
					n.BLOCODIGO,
					n.BLOTEXTO,
					n.BLOIMAGEM,
					n.BLOTIPO,
					n.BLOTITULO,
					n.BLODATA_INC,
					n.BLOURLAMIG,
					c.CATCATEGORIA
				FROM
					BLOG n
				LEFT JOIN
					CATEGORIAS c
				ON
					n.CATCODIGO = c.CATCODIGO
				WHERE
					n.BLOSTATUS = 'S'
				ORDER BY
					n.BLOCODIGO DESC
				LIMIT
                	{$limite}, {$itensPorPagina}";

	$arrayQuery = array(
		'query' => $sql,
		'parametros' => array()
	);
	$result = consultaComposta($arrayQuery);

	return $result;
}

function getNoticiaByTermoPesquisa($termoPesquisa)
{

	$sql = "SELECT
					n.BLOCODIGO,
					n.BLOTEXTO,
					n.BLOTIPO,
					n.BLOTITULO,
					n.BLODATA_INC,
					c.CATCATEGORIA,
					n.BLOURLAMIG,
					n.BLOIMAGEM
				FROM
					BLOG n
				LEFT JOIN
					CATEGORIAS c
				ON
					n.CATCODIGO = c.CATCODIGO
				WHERE
					(n.BLOTITULO LIKE '%$termoPesquisa%' OR
					n.BLOTEXTO LIKE '%$termoPesquisa%')
				AND
					n.BLOSTATUS = 'S'
				ORDER BY
					n.BLODATA_INC";
	$arrayQuery = array(
		'query' => $sql,
		'parametros' => array(
			array("%$termoPesquisa%", PDO::PARAM_STR),
			array("%$termoPesquisa%", PDO::PARAM_STR)
		)
	);

	$result = consultaComposta($arrayQuery);

	return $result;
}

function getNoticiaByUrlAmigavel($url)
{

	$data = consultaComposta(array(
		'query' => "SELECT
								n.*,
								c.CATCATEGORIA
							FROM
								BLOG n
							LEFT JOIN
								CATEGORIAS c
							ON
								n.CATCODIGO = c.CATCODIGO
							WHERE
								n.BLOURLAMIG LIKE ?
							AND
								n.BLOSTATUS = 'S'
							ORDER BY
								n.BLODATA_INC",
		'parametros' => array(
			array("%$url%", PDO::PARAM_STR)
		)
	));

	return $data['dados'][0];
}

function getBlogByCategoria($vICATCATEGORIA)
{

	$data = consultaComposta(array(
		'query' => "SELECT
								n.*,
								c.CATCATEGORIA
							FROM
								BLOG n
							LEFT JOIN
								CATEGORIAS c
							ON
								n.CATCODIGO = c.CATCODIGO
							WHERE
								c.CATCODIGO = ?
							AND
								n.BLOSTATUS = 'S'
							ORDER BY
								rand() ",
		'parametros' => array(
			array($vICATCATEGORIA, PDO::PARAM_INT)
		)
	));

	return $data;
}
