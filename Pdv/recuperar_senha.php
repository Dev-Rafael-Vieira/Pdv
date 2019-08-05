<?php
session_start();

ini_set( 'display_errors', 0 );//oculta  erros

$login = $_POST['login'];

if ($login == null) {?>

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
                      <h1 style="color: red;">Recuperação de senha</h1>
                      <h1 class="h4 text-gray-900 mb-4">Pergunta Chave</h1>
                      <h6>Digite seu login em seguida responda a pergunta que voçê cadastrou quando criou seu perfil</h6>
                    </div>
                      <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                          <input type="checkbox" class="custom-control-input" id="customCheck">
                          
                        </div>
                      </div>
                    <form method="POST" action="">
                      <div class="form-group">
                        <input  class="form-control form-control-user text-center" name="login" id="login" aria-describedby="emailHelp" placeholder="Login">
                      </div>

                      <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                          <input type="checkbox" class="custom-control-input" id="customCheck">
                          
                        </div>
                      </div>
            <div class="col-12 text-center" id="mensagem" style="visibility: visible"><?php if (isset($_SESSION['msg'])) {echo $_SESSION['msg'];  unset($_SESSION['msg']); }?></div>

                      <button style="color: white;" type="submit" class="btn btn-danger btn-user btn-block">
                        Buscar
                      </button>
                      <hr>
                      
                    </form>
                    <hr>
                    <div class="text-center">
                      <a class="small" href="index.php">Voltar</a>
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


<?php
}else{

include_once 'mvc/model/conexao.php';

if ($login != null) {
  
  $select_table = "SELECT * FROM usuarios WHERE login LIKE '$login'";
  $verifica_tabela = mysqli_query($conn, $select_table);

  $verifica_tabela = mysqli_fetch_assoc($verifica_tabela );
  $pergunta = $verifica_tabela['pergunta'];
  $resposta = $verifica_tabela['resposta'];
  $senha = $verifica_tabela['senha'];

  $pergunta = utf8_encode($pergunta);
  $resposta = utf8_encode($resposta);
?>


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
                      <h1 style="color: red;">Recuperação de senha</h1>
                      
                      <h4><?php echo $pergunta;?></h4>
                    </div>
                       <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                          <input type="checkbox" class="custom-control-input" id="customCheck">
                          
                        </div>
                      </div>
                    <form method="POST" action="">
                      <div class="form-group">
                        <input  class="form-control form-control-user text-center" name="responder" id="responder" aria-describedby="emailHelp" placeholder="Resposta">
                        <input name="login" id="login" type="hidden" value="<?php echo $login; ?>">
                      </div>

                      <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                          <input type="checkbox" class="custom-control-input" id="customCheck">
                          
                        </div>
                      </div>
            <div class="col-12 text-center" id="mensagem" style="visibility: visible"><?php if (isset($_SESSION['msg'])) {echo $_SESSION['msg'];  unset($_SESSION['msg']); }?></div>

                      <button style="color: white;" type="submit" class="btn btn-danger btn-user btn-block">
                        Responder
                      </button>
                      <hr>
                      
                    </form>
                    <hr>
                    <div class="text-center">
                      <a class="small" href="index.php">Voltar</a>
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

<?php

$responder = $_POST['responder'];

if ($responder != null) {
  if($responder == $resposta){

    $i = $senha;
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Resposta certa ! Sua senha é :$senha </div>";
    header("Location: http://localhost/pdv/?view=Dashboard1");

  }else{
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Resposta errada ! <br> Não foi possivel recuperar a senha ! Tente outra vez</div>";
    header("Location: http://localhost/pdv/recuperar_senha.php");

      }
    }
  }
}
?>

<script type="text/javascript">
  var var1= document.getElementById("mensagem");
  setTimeout(function() {var1.style.visibility = "hidden";},5000)
</script>