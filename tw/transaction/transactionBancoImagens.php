<?php 
	function insertUpdateBancoImagens($dados, $imagens=null){
		$dadosBanco = array(
						'tabela'  => 'BANCOIMAGENS',
						'prefixo' => 'BAI',
						'fields'  => $dados
					);
		$id = insertUpdate($dadosBanco);
		if(!empty($imagens)){
			$imagem = uploadImagemUnica('bancoImagens', $id, $imagens);

			$dadosBanco['fields'] = array();
			$dadosBanco['fields']['vSBAIIMAGEM'] = $imagem;
			$dadosBanco['fields']['vSBAICODIGO'] = $id;
			
			return insertUpdate($dadosBanco);
		}
		return $id;
	}

	function fillBancoImagens($codigo = null){
		if($codigo != null){
			$arrayFill = array(
							'tabela'  => 'BANCOIMAGENS',
							'prefixo' => 'BAI',
							'codigo'  => $codigo
						);
			return fillUnico($arrayFill);
		}else{
			return array(
						'BAICODIGO' => '',
						'BAITITULO' => '',
						'BAIIMAGEM' => '',
					);
		}
	}

	if(isset($_GET['dadosList'])){
		echo listBancoImagens($_POST);
	}

	function listBancoImagens($dados){
		require_once '../includes/constantes.php';
		$pesquisa = $dados['search']['value'];
		$ordemColunas = array('BAITITULO'); //Colocar a ordem das COLUNAS DO BAICO DE DADOS como aparecem na tabela
		$sql = "SELECT
					BAICODIGO,
					BAITITULO,
					BAIIMAGEM
				FROM 
					BANCOIMAGENS
				WHERE
					BAITITULO LIKE ? AND
					BAISTATUS = 'S'
				ORDER BY ";
		$sql .= limitDataTables($ordemColunas, $dados);

		$arrayQuery = array(
						'query' => $sql,
						'parametros' => array(
							array("%$pesquisa%", PDO::PARAM_STR)
						)
					);
		$list = consultaComposta($arrayQuery);
			
		$data = array();
		foreach ($list['dados'] as $value) {
			array_push($data, array(
							'DT_RowId' => 'row_'.$value['BAICODIGO'],
							$value['BAITITULO'],
							"<div class=\"text-center\">
								<button class=\"btn btn-danger\" onClick=\"deletarRegistro('BANCOIMAGENS', 'BAI', {$value[BAICODIGO]});\"><i class=\"fa fa-trash\"></i> Del</button>
								<button class=\"btn btn-system\" onClick=\"copyClipboard('".cSUrlSiteEmpresa."admin/uploads/bancoImagens/{$value[BAIIMAGEM]}');\"><i class=\"fa fa-copy\"></i> Copy</button>
							</div>"
						));
		}
		return json_encode(array(
								"draw"            => intval($dados['draw']),
								"recordsTotal"    => intval($list['quantidadeRegistros']),
								"recordsFiltered" => countRegistros('BANCOIMAGENS', 'BAI'),
								"data"            => $data
							)
				);
	}