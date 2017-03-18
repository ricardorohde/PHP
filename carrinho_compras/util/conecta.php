<?php

    require('adodb/adodb.inc.php'); // biblioteca necessária para trabalhar com adpdb
	require('funcoes.php');
    
    class conexao
    {
        var $tipo_banco    = "mysql";
        var $servidor      = "localhost";
        var $usuario       = "root";
        var $senha         = "";
        var $banco;    
        
        function conexao() // método construtor
        {
            $this->banco = NewADOConnection($this->tipo_banco);
            $this->banco->dialect = 3;
            $this->banco->debug = false;
            $this->banco->Connect($this->servidor, $this->usuario, $this->senha, "carrinho_compras");
        }
    }

    $con = new conexao();
