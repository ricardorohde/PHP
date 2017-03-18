// JavaScript Document
function Janela(url, width, height, scr){
	window.open(url,"EMMES","toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=" + scr + ",resizable=no,menubar=no,width="+width+",height="+height);
}

function verifInclusao(){
	var msg = "";
	var nome = document.formIncluir.cmpNome.value;
	var endereco = document.formIncluir.cmpEndereco.value;
	var bairro = document.formIncluir.cmpBairro.value;
	var cidade = document.formIncluir.cmpCidade.value;
	var cep = document.formIncluir.cmpCEP.value;
	var email = document.formIncluir.cmpEmail.value;
	var nomeImg = document.formIncluir.cmpNomeImg.value;
	
	
	if(nome == "")
		msg += " - Digite o Nome.\n";
	if(endereco == "")
		msg += " - Digite o Endereço.\n";
	if(bairro == "")
		msg += " - Digite o Bairro.\n";
	if(cidade == "")
		msg += " - Digite a Cidade.\n";
	if(cep == "")
		msg += " - Digite o CEP.\n";
	
	if(email != ""){
		var ponto    = false;
		var arroba   = false;
		var caracter = false;
		
		for(var i=0; i < email.length; i++){
			if(email.charAt(i) == "@")
				arroba = true;
			if(email.charAt(i) == ".")
				ponto = true;
			if(email.charAt(i) != " ")
				caracter = true;
		}
		if (ponto == false || arroba == false || caracter == false){
			msg += " - Digite o E-mail corretamente.\n";
		}
	}
	
	if(nomeImg == "")
		msg += " - Digite o Nome da Imagem.\n";
	
	
	
	if(msg != ""){
		alert(msg);
	}
	
	else{
		document.formIncluir.action = "scr_inclui_representacao.php";
		document.formIncluir.submit();
	}
		
}

function verifExclusao(){
	var repres = document.formExcluir.cmpRepres.value;
	
	if(repres=="vazio")
		alert(' - Selecione uma Representação Válida!');
	else{
		if(confirm('Proseguir com exclusão?')){
			document.formExcluir.action = "scr_exclui_representacao.php";
			document.formExcluir.submit();
		}
	}
}