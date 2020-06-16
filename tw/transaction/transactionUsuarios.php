<?php 
	function insertUpdateUsuarios($dados){
		$dados['vSUSUSENHA'] = Encriptar($dados['vSUSUSENHA'], cSEncriptacao);
		unset($dados['vSUSUCONFIRMARSENHA']);
		$dadosBanco = array(
						'tabela'  => 'USUARIOS',
						'prefixo' => 'USU',
						'fields'  => $dados
					);
		return insertUpdate($dadosBanco);
	}

	function fillUsuarios($codigo = null){
		if($codigo != null){
			$arrayFill = array(
							'tabela'  => 'USUARIOS',
							'prefixo' => 'USU',
							'codigo'  => $codigo
						);
			$resultFill = fillUnico($arrayFill);
			$resultFill['USUSENHA'] = Desencriptar($resultFill['USUSENHA'], cSEncriptacao);
			return $resultFill;
		}else{
			return array(
						'USUUSUARIO' => '',
						'USUSENHA'   => '',
						'USUCODIGO'  => ''
					);
		}
	}

	if(isset($_GET['dadosList'])){
		echo listUsuarios($_POST);
	}

	function listUsuarios($dados){
		require_once '../includes/constantes.php';
		$pesquisa = $dados['search']['value'];
		$ordemColunas = array('USUUSUARIO'); //Colocar a ordem das COLUNAS DO BANCO DE DADOS como aparecem na tabela
		$sql = "SELECT
					USUCODIGO,
					USUUSUARIO
				FROM 
					USUARIOS
				WHERE
					USUUSUARIO LIKE ? AND
					USUSTATUS = 'S'
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
							'DT_RowId' => 'row_'.$value['USUCODIGO'],
							$value['USUUSUARIO'],
							botoesPadrao('USUARIOS', 'USU', $value['USUCODIGO'], 'usuarios')
						));
		}
		return json_encode(array(
								"draw"            => intval($dados['draw']),
								"recordsTotal"    => intval($list['quantidadeRegistros']),
								"recordsFiltered" => countRegistros('USUARIOS', 'USU'),
								"data"            => $data
							)
				);
	}

	function logar($dados){
		$sql = "SELECT
					USUCODIGO,
					USUUSUARIO,
					USUSENHA
				FROM
					USUARIOS
				WHERE
					USUUSUARIO = ? AND
					USUSTATUS = 'S'";
		$arrayQuery = array(
						'query' => $sql,
						'parametros' => array(
							array($dados['vSUSUUSUARIO'], PDO::PARAM_STR)
						)
					);
		$list = consultaComposta($arrayQuery);
		if($list['quantidadeRegistros'] > 0){
			if(Desencriptar($list['dados'][0]['USUSENHA'], cSEncriptacao) == $dados['vSUSUSENHA']){
				$_SESSION['SI_USUCODIGO'] = $list['dados'][0]['USUCODIGO'];
				$_SESSION['SI_USUUSUARIO'] = $list['dados'][0]['USUUSUARIO'];
				return true;
			}
		}
		return false;
	}