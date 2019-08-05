<?php
session_start();
include_once 'conexao.php';

//verifica se o usuario clickou no botao
$SendCadCont = filter_input(INPUT_POST, 'cad_mesas', FILTER_SANTIZE_STRING);
if($SendCadCont){

	//recebe os dados do formulario
	$qnt_mesas = filter_input(INPUT_POST, 'qnt_mesas', FILTER_SANTIZE_STRING);
	$status = filter_input(INPUT_POST, 'status', FILTER_SANTIZE_STRING);

	//inserindo na tabela
	$result_msg_cont = "INSERT INTO mesas (num_mesa, status) VALUES (:qnt_mesas, :status)";

	$insert_msg_cont = $conn->prepare($result_msg_cont);
	$insert_msg_cont->bindParam(':qnt_mesa', '$qnt_mesa');
	$insert_msg_cont->bindParam(':status', '$status');

	if ($insert_msg_cont->execute()) {
		$_SESSION['msg'] = "<p style='color:green;'>Configuração feita !</p>";
		header("Location: Dashboard1.php");
	}else{
		$_SESSION['msg'] = "<p style='color:red;'>Configuração não foi possivel de ser feita !</p>";
		header("Location: http://localhost/pdv/?view=Dashboard1");
	}

}else{
	$_SESSION['msg'] = "<p style='color:red;'>Configuração não foi possivel de ser feita :(!</p>";
	header("Location: http://localhost/pdv/?view=Dashboard1");
}
?>