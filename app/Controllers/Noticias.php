<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\NoticiasModel;

class Noticias extends Controller{

    public function index(){
      
        $model = new NoticiasModel();

        $data = [
                    'title' => 'Ultimas noticias',
                    'noticias' => $model->getNoticias()
        ];

        //Monta pagina
       
        echo view('templates/header',$data);
        echo view('pages/noticias',$data);
        echo view('templates/footer');
      
    }

    
}