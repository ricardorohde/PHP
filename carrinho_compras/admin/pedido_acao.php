<?php
	require('pedido_manutencao.php');
	
	$oquefazer = new pedido_manutencao();
	
	$acao = $_REQUEST['acao'];
	//echo("$acao");
	
	if($acao == 'listar')
	{
		//$filtro = $_REQUEST['pesquisa'];
		//echo "filtro = $filtro";
		
		$oquefazer->listar_pedido();
		require('pedido_lista.php');
	}
	
?>