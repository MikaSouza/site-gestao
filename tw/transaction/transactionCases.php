<?php
function insertUpdateCases($dados, $imagens = null)
{
  //  $dados['vSCASURLAMIG'] = gerarUrlAmigavel($dados['vSCASURLAMIG']);
    $dadosBanco = array(
        'tabela'  => 'CASES',
        'prefixo' => 'CAS',
        'fields'  => $dados
    );

    $id = insertUpdate($dadosBanco);

    if (filter_var($dados['vSCASIMAGEM'], FILTER_VALIDATE_URL)) {
        $dadosBanco['fields'] = array();
        $dadosBanco['fields']['vSCASIMAGEM'] = saveImage('case', $id, $dados['vSCASIMAGEM']);
        $dadosBanco['fields']['vICASCODIGO'] = $id;

        insertUpdate($dadosBanco);
        echo "$dadosBanco";
    }

    foreach ($imagens as $k => $imagem) {
        if ($imagem['error'])
            unset($imagens[$k]);
    }

    if (!empty($imagens)) {
        $imagem = uploadImagemUnica('case', $id, $imagens);

        $dadosBanco['fields'] = array();
        $dadosBanco['fields']['vSCASIMAGEM'] = $imagem;
        $dadosBanco['fields']['vICASCODIGO'] = $id;

        return insertUpdate($dadosBanco);
    }
    return $id;
}

function fillCases($codigo = null)
{
    if ($codigo != null) {
        $arrayFill = array(
            'tabela'  => 'CASES',
            'prefixo' => 'CAS',
            'codigo'  => $codigo
        );
        return fillUnico($arrayFill);
    } else {
        return array(
            'CASTITULO'    => '',
            'CASCODIGO'    => '',
            'CASCODIGO'    => '',
            'CASCODIGO'    => '',
            'CASCODIGO'    => '',
            'CASCODIGO'    => ''
        );
    }
}

if (isset($_GET['dadosList'])) {
    echo listCases($_POST);
}

function listCases($dados)
{
    require_once '../includes/constantes.php';
    $pesquisa = $dados['search']['value'];
    $ordemColunas = array('CASDATA_INC', 'CATCCATEGORIA', 'CASTITULO'); //Colocar a ordem das COLUNAS DO BANCO DE DADOS como aparecem na tabela
    $sql = "SELECT
					n.CASCODIGO,
					n.CATCCODIGO,
					n.CASTITULO,
					c.CATCCATEGORIA,
					n.CASDATA_INC
				FROM
					CASES n
				LEFT JOIN
					CATEGORIASCASES c
				ON
					n.CATCCODIGO = c.CATCCODIGO
				WHERE
				(n.CATCCODIGO LIKE ? OR
				n.CASTITULO LIKE ? ) AND
				n.CASSTATUS = 'S'
				ORDER BY ";
    $sql .= limitDataTables($ordemColunas, $dados);

    $arrayQuery = array(
        'query' => $sql,
        'parametros' => array(
            array("%$pesquisa%", PDO::PARAM_INT),
            array("%$pesquisa%", PDO::PARAM_STR)
        )
    );

    $list = consultaComposta($arrayQuery);
    $data = array();

    foreach ($list['dados'] as $value) {
        array_push($data, array(
            'DT_RowId' => 'row_' . $value['CASCODIGO'],
            formatar_data($value['CASDATA_INC']),
            $value['CATCCATEGORIA'],
            $value['CASTITULO'],
            botoesPadrao('CASES', 'CAS', $value['CASCODIGO'], 'case')
        ));
    }

    return json_encode(
        array(
            "draw"            => intval($dados['draw']),
            "recordsTotal"    => intval($list['quantidadeRegistros']),
            "recordsFiltered" => intval(countRegistros('CASES', 'CAS')),
            "data"            => $data
        )
    );
}

function comboCase($limite, $itensPorPagina, $vICategoria)
{
    $where = '';
    if($vICategoria > 0 )
		$where .= 'AND (n.CATCCODIGO = ? OR n.CATCCODIGO2 = ?) ';
    $sql = "SELECT
					n.CASCODIGO,
					n.CASTEXTO,
					n.CASIMAGEM,
					n.CASTITULO,
					n.CASDATA_INC,
					n.CASURLAMIG,
					c.CATCCATEGORIA,
					c2.CATCCATEGORIA AS CATEGORIA2
				FROM
					CASES n
				LEFT JOIN
					CATEGORIASCASES c
				ON
					n.CATCCODIGO = c.CATCCODIGO
				LEFT JOIN
					CATEGORIASCASES c2
				ON
					n.CATCCODIGO2 = c2.CATCCODIGO	
				WHERE
					n.CASSTATUS = 'S'
                    ".	$where	."
				ORDER BY
                    rand()
				LIMIT
                    {$limite}, {$itensPorPagina}";

    $arrayQuery = array(
        'query' => $sql,
        'parametros' => array()
    );
    if($vICategoria > 0 ) {
        $arrayQuery['parametros'][] = array($vICategoria, PDO::PARAM_INT);
		$arrayQuery['parametros'][] = array($vICategoria, PDO::PARAM_INT);
	}
    $result = consultaComposta($arrayQuery);
    return $result;
}

function getNoticiaByTermoPesquisaCase($termoPesquisa = '')
{

    $sql = "SELECT
					n.CASCODIGO,
					n.CASTEXTO,
					n.CASTITULO,
					n.CASDATA_INC,
					c.CATCATEGORIA,
				FROM
					CASES n
				LEFT JOIN
					CATEGORIASCASES c
				ON
					n.CATCCODIGO = c.CATCCODIGO
				WHERE
					(n.CASTITULO LIKE '%$termoPesquisa%' OR
					n.CASTEXTO LIKE '%$termoPesquisa%')
				AND
					n.CASSTATUS = 'S'
				ORDER BY
					n.CASDATA_INC";

    $arrayQuery = array(
        'query' => $sql,
        'parametros' => array()
    );

    $result = consultaComposta($arrayQuery);

    return $result;
}

function getNoticiaByUrlAmigavelCase($url)
{

    $data = consultaComposta(array(
        'query' => "SELECT
								n.*,
								c.CATCCATEGORIA,
								c.CATCIMAGEM
							FROM
								CASES n
							LEFT JOIN
								CATEGORIASCASES c
							ON
								n.CATCCODIGO = c.CATCCODIGO
							WHERE
								n.CASURLAMIG LIKE ?
							AND
								n.CASSTATUS = 'S'
							ORDER BY
								n.CASDATA_INC",
        'parametros' => array(
            array("%$url%", PDO::PARAM_STR)
        )
    ));

    return $data['dados'][0];
}
