<?php
require_once '../includes/constantes.php';
require_once '../includes/autenticacao.php';
if (!isset($titlePage)) $titlePage = '';
else $titlePage = ' | ' . $titlePage;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= cSNomeEmpresa . $titlePage ?></title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<?php require_once 'scriptsHeader.php'; ?>
</head>

<body>
	<?php
	require_once '../includes/gerenciador.php';
	require_once 'navbar.php';
	?>