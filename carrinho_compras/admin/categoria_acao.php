<?php
	require('categoria_manutencao.php');
	
	$oquefazer = new categoria_manutencao();
	
	$acao = $_REQUEST['acao'];
	//echo("$acao");
	
	if($acao == 'listar')
	{
		$filtro = $_REQUEST['pesquisa'];
		//echo "filtro = $filtro";
		
		$oquefazer->listar_categoria();
		require('categoria_lista.php');
	}
	
	if($acao == 'excluir')
	{
		$oquefazer->excluir();
		$oquefazer->listar_categoria();
		require('categoria_lista.php');
	}

	if($acao == 'incluir')
	{
		require('categoria_form.php');
	}	

	if($acao == 'gravar_incluir')
	{
		$oquefazer->gravar_incluir();
		$oquefazer->listar_categoria();
		require('categoria_lista.php');
	}	
	
	if($acao == 'alterar')
	{
		$oquefazer->alterar();
		require('categoria_form.php');
	}	

	if($acao == 'gravar_alterar')
	{
		$oquefazer->gravar_alterar();
		$oquefazer->listar_categoria();
		require('categoria_lista.php');	
	}		
?>