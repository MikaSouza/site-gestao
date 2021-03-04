<?php
include_once __DIR__ . '/../../includes/constantes.php';

function getOrientacoesTecnicas()
{
    $sql = "SELECT
				OXTCODIGO, OXTNUMERO, OXTANO, OXTTITULO, OXTDESCRICAO, OXTDATA_INC, OXTDATA_ALT, OXTSTATUS
			FROM
				ORIENTACAOTECNICA
			WHERE
				OXTSTATUS = 'S'";
    $dadosBanco = array(
        'query' => $sql,
        'parametros' => array()
    );
    $registros = consultaCompostaSistema($dadosBanco);

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