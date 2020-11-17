<?php
ini_set('display_errors', 0);
$url = $_GET['url'];
$url = checkValues($url);

function checkValues($value){
	$value = trim($value);
	if (get_magic_quotes_gpc()){
		$value = stripslashes($value);
	}
	$value = strtr($value, array_flip(get_html_translation_table(HTML_ENTITIES)));
	$value = strip_tags($value);
	$value = htmlspecialchars($value);
	return $value;
}	

function fetch_record($path){
	$file = fopen($path, "r"); 
	if (!$file){
		exit("Ocorreu algum problema");
	} 
	$data = '';
	while (!feof($file)){
		$data .= fgets($file, 1024);
	}
	return $data;
}

$string = fetch_record($url);


//Titulo
$title_regex = "/<title>(.+)<\/title>/i";
preg_match_all($title_regex, $string, $title, PREG_PATTERN_ORDER);
$url_title = $title[1];

//Meta tags
$tags = get_meta_tags($url);

//Imagens
$image_regex = '/<img[^>]*'.'src=[\"|\'](.*)[\"|\']/Ui';
preg_match_all($image_regex, $string, $img, PREG_PATTERN_ORDER);

$images_array = $img[1];

$k=1;
$arrImagens = array();
for ($i=0;$i<=sizeof($images_array);$i++){
	if($images_array[$i]){
		$urlImage = $images_array[$i];
		if(!filter_var($urlImage, FILTER_VALIDATE_URL)){
			$arr_url = explode('/',$url);

			$ultimoElemento = end($arr_url);

			$ultimo = (!empty($ultimoElemento)) ? $ultimoElemento : $arr_url[count($arr_url)-2];

			preg_match_all("/[.]\w{3,4}/", $ultimo , $resultRegex);

			$isArquivo = (!empty($resultRegex[0])) ? true : false;

			if($isArquivo) array_pop($arr_url);

			$l = 0;
			$arr_imagem = explode('/', $urlImage);
			foreach($arr_imagem as $key => $value){
				if($value == '..' || $value == '.'){
					$l++;
					unset($arr_imagem[$key]);
				}
			}
			$urlImage = implode('/',$arr_imagem);
			if($l > 0){
				$complemento = '';
				for($j=0;$j<$l;$j++) array_pop($arr_url);
			}

			$baseUrl = implode('/', $arr_url);

			if(strpos($baseUrl, -1, 1) != '/') $baseUrl .= '/';

			$imagem = $baseUrl.$urlImage;
		}else 
		$imagem = $urlImage;

		if(!strpos($imagem, '../')){
			if(strpos($imagem, '?')){
				$arr = explode('?', $imagem);
				$imagem = $arr[0];
			}
			if(getimagesize($imagem)){
				list($width, $height, $type, $attr) = getimagesize($imagem);
				if($width >= 50 && $height >= 50 ){
					array_push($arrImagens,"<img src='".$imagem."' id='".$k."' style=\"display:none;\">");
					$k++;
				}
			}
		}
	}
}

$retorno = array(
	'imagens' => $arrImagens,
	'titulo' => $url_title[0],
	'url' => $url,
	'descricao' => $tags['description']
	);
echo json_encode($retorno);
ini_set('display_errors', 1);