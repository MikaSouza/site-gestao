<?php
$namePage = 'newsletters';
$titlePage = 'Cadastrar Newsletters';
require_once '../app/header.php';
?>
<div class="container">
	<div class="row">
		<div class="section-title text-center">
			<h2>Newsletters</h2>
			<span class="icon"></span>
		</div>
		<form class="form-default" name="formNewsletters" method="POST">
			<div class="form-group">
				<label for="vSNEWEMAIL">E-mail</label>
				<input type="email" name="vSNEWEMAIL" id="vSNEWEMAIL" class="form-control" value="<?= $fill['NEWEMAIL'] ?>" placeholder="E-mail" title="E-mail">
			</div>
			<div class="row">
				<div class="col-md-12 text-right">
					<input type="hidden" name="vINEWCODIGO" value="<?= $fill['NEWCODIGO']; ?>">
					<a href="list<?= ucfirst($namePage) ?>.php" class="btn btn-default">Voltar</a>
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php require_once '../app/footer.php'; ?>