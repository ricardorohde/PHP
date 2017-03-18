<?php
	if(($_POST['cli_login'] !='') && ($_POST['cli_senha']!=''))
	{
			
		$sql = "select * from tbl_cliente where CLI_LOGIN = '".$_POST['cli_login']."' and CLI_SENHA = '".
		$_POST['cli_senha']."'";
		$resultado = $con->banco->Execute($sql);
		if($registro = $resultado->FetchNextObject())
		{

		  $_SESSION['sessao_codigo_cliente'] = $registro->CLI_CODIGO;
		  $_SESSION['sessao_codigo'] = session_id();
		  direciona('index.php?id=5');
		  exit;
		}
		else
		{
			alerta("Usuário Inválido");	
			voltar();
			exit;
		}
	}
	else
		echo "Você precisa digitar o usuário e senha";	
?>