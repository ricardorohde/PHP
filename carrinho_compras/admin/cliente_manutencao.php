<?php
	class cliente_manutencao
	{
		var $resultado;
		var $registros;
		
		function cliente_manutencao() //metódo construtor
		{
			$this->con = new conexao();
		}
		
		function listar_cliente()
		{
			$ordenacao = $_REQUEST['ordem'];
			if($ordenacao == '')
				$ordenacao = "CLI_NOME";
				
			$filtro = $_REQUEST['pesquisa'];
			if($filtro == '')
				$filtrar_por = "";
			else	
				$filtrar_por = $filtro;
									
			$sql = "select * from tbl_cliente where CLI_NOME like '".$filtrar_por."%' order by ".$ordenacao;  
			$this->resultado = $this->con->banco->Execute($sql);	
			
		}
		
		
		function total_registros()
		{
			$sql = "select count(*) as TOTAL from tbl_cliente ";  
			$this->resultado = $this->con->banco->Execute($sql);	
			$this->registros = $this->resultado->FetchNextObject(); //se posiciona no registro
			return $this->registros->TOTAL;
		}
		
}
 ?>       
