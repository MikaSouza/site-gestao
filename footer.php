        <footer class="footer1">
            <div class="footer-area">
                <div class="container">
                    <div class="" style="position:fixed;bottom:72px;right:11px;z-index:9999;">
                        <a target="_blank" href="http://api.whatsapp.com/send?1=pt_BR&phone=5551984432097">
                            <img src="img/brand/whatsgestao.png" alt="Atendimento via WhatsApp" width="150px" height="80px">
                        </a>
                    </div>

                    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
                    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>

                    <script>
                        window.addEventListener("load", function() {
                            window.cookieconsent.initialise({
                                "palette": {
                                    "popup": {
                                        "background": "	#FFFFFF",
                                        "text": "#243559"
                                    },
                                    "button": {
                                        "background": "#3078FB"
                                    }
                                },
                                "theme": "classic",
                                "position": "bottom-left",
                                "content": {
                                    "message": "Usamos cookies para garantir que você obtenha a melhor experiência no nosso site.",
                                    "dismiss": "Entendi!",
                                    "link": "Leia mais…",
                                    "href": ""
                                }
                            })
                        });
                    </script>



                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <div class="footer-content logo-footer">
                                <div class="footer-head">
                                    <div class="footer-logo">
                                        <a href="index"><img id="logo" src="img/logo/kk.png" alt="Gestão LTDA"></a>
                                    </div>
                                    <p id="justifica">
                                        A Gestão atua especificamente no segmento de Administração Pública Municipal desde o ano 2000.
                                        São 19 anos vivenciando a realidade dos municípios brasileiros. Durante esse período, muitas
                                        soluções foram encontradas para aumentar a eficiência dos órgãos públicos.
                                    </p><br>
                                    <!-- <div class="footer-logoAlt">
                                        <a href="index"><img src="img/logo/gestaoA1.png" alt="Gestão A+ LTDA"></a>
                                    </div><br><br><br>
                                    <div class="footer-titleA">
                                        <p>Gestão A+ Desenvolvimento Ltda.</p>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-3 col-xs-12 pl-5P">
                            <div class="footer-content">
                                <div class="footer-head">
                                    <h4>Links Rápidos</h4>
                                    <ul class="footer-list">
                                        <li><a href="index">Início</a></li>
                                        <li><a href="empresa">A Empresa</a></li>
                                        <li><a href="controle-interno">Controle Interno</a></li>
                                        <li><a href="auditoria-especiais">Serviços Especiais</a></li>
                                        <li><a href="blog">Blog</a></li>
                                        <li><a href="contato">Contato</a></li>
                                        <br>
                                        <a href="https://www.facebook.com/gestaoltda">
                                            <i class="fa fa-facebook icons-footerAlt"></i>
                                            <p id="novaLogo">Gestão</p>
                                        </a><br>
                                        <a href="">
                                            <i class="fa fa-instagram icons-footerInsta"></i>
                                            <p id="novaLogo">Gestão</p>
                                        </a><br>
                                        <!-- <p class="icons-footerAlt-names">Gestão Ltda.</p> -->
                                        <a href="https://www.facebook.com/gestaoamais">
                                            <i class="fa fa-facebook icons-footerAlt2"></i>
                                            <p id="novaLogo2">Gestão A+</p>
                                        </a>
                                        <!-- <p class="icons-footerAlt-names">Gestão A+</p> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="footer-content last-content">
                                <div class="footer-head">
                                    <h4>Informações</h4>
                                    <div class="footer-contactsAlt">
                                        <p><span>Gestão Assessoria e Consultoria em Administração Pública Ltda.</span><br>
                                            CNPJ: 03.713.762/0001-23</p>
                                        <p><span>Gestão A+ Desenvolvimento Ltda.</span><br>
                                            CNPJ: 18.693.117/0001-63</p>
                                    </div>
                                    <div class="footer-contacts">
                                        <p><span>Localização :</span><br>
                                            Rua João Bayer, 744<br>
                                            Bairro Petrópolis - Taquara/RS<br>
                                            CEP: 95607-008</p>
                                        <p><span>Telefone :</span> (51) 3541-3355</p>
                                        <p><span>WhatsApp :</span> (51) 9 8443-2097</p>
                                        <p><span>E-mail :</span> gestao@gestao.srv.br</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-area-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="copyright">
                                <p>
                                    Copyright <?php echo date('Y'); ?> <a href="index"><?php echo cSNomeEmpresa; ?></a> Todos direitos reservados<br>
                                    Desenvolvido por <a href="http://portal.teraware.com.br/" target="_blank"><img src="img/logo/icon-tw.svg" width="33px" alt="Teraware - ERP | E-commerce | Web Sites | Outsourcing | Projetos Especiais" title="Teraware - ERP | E-commerce | Web Sites | Outsourcing | Projetos Especiais" /></a>Teraware Soluções em Software e Internet Ltda</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- all js here -->

        <script>
            let myGreeting = setInterval(function sayHi() {

                var text1 = "",
                    text2 = "";


                if ($("#flagText").val() >= 2) {
                    $("#flagText").val(0);
                }

                var val = $("#flagText").val();

                if (val == 0) {
                    text1 = "Inteligência com foco na Administração Pública";
                    text2 = "Controle Interno eficiente e menos burocrático";
                } else if (val == 1) {
                    text1 = "Práticas de Compliance no âmbito da Administração Pública";
                    text2 = "Experiência que ultrapassa 20 anos de assessoria à Órgãos Públicos";
                }

                $("#text-1").html(text1);
                $("#text-2").html(text2);

                $("#flagText").val(parseInt(val) + 1);

            }, 4000)
        </script>

        <!-- jquery latest version -->
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <!-- bootstrap js -->
        <script src="js/bootstrap.min.js"></script>
        <!-- owl.carousel js -->
        <!-- <script src="js/owl.carousel.min.js"></script> -->
        <!-- Comentado para single banner da index -->

        <!-- Counter js -->
        <script src="js/jquery.counterup.min.js"></script>
        <!-- waypoint js -->
        <script src="js/waypoints.js"></script>
        <!-- magnific js -->
        <script src="js/magnific.min.js"></script>
        <!-- wow js -->
        <script src="js/wow.min.js"></script>
        <!-- venobox js -->
        <script src="js/venobox.min.js"></script>
        <!-- meanmenu js -->
        <script src="js/jquery.meanmenu.js"></script>
        <!-- Form validator js -->
        <script src="js/form-validator.min.js"></script>
        <!-- plugins js -->
        <script src="js/plugins.js"></script>
        <!-- main js -->
        <script src="js/main.js"></script>

        <?php if ($vSName == 'contato') : ?>
            <script src="js/contato.js"></script>
            <script src="js/mascaras.js"></script>
            <!-- Scrip Validade do Contato.php -->
            <script src="js/jquery.validate.min.js"></script>
            <!-- Google Map js -->
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBceNl50o3BU6LrsIGJxSL9tKKvqBKIeVs"></script>
            <script src="js/mapcode.js"></script>
        <?php endif; ?>

        <?php if ($vSName == 'formulario') : ?>
            <script src="js/formulario.js"></script>
            <!-- Scrip Validade do Login.php -->
            <script src="js/jquery.validate.min.js"></script>
        <?php endif; ?>

        <?php if ($vSName == 'login') : ?>
            <script src="js/login.js"></script>
            <!-- Sweet-Alert  -->
            <script src="assets/sweetalert2.min.js"></script>
            <script src="assets/jquery.sweet-alert.init.js"></script>
            <?php if ($_GET['vMGS'] == 'E') { ?>
                <script type="text/javascript" DEFER="DEFER">
                    Swal.fire('Opss..', 'Login ou Senha inválidos!', 'warning');
                </script>
            <?php } ?>
        <?php endif; ?>

        </body>

        </html>