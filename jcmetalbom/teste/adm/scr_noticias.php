<?
	// Faz o controle das operações na tabela notícias
	include "protege.php";
	include "../php/mysqlconecta.php";
	
	$op = $_GET['op'];
	
	if($op == 'salvar'){
		$titulo = $_POST['titulo'];
		$primeiro = $_POST['primeiro'];
		$texto = str_replace(chr(13),'<br>',$_POST['texto']);
		$data = date('Y-m-d');
		$hora = date('H:i');
		
		$sql = "INSERT INTO noticias(not_codigo,not_titulo,not_primeiro_paragrafo,not_texto,not_data,not_hora)
		        VALUES(0,'$titulo','$primeiro','$texto',\"$data\",\"$hora\")";
						
		mysql_query($sql) or die(mysql_error());
				 
		$id = mysql_insert_id();
		$dir = '../noticias/'.$id;
		$img = $dir.'/not_'.$id.'.jpg';
		$img_nome = 'not_'.$id.'.jpg';
		
		$sql = "UPDATE noticias SET not_img = '$img_nome' WHERE not_codigo = $id";
		mysql_query($sql);
		
		mkdir($dir);
		chmod($dir,0777);
		move_uploaded_file($_FILES['imagem']['tmp_name'],$img);
		
		include_once 'inc/gera.php';
		
		echo "<script> location = 'index.php?id=0'; </script>";
		
	}elseif($op == 'alterar'){
		$cod = $_GET['cod'];
		($_POST['titulo'] != '') ? ($titulo = "not_titulo = '".$_POST['titulo']."'") : ($titulo = 'not_titulo = not_titulo');
		($_POST['primeiro'] != '') ? ($primeiro = "not_primeiro_paragrafo = '".$_POST['primeiro']."'") : ($primeiro = 'not_primeiro_paragrafo = not_primeiro_paragrafo');
		($_POST['texto'] != '') ? ($texto = "not_texto = '".$_POST['texto']."'") : ($texto = 'not_texto = not_texto');
		
		if($_FILES['imagem']['tmp_name'] != ''){
			$dir = '../noticias/'.$cod;
			$img = $dir.'/not_'.$cod.'.jpg';
			$img_nome = 'not_'.$cod.'.jpg';
			move_uploaded_file($_FILES['imagem']['tmp_name'],$img);
			$imagem = " not_img = '$img_nome'";
		}else{
			$imagem = " not_img = not_img";
		}
		
		$sql = "UPDATE noticias SET $titulo, $primeiro, $texto, $imagem WHERE not_codigo = $cod";
		echo $sql;
		mysql_query($sql) or die(mysql_error());
		include_once 'inc/gera.php';
		echo "<script> location = 'index.php?id=0'; </script>";
	}elseif($op = 'excluir'){
		$cod = $_GET['cod'];
		$sql = "DELETE FROM noticias WHERE not_codigo = $cod";
		mysql_query($sql);
		unlink("../noticias/".$cod."/not_".$cod.".jpg");
		rmdir("..\\noticias\\".$cod);
		echo "<script> location = 'index.php?id=0'; </script>";
	}
?>