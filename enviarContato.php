<?php

require_once 'tw/includes/constantes.php';
require_once 'tw/transaction/transactionContatos.php';
require_once 'tw/libs/phpmailer/email.php';

if (verificacaoGoogleRecaptcha($_POST['g-recaptcha-response'])) {

    unset($_POST['g-recaptcha-response']);

    $nome = filter_input(INPUT_POST, 'vSCONNOME', FILTER_SANITIZE_STRING);
    $telefone = filter_input(INPUT_POST, 'vSCONTELEFONE', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'vSCONEMAIL', FILTER_SANITIZE_EMAIL);
    $mensagem = filter_input(INPUT_POST, 'vSCONMENSAGEM', FILTER_SANITIZE_STRING);

    $id = insertUpdateContatos($_POST);

    $dadosEmail = array(
        'titulo'        => 'Uma solicitação de contato enviada por | ' . cSNomeEmpresa,
        'descricao'     => '',
        'destinatarios' => array(
            'ADMIN'
        ),
        'fields' => array(
            'Nome' => $nome,
            'Telefone' => $telefone,
            'E-mail' => $email,
            'Mensagem' => nl2br($mensagem)
        )
    );

    emailField($dadosEmail);

    if ($id > 0) {
        echo json_encode(array(true, 'Mensagem enviada com sucesso!'));
    } else {
        echo json_encode(array(false, 'Houve um erro ao enviar a mensagem!'));
    }
} else {
    echo json_encode(array(false, 'Houve um erro ao realizar a validação!'));
}
