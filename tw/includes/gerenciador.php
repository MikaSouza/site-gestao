<?php
	if(file_exists('../transaction/transaction'.ucfirst($namePage).'.php')){
		require_once ('../transaction/transaction'.ucfirst($namePage).'.php');
		$arquivo = explode('/', $_SERVER['PHP_SELF']);
		if(substr(end($arquivo), 0, 3) == 'cad'){
			if(isset($_POST) && $_POST){
				if(function_exists('insertUpdate'.ucfirst($namePage))){
					$funcaoInsertUpdate = 'insertUpdate'.ucfirst($namePage);
					if(isset($_FILES) && $_FILES){
						$retornoInsert = $funcaoInsertUpdate($_POST, $_FILES);
					}else{
						$retornoInsert = $funcaoInsertUpdate($_POST);
					}
					if($retornoInsert > 0){
						echo "<script>
							swal({title : \"\", text : \"Registro salvo com sucesso!\", type : \"success\"},function(){location.href = \"".$_SERVER['PHP_SELF']."?oid={$retornoInsert}\"});
						</script>";
					}else{
						echo "<script>swal(\"Oops!\", \"Houve um erro ao salvar o registro!\", \"error\")</script>";
					}
				}
			}
			if(function_exists('fill'.ucfirst($namePage))){
				$funcaoFill = 'fill'.ucfirst($namePage);
				if(isset($_GET['oid']) && is_numeric($_GET['oid'])){
					$fill = $funcaoFill($_GET['oid']);
				}else{
					$fill = $funcaoFill();
				}
			}
		}
		unset($arquivo);
	}elseif ($namePage == 'login') {
		require_once '../transaction/transactionUsuarios.php';
		if(isset($_POST) && $_POST){
			if(logar($_POST)){
				echo "<script>
							swal({title : \"\", text : \"Usuário logado com sucesso!\", type : \"success\"},function(){location.href = \"admin.php\"});
						</script>";
			}else{
				echo "<script>swal(\"Oops!\", \"Usuário e/ou senha inválidos!\", \"warning\")</script>";
			}
		}
	}