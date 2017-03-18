<link rel="stylesheet" type="text/css" href="../util/estilos.css">
<div align="center">
  <table width="606" border="1px" class="borda_tabela" cellspacing="2">
    <tr class="titulos_lista_pesquisa">
      <td colspan="4"><div align="center">
        <h3>Lista de Cidades</h3>
        <form action="index.php?tabela=cidade&acao=listar" method="post" name="form_pesquisa" id="form_pesquisa">
          <div align="center">Pesquisa: 
            <input name="pesquisa" type="text" id="pesquisa" size="50">
            <input type="submit" name="submit" id="submit" value="Pesquisar">
            </div>
          </form>
      </div></td>
    </tr>
    <tr class="ordenacao_novo_registro">
      <td width="527"><a href="index.php?tabela=cidade&acao=listar&ordem=CID_DESCRICAO">
      <div align="center">Descrição</div></td>
      <td width="87"><a href="index.php?tabela=cidade&acao=listar&ordem=CID_UF">
      <div align="center">UF</div></td>
      <td colspan="2"><div align="center"><a href="index.php?tabela=cidade&acao=incluir">Novo Registro</a></div></td>
    </tr>
    <?php    
    while ($oquefazer->registros = $oquefazer->resultado->FetchNextObject()) 
    {
        //echo "cidade = " .  $resultado->Fields('CID_DESCRICAO');    
?>
    <tr onMouseOver="muda_cor_over(this)" onMouseOut="muda_cor_out(this)">
      <td class="itens_tabela_banco"><?php  echo $oquefazer->registros->CID_DESCRICAO; ?></td>
      <td class="itens_tabela_banco"><div align="center">
        <?php  echo $oquefazer->registros->CID_UF; ?>
      </div></td>
      <td width="72" class="alterar_excluir"><div align="center"><a href="index.php?tabela=cidade&acao=alterar&codigo=<?php  echo $oquefazer->registros->CID_CODIGO; ?>">Alterar</a></div></td>
      <td width="75" class="alterar_excluir"><div align="center"><a href="javascript:if(confirm('Deseja realmente excluir esse registro ?'))
            {location='index.php?tabela=cidade&acao=excluir&codigo=<?php  echo $oquefazer->registros->CID_CODIGO; ?>';}">Excluir</a></div></td>
      </tr>
    <?php
	}
	 ?>       
    <tr class="titulos_lista_pesquisa">
      <td colspan="4">Numero de registros: <?php  echo $oquefazer->total_registros(); ?></td>
    </tr>
  </table>
</div>
