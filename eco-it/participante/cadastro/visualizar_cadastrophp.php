
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
function mascara_string($mascara,$string)
{
   $string = str_replace(" ","",$string);
   for($i=0;$i<strlen($string);$i++)
   {
      $mascara[strpos($mascara,"#")] = $string[$i];
   }
   return $mascara;
}
?>


<?php
	$email=$_SESSION["email"];
	$senha=$_SESSION["senha"];
	$y=mysql_query("SELECT nm_nome FROM  usuarios_sistema WHERE email= '$email' and senha='$senha'")or die(mysql_error());
	$_SESSION['id_part'];
	$_SESSION['nivel'];
	
	$id=$_SESSION['id_part'];
	$queryalt= mysql_query("SELECT * FROM participantes where ID=$id");

			while($linhas= mysql_fetch_array($queryalt))
			
			{
			
	
?>



<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ECO IT - Painel do Participante</title>    		
		<!-- CSS -->

        <link href="../../ativos/folha-de-estilos/estilos.css" rel="stylesheet" type="text/css">
        <link href="../../ativos/folha-de-estilos/estilos.less" rel="stylesheet/less" type="text/css">
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">

        <!-- LESS -->
        <script src="../../ativos/javascripts/less.js"></script>
        
        <!--JAVASCRIPT-->
        <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src = "../../js/bootstrap.js"></script>
		<script src="../../js/bootstrap-combobox.js"></script>
		<script src="../../js/jasnybootstrap.js"></script>
		<script type="text/javascript" src="../../ajax/funcs.js"></script>
    </head>
<body>
    	<div class="topo">
    		<div class="wrap">
				<header class="header">
					<span class="logo">SISCAMI Web-System</span>
					<button class="botao-sair" onclick="location.href='../../php/logout.php';" ><div class="icone porta-saida"></div> Logout</button>
					
				</header>	
			</div> <!-- /wrap-->
		</div> <!-- /top-->		
		<div class="wrap">
			<aside class="barra-lateral">
				<div class="usuario-foto"></div>
				<span class="linha usuario-nome">Nome:<?php while($registro=mysql_fetch_assoc($y)){echo $registro['nm_nome'];} ?></span>
				<nav class="menu">	
					<ul>
						<li><a class="ativo" href="../index.php"><div class="icone envelope"></div> Painel</a></li>
						<li><a href="visualizar_cadastrophp.php"><div class="icone mais"></div> Dados Cadastrais</a></li>
						<li><a href="lista-evento.php"><div class="icone lista"></div> Eventos</a></li>
						<li><a href="lista-participante.php"><div class="icone lista"></div>Configurações</a></li>
					</ul>
				</nav>
			</aside>

			<section class="sessao">
				<div class="sessao-topo">
					<div class="sessao-titulo">
						<h2>Dados Cadastrais</h2>
					</div> <!-- /sessao-titulo-->
					<div class="sessao-busca">
						<span><input class="campo-pesquisa" type="text" placeholder="Insira a sua pesquisa aqui" /> <button class="botao-buscar">Buscar</button></span>
					</div> <!-- /sessao-busca-->
				</div> <!-- /sessao-topo-->
				<section class="sessao-cadastro">
				<form name="cadastro-participante" method="POST" action="alterar_dados_participante.php" >
					<span class="titulo">ECHO ID : <?php echo $id; ?> </span>


                   
					<h6 align="center">Nome</h6>
					<input class="campo-cadastro" type="text" name="participante-nome" value="<?php echo $linhas['part_nome']?>" disabled/> 
                    </br>
                    <h6 align="center">Sobrenome</h6>
					<input class="campo-cadastro" type="text" name="participante-sobrenome"  value="<?php echo $linhas['part_sobrenome']?>"disabled>
					</br>
                    <h6 align="center">Telefone</h6>
					<input class="campo-cadastro" type="text" name="participante-telefone"  data-mask="(99)9999-9999" value="<?php echo $linhas['part_telefone']=mascara_string('(##)####-####',$linhas['part_telefone']);?>" disabled/>
					</br>
                    <h6 align="center">Data de nascimento</h6>
					<input class="campo-cadastro" type="text" name="participante-data-nascimento" data-mask="99/99/9999"  value="<?php echo $linhas['part_data_nasc'] = implode(	'/',array_reverse(explode('-',$linhas['part_data_nasc']))); ?> " disabled>
					</br>
					<h6 align="center">Nome do Responsavel</h6>
					<input class="campo-cadastro" type="text" name="participante-responsavel"  value="<?php echo $linhas['part_respon']?>" disabled/>
					</br>
                    
					<h6 align="center">Telefone do Responsavel</h6>
					<input class="campo-cadastro" type="text" name="participante-telefone-responsavel" data-mask="(99)9999-9999" value="<?php echo $linhas['part_respon_tel']=mascara_string('(##)####-####',$linhas['part_respon_tel']);?>" disabled>
					</br>
                    <h6 align="center">E-mail</h6>
					<input class="campo-cadastro" type="text" name="participante-email" value="<?php echo $linhas['part_email']?>" disabled>
					</br>
                    <h6 align="center">Nivel de instrução</h6>
                    <input class="campo-cadastro" type="text" name="participante-nivel-instrucao" value="<?php echo $linhas['part_nvl_instru']?>" disabled>
					
					</br>					</br>
                    <button class="botao-cadastrar">Alterar dados</button>
                    
                    <?php }?>
				</form>
				</section>
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