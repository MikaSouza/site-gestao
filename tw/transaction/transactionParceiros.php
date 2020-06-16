<?php 
	function insertUpdateParceiros($dados, $imagens=null){
		$dadosBanco = array(
						'tabela'  => 'PARCEIROS',
						'prefixo' => 'PAR',
						'fields'  => $dados
					);
		$id = insertUpdate($dadosBanco);
		if(!empty($imagens)){
			$imagem = uploadImagemUnica('parceiros', $id, $imagens, true);

			$dadosBanco['fields'] = array();
			$dadosBanco['fields']['vSPARIMAGEM'] = $imagem;
			$dadosBanco['fields']['vSPARCODIGO'] = $id;
			
			return insertUpdate($dadosBanco);
		}
		return $id;
	}

	function fillParceiros($codigo = null){
		if($codigo != null){
			$arrayFill = array(
							'tabela'  => 'PARCEIROS',
							'prefixo' => 'PAR',
							'codigo'  => $codigo
						);
			return fillUnico($arrayFill);
		}else{
			return array(
						'PARCODIGO'  => '',
						'PARCLIENTE' => '',
						'PARIMAGEM'  => ''
					);
		}
	}

	if(isset($_GET['dadosList'])){
		echo listParceiros($_POST);
	}

	function listParceiros($dados){
		require_once '../includes/constantes.php';
		$pesquisa = $dados['search']['value'];
		$ordemColunas = array('PARCLIENTE'); //Colocar a ordem das COLUNAS DO BANCO DE DADOS como aparecem na tabela
		$sql = "SELECT
					PARCODIGO,
					PARCLIENTE
				FROM 
					PARCEIROS
				WHERE
					PARCLIENTE LIKE ? AND
					PARSTATUS = 'S'
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
							'DT_RowId' => 'row_'.$value['PARCODIGO'],
							$value['PARCLIENTE'],
							botoesPadrao('PARCEIROS', 'PAR', $value['PARCODIGO'], 'parceiros')
						));
		}
		return json_encode(array(
								"draw"            => intval($dados['draw']),
								"recordsTotal"    => intval($list['quantidadeRegistros']),
								"recordsFiltered" => countRegistros('PARCEIROS', 'PAR'),
								"data"            => $data
							)
				);
	}

	function gridParceiros(){
		$sql = "SELECT
					PARCLIENTE,
					PARIMAGEM
				FROM 
					PARCEIROS
				WHERE
					PARSTATUS = 'S'";

		$arrayQuery = array(
						'query' => $sql,
						'parametros' => array()
					);
		$list = consultaComposta($arrayQuery);
		return $list['dados'];
	}