<?php
	class imagem_manutencao
	{
		var $resultado;
		var $registros;
		
		function imagem_manutencao() //metódo construtor
		{
			$this->con = new conexao();
		}
		
		function listar_imagem()
		{
			$ordenacao = $_REQUEST['ordem'];
			if($ordenacao == '')
				$ordenacao = "IMG_DESCRICAO";
				
			$filtro = $_REQUEST['pesquisa'];
			if($filtro == '')
				$filtrar_por = "";
			else	
				$filtrar_por = $filtro;
									
			$sql = "select * from tbl_imagem where PROD_CODIGO =".$_REQUEST['codigo']." and IMG_DESCRICAO like '".$filtrar_por."%' order by ".$ordenacao;  
			$this->resultado = $this->con->banco->Execute($sql);	
			
		}
		
		function excluir()
		{
			$sql = "delete from tbl_imagem where IMG_CODIGO = ".$_REQUEST['codigo_imagem'];  
			if($this->resultado = $this->con->banco->Execute($sql))
			{
				alerta("O registro foi excluido com sucesso");
				return true;
			}
			else
			{
				alerta("Erro ao excluir registro");
				return false;
			}		
		}

		function gravar_incluir()
		{
			
			$tipos_arquivos = array(".jpg",".JPG",".png",".PNG",".gif",".GIF");
			$nome_arquivo = $_FILES['img_descricao']['name'];
			$tipo =strrchr($nome_arquivo,".");
			
			if(in_array($tipo,$tipos_arquivos))
			{			
			
				if(move_uploaded_file($_FILES['img_descricao']['tmp_name'],"../imagens/".$nome_arquivo))
				{
			
					$sql = "insert into tbl_imagem (IMG_DESCRICAO, PROD_CODIGO) values ('$nome_arquivo',".$_REQUEST['codigo'].")";
					if($this->resultado = $this->con->banco->Execute($sql))
					{
						alerta("O registro foi incluido com sucesso");
						return true;
					}
					else
					{
						alerta("Erro ao incluir registro");
						return false;
					}	
				}
			}
		}		
		
		
		function total_imagens()
		{
			$sql = "select count(*) as TOTAL from tbl_imagem where PROD_CODIGO =".$_REQUEST['codigo']."";  
			$this->resultado = $this->con->banco->Execute($sql);	
			$this->registros = $this->resultado->FetchNextObject(); //se posiciona no registro
			return $this->registros->TOTAL;
		}
					
	}
 ?>       
