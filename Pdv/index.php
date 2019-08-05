<?php
ini_set( 'display_errors', 0 );//oculta  erros

session_start();

  $servidor = "localhost";
  $usuario = "root";
  $senha = "";
  $dbname = "pdv";


  $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

$select_table = "SELECT * FROM cor WHERE id LIKE '1'";
$verifica_tabela = mysqli_query($conn, $select_table);
$verifica_tabela = mysqli_fetch_assoc($verifica_tabela);
$cor = $verifica_tabela['cor'];
$_SESSION['cor'] = $cor;





if($_SESSION['login'] == 0){?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>e-Comandas</title>

  <link href="mvc/common/css/animate.min.css" rel="stylesheet"/><!--ESTE COMANDO CRIA A NOTIFICAÇÃO ANIMADA  -->
  <link href="mvc/common/css/bootstrap-datepicker.css" rel="stylesheet"/>

  <link rel="shortcut icon"  href="mvc/common/img/beer.png"><!--este comando muda o icone da janela-->

  <!-- Custom fonts for this template-->
  <link href="mvc/common/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  


  <!-- Custom styles for this template-->
  <link href="mvc/common/css/sb-admin-2.min.css" rel="stylesheet">
  
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 style="color: red;">Sistema e-Comandas</h1>
                    <h1 class="h4 text-gray-900 mb-4">Bem-Vindo!</h1>
                    <h6 style="padding: 15px;">Digite sua senha e seu login para ter acesso ao sistema !</h6>
                  </div>
                  <form method="POST" action="mvc/model/login.php">
                    <div class="form-group">
                      <input  class="form-control form-control-user text-center" name="login" id="login" aria-describedby="emailHelp" placeholder="Digte seu login...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user text-center" name="senha" id="senha" placeholder="Senha">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        
                      </div>
                    </div>
					<div class="col-12 text-center" id="mensagem" style="visibility: visible"><?php if (isset($_SESSION['msg'])) {echo $_SESSION['msg'];  unset($_SESSION['msg']); }?></div>

                    <button style="color: white;" type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <hr>
                    
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="recuperar_senha.php">Esquceu a Senha?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="criar_senha.php">Cadastrar Administrador</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>



</body>

</html>






<?php }elseif($_SESSION['login'] == 1){
	include('mvc/classes/system.class.php');

	if (isset($_GET['view'])) {
		$view = $_GET['view'];
	}
	else{

		$view = 'Dashboard1';
		//carrega uma pagina de erro ou em branco
	}


	$system = new System($view);
	}


 ?>