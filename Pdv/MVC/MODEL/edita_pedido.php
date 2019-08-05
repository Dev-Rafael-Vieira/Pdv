<?php
	
	session_start();

	include_once 'conexao.php';

	$id = mysqli_real_escape_string($conn, $_POST['id']);

	$idpedido = mysqli_real_escape_string($conn, $_POST['idpedido']);

	$quantidade = mysqli_real_escape_string($conn, $_POST['quantidade']);

	

	$obs = mysqli_real_escape_string($conn, $_POST['obs']);

	$insert_table = "UPDATE pedido SET 
	quantidade = '$quantidade',
	observacao = '$obs'  WHERE 
	idpedido = '$idpedido'";

	$edita_pedido = mysqli_query($conn, $insert_table);

	$conn->close();

	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Pdv/?view=Dashboard1'>";
	$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>O Pedido foi Editado com Sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

	?>
