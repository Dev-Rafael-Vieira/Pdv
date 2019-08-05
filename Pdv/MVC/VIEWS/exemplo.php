
<h1 class="display-12">Mesas</h1>

  <?php
    echo date('h:i:s').'<br />';
    include_once "mvc/model/conexao.php";

    $tab_mesas = "SELECT * FROM mesas";

    $mesas = mysqli_query($conn, $tab_mesas);

    if (isset($_SESSION['msg'])) {
    	echo $_SESSION['msg'];
    	unset($_SESSION['msg']);
    }

  ?>
  <meta charset="utf-8">

  <div class="row">

  <?php

    $mesas_vazias = 0;
    $mesas_atendidas = 0;
    $mesas_aguardando = 0;

    while($rows_mesas = mysqli_fetch_assoc($mesas)){
      
      $nome = utf8_encode($rows_mesas['nome']);
      $id_mesa = $rows_mesas['id_mesa'];
     

      $tab_pedido = "SELECT * FROM pedido" ;
      $pedido = mysqli_query($conn, $tab_pedido);
      $rows_pedido = mysqli_fetch_assoc($pedido);
      $prod = $rows_pedido['hora_pedido'];
      var_dump($prod);
      

      if ($rows_mesas['status'] == 1) {
        $cor='card bg-success';
        $mesas_vazias += 1;
        $link_mesas = "mesasLivres";

      }if ($rows_mesas['status'] == 2) {
        $cor='card bg-danger';
        $mesas_aguardando += 1;
        $link_mesas = "mesasLivres";

      }if ($rows_mesas['status'] == 3) {
        $cor='card bg-warning';
        $mesas_atendidas += 1;
        $link_mesas = "mesasLivres";
      }

    //}
  ?>


<div class="col-lg-1 ">
  <div class=" <?php echo $cor; ?> text-white shadow">
    <div class="card-body"  style="text-align: center;">
        <h4 class="mb-10 text-center">Mesa <?php echo $id_mesa; ?></h4> 

        <button type="button" class="btn  btn-outline-light" style="text-align: center;" data-toggle="modal" data-target="#mesasLivres"
              
          data-idmesa="<?php echo $rows_mesas['id_mesa']; ?>"
          data-nomemesa="<?php echo $rows_mesas['nome']; ?>"


        > Abrir </button>
    </div>
  </div>
</div>


  <?php }?>
     

</div>

<h5>Legenda:</h5>

<div class="row"> 
                    
  <button type="button" class="btn btn-success  btn-lg " data-toggle="modal" data-target="#totalMesasLivres" >Mesas Livres:<?php echo" ( $mesas_vazias ) ";?></button>

  <button type="button" class="btn btn-warning  btn-lg " data-toggle="modal" data-target="#totalMesasAtendidas" >Mesas Atendidas:<?php echo" ( $mesas_atendidas ) ";?></button>

  <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#totalMesasAguardando" >Mesas Aguardando:<?php echo" ( $mesas_aguardando ) ";?></button>




</div>




    <!-- CONSTRUÇÃO DO MODAL DE EDIÇÃO -->
    <div class="modal fade bd-example-modal-xl" id="mesasLivres" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Produto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- CRIA O FORMULÁRIO PARA APRESENTRAÇÃO E ENVIA PELO METODO POST PARA O SCRIPT "edita_produtos.php" -->
            <form method="POST" action="mvc/model/edita_produtos.php">
              <div class="row">

                <div class="form-group col-md-4">
                  <label for="recipient-name" class="col-form-label">Nome:</label>
                  <input name="nome" type="text" class="form-control" id="recipient-name">
                </div>

                <!--cria um campo invisivel "hidden" para pegar o id "id_Produto"-->
                <input name="id" type="hidden" id="id_Produto">

                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-warning">Editar</button>
                </div>
              </div>

            </form>
          </div>
         </div>
      </div>
    </div>




  <!-- CRIA O SCRIPT JQUERY PARA TRATAR DOS DADOS QUE VEEM COM A CHAMADA DA REQUIZIÇÃO DO MODAL -->
  <script type="text/javascript">
  $('#mesasLivres').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget) // Button that triggered the modal

    var recipient = button.data('idmesa')
    var recipientnome = button.data('nomemesa')



    var modal = $(this)
    modal.find('.modal-title').text('Editar Produto ID:  ' + recipient)
    modal.find('#id_Produto').val(recipient)
    modal.find('#recipient-name').val(recipientnome)
    
  })
  </script>
