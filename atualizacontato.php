<?php 
	include 'conexao.php';
	
	$cod = $_POST['cod'];
	$nome = $_POST['nome'];
	$telefone = $_POST['telefone'];
	$email = $_POST['email'];
	
	$comando = "UPDATE contatos SET nome ='" .$nome. "', telefone =  '".$telefone. "', email =  '".$email. "' WHERE cod =" .$cod;
	$query = mysqli_query($link, $comando) or die (mysqli_error($link));
	
	if($query){
		$msg = "Gravado com sucesso!";
		echo $msg;
	}else{
		$msg = "Erro ao gravar!";
		echo $msg;
	}
	
	mysqli_close($link);
	
	echo "<br> Aguarde...";
	//redirecionar pagina
	echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=index.php'>";
?>