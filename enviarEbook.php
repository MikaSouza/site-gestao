<?php

require_once 'tw/includes/constantes.php';
require_once 'tw/libs/phpmailer/email.php';

if (verificacaoGoogleRecaptcha($_POST['g-recaptcha-response'])) {

    unset($_POST['g-recaptcha-response']);

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);

    $dadosEmail = array(
        'titulo'        => 'Solicitação de e-book enviada pelo Site!',
        'descricao'     => '',
        'destinatarios' => array(
            'atendimento@teraware.com.br',
            'gestao@gestao.srv.br'
        ),
        'fields' => array(
            'Nome' => $nome,
            'Cidade' => $cidade,
            'Estado' => $estado,
            'E-mail' => $email,
            'Celular' => $celular
        )
    );

    emailField($dadosEmail);

    if ($_POST != '') {
        echo json_encode(array(true, 'Mensagem enviada com sucesso!'));
    } else {
        echo json_encode(array(false, 'Houve um erro ao enviar a mensagem!'));
    }
} else {
    echo json_encode(array(false, 'Houve um erro ao realizar a validação!'));
}