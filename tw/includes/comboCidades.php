<?php
	if(isset($_GET['estado']) && is_numeric($_GET['estado'])){
		require_once '../includes/constantes.php';;
		require_once '../transaction/transactionCidades.php';;
		foreach(comboCidades($_GET['estado']) as $cidade){
			if($cidade['CIDCODIGO'] == $_GET['cidade'])
				echo "<option value=\"{$cidade[CIDCODIGO]}\" selected>{$cidade[CIDDESCRICAO]}</option>";
			else
				echo "<option value=\"{$cidade[CIDCODIGO]}\">{$cidade[CIDDESCRICAO]}</option>";
		}
	}