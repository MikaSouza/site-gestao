<?php
function insertUpdateCategoriasCases($dados, $imagem)
{
    $dadosBanco = array(
        'tabela'  => 'CATEGORIASCASES',
        'prefixo' => 'CATC',
        'fields'  => $dados
    );
    $id = insertUpdate($dadosBanco);
    if (!empty($imagem)) {
        $imagemName = uploadImagemUnica('categoriascases', $id, $imagem);

        $dadosBanco['fields'] = array();
        $dadosBanco['fields']['vSCATCIMAGEM'] = $imagemName;
        $dadosBanco['fields']['vSCATCCODIGO'] = $id;

        return insertUpdate($dadosBanco);
    }
    return $id;
}

function fillCategoriasCases($codigo = null)
{
    if ($codigo != null) {
        $arrayFill = array(
            'tabela'  => 'CATEGORIASCASES',
            'prefixo' => 'CATC',
            'codigo'  => $codigo
        );
        return fillUnico($arrayFill);
    } else {
        return array(
            'CATCCATEGORIA' => '',
            'CATCCODIGO'  => ''
        );
    }
}

if (isset($_GET['dadosList'])) {
    echo listCategoriasCases($_POST);
}

function listCategoriasCases($dados)
{
    require_once '../includes/constantes.php';
    $pesquisa = $dados['search']['value'];
    $ordemColunas = array('CATCCATEGORIA'); //Colocar a ordem das COLUNAS DO BANCO DE DADOS como aparecem na tabela
    $sql = "SELECT
					CATCCODIGO,
					CATCCATEGORIA
				FROM
					CATEGORIASCASES
				WHERE
					CATCCATEGORIA LIKE ? AND
					CATCSTATUS = 'S'
				ORDER BY ";
    $sql .= limitDataTables($ordemColunas, $dados);

    $arrayQuery = array(
        'query' => $sql,
        'parametros' => array(
            array("%$pesquisa%", PDO::PARAM_STR)
        )
    );
    $list = consultaComposta($arrayQuery);
    $data = array();
    foreach ($list['dados'] as $value) {
        array_push($data, array(
            'DT_RowId' => 'row_' . $value['CATCCODIGO'],
            $value['CATCCATEGORIA'],
            botoesPadrao('CATEGORIASCASES', 'CATC', $value['CATCCODIGO'], 'categoriascases')
        ));
    }
    return json_encode(
        array(
            "draw"            => intval($dados['draw']),
            "recordsTotal"    => intval($list['quantidadeRegistros']),
            "recordsFiltered" => countRegistros('CATEGORIASCASES', 'CATC'),
            "data"            => $data
        )
    );
}

function comboCategoriasCases()
{
    $sql = "SELECT
					CATCCODIGO,
					CATCCATEGORIA,
					CATCIMAGEM
				FROM
					CATEGORIASCASES
				WHERE
					CATCSTATUS = 'S'
				ORDER BY CATCCATEGORIA ASC";
    $arrayQuery = array(
        'query' => $sql,
        'parametros' => array()
    );
    $result = consultaComposta($arrayQuery);
    return $result['dados'];
}