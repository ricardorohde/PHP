﻿<?php
	session_start();
	if(($_POST['usu_login'] !='') && ($_POST['usu_senha']!=''))
	{
		require("../util/conecta.php");
		
		$texto_senha = $_POST['usu_senha'];
		
		$tamanho_senha = strlen($texto_senha);
		if($tamanho_senha >8)
		{
			alerta("Senha não pode ter mais de 8 caracteres");
			voltar();
			exit;
		}
		
	   $texto_senha = str_replace("=","",$texto_senha);
	   $texto_senha = str_replace("*","",$texto_senha);
	   $texto_senha = str_replace("drop","",$texto_senha);	   
	   $texto_senha = str_replace("insert","",$texto_senha);
	   $texto_senha = str_replace("--","",$texto_senha);	   
   	   $texto_senha = str_replace("'","",$texto_senha);
	   $texto_senha = str_replace(" or ","",$texto_senha);	   
	   $texto_senha = str_replace("delete","",$texto_senha);	   
  	   $texto_senha = addslashes($texto_senha);
		
		$sql = "select * from tbl_usuario where USU_LOGIN = '".addslashes($_POST['usu_login'])."' and USU_SENHA = '".
		md5($texto_senha)."'";
		$resultado = $con->banco->Execute($sql);
		if($registro = $resultado->FetchNextObject())
		{
			//alerta("Usuário valído");
		 // session_register('sessao_codigo_usuario');
		  $_SESSION['sessao_codigo_usuario'] = $registro->USU_CODIGO;
		//  session_register('sessao_nome_usuario');
		  $_SESSION['sessao_nome_usuario'] = $registro->USU_NOME;
		//  session_register('sessao_nivel_usuario');
		  $_SESSION['sessao_nivel_usuario'] = $registro->USU_NIVEL;
			direciona('index.php');
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