
<link href="../common/css/bootstrap.min.css" rel="stylesheet"/>
  <?php

  session_start();

  $pass = $_POST['senha'];

  $login = $_POST['login'];
    
    include_once "../model/conexao.php";

    $tab_mesas = "SELECT * FROM mesas";

    $mesas = mysqli_query($conn, $tab_mesas);

    $tab_usuarios = "SELECT * FROM usuarios WHERE login = '$login' AND senha ='$pass' ";

    $usuarios = mysqli_query($conn, $tab_usuarios);

    $usuario = mysqli_fetch_assoc($usuarios);

    if(isset($usuario)){
      $_SESSION['loginapp'] = 1;
      $_SESSION['usuarioid'] = $usuario['id'];
      header('Location: app_mesas.php');
      
    } else { ?> 


<h1 class="text-center" style=" color: red; padding: 20%;">Acesso Negado !</h1>
<h4 class="text-center" style=" color:white; background:  black; ">SENHA OU LOGIN ERRADO</h4>
<h5 class="text-center" style=" color:white;background:  black; ">click no botão e tente novamente</h5>
<h1 class="text-center" style=" color: red; padding: 5%;"></h1>

<h1 class="text-center" style=" color: red; padding: 5%;"><button class="text-center btn btn-warning btn-lg" type="button" class="btn btn-warning" onclick="window.location.href='app_login.php'">Voltar</button></h1>

<?php } ?>


  <script src="../common/js/jquery-3.3.1.slim.min.js" ></script>
  <script src="../common/js/popper.min.js" ></script>
  <script src="../common/js/bootstrap.min.js" ></script>