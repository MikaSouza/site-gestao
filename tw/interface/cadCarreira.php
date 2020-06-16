<?php
$namePage = 'carreiras';
$titlePage = 'Cadastrar Carreiras';
require_once '../app/header.php';
?>
<div class="container">
	<div class="row">
		<div class="section-title text-center">
			<h2>Carreiras</h2>
			<span class="icon"></span>
		</div>
		<form class="form-default" name="formCarreiras" method="POST">
			<div class="form-group">
				<label for="vSCARNOME">Nome</label>
				<input type="text" name="vSCARNOME" id="vSCARNOME" class="form-control" value="<?= $fill['CARNOME'] ?>" placeholder="Nome" required>
			</div>
			<div class="form-group">
				<label for="vSCAREMAIL">E-mail</label>
				<input type="email" name="vSCAREMAIL" id="vSCAREMAIL" class="form-control" value="<?= $fill['CAREMAIL'] ?>" placeholder="E-mail" required>
			</div>
			<div class="form-group">
				<label for="vSCARTELEFONE">Telefone</label>
				<input type="text" name="vSCARTELEFONE" id="vSCARTELEFONE" class="form-control telefone" value="<?= $fill['CARTELEFONE'] ?>" placeholder="Telefone" required>
			</div>
			<div class="form-group">
				<label for="vSCARENDERECO">Endereço</label>
				<textarea name="vSCARENDERECO" id="vSCARENDERECO" class="form-control" placeholder="Mensagem" rows="10" required><?= $fill['CARENDERECO'] ?></textarea>
            </div>
            <div class="form-group">
				<label for="vFCARANEXO">Anexo</label>
				<textarea name="vFCARANEXO" id="vFCARANEXO" class="form-control" placeholder="Anexo" rows="10" required><?= $fill['CARANEXO'] ?></textarea>
			</div>
			<div class="row">
				<div class="col-md-12 text-right">
					<input type="hidden" name="vICARCODIGO" value="<?= $fill['CARCODIGO']; ?>">
					<a href="list<?= ucfirst($namePage) ?>.php" class="btn btn-default">Voltar</a>
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php require_once '../app/footer.php'; ?>