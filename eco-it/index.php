
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
        <title>ECO IT - Tela de mensageiro do sistema</title>    		
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
					<span class="logo">SISCAMI Web-System</span>
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
						<li><a class="ativo" href="index.php"><div class="icone envelope"></div> Mensageiro</a></li>
						<li><a href="cadastro-evento.php"><div class="icone mais"></div> Cadastrar</a></li>
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
						<h2>Mensageiro</h2>
					</div> <!-- /sessao-titulo-->
					<div class="sessao-busca">
						<span><input class="campo-pesquisa" type="text" placeholder="Insira a sua pesquisa aqui" /> <button class="botao-buscar">Buscar</button></span>
					</div> <!-- /sessao-busca-->
				</div> <!-- /sessao-topo-->
				<section class="sessao-mensagem">
					<span class="titulo">Nova mensagem</span>
					<input class="campo-mensagem" type="text" placeholder="Assunto" />
					<textarea class="campo-mensagem" placeholder="Mensagem" /></textarea>
					<input type="submit" class="botao-enviar" value="Enviar" />
				</section>
			</section>
			<footer class="rodape">
				<p>&copy; ECO-IT 2014</p>
			</footer>		
		</div> <!-- /wrap-->
		
		<!-- jQuery -->
		<script src="ativos/javascripts/jquery.js">//jquery-1.9.1.min</script>
		<script src="ativos/javascripts/tabela.js"></script>
				<script type="text/javascript"/>
   </body>
</html>