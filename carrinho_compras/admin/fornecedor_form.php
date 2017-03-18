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
        <td colspan="2"><h2 align="center" class="titulos_lista_pesquisa">Manutenção de Fornecedores</h2></td>
      </tr>
      <tr class="borda_tabela">
        <td>Razão Social</td>
        <td><input type="text" name="for_razaosocial" id="for_razaosocial" 
		value="<?php echo $oquefazer->registros->FOR_RAZAOSOCIAL; ?>"></td>
      </tr>
      <tr class="borda_tabela">
        <td>Nome Fantasia</td>
        <td><input type="text" name="for_nome_fantasia" id="for_nome_fantasia"
        value="<?php echo $oquefazer->registros->FOR_NOME_FANTASIA; ?>"></td>
      </tr>
      <tr class="borda_tabela">
        <td>Endereço</td>
        <td><input type="text" name="for_endereco" id="for_endereco"
        value="<?php echo $oquefazer->registros->FOR_ENDERECO; ?>"></td>
      </tr>
      <tr class="borda_tabela">
        <td>Bairro</td>
        <td><input type="text" name="for_bairro" id="for_bairro"
        value="<?php echo $oquefazer->registros->FOR_BAIRRO; ?>"></td>
      </tr>
      <tr class="borda_tabela">
        <td>Fone</td>
        <td><input type="text" name="for_fone" id="for_fone" onKeyPress="formata_mascara(this, '##-####-####')"
        value="<?php echo $oquefazer->registros->FOR_FONE; ?>"></td>
      </tr>
      <tr class="borda_tabela">
        <td width="94">Responsável</td>
        <td width="365"><input type="text" name="for_responsavel" id="for_responsavel"
        value="<?php echo $oquefazer->registros->FOR_RESPONSAVEL; ?>"></td>
      </tr>
      <tr class="borda_tabela">
        <td>E-mail</td>
        <td><input type="text" name="for_email" id="for_email"
        value="<?php echo $oquefazer->registros->FOR_EMAIL; ?>"></td>
      </tr>
      <tr class="borda_tabela">
        <td>Cep</td>
        <td><input type="text" name="for_cep" id="for_cep"
        value="<?php echo $oquefazer->registros->FOR_CEP; ?>"></td>
      </tr>
      <tr class="borda_tabela">
        <td>CNPJ</td>
        <td><input type="text" name="for_cnpj" id="for_cnpj"
        value="<?php echo $oquefazer->registros->FOR_CNPJ; ?>"></td>
      </tr>
      <tr class="borda_tabela">
        <td>Cidade</td>
        <td><select name="cid_codigo" id="cid_codigo">
          <option>Selecione uma cidade</option>
          <?php echo $oquefazer->listar_cidades();?>
        </select></td>
      </tr>
      <tr>
        <td colspan="2" align="center" class="titulos_lista_pesquisa"><input type="submit" name="button" id="button" value="Salvar">	
          <input type="reset" name="button2" id="button2" value="Limpar">
          <input type="button" name="button3" id="button3" value="Cancelar">
          <input type="hidden" name="tabela" id="fornecedor" value="fornecedor">
          <input type="hidden" name="acao" id="gravar" value="<?php echo 'gravar_'.$acao ?>">
        <input type="hidden" name="codigo" id="codigo" value="<?php echo $oquefazer->registros->FOR_CODIGO; ?>"></td>
      </tr>
      <tr>
        <td colspan="2" class="titulos_lista_pesquisa">Rodapé</td>
      </tr>
    </table>
  </div>
</form>
</body>
</html>