<?php
/*
	[MENUS]

	atributos -> namePage  -> (obrigatorio)
				 titlePage -> (não obrigatório) [default mb_strtoupper(namepage)]
				 url       -> (não obrigatório) [default 'cad'.ucfirst(namepage).'.php']
				 submenu   -> repete a estrutura
*/
$menus = array(
	// array(
	// 	'namePage' => 'banners'
	// ),
	array(
		'namePage' => 'blog',
		'url'      => 'listBlog.php',
		'submenu'  => array(
			array(
				'namePage' => 'blog',
			),
			array(
				'namePage' => 'categorias',
				'titlePage' => 'categorias',
				'url' 	    => 'listCategorias.php'
			),
		)
	),
	array(
		'namePage' => 'contatos'
	),
	// array(
	// 	'namePage' => 'parceiros'
	// ),
	array(
		'namePage' => 'config',
		'url'      => 'cadConfig.php?oid=1',
		'submenu' => array(
			array(
				'namePage' => 'config',
				'url'      => 'cadConfig.php?oid=1'
			),
			array(
				'namePage'  => 'usuarios',
				'titlePage' => 'Usuários'
			),
		),
	),
);
?>
<nav id="mainheader">
	<div class="header default">
		<div class="yamm navbar navbar-default ">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Alternar Navegação</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="admin.php"><img alt="<?= cSNomeEmpresa ?>" title="<?= cSNomeEmpresa ?>" src="../imagens/<?= cSLogoMarca ?>" style="margin-top: -1em;width: 145px;height: auto;"></a>
				</div>
				<div class="collapse navbar-collapse navHead pull-right" id="mainMenu">
					<ul class="nav navbar-nav">
						<?php
						if (isset($_SESSION['SI_USUCODIGO']) && !empty($_SESSION['SI_USUCODIGO'])) :
							foreach ($menus as &$menu) {
								if ($menu['namePage'] != '') {
									$htmlSubmenu = '';
									$arrSubmenu = array();
									$titlePage = (array_key_exists('titlePage', $menu)) ? $menu['titlePage'] : mb_strtoupper($menu['namePage'], "UTF-8");
									$url = (array_key_exists('url', $menu)) ? $menu['url'] : 'list' . ucfirst($menu['namePage']) . '.php';
									$active = ($namePage == $menu['namePage']) ? " class=\"active\"" : null;
									if (array_key_exists('submenu', $menu) && is_array($menu['submenu'])) {
										foreach ($menu['submenu'] as &$submenu) {
											$titlePageSubmenu = (array_key_exists('titlePage', $submenu)) ? mb_strtoupper($submenu['titlePage'], "UTF-8") : mb_strtoupper($submenu['namePage'], "UTF-8");
											$urlSubmenu = (array_key_exists('url', $submenu)) ? $submenu['url'] : 'list' . ucfirst($submenu['namePage']) . '.php';
											$activeSubmenu = ($namePage == $submenu['namePage']) ? " class=\"active\"" : null;

											$arrSubmenu[] = $submenu['namePage'];
											$htmlSubmenu .= "<li{$activeSubmenu}>\n
																\t<a href=\"{$urlSubmenu}\">{$titlePageSubmenu}</a>\n
															</li>\n";
										}
									}

									$htmlSubmenu = ($htmlSubmenu != '') ? "<ul class=\"dropdown-menu\">" . $htmlSubmenu . "</ul>" : null;
									$active = ($htmlSubmenu != '') ? " class=\"dropdown\"" : $active;
									$active = in_array($namePage, $arrSubmenu) ? " class=\"dropdown active\"" : $active;
									echo "<li{$active}>\n
													\t<a href=\"{$url}\">{$titlePage}</a>\n
													{$htmlSubmenu}\n
												</li>\n";
								}
							}
						?>
							<li><a href="logout.php">Sair</a></li>
						<?php else : ?>
							<li><a href="../.././">Voltar ao site</a></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</nav>