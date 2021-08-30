<?php
//Sessão
session_start();
// conexão
require_once 'db_connect.php';
//Clear
function clear($input){
	global $connect;
	//
	$var = mysqli_escape_string($connect, $input);
	//xss
	$var = htmlspecialchars($var);
	return $var;
}

if(isset($_POST['btn-cadastrar'])):
	$nome= clear($_POST['nome']);
	$sobrenome= clear($_POST['sobrenome']);
	$email= clear($_POST['email']);
	$idade= clear($_POST['idade']);
    if($idade>=1):
	$sql ="INSERT INTO clientes (nome, sobrenome, email, idade) VALUES('$nome', '$sobrenome', '$email', '$idade') ";
endif;
   
	   	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem']= "Cadastrado com sucesso!";
		header('Location: ../index.php');
	else:
		$_SESSION['mensagem']= "Erro ao cadastrar";
		header('Location: ../index.php');
	endif;

	endif;

