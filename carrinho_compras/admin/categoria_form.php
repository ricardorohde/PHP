<!doctype html>
<html>
<head><link rel="stylesheet" type="text/css" href="../util/estilos.css">
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<body>
<form id="form1" name="form_cadastro" method="post" action="index.php">
  <div align="center">
    <table width="500" border="1" cellspacing="5" cellpadding="5">
      <tr class="titulos_lista_pesquisa">
        <td colspan="2"><h2 align="center" class="titulos_lista_pesquisa">Manutenção de Categoria</h2></td>
      </tr>
      <tr class="borda_tabela">
        <td width="94">Nome</td>
        <td width="365"><input name="CAT_DESCRICAO" type="text" id="CAT_DESCRICAO" size="40" 
        value="<?php echo $oquefazer->registros->CAT_DESCRICAO; ?>"/></td>
      </tr>
      <tr>
        <td colspan="2" align="center" class="titulos_lista_pesquisa"><input type="submit" name="button" id="button" value="Salvar">
          <input type="reset" name="button2" id="button2" value="Limpar">
          <input type="button" name="button3" id="button3" value="Cancelar">
          <input type="hidden" name="tabela" id="categoria" value="categoria">
          <input type="hidden" name="acao" id="gravar" value="<?php echo 'gravar_'.$acao ?>">
        <input type="hidden" name="codigo" id="codigo" value="<?php echo $oquefazer->registros->CAT_CODIGO; ?>"></td>
      </tr>
      <tr>
        <td colspan="2" class="titulos_lista_pesquisa">Rodapé</td>
      </tr>
    </table>
  </div>
</form>
</body>
</html>