<link rel="stylesheet" type="text/css" href="../util/estilos.css">
<div align="center">
  <table width="579" border="1px" class="borda_tabela" cellspacing="2">
    <tr class="titulos_lista_pesquisa">
      <td colspan="3"><div align="center">
        <h3>Lista de Imagens do produto =<?php  echo $_REQUEST['codigo']?></h3>
        <p>&nbsp;</p>
      </div></td>
    </tr>
    <tr class="ordenacao_novo_registro"><td width="262"><a href="index.php?tabela=imagem&acao=listar&ordem=PROD_DESCRICAO">
      <div align="left">Descrição</div></td>
      <td width="153"><a href="index.php?tabela=imagem&acao=listar&ordem=IMG_DESCRICAO">Imagem</td>
      <td><div align="center"><a href="index.php?tabela=imagem&acao=incluir&codigo=<?php  echo $_REQUEST['codigo']?>">Novo Registro</a></div></td>
    </tr>
    <?php    
    while ($oquefazer->registros = $oquefazer->resultado->FetchNextObject()) 
    {
        //echo "produtos = " .  $resultado->Fields('PROD_NOME');    
?>
    <tr onMouseOver="muda_cor_over(this)" onMouseOut="muda_cor_out(this)">
      <td class="itens_tabela_banco"><?php  echo $oquefazer->registros->IMG_DESCRICAO; ?></td>
      <td class="itens_tabela_banco"><img src="../imagens/<?php  echo $oquefazer->registros->IMG_DESCRICAO; ?>"  alt="" width="100" height="100"/></td>
      <td width="142" class="alterar_excluir"><div align="center"><a href="javascript:if(confirm('Deseja realmente excluir esse registro ?'))
            {location='index.php?tabela=imagem&acao=excluir&codigo=<?php  echo $_REQUEST['codigo']?>&codigo_imagem=<?php  echo $oquefazer->registros->IMG_CODIGO; ?>';}">Excluir</a></div></td>
      </tr>
    <?php
	}
	 ?>       
    <tr class="titulos_lista_pesquisa">
      <td colspan="3">Numero de registros: <?php  echo $oquefazer->total_imagens(); ?></td>
    </tr>
  </table>
</div>
