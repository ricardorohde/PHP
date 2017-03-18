<link rel="stylesheet" type="text/css" href="../util/estilos.css">
<div align="center">
  <table width="803" border="1px" class="borda_tabela" cellspacing="2">
    <tr class="titulos_lista_pesquisa">
      <td colspan="3"><div align="center">
        <h3>Lista de Clientes        </h3>
        <form action="index.php?tabela=cliente&acao=listar" method="post" name="form_pesquisa" id="form_pesquisa">
          <div align="center">Pesquisa: 
            <input name="pesquisa" type="text" id="pesquisa" size="50">
            <input type="submit" name="submit" id="submit" value="Pesquisar">
            </div>
        </form>
      </div></td>
    </tr>
    <tr class="ordenacao_novo_registro"><td width="321"><a href="index.php?tabela=cliente&acao=listar&ordem=PROD_DESCRICAO">
      <div align="left">Nome</div></td>
      <td width="284"><a href="index.php?tabela=cliente&acao=listar&ordem=PROD_VALOR">E-mail</td>
      <td width="176">Login</td>
    </tr>
    <?php    
    while ($oquefazer->registros = $oquefazer->resultado->FetchNextObject()) 
    {
        //echo "cliente = " .  $resultado->Fields('PROD_NOME');    
?>
    <tr onMouseOver="muda_cor_over(this)" onMouseOut="muda_cor_out(this)">
      <td class="itens_tabela_banco"><?php  echo $oquefazer->registros->CLI_NOME; ?></td>
      <td class="itens_tabela_banco"><?php  echo $oquefazer->registros->CLI_EMAIL; ?></td>
      <td class="itens_tabela_banco"><?php  echo $oquefazer->registros->CLI_LOGIN; ?></td>
      </tr>
    <?php
	}
	 ?>       
    <tr class="titulos_lista_pesquisa">
      <td colspan="3">Numero de registros: <?php  echo $oquefazer->total_registros(); ?></td>
    </tr>
  </table>
</div>
