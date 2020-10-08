<?php
$vSTitulo = 'Dados do Município';
$vSName = 'dados-municipio';
require_once 'header.php';
require_once 'tw/transaction/transactionLogin.php';
// pre($_SESSION);
?>
        <!-- Start Bottom Header 
        <div class="page-area">
            <div class="breadcumb-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcrumb text-center">
                            <div class="section-headline white-headline text-center">
                                <h3>Dados do Município</h3>
                            </div>
                            <ul>
                                <li class="home-bread">Home</li>
                                <li>Dados do Município</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
		<br/><br/><br/>
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
                                    <p>Confira abaixo os dados:</p>
                                </div>
                            </div>
                        </div>
                        <!-- end Row -->
						<div class="contact-form">
						<form class="contact-form" id="formFormulario" name="formFormulario" method="POST" action="enviarFormulario">
						<div class="row">
							<!-- Start Column Start -->
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="company-faq left-faq">
									<div class="row">
										<!-- Dados Gerais -->									
										
										<div class="col-md-12 col-sm-12 col-xs-12">
											<label>Razão Social</label><br>
											<input class="form-control obrigatorio" name="vSCLIRAZAOSOCIAL" id="vSCLIRAZAOSOCIAL" type="text" value="Prefeitura Municipal de Agudo">
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
											<label>Nome Fantasia</label><br>
											<input class="form-control obrigatorio" name="vSCLINOMEFANTASIA" id="vSCLINOMEFANTASIA" type="text" value="Agudo PM" title="Nome Fantasia">
										</div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
											<label>CNPJ</label><br>
											<input class="form-control obrigatorio" name="vSCLICNPJ" id="vSCLICNPJ" type="text" title="CNPJ" value="87.531.976/0001-79">
										</div>
										
										<div class="col-md-12 col-sm-12 col-xs-12">
												<label>Início das Atividades</label> 
												<input class="form-control" name="vDCLIDATA_INICIO_ATIVIDADES" id="vDCLIDATA_INICIO_ATIVIDADES" value="2020-09-01" type="date">                                                    										
										</div>
										<!-- Dados Gerais -->
									
										<div class="col-md-12 col-sm-12 col-xs-12 text-center">
											<button type="submit" class="add-btn contact-btn" id="submit">Enviar Formulário</button>
											<button id="recaptcha" class="g-recaptcha" data-sitekey="<?= getConfig('CFGRECAPTCHASITEKEY') ?>" data-callback="enviarFormulario" data-badge="bottomleft" style="display: none;"></button>
											<div id="msgSubmit" class="h3 text-center hidden"></div>
											<div class="clearfix"></div>
										</div>
												
									</div>
								</div>
							</div>
						</div>
						</form>
						</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Quote Area -->
<?php require_once 'footer.php' ?>