<?php
	session_start();
 	require('util/conecta.php');
	require('carrinho_manutencao.php');
	
	$oquefazer = new carrinho_manutencao();
	$total_carrinho = $oquefazer->quantidade_produtos();
	
	$codcategoria = $_REQUEST['codcategoria'];
	
 ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
       "http://www.w3.org/TR/html4/strict.dtd">
    
    <html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>index</title>
        <meta name="author" content="JonatasLuis" />
        <!-- Date: 2013-10-24 --><link rel="stylesheet" type="text/css" href="util/estilos.css">
		<script type="text/javascript" src="util/funcoes.js"></script>
    </head>
    <body>
    <div align="center">
      <table width="761" border="0" cellspacing="5" cellpadding="5">
        <tr>
          <td colspan="2"><h2 align="center">Loja Virtual - tiw7.com.br</h2></td>
        </tr>
        <tr>
          <td width="135"><table width="139" border="0" cellspacing="5" cellpadding="5">
            <tr>          
              <td width="97"><a href="index.php?id=1&acao=listar_carrinho&codcategoria=<?php echo $codcategoria; ?>">Ver Carrminho: <?php echo $total_carrinho?></a></td>
            </tr>
            <tr>
              <td>Categoria:
                <?php require('listar_categorias.php');?></td>
            </tr>
          </table></td>
          <td width="591" rowspan="2" align="center" valign="top">
            <?php	
                
                $tabela = $_REQUEST['tabela'];
				$acao = $_REQUEST['acao'];
				$id     = $_REQUEST['id'];
				 if($id == 1)
				    require('carrinho_acao.php');
				 if($id == 2)
				    require('login_form.php');
				 if($id == 3)
				    require('login_validacao.php');
				 if($id == 4)
				    require('cliente_acao.php');
				 if($id == 5)
				    require('pedido_acao.php');
                
            ?>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><h3 align="center">Todos os Direitos reservados</h3></td>
          </tr>
      </table>
    </div>
    </body>
    </html>