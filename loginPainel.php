<?php
$vSName = 'loginPainel';
$vSTitulo = 'Login Paínel';
require_once 'header.php';
?>
<div class="page-area">
	<div class="breadcumb-overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="breadcrumb text-center">
					<div class="section-headline white-headline text-center">
						<h3>Área Restrita</h3>
					</div>
					<ul>
						<li class="home-bread">Home</li>
						<li>Área Restrita</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="login-area area-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="login-page">
					<div class="login-form">
						<div class="row">
							<form class="log-form" id="login-form" method="POST">
								<h2 class="login-title text-center">Esta é uma área para acesso exclusivo de
									Clientes.<br /> Por
									favor, faça o login preenchendo os dados abaixo.</h2>
								<div id="error" class="col-md-12 col-sm-12 col-xs-12 ajusta">
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 ajusta">
									<input type="text" class="form-control obrigatorio" style="margin-bottom:10px !important;" id="vSUsuario" name="vSUsuario" placeholder="E-mail">
									<input type="password" class="form-control obrigatorio" style="margin-bottom:10px !important;" id="vSSenha" name="vSSenha" placeholder="Senha">
									<div class="check-group flexbox">
										<label class="check-box">
											<input type="checkbox" class="check-box-input" checked>
											<span class="remember-text">Lembrar de mim</span>
										</label>
										<a class="text-muted" href="#">Esqueceu a senha</a>
									</div>
									<button type="submit" id="btn-login" class="slide-btn login-btn">Entrar</button>
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
<?php require_once 'footer.php' ?>
<script src="./js/jquery.validate.min.js"></script>
<script src="./js/sweetalert2.min.js"></script>
<script src="./js/jquery.sweet-alert.init.js"></script>
<script src="./js/login.js"></script>