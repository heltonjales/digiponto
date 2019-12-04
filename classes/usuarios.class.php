<?php
class Usuarios {
	
	private $pdo;
	public function __construct() {
		$this->pdo = new PDO("mysql:dbname=digiponto;host=127.0.0.1", "root", "root");

    }

    public function getUsuario() {
        global $pdo;
        $array = array(); 
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id_usuario = :id_usuario");
        $sql->bindValue(":id_usuario", $_SESSION['id']);
        $sql->execute();
        
  
        if ($sql->rowCount() > 0) {
          $array = $sql->fetchAll();
        } 

        return $array;
    }
}


    