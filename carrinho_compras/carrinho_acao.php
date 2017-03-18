<?php
	$acao = $_REQUEST['acao'];

	if($acao == 'listar_produtos')
	{
		$oquefazer->listar_produtos_categoria($_REQUEST['codcategoria']);
		require('mostra_produtos_categoria.php');
	}
	
	if($acao == 'incluir_carrinho')
	{
		$oquefazer->incluir_carrinho($_REQUEST['codproduto']);
		voltar();
	}
	
	if($acao == 'listar_carrinho')
	{
		$oquefazer->listar_carrinho();
		require('carrinho_compras.php');
	}
	
	if($acao == 'atualizar_carrinho')
	{
		$oquefazer->atualizar_carrinho();
		$oquefazer->listar_carrinho();
		require('carrinho_compras.php');
	}
	
	if($acao == 'finalizar_pedido')
	{
		require('login_form.php');
	}
	
?>