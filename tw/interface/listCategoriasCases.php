<?php
$namePage = 'categoriasCases';
$titlePage = 'Listar Categorias Cases';
require_once '../app/header.php';
?>
<div class="container">
    <input type="hidden" name="vSCATCTIPO" id="vSCATCTIPO" value="<?= $_GET['vSCATCTIPO']; ?>">
    <div class="row">
        <div class="section-title text-center">
            <h2>Categorias de Cases</h2>
            <span class="icon"></span>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table id="tableCategoriasCases" class="table table-striped table-hover table-bordered dt-responsive nowrap table-default" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Categoria</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once '../app/footer.php'; ?>