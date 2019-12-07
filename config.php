<?php
session_start();

$dsn="mysql:dbname=digiponto;host=127.0.0.1";
$dbuser="root";
$dbpass="root";

global $pdo;
try {
	$pdo = new PDO($dsn, $dbuser, $dbpass);

} catch (PDOException $e) {
	echo "Conexão Falhou".$e->getMessage(); 
	exit;
}

?>

