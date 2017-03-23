<html>
	<head>
		<title>Editar Contato</title>
	</head>
<body>
	<h1>Editar Contato</h1>
	
	<form id="editar" name="editar" method="post" action="atualizacontato.php">
		<table>
		<tr>
				<td><b>Codigo:     </b></td>
				<td><b>Nome:     </b></td>
				<td><b>Telefone: </b></td>
				<td><b>E-mail:   </b></td>
		</tr>	
<?php 
include 'conexao.php';

$cod = $_POST['editar'];
//$cod = 2;

$comando = "SELECT * FROM contatos WHERE cod = ".$cod;
$query = mysqli_query($link, $comando) or die (mysqli_error($link));

while ($resultado = mysqli_fetch_array($query)){

	echo "<tr>";
	echo "<td><input id='cod' name='cod' type='text' value=".$resultado['cod']." /></td>";
	echo "<td><input id='nome' name='nome' type='text' value=".$resultado['nome']." /></td>";
	echo "<td><input id='telefone' name='telefone' type='text' value=".$resultado['telefone']." /></td>";
	echo "<td><input id='email' name='email' type='text' value=".$resultado['email']." /></td>";
	echo "</tr>";
}

mysqli_close($link);
?>
  			<td><input id="btnenviar" name="btnenviar" type="submit" value="Salvar" onClick="validaredicao()"/></td>
			<td><input type="button" value="cancelar" onClick="voltar()" /></td>
  			</tr>
  		</table>
	</form>
</body>
</html>
<script type="text/javascript">
function voltar()
{
location.href=" index.php"
}
</script>


