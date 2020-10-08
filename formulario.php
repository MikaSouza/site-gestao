<?php
$vSTitulo = 'Preencha os dados';
$vSName = 'formulario';
require_once 'header.php';
require_once 'tw/transaction/transactionFormulario.php';
if ($_SESSION['SI_USUCODIGO'] > 0) {
	$vROBJETO = fill_InformacoesPreliminares($_SESSION['SI_USUCODIGO']); //CLICODIGO
	$vIOid = $vROBJETO['FORCODIGO'];
}	
?>
<!-- Start Bottom Header -->
<div class="page-area">
    <div class="breadcumb-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb text-center">
                    <div class="section-headline white-headline text-center">
                        <h3>INFORMAÇÕES PRELIMINARES PARA INÍCIO DAS ATIVIDADES!</h3>
                    </div>
                    <ul>
                        <li class="home-bread">Início</li>
                        <li>Formulário!</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Header -->

<div class="tab-area fix area-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="tab-menu">
					<!-- Start Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="active">
							<a href="#p-view-1" role="tab" data-toggle="tab">
								<span class="cha-title">Dados Gerais</span>
							</a>
						</li>
						<li>
							<a href="#p-view-2" role="tab" data-toggle="tab">
								<span class="cha-title">Responsável</span>
							</a>
						</li>
						<li>
							<a href="#p-view-3" role="tab" data-toggle="tab">
								<span class="cha-title">Membros</span>
							</a>
						</li>
						<li>
							<a href="#p-view-4" role="tab" data-toggle="tab">
								<span class="cha-title">Atividades</span>
							</a>
						</li>
					</ul>
					<!-- End Nav tabs -->
				</div>
			</div>			
			<form class="contact-form" id="formFormulario" name="formFormulario" method="POST" action="enviarFormulario">
			<div class="col-md-12 col-sm-12 col-xs-12">				
				<div class="tab-content">
					<!--Start Tab Content -->
					<div class="tab-pane active" id="p-view-1" >
						<div class="tab-inner">
							<div class="single-machine row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="row">																				
										<!-- Dados Gerais -->
										<div class="col-md-12 col-sm-12 col-xs-12">
											<label>Nome do Ente</label><br>
											<input type="text" class="form-control" id="vSFORNOMEDOENTE" name="vSFORNOMEDOENTE" value="<?= ($vIOid > 0 ? $vROBJETO['FORNOMEDOENTE'] : ''); ?>" placeholder="Insira o Nome do Ente">
											<div class="help-block with-errors"></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<label>Número de habitantes do município</label><br>
											<input type="text" class="form-control" id="vSFORNUMHABMUNICIPIO" name="vSFORNUMHABMUNICIPIO" value="<?= ($vIOid > 0 ? $vROBJETO['FORNUMHABMUNICIPIO'] : ''); ?>" placeholder="Insira o Número de habitantes do município">
											<div class="help-block with-errors"></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<label>Valor do orçamento anual</label><br>
											<input type="text" class="form-control" id="vMFORVALORCANUAL" name="vMFORVALORCANUAL" value="<?= ($vIOid > 0 ? $vROBJETO['FORVALORCANUAL'] : ''); ?>" placeholder="Insira o Valor do orçamento anual">
											<div class="help-block with-errors"></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<label>Número de servidores (inclui agentes políticos e ccs)</label><br>
											<input type="text" class="form-control" id="vSFORNUMSERVIDORES" name="vSFORNUMSERVIDORES" value="<?= ($vIOid > 0 ? $vROBJETO['FORNUMSERVIDORES'] : ''); ?>" placeholder="Insira o Número de servidores (inclui agentes políticos e ccs)">
											<div class="help-block with-errors"></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<label>Descrever a Lei que instituiu o Sistema de Controle Interno e suas alterações, anexando cópia</label><br>
											<input type="text" class="form-control" id="vSFORDESCLEI" name="vSFORDESCLEI" value="<?= ($vIOid > 0 ? $vROBJETO['FORDESCLEI'] : ''); ?>" placeholder="Descreva">
											<div class="help-block with-errors"></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<label>A Unidade de Controle Interno possui Regimento Interno?</label><br>
											<select name="vSFORPOSREGINTERNO" id="vSFORPOSREGINTERNO" class="form-control">
												<option value="">Selecione</option>
												<option value="Sim" <?php if ($vROBJETO['FORPOSREGINTERNO'] == 'Sim') echo "selected='selected'"; ?>>Sim</option>
												<option value="Não" <?php if ($vROBJETO['FORPOSREGINTERNO'] == 'Não') echo "selected='selected'"; ?>>Não</option>
											</select><br>
											<label>Anexar Cópia</label><br>
											<input type="file" class="form-control" id="vSFORDESCREGINTERNO" name="vSFORDESCREGINTERNO" value="<?= ($vIOid > 0 ? $vROBJETO['FORDESCREGINTERNO'] : ''); ?>" placeholder="Se sim, descrever o número, ato legal, e anexar uma cópia">
											<div class="help-block with-errors"></div>
											


										</div>
										<!-- Dados Gerais -->
									</div>
								</div>								
							</div>
						</div>
					</div>
					<!--Start Tab Content -->
					<div class="tab-pane" id="p-view-2">
						<div class="tab-inner">
							<div class="single-machine row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<h5>Preencha com informações do responsável pelo Sistema de Controle Interno</h5>
									<label>O responsável pelo Sistema de Controle Interno ocupa o cargo de</label><br>
									<select name="vSFORCARGORESPINT" id="vSFORCARGORESPINT" class="form-control">
										<option value="">Selecione</option>
										<option value="Presidente" <?php if ($vROBJETO['FORCARGORESPINT'] == 'Presidente') echo "selected='selected'"; ?>>Presidente</option>
										<option value="Coordenador" <?php if ($vROBJETO['FORCARGORESPINT'] == 'Coordenador') echo "selected='selected'"; ?>>Coordenador</option>
										<option value="Diretor" <?php if ($vROBJETO['FORCARGORESPINT'] == 'Diretor') echo "selected='selected'"; ?>>Diretor</option>
										<option value="Chefe" <?php if ($vROBJETO['FORCARGORESPINT'] == 'Chefe') echo "selected='selected'"; ?>>Chefe</option>
										<option value="Outro" <?php if ($vROBJETO['FORCARGORESPINT'] == 'Outro') echo "selected='selected'"; ?>>Outro</option>
									</select><br>
									<small>Obs.: Anexar a portaria de nomeação no Sistema de Controle Interno.</small><br><br>
									<label>Nome do Responsável</label><br>
									<input type="text" class="form-control" id="vSFORNOMERESPINT" name="vSFORNOMERESPINT" value="<?= ($vIOid > 0 ? $vROBJETO['FORNOMERESPINT'] : ''); ?>" placeholder="Insira o Nome do Responsável">
									<label>Formação</label><br>
									<select name="vSFORFORMRESPINT" id="vSFORFORMRESPINT" class="form-control">
										<option value="">Selecione</option>
										<option value="1ª grau incompleto" <?php if ($vROBJETO['FORFORMRESPINT'] == '1ª grau incompleto') echo "selected='selected'"; ?>>1ª grau incompleto</option>
										<option value="1ª grau completo" <?php if ($vROBJETO['FORFORMRESPINT'] == '1ª grau completo') echo "selected='selected'"; ?>>1ª grau completo</option>
										<option value="2º grau incompleto" <?php if ($vROBJETO['FORFORMRESPINT'] == '2º grau incompleto') echo "selected='selected'"; ?>>2º grau incompleto</option>
										<option value="2º grau completo" <?php if ($vROBJETO['FORFORMRESPINT'] == '2º grau completo') echo "selected='selected'"; ?>>2º grau completo</option>
										<option value="Nível Superior. Descrever" <?php if ($vROBJETO['FORFORMRESPINT'] == 'Nível Superior. Descrever') echo "selected='selected'"; ?>>Nível Superior. Descrever</option>
									</select><br>
									<input type="text" class="form-control" id="vSFORSUPRESPINT" name="vSFORSUPRESPINT" value="<?= ($vIOid > 0 ? $vROBJETO['FORSUPRESPINT'] : ''); ?>" placeholder="Insira o Superior">
									<label>Tempo de Experiência no Controle Interno</label><br>
									<input type="text" class="form-control" id="vSFORTEMPEXPRESPINT" name="vSFORTEMPEXPRESPINT" value="<?= ($vIOid > 0 ? $vROBJETO['FORTEMPEXPRESPINT'] : ''); ?>" placeholder="Insira o Tempo de Experiência no Controle Interno">
									<label>Tem dedicação exclusiva no Controle Interno</label><br>
									<select name="vSFORDEDEXCRESPINT" id="vSFORDEDEXCRESPINT" class="form-control">
										<option value="">Selecione</option>
										<option value="Sim" <?php if ($vROBJETO['FORDEDEXCRESPINT'] == 'Sim') echo "selected='selected'"; ?>>Sim</option>
										<option value="Não" <?php if ($vROBJETO['FORDEDEXCRESPINT'] == 'Não') echo "selected='selected'"; ?>>Não</option>
									</select><br>
									<label>Qual cargo que ocupa no Município?</label>
									<input type="text" class="form-control" id="vSFORCARGOMUNRESPINT" name="vSFORCARGOMUNRESPINT" value="<?= ($vIOid > 0 ? $vROBJETO['FORCARGOMUNRESPINT'] : ''); ?>" placeholder="Insira o cargo que ocupa no Município">
									<small>Obs.: Anexar a Lei com a descrição do cargo.</small><br><br>
									<label>É servidor de Carreira?</label><br>
									<select name="vSFORSERCARRRESPINT" id="vSFORSERCARRRESPINT" class="form-control">
										<option value="">Selecione</option>
										<option value="Sim" <?php if ($vROBJETO['FORSERCARRRESPINT'] == 'Sim') echo "selected='selected'"; ?>>Sim</option>
										<option value="Não" <?php if ($vROBJETO['FORSERCARRRESPINT'] == 'Não') echo "selected='selected'"; ?>>Não</option>
									</select><br>
									<label>Está em estágio probatório?</label><br>
									<select name="vSFORESTPROBRESPINT" id="vSFORESTPROBRESPINT" class="form-control">
										<option value="">Selecione</option>
										<option value="Sim" <?php if ($vROBJETO['FORESTPROBRESPINT'] == 'Sim') echo "selected='selected'"; ?>>Sim</option>
										<option value="Não" <?php if ($vROBJETO['FORESTPROBRESPINT'] == 'Não') echo "selected='selected'"; ?>>Não</option>
									</select><br>
									<label>Realizou algum curso de atualização na área de Controle Interno da Administração Pública nos últimos 12 meses?</label><br>
									<select name="vSFORREACURRESPINT" id="vSFORREACURRESPINT" class="form-control">
										<option value="">Selecione</option>
										<option value="Nenhum" <?php if ($vROBJETO['FORREACURRESPINT'] == 'Nenhum') echo "selected='selected'"; ?>>Nenhum</option>
										<option value="Um" <?php if ($vROBJETO['FORREACURRESPINT'] == 'Um') echo "selected='selected'"; ?>>Um</option>
										<option value="Dois à quatro" <?php if ($vROBJETO['FORREACURRESPINT'] == 'Dois à quatro') echo "selected='selected'"; ?>>Dois à quatro</option>
										<option value="Cinco ou mais" <?php if ($vROBJETO['FORREACURRESPINT'] == 'Cinco ou mais') echo "selected='selected'"; ?>>Cinco ou mais</option>
									</select><br>
									<div class="help-block with-errors"></div>
									
								</div>
							</div>
						</div>
					</div>
					<!--Start Tab Content -->
					<div class="tab-pane" id="p-view-3">
						<div class="tab-inner">
							<div class="single-machine row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<h5>Dos Membros do Sistema de Controle Interno</h5>
									<label>Nome do Membro</label><br>
									<input type="text" class="form-control" id="vSFORNOMEMEMBINT" name="vSFORNOMEMEMBINT" value="<?= ($vIOid > 0 ? $vROBJETO['FORNOMEMEMBINT'] : ''); ?>" placeholder="Insira o Nome do Membro">
									<label>Formação</label><br>
									<select name="vSFORFORMEMBINT" id="vSFORFORMEMBINT" class="form-control">
										<option value="">Selecione</option>
										<option value="1ª grau incompleto" <?php if ($vROBJETO['FORFORMEMBINT'] == '1ª grau incompleto') echo "selected='selected'"; ?>>1ª grau incompleto</option>
										<option value="1ª grau completo" <?php if ($vROBJETO['FORFORMEMBINT'] == '1ª grau completo') echo "selected='selected'"; ?>>1ª grau completo</option>
										<option value="2º grau incompleto" <?php if ($vROBJETO['FORFORMEMBINT'] == '2º grau incompleto') echo "selected='selected'"; ?>>2º grau incompleto</option>
										<option value="2º grau completo" <?php if ($vROBJETO['FORFORMEMBINT'] == '2º grau completo') echo "selected='selected'"; ?>>2º grau completo</option>
										<option value="Nível Superior. Descrever:" <?php if ($vROBJETO['FORFORMEMBINT'] == 'Nível Superior. Descrever:') echo "selected='selected'"; ?>>Nível Superior. Descrever:</option>
									</select><br>
									<input type="text" class="form-control" id="vSFORSUPMEMBINT" name="vSFORSUPMEMBINT" value="<?= ($vIOid > 0 ? $vROBJETO['FORSUPMEMBINT'] : ''); ?>" placeholder="Insira o Superior">
									<label>Tempo de Experiência no Controle Interno</label><br>
									<input type="text" class="form-control" id="vSFORTEMPEXPMEMBINT" name="vSFORTEMPEXPMEMBINT" value="<?= ($vIOid > 0 ? $vROBJETO['FORTEMPEXPMEMBINT'] : ''); ?>" placeholder="Insira o Tempo de Experiência no Controle Interno">
									<label>Tem dedicação exclusiva no Controle Interno</label><br>
									<select name="vSFORDEDEXCMEMBINT" id="vSFORDEDEXCMEMBINT" class="form-control">
										<option value="">Selecione</option>
										<option value="Sim" <?php if ($vROBJETO['FORDEDEXCMEMBINT'] == 'Sim') echo "selected='selected'"; ?>>Sim</option>
										<option value="Não" <?php if ($vROBJETO['FORDEDEXCMEMBINT'] == 'Não') echo "selected='selected'"; ?>>Não</option>
									</select><br>
									<label>Qual cargo que ocupa no Município?</label>
									<input type="text" class="form-control" id="vSFORCARGOMUNMEMBINT" name="vSFORCARGOMUNMEMBINT" value="<?= ($vIOid > 0 ? $vROBJETO['FORCARGOMUNMEMBINT'] : ''); ?>" placeholder="Insira o cargo que ocupa no Município">
									<small>Obs.: Anexar a Lei com a descrição do cargo.</small><br><br>
									<label>É servidor de Carreira?</label><br>
									<select name="vSFORSERCARRMEMBINT" id="vSFORSERCARRMEMBINT" class="form-control">
										<option value="">Selecione</option>
										<option value="Sim" <?php if ($vROBJETO['FORSERCARRMEMBINT'] == 'Sim') echo "selected='selected'"; ?>>Sim</option>
										<option value="Não" <?php if ($vROBJETO['FORSERCARRMEMBINT'] == 'Não') echo "selected='selected'"; ?>>Não</option>
									</select><br>
									<label>Está em estágio probatório?</label><br>
									<select name="vSFORESTPROBMEMBINT" id="vSFORESTPROBMEMBINT" class="form-control">
										<option value="">Selecione</option>
										<option value="Sim" <?php if ($vROBJETO['FORESTPROBMEMBINT'] == 'Sim') echo "selected='selected'"; ?>>Sim</option>
										<option value="Não" <?php if ($vROBJETO['FORESTPROBMEMBINT'] == 'Não') echo "selected='selected'"; ?>>Não</option>
									</select><br>
									<label>Realizou algum curso de atualização na área de Controle Interno da Administração Pública nos últimos 12 meses?</label><br>
									<select name="vSFORREACURMEMBINT" id="vSFORREACURMEMBINT" class="form-control">
										<option value="">Selecione</option>
										<option value="Nenhum" <?php if ($vROBJETO['FORREACURMEMBINT'] == 'Nenhum') echo "selected='selected'"; ?>>Nenhum</option>
										<option value="Um" <?php if ($vROBJETO['FORREACURMEMBINT'] == 'Um') echo "selected='selected'"; ?>>Um</option>
										<option value="Dois à quatro" <?php if ($vROBJETO['FORREACURMEMBINT'] == 'Dois à quatro') echo "selected='selected'"; ?>>Dois à quatro</option>
										<option value="Cinco ou mais" <?php if ($vROBJETO['FORREACURMEMBINT'] == 'Cinco ou mais') echo "selected='selected'"; ?>>Cinco ou mais</option>
									</select><br>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
					</div>
					<!--Start Tab Content -->
					<div class="tab-pane" id="p-view-4">
						<div class="tab-inner">
							<div class="single-machine row">
								<div class="col-md-12 col-sm-12 col-xs-12">
								 <h5>Das atividades da Unidade de Controle Interno</h5>
									<label>A Unidade de Controle Interno possui um planejamento/programa de trabalho com a descrição das suas atividades?</label><br>
									<select name="vSFORPOSSPLAUNIINT" id="vSFORPOSSPLAUNIINT" class="form-control">
										<option value="">Selecione</option>
										<option value="Sim" <?php if ($vROBJETO['FORPOSSPLAUNIINT'] == 'Sim') echo "selected='selected'"; ?>>Sim</option>
										<option value="Não" <?php if ($vROBJETO['FORPOSSPLAUNIINT'] == 'Não') echo "selected='selected'"; ?>>Não</option>
									</select><br>
									<small>Obs.: Anexar a Lei com a descrição do cargo.</small><br><br>
									<label>Procedimentos de Auditoria</label><br>
									<select name="vSFORPROAUDUNIINT" id="vSFORPROAUDUNIINT" class="form-control">
										<option value="">Selecione</option>
										<option value="Sim" <?php if ($vROBJETO['FORPROAUDUNIINT'] == 'Sim') echo "selected='selected'"; ?>>Sim</option>
										<option value="Não" <?php if ($vROBJETO['FORPROAUDUNIINT'] == 'Não') echo "selected='selected'"; ?>>Não</option>
										<option value="Raramente" <?php if ($vROBJETO['FORPROAUDUNIINT'] == 'Raramente') echo "selected='selected'"; ?>>Raramente</option>
									</select><br>
									<label>Descrever o resumo das auditorias realizadas nos últimos 06 meses</label><br>
									<textarea class="form-control" id="vSFORDESCRESUNIINT" name="vSFORDESCRESUNIINT" rows="7" placeholder="Descreva aqui.."><?= nl2br($vROBJETO['FORDESCRESUNIINT']); ?></textarea><br>
									<div class="help-block with-errors"></div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<label>Verificações, Controles e Acompanhamentos</label><br>
									<select name="vSFORVERCONMUNIINT" id="vSFORVERCONMUNIINT" class="form-control">
										<option value="">Selecione</option>
										<option value="Sim" <?php if ($vROBJETO['FORVERCONMUNIINT'] == 'Sim') echo "selected='selected'"; ?>>Sim</option>
										<option value="Não" <?php if ($vROBJETO['FORVERCONMUNIINT'] == 'Não') echo "selected='selected'"; ?>>Não</option>
										<option value="Raramente" <?php if ($vROBJETO['FORVERCONMUNIINT'] == 'Raramente') echo "selected='selected'"; ?>>Raramente</option>
									</select><br>
									<label>Descrever as espécies de verificações, controles e acompanhamentos realizados no exercício anterior e no corrente</label><br>
									<textarea class="form-control" id="vSFORDESCVERCONUNIINT" name="vSFORDESCVERCONUNIINT" rows="7" placeholder="Descreva aqui.."><?= nl2br($vROBJETO['FORDESCVERCONUNIINT']); ?></textarea><br>
									<div class="help-block with-errors"></div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<label>Emissão de Relatórios</label><br>
									<label>Auditoria</label><br>
									<select name="vSFORAUDEMIREL" id="vSFORAUDEMIREL" class="form-control">
										<option value="">Selecione</option>
										<option value="Sim" <?php if ($vROBJETO['FORAUDEMIREL'] == 'Sim') echo "selected='selected'"; ?>>Sim</option>
										<option value="Não" <?php if ($vROBJETO['FORAUDEMIREL'] == 'Não') echo "selected='selected'"; ?>>Não</option>
										<option value="Raramente" <?php if ($vROBJETO['FORAUDEMIREL'] == 'Raramente') echo "selected='selected'"; ?>>Raramente</option>
									</select><br>
									<label>Nos últimos 06 meses, quantos foram emitidos?</label><br>
									<input type="text" class="form-control" id="vSFORAUDQUANTEMIREL" name="vSFORAUDQUANTEMIREL" value="<?= ($vIOid > 0 ? $vROBJETO['FORAUDQUANTEMIREL'] : ''); ?>" placeholder="Insira a Quantidade Emitida">
									<label>Verificação</label><br>
									<select name="vSFORVEREMIREL" id="vSFORVEREMIREL" class="form-control">
										<option value="">Selecione</option>
										<option value="Sim" <?php if ($vROBJETO['FORVEREMIREL'] == 'Sim') echo "selected='selected'"; ?>>Sim</option>
										<option value="Não" <?php if ($vROBJETO['FORVEREMIREL'] == 'Não') echo "selected='selected'"; ?>>Não</option>
										<option value="Raramente" <?php if ($vROBJETO['FORVEREMIREL'] == 'Raramente') echo "selected='selected'"; ?>>Raramente</option>
									</select><br>
									<label>Nos últimos 06 meses, quantos foram emitidos?</label><br>
									<input type="text" class="form-control" id="vSFORVERQUANTEMIREL" name="vSFORVERQUANTEMIREL" value="<?= ($vIOid > 0 ? $vROBJETO['FORVERQUANTEMIREL'] : ''); ?>" placeholder="Insira a Quantidade Emitida">
									<label>Acompanhamento</label><br>
									<select name="vSFORACOMEMIREL" id="vSFORACOMEMIREL" class="form-control">
										<option value="">Selecione</option>
										<option value="Sim" <?php if ($vROBJETO['FORACOMEMIREL'] == 'Sim') echo "selected='selected'"; ?>>Sim</option>
										<option value="Não" <?php if ($vROBJETO['FORACOMEMIREL'] == 'Não') echo "selected='selected'"; ?>>Não</option>
										<option value="Raramente" <?php if ($vROBJETO['FORACOMEMIREL'] == 'Raramente') echo "selected='selected'"; ?>>Raramente</option>
									</select><br>
									<label>Nos últimos 06 meses, quantos foram emitidos?</label><br>
									<input type="text" class="form-control" id="vSFORACOMQUANTEMIREL" name="vSFORACOMQUANTEMIREL" value="<?= ($vIOid > 0 ? $vROBJETO['FORACOMQUANTEMIREL'] : ''); ?>" placeholder="Insira a Quantidade Emitida">
									<div class="help-block with-errors"></div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<label>O envio dos relatórios emitidos é realizado/direcionado para quem?</label><br>
									<input type="text" class="form-control" id="vSFORENVIORELQUEM" name="vSFORENVIORELQUEM" value="<?= ($vIOid > 0 ? $vROBJETO['FORENVIORELQUEM'] : ''); ?>" placeholder="Insira para quem é realizado/direcionado">
									<div class="help-block with-errors"></div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<label>Os responsáveis pelo recebimento dos relatórios emitidos pela Unidade de Controle Interno costumam responder identificando as medidas que foram ou serão adotadas com relação aos apontamentos de inconformidades e recomendações?</label><br>
									<select name="vSFORRESPONRELAT" id="vSFORRESPONRELAT" class="form-control">
										<option value="">Selecione</option>
										<option value="Sim" <?php if ($vROBJETO['FORRESPONRELAT'] == 'Sim') echo "selected='selected'"; ?>>Sim</option>
										<option value="Não" <?php if ($vROBJETO['FORRESPONRELAT'] == 'Não') echo "selected='selected'"; ?>>Não</option>
									</select><br>
									<div class="help-block with-errors"></div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<label>Os relatórios ou outros atos produzidos pela Unidade de Controle Interno são entregues diretamente nos setores ou por meio de protocolo?</label><br>
									<select name="vSFORENTRERELAT" id="vSFORENTRERELAT" class="form-control">
										<option value="">Selecione</option>
										<option value="Sim" <?php if ($vROBJETO['FORENTRERELAT'] == 'Sim') echo "selected='selected'"; ?>>Sim</option>
										<option value="Não" <?php if ($vROBJETO['FORENTRERELAT'] == 'Não') echo "selected='selected'"; ?>>Não</option>
									</select><br>
									<div class="help-block with-errors"></div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<label>A Unidade de Controle Interno emite Normas Internas Operacionais?</label><br>
									<select name="vSFOREMISSAOINT" id="vSFOREMISSAOINT" class="form-control">
										<option value="">Selecione</option>
										<option value="Sim" <?php if ($vROBJETO['FOREMISSAOINT'] == 'Sim') echo "selected='selected'"; ?>>Sim</option>
										<option value="Não" <?php if ($vROBJETO['FOREMISSAOINT'] == 'Não') echo "selected='selected'"; ?>>Não</option>
									</select><br>
									<label>Se a resposta foi sim, qual ato administrativo foi usado para implantação das normas?</label><br>
									<input type="text" class="form-control" id="vSFORATOADMNORM" name="vSFORATOADMNORM" value="<?= ($vIOid > 0 ? $vROBJETO['FORATOADMNORM'] : ''); ?>" placeholder="Insira o ato administrativo">
									<small>Obs.: Anexar a Lei com a descrição do cargo.</small>
									<div class="help-block with-errors"></div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<label>A Unidade de Controle Interno costuma registrar atividades em atas?</label><br>
									<select name="vSFORUNIINTREGATA" id="vSFORUNIINTREGATA" class="form-control">
										<option value="">Selecione</option>
										<option value="Sim" <?php if ($vROBJETO['FORUNIINTREGATA'] == 'Sim') echo "selected='selected'"; ?>>Sim</option>
										<option value="Não" <?php if ($vROBJETO['FORUNIINTREGATA'] == 'Não') echo "selected='selected'"; ?>>Não</option>
									</select><br>
									<label>Se a resposta é sim, quais tipos de atividades?</label><br>
									<input type="text" class="form-control" id="vSFORTIPOUNIINTREGATA" name="vSFORTIPOUNIINTREGATA" value="<?= ($vIOid > 0 ? $vROBJETO['FORTIPOUNIINTREGATA'] : ''); ?>" placeholder="Insira os tipos de atividades">
									<div class="help-block with-errors"></div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<label>A Unidade de Controle Interno costuma participar de reuniões setoriais?</label><br>
									<select name="vSFORUNIINTREUNIAO" id="vSFORUNIINTREUNIAO" class="form-control">
										<option value="">Selecione</option>
										<option value="Sim" <?php if ($vROBJETO['FORUNIINTREUNIAO'] == 'Sim') echo "selected='selected'"; ?>>Sim</option>
										<option value="Não" <?php if ($vROBJETO['FORUNIINTREUNIAO'] == 'Não') echo "selected='selected'"; ?>>Não</option>
									</select><br>
									<label>Tente explicar um pouco sobre a frequência, setores e quais espécies de reuniões</label><br>
									<textarea class="form-control" id="vSFORFREQREUNIAOUNIINT" name="vSFORFREQREUNIAOUNIINT" rows="7" value="" placeholder="Explique aqui.."><?= nl2br($vROBJETO['FORFREQREUNIAOUNIINT']); ?></textarea><br>
									<div class="help-block with-errors"></div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<label>A Unidade de Controle Interno atua como auxiliar do Tribunal de Contas do seu Estado?</label><br>
									<select name="vSFORATUAAUXUNIINT" id="vSFORATUAAUXUNIINT" class="form-control">
										<option value="">Selecione</option>
										<option value="Sim" <?php if ($vROBJETO['FORATUAAUXUNIINT'] == 'Sim') echo "selected='selected'"; ?>>Sim</option>
										<option value="Não" <?php if ($vROBJETO['FORATUAAUXUNIINT'] == 'Não') echo "selected='selected'"; ?>>Não</option>
									</select><br>
									<div class="help-block with-errors"></div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<label>Que ferramentas são utilizadas para interação com o TCE? Sistema informatizado, e-mail, preenchimento de relatórios? Por favor descreva.</label><br>
									<textarea class="form-control" id="vSFORFERRAMENTASINT" name="vSFORFERRAMENTASINT" rows="7" value="" placeholder="Descreva aqui.."><?= nl2br($vROBJETO['FORFERRAMENTASINT']); ?></textarea><br>
									<div class="help-block with-errors"></div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<label fid="lblAnexo" for="vFFORANEXOLEGIS">Anexar a legislação e se possível organograma com a estrutura organizacional do Ente Público, com a descrição de gabinetes, secretarias, setores, departamentos, entre outros. </label><br>
									<input type="file" class="form-control" name="vFFORANEXOLEGIS" id="vFFORANEXOLEGIS" title="Anexar">
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 text-center">
						<button type="submit" class="add-btn contact-btn" id="submit">Enviar Formulário</button>
						<button id="recaptcha" class="g-recaptcha" data-sitekey="<?= getConfig('CFGRECAPTCHASITEKEY') ?>" data-callback="enviarFormulario" data-badge="bottomleft" style="display: none;"></button>
						<div id="msgSubmit" class="h3 text-center hidden"></div>
						<div class="clearfix"></div>
					</div>
					<!--Start Tab Content -->
				</div>
			</div>
			</form>
		</div>
		<!-- end Row -->
	</div>
</div>

<?php require_once 'footer.php' ?>