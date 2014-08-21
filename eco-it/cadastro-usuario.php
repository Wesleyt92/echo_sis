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
	
	
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ECO IT - Tela de cadastro de usuários</title>    		
		<!-- CSS -->
		<link rel="stylesheet" href="ativos/folha-de-estilos/estilos.css">
        <link rel="stylesheet/less" href="ativos/folha-de-estilos/estilos.less">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">		
        <!-- LESS -->
        <script src="ativos/javascripts/less.js"></script>
    </head>
    <body>
    	<div class="topo">
    		<div class="wrap">
				<header class="header">
					<span class="logo">Web-System</span>
					<button class="botao-sair" onclick="location.href='php/logout.php';" ><div class="icone porta-saida"></div> Logout</button>
				</header>	
			</div> <!-- /wrap-->
		</div> <!-- /top-->
		<div class="wrap">
			<aside class="barra-lateral">
				<div class="usuario-foto"></div>
				<span class="linha usuario-nome">Nome:<?php while($registro=mysql_fetch_assoc($y)){echo $registro['nm_nome'];} ?></span>
				<nav class="menu">	
					<ul>
						<li><a href="index.php"><div class="icone envelope"></div> Mensageiro</a></li>
						<li><a class="ativo" href="cadastro-evento.php"><div class="icone mais"></div> Cadastrar</a></li>
						<li><a href="lista-evento.php"><div class="icone lista"></div> Eventos</a></li>
						<li><a href="lista-participante.php"><div class="icone lista"></div> Participantes</a></li>
						<li><a href="lista-empresa.php"><div class="icone lista"></div> Empresas</a></li>
						<li><a href="lista-usuario.php"><div class="icone lista"></div> Usuários</a></li>
					</ul>
				</nav>		
			</aside>

			<section class="sessao">
				<div class="sessao-topo">
					<div class="sessao-titulo">
						<h2>Cadastro de usuário</h2>
					</div> <!-- /sessao-titulo-->
					<div class="sessao-busca">
						<span><input class="campo-pesquisa" type="text" name="pesquisa" placeholder="Insira a sua pesquisa aqui" /> <button class="botao-buscar">Buscar</button></span>
					</div> <!-- /sessao-busca-->
				</div> <!-- /sessao-topo-->
				<menu class="sessao-navegacao">
					<span class="titulo">Novo</span>
					<ul>
						<li><a href="cadastro-evento.php"><div class="icone mais"></div> Evento</a></li>
						<li><a href="cadastro-participante.php"><div class="icone mais"></div> Participante</a></li>
						<li><a href="cadastro-empresa.php"><div class="icone mais"></div> Empresa</a></li>
						<li><a class="ativo" href="cadastro-usuario.php"><div class="icone mais"></div> Usuário</a></li>
					</ul>
				</menu>	
				<section class="sessao-cadastro">
					<?php
					echo'<table class="table table-bordered">';
				
				echo
				'<thead>
						
						
					<tr>
						<th>Nome</th>
						<th>E-mail</th>
						<th>Status Usuario</th>
						<th>Ação</th>
						
						
					</tr>
				</thead>';
                    $y="SELECT * FROM participantes";
				
				$consulta=mysql_query($y);
				
				
				
				
				while($registro=mysql_fetch_assoc($consulta)){
					
					$idpart=$registro['ID'];
					
					$nquery=mysql_query("SELECT * FROM usuarios_sistema WHERE nm_id_participante='$idpart'");
					$novosdados=mysql_fetch_assoc($nquery);
					
					
					
					
					$stspart=$novosdados['status_perfil'];
					
					
					if($stspart==1){
							$paricipação ="Possui Usuario";
						}else{
							$paricipação ="Não Possui Usuario";
							}
					
					if($stspart==1){
							$status="Bloquear acesso";
						}
						else{
							$status="Desbloquear acesso";
						}
					
					echo'<tr>';
						echo'	<td>'.$registro['part_nome'].'</td>';
						echo'	<td>'.$registro['part_email'].'</td>';
						echo'	<td>'.$paricipação.'</td>';
						echo'  <td><a href="altstatus_usuario.php?id='.$registro['ID'].'"" > '.$status.'</a> </td>';
					
					echo'</tr>';
					
				}
					echo'</table>';
                    ?>
				</section>
			</section>
			<footer class="rodape">
				<p>&copy; ECO-IT 2014</p>
			</footer>		
		</div> <!-- /wrap-->
		
		<!-- jQuery -->
		<script src="ativos/javascripts/jquery.js"></script>
		<script src="ativos/javascripts/tabela.js"></script>
   </body>
</html>