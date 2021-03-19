<?php
$vSTitulo = 'Dados do Município';
$vSName = 'dados-municipio';
require_once 'header.php';
require_once 'tw/transaction/site/transactionDadosMunicipio.php';

$municipio = getDadosMunicipio();
$endereco = getEndereco();
?>

<br /><br /><br />
<!-- END Header -->
<!-- End services Area -->
<div class="single-services-page area-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12">
				<?php require_once 'menu_lateral.php'; ?>
			</div>
			<!-- End left sidebar -->
			<!-- Start service page -->
			<div class="col-md-8 col-sm-8 col-xs-12">
				<div class="row">
					<!-- single-well start-->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="single-well mar-well">
							<a href="#">
								<h3>Dados do Município</h3>
							</a>
						</div>
					</div>
				</div>
				<!-- end Row -->
				<div class="contact-form">
					<!-- <form class="contact-form" id="formFormulario" name="formFormulario" method="POST"
						action="enviarFormulario"> -->
					<div class="row">
						<!-- Start Column Start -->
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="company-faq left-faq">
								<div class="row">
									<!-- Dados Gerais -->

									<div class="col-md-12 col-sm-12 col-xs-12">
										<label>Razão Social</label><br>
										<input class="form-control obrigatorio" name="vSCLIRAZAOSOCIAL"
											id="vSCLIRAZAOSOCIAL" type="text"
											value="<?= $municipio['CLIRAZAOSOCIAL']; ?>">
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<label>Nome Fantasia</label><br>
										<input class="form-control obrigatorio" name="vSCLINOMEFANTASIA"
											id="vSCLINOMEFANTASIA" type="text"
											value="<?= $municipio['CLINOMEFANTASIA']; ?>" title="Nome Fantasia">
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<label>CNPJ</label><br>
										<input class="form-control obrigatorio" name="vSCLICNPJ" id="vSCLICNPJ"
											type="text" title="CNPJ" value="<?= $municipio['CLICNPJ']; ?>">
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-12 col-xs-12">
										<label for="vSCLICONTATO">Contato Responsável</label>
										<input class="form-control" name="vSCLICONTATO" id="vSCLICONTATO" type="text"
											title="Contato Responsável" value="<?= $municipio['CLICONTATO']; ?>">
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12">
										<label for="vSCLIFONE">Telefone</label>
										<input class="form-control" name="vSCLIFONE" id="vSCLIFONE" type="text"
											title="Telefone" value="<?= $municipio['CLIFONE']; ?>">
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12">
										<label for="vSCLIEMAIL">E-mail</label>
										<input class="form-control" name="vSCLIEMAIL" id="vSCLIEMAIL" type="email"
											title="E-mail" value="<?= $municipio['CLIEMAIL']; ?>">
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12">
										<label for="vSCLISITE">Site</label>
										<input class="form-control" name="vSCLISITE" id="vSCLISITE" type="text"
											title="Site" value="<?= $municipio['CLISITE']; ?>">
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-12 col-xs-12">
										<label for="vSENDCEP">CEP</label>
										<input class="form-control" name="vSENDCEP" id="vSENDCEP" type="text"
											title="CNPJ" value="<?= $endereco['ENDCEP']; ?>">
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12">
										<label for="vSENDBAIRRO">Bairro</label>
										<input class="form-control" name="vSENDBAIRRO" id="vSENDBAIRRO" type="text"
											title="CNPJ" value="<?= $endereco['ENDBAIRRO']; ?>">
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<label for="vSENDLOGRADOURO">Logradouro</label>
										<input class="form-control" name="vSENDLOGRADOURO" id="vSENDLOGRADOURO"
											type="text" title="CNPJ" value="<?= $endereco['ENDLOGRADOURO']; ?>">
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<label for="vSENDNROLOGRADOURO">Número</label>
										<input class="form-control" name="vSENDNROLOGRADOURO" id="vSENDNROLOGRADOURO"
											type="text" title="CNPJ" value="<?= $endereco['ENDNROLOGRADOURO']; ?>">
									</div>
									<?php if (!empty($endereco['ENDCOMPLEMENTO'])): ?>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<label for="vSENDCOMPLEMENTO">Complemento</label>
										<input class="form-control" name="vSENDCOMPLEMENTO" id="vSENDCOMPLEMENTO"
											type="text" title="CNPJ" value="<?= $endereco['ENDCOMPLEMENTO']; ?>">
									</div>
									<?php endif; ?>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<label for="vSMUNICIPIO">Município/UF</label>
										<input class="form-control" name="vSMUNICIPIO" id="vSMUNICIPIO" type="text"
											title="CNPJ"
											value="<?= $endereco['CIDDESCRICAO'].'/'.$endereco['ESTSIGLA']; ?>">
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- </form> -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Start Quote Area -->
<?php require_once 'footer.php' ?>