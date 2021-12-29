<?php
namespace App\Models;
use CodeIgniter\Model;

class NoticiasModel extends Model {

    // Atributos de configuração
    protected $table = "noticias"; //obrigatorio
    protected $primaryKey = 'id'; //colocar o nome da primary key
    protected $allowedFields = ['titulo','descricao','autor']; // os campos editaveis

    //Metodos a serem criados
    //Metodo GET
    public function getNoticias($id = false){

        if($id === false){
        
            return $this->findAll();
        
        } else {

            return $this->asArray()
                        ->where([id=> $id])
                        ->first();

        }
    }
}