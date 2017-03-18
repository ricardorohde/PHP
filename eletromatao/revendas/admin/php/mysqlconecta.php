<?php
$dbname="eletroma_matao";
$usuario="eletroma_matao";
$password="ele1516";

if(!(mysql_connect("187.108.193.49",$usuario,$password))) {
   echo "N�o foi poss�vel estabelecer uma conex�o com o gerenciador MySQL. Favor Contactar o Administrador.";
   exit;
}
if(!(mysql_select_db($dbname))) { 
   echo "N�o foi poss�vel estabelecer uma conex�o com o gerenciador MySQL. Favor Contactar o Administrador.";
   exit;
}
?>
