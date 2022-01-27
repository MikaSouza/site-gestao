<?php

$vSTitulo = 'Inteligência em Adminstração Pública';
$vSName = 'teste';
require_once 'header.php';
require_once 'tw/transaction/transactionBlog.php';

?>

<?php require_once 'bannerteste.php' ?>

<?php require_once 'servicosIndex.php' ?>

<div class="blog-area fix bg-color area-padding-adj">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="section-headline text-center">
					<h3>Últimas Notícias</h3>
					<p>Confira as últimas notícias do nosso Blog!</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="blog-grid home-blog">
				<?php
				$blogs = comboBlog(0, 3);
				foreach ($blogs['dados'] as $blog) : ?>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="single-blog">
							<div class="blog-image">
								<a class="image-scale" href="/blog-detalhe/<?= $blog['BLOURLAMIG']; ?>">
									<img src="tw/uploads/blog/thumbnail/<?= $blog['BLOIMAGEM']; ?>" alt="">
								</a>
							</div>
							<div class="blog-contentIndex">
								<a href="/blog-detalhe/<?= $blog['BLOURLAMIG']; ?>">
									<span class="date-type"><i class="fa fa-calendar"></i><?= formatar_data($blog['BLODATA_INC']); ?></span>
									<h4><?= (strlen($blog['BLOTITULO']) > 40) ? substr($blog['BLOTITULO'], 0, 30) . '...' : $blog['BLOTITULO']; ?></h4>
								</a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>

<button class="open-button" onclick="openForm()">E-book Orientações Técnicas</button>

<div class="form-popup" id="myForm">
	<form class="form-container" id="formEbook" name="formEbook" method="post" action="enviarEbook">
		<p class="title">Cadastre-se e baixe gratuitamente</p>
		<img src="img/about/f1.png" width="300" height="150"><br>
		<label for="nome"><b>Nome</b></label>
		<input type="text" placeholder="Insira seu Nome" id="nome" name="nome">
		<label for="cidade"><b>Cidade</b></label>
		<input type="text" placeholder="Insira sua Cidade" id="cidade" name="cidade">
		<label for="estado"><b>Estado</b></label>
		<input type="text" placeholder="Insira seu Estado" id="estado" name="estado">
		<label for="email"><b>E-Mail</b></label>
		<input type="text" placeholder="Insira seu E-mail" id="email" name="email">
		<label for="celular"><b>Celular</b></label>
		<input type="text" class="ajusta" placeholder="Insira seu Celular" id="celular" name="celular" onkeypress="return onlynumber();" onKeyUp="mascara('TEL',this,event);" maxlength="15">
		<input type="checkbox" id="termos" name="termos" value="s" required>
		<label for="termos" class="ajusta2">Eu concordo em receber os e-mails da GESTÃO LTDA *</label><br>
		<button type="submit" id="submit" class="btn">Quero Cadastrar</button>
		<button id="recaptcha" class="g-recaptcha" data-sitekey="<?= getConfig('CFGRECAPTCHASITEKEY') ?>" data-callback="enviarEbook" data-theme="dark" data-badge="bottomleft" style="display: none;"></button>
		<button type="button" class="btn cancel" onclick="closeForm()">Fechar</button>
	</form>
</div>

<?php require_once 'footer.php' ?>
<script src="js/ebook.js"></script>
<script src="js/mascaras.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script>
	function openForm() {
		document.getElementById("myForm").style.display = "block";
	}

	function closeForm() {
		document.getElementById("myForm").style.display = "none";
	}
</script>