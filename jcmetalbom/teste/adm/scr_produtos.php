<?
	// Controla as ações para a tabela de produtos
	include "protege.php";
	include "../php/mysqlconecta.php";
	
	$op = $_GET['op'];
	
	if($op == 'excluir'){
		
		$cod = $_GET['cod'];
		
		$dg = "../produtos/grandes/";
		$dp = "../produtos/pequenas/";
		
		$sql = "SELECT pro_img FROM produtos WHERE pro_codigo = $cod";
		$rs = mysql_query($sql);
		$imgs = mysql_result($rs,0,0);
		$arr = explode(';',$imgs);
		for($i = 0; $i < count($arr); $i++){
			unlink($dg.$cod."_".$arr[$i]);
			unlink($dp.$cod."_".$arr[$i]);
		}
		
		$sql = "DELETE FROM produtos WHERE pro_codigo = $cod";
		mysql_query($sql);
		
		echo "<script> location = 'index.php?id=18'; </script>";
	
	}elseif($op == 'alterar'){				
		
		$cod = $_GET['cod'];		
		
		$dg = "../produtos/grandes/";
		$dp = "../produtos/pequenas/";
		
		($_POST['nome'] == '') ? ($nome = 'pro_nome = pro_nome') : ($nome = "pro_nome = '".$_POST['nome']."'");
		($_POST['lancamento'] == '') ? ($lanc = 'N') : ($lanc = 'S');
		($_POST['preco'] == '') ? ($preco = 0) : ($preco = $_POST['preco']);
		$cat = $_POST['categoria'];			
		$desc = $_POST['descricao'];
		$esp = str_replace(chr(13),"<br>",$_POST['especificacao']);
		$cImg = explode(';',$_POST['cImg']);
		
		$img = '';
		
		if($_FILES['img1_p']['name'] != ''){
			$img .= $_FILES['img1_p']['name'];
			unlink($dg.$cod."_".$cImg[0]);
			unlink($dp.$cod."_".$cImg[0]);		
		}else{
			$img .= $cImg[0];
		}
		if($_FILES['img2_p']['name'] != ''){
			$img .= ";".$_FILES['img2_p']['name'];
			unlink($dg.$cod."_".$cImg[1]);
			unlink($dp.$cod."_".$cImg[1]);	
		}else{
			if($cImg[1] != ''){
				$img .= ";".$cImg[1];
			}
		}
		if($_FILES['img3_p']['name'] != ''){
			$img .= ";".$_FILES['img3_p']['name'];
			unlink($dg.$cod."_".$cImg[2]);
			unlink($dp.$cod."_".$cImg[2]);	
		}else{
			if($cImg[2] != ''){
				$img .= ";".$cImg[2];
			}
		}
		
		$sql = "UPDATE produtos 
		        SET $nome,
						    cat_codigo = $cat,
								pro_descricao = '$desc',
								pro_preco = $preco,
								pro_especificacoes = '$esp',
								pro_img = '$img',
								pro_lancamento = '$lanc'
						WHERE pro_codigo = $cod";
										
		if(mysql_query($sql)){										
			
			$nomes = explode(";",$img);
			for($i = 0; $i < count($nomes); $i++){				
				$nome = $cod."_".$nomes[$i];
				$indice = "img".($i + 1);
				move_uploaded_file($_FILES[$indice."_p"]["tmp_name"],$dp.$nome);
				move_uploaded_file($_FILES[$indice."_g"]["tmp_name"],$dg.$nome);
			}
		}else{
			echo $sql;
			die(mysql_error());
		}
		
		echo "<script> location = 'index.php?id=18'; </script>";
		
	}elseif($op == 'salvar'){
		$nome = $_POST['nome'];
		$cat = $_POST['categoria'];
		($_POST['lancamento'] == '') ? ($lanc = 'N') : ($lanc = 'S');	
		$desc = $_POST['descricao'];
		$esp = str_replace(chr(13),"<br>",$_POST['especificacao']);
	
		$img = $_FILES['img1_p']['name'];
	
		if($_FILES['img2_p']['name'] != ''){
			$img .= ";".$_FILES['img2_p']['name'];
		}						
		if($_FILES['img3_p']['name'] != ''){
			$img .= ";".$_FILES['img3_p']['name'];
		}
		($_POST['preco'] == '') ? ($preco = 0) : ($preco = $_POST['preco']);
		
		$sql = "INSERT INTO produtos(pro_codigo,pro_nome,cat_codigo,pro_descricao,pro_lancamento,pro_img,pro_especificacoes,pro_preco)
		        VALUES (0,'$nome',$cat,'$desc','$lanc','$img','$esp',$preco)";
		if(mysql_query($sql)){
		
			$id = mysql_insert_id();
		
			$dP = "../produtos/pequenas/";
			$dG = "../produtos/grandes/";						
			
			$nomes = explode(";",$img);
			for($i = 0; $i < count($nomes); $i++){				
				$nome = $id."_".$nomes[$i];
				$indice = "img".($i + 1);
				move_uploaded_file($_FILES[$indice."_p"]["tmp_name"],$dP.$nome);
				move_uploaded_file($_FILES[$indice."_g"]["tmp_name"],$dG.$nome);
			}
		}
		echo "<script> location = 'index.php?id=18'; </script>";
	}		
?>