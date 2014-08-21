<?php
header('Content-Type: text/html; charset=UTF-8');
require 'class.phpmailer.php'; 
/*Recuperamos as informações do formulario */
$nome = "ECHO IT";
$email = $_POST['emailparticipante']; ;
$assunto = $_POST["assunto"];
$mensagem = $_POST["msg"];

foreach($email as $v){ 


//incluimos a classe pronta de email

$mail = new PHPMailer(); 
$mail->PluginDir = './PHPMailer_5.2.0'; 
$mail->IsSMTP(); 
//porta de entrada e saida
$mail->Port = 465; 
//configuração para conta gmail
$mail->Host = 'smtp.gmail.com'; 
$mail->IsHTML(true); 
$mail->Mailer = 'smtp'; 
$mail->SMTPSecure = 'ssl'; 

$mail->SMTPAuth = true; 
//aqui vai seu email do gmail, entre as aspas duplas
$mail->Username = "eventos.ecoit@gmail.com"; 
//sua senha entre as apas duplas
$mail->Password = "ecoitunimonte2014"; 

$mail->SingleTo = true; 

$mail->From = "eventos.ecoit@gmail.com"; 
$mail->FromName = $nome; 

$mail->addAddress($v); 
$headers .= 'Content-Type: text/HTML; charset=UTF-8' . "\r\n";
$mail->Subject = $assunto; 
$mail->Body = $mensagem;
$mail->AddBcc=('eventos.ecoit@gmail.com'); // Cópia Oculta

echo '<script>	
	alert("voluntario Cadastrado");
	</script>';
if(!$mail->Send()){
//se nao enviar, imprimira a mensagem de erro
echo "Message was not sent <br />PHP Mailer Error: " . $mail->ErrorInfo; 

}else{
//se enviar, dispara a auto resposta, basicamente as mesmas configurações logo acima
$mail = new PHPMailer(); 
$mail->PluginDir = './PHPMailer_5.2.0'; 
$mail->IsSMTP(); 
$mail->Port = 465; 
$mail->Host = 'smtp.gmail.com'; 
$mail->IsHTML(true); 
$mail->Mailer = 'smtp'; 
$mail->SMTPSecure = 'ssl'; 

$mail->SMTPAuth = true; 
$mail->Username = ""; 
$mail->Password = ""; 

$mail->SingleTo = true;

$mail->From = $email; 
$mail->FromName = 'ECHO IT Desenvolvimento Web'; 

$mail->addAddress($email); 
$headers .= 'Content-Type: text/HTML; charset=UTF-8' . "\r\n";
$mail->Subject = $assunto; 
//mensagem de retorno
$mail->Body ='Ola, Obrigado por entrar em contato, em breve responderemos <br/> Eco IT Web';

$mail->Send();

echo "Message has been sent"; 
//se tudo certo manda para o arquivo de sucesso



} 




header("Location:../mensageiro.php");

}
?>