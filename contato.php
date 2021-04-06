<!-- Start Header via PHP -->
<?php

$vSTitulo = 'Entre em contato';
$vSName = 'contato';
require_once 'header.php';
// require_once 'tw/includes/constantes.php';

?>
<!-- End Header via PHP -->

<!-- Start Bottom Header -->
<div class="page-area">
	<div class="breadcumb-overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="breadcrumb text-center">
					<div class="section-headline white-headline text-center">
						<h3>Contato</h3>
					</div>
					<ul>
						<li class="home-bread">Início</li>
						<li>Contato</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END Header -->
<!-- Start contact Area -->
<div class="contact-area area-padding">
	<div class="container">
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
								<span>Seg - Sex: 8h às 12h</span><br>
								<span>e das 13:30h às 18h</span>
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
								<br>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<!-- Start Map -->
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3467.3027687182444!2d-50.77752668515862!3d-29.65298738202635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95191925d56de887%3A0xb56534d5a694628c!2sRua%20Jo%C3%A3o%20Bayer%2C%20744%20-%20Petr%C3%B3polis%2C%20Taquara%20-%20RS%2C%2095600-000!5e0!3m2!1spt-BR!2sbr!4v1607371743610!5m2!1spt-BR!2sbr" width="550" height="490" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				<!-- End Map -->
			</div>
			<!-- Start Left contact -->
			<div class="col-md-6 col-sm-6 col-xs-12">
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
								<textarea class="form-control" id="vSCONMENSAGEM" name="vSCONMENSAGEM" rows="7" placeholder="Mensagem" required></textarea>
								<small style="color: #3078fb">Todos os campos são obrigatórios!</small>
								<div class="help-block with-errors"></div>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12 text-center">
								<button type="submit" class="add-btn contact-btn" id="submit">Enviar Mensagem</button>
								<button id="recaptcha" class="g-recaptcha" data-sitekey="<?= getConfig('CFGRECAPTCHASITEKEY') ?>" data-callback="enviarContato" data-theme="dark" data-badge="bottomleft" style="display: none;"></button>
								<div id="msgSubmit" class="h3 text-center hidden"></div>
								<div class="clearfix"></div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- End Left contact -->
		</div>
	</div>
</div>
<!-- End Contact Area -->
<?php require_once 'footer.php' ?>