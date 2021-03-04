<?php

$vSTitulo = 'Orientações Técnicas';
$vSName = 'orientacoes-tecnicas-detalhe';
require_once 'header.php';
require_once 'tw/transaction/site/transactionOrientacoesTecnicas.php';

if ($parametros[1] > 0) {
    $orientacao = getOrientacaoTecnicaById($parametros[1]);
}
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
						</div>
					</div>
				</div>
				<!-- end Row -->
				<div class="row">
					<!-- Start Column Start -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="company-faq left-faq">
							<div class="single-faq"
								style="text-align: justify !important;text-justify: inter-word !important;">
								<h4><span class="number">></span> <span
										class="q-text"><?php echo $orientacao['OXTNUMERO'].'/'.$orientacao['OXTANO']; ?></span>
								</h4>
								<p style="text-align: justify !important;text-justify: inter-word !important;">
									<?php echo $orientacao['OXTDESCRICAO']; ?>
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Start Quote Area -->
<?php require_once 'footer.php' ?>