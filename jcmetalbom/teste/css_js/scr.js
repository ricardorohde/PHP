// JavaScript Document

// Alterna as tags div entre abertas e fechadas
function alternaDiv(div){
	obj = div;	
	if(document.getElementById(obj).style.display == "block"){
		document.getElementById(obj).style.display = "none";
	}else{
		document.getElementById(obj).style.display = "block";
	}
}

//********************* FUNÇÕES PARA CRIAÇÃO DAS TABELAS DINAMICAMENTE USADAS PELO AJAX**********************************\\

function novaColuna(row, value){
	var col = document.createElement("td");	
	col.innerHTML = value;	
	row.appendChild(col);
}

function novaLinha(table,tdArray,prefixo,bg){
	var row = document.createElement("tr");
	row.id = prefixo + "_" + (table.getElementsByTagName("tr").length + 1);	
	row.align = 'center';
	if(bg){
		row.bgColor = bg;
	}
	//---------------------------------------------------		
	/*if(table.getElementsByTagName("tr").length % 2 != 0){
		row.bgColor = '#FEFEFF';
	}else{
		row.bgColor = '#E6E6EC';
	}*/
	//---------------------------------------------------
	for(x=0; x < tdArray.length; x++){				
    	novaColuna(row, tdArray[x]);
	}	
	table.appendChild(row);
}
// Alterada para gerar mais de uma tabela
function inserirCelula(tdArray_,idTabela,idReceptor,bg){
	//alert(idReceptor);
	ultimoID = idTabela;
	var tbody;
	if (document.getElementById(idTabela) == null){
		tbody = document.createElement("tbody");
		tbody.id= idTabela;
		document.getElementById(idReceptor).appendChild(tbody);
	}else{
		tbody = document.getElementById(idTabela);
	}	
	prefixo = "tr" + ultimoID;	
	novaLinha(tbody,tdArray_,prefixo,bg);
}

//********************** FUNÇÕES DE REMOÇÃO *************************************\\

function removeTodos(tId){
	idTabela = tId;
	table_ = document.getElementById(tId);
	pre = "tr" + idTabela + "_";
	if(document.getElementById(idTabela) != null){
  	var tamanho = table_.rows.length;
    for (k = 1; k <= tamanho; k++){	
			table_.removeChild(document.getElementById(pre + k));
	  }
	} 
} 
 
function remove(tId,pos){
	idTabela = tId;
	table_ = document.getElementById(tId)
	pre = "tr" + table_.id + "_";
	table_.removeChild(document.getElementById(pre + pos));
}

//**********************************************************************************\\

//************************ VERIFICA O FORMULÁRIO DE CONTATO ************************\\
function vContato(){
	var nome = document.form.nome.value;
	var email = document.form.email.value;
	var ddd = document.form.ddd.value;
	var telefone = document.form.telefone.value;
	var cidade = document.form.cidade.value;
	var estado = document.form.estado.value;
	var mensagem = document.form.mensagem.value;
	var vMsg = '';
	
	if(nome == ''){
		vMsg += " - Digite o nome!\n";
	}
	
	if(email == ''){
		vMsg += " - Digite o e-mail!\n";	
	}
	
	if(ddd == ''){
		vMsg += " - Digite o ddd!\n";	
	}
	
	if(telefone == ''){
		vMsg += " - Digite o telefone!\n";	
	}
	
	if(cidade == ''){
		vMsg += " - Digite a cidade!\n";		
	}
	
	if(estado == 'N/A'){
		vMsg += " - Selecione o estado!\n";		
	}
	
	if(mensagem == ''){
		vMsg += " - Digite a mensagem!";	
	}
	
	if(vMsg == ''){
		document.form.submit();
	}else{
		alert(vMsg);
	}
}
//**********************************************************************************\\

//************************** VERIFICA FORMULÁRIO CONFIGURAÇÕES **********************\\
function vConf(){
	var maxRss = document.form.max_rss.value;
	if((maxRss < 0) || (maxRss > 99)){
		location = 'index.php?id=0&erro=1';
	}else{
		document.form.submit();
	}
}
//***********************************************************************************\\

//**************************** ABRE JANELAS POPUP ***********************************\\
function janela(url, width, height){
	window.open(url,"Libel","toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,menubar=no,width="+width+",height="+height);
}
//***********************************************************************************\\

//*********************  VERIFICA O FORMULÁRIO DE NOTÍCIAS **************************\\

function vNoticia(){
	var titulo = document.form.titulo.value;
	var primeiro = document.form.primeiro.value;
	var texto = document.form.texto.value;
	var img = document.form.imagem.value;
	var vMsg = '';
	
	if(titulo == ''){
		vMsg += " - Digite o título!\n";
	}
	
	if(primeiro == ''){
		vMsg += " - Digite o primeiro parágrafo!\n";	
	}
	
	if(texto == ''){
		vMsg += " - Digite o texto completo!\n";	
	}
	
	if(img == ''){
		vMsg += " - Escolha uma imagem!\n";	
	}	
	
	if(vMsg == ''){
		document.form.action = 'scr_noticias.php?op=salvar';
		document.form.submit();
	}else{
		alert(vMsg);
	}
}

//***********************************************************************************\\

//*********************  VERIFICA O FORMULÁRIO DE EVENTOS/GALERIAS **************************\\

function vEvento(){
	var titulo = document.form.titulo.value;
	var descricao = document.form.descricao.value;
	var total = document.form.total.value;
	var data = document.form.data.value;
	var vMsg = '';
	
	if(titulo == ''){
		vMsg += " - Digite o título!\n";
	}
	
	if(descricao == ''){
		vMsg += " - Digite a descricao!\n";	
	}
	
	if(total == ''){
		vMsg += " - Digite o total de fotos!\n";	
	}
	
	if(data == ''){
		vMsg += " - Digite a data!\n";	
	}	
	
	if(vMsg == ''){
		document.form.submit();
	}else{
		alert(vMsg);
	}
}

//***********************************************************************************\\

//*********************  VERIFICA O FORMULÁRIO DE PRODUTOS **************************\\

function vProduto(){
	var nome = document.form.nome.value;
	var descricao = document.form.descricao.value;
	var img1_p = document.form.img1_p.value;
	var img1_g = document.form.img1_g.value;
	var vMsg = '';
	
	if(nome == ''){
		vMsg += " - Digite o nome!\n";
	}
	
	if(descricao == ''){
		vMsg += " - Digite a descricao!\n";	
	}
	
	if((img1_p == '') || (img1_g == '')){
		vMsg += " - Escolha pelo menos uma imagem pequena e uma grande!";
	}	
	
	if(vMsg == ''){
		document.form.submit();
	}else{
		alert(vMsg);
	}
}

//***********************************************************************************\\

//*********************  VERIFICA O FORMULÁRIO DE USUÁRIOS **************************\\

function vUsuario(){
	var nome = document.form.nome.value;
	var login = document.form.login.value;
	var senha = document.form.senha.value;	
	var vMsg = '';
	
	if(nome == ''){
		vMsg += " - Digite o nome!\n";
	}
	
	if(login == ''){
		vMsg += " - Digite o login!\n";	
	}
	
	if((senha == '')){
		vMsg += " - Digite uma senha!";
	}	
	
	if(vMsg == ''){
		document.form.submit();
	}else{
		alert(vMsg);
	}
}

//***********************************************************************************\\