
<?php
include"../php/config.php";
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

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ECO IT - Painel do Participante</title>    		
		<!-- CSS -->

        <link href="../ativos/folha-de-estilos/estilos.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet/less" href="../ativos/folha-de-estilos/estilos.less">
		<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
        <!-- LESS -->
        <script src="../ativos/javascripts/less.js"></script>
    </head>
    <body>
    	<div class="topo">
    		<div class="wrap">
				<header class="header">
					<span class="logo">SISCAMI Web-System</span>
					<button class="botao-sair" onclick="location.href='../php/logout.php';" ><div class="icone porta-saida"></div> Logout</button>
					
				</header>	
			</div> <!-- /wrap-->
		</div> <!-- /top-->		
		<div class="wrap">
			<aside class="barra-lateral">
				<div class="usuario-foto"></div>
				<span class="linha usuario-nome">Nome:<?php while($registro=mysql_fetch_assoc($y)){echo $registro['nm_nome'];} ?></span>
				<nav class="menu">	
					<ul>
						<li><a class="ativo" href="index.php"><div class="icone envelope"></div> Painel</a></li>
						<li><a href="cadastro/visualizar_cadastrophp.php"><div class="icone mais"></div> Dados Cadastrais</a></li>
						<li><a href="eventos/lista-eventos.php"><div class="icone lista"></div> Eventos</a></li>
						<li><a href="configuracao/config-participante.php"><div class="icone lista"></div>Configurações</a></li>
					</ul>
				</nav>
			</aside>

			<section class="sessao">
				<div class="sessao-topo">
					<div class="sessao-titulo">
						<h2>Painel</h2>
					</div> <!-- /sessao-titulo-->
					<div class="sessao-busca">
						<span><input class="campo-pesquisa" type="text" placeholder="Insira a sua pesquisa aqui" /> <button class="botao-buscar">Buscar</button></span>
					</div> <!-- /sessao-busca-->
				</div> <!-- /sessao-topo-->
				<section class="sessao-mensagem">
					<span class="titulo">Meus eventos</span>
					<?php
					echo'<table class="table table-bordered">';
				
				echo
				'<thead>
						
						
					<tr>
						<th>Nome</th>
						<th>Local</th>
						<th>Data do evento</th>
						<th>Horario de inicio</th>
						
						
					</tr>
				</thead>';
                    $y="SELECT * FROM eventos_participante WHERE ID_participante='$id' and status_participacao=1";
				
				$consulta=mysql_query($y);
				
				
				
				
				while($registro=mysql_fetch_assoc($consulta)){
					$idevent=$registro['ID_evento'];
					
					$nquery=mysql_query("SELECT * FROM eventos WHERE ID='$idevent'");
					$novosdados=mysql_fetch_assoc($nquery);
					
					echo'<tr>';
						echo'	<td>'.$novosdados['NM_nome_evento'].'</td>';
						echo'	<td>'.$novosdados['LC_local_evento'].'</td>';
						echo'	<td>'.$novosdados['DT_data'].'</td>';
						echo'	<td>'.$novosdados['HR_hora_inicio'].'</td>';
					
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
		<script src="ativos/javascripts/jquery.js">//jquery-1.9.1.min</script>
		<script src="ativos/javascripts/tabela.js"></script>
				<script type="text/javascript"/>
   </body>
</html>