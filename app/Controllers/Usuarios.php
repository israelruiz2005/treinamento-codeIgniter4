<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UsuariosModel;

class Usuarios extends Controller{

    public function index(){

        $data['title'] = "";
        $data['session'] = \Config\Services::session();
        echo view('templates/header',$data);
        echo view('login_page');
        echo view('templates/footer');

    }

    public function login(){
        $model = new UsuariosModel();
        $user  = $this->request->getVar('user');
        $senha = $this->request->getVar('senha');

        //Consuta no banco
        $data['usuarios'] = $model->getUsuarios($user,$senha);
        //Criando session
        $data['session'] = \Config\Services::session();

        if(empty($data['usuarios'])){

            return redirect('login');

        } else {
            //Informaçoes adicionais
            $sessionData = [
                'user' => $user,
                'logged_in' => TRUE
            ];

            $data['session']->set($sessionData);
            
            return redirect('noticias');

        }
    }

    //logout
    public function logout(){
       $data['session'] = \Config\Services::session();
       $data['session']->destroy();
       return redirect('login');
    }
}