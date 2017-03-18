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
        <td colspan="2"><h2 align="center" class="titulos_lista_pesquisa">Manutenção de Cidades</h2></td>
      </tr>
      <tr class="borda_tabela">
        <td width="94">Nome</td>
        <td width="365"><input name="CID_DESCRICAO" type="text" id="CID_DESCRICAO" size="40" 
        value="<?php echo $oquefazer->registros->CID_DESCRICAO; ?>"/></td>
      </tr>
      <tr class="borda_tabela">
        <td>UF</td>
        <td><select name="CID_UF" id="CID_UF">
          <?php
			$estado1 = '';
			$estado2 = '';

			switch($oquefazer->registros->CID_UF)
			{
				case 'SP': $estado1 = 'selected';break;
				case 'RJ': $estado2 = 'selected';break;
			}
		?>
          <option>AC</option>
          <option>AL</option>
          <option>AP</option>
          <option>AM</option>
          <option>BA</option>
          <option>CE</option>
          <option>DF</option>
          <option>ES</option>
          <option>GO</option>
          <option>MA</option>
          <option>MT</option>
          <option>MS</option>
          <option>MG</option>
          <option>PR</option>
          <option>PB</option>
          <option>PA</option>
          <option>PE</option>
          <option>PI</option>
          <option value="RJ" <?php echo $estado2; ?>>RJ</option>
          <option>RN</option>
          <option>RS</option>
          <option>RO</option>
          <option>RR</option>
          <option>SC</option>
          <option>SE</option>
          <option value="SP" <?php echo $estado1; ?>>SP</option>
          <option>TO</option>
        </select></td>
      </tr>
      <tr>
        <td colspan="2" align="center" class="titulos_lista_pesquisa"><input type="submit" name="button" id="button" value="Salvar">
          <input type="reset" name="button2" id="button2" value="Limpar">
          <input type="button" name="button3" id="button3" value="Cancelar">
          <input type="hidden" name="tabela" id="cidade" value="cidade">
          <input type="hidden" name="acao" id="gravar" value="<?php echo 'gravar_'.$acao ?>">
        <input type="hidden" name="codigo" id="codigo" value="<?php echo $oquefazer->registros->CID_CODIGO; ?>"></td>
      </tr>
      <tr>
        <td colspan="2" class="titulos_lista_pesquisa">Rodapé</td>
      </tr>
    </table>
  </div>
</form>
</body>
</html>