	<?php
	include_once "mvc/model/conexao.php";

	$id = $_POST['id'];


	$tab_pedidos = "SELECT * FROM pedido WHERE idmesa = $id";

	$pedidos = mysqli_query($conn, $tab_pedidos);


	$tab_mesas = "SELECT * FROM mesas WHERE id_mesa = $id";

	$mesas = mysqli_query($conn, $tab_mesas);

	$mesas = mysqli_fetch_assoc($mesas);

	$cliente = $mesas['nome'];

	$status = $mesas['status'];

	


		if ($status == 2 || $status == 3) { ?>


<h4 class="mb-10 text-center" style="font-size: 32px; color: green;">Cliente: <?php echo $cliente; ?></h4>

<h4 class="mb-10 text-center">Mesa <?php echo $id; ?></h4>


<h4 class="mb-10 text-center" ><button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#Modal_categorias"  ><b>Novo Pedido</b></button></h4>



		<h4>  Relação de Produtos :</h4>
	      <div class="table-responsive">
	        <table class="table table-striped table-sm">
	          <thead>
	            <tr>
	              <th >#</th>
	              <th >ID</th>
	              <th >Pedido</th>   
	              <th >Observações</th>
	              <th >Quantidade</th>
	              <th >Valor Unitário</th>
	              <th >Ação</th>
	            </tr>
	          </thead>
	          <tbody>


	          	<?php
	          	$num = 0;
	          	$total = 0;
				// mysqli_fetch_assoc senpre retorna um array associaivo
	          	while($rows_produtos = mysqli_fetch_assoc($pedidos)) {
	          		$num +=1;

	          		$quantidade=$rows_produtos['quantidade'];
	          		$valor=$rows_produtos['valor'];

	          		$subtotal = $valor * $quantidade;
	          		$total+=$subtotal;

	          		?>
	            <tr>
	            	<td><?php echo $num?></td>
	            	<td><?php echo $rows_produtos['idpedido'];?></td>
	            	<td><?php echo utf8_encode($rows_produtos['produto'])?></td>
	            	<td><?php echo $rows_produtos['observacao'];?></td>
	            	<td><?php echo $rows_produtos['quantidade'];?></td>
	            	
	            	<td>R$ <?php echo number_format($rows_produtos['valor'], 2); ?></td>
	            	<td>
	            		<button type="button" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-idmesa="<?php echo  $id; ?>" data-idpedido="<?php echo  $rows_produtos['idpedido']; ?>" data-idproduto="<?php echo  $rows_produtos['produto']; ?>"data-target="#excluir">Excluir Iten</button>
	            		<button type="button" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#editar"

	            		data-idpedido="<?php echo  $rows_produtos['idpedido']; ?>"
	            		data-id="<?php echo $id; ?>"
	            		data-produto="<?php echo  $rows_produtos['produto']; ?>"
	            		data-obs="<?php echo  $rows_produtos['observacao']; ?>"
	            		data-quantidade="<?php echo  $rows_produtos['quantidade']; ?>"

	            		>Editar Iten</button></td>
	            </tr>
					<?php } ?>        

	            <tr>
	              <th></th>
	              <th></th>
	              <th></th>   
	              <th></th>
	              <th></th>
	              <th></th>	              
	              <th></th>
	            </tr>
	            

	            <tr>
	              <th><b>TOTAL:</b></th>
	              <th></th>
	              <th></th>   
	              <th></th>
	              <th></th>
	              <th style="font-size: 22px; color: red;">R$: <?php echo number_format($total, 2);?></th>	              
	              <th>
	              	<form method="POST" action="?view=fecha_comanda">
                		<input name="id" type="hidden" value="<?php echo $id; ?>">
                		<input name="num" type="hidden" value="<?php echo $num; ?>">
                		<input name="total" type="hidden" value="<?php echo $total; ?>">
            			<button type="submit" class="btn btn-outline-danger">Fechar Mesa</button>
                	</form>
                	</th>
	            </tr>

	          </tbody>
	        </table>
	      </div>


<?php } else {  ?>

<h3 class="display-12 text-center">Adicionar Pedido</h3>
<h4 class="mb-10 text-center">Mesa <?php echo $id; ?></h4>


<h4 class="mb-10 text-center" ><button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#Modal_categorias" ><b>Novo Pedido</b></button></h4>


		<h4>  Relação de Produtos :</h4>
	      <div class="table-responsive">
	        <table class="table table-striped table-sm">
	          <thead>
	            <tr>
	              <th >#</th>
	              <th >ID</th>
	              <th >Pedido</th>   
	              <th >Observações</th>
	              <th >Quantidade</th>
	              <th >Valor Unitário</th>
	              <th ></th>
	            </tr>
	          </thead>
	          <tbody>

	            <tr>
	            	<td>1</td>
	            	<td>Nulo</td>
	            	<td>Vazio</td>
	            	<td>Mesa Livre</td>
	            	<td>0</td>
	            	
	            	<td style="font-size: 22px; color: red;">R$ 0.00</td>
	            	<td></td>
	            </tr>
	        

	          </tbody>
	        </table>
	      </div>

<?php } ?> 


<!-- Modal CATEGORIAS-->
<div class="modal fade bd-example-modal-lg" id="Modal_categorias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: black;">Categorias</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: black;">

        
		<div class="container-fluid " >
			
			<div class="row" >
				
				
				<?php

				$tab_produtos = "SELECT * FROM produtos";

				$produtos = mysqli_query($conn, $tab_produtos);

				$comparativo = array();
				while ($cat = mysqli_fetch_assoc($produtos)) {
					
					$categoria = $cat['categoria'];

					if (in_array("$categoria", $comparativo) != true) {
					 	array_push($comparativo, $categoria);
						?>
							
							<form method="POST" action="?view=novo_pedido">
							<div class="form-group" >
								<input type="hidden" name="pesquisa" id="pesquisa" value=" ">
								<input type="hidden" name="mesa" id="mesa" value="<?php echo $id; ?>">
								<input type="hidden" name="cliente" id="cliente" value="<?php echo $cliente; ?>">
								<input type="submit" class="btn btn-outline-warning" name="categoria" value="<?php echo $categoria?>" ></input><label type="hidden" style="width: 10px;"></label>
								
							</div>
							</form>
							

					<?php 
					} 
				}; 

				?>
				</div>
			</div>
		</div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="excluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" >

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="color:white; background: #e74a3b;">
      	<form method="POST" action="mvc/model/exclui_pedido.php">
      		<h4 class="mb-10 text-center">Excluir Pedido:</h4>
        	<input name="pedido" type="hidden" class="form-control" id="pedido">
        	<input name="produto" type="button" class="form-control" id="produto" style="color: red; background: white; font-size: 22px;">
        	<input name="mesa" type="hidden" class="form-control" id="mesa">
    	
      	</div>
      	<div class="modal-footer" >
        	<button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
        	<button type="submit" class="btn btn-danger">Excluir</button>
        
      	</div>
      </form>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" >
		
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

      	<form method="POST" action="mvc/model/edita_pedido.php">
      		<div class="row">

      			<div class="form-group col-md-2">
      				<label for="recipient-name" class="col-form-label">Qtd</label>
      				<input name="quantidade" type="text" class="form-control" id="quantidade">
      				<input name="idpedido" type="hidden" class="form-control" id="idpedido">
      				<input name="id" type="hidden" id="id">
      			</div>
      			<div class="form-group col-md-10">
      				<label for="recipient-name" class="col-form-label">Produto</label>
      				<input name="produto" type="button" class="form-control" id="produto">
      			</div>
      			<div class="form-group col-md-12">
      				<label for="recipient-name" class="col-form-label">Obs</label>
      				<textarea name="obs" type="text" class="form-control" id="obs"></textarea>
      			</div>      			
      		</div>
      		
      </div>

      <div class="modal-footer" >
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger">Editar</button>
        
      </div>
      </form>
    </div>
  </div>
</div>



<!-- CRIA O SCRIPT JQUERY PARA TRATAR DOS DADOS QUE VEEM COM A CHAMADA DA REQUIZIÇÃO DO MODAL -->

<script type="text/javascript">
$('#excluir').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget) // Button that triggered the modal

  var recipientpedido = button.data('idpedido')
  var recipientproduto = button.data('idproduto')
  var recipientmesa = button.data('idmesa')



  var modal = $(this)
  modal.find('#pedido').val(recipientpedido)
  modal.find('#produto').val(recipientproduto)
  modal.find('#mesa').val(recipientmesa)


})
</script>

<script type="text/javascript">
$('#editar').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget) // Button that triggered the modal

  var idpedido = button.data('idpedido')
  var quantidade = button.data('quantidade')
  var produto = button.data('produto')
  var obs = button.data('obs')



  var modal = $(this)
  modal.find('.modal-header').text('Edita Pedido  ' + idpedido)
  modal.find('#idpedido').val(idpedido)
  modal.find('#quantidade').val(quantidade)
  modal.find('#produto').val(produto)
  modal.find('#obs').val(obs)


})
</script>