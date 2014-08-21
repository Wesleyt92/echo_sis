<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ECO IT - Login</title>    		
		<!-- CSS -->
		<link rel="stylesheet" href="ativos/folha-de-estilos/estilos.css">
        <link rel="stylesheet/less" href="ativos/folha-de-estilos/estilos.less">
        <!-- LESS -->
        <script src="ativos/javascripts/less.js"></script>
    </head>
    <body>	
		<div class="wrap">
			<form class="form-entrada" role="form"  method="POST" action="php/userautentication.php">
    			<h2 class="titulo">Login</h2>
			    <input class="campo-entrada-email" type="text" autofocus="" required="" placeholder="Email" name="email"></input>
			    <input class="campo-entrada-senha" type="password" required="" placeholder="Senha" name="senha"></input>
    			<button class="botao-acessar" type="submit"><div class="icone porta-entrada"></div> Acessar</button>
			</form>		
		</div> <!-- /wrap-->
		
		<!-- jQuery -->
		<script src="ativos/javascripts/jquery.js">//jquery-1.9.1.min</script>
		<script src="ativos/javascripts/tabela.js"></script>
   </body>
</html>