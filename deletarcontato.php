<?php 
	include 'conexao.php';

	$cod = $_POST['deletar'];
		
	$comando = "DELETE FROM  contatos WHERE cod =" .$cod;
	$query = mysqli_query($link, $comando) or die (mysqli_error($link));
	
	if($query){
		$msg = "Deletado com sucesso!";
		echo $msg;
	}else{
		$msg = "Erro ao deletar!";
		echo $msg;
	}
	
	mysqli_close($link);
	
	//redirecionar pagina
	echo "<br> Aguarde...";
	echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=index.php'>";
?>
