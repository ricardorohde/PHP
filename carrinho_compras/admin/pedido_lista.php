<link rel="stylesheet" type="text/css" href="../util/estilos.css">
<div align="center">
  <table width="803" border="1px" class="borda_tabela" cellspacing="2">
    <tr class="titulos_lista_pesquisa">
      <td colspan="4"><div align="center">
        <h3>Lista de Pedidos</h3>
        <form action="index.php?tabela=pedido&acao=listar" method="post" name="form_pesquisa" id="form_pesquisa">
          <div align="center">Pesquisa: 
            <input name="pesquisa" type="text" id="pesquisa" size="50">
            <input type="submit" name="submit" id="submit" value="Pesquisar">
            </div>
          </form>
      </div></td>
    </tr>
    <tr class="ordenacao_novo_registro"><td width="204"><a href="index.php?tabela=pedido&acao=listar&ordem=PROD_DESCRICAO">
      <div align="left">Cod. Produto</div></td>
      <td width="86"><a href="index.php?tabela=pedido&acao=listar&ordem=PROD_VALOR">Cod. Pedido</td>
      <td width="83">Qtde. Pedido</td>
      <td width="113"><div align="left">Valor Pedido</div></td>   
    </tr>
    <?php    
    while ($oquefazer->registros = $oquefazer->resultado->FetchNextObject()) 
    {
        //echo "pedido = " .  $resultado->Fields('PROD_NOME');    
?>
    <tr onMouseOver="muda_cor_over(this)" onMouseOut="muda_cor_out(this)">
      <td class="itens_tabela_banco"><?php  echo $oquefazer->registros->PROD_CODIGO; ?></td>
      <td class="itens_tabela_banco"><?php  echo $oquefazer->registros->PED_CODIGO; ?></td>
      <td class="itens_tabela_banco"><?php  echo $oquefazer->registros->PED_QUANT; ?></td>
	 <td class="itens_tabela_banco"><?php  echo $oquefazer->registros->PED_VALOR; ?></td>
      </tr>
    <?php
	}
	 ?>       
    <tr class="titulos_lista_pesquisa">
      <td colspan="4">Numero de registros: <?php  echo $oquefazer->total_registros(); ?></td>
    </tr>
  </table>
</div>
