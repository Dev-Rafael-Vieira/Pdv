                        <!-- HEADER -->
          <!-- NESSA PARTE FICA O CONTEÚDO DA PÁGINA -->
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; </span>
            
              <a href="https://SeuSiteSC.com.br" class="text-decoration-none">SeuSiteSC 2019</a>
            
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

    <!--MADAIS DE SIDEBAR E HEADER-->

<div style="background: rgb(0,0,0,0.6);" class="modal fade" id="calculadora" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
        <div class="modal-content" style="background: #f4f0e5;" >
      <div class="modal-header">
  <div class="main" style=" padding: 40px; background: #B5B5B5; border-radius: 8px; ">
    <form name="form" >
      <input style="width: 310px; height: 60px; border-radius: 8px; font-size:26px; background: #e5e7da;" class="textview" name="textview">
      <h1 class="display-4" > -</h1>
  <script>
    
    function insert(num){
      document.form.textview.value = document.form.textview.value + num;
    }

    function equal(){
      var exp = document.form.textview.value;
      if (exp) {
        document.form.textview.value = eval(exp);
      }
    }

    function clean(){
      document.form.textview.value = "";
    }

    function back(){
      var exp = document.form.textview.value;
      document.form.textview.value = exp.substring(0, exp.length -1);
    }
    
    function rquad(num){
      var raiz = document.form.textview.value;
      var res = Math.sqrt(raiz);
      document.form.textview.value = eval(res);

    }

    function exponecial(num){

      var val1 = document.form.textview.value;
      var res = Math.pow(val1,2);
      document.form.textview.value = res;

    }

  </script>

    </form >
    <table >
      <tr>
        <td><input class="btn btn-success" style="width: 75px;; height: 45px; font-size:26px;" type="button" value="X&#x00B2;" onclick="exponecial()"></td>
        <td><input class="btn btn-success" style="width: 75px;; height: 45px; font-size:26px;" type="button" value="&#x0221A;" onclick="rquad()"></td>
        <td><input class="btn btn-success" style="width: 75px;; height: 45px; font-size:26px;" type="button" value="(" onclick="insert('(')"></td>
        <td><input class="btn btn-success" style="width: 75px;; height: 45px; font-size:26px;" type="button" value=")" onclick="insert(')')"></td>
      </tr>

      <tr>
        <td><input class="btn btn-primary" style="width: 75px;; height: 45px; font-size:26px;" type="button" value="&#x000F7;" onclick="insert('/')"></td>
        <td><input class="btn btn-primary" style="width: 75px;; height: 45px; font-size:26px;" type="button" value="&#10007;" onclick="insert('*')"></td>
        <td><input class="btn btn-primary" style="width: 75px;; height: 45px; font-size:26px;" type="button" value="&#x02014;" onclick="insert('-')"></td>
        <td><input class="btn btn-primary" style="width: 75px;; height: 45px; font-size:26px;" type="button" value="&#10011;" onclick="insert('+')"></td>
      </tr>

      <tr>
        <td><input class="btn btn-dark" style="width: 75px;; height: 75px;  font-size:26px;" type="button" value="7" onclick="insert(7)"></td>
        <td><input class="btn btn-dark" style="width: 75px;; height: 75px;  font-size:26px;" type="button" value="8" onclick="insert(8)"></td>
        <td><input class="btn btn-dark" style="width: 75px;; height: 75px; font-size:26px;" type="button" value="9" onclick="insert(9)"></td>
        <td><input class="btn btn-danger" style="width: 75px;; height: 75px; font-size:26px;" type="button" value="&#9668;" onclick="back()"></td>
      </tr>

      <tr>
        <td><input class="btn btn-dark" style="width: 75px;; height: 75px; font-size:26px;" type="button" value="4" onclick="insert(4)"></td>
        <td><input class="btn btn-dark" style="width: 75px;; height: 75px; font-size:26px;" type="button" value="5" onclick="insert(5)"></td>
        <td><input class="btn btn-dark" style="width: 75px;; height: 75px; font-size:26px;" type="button" value="6" onclick="insert(6)"></td>
        <td><input class="btn btn-info" style="width: 75px;; height: 75px; font-size:26px;" type="button" value="C" onclick="clean()"></td>
        
      </tr>

      <tr>
        <td><input class="btn btn-dark" style="width: 75px;; height: 75px; font-size:26px;" type="button" value="1" onclick="insert(1)"></td>
        <td><input class="btn btn-dark" style="width: 75px;; height: 75px; font-size:26px;" type="button" value="2" onclick="insert(2)"></td>
        <td><input class="btn btn-dark" style="width: 75px;; height: 75px; font-size:26px;" type="button" value="3" onclick="insert(3)"></td>
        <td rowspan="5"><input class="btn btn-warning" style=" font-size:26px; width: 75px; height: 150px" type="button" value="=" onclick="equal()"></td>
      </tr>

      <tr>
        <td colspan="2"><input class="btn btn-dark" style="width: 150px; height: 75px; font-size:26px;" type="button" value="0" onclick="insert(0)"></td>
        <td><input class="btn btn-dark" style="width: 75px;; height: 75px; font-size:26px;" type="button" value="." onclick="insert('.')"></td>
      </tr>

    </table>
  </div>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </div>
</div>
  </div>
</div>



    <!-- CONSTRUÇÃO DO MODAL DE CADASTRO -->
  <div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-center" id="myModalLabel">  Cadastrar Uma Nova Atividade </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <!-- FIM DO CABEÇALHO DO MODAL DE CADASTRO -->
              
        </div>
        <div class="modal-body">

              <!-- CRIA O FORMULÁRIO PARA CADASTRAR E ENVIAR PELO METODO POST PARA O SCRIPT "cadastrar_produtos.php" -->
              <?php $hojehoras = date('Y-m-d'.' 00:00:00');?>
              <form method="POST" action="mvc/model/cadastrar_atividade.php">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Título:</label>
                  <input name="title" type="text" class="form-control" >
                </div>
               <div class="form-group">
                  <label for="message-text" class="col-form-label">Atividade:</label>
                  <textarea name="atividade" class="form-control" ></textarea>
                </div>
              <input name="hoje" type="hidden" value="<?php echo $hojehoras;?>">
              <div class="modal-footer">
                
                <button type="submit" class="btn btn-success">Cadastrar</button>
              </div>

              </form>

        </div>
      </div>
      <!-- FIM DO CORPO DA MENSAGEM DO MODAL DE CADASTRO -->





<!--
<div class="modal fade" id="mesasAtendidas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"style="background: #f6c23e;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Mesas Atendidas( )</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="mesasAguardando" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background: #e74a3b;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Mesas Aguardando()</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="mesasReservadas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background: #4e73df;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Mesas Reservada()</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="totalMesasLivres" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"style="background: #1cc88a;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Mesas Livres</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="totalMesasAtendidas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"style="background: #f6c23e;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Mesas Atendidas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="totalMesasAguardando" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background: #e74a3b;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Mesas Aguardando</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="totalMesasReservadas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background: #4e73df">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Mesas Aguardando</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

-->




  <!--MADAIS DE SIDEBAR E HEADER-->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

<!-- modal de configuração-->
  <div class="modal fade" id="configuração" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Configuração</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

                <div class="modal-body">
            <form class="form-horizontal" method="POST" action="mvc/model/configuracao.php"><!--chama o arqui php para cadastrar-->
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Mesas</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="qnt_mesas" placeholder="Quantidade de Mesas">
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Situação</label>
                <div class="col-sm-10">
                  <select name="status" class="form-control" id="status">
                    <option value="">Selecione</option>     
                                      
                    <option style="color:#228B22;" value="1">Mesa Livre</option>
                    <option style="color:#FFD700;" value="2">Mesa Atendida</option> 
                    <option style="color:#8B0000;" value="3">Mesa Aguardando</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button name="cad_mesas" type="submit" class="btn btn-success">Cadastrar</button>
                </div>
              </div>
            </form>
          </div>

      <div>
        
      </div>

    </div>
  </div>
</div>


  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tem Certeza Que Deseja Sair?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecione "Logout" se tiver certeza que quer encerrar a sessão!</div>
        <div class="modal-footer">
          <button class="btn btn-info" type="button" data-dismiss="modal">Voltar</button>
          <a class="btn btn-danger" href="#">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- EFEITO ARRASTA E SOLTA-->
  <script src="mvc/common/js/jquery-ui.min.js"></script>



</body>

</html>
