<?php
	function insertUpdateNewsletters($dados){
		$dadosBanco = array(
				'tabela'  => 'NEWSLETTERS',
				'prefixo' => 'NEW',
				'fields'  => $dados
			);
		return insertUpdate($dadosBanco);
	}

	if(isset($_POST['insertNewsletter'])){
		echo insertUpdateNewsletters($_POST);
	}

	function fillNewsletters($codigo = null){
		if($codigo != null){
			$arrayFill = array(
							'tabela'  => 'NEWSLETTERS',
							'prefixo' => 'NEW',
							'codigo'  => $codigo
						);
			return fillUnico($arrayFill);
		}else{
			return array(
						'NEWCODIGO'   => '',
						'NEWEMAIL'    => ''
					);
		}
	}



	if(isset($_GET['dadosList'])){
		echo listNewsletters($_POST);
	}

	function listNewsletters($dados){
		require_once '../includes/constantes.php';
		$pesquisa = $dados['search']['value'];
		$ordemColunas = array('NEWEMAIL'); //Colocar a ordem das COLUNAS DO BANCO DE DADOS como aparecem na tabela
		$sql = "SELECT
					NEWCODIGO,
					NEWEMAIL
				FROM
					NEWSLETTERS
				WHERE
					NEWEMAIL LIKE ? AND
					NEWSTATUS = 'S'
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
							'DT_RowId' => 'row_'.$value['NEWCODIGO'],
							$value['NEWEMAIL'],
							botoesPadrao('NEWSLETTERS', 'NEW', $value['NEWCODIGO'], 'newsletters')
						));
		}
		return json_encode(array(
								"draw"            => intval($dados['draw']),
								"recordsTotal"    => intval($list['quantidadeRegistros']),
								"recordsFiltered" => countRegistros('NEWSLETTERS', 'NEW'),
								"data"            => $data
							)
				);
	}

	function verificarEmailNewsletters($email){
		if($email != ''){
			$sql = "SELECT
						NEWEMAIL
					FROM
						NEWSLETTERS
					WHERE
						NEWEMAIL LIKE ?
					AND
						NEWSTATUS = 'S' ";

			$arrayQuery = array(
							'query' => $sql,
							'parametros' => array(
								array($email, PDO::PARAM_STR)
							)
						);
			$list = consultaComposta($arrayQuery);
			if($list['quantidadeRegistros'] > 0)
				return true;
			else
				return false;
		}else
			return true;
	}