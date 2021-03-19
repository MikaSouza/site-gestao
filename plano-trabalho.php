<?php

$vSTitulo = 'Plano de Trabalho';
$vSName = 'plano-trabalho';
require_once 'header.php';
require_once 'acessoLoginSite.php';
$codigoCliente = $_SESSION['SI_CONCODIGO'];
?>
<!-- Start Bottom Header
        <div class="page-area">
            <div class="breadcumb-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcrumb text-center">
                            <div class="section-headline white-headline text-center">
                                <h3>Plano de Trabalho</h3>
                            </div>
                            <ul>
                                <li class="home-bread">Home</li>
                                <li>Plano de Trabalho</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
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
								<h3>Plano de Trabalho <?= $codigoCliente ?></h3>
							</a>
							<p>Confira abaixo nosso plano de trabalho...</p>
						</div>
					</div>
				</div>
				<!-- end Row -->
				<div class="row">
					<!-- Start Column Start -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="company-faq left-faq">
							<!-- <div class="row">
										<div class="col-md-6">
											<div class="single-well mar-well">
												<a href="#">
													<h4>Checklist 1</h4>
												</a>
												<ul class="marker-list">
													<li>Item 1</li>
													<li>Item 2</li>
													<li>Item 3</li>
													<li>Item 4</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="single-page-head">
										<div class="download-btn">
											<div class="about-btn">
												<a href="#" class="down-btn">Instruções Básicas <i class="fa fa-file-pdf-o"></i></a>
												<a href="#" class="down-btn apli">Checklist <i class="fa fa-file-word-o"></i></a>
											</div>
										</div>
									</div> -->
							<?php $dados = comboDadosContatos($clicodigo);
							foreach ($dados['dados'] as $dado) : ?>
								<div class="single-faq">
									<h4><span class="number">1</span> <span class="q-text">SET/2020 - Elaboração de Manifestação Conclusiva ao TCE/RS, referente ao Poder Executivo e Poder Legislativo</span></h4>
									<p>Departamento: Obras - Responsável: João Pedro </p>
								</div>
							<?php endforeach; ?>
							<!-- <div class="single-faq">
								<h4><span class="number">2</span><span class="q-text">OUT/2020 - Auditoria nos processos de compras de pequenos valores realizados em razão da COVID-19</span></h4>
								<p>Departamento: Obras - Responsável: João Pedro </p>
							</div>
							<div class="single-faq">
								<h4><span class="number">3</span><span class="q-text">NOV/2020 - Elaboração de Manifestação Conclusiva ao TCE/RS, referente ao Poder Executivo e Poder Legislativo</span></h4>
								<p>Departamento: Obras - Responsável: João Pedro </p>
							</div>
							<div class="single-faq">
								<h4><span class="number">4</span><span class="q-text">DEZ/2020 - Realização de relatório com a análise da performance da receita e da despesa referente ao 1º semestre</span></h4>
								<p>Departamento: Obras - Responsável: João Pedro </p>
							</div> -->
							<!-- <div class="row">
								<div class="col-md-6">
									<div class="single-well mar-well">
										<a href="#">
											<h4>Checklist 1</h4>
										</a>
										<ul class="marker-list">
											<li>Item 1</li>
											<li>Item 2</li>
											<li>Item 3</li>
											<li>Item 4</li>
										</ul>
									</div>
								</div>
							</div> -->
							<div class="single-page-head">
								<div class="download-btn">
									<div class="about-btn">
										<a href="#" class="down-btn">Instruções Básicas <i class="fa fa-file-pdf-o"></i></a>
										<a href="#" class="down-btn apli">Checklist <i class="fa fa-file-word-o"></i></a>
									</div>
								</div>
							</div>
							<div class="single-faq">
								<h4><span class="number">5</span><span class="q-text">JAN/2021 - Auditoria Operacional</span></h4>
								<p>Departamento: Obras - Responsável: João Pedro </p>
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