<?php 
$namePage = 'banners';
$titlePage = 'Listar Banners';
require_once '../app/header.php'; 
?>
<div class="container">
	<div class="row">
		<div class="section-title text-center">
			<h2>Banners</h2>
			<span class="icon"></span>
		</div>
		<div class="row">
			<div class="table-responsive">
				<table id="tableBanners" class="table table-striped table-hover table-bordered dt-responsive nowrap table-default" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Tipo</th>
							<th>Título</th>
							<th>Link</th>
							<th>Ações</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>
<?php require_once '../app/footer.php'; ?>