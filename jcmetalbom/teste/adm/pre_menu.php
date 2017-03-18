<?
	include "protege.php";
	include "../php/mysqlconecta.php";	
?>
<link href="../css_js/estilos.css" rel="stylesheet" type="text/css" />

<table align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="143">
<script src="../css_js/ajax.js"></script>
<script src="../css_js/scr.js"></script>
<script language="javascript">
function remove(cod){
	url = 'scr_menus.php?op=excluir&cod=' + cod;
	if(confirm('Tem certeza de que deseja remover este item de menu?')){
		processaUrl(url,atualiza);
	}
}

function atualiza(){
	window.location.href = window.location.href;
}
</script>
<link rel="stylesheet" href="../css_js/estilos.css" />
<ul class="item">
        <li class="topo"><a href="#">Home</a></li>
        <li><a href="#">Empresa</a></li>
        <?
$sqlMenu = "SELECT men_codigo,men_nome FROM menu WHERE men_pai IS NULL ORDER BY men_ordem";
$rsMenu = mysql_query($sqlMenu);

while($itens = mysql_fetch_array($rsMenu)){
$rotulo = $itens['men_nome'];
$cod = $itens['men_codigo'];

$sqlSubMenu = "SELECT men_nome,men_codigo FROM menu WHERE men_pai = ".$cod." ORDER BY men_ordem";
$rsSubMenu = mysql_query($sqlSubMenu);
$linhas = mysql_num_rows($rsSubMenu);

if($linhas == 0){
?>
        <li><a href="javascript: remove('<? echo $cod; ?>');"><? echo $rotulo; ?></a> </li>
        <?
}else{ // Fecha o if($linhas == 0) e abre o else
?>
        <li><a href="javascript:alternaDiv('sub_<? echo $cod; ?>')"><? echo $rotulo; ?></a> </li>
        <div id="sub_<? echo $cod; ?>" style="display:none">
          <ul class="sub_item">
            <? 
							while($subItem = mysql_fetch_array($rsSubMenu)){
								$subRotulo = $subItem['men_nome'];
								$subCod = $subItem['men_codigo'];
						?>
            <li><a href="javascript:remove('<? echo $subCod; ?>')"><? echo $subRotulo; ?></a> </li>
            <?
							} // Fecha o while do subItem
						?>
          </ul>
        </div>
        <? 
} // Fecha o else de if($linhas == 0)
?>
        <? 
} // Fecha o while do menu
?>
        <li><a href="#">Contato</a></li>
      </ul></td>
</tr>
<tr>
  <td align="center" bgcolor="#FFFFFF" class="borda_baixo"><a class="links" href="javascript:window.close();">Fechar</a>&nbsp;&nbsp;&bull;&nbsp;&nbsp;<a class="links" href="javascript:atualiza();">Atualizar</a></td>
</tr>
<tr>
  <td align="center" bgcolor="#FFFFFF" class="saudacao">* Para excluir, <br />
    clque em um link<br /> 
    e confirme. <br />
    (Exceto para Home, <br />
    Empresa, Menu e itens<br /> 
    com sub-itens)</td>
</tr>
</table>
