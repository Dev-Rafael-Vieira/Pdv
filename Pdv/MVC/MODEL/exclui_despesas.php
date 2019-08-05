<?php
session_start();

include_once "conexao.php";

$id = $_POST['id'];

	$exclude_table = "DELETE FROM despesas WHERE id = '$id'";	
	$produto_excluido = mysqli_query($conn, $exclude_table);
?>



<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> 

	<?php

	if(mysqli_affected_rows($conn)!=-1){

		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Pdv/?view=financeiro'>";
		$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Despesa Excluida com Sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	}else{

		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Pdv/?view=financeiro'>";	
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao excluir Despesa <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	}?>

		
	</body>
</html>
<?php $conn->close(); ?>