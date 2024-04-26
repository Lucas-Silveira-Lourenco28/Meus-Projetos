<?php
// Conexão com o banco de Dados
include_once "php_action/db_connect.php";

// Verificando se existe o parametro 'id' na url atarvés da superglobal get	
if(isset($_GET['id'])):
	$id = mysqli_escape_string($connect, $_GET['id']);
	$sql = "SELECT * FROM alunos WHERE id = '$id'";
	$resultado = mysqli_query($connect, $sql);
	$dados = mysqli_fetch_array($resultado);
endif;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de Gerenciamento de Alunos</title>
	<!--Importação Google Icon Font-->
    	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    	<!--Importaação materialize.css-->
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
	<div class="row">
		<!-- Definindo a Largura nos celulares e tablets -->
		<div class="col s12 m6 push-m3">
			<h3 class="red-text">Atualizar Dados do Aluno</h3>
			<form action="php_action/update.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $dados['id']; ?>">

				<div class="input-field col s12">
					<input type="text" name="nome" id="nome" value="<?php echo $dados['nome']; ?>" required>
					<label for="nome">Nome</label>
				</div>

				<div class="input-field col s12">
					<input type="text" name="cpf" id="cpf" value="<?php echo $dados['cpf']; ?>" required>
					<label for="cpf">CPF</label>
				</div>

				<div class="input-field col s12">
					<input type="text" name="estado" id="estado" value="<?php echo $dados['estado']; ?>" required>
					<label for="estado">Estado</label>
				</div>

				<div class="input-field col s12">
					<input type="text" name="cidade" id="cidade" value="<?php echo $dados['cidade']; ?>" required>
					<label for="cidade">Cidade</label>
				</div>

				<div class="input-field col s12">
					<input type="text" name="rua" id="rua" value="<?php echo $dados['rua']; ?>" required>
					<label for="rua">Rua</label>
				</div>

				<div class="input-field col s12">
					<input type="number" name="numero" id="numero" value="<?php echo $dados['numero']; ?>" required>
					<label for="numero">Número</label>
				</div>

				<div class="input-field col s12">
					<input type="text" name="complemento" id="complemento" value="<?php echo $dados['complemento']; ?>" required>
					<label for="complemento">Complemento</label>
				</div>

				<div class="input-field col s12">
					<input type="text" name="cep" id="cep" value="<?php echo $dados['cep']; ?>" required>
					<label for="cep">CEP</label>
				</div>


				<button type="submit" name="btn-atualizar" class="btn">Atualizar</button>
				<a href="index.php" class="btn orange">Lista de Clientes</a>
			</form>
		</div>
	</div>


	<!--JavaScript Otimizar o carregamento-->
  	<script 
  		src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> 
    </script>

    <script>
         M.AutoInit();
    </script>
</body>
</html>