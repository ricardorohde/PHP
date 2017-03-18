<!doctype html>
<html>
<head><link rel="stylesheet" type="text/css" href="../util/estilos.css">
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<body>
<form id="form1" name="form_cadastro" method="post" action="index.php" onSubmit="return verifica_nome(this)">
  <div align="center">
    <table width="500" border="1" cellspacing="5" cellpadding="5">
      <tr class="titulos_lista_pesquisa">
        <td colspan="2"><h2 align="center" class="titulos_lista_pesquisa">Manutenção de Produtos</h2></td>
      </tr>
      <tr class="borda_tabela">
        <td>Descrição</td>
        <td><input name="prod_descricao" type="text" id="prod_descricao" 
		value="<?php echo $oquefazer->registros->PROD_DESCRICAO; ?>" size="50"></td>
      </tr>
      <tr class="borda_tabela">
        <td>Valor</td>
        <td><input name="prod_valor" type="text" id="prod_valor"
        value="<?php echo $oquefazer->registros->PROD_VALOR; ?>" size="15"></td>
      </tr>
      <tr class="borda_tabela">
        <td>Quantidade</td>
        <td><input name="prod_quantidade" type="text" id="prod_quantidade"
        value="<?php echo $oquefazer->registros->PROD_QUANTIDADE; ?>" size="10"></td>
      </tr>
      <tr class="borda_tabela">
        <td>Categoria</td>
        <td><select name="cat_codigo" id="cat_codigo">
          <option>Selecione uma categoria</option>
          <?php echo $oquefazer->listar_categorias();?>
        </select></td>
      </tr>
      <tr class="borda_tabela">
        <td>Fornecedor</td>
        <td><select name="for_codigo" id="for_codigo">
          <option>Selecione um fornecedor</option>
          <?php echo $oquefazer->listar_fornecedores();?>
        </select></td>
      </tr>
      <tr class="borda_tabela">
        <td width="94">Tipo</td>
        <td width="365"><select name="prod_tipo" id="prod_tipo">
        <?php
			$tipo1 = '';
			$tipo2 = '';
			$tipo3 = '';
			$tipo4 = '';
			$tipo5 = '';
			
			switch($oquefazer->registros->PROD_TIPO)
			{
				case 'unid': $tipo1 = 'selected';break;
				case 'kg': $tipo2 = 'selected';break;
				case 'litro': $tipo3 = 'selected';break;
				case 'grama': $tipo4 = 'selected';break;
				case 'caixa': $tipo5 = 'selected';break;
			}
			
		?>
          <option>Selecione um tipo</option>
          <option value="unid" <?php echo $tipo1; ?>>unid</option>
          <option value="kg" <?php echo $tipo2; ?>>kg</option>
          <option value="litro" <?php echo $tipo3; ?>>litro</option>
          <option value="grama" <?php echo $tipo4; ?>>grama</option>
          <option value="caixa" <?php echo $tipo5; ?>>caixa</option>
        </select></td>
      </tr>
      <tr class="borda_tabela">
        <td>Observação</td>
        <td><textarea name="textarea" cols="50" rows="5" id="textarea"><?php echo $oquefazer->registros->PROD_OBS; ?></textarea></td>
      </tr>
      <tr>
        <td colspan="2" align="center" class="titulos_lista_pesquisa"><input type="submit" name="button" id="button" value="Salvar">	
          <input type="reset" name="button2" id="button2" value="Limpar">
          <input type="button" name="button3" id="button3" value="Cancelar">
          <input type="hidden" name="tabela" id="produtos" value="produtos">
          <input type="hidden" name="acao" id="gravar" value="<?php echo 'gravar_'.$acao ?>">
        <input type="hidden" name="codigo" id="codigo" value="<?php echo $oquefazer->registros->PROD_CODIGO; ?>"></td>
      </tr>
      <tr>
        <td colspan="2" class="titulos_lista_pesquisa">Rodapé</td>
      </tr>
    </table>
  </div>
</form>
</body>
</html>