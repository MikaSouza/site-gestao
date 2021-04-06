<?php
include_once __DIR__ . '/../../includes/constantes.php';

function getOrientacoesTecnicas()
{
    $sql = "SELECT
				OXTCODIGO, OXTNUMERO, OXTANO, OXTTITULO,
                OXTDESCRICAO,
                OXTDATA_INC, OXTDATA_ALT, OXTSTATUS
			FROM
				ORIENTACAOTECNICA
			WHERE
				OXTSTATUS = 'S'
            ORDER BY
                OXTDATA_INC desc";
    $dadosBanco = array(
        'query' => $sql,
        'parametros' => array()
    );
    $registros = consultaCompostaSistema($dadosBanco);

    if ($registros['quantidadeRegistros'] > 0) {
        $codigos = array_map(
            function ($codigo) {
                return $codigo['OXTCODIGO'];
            },
            $registros['dados']
        );

        $codigos = implode(',', $codigos);

        $qry = "SELECT
                    G.GEDCODIGO,
                    G.GEDNOMEARQUIVO,
                    G.GEDVINCULO,
                    CONCAT('https://gestao-srv.twflex.com.br/', G.GEDDIRETORIO, '/', G.GEDNOMEARQUIVO) AS LINK
                FROM
                    GED G
                WHERE
                    GEDSTATUS = 'S'
                AND
                    G.GEDVINCULO IN ($codigos)
                AND
                    G.MENCODIGO = 2026";
        $arrayQuery = array(
            'query' => $qry,
            'parametros' => array()
        );
        $arquivos = consultaCompostaSistema($arrayQuery);

        foreach ($arquivos['dados'] as $chave => $arquivo) {
            $vinculo = $arquivo['GEDVINCULO'];
            $sequencial = str_pad((int) $chave + 1, 2, "0", STR_PAD_LEFT);

            foreach ($registros['dados'] as $key => $value) {
                if ($vinculo == $value['OXTCODIGO']) {
                    $registros['dados'][$key]['ANEXOS'][] = [
                        'NOMEARQUIVO' => $arquivo['GEDNOMEARQUIVO'],
                        'LINK' => $arquivo['LINK'],
                        'SEQUENCIAL' => $sequencial
                    ];
                }
            }
        }
    }

    return $registros['dados'];
}

function getOrientacaoTecnicaById($id)
{
    $sql = "SELECT
				OXTCODIGO, OXTNUMERO, OXTANO, OXTTITULO, OXTDESCRICAO, OXTDATA_INC, OXTDATA_ALT, OXTSTATUS
			FROM
				ORIENTACAOTECNICA
			WHERE
				OXTCODIGO = {$id}";
    $dadosBanco = array(
        'query' => $sql,
        'parametros' => array()
    );
    $registros = consultaCompostaSistema($dadosBanco);

    return $registros['dados'][0];
}

// function getOrientacaoByTermoPesquisa1($termoPesquisa)
// {

//     $sql = "SELECT
// 					OXTCODIGO,
//                     OXTTITULO,
//                     OXTNUMERO,
//                     OXTANO
// 				FROM
//                     ORIENTACAOTECNICA
// 				WHERE
//                     OXTTITULO LIKE '%$termoPesquisa%'
// 				AND
//                     OXTSTATUS = 'S'
//                 ORDER BY
//                     OXTDATA_INC desc";
//     $arrayQuery = array(
//         'query' => $sql,
//         'parametros' => array(
//             array($termoPesquisa, PDO::PARAM_STR)
//         )
//     );

//     $result = consultaCompostaSistema($arrayQuery);

//     return $result;
// }

function getOrientacaoByTermoPesquisa($termoPesquisa)
{
    $sql = "SELECT
				OXTCODIGO, OXTNUMERO, OXTANO, OXTTITULO,
                OXTDESCRICAO,
                OXTDATA_INC, OXTDATA_ALT, OXTSTATUS
			FROM
				ORIENTACAOTECNICA
			WHERE
                OXTTITULO LIKE '%$termoPesquisa%'
            AND
                OXTSTATUS = 'S'
            ORDER BY
                OXTDATA_INC desc";
    $dadosBanco = array(
        'query' => $sql,
        'parametros' => array(
            array($termoPesquisa, PDO::PARAM_STR)
        )
    );
    $registros = consultaCompostaSistema($dadosBanco);

    if ($registros['quantidadeRegistros'] > 0) {
        $codigos = array_map(
            function ($codigo) {
                return $codigo['OXTCODIGO'];
            },
            $registros['dados']
        );

        $codigos = implode(',', $codigos);

        $qry = "SELECT
                    G.GEDCODIGO,
                    G.GEDNOMEARQUIVO,
                    G.GEDVINCULO,
                    CONCAT('https://gestao-srv.twflex.com.br/', G.GEDDIRETORIO, '/', G.GEDNOMEARQUIVO) AS LINK
                FROM
                    GED G
                WHERE
                    GEDSTATUS = 'S'
                AND
                    G.GEDVINCULO IN ($codigos)
                AND
                    G.MENCODIGO = 2026";
        $arrayQuery = array(
            'query' => $qry,
            'parametros' => array()
        );
        $arquivos = consultaCompostaSistema($arrayQuery);

        foreach ($arquivos['dados'] as $chave => $arquivo) {
            $vinculo = $arquivo['GEDVINCULO'];
            $sequencial = str_pad((int) $chave + 1, 2, "0", STR_PAD_LEFT);

            foreach ($registros['dados'] as $key => $value) {
                if ($vinculo == $value['OXTCODIGO']) {
                    $registros['dados'][$key]['ANEXOS'][] = [
                        'NOMEARQUIVO' => $arquivo['GEDNOMEARQUIVO'],
                        'LINK' => $arquivo['LINK'],
                        'SEQUENCIAL' => $sequencial
                    ];
                }
            }
        }
    }

    return $registros['dados'];
}
