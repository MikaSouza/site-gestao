<?php
$namePage = 'cases';
$titlePage = 'Cadastrar Cases';
require_once '../app/header.php';
require_once '../transaction/transactionCategoriasCases.php';
?>
<div class="container">
    <div class="row">
        <div class="section-title text-center">
            <h2>Inserir Cases</h2>
            <span class="icon"></span>
        </div>
        <form class="form-default" name="formCases" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="vSCASTITULO">Nome do Case</label>
                <input type="text" class="form-control" id="vSCASTITULO" name="vSCASTITULO" placeholder="Nome do case" title="Nome do case" value="<?= $fill['CASTITULO']; ?>">
            </div>
            <div class="form-group">
                <label for="vICATCCODIGO">Categoria</label>
                <select class="form-control select" id="vICATCCODIGO" name="vICATCCODIGO" title="Escolha uma categoria">
                    <?php
                    foreach (comboCategoriasCases() as $categoria) {
                        if ($fill['CATCCODIGO'] == $categoria['CATCCODIGO'])
                            echo "<option value=\"{$categoria['CATCCODIGO']}\" selected>{$categoria['CATCCATEGORIA']}</option>\n";
                        else
                            echo "<option value=\"{$categoria['CATCCODIGO']}\">{$categoria['CATCCATEGORIA']}</option>\n";
                    }
                    ?>
                </select>
            </div>
			<div class="form-group">
                <label for="vICATCCODIGO2">Categoria 2</label>
                <select class="form-control select" id="vICATCCODIGO2" name="vICATCCODIGO2" title="Escolha uma categoria">
                    <?php
                    foreach (comboCategoriasCases() as $categoria) {
                        if ($fill['CATCCODIGO2'] == $categoria['CATCCODIGO'])
                            echo "<option value=\"{$categoria['CATCCODIGO']}\" selected>{$categoria['CATCCATEGORIA']}</option>\n";
                        else
                            echo "<option value=\"{$categoria['CATCCODIGO']}\">{$categoria['CATCCATEGORIA']}</option>\n";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">URL Amigável</label>
                <input title="URL Amigável" type="text" id="vSCASURLAMIG" name="vSCASURLAMIG" class="form-control" placeholder="URL Amigável" value="<?php echo escape_aspas_inputs($fill['CASURLAMIG'], "input"); ?>" maxlength="100" required>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="vSCASTEXTO">Texto</label>
                        <textarea class="form-control tinymce" id="vSCASTEXTO" name="vSCASTEXTO" placeholder="Digite seu texto aqui." title="Descrição do texto"><?= $fill['CASTEXTO']; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="row uploadUnico" style="display: none;">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label"></label>
                        <input name="vSCASIMAGEMUP" title="Imagem" type="file" id="vSCASIMAGEMUP" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row groupImages" style="display: none;">
                <div class="col-md-6 responseImage">
                    <div class="form-group">
                        <label class="control-label">Selecione uma imagem</label>
                        <div class="imagens"></div>
                        <div class="text-left col-md-6" style="margin-top: 1em;">
                            <span class="descImages"></span>
                        </div>
                        <div class="text-right col-md-6" style="margin-top: 1em;">
                            <button class="btn btn-primary" href="#" id="prev"><i class="fa fa-chevron-left"></i></button>
                            <button class="btn btn-primary" href="#" id="next"><i class="fa fa-chevron-right"></i></button>
                            <input type="hidden" name="vSCASIMAGEM" value="<?= $fill['CASIMAGEM'] ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Ou faça upload</label>
                        <input name="vSCASUPLOAD" title="vSCASUPLOAD" type="file" id="vSCASUPLOAD" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row imagemSelecionada">
                <div class="col-md-12">
                    <?php
                    if (!empty($fill['CASIMAGEM'])) {
                        if (filter_var($fill['CASIMAGEM'], FILTER_VALIDATE_URL) === FALSE) {
                            $urlImagem = $fill['CASIMAGEM'];
                            $urlThumb  = '../uploads/case/thumbnail/' . $fill['CASIMAGEM'];
                        } else {
                            $urlImagem = $fill['CASIMAGEM'];
                            $arrImg = explode('/', $urlImagem);
                            $urlThumb = '../uploads/case/thumbnail/' . end($arrImg);
                        }
                        echo visualizarImagem('case', $urlImagem, $fill['CASCODIGO'], 'CASES', 'CAS', 'CASIMAGEM', true);
                    }
                    ?>
                </div>
            </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            <input type="hidden" name="vICASCODIGO" value="<?= $fill['CASCODIGO']; ?>">
            <a href="list<?= ucfirst($namePage) ?>.php" class="btn btn-default">Voltar</a>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>
    </form>
</div>
</div>
<?php
if (!empty($fill['CASIMAGEM']))
    echo gerarModal('case', $urlImagem, 470 / 192, true); ?>
<?php require_once '../app/footer.php';
?>
<script>
    jQuery(document).ready(function($) {
        <?php
        if ($fill['CASIMAGEM'] == '') : ?>
            showUploadUnico('Faça upload de uma imagem!');
        <?php endif; ?>
    });
</script>