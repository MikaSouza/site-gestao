<?php
include_once __DIR__ . '/../../includes/constantes.php';

function getDadosMunicipio()
{
    $sql = "SELECT
				CLICODIGO, CLINOMEFANTASIA, CLIRAZAOSOCIAL, CLICNPJ, CLIDATA_INICIO_ATIVIDADES,
				CLICONTATO, CLIFONE, CLIEMAIL, CLISITE
			FROM
				CLIENTES
			WHERE
				CLICODIGO = {$_SESSION['SI_CLICODIGO']}";
    $dadosBanco = array(
        'query' => $sql,
        'parametros' => array()
    );
    $registros = consultaCompostaSistema($dadosBanco);

    return $registros['dados'][0];
}

function getEndereco()
{
    $sql = "SELECT
				r.ENDLOGRADOURO, r.ENDNROLOGRADOURO, r.ENDCOMPLEMENTO, r.ENDBAIRRO, r.ENDCEP,
				e.ESTSIGLA, c.CIDDESCRICAO, t.TABDESCRICAO as TIPO_LOGRADOURO
			FROM
				ENDERECOS r
			LEFT JOIN
				ESTADOS e
			ON
				r.ESTCODIGO = e.ESTCODIGO
			LEFT JOIN
				CIDADES c
			ON
				r.CIDCODIGO = c.CIDCODIGO
			LEFT JOIN
				TABELAS t
			ON
				r.TABCODIGO = t.TABCODIGO
			WHERE
				r.ENDSTATUS = 'S'
			AND
				r.ENDPADRAO = 'S'
			AND
				r.CLICODIGO = {$_SESSION['SI_CLICODIGO']}";
    $dadosBanco = array(
        'query' => $sql,
        'parametros' => array()
    );
    $registros = consultaCompostaSistema($dadosBanco);

    return $registros['dados'][0];
}