<?php
require 'config.php';
$consulta_janeiro = "SELECT COUNT(rg_consulta) FROM consulta WHERE dat BETWEEN '2019-07-01' AND '2019-07-31'";
$consulta_janeiro = $pdo->query($consulta_janeiro);
$janeiro = $consulta_janeiro->fetchColumn();

$consulta_fevereiro = "SELECT COUNT(rg_consulta) FROM consulta WHERE dat BETWEEN '2019-02-01' AND '2019-02-31'";
$consulta_fevereiro = $pdo->query($consulta_fevereiro);
$fevereiro = $consulta_fevereiro->fetchColumn();

$consulta_marco = "SELECT COUNT(rg_consulta) FROM consulta WHERE dat BETWEEN '2019-03-01' AND '2019-03-31'";
$consulta_marco = $pdo->query($consulta_marco);
$marco = $consulta_marco->fetchColumn();

$Consulta_abril = "SELECT COUNT(rg_consulta) FROM consulta WHERE dat BETWEEN '2019-04-01' AND '2019-04-31'";
$Consulta_abril = $pdo->query($Consulta_abril);
$abril = $Consulta_abril->fetchColumn();

$Consulta_maio = "SELECT COUNT(rg_consulta) FROM consulta WHERE dat BETWEEN '2019-05-01' AND '2019-05-31'";
$Consulta_maio = $pdo->query($Consulta_maio);
$maio = $Consulta_maio->fetchColumn();

$Consulta_junho = "SELECT COUNT(rg_consulta) FROM consulta WHERE dat BETWEEN '2019-06-01' AND '2019-06-31'";
$Consulta_junho = $pdo->query($Consulta_junho);
$junho = $Consulta_junho->fetchColumn();

$Consulta_julho = "SELECT COUNT(rg_consulta) FROM consulta WHERE dat BETWEEN '2019-07-01' AND '2019-07-31'";
$Consulta_julho = $pdo->query($Consulta_julho);
$julho = $Consulta_julho->fetchColumn();

$Consulta_agosto = "SELECT COUNT(rg_consulta) FROM consulta WHERE dat BETWEEN '2019-08-01' AND '2019-08-31'";
$Consulta_agosto = $pdo->query($Consulta_agosto);
$agosto = $Consulta_agosto->fetchColumn();

$Consulta_setembro = "SELECT COUNT(rg_consulta) FROM consulta WHERE dat BETWEEN '2019-09-01' AND '2019-09-31'";
$Consulta_setembro = $pdo->query($Consulta_setembro);
$setembro = $Consulta_setembro->fetchColumn();

$Consulta_outubro = "SELECT COUNT(rg_consulta) FROM consulta WHERE dat BETWEEN '2019-10-01' AND '2019-10-31'";
$Consulta_outubro = $pdo->query($Consulta_outubro);
$outubro = $Consulta_outubro->fetchColumn();

$Consulta_novembro = "SELECT COUNT(rg_consulta) FROM consulta WHERE dat BETWEEN '2019-11-01' AND '2019-11-31'";
$Consulta_novembro = $pdo->query($Consulta_novembro);
$novembro = $Consulta_novembro->fetchColumn();

$Consulta_dezembro = "SELECT COUNT(rg_consulta) FROM consulta WHERE dat BETWEEN '2019-12-01' AND '2019-12-31'";
$Consulta_dezembro = $pdo->query($Consulta_dezembro);
$dezembro = $Consulta_dezembro->fetchColumn();

$ano_total = array($janeiro, $fevereiro, $marco, $abril, $maio, $junho, $julho, $agosto, $setembro, $outubro, $novembro, $dezembro);
foreach($ano_total as $ano) {
    echo json_encode($ano);
}
?>


