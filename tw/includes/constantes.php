<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8');

	define('db_database', 'tweduc02');
	define('db_user', 'tweduc02');
	define('db_pass', '9JG2cElu');
	define('db_host', 'mysql.tweduc.com.br');

	define('cSNomeEmpresa', 'TWEduc Ltda');
	define('cSUrlSiteEmpresa', 'http://sites-gestao-srv.teraware.net.br/');
	define('cSSegmentoAtendimento', 'TWEduc Ltda');
	define('cSTelefone1', '+55 (51) 3061 2550');
	define('cSTelefone2', '+55 (51) 3061 1315');
	define('cSTelefone3', '');
	define('cSEncriptacao', 'gestaoGT');
	define('cSSiteEmpresa', 'sites-gestao-srv.teraware.net.br/');

	define('cSLogoMarca', 'logotipo.png');

	require_once 'funcoes.php';
	require_once 'funcoesBanco.php';
