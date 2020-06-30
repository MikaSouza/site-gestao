<?php 
$namePage = 'bancoImagens';
$titlePage = 'Cadastrar Imagens';
require_once '../app/header.php';
?>
<div class="container">
	<div class="row">
		<div class="section-title text-center">
			<h2>BancoImagens</h2>
			<span class="icon"></span>
		</div>
		<form class="form-default" name="formBancoImagens" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="vSBAITITULO">Título</label>
				<input type="text" name="vSBAITITULO" id="vSBAITITULO" class="form-control" value="<?= $fill['BAITITULO'] ?>" placeholder="Título" title="Título">
			</div>
			<?php if(empty($fill['BAIIMAGEM'])): ?>
				<div class="form-group">
					<label for="vFBAIIMAGEM">Imagem</label>
					<input type="file" name="vFBAIIMAGEM" id="vFBAIIMAGEM" class="form-control" placeholder="Imagem" title="Imagem">
				</div>
			<?php else: ?>
				<?= visualizarImagem($namePage, $fill['BAIIMAGEM'], $fill['BAICODIGO'], 'BAINERS', 'BAI', 'BAIIMAGEM'); ?>
			<?php endif; ?>
			<div class="row">
				<div class="col-md-12 text-right">
					<input type="hidden" name="vIBAICODIGO" value="<?= $fill['BAICODIGO']; ?>">
					<a href="list<?= ucfirst($namePage) ?>.php" class="btn btn-default">Voltar</a>
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php if(!empty($fill['BAIIMAGEM'])) echo gerarModal($namePage, $fill['BAIIMAGEM'], 1365/120); ?>
<?php require_once '../app/footer.php'; ?>