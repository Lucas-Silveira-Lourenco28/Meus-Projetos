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
			<h3 class="blue-text">Cadastrando Novo Aluno</h3>
			<form action="php_action/create.php" method="POST">
				<div class="input-field col s12">
					<input type="text" name="nome" id="nome" required>
					<label for="nome">Nome</label>
				</div>

				<div class="input-field col s12">
					<input type="text" name="cpf" id="cpf" required>
					<label for="cpf">CPF</label>
				</div>

				<div class="input-field col s12">
					<input type="text" name="estado" id="estado" required>
					<label for="estado">Estado</label>
				</div>

				<div class="input-field col s12">
					<input type="text" name="cidade" id="cidade" required>
					<label for="cidade">Cidade</label>
				</div>

				<div class="input-field col s12">
					<input type="text" name="rua" id="rua" required>
					<label for="rua">Rua</label>
				</div>

				<div class="input-field col s12">
					<input type="number" name="numero" id="numero" required>
					<label for="numero">Número</label>
				</div>

				<div class="input-field col s12">
					<input type="text" name="complemento" id="complemento" required>
					<label for="complemento">Complemento</label>
				</div>

				<div class="input-field col s12">
					<input type="text" name="cep" id="cep" required>
					<label for="cep">CEP</label>
				</div>


				<button type="submit" name="btn-cadastrar" class="btn">Cadastrar</button>
				<a href="index.php" class="btn orange">Lista de Alunos</a>
			</form>
		</div>
	</div>







 	<!--JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script></script>

    <script>
         M.AutoInit();
    </script>
</body>
</html>