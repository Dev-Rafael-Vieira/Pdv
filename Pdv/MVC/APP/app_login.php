<link href="../common/css/bootstrap.min.css" rel="stylesheet"/>

  <?php
    
    include_once "../model/conexao.php";

    $tab_usuarios = "SELECT * FROM usuarios";

    $usuarios = mysqli_query($conn, $tab_usuarios);

  ?>
<div class="container-fluid text-center" style="width: 100%; height: 100%; padding: 25%; background: black; color: white; "><h1>LOGIN</h1>
<div >
	
	<form method="POST" action="session.php">
        <div class="row">
	        <div class="form-group col-md-4">
	          <label for="recipient-name" class="col-form-label">Login</label>
	          <input name="login" id="login" type="text" class="form-control" >
	        </div>

	        <div class="form-group col-md-4">
	          <label for="recipient-name" class="col-form-label">Senha</label>
	          <input name="senha" id="senha" type="password" class="form-control" >
	        </div>
	    </div>
	    <button type="submit" class="btn btn-success">Cadastrar</button>
	</form>
</div>

  <script src="../common/js/jquery-3.3.1.slim.min.js" ></script>
  <script src="../common/js/popper.min.js" ></script>
  <script src="../common/js/bootstrap.min.js" ></script>