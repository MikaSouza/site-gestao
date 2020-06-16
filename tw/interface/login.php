<?php 
$namePage = 'login';
$titlePage = 'Login';
require_once '../app/header.php'; 
?>
<div class="container">
	<div class="row">
		<form class="form-default col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1" name="formUsuarios" method="POST" style="margin-top: 7em;">
			<div class="form-group">
			<label for="vSUSUUSUARIO">Usuário</label>
				<input type="text" class="form-control" id="vSUSUUSUARIO" name="vSUSUUSUARIO" placeholder="Usuário" title="Usuário" autofocus>
			</div>
			<div class="form-group">
				<label for="vSUSUSENHA">Senha</label>
				<input type="password" class="form-control" id="vSUSUSENHA" name="vSUSUSENHA" placeholder="Senha" title="Senha" >
			</div>
			<div class="row">
				<div class="col-md-12 text-right">
					<button type="submit" class="btn btn-primary">Login</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php require_once '../app/footer.php'; ?>