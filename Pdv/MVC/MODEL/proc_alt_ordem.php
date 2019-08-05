<?php
include_once "conexao.php";
$array_atividade = $_POST['arrayordem'];

$cont_ordem = 1;
foreach($array_atividade as $id_atividade){
	$result_atividade = "UPDATE atividade SET ordem = $cont_ordem WHERE id = $id_atividade";
	$resultado_atividade = mysqli_query($conn, $result_atividade);	
	$cont_ordem++;
}
echo"<div class='alert alert-success' role='alert'>Editado com Sucesso !</div>";