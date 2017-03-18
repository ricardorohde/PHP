<?
include('protege.php');
?>
<link href="../js_css/estilos.css" rel="stylesheet" type="text/css">
<form name="formIncluir" id="formIncluir" method="post" action="">
<table width="80%" border="0" cellspacing="1" cellpadding="0" bgcolor="#CCCCCC">
  <tr>
    <td width="30%" id="optMenuAdm" bgcolor="#FFFFFF" align="right">Nome:</td>
    <td width="70%" id="optMenuAdm" bgcolor="#FFFFFF"><input name="cmpNome" type="text" class="BoxHome" id="cmpNome" size="40" maxlength="60"></td>
  </tr>
  <tr>
    <td width="30%" id="optMenuAdm" bgcolor="#FFFFFF" align="right">Endere&ccedil;o:</td>
    <td width="70%" id="optMenuAdm" bgcolor="#FFFFFF"><input name="cmpEndereco" type="text" class="BoxHome" id="cmpEndereco" size="40" maxlength="100"></td>
  </tr>
  <tr>
    <td width="30%" id="optMenuAdm" bgcolor="#FFFFFF" align="right">Bairro:</td>
    <td width="70%" id="optMenuAdm" bgcolor="#FFFFFF"><input name="cmpBairro" type="text" class="BoxHome" id="cmpBairro" size="40" maxlength="40"></td>
  </tr>
  <tr>
    <td width="30%" id="optMenuAdm" bgcolor="#FFFFFF" align="right">Cidade:</td>
    <td width="70%" id="optMenuAdm" bgcolor="#FFFFFF"><input name="cmpCidade" type="text" class="BoxHome" id="cmpCidade" size="40" maxlength="40"></td>
  </tr>
  <tr>
    <td width="30%" id="optMenuAdm" bgcolor="#FFFFFF" align="right">Estado:</td>
    <td width="70%" id="optMenuAdm" bgcolor="#FFFFFF"><select name="cmpEstado" class="BoxHome" id="cmpEstado">
      <option value="AC">Acre</option>
      <option value="AL">Alagoas</option>
      <option value="AP">Amap&aacute;</option>
      <option value="AM">Amazonas</option>
      <option value="BA">Bahia</option>
      <option value="CE">Cear&aacute;</option>
      <option value="DF">Distrito Federal</option>
      <option value="ES">Esp&iacute;rito Santo</option>
      <option value="GO">Goi&aacute;s</option>
      <option value="MA">Maranh&atilde;o</option>
      <option value="MT">Mato Grosso</option>
      <option value="MS">Mato Grosso do Sul</option>
      <option value="MG">Minas Gerais</option>
      <option value="PA">Par&aacute;</option>
      <option value="PB">Para&iacute;ba</option>
      <option value="PR">Paran&aacute;</option>
      <option value="PE">Pernambuco</option>
      <option value="PI">Piau&iacute;</option>
      <option value="RJ">Rio de Janeiro</option>
      <option value="RN">Rio Grande do Norte</option>
      <option value="RS">Rio Grande do Sul</option>
      <option value="RO">Rond&ocirc;nia</option>
      <option value="RR">Roraima</option>
      <option value="SC">Santa Catarina</option>
      <option value="SP" selected="true">S&atilde;o Paulo</option>
      <option value="SE">Sergipe</option>
      <option value="TO">Tocantins</option>
      </select>
    </td>
  </tr>
  <tr>
    <td width="30%" id="optMenuAdm" bgcolor="#FFFFFF" align="right">CEP:</td>
    <td width="70%" id="optMenuAdm" bgcolor="#FFFFFF"><input name="cmpCEP" type="text" class="BoxHome" id="cmpCEP" size="40" maxlength="10"></td>
  </tr>
  <tr>
    <td width="30%" id="optMenuAdm" bgcolor="#FFFFFF" align="right">Fone:</td>
    <td width="70%" id="optMenuAdm" bgcolor="#FFFFFF"><input name="cmpFone" type="text" class="BoxHome" id="cmpFone" size="40" maxlength="15"></td>
  </tr>
  <tr>
    <td width="30%" id="optMenuAdm" bgcolor="#FFFFFF" align="right">E-mail:</td>
    <td width="70%" id="optMenuAdm" bgcolor="#FFFFFF"><input name="cmpEmail" type="text" class="BoxHome" id="cmpEmail" size="40" maxlength="50"></td>
  </tr>
  <tr>
    <td width="30%" id="optMenuAdm" bgcolor="#FFFFFF" align="right">Site:</td>
    <td width="70%" id="optMenuAdm" bgcolor="#FFFFFF"><input name="cmpSite" type="text" class="BoxHome" id="cmpSite" size="40" maxlength="60"></td>
  </tr>
  <tr>
    <td width="30%" id="optMenuAdm" bgcolor="#FFFFFF" align="right">Nome da Imagem:</td>
    <td width="70%" id="optMenuAdm" bgcolor="#FFFFFF"><input name="cmpNomeImg" type="text" class="BoxHome" id="cmpNomeImg" size="40" maxlength="20">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input name="incluir" type="button" class="ButHome" id="incluir" value="Incluir" onClick="javascript:verifInclusao();"></td>
  </tr>
</table>
</form>
