<?php
include_once __DIR__ . '/../includes/constantes.php';

if ($_POST['vSLoginRecuperar'] && $_POST['vSLoginRecuperar'] != '') {

	$result = verificarUsername($_POST['vSLoginRecuperar']);

	if ($result['success'] == 1) {
		header('location:recuperar-login.php?vMGS=E');
	} else {
		// mandar email
	}
}

//if(verificacaoGoogleRecaptcha($_POST['g-recaptcha-response'])){
unset($_POST['g-recaptcha-response']);
$email = filter_var($_POST["vSUsuario"], FILTER_SANITIZE_EMAIL);

if ((verificarVazio($email)) && (verificarVazio($_POST["vSSenha"]))) {
	$senha	    = $_POST['vSSenha'];
	$login = loginApp($email, $senha);
	if ($login['CONCODIGO'] !== false && is_numeric($login['CONCODIGO'])) {
		$_SESSION['SI_CONCODIGO'] = $login['CONCODIGO'];
		$_SESSION['SS_CONNOME'] = $login['CONNOME'];
		$_SESSION['SS_CONEMAIL'] = $login['CONEMAIL'];
		$_SESSION['SS_CONFONE'] = $login['CONFONE'];
		$_SESSION['SI_CLICODIGO'] = $login['CLICODIGO'];
		$_SESSION['SS_CLIRAZAOSOCIAL'] = $login['CLIRAZAOSOCIAL'];
		$_SESSION['SS_SECURITY'] = '1ODLkhuDE2OE';

		header('location:' . URL_BASE . 'plano-trabalho.php');
	} else {
		header('location:login.php?vMGS=E');
	}
} else {
	return false;
}

//}

function loginApp($documento, $senha)
{
	$sql = "SELECT
					c.CONCODIGO,
					c.CONSENHA,
					c.CONNOME,
					c.CONEMAIL,
					t.CLICODIGO,
					t.CLIRAZAOSOCIAL
				FROM
					CONTATOS c
				LEFT JOIN
					CLIENTES t on
					t.CLICODIGO = c.CLICODIGO
				WHERE
					c.CONSTATUS = 'S' and
					c.CONEMAIL = ? ";
	$dadosBanco = array(
		'query' => $sql,
		'parametros' => array(
			array($documento, PDO::PARAM_STR)
		)
	);
	$list = consultaCompostaSistema($dadosBanco);

	if ($list['quantidadeRegistros'] > 0) {
		$vSSenhaAtual = $list['dados'][0]['CONSENHA'];
		//if ($vSSenhaAtual == $senha) {
		if (1 == 1) {
			//permissões
			fillAcessosSistema($list['dados'][0]['CONCODIGO']);
			unset($list['dados'][0]['CONSENHA']);
			return $list['dados'][0];
		} else {
			return false;
		}
	} else {
		return false;
	}
}

function verificarUsername($username)
{

	$nick = consultaCompostaSistema(array(
		'query' => "SELECT USULOGIN FROM USUARIOS WHERE USULOGIN = ?",
		'parametros' => array(
			array($username, PDO::PARAM_STR)
		)
	));

	if ($nick['quantidadeRegistros'] > 0) {

		return [
			'success' => false,
			'msg'     => 'Este nome de usuário já foi utilizado, favor digitar um novo nome de usuário!'
		];
	}

	return [
		'success' => true,
		'msg' => 'Este nome de usuário está disponível!'
	];
}

function fillAcessosSistema($vIUSUCODIGO)
{
	$sql = "SELECT
						ACETABELA,
						ACECONSULTA,
						ACEINCLUSAO,
						ACEALTERACAO,
						ACEEXCLUSAO,
						ACEEXPORTAR
					FROM
						ACESSOS
					WHERE
						USUCODIGO = ? ";
	$dadosBanco = array(
		'query' => $sql,
		'parametros' => array(
			array($vIUSUCODIGO, PDO::PARAM_INT)
		)
	);
	$list = consultaCompostaSistema($dadosBanco);
	foreach ($list['dados'] as $tabelas) :
		$_SESSION['SA_ACESSOS']['TABELA'][$tabelas['ACETABELA']]['CONSULTA'] = $tabelas['ACECONSULTA'];
		$_SESSION['SA_ACESSOS']['TABELA'][$tabelas['ACETABELA']]['INCLUSAO'] = $tabelas['ACEINCLUSAO'];
		$_SESSION['SA_ACESSOS']['TABELA'][$tabelas['ACETABELA']]['ALTERACAO'] = $tabelas['ACEALTERACAO'];
		$_SESSION['SA_ACESSOS']['TABELA'][$tabelas['ACETABELA']]['EXCLUSAO'] = $tabelas['ACEEXCLUSAO'];
		$_SESSION['SA_ACESSOS']['TABELA'][$tabelas['ACETABELA']]['EXPORTAR'] = $tabelas['ACEEXPORTAR'];
	endforeach;
}
