<?php

session_start();

include_once 'conexao.php';

$despesa = $_POST['despesa'];

$data = $_POST['data'];

$valor = $_POST['valor'];



$insert_table = "INSERT INTO despesas (valor, despesa, data) VALUES ('$valor', '$despesa', '$data')";
$cadastra_despesa = mysqli_query($conn, $insert_table);

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> 

	<?php

	if(mysqli_affected_rows($conn)!=-1){

		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Pdv/?view=financeiro'>";
		$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Despesa Cadastrada com Sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	}else{

		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Pdv/?view=financeiro'>";	
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao Cadastrar Despesa <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	}?>

		
	</body>
</html>
<?php $conn->close(); ?>