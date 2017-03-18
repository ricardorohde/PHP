<?php
	require('fornecedor_manutencao.php');
	
	$oquefazer = new fornecedor_manutencao();
	
	$acao = $_REQUEST['acao'];
	//echo("$acao");
	
	if($acao == 'listar')
	{
		$filtro = $_REQUEST['pesquisa'];
		//echo "filtro = $filtro";
		
		$oquefazer->listar_fornecedor();
		require('fornecedor_lista.php');
	}
	
	if($acao == 'excluir')
	{
		$oquefazer->excluir();
		$oquefazer->listar_fornecedor();
		require('fornecedor_lista.php');
	}

	if($acao == 'incluir')
	{
		require('fornecedor_form.php');
	}	

	if($acao == 'gravar_incluir')
	{
		$oquefazer->gravar_incluir();
		$oquefazer->listar_fornecedor();
		require('fornecedor_lista.php');
	}	
	
	if($acao == 'alterar')
	{
		$oquefazer->alterar();
		require('fornecedor_form.php');
	}	

	if($acao == 'gravar_alterar')
	{
		$oquefazer->gravar_alterar();
		$oquefazer->listar_fornecedor();
		require('fornecedor_lista.php');	
	}		
?>