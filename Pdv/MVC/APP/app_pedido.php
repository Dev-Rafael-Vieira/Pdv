
<link href="../common/css/bootstrap.min.css" rel="stylesheet"/>



<?php
  session_start();
  
   $categoria = $_GET['categoria'];
   $mesa = $_GET['mesa'];
   $cliente = $_GET['cliente'];
   $id = $_GET['id'];


   include_once "../model/conexao.php";

   $tab_produtos = "SELECT * FROM produtos WHERE categoria = '$categoria'";

   $produtos = mysqli_query($conn, $tab_produtos);


    $i = $_SESSION['loginapp'];

    if($i == 1){


   ?>

<div class="row" style="background: #2d3339; height: 13%;">

  <h3 class="mb-12 " style="background: #2d3339; width: 5%; " ></h3>
  <a style="background: #2d3339; height: 100%; width: 23%; color: white; " type="button" href="app_categoria.php?id=<?php echo $id; ?>" class="btn btn-outline-light"><h4>voltar</h4></a>
  <h3 class="mb-12 " style="background: #2d3339; width: 16%; " ></h3>

  <h4  class="mb-12 text-center" style="color: white; width: 20%; ">Mesa <?php echo $id; ?></h4>

<h3 class="mb-12 " style="background: #2d3339; width: 36%; " ></h3>


</div>
<div class="mb-12 " style=" height: 5%;" ></div>


 <h3 class="col-lg-6 text-center" style="color: black;"><?php echo $categoria; ?></h3>
  
    <table class="table">
      <thead>
        <tr>
          
          <th class="col-lg-1 "><b>Nome</b> </th>
          <th class="col-lg-1 "><b>Estq</b> </th>
          <th class="col-lg-1 "><b>Preço Unitário</b> </th>
          <th class="col-lg-1 "><b>Add</b> </th>
        </tr>
      </thead>


<?php
    while($rows_produtos = mysqli_fetch_assoc($produtos)){?>
      <tbody>
        <tr>
          
          <td style="color: #ac4549;"><b><?php echo $rows_produtos['nome'];?></b></td>
          
          <td><?php echo $rows_produtos['estoque_atual'];?></td>
          <td>R$ <?php echo $rows_produtos['preco_venda'];?></td>
          <td>

            <form method="GET" action="app_finalizar.php">

              <input type="hidden" name="id_produto" id="id_produto" value="<?php echo $rows_produtos['id']; ?>">
              <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
              <input type="hidden" name="nome" id="nome" value="<?php echo $rows_produtos['nome']; ?>">
              <input type="hidden" name="mesa" id="mesa" value="<?php echo $mesa; ?>">
              <input type="hidden" name="preco" id="preco" value="<?php echo $rows_produtos['preco_venda']; ?>">
              <input type="hidden" name="cliente" id="cliente" value="<?php echo $cliente; ?>">
              <input type="hidden" name="categoria" id="categoria" value="<?php echo $categoria; ?>">
              <button type="submit" class="btn btn-danger btn-icon-split btn-sm" >+</button>

            </form>

          </td>
        </tr>
      </tbody>
   <?php } ?>


    </table>


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