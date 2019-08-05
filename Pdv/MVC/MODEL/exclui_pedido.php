<?php
session_start();

include_once 'conexao.php';

$id = $_POST['pedido'];
$mesa = $_POST['mesa'];



$exclude_table = "DELETE FROM pedido WHERE idpedido = '$id'";	
$produto_excluido = mysqli_query($conn, $exclude_table);

	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Pdv/?view=Dashboard1'>";
		$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Pedido da mesa $mesa excluido com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

$conn->close();

?>