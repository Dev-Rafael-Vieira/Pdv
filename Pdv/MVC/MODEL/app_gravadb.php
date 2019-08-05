<link href="../common/css/bootstrap.min.css" rel="stylesheet"/>

<?php

session_start();

include_once "conexao.php";

   $hora_pedido = date('H:i');
   $nome = $_GET['nome'];
   $preco = $_GET['preco'];
   $cliente = $_GET['cliente'];
   $quantidade = $_GET['quantidade'];
   $observacoes = $_GET['observacoes'];
   $categoria = $_GET['categoria'];
   $mesa = $_GET['mesa'];
   $usuarioid = $_SESSION['usuarioid'];
   
   if ($quantidade == '1/2') {
   	$quantidade = 0.5;
   }
   if ($quantidade == '1/3') {
   	$quantidade = 0.333;
   }
   if ($quantidade == '1/4') {
   	$quantidade = 0.25;
   } 
   if (is_numeric($quantidade)) {


		$insert_table = "INSERT INTO pedido (idmesa, produto, quantidade, hora_pedido, valor, observacao, usuario) VALUES ('$mesa', '$nome', '$quantidade', '$hora_pedido', '$preco', '$observacoes', '$usuarioid')";
		$adiciona_pedido = mysqli_query($conn, $insert_table);

		$insert_table = "UPDATE mesas SET status = '2', nome = '$cliente' WHERE id_mesa = $mesa";
		$adiciona_pedido = mysqli_query($conn, $insert_table);

		header("Location: ../app/app_mesas.php");

		$conn->close();



?>
		<div class="row" style="background: #2d3339; height: 13%;">
			<h3 class="mb-12 " style="background: #2d3339; width: 30%; " ></h3>
		<h4 class="mb-12 text-center"><a  type="button" href="../app/app_finalizar.php?nome=<?php echo "$nome";?>&preco=<?php echo "$preco";?>&clienteh=&cliente=<?php echo "$cliente";?>&quantidade=<?php echo "$quantidade";?>&observacoes=<?php echo "$observacoes";?>&mesa=<?php echo "$mesa";?>&id=<?php echo "$mesa";?>&categoria=<?php echo "$categoria";?>&id_produto=0" class="btn btn-warning">voltar</a></h4>
		<h3 class="mb-12 " style="background: #2d3339; width: 5%; " ></h3>
		<h4 class="mb-12 text-center"><a  type="button" href="../app/app_finalizar.php?nome=<?php echo "$nome";?>&preco=<?php echo "$preco";?>&clienteh=&cliente=<?php echo "$cliente";?>&quantidade=<?php echo "$quantidade";?>&observacoes=<?php echo "$observacoes";?>&mesa=<?php echo "$mesa";?>&id=<?php echo "$mesa";?>&categoria=<?php echo "$categoria";?>&id_produto=0" class="btn btn-warning">voltar</a></h4>
		</div>
<?php


   }else{?>
		<div class="row" style="background: #2d3339; height: 13%;">

			<h3 class="mb-12 " style="background: #2d3339; width: 5%; " ></h3>
			<a style="background: #2d3339; height: 100%; width: 23%; color: white; " type="button" href="../app/app_finalizar.php?nome=<?php echo "$nome";?>&preco=<?php echo "$preco";?>&clienteh=&cliente=<?php echo "$cliente";?>&quantidade=<?php echo "$quantidade";?>&observacoes=<?php echo "$observacoes";?>&mesa=<?php echo "$mesa";?>&id=<?php echo "$mesa";?>&categoria=<?php echo "$categoria";?>&id_produto=0" class="btn btn-outline-light"><h4>voltar</h4></a>
			<h3 class="mb-12 " style="background: #2d3339; width: 16%; " ></h3>

			<h4  class="mb-12 text-center" style="color: white; width: 20%; ">Mesa</h4>

			<h3 class="mb-12 " style="background: #2d3339; width: 36%; " ></h3>


		</div>
		<div class="mb-12 " style=" height: 5%;" ></div>

		<div class="mb-12 " style=" height: 70%; background: black; border-radius: 5px;" >
			<h2 class="mb-12 text-center" style="color: white;"> ATENÇÂO ! </h2>
			<h4 class="mb-12 text-center" style="color: white;"> O Valor </h4>
			<h4 class="mb-12 text-center" style="color: red;">"<?php echo "$quantidade";?>"</h4>
			<h4 class="mb-12 text-center" style="color: white;">Não é um número Válido,<br> Verifique o campo Quantidade  </h4>
			<h4 class="mb-12 text-center" style="color: white;"> e tente Novamente ! </h4>
			<h4 class="mb-12 text-center"><a  type="button" href="../app/app_finalizar.php?nome=<?php echo "$nome";?>&preco=<?php echo "$preco";?>&clienteh=&cliente=<?php echo "$cliente";?>&quantidade=<?php echo "$quantidade";?>&observacoes=<?php echo "$observacoes";?>&mesa=<?php echo "$mesa";?>&id=<?php echo "$mesa";?>&categoria=<?php echo "$categoria";?>&id_produto=0" class="btn btn-warning">voltar</a></h4>
		</div>

<?php

   }

?>




  <script src="../common/js/jquery-3.3.1.slim.min.js" ></script>
  <script src="../common/js/popper.min.js" ></script>
  <script src="../common/js/bootstrap.min.js" ></script>