<!-- Start Header via PHP -->
<?php

$vSTitulo = 'Entre em contato';
$vSName = 'contato';
require_once 'header.php';
// require_once 'tw/includes/constantes.php';

?>
<!-- End Header via PHP -->

<!-- Start Bottom Header -->
<div class="page-area">
    <div class="breadcumb-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb text-center">
                    <div class="section-headline white-headline text-center">
                        <h3>Contato</h3>
                    </div>
                    <ul>
                        <li class="home-bread">Início</li>
                        <li>Contato</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Header -->
<!-- Start contact Area -->
<div class="contact-area area-padding">
    <div class="container">
        <div class="row">
            <div class="contact-inner">
                <!-- Start contact icon column -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="contact-icon text-center">
                        <div class="single-icon">
                            <i class="ti-mobile"></i>
                            <p>
                                Fone : (51) 3541-3355<br>
                                Whats : (51) 9 8443-2097<br>
                                <span>Seg - Sex: 8h às 12h</span><br>
                                <span>e das 13:30h às 18h</span>
                                <br>
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Start contact icon column -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="contact-icon text-center">
                        <div class="single-icon">
                            <i class="ti-email"></i>
                            <p>
                                E-mail : gestao@gestao.srv.br<br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Start contact icon column -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="contact-icon text-center">
                        <div class="single-icon">
                            <i class="ti-location-pin"></i>
                            <p>
                                Rua João Bayer, 744<br>
                                <span>Bairro Petrópolis CEP: 95607-008</span>
                                <span>Taquara/RS</span>
                                <br>
                                <br>
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <!-- Start Map -->
                <div class="map-area">
                    <div id="googleMap" style="width:100%;height:420px;"></div>
                </div>
                <!-- End Map -->
            </div>
            <!-- Start Left contact -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="contact-form">
                    <div class="row">
                        <form class="contact-form" id="formContato" name="formContato" method="POST" action="enviarContato">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" id="vSCONNOME" name="vSCONNOME" placeholder="Nome" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" id="vSCONTELEFONE" name="vSCONTELEFONE" onkeypress="return onlynumber();" onKeyUp="mascara('TEL',this,event);" maxlength="15" placeholder="Telefone" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="email" class="email form-control" id="vSCONEMAIL" name="vSCONEMAIL" placeholder="E-mail" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <textarea class="form-control" id="vSCONMENSAGEM" name="vSCONMENSAGEM" rows="7" placeholder="Mensagem" required></textarea>
                                <small style="color: #3078fb">Todos os campos são obrigatórios!</small>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                <button type="submit" class="add-btn contact-btn" id="submit">Enviar Mensagem</button>
                                <button id="recaptcha" class="g-recaptcha" data-sitekey="<?= getConfig('CFGRECAPTCHASITEKEY') ?>" data-callback="enviarContato" data-badge="bottomleft" style="display: none;"></button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Left contact -->
        </div>
    </div>
</div>
<!-- End Contact Area -->
<?php require_once 'footer.php' ?>