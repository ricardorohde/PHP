<link rel="stylesheet" type="text/css" href="../util/estilos.css">
<div align="center">
  <table width="666" border="1px" class="borda_tabela" cellspacing="2">
    <tr class="titulos_lista_pesquisa">
      <td colspan="5"><div align="center">
        <h3>Lista de Usuários</h3>
        <form action="index.php?tabela=usuario&acao=listar" method="post" name="form_pesquisa" id="form_pesquisa">
          <div align="center">Pesquisa: 
            <input name="pesquisa" type="text" id="pesquisa" size="50">
            <input type="submit" name="submit" id="submit" value="Pesquisar">
            </div>
          </form>
      </div></td>
    </tr>
    <tr class="ordenacao_novo_registro">
      <td width="278"><a href="index.php?tabela=usuario&acao=listar&ordem=USU_NOME">
      <div align="left">Nome</div></td>
      <td width="156">Login</td>
      <td width="85"><a href="index.php?tabela=usuario&acao=listar&ordem=CID_UF">
      <div align="left">Nivel</div></td>
      <td colspan="2"><div align="center"><a href="index.php?tabela=usuario&acao=incluir">Novo Registro</a></div></td>
    </tr>
    <?php    
    while ($oquefazer->registros = $oquefazer->resultado->FetchNextObject()) 
    {
        //echo "usuario = " .  $resultado->Fields('USU_NOME');    
?>
    <tr onMouseOver="muda_cor_over(this)" onMouseOut="muda_cor_out(this)">
      <td class="itens_tabela_banco"><?php  echo $oquefazer->registros->USU_NOME; ?></td>
      <td class="itens_tabela_banco"><?php  echo $oquefazer->registros->USU_LOGIN; ?></td>
      <td class="itens_tabela_banco"><?php  echo $oquefazer->registros->USU_NIVEL; ?>
      </td>
      <td width="63" class="alterar_excluir"><div align="center"><a href="index.php?tabela=usuario&acao=alterar&codigo=<?php  echo $oquefazer->registros->USU_CODIGO; ?>">Alterar</a></div></td>
      <td width="50" class="alterar_excluir"><div align="center"><a href="javascript:if(confirm('Deseja realmente excluir esse registro ?'))
            {location='index.php?tabela=usuario&acao=excluir&codigo=<?php  echo $oquefazer->registros->USU_CODIGO; ?>';}">Excluir</a></div></td>
      </tr>
    <?php
	}
	 ?>       
    <tr class="titulos_lista_pesquisa">
      <td colspan="5">Numero de registros: <?php  echo $oquefazer->total_registros(); ?></td>
    </tr>
  </table>
</div>
