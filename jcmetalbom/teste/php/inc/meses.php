<?

function ultimoDia($ano,$mes){
		if( ($mes < 1) || ($mes > 12)){
			return "Mês inválido, informe um valor de 1 à 12.";
			exit;
		}elseif($ano % 4 == 0){
			$ultimo = array(31,29,31,30,31,30,31,31,30,31,30,31);
		}else{
			$ultimo = array(31,28,31,30,31,30,31,31,30,31,30,31);
		}
		return $ultimo[$mes - 1];
}
	
	function nomeMes($mes){
		switch($mes){
			case 1: 
				return "Jan";
				break;
			case 2: 
				return "Fev";
				break;
			case 3: 
				return "Mar";
				break;
			case 4: 
				return "Abr";
				break;
			case 5: 
				return "Mai";
				break;
			case 6: 
				return "Jun";
				break;
			case 7: 
				return "Jul";
				break;
			case 8: 
				return "Ago";
				break;
			case 9: 
				return "Set";
				break;
			case 10: 
				return "Out";
				break;
			case 11: 
				return "Nov";
				break;
			case 12: 
				return "Dez";
				break;	
		}
	}
	
	function nomeMesCompleto($mes){
		switch($mes){
			case 1: 
				return "Janeiro";
				break;
			case 2: 
				return "Fevereiro";
				break;
			case 3: 
				return "Março";
				break;
			case 4: 
				return "Abril";
				break;
			case 5: 
				return "Maio";
				break;
			case 6: 
				return "Junho";
				break;
			case 7: 
				return "Julho";
				break;
			case 8: 
				return "Agosto";
				break;
			case 9: 
				return "Setembro";
				break;
			case 10: 
				return "Outubro";
				break;
			case 11: 
				return "Novembro";
				break;
			case 12: 
				return "Dezembro";
				break;	
		}
	}
?>