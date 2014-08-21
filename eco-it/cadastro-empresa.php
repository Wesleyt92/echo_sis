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
        <title>ECO IT - Tela de cadastro do empresas</title>    		
		<!-- CSS -->
		<link rel="stylesheet" href="ativos/folha-de-estilos/estilos.css">
        <link rel="stylesheet/less" href="ativos/folha-de-estilos/estilos.less">       
        <!-- LESS -->
        <script src="ativos/javascripts/less.js"></script>
		
		<link rel="stylesheet" href="css/boot/bootstrap.css"/>
		<link rel="stylesheet" href="css/boot/bootstrap-combobox.css"/>
		<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src = "js/boot/bootstrap.js"></script>
		<script src="js/boot/bootstrap-combobox.js"></script>
		<script src="js/boot/jasnybootstrap.js"></script>
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
				<span class="usuario-nome">Nome:<?php while($registro=mysql_fetch_assoc($y)){echo $registro['nm_nome'];} ?></span>
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
						<h2>Cadastro de empresa</h2>
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
						<li><a class="ativo" href="cadastro-empresa.php"><div class="icone mais"></div> Empresa</a></li>
						<li><a href="cadastro-usuario.php"><div class="icone mais"></div> Usuário</a></li>
					</ul>
				</menu>	
				<section class="sessao-cadastro">
					<form name="form-cad-empresa" METHOD="POST" action="php/empresas/cadastrando_empresa.php">
					<span class="titulo">Nova empresa</span>
					<input class="campo-cadastro" type="text" name="empresa-nome" placeholder="Nome" required/>
					<input class="campo-cadastro" type="text" name="empresa-telefone" placeholder="Telefone" data-mask="(99)9999-9999" required/>
					<input class="campo-cadastro" type="text" name="empresa-endereco" placeholder="Endereço" required/>
					<input class="campo-cadastro" type="text" name="empresa-email" placeholder="Email" required/>
					<input class="campo-cadastro" type="text" name="empresa-cnpj" placeholder="CNPJ da Empresa" data-mask="99999999/9999-99" required/>
					<span class="checkbox-cadastro">Quer ser ponto de coleta? <input type="checkbox" value="1"  name="empresa-op-coleta[]" id="empresa-op-coleta[]" /></span>
					<button class="botao-cadastrar">Cadastrar</button>
					</form>
				<a data-toggle="modal" data-target="#myModal">execute</a>
				
				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Editar Cadastro da Empresa</h4>
					  </div>
					  <div class="modal-body">
						<iframe src="lista-evento.php">
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
						<button type="button" class="btn btn-primary">Salvar</button>
					  </div>
					</div>
				  </div>
				</div>
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