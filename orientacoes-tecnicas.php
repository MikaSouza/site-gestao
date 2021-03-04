<?php
/* Informa o nível dos erros que serão exibidos */
// error_reporting(E_ALL);
/* Habilita a exibição de erros */
// ini_set("display_errors", 1);

$vSTitulo = 'Orientações Técnicas';
$vSName = 'orientacoes-tecnicas';
require_once 'header.php';
require_once 'tw/transaction/site/transactionOrientacoesTecnicas.php';

// pre($orientacao);
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
								<h3>Orientações Técnicas</h3>
							</a>
							<p>Confira abaixo nossa base de orientações</p>
						</div>
					</div>
				</div>
				<!-- end Row -->
				<div class="row">
					<!-- Start Column Start -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="company-faq left-faq">
							<?php foreach (getOrientacoesTecnicas() as $orientacao) : ?>
							<div class="single-faq">
								<h4><span class="number">></span> <span
										class="q-text"><?php echo $orientacao['OXTNUMERO'].'/'.$orientacao['OXTANO']; ?></span>
								</h4>
								<p>
									<a
										href="orientacoes-tecnicas-detalhe/<?= $orientacao['OXTCODIGO']; ?>"><?php echo $orientacao['OXTTITULO']; ?></a>
								</p>
							</div>
							<?php
                            $remote_filename = 'https://gestao-srv.twflex.com.br/ged/orientacao_tecnica/'.$orientacao['OXTNUMERO'].'_'.$orientacao['OXTANO'].'.pdf';
                            ?>
							<div class=" download-btn">
								<div class="about-btn">
									<a href="<?php echo $remote_filename; ?>" target="_blanc"
										class="down-btn"><?php echo $orientacao['OXTNUMERO'].'_'.$orientacao['OXTANO'].'.pdf'; ?>
										<i class="fa fa-file-pdf-o"></i></a>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Start Quote Area -->
<?php require_once 'footer.php' ?>