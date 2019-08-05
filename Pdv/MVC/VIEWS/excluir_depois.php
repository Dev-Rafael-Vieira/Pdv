<h1 class="text-center" >Controle Financeiro</h1>

<h5 class="text-center" style="padding: 3%;" >Selecione abaixo o mês e o ano que deseja consultar !</h5>
<hr>
<div class="text-center" style="font-size: 20px;">
<form method="POST" action="" >
  <input type="radio" name="mes" value="01"> Janeiro &nbsp;&nbsp; 
  <input type="radio" name="mes" value="02"> Fevereiro &nbsp;&nbsp; 
  <input type="radio" name="mes" value="03"> Março &nbsp;&nbsp; 
  <input type="radio" name="mes" value="04"> Abril &nbsp;&nbsp; 
  <input type="radio" name="mes" value="05"> Maio &nbsp;&nbsp; 
  <input type="radio" name="mes" value="06"> Junho &nbsp;&nbsp; 
  <input type="radio" name="mes" value="07"> Julho &nbsp;&nbsp; 
  <input type="radio" name="mes" value="08"> Agosto &nbsp;&nbsp; 
  <input type="radio" name="mes" value="09"> Setembro &nbsp;&nbsp; 
  <input type="radio" name="mes" value="10"> Outubro &nbsp;&nbsp; 
  <input type="radio" name="mes" value="11"> Novembro &nbsp;&nbsp; 
  <input type="radio" name="mes" value="12"> Dezembro &nbsp;&nbsp; 
  Ano:&nbsp;&nbsp;<input class="text-center" style="color: #858796; width: 100px;" type="text" name="ano" value="<?php echo date('Y')?>"> 
</div>
<hr>

  <div style="padding: 3%;" class="text-center"><input class="btn btn-outline-danger" type="submit" value="Selecionar Mês" ></div>
</form>

<?php
include_once "mvc/model/conexao.php";


$mes = $_POST['mes'];
$ano = $_POST['ano'];
$mes = "$mes".'/'."$ano";


?>
<h3 class="text-center" style="color: green; height: 50px;">Resultados para  <?php echo "$mes";?></h3>
<?php

$tab_vendas = "SELECT * FROM vendas WHERE data LIKE '%$mes'";
$vendas = mysqli_query($conn, $tab_vendas);

$tab_despesas = "SELECT * FROM despesas WHERE data LIKE '%$mes'";
$despesas = mysqli_query($conn, $tab_despesas);

echo "<hr>";?>

<h3 class="text-center" style="color: green; height: 50px;">Rendimentos</h3>

<table class="table table-striped table-sm">
	<thead>
		<tr>
			<th class="text-center">Data</th>
			<th class="text-center">Rendimento</th>
			<th class="text-center">Clienete</th>
			<th class="text-center">Valor</th>
			<th class="text-center">Categoria</th>
		</tr>
	</thead>
	<tbody>



<?php

$total1 = 0;

while($rows_vendas = mysqli_fetch_assoc($vendas)) {

	$data = $rows_vendas['data'];
	$rendimento = $rows_vendas['rendimento'];
	$cliente = $rows_vendas['cliente'];
	$valor = $rows_vendas['valor'];
	$total1+= $valor;
	
	?>


		<tr>
			<td class="text-center"><b><?php echo $data; ?></b></td>
			<td class="text-center"><?php echo $rendimento; ?></td>
			<td class="text-center"><?php echo $cliente; ?></td>
			<td class="text-center" style="color: green;">R$ <?php echo number_format($valor,2); ?></td>
			<td class="text-center"><div style="width: 100%; color: green;">Rendimento</div></td>
		</tr>

	<?php
}

?>

		<tr>
			<td class="text-center"></td>
			<td class="text-center"></td>
			<td class="text-center"></td>
			<td class="text-center"></td>
			<td class="text-center"></td>
		</tr>

		<tr>
			<td class="text-center"><h4 style="width: 100%; color: green;"><b>Total:</b></h4></td>
			<td class="text-center"></td>
			<td class="text-center"></td>
			<td class="text-center"><h4 style="width: 100%; color: green;"><b>R$ <?php echo number_format($total1,2); ?></b></h4></td>
			<td class="text-center"></td>
		</tr>

	</tbody>
</table>

<?php echo "<hr>";?>

<h3 class="text-center" style="color: red; height: 50px;">Despesas</h3>

<table class="table table-striped table-sm">
	<thead>
		<tr>
			<th class="text-center">Data</th>
			<th class="text-center">Despesa</th>
			<th class="text-center">Valor</th>
			<th class="text-center">Categoria</th>
		</tr>
	</thead>
	<tbody>

<?php

$total2 = 0;

while($rows_despesas = mysqli_fetch_assoc($despesas)){

	$data2 = $rows_despesas['data'];
	$despesa2 = $rows_despesas['despesa'];
	$valor2 = $rows_despesas['valor'];
	$total2+= $valor2;
	
	?>

		<tr>
			<td class="text-center"><b><?php echo $data2; ?></b></td>
			<td class="text-center"><b><?php echo $despesa2; ?></b></td>
			<td class="text-center" style="color: red;">R$ -<?php echo number_format($valor2,2) ; ?></td>
			<td class="text-center"><div style="width: 100%; color: red;">Despesa</div></td>
		</tr>
<?php
	}

?>

		<tr>
			<td class="text-center"></td>
			<td class="text-center"></td>
			<td class="text-center"></td>
			<td class="text-center"></td>
		</tr>

		<tr>
			<td class="text-center"><h4 style="width: 100%; color: red;"><b>Total:</b></h4></td>
			<td class="text-center"></td>
			<td class="text-center"><h4 style="width: 100%; color: red;"><b>R$ -<?php echo number_format($total2,2); ?></b></h4></td>
			<td class="text-center"></td>
		</tr>
				
	</tbody>
</table>

<?php

echo "<hr>";

$saldo = $total1 - $total2;

if ($saldo > 0) {
	?>

<h2 class="text-center" style="color: green; height: 50px;"><b>Saldo Mês: R$ <?php echo $saldo;?></b></h2>

<?php
	}else{
?>

<h2 class="text-center" style="color: red; height: 50px;"><b>Saldo Mês: R$ <?php echo $saldo;?></b></h2>

<?php
}
?>
