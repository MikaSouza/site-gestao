<?
// +----------------------------------------------------------------------+
// | BoletoPhp - Versão Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo está disponível sob a Licença GPL disponível pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Você deve ter recebido uma cópia da GNU Public License junto com     |
// | esse pacote; se não, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colaborações de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de João Prado Maia e Pablo Martins F. Costa				  |
// | 																	  |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+

// +---------------------------------------------------------------------------------+
// | Equipe Coordenação Projeto BoletoPhp: <boletophp@boletophp.com.br>              |
// | Desenvolvimento Boleto Banco do brasil: Daniel William Schultz / Leandro Maniezo|
// +---------------------------------------------------------------------------------+
?>

<!DOCTYPE HTML PUBLIC "-//W3C//Dtd HTML 4.0 Transitional//EN">
<HTML>
	<HEAD>
		<TITLE><? echo $dadosboleto["identificacao"]; ?></TITLE>
		<META http-equiv=Content-Type content="text/html; charset=windows-1252">
		<meta name="Generator" content="Projeto BoletoPHP - www.boletophp.com.br - Licença GPL" />
		<META content="MSHTML 6.00.2800.1400" name=GENERATOR>
		<style type="text/css">
		<!--
		.ti {font: 9px Arial, Helvetica, sans-serif}
		-->
		</style>
	</HEAD>
	<BODY>
		<STYLE>
			BODY {
				FONT: 10px Arial
			}
			.Titulo {
				FONT: 9px Arial Narrow; COLOR: navy
			}
			.Campo {
				FONT: 10px Arial; COLOR: black
			}
			td.Normal {
				FONT: 12px Arial; COLOR: black
			}
			td.Titulo {
				FONT: 9px Arial Narrow; COLOR: navy
			}
			td.Campo {
				FONT: bold 10px Arial; COLOR: black
			}
			td.CampoTitulo {
				FONT: bold 15px Arial; COLOR: navy
			}
		</STYLE>
		<style type="text/css">
			.quebrapagina {
			   page-break-before: always;
			}
		</style>

		<DIV align=center>
			<br />
			<table cellSpacing=0 cellPadding=0 width=666 border=0>
				<tbody>
					<tr>
						<td class=normal>
							<table width=666 cellspacing=5 cellpadding=0 border=0 align=Default>
								<tr>
									<td width=41><img SRC="https://dpm-rs.com.br/extranet/layout/images/logo_dpm_topo.gif"></td>
									<td class=ti width=455><? echo $dadosboleto["identificacao"]; ?>
										<? if ($dadosboleto["cpf_cnpj"] !="") echo $$dadosboleto["cpf_cnpj"];?><br>
										<? echo $dadosboleto["cpf_cnpj"]; ?><br>
										<? echo $dadosboleto["endereco"]; ?><br>
										<? echo $dadosboleto["cidade_uf"]; ?><br>
									</td>

									<td align=RIGHT width=150 class=ti>&nbsp;</td>

								</tr>
							</table>
							<p>
								<b>O pagamento deste boleto tamb&eacute;m poder&aacute; ser efetuado
									nos terminais de Auto-Atendimento BB.</b>
							</p>
							<b>Instru&ccedil;&otilde;es:</b><br>
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
			</table>
			<table cellSpacing=0 cellPadding=0 width=666 border=0>
				<tbody>
					<tr>
						<td class=titulo width=666>Corte na linha pontilhada</td>
					</tr>
				</tbody>
			</table>
			<table cellSpacing=0 cellPadding=0 width=666 border=0>
				<tbody>
					<tr>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
					</tr>
				</tbody>
			</table>
			<br><!--<br>-->
			<table cellSpacing=0 cellPadding=0 width=666 border=0>
				<tbody>
					<tr>
						<td class=campo width=150><img src="imagens/logobb.jpg" border=0></td>
						<td width=3><img height=22 src="imagens/imgbrrazu.gif" width=2 border=0></td>
						<td class=campotitulo align=middle width=49><?=$dadosboleto["codigo_banco_com_dv"]?></td>
						<td width=3><img height=22 src="imagens/imgbrrazu.gif" width=2 border=0></td>
						<td class=campotitulo align=right width=464><?=$dadosboleto["linha_digitavel"]?> &nbsp;&nbsp;&nbsp; </td>
					</tr>
					<tr>
						<td colSpan=5><img height=2 src="imagens/imgpxlazu.gif" width=666 border=0></td>
					</tr>
				</tbody>
			</table>
			<br>
			<table cellSpacing=0 cellPadding=0 border=0>
				<tbody>
					<tr>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=298 height=13>Cedente</td>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=126 height=13>Agência / Código do Cedente</td>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=34 height=13>Espécie</td>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=53 height=13>Quantidade</td>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=120 height=13>Nosso número</td>
					</tr>
					<tr>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top width=298 height=12><? echo $dadosboleto["cedente"]; ?>&nbsp;</td>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top align=right width=126 height=12><?=$dadosboleto["agencia_codigo"]?> &nbsp;</td>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top align=middle width=34 height=12><?=$dadosboleto["especie"]?>&nbsp;</td>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top align=middle width=53 height=12><?=$dadosboleto["quantidade"]?>&nbsp;</td>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top align=right width=120 height=12><?=$dadosboleto["nosso_numero"]?>&nbsp;</td>
					</tr>
					<tr>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=298 height=3><img height=1 src="imagens/imgpxlazu.gif" width=298 border=0></td>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=126 height=3><img height=1 src="imagens/imgpxlazu.gif" width=126 border=0></td>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=34 height=3><img height=1 src="imagens/imgpxlazu.gif" width=34 border=0></td>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=53 height=3><img height=1 src="imagens/imgpxlazu.gif" width=53 border=0></td>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=120 height=3><img height=1 src="imagens/imgpxlazu.gif" width=120 border=0></td>
					</tr>
				</tbody>
			</table>
			<table cellSpacing=0 cellPadding=0 border=0>
				<tbody>
					<tr>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=113 height=13>Número do documento</td>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=72 height=13>Contrato</td>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=132 height=13>CPF/CEI/CNPJ</td>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=134 height=13>Vencimento</td>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=180 height=13>Valor documento</td>
					</tr>
					<tr>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top width=113 height=12><?=$dadosboleto["numero_documento"]?>&nbsp;</td>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top width=72 height=12><?=$dadosboleto["contrato"]?>&nbsp;</td>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top width=132 height=12><?=$dadosboleto["cpf_cnpj"]?>&nbsp;</td>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top align=middle width=134 height=12><b><?=$dadosboleto["data_vencimento"]?></b>&nbsp;</td>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top align=right width=180 height=12><b><?=$dadosboleto["valor_boleto"]?></b>&nbsp;</td>
					</tr>
					<tr>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=113 height=3><img height=1 src="imagens/imgpxlazu.gif" width=113border=0></td>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7border=0></td>
						<td vAlign=top width=72 height=3><img height=1 src="imagens/imgpxlazu.gif" width=72border=0></td>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7border=0></td>
						<td vAlign=top width=132 height=3><img height=1 src="imagens/imgpxlazu.gif" width=132border=0></td>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7border=0></td>
						<td vAlign=top width=134 height=3><img height=1 src="imagens/imgpxlazu.gif" width=134border=0></td>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7border=0></td>
						<td vAlign=top width=180 height=3><img height=1 src="imagens/imgpxlazu.gif" width=180border=0></td>
					</tr>
				</tbody>
			</table>
			<table cellSpacing=0 cellPadding=0 border=0>
				<tbody>
					<tr>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=113 height=13>(-) Desconto / Abatimento</td>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=112 height=13>(-) Outras deduções</td>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=113 height=13>(+) Mora / Multa</td>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=113 height=13>(+) Outros acréscimos</td>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=180 bgColor=#ffffcc height=13>(=) Valor cobrado</td>
					</tr>
					<tr>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top align=right width=113 height=12>&nbsp;</td>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top align=right width=112 height=12>&nbsp;</td>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top align=right width=113 height=12>&nbsp;</td>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top align=right width=113 height=12>&nbsp;</td>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top align=right width=180 bgColor=#ffffcc height=12>&nbsp;</td>
					</tr>
					<tr>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=113 height=3><img height=1 src="imagens/imgpxlazu.gif" width=113 border=0></td>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=112 height=3><img height=1 src="imagens/imgpxlazu.gif" width=112 border=0></td>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=113 height=3><img height=1 src="imagens/imgpxlazu.gif" width=113 border=0></td>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=113 height=3><img height=1 src="imagens/imgpxlazu.gif" width=113 border=0></td>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=180 height=3><img height=1 src="imagens/imgpxlazu.gif" width=180 border=0></td>
					</tr>
				</tbody>
			</table>
			<table cellSpacing=0 cellPadding=0 border=0>
				<tbody>
					<tr>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=659 height=13>Sacado</td>
					</tr>
					<tr>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top width=659 height=12><?=$dadosboleto["sacado"]?> &nbsp;</td>
					</tr>
					<tr>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=659 height=3><img height=1 src="imagens/imgpxlazu.gif" width=659 border=0></td>
					</tr>
				</tbody>
			</table>
			<table cellSpacing=0 cellPadding=0 border=0>
				<tbody>
					<tr>
						<td class=titulo vAlign=top width=7 height=13></td>
						<td class=titulo vAlign=top width=7 height=13></td>
						<td class=titulo vAlign=top width=182 height=13>Autenticação mecânica - Recibo do Sacado</td></tr>
					<tr>
						<td vAlign=top width=7 height=3></td>
						<td vAlign=top width=564 height=3></td>
						<td vAlign=top width=7 height=3></td>
						<td vAlign=top width=88 height=3></td>
					</tr>
				</tbody>
			</table>
			<br><!--<br>-->
			<table cellSpacing=0 cellPadding=0 width=666 border=0>
				<tbody>
					<tr>
						<td class=titulo width=666>Corte na linha pontilhada</td>
					</tr>
				</tbody>
			</table>
			<table cellSpacing=0 cellPadding=0 width=666 border=0>
				<tbody>
					<tr>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
					</tr>
				</tbody>
			</table>
			<br><!--<br>-->
			<table cellSpacing=0 cellPadding=0 width=666 border=0>
				<tbody>
					<tr>
						<td class=campo width=150><img src="imagens/logobb.jpg" border=0></td>
						<td width=3><img height=22 src="imagens/imgbrrazu.gif" width=2 border=0></td>
						<td class=campotitulo align=middle width=49><?=$dadosboleto[ "codigo_banco_com_dv"]?></td>
						<td width=3><img height=22 src="imagens/imgbrrazu.gif" width=2 border=0></td>
						<td class=campotitulo align=right width=464><?=$dadosboleto[ "linha_digitavel"]?>
								&nbsp;&nbsp;&nbsp;
						</td>
					</tr>
					<tr>
						<td colSpan=5><img height=2 src="imagens/imgpxlazu.gif" width=666 border=0></td>
					</tr>
				</tbody>
			</table>
			<br>
			<table cellSpacing=0 cellPadding=0 border=0>
				<tbody>
					<tr>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0>				</td>
						<td class=titulo vAlign=top width=472 height=13>Local de pagamento</td>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0>				</td>
						<td class=titulo vAlign=top width=180 bgColor=#ffffcc height=13>Vencimento</td>
					</tr>
					<tr>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top width=472 height=12>QUALQUER BANCO ATÉ O VENCIMENTO&nbsp;</td>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top align=right width=180 bgColor=#ffffcc height=12>
							<b><?=$dadosboleto[ "data_vencimento"]?></b>					&nbsp;
						</td>
					</tr>
					<tr>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=472 height=3><img height=1 src="imagens/imgpxlazu.gif" width=472 border=0></td>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=180 height=3><img height=1 src="imagens/imgpxlazu.gif" width=180 border=0></td>
					</tr>
				</tbody>
			</table>
			<table cellSpacing=0 cellPadding=0 border=0>
				<tbody>
					<tr>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=472 height=13>Cedente</td>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=180 height=13>Agência/Código cedente</td>
					</tr>
					<tr>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top width=472 height=12><?=$dadosboleto[ "cedente"]?>	&nbsp;</td>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top align=right width=180 height=12><?=$dadosboleto[ "agencia_codigo"]?>	&nbsp;</td>
					</tr>
					<tr>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=472 height=3><img height=1 src="imagens/imgpxlazu.gif" width=472 border=0></td>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=180 height=3><img height=1 src="imagens/imgpxlazu.gif" width=180 border=0></td>
					</tr>
				</tbody>
			</table>
			<table cellSpacing=0 cellPadding=0 border=0>
				<tbody>
					<tr>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=93 height=13>Data do documento</td>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=173 height=13>N&ordm; documento</td>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=72 height=13>Espécie doc.</td>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=34 height=13>Aceite</td>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=72 height=13>Data process.</td>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=180 height=13>Nosso número</td>
					</tr>
					<tr>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top align=middle width=93 height=12><?=$dadosboleto[ "data_documento"]?>&nbsp;</td>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top width=173 height=12><?=$dadosboleto[ "numero_documento"]?>&nbsp;</td>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top align=middle width=72 height=12><?=$dadosboleto[ "especie_doc"]?>&nbsp;</td>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top align=middle width=34 height=12><?=$dadosboleto[ "aceite"]?>&nbsp;</td>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top align=middle width=72 height=12><?=$dadosboleto[ "data_processamento"]?>&nbsp;</td>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top align=right width=180 height=12><?=$dadosboleto[ "nosso_numero"]?>&nbsp;</td>
					</tr>
					<tr>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=93 height=3><img height=1 src="imagens/imgpxlazu.gif" width=93 border=0></td>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=173 height=3><img height=1 src="imagens/imgpxlazu.gif" width=173 border=0></td>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=72 height=3><img height=1 src="imagens/imgpxlazu.gif" width=72 border=0></td>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=34 height=3><img height=1 src="imagens/imgpxlazu.gif" width=34 border=0></td>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=72 height=3><img height=1 src="imagens/imgpxlazu.gif" width=72 border=0></td>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=180 height=3><img height=1 src="imagens/imgpxlazu.gif" width=180 border=0></td>
					</tr>
				</tbody>
			</table>
			<table cellSpacing=0 cellPadding=0 border=0>
				<tbody>
					<tr>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=93 bgColor=#ffffcc height=13>Uso do banco</td>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=93 height=13>Carteira</td>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=53 height=13>Espécie</td>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=133 height=13>Quantidade</td>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=72 height=13>x Valor</td>
						<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=titulo vAlign=top width=180 height=13>(=) Valor documento</td>
					</tr>
					<tr>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top width=93 bgColor=#ffffcc height=12>&nbsp;</td>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top align=middle width=93 height=12><?=$dadosboleto[ "carteira"]?>	<?=$dadosboleto[ "variacao_carteira"]?>		&nbsp;</td>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top align=middle width=53 height=12><?=$dadosboleto[ "especie"]?>	&nbsp;</td>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top align=middle width=53 height=12><?=$dadosboleto[ "quantidade"]?>	&nbsp;</td>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top align=right width=72 height=12><?=$dadosboleto[ "valor_unitario"]?>	&nbsp;</td>
						<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
						<td class=campo vAlign=top align=right width=180 height=12><b>	<?=$dadosboleto[ "valor_boleto"]?></b>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=93 height=3><img height=1 src="imagens/imgpxlazu.gif" width=93 border=0></td>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=93 height=3><img height=1 src="imagens/imgpxlazu.gif" width=93 border=0></td>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=53 height=3><img height=1 src="imagens/imgpxlazu.gif" width=53 border=0></td>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=133 height=3><img height=1 src="imagens/imgpxlazu.gif" width=133 border=0></td>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=72 height=3><img height=1 src="imagens/imgpxlazu.gif" width=72 border=0></td>
						<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
						<td vAlign=top width=180 height=3><img height=1 src="imagens/imgpxlazu.gif" width=180 border=0></td>
					</tr>
				</tbody>
			</table>
			<table cellSpacing=0 cellPadding=0 width=666 border=0>
				<tbody>
					<tr>
						<!--
						<td width=7 rowSpan=5></td>
						-->
						<td rowSpan=10 class=campo vAlign=top width=7 height=130>
							<img height=130 src="imagens/imgbrrlrj.gif" width=5 border=0>
						</td>
						<td vAlign=top width=447 rowSpan=5>
							<FONT class=titulo>Instruções (Texto de responsabilidade do cedente)</FONT>
							<br><!--<br>-->
							<FONT class=campo>
								<? echo $dadosboleto["instrucoes"];  ?><br>
								<? echo $dadosboleto["instrucoes1"]; ?><br>
								<? echo $dadosboleto["instrucoes2"]; ?><br>
								<? echo $dadosboleto["instrucoes3"]; ?><br>
								<? echo $dadosboleto["instrucoes4"]; ?><br>
							</FONT>
						</td>
						<td align=right width=212>
							<table cellSpacing=0 cellPadding=0 border=0>
								<tbody>
									<tr>
										<td class=titulo vAlign=top width=7 height=13></td>
										<td class=titulo vAlign=top width=18 height=13></td>
										<td class=titulo vAlign=top width=7 height=13><img height=13 src="imagens/imgbrrlrj.gif" width=5							border=0></td>
										<td class=titulo vAlign=top width=180 height=13>(-) Desconto / Abatimento</td>
									</tr>
									<tr>
										<td class=campo vAlign=top width=7 height=12></td>
										<td class=campo vAlign=top width=18 height=12>&nbsp;</td>
										<td class=campo vAlign=top width=7 height=12><img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
										<td class=campo vAlign=top align=right width=180 height=12>&nbsp;</td>
									</tr>
									<tr>
										<td vAlign=top width=7 height=3></td>
										<td vAlign=top width=18 height=3></td>
										<td vAlign=top width=7 height=3><img height=1 src="imagens/imgpxlazu.gif" width=7 border=0></td>
										<td vAlign=top width=180 height=3><img height=1 src="imagens/imgpxlazu.gif" width=180 border=0></td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
					<tr>
						<td align=right width=212>
							<table cellSpacing=0 cellPadding=0 border=0>
								<tbody>
									<tr>
										<td class=titulo vAlign=top width=7 height=13></td>
										<td class=titulo vAlign=top width=18 height=13></td>
										<td class=titulo vAlign=top width=7 height=13>
											<img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0>
										</td>
										<td class=titulo vAlign=top width=180 height=13>(-) Outras deduções</td>
									</tr>
									<tr>
										<td class=campo vAlign=top width=7 height=12></td>
										<td class=campo vAlign=top width=18 height=12>&nbsp;</td>
										<td class=campo vAlign=top width=7 height=12>
											<img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0>
										</td>
										<td class=campo vAlign=top align=right width=180 height=12>&nbsp;</td>
									</tr>
									<tr>
										<td vAlign=top width=7 height=3></td>
										<td vAlign=top width=18 height=3></td>
										<td vAlign=top width=7 height=3>
											<img height=1 src="imagens/imgpxlazu.gif" width=7 border=0>
										</td>
										<td vAlign=top width=180 height=3>
											<img height=1 src="imagens/imgpxlazu.gif" width=180 border=0>
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
					<tr>
						<td align=right width=212>
							<table cellSpacing=0 cellPadding=0 border=0>
								<tbody>
									<tr>
										<td class=titulo vAlign=top width=7 height=13></td>
										<td class=titulo vAlign=top width=18 height=13></td>
										<td class=titulo vAlign=top width=7 height=13>
											<img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0>
										</td>
										<td class=titulo vAlign=top width=180 height=13>(+) Mora / Multa</td>
									</tr>
									<tr>
										<td class=campo vAlign=top width=7 height=12></td>
										<td class=campo vAlign=top width=18 height=12>&nbsp;</td>
										<td class=campo vAlign=top width=7 height=12>
											<img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0></td>
										<td class=campo vAlign=top align=right width=180 height=12>&nbsp;</td>
									</tr>
									<tr>
										<td vAlign=top width=7 height=3></td>
										<td vAlign=top width=18 height=3></td>
										<td vAlign=top width=7 height=3>
											<img height=1 src="imagens/imgpxlazu.gif" width=7 border=0>
										</td>
										<td vAlign=top width=180 height=3>
											<img height=1 src="imagens/imgpxlazu.gif" width=180 border=0>
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
					<tr>
						<td align=right width=212>
							<table cellSpacing=0 cellPadding=0 border=0>
								<tbody>
									<tr>
										<td class=titulo vAlign=top width=7 height=13>
											<img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0>
										</td>
										<td class=titulo vAlign=top width=180 height=13>(+) Outros acréscimos</td>
									</tr>
									<tr>
										<td class=campo vAlign=top width=7 height=12>
											<img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0>
										</td>
										<td class=campo vAlign=top align=right width=180 height=12>&nbsp;</td>
									</tr>
									<tr>
										<td vAlign=top width=7 height=3>
											<img height=1 src="imagens/imgpxlazu.gif" width=7 border=0>
										</td>
										<td vAlign=top width=180 height=3>
											<img height=1 src="imagens/imgpxlazu.gif" width=180 border=0>
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
					<tr>
						<td align=right width=212>
							<table cellSpacing=0 cellPadding=0 border=0>
								<tbody>
									<tr>
										<td class=titulo vAlign=top width=7 height=13>
											<img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0>
										</td>
										<td class=titulo vAlign=top width=180 bgColor=#ffffcc height=13>(=) Valor cobrado</td>
									</tr>
									<tr>
										<td class=campo vAlign=top width=7 height=12>
											<img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0>
										</td>
										<td class=campo vAlign=top align=right width=180 bgColor=#ffffcc height=12>&nbsp;</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
			<table cellSpacing=0 cellPadding=0 width=666 border=0>
				<tbody>
					<tr>
						<td vAlign=top width=666 height=3>
							<img height=1 src="imagens/imgpxlazu.gif" width=666 border=0>
						</td>
					</tr>
				</tbody>
			</table>
			<table cellSpacing=0 cellPadding=0 border=0>
				<tbody>
					<tr>
						<td class=titulo vAlign=top width=7 height=13>
							<img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0>
						</td>
						<td class=titulo vAlign=top width=659 height=13>Sacado</td>
					</tr>
					<tr>
						<td class=campo vAlign=top width=7 height=36>
							<img height=36 src="imagens/imgbrrlrj.gif" width=5 border=0>
						</td>
						<td class=campo vAlign=top width=659 height=36>
							<?=$dadosboleto["sacado"]?><br>
							<?=$dadosboleto["endereco1"]?><br>
							<?=$dadosboleto["endereco2"]?>&nbsp;&nbsp;
						</td>
					</tr>
				</tbody>
			</table>
			<table cellSpacing=0 cellPadding=0 border=0>
				<tbody>
					<tr>
						<td class=titulo vAlign=top width=7 height=13>
							<img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0>
						</td>
						<td class=titulo vAlign=top width=659 height=13>Sacador/Avalista</td>
					</tr>
				</tbody>
			</table>
			<table cellSpacing=0 cellPadding=0 border=0>
				<tbody>
					<tr>
						<td class=campo vAlign=top width=7 height=12>
							<img height=12 src="imagens/imgbrrlrj.gif" width=5 border=0>
						</td>
						<td class=campo vAlign=top width=472 height=13>&nbsp;</td>
						<td class=titulo vAlign=top width=7 height=13>
							<img height=13 src="imagens/imgbrrlrj.gif" width=5 border=0>
						</td>
						<td class=titulo vAlign=top width=180 height=13>Cód. baixa</td>
					</tr>
					<tr>
						<td vAlign=top width=7 height=3>
							<img height=1 src="imagens/imgpxlazu.gif" width=7 border=0>
						</td>
						<td vAlign=top width=472 height=3>
							<img height=1 src="imagens/imgpxlazu.gif" width=472 border=0>
						</td>
						<td vAlign=top width=7 height=3>
							<img height=1 src="imagens/imgpxlazu.gif" width=7 border=0>
						</td>
						<td vAlign=top width=180 height=3>
							<img height=1 src="imagens/imgpxlazu.gif" width=180 border=0>
						</td>
					</tr>
				</tbody>
			</table>
			<table cellSpacing=0 cellPadding=0 border=0>
				<tbody>
					<tr>
						<!--
						<td class=titulo vAlign=top width=7 height=13></td>
						-->
						<td class=titulo vAlign=top width=456 height=13></td>
						<!--
						<td class=titulo vAlign=top width=7 height=13></td>
						<td class=titulo vAlign=top width=182 height=13>Autenticação mecânica - Ficha de Compensação</td>
						-->
						<td colspan=3 class=titulo vAlign=top align=left width=210 height=13>Autenticação mecânica - Ficha de Compensação</td>
					</tr>
				</tbody>
			</table>
			<table cellSpacing=0 cellPadding=0 width=666 border=0>
				<tbody>
					<tr>
						<td><? fbarcode($dadosboleto["codigo_barras"]); ?></td>
					</tr>
				</tbody>
			</table>
			<table cellSpacing=0 cellPadding=0 width=666 border=0>
				<tbody>
					<tr>
						<td class=titulo align=right width=666>Corte na linha pontilhada</td>
					</tr>
				</tbody>
			</table>
			<table cellSpacing=0 cellPadding=0 width=666 border=0>
				<tbody>
					<tr>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
						<td width=5><img height=1 src="imagens/imgpxlazu.gif" width=6 border=0></td>
						<td width=5></td>
					</tr>
				</tbody>
			</table>
			<br>
			<br>
		</DIV>
		<!--<br class="quebrapagina">-->
		<?php	if ($i > 0 && $i > sizeof($tupla)) { ?>
			<div class="quebrapagina">&nbsp;</div>
		<?php } ?>
	</BODY>
</HTML>
