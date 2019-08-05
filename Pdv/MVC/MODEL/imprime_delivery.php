<header>
	<script type="text/javascript">setTimeout("window.close();",1000)</script> <!--fecha a janela depois de imprimir-->
</header>

<!DOCTYPE html>
<html>
<head>
	<title>Informações de Entrega</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
	
		<?php
		$quantidade = $_POST['quantidade'];
		$produto = $_POST['produto'];
		$total = $_POST['total'];
		$nome = $_POST['nome'];
		$endereco = $_POST['endereco'];
		$bairro = $_POST['bairro'];
		$complemento = $_POST['complemento'];
		$pontoreferencia = $_POST['pontoreferencia'];
		$tel1 = $_POST['tel1'];
		$tel2 = $_POST['tel2'];
		$condominio = $_POST['condominio'];
		$blocoedificio = $_POST['blocoedificio'];
		$apartamento = $_POST['apartamento'];
		$local_entrega = $_POST['local_entrega'];
		$observacoes = $_POST['observacoes'];

		?>
<h3 class="text-center" >Dados da Entrega</h3>

		<div class="row">

<?php

include_once "conexao.php";

$idpedido = '';
$total = 0;
$i = 0;

	$tab_cliente = "SELECT * FROM pedido WHERE  idmesa LIKE 'delivery' AND cliente LIKE '$nome'";

	$pedido = mysqli_query($conn, $tab_cliente) or die(mysqli_error($conn));

	while($rows_clientes = mysqli_fetch_assoc($pedido)){

			if ($idpedido != $rows_clientes['idpedido']) {
				$idpedido = $rows_clientes['idpedido'];
				$total = 0;
			}

	    $produto=$rows_clientes['produto'];
	    $quantidade=$rows_clientes['quantidade'];
	    $valor=$rows_clientes['valor'];
	    $cliente =$rows_clientes['cliente'];

	    $subtotal = $valor * $quantidade;
	    $total+=$subtotal;
	    $i++;

		$total = number_format($total, 2);?>

			<hr>
			<a class="text-center col-lg-2"><b>Pedido #<?php echo $i;?>:</b></a><br>
			<a class="text-center"><?php echo $produto;?></a><br>			

			<a class="text-center col-lg-2"><b>Quantidade:</b></a>
			<a class="text-center"><?php echo $quantidade;?></a><br>

			<a class="text-center col-lg-2"><b>Total :</b></a>
			<a class="text-center"><b>R$ <?php echo $total;?></b></a><br>

			
<?php
}

?>


			<hr>
			<a class="text-center col-lg-2"><b>Nome:</b></a>
			<a class="text-center"><?php echo $nome;?></a><br><br>

			<a class="text-center"><b>Endereço:</b></a>
			<a class="text-center"><?php echo $endereco;?></a><br><br>

			<a class="text-center"><b>Bairro:</b></a>
			<a class="text-center"><?php echo $bairro;?></a><br><br>

			<a class="text-center"><b>Complemento:</b></a>
			<a class="text-center"><?php echo $complemento;?></a><br><br>

			<a class="text-center"><b>Ponto de Referência:</b></a>
			<a class="text-center"><?php echo $pontoreferencia;?></a><br><br>

			<a class="text-center"><b>Telefone #1:</b></a>
			<a class="text-center"><?php echo $tel1;?></a><br><br>

			<a class="text-center"><b>Telefone #2:</b></a>
			<a class="text-center"><?php echo $tel2;?></a><br><br>

			<a class="text-center"><b>Condomínio:</b></a>
			<a class="text-center"><?php echo $condominio;?></a><br><br>

			<a class="text-center"><b>Bloco/Edifício:</b></a>
			<a class="text-center"><?php echo $blocoedificio;?></a><br><br>

			<a class="text-center"><b>Apartamento:</b></a>
			<a class="text-center"><?php echo $apartamento;?></a><br><br>

			<a class="text-center"><b>Local da Entrega:</b></a>
			<a class="text-center"><?php echo $local_entrega;?></a><br><br>

			<a class="text-center"><b>Observações:</b></a><br>
			<a class="text-center"><?php echo $observacoes;?></a><br><br>
		</div>


</body>
</html>
<!--scrip que faz abrir a tela do windows iniciando a impressao-->

<script type="text/javascript">
	window.print();
</script>

<script type="text/javascript">
	window.onload = function() { window.print(); }
</script>
