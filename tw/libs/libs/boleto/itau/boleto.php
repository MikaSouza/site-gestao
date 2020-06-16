<?php

	// mode, format, default_font_size, default_font, margin_left, margin_right, margin_top, margin_bottom, margin_header, margin_footer
	require_once 'admin/includes/constantes.php';
	require_once 'admin/libs/mpdf/mpdf.php';
	$vSEMPLOGOMARCA	= 'admin/imagens/logotipo.png';
	
	function add_zeros($n, $t) { // adiciona zeros no inicio do numero ($t = total de algarismos)
		while (strlen($n)<$t)
			$n = "0" . $n;
		return ($n);
	}
	
	$dadosboleto["identificacao"] 		= "ALGO MAIS GRAFICA E EDITORA";
	$dadosboleto["cedente"] 			= $boleto['CFGCEDENTE'];
	$dadosboleto["cpf_cnpj_cedente"]	= "07.053.387/0001-93";
	$dadosboleto["endereco"] 		   	= "Rua Santos Dumont, 1101";
	$dadosboleto["cidade_uf"] 			= "Porto Alegre - RS";
	
	include("funcoes-itau.php");

	// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE

	$dadosboleto["quantidade"] 		= "1";
	$dadosboleto["valor_unitario"] 	= "";
	$dadosboleto["aceite"] 			= "N";
	$dadosboleto["uso_banco"] 		= "";
	$dadosboleto["especie"] 		= "R$";
	$dadosboleto["especie_doc"] 	= "DM";
	// DADOS PERSONALIZADOS - BANCO DO ITAU
	$dadosboleto["convenio"] 			= "";  // Num do conv&ecirc;nio - REGRA: 6 ou 7 d&iacute;gitos
	$dadosboleto["contrato"] 			= ""; // Num do seu contrato
	//$dadosboleto["carteira"] 			= "109";  //
	$dadosboleto["variacao_carteira"] 	= "";  // Varia&ccedil;&atilde;o da Carteira, com tra&ccedil;o (opcional)
	//$dadosboleto["agencia"] 			= "0897";  // Ag&ecirc;ncia da conta do beneficiário
	//$dadosboleto["conta"] 				= substr("04777",0,5);  // n&uacute;mero da conta do beneficiário
	$dadosboleto["digito_conta"]		= "";  	// Digito da Conta Corrente 1 Digito


	$vSHtmlDefault = array();
	// Header 
	$vSHtmlDefault['header'] = '
						<div align="center">
							<table cellspacing=0 cellpadding=0 width=700 border=0>
								<tbody>
									<tr>
										<td class=ld>
											<table width=700 cellspacing=5 cellpadding=0 border=0 align=Default>
												<tr>
													<td width=41><img height="60px" width="150px" src='.$vSEMPLOGOMARCA.'></td>
													<td width=490>
														<p>
														'. $dadosboleto["cedente"].'<br>
														'. "CNPJ: ".$dadosboleto['cpf_cnpj_cedente'].'<br>
														'. $dadosboleto["endereco"].'<br>
														'. $dadosboleto["cidade_uf"] .'
														</p>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td colspan=2>
											<p>
												<b>O pagamento deste boleto tamb&eacute;m poder&aacute; ser efetuado
													nos terminais de Auto-Atendimento ITA&Uacute;.</b>
											</p>
											<b>Instru&ccedil;&otilde;es:</b>
											<ol>
											  <li>Imprima em impressora jato de tinta (ink jet) ou laser em qualidade
												normal ou alta. N&atilde;o use modo econ&ocirc;mico.</li>
											  <li><b>Por favor, configure a margens esquerda e direita para 17 mm.</b></li>
											  <li>Utilize folha A4 (210 x 297 mm) ou Carta (216 x 279 mm) e margens
												m&iacute;nimas &agrave; esquerda e &agrave; direita do formul&aacute;rio.</li>
											  <li>Corte na linha indicada. N&atilde;o rasure, risque, fure ou dobre a regi&atilde;o
												onde se encontra o c&oacute;digo de barras.</li>
											</ol>
										</td>
									</tr>
								</tbody>
							</table>';
				
		$mpdf = new mPDF("c", "A4", "12", "helvetica", 10, 10, 48, 15, 8, 8);		

		$mpdf->SethtmlHeader($vSHtmlDefault['header']);	
		$mpdf->SetDisplayMode("fullpage");
		$mpdf->list_indent_first_level = 0;

		//Carrega css padr&atilde;o PDF
		//$stylesheet = file_get_contents("boleto.css");
		$stylesheet = file_get_contents("admin/libs/boleto/itau/boleto.css");
		$mpdf->Writehtml($stylesheet, 1);


		$dadosboleto["carteira"] 	= $vSCarteira;
		$dadosboleto["agencia"] 	= filter_var($vSAgencia, FILTER_SANITIZE_NUMBER_INT);
		$dadosboleto["conta"] 		= substr(filter_var($vSConta, FILTER_SANITIZE_NUMBER_INT),0,5);
		$dadosboleto["digito_conta"] = substr(filter_var($vSConta, FILTER_SANITIZE_NUMBER_INT),6,1);
		

		// INFORMACOES PARA O CLIENTE
		$vSInstrucoes = str_replace("[notafiscal]", $row["CTRNRODOCUMENTO"], $vSObservacoes);
		$vSInstrucoes = str_replace("[cobranca]", $row["CTRSEQUENCIAL"], $vSInstrucoes);

		$dadosboleto["instrucoes"] 	= $vSInstrucoes;
		$dadosboleto["instrucoes1"] = "";
		$dadosboleto["instrucoes2"] = "";
		$dadosboleto["instrucoes3"] = "";
		$dadosboleto["instrucoes4"] = "";

		$dadosboleto["nosso_numero"] 		 = $num_boleto;
		$dadosboleto["numero_documento"]	 = $num_boleto;	// Num do pedido ou nosso numero
		$dadosboleto["data_vencimento"] 	 = $vencimento; // Data de Vencimento do Boleto
		$dadosboleto["data_documento"] 		 = substr($emissao, 0, 10);// "27/02/2015"; // Data de emissão do Boleto
		$dadosboleto["data_processamento"] 	 = ""; // Data de processamento do boleto (opcional)
		$dadosboleto["valor_unitario"] 		 = $valor;
		$dadosboleto["valor"] 	             = $dadosboleto['valor_unitario']*$dadosboleto['quantidade'];
		$dadosboleto["valor_unitario"] 		 = formatar_moeda($valor, false); 	// Valor do Boleto, com v&iacute;rgula, sempre com duas casas depois da virgula
		$dadosboleto["valor"] 	             = formatar_moeda($dadosboleto['valor'], false);
		//agencia e conta
		//$agencia_conta                       = $dadosboleto["agencia"]."/".$dadosboleto["conta"];
		$agencia_conta 						 = $dadosboleto["agencia"]."/".$dadosboleto["conta"]."-".$dadosboleto["digito_conta"];
		// DADOS DO SEU CLIENTE
		$dadosboleto["sacado"] 	  	= "<b>$orgao</b>";
		$dadosboleto["endereco1"] 	= "$enderecoTXT - $cep - $bairro - $cidade - $estado";
		$dadosboleto["cpf_cnpj"] 	= "CPF/CNPJ: ".$cpf_cnpj;

		$b = new boleto();
		$b->banco_itau($dadosboleto);
		
		$vSHtmlDefault['body'] ='
					<br>
					<table cellspacing=0 cellpadding=0 width=700 border=0>
						<tbody>
							<tr>
								<td class=ct width=700><img height=1 src="/admin/libs/boleto/itau/imagens/6.gif" width=700 border=0></td>
							</tr>
							<tr>
								<td class=ct align="right" width=700><b class="cp">Recibo do Pagador</b></td>
							</tr>
						</tbody>
					</table>
					<table cellspacing=0 cellpadding=0 width=661 border=0>
					<tbody>
						<tr>
							<td class=cp width=137><div align=left><img src="/admin/libs/boleto/itau/imagens/logo-itau.jpg" width="135" height="36"></div></td>
							<td width=4 valign=bottom><img height=22 src=/admin/libs/boleto/itau/imagens/3.gif width=2 border=0></td>
							<td class=cpt width=63 valign=bottom><div align=center><font class=bc>341-7</font></div></td>
							<td width=4 valign=bottom><img height=22 src=/admin/libs/boleto/itau/imagens/3.gif width=2 border=0></td>
							<td class=ld align=right width=458 valign=bottom><span class=ld>'.$dadosboleto["linha_digitavel"].'&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
						</tr>
						<tr>
							<td colspan=5><img height=2 src=/admin/libs/boleto/itau/imagens/2.gif width=700 border=0></td>
						</tr>
					</tbody>
				</table>
				<table >
					<tbody>
						<tr>							
							<td class=ctBeneficiario valign=top width=290 height=13>Beneficiário</td>							
							<td class=ctBeneficiario2 valign=top width=120 height=13>CPF/CNPJ</td>							
							<td class=ctBeneficiario valign=top width=170 height=13>Sacador Avalista</td>							
							<td class=ctBeneficiarioRigth valign=top width=120 height=13>Vencimento</td>							
						</tr>
						<tr>							
							<td class=cp3 valign=top width=290 height=13>'.$dadosboleto["cedente"].'</td>							
							<td class=cp4 valign=top width=120 height=13>'.$dadosboleto["cpf_cnpj_cedente"].'</td>							
							<td class=cp3 valign=top width=170 height=13><!--Sacador Avalista--></td>							
							<td class=cp3Rigth valign=top width=120 height=13 align=center>'.$dadosboleto["data_vencimento"].'</td>							
						</tr>						
					</tbody>
				</table>
				<table>
					<tbody>
						<tr>							
							<td class=ctBeneficiarioRigth valign=top width=700 height=13>Endereço do Beneficiário/Sacador Avalista</td>							
						</tr>
						<tr>							
							<td class=cp3Rigth valign=top width=700 height=12>'.$dadosboleto["endereco"].', '.$dadosboleto["cidade_uf"].'</td>							
						</tr>						
					</tbody>
				</table>
				<table>
					<tbody>
						<tr>						
							<td class=ctBeneficiario valign=top width=120 height=13>Nosso Número</td>
							<td class=ctBeneficiario valign=top width=120 height=13>Carteira</td>
							<td class=ctBeneficiario valign=top width=50 height=13>Espécie</td>
							<td class=ctBeneficiario valign=top width=120 height=13>Quantidade</td>
							<td class=ctBeneficiario valign=top width=120 height=13>Valor</td>
							<td class=ctBeneficiarioRigth valign=top width=170 height=13>Agência/Código do Beneficiário</td>
						</tr>
						<tr>
							<td class=cp3 valign=top align=center width=120 height=12>'.$dadosboleto["nosso_numero"].'</td>
							<td class=cp3 valign=top align=center width=120 height=12>'.$dadosboleto["carteira"].'</td>
							<td class=cp3 valign=top align=center width=50 height=12>'.$dadosboleto["especie"].'</td>
							<td class=cp3 valign=top align=center width=120 height=12>'.$dadosboleto["quantidade"].'</td>
							<td class=cp3 valign=top align=center width=120 height=12>'.$dadosboleto['valor'].'</td>
							<td class=cp3Rigth valign=top align=center width=170 height=12>'.$agencia_conta.'</td>
						</tr>						
					</tbody>
				</table>
				<table>
					<tbody>
						<tr>
							<td class=ctBeneficiario valign=top width=120 height=13>Data de Documento</td>
							<td class=ctBeneficiario valign=top width=120 height=13>Número do Documento</td>
							<td class=ctBeneficiario valign=top width=100 height=13>Espécie do Documento</td>
							<td class=ctBeneficiario valign=top width=50 height=13>Aceite</td>
							<td class=ctBeneficiario valign=top width=120 height=13>Data de Processamento</td>
							<td class=ctBeneficiarioRigth valign=top width=190 height=13>Valor do Documento</td>
						</tr>
						<tr>
							<td class=cp3 valign=top align=center width=120 height=12>'.$dadosboleto["data_documento"].'</td>
							<td class=cp3 valign=top align=center width=120 height=12>'.$dadosboleto["numero_documento"].'</td>
							<td class=cp3 valign=top align=center width=100 height=12>'.$dadosboleto["especie_doc"].'</td>
							<td class=cp3 valign=top align=center width=50 height=12>'.$dadosboleto["aceite"].'</td>
							<td class=cp3 valign=top align=center width=120 height=12>'.$dadosboleto["data_processamento"].'</td>
							<td class=cp3Rigth valign=top align=center width=190 height=12>'.$dadosboleto["valor"].'</td>
						</tr>
					</tbody>
				</table>
				<table>
					<tbody>
						<tr>
							<td class=ct width=7 height=12></td>
							<td class=ct width=500></td>
							<td class=ct width=7 height=12></td>
							<td class=ct width=7 align=right height=12></td>
							<td class=ct width=144 valign=top></td>
							<td class=ct width=1 align=right height=12></td>
						</tr>
						<tr>
							<td class=ct width=7 height=12></td>
							<td class=ct width=500></td>
							<td class=ct width=7 height=12></td>
							<td class=ct width=7 align=right height=12><img height=12 src=/admin/libs/boleto/itau/imagens/2.gif width=1 border=0></td>
							<td class=ct width=144 valign=top><img height=1 src=/admin/libs/boleto/itau/imagens/2.gif width=144 border=0></td>
							<td class=ct width=1 align=right height=12><img height=12 src=/admin/libs/boleto/itau/imagens/2.gif width=1 border=0></td>
						</tr>
						<tr>
							<td class=ct width=7 height=12></td>
							<td class=ct width=500></td>
							<td class=ct width=7 height=12></td>
							<td class=ct width=7 align=right height=12><img height=12 src=/admin/libs/boleto/itau/imagens/1.gif width=1 border=0></td>
							<td class=ct width=144 align=center>Autentica&ccedil;&atilde;o mec&acirc;nica</td>
							<td class=ct width=1 align=right height=12><img height=12 src=/admin/libs/boleto/itau/imagens/1.gif width=1 border=0></td>
						</tr>
						<tr>
							<td width=7></td>
							<td width=500></td>
							<td width=7></td>
							<td width=7></td>
							<td width=144></td>
							<td width=1></td>
						</tr>
					</tbody>
				</table>
				
				<table cellspacing=0 cellpadding=0 width=700 border=0>
					<tr>
						<td class=ct width=700></td>
					</tr>
					<tbody>
						<tr>
							<td class=ct width=700><div align=left>Corte na linha pontilhada	<span class="cp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>	<span class="cp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
								</div>
							</td>
						</tr>
						<tr>
							<td class=ct width=700><img height=1 src=/admin/libs/boleto/itau/imagens/6.gif width=700 border=0></td>
						</tr>
					</tbody>
				</table>
				<!-- Inicia a parte inferior do boleto -->
				
				<table cellspacing=0 cellpadding=0 width=664 border=0>
					<tbody>
						<tr>
							<td class=cp width=137><div align=left><img SRC="/admin/libs/boleto/itau/imagens/logo-itau.jpg" WIDTH="136" HEIGHT="36"></div></td>
							<td width=4 valign=bottom><img height=22 src=/admin/libs/boleto/itau/imagens/3.gif width=2 border=0></td>
							<td class=cpt width=65 valign=bottom><div align=center><font class=bc>341-7</font></div></td>
							<td width=4 valign=bottom><img height=22 src=/admin/libs/boleto/itau/imagens/3.gif width=2 border=0></td>
							<td class=ld align=right width=456 valign=bottom>
								<span class=ld>'.$dadosboleto["linha_digitavel"].'&nbsp;&nbsp;&nbsp;&nbsp;</span>
							</td>
						</tr>
						<tr>
							<td colspan=5><img height=2 src=/admin/libs/boleto/itau/imagens/2.gif width=700 border=0></td>
						</tr>
					</tbody>
				</table>
				<table>
					<tbody>
						<tr>
							<td class=ctBeneficiario valign=top width=510 height=13>Local de pagamento</td>
							<td class=ctBeneficiarioRigth valign=top width=190 height=13>Vencimento</td>
						</tr>
						<tr>
							<td class=cn2 valign=top width=510 height=12>ATE O VENCIMENTO PAGUE PREFERENCIALMENTE NO ITAU<br>APOS O VENCIMENTO PAGUE SOMENTE NO ITAU</td>
							<td class=cp3Rigth valign=middle align=center width=190 height=12>'.$dadosboleto["data_vencimento"].'</td>
						</tr>
					</tbody>
				</table>
				<table>
					<tbody>
						<tr>
							<td class=ctBeneficiario valign=top width=390 height=13>Beneficiário</td>
							<td class=ctBeneficiario2 valign=top width=120 height=13>CPF/CNPJ</td>
							<td class=ctBeneficiarioRigth valign=top width=190 height=13>Ag&ecirc;ncia/C&oacute;digo Beneficiário</td>
						</tr>
						<tr>
							<td class=cp3 valign=top width=390 height=12>'.$dadosboleto["cedente"].'</td>
							<td class=cp4 valign=top width=120 height=12>'.$dadosboleto["cpf_cnpj_cedente"].'</td>
							<td class=cp3Rigth valign=top align=center width=190 height=12>'.$agencia_conta.'</td>
						</tr>
					</tbody>
				</table>
				<table>
					<tbody>
						<tr>
							<td class=ctBeneficiario valign=top width=120 height=13>Data do Documento</td>
							<td class=ctBeneficiario valign=top width=120 height=13>N&uacute;mero do Documento</td>
							<td class=ctBeneficiario valign=top width=110 height=13>Esp&eacute;cie Documento</td>
							<td class=ctBeneficiario valign=top width=40 height=13>Aceite</td>
							<td class=ctBeneficiario valign=top width=120 height=13>Data Processamento</td>
							<td class=ctBeneficiarioRigth valign=top width=190 height=13>Nosso N&uacute;mero</td>
						</tr>
						<tr>
							<td class=cp3 valign=top width=120 height=12 align=center>'.$dadosboleto["data_documento"].'</td>
							<td class=cp3 valign=top width=120 height=12 align=center>'.$dadosboleto["numero_documento"].'</td>
							<td class=cp3 valign=top width=110 height=12 align=center>'.$dadosboleto["especie"].'</td>
							<td class=cp3 valign=top width=40 height=12 align=center>'.$dadosboleto["aceite"].'</td>
							<td class=cp3 valign=top width=120 height=12 align=center>'.$dadosboleto["data_processamento"].'</td>
							<td class=cp3Rigth valign=top align=center width=190 height=12>'.$dadosboleto["nosso_numero"].'</td>
						</tr>
					</tbody>
				</table>
				<table>
					<tbody>
						<tr>
							<td class=ctBeneficiario valign=top width=100 height=13>Uso do Banco</td>
							<td class=ctBeneficiario valign=top width=100 height=13>Carteira</td>
							<td class=ctBeneficiario valign=top width=75 height=13>Esp&eacute;cie</td>
							<td class=ctBeneficiario valign=top width=115 height=13>Quantidade</td>
							<td class=ctBeneficiario valign=top width=120 height=13>Valor</td>
							<td class=ctBeneficiarioRigth valign=top width=190 height=13>(=) Valor do Documento</td>
						</tr>
						<tr>
							<td valign=top class=cp3 width=100 height=12 align=center >'.$dadosboleto["uso_banco"].'</td>
							<td class=cp3 valign=top width=100 align=center>'.$dadosboleto["carteira"].'</td>
							<td class=cp3 valign=top width=75 align=center>'.$dadosboleto["especie"].'</td>
							<td class=cp3 valign=top width=115 align=center>'.$dadosboleto["quantidade"].'</td>
							<td class=cp3 valign=top width=120 align=center>'.$dadosboleto["valor_unitario"].'</td>
							<td class=cp3Rigth valign=top align=center width=190 height=12>'.$dadosboleto["valor"].'</td>
						</tr>
					</tbody>
				</table>
				<table cellspacing=0 cellpadding=0 width=700 border=0>
					<tbody>
						<tr>							
							<td valign=top width=507 rowspan=5 class=cp2Instrucoes>
								Instruções de responsabilidade do BENEFICIÁRIO. Qualquer dúvida sobre este boleto, contate o beneficiário.<br>
								<span>
									'. $dadosboleto["instrucoes"].'<br>
									'. $dadosboleto["instrucoes1"].'<br>
									'. $dadosboleto["instrucoes2"].'<br>
									'. $dadosboleto["instrucoes3"].'<br>
									'. $dadosboleto["instrucoes4"].'<br>
									'. $dadosboleto["instrucoes5"].'<br>
								</span>
							</td>
							<td align=right width=193>
								<table>
									<tbody>
										<tr>
											<td class=ctBeneficiarioRigth valign=top width=190 height=13>(-) Desconto/Abatimentos</td>
										</tr>
										<tr>									
											<td class=cp3Rigth valign=top align=right width=190 height=14>&nbsp;&nbsp;</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>	
							<td align=right width=193>
								<table>
									<tbody>
										<tr>											
											<td class=ctBeneficiarioRigth valign=top width=190 height=13>&nbsp;&nbsp;</td>											
										</tr>
										<tr>											
											<td class=cp3Rigth valign=top align=right width=190 height=14>&nbsp;&nbsp;</td>											
										</tr>										
									</tbody>
								</table>
							</td>
						</tr>	
						<tr>	
							<td align=right width=193>
								<table>
									<tbody>
										<tr>
											<td class=ctBeneficiarioRigth valign=top width=190 height=13>(+) Mora/Multa</td>					
										</tr>
										<tr>
											<td class=cp3Rigth valign=top align=right width=190 height=14>&nbsp;&nbsp;</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>	
						<tr>	
							<td align=right width=193>
								<table>
									<tbody>
										<tr>											
											<td class=ctBeneficiarioRigth valign=top width=190 height=13>&nbsp;&nbsp;</td>											
										</tr>
										<tr>											
											<td class=cp3Rigth valign=top align=right width=190 height=14>&nbsp;&nbsp;</td>											
										</tr>										
									</tbody>
								</table>
							</td>
						</tr>	
						<tr>	
							<td align=right width=193>
								<table>
									<tbody>
										<tr>
											<td class=ctBeneficiarioRigth valign=top width=190 height=13>(=) Valor Cobrado</td>
										</tr>
										<tr>
											<td class=cp3Rigth valign=top align=right width=190 height=14>&nbsp;&nbsp;</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
				
				<table>
					<tbody>
						<tr>
							<td class=cpBeneficiarioTopo valign=top width=700 height=12>Pagador: '.$dadosboleto["sacado"].' &nbsp;&nbsp;&nbsp;CPF/CNPJ: '.$cpf_cnpj.'</td>
						</tr>
					</tbody>
				</table>
				<table>
					<tbody>
						<tr>
							<td class=cpBeneficiarioMeio valign=top width=700 height=12>Endereço: '.$dadosboleto["endereco1"].'</td>
						</tr>
					</tbody>
				</table>
				<table>
					<tbody>
						<tr>
							<td class=cpBeneRodape valign=top width=700 height=13>Sacador Avalista:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CNPJ:
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C&oacute;digo de baixa:</td>
						</tr>						
					</tbody>
				</table>
				<table cellSpacing=0 cellPadding=0 border=0 width=700>
					<tbody>
						<tr>
							<td class=ct width=7 height=12></td>
							<td class=ct width=350></td>
							<td class=cp width=309>
								<div align=right>
									Autentica&ccedil;&atilde;o mec&acirc;nica / <b>Ficha de Compensa&ccedil;&atilde;o</b>
								</div>
							</td>
						</tr>
						<tr>
							<td class=ct colspan=3></td>
						</tr>
					</tbody>
				</table>
				<table cellSpacing=0 cellPadding=0 width=666 border=0>
					<tbody>
						<tr>
							<td vAlign=bottom align=left height=50>'. fbarcodepdf($dadosboleto["codigo_barras"]) .'</td>
						</tr>
					</tbody>
				</table>
				';
		 // atualizar contas a receber com dados do boleto bancario		
		 /*
		 $SqlMain = 'UPDATE
                            CONTASARECEBER
                        SET
                            CTRNOSSONUMERO = "'.$dadosboleto["nosso_numero"].'",
							CBACODIGO = '.$_GET['vIConta'].'
                        WHERE
                            CTRCODIGO = '.$row["CTRCODIGO"];
         $RS_MAIN = sql_executa(vGBancoSite, $vConexao,$SqlMain);	*/

		$mpdf->Writehtml($vSHtmlDefault['body'], 2);



	$mpdf->Output("../gerados/boleto-".filterNumber($dadosboleto["nosso_numero"]).".pdf", "I");

	//echo $vSHtmlDefault["header"].$vSHtmlDefault["body"];	
?>