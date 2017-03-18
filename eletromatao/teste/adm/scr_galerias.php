<?
	// Controla as ações para a tabela de galerias
	include "protege.php";
	include "../php/mysqlconecta.php";
	
	$op = $_GET['op'];
	
	if($op == 'excluir'){
		$cod = $_GET['cod'];
		$sql = "DELETE FROM galeria WHERE gal_codigo = $cod";
		mysql_query($sql);
		echo "<script> location = 'index.php?id=16'; </script>";
	}elseif($op == 'alterar'){		
		$cod = $_GET['cod'];
		
		$titulo = $_POST['titulo'];
		$desc = $_POST['descricao'];
		$total = $_POST['total'];
		$data = explode("/",$_POST['data']);
		$data = $data[2] ."-". $data[1] ."-". $data[0];
		
		$sql = "UPDATE galeria 
						SET gal_titulo = '$titulo',
						    gal_descricao = '$desc',
								gal_total_fotos = $total,
								gal_data = \"$data\"
						WHERE gal_codigo = $cod";
		mysql_query($sql);
		echo "<script> location = 'index.php?id=16'; </script>";
		
	}elseif($op == 'salvar'){
		$titulo = $_POST['titulo'];
		$desc = $_POST['descricao'];
		$total = $_POST['total'];
		$data = explode("/",$_POST['data']);
		$data = $data[2] ."-". $data[1] ."-". $data[0];
		
		$sql = "INSERT INTO galeria(gal_codigo,gal_titulo,gal_data,gal_descricao,gal_total_fotos)
		        VALUES (0,'$titulo',\"$data\",'$descricao',$total)";
		if(mysql_query($sql)){
			$id = mysql_insert_id();
			$dir = '../imagens/galerias/'.$id.'/';
			mkdir($dir);
			mkdir($dir."/grandes/");
			mkdir($dir."/pequenas/");
			chmod($dir."/grandes/",0777);
			chmod($dir."/pequenas/",0777);
			echo "<script> 
							alert('Utilize os diretórios em galerias/$id para salvar as fotos desta galeria via ftp.');
							//window.open('ftp://ftp.casamusical.com.br/galerias/$id');
						</script>";
		}else{
			echo "<script> 
							alert('Falha ao registrar a galeria, tente novamente.');							
						</script>";
		}
		echo "<script> location = 'index.php?id=16'; </script>";
	}		
?>