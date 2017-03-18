<?
	// Controla as ações para a tabela de eventos
	include "protege.php";
	include "../php/mysqlconecta.php";
	
	$op = $_GET['op'];
	
	if($op == 'excluir'){
		$cod = $_GET['cod'];
		$sql = "DELETE FROM eventos WHERE eve_codigo = $cod";
		mysql_query($sql);	
		echo "<script> location = 'index.php?id=15'; </script>";
	}elseif($op == 'alterar'){	
		$cod = $_GET['cod'];
		
		$titulo = $_POST['titulo'];
		$desc = $_POST['descricao'];
		$total = $_POST['total'];
		$data = explode("/",$_POST['data']);
		$data = $data[2] ."-". $data[1] ."-". $data[0];
		
		$sql = "UPDATE eventos 
						SET eve_titulo = '$titulo',
						    eve_descricao = '$desc',
								eve_total_fotos = $total,
								eve_data = \"$data\"
						WHERE eve_codigo = $cod";
		mysql_query($sql);
		echo "<script> location = 'index.php?id=15'; </script>";
	}elseif($op == 'salvar'){
		$titulo = $_POST['titulo'];
		$desc = $_POST['descricao'];
		$total = $_POST['total'];
		$data = explode("/",$_POST['data']);
		$data = $data[2] ."-". $data[1] ."-". $data[0];
		
		$sql = "INSERT INTO eventos(eve_codigo,eve_titulo,eve_data,eve_descricao,eve_total_fotos)
		        VALUES (0,'$titulo',\"$data\",'$descricao',$total)";
		if(mysql_query($sql)){
			$id = mysql_insert_id();
			$dir = '../imagens/eventos/'.$id.'/';
			mkdir($dir);
			mkdir($dir."/grandes/");
			mkdir($dir."/pequenas/");
			chmod($dir."/grandes/",0777);
			chmod($dir."/pequenas/",0777);
			echo "<script> 
							alert('Utilize os diretórios em eventos/$id para salvar as fotos deste evento via ftp.');
							//window.open('file://ftp.casamusical.com.br/eventos/$id');
						</script>";
		}else{
			echo "<script> 
							alert('Falha ao registrar o evento, tente novamente.');							
						</script>";
		}
		echo "<script> location = 'index.php'; </script>";
	}		
?>