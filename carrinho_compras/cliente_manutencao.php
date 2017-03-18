<?php
	class cliente_manutencao
	{
		var $resultado;
		var $registros;
		
		function cliente_manutencao() //metódo construtor
		{
			$this->con = new conexao();
		}
				
		function excluir()
		{
			$sql = "delete from tbl_cliente where FOR_CODIGO = ".$_REQUEST['codigo'];  
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
		   	$sql = "insert into tbl_cliente (CLI_NOME, CLI_ENDERECO, CLI_NUMERO, CLI_COMPLEMENTO, CLI_BAIRRO, CID_CODIGO, CLI_CEP, CLI_FONERES, CLI_FONECEL, CLI_FONECOM, CLI_CPF, CLI_RG, CLI_DATACADASTRO, CLI_DATANASC, CLI_EMAIL, CLI_LOGIN, CLI_SENHA, CLI_DATAULTCOMP, CLI_VALOR_ULTCOMP, CLI_VALOR_TOTAL) values ('".$_POST['cli_nome']."','".$_POST['cli_endereco']."','".$_POST['cli_numero']."','".$_POST['cli_complemento']."','".$_POST['cli_bairro']."',".$_POST['cid_codigo'].",'".$_POST['cli_cep']."','".$_POST['cli_foneres']."','".$_POST['cli_fonecel']."','".$_POST['cli_fonecom']."','".$_POST['cli_cpf']."','".$_POST['cli_rg']."','".$_POST['cli_datacadastro']."','".$_POST['cli_datanasc']."','".$_POST['cli_email']."','".$_POST['cli_login']."','".$_POST['cli_senha']."','".$_POST['cli_dataultcomp']."',".$_POST['cli_valor_ultcomp'].",".$_POST['cli_valor_total'].")";
        	if($this->resultado = $this->con->banco->Execute($sql))
			{
			     alerta("O registro foi incluido com sucesso")	;
				 return true;
			}
			else
			{
			     alerta("Nao foi possivel gravar")	;
				 return false;
			}

	   }			
			
		function listar_cidades()
		{
			$retorna = '';
			$sql = "select * from tbl_cidade order by CID_DESCRICAO";
			$resultado = $this->con->banco->Execute($sql);	
			while($regcid = $resultado->FetchNextObject())
			{
				$selecionado = '';	
				if($this->registros->CID_CODIGO == $regcid->CID_CODIGO)
				{
					$selecionado = 'selected';
				}
				$retorna = $retorna. '<option value="'.$regcid->CID_CODIGO.'"'.$selecionado.'>'.$regcid->CID_DESCRICAO.'</option>';
			}			
			return $retorna;
		}
	}
 ?>       
