<?php
$namePage = 'blog';
$titlePage = 'Cadastrar Blog';
require_once '../app/header.php';
require_once '../transaction/transactionCategorias.php';
?>
<div class="container">
    <div class="row">
        <div class="section-title text-center">
            <h2>Blog</h2>
            <span class="icon"></span>
        </div>
        <form class="form-default" name="formBlog" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="vICATCODIGO">Categoria</label>
                <select class="form-control select" id="vICATCODIGO" name="vICATCODIGO" title="Cadastre uma categoria">
                    <?php
                    foreach (comboCategorias() as $categoria) {
                        if ($fill['CATCODIGO'] == $categoria['CATCODIGO'])
                            echo "<option value=\"{$categoria['CATCODIGO']}\" selected>{$categoria['CATCATEGORIA']}</option>\n";
                        else
                            echo "<option value=\"{$categoria['CATCODIGO']}\">{$categoria['CATCATEGORIA']}</option>\n";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="vSNOTTIPO">Tipo de Notícias</label>
                <select type="text" class="form-control" id="vSBLOTIPO" name="vSBLOTIPO" title="Tipo de Notícias">
                    <option value="I" <?php if ($fill['BLOTIPO'] == 'I') echo 'selected' ?>>Interna</option>
                    <option value="E" <?php if ($fill['BLOTIPO'] == 'E') echo 'selected' ?>>Externa</option>
                </select>
            </div>
            <div class="form-group">
                <label for="vSBLOTITULO">Título</label>
                <input type="text" class="form-control" id="vSBLOTITULO" name="vSBLOTITULO" placeholder="Titulo" title="Título" value="<?= escape_aspas_inputs($fill['BLOTITULO'], "input"); ?>">
            </div>
            <div class="form-group">
                <label for="vSBLOURL">URL</label><br />
                <div class="input-group">
                    <input title="URL" type="text" id="vSBLOURL" name="vSBLOURL" class="form-control" placeholder="Informe a URL para obter informações sobre o site" value="<?php echo escape_aspas_inputs($fill['BLOURL'], "input"); ?>">
                    <div class="input-group-btn">
                        <button class="btn btn-primary" id="parse" style="height: 2.62em;">Verificar</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">URL Amigável</label>
                        <input type="text" class="form-control" id="vSBLOURLAMIG" name="vSBLOURLAMIG" placeholder="URL Amigável" title="URL Amigável" value="<?php echo escape_aspas_inputs($fill['BLOURLAMIG'], "input"); ?>" maxlength="100" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="vSBLOTEXTO">Texto</label>
                    <textarea class="form-control tinymce" id="vSBLOTEXTO" name="vSBLOTEXTO" placeholder="Digite seu texto aqui." title="Descrição do texto"><?= $fill['BLOTEXTO']; ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="vSBLOVIDEO">Vídeo</label><br />
                        <input title="Vídeo" type="text" id="vSBLOVIDEO" name="vSBLOVIDEO" class="form-control" placeholder="Insira a URL de um vídeo do Youtube ou Vimeo para exibição no site" value="<?php echo $fill['BLOVIDEO']; ?>">
                    </div>
                </div>
            </div>
            <div class="row uploadUnico" style="display: none;">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label"></label>
                        <input name="vSBLOIMAGEMUP" title="Imagem" type="file" id="vSBLOIMAGEMUP" class="form-control">
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
                            <input type="hidden" name="vSBLOIMAGEM" value="<?= $fill['BLOIMAGEM'] ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Ou faça upload</label>
                        <input name="vSBLOUPLOAD" title="vSBLOUPLOAD" type="file" id="vSBLOUPLOAD" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row imagemSelecionada">
                <div class="col-md-12">
                    <?php
                    if (!empty($fill['BLOIMAGEM'])) {
                        if (filter_var($fill['BLOIMAGEM'], FILTER_VALIDATE_URL) === FALSE) {
                            $urlImagem = $fill['BLOIMAGEM'];
                            $urlThumb  = '../uploads/blog/thumbnail/' . $fill['BLOIMAGEM'];
                        } else {
                            $urlImagem = $fill['BLOIMAGEM'];
                            $arrImg = explode('/', $urlImagem);
                            $urlThumb = '../uploads/blog/thumbnail/' . end($arrImg);
                        }
                        echo visualizarImagem($namePage, $urlImagem, $fill['BLOCODIGO'], 'BLOG', 'BLO', 'BLOIMAGEM', true);
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-right">
                    <input type="hidden" name="vIBLOCODIGO" value="<?= $fill['BLOCODIGO']; ?>">
                    <a href="list<?= ucfirst($namePage) ?>.php" class="btn btn-default">Voltar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
if (!empty($fill['BLOIMAGEM']))
    echo gerarModal($namePage, $urlImagem, 470 / 192, true);
require_once '../app/footer.php';
?>
<script>
    jQuery(document).ready(function($) {
        <?php
        if ($fill['BLOIMAGEM'] == '') : ?>
            showUploadUnico('Faça upload de uma imagem!');
        <?php endif; ?>
    });
</script>