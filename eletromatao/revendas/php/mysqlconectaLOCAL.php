<?php
$dbname="ELETROMATAO";
/*$usuario="mecpar";
$password="meC8662";*/
$usuario="user1";
$password="";

if(!(mysql_connect("localhost",$usuario,$password))) {
   echo "N�o foi poss�vel estabelecer uma conex�o com o gerenciador MySQL. Favor Contactar o Administrador.";
   exit;}
if(!(mysql_select_db($dbname))) { 
   echo "N�o foi poss�vel estabelecer uma conex�o com o gerenciador MySQL. Favor Contactar o Administrador.";
   exit;}
?>
