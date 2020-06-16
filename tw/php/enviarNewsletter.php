<?php
	require_once('../includes/constantes.php');
    require_once('../transaction/transactionNewsletters.php');

	$result = array();
	$dados  = array();

	$dados['vSNEWEMAIL'] = filter_input(INPUT_POST, 'vSNEWEMAIL', FILTER_VALIDATE_EMAIL);

    if(!verificarEmailNewsletters($dados['vSNEWEMAIL'])){
        $id = insertUpdateNewsletters($dados);

        $result['statusInsercao'] = ($id > 0) ? true : false;
        $result['mensagem'] = ($id > 0) ? 'E-mail cadastrado com sucesso!' : 'E-mail não cadastrado!';
    }else{
        $result['statusInsercao'] = false;
        $result['mensagem'] = 'E-mail já cadastrado!';

    }

    echo json_encode($result);
?>
