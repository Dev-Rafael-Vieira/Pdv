<?php
session_start();
include_once("conexao.php");
$result_events = "SELECT id, title, color, start, end FROM atividade";//se coecta com a base de dados e seleciona os campos
$resultado_events = mysqli_query($conn, $result_events);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset='utf-8' />
		<title>Agenda</title>
		<link href='css/bootstrap.min.css' rel='stylesheet'>
		<link href='css/fullcalendar.min.css' rel='stylesheet' />
		<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
		<link href='css/personalizado.css' rel='stylesheet' />
		<script src='js/jquery.min.js'></script>
		<script src='js/bootstrap.min.js'></script>
		<script src='js/moment.min.js'></script>
		<script src='js/fullcalendar.min.js'></script>
		<script src='locale/pt-br.js'></script>
		<script>
			$(document).ready(function() {
				$('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,agendaWeek,agendaDay,listWeek'
					},
					defaultDate: Date(),
					navLinks: true, // can click day/week names to navigate views
					editable: true,
					eventLimit: true, // permitir "mais" link quando muitos eventos
					eventClick: function(event) {
						
						$('#visualizar #id').text(event.id);//envio como texto
						$('#visualizar #id').val(event.id);//envio como valor para a edição
						$('#visualizar #title').text(event.title);
						$('#visualizar #title').val(event.title);
						$('#visualizar #start').text(event.start.format('DD/MM/YYYY HH:mm:ss'));
						$('#visualizar #start').val(event.start.format('DD/MM/YYYY HH:mm:ss'));
						$('#visualizar #end').text(event.end.format('DD/MM/YYYY HH:mm:ss'));
						$('#visualizar #end').val(event.end.format('DD/MM/YYYY HH:mm:ss'));
						$('#visualizar #color').val(event.color);
						$('#visualizar').modal('show');
						return false;

					},
					
					selectable: true,//tranforma o quadrinho do dia clickavel
					selectHelper: true,//tranforma o azul selecionavel na area de dia mais escuro
					select: function(start, end){//função recebe os dados de inicio e termino do evento
						$('#cadastrar #start').val(moment(start).format('DD/MM/YYYY HH:mm:ss'));//modela os dados
						$('#cadastrar #end').val(moment(end).format('DD/MM/YYYY HH:mm:ss'));
						$('#cadastrar').modal('show');	//apresenta o modal para inserção de dados						
					},
					events: [
						<?php
							while($row_events = mysqli_fetch_array($resultado_events)){//mysqli_fetch_array -Obtem uma linha do resultado como uma matriz associativa, numérica, ou ambas
								?>														//enquanto row_events estiver recebendo os indices da tabela do BD
								{
								id: '<?php echo $row_events['id']; ?>',
								title: '<?php echo $row_events['title']; ?>',		//
								start: '<?php echo $row_events['start']; ?>',
								end: '<?php echo $row_events['end']; ?>',
								color: '<?php echo $row_events['color']; ?>',
								},<?php
							}
						?>
					]
				});
			});
			
			//Mascara para o campo data e hora
			function DataHora(evento, objeto){
				var keypress=(window.event)?event.keyCode:evento.which;
				campo = eval (objeto);
				if (campo.value == '00/00/0000 00:00:00'){
					campo.value=""
				}
			 
				caracteres = '0123456789';
				separacao1 = '/';
				separacao2 = ' ';
				separacao3 = ':';
				conjunto1 = 2;
				conjunto2 = 5;
				conjunto3 = 10;
				conjunto4 = 13;
				conjunto5 = 16;
				if ((caracteres.search(String.fromCharCode (keypress))!=-1) && campo.value.length < (19)){
					if (campo.value.length == conjunto1 )
					campo.value = campo.value + separacao1;
					else if (campo.value.length == conjunto2)
					campo.value = campo.value + separacao1;
					else if (campo.value.length == conjunto3)
					campo.value = campo.value + separacao2;
					else if (campo.value.length == conjunto4)
					campo.value = campo.value + separacao3;
					else if (campo.value.length == conjunto5)
					campo.value = campo.value + separacao3;
				}else{
					event.returnValue = false;
				}
			}

 


		</script>
	</head>
	<body>

		<div class="container">
			<div class="page-header">
				<h1>Agenda</h1>
				<a  class="collapse-item" href="http://localhost/Pdv/?view=Dashboard1" style=" border-radius: 8px; font-size:18px;">Voltar</a>
			
			<div  id="mensagem" style="visibility: visible">
			<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			?>
			</div>
			</div>



		<script type="text/javascript">
			var var1= document.getElementById("mensagem");
			setTimeout(function() {var1.style.visibility = "hidden";},10000)
		</script>
		

		
			<div id='calendar'></div>
		</div>



		
		<div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title text-center">Dados do Evento</h4>
					</div>
					<div class="modal-body">
						<div class="visualizar">
							<dl class="dl-horizontal">
								<dt>ID do Evento</dt>
								<dd id="id"></dd>
								<dt>Titulo do Evento</dt>
								<dd id="title"></dd>
								<dt>Inicio do Evento</dt>
								<dd id="start"></dd>
								<dt>Fim do Evento</dt>
								<dd id="end"></dd>
							</dl>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									
									<button type="button" class="btn btn-cancelar-vis btn btn-info" data-dismiss="modal" aria-label="Close" >Cancelar</button>
									<button type="submit" class="btn btn-canc-vis btn-warning" >Editar</button>

								</div>
							</div>
						<div class="form-group">

							
							<label><label> </label><br>* confira todos os dados antes de confirmar !</label>
						</div>
						</div>




						<div class="form">
							<form class="form-horizontal" method="POST" action="proc_edit_evento.php"><!--chama o arquivo que vai editar o campo dentro do banco de dados-->
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Titulo</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="title" id="title" placeholder="Titulo do Evento">
									</div>
								</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Atvidade</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="atividade" placeholder="Atvidade a desenvolver">
								</div>
							</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Cor</label>
									<div class="col-sm-10">
										<select name="color" class="form-control" id="color">
											<option value="">Selecione</option>			
											<option style="color:#FFD700;" value="#FFD700">Amarelo</option>
											<option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
											<option style="color:#FF4500;" value="#FF4500">Laranja</option>
											<option style="color:#8B4513;" value="#8B4513">Marrom</option>	
											<option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
											<option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
											<option style="color:#A020F0;" value="#A020F0">Roxo</option>
											<option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>										
											<option style="color:#228B22;" value="#228B22">Verde</option>
											<option style="color:#8B0000;" value="#8B0000">Vermelho</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Data Inicial</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="start" id="start" onKeyPress="DataHora(event, this)">
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Data Final</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="end" id="end" onKeyPress="DataHora(event, this)">
									</div>
								</div>
								<input type="hidden" class="form-control" name="id" id="id"><!--envia o id para edição do banco de dados-->
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<!--<button type="button" class="btn btn-canc-edit  btn btn-dark">Cancelar</button>--><!--botao dentro do form precisa do type mas como nao é submit coloca-se button-->
										<button type="submit" class="btn btn-success">Salvar Alterações</button></form>


									</div>
								</div>

							
								
							<!-- parte da exclusão!-->


							<div class="form-group" >
								<form class="form-horizontal" method="POST" action="proc_delete_evento.php"><!--chama o arquivo que vai editar o campo dentro do banco de dados-->

									<input type="hidden" class="form-control" name="id" id="id"><!--envia o id para edição do banco de dados-->
									<input type="hidden" class="form-control" name="title" id="title">
									<input type="hidden" class="form-control" name="color" id="color">
									<input type="hidden" class="form-control" name="start" id="start">
									<input type="hidden" class="form-control" name="end" id="end">
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											
											
											<button type="button" class="btn btn-canc-edit  btn btn-info">Cancelar</button>
											<button type="submit" class="btn btn-danger">Excluir Evento!</button>

										</div>
									</div>
								</form>
							</div>


							<!-- parte da exclusão!-->


						</div>
					</div>
				</div>
			</div>
		</div>




		
		<div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title text-center">Cadastrar Evento</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" method="POST" action="proc_cad_evento.php"><!--chama o arqui php para cadastrar-->
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Titulo</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="title" placeholder="Titulo do Evento">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Atvidade</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="atividade" placeholder="Atvidade a desenvolver">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Cor</label>
								<div class="col-sm-10">
									<select name="color" class="form-control" id="color">
										<option value="">Selecione</option>			
										<option style="color:#FFD700;" value="#FFD700">Amarelo</option>
										<option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
										<option style="color:#FF4500;" value="#FF4500">Laranja</option>
										<option style="color:#8B4513;" value="#8B4513">Marrom</option>	
										<option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
										<option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
										<option style="color:#A020F0;" value="#A020F0">Roxo</option>
										<option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>										
										<option style="color:#228B22;" value="#228B22">Verde</option>
										<option style="color:#8B0000;" value="#8B0000">Vermelho</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Data Inicial</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="start" id="start" onKeyPress="DataHora(event, this)">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Data Final</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="end" id="end" onKeyPress="DataHora(event, this)">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-success">Cadastrar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	
		
		<script>
			$('.btn-canc-vis').on("click", function() {  //quando for clickado no btn-canc-vis (botao editar) no click chama a função
				$('.form').slideToggle(); // abre a classe form para edição dos dados
				$('.visualizar').slideToggle(); //fecha o classe visualizar(onde aparece o cadastro feito no db)btn btn-excluir-vis
			});


			$('.btn-canc-edit').on("click", function() { // botão que cancela a ediçaõ dos dados quando clicado retorna a visualização
				$('.visualizar').slideToggle();// abre a classe visualizar 
				$('.form').slideToggle(); // fecha aclasse for para edição
			});

		</script>
	</body>
</html>
