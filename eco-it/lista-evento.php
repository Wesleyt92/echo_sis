
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
        <title>ECO IT - Tela de Eventos </title>   
		
		<link rel="stylesheet" href="css/boot/bootstrap.css"/>
		<link rel="stylesheet" href="css/boot/bootstrap-combobox.css"/>
		<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src = "js/boot/bootstrap.js"></script>
		<script src="js/boot/bootstrap-combobox.js"></script>
		<script src="js/boot/jasnybootstrap.js"></script>
		<!-- CSS -->
		<link rel="stylesheet" href="ativos/folha-de-estilos/estilos.css">
        <link rel="stylesheet/less" href="ativos/folha-de-estilos/estilos.less"> 
		
			
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
						<li><a href="cadastro-evento.php"><div class="icone mais"></div> Cadastrar</a></li>
						<li><a class="ativo" href="lista-evento.php"><div class="icone lista"></div> Eventos</a></li>
						<li><a href="lista-participante.php"><div class="icone lista"></div> Participantes</a></li>
						<li><a href="lista-empresa.php"><div class="icone lista"></div> Empresas</a></li>
						<li><a href="lista-usuario.php"><div class="icone lista"></div> Usuários</a></li>
					</ul>
				</nav>	
			</aside>

			<section class="sessao">
				<div class="sessao-topo">
					<div class="sessao-titulo">
						<h2>Eventos cadastrados</h2>
					</div> <!-- /sessao-titulo-->
					<div class="sessao-busca">
						<span><input class="campo-pesquisa" type="text" placeholder="Insira a sua pesquisa aqui" /> <button class="botao-buscar">Buscar</button></span>
					</div> <!-- /sessao-busca-->
				</div> <!-- /sessao-topo-->
				<section class="sessao-lista">
				
				<?php

				echo'<table>';
				
				echo'<thead>
						
						
					<tr>
						<th>Nome</th>
						<th>Local</th>
						<th>Data do evento</th>
						<th>Horario de inicio</th>
						<th> Nº Voluntarios</th>
						<th></th>
						<th></th>
					</tr>
				</thead>';
				
				$y="SELECT * FROM eventos";
				
				$consulta=mysql_query($y);
				
				while($registro=mysql_fetch_assoc($consulta)){
					
					
					echo'<tr>';
						
					echo'	<td>'.$registro['NM_nome_evento'].'</td>';
					echo'	<td>'.$registro['LC_local_evento'].'</td>';
					echo'	<td>'.$registro['DT_data'].'</td>';
					echo'	<td>'.$registro['HR_hora_inicio'].'</td>';
					echo'   <td> <a  data-toggle="modal" data-target="#myModal" href="exevl.php?id='.$registro['ID'].'"" > Exibir </a> </th>';
					echo'   <td> <a href="exevl.php?id='.$registro['ID'].'"" > Alterar </a> </th>';
					
					
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
		
		<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Dados do Evento</h4>
					  </div>
					  <div class="modal-body">
						
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
						<button type="button" class="btn btn-primary">Salvar</button>
					  </div>
					</div>
				  </div>
				</div>
   </body>
</html>