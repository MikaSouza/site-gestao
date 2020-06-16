<?php
	require_once 'constantes.php';
	if(!empty($_POST['tabela']) && !empty($_POST['prefixo']) && !empty($_POST['codigo'])){
		echo json_encode(deletarRegistro($_POST));
	}