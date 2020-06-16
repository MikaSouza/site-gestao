<?php
$namePage = 'contatos';
$titlePage = 'Cadastrar Contatos';
require_once '../app/header.php';
?>
<div class="container">
	<div class="row">
		<div class="section-title text-center">
			<h2>Contatos</h2>
			<span class="icon"></span>
		</div>
		<form class="form-default" name="formContatos" method="POST">
			<div class="form-group">
				<label for="vSCONNOME">Nome</label>
				<input type="text" name="vSCONNOME" id="vSCONNOME" class="form-control" value="<?= $fill['CONNOME'] ?>" placeholder="Nome" required>
			</div>
			<div class="form-group">
				<label for="vSCONEMAIL">E-mail</label>
				<input type="email" name="vSCONEMAIL" id="vSCONEMAIL" class="form-control" value="<?= $fill['CONEMAIL'] ?>" placeholder="E-mail" required>
			</div>
			<div class="form-group">
				<label for="vSCONTELEFONE">Telefone</label>
				<input type="text" name="vSCONTELEFONE" id="vSCONTELEFONE" class="form-control telefone" value="<?= $fill['CONTELEFONE'] ?>" placeholder="Telefone" required>
			</div>
			<div class="form-group">
				<label for="vSCONMENSAGEM">Mensagem</label>
				<textarea name="vSCONMENSAGEM" id="vSCONMENSAGEM" class="form-control" placeholder="Mensagem" rows="10" required><?= $fill['CONMENSAGEM'] ?></textarea>
			</div>
			<div class="row">
				<div class="col-md-12 text-right">
					<input type="hidden" name="vICONCODIGO" value="<?= $fill['CONCODIGO']; ?>">
					<a href="list<?= ucfirst($namePage) ?>.php" class="btn btn-default">Voltar</a>
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php require_once '../app/footer.php'; ?>