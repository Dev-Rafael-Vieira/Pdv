<link href="../common/css/bootstrap.min.css" rel="stylesheet"/>


<?php

	session_start();

   $nome = $_GET['nome'];
   $id = $_GET['id'];
   $mesa = $_GET['mesa'];
   $preco = $_GET['preco'];
   $cliente = $_GET['cliente'];
   $categoria = $_GET['categoria'];
   $id_produto = $_GET['id_produto'];

    $i = $_SESSION['loginapp'];

    if($i == 1){


?>

<div class="row" style="background: #2d3339; height: 13%;">

	<h3 class="mb-12 " style="background: #2d3339; width: 5%; " ></h3>
	<a style="background: #2d3339; height: 100%; width: 23%; color: white; " type="button" href="app_pedido.php?categoria=<?php echo $categoria; ?>&cliente=<?php echo $cliente; ?>&mesa=<?php echo $mesa; ?>&id=<?php echo $id; ?>" class="btn btn-outline-light"><h4>voltar</h4></a>
	<h3 class="mb-12 " style="background: #2d3339; width: 16%; " ></h3>

	<h4  class="mb-12 text-center" style="color: white; width: 20%; ">Mesa <?php echo $id; ?></h4>

<h3 class="mb-12 " style="background: #2d3339; width: 36%; " ></h3>


</div>

<h1 class="mb-12 text-center" ></h1>
<h2 class="mb-12 text-center" style=" height: 13%;">Adicionar a Mesa</h2>

<form style="height: 200%;" method="GET" action="../model/app_gravadb.php">
	<div class="form-group col-md-12">
		<h6 class="mb-6 "><label for="recipient-name" class="col-form-label" style="color: black;">Pedido:</label></h6>
		<h3 class="mb-6 text-center"><input name="nome" type="hidden" class="form-control" id="nome" value="<?php echo "$nome";?>"><?php echo "$nome";?></div></h3>
	</div>

	<div class="form-group col-md-12">
		<h6 class="mb-12 "><label for="recipient-name" class="col-form-label" style="color: black;">Valor:</label></h6>
		<h3 class="mb-12 text-center" style="color: red;"><input name="preco" type="hidden" class="form-control" id="preco" value="<?php echo "$preco";?>">R$ <?php echo "$preco";?></div></h3>
	</div>

	<div class="form-group col-md-12">
		<h6 class="mb-12 "><label for="recipient-name" class="col-form-label" style="color: black;">Mesa e Cliente:</label></h6>
		<h3 class="mb-12 text-center"><input name="clienteh" type="hidden" class="form-control" id="clienteh" ><?php echo "$mesa";?>/<?php echo "$cliente";?></div></h3>
	</div>

	<div class="form-group col-md-12">
		<h6 class="mb-12 "><label for="recipient-name" class="col-form-label" style="color: black;">Inserir Cliente:</label></h6>
		<h3 class="mb-12 text-center"><input name="cliente" type="text" class="form-control" id="cliente" placeholder="<?php echo "$cliente";?>" value="<?php echo "$cliente";?>" ></div></h3>
	</div>

	<div class="form-group col-md-12">
		<h6 class="mb-12 "><label for="recipient-name" class="col-form-label" style="color: black;">Qtd</label></h6>
		<h3><input name="quantidade" type="text" class="form-control" id="quantidade" style=" width: 50%;" placeholder="Quantidade"></div></h3>
		<h7 class="mb-12 text-center"><label for="recipient-name" class="col-form-label" style="color: #5a5a5a;">(* No campo "Quantidade" voçê pode inserir os valores "1/2", "1/3" e "1/4" no caso de multiplos sabores de Pizzas por Exemplo !)</label></h7>
	</div>
	
	<div class="form-group col-md-12">
		<label for="message-text" class="col-form-label" >Observação:</label>
		<textarea name="observacoes" class="form-control" id="observacoes" ></textarea>
		<input name="mesa" type="hidden" class="form-control" id="mesa" value="<?php echo "$mesa";?>">
		<input name="categoria" type="hidden" class="form-control" id="categoria" value="<?php echo "$categoria";?>">

	</div>

	<h3 class="mb-12 text-center"><button type="submit" class="btn btn-warning btn-lg">Adicionar</button></h3>
	<h3 class="mb-12 "></h3>



</form>





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

  <script src="../common/js/jquery-3.3.1.slim.min.js" ></script>
  <script src="../common/js/popper.min.js" ></script>
  <script src="../common/js/bootstrap.min.js" ></script>