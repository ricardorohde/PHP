<?php
	class usuario_manutencao
	{
		var $resultado;
		var $registros;
		
		function usuario_manutencao() //metódo construtor
		{
			$this->con = new conexao();
		}
		
		function listar_usuario()
		{
			$ordenacao = $_REQUEST['ordem'];
			if($ordenacao == '')
				$ordenacao = "USU_NOME";
				
			$filtro = $_REQUEST['pesquisa'];
			if($filtro == '')
				$filtrar_por = "";
			else	
				$filtrar_por = $filtro;
									
			$sql = "select * from tbl_usuario where USU_NOME like '".$filtrar_por."%' order by ".$ordenacao;  
			$this->resultado = $this->con->banco->Execute($sql);	
			
		}
		
		function excluir()
		{
			$sql = "delete from tbl_usuario where USU_CODIGO = ".$_REQUEST['codigo'];  
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
			$sql = "insert into tbl_usuario (USU_NOME, USU_LOGIN, USU_SENHA, USU_NIVEL) values ('".$_POST['usu_nome'].
			"','".$_POST['usu_login']."','".md5($_POST['usu_senha'])."','".$_POST['usu_nivel']."')";
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
			$sql = "select * from tbl_usuario where USU_CODIGO = ".$_REQUEST['codigo'];  
			$this->resultado = $this->con->banco->Execute($sql);	
			$this->registros = $this->resultado->FetchNextObject(); //se posiciona no registro	
		}
		
		function gravar_alterar()
		{
			$sql = "update tbl_usuario set USU_NOME = '".$_POST['usu_nome']."', USU_LOGIN = '".
			$_POST['usu_login']."', USU_SENHA = '".md5($_POST['usu_senha'])."', USU_NIVEL = '".
			$_POST['usu_nivel']."' where USU_CODIGO = ".$_POST['codigo'];
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
			$sql = "select count(*) as TOTAL from tbl_usuario ";  
			$this->resultado = $this->con->banco->Execute($sql);	
			$this->registros = $this->resultado->FetchNextObject(); //se posiciona no registro
			return $this->registros->TOTAL;
		}
	}
 ?>       
