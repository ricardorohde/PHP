<?php

	function tratar_erros($erro_numero)
	{
		$mensagem_erro = "";
		switch($erro_numero)
		{
			case 1045 : $mensagem_erro = "O usuário ou senha são inválidos, favor rever isso";break;
			case 1146 : $mensagem_erro = "Essa tabela não existe";break;
			default: $mensagem_erro = "Erro não identificado";
		}
		return $mensagem_erro;
	}
	
	function alerta($mensagem)
	{
		echo'<script>alert("'.$mensagem.'");</script>';	
	}
	
	function voltar()
	{
		echo "<script>history.back();</script>";	
	}
	
	function direciona($para_url)
	{
		echo '<script>window.location="'.$para_url.'"</script>';
	}
	
	function formata_money($valor)
	{
		return 'R$ '.number_format($valor,2,',','.');	
	}