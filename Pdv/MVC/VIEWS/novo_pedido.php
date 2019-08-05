
<?php

   $categoria = $_POST['categoria'];
   $pesquisa = $_POST['pesquisa'];
   $mesa = $_POST['mesa'];
   $cliente = $_POST['cliente'];
   ?>



<div class="row">
	<h3 class="col-lg-8 " style="height: 80px; color: #4D4D4D;">Categoria "<?php echo $categoria ;?>"</h3>

	<form method="POST" id="" action="" class="mb-10 text-center">
		<input  type="text" name="pesquisa" id="pesquisa" placeholder="Digite o nome do produto"><label type="hidden" style="width: 10px;"></label>
		<input class="btn btn-outline-warning" type="submit" name="enviar" value="Pesquisar">
		<input type="hidden" name="categoria" id="categoria" value="<?php echo $categoria ;?>">
		<input type="hidden" name="mesa" id="mesa" value="<?php echo $mesa ;?>">
		<input type="hidden" name="cliente" id="cliente" value="<?php echo $cliente ;?>">
	</form>
	
</div>



<?php
   include_once "mvc/model/conexao.php";

   if ($pesquisa == ' ') {

	$tab_produtos = "SELECT * FROM produtos WHERE categoria = '$categoria'";

	$produtos = mysqli_query($conn, $tab_produtos);  ?>

	<div class="container-fluid">
		<table class="table table-striped table-sm">
			<thead>
				<tr>
					<th >Código</th>
					<th >Nome</th>
					<th >Categoria</th>
					<th >Estoque</th>
					<th >Preço Unitário</th>
					<th >Adicionar</th>
				</tr>
			</thead>
<?php
    while($rows_produtos = mysqli_fetch_assoc($produtos)){?>
			<tbody>
				<tr>
					<td><?php echo $rows_produtos['codigo'];?></td>	
					<td style="color: #4D4D4D;"><b><?php echo $rows_produtos['nome'];?></b></td>
					<td><?php echo $rows_produtos['categoria'];?></td>
					<td><?php echo $rows_produtos['estoque_atual'];?></td>
					<td>R$ <?php echo $rows_produtos['preco_venda'];?></td>
					<td><button type="button" class="btn btn-info btn-icon-split btn-sm" data-idcliente="<?php echo $cliente; ?>" data-idnome="<?php echo $rows_produtos['nome']; ?>" data-idmesa="<?php echo $mesa; ?>" data-idpreco="<?php echo $rows_produtos['preco_venda']; ?>" data-toggle="modal" data-target="#adiciona">Selecionar</button></td>
				</tr>
			</tbody>
   <?php } ?>


		</table>
	</div>

<?php  } else { 

	$tab_produtos = "SELECT * FROM produtos WHERE categoria = '$categoria' AND nome LIKE '%$pesquisa%' OR codigo LIKE '$pesquisa'";

	$produtos = mysqli_query($conn, $tab_produtos);

	if(mysqli_num_rows($produtos) <= 0){?>

	<div class="container-fluid">
		<table class="table table-striped table-sm">
			<thead>
				<tr>
					<th >Código</th>
					<th >Nome</th>
					<th >Categoria</th>
					<th >Estoque</th>
					<th >Preço Unitário</th>
					<th >Ação</th>
				</tr>
			</thead>
			<tbody>
				<td>000</td>
				<td>"Nenhum encontrado..."</td>
				<td>Nenhuma</td>
				<td>000</td>
				<td>R$ 0.00</td>
				<td><div class="row">
	
		<form method="POST" id="" action="" class="mb-10 text-center">
		<input class="btn btn-outline-danger" type="submit" name="enviar" value="Voltar">
		<input type="hidden" name="categoria" id="categoria" value="<?php echo $categoria ;?>">
		<input type="hidden" name="mesa" id="mesa" value="<?php echo $mesa ;?>">
		<input type="hidden" name="pesquisa" id="pesquisa" value=" ">
		<input type="hidden" name="cliente" id="cliente" value="<?php echo $cliente ;?>">
		</form>
</div></td>
			</tbody>
		</table>
	</div>



	<?php
	}else{


?>
	<div class="container-fluid">
		<table class="table table-striped table-sm">
			<thead>
				<tr>
					<th >Código</th>
					<th >Nome</th>
					<th >Categoria</th>
					<th >Estoque</th>
					<th >Preço Unitário</th>
					<th >Adicionar</th>
				</tr>
			</thead>

<?php
    while($rows_produtos = mysqli_fetch_assoc($produtos)){?>
			<tbody>
				<tr>
					<td><?php echo $rows_produtos['codigo'];?></td>	
					<td style="color: #4D4D4D;"><b><?php echo $rows_produtos['nome'];?></b></td>
					<td><?php echo $rows_produtos['categoria'];?></td>
					<td><?php echo $rows_produtos['estoque_atual'];?></td>
					<td>R$ <?php echo $rows_produtos['preco_venda'];?></td>
					<td><button type="button" class="btn btn-info btn-icon-split btn-sm" 

						data-idnome="<?php echo $rows_produtos['nome']; ?>" 
						data-idmesa="<?php echo $mesa; ?>" 
						data-idpreco="<?php echo $rows_produtos['preco_venda']; ?>" 

						data-toggle="modal" data-target="#adiciona">Selecionar</button></td>
				</tr>
			</tbody>
   <?php } ?>


		</table>
	</div>

<?php 

	}

}

 ?>



<div class="modal fade bd-example-modal-xl" id="adiciona" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
	    		<h5 class="modal-title" id="exampleModalLongTitle" style="color: black;">Pedido</h5>
	    	</div>

	    	<form method="POST" action="mvc/model/ad_pedido.php">
				<div class="modal-body" style="background: #918F8F;">
					<div class="row">

						<div class="form-group col-md-12">
							<label for="recipient-name" class="col-form-label" style="color: white;">Cliente:</label>
							<input name="cliente" type="text" class="form-control" id="cliente">
						</div>

						<div class="form-group col-md-8">
							<label for="recipient-name" class="col-form-label" style="color: white;">Pedido:</label>
							<input name="pedido" type="text" class="form-control" id="pedido">
						</div>

						<div class="form-group col-md-2">
							<label for="recipient-name" class="col-form-label" style="color: white;">Preço: (R$)</label>
							<input name="preco_venda" type="text" class="form-control" id="preco_venda">
						</div>

						<div class="form-group col-md-2">
							<label for="recipient-name" class="col-form-label" style="color: white;">Quantidade:</label>
							<input name="quantidade" type="text" class="form-control" id="quantidade">
						</div>
				          				          			
						<div class="form-group col-md-12">
							<label for="message-text" class="col-form-label" style="color: white;">Observação:</label>
							<textarea name="observacoes" class="form-control" id="observacoes" ></textarea>
						</div>	

						<div class="form-group col-md-12">
							<label for="message-text" class="col-form-label" style="color: white;">* No campo "Quantidade" pode ser inserido também os valores "1/2", "1/3" e "1/4" no caso de multiplos sabores de Pizzas por exemplo !</label>
						</div>	

						<!--cria um campo invisivel "hidden" para pegar o id "id_Produto"-->
						<input name="id_mesa" type="hidden" id="id_mesa">


					</div>
				</div>

				<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-warning">Adicionar</button>
				</div>
			</form>
	    </div>
	</div>
</div>



<!-- CRIA O SCRIPT JQUERY PARA TRATAR DOS DADOS QUE VEEM COM A CHAMADA DA REQUIZIÇÃO DO MODAL -->
<script type="text/javascript">
$('#adiciona').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget) // Button that triggered the modal

  var recipientmesa = button.data('idmesa')
  var recipientnome = button.data('idnome')
  var recipientpreco = button.data('idpreco')
  var recipientcliente = button.data('idcliente')



  var modal = $(this)
  modal.find('.modal-title').text('Mesa  ' + recipientmesa)
  modal.find('#pedido').val(recipientnome)
  modal.find('#preco_venda').val(recipientpreco)
  modal.find('#id_mesa').val(recipientmesa)
  modal.find('#cliente').val(recipientcliente)

})
</script>