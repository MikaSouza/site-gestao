<?php
	/*************************************************
	Arquivo de constantes usadas pelo sistema
	***************************************************/
	session_start();
	header('Content-Type: text/html; charset=utf-8');

	define('db_database', 'teraware01');
	define('db_user', 'teraware01');
	define('db_pass', '0bZDmKcgWA');
	define('db_host', 'mysql.teraware.net.br');

	define('cSNomeEmpresa', 'Gestão LTDA');
	define('cSUrlSiteEmpresa', 'http://sites-gestao-srv.teraware.net.br/');
	define('cSSegmentoAtendimento', 'Atendimento a Empresas');
	define('cSTelefone1', '(51) 3541-3355');
	define('cSTelefone2', '(51) 98443-2097');
	define('cSTelefone3', '');
	define('cSEncriptacao', 'gestaoltda');
	define('cSSiteEmpresa', 'sites-gestao-srv.teraware.net.br');

	define('cSLogoMarca', 'logotipo.jpg');

	require_once 'funcoes.php';
	require_once 'funcoesBanco.php';
