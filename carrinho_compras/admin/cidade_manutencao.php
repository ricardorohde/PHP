<?php
	class cidade_manutencao
	{
		var $resultado;
		var $registros;
		
		function cidade_manutencao() //metódo construtor
		{
			$this->con = new conexao();
		}
		
		function listar_cidade()
		{
			$ordenacao = $_REQUEST['ordem'];
			if($ordenacao == '')
				$ordenacao = "CID_DESCRICAO";
				
			$filtro = $_REQUEST['pesquisa'];
			if($filtro == '')
				$filtrar_por = "";
			else	
				$filtrar_por = $filtro;
									
			$sql = "select * from tbl_cidade where CID_DESCRICAO like '".$filtrar_por."%' order by ".$ordenacao;  
			$this->resultado = $this->con->banco->Execute($sql);	
			
		}
		
		function excluir()
		{
			$sql = "delete from tbl_cidade where CID_CODIGO = ".$_REQUEST['codigo'];  
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
			$sql = "insert into tbl_cidade (CID_DESCRICAO, CID_UF) values ('".$_REQUEST['CID_DESCRICAO']."','"
																			 .$_REQUEST['CID_UF']."')";  
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
		
		function alterar()
		{
			$sql = "select * from tbl_cidade where CID_CODIGO = ".$_REQUEST['codigo'];  
			$this->resultado = $this->con->banco->Execute($sql);	
			$this->registros = $this->resultado->FetchNextObject(); //se posiciona no registro	
		}
		
		function gravar_alterar()
		{
			$sql = "update tbl_cidade set CID_DESCRICAO = '".$_REQUEST['CID_DESCRICAO']."', CID_UF = '"
										.$_REQUEST['CID_UF']."' where CID_CODIGO = ".$_REQUEST['codigo'];  
			if($this->resultado = $this->con->banco->Execute($sql))
			{
				alerta("O registro foi alterado com sucesso");
				return true;
			}
			else
			{
				alerta("Erro na alteração do registro");
				return false;
			}	
		}				
		
		function total_registros()
		{
			$sql = "select count(*) as TOTAL from tbl_cidade ";  
			$this->resultado = $this->con->banco->Execute($sql);	
			$this->registros = $this->resultado->FetchNextObject(); //se posiciona no registro
			return $this->registros->TOTAL;
		}
	}
 ?>       
