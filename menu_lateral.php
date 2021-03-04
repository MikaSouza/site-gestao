<div class="page-head-left">
	<!-- strat single area -->
	<div class="single-page-head">
		<div class="left-menu">
			<ul>
				<!-- <li class="active"><a href="formulario">Informações Preliminares</a></li> -->
				<li <?php echo ($parametros[0] === 'dados-municipio') ? 'class="active"' : ''; ?>><a
						href="dados-municipio">Dados Município</a></li>
				<!-- <li><a href="plano-trabalho">Plano de Trabalho</a></li> -->
				<li
					<?php echo ($parametros[0] === 'orientacoes-tecnicas' || $parametros[0] === 'orientacoes-tecnicas-detalhe') ? 'class="active"' : ''; ?>>
					<a href="orientacoes-tecnicas">Orientações Técnicas</a>
				</li>
				<!--<li><a href="#">Calendário</a></li>-->
				<!-- <li><a href="documentos-municipio">Documentos</a></li> -->
				<li <?php echo ($parametros[0] === 'ajuda') ? 'class="active"' : ''; ?>><a href="ajuda">Ajuda</a></li>
				<li>
					<a href="logout">Sair</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- strat single area -->
	<!-- <div class="single-page-head">
		<div class="download-btn">
			<div class="about-btn">
				<a href="#" class="down-btn">Instruções Básicas <i class="fa fa-file-pdf-o"></i></a>
			</div>
		</div>
	</div> -->
	<!-- strat single area -->
	<div class="single-page-head">
		<div class="clients-testi">
			<div class="single-review text-center">
				<!-- <div class="review-img ">
					<img src="img/services/r1.jpg" alt="">
				</div> -->
				<div class="review-text">
					<p><?= $_SESSION['SS_CLIRAZAOSOCIAL']; ?></p>
					<h4><?php echo $_SESSION['SS_CONNOME']; ?></h4>
					<span class="guest-rev"><?php echo $_SESSION['SS_CONEMAIL']; ?><br><a
							href="#"><?php echo $_SESSION['SS_CONFONE']; ?></a></span>
				</div>
			</div>
		</div>
	</div>
	<!-- end single area -->
</div>