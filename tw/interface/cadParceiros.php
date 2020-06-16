<?php 
$namePage = 'parceiros';
$titlePage = 'Cadastrar Parceiros';
require_once '../app/header.php'; 
?>
<div class="container">
	<div class="row">
		<div class="section-title text-center">
			<h2>Parceiros</h2>
			<span class="icon"></span>
		</div>
		<form class="form-default" name="formParceiros" method="POST"  enctype="multipart/form-data">
			<div class="row">
				<div class="form-group col-md-12">
					<label for="vSPARCLIENTE">Parceiro</label>
					<input type="text" name="vSCLICLIENTE" id="vSCLICLIENTE" class="form-control" value="<?= $fill['CLICLIENTE'] ?>" placeholder="Cliente" title="Cliente">
				</div>
			</div>
			<?php if(empty($fill['PARIMAGEM'])): ?>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="vFPARIMAGEM">Imagem</label>
						<input type="file" name="vFPARIMAGEM" id="vFPARIMAGEM" class="form-control" placeholder="Imagem" title="Imagem">
					</div>
				</div>
			<?php else: ?>
				<?= visualizarImagem($namePage, $fill['PARIMAGEM'], $fill['PARCODIGO'], 'PARCEIROS', 'PAR', 'PARIMAGEM'); ?>
			<?php endif; ?>
			<div class="row">
				<div class="col-md-12 text-right">
					<input type="hidden" name="vIPARCODIGO" value="<?= $fill['PARCODIGO']; ?>">
					<a href="list<?= ucfirst($namePage) ?>.php" class="btn btn-default">Voltar</a>
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php if(!empty($fill['PARIMAGEM'])) echo gerarModal($namePage, $fill['PARIMAGEM'], 1); ?>
<?php require_once '../app/footer.php'; ?>