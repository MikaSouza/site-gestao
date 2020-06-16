<?php 
$namePage = 'banners';
$titlePage = 'Cadastrar Banners';
require_once '../app/header.php';
?>
<div class="container">
	<div class="row">
		<div class="section-title text-center">
			<h2>Banners</h2>
			<span class="icon"></span>
		</div>
		<form class="form-default" name="formBanners" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="vSBANTIPO">Tipo</label>
				<select name="vSBANTIPO" id="vSBANTIPO" class="form-control" title="Tipo de banner">
					<option value="D" <?php if($fill['BANTIPO'] == 'D') echo 'selected' ?>>Desktop</option>
					<option value="M" <?php if($fill['BANTIPO'] == 'M') echo 'selected' ?>>Mobile</option>
				</select>
			</div>
			<div class="form-group">
				<label for="vSBANTITULO">Título</label>
				<input type="text" name="vSBANTITULO" id="vSBANTITULO" class="form-control" value="<?= $fill['BANTITULO'] ?>" placeholder="Título" title="Título">
			</div>
			<div class="form-group">
				<label for="vSBANLINK">Link</label>
				<input type="url" name="vSBANLINK" id="vSBANLINK" class="form-control" value="<?= $fill['BANLINK'] ?>" placeholder="Link" title="Link">
			</div>
			<?php if(empty($fill['BANIMAGEM'])): ?>
				<div class="form-group">
					<label for="vFBANIMAGEM">Imagem</label>
					<input type="file" name="vFBANIMAGEM" id="vFBANIMAGEM" class="form-control" placeholder="Imagem" title="Imagem">
				</div>
			<?php else: ?>
				<?= visualizarImagem($namePage, $fill['BANIMAGEM'], $fill['BANCODIGO'], 'BANNERS', 'BAN', 'BANIMAGEM'); ?>
			<?php endif; ?>
			<div class="row">
				<div class="col-md-12 text-right">
					<input type="hidden" name="vIBANCODIGO" value="<?= $fill['BANCODIGO']; ?>">
					<a href="list<?= ucfirst($namePage) ?>.php" class="btn btn-default">Voltar</a>
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php
	if(!empty($fill['BANIMAGEM'])){
		$proporcao = ($fill['BANTIPO'] == 'D') ? 1365/768 : 991/1963;
		echo gerarModal($namePage, $fill['BANIMAGEM'], $proporcao);
	}
	require_once '../app/footer.php';
?>