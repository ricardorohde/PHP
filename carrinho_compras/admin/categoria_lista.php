<link rel="stylesheet" type="text/css" href="../util/estilos.css">
<div align="center">
  <table width="606" border="1px" class="borda_tabela" cellspacing="2">
    <tr class="titulos_lista_pesquisa">
      <td colspan="3"><div align="center">
        <h3>Lista de Categorias</h3>
        <form action="index.php?tabela=categoria&acao=listar" method="post" name="form_pesquisa" id="form_pesquisa">
          <div align="center">Pesquisa: 
            <input name="pesquisa" type="text" id="pesquisa" size="50">
            <input type="submit" name="submit" id="submit" value="Pesquisar">
            </div>
          </form>
      </div></td>
    </tr>
    <tr class="ordenacao_novo_registro">
      <td width="527"><a href="index.php?tabela=categoria&acao=listar&ordem=CAT_DESCRICAO">
      <div align="center">Descrição</div></td>
      <td colspan="2"><div align="center"><a href="index.php?tabela=categoria&acao=incluir">Novo Registro</a></div></td>
    </tr>
    <?php    
    while ($oquefazer->registros = $oquefazer->resultado->FetchNextObject()) 
    {
        //echo "categoria = " .  $resultado->Fields('CID_DESCRICAO');    
?>
    <tr onMouseOver="muda_cor_over(this)" onMouseOut="muda_cor_out(this)">
      <td class="itens_tabela_banco"><?php  echo $oquefazer->registros->CAT_DESCRICAO; ?></td>
      <td width="72" class="alterar_excluir"><div align="center"><a href="index.php?tabela=categoria&acao=alterar&codigo=<?php  echo $oquefazer->registros->CAT_CODIGO; ?>">Alterar</a></div></td>
      <td width="75" class="alterar_excluir"><div align="center"><a href="javascript:if(confirm('Deseja realmente excluir esse registro ?'))
            {location='index.php?tabela=categoria&acao=excluir&codigo=<?php  echo $oquefazer->registros->CAT_CODIGO; ?>';}">Excluir</a></div></td>
      </tr>
    <?php
	}
	 ?>       
    <tr class="titulos_lista_pesquisa">
      <td colspan="3">Numero de registros: <?php  echo $oquefazer->total_registros(); ?></td>
    </tr>
  </table>
</div>
