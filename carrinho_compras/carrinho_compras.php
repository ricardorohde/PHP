<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>
<link rel="stylesheet" type="text/css" href="util/estilos.css">
<body>
<form id="FrmCarrinho" name="FrmCarrinho" method="post" action="index.php">
  <table width="620" border="1" align="center" cellspacing="0">
    <tr>
      <td colspan="4" align="center" class="titulos_lista_pesquisa">Meu Carrinho de Compras</td>
    </tr>
    <tr class="borda_tabela">
      <td width="306" align="center">Descrição do Produto</td>
      <td width="82" align="center">Quantidade</td>
      <td width="118" align="center">Preço Unitário</td>
      <td width="86" align="center">Total</td>
    </tr>
    <?php
		$total_carrinho = 0;
		$codcategoria = $_REQUEST['codcategoria'];
		while($oquefazer->registros = $oquefazer->resultado->FetchNextObject())
		{
			$total_carrinho += $oquefazer->registros->CAR_VALOR * $oquefazer->registros->CAR_QUANTIDADE;
			?>
                <tr class="borda_tabela">
                  <td><?php echo $oquefazer->registros->PROD_DESCRICAO;?></td>
                  <td>
        <input name="qtd[]" type="text" id="qtd[]" size="6" value="<?php echo $oquefazer->registros->CAR_QUANTIDADE;?>"><input name="codigo[]" type="hidden" id="codigo[]" value="<?php echo $oquefazer->registros->PROD_CODIGO;?>">
        </td>
                  <td><?php echo formata_money($oquefazer->registros->CAR_VALOR);?></td>
                  <td><?php echo formata_money($oquefazer->registros->CAR_VALOR * $oquefazer->registros->CAR_QUANTIDADE);?></td>
                </tr>
    <?php }?>      
    <tr class="borda_tabela">
      <td colspan="3" align="right">Total do Carrinho</td>
      <td><?php echo formata_money($total_carrinho);?></td>
    </tr>
    <tr class="borda_tabela">
      <td colspan="4" align="center">
      <input type="submit" name="botao_atualizar" id="botao_atualizar" value="Atualizar Pedido"> 
      <input type="hidden" name="acao" id="acao" value="atualizar_carrinho"> 
      <input type="hidden" name="id" id="id" value="1"> 
      <input type="hidden" name="codcategoria" id="codcategoria" value="<?php echo $codcategoria ;?>"> 
      - 
      <input type="button" name="botao_continuar_comprando" id="botao_continuar_comprando" value="Continuar Comprando" onClick="document.location='index.php?id=1&acao=listar_produtos&codcategoria=<?php echo $codcategoria ;?>'"></td>
    </tr>
    <tr class="titulos_lista_pesquisa">
      <td colspan="4" align="right"><a href="index.php?id=2&acao=finalizar_pedido">Finalizar Pedido</a></td>
    </tr>
  </table>
</form>
</body>
</html>