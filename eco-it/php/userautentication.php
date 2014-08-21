<?php
include"config.php";
?>



<html>
	<head>
		<title>Autenticando</title>
		<script type="text/javascript">
			function login_nivelum_adm(){
			setTimeout("window.location='../index.php'",200);
			}
			
			function login_niveldois_part(){
			setTimeout("window.location='../participante/index.php'",200);
			}
			function loginfailed(){
				setTimeout("window.location='../login.php'",200);
			}
		</script>
	</head>
		<body>
	
		<?php 
			$email=$_POST['email'];
			$senha=$_POST['senha'];
			$sql = mysql_query("SELECT * FROM  usuarios_sistema WHERE email= '$email' and senha='$senha'") or die(mysql_error());
			$row = mysql_num_rows($sql);
				if($row > 0)
				{
					session_start();
					$_SESSION['email'] = $_POST['email'];
					$_SESSION['senha'] = $_POST['senha'];
					
					
					$rows= mysql_fetch_object($sql);
					
					
					$nivel= $rows->nm_nivel_perfil;
					
					$id_part= $rows->nm_id_participante;
					
					$_SESSION['id_part']=$id_part;
					
					$_SESSION['nivel']=$nivel;
					
					$stsusuaro= $rows->status_perfil;
					
					
					if($stsusuaro>0){
						if($nivel==1)
						{
							echo "<script>	
							alert('Bem vindo Adm !! ');
							</script>";

							echo "<script>login_nivelum_adm()</script>";
						}
						elseif($nivel==2)
						{
							echo "<script>	
							 alert('Bem vindo Participante !! ');
							</script>";
							
							echo "<script>login_niveldois_part()</script>";
					
						}
				
				}else{
						echo"<script>	
						  alert('Usuario Bloqueado - Entre em contato o Administrador !!');
							</script>";
						echo"<script>loginfailed()</script>";
						}
					
					}else{
						echo"<script>	
						  alert('Nome de usuario ou senha invalidos !!');
							</script>";
						echo"<script>loginfailed()</script>";
						}
					
					
						
		?>
		
		
		
		</body>
</html>


