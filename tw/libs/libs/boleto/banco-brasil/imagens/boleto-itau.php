<?
 
 
$V0842f867["data_vencimento"] = "30/08/2003"; 
$V0842f867["agencia"] = "0309"; 
$V0842f867["conta"] = "02431"; 
$V0842f867["digito_conta"] = "3"; 
$V0842f867["nosso_numero"] = "01001"; 
$V0842f867["carteira"] = "175"; 
$V0842f867["data_documento"] = "25/08/2003"; 
$V0842f867["valor"] = "1,00"; 
$V0842f867["numero_documento"]	= "01001"; 
 
$V0842f867["cpf_cnpj_cedente"] = "187.622.028-87";
$V0842f867["endereco"] = "Rua. empresa Teste";
$V0842f867["cidade"] = "Cotia - SP";
$V0842f867["cedente"] = "NetDinamica - Sistemas On-line";
 
$V0842f867["sacado"] = "Nome do Seu Cliente";
$V0842f867["endereco1"] = "Rua Teste do Seu Cliente";
$V0842f867["endereco2"] = "São Paulo - SP- CEP: 06130-000";
 
$V0842f867["instrucoes"] = ""; 
$V0842f867["instrucoes1"] = ""; 
$V0842f867["instrucoes2"] = "";
$V0842f867["instrucoes3"] = "";
$V0842f867["instrucoes4"] = "";
$V0842f867["instrucoes5"] = "";
$V0842f867["data_processamento"]	= "";
$V0842f867["quantidade"] = "";
$V0842f867["valor_unitario"] = "";
  
include("funcoes-itau.php"); 
$V92eb5ffe = new F82ec0de5();
$V0842f867["aceite"] = "N"; 
$V0842f867["uso_banco"] = ""; 
$V0842f867["especie"] = "R$"; 
$V92eb5ffe->banco_itau($V0842f867);
?>
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.0 Transitional//EN'>
<HTML>
<HEAD>
<TITLE>Boleto Banco Itau em ASP ou PHP - NetDinamica.com.br</TITLE><META http-equiv=Content-Type content=text/html; charset=windows-1252><meta name=GENERATOR content=NetDinamica><style type=text/css><META NAME="keywords" CONTENT="Boleto, Dinamico, PHP, ASP, Itau, Bradesco, HSBC, Real, Banespa, Unibanco, V4ab10179 do Brasil, Sistemas, Sites, CobrançV0cc175b9 Bancaria"> <META NAME="description" CONTENT="Sistema para criação de boletos on-lines código fonte em PHP ou ASP, como usar boletos bancarios.">
<!--.cp { font: bold 10px Arial; color: black}
<!--.ti { font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style> 
</HEAD>
<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0>
<table width=666 cellspacing=0 cellpadding=0 border=0><tr><td valign=top class=cp><DIV ALIGN="CENTER">Instruções 
de Impressão</DIV></TD></TR><TR><TD valign=top class=ti><DIV ALIGN="CENTER">Imprimir 
em impressora jato de tinta (ink jet) ou laser em qualidade normal. (Não use modo 
econômico). <BR>Utilize folha A4 (210 x 297 mm) ou Carta (216 x 279 mm) - Corte 
na linha indicada<BR></DIV></td></tr></table><br><table cellspacing=0 cellpadding=0 width=666 border=0><TBODY><TR><TD class=ct width=666><img height=1 src=imagens/6.gif width=665 border=0></TD></TR><TR><TD class=ct width=666><div align=right><b class=cp>Recibo 
do Sacado</b></div></TD></tr></tbody></table><table width=666 cellspacing=5 cellpadding=0 border=0><tr><td width=41></TD></tr></table><table width=666 cellspacing=5 cellpadding=0 border=0 align=Default><tr> 
 <td width=41> <a href="http://www.netdinamica.com.br" target="_blank"><IMG SRC="imagens/logo-netdinamica.gif" WIDTH="150" HEIGHT="60" border="0"></a></td><td class=ti width=455> 
<? echo $V0842f867["cedente"]; ?><br> <? echo $V0842f867["endereco"]; ?><br> <? echo $V0842f867["cidade"]; ?><br> 
<br> </td><td align=RIGHT width=150 class=ti> <div align=right></div></td></tr></table><BR><table cellspacing=0 cellpadding=0 width=661 border=0><tbody><tr><td class=cp width=137>
 <div align=left><img src="imagens/logo-itau.jpg" width="135" height="36"></div></td><td width=4 valign=bottom><img height=22 src=imagens/3.gif width=2 border=0></td><td class=cpt width=63 valign=bottom> 
 <div align=center><font class=bc>341-7</font></div></td><td width=4 valign=bottom><img height=22 src=imagens/3.gif width=2 border=0></td><td class=ld align=right width=458 valign=bottom><span class=ld> 
<?=$V0842f867["linha_digitavel"]?>
&nbsp;&nbsp;&nbsp;&nbsp; </span></td>
</tr><tr><td colspan=5><img height=2 src=imagens/2.gif width=666 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=298 height=13>Cedente</td><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=126 height=13>Agência/Código 
do Cedente</td><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=34 height=13>Espécie</td><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=53 height=13>Quantidade</td><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=120 height=13>Nosso 
número</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top width=298 height=12> 
<?=$V0842f867["cedente"]?> </td><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top width=126 height=12> 
<?=$V0842f867["agencia_codigo"]?> </td><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top width=34 height=12> 
<?=$V0842f867["especie"]?> </td><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top width=53 height=12> 
<?=$V0842f867["quantidade"]?> </td><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top align=right width=120 height=12> 
<?=$V0842f867["nosso_numero"]?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
</tr><tr><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=298 height=1><img height=1 src=imagens/2.gif width=298 border=0></td><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=126 height=1><img height=1 src=imagens/2.gif width=126 border=0></td><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=34 height=1><img height=1 src=imagens/2.gif width=34 border=0></td><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=53 height=1><img height=1 src=imagens/2.gif width=53 border=0></td><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=120 height=1><img height=1 src=imagens/2.gif width=120 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top colspan=3 height=13>Número 
do documento</td><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=132 height=13>CPF/CNPJ</td><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=134 height=13>Vencimento</td><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=180 height=13>Valor 
documento</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top colspan=3 height=12> 
<?=$V0842f867["numero_documento"]?> </td><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top width=132 height=12> 
<?=$V0842f867["cpf_cnpj_cedente"]?> </td><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top width=134 height=12> 
<?=$V0842f867["data_vencimento"]?> </td><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top align=right width=180 height=12> 
<?=$V0842f867["valor"]?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
</tr><tr><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=113 height=1><img height=1 src=imagens/2.gif width=113 border=0></td><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=72 height=1><img height=1 src=imagens/2.gif width=72 border=0></td><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=132 height=1><img height=1 src=imagens/2.gif width=132 border=0></td><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=134 height=1><img height=1 src=imagens/2.gif width=134 border=0></td><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=180 height=1><img height=1 src=imagens/2.gif width=180 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=113 height=13>(-) 
Desconto / Abatimentos</td><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=112 height=13>(-) 
Outras deduções</td><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=113 height=13>(+) 
Mora / Multa</td><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=113 height=13>(+) 
Outros acréscimos</td><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=180 height=13>(=) 
Valor cobrado</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top align=right width=113 height=12></td><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top align=right width=112 height=12></td><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top align=right width=113 height=12></td><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top align=right width=113 height=12></td><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top align=right width=180 height=12></td></tr><tr><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=113 height=1><img height=1 src=imagens/2.gif width=113 border=0></td><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=112 height=1><img height=1 src=imagens/2.gif width=112 border=0></td><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=113 height=1><img height=1 src=imagens/2.gif width=113 border=0></td><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=113 height=1><img height=1 src=imagens/2.gif width=113 border=0></td><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=180 height=1><img height=1 src=imagens/2.gif width=180 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=659 height=13>Sacado</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top width=659 height=12> 
<?=$V0842f867["sacado"]?> </td></tr><tr><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=659 height=1><img height=1 src=imagens/2.gif width=659 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct width=7 height=12></td><td class=ct width=500 >Instruções</td><td class=ct width=21 height=12></td><td class=ct width=138 >Autenticação 
mecânica</td></tr><tr><td width=7 ></td><td width=500 ></td><td width=21 ></td><td width=138 ></td></tr></tbody></table><table cellspacing=0 cellpadding=0 width=666 border=0><tbody><tr><td width=7></td><td width=500 class=cp> 
<?=$V0842f867["instrucoes"]?> </td><td width=159></td></tr></tbody></table><table cellspacing=0 cellpadding=0 width=666 border=0><tr><td class=ct width=666></td></tr><tbody><tr><td class=ct width=666> 
<div align=right>Corte na linha pontilhada<span class="cp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="cp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></div></td></tr><tr><td class=ct width=666><img height=1 src=imagens/6.gif width=665 border=0></td></tr></tbody></table><br><br><table cellspacing=0 cellpadding=0 width=664 border=0><tbody><tr><td class=cp width=137>
 <div align=left><IMG SRC="imagens/logo-itau.jpg" WIDTH="136" HEIGHT="36"></div></td><td width=4 valign=bottom><img height=22 src=imagens/3.gif width=2 border=0></td><td class=cpt width=65 valign=bottom> 
 <div align=center><font class=bc>341-7</font></div></td><td width=4 valign=bottom><img height=22 src=imagens/3.gif width=2 border=0></td><td class=ld align=right width=456 valign=bottom><span class=ld> 
<?=$V0842f867["linha_digitavel"]?>
&nbsp;&nbsp;&nbsp;&nbsp; </span></td>
</tr><tr><td colspan=5><img height=2 src=imagens/2.gif width=666 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=472 height=13>Local 
de pagamento</td><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=180 height=13>Vencimento</td></tr><tr>
 <td class=cp valign=top width=7 height=12><img height=25 src=imagens/1.gif width=1 border=0></td><td class=cn valign=top width=472 height=12>AT&Eacute; O VENCIMENTO, PREFERENCIALMENTE 
 NO ITAU OU BANERJ<br>
 AP&Oacute;S O VENCIMENTO, SOMENTE NO ITA&Uacute; OU BANERJ</td><td class=cp valign=top width=7 height=12><img height=25 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top align=right width=180 height=12> 
<?=$V0842f867["data_vencimento"]?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
</tr><tr><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=472 height=1><img height=1 src=imagens/2.gif width=472 border=0></td><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=180 height=1><img height=1 src=imagens/2.gif width=180 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=472 height=13>Cedente</td><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=180 height=13>Agência/Código 
cedente</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top width=472 height=12> 
<?=$V0842f867["cedente"]?> </td><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top align=right width=180 height=12> 
<?=$V0842f867["agencia_codigo"]?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
</tr><tr><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=472 height=1><img height=1 src=imagens/2.gif width=472 border=0></td><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=180 height=1><img height=1 src=imagens/2.gif width=180 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13> 
<img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=113 height=13>Data 
do documento</td><td class=ct valign=top width=7 height=13> <img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=163 height=13>N<u>o</u> 
documento</td><td class=ct valign=top width=7 height=13> <img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=62 height=13>Espécie 
doc.</td><td class=ct valign=top width=7 height=13> <img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=34 height=13>Aceite</td><td class=ct valign=top width=7 height=13> 
<img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=72 height=13>Data 
processamento</td><td class=ct valign=top width=7 height=13> <img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=180 height=13>Nosso 
número</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top width=113 height=12><div align=left> 
<?=$V0842f867["data_documento"]?> </div></td><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top width=163 height=12> 
<?=$V0842f867["numero_documento"]?> </td><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top width=62 height=12><div align=left> 
<?=$V0842f867["especie"]?> </div></td><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top width=34 height=12><div align=left> 
<?=$V0842f867["aceite"]?> </div></td><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top width=72 height=12><div align=left> 
<?=$V0842f867["data_processamento"]?> </div></td><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top align=right width=180 height=12> 
<?=$V0842f867["nosso_numero"]?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
</tr><tr><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=113 height=1><img height=1 src=imagens/2.gif width=113 border=0></td><td valign=top width=7 height=1> 
<img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=163 height=1><img height=1 src=imagens/2.gif width=163 border=0></td><td valign=top width=7 height=1> 
<img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=62 height=1><img height=1 src=imagens/2.gif width=62 border=0></td><td valign=top width=7 height=1> 
<img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=34 height=1><img height=1 src=imagens/2.gif width=34 border=0></td><td valign=top width=7 height=1> 
<img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=72 height=1><img height=1 src=imagens/2.gif width=72 border=0></td><td valign=top width=7 height=1> 
<img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=180 height=1> 
<img height=1 src=imagens/2.gif width=180 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr> 
<td class=ct valign=top width=7 height=13> <img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top COLSPAN="3" height=13>Uso 
do banco </td><td class=ct valign=top height=13 width=7> <img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=83 height=13>Carteira</td><td class=ct valign=top height=13 width=7> 
<img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=53 height=13>Espécie</td><td class=ct valign=top height=13 width=7> 
<img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=123 height=13>Quantidade</td><td class=ct valign=top height=13 width=7> 
<img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=72 height=13> 
Valor </td><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=180 height=13>(=) 
Valor documento</td></tr><tr> <td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td valign=top class=cp height=12 COLSPAN="3"><div align=left> 
<?=$V0842f867["uso_banco"]?> </div></td><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top width=83> 
<div align=left> <?=$V0842f867["carteira"]?> </div></td><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top width=53><div align=left> 
<?=$V0842f867["especie"]?> </div></td><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top width=123> 
<?=$V0842f867["quantidade"]?> </td><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top width=72> 
<?=$V0842f867["valor_unitario"]?> </td><td class=cp valign=top width=7 height=12> 
<img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top align=right width=180 height=12> 
<?=$V0842f867["valor"]?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
</tr><tr><td valign=top width=7 height=1> <img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=75 border=0></td><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=31 height=1><img height=1 src=imagens/2.gif width=31 border=0></td><td valign=top width=7 height=1> 
<img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=83 height=1><img height=1 src=imagens/2.gif width=83 border=0></td><td valign=top width=7 height=1> 
<img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=53 height=1><img height=1 src=imagens/2.gif width=53 border=0></td><td valign=top width=7 height=1> 
<img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=123 height=1><img height=1 src=imagens/2.gif width=123 border=0></td><td valign=top width=7 height=1> 
<img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=72 height=1><img height=1 src=imagens/2.gif width=72 border=0></td><td valign=top width=7 height=1> 
<img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=180 height=1><img height=1 src=imagens/2.gif width=180 border=0></td></tr></tbody> 
</table><table cellspacing=0 cellpadding=0 width=666 border=0><tbody><tr><td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left><tbody> 
<tr> <td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td></tr><tr> 
<td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td></tr><tr> 
<td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=1 border=0></td></tr></tbody></table></td><td valign=top width=468 rowspan=5><font class=ct>Instruções 
(Texto de responsabilidade do cedente)</font><br><span class=cp> <? echo $V0842f867["instrucoes1"]; ?><br> 
<? echo $V0842f867["instrucoes2"]; ?><br> <? echo $V0842f867["instrucoes3"]; ?><br> <? echo $V0842f867["instrucoes4"]; ?><br> 
<? echo $V0842f867["instrucoes5"]; ?><br> </span></td><td align=right width=188><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=180 height=13>(-) 
Desconto / Abatimentos</td></tr><tr> <td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top align=right width=180 height=12></td></tr><tr> 
<td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=180 height=1><img height=1 src=imagens/2.gif width=180 border=0></td></tr></tbody></table></td></tr><tr><td align=right width=10> 
<table cellspacing=0 cellpadding=0 border=0 align=left><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td></tr><tr><td valign=top width=7 height=1> 
<img height=1 src=imagens/2.gif width=1 border=0></td></tr></tbody></table></td><td align=right width=188><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=180 height=13>(-) 
Outras deduções</td></tr><tr><td class=cp valign=top width=7 height=12> <img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top align=right width=180 height=12></td></tr><tr><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=180 height=1><img height=1 src=imagens/2.gif width=180 border=0></td></tr></tbody></table></td></tr><tr><td align=right width=10> 
<table cellspacing=0 cellpadding=0 border=0 align=left><tbody><tr><td class=ct valign=top width=7 height=13> 
<img height=13 src=imagens/1.gif width=1 border=0></td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td></tr><tr><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=1 border=0></td></tr></tbody></table></td><td align=right width=188> 
<table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=180 height=13>(+) 
Mora / Multa</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top align=right width=180 height=12></td></tr><tr> 
<td valign=top width=7 height=1> <img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=180 height=1> 
<img height=1 src=imagens/2.gif width=180 border=0></td></tr></tbody></table></td></tr><tr><td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left><tbody><tr> 
<td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td></tr><tr><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=1 border=0></td></tr></tbody></table></td><td align=right width=188> 
<table cellspacing=0 cellpadding=0 border=0><tbody><tr> <td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=180 height=13>(+) 
Outros acréscimos</td></tr><tr> <td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top align=right width=180 height=12></td></tr><tr><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=180 height=1><img height=1 src=imagens/2.gif width=180 border=0></td></tr></tbody></table></td></tr><tr><td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td></tr></tbody></table></td><td align=right width=188><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=180 height=13>(=) 
Valor cobrado</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top align=right width=180 height=12></td></tr></tbody> 
</table></td></tr></tbody></table><table cellspacing=0 cellpadding=0 width=666 border=0><tbody><tr><td valign=top width=666 height=1><img height=1 src=imagens/2.gif width=666 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=659 height=13>Sacado</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top width=659 height=12> 
<?=$V0842f867["sacado"]?> </td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=cp valign=top width=7 height=12><img height=12 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top width=659 height=12> 
<?=$V0842f867["endereco1"]?> </td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=cp valign=top width=472 height=13> 
<?=$V0842f867["endereco2"]?> </td><td class=ct valign=top width=7 height=13><img height=13 src=imagens/1.gif width=1 border=0></td><td class=ct valign=top width=180 height=13>Cód. 
baixa</td></tr><tr><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=472 height=1><img height=1 src=imagens/2.gif width=472 border=0></td><td valign=top width=7 height=1><img height=1 src=imagens/2.gif width=7 border=0></td><td valign=top width=180 height=1><img height=1 src=imagens/2.gif width=180 border=0></td></tr></tbody></table><TABLE cellSpacing=0 cellPadding=0 border=0 width=666><TBODY><TR><TD class=ct width=7 height=12></TD><TD class=ct width=409 >Sacador/Avalista</TD><TD class=ct width=250 ><div align=right>Autenticação 
mecânica - <b class=cp>Ficha de Compensação&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><span class="cp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></div></TD></TR><TR><TD class=ct colspan=3 ></TD></tr></tbody></table><TABLE cellSpacing=0 cellPadding=0 width=666 border=0><TBODY><TR><TD vAlign=bottom align=left height=50> 
<? Fe51a82ef($V0842f867["codigo_barras"]); ?> </TD></tr></tbody></table><TABLE cellSpacing=0 cellPadding=0 width=666 border=0><TR><TD class=ct width=666></TD></TR><TBODY><TR><TD class=ct width=666><div align=right>Corte 
na linha pontilhada<span class="cp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="cp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></div></TD></TR><TR><TD class=ct width=666><img height=1 src=imagens/6.gif width=665 border=0></TD></tr></tbody></table><SPAN CLASS="cn">&copy; 
<A HREF="http://www.netdinamica.com.br/boleto" TARGET="_blank">www.netdinamica.com.br/boleto 
</A></SPAN><br> 
</BODY></HTML>