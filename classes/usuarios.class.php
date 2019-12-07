<?php
class Usuarios {
	
    public function login($usuario, $senha) {
        global $pdo;
        $sql = $pdo->prepare("SELECT cpf FROM usuarios WHERE usuario = :usuario AND senha = :senha");
        $sql->bindValue(":usuario", $usuario);
        $sql->bindValue(":senha", $senha);
        $sql->execute();
        
  
        if ($sql->rowCount() > 0) {
          $dado = $sql->fetch();
          $_SESSION['cLogin'] = $dado['cpf'];
          return true;
        } else {
          return false;
        }
    }

    public function getInfo() {
        global $pdo;

        $array = array();

        $sql = $pdo->prepare("SELECT * FROM funcionarios WHERE cpf = :cpf");
        $sql->bindValue(":cpf", $_SESSION['cLogin']);
        $sql->execute();

        if($sql->rowCount() > 0) {
          $array = $sql->fetchAll();
        }
    
        return $array;
    }
  }  

    