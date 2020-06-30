<!-- paginação -->
<?php
	function gerarPaginacao($tabela, $prefixo, $itensPorPagina, $condicao=null){
		if(file_exists('extranet/include/constantes.php')) require_once 'extranet/include/constantes.php';
		else require_once '../extranet/include/constantes.php';
		if($tabela == 'ATENDIMENTOS') $condicao = "AND CLICODIGO = $_SESSION[PARCODIGO]".$condicao;
		$sql = "SELECT
					count({$prefixo}CODIGO) as qtd
				FROM
					$tabela
				WHERE
					{$prefixo}STATUS = 'S'
					{$condicao}";
					
		$conexao    = sql_conectar_banco_login();
		$query      = sql_executa(vGBancoSite, $conexao, $sql);
		$rs         = sql_retorno_lista($query);
		$qtdPaginas = ceil($rs['qtd']/$itensPorPagina);
		if ($qtdPaginas > 0) {
					
		?>
		<ul class="paginacao" rel="<?= $tabela ?>">
			<li><a rel="prev" style="cursor:pointer;">Anterior</a></li>
			<?php for ($i=1; $i <= $qtdPaginas; $i++): ?>
				<li><a href="#" rel="<?= $i ?>" <?php if($i == 1) echo 'class="active"'; ?>><?= $i; ?></a></li>
			<?php endfor; ?>
			<li><a rel="next" style="cursor:pointer;">Próximo</a></li>
		</ul>
		<?
		}
	}
	if($_POST['methodPg'] == 'updatePaginacao'){
		$condicao = ' AND (';
		foreach ($_POST['condicao'][0] as  $v) {
			$condicao .= "$v LIKE '%{$_POST['condicao'][1]}%' OR ";
		}
		$condicao = rtrim($condicao, ' OR ');
		$condicao .= ')';
		gerarPaginacao($_POST['tabela'], $_POST['prefixo'], $_POST['itensPorPagina'], $condicao);
	}
?>
<!-- paginação -->