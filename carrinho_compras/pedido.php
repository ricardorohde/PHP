<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="util/estilos.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form id="FrmCarrinho" name="FrmCarrinho" method="post" action="index.php">
  <table width="663" class="borda_tabela">
    <tr>
      <td colspan="4" align="center" class="titulos_lista_pesquisa">Dados do Cliente</td>
    </tr>
    <?php
	    
		$oquefazer->registros_pedido = $oquefazer->res_pedido->FetchNextObject();
		$_SESSION['sessao_codigo_pedido'] = $oquefazer->registros_pedido->PED_CODIGO;
	?>
    <tr>
      <td colspan="4" align="left" class="borda_tabela">Nome:<?php echo $oquefazer->registros_pedido->CLI_NOME;?></td>
    </tr>
    <tr>
      <td colspan="4" align="left" class="borda_tabela">Endereço:<?php echo $oquefazer->registros_pedido->CLI_ENDERECO;?></td>
    </tr>
    <tr>
      <td colspan="4" align="left" class="borda_tabela">E-mail:<?php echo $oquefazer->registros_pedido->CLI_EMAIL;?></td>
    </tr>
    <tr>
      <td colspan="4" align="left" class="borda_tabela">Fone:<?php echo $oquefazer->registros_pedido->CLI_FONERES;?></td>
    </tr>
    <tr>
      <td colspan="4" align="center" class="titulos_lista_pesquisa">Produtos Adquiridos</td>
    </tr>
    <tr align="center"> 
      <td width="350" class="borda_tabela">Descrição do Produto</td>
      <td width="89">Quantidade</td>
      <td width="94">Preço Unitário</td>
      <td width="102">Total</td>
    </tr>
    
       	<?php
		  $total_carrinho = 0;
     	 // $codcategoria =  $_REQUEST['codcategoria']; 
		  
          while($oquefazer->reg_itens = $oquefazer->res_itens->FetchNextObject())
		  { 
		        $total_carrinho += $oquefazer->reg_itens->PED_VALOR * $oquefazer->reg_itens->PED_QUANT;
		  ?>
    
                    <tr  onmouseover="muda_cor_over(this)" onmouseout="muda_cor_out(this)">
                      <td><?php echo $oquefazer->reg_itens->PROD_DESCRICAO;?></td>
                      <td><?php echo $oquefazer->reg_itens->PED_QUANT;?></td>
                      <td><?php echo $oquefazer->reg_itens->PED_VALOR;?></td>
                      <td><?php echo formata_money($oquefazer->reg_itens->PED_VALOR * $oquefazer->reg_itens->PED_QUANT);?></td>
                      
    <?php } ?>
                      
                      
    </tr>
    <tr>
      <td colspan="3" align="right" class="borda_tabela">Total do Carrinho</td>
      <td><?php echo formata_money($total_carrinho);?></td>
    </tr>
    <tr class="titulos_lista_pesquisa">
      <td colspan="4" align="center"><a href="gera_boleto/boleto_cef.php" >Gerar o boleto</a></td>
    </tr>
  </table>
</form>
</body>
</html>