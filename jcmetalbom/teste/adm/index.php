<?
	include "protege.php";
	include "../php/mysqlconecta.php";
	
	$pagina = array("configuracoes.php", // --------------------------------------> ID = 0
									"monta_menu.php", // -----------------------------------------> ID = 1
									"cad_noticia.php", // ----------------------------------------> ID = 2
									"cad_evento.php", // -----------------------------------------> ID = 3
									"cad_galeria.php", // ----------------------------------------> ID = 4
									"cad_categoria.php", // --------------------------------------> ID = 5
									"cad_produto.php", // ----------------------------------------> ID = 6
									"cad_???.php", // --------------------------------------------> ID = 7
									"alt_noticia.php", // ----------------------------------------> ID = 8
									"alt_evento.php", // -----------------------------------------> ID = 9
									"alt_galeria.php", // ----------------------------------------> ID = 10
									"alt_categoria.php", // --------------------------------------> ID = 11
									"alt_produto.php", // ----------------------------------------> ID = 12
									"alt_???.php", // --------------------------------------------> ID = 13
									"lista_noticia.php", // --------------------------------------> ID = 14
									"lista_evento.php", // ---------------------------------------> ID = 15
									"lista_galeria.php", // --------------------------------------> ID = 16
									"lista_categoria.php", // ------------------------------------> ID = 17
									"lista_produto.php", // --------------------------------------> ID = 18
									"lista_???", // ----------------------------------------------> ID = 19
									"ler_noticia.php", // ----------------------------------------> ID = 20
									"cad_usuario.php", // ----------------------------------------> ID = 21
									"alt_usuario.php", // ----------------------------------------> ID = 22
									"lista_usuario.php" // ---------------------------------------> ID = 23
									);
									
	$id =	$_GET['id'];
	
	if($id == ''){
		$id = 0;
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>::: Casa Musical - Painel de Controle :::</title>
<script src="../css_js/scr.js" type="text/javascript"></script>
<script src="../css_js/ajax.js" type="text/javascript"></script>
<link href="../css_js/estilos.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="764" border="0" align="center" cellpadding="1">
  
  <tr>
    <td width="760" height="517" valign="top" bgcolor="#000000"><table width="760" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="3" align="center" valign="top" bgcolor="#FFFFFF" class="saudacao"><img src="../img/topo_painel.jpg" width="760" height="100" /></td>
      </tr>
      <tr>
        <td colspan="3" align="center" valign="top" bgcolor="#FFFFFF" class="saudacao">
					<? 
						include "../php/inc/meses.php";
					
						/*$hora = date("H");
						
						if(($hora >= 0) && ($hora < '12')){
							$tempo = "Bom dia";
						}elseif(($hora >= 12) && ($hora < 18)){
							$tempo = "Boa tarde";
						}else{
							$tempo = "Boa noite";
						}*/
												
						$dia = date("d");
						$mes = date("m");
						$ano = date("Y");
						$mes = nomeMesCompleto($mes);
						
						$saudacao = "Matão, ".$dia." de ".$mes." de ".$ano.".";
						echo $saudacao;
					?>				</td>
        </tr>
      <tr>
        <td height="5" colspan="3" align="center" valign="top" bgcolor="#FFFFFF"><img src="../img/linha_grande.png" width="750" height="3" /></td>
        </tr>
      <tr>
        <td width="160" height="490" valign="top" bgcolor="#FFFFFF" class="borda_padrao">
				<br />
				<ul class="item">
        	<li class="topo"><a href="index.php?id=0">Configurações</a></li>
					<li><a href="index.php?id=1">Organizar menu</a></li>
          <li><a href="javascript:alternaDiv('noticias');">Not&iacute;cias</a></li>
						<div id="noticias" style="display:none">
							<ul class="sub_item">
								<li><a href="index.php?id=2">Inserir</a></li>
								<li><a href='index.php?id=14'>Listar</a></li>
							</ul>
						</div>
          <li><a href="javascript:alternaDiv('eventos');">Eventos</a></li>
						<div id="eventos" style="display:none">
							<ul class="sub_item">
								<li><a href="index.php?id=3">Inserir</a></li>
								<li><a href='index.php?id=15'>Listar</a></li>
							</ul>
						</div>
					<li><a href="javascript:alternaDiv('galerias');">Galerias</a></li>
						<div id="galerias" style="display:none">
							<ul class="sub_item">
								<li><a href="index.php?id=4">Inserir</a></li>
								<li><a href='index.php?id=16'>Listar</a></li>
							</ul>
						</div>
					<li><a href="javascript:alternaDiv('categorias');">Categorias</a></li>
						<div id="categorias" style="display:none">
							<ul class="sub_item">
								<li><a href="index.php?id=5">Inserir</a></li>
								<li><a href='index.php?id=17'>Listar</a></li>
							</ul>
						</div>
					<li><a href="javascript:alternaDiv('produtos');">Produtos</a></li>
						<div id="produtos" style="display:none">
							<ul class="sub_item">
								<li><a href="index.php?id=6">Inserir</a></li>								
								<li><a href='index.php?id=18'>Listar</a></li>
							</ul>
						</div>
					<li><a href="javascript:alternaDiv('usuarios');">Usuários</a>
						<div id="usuarios" style="display:none">
							<ul class="sub_item">
								<li><a href="index.php?id=21">Inserir</a></li>
								<li><a href='index.php?id=23'>Listar</a></li>
							</ul>
						</div>
					</li>	
					<li><a href="verifica.php?acao=logout">Sair</a></li>
				</ul></td>
        <td width="3" valign="top" bgcolor="#FFFFFF" class="borda_padrao"><img src="../img/linhaV_grande.png" width="3" height="486" /></td>
        <td width="597" height="490" align="center" valign="top" bgcolor="#FFFFFF">
					<? include($pagina[$id]); ?>
				</td>
        </tr>            
    </table></td>
  </tr>
</table>
<div align="center"><a href="http://www.sysnetwork.com.br" class="links">Desenvolvido por SySNetwork</a> </div>
</body>
</html>