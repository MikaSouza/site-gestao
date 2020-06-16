<?php 
$namePage = 'usuarios';
$titlePage = 'Cadastrar usuários';
require_once '../app/header.php'; 
?>
<div class="container">
	<div class="row">
		<div class="section-title text-center">
			<h2>Usuários</h2>
			<span class="icon"></span>
		</div>
		<form class="form-default" name="formUsuarios" method="POST">
			<div class="form-group">
				<label for="vSUSUUSUARIO">Usuário</label>
				<input type="text" class="form-control" id="vSUSUUSUARIO" name="vSUSUUSUARIO" placeholder="Usuário" title="Usuário" value="<?= $fill['USUUSUARIO']; ?>">
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="vSUSUSENHA">Senha</label>
						<input type="password" class="form-control" id="vSUSUSENHA" name="vSUSUSENHA" placeholder="Senha" title="Senha" value="<?= $fill['USUSENHA']; ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="vSUSUCONFIRMARSENHA">Confirmar senha</label>
						<input type="password" class="form-control" id="vSUSUCONFIRMARSENHA" name="vSUSUCONFIRMARSENHA" placeholder="Confirmar senha" title="Confirmar senha">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-right">
					<input type="hidden" name="vIUSUCODIGO" value="<?= $fill['USUCODIGO']; ?>">
					<a href="list<?= ucfirst($namePage) ?>.php" class="btn btn-default">Voltar</a>
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php require_once '../app/footer.php'; ?>