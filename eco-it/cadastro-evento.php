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
        <title>ECO IT - Tela de cadastro de eventos</title>    		
		<!-- CSS -->
		<link rel="stylesheet" href="ativos/folha-de-estilos/estilos.css">
        <link rel="stylesheet/less" href="ativos/folha-de-estilos/estilos.less">     
		<link rel="stylesheet" href="css/bootstrap.css"/>
		<link rel="stylesheet" href="css/diajax.css"/>
        <!-- LESS -->
        <script src="ativos/javascripts/less.js"></script>
		
		<!--JAVASCRIPT-->
		
		<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src = "js/bootstrap.js"></script>
		<script src="js/bootstrap-combobox.js"></script>
		<script src="js/jasnybootstrap.js"></script>
		<script type="text/javascript" src="ajax/funcs.js"></script>
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
						<h2>Cadastro de evento</h2>
					</div> <!-- /sessao-titulo-->
					<div class="sessao-busca">
						<span><input class="campo-pesquisa" type="text" name="pesquisa" placeholder="Insira a sua pesquisa aqui" /> <button class="botao-buscar">Buscar</button></span>
					</div> <!-- /sessao-busca-->
				</div> <!-- /sessao-topo-->
				<menu class="sessao-navegacao">
					<span class="titulo">Novo</span>
					<ul>
						<li><a class="ativo" href="cadastro-evento.php"><div class="icone mais"></div> Evento</a></li>
						<li><a href="cadastro-participante.php"><div class="icone mais"></div> Participante</a></li>
						<li><a href="cadastro-empresa.php"><div class="icone mais"></div> Empresa</a></li>
						<li><a href="cadastro-usuario.php"><div class="icone mais"></div> Usuário</a></li>
					</ul>
				</menu>	
				<section class="sessao-cadastro">
					
					<span class="titulo">Novo evento</span>
					  <form method="POST" action="php/eventos/cadastrando_evento.php" name="form_cad_evento">
					  
							
								
							<input class="campo-cadastro" type="text" name="evento-nome" placeholder="Nome do evento" required/>
							<input class="campo-cadastro" type="text" name="evento-local" placeholder="Local" required/>
								
							
							<div id="campo_evento-data-inicio" class="info"></div>
							<input class="campo-cadastro" type="text" id="evento-data-inicio" name="evento-data-inicio" data-mask="99/99/9999" placeholder="Data de ínicio" onblur="validarDados('evento-data-inicio', document.getElementById('evento-data-inicio').value);" required/>
							
							
							
							
							<div id="campo_evento-hora-inicio" class="info"></div>
							<input class="campo-cadastro" type="text" name="evento-hora-inicio" data-mask="99:99:99" id="evento-hora-inicio" placeholder="Hora de inicio" onblur="validarDados('evento-hora-inicio', document.getElementById('evento-hora-inicio').value);" required/>
							
							
							
							<input class="campo-cadastro" type="text" name="evento-hora-termino" data-mask="99:99:99" placeholder="Hora Término" required/>
							
							
							
							<input class="campo-cadastro" type="text" name="evento-responsavel" placeholder="Responsável" required/>
							
							
							
							<input class="campo-cadastro" type="text" name="evento-tipo" placeholder="Tipo de evento" required/>
							
							
							
							
							
							
							<button class="botao-cadastrar">Cadastrar</button>
					
						</form>
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