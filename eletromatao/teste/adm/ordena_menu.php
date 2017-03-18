<?
	// Faz a ordenação do menu
	include "protege.php";
	include "../php/mysqlconecta.php";	
?>
<html>
<head>
<script src="../css_js/ajax.js"></script>
<script src="../css_js/scr.js"></script>
<link rel="stylesheet" href="../css_js/estilos.css" />
<style>
th{
	border-bottom: #000000 1px dashed;
}
</style>
<script language="javascript">
// o parâmetro acao significa se irá subir ou descer, e receberá apenas "S","D","s","d"
function troca(posicaoAtual,acao,cod){
	removeTodos('tMenu');
	acao = acao.toUpperCase();
	if((acao != "S") && (acao != "D")){
		alert('Ação inválida, escolha [S] para subir, ou [D] para descer.');
	}else{
		url = '';
		if((acao == 'S') && (posicaoAtual != 1)){
			url = 'scr_menus.php?op=organizar&acao=S&posAtual=' + posicaoAtual + "&cod=" + cod;
		}else{
			if((acao == 'D') /*&& COMO VERIFICAR MÁXIMO???? */){
				url = 'scr_menus.php?op=organizar&acao=D&posAtual=' + posicaoAtual + "&cod=" + cod;
			}
		}
		if(url != ''){
			processaUrl(url,atualiza);	
			//location = url;
		}
	}
}

/*function atualiza(){
	window.location.href = window.location.href;
}*/

function atualiza(){
	if(isAjax()){
		var text = requestObject.responseText;
			if (text.indexOf("<") != -1){
				try{
					xml = requestObject.responseXML;
				}catch(e){
					try{
						xml = requestObject.responseXmL;
					}catch(e){
						alert("Browser não suporta ajax.");
					}
				}			
			
				var items = xml.getElementsByTagName("item");
				
				var nome = '';
				var ordem = '';
				var codigo = '';
				var subs = 0;
				
				var links = '';
				
				for(i = 0; i < items.length; i++){					
					nome = items[i].getElementsByTagName('nome')[0].firstChild.data;
					ordem = items[i].getElementsByTagName('ordem')[0].firstChild.data;
					codigo = items[i].getElementsByTagName('codigo')[0].firstChild.data;										
					
					if(i != 0){
						links  = "<a class='links' href=\"javascript:troca(" + ordem + ",\'S\'," + codigo + ");\"> /\\ </a>";
					}else{
						links = '-';
					}
					if(i != items.length - 1){
						links += "<a class='links' href=\"javascript:troca(" + ordem + ",\'D\'," + codigo + ");\"> \\/ </a>";
					}else{
						links += '-';
					}
										
					inserirCelula(new Array(nome,ordem,links),'tMenu','menu','#EEEEEE');
					
					subs = items[i].getElementsByTagName('subitem');					
					for(j = 0; j < subs.length; j++){
						nome = subs[j].getElementsByTagName('nome')[0].firstChild.data;
						ordem = subs[j].getElementsByTagName('ordem')[0].firstChild.data;
						codigo = subs[j].getElementsByTagName('codigo')[0].firstChild.data;
						
						if(j != 0){
							links  = "<a class='links' href=\"javascript:troca(" + ordem + ",\'S\'," + codigo + ");\"> /\\ </a>";
						}else{
							links = '-';
						}
						if(j != subs.length - 1){
							links += "<a class='links' href=\"javascript:troca(" + ordem + ",\'D\'," + codigo + ");\"> \\/ </a>";
						}else{
							links += '-';
						}
						
						inserirCelula(new Array(nome,ordem,links),'tMenu','menu');
					}
				}										
		}else{
			alert("Ocorreu um problema. Por favor repita a operação.");
		}
	}
}			

function inicia(){
	processaUrl('scr_menus.php?op=iniciar',atualiza);
}

window.onload = inicia();

</script>
</head>
<body>
<table width="464" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#FFFFFF">
	<tr>
  	<td width="464" height="23" colspan="3" bgcolor="#000000">
			<table width="464" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='menu'>
      	<tr>
        	<th width="218" height="20">ITEM</th>
          <th width="90">ORDEM</th>
          <th width="142">OP&Ccedil;&Otilde;ES</th>
        </tr>
      </table>
		</td>
  </tr>          
</table>
</body>
</html>