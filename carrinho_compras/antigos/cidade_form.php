<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<body>
<form id="form1" name="form_cadastro" method="post" action="index.php">
  <div align="center">
    <table width="500" border="1" cellspacing="5" cellpadding="5">
      <tr>
        <td colspan="2"><h2 align="center">Manutenção de Cidades</h2></td>
      </tr>
      <tr>
        <td width="94">Nome</td>
        <td width="365"><input name="CID_DESCRICAO" type="text" id="CID_DESCRICAO" size="40"></td>
      </tr>
      <tr>
        <td>UF</td>
        <td><select name="CID_UF" id="CID_UF">
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
          <option>RJ</option>
          <option>RN</option>
          <option>RS</option>
          <option>RO</option>
          <option>RR</option>
          <option>SC</option>
          <option>SE</option>
          <option>SP</option>
          <option>TO</option>
        </select></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" name="button" id="button" value="Salvar">
        <input type="reset" name="button2" id="button2" value="Limpar">
        <input type="button" name="button3" id="button3" value="Cancelar">
        <input type="hidden" name="tabela" id="cidade" value="cidade">
        <input type="hidden" name="acao" id="gravar" value="gravar"></td>
      </tr>
      <tr>
        <td colspan="2">Rodapé</td>
      </tr>
    </table>
  </div>
</form>
</body>
</html>