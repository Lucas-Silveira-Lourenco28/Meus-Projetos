<?php
//Iniciando Sessão
session_start();

//Conexão com o banco de dados e o arquivo "db_connect.php"
require_once "db_connect.php";

if(isset($_POST['btn-deletar'])):
	// Pegando os dados do aluno cadastrado através da super global Post é passando para uma varíavel, já aproveitando para filtrar os dados para usar em uma SQL.
	$id = mysqli_escape_string($connect, $_POST['id']);
	

	$sql = "DELETE FROM alunos WHERE id = '$id'";

	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Deletado com Sucesso";
		header('Location: ../index.php');
	else:
		$_SESSION['mensagem'] = "Erro ao Deletar";
		header('Location: ../index.php');
	endif;
endif;
