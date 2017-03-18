// JavaScript Document
function muda_cor_over(celula)
{
	celula.style.backgroundColor="#f2f0a2";	
}

function muda_cor_out(celula)
{
	celula.style.backgroundColor="#999";	
}

function verifica_nome(formulario)
{
	var preencher="O(s) campo(s) abaixo devem ser preenchidos:\n\n";
	var erros=0;
	if(formulario.for_razaosocial.value == "")
	{
		preencher += "razão social\n";
		erros++;
	}
	
	if(formulario.for_nome_fantasia.value == "")
	{
		preencher +="fantásia\n";
		erros++;
	}
	
	if(erros >0)
	{
		alert(preencher);
		return false;
	}	
}

function formata_mascara(campo_passado, mascara)
{
	var campo = campo_passado.value.length;
	var saida = mascara.substring(0,1);
	var texto = mascara.substring(campo);
	if(texto.substring(0,1) != saida)
	{
		campo_passado.value += texto.substring(0,1);
	}
}