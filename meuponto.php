<?php require 'header.php'; ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<h1 class="h2 mt-3">Meu Ponto</h1>
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
require 'classes/ponto.class.php';
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