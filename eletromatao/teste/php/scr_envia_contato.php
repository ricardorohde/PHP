<?php

include "mysqlconecta.php";
// Seleciona o email indicado nas configuracoes
$sql = "SELECT conf_contato FROM configuracoes";
$rs = mysql_query($sql);

$ip = getenv("REMOTE_ADDR");

$dia   = date("d");
$mes   = date("m");
$ano   = date("Y");
$hora  = date("G");
$min   = date("i");
$seg   = date("s");

$datahora = $dia."/".$mes."/".$ano." às ".$hora.":".$min.":".$seg;

$nome_remet  = $_POST['nome'];
$email_remet = $_POST['email'];
$nome_dest   = "Casa Musical";
$email_dest  = mysql_result($rs,0,0);
$assunto     = "Contato - Site Casa Musical";

$msg1 = str_replace(chr(13),'<br>',$_POST['mensagem']);

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
            <p align='center'><b><font size='2' face='Verdana'>CASA MUSICAL [www.casamusical.com.br] </font></b></td>
        </tr>
        <tr>
          <td width='100%' bgcolor='#FFFFFF' height='254' valign='top'>
            <table border='0' width='100%' height='276'>
              <tr>
                <td width='29%' bgcolor='#DDDDDD' height='21' valign='top' align='right'><b><font face='Verdana' size='1'>Data
                  e Hora......:&nbsp; </font></b></td>
                <td width='71%' bgcolor='#EBEBEB' height='21' colspan='3'><font size='1' face='Verdana'>".$datahora."</font></td>
              </tr>
              <tr>
                <td width='29%' bgcolor='#DDDDDD' height='21' valign='top' align='right'><b><font face='Verdana' size='1'>Empresa......:&nbsp;</font></b></td>
                <td width='71%' bgcolor='#EBEBEB' height='21' colspan='3'><font size='1' face='Verdana'>".$_POST['nome']."</font></td>
              </tr>
              
              <tr>
                <td width='29%' bgcolor='#DDDDDD' height='21' valign='top' align='right'><b><font face='Verdana' size='1'>Cidade......:&nbsp;</font></b></td>
                <td width='71%' bgcolor='#EBEBEB' height='21'><font size='1' face='Verdana'>".$_POST['cidade']."</font></td>
                    <td width='71%' bgcolor='#DEDFDE' height='21'> <p align='right'><font face='Verdana' size='1'><b>Estado<font face='Verdana' size='1'>......:</font></b></font><font face='Verdana' size='2'>&nbsp; 
                        </font></td>
                <td width='71%' bgcolor='#EBEBEB' height='21'><font size='1' face='Verdana'>".$_POST['estado']."</font></td>
              </tr>
              <tr>
                <td width='29%' bgcolor='#DDDDDD' height='21' valign='top' align='right'><b><font face='Verdana' size='1'>Telefone......:&nbsp;</font></b></td>
                <td width='71%' bgcolor='#EBEBEB' height='21' colspan='3'><font size='1' face='Verdana'>(".$_POST['ddd'].")".$_POST['telefone']."</font></td>
              </tr>
              <tr>
                <td width='29%' bgcolor='#DDDDDD' height='21' valign='top' align='right'><b><font face='Verdana' size='1'>Email......:&nbsp;</font></b></td>
                <td width='71%' bgcolor='#EBEBEB' height='21' colspan='3'><a href='mailto:".$email."'><font size='1' face='Verdana'>".$_POST['email']."</font></a></td>
              </tr>
              <tr>
                <td width='29%' bgcolor='#DDDDDD' height='117' valign='top' align='right'><b><font face='Verdana' size='1'>Mensagem......:&nbsp;</font></b></td>
                <td width='71%' bgcolor='#EBEBEB' height='117' valign='top' colspan='3'><font size='1' face='Verdana'>".$msg1."</font></td>
              </tr>
              <tr>
                <td width='29%' bgcolor='#DDDDDD' height='1' valign='top' align='right'><font size='1' face='Verdana'><b>IP</b></font><b><font face='Verdana' size='1'>......:</font></b><font size='1' face='Verdana'><b>&nbsp;
                  </b></font></td>
                <td width='71%' bgcolor='#EBEBEB' height='1' valign='top' colspan='3'><font size='1' face='Verdana'>".$ip."</font></td>
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
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1;\r\n";
$headers .= "From: $email_remet\rn";
$headers .= "Reply-To: $email_remet";
         
$result = mail($email_dest, $assunto, $mensagem, $headers);
            if($result == 1){               
                echo "<script language='javascript'>alert ('E-mail enviado com sucesso! Entraremos em contato em breve.'); location='index.php?id=0';</script>";
//				header("Location:index.php?id=1");
                        }              
?>
