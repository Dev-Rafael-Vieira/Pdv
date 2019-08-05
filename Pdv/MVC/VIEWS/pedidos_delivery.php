<h2 class="text-center" style="color: black; padding: 3%;">Pedidos de Delivery</h2>


<div class="col-12 text-center" id="mensagem" style="visibility: visible"><?php if (isset($_SESSION['msg'])) {echo $_SESSION['msg'];  unset($_SESSION['msg']); }?></div>



<div class="row" style="background: grey; color: white; padding: 5px;">
	<h4 class="col-lg-2 text-center">Cliente</h4>
	<h4 class="col-lg-1 text-center">Quantidade</h4>
	<h4 class="col-lg-3 text-center">Pedido</h4>
	<h4 class="col-lg-2 text-center">Valor</h4>
</div>

 
<?php

include_once "mvc/model/conexao.php";

$idpedido = '';
$total = 0;

	$tab_cliente = "SELECT * FROM pedido WHERE  idmesa LIKE 'delivery'";

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

		$total = number_format($total, 2);


?>

		<div style="background: white; height: 5px;"></div>

		<div class="row" style="background: black; color: white; padding: 5px;">
			<h5 class="col-lg-2 text-center">

<?php

	$tab_cli = "SELECT * FROM clientes WHERE nome LIKE '$cliente'";

	$cli = mysqli_query($conn, $tab_cli) or die(mysqli_error($conn));

	while($rows_cli = mysqli_fetch_assoc($cli)){
?>
			
				<button data-toggle="modal" data-target="#exampleModal" 
			data-produto ="<?php echo $produto;?>"
			data-quantidade ="<?php echo $quantidade;?>"
			data-total ="<?php echo $total;?>"
			data-nome ="<?php echo $rows_cli['nome'];?>"
			data-endereco ="<?php echo $rows_cli['endereco'];?>"
			data-bairro ="<?php echo $rows_cli['bairro'];?>"
			data-cidade ="<?php echo $rows_cli['cidade'];?>"
			data-estado ="<?php echo $rows_cli['estado'];?>"
			data-complemento ="<?php echo $rows_cli['complemento'];?>"
			data-cep ="<?php echo $rows_cli['cep'];?>"
			data-pontoreferencia ="<?php echo $rows_cli['ponto_referecia'];?>"
			data-tel1 ="<?php echo $rows_cli['tel1'];?>"
			data-tel2 ="<?php echo $rows_cli['tel2'];?>"
			data-email ="<?php echo $rows_cli['email'];?>" 
			data-cpfcnpj ="<?php echo $rows_cli['cpf_cnpj'];?>"
			data-rg ="<?php echo $rows_cli['rg'];?>"
			data-condominio ="<?php echo $rows_cli['condominio'];?>"
			data-blocoedificio ="<?php echo $rows_cli['bloco'];?>"
			data-apartamento ="<?php echo $rows_cli['apartamento'];?>"
			data-local_entrega ="<?php echo $rows_cli['local_entrega'];?>"
			data-observacoes ="<?php echo $rows_cli['observacoes'];?>"

			type="button" class="btn btn-outline-primary col-lg-12 text-center" style="color: white;"><?php echo $rows_cli['nome'];?></button></h5>



<?php
}
?>
			<h5 class="col-lg-1 text-center"><?php echo $rows_clientes['quantidade'];?></h5>
			<h5 class="col-lg-3 text-center"><?php echo $rows_clientes['produto'];?></h5>
			<h5 class="col-lg-2 text-center" style="color: red;">R$ <?php echo $total;?></h5>

			<form method="POST" action="mvc/model/confirma_delivery.php">
				<input type="hidden" name="idpedido" id="idpedido" value="<?php echo $rows_clientes['idpedido'];?>">
				<input type="hidden" name="cliente" id="cliente" value="<?php echo $rows_clientes['cliente'];?>">
				<button type="submit" class="btn btn-warning col-lg-12 text-center" style="color: black;">Confirmar Entrega</button>
			</form>

			<h1 style="color: black;">0</h1>

			<form method="POST" action="mvc/model/cancela_delivery.php">
				<input type="hidden" name="idpedido" id="idpedido" value="<?php echo $rows_clientes['idpedido'];?>">
				
				<button type="submit" class="btn btn-danger col-lg-12 text-center" >Cancelar Pedido</button>
			</form>
			
		</div>


<?php
		

	} 
?>





				<div class="modal fade bd-example-modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-xl" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Dados do Cliente</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>

						<div class="modal-body">
							<form method="POST" action="http://localhost/pdv/mvc/model/imprime_delivery.php" target="_blank">
							<div class="row">
			          			<div class="form-group col-md-4">
			            			<label for="recipient-name" class="col-form-label">Nome do Cliente:</label>
			            			<input name="nome" nome="nome" id="nome" type="text" class="form-control" >
			          			</div>

			          			<div class="form-group col-md-6">
			            			<label for="message-text" class="col-form-label">Endereço (Rua e Número):</label>
			            			<input name="endereco" id="endereco" type="text" class="form-control" >
			          			</div>
			          			<div class="form-group col-md-2">
			            			<label for="recipient-name" class="col-form-label">Bairro:</label>
			            			<input name="bairro" id="bairro" type="text" class="form-control" >
			          			</div>	          				          			
			          			<div class="form-group col-md-4">
			            			<label for="recipient-name" class="col-form-label">Cidade:</label>
			            			<input name="cidade" id="cidade" type="text" class="form-control" >
			          			</div>
			          			<div class="form-group col-md-2">
			            			<label for="recipient-name" class="col-form-label">Estado:</label>
			            			<input name="estado" id="estado" type="text" class="form-control" >
			          			</div>
			          			<div class="form-group col-md-4">
			            			<label for="recipient-name" class="col-form-label">Complemento:</label>
			            			<input name="complemento" id="complemento" type="text" class="form-control" >
			          			</div>
			          			<div class="form-group col-md-2">
			            			<label for="recipient-name" class="col-form-label">CEP:</label>
			            			<input name="cep" id="cep" type="text" class="form-control" >
			          			</div>
			          			<div class="form-group col-md-4">
			            			<label for="recipient-name" class="col-form-label">Ponto de Referência:</label>
			            			<input name="pontoreferencia" id="pontoreferencia" type="text" class="form-control" >
			          			</div>	          				          			
			          			<div class="form-group col-md-2">
			            			<label for="recipient-name" class="col-form-label">Telefone #1:</label>
			            			<input name="tel1" id="tel1" type="text" class="form-control" >
			          			</div>
			          			<div class="form-group col-md-2">
			            			<label for="recipient-name" class="col-form-label">Telefone #2:</label>
			            			<input name="tel2" id="tel2" type="text" class="form-control" >
			          			</div>
			          			<div class="form-group col-md-4">
			            			<label for="recipient-name" class="col-form-label">E-Mail</label>
			            			<input name="email" id="email" type="text" class="form-control" >
			          			</div>
			          			<div class="form-group col-md-2">
			            			<label for="recipient-name" class="col-form-label">CPF/CNPJ:</label>
			            			<input name="cpfcnpj" id="cpfcnpj" type="text" class="form-control" >
			          			</div>
			          			<div class="form-group col-md-2">
			            			<label for="recipient-name" class="col-form-label">RG:</label>
			            			<input name="rg" id="rg" type="text" class="form-control" >
			          			</div>
			         			 <div class="form-group col-md-4">
			            			<label for="message-text" class="col-form-label">Condomínio:</label>
			            			<input name="condominio" id="condominio" type="text" class="form-control" ></input>
			          			</div>	
			         			 <div class="form-group col-md-2">
			            			<label for="message-text" class="col-form-label">Bloco/Edifício:</label>
			            			<input name="blocoedificio" id="blocoedificio" type="text" class="form-control" ></input>
			          			</div>
			         			 <div class="form-group col-md-2">
			            			<label for="message-text" class="col-form-label">Apartamento:</label>
			            			<input name="apartamento" id="apartamento" type="text" class="form-control" ></input>
			          			</div>

			         			 <div class="form-group col-md-12">
			            			<label for="message-text" class="col-form-label">Local de Entrega:</label>
			            			<input name="local_entrega" id="local_entrega" type="text" class="form-control" ></input>
			          			</div>

			         			 <div class="form-group col-md-12">
			            			<label for="message-text" class="col-form-label">Observações:</label>
			            			<textarea name="observacoes" id="observacoes" class="form-control" ></textarea>
			          			</div>	          			
			          		</div>

						</div>
						<input name="produto" nome="produto" id="produto" type="hidden" class="form-control" >
						<input name="quantidade" nome="quantidade" id="quantidade" type="hidden" class="form-control" >
						<input name="total" nome="total" id="total" type="hidden" class="form-control" >

						<div class="modal-footer">
					        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
					        <button type="submit" class="btn btn-warning" >Imprimir</button>
					    </div>
					    </form>

					  </div>
					 </div>
					</div>


<!-- CRIA O SCRIPT JQUERY PARA TRATAR DOS DADOS QUE VEEM COM A CHAMADA DA REQUIZIÇÃO DO MODAL -->
<script type="text/javascript">
$('#exampleModal').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget) // Button that triggered the modal

  var produto = button.data('produto')
  var quantidade = button.data('quantidade')
  var total = button.data('total')
  var nome = button.data('nome')
  var endereco = button.data('endereco')
  var bairro = button.data('bairro')
  var cidade = button.data('cidade')
  var estado = button.data('estado')
  var complemento = button.data('complemento')
  var cep = button.data('cep')
  var pontoreferencia = button.data('pontoreferencia')
  var tel1 = button.data('tel1')
  var tel2 = button.data('tel2')
  var email = button.data('email')
  var cpfcnpj = button.data('cpfcnpj')
  var rg = button.data('rg')
  var condominio = button.data('condominio')
  var blocoedificio = button.data('blocoedificio')
  var apartamento = button.data('apartamento')
  var local_entrega = button.data('local_entrega')
  var observacoes = button.data('observacoes')


  var modal = $(this)
  modal.find('.modal-title').text(nome)
  modal.find('#produto').val(produto)
  modal.find('#quantidade').val(quantidade)
  modal.find('#total').val(total)
  modal.find('#nome').val(nome)
  modal.find('#endereco').val(endereco)
  modal.find('#bairro').val(bairro)
  modal.find('#cidade').val(cidade)
  modal.find('#estado').val(estado)
  modal.find('#complemento').val(complemento)
  modal.find('#cep').val(cep)
  modal.find('#pontoreferencia').val(pontoreferencia)
  modal.find('#tel1').val(tel1)
  modal.find('#tel2').val(tel2)
  modal.find('#email').val(email)
  modal.find('#cpfcnpj').val(cpfcnpj)
  modal.find('#rg').val(rg)
  modal.find('#condominio').val(condominio)
  modal.find('#blocoedificio').val(blocoedificio)
  modal.find('#apartamento').val(apartamento)
  modal.find('#local_entrega').val(local_entrega)
  modal.find('#observacoes').val(observacoes)
})
</script>

<script type="text/javascript">
  var var1= document.getElementById("mensagem");
  setTimeout(function() {var1.style.visibility = "hidden";},3000)
</script>