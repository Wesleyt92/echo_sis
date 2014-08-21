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
        <title>ECO IT - Tela de cadastro de pessoas</title>    		
		<!-- CSS -->
		<link rel="stylesheet" href="ativos/folha-de-estilos/estilos.css">
   		
        <link rel="stylesheet/less" href="ativos/folha-de-estilos/estilos.less">
               
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
					<button class="botao-sair" onclick="location.href='php/logout.php';" ><div class="icone porta-saida"></div> Logout</button>>
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
						<h2>Cadastro de participante</h2>
					</div> <!-- /sessao-titulo-->
					<div class="sessao-busca">
						<span><input class="campo-pesquisa" type="text" name="pesquisa" placeholder="Insira a sua pesquisa aqui" /> <button class="botao-buscar">Buscar</button></span>
					</div> <!-- /sessao-busca-->
				</div> <!-- /sessao-topo-->
				<menu class="sessao-navegacao">
					<span class="titulo">Novo</span>
					<ul>
						<li><a href="cadastro-evento.php"><div class="icone mais"></div> Evento</a></li>
						<li><a class="ativo" href="cadastro-participante.php"><div class="icone mais"></div> Participante</a></li>
						<li><a href="cadastro-empresa.php"><div class="icone mais"></div> Empresa</a></li>
						<li><a href="cadastro-usuario.php"><div class="icone mais"></div> Usuário</a></li>
					</ul>
				</menu>	
				<section class="sessao-cadastro">
				<form name="cadastro-participante" method="POST" action="php/participantes/cadastrar-paricipantes.php" >
					<span class="titulo">Novo participante</span>
					<input class="campo-cadastro" type="text" name="participante-nome" placeholder="Nome" required/>
					<input class="campo-cadastro" type="text" name="participante-sobrenome" placeholder="Sobrenome" required/>
					<input class="campo-cadastro" type="text" name="participante-telefone"  data-mask="(99)9999-9999" placeholder="Telefone" required/>
					<input class="campo-cadastro" type="text" name="participante-data-nascimento" data-mask="99/99/9999" placeholder="Data de Nascimento" required/>
					<input class="campo-cadastro" type="text" name="participante-responsavel" placeholder="Responsável (se for menor)" />
					<input class="campo-cadastro" type="text" name="participante-telefone-responsavel" data-mask="(99)9999-9999" placeholder="Telefone do responsável" />
					<input class="campo-cadastro" type="text" name="participante-email" placeholder="Email" required/>
					
					<select class="campo-cadastro" name="participante-nivel-instrucao" required="required">
										 <option></option>
										 <option value="Cursando o Ensino Médio">Cursando o Ensino Médio </option>
										 <option value="Ensino Médio Completo">Ensino Médio Completo</option>
										 <option value="Ensino Médio Tecnico Completo">Ensino Médio Tecnico Completo</option>
										 <option value="Cursando o Ensino Superior">Cursando o Ensino Superior</option>
										 <option value="Ensino Superior Completo">Ensino Superior Completo</option>
					</select>
					<span class="checkbox-cadastro">Estuda na universidade? <input type="checkbox" name="participante-questuni[]"  id="participante-questuni[]" value="1" ></span>
					<span class="checkbox-cadastro">Tem disponibilidade de horário? <input type="checkbox"  name="participante-quest-hr[]" id="participante-quest-hr[]" value="1" /></span>
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