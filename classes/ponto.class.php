<?php
class Ponto {
	
	public function adicionarponto($data, $hora, $tipo, $lt, $lg) {
		global $pdo;
		
		$sql = $pdo->prepare("INSERT INTO ponto (cpf_usuario, data_ponto, hora_ponto, entrada_saida, local_latitude, local_longitude)
							  VALUES(:cpf, :data_ponto, :hora, :tipo, :lt, :lg)"); 
		$sql->bindValue(":cpf", $_SESSION['cLogin']);
		$sql->bindValue(":data_ponto", $data);
		$sql->bindValue(":hora", $hora);
		$sql->bindValue(":tipo", $tipo);
		$sql->bindValue(":lt", $lt);
		$sql->bindValue(":lg", $lg);
		$sql->execute();
		
		return true;
	}

	public function getPonto() {
		global $pdo;
		$array = array();
		
		$sql = $pdo->prepare("SELECT * FROM ponto WHERE cpf_usuario = :cpf_usuario ORDER BY data_ponto DESC LIMIT 4");
		$sql->bindValue(":cpf_usuario", $_SESSION['cLogin']);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
		
	}
}

?>