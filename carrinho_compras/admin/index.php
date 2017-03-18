<?php
 session_start();     
 if(!$_SESSION['sessao_codigo_usuario'])
 {
	 require('../util/funcoes.php');
	 direciona('login_form.php');
	 exit;
 }
 else
 { 
 ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
       "http://www.w3.org/TR/html4/strict.dtd">
    
    <html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>index</title>
        <meta name="author" content="JonatasLuis" />
        <!-- Date: 2013-10-24 --><link rel="stylesheet" type="text/css" href="../util/estilos.css">
		<script type="text/javascript" src="../util/funcoes.js"></script>
    </head>
    <body>
    <div align="center">
      <table width="761" border="0" cellspacing="5" cellpadding="5">
        <tr>
          <td colspan="2"><h2 align="center">Administração de carrinho de compras - tiw7.com.br</h2></td>
        </tr>
        <tr>
          <td width="109"><p class="menu"><a href="index.php" onMouseOver="this.className='menu_hover';" onMouseOut="this.className='menu';">Home</a><br>
            <a href="index.php?tabela=categoria&acao=listar" onMouseOver="this.className='menu_hover';" onMouseOut="this.className='menu';">Categoria</a><br>
            <a href="index.php?tabela=cidade&acao=listar" onMouseOver="this.className='menu_hover';" onMouseOut="this.className='menu';">Cidade</a><br>
            <a href="index.php?tabela=cliente&acao=listar" onMouseOver="this.className='menu_hover';" onMouseOut="this.className='menu';">Clientes</a><br>
              <a href="index.php?tabela=fornecedor&acao=listar" onMouseOver="this.className='menu_hover';" onMouseOut="this.className='menu';">Fornecedor</a><br>
            <a href="index.php?tabela=pedido&acao=listar" onMouseOver="this.className='menu_hover';" onMouseOut="this.className='menu';">Pedidos</a><br>
            <a href="index.php?tabela=produtos&acao=listar" onMouseOver="this.className='menu_hover';" onMouseOut="this.className='menu';">Produtos</a><br>
            <a href="index.php?tabela=promocao&acao=listar" onMouseOver="this.className='menu_hover';" onMouseOut="this.className='menu';">Promoção</a>
            <br>
              <a href="index.php?tabela=usuario&acao=listar" onMouseOver="this.className='menu_hover';" onMouseOut="this.className='menu';">Usuários</a>
            <br>
            <a href="logoff.php"onMouseOver="this.className='menu_hover';" onMouseOut="this.className='menu';">Sair</a> </p></td>
          <td width="693" align="center" valign="top">
            <?php	
                
                require('../util/conecta.php');
            
                $tabela = $_REQUEST['tabela'];
                if($tabela == "cidade")
                    require("cidade_acao.php");
                    
                else if($tabela == "categoria")
                    require("categoria_acao.php");
                    
                else if($tabela == "usuario")
                    require("usuario_acao.php");
					
				 else if($tabela == "fornecedor")
                    require("fornecedor_acao.php");		
					
				else if($tabela == "produtos")
                    require("produtos_acao.php");	
					
				else if($tabela == "imagem")
                    require("imagem_acao.php");			
					
                else if($tabela == "cliente")
                    require("cliente_acao.php");	
					
				else if($tabela == "pedido")
					require("pedido_acao.php");		
					    
                else	
                require('principal.php');
                
            ?>
          </td>
          </tr>
        <tr>
          <td colspan="2"><h3 align="center">Todos os Direitos reservados</h3></td>
          </tr>
      </table>
    </div>
    </body>
    </html>
<?php } ?>
