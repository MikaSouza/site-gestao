<?php
	require_once 'includes/constantes.php';
	if(!isset($_SESSION['SI_USUCODIGO']) || empty($_SESSION['SI_USUCODIGO'])){
		header('location: interface/login.php');
	}else{
		header('location: interface/admin.php');
	}