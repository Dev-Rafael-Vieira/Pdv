<?php

session_start();

include_once "conexao.php";

$hora_pedido = date('H:i');
$pedido = $_POST['pedido'];
$preco_venda = $_POST['preco_venda'];
$quantidade = $_POST['quantidade'];
$observacoes = $_POST['observacoes'];
$id_mesa = $_POST['id_mesa'];
$cliente = $_POST['cliente'];


      if($quantidade == '1/2'){
        $quantidade = '0.5';
      }
      if($quantidade == '1/3'){
        $quantidade = '0.333';
      }
      if($quantidade == '1/4'){
        $quantidade = '0.25';
      }


if ($quantidade == '' || $preco_venda == '') {
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Pdv/?view=Dashboard1'>";
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Pedido não efetuado ! verifique a quantidade e o valor<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
} else{

$insert_table = "INSERT INTO pedido (cliente, idmesa, produto, quantidade, hora_pedido, valor, observacao) VALUES ('$cliente', '$id_mesa', '$pedido', '$quantidade', '$hora_pedido', '$preco_venda', '$observacoes')";
$adiciona_pedido = mysqli_query($conn, $insert_table);

$insert_table = "UPDATE mesas SET status = '2', nome = '$cliente' WHERE id_mesa = $id_mesa";
$adiciona_pedido = mysqli_query($conn, $insert_table);

header("Location: http://localhost/pdv/?view=Dashboard1");

$conn->close();

	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Pdv/?view=Dashboard1'>";
		$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Pedido para $id_mesa cadastrado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

}

?>