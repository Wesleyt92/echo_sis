<?php
include"../../php/config.php";
?>

<?php
	session_start();
	

	if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])){
		
		header("Location:login.php");
		exit;
	}
?>

<?php
	$email=$_SESSION["email"];
	$senha=$_SESSION["senha"];
	$y=mysql_query("SELECT nm_nome FROM  usuarios_sistema WHERE email= '$email' and senha='$senha'")or die(mysql_error());
	$_SESSION['id_part'];
	$_SESSION['nivel'];
	
	$id=$_SESSION['id_part'];

	
?>


<?php
			$ideve=$_GET['id'];
			
			
	

	$qevxpart=mysql_query("SELECT * FROM eventos_participante WHERE ID_evento='$ideve' AND ID_participante='$id' ") or die(mysql_error());
	$rowss = mysql_num_rows($qevxpart);
				
					$row = mysql_fetch_assoc($qevxpart);
					
					$stspart=$row['status_participacao'];
					$idevexpt=$row['ID_event_parti'];
		// verifica se o usuario ja esta cadastrado no evento e quer desistir 
					if($rowss>0){
						if($stspart==1){
					
						
						$nquery=mysql_query("UPDATE eventos_participante SET status_participacao='0' WHERE ID_event_parti='$idevexpt'")or die(mysql_error());
						
						echo "<script>	
						alert('Dados alterados : Você desistiu do Evento ');
						</script>";
	
						echo"<meta http-equiv='refresh' content='1; url=lista-eventos.php'>";
						
						}else{
						$nquery=mysql_query("UPDATE eventos_participante SET status_participacao='1' WHERE ID_event_parti='$idevexpt'")or die(mysql_error());
						
						echo "<script>	
						alert('Dados alterados : Você foi reintegrado ao Evento');
						</script>";
	
						echo"<meta http-equiv='refresh' content='1; url=lista-eventos.php'>";
							
									
							}
					}else{
								
							$nstatus=1;
							$nquery=mysql_query("INSERT INTO eventos_participante (ID_evento,ID_participante,status_participacao)
							VALUES
							('$ideve','$id','$nstatus')" )or die(mysql_error());
							
							echo "<script>	
							alert('Você foi Cadastrado em um novo Evento !! ');
							</script>";
	
							echo"<meta http-equiv='refresh' content='1; url=lista-eventos.php'>";
							
							}
							
						

					


			
?>			