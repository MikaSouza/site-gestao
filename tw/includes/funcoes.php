<?php
	/*************************************************
		Arquivo de funções gerais usadas pelo sistema
		***************************************************/

		/**************  Funções relacionadas a formatar dados  ****************/

	/*************************************************
		Data: 22/10/2009 - Pedro Godinho
		Formatar data e hora do banco no formato brasileiro
		$pData: parâmetro data do banco
		***************************************************/
		function formatar_data_hora($pData){
			if(empty($pData) or $pData=="//") return "";
			$data = substr($pData,0,10);

			$datatrans = explode ("-", $data);
			return "$datatrans[2]/$datatrans[1]/$datatrans[0] ".substr($pData,10,6);
		}

    //Adiciona dias, meses ou anos em uma data, retorna a nova data
		function addDiaMesAnoData($data, $dias = 0, $meses = 0, $anos = 0) {
			$newDate = explode("/", $data);
			$dia = $newDate[0];
			$mes = $newDate[1];
			$ano = $newDate[2];

			$vSDateReturn = date('d/m/Y', mktime(0, 0, 0, $mes + $meses, $dia + $dias, $ano + $anos));

			return $vSDateReturn;
		}

		function formatar_data_banco_edicao($pData){
			$pData = substr($pData,0,10);
			$datatrans = explode ("-", $pData);
	  return "$datatrans[2]/$datatrans[1]/$datatrans[0] ";//.substr($pData,10,6);
	}

	/*************************************************
		Data: 22/10/2009 - Pedro Godinho
		Formatar data e hora do banco no formato brasileiro
		$pData: parâmetro data do banco
		***************************************************/
		function formatar_data($pData){
			if(empty($pData) || $pData == '//' || $pData == '0000-00-00') return '';
			$data = substr($pData, 0, 10);

			$datatrans = explode("-", $data);
			return "$datatrans[2]/$datatrans[1]/$datatrans[0]";
		}

	/*************************************************
		Data: 22/10/2009 - Pedro Godinho
		Formatar data formato brasileiro para formato do banco
		$pData: parâmetro data formato brasileiro
		***************************************************/
		function formatar_data_banco($pData){
			return date("Y-m-d",strtotime(str_replace('/', '-', $pData)));
		}

	/*************************************************
		Data: 22/10/2009 - Pedro Godinho
		Formatar CNPJ
		$pCNPJ: parâmetro CNPJ
		***************************************************/
		function formatar_cnpj($pCNPJ){
			return substr($pCNPJ,0,2).".".substr($pCNPJ,2,3).".".substr($pCNPJ,5,3)."/".substr($pCNPJ,8,4)."-".substr($pCNPJ,12,2);
		}

	/*************************************************
		Data: 22/10/2009 - Pedro Godinho
		Formatar CPF
		$pCPF: parâmetro CPF
		***************************************************/
		function formatar_cpf($pCPF){
			return substr($pCPF,0,3).".".substr($pCPF,3,3).".".substr($pCPF,6,3)."-".substr($pCPF,9,4);
		}

	/*************************************************
		Data: 22/10/2009 - Pedro Godinho
		Formatar Telefone
		$pFone: parâmetro telefone
		***************************************************/
		function formatar_fone($pFone){
			return substr($pFone,0,2)."-".substr($pFone,2);
		}

	/*************************************************
		Data: 22/10/2009 - Pedro Godinho
		Formatar Valor Monetário
		$pMoeda: parâmetro Moeda
		$pSimbolo: parâmetro mostrar simbolo - default Sim
		***************************************************/
		function formatar_moeda($pMoeda, $pSimbolo = True){
			if ($pMoeda) {
				if ($pSimbolo)
					return "R$ ".number_format($pMoeda,2,',','.');
				else
					return number_format($pMoeda,2,',','.');
			}
		}
    /*************************************************
		Data: 22/10/2009 - Pedro Godinho
		Formatar Valor Monetário
		$pMoeda: parâmetro Moeda
		$pSimbolo: parâmetro mostrar simbolo - default Sim
		***************************************************/
		function formatar_moeda_4_casas_decimais($pMoeda, $pSimbolo = True){
			if ($pMoeda) {
				if ($pSimbolo)
					return "R$ ".number_format($pMoeda,4,',','.');
				else
					return number_format($pMoeda,4,',','.');
			}
		}

	/*************************************************
		Data: 22/10/2009 - Pedro Godinho
		Formatar CEP
		$pCEP: parâmetro CEP
		***************************************************/
		function formatar_cep($pCEP){
			if(empty($pCEP))
				return NULL;
			return substr($pCEP,0,2).substr($pCEP,2,3)."-".substr($pCEP,5);
		}


		/************************************************************************/

		/**************  Funções relacionadas a arquivos  ****************/


	/*************************************************
		Data: 22/10/2009 - Pedro Godinho
		Mostrar todos os arquivos de um diretorio
		$pDir: parâmetro diretorio desejado
		$pFormato: parâmetro formato do arquivo - default .php
		***************************************************/
		function listar_diretorio($pDir, $pFormato = '.php') {
			ls_recursive($pDir);
			$dir_array = ls_recursive($pDir, $pFormato);
			return $dir_array;
		}

	/*************************************************
		Data: 22/10/2009 - Pedro Godinho
		Percorrer todos arquivos de um diretorio
		$pDir: parâmetro diretorio desejado
		$pFormato: parâmetro formato do arquivo - default .php
		***************************************************/
		function ls_recursive($pDir, $pFormato = '.php') {
			if (is_dir($pDir))
			{
				$dirhandle=opendir($pDir);
				while(($file = readdir($dirhandle)) !== false)
				{
					if (($file!=".")&&($file!="..")&&(strstr($file,$pFormato))) {
				   $currentfile=$file;//'$dir."/".' ia na frente pra mostrar o diretorio
				   if (!$i) $i = 0;
				   $dir_array[$i] = $currentfile;
				   $i++;
				   if(is_dir($currentfile)) {
				   	ls_recursive($currentfile);
				   }
				}
			}
		}
		return $dir_array;
	}
	/************************************************************************/
	function carregarArquivos($pSArquivo){
		if(move_uploaded_file($pSArquivo['tmp_name'],$pSArquivo['name'])){
       //echo "Arquivo Carregado com sucesso!";
		}else{
			echo "Falha ao carragar o arquivo";
		}
	}

	/************************************************************************/
// criptografia

	function Randomizar($iv_len) {
		$iv = '';
		while ($iv_len--> 0) {
			$iv .= chr(mt_rand() & 0xff);
		}
		return $iv;
	}

	function Encriptar($texto, $senha, $iv_len = 16){
		$texto .= "\x13";
		$n = strlen($texto);
		if ($n % 16) $texto .= str_repeat("\0", 16 - ($n % 16));
		$i = 0;
		$Enc_Texto = Randomizar($iv_len);
		$iv = substr($senha ^ $Enc_Texto, 0, 512);
		while ($i < $n) {
			$Bloco = substr($texto, $i, 16) ^ pack('H*', md5($iv));
			$Enc_Texto .= $Bloco;
			$iv = substr($Bloco . $iv, 0, 512) ^ $senha;
			$i += 16;
		}
		return base64_encode($Enc_Texto);
	}

	function Desencriptar($Enc_Texto, $senha, $iv_len = 16){
		$Enc_Texto = base64_decode($Enc_Texto);
		$n = strlen($Enc_Texto);
		$i = $iv_len;
		$texto = '';
		$iv = substr($senha ^ substr($Enc_Texto, 0, $iv_len), 0, 512);
		while ($i < $n) {
			$Bloco = substr($Enc_Texto, $i, 16);
			$texto .= $Bloco ^ pack('H*', md5($iv));
			$iv = substr($Bloco . $iv, 0, 512) ^ $senha;
			$i += 16;
		}
		return preg_replace('/\\x13\\x00*$/', '', $texto);
	}

	function randomizarAleatorio() {
		$str = 'abcdefghijlmnopqrs1234567890';
		$misturada = str_shuffle($str);

		// Isto exibirá algo como: bfdaec
		return $misturada;
	}

	/****************************************************************************
	* Verifica Acesso
	* Data: 14/09/2010
	* Raphael Henkel Bohrer
	*
	* Retorna um vetor com valores S - N referente ao acesso
	* de um id-usuário a uma tabela ACESSO
	*
	* $ACESSO[0] = Consulta
	* $ACESSO[1] = Inclusão
	* $ACESSO[2] = Alteração
	* $ACESSO[3] = Exclusão
	* Parametros: ( CODUSUARIO, ACETABELA )
	******************************************************************************/
	function VerificaAcesso($usuario, $tabela){

		$sqlAcesso = "Select * From ACESSO Where ACEUSUARIO = $usuario and ACETABELA = $tabela";
		//echo $sqlAcesso."<BR>";
		$vConexao = sql_conectar_banco(vGBancoDisplay);
		$RS_ACESSO = sql_executa($vConexao,$sqlAcesso,FALSE);
		while($reg_ACESSO = sql_retorno_lista($RS_ACESSO)){ //SQL ACESSO
			$ACESSO[0]  = $reg_ACESSO->ACECONSULTA;
			$ACESSO[1]  = $reg_ACESSO->ACEINCLUSAO;
			$ACESSO[2]  = $reg_ACESSO->ACEALTERACAO;
			$ACESSO[3]  = $reg_ACESSO->ACEEXCLUSAO;
		}
		return array ( $ACESSO[0],$ACESSO[1],$ACESSO[2],$ACESSO[3] );
	}


	/****************************************************************************
	* Verifica Perfil do usuario
	* Data: 24/09/2010
	* Raphael Henkel Bohrer
	*
	* Retorna o campo USUPERFIL ta tabela USUARIOS
	*
	* Parametros: ( USUCODIGO )
	******************************************************************************/
	function VerificaPerfil($USUCODIGO){

		$sqlAcesso = "Select USUPERFIL From USUARIOS Where USUCODIGO = $USUCODIGO";
		//echo $sqlAcesso."<BR>";
		$vConexao = sql_conectar_banco(vGBancoDisplay);
		$RS_ACESSO = sql_executa($vConexao,$sqlAcesso,FALSE);
		while($reg_ACESSO = sql_retorno_lista($RS_ACESSO)){
			$Perfil  = $reg_ACESSO->USUPERFIL;
		}
		return $Perfil;
	}

	/*************************************************
		Data: 05/10/2010 - Pedro Godinho
		Gerador de digito para chave da tabela
		$pCodigo: parâmetro código a ser incrementado
		$pFilial: parâmetro código da filial
		***************************************************/
		function setDigito($pCodigo, $pFilial){
			$vSCodigo = $pCodigo . str_pad($pFilial, 2, "0");
			$vIPeso = 2;
			$vISoma = 0;
			for ($i=strlen($vSCodigo);$i>=1;$i--) {
				$vISoma = $vISoma + ($vSCodigo[$i] * $vIPeso);
				if ($vIPeso < 9)
					$vIPeso = $vIPeso + 1;
				else
					$vIPeso = 2;
			}
			$vISoma = ($vISoma * 10);
			$vIDigito = ($vISoma % 11) % 10;
			return $vSCodigo.$vIDigito;
		}


		function verificarVazio($value) {
			if (is_array($value)) {
				if (sizeof($value) > 0)
					return true;
				else
					return false;
			} else {
				if (($value != '') && (strtolower($value) != 'null') && (strlen(trim($value)) > 0))
					return true;
				else
					return false;
			}
		}
		function valida_cpf($pCPF) {
			$cpf = str_replace('.', '', $pCPF);
			$cpf = str_replace('-', '', $cpf);
		// verifica se e numerico
			if(!is_numeric($cpf)) {
				return false;
			}
		// verifica se esta usando a repeticao de um numero
			if( ($cpf == '11111111111') || ($cpf == '22222222222')
				|| ($cpf == '33333333333') || ($cpf == '44444444444')
				|| ($cpf == '55555555555') || ($cpf == '66666666666')
				|| ($cpf == '77777777777') || ($cpf == '88888888888')
				|| ($cpf == '99999999999') || ($cpf == '00000000000') ) {
				return false;
		}
		//PEGA O DIGITO VERIFICADOR
		$dv_informado = substr($cpf, 9,2);
		for($i=0; $i<=8; $i++) {
			$digito[$i] = substr($cpf, $i,1);
		}
		//CALCULA O VALOR DO 10o DIGITO DE VERIFICACAO
		$posicao = 10;
		$soma = 0;
		for($i=0; $i<=8; $i++) {
			$soma = $soma + $digito[$i] * $posicao;
			$posicao = $posicao - 1;
		}
		$digito[9] = $soma % 11;
		if($digito[9] < 2) {
			$digito[9] = 0;
		} else {
			$digito[9] = 11 - $digito[9];
		}
		//CALCULA O VALOR DO 11o DIGITO DE VERIFICACAO
		$posicao = 11;
		$soma = 0;
		for ($i=0; $i<=9; $i++) {
			$soma = $soma + $digito[$i] * $posicao;
			$posicao = $posicao - 1;
		}
		$digito[10] = $soma % 11;
		if ($digito[10] < 2) {
			$digito[10] = 0;
		}
		else {
			$digito[10] = 11 - $digito[10];
		}
		//VERIFICA SE O DV CALCULADO E IGUAL AO INFORMADO
		$dv = $digito[9] * 10 + $digito[10];
		if ($dv != $dv_informado) {
			return false;
		}
		return true;
	}


    //teste de validação de cnpj

	function valida_CNPJ($cnpj){
		$cnpj = str_pad(ereg_replace('[^0-9]', '', $cnpj), 14, '0', STR_PAD_LEFT);
		if (strlen($cnpj) != 14) {
			return false;
		} else {
			for ($t = 12; $t < 14; $t++) {
				for ($d = 0, $p = $t - 7, $c = 0; $c < $t; $c++) {
					$d += $cnpj{$c} * $p;
					$p   = ($p < 3) ? 9 : --$p;
				}

				$d = ((10 * $d) % 11) % 10;

				if ($cnpj{$c} != $d) {
					return false;
				}
			}

			return true;
		}
	}
	function getSegundos($pSTempo) {
		list($vSHora,  $vSMinuto) = explode(":", $pSTempo);
		$vISegundos = ($vSHora * 3600) + ($vSMinuto * 60);
		return $vISegundos;
	}

	function segundosToHorasString($pISegundos) {
		$vIHoras = floor($pISegundos / 3600);
		$vIHorasSeg = ($vIHoras * 3600);
		$vIDifHoras = ($pISegundos - $vIHorasSeg);
		$vIMinutos = ($vIDifHoras / 60);
		$vIMinutosSeg = ($vIMinutos * 60);
		$vIDifMinutos = ($vIDifHoras - $vIMinutosSeg);
		if (strlen($vIMinutos) == 1)
			$vIMinutos = '0'.$vIMinutos;
		return $vIHoras.':'.$vIMinutos;
	}
	/*************************************************
		Data: 29/05/2011 - Pedro Godinho
		Upload de arquivo para diretório
		$pData: parâmetro data do banco
		***************************************************/
	function uploadArquivo($pArquivo, $pDiretorio, $pNomeArquivo){//faz Uploaded da imagem
		try{
			if(!is_dir($pDiretorio.'/'))
				mkdir($pDiretorio, 0755, true);

			move_uploaded_file($pArquivo['tmp_name'], $pDiretorio.'/'.$pNomeArquivo);
			chmod($pDiretorio.'/'.$pNomeArquivo, 0755);
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}
	/*************************************************
		Data: 16/08/2011 - Pedro Godinho
		Periodicidade data conforme parametro
		$pPeriodo: parâmetro periodo
		$pIncremento: parâmetro incremento
		$pData: parâmetro data
		***************************************************/

		function novaDataPeriodo($pPeriodo, $pIncremento, $pData){
			if ($pPeriodo == ''){
				$pPeriodo = 'Mensal';
			}
		//$pDataa =  $pData;
			$pData =  explode ("/", $pData);
			$ano = $pData[2];
			$mes = $pData[1];
			$dia = $pData[0];


			if ($pPeriodo == '8Meses') {

				$vmeses = ( 8 * $pIncremento );
				$vDataVencimentoTemp = date('d/m/Y', mktime(0,0,0,($mes + $vmeses),$dia,$ano));

			}



			if ($pPeriodo == '20Dias') {

				$vDias = (20 * $pIncremento);
				$vDataVencimentoTemp = date('d/m/Y', mktime(0,0,0,$mes,$dia + $vDias,$ano));

			}


			if ($pPeriodo == 'Mensal') {
			//$vDataNova = date('d/m/Y', mktime(0,0,0,$mes + $pIncremento,$dia,$ano));
				$vDataNova = date('d/m/Y', mktime(0,0,0,($mes + $pIncremento),$dia,$ano));
			/*
			$vDiadasemana = date("w", mktime(0,0,0,$mes + $pIncremento,$dia,$ano));
			// se cair no final de semana tirar por enquanto
			switch($vDiadasemana){
				case "0" : $vDataNova = date('d/m/Y', mktime( 0, 0, 0, $mes + $pIncremento, $dia + 1, $ano ));
					break;
				case "6" : $vDataNova = date('d/m/Y', mktime( 0, 0, 0, $mes + $pIncremento, $dia + 2, $ano ));
					break;
				} */
				$vDataVencimentoTemp = $vDataNova;
			}else if ($pPeriodo == 'Anual') {
				$vmeses = (12 * $pIncremento);
            //$vDataNova = date('d/m/Y', mktime(0,0,0,$mes + $pIncremento,$dia,$ano));
				$vDataNova = date('d/m/Y', mktime(0,0,0,($mes + $vmeses),$dia,$ano));

			//$vDataNova = date('d/m/Y', mktime(0,0,0,0,0,($ano + $pIncremento)));
			// $vDataNova = new DateTime('$pDataa');
			//imprime 10/10/2009
			//echo $date1->format('d/m/Y');

			//adiciona 1 semana na data
			// $vDataNova->modify('+$pIncremento year');
			//imprime 17/10/2009
			/*
			$vDiadasemana = date("w", mktime(0,0,0,$mes,$dia,$ano + $pIncremento));
			switch($vDiadasemana){
				case "0" : $vDataNova = date('d/m/Y', mktime(0,0,0,$mes,$dia + 1,$ano + $pIncremento));
					break;
				case "6" : $vDataNova = date('d/m/Y', mktime(0,0,0,$mes,$dia + 2,$ano + $pIncremento));
					break;
				} */
				$vDataVencimentoTemp = $vDataNova;
			}else if ($pPeriodo == 'Semanal') {
				$vDias = (7 * $pIncremento);
				$vDataNova = date('d/m/Y', mktime(0,0,0,$mes,$dia + $vDias,$ano));
			/*
			$vDiadasemana = date("w", mktime(0,0,0,$mes,$dia + $vDias,$ano));
			switch($vDiadasemana){
				case "0" : $vDataNova = date('d/m/Y', mktime(0,0,0,$mes,(($dia + $vDias) + 1),$ano));
					break;
				case "6" : $vDataNova = date('d/m/Y', mktime(0,0,0,$mes,(($dia + $vDias) + 2),$ano));
					break;
				} */
				$vDataVencimentoTemp = $vDataNova;
			}else if ($pPeriodo == 'Trimestral') {
				$vmeses = (3 * $pIncremento);
            //$vDataNova = date('d/m/Y', mktime(0,0,0,$mes + $pIncremento,$dia,$ano));
				$vDataNova = date('d/m/Y', mktime(0,0,0,($mes + $vmeses),$dia,$ano));

			//$vDataNova = date('d/m/Y', mktime(0,0,0,0,0,($ano + $pIncremento)));
			// $vDataNova = new DateTime('$pDataa');
			//imprime 10/10/2009
			//echo $date1->format('d/m/Y');

			//adiciona 1 semana na data
			// $vDataNova->modify('+$pIncremento year');
			//imprime 17/10/2009
			/*
			$vDiadasemana = date("w", mktime(0,0,0,$mes,$dia,$ano + $pIncremento));
			switch($vDiadasemana){
				case "0" : $vDataNova = date('d/m/Y', mktime(0,0,0,$mes,$dia + 1,$ano + $pIncremento));
					break;
				case "6" : $vDataNova = date('d/m/Y', mktime(0,0,0,$mes,$dia + 2,$ano + $pIncremento));
					break;
				} */
				$vDataVencimentoTemp = $vDataNova;
			}else if ($pPeriodo == 'Semestral') {
				$vmeses = (6 * $pIncremento);
            //$vDataNova = date('d/m/Y', mktime(0,0,0,$mes + $pIncremento,$dia,$ano));
				$vDataNova = date('d/m/Y', mktime(0,0,0,($mes + $vmeses),$dia,$ano));

			//$vDataNova = date('d/m/Y', mktime(0,0,0,0,0,($ano + $pIncremento)));
			// $vDataNova = new DateTime('$pDataa');
			//imprime 10/10/2009
			//echo $date1->format('d/m/Y');

			//adiciona 1 semana na data
			// $vDataNova->modify('+$pIncremento year');
			//imprime 17/10/2009
			/*
			$vDiadasemana = date("w", mktime(0,0,0,$mes,$dia,$ano + $pIncremento));
			switch($vDiadasemana){
				case "0" : $vDataNova = date('d/m/Y', mktime(0,0,0,$mes,$dia + 1,$ano + $pIncremento));
					break;
				case "6" : $vDataNova = date('d/m/Y', mktime(0,0,0,$mes,$dia + 2,$ano + $pIncremento));
					break;
				} */
				$vDataVencimentoTemp = $vDataNova;
			} else if ($pPeriodo == 'Quinzenal') {
				$vDias = (15 * $pIncremento);
				$vDataNova = date('d/m/Y', mktime(0,0,0,$mes,$dia + $vDias,$ano));
			/*
			$vDiadasemana = date("w", mktime(0,0,0,$mes,$dia + $vDias,$ano));
			switch($vDiadasemana){
				case "0" : $vDataNova = date('d/m/Y', mktime(0,0,0,$mes,(($dia + $vDias) + 1),$ano));
					break;
				case "6" : $vDataNova = date('d/m/Y', mktime(0,0,0,$mes,(($dia + $vDias) + 2),$ano));
					break;
				} */
				$vDataVencimentoTemp = $vDataNova;

			} else if($pPeriodo == 'Diario'){
				$vDataNova = date('d/m/Y', mktime(0,0,0,$mes,($dia + $pIncremento),$ano));
				$vDataVencimentoTemp = $vDataNova;
			}



			return $vDataVencimentoTemp;

		}


	/***************************************************
		Data: 10/02/2014 - Marcelo Serpa
	 ***************************************************/

		function gerarNovaDataPeriodo( $pSPeriodoBase, $pIPeriodoAdicional, $pIIncremento, $pSData ){

			$vAPeriodoBasePermitidos = array('Mensal', 'Diario', 'Anual' );

			if( $pSPeriodoBase == '' ){
				$pSPeriodoBase = 'Mensal';
			}

			if( !in_array( $pSPeriodoBase , $vAPeriodoBasePermitidos ) ){
				return false;
			}

			list( $dia, $mes, $ano ) = explode ("/", $pSData);

			$vIAddMes = 0;
			$vIAddAno = 0;
			$vIAddDia = 0;

			if( $pIPeriodoAdicional > 0 && $pIIncremento > 0){

				if( $pSPeriodoBase == 'Mensal' ){
					$vIAddMes = $pIPeriodoAdicional * $pIIncremento;
				} else if( $pSPeriodoBase == 'Diario' ){
					$vIAddDia = $pIPeriodoAdicional * $pIIncremento;
				} else if( $pSPeriodoBase == 'Anual' ){
					$vIAddAno = $pIPeriodoAdicional * $pIIncremento;
				}

		} //else { return false; }

		return date('d/m/Y', mktime(0,0,0, $mes + $vIAddMes, $dia + $vIAddDia, $ano + $vIAddAno));
	}

	/***************************************************
		Data: 03/10/2011 - Pedro Godinho
		Verificar acesso tela cadastro
		$pSTabela: acesso (tabela) verificada
	 ***************************************************/
		function verificarAcessoCadastro($pSTabela, $pSMethod){
			if ($_SESSION['SS_AMBIENTE'] != 'DESENV') {
				if ($pSMethod =="update") {
					if ($_SESSION['SA_ACESSOS']['TABELA'][$pSTabela]['ALTERACAO'] != "S") {
						echo "<script language='javaScript'>window.location.href='../interface/main.php'</script>";
						return;
					}
				} else if ($pSMethod =="insert") {
					if ($_SESSION['SA_ACESSOS']['TABELA'][$pSTabela]['INCLUSAO'] != "S") {
						echo "<script language='javaScript'>window.location.href='../interface/main.php'</script>";
						return;
					}
				} else if ($pSMethod =="consultar") {
					if ($_SESSION['SA_ACESSOS']['TABELA'][$pSTabela]['CONSULTA'] != "S") {
						echo "<script language='javaScript'>window.location.href='../interface/main.php'</script>";
						return;
					}
				} else {
					echo "<script language='javaScript'>window.location.href='../interface/main.php'</script>";
					return;
				}
			}
		}

	// Função liberar ou restringir acesso a determinados campos de combos e grids...
		function visualizarCamposRegistro($pSMethod, $pSStatus){

			session_start();
			if (($pSMethod == 'consultar') || ($pSStatus == 'N'))
				$_SESSION['permissao'] = false;
			else
				$_SESSION['permissao'] = true;

			return;

		}

		function descricaoMes($pIMes){
			switch ($pIMes) {
				case 1:
				return "Janeiro";
				break;
				case 2:
				return "Fevereiro";
				break;
				case 3:
				return "Março";
				break;
				case 4:
				return "Abril";
				break;
				case 5:
				return "Maio";
				break;
				case 6:
				return "Junho";
				break;
				case 7:
				return "Julho";
				break;
				case 8:
				return "Agosto";
				break;
				case 9:
				return "Setembro";
				break;
				case 10:
				return "Outubro";
				break;
				case 11:
				return "Novembro";
				break;
				case 12:
				return "Dezembro";
				break;
			}
		}

	/*************************************************
		Data: 08/05/2011 - Pedro Godinho
		Adicionar Caracter a esquerda
		$pValor: parâmetro valor a ser inserido caracteres
		$pQtde : parâmetro quantidade de caracteres a inserir
		$pString : parâmetro string padrão 0 a ser inserida
		***************************************************/
		function adicionarCaracterLeft($pValor, $pQtde, $pString = 0){
			for($i=strlen($pValor); $i<$pQtde; $i++){
				$pValor = $pString.$pValor;
			}
			return $pValor;
		}

	/*************************************************
		Data: 08/05/2011 - Pedro Godinho
		Adicionar Caracter a direita
		$pValor: parâmetro valor a ser inserido caracteres
		$pQtde : parâmetro quantidade de caracteres a inserir
		$pString : parâmetro string padrão 0 a ser inserida
		***************************************************/
		function adicionarCaracterRight($pValor, $pQtde, $pString = 0){
			for($i=strlen($pValor); $i<$pQtde; $i++){
				$pValor=$pValor.$pString;
			}
			return $pValor;
		}

		function verificarSessaoAtiva(){
			if (!isset($_SESSION['SI_ID_USUARIO'])) {
				echo "<script language='javaScript'>window.location.href='../login.php'</script>";
				return;
			}
		}

    //Função para "manipular" valores vindos do banco de dados. Formatar valor monetário.
		function formatar_valor_monetario_banco($pCValor){
			$pCValor = str_replace('.', '', $pCValor);
			$pCValor = str_replace(',', '.', $pCValor);
			return $pCValor;
		}

	/*************************************************
		Data: 14/11/2011 - Pedro Godinho
		Diferença entre duas datas formato banco em dias
		$pData1: parâmetro Data Inicial
		$pData2: parâmetro Data Final
		***************************************************/
		function diferencaDatasDias($pData1, $pData2){
			$pData1 = explode("-", $pData1);
			$vData1 = mktime(0,0,0, $pData1[1], $pData1[2], $pData1[0]);
			$pData2 = explode("-", $pData2);
			$vData2 = mktime(0,0,0, $pData2[1], $pData2[2], $pData2[0]);
		//$data_atual = mktime(0,0,0,date("m"),date("d"),date("Y"));
			$vIDias = (($vData1 - $vData2)/86400);
			$vIDias = floor($vIDias);
			return $vIDias;
		}

	/*************************************************
		Data: 14/11/2011 - Pedro Godinho
		Diferença entre duas datas formato banco em dias
		$pData1: parâmetro Data Inicial
		$pData2: parâmetro Data Final
		***************************************************/
		function diferencaDatasDiasHoras($pDataHora1, $pDataHora2){
			$vSTemp1 = explode(" ", $pDataHora1);
			$pData1 = explode("-", $vSTemp1[0]);
			$pHora1 = explode(":", $vSTemp1[1]);

			$vData1 = mktime($pHora1[0],$pHora1[1],$pHora1[2], $pData1[1], $pData1[2], $pData1[0]);
			$vSTemp2 = explode(" ", $pDataHora2);
			$pData2 = explode("-", $vSTemp2[0]);
			$pHora2 = explode(":", $vSTemp2[1]);
			$vData2 = mktime($pHora2[0],$pHora2[1],$pHora2[2], $pData2[1], $pData2[2], $pData2[0]);
			$vIDias = (($vData1 - $vData2)/86400);
			return ($vIDias*86400);
		}
		function converte_formata_minutos_horas($mins) {
        // Se os minutos estiverem negativos
			if ($mins < 0)
				$min = abs($mins);
			else
				$min = $mins;
        // Arredonda a hora
			$h = floor($min / 60);
			$m = ($min - ($h * 60)) / 100;
			$horas = $h + $m;
			if ($mins < 0)
				$horas *= -1;
        // Separa a hora dos minutos
			$sep = explode('.', $horas);
			$h = $sep[0];
			if (empty($sep[1]))
				$sep[1] = 00;
			$m = $sep[1];
        // Aqui um pequeno artifício pra colocar um zero no final
			if (strlen($m) < 2)
				$m = $m . 0;
			return sprintf('%02d:%02d', $h, $m);
		}

		function valorPorExtenso($valor=0) {
			if ((int)$valor > 0) {
				$singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
				$plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões","quatrilhões");

				$c = array("", "cem", "duzentos", "trezentos", "quatrocentos","quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
				$d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta","sessenta", "setenta", "oitenta", "noventa");
				$d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze","dezesseis", "dezesete", "dezoito", "dezenove");
				$u = array("", "um", "dois", "três", "quatro", "cinco", "seis","sete", "oito", "nove");

				$z=0;

				$valor = number_format($valor, 2, ".", ".");
				$inteiro = explode(".", $valor);
				for($i=0;$i<count($inteiro);$i++)
					for($ii=strlen($inteiro[$i]);$ii<3;$ii++)
						$inteiro[$i] = "0".$inteiro[$i];

            // $fim identifica onde que deve se dar junção de centenas por "e" ou por "," ;)
					$fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2);
					for ($i=0;$i<count($inteiro);$i++) {
						$valor = $inteiro[$i];
						$rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
						$rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
						$ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";

						$r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd && $ru) ? " e " : "").$ru;
						$t = count($inteiro)-1-$i;
						$r .= $r ? " ".($valor > 1 ? $plural[$t] : $singular[$t]) : "";
						if ($valor == "000")$z++; elseif ($z > 0) $z--;
						if (($t==1) && ($z>0) && ($inteiro[0] > 0)) $r .= (($z>1) ? " de " : "").$plural[$t];
						if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
					}

					return($rt ? $rt : "zero");
				}
			}
	/*************************************************
		Data: 21/06/2013 - Pedro Godinho
		Limpar quebras de Linhas dados do banco exportadas para Excel
		$pSTexto: parâmetro Texto
		***************************************************/
		function limparQuebraLinhaBancoExcel($pSTexto){
			$vSTexto = str_replace("\r\n", '', $pSTexto);
			$vSTexto = str_replace("\r", '', $vSTexto);
			$vSTexto = str_replace("\n", '', $vSTexto);
			$vSTexto = str_replace("<br>", '', $vSTexto);
			$vSTexto = str_replace("<br/>", '', $vSTexto);
			return $vSTexto;
		}
	/**
	 * $timestamp = strtotime("2013-08-17");
	 * Descobrir o dia da semana por extenso
	 * @param $timestamp
	 * @return (string) $diaSemana
	 * */
	function getDayOfWeek($timestamp){
		$date = getdate($timestamp);
		$diaSemana = $date['weekday'];

		if(preg_match('/(sunday|domingo)/mi',$diaSemana))
			$diaSemana = 'Domingo';
		else if(preg_match('/(monday|segunda)/mi',$diaSemana))
			$diaSemana = 'Segunda';
		else if(preg_match('/(tuesday|terça)/mi',$diaSemana))
			$diaSemana = 'Terça';
		else if(preg_match('/(wednesday|quarta)/mi',$diaSemana))
			$diaSemana = 'Quarta';
		else if(preg_match('/(thursday|quinta)/mi',$diaSemana))
			$diaSemana = 'Quinta';
		else if(preg_match('/(friday|sexta)/mi',$diaSemana))
			$diaSemana = 'Sexta';
		else if(preg_match('/(saturday|sábado)/mi',$diaSemana))
			$diaSemana = 'Sábado';

		return $diaSemana;
	}
	//Função para verificar próximo dia útil...
	/* TESTE
	$dataHoje = time();
	$proximoDiaUtil = diaUtil($dataHoje);
	$proximoDiaUtil = date('d/m/Y',$proximoDiaUtil );
	*/
	function diaUtil($data){
		while(true){

			if(getDayOfWeek($data) == 'Sábado'){

				$data = $data + (86400 * 2);
				return diaUtil($data);

			}else if(getDayOfWeek($data) == 'Domingo'){

				$data = $data + (86400 * 1);
				return diaUtil($data);
			}
			// }else if(Feriado($data) == true){ //Caso haja uma tabela feriados cadastrada pode fazer a verificação
				// $data = $data + (86400 * 1);
				// return diaUtil($data);
			// }
			else{
				return $data;
			}
		}
	}

	function convertTypesDB($pSDataType) {
		switch($pSDataType) {
			case "int":
			$vSReturn = "num&eacute;rico";
			break;
			case "char":
			$vSReturn = "string";
			break;
			case "varchar":
			$vSReturn = "string";
			break;
			case "text":
			$vSReturn = "texto";
			break;
			case "date":
			$vSReturn = "data";
			break;
			case "datetime":
			$vSReturn = "data/hora";
			break;
			case "decimal":
			$vSReturn = "decimal";
			break;
		}
		return $vSReturn;
	}

	function formatColumnsDB($pSType, $pSEntrada) {
		if($pSEntrada != "") {
			if($pSType == "COLUMN_DEFAULT") {
				$vSReturn = " Valor padr&atilde;o: ".$pSEntrada.".";
			}

			if($pSType == "IS_NULLABLE") {
				if($pSEntrada == "NO")
					$vSReturn = " &Eacute; de preenchimento obrigat&oacute;rio.";
				else
					$vSReturn = " N&atilde;o &eacute; de preenchimento obrigat&oacute;rio.";
			}

			if($pSType == "DATA_TYPE") {
				$vSReturn = " Tipo: ".convertTypesDB($pSEntrada).".";
			}

			if($pSType == "CHARACTER_MAXIMUM_LENGTH") {
				$vSReturn = " Tamanho m&aacute;ximo: ".$pSEntrada.".";
			}

			if($pSType == "CHARACTER_SET_NAME") {
				$vSReturn = " Character set: ".$pSEntrada.".";
			}

			if($pSType == "COLUMN_COMMENT") {
				$pSEntrada = explode("#", $pSEntrada);
				$vSReturn = $pSEntrada[0];
			}

			return $vSReturn;
		} else {
			return "";
		}
	}
	function filterNumber($pSString) {
		return  preg_replace( '/[^0-9]/', '', $pSString );
	}
	function removerCaracterEspecial($string){
		$novaString = preg_replace("/[^a-zA-Z0-9_.]/", "", strtr($string, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC_"));
		return $novaString;
		// preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities($string)
	}
	function removerAcentoEspacoCaracter($phrase) {
		$result = strtolower($phrase);
		$result = preg_replace("[à|á|ã|Ã|À|Á]", "a", $result);
		$result = preg_replace("[è|é|È|É]", "e", $result);
		$result = preg_replace("[ì|í|Ì|Í]", "i", $result);
		$result = preg_replace("[ò|ó|õ|Õ|Ò|Ó]", "o", $result);
		$result = preg_replace("[ù|ú|ü|Ù|Ú]", "u", $result);
		$result = preg_replace("[ç|Ç]", "c", $result);
		$result = preg_replace("[ñ|Ñ]", "n", $result);
		$result = preg_replace("/[^a-zA-Z0-9_.]/", "", $result); // trim all special chars
		$result = preg_replace("/[-]+$/", "", $result); // remove ending slashes
		return $result;
	}

    //CARREGA PERMISSÕES DO USUÁRIO EM UMA STRING
	function loadPermissoesToString() {
		$vSPermissoes = "";
		foreach ($_SESSION['SA_ACESSOS']['TABELA'] as $key => $value) {
			$vSTemPermissao = "N";

			if ($value['CONSULTA'] == "S") {
				$vSTemPermissao = "S";
			} else if ($value['INCLUSAO'] == "S") {
				$vSTemPermissao = "S";
			} else if ($value['ALTERACAO'] == "S") {
				$vSTemPermissao = "S";
			} else if ($value['EXCLUSAO'] == "S") {
				$vSTemPermissao = "S";
			} else if ($value['EXPORTAR'] == "S") {
				$vSTemPermissao = "S";
			} else {
				$vSTemPermissao = "N";
			}

			if ($vSTemPermissao == "S") {
				if ($vSPermissoes == "")
					$vSPermissoes = $key;
				else
					$vSPermissoes .= ",".$key;
			}
		}
		return $vSPermissoes;
	}

    //PESQUISA CARACTERES CORINGAS
	function searchCoringas($pSFieldDB, $pSTipoDB, $pValue, $pSRestricao = "AND") {
		$vSReturn = "";
		$pValue = str_replace("'", "", $pValue);
		$pValue = str_replace('"', '', $pValue);

		if($pSTipoDB == 'char') {
			$vSCoringa = "";

			if (substr($pValue, 0, 1) == "=") {
				$vSCoringa = "=";
				$pValue = substr($pValue, 1);
			}

			if (substr($pValue, 0, 1) == "*") {
				$vSCoringa = "*-";
				$pValue = substr($pValue, 1);
			}

			if (substr($pValue, -1) == "*") {
				$vSCoringa = "-*";
				$pValue = substr($pValue, 0, strlen($pValue)-1);
			}

			if ($vSCoringa == "") {
				if (strpos($pValue, "+") === false) {
					$vSCoringa = "";
				} else {
					$vSCoringa = "+";
				}
			}

			if ($vSCoringa == "") {
				if (strpos($pValue, "|") === false) {
					$vSCoringa = "";
				} else {
					$vSCoringa = "|";
				}
			}

			switch ($vSCoringa) {
				case "=":
                    //pesquisa EXATAMENTE as palavras na ordem escrita
				$vSReturn = " ".$pSRestricao." ".$pSFieldDB." = '".$pValue."' ";
				break;
				case "*-":
                    //pesquisa que TERMINE com as palavras na ordem escrita
				$vSReturn = " ".$pSRestricao." ".$pSFieldDB." LIKE '%".$pValue."' ";
				break;
				case "-*":
                    //pesquisa que INICIE com as palavras na ordem escrita
				$vSReturn = " ".$pSRestricao." ".$pSFieldDB." LIKE '".$pValue."%' ";
				break;
				case "+":
                    //pesquisa que CONTENHAM TODAS as palavras indfiferentemente da ordem escrita
				$vAPalavras = explode("+", $pValue);
				foreach($vAPalavras as $key => $value) {
					if($value != "") {
						if($vSReturn == "")
							$vSReturn = " ".$pSRestricao." (".$pSFieldDB." LIKE '%".$value."%' ";
						else
							$vSReturn .= " AND ".$pSFieldDB." LIKE '%".$value."%' ";
					}
				}
				$vSReturn .= ") ";
				break;
				case "|":
                    //pesquisa que CONTENHAM UMA OU MAIS das palavras indfiferentemente da ordem escrita
				$vAPalavras = explode("|", $pValue);
				foreach($vAPalavras as $key => $value) {
					if($value != "") {
						if($vSReturn == "")
							$vSReturn = " ".$pSRestricao." (".$pSFieldDB." LIKE '%".$value."%' ";
						else
							$vSReturn .= " OR ".$pSFieldDB." LIKE '%".$value."%' ";
					}
				}
				$vSReturn .= ") ";
				break;
				default:
                    //pesquisa que contenham as palavras na ordem escrita
				$vSReturn = " ".$pSRestricao." ".$pSFieldDB." LIKE '%".$pValue."%' ";
			}
		} elseif($pSTipoDB == 'int') {
			$vSCoringa = "";

			if (substr($pValue, 0, 2) == ">=") {
				$vSCoringa = ">=";
				$pValue = substr($pValue, 2);
			}

			if (substr($pValue, 0, 2) == "<=") {
				$vSCoringa = "<=";
				$pValue = substr($pValue, 2);
			}

			if (substr($pValue, 0, 1) == "!") {
				$vSCoringa = "!";
				$pValue = substr($pValue, 1);
			}

			if (substr($pValue, 0, 1) == ">") {
				$vSCoringa = ">";
				$pValue = substr($pValue, 1);
			}

			if (substr($pValue, 0, 1) == "<") {
				$vSCoringa = "<";
				$pValue = substr($pValue, 1);
			}

			if ($vSCoringa == "") {
				if (strpos($pValue, "+") === false) {
                    //echo "111";
					$vSCoringa = "";
				} else {
                    //echo "222";
					$vSCoringa = "+";
				}
			}

			if ($vSCoringa == "") {
				if (strpos($pValue, "-") === false) {
                    //echo "333";
					$vSCoringa = "";
				} else {
                    //echo "444";
					$vSCoringa = "-";
				}
			}

            //echo $pValue = filterNumber($pValue);
            //echo "AAA:: ".$vSCoringa." ::AAA";
			switch ($vSCoringa) {
				case "!":
                    //pesquisa os números DIFERENTES do escrito
				$vSReturn = " ".$pSRestricao." ".$pSFieldDB." <> '".$pValue."'";
				break;
				case ">":
                    //pesquisa os números MAIORES que o escrito
				$vSReturn = " ".$pSRestricao." ".$pSFieldDB." > '".$pValue."'";
				break;
				case "<":
                    //pesquisa os números MENORES que o escrito
				$vSReturn = " ".$pSRestricao." ".$pSFieldDB." < '".$pValue."'";
				break;
				case ">=":
                    //pesquisa os números MAIORES OU IGUAIS ao escrito
				$vSReturn = " ".$pSRestricao." ".$pSFieldDB." >= '".$pValue."'";
				break;
				case "<=":
                    //pesquisa os números MENORES OU IGUAIS ao escrito
				$vSReturn = " ".$pSRestricao." ".$pSFieldDB." <= '".$pValue."'";
				break;
				case "+":
                    //pesquisa APENAS os números escritos
				$vANumeros = explode("+", $pValue);
				foreach($vANumeros as $key => $value) {
					if($value != "") {
						if($vSReturn == "")
							$vSReturn = "'".$value."'";
						else
							$vSReturn .= ",'".$value."'";
					}
				}
				$vSReturn = " ".$pSRestricao." ".$pSFieldDB." IN (".$vSReturn.") ";
				break;
				case "-":
                    //pesquisa os números no INTERVALO escrito
				$vANumeros = explode("-", $pValue);
				$vSReturn = " ".$pSRestricao." ".$pSFieldDB." BETWEEN '".$vANumeros[0]."' AND '".$vANumeros[1]."'";
				break;
				default:
                    //pesquisa EXATAMENTE o número escrito
				$vSReturn = " ".$pSRestricao." ".$pSFieldDB." = '".$pValue."'";
			}
		}
		return $vSReturn;
	}

	//FUNÇÂO (EM CONSTRUÇÃO PARA LIMPAR NOMES)
	function otimizarNome($nome, $array_config = null ){
		$array_limpar = array();
		$nomeLimpo = "";
		if($nome != ''){
			$array_limpar = explode(" ", $nome);
			if($array_limpar[0] != ""){
				$nomeLimpo = $array_limpar[0];
				if(sizeof($array_limpar)>1){
					$nomeLimpo = $nomeLimpo . " " .end($array_limpar);
				}
				/* ULTIMO NOME ABREVIADO
				if(sizeof($array_limpar)>1){
					$nomeLimpo = $nomeLimpo . " " .substr(end($array_limpar), 0, 1). ".";
				}*/

			}
		}
		return $nomeLimpo;
	}
/*
    function otimizarNome($nome, $array_config = null) {
		$array_limpar = array();
		$nomeLimpo = "";
		if($nome != ''){
			$array_limpar = explode(" ", $nome);
			if($array_limpar[0] != ""){
				$nomeLimpo = $array_limpar[0];
				if(sizeof($array_limpar)>1){
					$nomeLimpo = $nomeLimpo . " " .end($array_limpar);
				}

			}
		}
		return $nomeLimpo;
	}*/
	function ativoSimNao($vSValor){
		return $vSValor == "S" ? "Sim" : "Não";
	}

	////////////////////////
	//////HOMOLOGAÇÃO///////
	////////////////////////

	function AdicionaZero($valor, $Qtde, $string = 0){
		for($i=strlen($valor); $i<$Qtde; $i++){
			$valor=$string.$valor;
		}
		return $valor;
	}
	function AdicionaEspaco($valor, $Qtde, $string = ' '){
		for($i=strlen($valor); $i<$Qtde; $i++){
			$valor=$string.$valor;
		}
		return $valor;
	}
	function AdicionaEspacoLeft($valor, $Qtde, $string = ' '){
		for($i=strlen($valor); $i<$Qtde; $i++){
			$valor=$valor.$string;
		}
		return $valor;
	}
	function RemoverAcentos($s) {
		$s = ereg_replace("[áàâãª]","a",$s);
		$s = ereg_replace("[ÁÀÂÃ]","A",$s);
		$s = ereg_replace("[éèê]","e",$s);
		$s = ereg_replace("[ÉÈÊ]","E",$s);
		$s = ereg_replace("[íì]","i",$s);
		$s = ereg_replace("[ÍÌ]","I",$s);
		$s = ereg_replace("[óòôõº]","o",$s);
		$s = ereg_replace("[ÓÒÔÕ]","O",$s);
		$s = ereg_replace("[úùû]","u",$s);
		$s = ereg_replace("[ÚÙÛ]","U",$s);
		$s = str_replace("ç","c",$s);
		$s = str_replace("Ç","C",$s);
		//$s = ereg_replace(" ","",$s);
		return $s;
	}

	function diaSemana($pDData, $pSTipo) {
		$ano =  substr("$pDData", 0, 4);
		$mes =  substr("$pDData", 5, -3);
		$dia =  substr("$pDData", 8, 9);

		$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );
		if ($pSTipo == 'S') {
			switch($diasemana) {
				case"0": $diasemana = "Domingo";       break;
				case"1": $diasemana = "Segunda-Feira"; break;
				case"2": $diasemana = "Terça-Feira";   break;
				case"3": $diasemana = "Quarta-Feira";  break;
				case"4": $diasemana = "Quinta-Feira";  break;
				case"5": $diasemana = "Sexta-Feira";   break;
				case"6": $diasemana = "Sábado";        break;
			}
		}
		return "$diasemana";
	}

	function admAutenticado(){

		if(isset($_SESSION['SA_ACESSOS']['HELPDESK'][$_SESSION['SI_USU_EMPRESA']]['ADMINISTRADOR'])){
			if( $_SESSION['SA_ACESSOS']['HELPDESK'][$_SESSION['SI_USU_EMPRESA']]['ADMINISTRADOR'] == 'S')
				return true;
		}

		return false;
	}

	function calculaDiferencaEntreDatas( $dataTimestampFormatInicial, $dataTimestampFormatFinal  ){

		$data_ini = strtotime($dataTimestampFormatInicial);
		$data_fim = strtotime($dataTimestampFormatFinal);

		$diferenca_segundos = $data_fim - $data_ini;

		return gmdate("H:i:s", $diferenca_segundos);

	}

	function base64url_encode($s) {
		return str_replace("=", "-_", base64_encode($s));
	}

	function base64url_decode($s) {
		return str_replace("-_", "=", base64_decode($s));
	}

	/*************************************************
		Data: 07/02/2014 - Pedro Godinho
		Calcular valor pro rata contrato
		$pSTexto: parâmetro Texto
		***************************************************/
		function calcularProRataContrato($pDDataInicio, $pCValorMensalidade, $pCValorMensalidadeReajustada, $pCValorIndice) {

			$diaReajuste = explode("-",$pDDataInicio);
			$diaReajuste = (int) $diaReajuste[2];
		//echo 'dia Reajuste '.$diaReajuste;
			if (($diaReajuste >= 1) && ($diaReajuste < 31)){
				$diasDiferenca = (30 - $diaReajuste) + 1;
			}else if (($diaReajuste == 31) || ($diaReajuste == 1)){
				$diasDiferenca = 0;
			}

			$valorMensAtual = ($pCValorMensalidade / 30) * ($diaReajuste - 1);
			$valorMensReajustada =($pCValorMensalidadeReajustada / 30) * $diasDiferenca;
			if ($pCValorMensalidade == $pCValorMensalidadeReajustada) {
			//echo 'teste';
				$proRata = 0;
			}else
			if (($diasDiferenca == 0) && ($pCValorIndice > 0) ){
				$proRata = 0;
			}else{
				$proRata = ($valorMensAtual + $valorMensReajustada) - $pCValorMensalidade;
			}
			return $proRata;
		}
	//IDENTIFICA NAVEGADOR E VERSÃO
		function identificaNavegador() {
			$useragent = $_SERVER['HTTP_USER_AGENT'];

			if (preg_match('|MSIE ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
				$browser_version=$matched[1];
				$browser = 'IE';
			} elseif (preg_match( '|Opera/([0-9].[0-9]{1,2})|',$useragent,$matched)) {
				$browser_version=$matched[1];
				$browser = 'Opera';
			} elseif(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched)) {
				$browser_version=$matched[1];
				$browser = 'Firefox';
			} elseif(preg_match('|Chrome/([0-9\.]+)|',$useragent,$matched)) {
				$browser_version=$matched[1];
				$browser = 'Chrome';
			} elseif(preg_match('|Safari/([0-9\.]+)|',$useragent,$matched)) {
				$browser_version=$matched[1];
				$browser = 'Safari';
			} else {
            //navagador não identificado
				$browser_version = 0;
				$browser= 'other';
			}
			return $browser." (".$browser_version.")";
		}

		function pre($a){
			echo("<pre>");
			print_r($a);
			echo("</pre>");
		}

		function pegarHora($pSDataHora) {
			list($vSData, $vSHora) = explode(' ', $pSDataHora);
			return substr($vSHora, 0, 5);
		}

		function ftpArquivo($pSCaminhoLocal, $pSCaminhoRemoto, $pSControleTipo, $pSMode = 'A') {
			$ftp_server = vGHostFTPSafeWeb;
			$ftp_user = vGUsernameFTPSafeWeb;
			$ftp_pass = vGPasswordFTPSafeWeb;
			$conn_id = ftp_connect($ftp_server) or die("Couldn't connect to $ftp_server");
			$login_result = ftp_login($conn_id, $ftp_user, $ftp_pass);
			ftp_pasv($conn_id, false);

			$vILocalFileSize = filesize($pSCaminhoOrigem);
			$pSCaminhoDestino = "/NFSe/ENTRADA/NFS_1_.xml";
		//echo $pSControleTipo;
			if ($pSControleTipo == 'upload') {
				if ($pSMode == 'A')
					if(@ftp_put($conn_id, $pSCaminhoRemoto , $pSCaminhoLocal, FTP_ASCII));
				else
					if(@ftp_put($conn_id, $pSCaminhoRemoto , $pSCaminhoLocal, FTP_BINARY));
			} else {
				if ($pSMode == 'A')	{
					if (@ftp_get($conn_id, $pSCaminhoLocal, $pSCaminhoRemoto, FTP_ASCII));
				} else {
					if (@ftp_get($conn_id, $pSCaminhoLocal, $pSCaminhoRemoto, FTP_BINARY));
				}
			}
		//$vIRemoteFileSize = ftp_size($conn_id, $pSCaminhoDestino);

			ftp_close($conn_id);
		}

		function removerAcentos2($pString) {

			$string = 'ÁÍÓÚÉÄÏÖÜËÀÌÒÙÈÃÕÂÎÔÛÊáíóúéäïöüëàìòùèãõâîôûêÇç';

			$tr = strtr(

				$pString,

				array (

					'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A',
					'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E',
					'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ð' => 'D', 'Ñ' => 'N',
					'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O',
					'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Ŕ' => 'R',
					'Þ' => 's', 'ß' => 'B', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a',
					'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e',
					'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
					'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o',
					'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y',
					'þ' => 'b', 'ÿ' => 'y', 'ŕ' => 'r'
					)
				);
			return($tr);
		}

	/*************************************************
		Data: 10/06/2016 - Pedro Godinho
		Pegar duas datas e montar o SQL para pesquisa entre datas
		$pSCampoBanco: parâmetro campo banco de dados
		$pDataInicio: parâmetro data inicio
		$pDataFinal: parâmetro data final
		***************************************************/
		function sql_add_datas_between($pSCampoBanco, $pDataInicio, $pDataFinal){
			$vSSql = '';
			if(verificarVazio($pDataInicio) && verificarVazio($pDataFinal))
				$vSSql =" and (".$pSCampoBanco." BETWEEN '".formatar_data_banco($pDataInicio)." 00:00:00' and '".formatar_data_banco($pDataFinal)." 23:59:59')";
			else if(verificarVazio($pDataInicio) && !verificarVazio($pDataFinal))
				$vSSql =" and (".$pSCampoBanco." >= '".formatar_data_banco($pDataInicio)." 00:00:00')";
			else if(verificarVazio($pDataFinal) && !verificarVazio($pDataInicio))
				$vSSql =" and (".$pSCampoBanco." <= '".formatar_data_banco($pDataFinal)." 23:59:59')";
			return $vSSql;
		}

		function imprimeGetPost($GetPost){
			print_r("<pre>");
			print_r($GetPost);
			print_r("</pre>");
			die();
		}

		function formatarHora($data){
			return substr($data, 11, 5);
		}

		function botoesPadrao($tabela, $prefixo, $codigo, $namePage, $botaoCad = false){
			$retorno =  "<div class=\"text-center\"><button class=\"btn btn-danger\" onClick=\"deletarRegistro('{$tabela}', '{$prefixo}', {$codigo});\"><i class=\"fa fa-trash\"></i> Del</button>";
			if($botaoCad) $retorno .= "\n<a href=\"cad".ucfirst($namePage).".php?oid={$codigo}\" class=\"btn btn-system\"><i class=\"fa fa-pencil-square-o\"></i> Edit</a>";
			$retorno .= "</div>";
			return $retorno;
		}

		function uploadImagemUnica($namePage, $codigo, $arquivos, $quadrada = false, $background = '#FFFFFF'){
			require_once '../libs/upload-php/src/class.upload.php';
			require_once '../libs/upload-php/src/lang/class.upload.pt_BR.php';
			$arquivosPermitidos = array('jpg', 'jpeg', 'png', 'gif');
			try{
				foreach ($arquivos as $arquivo){
				//Verifica se não há erros
					if($arquivo['error'] == 0){
						$arrArquivo = explode('.', $arquivo['name']);
						//Captura a extensão do arquivo
						$extensao = strtolower(end($arrArquivo));

						//Verifica se o arquivo é considerado um arquivo de imagem
						if(in_array($extensao, $arquivosPermitidos)){
							$handle = new Upload($arquivo);
							if ($handle->uploaded) {
								//Gera o nome do arquivo com o código informado
								$nomeArquivo = $codigo;
								$arquivoUpload = $arquivo['tmp_name'];
								//Define o diretório de acordo com a variável $namePage
								$diretorio = "../uploads/{$namePage}";
								//Cria o diretório se o mesmo não existir
								if(!is_dir($diretorio)){
									mkdir($diretorio, 0755, true);
									//Caso exista define a permissão padrão
								}else{
									chmod($diretorio, 0755);
								}
								//Verifica se o diretório foi criado
								if(is_dir($diretorio)){
									$handle->file_new_name_body = $nomeArquivo;
									$handle->dir_chmod = 0755;
									if($quadrada){
										$handle->image_resize          = true;
										$handle->image_ratio_fill      = true;
										$tamanho = ($handle->image_dst_x > $handle->image_dst_y) ? $handle->image_dst_x : $handle->image_dst_y;
										$handle->image_y               = $tamanho;
										$handle->image_x               = $tamanho;
										$handle->image_background_color = $background;
									}
									$handle->Process($diretorio);
									if ($handle->processed) {
										$handle->Clean();
										return $handle->file_dst_name;
									}else{
										throw new Exception("Ocorreu um erro no Upload da imagem. ".$handle->error);
									}
								}
							}else{
								throw new Exception("Não foi possivel encontrar o diretório");
							}
						}else{
							throw new Exception("Tipo de arquivo não permitido! ({$extensao})");
						}
					}else{
						throw new Exception("Ocorreu uma falha ao realizar o upload da imagem");
					}
				}
			}catch(Exception $e){
				echo 'Ocorreu um erro: '.$e->getMessage()."\n";
				return false;
			}
		}

		function diverse_array($vector) {
		    $result = array();
		    foreach($vector as $key1 => $value1)
		        foreach($value1 as $key2 => $value2)
		            $result[$key2][$key1] = $value2;
		    return $result;
		}
		function uploadImagensMultiplas($namePage, $codigo, $arquivos, $quadrada = true, $background = '#FFFFFF'){
			require_once '../libs/upload-php/src/class.upload.php';
			require_once '../libs/upload-php/src/lang/class.upload.pt_BR.php';
			$diretorio = "../uploads/{$namePage}/{$codigo}/";
			$retorno = array();
			foreach ($arquivos as $input) {
				$files = diverse_array($input);
				foreach($files as $file){
					$handle = new Upload($file);
					if ($handle->uploaded) {

						if(!is_dir($diretorio)){ //Cria o diretório se o mesmo não existir
							mkdir($diretorio, 0755, true);
						}else{ //Caso exista define a permissão padrão
							chmod($diretorio, 0755);
						}

						$handle->file_new_name_body = md5($handle->file_dst_name);
						$handle->dir_chmod = 0755;
						if($quadrada){
							$handle->image_resize          = true;
							$handle->image_ratio_fill      = true;
							$tamanho = ($handle->image_dst_x > $handle->image_dst_y) ? $handle->image_dst_x : $handle->image_dst_y;
							$handle->image_y               = $tamanho;
							$handle->image_x               = $tamanho;
							$handle->image_background_color = $background;
						}
						$handle->Process($diretorio);
						if ($handle->processed) {
							$retorno[] = $handle->file_dst_name;
							$handle->Clean();
						}else{
							echo 'error : ' . $handle->error;
						}
					}
				}
			}
			return $retorno;
		}

		function visualizarImagem($namePage, $imagem, $codigo, $tabela, $prefixo, $fieldImagem){
			$view = '<div class="form-group">
			<div class="row">
				<div class="col-md-1">
					<div class="btn-control-image btn-remover" title="Remover imagem" onclick="removerImagem('."'../uploads/{$namePage}/{$imagem}', {$codigo}, '{$tabela}', '{$prefixo}', '{$fieldImagem}'".');">
						<h1><i class="fa fa-trash-o text-danger" aria-hidden="true"></i></h1>
						<span><b>Remover imagem</b></span>
					</div>
					<br>
					<div class="btn-control-image btn-crop" title="Recortar miniatura" data-toggle="modal" data-target="#modalCrop">
						<h1><i class="fa fa-crop text-success"></i></h1>
						<span><b>Recortar miniatura</b></span>
					</div>
				</div>
				<div class="col-md-8">
					<label>Imagem Selecionada</label>
					<img src="../uploads/'.$namePage.'/'.$imagem.'" class="img-responsive">
				</div>
				<div class="col-md-3 thumb">';
					if(file_exists("../uploads/{$namePage}/thumbnail/{$imagem}")){
						$view .= '<label>Miniatura</label>
						<img src="../uploads/'.$namePage.'/thumbnail/'.$imagem.'" alt="Imagem" class="img-responsive">';
					}
					$view .= '		</div>
				</div>
			</div>';
			return $view;
		}
		function gerarModal($namePage, $imagem, $aspect = 1){
			return '<div class="modal fade" id="modalCrop" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Recortar miniatura</h4>
					</div>
					<div class="modal-body">
						<div class="img-container">
							<img src="../uploads/'.$namePage.'/'.$imagem.'" id="imagemCrop">
						</div>
					</div>
					<div class="modal-footer">
						<a href="" id="cropImageBtn" class="btn btn-primary">Recortar miniatura</a>
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>
		<input type="hidden" name="aspectRatioCrop" value="'.$aspect.'">';
	}

	function addCasasDecimais($valor, $quantidadeCasas = 2){
		if(strpos($valor, '.') === false){
			$valor .= '.';
			for($i = 0; $i < $quantidadeCasas; $i++){
				$valor .= '0';
			}
		}else{
			$arr = explode('.', $valor);
			while(strlen(end($arr)) < $quantidadeCasas){
				$valor .= '0';
				$arr = explode('.', $valor);
			}
		}
		return $valor;
	}
	function cortarStringPalavras($texto, $quantidadePalavras, $reticencias='...'){
		$corte = '';
		$texto = trim($texto);
		$arrString = explode(' ', $texto);
		for ($i=0; $i < $quantidadePalavras; $i++) {
			$corte .= $arrString[$i].' ';
		}
		$corte = trim($corte);
		$corte .= $reticencias;

		return $corte;
	}
	function verificacaoGoogleRecaptcha($captcha){
		$secret = getConfig('CFGRECAPTCHASECRETKEY');
		$ip = $_SERVER['REMOTE_ADDR']; //IP do cliente
		$rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&$remoteip=$ip"); //URL para verificação
		$arr = json_decode($rsp, true);
		if($arr['success']){
			return true;
		}
		return false;
	}
	function gerarUrlAmigavel($str, $replace=array(), $delimiter='-') {
		setlocale(LC_ALL, 'en_US.UTF8');
		if( !empty($replace) ) {
			$str = str_replace((array)$replace, ' ', $str);
		}

		$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
		$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
		$clean = strtolower(trim($clean, '-'));
		$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

		$clean = trim($clean);
		$clean = trim($clean, '-');

		return $clean;
	}
	function searchImagesGalleryWithThumb($directory, $allowExtensions = array('jpg', 'png', 'gif', 'bmp', 'jpeg')){
		try{
			$directory = rtrim($directory, '/');
			$directory .= '/';
			if(is_dir($directory)){
				$imagesReturn = array();
				$extensions = '*.'.implode(',*.', $allowExtensions);
				$imagesDefault = glob("$directory{{$extensions}}", GLOB_BRACE);
				foreach($imagesDefault as $image){
					$info = pathinfo($image);
					if(is_file($info['dirname'].'/thumbnail/'.$info['basename'])){
						$imagesReturn[] = array(
							'file'      => $info['dirname'].'/thumbnail/'.$info['basename'],
							'filename'  => $info['basename'],
							'thumbnail' => $info['dirname'].'/thumbnail/'.$info['basename'],
							'normal'    => $info['dirname'].'/'.$info['basename']
						);
					}elseif(is_file($info['dirname'].'/'.$info['basename'])){
						$imagesReturn[] = array(
							'file'      => $info['dirname'].'/'.$info['basename'],
							'filename'  => $info['basename'],
							'thumbnail' => null,
							'normal'    => $info['dirname'].'/'.$info['basename']
						);
					}
				}
				return $imagesReturn;
			}else{
				throw new Exception("O diretório informado não é valido ({$directory})");
			}
		}catch(Exception $e){
			echo 'Ocorreu um erro: '.$e->getMessage();
		}
	}

	function mesAno($data){
		list($ano, $mes, $dia) = explode('-', $data);
		return descricaoMes($mes).'/'.$ano;
	}

	function ultimoDiaMes($mes, $ano){
		return date("t", mktime(0,0,0,$mes,'01',$ano));
	}


	function upperCaseAcentos($pString) {
		$from = "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ";
		$to   = "ÁÀÃÂÉÊÍÓÔÕÚÜÇAAAAEEIOOOUUC";

		$tr = utf8_strtr($pString, $from, $to); // funciona corretamente


		return($tr);
	}

	function utf8_strtr($str, $from, $to) {
	    $keys = array();
	    $values = array();
	    preg_match_all('/./u', $from, $keys);
	    preg_match_all('/./u', $to, $values);
	    $mapping = array_combine($keys[0], $values[0]);
	    return strtr($str, $mapping);
	}

	function copiar_diretorio($source, $dest){
		if (is_file($source)) {
			return copy($source, $dest);
		}

		if (!is_dir($dest)) {
			mkdir($dest);
		}

		$dir = dir($source);
		while (false !== $entry = $dir->read()) {
			if ($entry == '.' || $entry == '..') {
				continue;
			}

			if ($dest !== "$source/$entry") {
				copiar_diretorio("$source/$entry", "$dest/$entry");
			}
		}

		$dir->close();
		return true;
	}

	function calculaRaiz($grauraiz, $numero){
		return pow($numero, 1/$grauraiz);
	}

	function reArrayFiles($file_post) {
	    $file_ary = array();
	    $file_count = count($file_post['name']);
	    $file_keys = array_keys($file_post);

	    for ($i=0; $i<$file_count; $i++) {
	        foreach ($file_keys as $key) {
	            $file_ary[$i][$key] = $file_post[$key][$i];
	        }
	    }

	    return $file_ary;
	}

	function saveImage($namePage, $id, $urlImage)
	{
		$image = file_get_contents($urlImage);

		$arrImage = explode('/', $urlImage);
		$formato = strrchr(end($arrImage), '.');

		$imgSave = '../uploads/'.$namePage.'/'.$id.$formato;

		$fp = fopen($imgSave, "w+");
		fwrite($fp, $image);
		fclose($fp);

		return $id.$formato;
	}

	function escape_aspas_inputs($texto, $tipo){
		$texto_escape = "";
		if($tipo == "input"){
			$texto_escape = htmlspecialchars(stripslashes($texto));
		}else if($tipo == "textarea"){
			$texto_escape = stripslashes($texto);
		}
		return $texto_escape;
	}

	function uploadArquivoUnico($namePage, $codigo, $arquivo, $extensoesPermitidas)
	{
		try{
			if($arquivo['error'] == 0){
				$extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
				$extensao = strtolower($extensao);

				if(in_array($extensao, $extensoesPermitidas)){
					$nomeArquivo = $codigo.'.'.$extensao;
					$arquivoUpload = $arquivo['tmp_name'];

					$diretorio = __DIR__."/../uploads/{$namePage}";

					if(!is_dir($diretorio)){
						mkdir($diretorio, 0755, true);

					}else{
						chmod($diretorio, 0755);
					}
				//Verifica se o diretório foi criado
					if(is_dir($diretorio)){
					//Move a imagem para o diretório definido
						if(move_uploaded_file($arquivoUpload, $diretorio.'/'.$nomeArquivo)){
						//Retorna o nome do arquivo
							return $nomeArquivo;
						}else{
							throw new Exception("Ocorreu uma falha ao realizar o upload do arquivo");
						}
					}else{
						throw new Exception("Não foi possivel encontrar o diretório");
					}
				}else{
					throw new Exception("Tipo de arquivo não permitido! ({$extensao})");
				}
			}else{
				throw new Exception("Ocorreu uma falha ao realizar o upload do arquivo");
			}

		}catch(Exception $e){
			echo 'Ocorreu um erro: '.$e->getMessage()."\n";
			return false;
		}
	}