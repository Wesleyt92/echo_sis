<html>
		<head>
			<title>Formulario de contato</title>
		</head>
<body>
			<form name='dados' action='email.php'  method='POST'>
			
			<fieldset>
				<legend>Digite seus dados</legend>
				
				<label for='name'>Nome  </label>						
				<input type="text" name="nome"  id="name" />
				
				<label for='assunto'>Assunto</label>						
				<input type="text" name="assunto"  id="assunto" />
				
				<label for='email'>Email</label>						
				<input type="text" name="email"  id="email" />				
				
				<label for='msg'>Mensagem </label>				
				<textarea id="msg" name="msg" rows="4" cols="50"></textarea>
				
				
				<input type="submit" name="confirmar" title="Enviar" value="Enviar">
			</fieldset>	
			</form>	
</body>
</html>