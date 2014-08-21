<?php
include"../config.php";

$removali = array("(", ")", "-", ".","#","/"); /*Remove as  mascaras */

$vl_nome=$_POST['empresa-nome'];
$vl_emp_end=$_POST['empresa-endereco'];
$vl_emp_tel=str_replace($removali, "",($_POST['empresa-telefone']));
$vl_emp_email=$_POST['empresa-email'];
$vl_emp_cnpj=str_replace($removali, "",($_POST['empresa-cnpj']));

//valida checkbox 

//valida checkbox 

if($_POST && isset ($_POST['empresa-op-coleta'])){
	$ativo=$_POST['empresa-op-coleta'];
	foreach	($ativo as $vl_emp_op_coleta);
	$vl_emp_op_coleta;
   };
   
   


if(isset($vl_emp_op_coleta)){

	$sqlquery=("INSERT INTO empresas (NM_nome,NM_endereco,NM_telefone,NM_email,NM_CNPJ,NM_emp_op_coleta)
				VALUES
				('$vl_nome','$vl_emp_end','$vl_emp_tel','$vl_emp_email','$vl_emp_cnpj','$vl_emp_op_coleta')");

	

	mysql_query($sqlquery) or die (mysql_error());
	echo "<script>	
	alert('Empresa Cadastrada');
	</script>";
	
	echo"<meta http-equiv='refresh' content='1; url=../../cadastro-empresa.php'>";

}else{
		$sqlquery=("INSERT INTO empresas(NM_nome,NM_endereco,NM_telefone,NM_email,NM_CNPJ)
					VALUES
					('$vl_nome','$vl_emp_end','$vl_emp_tel','$vl_emp_email','$vl_emp_cnpj')");

	

		mysql_query($sqlquery) or die (mysql_error());
		echo "<script>	
		alert('Empresa Cadastrada');
		</script>";
	
		echo"<meta http-equiv='refresh' content='1; url=../../cadastro-empresa.php'>";
	}
 
   

?>