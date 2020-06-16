<?php
$namePage = 'categoriasCases';
$titlePage = 'Cadastrar Categorias Cases';
require_once '../transaction/transactionCategoriasCases.php';
require_once '../app/header.php';
?>
<script type="text/javascript" src="../js/min/spectrum.js"></script>
<link rel="stylesheet" type="text/css" href="../css/spectrum.min.css">

<div class="container">
    <div class="row">
        <div class="section-title text-center">
            <h2>Categorias</h2>
            <span class="icon"></span>
        </div>
        <form class="form-default" name="formCategoriasCases" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="vSCATCCATEGORIA">Categorias</label>
                <input type="text" class="form-control" id="vSCATCCATEGORIA" name="vSCATCCATEGORIA" placeholder="Escolha uma categoria" title="Categoria" value="<?= $fill['CATCCATEGORIA']; ?>">
            </div>
            <div class="row">
                <div class="col-md-12 text-right">
                    <input type="hidden" name="vICATCCODIGO" value="<?= $fill['CATCCODIGO']; ?>">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php require_once '../app/footer.php'; ?>