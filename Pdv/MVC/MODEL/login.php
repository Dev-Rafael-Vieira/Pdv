<?php
session_start();

include_once 'conexao.php';
$login = $_POST['login'];
$senha = $_POST['senha'];


if ($login != null && $senha != null) {
	$select_table = "SELECT * FROM usuarios WHERE login LIKE '$login'";
	$verifica_tabela = mysqli_query($conn, $select_table);

	$verifica_tabela = mysqli_fetch_assoc($verifica_tabela );

	if($verifica_tabela['senha'] == $senha && $verifica_tabela['login'] == $login){

		if($verifica_tabela['nivel'] == 1 || $verifica_tabela['nivel'] == 2){

			$_SESSION['login'] = 1;
			$_SESSION['user'] = $login;
			header("Location: http://localhost/pdv/?view=Dashboard1");
		}else{

			$_SESSION['login'] = 0;
			$_SESSION['msg'] = "<div class='alert alert-info' role='alert'>Sua senha e login estão corretos! <br> Porém voçê não tem acesso ao sistema pdv, somente ao aplicativo!</div>";
			header("Location: http://localhost/pdv/?view=Dashboard1");
		}


	}else{
		$_SESSION['login'] = 0;
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao fazer login <br> Verifique a sua senha e o seu login ! </div>";
		header("Location: http://localhost/pdv/?view=Dashboard1");
	}
}else{
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Não foi possivel fazer login pois a senha ou o login estão em branco ! </div>";
	header("Location: http://localhost/pdv/?view=Dashboard1");
}





?>