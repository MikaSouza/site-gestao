<?php
$namePage = 'categoriasFaq';
$titlePage = 'Cadastrar Categorias Faq';
require_once '../transaction/transactionCategoriasFaq.php';
require_once '../app/header.php';
?>
<script type="text/javascript" src="../js/min/spectrum.js"></script>
<link rel="stylesheet" type="text/css" href="../css/spectrum.min.css">

<div class="container">
    <div class="row">
        <div class="section-title text-center">
            <h2>Categorias Faq</h2>
            <span class="icon"></span>
        </div>
        <form class="form-default" name="formCategoriasFaq" method="POST">
            <div class="form-group">
                <label for="vSCFQCATEGORIA">Categorias Faq</label>
                <input type="text" class="form-control" id="vSCFQCATEGORIA" name="vSCFQCATEGORIA" placeholder="Escolha uma categoria" title="Categoria Faq" value="<?= $fill['CFQCATEGORIA']; ?>">
            </div>
            <div class="row">
                <div class="col-md-12 text-right">
                    <input type="hidden" name="vICFQCCODIGO" value="<?= $fill['CFQCCODIGO']; ?>">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php require_once '../app/footer.php'; ?>