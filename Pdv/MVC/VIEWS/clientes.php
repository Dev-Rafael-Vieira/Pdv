<?php


include_once "mvc/model/conexao.php";

$tab_clientes = "SELECT * FROM clientes";

$clientes = mysqli_query($conn, $tab_clientes);

?>

<style type="text/css"> html{overflow-y:hidden;}</style><!--restira o scrow da pagina-->

<h1 class="display-12" >Clientes</h1>


<div class="row">


	<div class="col-4" id="mensagem" style="visibility: visible">	
			<?php
			

			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
				
			}
			?>
	</div>

	<div class="col-6" >
	</div>

	<div class="col-2" >
		<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalcad">Cadastrar Novo</button>

	</div>
			
</div>

		<!-- CONSTRUÇÃO DO MODAL DE CADASTRO -->
	<div class="modal fade bd-example-modal-xl" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title text-center" id="myModalLabel">	Cadastrar Um Novo Cliente </h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<!-- FIM DO CABEÇALHO DO MODAL DE CADASTRO -->
							
				</div>
				<div class="modal-body">

      				<!-- CRIA O FORMULÁRIO PARA CADASTRAR E ENVIAR PELO METODO POST PARA O SCRIPT "cadastrar_clientes.php" -->
        			<form method="POST" action="mvc/model/cadastrar_cliente.php">
        			<div class="row">
	          			<div class="form-group col-md-4">
	            			<label for="recipient-name" class="col-form-label">Nome do Cliente:</label>
	            			<input name="nome" type="text" class="form-control" >
	          			</div>

	          			<div class="form-group col-md-6">
	            			<label for="message-text" class="col-form-label">Endereço (Rua e Número):</label>
	            			<input name="endereco" type="text" class="form-control" >
	          			</div>
	          			<div class="form-group col-md-2">
	            			<label for="recipient-name" class="col-form-label">Bairro:</label>
	            			<input name="bairro" type="text" class="form-control" >
	          			</div>	          				          			
	          			<div class="form-group col-md-4">
	            			<label for="recipient-name" class="col-form-label">Cidade:</label>
	            			<input name="cidade" type="text" class="form-control" >
	          			</div>
	          			<div class="form-group col-md-2">
	            			<label for="recipient-name" class="col-form-label">Estado:</label>
	            			<input name="estado" type="text" class="form-control" >
	          			</div>
	          			<div class="form-group col-md-4">
	            			<label for="recipient-name" class="col-form-label">Complemento:</label>
	            			<input name="complemento" type="text" class="form-control" >
	          			</div>
	          			<div class="form-group col-md-2">
	            			<label for="recipient-name" class="col-form-label">CEP:</label>
	            			<input name="cep" type="text" class="form-control" >
	          			</div>
	          			<div class="form-group col-md-4">
	            			<label for="recipient-name" class="col-form-label">Ponto de Referência:</label>
	            			<input name="pontoreferencia" type="text" class="form-control" id="compra">
	          			</div>	          				          			
	          			<div class="form-group col-md-2">
	            			<label for="recipient-name" class="col-form-label">Telefone #1:</label>
	            			<input name="tel1" type="text" class="form-control" id="validade">
	          			</div>
	          			<div class="form-group col-md-2">
	            			<label for="recipient-name" class="col-form-label">Telefone #2:</label>
	            			<input name="tel2" type="text" class="form-control" >
	          			</div>
	          			<div class="form-group col-md-4">
	            			<label for="recipient-name" class="col-form-label">E-Mail</label>
	            			<input name="email" type="text" class="form-control" >
	          			</div>
	          			<div class="form-group col-md-2">
	            			<label for="recipient-name" class="col-form-label">CPF/CNPJ:</label>
	            			<input name="cpfcnpj" type="text" class="form-control" >
	          			</div>
	          			<div class="form-group col-md-2">
	            			<label for="recipient-name" class="col-form-label">RG:</label>
	            			<input name="rg" type="text" class="form-control" >
	          			</div>	          				          			
	         			 <div class="form-group col-md-4">
	            			<label for="message-text" class="col-form-label">Condomínio:</label>
	            			<input name="condominio" type="text" class="form-control" ></input>
	          			</div>	
	         			 <div class="form-group col-md-2">
	            			<label for="message-text" class="col-form-label">Bloco/Edifício:</label>
	            			<input name="blocoedificio" type="text" class="form-control" ></input>
	          			</div>
	         			 <div class="form-group col-md-2">
	            			<label for="message-text" class="col-form-label">Apartamento:</label>
	            			<input name="apartamento" type="text" class="form-control" ></input>
	          			</div>

	         			 <div class="form-group col-md-12">
	            			<label for="message-text" class="col-form-label">Local de Entrega:</label>
	            			<input name="localentrega" type="text" class="form-control" ></input>
	          			</div>
	         			 <div class="form-group col-md-12">
	            			<label for="message-text" class="col-form-label">Observações:</label>
	            			<textarea name="observacoes" class="form-control" ></textarea>
	          			</div>	          			
	          		</div>
          			          			          			
	      			<div class="modal-footer">
	        			
	        			<button type="submit" class="btn btn-success">Cadastrar</button>
	      			</div>

        			</form>

				</div>
			</div>
			<!-- FIM DO CORPO DA MENSAGEM DO MODAL DE CADASTRO -->
		</div>
	</div>

	<label></label>
	<h4>  Relação de Clientes :</h4>
      <div class="table-responsive" style="overflow: auto; height: 650px">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Nome</th>
              <th>Endereço</th>  
              <th>Bairro</th>
              <th>Cidade</th>
              <th>CEP</th>
              <th>Telefone #1</th>
              <th>Telefone #2</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>
          	<?php
          	$num = 0;

          	while($rows_clientes = mysqli_fetch_assoc($clientes)) {// mysqli_fetch_assoc senpre retorna um array associaivo
          		$num +=1;

          		?>
            <tr>
            	<td><?php echo $num?></td>
            	<td><?php echo $rows_clientes['nome']?></td>
            	<td><?php echo $rows_clientes['endereco']?></td>
            	<td><?php echo $rows_clientes['bairro']?></td>
            	<td><?php echo $rows_clientes['cidade']?></td>
            	<td><?php echo $rows_clientes['cep']?></td>
            	<td><?php echo $rows_clientes['tel1']?></td>
            	<td><?php echo $rows_clientes['tel2']?></td>
            	<td>
	            	<button type="button" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#myModal<?php echo $rows_clientes['id']; ?>">Visualizar</button>


	            	<button type="button" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#exampleModal" 
		            	data-id="<?php echo $rows_clientes['id']; ?>"
		            	data-nome="<?php echo $rows_clientes['nome']; ?>" 
		            	data-endereco="<?php echo $rows_clientes['endereco']; ?>" 
		            	data-bairro="<?php echo $rows_clientes['bairro']; ?>" 
		            	data-cidade="<?php echo $rows_clientes['cidade']; ?>"
		            	data-estado="<?php echo $rows_clientes['estado']; ?>"
		            	data-complemento="<?php echo $rows_clientes['complemento']; ?>"
		            	data-cep="<?php echo $rows_clientes['cep']; ?>"
		            	data-ponto_referecia="<?php echo $rows_clientes['ponto_referecia']; ?>"
		            	data-tel1="<?php echo $rows_clientes['tel1']; ?>"
		            	data-tel2="<?php echo $rows_clientes['tel2']; ?>"
		            	data-email="<?php echo $rows_clientes['email']; ?>"
		            	data-cpf_cnpj="<?php echo $rows_clientes['cpf_cnpj']; ?>"
		            	data-rg="<?php echo $rows_clientes['rg']; ?>"
		            	data-condominio="<?php echo $rows_clientes['condominio']; ?>"
		            	data-bloco="<?php echo $rows_clientes['bloco']; ?>"
		            	data-apartamento="<?php echo $rows_clientes['apartamento']; ?>"
		            	data-local_entrega="<?php echo $rows_clientes['local_entrega']; ?>"
		            	data-observacoes="<?php echo $rows_clientes['observacoes']; ?>">
		            	Editar
		        	</button>


	            	<button type="button" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#excluirModal<?php echo $rows_clientes['id']; ?>" >Excluir</button>
	            	
				</td>
            </tr>

				<!-- CONSTRUÇÃO DO MODAL DE VIZUALIZAÇÃO -->
			<div class="modal fade bd-example-modal-xl" id="myModal<?php echo $rows_clientes['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog modal-xl" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title text-center" id="myModalLabel"><b><?php echo $rows_clientes['nome']; ?></b></h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<!-- FIM DO CABEÇALHO DO MODAL DE VIZUALIZAÇÃO -->

							
						</div>
						<div class="modal-body">
							<p><b>Nome: </b><?php echo $rows_clientes['nome']; ?></p>
							<p><b>Endereço: </b><?php echo $rows_clientes['endereco']; ?></p>
							<p><b>Bairro: </b><?php echo $rows_clientes['bairro']; ?></p>
							<p><b>Cidade: </b><?php echo $rows_clientes['cidade']; ?></p>
							<p><b>Estado: </b><?php echo $rows_clientes['estado']; ?></p>
							<p><b>Complemento: </b><?php echo $rows_clientes['complemento']; ?></p>
							<p><b>Cep: </b><?php echo $rows_clientes['cep']; ?></p>
							<p><b>Ponto de Referência: </b><?php echo $rows_clientes['ponto_referecia']; ?></p>
							<p><b>Telefone #1: </b><?php echo $rows_clientes['tel1']; ?></p>
							<p><b>Telefone #2: </b><?php echo $rows_clientes['tel2']; ?></p>
							<p><b>E-Mail: </b><?php echo $rows_clientes['email']; ?></p>
							<p><b>CPF / CNPJ: </b><?php echo $rows_clientes['cpf_cnpj']; ?></p>
							<p><b>RG: </b><?php echo $rows_clientes['rg']; ?></p>
							<p><b>Condomínio: </b><?php echo $rows_clientes['condominio']; ?></p>
							<p><b>Bloco / Edifício: </b><?php echo $rows_clientes['bloco']; ?></p>
							<p><b>Aparatmento: </b><?php echo $rows_clientes['apartamento']; ?></p>
							<p><b>Local de Entrega: </b><?php echo $rows_clientes['local_entrega']; ?></p>
							<p><b>Observações: </b><?php echo $rows_clientes['observacoes']; ?></p>

						</div>
					</div>
					<!-- FIM DO CORPO DA MENSAGEM DO MODAL DE VIZUALIZAÇÃO --> 
				</div>
			</div>


				<!-- CONSTRUÇÃO DO MODAL DE EXCLUZÃO -->
			<div class="modal fade bd-example-modal-xl" id="excluirModal<?php echo $rows_clientes['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog modal-xl" role="document">

					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title text-center" id="myModalLabel"><b>Excluir o Iten <?php echo $rows_clientes['id']; ?> da sua lista de Clientes?</b></h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<!-- FIM DO CABEÇALHO DO MODAL DE EXCLUZÃO -->
												
						</div>

						<div class="modal-body">
							
							<p><b>Nome: </b><?php echo $rows_clientes['nome']; ?></p>
							<p><b>Endereço: </b><?php echo $rows_clientes['endereco']; ?></p>
							<p><b>Bairro: </b><?php echo $rows_clientes['bairro']; ?></p>
							<p><b>Cidade: </b><?php echo $rows_clientes['cidade']; ?></p>
							<p><b>Estado: </b><?php echo $rows_clientes['estado']; ?></p>
							<p><b>Complemento: </b><?php echo $rows_clientes['complemento']; ?></p>
							<p><b>Cep: </b><?php echo $rows_clientes['cep']; ?></p>
							<p><b>Ponto de Referência: </b><?php echo $rows_clientes['ponto_referecia']; ?></p>
							<p><b>Telefone #1: </b><?php echo $rows_clientes['tel1']; ?></p>
							<p><b>Telefone #2: </b><?php echo $rows_clientes['tel2']; ?></p>
							<p><b>E-Mail: </b><?php echo $rows_clientes['email']; ?></p>
							<p><b>CPF / CNPJ: </b><?php echo $rows_clientes['cpf_cnpj']; ?></p>
							<p><b>RG: </b><?php echo $rows_clientes['rg']; ?></p>
							<p><b>Condomínio: </b><?php echo $rows_clientes['condominio']; ?></p>
							<p><b>Bloco / Edifício: </b><?php echo $rows_clientes['bloco']; ?></p>
							<p><b>Aparatmento: </b><?php echo $rows_clientes['apartamento']; ?></p>
							<p><b>Local de Entrega: </b><?php echo $rows_clientes['local_entrega']; ?></p>
							<p><b>Observações: </b><?php echo $rows_clientes['observacoes']; ?></p>
								
								<div class="modal-footer">
          							<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
									<a href="mvc/model/exclui_clientes.php?id=<?php echo $rows_clientes['id']; ?>"><button type="button" class="btn btn-xs btn-danger">Excluir</button></a>
								</div>

								</div>

						</div>
					</div>
					<!-- FIM DO CORPO DA MENSAGEM DO MODAL DE EXCLUZÃO -->
					          

				</div>
			</div>


				<?php } ?>        

          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>


				<!-- CONSTRUÇÃO DO MODAL DE EDIÇÃO -->
				<div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-xl" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Clientes</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
						<div class="modal-body">

		      				<!-- CRIA O FORMULÁRIO PARA CADASTRAR E ENVIAR PELO METODO POST PARA O SCRIPT "cadastrar_produtos.php" -->
		        			<form method="POST" action="mvc/model/edita_cliente.php">
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
			            			<input name="localentrega" id="localentrega" type="text" class="form-control" ></input>
			          			</div>

			         			 <div class="form-group col-md-12">
			            			<label for="message-text" class="col-form-label">Observações:</label>
			            			<textarea name="observacoes" id="observacoes" class="form-control" ></textarea>
			          			</div>	          			
			          		</div>
				          <!--cria um campo invisivel "hidden" para pegar o id "id_Produto"-->
				          <input name="id" type="hidden" id="id">

					      <div class="modal-footer">
					        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
					        <button type="submit" class="btn btn-warning">Editar</button>
					      </div>

				        </form>
				      </div>
				    </div>
				  </div>
				</div>



<script type="text/javascript">
	var var1= document.getElementById("mensagem");
	setTimeout(function() {var1.style.visibility = "hidden";},5000)
</script>


<!-- CRIA O SCRIPT JQUERY PARA TRATAR DOS DADOS QUE VEEM COM A CHAMADA DA REQUIZIÇÃO DO MODAL -->
<script type="text/javascript">
$('#exampleModal').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget) // Button that triggered the modal

  var id = button.data('id')
  var nome = button.data('nome')
  var endereco = button.data('endereco')
  var bairro = button.data('bairro')
  var cidade = button.data('cidade')
  var estado = button.data('estado')
  var complemento = button.data('complemento')
  var cep = button.data('cep')
  var pontoreferencia = button.data('ponto_referecia')
  var tel1 = button.data('tel1')
  var tel2 = button.data('tel2')
  var email = button.data('email')
  var cpf_cnpj = button.data('cpf_cnpj')
  var rg = button.data('rg')
  var condominio = button.data('condominio')
  var bloco = button.data('bloco')
  var apartamento = button.data('apartamento')
  var local_entrega = button.data('local_entrega')
  var observacoes = button.data('observacoes')


  var modal = $(this)
  modal.find('.modal-title').text(nome)
  modal.find('#id').val(id)
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
  modal.find('#cpfcnpj').val(cpf_cnpj)
  modal.find('#rg').val(rg)
  modal.find('#condominio').val(condominio)
  modal.find('#blocoedificio').val(bloco)
  modal.find('#apartamento').val(apartamento)
  modal.find('#local_entrega').val(local_entrega)
  modal.find('#observacoes').val(observacoes)
})
</script>


