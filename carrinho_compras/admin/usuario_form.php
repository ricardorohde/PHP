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
        <td colspan="2"><h2 align="center" class="titulos_lista_pesquisa">Manutenção de Usuários</h2></td>
      </tr>
      <tr class="borda_tabela">
        <td width="94">Nome</td>
        <td width="365"><input name="usu_nome" type="text" id="usu_nome" size="40" 
        value="<?php echo $oquefazer->registros->USU_NOME; ?>"/></td>
      </tr>
      <tr class="borda_tabela">
        <td>Login</td>
        <td><input name="usu_login" type="text" id="usu_login" size="40" 
        value="<?php echo $oquefazer->registros->USU_LOGIN; ?>"/></td>
      </tr>
      <tr class="borda_tabela">
        <td>Senha</td>
        <td><input name="usu_senha" type="password" id="usu_senha" size="40" 
        value="<?php echo $oquefazer->registros->USU_SENHA; ?>"/></td>
      </tr>
      <tr class="borda_tabela">
        <td>Nível</td>
        <td><select name="usu_nivel" id="usu_nivel">
          <?php
			$nivel1 = '';
			$nivel2 = '';

			switch($oquefazer->registros->USU_NIVEL)
			{
				case 'A': $nivel1 = 'selected';break;
				case 'L': $nivel2 = 'selected';break;
			}
		?>
          <option value="A" <?php echo $nivel1; ?>>Administrador</option>
          <option value="L" <?php echo $nivel2; ?>>Leitura</option>
        </select></td>
      </tr>
      <tr>
        <td colspan="2" align="center" class="titulos_lista_pesquisa"><input type="submit" name="button" id="button" value="Salvar">	
          <input type="reset" name="button2" id="button2" value="Limpar">
          <input type="button" name="button3" id="button3" value="Cancelar">
          <input type="hidden" name="tabela" id="usuario" value="usuario">
          <input type="hidden" name="acao" id="gravar" value="<?php echo 'gravar_'.$acao ?>">
        <input type="hidden" name="codigo" id="codigo" value="<?php echo $oquefazer->registros->USU_CODIGO; ?>"></td>
      </tr>
      <tr>
        <td colspan="2" class="titulos_lista_pesquisa">Rodapé</td>
      </tr>
    </table>
  </div>
</form>
</body>
</html>