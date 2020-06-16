<!-- paginação -->
<?php
	function gerarPaginacao($tabela, $prefixo, $itensPorPagina, $condicao=null){

		require_once 'tw/includes/constantes.php';

		$sql = "SELECT
					count({$prefixo}CODIGO) as qtd
				FROM
					$tabela
				WHERE
					{$prefixo}STATUS = 'S'
					{$condicao}";

	    $arrayQuery = array(
	        'query' => $sql,
	        'parametros' => array()
	    );
	    $result = consultaComposta($arrayQuery);

		$qtdPaginas = ceil($result['dados'][0]['qtd']/$itensPorPagina);

		if ($qtdPaginas > 1) {

		?>
		<ul class="pagination" rel="<?= $tabela ?>">
			<?php for ($i=1; $i <= $qtdPaginas; $i++): ?>
				<li class="page-item <?php if($i == 1) echo 'active'; ?>" rel="<?= $i ?>">
					<a href="#" class="page-link"><?= $i; ?></a>
				</li>
			<?php endfor; ?>
		</ul>
		<?php
		}
	}
?>
<!-- paginação -->