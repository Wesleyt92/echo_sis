<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>

<?php
include"../config.php";


$removali = array("(", ")", "-", ".","#"); /*Remove as  mascaras */


/* pegando os dados */ 

$vl_nome=$_POST['participante-nome'];
$vl_sobrenome=$_POST['participante-sobrenome'];
$vl_telefone=str_replace($removali, "",($_POST['participante-telefone']));
$vl_dt_nasc=$_POST['participante-data-nascimento'];
$vl_nivel_instr=$_POST['participante-nivel-instrucao'];
$vl_email=$_POST['participante-email'];

/*Convertendo as datas */

$vl_dt_nasc=implode("-",array_reverse(explode("/",$vl_dt_nasc)));



//valida checkbox 
if($_POST && isset($_POST['participante-questuni'])){
	$ativo= $_POST['participante-questuni'];
	foreach	($ativo as $vl_questuni);
	$vl_questuni;
	
   };

//valida checkbox 
if($_POST && isset ($_POST['participante-quest-hr'])){
	$ativo=$_POST['participante-quest-hr'];
	foreach	($ativo as $vl_questhr);
	$vl_questhr;
   };

//valida campo responsavel 
if($_POST['participante-responsavel']==true){
$vl_nome_responsa=$_POST['participante-responsavel'];
	$vl_questhr;

};

// valida campo telefone responsavel

if($_POST['participante-telefone-responsavel']==true){
$vl_telefone_responsa=str_replace($removali, "",($_POST['participante-telefone-responsavel']));
};
	

// inserts no banco 

// Todos os campos cadastrados 
if(isset($vl_questuni) and isset($vl_questhr) and isset($vl_nome_responsa) and isset($vl_telefone_responsa)){

	$sql=("INSERT INTO participantes(part_nome,part_sobrenome,part_telefone,part_data_nasc,part_respon,part_respon_tel,part_nvl_instru,part_estuda_univ,part_dispo_hr,part_email)
	VALUES
	('$vl_nome','$vl_sobrenome','$vl_telefone','$vl_dt_nasc','$vl_nome_responsa','$vl_telefone_responsa','$vl_nivel_instr',$vl_questuni,'$vl_questhr','$vl_email')");

	mysql_query($sql) or die (mysql_error());

	

}elseif(isset($vl_questuni) and isset($vl_questhr)){
	$sql=("INSERT INTO participantes(part_nome,part_sobrenome,part_telefone,part_data_nasc,part_nvl_instru,part_estuda_univ,part_dispo_hr,part_email)
	VALUES
	('$vl_nome','$vl_sobrenome','$vl_telefone','$vl_dt_nasc','$vl_nivel_instr',$vl_questuni,'$vl_questhr','$vl_email')");

	mysql_query($sql) or die (mysql_error());

	
}else{

$sql=("INSERT INTO participantes(part_nome,part_sobrenome,part_telefone,part_data_nasc,part_nvl_instru,part_email)
	VALUES
	('$vl_nome','$vl_sobrenome','$vl_telefone','$vl_dt_nasc','$vl_nivel_instr','$vl_email')");





mysql_query($sql) or die (mysql_error());

}

	echo "<script>	
	alert('Voluntario Cadastrado e novo  usuario criado ');
	</script>";
	
	

?>


<?php
	
	
		
		
	echo"<meta http-equiv='refresh' content='1; url=../../cadastro-participante.php'>";
	
?>

	
	




</body>
</html>

