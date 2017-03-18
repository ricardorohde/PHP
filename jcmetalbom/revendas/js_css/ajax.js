var objRequisicao;
var action = "";
var method = "";
var contRequesicao = "";

//Função para instanciar o objeto HttpRequest.
function iniciaAjax() {
  try {
    objRequisicao = new ActiveXObject("Microsoft.XMLHTTP");
  }
  catch(e) {
    try {
      objRequisicao = new ActiveXObject("Msxml2.XMLHTTP");
    }
	catch(ex) {
      try {
        objRequisicao = new XMLHttpRequest();
      }
	  catch(exc){
        alert("Browser não suporta ajax.");
        objRequisicao = false;
      }
    }
  }
}

// Inclui uma página dentro de uma tag (o parametro receptor recebe o id desta tag)
function incluiPagina(url, idReceptor){
	iniciaAjax();
	objRequisicao.open("GET", url, true);
	objRequisicao.onreadystatechange = function(){		
		if (objRequisicao.readyState==4){
			document.getElementById(idReceptor).innerHTML = objRequisicao.responseText;
		}
		else{
			document.getElementById(idReceptor).innerHTML = "<div align='center'class='txtTahoma11pxPretoBold' style='vertical-align:middle'>Aguarde...</span></div>";
		}
	}
	objRequisicao.send(null);
}

function incluiPagina2(url, idReceptor){
	location=url;
}
