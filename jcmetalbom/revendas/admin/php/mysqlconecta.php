<?php
$dbname="ELETROMATAO";
$usuario="sysnetwork";
$password="sysnet8662";

if(!(mysql_connect("localhost",$usuario,$password))) {
   echo "Não foi possível estabelecer uma conexão com o gerenciador MySQL. Favor Contactar o Administrador.";
   exit;
}
if(!(mysql_select_db($dbname))) { 
   echo "Não foi possível estabelecer uma conexão com o gerenciador MySQL. Favor Contactar o Administrador.";
   exit;
}
?>
