<?php

$url        = $_GET['url'];
$url        = rtrim($url, '/');
$parametros = explode('/', $url);
$arquivo    = $parametros[0];

if($arquivo != ''){

	if ($arquivo == 'noticias' && !empty($parametros[1])) {
		require_once 'noticias.php';
	} elseif($arquivo == 'blog' && !empty($parametros[1])){
		require_once 'noticia-detalhe.php';
	}
	elseif(is_file($arquivo.'.php')){
		require_once $arquivo.'.php';
	} else{
		require_once 'index.php';
	}

} else {
	require_once 'index.php';
}