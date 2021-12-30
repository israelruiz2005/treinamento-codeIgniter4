<?php
namespace App\Models;
use CodeIgniter\Model;

class UsuariosModel extends Model {

    // Atributos de configuração
    protected $table = "usuarios"; //obrigatorio

    //Metodos a serem criados
    //Metodo GET
    public function getUsuarios($user,$senha){

        return $this->asArray()
                    ->where(['user'=> $user, 'senha' => md5($senha)])
                    ->first();

    }
}