  <?php
  include_once "mvc/model/conexao.php";

  $id = $_POST['id'];

  $num = $_POST['num'];

  $total = $_POST['total'];


  $tab_pedidos = "SELECT * FROM pedido WHERE idmesa = $id";

  $pedidos = mysqli_query($conn, $tab_pedidos);


?> 


<div class="row">

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-6 col-md-6 mb-4">

  	<form method="POST" action="?view=persistir_fechamento">
	<label for="recipient-name" class="col-xl-12 text-center" style="font-size: 35px; background: #00739b; color: white; padding: 5%; ">Pagamento Mesa <?php echo $id;?></label>
  		<div class="row" style="padding: 3%;">
	  		<div class="form-group col-md-12">
	  			<label for="recipient-name" class="col-xl-12 text-center" style="font-size: 25px; background: gray; color: white; ">Total Fatura R$ </label>
	  			<input style="font-size: 25px" class="col-xl-12 col-md-6 mb-4 text-center" type="reset" name="pagamento" value="<?php echo number_format($total, 2);?>" disabled>
	  			<input type="hidden" name="total" id="total" value="<?php echo $total; ?>">
	  			<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
	  		</div>

  		</div>


  		<div class="row" style="padding: 3%;">

	  		<div class="form-group col-md-6">
	  			<label for="recipient-name" class="col-xl-12 text-center" style="font-size: 25px; background: #ffad00; color: white; ">Gorjeta R$ </label>
	  			<input name="gorjeta" id="gorjeta" style="font-size: 25px" class="col-xl-12 col-md-6 mb-4 text-center" type="text" name="pagamento" value="0.00">
	  		</div>

	  		<div class="form-group col-md-6">
	  			<label for="recipient-name" class="col-xl-12 text-center" style="font-size: 25px; background: #ff6a2e; color: white; ">Acrécimos R$ </label>
	  			<input name="acrecimo" id="acrecimo" style="font-size: 25px" class="col-xl-12 col-md-6 mb-4 text-center" type="text" name="pagamento" value="0.00">
	  		</div>
	  		
  		</div>

  		<div class="row" style="padding: 3%;">

	  		<div class="form-group col-md-12">
	  			<label for="recipient-name" class="col-xl-12 text-center" style="font-size: 25px; background: green; color: white; ">Valor Pago</label>
	  			<input name="valor_pago" id="" style="font-size: 25px" class="col-xl-12 col-md-6 mb-4 text-center" type="text" name="pagamento" value="0.00">
	  		</div>
  		</div>

  		<button class="form-group col-md-12 btn btn-success" type="submit" style="font-size: 30px;">Efetuar Pagamento</button>

  	</form>

  </div>

  <div class="col-xl-6 col-md-6 mb-4">
  	<div class="row">
  	
		<div class="col-xl-12 col-md-6 mb-4" >
		  <div style="font-size: 25px; background: #fe422d; color: white;">
		    <div class="card-body">
		      <div class="row no-gutters align-items-center">
		        <div class="col mr-2">
		          <div class=" font-weight-bold text-uppercase mb-1">Total</div>
		          <div >R$ <?php echo number_format($total, 2);?></div>
		        </div>
		        <div class="col-auto">
		          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>

	</div>

  	<div class="row">
		<?php while($rows_produtos = mysqli_fetch_assoc($pedidos)) { ?>
	  <div class="col-xl-6 col-md-6 mb-4"><h7 style="color: red;"><?php echo $rows_produtos['quantidade'];?>X</h7>
	    <div class="card border-left-danger ">
	      <div class="card-body">
	      	
	        
	          <div class="col mr-2">
	            <div class=" font-weight-bold text-uppercase mb-1" ><?php echo $rows_produtos['produto'];?></div>
	            <div class="h5 mb-0 font-weight-bold text-danger-800" style="color: red;">R$ <?php echo $rows_produtos['valor'];?></div>
	          </div>

	        
	     </div>
	    </div>
	  </div>

		<?php } ?>



	</div>
  </div>

  
</div>