<!-- Start Header via PHP -->
<?php

$vSTitulo = 'Preencha os dados';
$vSName = 'formulario';
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
                        <h3>Formulário</h3>
                    </div>
                    <ul>
                        <li class="home-bread">Início</li>
                        <li>Formulário</li>
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
                                <span>Seg - Sex: 08:00 - 17:00</span>
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
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Start Left contact -->
            <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="contact-form">
                    <div class="row">
                        <form class="contact-form" id="formContato" name="formContato" method="POST" action="enviarContato">
                            <h4 class="center-text">INFORMAÇÕES PRELIMINARES PARA INÍCIO DAS ATIVIDADES</h4>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>1 - Nome do Ente:</label><br>
                                <input type="text" class="form-control" id="vSCONNOME" name="vSCONNOME" placeholder="Insira o Nome do Ente:" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>2 - Número de habitantes do município:</label><br>
                                <input type="text" class="form-control" id="vSCONNOME" name="vSCONNOME" placeholder="Insira o Número de habitantes do município:" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>3 - Valor do orçamento anual:</label><br>
                                <input type="text" class="form-control" id="vSCONNOME" name="vSCONNOME" placeholder="Insira o Valor do orçamento anual:" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>4 - Número de servidores (inclui agentes políticos e ccs):</label><br>
                                <input type="text" class="form-control" id="vSCONNOME" name="vSCONNOME" placeholder="Insira o Número de servidores (inclui agentes políticos e ccs):" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>5 - Descrever a Lei que instituiu o Sistema de Controle Interno e suas alterações, anexando cópia:</label><br>
                                <input type="text" class="form-control" id="vSCONNOME" name="vSCONNOME" placeholder="Descreva" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>6 - A Unidade de Controle Interno possui Regimento Interno?</label><br>
                                <input type="radio" id="sim" name="s" value="sim">
                                <label for="s">Sim</label>
                                <input type="radio" id="nao" name="n" value="nao">
                                <label for="nao">Não</label>
                                <input type="text" class="form-control" id="vSCONNOME" name="vSCONNOME" placeholder="Se sim, descrever o número, ato legal, e anexar uma cópia:" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h5>7 - Do Responsável pelo Sistema de Controle Interno</h5>
                                <label>7.1 - O responsável pelo Sistema de Controle Interno ocupa o cargo de:</label><br>
                                <input type="radio" name="cargo" value="Presidente">
                                <label for="s">Presidente</label><br>
                                <input type="radio" name="cargo" value="Coordenador">
                                <label for="s">Coordenador</label><br>
                                <input type="radio" name="cargo" value="Diretor">
                                <label for="s">Diretor</label><br>
                                <input type="radio" name="cargo" value="Chefe">
                                <label for="s">Chefe</label><br>
                                <input type="radio" name="cargo" value="Outro">
                                <label for="s">Outro</label><br>
                                <small>Obs.: Anexar a portaria de nomeação no Sistema de Controle Interno.</small><br><br>
                                <label>Nome do Responsável:</label><br>
                                <input type="text" class="form-control" id="vSCONNOME" name="vSCONNOME" placeholder="Insira o Nome do Responsável" required>
                                <label>Formação:</label><br>
                                <input type="radio" name="cargo" value="Presidente">
                                <label for="s">1ª grau incompleto</label>
                                <input type="radio" name="cargo" value="Coordenador">
                                <label for="s">1ª grau completo</label>
                                <input type="radio" name="cargo" value="Diretor">
                                <label for="s">2º grau incompleto</label>
                                <input type="radio" name="cargo" value="Chefe">
                                <label for="s">2º grau completo</label><br>
                                <input type="radio" name="cargo" value="Outro">
                                <label for="s">Nível Superior. Descrever:</label>
                                <input type="text" class="form-control" id="vSCONNOME" name="vSCONNOME" placeholder="Insira o Superior" required>
                                <label>Tempo de Experiência no Controle Interno:</label><br>
                                <input type="text" class="form-control" id="vSCONNOME" name="vSCONNOME" placeholder="Insira o Tempo de Experiência no Controle Interno" required>
                                <label>Tem dedicação exclusiva no Controle Interno:</label><br>
                                <input type="radio" name="cargo" value="Presidente">
                                <label for="s">Sim</label>
                                <input type="radio" name="cargo" value="Coordenador">
                                <label for="s">Não</label><br><br>
                                <label>Qual cargo que ocupa no Município?</label>
                                <input type="text" class="form-control" id="vSCONNOME" name="vSCONNOME" placeholder="Insira o cargo que ocupa no Município" required>
                                <small>Obs.: Anexar a Lei com a descrição do cargo.</small><br><br>
                                <label>É servidor de Carreira?</label><br>
                                <input type="radio" name="cargo" value="Presidente">
                                <label for="s">Sim</label>
                                <input type="radio" name="cargo" value="Coordenador">
                                <label for="s">Não</label><br><br>
                                <label>Está em estágio probatório?</label><br>
                                <input type="radio" name="cargo" value="Presidente">
                                <label for="s">Sim</label>
                                <input type="radio" name="cargo" value="Coordenador">
                                <label for="s">Não</label><br><br>
                                <label>Realizou algum curso de atualização na área de Controle Interno da Administração Pública nos últimos 12 meses?</label><br>
                                <input type="radio" name="cargo" value="Presidente">
                                <label for="s">Nenhum</label>
                                <input type="radio" name="cargo" value="Coordenador">
                                <label for="s">Um</label>
                                <input type="radio" name="cargo" value="Presidente">
                                <label for="s">Dois à quatro</label>
                                <input type="radio" name="cargo" value="Coordenador">
                                <label for="s">Cinco ou mais</label><br><br>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h5>7.2 – Dos Membros do Sistema de Controle Interno</h5>
                                <label>Nome do Membro:</label><br>
                                <input type="text" class="form-control" id="vSCONNOME" name="vSCONNOME" placeholder="Insira o cargo que ocupa no Município" required>
                                <label>Formação:</label><br>
                                <input type="radio" name="cargo" value="Presidente">
                                <label for="s">1ª grau incompleto</label>
                                <input type="radio" name="cargo" value="Coordenador">
                                <label for="s">1ª grau completo</label>
                                <input type="radio" name="cargo" value="Diretor">
                                <label for="s">2º grau incompleto</label>
                                <input type="radio" name="cargo" value="Chefe">
                                <label for="s">2º grau completo</label><br>
                                <input type="radio" name="cargo" value="Outro">
                                <label for="s">Nível Superior. Descrever:</label>
                                <input type="text" class="form-control" id="vSCONNOME" name="vSCONNOME" placeholder="Insira o Superior" required>
                                <label>Tempo de Experiência no Controle Interno:</label><br>
                                <input type="text" class="form-control" id="vSCONNOME" name="vSCONNOME" placeholder="Insira o Tempo de Experiência no Controle Interno" required>
                                <label>Tem dedicação exclusiva no Controle Interno:</label><br>
                                <input type="radio" name="cargo" value="Presidente">
                                <label for="s">Sim</label>
                                <input type="radio" name="cargo" value="Coordenador">
                                <label for="s">Não</label><br><br>
                                <label>Qual cargo que ocupa no Município?</label>
                                <input type="text" class="form-control" id="vSCONNOME" name="vSCONNOME" placeholder="Insira o cargo que ocupa no Município" required>
                                <small>Obs.: Anexar a Lei com a descrição do cargo.</small><br><br>
                                <label>É servidor de Carreira?</label><br>
                                <input type="radio" name="cargo" value="Presidente">
                                <label for="s">Sim</label>
                                <input type="radio" name="cargo" value="Coordenador">
                                <label for="s">Não</label><br><br>
                                <label>Está em estágio probatório?</label><br>
                                <input type="radio" name="cargo" value="Presidente">
                                <label for="s">Sim</label>
                                <input type="radio" name="cargo" value="Coordenador">
                                <label for="s">Não</label><br><br>
                                <label>Realizou algum curso de atualização na área de Controle Interno da Administração Pública nos últimos 12 meses?</label><br>
                                <input type="radio" name="cargo" value="Presidente">
                                <label for="s">Nenhum</label>
                                <input type="radio" name="cargo" value="Coordenador">
                                <label for="s">Um</label>
                                <input type="radio" name="cargo" value="Presidente">
                                <label for="s">Dois à quatro</label>
                                <input type="radio" name="cargo" value="Coordenador">
                                <label for="s">Cinco ou mais</label><br><br>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h5>8 – Das atividades da Unidade de Controle Interno:</h5>
                                <label>8.1 - A Unidade de Controle Interno possui um planejamento/programa de trabalho com a descrição das suas atividades?</label><br>
                                <input type="radio" name="cargo" value="Presidente">
                                <label for="s">Sim</label>
                                <input type="radio" name="cargo" value="Presidente">
                                <label for="s">Não</label><br>
                                <small>Obs.: Anexar a Lei com a descrição do cargo.</small><br><br>
                                <label>8.2 Procedimentos de Auditoria:</label><br>
                                <input type="radio" name="cargo" value="Presidente">
                                <label for="s">Sim</label>
                                <input type="radio" name="cargo" value="Presidente">
                                <label for="s">Não</label>
                                <input type="radio" name="cargo" value="Presidente">
                                <label for="s">Raramente</label><br>
                                <label>Descrever o resumo das auditorias realizadas nos últimos 06 meses:</label><br>
                                <textarea class="form-control" id="vSCONMENSAGEM" name="vSCONMENSAGEM" rows="7" placeholder="Mensagem" required></textarea><br>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>8.3 - Verificações, Controles e Acompanhamentos:</label><br>
                                <input type="radio" name="cargo" value="Presidente">
                                <label for="s">Sim</label>
                                <input type="radio" name="cargo" value="Presidente">
                                <label for="s">Não</label>
                                <input type="radio" name="cargo" value="Coordenador">
                                <label for="s">Raramente</label><br>
                                <label>Descrever as espécies de verificações, controles e acompanhamentos realizados no exercício anterior e no corrente:</label><br>
                                <textarea class="form-control" id="vSCONMENSAGEM" name="vSCONMENSAGEM" rows="7" placeholder="Mensagem" required></textarea>
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