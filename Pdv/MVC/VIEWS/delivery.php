<div class="row">
	<h3 class="col-lg-8 " style="height: 80px; color: #4D4D4D;">Delivery </h3>

	<form method="POST" id="" action="" class="mb-10 text-center">
		<input  type="text" name="pesquisa" id="pesquisa" placeholder="Nome ou CPF do Cliente"><label type="hidden" style="width: 10px;"></label>
		<input class="btn btn-outline-warning" type="submit" name="enviar" value="Pesquisar">
	</form>

</div>

<div class="col-lg-12 text-center">

	<form method="POST" action="?view=pedidos_delivery">

		<button type="submit" class="btn btn-outline-danger col-lg-2 text-center" style=" margin: 20px; ">Acessar Pedidos </button>

	</form>

</div>

<?php

include_once "mvc/model/conexao.php";

if( isset($_POST['pesquisa']) && $_POST['pesquisa'] != '')
{?>

		<div class="container-fluid">
			<table class="table table-striped table-sm">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Endereço</th>
						<th>Bairro</th>
						<th>Cidade</th>
						<th>Estado</th>
						<th>Telefone#1</th>
						<th>Telefone#2</th>
						<th>E-Mail</th>
						<th>Seleção</th>
					</tr>
				</thead>

<?php

$pesquisa = $_POST['pesquisa'];

	$tab_cliente = "SELECT * FROM clientes WHERE  nome LIKE '%$pesquisa%' OR cpf_cnpj LIKE '%$pesquisa%'";

	$clientes = mysqli_query($conn, $tab_cliente) or die(mysqli_error($conn));

	while($rows_clientes = mysqli_fetch_assoc($clientes)){ ?>



				<tbody>
					<td><?php echo $rows_clientes['nome'];?></td>
					<td><?php echo $rows_clientes['endereco'];?></td>
					<td><?php echo $rows_clientes['bairro'];?></td>
					<td><?php echo $rows_clientes['cidade'];?></td>
					<td><?php echo $rows_clientes['estado'];?></td>
					<td><?php echo $rows_clientes['tel1'];?></td>
					<td><?php echo $rows_clientes['tel2'];?></td>
					<td><?php echo $rows_clientes['email'];?></td>
					<td>
						<form method="POST" action="">
							<input type="hidden" name="id" id="id" value="<?php echo $rows_clientes['id'];?>">
							<input type="hidden" name="nome" id="nome" value="<?php echo $rows_clientes['nome'];?>">
							<input type="hidden" name="endereco" id="endereco" value="<?php echo $rows_clientes['endereco'];?>">
							<input type="hidden" name="bairro" id="bairro" value="<?php echo $rows_clientes['bairro'];?>">
							<input type="hidden" name="tel1" id="tel1" value="<?php echo $rows_clientes['tel1'];?>">
							<input type="hidden" name="tel2" id="tel2" value="<?php echo $rows_clientes['tel2'];?>">
							<button type="submit" class="btn btn-outline-danger btn-sm" >Selecionar</button>
						</form>
					</td>
				</tbody>

<?php }?>
			</table>
		</div>
<?php
} if( isset($_POST['id']) ){
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$endereco = $_POST['endereco'];
	$bairro = $_POST['bairro'];
	$tel1 = $_POST['tel1'];
	$tel2 = $_POST['tel2'];
?>
<div class="row">

	<div class="col-lg-12 text-center" style="color:black; padding: 3%;">
		<hr>
		
		<h2><?php echo $nome; ?></h2>
	</div>
	
	<div class="col-lg-12 text-center" style=" color: red;">
		<h5>Endereço:</h5>
		<h2><?php echo $endereco; ?>, Bairro: <?php echo $bairro; ?></h2>
	</div>

</div>
<hr>

<h4 style="padding: 3%;" class="mb-12 text-center" ><button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#Modal_categorias" >Novo Pedido Delivery</button></h4>

<div class="col-lg-12 text-center">


<form method="POST" action="?view=delivery">

<button type="submit" class="btn btn-outline-info col-lg-2 text-center" style="padding: 5px;">Retornar ao Início</button>

</form>
</div>


<?php
}elseif( isset($_POST['pesquisa']) == null || $_POST['pesquisa'] == '' ){

?>

		<div class="container-fluid">
			<table class="table table-striped table-sm">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Endereço</th>
						<th>Bairro</th>
						<th>Cidade</th>
						<th>Estado</th>
						<th>Telefone#1</th>
						<th>Telefone#2</th>
						<th>E-Mail</th>
						<th>Seleção</th>
					</tr>
				</thead>

<?php


	$tab_cliente = "SELECT * FROM clientes";

	$clientes = mysqli_query($conn, $tab_cliente) or die(mysqli_error($conn));

	while($rows_clientes = mysqli_fetch_assoc($clientes)){ ?>




				<tbody>
					<td><?php echo $rows_clientes['nome'];?></td>
					<td><?php echo $rows_clientes['endereco'];?></td>
					<td><?php echo $rows_clientes['bairro'];?></td>
					<td><?php echo $rows_clientes['cidade'];?></td>
					<td><?php echo $rows_clientes['estado'];?></td>
					<td><?php echo $rows_clientes['tel1'];?></td>
					<td><?php echo $rows_clientes['tel2'];?></td>
					<td><?php echo $rows_clientes['email'];?></td>
					<td>
						<form method="POST" action="">
							<input type="hidden" name="id" id="id" value="<?php echo $rows_clientes['id'];?>">
							<input type="hidden" name="nome" id="nome" value="<?php echo $rows_clientes['nome'];?>">
							<input type="hidden" name="endereco" id="endereco" value="<?php echo $rows_clientes['endereco'];?>">
							<input type="hidden" name="bairro" id="bairro" value="<?php echo $rows_clientes['bairro'];?>">
							<input type="hidden" name="tel1" id="tel1" value="<?php echo $rows_clientes['tel1'];?>">
							<input type="hidden" name="tel2" id="tel2" value="<?php echo $rows_clientes['tel2'];?>">
							<button type="submit" class="btn btn-outline-danger btn-sm" >Selecionar</button>
						</form>
					</td>
				</tbody>

<?php }

?>


			</table>
		</div>

<?php

	} 

?>


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
								<input type="hidden" name="mesa" id="mesa" value="delivery">
								<input type="hidden" name="cliente" id="cliente" value="<?php echo $nome;?>">
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
