<?php
	class pedido_manutencao
	{
		var $resultado;
		var $registros;
		
		function pedido_manutencao() //metódo construtor
		{
			$this->con = new conexao();
		}
		
/*		function listar_pedido()
		{
			$ordenacao = $_REQUEST['ordem'];
			if($ordenacao == '')
				$ordenacao = "PROD_DESCRICAO";
				
			$filtro = $_REQUEST['pesquisa'];
			if($filtro == '')
				$filtrar_por = "";
			else	
				$filtrar_por = $filtro;
									
			$sql = "select * from tbl_produto where PROD_DESCRICAO like '".$filtrar_por."%' order by ".$ordenacao;  
			$this->resultado = $this->con->banco->Execute($sql);	
			
		}*/
		
		function listar_pedido()
		{
			$sql = "select * from tbl_itens_pedido";  
			$this->resultado = $this->con->banco->Execute($sql);	

		}
		
		function total_registros()
		{
			$sql = "select count(*) as TOTAL from tbl_itens_pedido ";  
			$this->resultado = $this->con->banco->Execute($sql);	
			$this->registros = $this->resultado->FetchNextObject(); //se posiciona no registro
			return $this->registros->TOTAL;
		}

	}
 ?>       
