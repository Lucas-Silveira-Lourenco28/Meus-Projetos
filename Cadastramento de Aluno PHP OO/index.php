<?php 

include_once "Conexão_banco/db_connect.php";

Class Aluno{
	Private $connect;
	Private $id;
	Private $nome;
	Private $sobrenome;
	Private $email;
	Private $idade;
	Private $cpf;
	Private $rua;
	Private $bairro;
	Private $numero;


	public function __construct($conexao, $nome, $sobrenome, $email, $idade, $cpf, $rua, $bairro, $numero) {
		$this->connect = $conexao;
		$this->nome = $nome;
		$this->sobrenome = $sobrenome;
		$this->email = $email;
		$this->idade = $idade;
		$this->cpf = $cpf;
		$this->rua = $rua;
		$this->bairro = $bairro;
		$this->numero = $numero;
	}


	public function store() {

		$sql = "INSERT INTO alunos (nome, sobrenome, email, idade, cpf, rua, bairro, numero) VALUES ('$this->nome', '$this->sobrenome', '$this->email', '$this->idade', '$this->cpf', '$this->rua', '$this->bairro', '$this->numero' )";

		return mysqli_query($this->connect, $sql);

	}

	public function update($id) {
		$sql = "UPDATE alunos SET nome= '$this->nome', sobrenome= '$this->sobrenome', email= '$this->email', idade= '$this->idade', cpf= '$this->cpf', rua= '$this->rua', bairro= '$this->bairro', numero= '$this->numero' WHERE id='$id'";

		return mysqli_query($this->connect, $sql);
	}

	public function delete($id){
		$sql = "DELETE FROM alunos WHERE id= '$id'";

		return mysqli_query($this->connect, $sql);
	}

};
$conexao = mysqli_connect("localhost", "root", "", "alunos1");
$Aluno = new Aluno($conexao, 'Carlos', 'Lourenço', 'lucas@gmail.com', '34', '654.984.566.32', 'Neto siqueira', 'Vila mariana','20');
$Aluno->update(5);

echo var_dump();
