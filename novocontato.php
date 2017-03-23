<?php

include 'conexao.php';

// Recebe os dados e guarda-os em variáveis
$nome = $_GET['nome'];
$telefone = $_GET['telefone'];
$email = $_GET['email'];

$comando = "INSERT INTO contatos VALUES (null,'" .$nome. "','" .$telefone. "','" .$email. "')";
$query = mysqli_query($link, $comando) or die (mysqli_error($link));

if($query){
	$msg = "Gravado com sucesso!";
	echo $msg;
}else{
	$msg = "Erro ao gravar!";
	echo $msg;
}

mysqli_close($link);

header("Location:index.php");

?>