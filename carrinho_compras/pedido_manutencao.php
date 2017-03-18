<?php
	class pedido_manutencao
	{
		var $resultado;
		var $registros;
		var $resultado_pedido;
		var $resultado_carrinho;	 
		var $resultado_itens;	 
	    var $registro_carrinho;
	    var $resultado_ultimo;
	    var $registros_ultimo;
   	    var $resultado_ultimo_pedido;
	    var $registros_ultimo_pedido;
	    var $res_pedido;
		
		function pedido_manutencao() //metódo construtor
		{
			$this->con = new conexao();
		}
		
	   function gravar_pedido()
	   {
			$sql = "select count(*) as TOTAL from tbl_carrinho where CAR_SESSAO = '".$_SESSION['sessao_codigo']."'";
            $this->resultado_conta = $this->con->banco->Execute($sql);
            $this->registros_conta  = $this->resultado_conta->FetchNextObject();
			if ($this->registros_conta->TOTAL > 0)
			{
			        $sql = "insert into tbl_pedido (CLI_CODIGO, PED_DATA, PED_HORA, PED_VALORTOTAL, PED_VALORFRETE, PED_STATUS, PED_FORMAPAGTO)  values (".$_SESSION['sessao_codigo_cliente'].",current_date, current_time, 0.00, 0.00, 'P', 'B')";	
					$this->resultado_pedido = $this->con->banco->Execute($sql);
					//--------------------
					$sql_ult_cod_pedido = "select max(PED_CODIGO) as ULTIMO from tbl_pedido";
					$this->resultado_ultimo = $this->con->banco->Execute($sql_ult_cod_pedido);
                    $this->registros_ultimo  = $this->resultado_ultimo->FetchNextObject();
					//--------------------
					$sql_carrinho = "select * from tbl_carrinho where CAR_SESSAO = '".$_SESSION['sessao_codigo']."'";
					$this->resultado_carrinho = $this->con->banco->Execute($sql_carrinho);
					while($this->registro_carrinho = $this->resultado_carrinho->FetchNextObject())
					{
						$sql_insert_itens = "insert into tbl_itens_pedido (PROD_CODIGO, PED_CODIGO, PED_QUANT, PED_VALOR) values (".$this->registro_carrinho->PROD_CODIGO.",".$this->registros_ultimo->ULTIMO.",".$this->registro_carrinho->CAR_QUANTIDADE.",".$this->registro_carrinho->CAR_VALOR.")";
						$this->resultado_itens = $this->con->banco->Execute($sql_insert_itens);
						
						$sql_deletar = "delete from tbl_carrinho where CAR_SESSAO = '".$_SESSION['sessao_codigo']."' and PROD_CODIGO = ".$this->registro_carrinho->PROD_CODIGO;
						$this->resultado_deletar = $this->con->banco->Execute($sql_deletar);
					}
			}
	   }
	   
	   function listar_pedido()
	   {
		$sql_ult_cod_pedido = "select max(PED_CODIGO) as ULTIMO from tbl_pedido where cli_codigo = ".$_SESSION['sessao_codigo_cliente'] ;
					$this->resultado_ultimo_pedido = $this->con->banco->Execute($sql_ult_cod_pedido);
                    $this->registros_ultimo_pedido  = $this->resultado_ultimo_pedido->FetchNextObject();
					
					$sql_pedido = "select * from tbl_pedido p, tbl_cliente c where PED_CODIGO = ".$this->registros_ultimo_pedido->ULTIMO." and p.CLI_CODIGO = c.CLI_CODIGO";
					$this->res_pedido = $this->con->banco->Execute($sql_pedido);
					
	   }	   
	   function listar_itens()
	   {
		   					$sql_itens = "select * from tbl_itens_pedido i, tbl_produto p where PED_CODIGO = ".$this->registros_ultimo_pedido->ULTIMO." and i.PROD_CODIGO = p.PROD_CODIGO order by p.PROD_DESCRICAO";
					$this->res_itens = $this->con->banco->Execute($sql_itens);
	   }
		
	}
 ?>       
