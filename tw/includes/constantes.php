<?php
/*************************************************
    Arquivo de constantes usadas pelo sistema
 ***************************************************/
session_start();
header('Content-Type: text/html; charset=utf-8');


// define("vGUsername", "twflex14");
// define("vGPassword", "7g7LWEnB");
// define("vGBancoSite", "twflex14");
// define("vGHostSite", "mysql08-farm2.uni5.net");

// define('db_database', 'teraware16');
// define('db_user', 'teraware16');
// define('db_pass', 'j8hl3fyx');
// define('db_host', 'mysql.teraware.net.br');

//banco do Site
define('db_database', 'gestao_teraware');
define('db_user', 'gestao_teraware');
define('db_pass', 'Mv7{i[&hQl@~');
define('db_host', 'localhost');

//Banco do Sistema
define("vGUsername", "twflex14");
define("vGPassword", "7g7LWEnB");
define("vGBancoSite", "twflex14");
define("vGHostSite", "mysql08-farm2.uni5.net");

//URL base
define("URL_BASE", 'https://gestao.srv.br/');

//Palavra Chave
define("cSPalavraChave", "TWFlex");

define('cSNomeEmpresa', 'Gestão Ltda');
define('cSUrlSiteEmpresa', 'https://gestao.srv.br/');
define('cSSegmentoAtendimento', 'Atendimento a Empresas');
define('cSTelefone1', '(51) 3541-3355');
define('cSTelefone2', '(51) 98443-2097');
define('cSTelefone3', '');
define('cSEncriptacao', 'gestaoltda');
define('cSSiteEmpresa', 'https://gestao.srv.br/');

define('cSLogoMarca', 'logotipo.jpg');

require_once 'funcoes.php';
require_once 'funcoesBanco.php';