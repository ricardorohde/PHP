<?php
	require('produtos_manutencao.php');
	
	$oquefazer = new produtos_manutencao();
	
	$acao = $_REQUEST['acao'];
	//echo("$acao");
	
	if($acao == 'listar')
	{
		$filtro = $_REQUEST['pesquisa'];
		//echo "filtro = $filtro";
		
		$oquefazer->listar_produtos();
		require('produtos_lista.php');
	}
	
	if($acao == 'excluir')
	{
		$oquefazer->excluir();
		$oquefazer->listar_produtos();
		require('produtos_lista.php');
	}

	if($acao == 'incluir')
	{
		require('produtos_form.php');
	}	

	if($acao == 'gravar_incluir')
	{
		$oquefazer->gravar_incluir();
		$oquefazer->listar_produtos();
		require('produtos_lista.php');
	}	
	
	if($acao == 'alterar')
	{
		$oquefazer->alterar();
		require('produtos_form.php');
	}	

	if($acao == 'gravar_alterar')
	{
		$oquefazer->gravar_alterar();
		$oquefazer->listar_produtos();
		require('produtos_lista.php');	
	}		
?>