<?php
function insertUpdateFaq($dados)
{
    $dadosBanco = array(
        'tabela'  => 'FAQ',
        'prefixo' => 'FAQ',
        'fields'  => $dados
    );
    $id = insertUpdate($dadosBanco);
    return $id;
}

function fillFaq($codigo = null)
{
    if ($codigo != null) {
        $arrayFill = array(
            'tabela'  => 'FAQ',
            'prefixo' => 'FAQ',
            'codigo'  => $codigo
        );
        return fillUnico($arrayFill);
    } else {
        return array(
            'FAQCODIGO' => '',
            'FAQPERGUNTA' => '',
            'FAQRESPOSTA'   => '',
        );
    }
}

if (isset($_GET['dadosList'])) {
    echo listFaq($_POST);
}

function listFaq($dados)
{
    require_once '../includes/constantes.php';
    $pesquisa = $dados['search']['value'];
    $ordemColunas = array('FAQPERGUNTA', 'FAQRESPOSTA', 'CFQCATEGORIA'); //Colocar a ordem das COLUNAS DO BANCO DE DADOS como aparecem na tabela
    $sql = "SELECT
                    n.FAQCODIGO,
					n.FAQPERGUNTA,
					n.FAQRESPOSTA,
                    c.CFQCATEGORIA
				FROM
					FAQ n
                LEFT JOIN
                    CATEGORIASFAQ c
                ON
                    n.CFQCODIGO = c.CFQCODIGO
				WHERE
					(n.FAQPERGUNTA LIKE ? OR
					n.FAQRESPOSTA LIKE ? OR
					c.CFQCODIGO LIKE ? ) AND
					n.FAQSTATUS = 'S'
				ORDER BY ";
    $sql .= limitDataTables($ordemColunas, $dados);

    $arrayQuery = array(
        'query' => $sql,
        'parametros' => array(
            array("%$pesquisa%", PDO::PARAM_STR),
            array("%$pesquisa%", PDO::PARAM_STR),
            array("%$pesquisa%", PDO::PARAM_INT)
        )
    );
    $list = consultaComposta($arrayQuery);

    $data = array();
    foreach ($list['dados'] as $value) {
        array_push($data, array(
            'DT_RowId' => 'row_' . $value['FAQCODIGO'],
            $value['FAQPERGUNTA'],
            $value['FAQRESPOSTA'],
            $value['CFQCATEGORIA'],
            botoesPadrao('FAQ', 'FAQ', $value['FAQCODIGO'], 'faq')
        ));
    }
    return json_encode(
        array(
            "draw"            => intval($dados['draw']),
            "recordsTotal"    => intval($list['quantidadeRegistros']),
            "recordsFiltered" => countRegistros('FAQ', 'FAQ'),
            "data"            => $data
        )
    );
}

// Combos para buscarem conforme a categoria do FAQ

function comboFaqEAD()
{

    $sql = "SELECT
                    n.FAQCODIGO,
					n.FAQPERGUNTA,
					n.FAQRESPOSTA,
                    c.CFQCATEGORIA
				FROM
					FAQ n
                LEFT JOIN
					CATEGORIASFAQ c
				ON
					n.CFQCODIGO = c.CFQCODIGO
				WHERE
					n.FAQSTATUS = 'S' AND
                    c.CFQCODIGO = '1'
				ORDER BY
					n.FAQCODIGO ASC";
    $arrayQuery = array(
        'query' => $sql,
        'parametros' => array()
    );
    $list = consultaComposta($arrayQuery);
    return $list['dados'];
}

function comboFaqPortalAluno()
{

    $sql = "SELECT
                    n.FAQCODIGO,
					n.FAQPERGUNTA,
					n.FAQRESPOSTA,
                    c.CFQCATEGORIA
				FROM
					FAQ n
                LEFT JOIN
					CATEGORIASFAQ c
				ON
					n.CFQCODIGO = c.CFQCODIGO
				WHERE
					n.FAQSTATUS = 'S' AND
                    c.CFQCODIGO = '2'
				ORDER BY
					n.FAQCODIGO ASC";
    $arrayQuery = array(
        'query' => $sql,
        'parametros' => array()
    );
    $list = consultaComposta($arrayQuery);
    return $list['dados'];
}

function comboFaqPortalProf()
{

    $sql = "SELECT
                    n.FAQCODIGO,
					n.FAQPERGUNTA,
					n.FAQRESPOSTA,
                    c.CFQCATEGORIA
				FROM
					FAQ n
                LEFT JOIN
					CATEGORIASFAQ c
				ON
					n.CFQCODIGO = c.CFQCODIGO
				WHERE
					n.FAQSTATUS = 'S' AND
                    c.CFQCODIGO = '3'
				ORDER BY
					n.FAQCODIGO ASC";
    $arrayQuery = array(
        'query' => $sql,
        'parametros' => array()
    );
    $list = consultaComposta($arrayQuery);
    return $list['dados'];
}

// Combos para buscarem conforme a categoria do FAQ