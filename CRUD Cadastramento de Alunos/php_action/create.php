<?php
//Iniciando Sessão
session_start();

//Conexão com o banco de dados e o arquivo "db_connect.php"
require_once "db_connect.php";

if(isset($_POST['btn-cadastrar'])):
	// Pegando os dados do aluno cadastrado através da super global Post é passando para uma varíavel, já aproveitando para filtrar os dados para usar em uma SQL.
	$nome = mysqli_escape_string($connect, $_POST['nome']);
	$cpf = mysqli_escape_string($connect, $_POST['cpf']);
	$estado = mysqli_escape_string($connect, $_POST['estado']);
	$cidade = mysqli_escape_string($connect, $_POST['cidade']);
	$rua = mysqli_escape_string($connect, $_POST['rua']);
	$numero = mysqli_escape_string($connect, $_POST['numero']);
	$complemento = mysqli_escape_string($connect, $_POST['complemento']);
	$cep = mysqli_escape_string($connect, $_POST['cep']);
	

	// Verificando se existe o cpf cadastrado
	$sql = "SELECT * FROM alunos WHERE cpf = ?";
	$verificando = $connect->prepare($sql);
	$verificando->bind_param("s", $cpf);
	$verificando->execute();
	$resultado = $verificando->get_result();

	if ($resultado->num_rows > 0):
    	// O cpf já existe na tabela
    	echo "Este cpf já está cadastrado.";
	else:

		$sql = "INSERT INTO alunos (nome, cpf, estado, cidade, rua, numero, complemento, cep) VALUES ('$nome', '$cpf', '$estado', '$cidade', '$rua', '$numero', '$complemento', '$cep')";
	
		if(mysqli_query($connect, $sql)):
			$_SESSION['mensagem'] = "Cadastrado com Sucesso";
			header('Location: ../index.php');
		else:
			$_SESSION['mensagem'] = "Erro ao cadastrar";
			header('Location: ../index.php');
		endif;
	endif;
endif;




