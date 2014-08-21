<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>

<?php
$host="localhost";
$user="root";
$pass="";
$banco="ecoit";
$conexao= mysql_connect($host,$user,$pass) or die(mysql_error());

mysql_select_db($banco,$conexao) or die(mysql_error());

?>
</body>
</html>