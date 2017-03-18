<?php
	require('usuario_manutencao.php');
	
	$oquefazer = new usuario_manutencao();
	
	$acao = $_REQUEST['acao'];
	//echo("$acao");
	
	if($acao == 'listar')
	{
		$filtro = $_REQUEST['pesquisa'];
		//echo "filtro = $filtro";
		
		$oquefazer->listar_usuario();
		require('usuario_lista.php');
	}
	
	if($acao == 'excluir')
	{
		$oquefazer->excluir();
		$oquefazer->listar_usuario();
		require('usuario_lista.php');
	}

	if($acao == 'incluir')
	{
		require('usuario_form.php');
	}	

	if($acao == 'gravar_incluir')
	{
		$oquefazer->gravar_incluir();
		$oquefazer->listar_usuario();
		require('usuario_lista.php');
	}	
	
	if($acao == 'alterar')
	{
		$oquefazer->alterar();
		require('usuario_form.php');
	}	

	if($acao == 'gravar_alterar')
	{
		$oquefazer->gravar_alterar();
		$oquefazer->listar_usuario();
		require('usuario_lista.php');	
	}		
?>