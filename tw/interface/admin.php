<?php 
$namePage = 'admin';
$titlePage = 'Admin';
require_once '../app/header.php'; 
?>
<div class="container">
	<div class="row">
		<div class="section-title text-center">
			<h2>Bem vindo(a) <?= $_SESSION['SI_USUUSUARIO'] ?></h2>
			<span class="icon"></span>
		</div>
		<div class="row">
			<div class="col-md-2 col-sm-4 col-xs-6 col-lg-2">
				<section class="panel text-center">
					<div class="panel-body">
						<a href="listUsuarios.php" class="btn btn-system btn-circle btn-xl"><i class="fa fa-user"></i></a>
						<div class="h4">Blog</div>
						<div class="line m-l m-r"></div>
						<h4 class="text-info"><strong><?= countRegistros('BLOG', 'BLO') ?></strong></h4>
					</div>
				</section>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6 col-lg-2">
				<section class="panel text-center">
					<div class="panel-body">
						<a href="listUsuarios.php" class="btn btn-system btn-circle btn-xl"><i class="fa fa-user"></i></a>
						<div class="h4">Cases</div>
						<div class="line m-l m-r"></div>
						<h4 class="text-info"><strong><?= countRegistros('CASES', 'CAS') ?></strong></h4>
					</div>
				</section>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6 col-lg-2">
				<section class="panel text-center">
					<div class="panel-body">
						<a href="listUsuarios.php" class="btn btn-system btn-circle btn-xl"><i class="fa fa-user"></i></a>
						<div class="h4">Contatos</div>
						<div class="line m-l m-r"></div>
						<h4 class="text-info"><strong><?= countRegistros('CONTATOS', 'CON') ?></strong></h4>
					</div>
				</section>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6 col-lg-2">
				<section class="panel text-center">
					<div class="panel-body">
						<a href="listUsuarios.php" class="btn btn-system btn-circle btn-xl"><i class="fa fa-user"></i></a>
						<div class="h4">Usuários</div>
						<div class="line m-l m-r"></div>
						<h4 class="text-info"><strong><?= countRegistros('USUARIOS', 'USU') ?></strong></h4>
					</div>
				</section>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6 col-lg-2">
				<section class="panel text-center">
					<div class="panel-body">
						<a href="cadConfig.php?oid=1" class="btn btn-system btn-circle btn-xl"><i class="fa fa-gears"></i></a>
						<div class="h4">Configurações</div>
						<div class="line m-l m-r"></div>
						<h4 class="text-info"><strong><?= countRegistros('CONFIGURACOES', 'CFG') ?></strong></h4>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
<?php require_once '../app/footer.php'; ?>