<!doctype html>
<html class="no-js" lang="pt-br">

<head>
	<!-- Google Tag Manager -->

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],

j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=

'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);

})(window,document,'script','dataLayer','GTM-K8JMX59');</script>

<!-- End Google Tag Manager -->

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src=https://www.googletagmanager.com/ns.html?id=GTM-K8JMX59 height=0 width=0 style=display:none;visibility:hidden></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->


	<!-- SEO Teraware -->
	<title><?php echo $vSTitulo; ?> | Gestão LTDA</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="Inteligência com foco na Administração Pública" />
	<meta name="robots" content="index,follow">
	<link rel="canonical" href="http://gestao.srv.br/" />
	<meta name="MobileOptimized" content="320" />
	<meta name="keywords" content="gestão, administração pública, controle patrimonial, contabilidade e finanças, auditorias, serviços especiais  " />
	<meta name="author" content="Teraware Soluções em Software e Internet">
	<!-- SEO Teraware  -->

	<!-- Gerenciamento PHP -->
	<base href="<?= $_SERVER['SCRIPT_NAME'] ?>" />

	<!-- favicon -->
	<link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="img/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
	<link rel="manifest" href="img/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<!-- all css here -->

	<!-- bootstrap v3.3.6 css -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- SweetAlert -->
	<link rel="stylesheet" type="text/css" href="./assets/sweetalert2.min.css">
	<!-- owl.carousel css -->
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/owl.transitions.css">
	<!-- Animate css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- meanmenu css -->
	<link rel="stylesheet" href="css/meanmenu.min.css">
	<!-- font-awesome css -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/flaticon.css">
	<!-- venobox css -->
	<link rel="stylesheet" href="css/venobox.css">
	<!-- magnific css -->
	<link rel="stylesheet" href="css/magnific.min.css">
	<!-- style css -->
	<link rel="stylesheet" href="style.css">
	<?php if ($vSName = 'teste') : ?>
		<link rel="stylesheet" href="css/pop-up.css">
	<?php endif; ?>
	<!-- responsive css -->
	<link rel="stylesheet" href="css/responsive.css">

	<!-- modernizr css -->
	<script src="js/vendor/modernizr-2.8.3.min.js"></script>

	<!-- Libras -->
	<div vw class="enabled">
		<div vw-access-button class="active"></div>
		<div vw-plugin-wrapper>
			<div class="vw-plugin-top-wrapper"></div>
		</div>
	</div>
	<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
	<script>
		new window.VLibras.Widget('https://vlibras.gov.br/app');
	</script>
	<!-- Libras -->

	<?php if ($vSName = 'contato' or 'teste') : ?>
		<!-- SweetAlert -->
		<link rel="stylesheet" type="text/css" href="tw/libs/sweetalert/dist/sweetalert.css">
		<script type="text/javascript" src="tw/libs/sweetalert/dist/sweetalert.min.js"></script>
		<!-- Chave do RECAPTCHA -->
		<script type="text/javascript" src="https://www.google.com/recaptcha/api.js" async defer></script>
	<?php endif; ?>

	<style>
		.log-form label.error {
			color: red !important;
			font-weight: 100 !important;
			margin-top: -5px !important;
		}

		.log-form input.error,
		.log-form textarea.error {
			border-color: red !important;
		}
	</style>

	<?php if ($vSName == 'loginPainel') : ?>
		<link href="assets/sweetalert2.min.css" rel="stylesheet" type="text/css">
	<?php endif; ?>

	<!-- Constantes do PHP -->
	<?php require_once 'tw/includes/constantes.php'; ?>

</head>

<body>
	<!-- Google Tag Manager (noscript) -->

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K8JMX59"

height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<!-- End Google Tag Manager (noscript) -->
	<!--[if lt IE 8]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->

	<div id="preloader"></div>
	<header class="header-one">
		<div class="topbar-area fix hidden-xs">
			<div class="container">
				<div class="row">
					<div class=" col-md-9 col-sm-9">
						<div class="topbar-left">
							<ul>
								<li><a href="contato"><i class="fa fa-envelope"></i> gestao@gestao.srv.br</a></li>
								<li><a href="contato"><i class="fa fa-phone-square"></i> (51) 3541-3355</a></li>
								<li><a href="contato"><i class="fa fa-whatsapp"></i> (51) 98443-2097</a></li>
								<li><a href="contato"><i class="fa fa-clock-o"></i> Seg - Sex: 08h às 12h e das 13:30h
										às 18h</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-3 col-sm-3">
						<div class="top-social">
							<ul>
								<li><a href="https://www.facebook.com/gestaoltda" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a class="instaAlt" href="https://www.instagram.com/gestaoucci/?igshid=1k3hozxycimd7" target="_blank"><i class="fa fa-instagram"></i></a></li>
								<li><a class="faceAlt" href="https://www.facebook.com/gestaoamais" target="_blank"><i class="fa fa-facebook"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="sticker" class="header-area hidden-xs">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-3">
						<div class="logo">
							<a class="navbar-brand page-scroll black-logo" href="index">
								<img id="logo" src="img/logo/gestaoPreto.png" alt="Gestão LTDA">
							</a>
						</div>
					</div>
					<div class="col-md-9 col-sm-9 ajustaMenu">
						<div class="header-right-link">
							<div class="search-inner">
								<!-- <form action="#">
                                    <div class="search-option">
                                        <input type="text" placeholder="Search...">
                                        <button class="button" type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </form> -->
							</div>
							<!-- <a class="s-menu" href="http://sites-gestao-srv.teraware.net.br/login.php">InfoGestão</a> -->
							<a class="s-menu" href="https://gestao-srv.twflex.com.br/" alt="Sistema InfoGestão" title="Sistema InfoGestão">InfoGestão</a>
						</div>
						<nav class="navbar navbar-default">
							<div class="collapse navbar-collapse alinha" id="navbar-example">
								<div class="main-menu">
									<ul class="nav navbar-nav navbar-right">
										<li>
											<a href="index">Início</a>
										</li>
										<li>
											<a href="empresa">A Empresa</a>
										</li>
										<li>
											<a href="controle-interno">Controle<br>Interno</a>
										</li>
										<li>
											<a href="orientacao-tecnica">Orientações<br>Técnicas</a>
										</li>
										<li>
											<a class="pages" href="auditoria">Serviços<br> Especiais</a>
											<ul class="sub-menu">
												<li><a href="auditorias-especiais">Auditorias Especiais</a></li>
												<li><a href="contabilidade">Contabilidade e Finanças</a></li>
												<li><a href="controle-patrimonial">Controle Patrimonial</a></li>
												<li><a href="planejamento-estrategico">Planejamento Estratégico</a></li>
												<li><a href="servicos-especiais">Outros Serviços</a></li>

											</ul>
										</li>
										<li>
											<a href="blog">Blog</a>
										</li>
										<li>
											<a href="contato">Contato</a>
										</li>
									</ul>
								</div>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<div class="mobile-menu-area hidden-lg hidden-md hidden-sm">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mobile-menu">
							<div class="logo">
								<a href="index"><img src="img/logo/ee.png" alt="Gestão LTDA"></a>
							</div>
							<nav id="dropdown">
								<ul>
									<li>
										<a href="index">Início</a>
									</li>
									<li>
										<a href="empresa">A Empresa</a>
									</li>
									<li>
										<a href="controle-interno">Controle<br>Interno</a>
									</li>
									<li>
										<a href="orientacao-tecnica">Orientações<br>Técnicas</a>
									</li>
									<li>
										<a class="pages" href="auditoria">Serviços<br> Especiais</a>
									<li><a href="auditorias-especiais">Auditorias Especiais</a></li>
									<li><a href="contabilidade">Contabilidade e Finanças</a></li>
									<li><a href="controle-patrimonial">Controle Patrimonial</a></li>
									<li><a href="planejamento-estrategico">Planejamento Estratégico</a></li>
									<li><a href="servicos-especiais">Outros Serviços</a></li>
									</li>
									<li>
										<a href="blog">Blog</a>
									</li>
									<li>
										<a href="contato">Contato</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>