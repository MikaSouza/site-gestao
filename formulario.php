<!-- Start Header via PHP -->
<?php

$vSTitulo = 'Preencha os dados';
$vSName = 'formulario';
require_once 'header.php';

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
                        <form class="contact-form" id="formFormulario" name="formFormulario" method="POST" action="enviarFormulario">
                            <h4 class="center-text">INFORMAÇÕES PRELIMINARES PARA INÍCIO DAS ATIVIDADES!</h4>

                            <!-- Dados Gerais -->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>1 - Nome do Ente:</label><br>
                                <input type="text" class="form-control" id="vSFORNOMEDOENTE" name="vSFORNOMEDOENTE" placeholder="Insira o Nome do Ente:">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>2 - Número de habitantes do município:</label><br>
                                <input type="text" class="form-control" id="vSFORNUMHABMUNICIPIO" name="vSFORNUMHABMUNICIPIO" placeholder="Insira o Número de habitantes do município:">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>3 - Valor do orçamento anual:</label><br>
                                <input type="text" class="form-control" id="vMFORVALORCANUAL" name="vMFORVALORCANUAL" placeholder="Insira o Valor do orçamento anual:">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>4 - Número de servidores (inclui agentes políticos e ccs):</label><br>
                                <input type="text" class="form-control" id="vSFORNUMSERVIDORES" name="vSFORNUMSERVIDORES" placeholder="Insira o Número de servidores (inclui agentes políticos e ccs):">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>5 - Descrever a Lei que instituiu o Sistema de Controle Interno e suas alterações, anexando cópia:</label><br>
                                <input type="text" class="form-control" id="vSFORDESCLEI" name="vSFORDESCLEI" placeholder="Descreva">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>6 - A Unidade de Controle Interno possui Regimento Interno?</label><br>
                                <select name="vSFORPOSREGINTERNO" id="vSFORPOSREGINTERNO" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                </select><br>
                                <input type="text" class="form-control" id="vSFORDESCREGINTERNO" name="vSFORDESCREGINTERNO" placeholder="Se sim, descrever o número, ato legal, e anexar uma cópia:">
                                <div class="help-block with-errors"></div>
                            </div>
                            <!-- Dados Gerais -->

                            <!-- Responsavel -->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h5>7 - Do Responsável pelo Sistema de Controle Interno</h5>
                                <label>7.1 - O responsável pelo Sistema de Controle Interno ocupa o cargo de:</label><br>
                                <select name="vSFORCARGORESPINT" id="vSFORCARGORESPINT" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="Presidente">Presidente</option>
                                    <option value="Coordenador">Coordenador</option>
                                    <option value="Diretor">Diretor</option>
                                    <option value="Chefe">Chefe</option>
                                    <option value="Outro">Outro</option>
                                </select><br>
                                <small>Obs.: Anexar a portaria de nomeação no Sistema de Controle Interno.</small><br><br>
                                <label>Nome do Responsável:</label><br>
                                <input type="text" class="form-control" id="vSFORNOMERESPINT" name="vSFORNOMERESPINT" placeholder="Insira o Nome do Responsável">
                                <label>Formação:</label><br>
                                <select name="vSFORFORMRESPINT" id="vSFORFORMRESPINT" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="1ª grau incompleto">1ª grau incompleto</option>
                                    <option value="1ª grau completo">1ª grau completo</option>
                                    <option value="2º grau incompleto">2º grau incompleto</option>
                                    <option value="2º grau completo">2º grau completo</option>
                                    <option value="Nível Superior. Descrever:">Nível Superior. Descrever:</option>
                                </select><br>
                                <input type="text" class="form-control" id="vSFORSUPRESPINT" name="vSFORSUPRESPINT" placeholder="Insira o Superior">
                                <label>Tempo de Experiência no Controle Interno:</label><br>
                                <input type="text" class="form-control" id="vSFORTEMPEXPRESPINT" name="vSFORTEMPEXPRESPINT" placeholder="Insira o Tempo de Experiência no Controle Interno">
                                <label>Tem dedicação exclusiva no Controle Interno:</label><br>
                                <select name="vSFORDEDEXCRESPINT" id="vSFORDEDEXCRESPINT" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                </select><br>
                                <label>Qual cargo que ocupa no Município?</label>
                                <input type="text" class="form-control" id="vSFORCARGOMUNRESPINT" name="vSFORCARGOMUNRESPINT" placeholder="Insira o cargo que ocupa no Município">
                                <small>Obs.: Anexar a Lei com a descrição do cargo.</small><br><br>
                                <label>É servidor de Carreira?</label><br>
                                <select name="vSFORSERCARRRESPINT" id="vSFORSERCARRRESPINT" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                </select><br>
                                <label>Está em estágio probatório?</label><br>
                                <select name="vSFORESTPROBRESPINT" id="vSFORESTPROBRESPINT" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                </select><br>
                                <label>Realizou algum curso de atualização na área de Controle Interno da Administração Pública nos últimos 12 meses?</label><br>
                                <select name="vSFORREACURRESPINT" id="vSFORREACURRESPINT" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="Nenhum">Nenhum</option>
                                    <option value="Um">Um</option>
                                    <option value="Dois à quatro">Dois à quatro</option>
                                    <option value="Cinco ou mais">Cinco ou mais</option>
                                </select><br>
                                <div class="help-block with-errors"></div>
                            </div>
                            <!-- Responsavel -->

                            <!-- Membros -->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h5>7.2 – Dos Membros do Sistema de Controle Interno</h5>
                                <label>Nome do Membro:</label><br>
                                <input type="text" class="form-control" id="vSFORNOMEMEMBINT" name="vSFORNOMEMEMBINT" placeholder="Insira o Nome do Membro">
                                <label>Formação:</label><br>
                                <select name="vSFORFORMEMBINT" id="vSFORFORMEMBINT" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="1ª grau incompleto">1ª grau incompleto</option>
                                    <option value="1ª grau completo">1ª grau completo</option>
                                    <option value="2º grau incompleto">2º grau incompleto</option>
                                    <option value="2º grau completo">2º grau completo</option>
                                    <option value="Nível Superior. Descrever:">Nível Superior. Descrever:</option>
                                </select><br>
                                <input type="text" class="form-control" id="vSFORSUPMEMBINT" name="vSFORSUPMEMBINT" placeholder="Insira o Superior">
                                <label>Tempo de Experiência no Controle Interno:</label><br>
                                <input type="text" class="form-control" id="vSFORTEMPEXPMEMBINT" name="vSFORTEMPEXPMEMBINT" placeholder="Insira o Tempo de Experiência no Controle Interno">
                                <label>Tem dedicação exclusiva no Controle Interno:</label><br>
                                <select name="vSFORDEDEXCMEMBINT" id="vSFORDEDEXCMEMBINT" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                </select><br>
                                <label>Qual cargo que ocupa no Município?</label>
                                <input type="text" class="form-control" id="vSFORCARGOMUNMEMBINT" name="vSFORCARGOMUNMEMBINT" placeholder="Insira o cargo que ocupa no Município">
                                <small>Obs.: Anexar a Lei com a descrição do cargo.</small><br><br>
                                <label>É servidor de Carreira?</label><br>
                                <select name="vSFORSERCARRMEMBINT" id="vSFORSERCARRMEMBINT" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                </select><br>
                                <label>Está em estágio probatório?</label><br>
                                <select name="vSFORESTPROBMEMBINT" id="vSFORESTPROBMEMBINT" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                </select><br>
                                <label>Realizou algum curso de atualização na área de Controle Interno da Administração Pública nos últimos 12 meses?</label><br>
                                <select name="vSFORREACURMEMBINT" id="vSFORREACURMEMBINT" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="Nenhum">Nenhum</option>
                                    <option value="Um">Um</option>
                                    <option value="Dois à quatro">Dois à quatro</option>
                                    <option value="Cinco ou mais">Cinco ou mais</option>
                                </select><br>
                                <div class="help-block with-errors"></div>
                            </div>
                            <!-- Membros -->

                            <!-- Atividades -->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h5>8 – Das atividades da Unidade de Controle Interno:</h5>
                                <label>8.1 - A Unidade de Controle Interno possui um planejamento/programa de trabalho com a descrição das suas atividades?</label><br>
                                <select name="vSFORPOSSPLAUNIINT" id="vSFORPOSSPLAUNIINT" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                </select><br>
                                <small>Obs.: Anexar a Lei com a descrição do cargo.</small><br><br>
                                <label>8.2 Procedimentos de Auditoria:</label><br>
                                <select name="vSFORPROAUDUNIINT" id="vSFORPROAUDUNIINT" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                    <option value="Raramente">Raramente</option>
                                </select><br>
                                <label>Descrever o resumo das auditorias realizadas nos últimos 06 meses:</label><br>
                                <textarea class="form-control" id="vSFORDESCRESUNIINT" name="vSFORDESCRESUNIINT" rows="7" placeholder="Descreva aqui.."></textarea><br>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>8.3 - Verificações, Controles e Acompanhamentos:</label><br>
                                <select name="vSFORVERCONMUNIINT" id="vSFORVERCONMUNIINT" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                    <option value="Raramente">Raramente</option>
                                </select><br>
                                <label>Descrever as espécies de verificações, controles e acompanhamentos realizados no exercício anterior e no corrente:</label><br>
                                <textarea class="form-control" id="vSFORDESCVERCONUNIINT" name="vSFORDESCVERCONUNIINT" rows="7" placeholder="Descreva aqui.."></textarea><br>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>8.4 - Emissão de Relatórios:</label><br>
                                <label>Auditoria:</label><br>
                                <select name="vSFORAUDEMIREL" id="vSFORAUDEMIREL" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                    <option value="Raramente">Raramente</option>
                                </select><br>
                                <label>Nos últimos 06 meses, quantos foram emitidos?</label><br>
                                <input type="text" class="form-control" id="vSFORAUDQUANTEMIREL" name="vSFORAUDQUANTEMIREL" placeholder="Insira a Quantidade Emitida">
                                <label>Verificação:</label><br>
                                <select name="vSFORVEREMIREL" id="vSFORVEREMIREL" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                    <option value="Raramente">Raramente</option>
                                </select><br>
                                <label>Nos últimos 06 meses, quantos foram emitidos?</label><br>
                                <input type="text" class="form-control" id="vSFORVERQUANTEMIREL" name="vSFORVERQUANTEMIREL" placeholder="Insira a Quantidade Emitida">
                                <label>Acompanhamento:</label><br>
                                <select name="vSFORACOMEMIREL" id="vSFORACOMEMIREL" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                    <option value="Raramente">Raramente</option>
                                </select><br>
                                <label>Nos últimos 06 meses, quantos foram emitidos?</label><br>
                                <input type="text" class="form-control" id="vSFORACOMQUANTEMIREL" name="vSFORACOMQUANTEMIREL" placeholder="Insira a Quantidade Emitida">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>8.5 - O envio dos relatórios emitidos é realizado/direcionado para quem?</label><br>
                                <input type="text" class="form-control" id="vSFORENVIORELQUEM" name="vSFORENVIORELQUEM" placeholder="Insira para quem é realizado/direcionado">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>8.6 - Os responsáveis pelo recebimento dos relatórios emitidos pela Unidade de Controle Interno costumam responder identificando as medidas que foram ou serão adotadas com relação aos apontamentos de inconformidades e recomendações?</label><br>
                                <select name="vSFORRESPONRELAT" id="vSFORRESPONRELAT" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                </select><br>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>8.7 - Os relatórios ou outros atos produzidos pela Unidade de Controle Interno são entregues diretamente nos setores ou por meio de protocolo?</label><br>
                                <select name="vSFORENTRERELAT" id="vSFORENTRERELAT" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                </select><br>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>8.8 - A Unidade de Controle Interno emite Normas Internas Operacionais?</label><br>
                                <select name="vSFOREMISSAOINT" id="vSFOREMISSAOINT" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                </select><br>
                                <label>Se a resposta foi sim, qual ato administrativo foi usado para implantação das normas?</label><br>
                                <input type="text" class="form-control" id="vSFORATOADMNORM" name="vSFORATOADMNORM" placeholder="Insira o ato administrativo">
                                <small>Obs.: Anexar a Lei com a descrição do cargo.</small>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>8.9 - A Unidade de Controle Interno costuma registrar atividades em atas?</label><br>
                                <select name="vSFORUNIINTREGATA" id="vSFORUNIINTREGATA" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                </select><br>
                                <label>Se a resposta é sim, quais tipos de atividades?</label><br>
                                <input type="text" class="form-control" id="vSFORTIPOUNIINTREGATA" name="vSFORTIPOUNIINTREGATA" placeholder="Insira os tipos de atividades">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>8.10 - A Unidade de Controle Interno costuma participar de reuniões setoriais?</label><br>
                                <select name="vSFORUNIINTREUNIAO" id="vSFORUNIINTREUNIAO" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                </select><br>
                                <label>Tente explicar um pouco sobre a frequência, setores e quais espécies de reuniões:</label><br>
                                <textarea class="form-control" id="vSFORFREQREUNIAOUNIINT" name="vSFORFREQREUNIAOUNIINT" rows="7" placeholder="Explique aqui.."></textarea><br>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>8.11 - A Unidade de Controle Interno atua como auxiliar do Tribunal de Contas do seu Estado?</label><br>
                                <select name="vSFORATUAAUXUNIINT" id="vSFORATUAAUXUNIINT" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                </select><br>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>8.12 - Que ferramentas são utilizadas para interação com o TCE? Sistema informatizado, e-mail, preenchimento de relatórios? Por favor descreva.</label><br>
                                <textarea class="form-control" id="vSFORFERRAMENTASINT" name="vSFORFERRAMENTASINT" rows="7" placeholder="Descreva aqui.."></textarea><br>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label fid="lblAnexo" for="vFFORANEXOLEGIS">9 - Anexar a legislação e se possível organograma com a estrutura organizacional do Ente Público, com a descrição de gabinetes, secretarias, setores, departamentos, entre outros. </label><br>
                                <input type="file" class="form-control" name="vFFORANEXOLEGIS" id="vFFORANEXOLEGIS" title="Anexar">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                <button type="submit" class="add-btn contact-btn" id="submit">Enviar Formulário</button>
                                <button id="recaptcha" class="g-recaptcha" data-sitekey="<?= getConfig('CFGRECAPTCHASITEKEY') ?>" data-callback="enviarFormulario" data-badge="bottomleft" style="display: none;"></button>
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