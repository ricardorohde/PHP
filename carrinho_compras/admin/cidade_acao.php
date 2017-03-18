<?php
	require('cidade_manutencao.php');
	
	$oquefazer = new cidade_manutencao();
	
	$acao = $_REQUEST['acao'];
	//echo("$acao");
	
	if($acao == 'listar')
	{
		$filtro = $_REQUEST['pesquisa'];
		//echo "filtro = $filtro";
		
		$oquefazer->listar_cidade();
		require('cidade_lista.php');
	}
	
	if($acao == 'excluir')
	{
		$oquefazer->excluir();
		$oquefazer->listar_cidade();
		require('cidade_lista.php');
	}

	if($acao == 'incluir')
	{
		require('cidade_form.php');
	}	

	if($acao == 'gravar_incluir')
	{
		$oquefazer->gravar_incluir();
		$oquefazer->listar_cidade();
		require('cidade_lista.php');
	}	
	
	if($acao == 'alterar')
	{
		$oquefazer->alterar();
		require('cidade_form.php');
	}	

	if($acao == 'gravar_alterar')
	{
		$oquefazer->gravar_alterar();
		$oquefazer->listar_cidade();
		require('cidade_lista.php');	
	}		
?>