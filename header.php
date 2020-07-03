<!doctype html>
<html class="no-js" lang="pt-br">

<head>
    <!-- Gerenciamento PHP -->
    <base href="<?= $_SERVER['SCRIPT_NAME'] ?>" />

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $vSTitulo; ?> - Gestão LTDA</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/logo/favicon.ico">

    <!-- all css here -->

    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
    <!-- responsive css -->
    <link rel="stylesheet" href="css/responsive.css">

    <!-- modernizr css -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>

    <!-- Chave do RECAPTCHA -->
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- SweetAlert -->
    <link rel="stylesheet" type="text/css" href="tw/libs/sweetalert/dist/sweetalert.css">
    <script type="text/javascript" src="tw/libs/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>

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
                                <li><a href="#"><i class="fa fa-envelope"></i> gestao@gestao.srv.br</a></li>
                                <li><a href="#"><i class="fa fa-phone-square"></i> (51) 3541-3355</a></li>
                                <li><a href="#"><i class="fa fa-clock-o"></i> Seg - Sex: 08:00 - 17:00</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="top-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sticker" class="header-area header-area-3 hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <div class="logo">
                            <a class="navbar-brand page-scroll white-logo" href="index">
                                <img src="img/logo/logo2.png" alt="">
                            </a>
                            <a class="navbar-brand page-scroll black-logo" href="index.html">
                                <img src="img/logo/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <div class="header-right-link">
                            <div class="search-inner">
                                <form action="#">
                                    <div class="search-option">
                                        <input type="text" placeholder="Search...">
                                        <button class="button" type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                    <a class="main-search" href="#"><i class="fa fa-search"></i></a>
                                </form>
                            </div>
                            <a class="s-menu" href="login.html">It Consultant</a>
                        </div>
                        <nav class="navbar navbar-default">
                            <div class="collapse navbar-collapse" id="navbar-example">
                                <div class="main-menu">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a id="ajusteMenu" href="empresa">A Empresa</a></li>
                                        <li><a id="ajusteMenu" href="#">Controle<br>Interno</a></li>
                                        <li><a id="ajusteMenu" href="blog">Blog</a></li>
                                        <li><a id="ajusteMenu" href="#">Capacitação</a></li>
                                        <li><a id="ajusteMenu" href="#">Outras<br>Atividades</a></li>
                                        <li><a id="ajusteMenu" href="contato">Contato</a></li>
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
                                <a href="index.html"><img src="img/logo/logo.png" alt="" /></a>
                            </div>
                            <nav id="dropdown">
                                <ul>
                                    <li><a href="empresa">A Empresa</a></li>
                                    <li><a href="#">Controle<br>Interno</a></li>
                                    <li><a href="blog">Blog</a></li>
                                    <li><a href="#">Capacitação</a></li>
                                    <li><a href="#">Outras<br>Atividades</a></li>
                                    <li><a href="contato">Contato</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>