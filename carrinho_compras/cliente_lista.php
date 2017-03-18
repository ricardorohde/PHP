<link rel="stylesheet" type="text/css" href="../util/estilos.css">
<div align="center">
  <table width="666" border="1px" class="borda_tabela" cellspacing="2">
    <tr class="titulos_lista_pesquisa">
      <td colspan="5"><div align="center">
        <h3>Lista de Fornecedores</h3>
        <form action="index.php?tabela=fornecedor&acao=listar" method="post" name="form_pesquisa" id="form_pesquisa">
          <div align="center">Pesquisa: 
            <input name="pesquisa" type="text" id="pesquisa" size="50">
            <input type="submit" name="submit" id="submit" value="Pesquisar">
            </div>
          </form>
      </div></td>
    </tr>
    <tr class="ordenacao_novo_registro">
      <td width="278"><a href="index.php?tabela=fornecedor&acao=listar&ordem=FOR_RAZAOSOCIAL">
      <div align="left">Razão Social</div></td>
      <td width="156">Nome Fantásia</td>
      <td width="85"><a href="index.php?tabela=fornecedor&acao=listar&ordem=FOR_NOME_FANTASIA">
      <div align="left"><a href="index.php?tabela=fornecedor&acao=listar&ordem=FOR_CNPJ">CNPJ</div></td>
      
      <td colspan="2"><div align="center"><a href="index.php?tabela=fornecedor&acao=incluir">Novo Registro</a></div></td>
    </tr>
    <?php    
    while ($oquefazer->registros = $oquefazer->resultado->FetchNextObject()) 
    {
        //echo "fornecedor = " .  $resultado->Fields('FOR_NOME');    
?>
    <tr onMouseOver="muda_cor_over(this)" onMouseOut="muda_cor_out(this)">
      <td class="itens_tabela_banco"><?php  echo $oquefazer->registros->FOR_RAZAOSOCIAL; ?></td>
      <td class="itens_tabela_banco"><?php  echo $oquefazer->registros->FOR_NOME_FANTASIA; ?></td>
      <td class="itens_tabela_banco"><?php  echo $oquefazer->registros->FOR_CNPJ; ?>
      </td>
      <td width="63" class="alterar_excluir"><div align="center"><a href="index.php?tabela=fornecedor&acao=alterar&codigo=<?php  echo $oquefazer->registros->FOR_CODIGO; ?>">Alterar</a></div></td>
      <td width="50" class="alterar_excluir"><div align="center"><a href="javascript:if(confirm('Deseja realmente excluir esse registro ?'))
            {location='index.php?tabela=fornecedor&acao=excluir&codigo=<?php  echo $oquefazer->registros->FOR_CODIGO; ?>';}">Excluir</a></div></td>
      </tr>
    <?php
	}
	 ?>       
    <tr class="titulos_lista_pesquisa">
      <td colspan="5">Numero de registros: <?php  echo $oquefazer->total_registros(); ?></td>
    </tr>
  </table>
</div>
