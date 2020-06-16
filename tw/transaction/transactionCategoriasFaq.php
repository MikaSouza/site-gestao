<?php
function insertUpdateCategoriasFaq($dados)
{
    $dadosBanco = array(
        'tabela'  => 'CATEGORIASFAQ',
        'prefixo' => 'CFQ',
        'fields'  => $dados
    );
    $id = insertUpdate($dadosBanco);
    return $id;
}
function fillCategoriasFaq($codigo = null)
{
    if ($codigo != null) {
        $arrayFill = array(
            'tabela'  => 'CATEGORIASFAQ',
            'prefixo' => 'CFQ',
            'codigo'  => $codigo
        );
        return fillUnico($arrayFill);
    } else {
        return array(
            'CFQCODIGO'    => '',
            'CFQCATEGORIA' => '',
        );
    }
}
if (isset($_GET['dadosList'])) {
    echo listCategoriasFaq($_POST, $_GET);
}
function listCategoriasFaq($dados, $params)
{
    require_once '../includes/constantes.php';
    $pesquisa = $dados['search']['value'];
    $ordemColunas = array('CFQCATEGORIA'); //Colocar a ordem das COLUNAS DO BANCO DE DADOS como aparecem na tabela
    $sql = "SELECT
		CFQCODIGO,
		CFQCATEGORIA
		FROM
		CATEGORIASFAQ
		WHERE
		CFQCATEGORIA LIKE ? AND
		CFQSTATUS = 'S'
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
		CFQCODIGO
		FROM
		CATEGORIASFAQ
		WHERE
		CFQSTATUS = 'S' ";
    $qtd = consultaComposta(array(
        'query' => $sqlQtd
    ));

    foreach ($list['dados'] as $value) {
        array_push($data, array(
            'DT_RowId' => 'row_' . $value['CFQCODIGO'],
            $value['CFQCATEGORIA'],
            botoesPadrao('CATEGORIASFAQ', 'CFQ', $value['CFQCODIGO'], 'categoriasfaq')
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

function comboCategoriasFaq()
{
    $sql = "SELECT
		        CFQCODIGO,
		        CFQCATEGORIA
		    FROM
		        CATEGORIASFAQ
		    WHERE
		        CFQSTATUS = 'S'
		    ORDER BY CFQCATEGORIA ASC";
    $arrayQuery = array(
        'query' => $sql
    );
    $result = consultaComposta($arrayQuery);
    return $result['dados'];
}
