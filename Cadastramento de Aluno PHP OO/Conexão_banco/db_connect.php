<?php
// Aqui vamos fazer a conexão com o banco de dados 
$servername = 'localhost';
$username = 'root';
$password = '';
$db_name = 'alunos1';


$connect = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()):
	echo "Houve algum erro na conexão com o banco de dados";
endif;