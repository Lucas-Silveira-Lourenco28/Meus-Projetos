<?php
//Iniciando Sessão
session_start();

//Conexão com o banco de dados e o arquivo "db_connect.php"
require_once "db_connect.php";

if(isset($_POST['btn-atualizar'])):
	// Pegando os dados do aluno cadastrado através da super global Post é passando para uma varíavel, já aproveitando para filtrar os dados para usar em uma SQL.
	$nome = mysqli_escape_string($connect, $_POST['nome']);
	$cpf = mysqli_escape_string($connect, $_POST['cpf']);
	$estado = mysqli_escape_string($connect, $_POST['estado']);
	$cidade = mysqli_escape_string($connect, $_POST['cidade']);
	$rua = mysqli_escape_string($connect, $_POST['rua']);
	$numero = mysqli_escape_string($connect, $_POST['numero']);
	$complemento = mysqli_escape_string($connect, $_POST['complemento']);
	$cep = mysqli_escape_string($connect, $_POST['cep']);
	$id = mysqli_escape_string($connect, $_POST['id']);

	// Verificando se existe o cpf cadastrado
	$sql = "SELECT id FROM alunos WHERE cpf = '$cpf' AND id != '$id'";
	$resultado = mysqli_query($connect, $sql);

	if ($resultado->num_rows > 0):
    	// Já existe esse cpf cadastrado
    	echo "JÁ EXISTE ESSE CPF CADASTRADO";
	
	else:
		$sql = "UPDATE alunos SET nome = '$nome', cpf = '$cpf', estado = '$estado', cidade = '$cidade', rua = '$rua', numero = '$numero', complemento = '$complemento', cep = '$cep' WHERE id = '$id'";
		if(mysqli_query($connect, $sql)):
			$_SESSION['mensagem'] = "Atualizado com Sucesso";
			header('Location: ../index.php');
		else:
			$_SESSION['mensagem'] = "Erro ao Atualizar";
			header('Location: ../index.php');
		endif;
	endif;
endif;