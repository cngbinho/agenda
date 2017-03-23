<html>
<head>
<title>Agenda</title>
<script language="javascript" type="text/javascript">
	function validarEditar() {
		var campo = editarcontato.editar.value;
		//var email = form1.email.value;
		//var senha = form1.senha.value;
		//var rep_senha = form1.rep_senha.value;
		 
		if (campo == "") {
		alert('Digite o codigo do contato a ser editado.');
		editarcontato.editar.focus();
		return false;
		}
	}

	function validarDeletar() {
		var campo = deletar.deletar.value;
		//var email = form1.email.value;
		//var senha = form1.senha.value;
		//var rep_senha = form1.rep_senha.value;
		 
		if (campo == "") {
		alert('Digite o codigo do contato a ser apagado.');
		deletar.deletar.focus();
		return false;
		}
	}
</script>
</head>
<body>
	<h1>Agenda Incipit</h1>
	
	<?php if (empty($_POST['pesquisar'])){
		$_POST['pesquisar'] = "";
	}?>
	
	<form method="post" action="index.php">
		<table>
				<tr>
					<td><input id="pesquisar" name="pesquisar" type="text" placeholder="Digite o nome ou parte do nome." /></td>
					<td><input id="btnpesquisar" name="btnpesquisar" type="submit" value="Pesquisar" /></td>
				</tr>
			</table>
		</form>
		
    <?php
	include 'conexao.php';
	
	$nome = $_POST['pesquisar'];
		
	$comando = "SELECT * FROM contatos WHERE nome LIKE  '%".$nome."%'" ;
	$query = mysqli_query($link, $comando) or die (mysqli_error($link));
	echo "<table>
			<tr>
				<td><b>Codigo:     </b></td>
				<td><b>Nome:     </b></td>
				<td><b>Telefone: </b></td>
				<td><b>E-mail:   </b></td>
		  	</tr>";	
	while ($resultado = mysqli_fetch_array($query)){
		
		echo "<tr>";
		echo "<td>".$resultado['cod']."</td>";
		echo "<td>".$resultado['nome']."</td>";
		echo "<td>".$resultado['telefone']."</td>";
		echo "<td>".$resultado['email']."</td>";
		echo "</tr>";
	}
	echo "</table>";
	mysqli_close($link); 
	?>
	<br>
	<br>
	<form method="post" action="formulario.html">
		<table>
			<tr>
				<th colspan=2 >Deseja adicionar um novo contato?</th>
			</tr>
			<tr>
				<td><input id="btnnovo" name="btnnovo" type="submit" value="Novo Contato" /></td>
			</tr>
		</table>
	</form>
	<br>
	<br>
	<form name="editarcontato" method="post" action="editarcontato.php">
		<table>
			<tr>
				<th colspan=2 >Deseja editar um contato?</th>
			</tr>
			<tr>
				<th colspan=2 >Digite o codigo do contato a ser editado.</th>
			</tr>
			<tr>
				<td><input id="editar" name="editar" type="text" placeholder="Codigo do contato" /></td>
				<td><input id="btneditar" name="btneditar" type="submit" value="Editar Contato" onclick="return validarEditar()"/></td>
			</tr>
		</table>
	</form>
	<br>
	<br>
	<form name="deletar" method="post" action="deletarcontato.php">
		<table>
			<tr>
				<th colspan=2 >Deseja apagar um contato?</th>
			</tr>
			<tr>
				<th colspan=2 >Digite o codigo do contato a ser apagado.</th>
			</tr>
			<tr>
				<td><input  id="deletar" name="deletar" type="text" placeholder="Codigo do contato." /></td>
				<td><input id="btndeletar" name="btndeletar" type="submit" value="Deletar Contato" onclick="return validarDeletar()"/></td>
			</tr>
		</table>
	</form>
</body>
</html>