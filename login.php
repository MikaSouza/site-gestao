<?php

$vSTitulo = 'A Empresa';
$vSName = 'empresa';
require_once 'header.php';
require_once 'tw/transaction/transactionUsuarios.php';

?>

<!-- Start Bottom Header -->
<div class="page-area">
    <div class="breadcumb-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb text-center">
                    <div class="section-headline white-headline text-center">
                        <h3>Login</h3>
                    </div>
                    <ul>
                        <li class="home-bread">Home</li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Header -->
<!-- Start Slider Area -->
<div class="login-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="login-page">
                    <div class="login-form">
                        <h4 class="login-title text-center">LOG IN</h4>
                        <div class="row">
                            <form class="log-form" id="formUsuarios" name="formUsuarios" method="POST"">
                                <div class="col-md-12 col-sm-12 col-xs-12 ajusta">
                                    <input type="text" class="form-control" id="vSUSUUSUARIO" name="vSUSUUSUARIO" placeholder="Nome">
                                    <input type="password" class="form-control" id="vSUSUSENHA" name="vSUSUSENHA" placeholder="Senha">
                                    <div class="check-group flexbox">
                                        <label class="check-box">
                                            <input type="checkbox" class="check-box-input" checked>
                                            <span class="remember-text">Lembrar de mim</span>
                                        </label>
                                        <a class="text-muted" href="#">Esqueceu a senha</a>
                                    </div>
                                    <button type="submit" id="submit" class="slide-btn login-btn">Entrar</button>
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