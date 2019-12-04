<?php
class Ponto {
	
	private $pdo;
	public function __construct() {
		$this->pdo = new PDO("mysql:dbname=digiponto;host=127.0.0.1", "root", "root");

	}

	public function adicionarponto($cpf, $horaedata, $tipo, $latitude, $longitude) {
		global $pdo;		
		$sql = $pdo->prepare("INSERT INTO ponto (cpf , data_hora_ponto , entrada_saida, local_latitude, local_longitude) 
		VALUES (:cpf, :horaedata, :tipo, :latitude, :longitude)");
		$sql->bindValue(":cpf", $cpf);
		$sql->bindValue(":horaedata", $horaedata);
		$sql->bindValue(":tipo", $tipo);
		$sql->bindValue(":latitude", $latitude);
		$sql->bindValue(":longitude", $longitude);
		$sql->execute();
	}
}

?>