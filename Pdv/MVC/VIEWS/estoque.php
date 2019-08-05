<h1 class="text-center" style="color: red; padding: 15px;">Produtos com Estoque Baixo!</h1>

<?php
 	include_once "mvc/model/conexao.php";


	$tab_produtos = "SELECT * FROM produtos";

	$produtos = mysqli_query($conn, $tab_produtos);

	while($rows_produtos = mysqli_fetch_assoc($produtos)) {
		if($rows_produtos['estoque_atual'] < $rows_produtos['estoque_minimo']){
?>


<h3 class="text-center" style="padding: 3px;"><?php echo $rows_produtos['nome']?>&nbsp;&nbsp; - &nbsp;&nbsp;(<?php echo $rows_produtos['estoque_atual']?>) Unidades</h3>


<?php 
	}
}
?>