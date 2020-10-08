<?php
	/*************************************************
	Arquivo de constantes usadas pelo sistema
	***************************************************/
	session_start();
    header('Content-Type: text/html; charset=utf-8');

    define('db_database', 'teraware');
	define('db_user', 'teraware');
	define('db_pass', '7g7LWEnB');
	define('db_host', 'mysql.teraware.net.br');

	require_once 'funcoes.php';
	require_once 'funcoesBanco.php';
