<?php

$url        = $_GET['url'];
$url        = rtrim($url, '/');
$parametros = explode('/', $url);
$arquivo    = $parametros[0];

if($arquivo != ''){

	if ($arquivo == 'blog' && !empty($parametros[1])) {
		require_once 'blog.php';
	} elseif($arquivo == 'blog-detalhe' && !empty($parametros[1])){
		require_once 'blog-detalhe.php';
	}
	elseif(is_file($arquivo.'.php')){
		require_once $arquivo.'.php';
	} else{
		require_once 'index.php';
	}

} else {
	require_once 'index.php';
}