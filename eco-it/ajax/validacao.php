<?php
$campo = $_GET['campo'];
$valor = $_GET['valor'];
$x=$_GET['valor'];;
// Verificando o campo login
if ($campo == "login") {
	
	if ($valor == "") {
		echo "Preencha o campo com seu login";
	} elseif (strlen($valor) > 28) {
		echo "O login deve ter no máximo 28 caracteres";				
	} elseif (strlen($valor) < 4) {
		echo "O login deve ter no minímo 4 caracteres";		
	} elseif (!preg_match('/^[a-z\d_]{4,28}$/i', $valor)) {
		echo "O login deve conter somente letras e numeros.";
	} 

}

// Verificando o campo email
if ($campo == "vl_email") {
	
	if (!preg_match("/^[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\-]+\.[a-z]{2,4}$/i", $valor)) {
		echo "Preencha com um email válido";
	}
	
}

// Verificando o campo CPF
if ($campo == "cpf") {

	if (!preg_match("/^([0-9]){3}.([0-9]){3}.([0-9]){3}-([0-9]){2}$/i", $valor)) {
		echo "Digite um CPF válido";
	}

}

if ($campo == "placa"){
	if ($valor==""){
	echo "Preencha o campo com a placa";
	}
	elseif (strlen($valor)<7){
		
		
		echo"A placa deve  no maximo conter 7 caracteres";
	}
	
	elseif (strlen($valor)>7){
		echo"A placa deve  no maximo conter 7 caracteres";
	}
	
	}
	
if ($campo=="vl_dt_nasc"){
	if ($valor==""){
	echo"Preencha o campo data";
	}elseif (!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $valor)){
		echo"Formato da data invalido";
		}elseif( $x=explode("/",$valor) and 
					$x[0]>31){
					echo"Data informada invalida : Dia superior   ";	
						
					}elseif($x=explode("/",$valor) and 
					$x[1]>12){
					echo"Data informada invalida : Mês superior   ";	
					}
					
					

	}
	
if ($campo=="vl_telefone"){
		if($valor==""){
			echo"Preencha o campo data";
		}elseif(!preg_match('/^\(\d{2}\)?[0-9]{4}-[0-9]{4}$/i',$valor)){
			echo"Formato invalido ";
		}
	}
	
if ($campo == "vl_nome") {
	
	if ($valor == "") {
		echo "Preencha o campo com seu Nome !!";
	} elseif (strlen($valor) > 40) {
		echo "O Campo nome  deve ter no máximo 28 caracteres";				
	} elseif (strlen($valor) < 4) {
		echo "O Campo nome  deve ter no minímo 4 caracteres";		
	}
	}
	
	
if ($campo=="evento-data-inicio"){
	if ($valor==""){
	echo"Preencha o campo data";
	}elseif (!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $valor)){
		echo"Formato da data invalido";
		}elseif( $x=explode("/",$valor) and 
					$x[0]>31){
					echo"Data invalida : Dia superior a 31 dias";	
						
					}elseif($x=explode("/",$valor) and 
					$x[1]>12){
					echo"Data invalida : Mês superior 12 meses";	
					}
					
					

	}
	
if ($campo=="evento-hora-inicio"){
	if ($valor==""){
	echo"Preencha o campo data";
	}elseif (!preg_match('/^\d{2}\:\d{2}\:\d{2}$/', $valor)){
		echo"Formato da data invalido";
		}elseif( $x=explode(":",$valor) and 
					$x[0]>24){
					echo"Hora invalida : Hora Superior a 24 horas ";	
						
					}elseif($x=explode(":",$valor) and 
					$x[1]>59){
					echo"Hora  invalida : Minuto superior 59 minutos ";	
					}
					
					

	}

// Acentuação
header("Content-Type: text/html; charset=ISO-8859-1",true);
?>