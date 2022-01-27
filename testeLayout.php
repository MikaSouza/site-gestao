<?php
$vSTitulo = 'Orientações Técnicas';
$vSName = 'orientacoes-tecnicas';
require_once 'header.php';
require_once 'tw/transaction/site/transactionOrientacoesTecnicas.php';
?>
<br /><br /><br />
<div class="single-services-page area-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12">
				<?php require_once 'menu_lateral.php'; ?>
			</div>
			<div class="col-md-8 col-sm-8 col-xs-12">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="single-well mar-well">
							<a href="#">
								<h3>Orientações Técnicas</h3>
							</a>
							<p>Confira abaixo nossa base de orientações</p>
							<form action="buscar-orientacoes" method="POST">
								<div class="blog-search-option">
									<input type="text" id="inp_pesquisa" name="inp_pesquisa" placeholder="Pesquisar...">
									<button class="button" type="submit">
										<i class="fa fa-search"></i>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="company-faq left-faq">
							<?php foreach (getOrientacoesTecnicas() as $orientacao) : ?>
								<?php $remote_filename = 'https://gestao-srv.twflex.com.br/ged/orientacao_tecnica/' . $orientacao['OXTNUMERO'] . '_' . $orientacao['OXTANO'] . '.pdf'; ?>
								<div class="single-faq">
									<!-- <h4> -->
									<!-- <span class="number">></span> -->
									<span class="q-text">
										<a href="<?= $remote_filename; ?>" target="_blanc" class="down-btn"><?= $orientacao['OXTTITULO']; ?></a>
										<?php if (count($orientacao['ANEXOS']) > 0) : ?>
											<?php foreach ($orientacao['ANEXOS'] as $anexo) : ?>
												<!-- <div class="download-btn">
													<div class="about-btn"> -->
												<a href="<?= $anexo['LINK']; ?>" target="_blanc" class="down-btn" style="margin-top: -4px;">> <?= $anexo['NOMEARQUIVO']; ?><i class="fa fa-file-pdf-o"></i></a>
												<!-- </div>
												</div> -->
											<?php endforeach; ?>
										<?php endif; ?>
									</span>
									<!-- </h4> -->
								</div>
								<!-- <hr> -->
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once 'footer.php' ?>