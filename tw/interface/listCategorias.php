<?php
$namePage = 'categorias';
$titlePage = 'Listar Categorias';
require_once '../app/header.php';
?>
<div class="container">
	<input type="hidden" name="vSCATTIPO" id="vSCATTIPO" value="<?= $_GET['vSCATTIPO'];?>">
	<div class="row">
		<div class="section-title text-center">
			<h2>Categorias</h2>
			<span class="icon"></span>
		</div>
		<div class="row">
			<div class="table-responsive">
				<table id="tableCategorias" class="table table-striped table-hover table-bordered dt-responsive nowrap table-default" cellspacing="0" width="100%">
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