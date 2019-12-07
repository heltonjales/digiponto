<?php require 'header.php'; ?>

<?php
  if(empty($_SESSION['cLogin'])) {
    ?>
    <script type="text/javascript">window.location.href="login.php";</script>
  <?php
  exit;
  }
?>
 
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<h1 class="h2 mt-3">Ponto</h1>
<hr>

  <div class="container">
  <?php 
  require 'classes/ponto.class.php'; 
  $p = new Ponto();

  if(isset($_POST['cpf']) && !empty($_POST['cpf'])) {
    $data = ($_POST['data']);
    $data = date("Y-m-d",strtotime(str_replace('/','-',$data)));
    $hora = ($_POST['hora']);
    $tipo = ($_POST['tipo']);
    $lt = ($_POST['lt']);
    $lg = ($_POST['lg']);
    

  if(!empty($_POST['tipo'])) { 
    if($p->adicionarponto($data, $hora, $tipo, $lt, $lg)) {
      ?>
      <div class="alert alert-success">
        <strong>Ponto</strong> Efetuado com sucesso!
        <script type="text/javascript">
          setTimeout(function() {
        window.location.href="dash.php";
          }, 5000);
        </script>
      </div>
      <?php
    }
    } else {
      ?>
      <div class="alert alert-warning">
        Não foi possível bater o ponto.
      </div>
      <?php
    }
  }
  ?>
 <div id="geoarea"></div>
  <script type="text/javascript">
    var area = document.getElementById("geoarea");
    function ExibirLocalizacao()
    {
    if (navigator.geolocation)
      {
    navigator.geolocation.getCurrentPosition(ObterPosicao);
      }
    else{area.innerHTML="Sem Suporte Geolocalização.";}
    }
    function ObterPosicao(posicao) {
  
    document.getElementById('lt').value = posicao.coords.latitude; 
    document.getElementById('lg').value = posicao.coords.longitude;  
   
    area.innerHTML = "Latitude: " + position.coords.latitude +
    "<br>Longitude: " + position.coords.longitude;
    }
  </script>
  

      <form method="POST">
      
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <div class="d-flex ">
          <div class="form-group col-3 ml-3 p-0 ">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">CPF</div>
            <input class="form-control " type ="text" name="cpf" id="cpf" placeholder="" readonly value="<?php echo $_SESSION['cLogin']; ?>">
		    </div>

      <div class="form-group col-3 ml-2 p-0 ">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data</div>
          <input class="form-control" type ="text" name="data" id="data" placeholder="" readonly value= "<?php date_default_timezone_set('America/Fortaleza'); echo (date("d/m/Y")); ?>" >
		  </div>


            
       <div class="form-group col-2 ml-3 p-0 ">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Hora</div>
          <input class="form-control" type ="text" name="hora" id="hora" placeholder="" readonly value= "<?php date_default_timezone_set('America/Fortaleza'); echo (date("H:i:s")); ?>" >
		  </div>
  
          <div class="form-group col-2 ml-3 p-0 ">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tipo</div>
				    <select class="form-control" name="tipo" id=>
					    <option value="Entrada">Entrada</option>
              <option value="Saída">Saída</option>
            </select>
          </div>

          <input type="hidden" name="lt" value="" id="lt" />
          <input type="hidden" name="lg" value="" id="lg" />
          
          <div class="form-group mr-5 ml-3 p-0 mt-4">
         
          <input type="submit" value="Lançar" class="btn btn-primary"> 
          
          </div>
        </div>
      </form>
      </div>
      </div>

          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Informações</h1>
            <div class="btn-toolbar mb-2 mb-md-0">            
            </div>
          </div>
          <?php
          require 'classes/usuarios.class.php';
          $i = new Usuarios();
          $infos = $i->getInfo();

          foreach ($infos as $info):
          ?>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Saldo Atual</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">+02:00<?php /*echo $receitas; */?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-stopwatch fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php 
            ?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Turno</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Padrão</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-building fa-2x text-gray-300"></i>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <?php 
            ?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Cargo</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Desenvolvimento</div>
                        </div>
                        <div class="col">
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php 
            ?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Ocorrências</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>    
          <?php endforeach; ?>        
          <h2>Linha do Tempo</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                <th>CPF</th>
                <th>DATA</th>
                <th>HORA</th>
                <th>TIPO</th>
                </tr>
              </thead>
              <tbody>
<?php
$a = new Ponto();
$pontos = $a->getPonto();

foreach ($pontos as $ponto):
?>
  <tr>
    <td><?php echo $ponto['cpf_usuario']; ?></td>   
    <td><?php echo date("d/m/Y", strtotime($ponto['data_ponto'])); ?></td>
    <td><?php echo $ponto['hora_ponto']; ?></td>
    <td><?php echo $ponto['entrada_saida']; ?></td>
  </tr>
<?php endforeach; ?>  
</tbody>
</table>
</div>
    <!-- Principal JavaScript do Bootstrap
    ================================================== -->
    <!-- Foi colocado no final para a página carregar mais rápido -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Ícones -->
    <!--<script src="js/feather.min.js"></script>-->
    <script>
      feather.replace()
    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul","Ago", "Set", "Out", "Nov", "Dez"],
          datasets: [{
            label: "TAXA DE CONSULTAS POR MÊS",
            data: <?php echo json_encode($ano); ?>,
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#000',
            borderWidth: 4,
            pointBackgroundColor: '#000'
          }]
        },
        options: {
          tittle: {
            display: true,
            fontSize: 20,
            text: "RELATÓRIO ANUAL CONSULTAS" 
          },
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
  </body>
</html>