<?php

session_start();

include "mvc/model/conexao.php";

$login = $_POST['login'];
$senha = $_POST['senha'];
$pergunta = $_POST['pergunta'];
$resposta = $_POST['resposta'];
$nivel = $_POST['nivel'];

if($nivel == 1){

	if($login != null && $senha != null && $pergunta != null && $resposta != null){
		$insert_table = "INSERT INTO usuarios (login, senha, nivel, pergunta, resposta) VALUES ('$login', '$senha', '1', '$pergunta', '$resposta')";
		$insert_table = mysqli_query($conn, $insert_table);

		$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Sucesso ao criar Administrador !</div>";
		header("Location: http://localhost/pdv/?view=Dashboard1");
	}else{


		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao criar Administrador, verifique se todos os campos foram preenchidos corretamente!</div>";
		header("Location: http://localhost/pdv/?view=Dashboard1");

	}

}if($nivel == 2){

	if($login != null && $senha != null && $pergunta != null && $resposta != null){
		$insert_table = "INSERT INTO usuarios (login, senha, nivel, pergunta, resposta) VALUES ('$login', '$senha', '2', '$pergunta', '$resposta')";
		$insert_table = mysqli_query($conn, $insert_table);

		$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Sucesso ao criar Administrador !</div>";
		header("Location: http://localhost/pdv/?view=Dashboard1");
	}else{


		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao criar Administrador, verifique se todos os campos foram preenchidos corretamente!</div>";
		header("Location: http://localhost/pdv/?view=Dashboard1");

	}

}if($nivel == 3){

	if($login != null && $senha != null && $pergunta != null && $resposta != null){
		$insert_table = "INSERT INTO usuarios (login, senha, nivel, pergunta, resposta) VALUES ('$login', '$senha', '3', '$pergunta', '$resposta')";
		$insert_table = mysqli_query($conn, $insert_table);

		$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Sucesso ao criar Administrador !</div>";
		header("Location: http://localhost/pdv/?view=Dashboard1");
	}else{


		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao criar Administrador, verifique se todos os campos foram preenchidos corretamente!</div>";
		header("Location: http://localhost/pdv/?view=Dashboard1");

	}

}









?>