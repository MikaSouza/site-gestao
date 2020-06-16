<?php
ini_set('memory_limit', '1024M');
try{
	$targ_w = (int) $_POST['w'];
	$targ_h = (int) $_POST['h'];
	$_POST['x'] = (int) $_POST['x'];
	$_POST['y'] = (int) $_POST['y'];
	$jpeg_quality = 90;

	$src = $_POST['imagem'];

	$arrURL = explode('/', $src);
	$qtdDir = count($arrURL);

	$arquivo = end($arrURL);

	array_pop($arrURL);
	
	$diretorio = implode('/', $arrURL);
	$diretorio .= '/thumbnail';

	if(!is_dir($diretorio)){
		mkdir($diretorio, 0755, true);
	}else{
		chmod($diretorio, 0755);
	}

	if(is_dir($diretorio)){
		$arquivoThumb = $diretorio.'/'.$arquivo;
		$formato = strrchr($arquivo, '.');

		if($formato == '.png')
			$img_r = imagecreatefrompng($src);
		else
			$img_r = imagecreatefromjpeg($src);
		$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
		
		imagealphablending($dst_r, false);
		imagesavealpha($dst_r, true);

		imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],$targ_w,$targ_h,$_POST['w'],$_POST['h']);

		if($formato == '.png'){
			imagepng($dst_r, $arquivoThumb);
		}
		else
			imagejpeg($dst_r, $arquivoThumb, $jpeg_quality);

		echo $arquivoThumb.'?timestamp='.date('H:i:s');
	}else{
		throw new Exception("Não foi possível criar o diretório");
	}
}catch(Exception $e){
	echo 'Ocorreu um erro: '.$e->getMessage()."\n";
	return false;
}