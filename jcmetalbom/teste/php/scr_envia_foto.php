<?php

$dia   = date("d");
$mes   = date("m");
$ano   = date("Y");
$hora  = date("G");
$min   = date("i");
$seg   = date("s");

$datahora = $dia."/".$mes."/".$ano." às ".$hora.":".$min.":".$seg;

$nome_remet  = $_POST['nome_de'];
$email_remet = $_POST['email_de'];
$nome_dest   = $_POST['nome_para'];
$email_dest  = $_POST['email_para'];
$assunto     = "Foto enviada por ".$nome_remet;

/*              MENSAGEM                */
$mensagem = "
<html>
<head>
</head>
<body>
<div align='center'>
<center>
<table border='0' width='596' height='287'>
  <tr>
    <td width='588' height='283' valign='top'>
      <table border='0' width='100%' bgcolor='#C0C0C0' height='283'>
        <tr>
          <td width='100%' height='21'>
            <p align='center'><b><font size='2' face='Verdana'>FOTO ENVIADA POR ".$_POST['nome_de']." </font></b></td>
        </tr>
        <tr>
          <td width='100%' bgcolor='#FFFFFF' height='254' valign='top'>
            <table border='0' width='100%' height='276'>
              <tr>
                <td height='21' colspan='4' align='left' valign='top' bgcolor='#EEEEEE'><font size='1' face='Verdana'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ol&aacute;, ".$_POST['nome_para'].", seu amigo ".$_POST['nome_de']." lhe enviou uma foto do site da Casa Musical [<a href='www.casamusical.com.br'>www.casamusical.com.br</a>] em ".$datahora.";</font></td>
                </tr>
              <tr>
                <td colspan='4' align='center' valign='top' bgcolor='#EEEEEE'>
									<img width='443' height='327' src='http://www.casamusical.com.br/imagens/".$_POST['foto']."' />
								</td>
                </tr>              
            </table>
          </td>
        </tr>
      </table>
    </td>		
  </tr>
</table>
</center>
</div>
<center>
<font face='verdana' size=1>Desenvolvido por <a href='http://www.sysnetwork.com.br' target='_blank'>SySNetwork</a></font>
</center>
</body>
</html>

";
/*               HEADERS               */
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1;\r";
$headers .= "From: $email_remet\r";
$headers .= "Reply-To: $email_remet";         
         
$result = mail($email_dest, $assunto, $mensagem, $headers);
	if($result == 1){               
  	header("Content-type: text/xml");
		echo "<resposta>Foto enviada com sucesso!</resposta>";
	}else{
		header("Content-type: text/xml");
		echo "<resposta>Falha ao tentar enviar a foto, verifique os endereços de email!</resposta>";
	}
?>