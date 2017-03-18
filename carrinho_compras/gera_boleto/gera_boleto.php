<?php
     //echo "categoria_manutencao<br>";
   class gera_boleto
   {
       var $resultado;
	   var $registros;
	   var $res_soma;
	   var $reg_soma;
	   
	   function gera_boleto() //metodo construtor
	   {
             $this->con = new conexao();		   
	   }   
       
	   function busca_dados()
	   {
		     $sql = "select * from tbl_pedido p, tbl_cliente c, tbl_cidade cid where PED_CODIGO = ".$_SESSION['sessao_codigo_pedido'] ;
					$this->resultado = $this->con->banco->Execute($sql);
					
		     $sql_soma = "select sum(PED_VALOR) as SOMA from tbl_itens_pedido where PED_CODIGO = ".$_SESSION['sessao_codigo_pedido'] ;
			 $this->res_soma = $this->con->banco->Execute($sql_soma);
			 $this->reg_soma  = $this->res_soma->FetchNextObject();
					
	   }
	   
   }
	   
   
?>