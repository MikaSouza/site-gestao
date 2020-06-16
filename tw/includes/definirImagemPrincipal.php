<?php
require_once '../includes/constantes.php';
try{
	$dadosBanco = array(
						'tabela'  => $_POST['tabela'],
						'prefixo' => $_POST['prefixo'],
						'fields'  => array(
							'vI'.$_POST['prefixo'].'CODIGO' => $_POST['codigo'],
							'vS'.$_POST['fieldImagem'] => $_POST['imagem']
						)
					);
	$id = insertUpdate($dadosBanco);
	if($id > 0){
		echo json_encode(true);
	}

}catch(Exception $e){
	echo json_encode(false);
}