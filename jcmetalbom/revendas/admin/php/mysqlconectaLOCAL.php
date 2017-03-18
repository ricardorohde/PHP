<?php
$dbname="ELETROMATAO";
/*$usuario="mecpar";
$password="meC8662";*/
$usuario="user1";
$password="";

if(!(mysql_connect("localhost",$usuario,$password))) {
   echo "Não foi possível estabelecer uma conexão com o gerenciador MySQL. Favor Contactar o Administrador.";
   exit;}
if(!(mysql_select_db($dbname))) { 
   echo "Não foi possível estabelecer uma conexão com o gerenciador MySQL. Favor Contactar o Administrador.";
   exit;}
?>
