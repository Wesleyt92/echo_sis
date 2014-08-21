<?php
include"php/config.php";
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
			
			
	

	$qevxpart=mysql_query("SELECT * FROM usuarios_sistema WHERE nm_id_participante='$ideve'") or die(mysql_error());
	$rowss = mysql_num_rows($qevxpart);
	$row = mysql_fetch_assoc($qevxpart);
				
	$stspart=$row['status_perfil'];
	
	
		// verifica se o usuario ja esta cadastrado no evento e quer desistir 
					if($rowss>0){
						if($stspart==1){
					
						
						$nquery=mysql_query("UPDATE usuarios_sistema SET status_perfil='0' WHERE nm_id_participante='$ideve'")or die(mysql_error());
						
						echo "<script>	
						alert('Dados alterados - Usuario Bloqueado ');
						</script>";
	
						echo"<meta http-equiv='refresh' content='1; url=cadastro-usuario.php'>";
						
						}else{
						$nquery=mysql_query("UPDATE usuarios_sistema SET status_perfil='1' WHERE nm_id_participante='$ideve'")or die(mysql_error());
						
						echo "<script>	
						alert('Dados alterados - Usuario reintegrado ao sistema');
						</script>";
	
						echo"<meta http-equiv='refresh' content='1; url=cadastro-usuario.php'>";
							
									
							}
					}else{
								
							$nstatus=1;
							
							$newusuariosistema=mysql_query("SELECT * FROM participantes WHERE ID = '$ideve'");
							
							$dadosusuario=mysql_fetch_assoc($newusuariosistema);
							
							$email=$dadosusuario['part_email'];
							$nome=$dadosusuario['part_nome'];
							$senha=10452120;
							$nivperfil=2;
							$status_perf=1;
							
							
							$nquery=mysql_query("INSERT INTO usuarios_sistema (email,senha,nm_nome,nm_nivel_perfil,nm_id_participante,status_perfil)
							VALUES
							('$email','$senha','$nome','$nivperfil','$ideve','$status_perf')" )or die(mysql_error());
							
							echo "<script>	
							alert('Novo usuario cadastrado !! ');
							</script>";
	
							echo"<meta http-equiv='refresh' content='1; url=cadastro-usuario.php'>";
							
							}
							
						

					


			
?>			