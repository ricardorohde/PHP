<?
	// Controla as ações para a tabela de categorias
	include "protege.php";
	include "../php/mysqlconecta.php";
	
	$op = $_GET['op'];
	
	if($op == 'excluir'){
		
		$cod = $_GET['cod'];		
		excluirCategorias($cod); 
		unlink("../html/".$cod.".html");		
		echo "<script> location = 'index.php?id=17'; </script>";
		
	}elseif($op == 'alterar'){			
		
		$cod = $_GET['cod'];
		($_POST['nome'] == "") ? ($nome = 'cat_nome = cat_nome') : ($nome = "cat_nome = '".$_POST['nome']."'");
		$mae = $_POST['mae'];	
			
		$sql = "UPDATE categorias SET $nome, cat_mae = $mae WHERE cat_codigo = $cod";
		mysql_query($sql) or die(mysql_error());	
		
		if($_FILES['tabela']['name'] != ''){
			if($_FILES['tabela']['type'] != "text/html"){
				echo "<script> 
								alert('Por favor, escolha um arquivo no formato html.');
								location = 'index.php?id=11&cod=$cod'; 
							</script>";	
			}else{
				$arquivo = '../html/'.$cod.".html";
				move_uploaded_file($_FILES['tabela']['tmp_name'],$arquivo);
			}		
		}	
		
		echo "<script> location = 'index.php?id=17'; </script>";
		
	}elseif($op == 'salvar'){
	
		$nome = $_POST['nome'];
		$mae = $_POST['mae'];		
		
		$sql = "INSERT INTO categorias(cat_codigo,cat_nome,cat_mae) VALUES(0,'$nome',$mae)";		
		mysql_query($sql);				
		
		if($_FILES['tabela']['name'] != ''){
			$id = mysql_insert_id();
			if($_FILES['tabela']['type'] != "text/html"){
				echo "<script> 
								alert('Por favor, escolha um arquivo no formato html.');
								location = 'index.php?id=6&cod=$id'; 
							</script>";	
			}else{				
				$arquivo = '../html/'.$id.".html";
				move_uploaded_file($_FILES['tabela']['tmp_name'],$arquivo);
			}
		}
		
		echo "<script> location = 'index.php?id=17'; </script>";
		
	}
	
	// ************************************ FUNÇÕES *******************************************\\
		// Verifica se será possível excluir a categoria
	function excluirCategorias($cod){
		$sql = "SELECT COUNT(men_codigo) FROM menu WHERE cat_codigo = ".$cod; // sql com total de menus
		$sq2 = "SELECT COUNT(pro_codigo) FROM produtos WHERE cat_codigo = ".$cod; // sql com total de produtos 
		$rs = mysql_query($sql); // Executa o sql com o total de menus
		$r2 = mysql_query($sq2); // Executa o sql com o total de produtos
		$msg = '';
		if(mysql_result($rs,0,0) > 0){
			$msg .= ' - Exclua todos os itens de menu relacionados a esta categoria!\\n';
		}
		if(mysql_result($r2,0,0) > 0){
			$msg .= ' - Exclua todos os produtos relacionados a esta categoria!\\n';
		}
		if($msg == ''){
			$sql = "DELETE FROM categorias WHERE cat_codigo = ".$cod;
			mysql_query($sql);
		}else{
			echo "<script>alert('".$msg."');</script>";
		}
	}
	//******************************************************************************************\\
		
?>