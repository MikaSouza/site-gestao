<?php
	$arrayUrl = explode('/', $_SERVER['SCRIPT_NAME']);
	if(end($arrayUrl) != 'login.php' && (!isset($_SESSION['SI_USUCODIGO']) || empty($_SESSION['SI_USUCODIGO']))){
		header('location: logout.php');
	}
	unset($arrayUrl);