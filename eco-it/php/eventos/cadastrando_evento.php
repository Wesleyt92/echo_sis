<?php
include"../config.php";


$vl_nome=$_POST['evento-nome'];
$vl_local=$_POST['evento-local'];
$vl_data_inicio=$_POST['evento-data-inicio'];
$vl_hora_inicio=$_POST['evento-hora-inicio'];
$vl_hora_fim=$_POST['evento-hora-termino'];
$vl_evento_responsavel=$_POST['evento-responsavel'];
$vl_evento_tipo=$_POST['evento-tipo'];

$vl_data_inicio=implode("-",array_reverse(explode("/",$vl_data_inicio)));

// Insert no banco

$sql=("INSERT INTO eventos (NM_nome_evento,LC_local_evento,DT_data,HR_hora_inicio,HR_hora_fim,EC_responsavel,TP_tipo_evento)
							VALUES
							('$vl_nome','$vl_local','$vl_data_inicio','$vl_hora_inicio','$vl_hora_fim','$vl_evento_responsavel','$vl_evento_tipo')");

mysql_query($sql) or die (mysql_error());

	echo "<script>	
	alert('Evento Cadastrado');
	</script>";
	
	echo"<meta http-equiv='refresh' content='1; href=../../../../cadastro-evento.php'>";





?>