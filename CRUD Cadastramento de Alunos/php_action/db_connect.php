<?php
// Esse arquivo ficará responsavel pela a conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "alunos";

$connect = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()):
	echo "Houve algum Erro na conexão".mysqli_connect_error();
endif;