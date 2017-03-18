<?php require_once("funcoes.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Painel Administrativo</title>
        <?php 
            loadCSS('reset');
            loadCSS('style');
            loadJS('jquery');
            loadJS('geral');
        ?>
    </head>
    <body>
        <?php loadmodulo('usuarios','login'); ?>
    </body>
</html>
