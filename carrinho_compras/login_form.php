<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
<link rel="stylesheet" type="text/css" href="util/estilos.css">
</head>

<body>
<form id="form_login" name="form_login" method="post" action="index.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="357" border="1" align="center" cellpadding="5" cellspacing="5" class="borda_tabela">
    <tr class="titulos_lista_pesquisa">
      <td colspan="2"><div align="center"> Caso você está cadastrado, entre com os dados      </div></td>
    </tr>
    <tr class="borda_tabela">
      <td width="76">Login</td>
      <td width="226"><input type="text" name="cli_login" id="cli_login"></td>
    </tr>
    <tr class="borda_tabela">
      <td>Senha</td>
      <td><input type="password" name="cli_senha" id="cli_senha"></td>
    </tr>
    <tr>
      <td colspan="2" align="center" class="titulos_lista_pesquisa">
      <input name="botao_acessar" type="submit" id="botao_acessar" form="form_login" value="Entrar">
      <input type="hidden" name="id" id="id" value="3" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center" class="titulos_lista_pesquisa">Caso você não está cadastrado,<a href="index.php?id=4&acao=novo_cliente"> cadastra-se aqui</a></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>