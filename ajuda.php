<?php

$vSTitulo = 'Ajuda';
$vSName = 'ajuda';
require_once 'header.php';
// require_once 'tw/includes/constantes.php';
?>
<!-- Start Bottom Header 
<div class="page-area">
    <div class="breadcumb-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb text-center">
                    <div class="section-headline white-headline text-center">
                        <h3>Ajuda</h3>
                    </div>
                    <ul>
                        <li class="home-bread">Início</li>
                        <li>Ajuda</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Header -->
<br/><br/><br/>
<!-- Start contact Area -->
<div class="contact-area area-padding">
    <div class="container">        
        <div class="row">
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
											<h3>Ajuda</h3>
										</a>
										<p>Envie sua duvida:</p>
									</div>
								</div>
							</div>
							<!-- end Row -->						
							<div class="row">
								<!-- Start Column Start -->
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="contact-form">
										<div class="row">
											<form class="contact-form" id="formContato" name="formContato" method="POST" action="enviarContato">												
												<div class="col-md-12 col-sm-12 col-xs-12">
													<input type="text" class="form-control" id="vSCONNOME" name="vSCONNOME" placeholder="Nome" required>
													<div class="help-block with-errors"></div>
												</div>
												<div class="col-md-12 col-sm-12 col-xs-12">
													<input type="text" class="form-control" id="vSCONTELEFONE" name="vSCONTELEFONE" onkeypress="return onlynumber();" onKeyUp="mascara('TEL',this,event);" maxlength="15" placeholder="Telefone" required>
													<div class="help-block with-errors"></div>
												</div>
												<div class="col-md-12 col-sm-12 col-xs-12">
													<input type="email" class="email form-control" id="vSCONEMAIL" name="vSCONEMAIL" placeholder="E-mail" required>
													<div class="help-block with-errors"></div>
												</div>
												<div class="col-md-12 col-sm-12 col-xs-12">
													<input type="text" class="form-control" id="vSCONNOME" name="vSCONNOME" placeholder="Título" required>
													<div class="help-block with-errors"></div>
												</div>
												<div class="col-md-12 col-sm-12 col-xs-12">
													<textarea class="form-control" id="vSCONMENSAGEM" name="vSCONMENSAGEM" rows="7" placeholder="Texto" required></textarea>
													<small style="color: #3078fb">Todos os campos são obrigatórios!</small>
													<div class="help-block with-errors"></div>
												</div>
												<div class="col-md-12 col-sm-12 col-xs-12 text-center">
													<button type="submit" class="add-btn contact-btn" id="submit">Enviar Mensagem</button>
													<button id="recaptcha" class="g-recaptcha" data-sitekey="<?= getConfig('CFGRECAPTCHASITEKEY') ?>" data-callback="enviarContato" data-badge="bottomleft" style="display: none;"></button>
													<div id="msgSubmit" class="h3 text-center hidden"></div>
													<div class="clearfix"></div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
		<div class="row">
            <div class="contact-inner">
                <!-- Start contact icon column -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="contact-icon text-center">
                        <div class="single-icon">
                            <i class="ti-mobile"></i>
                            <p>
                                Fone : (51) 3541-3355<br>
                                Whats : (51) 9 8443-2097<br>
                                <span>Seg - Sex: 08:00 - 17:00</span>
                                <br>
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Start contact icon column -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="contact-icon text-center">
                        <div class="single-icon">
                            <i class="ti-email"></i>
                            <p>
                                E-mail : gestao@gestao.srv.br<br>
                                <br>
                                <br>
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Start contact icon column -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="contact-icon text-center">
                        <div class="single-icon">
                            <i class="ti-location-pin"></i>
                            <p>
                                Rua João Bayer, 744<br>
                                <span>Bairro Petrópolis CEP: 95607-008</span>
                                <span>Taquara/RS</span>
                                <br>
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Contact Area -->
<?php require_once 'footer.php' ?>