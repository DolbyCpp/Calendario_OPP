<?php
namespace App\BLL;

use App\DAL\UsuarioDAL;

class UsuarioBLL{

    /**
     * @param string $email
     * @param string $senha
     * @return bool
     */
    public function logar($email, $senha){
        $regraUsuario = new UsuarioDAL();
        $logar = $regraUsuario->logar($email, $senha);
        if(!is_null($logar) && is_numeric($logar)){
            return true;
        }else{
            return false;
        }
    }
}