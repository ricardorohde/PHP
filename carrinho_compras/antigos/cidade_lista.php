<table width="606" border="1" cellspacing="5" cellpadding="5">
  <tr>
    <td colspan="4"><div align="center">
      <h3>Lista de Cidades</h3>
    </div></td>
  </tr>
  <tr>
    <td width="527">Descrição</td>
    <td width="87">UF</td>
    <td colspan="2">Novo Registro</td>
  </tr>
  <?php

    require('../util/conecta.php');
    
    $sql = "select * from tbl_cidade";
    
    $resultado = $con->banco->Execute($sql);
    
    while (!$resultado->EOF) 
    {
        //echo "cidade = " .  $resultado->Fields('CID_DESCRICAO');    
?>
          <tr>
            <td><?php  echo $resultado->Fields('CID_DESCRICAO'); ?></td>
            <td><?php  echo $resultado->Fields('CID_UF'); ?></td>
            <td width="72">Alterar</td>
            <td width="75">Excluir</td>
          </tr>
   <?php
    $resultado->MoveNext();
	}
	 ?>       
  <tr>
    <td colspan="4">Numero de registros:</td>
  </tr>
</table>
