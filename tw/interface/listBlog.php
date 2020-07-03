<?php
$namePage = 'blog';
$titlePage = 'Listar Blog';
require_once '../app/header.php';
?>
<div class="container">
    <div class="row">
        <div class="section-title text-center">
            <h2>Consulta de Blog</h2>
            <span class="icon"></span>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table id="tableBlog" class="table table-striped table-hover table-bordered dt-responsive nowrap table-default" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Tipo de Notícias</th>
                            <th>Data</th>
                            <th>Categoria</th>
                            <th>Título</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once '../app/footer.php'; ?>