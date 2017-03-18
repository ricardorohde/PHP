<link rel="stylesheet" type="text/css" href="../util/estilos.css">
<div align="center">
  <table width="803" border="1px" class="borda_tabela" cellspacing="2">
    <tr class="titulos_lista_pesquisa">
      <td colspan="7"><div align="center">
        <h3>Lista de Produtos</h3>
        <form action="index.php?tabela=produtos&acao=listar" method="post" name="form_pesquisa" id="form_pesquisa">
          <div align="center">Pesquisa: 
            <input name="pesquisa" type="text" id="pesquisa" size="50">
            <input type="submit" name="submit" id="submit" value="Pesquisar">
            </div>
          </form>
      </div></td>
    </tr>
    <tr class="ordenacao_novo_registro"><td width="204"><a href="index.php?tabela=produtos&acao=listar&ordem=PROD_DESCRICAO">
      <div align="left">Descrição</div></td>
      <td width="86"><a href="index.php?tabela=produtos&acao=listar&ordem=PROD_VALOR">Valor</td>
      <td width="83">Quantidade</td>
      <td width="113"><div align="left">Categoria</div></td>   
      <td colspan="3"><div align="center"><a href="index.php?tabela=produtos&acao=incluir">Novo Registro</a></div></td>
    </tr>
    <?php    
    while ($oquefazer->registros = $oquefazer->resultado->FetchNextObject()) 
    {
        //echo "produtos = " .  $resultado->Fields('PROD_NOME');    
?>
    <tr onMouseOver="muda_cor_over(this)" onMouseOut="muda_cor_out(this)">
      <td class="itens_tabela_banco"><?php  echo $oquefazer->registros->PROD_DESCRICAO; ?></td>
      <td class="itens_tabela_banco"><?php  echo $oquefazer->registros->PROD_VALOR; ?></td>
      <td class="itens_tabela_banco"><?php  echo $oquefazer->registros->PROD_QUANTIDADE; ?></td>
      <td class="itens_tabela_banco"><?php  echo $oquefazer->registros->CAT_CODIGO; ?>
      </td>
      <td width="96" class="alterar_excluir"><div align="center"><a href="index.php?tabela=imagem&acao=listar&codigo=<?php  echo $oquefazer->registros->PROD_CODIGO; ?>">Imagem</a></div></td>
      <td width="89" class="alterar_excluir"><div align="center"><a href="index.php?tabela=produtos&acao=alterar&codigo=<?php  echo $oquefazer->registros->PROD_CODIGO; ?>">Alterar</a></div></td>
      <td width="86" class="alterar_excluir"><div align="center"><a href="javascript:if(confirm('Deseja realmente excluir esse registro ?'))
            {location='index.php?tabela=produtos&acao=excluir&codigo=<?php  echo $oquefazer->registros->PROD_CODIGO; ?>';}">Excluir</a></div></td>
      </tr>
    <?php
	}
	 ?>       
    <tr class="titulos_lista_pesquisa">
      <td colspan="7">Numero de registros: <?php  echo $oquefazer->total_registros(); ?></td>
    </tr>
  </table>
</div>
