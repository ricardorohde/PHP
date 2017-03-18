<?php
	require('cliente_manutencao.php');
	
	$oquefazer = new cliente_manutencao();
	
	$acao = $_REQUEST['acao'];
	//echo("$acao");
	
	if($acao == 'listar')
	{
		$filtro = $_REQUEST['pesquisa'];
		//echo "filtro = $filtro";
		
		$oquefazer->listar_cliente();
		require('cliente_lista.php');
	}
	
	
?>