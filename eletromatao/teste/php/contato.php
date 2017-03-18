<link rel="stylesheet" href="../css_js/estilos.css" />
<form id="form" name="form" method="post" action="scr_envia_contato.php">
  <div align="center">
    <table width="460" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2" align="right" bgcolor="#EEEEEE" class="topicos">Contato&nbsp;</td>
      </tr>
      <tr>
        <td height="59" colspan="2" align="center"><div align="justify" class="texNoticia" clas>
          <div align="center">Se     voc&ecirc; tem d&uacute;vidas, sugest&otilde;es ou coment&aacute;rios,                                        entre em contato conosco preenchendo o                                        formul&aacute;rio abaixo, ou se preferir ligue                                        para:<strong> &nbsp;(16) 3382-7045.</strong></div>
        </div></td>
      </tr>
      <tr>
        <td width="98" height="19" align="right" class="texNoticia"><strong>&nbsp;&nbsp;Nome:&nbsp;&nbsp;</strong></td>
        <td height="19"><input name="nome" type="text" class="cx_texto" id="nome" size="50" /></td>
      </tr>
      <tr>
        <td height="25" align="right" class="texNoticia"><strong>&nbsp;&nbsp;E-mail:&nbsp;&nbsp;</strong></td>
        <td height="25"><input name="email" type="text" class="cx_texto" id="email" size="50" maxlength="64" /></td>
      </tr>
      <tr>
        <td height="25" align="right" class="texNoticia"><strong>&nbsp;&nbsp;DDD:&nbsp;&nbsp;</strong></td>
        <td height="25"><input name="ddd" type="text" class="cx_texto" id="ddd" size="5" maxlength="2" /></td>
      </tr>
      <tr>
        <td height="25" align="right" class="texNoticia"><strong>&nbsp;&nbsp;Telefone:&nbsp;&nbsp;</strong></td>
        <td height="25"><input name="telefone" type="text" class="cx_texto" id="telefone" size="29" maxlength="8" /></td>
      </tr>
      <tr>
        <td height="25" align="right" class="texNoticia"><strong>&nbsp;&nbsp;Cidade:&nbsp;&nbsp;</strong></td>
        <td height="25"><input name="cidade" type="text" class="cx_texto" id="cidade" size="50" /></td>
      </tr>
      <tr>
        <td height="25" align="right" class="texNoticia"><strong>&nbsp;&nbsp;Estado:&nbsp;&nbsp;</strong></td>
        <td height="25">
					<select name="estado" class="combo" id="estado">
						<option value="N/A">Selecione</option>					
						<option value="AC">Acre</option>
     				<option value="AL">Alagoas</option>
			      <option value="AP">Amapá</option>
      			<option value="AM">Amazonas</option>
			      <option value="BA">Bahia</option>
			      <option value="CE">Ceará</option>
  			    <option value="DF">Distrito Federal</option>
  			    <option value="ES">Espírito Santo</option>
 			      <option value="GO">Goiás</option>
  			    <option value="MA">Maranhão</option>
			      <option value="MT">Mato Grosso</option>
 			      <option value="MS">Mato Grosso do Sul</option>
 			      <option value="MG">Minas Gerais</option>
			      <option value="PA">Pará</option>
			      <option value="PB">Paraíba</option>
			      <option value="PR">Paraná</option>
 			      <option value="PE">Pernambuco</option>
 			      <option value="PI">Piauí</option>
 			      <option value="RJ">Rio de Janeiro</option>
  			    <option value="RN">Rio Grande do Norte</option>
  			    <option value="RS">Rio Grande do Sul</option>
     	 		  <option value="RO">Rondônia</option>
			      <option value="RR">Roraima</option>
			      <option value="SC">Santa Catarina</option>
			      <option value="SP">São Paulo</option>
			      <option value="SE">Sergipe</option>
			      <option value="TO">Tocantins</option>
          </select>
				</td>
      </tr>
      <tr>
        <td align="right" class="texNoticia"><strong>&nbsp;&nbsp;Mensagem:&nbsp;&nbsp;</strong></td>
        <td><textarea name="mensagem" cols="47" rows="5" class="area" id="mensagem"></textarea></td>
      </tr>
      <tr>
        <td height="30" colspan="2" align="center"><input name="Submit" type="button" class="btn" value="Enviar" onClick="javascript:vContato();"></td>
      </tr>
    </table>
  </div>
</form>