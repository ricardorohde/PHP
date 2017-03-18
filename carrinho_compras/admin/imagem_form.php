<!doctype html>
<html>
<head><link rel="stylesheet" type="text/css" href="../util/estilos.css">
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<body>
<form action="index.php" method="post" enctype="multipart/form-data" name="form_cadastro" id="form1" onSubmit="return verifica_nome(this)">
  <div align="center">
    <table width="630" border="1" cellspacing="5" cellpadding="5">
      <tr class="titulos_lista_pesquisa">
        <td width="459"><h2 align="center" class="titulos_lista_pesquisa">Manutenção das Imagens de codigo = <?php  echo $_REQUEST['codigo']?></h2></td>
      </tr>
      <tr class="borda_tabela">
        <td>Selecione uma Imagem:
          <input name="img_descricao" type="file" id="img_descricao" size="50"></td>
      </tr>
      <tr>
        <td align="center" class="titulos_lista_pesquisa"><input type="submit" name="button" id="button" value="Salvar">	
          <input type="reset" name="button2" id="button2" value="Limpar">
          <input type="button" name="button3" id="button3" value="Cancelar">
          <input type="hidden" name="tabela" id="imagem" value="imagem">
          <input type="hidden" name="acao" id="gravar" value="<?php echo 'gravar_'.$acao ?>">
        <input type="hidden" name="codigo" id="codigo" value="<?php echo $_REQUEST['codigo']; ?>"></td>
      </tr>
      <tr>
        <td class="titulos_lista_pesquisa">Rodapé</td>
      </tr>
    </table>
  </div>
</form>
</body>
</html>