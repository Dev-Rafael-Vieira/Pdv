<?php

	include_once 'conexao.php';

	$end = date('Y-m-d'.' 01:00:00');//variavel necessarioa para poder fazer acaptura com click


	$title = mysqli_real_escape_string($conn, $_POST['title']);// proteção contra sql injection
	$atividade = mysqli_real_escape_string($conn, $_POST['atividade']);
	$hoje = mysqli_real_escape_string($conn, $_POST['hoje']);
	$res = mysqli_query($conn,"SELECT MAX(ordem) FROM atividade");
	$row = mysqli_fetch_array($res);
	$ordem = $row[0];
	$ordem = $ordem +1;
	
	if(empty($title)){
	$title = 'Compromisso';
	}

	if(empty($atividade)){
	$atividade = 'Uma Atividade cadastrada para Hoje';
	}

	$insert_table = "INSERT INTO atividade (title, atividade, ordem, condicao, start, color, end) VALUES ('$title', '$atividade', '$ordem', '1', '$hoje', '#084b39', '$end')";	
	$produtos_editados = mysqli_query($conn, $insert_table);
	header("Location: http://localhost/pdv/?view=cards");

	$conn->close();

?> 