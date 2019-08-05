<?php

include "mvc/model/conexao.php";

?>

<!DOCTYPE html>

<html lang="pt-br">

  <head>
    <meta charset="utf-8">
  </head>

  <body>

    <div class="row">

      <h2 class="col-4">Atividades do dia - <?php echo date('d/m/y');?></h2>

      <div class="col-6"></div>

      <div class="col-2" >

        <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalcad">Novo Evento Hoje</button>
    
      </div>
    
    </div>

    <label></label>
    <div class="row">
      <div class="col-4" ></div>
      <div class="col-4 text-center" id="msg" style="font-size: 22px"></div>
      <div class="col-4" ></div>
    </div>

    <label></label>

    <label></label>

    <ul id="lista">
    <?php

      $hoje = date('y-m-d');
      $hj = date('d-m-y');
               
      $result_atividade = "SELECT * FROM atividade ORDER BY ordem ASC";//ORDER BY pega os itens do banco de dados na ordem em que foram gravados pela ultima vez
      $resultado_atividade = mysqli_query($conn, $result_atividade);

      while($row_atividade = mysqli_fetch_assoc($resultado_atividade)){
        $start = substr($row_atividade['start'], 2, -9) ;

        if($start == $hoje){
          if ($row_atividade['condicao'] == 1) {
            $status = 'danger';
            $text = 'Aguardando';
          }if ($row_atividade['condicao'] == 2){
            $status = 'warning';
            $text = 'Em Andamento';
          }if ($row_atividade['condicao'] == 3){
            $status = 'success';
            $text = 'Pronto';
          }
        ?>

    <div id="arrayordem_<?php echo $row_atividade['id']; ?>">
      <div class="col-xl-12 col-md-1 mb-2"><!-- indica o comprimento da linha no maximo col-xl-12 -->
        <div class="card border-left-<?php echo $status;?> shadow h-100 py-2"><!-- indica a cor da lateral-->
          <div class="card-body">
            <div class="row no-gutters ">
              <div class="col mr-1">
                <div class="text-sm text-<?php echo $status;?> text-uppercase mb-1"><?php echo $row_atividade['title'] .' - '. $hj;?></div><!-- indica a cor do texto letra maiuscula fonte bold-->
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row_atividade['atividade'];?></div><!-- indica a cor do texto letra maiuscula fonte bold-->
              </div>

              <div class="col-lg-4 mb-1" >
                <div>
                  <div class="card-body" >
                    <form method="POST" action="mvc/model/muda_status.php">
                      <input name="id" type="hidden" value="<?php echo $row_atividade['id'];?>">
                      <input name="condicao" type="hidden" value="<?php echo $row_atividade['condicao'];?>">
                      <div class="row">
                        <button type="submit" class="btn btn-<?php echo $status;?>" style="width: 170px; height: 50px;"><?php echo $text;?></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>                    
          </div>
        </div>
      </div>
    </div>

          <?php
        }
      }
      ?>
    </ul>
        
    <script>
      $(document).ready(function () {
        $(function () {
          $("#lista").sortable({update: function () {
            var ordem_atual = $(this).sortable("serialize");
            $.post("mvc/model/proc_alt_ordem.php", ordem_atual, function (retorno) {
              //Imprimir retorno do arquivo proc_alt_ordem.php
              $("#msg").html(retorno);
              //Apresentar a mensagem leve
              $("#msg").slideDown('slow');
              retirarMsg();
            });
          }
          });
        });
        //Retirar a mensagem após 1700 milissegundos
        function retirarMsg(){
          setTimeout( function (){
            $("#msg").slideUp('slow', function(){});
          }, 2700);
        }
      });
    </script>
  </body>
</html>
