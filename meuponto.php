<?php   
require 'config.php';
?>

<html>
<h1 class="h2 mt-3">Ponto</h1>
<hr>
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
      <form method="POST" action="baterponto.php">
        <div class="d-flex ">
          <div class="form-group col-4 ml-3 p-0 ">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">CPF</div>
            <input class="form-control " type ="text" name="cpf" id="cpf" placeholder=""  value="">
		  </div>
          
            
          <div class="form-group col-4 ml-3 p-0 ">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Hora</div>
            <input class="form-control" type ="text" name="horaedata" id="horaedata"placeholder="" readonly value= "<?php date_default_timezone_set('America/Fortaleza'); echo (date("j/m/Y H:i:s")); ?>" >
		  </div>
  
          <div class="form-group col-3 ml-3 p-0 ">
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
</html>
