
<link href="../common/css/bootstrap.min.css" rel="stylesheet"/>
  <?php

  session_start();
    
    include_once "../model/conexao.php";

    $tab_mesas = "SELECT * FROM mesas";

    $mesas = mysqli_query($conn, $tab_mesas);

    $i = $_SESSION['loginapp'];

    if($i == 1){
  ?>

<div class="row" style="background: #2d3339; height: 13%;">
	<h3 class="mb-12 " style="background: #2d3339; width: 44%; " ></h3>
	<h4 style="color: white; width: 20%; ">Mesas</h4>

<h3 class="mb-12 " style="background: #2d3339; width: 36%; " ></h3>


</div>
<div class="mb-12 " style=" height: 5%;" ></div>


<div class="container">
	<div class="row">


  <?php


    while($rows_mesas = mysqli_fetch_assoc($mesas)){
      
      $nome = utf8_encode($rows_mesas['nome']);
      $id_mesa = $rows_mesas['id_mesa'];
      

      if ($rows_mesas['status'] == 1) {
        $cor='card bg-success';
        $status = 'Livre';
        $link_mesas = "mesasLivres";

      }if ($rows_mesas['status'] == 2) {
        $cor='card bg-danger';
        $status = 'Em Espera';
        $link_mesas = "mesasLivres";

      }if ($rows_mesas['status'] == 3) {
        $cor='card bg-warning';
        $status = 'Atendida';
        $link_mesas = "mesasLivres";
      }

    //inicia a seleção da tabela pedido
    $tab_pedido = "SELECT * FROM pedido WHERE idmesa = $id_mesa";
    $pedido = mysqli_query($conn, $tab_pedido);

    $total = 0;


    
    while($row = mysqli_fetch_assoc($pedido)){

     

      //recebe e soma todos os pedidos
      $quantidade=$row['quantidade'];
      $valor=$row['valor'];

      if ($valor!= NULL && $quantidade!= NULL) {

        $subtotal = $valor * $quantidade;
        $total+=$subtotal;

        //armazena o ultimo id de pedido feito pela mesma mesa
        $idpedido=$row['idpedido'];

        //recebe a hora do ultimo pedido
        $hora=$row['hora_pedido'];
      }else {

        $total = 0; 
                

      }



    }

  ?>

		<div class="col-4 " >

			<form method="GET" action="app_visualizamesa.php">
				<input name="id" type="hidden" id="id" value="<?php echo $rows_mesas['id_mesa']; ?>">
				<input name="total" type="hidden" id="total" value="<?php echo $total; ?>">
				<input name="hora" type="hidden" id="hora" value="<?php echo $hora; ?>">
        <input name="senha" type="hidden" id="senha" value="<?php echo $pass; ?>">
        <input name="login" type="hidden" id="login" value="<?php echo $login; ?>">
				<input class="<?php echo $cor; ?>" type="submit" style="width:100%; height:15%; color: white;" value="<?php echo $id_mesa; ?>">
			</form>

		</div>


  


<?php }?>

	</div>


<!-- Extra large modal -->
<div class="modal fade bd-example-modal-xl" id="sair" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
     sair
    </div>
  </div>
</div>

<?php } else { 
  header('Location: app_login.php');
}
  ?>