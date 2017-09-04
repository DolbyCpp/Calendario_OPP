<?php
namespace App\DAL;

use PDO;

class UsuarioDAL{
    public function query(){
        $query = "
                  SELECT 
                    id_usuario,
                    nome,
                    senha,
                    email 
                  FROM usuario
                  ";
        return $query;
    }

    /**
     * @param string $email
     * @param string $senha
     * @return integer
     */
    public function logar($email, $senha){
        $query = "SELECT id_usuario FROM usuario WHERE email = :email AND senha = :senha";
        $db = DB::getDB()->prepare($query);
        $db->bindValue(":email", $email, PDO::PARAM_STR);
        $db->bindValue(":senha", $senha, PDO::PARAM_STR);
        $db->execute();
        return DB::getValue($db, "id_usuario");
    }
}