<?php require_once("funcoes.php"); 
 protegeArquivo(basename(__FILE__));
 verificaLogin();
 $sessao = new sessao();
?>
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
    <body class="painel">
        <div id="wrapper">
            <div id="header">
                <h1>Painel de Administração</h1>
                <h2 id='acessologin'> Seja bem vindo! <?php
            $sessao = new sessao();
          echo $sessao->getVar('loginuser');
        ?> ao sistema.</h2>
            </div>
            <div id="wrap-content">
                
 
