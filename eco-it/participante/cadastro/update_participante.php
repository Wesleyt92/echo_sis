<?php
	session_start();
	

	if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])){
		
		header("Location:login.php");
		exit;
	}
?>

<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>

<?php
include"../../php/config.php";


$_SESSION['id_part'];

$id=$_SESSION['id_part'];


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


// UPDATE no banco 

$sql=("UPDATE participantes SET
part_nome='$vl_nome',
part_sobrenome='$vl_sobrenome',
part_telefone='$vl_telefone',
part_data_nasc='$vl_dt_nasc',
part_nvl_instru='$vl_nivel_instr',
part_email='$vl_email'
WHERE ID='$id'");

mysql_query($sql) or die (mysql_error());


	echo "<script>	
	alert('Dados Alterados ');
	</script>";
	
	echo"<meta http-equiv='refresh' content='1; url=visualizar_cadastrophp.php'>";

?>



	
	




</body>
</html>

