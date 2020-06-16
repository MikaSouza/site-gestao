<?php 
	function insertUpdateBanners($dados, $imagens=null){
		$dadosBanco = array(
						'tabela'  => 'BANNERS',
						'prefixo' => 'BAN',
						'fields'  => $dados
					);
		$id = insertUpdate($dadosBanco);
		if(!empty($imagens)){
			$imagem = uploadImagemUnica('banners', $id, $imagens);

			$dadosBanco['fields'] = array();
			$dadosBanco['fields']['vSBANIMAGEM'] = $imagem;
			$dadosBanco['fields']['vSBANCODIGO'] = $id;
			
			$id = insertUpdate($dadosBanco);
		}
		return $id;
	}

	function fillBanners($codigo = null){
		if($codigo != null){
			$arrayFill = array(
							'tabela'  => 'BANNERS',
							'prefixo' => 'BAN',
							'codigo'  => $codigo
						);
			return fillUnico($arrayFill);
		}else{
			return array(
						'BANCODIGO' => '',
						'BANTITULO' => '',
						'BANLINK'   => '',
						'BANIMAGEM' => '',
					);
		}
	}

	if(isset($_GET['dadosList'])){
		echo listBanners($_POST);
	}

	function listBanners($dados){
		require_once '../includes/constantes.php';
		$pesquisa = $dados['search']['value'];
		$ordemColunas = array('BANTIPO', 'BANTITULO', 'BANLINK'); //Colocar a ordem das COLUNAS DO BANCO DE DADOS como aparecem na tabela
		$sql = "SELECT
					BANCODIGO,
					BANTITULO,
					BANLINK,
					BANTIPO
				FROM 
					BANNERS
				WHERE
					(BANTITULO LIKE ? OR
					BANLINK LIKE ?) AND
					BANSTATUS = 'S'
				ORDER BY ";
		$sql .= limitDataTables($ordemColunas, $dados);

		$arrayQuery = array(
						'query' => $sql,
						'parametros' => array(
							array("%$pesquisa%", PDO::PARAM_STR),
							array("%$pesquisa%", PDO::PARAM_STR)
						)
					);
		$list = consultaComposta($arrayQuery);
			
		$data = array();
		foreach ($list['dados'] as $value) {
			array_push($data, array(
							'DT_RowId' => 'row_'.$value['BANCODIGO'],
							($value['BANTIPO'] == 'D') ? 'Desktop' : 'Mobile',
							$value['BANTITULO'],
							$value['BANLINK'],
							botoesPadrao('BANNERS', 'BAN', $value['BANCODIGO'], 'banners')
						));
		}
		return json_encode(array(
								"draw"            => intval($dados['draw']),
								"recordsTotal"    => intval($list['quantidadeRegistros']),
								"recordsFiltered" => countRegistros('BANNERS', 'BAN'),
								"data"            => $data
							)
				);
	}

	function bannersSite($tipo){
		$sql = "SELECT
					BANTITULO,
					BANLINK,
					BANIMAGEM
				FROM 
					BANNERS
				WHERE
					BANSTATUS = 'S' AND
					BANTIPO = ?
				ORDER BY 
				 	BANDATA_INC 
				 		DESC";

		$arrayQuery = array(
						'query' => $sql,
						'parametros' => array(
							array($tipo, PDO::PARAM_STR)
						)
					);
		$list = consultaComposta($arrayQuery);
			
		return $list['dados'];
	}