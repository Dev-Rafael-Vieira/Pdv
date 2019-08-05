<?php 
include "mvc/model/conexao.php";

$select_table = "SELECT * FROM usuarios WHERE nivel LIKE '1'";
$select_table = mysqli_query($conn, $select_table);
$select_table = mysqli_fetch_assoc($select_table);
//var_dump($select_table['login']) ;
if($select_table['login'] != null){
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
                      <h1 style="color: red;">Criação de Administrador não autorzada!</h1>
                      <h1 class="h4 text-gray-900 mb-4">Já existe um administrador do sistema</h1>
                      <h5>Só pode haver um admistrador do sistema ! é ele quem cadastra novos usuários, entre em contato com ele para adicioná-lo<br>Caso seja voçê o administrador e tenha esquecido a senha, click no botão abaixo e responda a pergunta chave que foi cadastrada no momento da criação do seu login</h5>
                    </div>

                    <form method="POST" action="recuperar_senha.php">


                      <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                          <input type="checkbox" class="custom-control-input" id="customCheck">
                          
                        </div>
                      </div>

                      <button style="color: white;" type="submit" class="btn btn-danger btn-user btn-block">
                        Recuperar Senha
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
<?php }else{?>

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
                      <h1 style="color: red;">Criar Administrador</h1>
                      <h1 class="h4 text-gray-900 mb-4">Cadastrar um administrador para o sistema!</h1>
                      <h5>Preencha os campos abaixo com um Login e uma senha, depois escreva uma pergunta que só você saiba responder. Ela será usada como segurança para que voçê possa recuperar sua senha </h5>
                    </div>

                    <form method="POST" action="cadastrar_administrador.php">
                    	<label></label>
                    	<input name="login" type="text" class="form-control text-center" placeholder="LOGIN">
                    	<label></label>
                    	<input name="senha" type="text" class="form-control text-center" placeholder="SENHA">
                    	<label></label>
                    	<textarea name="pergunta" type="text" class="form-control text-center" placeholder="Escreva uma pergunta" ></textarea>
                    	<label></label>
                    	<input name="resposta" type="text" class="form-control text-center" placeholder="RESPOSTA">
                    	<input name="nivel" type="hidden" value="1">


                      <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                          <input type="checkbox" class="custom-control-input" id="customCheck">
                          
                        </div>
                      </div>

                      <button style="color: white;" type="submit" class="btn btn-danger btn-user btn-block">
                        Criar Administrador
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

 <?php }?>