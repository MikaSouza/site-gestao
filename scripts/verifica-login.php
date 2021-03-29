<?php
session_start();
require_once 'dbconfig.php';

if (isset($_POST['vSUsuario']) && isset($_POST['vSSenha'])) {
    $email = filter_input(INPUT_POST, 'vSUsuario', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['vSSenha'];

    try {
        $stmt = $db_con->prepare("SELECT c.CONCODIGO, c.CONSENHA, c.CONNOME, c.CONEMAIL, c.CONFONE,
				t.CLICODIGO, t.CLIRAZAOSOCIAL FROM CONTATOS c LEFT JOIN CLIENTES t on t.CLICODIGO = c.CLICODIGO
				WHERE c.CONSTATUS = 'S' AND c.CONEMAIL =:email");

        $stmt->execute(array(":email"=>$email));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();

        // if ((int) verificarContratoExpirado($row['CLICODIGO']) > 0) {
        //     echo json_encode(['success' => false, 'message' => 'O seu período de testes expirou contate a Administração!']);
        // }

        if ($row['CONSENHA'] == $senha) {
            $_SESSION['SI_CONCODIGO'] = $row['CONCODIGO'];
            $_SESSION['SS_CONNOME'] = $row['CONNOME'];
            $_SESSION['SS_CONEMAIL'] = $row['CONEMAIL'];
            $_SESSION['SS_CONFONE'] = $row['CONFONE'];
            $_SESSION['SI_CLICODIGO'] = $row['CLICODIGO'];
            $_SESSION['SS_CLIRAZAOSOCIAL'] = $row['CLIRAZAOSOCIAL'];
            $_SESSION['SS_SECURITY'] = '1ODLkhuDE2OE';

            echo json_encode(['success' => true, 'message' => 'Autenticação efetuada com sucesso!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Os dados estão incorretos, favor verificar!']);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Não foi possível autenticar!']);
    }
}

function verificarContratoExpirado($clicodigo)
{
    try {
        $stmt = $db_con->prepare("SELECT CTRCODIGO FROM CONTRATOS WHERE PXSCODIGO = 12 AND CTRSTATUS = 'S'
                    AND CLICODIGO =:clicodigo AND CTRDATATERMINO <= CURRENT_DATE");
        $stmt->execute(array(":clicodigo" => $clicodigo));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();

        return $count;
    } catch (PDOException $e) {
        // echo $e->getMessage();
    }
}