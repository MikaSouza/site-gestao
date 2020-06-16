<?php

require_once 'funcoes_bb.php';
require_once 'admin/includes/constantes.php';
require_once 'admin/libs/boleto/banco-brasil/funcoes_bb.php';
require_once 'admin/transaction/transactionPedidos.php';
require_once 'admin/transaction/transactionPedidosxProdutos.php';
require_once 'admin/transaction/transactionEnderecos.php';
require_once 'admin/transaction/transactionClientes.php';
require_once 'admin/libs/mpdf/mpdf.php';
$img6 			= '/admin/libs/boleto/banco-brasil/imagens/6.gif';
$img3 			= '/admin/libs/boleto/banco-brasil/imagens/3.gif';
$img2 			= '/admin/libs/boleto/banco-brasil/imagens/2.gif';
$img1 			= '/admin/libs/boleto/banco-brasil/imagens/1.gif';
$logoBanco 		= '/admin/libs/boleto/banco-brasil/imagens/logo-bb.gif';
$logoEmpresa	= 'admin/imagens/logotipo.png';

$vSHtmlDefault = array();

$vSHtmlDefault['header'] = '
<div align="center">
	<table cellspacing=0 cellpadding=0 width=700 border=0>
		<tbody>
			<tr>
				<td class=ld>
					<table width=700 cellspacing=5 cellpadding=0 border=0 align=Default>
						<tr>
							<td width=210><img height="60" src='.$logoEmpresa.'></td>
							<td width=490>
								<p>
									'. $dadosboleto["cedente"].'<br/>
									'. $dadosboleto["cpf_cnpj_cedente"].'<br/>
									'. $dadosboleto["endereco"].'<br/>
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
							nos terminais de Auto-Atendimento Banrisul.</b>
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

					$vSHtmlDefault['body'] ='
					<br/>
					<table cellSpacing=0 cellPadding=0 width=700 border=0>
						<tbody>
							<tr>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
							</tr>
						</tbody>
					</table>
					<table cellSpacing=0 cellPadding=0 width=700 border=0>
						<tbody>
							<tr>
								<td class=cp width=151 height=22>
									<div align=left class="ld">
										<div align="center">
											<img src="/admin/libs/boleto/banco-brasil/imagens/logobb.jpg" width="150" height="40">
										</div>
									</div>
								</td>
								<td width=3 valign=bottom><img height=22 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrazu.gif" width=2 border=0></td>
								<td class="cpt" width=67 align="center" valign="bottom"><font class=bc>'. $dadosboleto["codigo_banco_com_dv"] .'</font></td>
								<td width=2 valign=bottom><img height=22 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrazu.gif" width=2 border=0></td>
								<td class=ld align=right width=443 valign=bottom>'. $dadosboleto["linha_digitavel"] .'&nbsp;&nbsp;&nbsp; </td>
							</tr>
							<tr>
								<td colspan=5 width=700 ><img height=2 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=700 border=0></td>
							</tr>
						</tbody>
					</table>
					<table cellSpacing=0 cellPadding=0 width=666 border=0>
						<tbody>
							<tr>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" vAlign="top" width=298 height=13>Cedente</td>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" vAlign="top" width=126 height=13>Ag&ecirc;ncia/C&oacute;digo cedente</td>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" vAlign="top" width=34  height=13>Esp&eacute;cie</td>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" vAlign="top" width=53  height=13>Quantidade</td>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" vAlign="top" width=120 height=13>Nosso n&uacute;mero</td>
							</tr>
							<tr>
								<td class="cp" vAlign="top" width=7   height=12><img height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" width=298 height=12>'. $dadosboleto["cedente"] .'&nbsp;</td>
								<td class="cp" vAlign="top" width=7   height=12><img height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" align="right" width=126 height=12>'. $dadosboleto["agencia_codigo"] .' &nbsp;</td>
								<td class="cp" vAlign="top" width=7   height=12><img height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" align="middle" width=34 height=12>'. $dadosboleto["especie"] .'&nbsp;</td>
								<td class="cp" vAlign="top" width=7   height=12><img height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" align="middle" width=53 height=12>'. $dadosboleto["quantidade"] .'&nbsp;</td>
								<td class="cp" vAlign="top" width=7   height=12><img height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" align="right" width=120 height=12>'. $dadosboleto["nosso_numero"] .'&nbsp;</td>
							</tr>
							<tr>
								<td vAlign="top" width=7   height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=7   border=0></td>
								<td vAlign="top" width=298 height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=298 border=0></td>
								<td vAlign="top" width=7   height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=7   border=0></td>
								<td vAlign="top" width=126 height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=126 border=0></td>
								<td vAlign="top" width=7   height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=7   border=0></td>
								<td vAlign="top" width=34  height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=34  border=0></td>
								<td vAlign="top" width=7   height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=7   border=0></td>
								<td vAlign="top" width=53  height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=53  border=0></td>
								<td vAlign="top" width=7   height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=7   border=0></td>
								<td vAlign="top" width=120 height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=120 border=0></td>
							</tr>
						</tbody>
					</table>
					<table cellSpacing=0 cellPadding=0 border=0>
						<tbody>
							<tr>
								<td class=ct vAlign=top width=7 height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class=ct vAlign=top colspan=3 width=113 height=13>N&uacute;mero do documento</td>
								<td class=ct vAlign=top width=7 height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class=ct vAlign=top width=72 height=13>Contrato</td>
								<td class=ct vAlign=top width=7 height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class=ct vAlign=top width=132 height=13>CPF/CEI/CNPJ</td>
								<td class=ct vAlign=top width=7 height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class=ct vAlign=top width=80 height=13>Vencimento</td>
								<td class=ct vAlign=top width=7 height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class=ct vAlign=top width=85 height=13>Valor documento</td>
							</tr>
							<tr>
								<td class="cp" vAlign="top" width=7   height=12><img height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" width=113 height=12 colspan=3>'. $dadosboleto["numero_documento"] .'&nbsp;</td>
								<td class="cp" vAlign="top" width=7   height=12><img height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" width=72  height=12>'. $dadosboleto["contrato"] .'&nbsp;</td>
								<td class="cp" vAlign="top" width=7   height=12><img height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" width=132 height=12>'. $dadosboleto["cpf_cnpj"] .'&nbsp;</td>
								<td class="cp" vAlign="top" width=7   height=12><img height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" align="middle" width=80 height=12><b>'. $dadosboleto["data_vencimento"] .'</b>&nbsp;</td>
								<td class="cp" vAlign="top" width=7   height=12><img height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" align="right" width=85 height=12><b>'. $dadosboleto["valor_boleto"] .'</b>&nbsp;</td>
							</tr>
							<tr>
								<td vAlign="top" width=7   height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=7   border=0></td>
								<td vAlign="top" width=113 height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=113 border=0></td>
								<td vAlign="top" width=7   height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=7   border=0></td>
								<td vAlign="top" width=72  height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=72  border=0></td>
								<td vAlign="top" width=7   height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=7   border=0></td>
								<td vAlign="top" width=132 height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=132 border=0></td>
								<td vAlign="top" width=7   height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=7   border=0></td>
								<td vAlign="top" width=134 height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=134 border=0></td>
								<td vAlign="top" width=7   height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=7   border=0></td>
								<td vAlign="top" width=80 height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=80 border=0></td>
								<td vAlign="top" width=7   height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=7   border=0></td>
								<td vAlign="top" width=85 height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=85 border=0></td>
							</tr>
						</tbody>
					</table>
					<table cellSpacing=0 cellPadding=0 border=0>
						<tbody>
							<tr>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" vAlign="top" width=113 height=13>(-) Desconto / Abatimento</td>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" vAlign="top" width=112 height=13>(-) Outras dedu&ccedil;&otilde;es</td>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" vAlign="top" width=113 height=13>(+) Mora / Multa</td>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" vAlign="top" width=113 height=13>(+) Outros acr&eacute;scimos</td>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" vAlign="top" width=180 bgColor="#ffffcc" height=13>(=) Valor cobrado</td>
							</tr>
							<tr>
								<td class="cp" vAlign="top" width=7 height=12><img height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" align=right width=113 height=12>&nbsp;</td>
								<td class="cp" vAlign="top" width=7 height=12><img height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" align=right width=112 height=12>&nbsp;</td>
								<td class="cp" vAlign="top" width=7 height=12><img height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" align=right width=113 height=12>&nbsp;</td>
								<td class="cp" vAlign="top" width=7 height=12><img height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" align=right width=113 height=12>&nbsp;</td>
								<td class="cp" vAlign="top" width=7 height=12><img height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" align=right width=180 bgColor="#ffffcc" height=12>&nbsp;</td>
							</tr>
							<tr>
								<td vAlign="top" width=7   height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=7   border=0></td>
								<td vAlign="top" width=113 height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=113 border=0></td>
								<td vAlign="top" width=7   height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=7   border=0></td>
								<td vAlign="top" width=112 height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=112 border=0></td>
								<td vAlign="top" width=7   height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=7   border=0></td>
								<td vAlign="top" width=113 height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=113 border=0></td>
								<td vAlign="top" width=7   height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=7   border=0></td>
								<td vAlign="top" width=113 height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=113 border=0></td>
								<td vAlign="top" width=7   height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=7   border=0></td>
								<td vAlign="top" width=180 height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=180 border=0></td>
							</tr>
						</tbody>
					</table>
					<table cellSpacing=0 cellPadding=0 width=700 border=0>
						<tbody>
							<tr>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" vAlign="top" width=693 height=13>Sacado</td>
							</tr>
							<tr>
								<td class="cp" vAlign="top" width=7   height=12><img height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" width=693 height=12>'. $dadosboleto["sacado"] .'&nbsp;</td>
							</tr>
							<tr>
								<td colspan=2 valign=top width=700 height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=700 border=0></td>
							</tr>
						</tbody>
					</table>
					<table cellSpacing=0 cellPadding=0 width=700 border=0>
						<tbody>
							<tr>
								<td class=ct valign=top width=7 height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class=ct valign=top width=659 height=13 colspan=2>Instru&ccedil;&otilde;es</td>
							</tr>
							<tr>
								<td class="cp" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" width=459   height=13>'.$dadosboleto["instrucoes"].'</td>
								<td class="ct" vAlign="top" align=right width=200 height=13>Autentica&ccedil;&atilde;o mec&acirc;nica</td>
							</tr>
							<tr>
								<td colspan=3 valign=top width=700 height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=700 border=0></td>
							</tr>
						</tbody>
					</table>
					<table cellSpacing=0 cellPadding=0 width=700 border=0>
						<tbody>
							<tr>
								<td class=ct width=700>&nbsp;</td>
							</tr>
							<tr>
								<td class=ct width=700 align="right">Corte na linha pontilhada</td>
							</tr>
							<tr>
								<td class=ct width=700><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/6.gif" width=700 border=0></td>
							</tr>
						</tbody>
					</table>
					<table cellSpacing=0 cellPadding=0 width=700 border=0>
						<tbody>
							<tr>
								<td class=cp width=151 valign=bottom>
									<div align=left class="ld">
										<div align="center">
											<img src="/admin/libs/boleto/banco-brasil/imagens/logobb.jpg" width="150" height="40">
										</div>
									</div>
								</td>
								<td width=3 valign=bottom><img height=22 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrazu.gif" width=2 border=0></td>
								<td class=cpt width=65 align=center valign=bottom><font class=bc>'. $dadosboleto[ "codigo_banco_com_dv"] .'</font></td>
								<td width=3 valign=bottom><img height=22 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrazu.gif" width=2 border=0></td>
								<td class=ld align=right width=445 valign=bottom><span class=ld>'. $dadosboleto[ "linha_digitavel"] .'</span></td>
							</tr>
							<tr>
								<td colspan=5 width=700><img height=2 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=700 border=0></td>
							</tr>
						</tbody>
					</table>
					<table cellSpacing=0 cellPadding=0 width=700 border=0>
						<tbody>
							<tr>
								<td class=ct valign=top width=7 height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class=ct valign=top width=493 height=13>Local de pagamento</td>
								<td class=ct valign=top width=7 height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class=ct valign=top width=193 height=13>Vencimento</td>
							</tr>
							<tr>
								<td class=cp valign=top width=7 height=12><img height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class=cp valign=top width=493 height=12>QUALQUER BANCO AT&Eacute; O VENCIMENTO&nbsp;</td>
								<td class=cp valign=top width=7 height=12><img height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class=cp valign=top align=right width=193 height=12>'. $dadosboleto[ "data_vencimento"] .'</td>
							</tr>
							<tr>
								<td colspan=4 width=700><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=700 border=0></td>
							</tr>
						</tbody>
					</table>
					<table cellSpacing=0 cellPadding=0 border=0>
						<tbody>
							<tr>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" vAlign="top" width=472 height=13>Cedente</td>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" vAlign="top" width=180 height=13>Ag&ecirc;ncia/C&oacute;digo cedente</td>
							</tr>
							<tr>
								<td class="cp" vAlign="top" width=7   height=12><img height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" width=472 height=12>'. $dadosboleto[ "cedente"] .'&nbsp;</td>
								<td class="cp" vAlign="top" width=7   height=12><img height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" align="right" width=180 height=12>'. $dadosboleto[ "agencia_codigo"] .'&nbsp;</td>
							</tr>
							<tr>
								<td colspan=4 width=700><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=700 border=0></td>
							</tr>
						</tbody>
					</table>
					<table cellSpacing=0 cellPadding=0 border=0>
						<tbody>
							<tr>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" vAlign="top" width=107 height=13>Data do documento</td>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" vAlign="top" width=126 height=13>N&ordm; documento</td>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" vAlign="top" width=74  height=13>Esp&eacute;cie doc.</td>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" vAlign="top" width=56  height=13>Aceite</td>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" vAlign="top" width=102 height=13>Data process.</td>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" vAlign="top" width=193 height=13>Nosso n&uacute;mero</td>
							</tr>
							<tr>
								<td class="cp" vAlign="top" width=7   height=12><img height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" width=107 align="middle" height=12>'. $dadosboleto[ "data_documento"] .'&nbsp;</td>
								<td class="cp" vAlign="top" width=7   height=12><img height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" width=126 height=12>'. $dadosboleto[ "numero_documento"] .'&nbsp;</td>
								<td class="cp" vAlign="top" width=7   height=12><img height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" width=74  align="middle" height=12>'. $dadosboleto[ "especie_doc"] .'&nbsp;</td>
								<td class="cp" vAlign="top" width=7   height=12><img height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" width=56  align="middle" height=12>'. $dadosboleto[ "aceite"] .'&nbsp;</td>
								<td class="cp" vAlign="top" width=7   height=12><img height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" width=102 align="middle" height=12>'. $dadosboleto[ "data_processamento"] .'&nbsp;</td>
								<td class="cp" vAlign="top" width=7   height=12><img height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" width=193 align="right"  height=12>'. $dadosboleto[ "nosso_numero"] .'&nbsp;</td>
							</tr>
							<tr>
								<td colspan=12 width=700><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=700 border=0></td>
							</tr>
						</tbody>
					</table>
					<table cellSpacing=0 cellPadding=0 border=0>
						<tbody>
							<tr>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" vAlign="top" width=93  height=13>Uso do banco</td>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" vAlign="top" width=93  height=13>Carteira</td>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" vAlign="top" width=53  height=13>Esp&eacute;cie</td>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" vAlign="top" width=133 height=13>Quantidade</td>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" vAlign="top" width=72  height=13>Valor</td>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" vAlign="top" width=180 height=13>(=) Valor documento</td>
							</tr>
							<tr>
								<td class="cp" vAlign="top" width=7   height=12><img  height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" width=93  bgColor=#ffffcc height=12>&nbsp;</td>
								<td class="cp" vAlign="top" width=7   height=12><img  height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" width=93  align="middle"  height=12>'. $dadosboleto[ "carteira"] .''. $dadosboleto[ "variacao_carteira"] .'&nbsp;</td>
								<td class="cp" vAlign="top" width=7   height=12><img  height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" width=53  align="middle"  height=12>'. $dadosboleto[ "especie"] .'&nbsp;</td>
								<td class="cp" vAlign="top" width=7   height=12><img  height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" width=53  align="middle"  height=12>'. $dadosboleto[ "quantidade"] .'&nbsp;</td>
								<td class="cp" vAlign="top" width=7   height=12><img  height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" width=72  align="right"   height=12>'. $dadosboleto[ "valor_unitario"] .'&nbsp;</td>
								<td class="cp" vAlign="top" width=7   height=12><img  height=12 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" width=180 align="right"   height=12><b>'. $dadosboleto[ "valor_boleto"] .'</b>&nbsp;</td>
							</tr>
							<tr>
								<td colspan=12 width=700><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=700 border=0></td>
							</tr>
						</tbody>
					</table>
					<table cellSpacing=0 cellPadding=0 width=700 border=0>
						<tbody>
							<tr>
								<td class=ct valign=top align=left width=7>
									<table cellspacing=0 align=left cellpadding=0 border=0>
										<tbody>
											<tr>
												<td align=left class=ct valign=top width=7 height=155><img height=155 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
											</tr>
										</tbody>
									</table>
								</td>
								<td vAlign="top" width=493 rowSpan=5 bprder=0>
									<font class="ct">Instru&ccedil;&otilde;es (Texto de responsabilidade do cedente)</font><br/>
									<span class="cp">
										'. $dadosboleto["instrucoes1"] .'<br/>
										'. $dadosboleto["instrucoes2"] .'<br/>
										'. $dadosboleto["instrucoes3"] .'<br/>
										'. $dadosboleto["instrucoes4"] .'<br/>
										'. $dadosboleto["instrucoes"]  .'<br/>
									</span>
								</td>
								<td align="right" width=200>
									<table cellSpacing=0 width=200 cellPadding=0 border=0>
										<tbody>
											<tr>
												<td class=ct valign=top width=7 height=25><img height=25 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>							border=0></td>
												<td class=ct valign=top width=193 height=25>(-) Desconto / Abatimentos</td>
											</tr>
											<tr>
												<td colspan=2 valign=top width=193 height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=193 border=0></td>
											</tr>
										</tbody>
									</table>
									<table cellspacing=0 width=200 cellpadding=0 border=0>
										<tbody>
											<tr>
												<td class="ct" valign=top width=7 height=25><img height=25 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
												<td class="ct" valign=top width=193 height=25>(-) Outras dedu&ccedil;&otilde;es</td>
											</tr>
											<tr>
												<td colspan=2 valign=top width=193 height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=193 border=0></td>
											</tr>
										</tbody>
									</table>
									<table cellspacing=0 width=200 cellpadding=0 border=0>
										<tbody>
											<tr>
												<td class=ct valign=top width=7 height=25><img height=25 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
												<td class=ct valign=top width=193 height=25>(+) Mora / Multa</td>
											</tr>
											<tr>
												<td colspan=2 valign=top width=193 height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=193 border=0></td>
											</tr>
										</tbody>
									</table>
									<table cellspacing=0 width=200 cellpadding=0 border=0>
										<tbody>
											<tr>
												<td class=ct valign=top width=7 height=25><img height=25 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
												<td class=ct valign=top width=193 height=25>(+) Outros acr&eacute;scimos</td>
											</tr>
											<tr>
												<td colspan=2 valign=top width=193 height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=193 border=0></td>
											</tr>
										</tbody>
									</table>
									<table cellspacing=0 width=200 cellpadding=0 border=0>
										<tbody>
											<tr>
												<td class=ct valign=top width=7 height=25><img height=25 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
												<td class=ct valign=top width=193 height=25>(=) Valor cobrado</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table cellSpacing=0 cellPadding=0 width=700 border=0>
						<tbody>
							<tr>
								<td vAlign="top" width=700 height=1>
									<img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=700 border=0>
								</td>
							</tr>
						</tbody>
					</table><br/>
					<table cellSpacing=0 cellPadding=0 width=700 border=0>
						<tbody>
							<tr>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" vAlign="top" width=693 height=13 colspan=3>Sacado</td>
							</tr>
							<tr>
								<td class="cp" valign=top width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" valign=top width=693 height=13 colspan=3>'. $dadosboleto["sacado"] .' - '. $dadosboleto["endereco2"] .'</td>
							</tr>
							<tr>
								<td class="cp" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="cp" vAlign="top" width=500 height=13>'. $dadosboleto["endereco1"] .'</td>
								<td class="ct" vAlign="top" width=7   height=13><img height=13 src="/admin/libs/boleto/banco-brasil/imagens/imgbrrlrj.gif" width=1 border=0></td>
								<td class="ct" valign="top" width=186 height=13>C&oacute;d. baixa</td>
							</tr>
						</tbody>
					</table>
					<table cellspacing=0 cellpadding=0 width=700 border=0>
						<tbody>
							<tr>
								<td valign=top width=700 height=1><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=700 border=0></td>
							</tr>
						</tbody>
					</table>
					<table cellSpacing=0 cellPadding=0 border=0 width=700>
						<tbody>
							<tr>
								<td class="ct" width=450>Sacador/Avalista</td>
								<td class="ct" width=250 align=right>
									Autentica&ccedil;&atilde;o mec&acirc;nica -	<b class=cp>Ficha de Compensa&ccedil;&atilde;o</b>
								</td>
							</tr>
						</tbody>
					</table>
					<table cellSpacing=0 cellPadding=0 width=666 border=0>
						<tbody>
							<tr>
								<td>'. fbarcode($dadosboleto["codigo_barras"]) .'</td>
							</tr>
						</tbody>
					</table>
					<table cellSpacing=0 cellPadding=0 width=700 border=0>
						<tbody>
							<tr>
								<td class="ct" align="right" width=700>Corte na linha pontilhada</td>
							</tr>
						</tbody>
					</table>
					<table cellSpacing=0 cellPadding=0 width=700 border=0>
						<tbody>
							<tr>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
								<td width=5><img height=1 src="/admin/libs/boleto/banco-brasil/imagens/imgpxlazu.gif" width=6 border=0></td>
								<td width=5></td>
							</tr>
						</tbody>
					</table>
					<span class="cn">&copy;
						<a href="http://www.algomais.art.br/" target="_blank">www.algomais.art.br</a>
					</span>
				</div>';


// mode, format, default_font_size, default_font, margin_left, margin_right, margin_top, margin_bottom, margin_header, margin_footer
$mpdf = new mPDF("c", "A4", "7", "helvetica", 10, 10, 48, 15, 8, 8);


$mpdf->SethtmlHeader(utf8_encode($vSHtmlDefault['header']));
$mpdf->SetDisplayMode("fullpage");
$mpdf->list_indent_first_level = 0;



$stylesheet = file_get_contents("admin/libs/mpdf/css/mpdf.css");
$mpdf->Writehtml($stylesheet, 1);
$mpdf->Writehtml($vSHtmlDefault['body'], 2);


$mpdf->Output("boleto-".$num_boleto.".pdf", "I");
// echo $vSHtmlDefault['header'].$vSHtmlDefault['body'];