<?
	// Altera as configurações no banco
	include "protege.php";
	include "../php/mysqlconecta.php";
	
	$dir_img = '../img/';
	$dir_flash = '../flash/';
	
	($_POST['email'] == '') ? ($sqEmail = 'conf_contato = conf_contato') : ($sqEmail = "conf_contato = '".$_POST['email']."'");
	($_POST['max_rss'] == '') ? ($sqRss = ' conf_num_itens_rss  =  conf_num_itens_rss ') : ($sqRss = " conf_num_itens_rss  = ".$_POST['max_rss']);
	
	if($_FILES['banner_topo']['name'] != ''){
		$nome = $_FILES['banner_topo']['name'];
		if($_FILES['banner_topo']['type'] == 'application/x-shockwave-flash'){
			$nome = $dir_flash.$nome;
			move_uploaded_file($_FILES['banner_topo']['tmp_name'], $nome);
		}else{
			$nome = $dir_img.$nome;
			move_uploaded_file($_FILES['banner_topo']['tmp_name'], $nome);
		}
		chmod($nome,0666);
		$sqTopo = "conf_banner_topo = '$nome'";
	}else{
		$sqTopo = "conf_banner_topo = conf_banner_topo";
	}
	
	if($_FILES['banner_lateral']['name'] != ''){
		$nome = $_FILES['banner_lateral']['name'];
		if($_FILES['banner_lateral']['type'] == 'application/x-shockwave-flash'){
			$nome = $dir_flash.$nome;
			move_uploaded_file($_FILES['banner_lateral']['tmp_name'], $nome);
		}else{
			$nome = $dir_img.$nome;
			move_uploaded_file($_FILES['banner_lateral']['tmp_name'], $nome);
		}
		chmod($nome,0666);
		$sqLat = "conf_banner_lateral = '$nome'";
	}else{
		$sqLat = 'conf_banner_lateral = conf_banner_lateral';
	}
	
	$sql = "UPDATE configuracoes SET $sqEmail, $sqRss, $sqTopo, $sqLat";
	mysql_query($sql);
	
	echo "<script>location = 'index.php';</script>";
	
?>