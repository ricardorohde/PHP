<?
$dbname="casamusical";
$usuario="sysnetwork";
$password="sysnet8662";

if(!(mysql_connect("localhost",$usuario,$password))) {
   echo "N�o foi poss�vel estabelecer uma conex�o com o gerenciador MySQL. Favor Contactar o Administrador.";
   exit;
}
if(!(mysql_select_db($dbname))) { 
   echo "N�o foi poss�vel estabelecer uma conex�o com o gerenciador MySQL.  Contactar o Administrador.";
   exit;
}
?>