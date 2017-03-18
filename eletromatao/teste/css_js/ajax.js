var requestObject;
var action = "";
var method = "";
var requestContent = "";

//Fun??oo para instanciar o objeto HttpRequest.
function ajaxInit() {
    try {
        requestObject = new ActiveXObject("Microsoft.XMLHTTP");
    }catch(e) {
        try {
       	  requestObject = new ActiveXObject("Msxml2.XMLHTTP");
        }catch(ex) {
        	try {
          	requestObject = new XMLHttpRequest();
          } catch(exc) {
          	alert("Browser não suporta ajax.");
            requestObject = false;
          }
        }
    }
}

//Pega os campos e seus valores do formul?rio para concatenar na vari?vel(conteudoRequisicao) que ser enviada para o servidor.
function getDataForm(ajaxForm) {
   if(ajaxForm != "" && ajaxForm.action != undefined){
      action = ajaxForm.action;
      method = ajaxForm.method;
      requestContent = "";
      for(i = 0; i < ajaxForm.elements.length; i++){
         elementos = ajaxForm.elements[i];
         if(elementos.name != ""){
            requestContent += elementos.name + "=" + escape(elementos.value) + "&";
         }
      }
      requestContent = requestContent.substring(0, requestContent.length -1);
   } else {
      alert("Invalid Form");
   }
}

// Processa uma requisição pro Servidor através de um formulário.
function ajaxProcess(ajaxForm, fuctionProcess){
	 // Inicia a função do objeto HttpRequest.
	 ajaxInit();
   if(requestObject){
       getDataForm(ajaxForm);
       requestObject.open(method, action, true);
       requestObject.onreadystatechange = fuctionProcess;
       if(method == "post"){
           requestObject.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
       }
       requestContent = requestContent != "" ? requestContent : null;
       requestObject.send(requestContent);
   }
}

// Processa uma requisição pro Servidor através de um formulário, mas sem retornar resposta
function executaAjax(ajaxForm){
	 // Inicia a função do objeto HttpRequest.
 	 ajaxInit();
   if(requestObject){
       getDataForm(ajaxForm);
       requestObject.open(method, action, true);
       if(method == "post"){
           requestObject.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
       }
       requestContent = requestContent != "" ? requestContent : null;
       requestObject.send(requestContent);
   }
}


// Processa uma requisição pro Servidor através de uma url
function processaUrl(url, fuctionProcess){
	// Inicia a função do objeto HttpRequest.
	ajaxInit();
	if(requestObject){
		method = "post";
		requestObject.open(method,url,true);
		if(method == "post"){
    	requestObject.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    }
		requestObject.onreadystatechange = fuctionProcess;
		requestObject.send(url);
	}
}

// Apenas executa um script assíncrono...não dá retorno algum...o mesmo que a chamada (url,function nada(){return null;})
function executaAssincrono(url){
	// Inicia a função do objeto HttpRequest.
	ajaxInit();
	if(requestObject){
		method = "post";
		requestObject.open(method,url,true);
		if(method == "post"){
    	requestObject.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    }		
		requestObject.send(url);
	}
}

//Verifica se o objeto HttpRequest cont?m um retorno v?lido.
function isAjax() {
   if(requestObject.readyState == 4){
      if(requestObject.status == 200){
         return true;
      } else {
         alert("Problem: " + requestObject.statusText);
      }
   }
   return false;
   
}
// Inicia a função do objeto HttpRequest.
//ajaxInit();