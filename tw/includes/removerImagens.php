<?php
require_once '../includes/constantes.php';
try{
	$arquivo     = $_POST['arquivo'];
	$codigo      = $_POST['codigo'];
	$tabela      = $_POST['tabela'];
	$prefixo     = $_POST['prefixo'];
	$fieldImagem = $_POST['fieldImagem'];

	$arrArq = explode('/', $arquivo);
	$file = end($arrArq);
	array_pop($arrArq);
	$diretorio = implode('/', $arrArq);

	if(file_exists($diretorio.'/'.$file)){
		if(unlink($diretorio.'/'.$file)){
			$retorno[] = true;
			if(file_exists($diretorio.'/thumbnail/'.$file)){
				unlink($diretorio.'/thumbnail/'.$file);
			}
		}else{
			throw new Exception("Não foi possível remover a imagem");
		}
	}else{
		throw new Exception("Arquivo não encontrado ({$diretorio}/{$file})");
	}

	if($retorno[0] && !empty($fieldImagem)){
		$deletar = deletarImagem(array(
						'tabela' => $tabela,
						'fieldImagem' => $fieldImagem,
						'prefixo' => $prefixo,
						'codigo' => $codigo,
					));
		echo ($deletar) ? json_encode(true) : json_decode(false);
	}else{
		echo ($retorno[0]) ? json_encode(true) : json_encode(false);
	}
}catch(Exception $e){
	echo 'Ocorreu um erro: '.$e->getMessage()."\n";
	return json_encode(false);
}