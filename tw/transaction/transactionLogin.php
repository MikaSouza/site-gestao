<?php
include_once __DIR__.'/../includes/constantes.php';

if($_POST['vSLoginRecuperar'] && $_POST['vSLoginRecuperar'] != ''){

	$result = verificarUsername($_POST['vSLoginRecuperar']);

	if($result['success'] == 1){
		header('location:recuperar-login.php?vMGS=E');
	 }else{
		// mandar email
	 }
}

//if(verificacaoGoogleRecaptcha($_POST['g-recaptcha-response'])){
	unset($_POST['g-recaptcha-response']);
	$email = filter_var($_POST["vSUsuario"], FILTER_SANITIZE_EMAIL);

	if ((verificarVazio($email)) && (verificarVazio($_POST["vSSenha"]))) {
		$senha	    = $_POST['vSSenha'];
		$login = loginApp($email, $senha);
		if($login['USUCODIGO'] !== false && is_numeric($login['USUCODIGO'])){
			$_SESSION['SI_USUCODIGO'] = $login['USUCODIGO'];
			$_SESSION['SS_USUNOME'] = $login['USUNOME'];
			$_SESSION['SS_USUSETOR'] = $login['SETOR'];
			$_SESSION['SS_SECURITY'] = '1ODLkhuDE2OE';
			if ($login['USUCODIGO'] == 1)
				$_SESSION['SS_USUMASTER'] = 'S';
			else
				$_SESSION['SS_USUMASTER'] = 'N';
			$_SESSION['SS_USUFOTO'] = $login['USUFOTO'];

			include_once __DIR__.'/transactionLogsAcessos.php';
			$dadosBanco = array(
				'vILUACODIGO'  => '',
				'vSLUAIP' => $_SERVER["REMOTE_ADDR"],
				'vIEMPCODIGO'  => 2
				);
			insertUpdateLogsAcessos($dadosBanco, 'N');

			header('location:'. URL_BASE .'plano-trabalho.php');
		}else{
			header('location:login.php?vMGS=E');
		}
	}else{
		return false;
	}

//}

function loginApp($documento, $senha)
{
	$sql = "SELECT
				u.USUSENHA,
				u.USUNOME,
				u.USUEMAIL,
				u.USUCODIGO,
				u.USULOGIN,
				t.TABDESCRICAO AS SETOR,
				u.USUFOTO
			FROM
				USUARIOS u
			LEFT JOIN TABELAS t ON t.TABCODIGO = u.TABDEPARTAMENTO
			WHERE
				u.USUSTATUS = 'S' and
				u.USUEMAIL = ? ";
	$dadosBanco = array(
						'query' => $sql,
						'parametros' => array(
							array($documento, PDO::PARAM_STR)
						)
					);
	$list = consultaCompostaSistema($dadosBanco);

	if($list['quantidadeRegistros'] > 0){
		$vSSenhaAtual = Desencriptar($list['dados'][0]['USUSENHA'], cSPalavraChave);
		if($vSSenhaAtual == $senha){
			//permissões
			fillAcessosSistema($list['dados'][0]['USUCODIGO']);
			unset($list['dados'][0]['USUSENHA']);
			return $list['dados'][0];
		}else{
			return false;
		}
	}else{
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
	foreach ($list['dados'] as $tabelas):
		$_SESSION['SA_ACESSOS']['TABELA'][$tabelas['ACETABELA']]['CONSULTA'] = $tabelas['ACECONSULTA'];
		$_SESSION['SA_ACESSOS']['TABELA'][$tabelas['ACETABELA']]['INCLUSAO'] = $tabelas['ACEINCLUSAO'];
		$_SESSION['SA_ACESSOS']['TABELA'][$tabelas['ACETABELA']]['ALTERACAO'] = $tabelas['ACEALTERACAO'];
		$_SESSION['SA_ACESSOS']['TABELA'][$tabelas['ACETABELA']]['EXCLUSAO'] = $tabelas['ACEEXCLUSAO'];
		$_SESSION['SA_ACESSOS']['TABELA'][$tabelas['ACETABELA']]['EXPORTAR'] = $tabelas['ACEEXPORTAR'];
	endforeach;
}
