<?php 
	function insertUpdateConfig($dados){
		$dadosBanco = array(
						'tabela'  => 'CONFIGURACOES',
						'prefixo' => 'CFG',
						'fields'  => $dados
					);
		return insertUpdate($dadosBanco);
	}

	function fillConfig($codigo = null){
		if($codigo != null){
			$arrayFill = array(
							'tabela'  => 'CONFIGURACOES',
							'prefixo' => 'CFG',
							'codigo'  => 1
						);
			return fillUnico($arrayFill);
		}else{
			return array(
						'CFGHOST'               => '',
						'CFGEMAILENVIO'         => '',
						'CFGSENHAEMAIL'         => '',
						'CFGEMAILRECEBIMENTO'   => '',
						'CFGPORT'              => '',
						'CFGCRIPTOGRAFIA'       => '',
						'CFGRECAPTCHASITEKEY'   => '',
						'CFGRECAPTCHASECRETKEY' => '',
						'CFGGOOGLEMAPSKEY'      => '',
						'CFGCODIGO'             => 1
					);
		}
	}

	function dadosEmail(){
		$sql = "SELECT
					CFGHOST
					CFGEMAILENVIO
					CFGSENHAEMAIL
					CFGEMAILRECEBIMENTO
					CFGPORT
					CFGCRIPTOGRAFIA
				FROM
					CONFIGURACOES
				WHERE
					CFGCODIGO = 1";
		$list = consultaComposta(array(
			'query' => $sql
		));

		return $list['dados'][0];
	}