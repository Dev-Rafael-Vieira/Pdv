<?php 

session_start();

$cliente = $_POST['cliente'];
$idpedido = $_POST['idpedido'];
$data = date('d/m/Y');

$total = 0;
 
include_once "conexao.php";
 

	$tab_cliente = "SELECT * FROM pedido WHERE  idmesa LIKE 'delivery' AND idpedido LIKE '$idpedido'";

	$pedido = mysqli_query($conn, $tab_cliente) or die(mysqli_error($conn));

	while($rows_clientes = mysqli_fetch_assoc($pedido)){

		$produto=$rows_clientes['produto'];

	    $quantidade=$rows_clientes['quantidade'];
	    $valor=$rows_clientes['valor'];

	    $subtotal = $valor * $quantidade;
	    $total+=$subtotal;
	} 

	$total = number_format($total, 2);

	$tab_produto = "SELECT * FROM produtos WHERE nome LIKE '$produto' AND preco_venda LIKE '$valor'";
	$estoque = mysqli_query($conn, $tab_produto) or die(mysqli_error($conn));

	while ($row_produto = mysqli_fetch_assoc($estoque)) {
		if($row_produto['estoque_atual'] > 0){

			$id = $row_produto['id'];
			$atualiza_estoque = $row_produto['estoque_atual'] - $quantidade;
			
			$insert_table = "UPDATE produtos SET estoque_atual = '$atualiza_estoque' WHERE id LIKE '$id'";
			$grava_atualização = mysqli_query($conn, $insert_table) or die(mysqli_error($conn));
		}
	}

	$insert_table = "INSERT INTO vendas (valor, cliente, rendimento, data) VALUES ('$total', '$cliente', 'Delivery', '$data')";
	$adiciona_pedido = mysqli_query($conn, $insert_table);


	$exclude_table = "DELETE FROM pedido WHERE idpedido = '$idpedido'";	
	$pedido_excluido = mysqli_query($conn, $exclude_table);

	$_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Entrega confirmada com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

	header("Location: http://localhost/pdv/?view=pedidos_delivery");
?>