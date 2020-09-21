<?php

require_once 'tw/includes/constantes.php';
require_once 'tw/transaction/transactionFormulario.php';
require_once 'tw/libs/phpmailer/email.php';

if (verificacaoGoogleRecaptcha($_POST['g-recaptcha-response'])) {

    unset($_POST['g-recaptcha-response']);

    $id = insertUpdateFormulario($_POST, $_FILES);

    $nomedoente = filter_input(INPUT_POST, 'vSFORNOMEDOENTE', FILTER_SANITIZE_STRING);
    $numhabmunicipio = filter_input(INPUT_POST, 'vSFORNUMHABMUNICIPIO', FILTER_SANITIZE_STRING);
    $valorcanual = filter_input(INPUT_POST, 'vMFORVALORCANUAL', FILTER_SANITIZE_STRING);
    $numservidores = filter_input(INPUT_POST, 'vSFORNUMSERVIDORES', FILTER_SANITIZE_STRING);
    $desclei = filter_input(INPUT_POST, 'vSFORDESCLEI', FILTER_SANITIZE_STRING);
    $posreginterno = filter_input(INPUT_POST, 'vSFORPOSREGINTERNO', FILTER_SANITIZE_STRING);
    $descreginterno = filter_input(INPUT_POST, 'vSFORDESCREGINTERNO', FILTER_SANITIZE_STRING);
    $cargorespint = filter_input(INPUT_POST, 'vSFORCARGORESPINT', FILTER_SANITIZE_STRING);
    $nomerespint = filter_input(INPUT_POST, 'vSFORNOMERESPINT', FILTER_SANITIZE_STRING);
    $formrespint = filter_input(INPUT_POST, 'vSFORFORMRESPINT', FILTER_SANITIZE_STRING);
    $suprespint = filter_input(INPUT_POST, 'vSFORSUPRESPINT', FILTER_SANITIZE_STRING);
    $tempexprespint = filter_input(INPUT_POST, 'vSFORTEMPEXPRESPINT', FILTER_SANITIZE_STRING);
    $dedexcrespint = filter_input(INPUT_POST, 'vSFORDEDEXCRESPINT', FILTER_SANITIZE_STRING);
    $cargomunrespint = filter_input(INPUT_POST, 'vSFORCARGOMUNRESPINT', FILTER_SANITIZE_STRING);
    $sercarrrespiint = filter_input(INPUT_POST, 'vSFORSERCARRRESPINT', FILTER_SANITIZE_STRING);
    $estprobrespint = filter_input(INPUT_POST, 'vSFORESTPROBRESPINT', FILTER_SANITIZE_STRING);
    $reacurrespint = filter_input(INPUT_POST, 'vSFORREACURRESPINT', FILTER_SANITIZE_STRING);
    $nomemembint = filter_input(INPUT_POST, 'vSFORNOMEMEMBINT', FILTER_SANITIZE_STRING);
    $formembint = filter_input(INPUT_POST, 'vSFORFORMEMBINT', FILTER_SANITIZE_STRING);
    $supmembint = filter_input(INPUT_POST, 'vSFORSUPMEMBINT', FILTER_SANITIZE_STRING);
    $tempexpmembint = filter_input(INPUT_POST, 'vSFORTEMPEXPMEMBINT', FILTER_SANITIZE_STRING);
    $dedexcmembint = filter_input(INPUT_POST, 'vSFORDEDEXCMEMBINT', FILTER_SANITIZE_STRING);
    $cargomunmembint = filter_input(INPUT_POST, 'vSFORCARGOMUNMEMBINT', FILTER_SANITIZE_STRING);
    $sercarrmembint = filter_input(INPUT_POST, 'vSFORSERCARRMEMBINT', FILTER_SANITIZE_STRING);
    $estprobmembint = filter_input(INPUT_POST, 'vSFORESTPROBMEMBINT', FILTER_SANITIZE_STRING);
    $reacurmembint = filter_input(INPUT_POST, 'vSFORREACURMEMBINT', FILTER_SANITIZE_STRING);
    $possplauniint = filter_input(INPUT_POST, 'vSFORPOSSPLAUNIINT', FILTER_SANITIZE_STRING);
    $proauduniint = filter_input(INPUT_POST, 'vSFORPROAUDUNIINT', FILTER_SANITIZE_STRING);
    $descresuniint = filter_input(INPUT_POST, 'vSFORDESCRESUNIINT', FILTER_SANITIZE_STRING);
    $verconmuniint = filter_input(INPUT_POST, 'vSFORVERCONMUNIINT', FILTER_SANITIZE_STRING);
    $descverconuniint = filter_input(INPUT_POST, 'vSFORDESCVERCONUNIINT', FILTER_SANITIZE_STRING);
    $audemirel = filter_input(INPUT_POST, 'vSFORAUDEMIREL', FILTER_SANITIZE_STRING);
    $audquantemirel = filter_input(INPUT_POST, 'vSFORAUDQUANTEMIREL', FILTER_SANITIZE_STRING);
    $veremirel = filter_input(INPUT_POST, 'vSFORVEREMIREL', FILTER_SANITIZE_STRING);
    $verquantemirel = filter_input(INPUT_POST, 'vSFORVERQUANTEMIREL', FILTER_SANITIZE_STRING);
    $acomemirel = filter_input(INPUT_POST, 'vSFORACOMEMIREL', FILTER_SANITIZE_STRING);
    $acomquantemirel = filter_input(INPUT_POST, 'vSFORACOMQUANTEMIREL', FILTER_SANITIZE_STRING);
    $enviorelquem = filter_input(INPUT_POST, 'vSFORENVIORELQUEM', FILTER_SANITIZE_STRING);
    $responrelat = filter_input(INPUT_POST, 'vSFORRESPONRELAT', FILTER_SANITIZE_STRING);
    $entrerelat = filter_input(INPUT_POST, 'vSFORENTRERELAT', FILTER_SANITIZE_STRING);
    $emissaoint = filter_input(INPUT_POST, 'vSFOREMISSAOINT', FILTER_SANITIZE_STRING);
    $atoadmnorm = filter_input(INPUT_POST, 'vSFORATOADMNORM', FILTER_SANITIZE_STRING);
    $uniintregata = filter_input(INPUT_POST, 'vSFORUNIINTREGATA', FILTER_SANITIZE_STRING);
    $tipouniintregata = filter_input(INPUT_POST, 'vSFORTIPOUNIINTREGATA', FILTER_SANITIZE_STRING);
    $uniintreuniao = filter_input(INPUT_POST, 'vSFORUNIINTREUNIAO', FILTER_SANITIZE_STRING);
    $freqreuniaouniint = filter_input(INPUT_POST, 'vSFORFREQREUNIAOUNIINT', FILTER_SANITIZE_STRING);
    $atuaauxuniint = filter_input(INPUT_POST, 'vSFORATUAAUXUNIINT', FILTER_SANITIZE_STRING);
    $ferramentasint = filter_input(INPUT_POST, 'vSFORFERRAMENTASINT', FILTER_SANITIZE_STRING);

    $dadosEmail = array(
        'titulo'        => 'Uma solicitação de contato enviada por | ' . cSNomeEmpresa,
        'descricao'     => '',
        'destinatarios' => array(
            'ADMIN'
        ),
        'fields' => array(
            'Nome do Ente' => $nomedoente,
            'Número de habitantes do município' => $numhabmunicipio,
            'Valor do orçamento anual' => $valorcanual,
            'Número de servidores (inclui agentes políticos e ccs)' => $numservidores,
            'Descrever a Lei que instituiu o Sistema de Controle Interno e suas alterações, anexando cópia' => $desclei,
            'A Unidade de Controle Interno possui Regimento Interno' => $posreginterno,
            'Se sim, descrever o número, ato legal, e anexar uma cópia' => $descreginterno,
            'O responsável pelo Sistema de Controle Interno ocupa o cargo de' => $cargorespint,
            'Nome do Responsável' => $formrespint,
            'Superior' => $suprespint,
            'Tempo de Experiência no Controle Interno' => $tempexprespint,
            'Tem dedicação exclusiva no Controle Interno' => $dedexcrespint,
            'Qual cargo que ocupa no Município?' => $cargomunrespint,
            'É servidor de Carreira' => $sercarrrespiint,
            'Está em estágio probatório' => $estprobrespint,
            'Realizou algum curso de atualização..' => $reacurrespint,
            'Nome do Membro' => $nomemembint,
            'Formação' => $formembint,
            'Superior' => $supmembint,
            'Tempo de Experiência no Controle Interno' => $tempexpmembint,
            'Tem dedicação exclusiva no Controle Interno' => $dedexcmembint,
            'Tem dedicação exclusiva no Controle Interno' => $dedexcmembint,
            'Qual cargo que ocupa no Município' => $cargomunmembint,
            'É servidor de Carreira' => $sercarrmembint,
            'Está em estágio probatório' => $estprobmembint,
            'Realizou algum curso de atualização..' => $reacurmembint,
            'A Unidade de Controle Interno possui um planejamento/programa..' => $possplauniint,
            'Procedimentos de Auditoria' => $proauduniint,
            'Descrever o resumo das auditorias realizadas nos últimos 06 meses' => $descresuniint,
            'Verificações, Controles e Acompanhamentos' => $verconmuniint,
            'Descrever as espécies de verificações..' => $descverconuniint,
            'Auditoria' => $audemirel,
            'Nos últimos 06 meses, quantos foram emitidos' => $audquantemirel,
            'Verificação' => $veremirel,
            'Nos últimos 06 meses, quantos foram emitidos' => $verquantemirel,
            'Acompanhamento' => $acomemirel,
            'Nos últimos 06 meses, quantos foram emitidos' => $acomquantemirel,
            'O envio dos relatórios emitidos é realizado/direcionado para quem' => $enviorelquem,
            'Os responsáveis pelo recebimento dos relatórios emitidos..' => $responrelat,
            'Os relatórios ou outros atos produzidos pela Unidade..' => $entrerelat,
            'A Unidade de Controle Interno emite Normas Internas Operacionais..' => $emissaoint,
            'Se a resposta foi sim, qual ato administrativo foi usado..' => $atoadmnorm,
            'A Unidade de Controle Interno costuma registrar atividades em atas' => $uniintregata,
            'Se a resposta é sim, quais tipos de atividades' => $tipouniintregata,
            'A Unidade de Controle Interno costuma participar de reuniões setoriais' => $uniintreuniao,
            'Tente explicar um pouco sobre a frequência..' => $freqreuniaouniint,
            'A Unidade de Controle Interno atua como auxiliar..' => $atuaauxuniint,
            'Que ferramentas são utilizadas para interação com o TCE?..' => $ferramentasint
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
