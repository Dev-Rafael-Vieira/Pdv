<?php
$cor = $_POST['cor'];
$mesas = $_POST['mesas'];

include_once 'conexao.php';

if($cor != null){
	if($cor == 1){
		$cor = 'success';
	}if($cor == 2){
		$cor = 'danger';
	}if($cor == 3){
		$cor = 'warning';
	}if($cor == 4){
		$cor = 'info';
	}if($cor == 5){
		$cor = 'primary';
	}
	$insert_table = "UPDATE cor SET  cor = '$cor' WHERE id ='1'";
	//$insert_table = "INSERT INTO cor (id, cor) VALUES ('1', '$cor')";
	$insert_table = mysqli_query($conn, $insert_table);
}

if ($mesas != null) {
	$select_table = "SELECT id_mesa FROM mesas ORDER BY id DESC limit 1";
	$ultima_mesa = mysqli_query($conn, $select_table);
	$ultima_mesa = mysqli_fetch_assoc($ultima_mesa);
	//var_dump($ultima_mesa['id_mesa']);
	$i = $ultima_mesa['id_mesa'];
	if($mesas > $i){
		while($mesas > $i){
			$i++;
			$insert_table = "INSERT INTO mesas (id_mesa, status) VALUES ('$i', '1')";
			$insert_table = mysqli_query($conn, $insert_table);
		}
		

	}if($mesas < $i){
		while($mesas < $i){
			$exclude_table = "DELETE FROM mesas WHERE id_mesa = '$i'";
			$exclude_table = mysqli_query($conn, $exclude_table);
			$i--;
		}
		
	}
}
header("Location: http://localhost/pdv/?view=Dashboard1");
?>