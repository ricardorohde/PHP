<?php
	class carrinho_manutencao
	{
		var $resultado;
		var $resultado_img;
		var $registros;
		//var $registros_img;
		
		function carrinho_manutencao() //metódo construtor
		{
			$this->con = new conexao();
		}
		
		function listar_categoria()
		{									
			$sql = "select * from tbl_categoria";  
			$this->resultado = $this->con->banco->Execute($sql);	
			
		}
		
		function listar_produtos_categoria($codigo_categoria)
		{									
			$sql = "select * from tbl_produto where CAT_CODIGO =".$codigo_categoria." order by PROD_DESCRICAO";  
			$this->resultado = $this->con->banco->Execute($sql);	
			
		}		

		function listar_imagem($codigo_produto)
		{									
			$sql = "select * from tbl_imagem where PROD_CODIGO =".$codigo_produto." order by IMG_DESCRICAO";  
			$this->resultado_img = $this->con->banco->Execute($sql);	
			$this->registro_img = $this->resultado_img->FetchNextObject();
			return $this->registro_img->IMG_DESCRICAO;
			
		}	
		
		function incluir_carrinho($codigo_produto)
		{									
			$sql_produto = "select * from tbl_produto where PROD_CODIGO =".$codigo_produto;  
			$this->resultado_prod = $this->con->banco->Execute($sql_produto);	
			$this->registro_prod = $this->resultado_prod->FetchNextObject();
			
			
			$sql_carrinho = "insert into tbl_carrinho (PROD_CODIGO, CAR_SESSAO, CAR_QUANTIDADE, CAR_VALOR, CAR_DATA) 
			values (".$codigo_produto.",'".session_id()."',1,".$this->registro_prod->PROD_VALOR.",'".date('y-m-d')."')";
			
			if($this->resultado_prod = $this->con->banco->Execute($sql_carrinho))
			{
				alerta('Produto inserido no carrinho com sucesso');
				return true;
			}
			else
			{
				alerta('erro ao inserir no carrinho');	
				return false;
			}
			
		}		
		
		function listar_carrinho()
		{									
			$sql = "select * from tbl_carrinho c, tbl_produto p where CAR_SESSAO ='".session_id()."' and c.PROD_CODIGO = p.PROD_CODIGO order by PROD_DESCRICAO";  
			$this->resultado = $this->con->banco->Execute($sql);			
		}			
		
	   function quantidade_produtos() //retorna quantos produtos tem no carrinho de compras
	   {
			$sql = "select count(*) as TOTAL from tbl_carrinho where CAR_SESSAO = '".session_id()."'";
            $this->resultado = $this->con->banco->Execute($sql);
            $this->registros  = $this->resultado->FetchNextObject();
			return $this->registros->TOTAL;
	   }
		
	   function atualizar_carrinho()
	   {
		   $qtd     = $_POST['qtd'];
           $codigo  = $_POST['codigo'];
		   $tamanho = count($qtd);
		   for($i = 0; $i < $tamanho;$i++)
		   {
			   if($qtd[$i] > 0)
			   {
				   $sql = "update tbl_carrinho set CAR_QUANTIDADE = ".$qtd[$i]." where PROD_CODIGO = ".$codigo[$i]." and CAR_SESSAO = '".session_id()."'";
			   }
			   else
			   {
  				   $sql = "delete from tbl_carrinho where PROD_CODIGO = ".$codigo[$i]." and CAR_SESSAO = '".session_id()."'";
			   }
			   $this->con->banco->Execute($sql);
		   }
		   
		   
	   }	
		
	}
 ?>       
