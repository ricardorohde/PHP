<?php

	require('pedido_manutencao.php');
	$oquefazer = new pedido_manutencao();
	
	$oquefazer->gravar_pedido();
	$oquefazer->listar_pedido();
	$oquefazer->listar_itens();
	require('pedido.php');
?>