<?php
//Verificando se existe a sessão mensagem
session_start();
if(isset($_SESSION['mensagem'])): ?>
	<!-- Trabalhando no estilo da mensagem com javascript e php -->
 	<script>
 		// onload: carrega a função, depois que toda a pagina for carregada
	window.onload = function(){
		M.toast({html: '<?php echo $_SESSION['mensagem']; ?>'})
	};
	</script>
<?php
endif;
session_unset();


//Conexão com o banco de dados
include_once 'php_action/db_connect.php';

?>

<!-- Trabalhando no estilo da mensagem com javascript -->



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de Gerenciamento de Alunos</title>
	<!--Importação Google Icon Font-->
    	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    	<!--Importação materialize.css-->
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
	<div class="row">
		<!-- Definindo a Largura nos celulares e tablets -->
		<div class="col s12 m6 push-m3">
			<h3 class="blue-text">ALUNOS</h3>
			<table class="striped">
				<thead>
					<tr>
						<th>Nome:</th>
						<th>CPF:</th>
          				<th>Estado:</th>
          				<th>Cidade:</th>
          				<th>Rua:</th>
          				<th>Número:</th>
          				<th>Complemento:</th>
          				<th>CEP:</th>
					</tr>
				</thead>


				<tbody>
					<?php
						$sql = "SELECT * FROM alunos";
						$resultado = mysqli_query($connect, $sql);
						if(mysqli_num_rows($resultado) > 0):
						while($dados = mysqli_fetch_array($resultado)):

					?>

					<tr>
						<td><?php echo $dados['nome']; ?></td>
						<td><?php echo $dados['cpf']; ?></td>
						<td><?php echo $dados['estado']; ?></td>
						<td><?php echo $dados['cidade']; ?></td>
						<td><?php echo $dados['rua']; ?></td>
						<td><?php echo $dados['numero']; ?></td>
						<td><?php echo $dados['complemento']; ?></td>
						<td><?php echo $dados['cep']; ?></td>

						<!--Botão de Editar-->
						<td><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating green"><i class="material-icons">edit</i></td>

						<!--Botão de Deletar-->
						<td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></td>
							<!-- Modal Structure -->
  							<div id="modal<?php echo $dados['id']; ?>" class="modal">
    								<div class="modal-content">
						      		<h4 class="red-text">ATENÇÃO!!</h4>
						      		<h6>TEM CERTEZA QUE DESEJA EXCLUIR OS DADOS DESSE ALUNO?</h6>
						    		</div>
						    		<div class="modal-footer">

						      		<form action="php_action/delete.php" method="POST">
						      			<input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
						      			<button type="submit" name="btn-deletar" class="btn red">Sim, quero Deletar</button>

						      			<a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
						      		</form>
						    		</div>
						  	</div>
          
					</tr>
					<?php 
						endwhile;
						else:
					?>
						<tr>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
						</tr>

					<?php endif; ?>
				</tbody>
			</table>
			<br>
			<a href="adicionar.php" class="btn">Adicionar Aluno</a>
		</div>
	</div>







 	<!--JavaScript otimizar-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
         M.AutoInit();
    </script>
</body>
</html>