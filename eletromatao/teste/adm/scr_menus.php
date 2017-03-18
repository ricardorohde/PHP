<?
	// Faz o controle das operações na tabela menus
	include "protege.php";
	include "../php/mysqlconecta.php";
	$op = $_GET['op'];		
	
	if($op == 'excluir'){	
		$cod = $_GET['cod'];
		$sql = "DELETE FROM menu WHERE men_codigo = $cod";
		mysql_query($sql) or die(mysql_error());
		
	}elseif($op == 'organizar'){
		$acao = $_GET['acao'];
		$cod = $_GET['cod'];
		$pos = $_GET['posAtual'];

		$sql = "SELECT men_pai FROM menu WHERE men_codigo = $cod";		
		$rs = mysql_query($sql);
		$pai = mysql_result($rs,0,0);

		if($acao == 'S'){			
			if($pai != ''){
				$sql1 = "UPDATE menu 
				         SET men_ordem = men_ordem - 1
							   WHERE men_ordem = $pos AND men_codigo = $cod AND men_pai = $pai";
								 
				$sql2 = "UPDATE menu
				         SET men_ordem = men_ordem + 1
								 WHERE men_ordem = ".($pos - 1)." AND men_codigo <> $cod AND men_pai = $pai";								
			}else{
				$sql1 = "UPDATE menu 
				         SET men_ordem = men_ordem - 1
							   WHERE men_ordem = $pos AND men_codigo = $cod AND men_pai IS NULL";
								 
				$sql2 = "UPDATE menu
				         SET men_ordem = men_ordem + 1
								 WHERE men_ordem = ".($pos - 1)." AND men_codigo <> $cod AND men_pai IS NULL";
			}			
		}elseif($acao == 'D'){
			if($pai != ''){
				$sql1 = "UPDATE menu 
				         SET men_ordem = men_ordem + 1
							   WHERE men_ordem = $pos AND men_codigo = $cod AND men_pai = $pai";
								 
				$sql2 = "UPDATE menu
				         SET men_ordem = men_ordem - 1
								 WHERE men_ordem = ".($pos + 1)." AND men_codigo <> $cod AND men_pai = $pai";
			}else{
				$sql1 = "UPDATE menu 
				         SET men_ordem = men_ordem + 1
							   WHERE men_ordem = $pos AND men_codigo = $cod AND men_pai IS NULL";
								 
				$sql2 = "UPDATE menu
				         SET men_ordem = men_ordem - 1
								 WHERE men_ordem = ".($pos + 1)." AND men_codigo <> $cod AND men_pai IS NULL";
			}			
		}
		mysql_query($sql1) or die(mysql_error());
		mysql_query($sql2) or die(mysql_error());
		echo escreveMenu();
	}elseif($op == 'salvar'){
		$rotulo = $_POST['rotulo'];
		$mestre = $_POST['mestre'];
		$categoria = $_POST['categoria'];
		
		if($mestre == "NULL"){
			$sql = "SELECT COUNT(men_codigo) FROM menu WHERE men_pai IS NULL";
		}else{
			$sql = "SELECT COUNT(men_codigo) FROM menu WHERE men_pai = $mestre";
		}
		$rs = mysql_query($sql);
		$ordem = mysql_result($rs,0,0) + 1;
		
		$sql = "INSERT INTO menu(men_codigo,men_nome,men_ordem,men_pai,cat_codigo) 
		               VALUES(0,'$rotulo',$ordem,$mestre,$categoria)";
		mysql_query($sql);
		echo "<script> location = 'index.php?id=1'; </script>";
	}elseif($op == 'iniciar'){
		echo escreveMenu();
	}
	
	// ******************************* RESERVADO PARA FUNCTIONS ************************************** \\
	
	// ESCREVE O MENU FORMATADO EM XML
	function escreveMenu(){
		header('Content-type: text/xml');
		$topo = '<menu>';		
		$corpo = '';
		$sqlPai = "SELECT * FROM menu WHERE men_pai IS NULL ORDER BY men_ordem";
		$rsPai = mysql_query($sqlPai);
		while($pais = mysql_fetch_array($rsPai)){
			$corpo .= "<item>
								  <nome>".$pais['men_nome']."</nome>
									<ordem>".$pais['men_ordem']."</ordem>
									<codigo>".$pais['men_codigo']."</codigo>";
			$sqlFlo = "SELECT * FROM menu WHERE men_pai = ".$pais['men_codigo']." ORDER BY men_ordem";
			$rsFlo = mysql_query($sqlFlo);
			while($flos = mysql_fetch_array($rsFlo)){
				$corpo .= "<subitem>
											<nome>".$flos['men_nome']."</nome>
											<ordem>".$flos['men_ordem']."</ordem>
											<codigo>".$flos['men_codigo']."</codigo>
										</subitem>";
			}
			$corpo .= "</item>";
		}
		$rodape = '</menu>';
		$xml = utf8_encode($topo.$corpo.$rodape);
		return $xml;
	}
	
	// *********************************************************************************************** \\
?>