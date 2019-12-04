<?php   
require 'header.php';
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<h1 class="h2 mt-3">Ponto</h1>
<hr>

  <div class="container">
  <?php 
  require 'classes/ponto.class.php'; 
  $p = new Ponto();
  if(isset($_POST['cpf']) && !empty($_POST['cpf'])) {
    $cpf = addslashes($_POST['cpf']);
    $horaedata = addslashes($_POST['horaedata']);
    $tipo = addslashes($_POST['tipo']);
    $latitude = addslashes($_POST['latitude']);
    $longitude = addslashes($_POST['longitude']);
    

    if(!empty($cpf) && !empty($horaedata) && !empty($tipo) && !empty($latitude) && !empty($longitude)){
      if($p->adicionarponto($cpf, $horaedata, $tipo, $latitude, $longitude)) {
        ?>
        <div class="alert alert-success">
          <strong>Ponto</strong> Efetuado com sucesso!
        </div>
        <?php
      }
    } else {
      ?>
      <div class="alert alert-danger">
        Não foi possível bater o ponto.
      </div>
      <?php
      }
    }
  ?>

      <form method="POST" action="teste.php">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <div class="d-flex ">
          <div class="form-group col-3 ml-3 p-0 ">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">CPF</div>
            <input class="form-control " type ="text" name="cpf" id="cpf" placeholder=""  value="">
		  </div>

      <div class="form-group col-3 ml-2 p-0 ">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data</div>
          <input class="form-control" type ="text" name="horaedata" id="horaedata"placeholder="" readonly value= "<?php date_default_timezone_set('America/Fortaleza'); echo (date("d/m/Y")); ?>" >
		  </div>


            
       <div class="form-group col-2 ml-3 p-0 ">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Hora</div>
          <input class="form-control" type ="text" name="horaedata" id="horaedata"placeholder="" readonly value= "<?php date_default_timezone_set('America/Fortaleza'); echo (date("H:i:s")); ?>" >
		  </div>
  
          <div class="form-group col-2 ml-3 p-0 ">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tipo</div>
				    <select class="form-control" name="tipo" id=>
					    <option value=""></option>
              <option value="Entrada">Entrada</option>
              <option value="Saída">Saída</option>
            </select>
          </div>
          
          <input type="hidden" name="latitude" value="" id="lt" />
          <input type="hidden" name="longitude" value="" id="lg" />

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
            /*include ('config.php');
            $sql = "SELECT SUM(valor_pagto) AS total FROM financeiro";
            $sql = $pdo->query($sql);
            $receitas = $sql->fetchColumn();*/
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
            /*include ('config.php');
            $sql = "SELECT SUM(salario) AS total FROM funcionario";
            $sql = $pdo->query($sql);
            $despesas = $sql->fetchColumn();*/
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
            /*include ('config.php');
            $sql = "SELECT count(*) AS rg FROM paciente";
            $sql = $pdo->query($sql);
            $paciente = $sql->fetchColumn();*/
            ?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Cargo</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Desenvolvedor</div>
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
            /*include ('config.php');
            $sql = "SELECT count(rg_consulta) FROM consulta";
            $sql = $pdo->query($sql);
            $consultas = $sql->fetchColumn();*/
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
          <h2>Saldo Hora Ano</h2>
          <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
     

          <h2>Linha do Tempo</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                <th>CPF</th>
                <th>DATA E HORA</th>
                <th>TIPO</th>
                <th>LOCALIZAÇÃO</th>
                </tr>
              </thead>
              <tbody>
<?php
  $sql = "SELECT * FROM ponto WHERE id = :id LIMIT 5";

  $sql = $pdo->query($sql);
  
  if($sql->rowCount() > 0 ) {
    foreach($sql->fetchAll() as $item):
    ?>
  <tr>
    <td><?php echo $item['cpf']; ?></td>   
    <td><?php echo $item['data_hora_ponto']; ?></td>
    <td><?php echo $item['entrada_saida']; ?></td>
    <td><?php echo $item['local_latitude']; ?></td>
    <td><?php echo $item['local_longitude']; ?></td>
  </tr>
<?php 
  endforeach;
}
?>  
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

    <!-- Gráficos -->

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