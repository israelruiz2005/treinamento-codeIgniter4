<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\NoticiasModel;

class Noticias extends Controller{

    public function index(){
      
        $model = new NoticiasModel();
        //Verifica se há uma sessão em execução para o usuário
        $data = [
                    'title' => 'Ultimas noticias',
                    'noticias' => $model->getNoticias(),
                    'session' => \Config\Services::session(),
        ];

        //Monta pagina
       
        echo view('templates/header',$data);
        echo view('pages/noticias',$data);
        echo view('templates/footer');
      
    }

    public function item($id = NULL){
      
        $model = new NoticiasModel();
        //Verifica se há uma sessão em execução para o usuário
        $data['session'] = \Config\Services::session();

        $data['noticias'] = $model->getNoticias($id);
        // Trata erro caso não tenha registro
        if(empty($data['noticias'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Não é possivel localizar a notícia com id:'.$id);
        }

        //Monta pagina
        $data['title'] = $data['noticias']['titulo'];

        echo view('templates/header',$data);
        echo view('pages/noticia',$data);
        echo view('templates/footer');
      
    }

    // Metodo Inserir
    public function inserir(){
        //Verifica se há uma sessão em execução para o usuário
        $data['session'] = \Config\Services::session();

        if(!$data['session']->get('logged_in')){
            return redirect('login');
        }

        //Helper form - validação de formulario
        helper('form');
        //Monta pagina
        $data['title'] = 'Inserir Notícia';

        echo view('templates/header',$data);
        echo view('pages/noticia_gravar');
        echo view('templates/footer');
      
    }

    public function editar($id = NULL){
      
        $model = new NoticiasModel();

        $data= [
               'title' => 'Editar notícias',
               'noticias' => $model->getNoticias($id),
               'session' => \Config\Services::session(),
        ];

        //Verifica se há uma sessão em execução para o usuário
        if(!$data['session']->get('logged_in')){
            return redirect('login');
        }
        
        // Trata erro caso não tenha registro
        if(empty($data['noticias'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Não é possivel localizar a notícia com id:'.$id);
        }

        //Monta pagina

        echo view('templates/header',$data);
        echo view('pages/noticia_gravar',$data);
        echo view('templates/footer');
      
    }

    public function gravar(){

        //Verifica se há uma sessão em execução para o usuário
          $data['session'] = \Config\Services::session();

          if(!$data['session']->get('logged_in')){
              return redirect('login');
          }
  

        helper('form');
  
        $model = new NoticiasModel();

        //valida campos do funcionario
        if($this->validate([
            'titulo'   => ['label' => 'Título'   ,'rules'=>'required|min_length[3]|max_length[100]'],
            'autor'    => ['label' => 'Autor'    ,'rules'=>'required|min_length[3]|max_length[100]'],
            'descricao'=> ['label' => 'Descrição','rules'=>'required|min_length[3]']
        ])){
            //Variaveis
            $id        = $this->request->getVar('id');
            $titulo    = $this->request->getVar('titulo');
            $autor     = $this->request->getVar('autor');
            $descricao = $this->request->getVar('descricao');
            $img       = $this->request->getFile('img');
            
            // Teste para verificar img
            if(!$img->isValid()){
                //gravar
                $model->save([
                    'id' => $id,
                    'titulo'=> $titulo,
                    'autor'=> $autor,
                    'descricao'=> $descricao,
                ]);
                return redirect('noticias');
            } else {
                 $validaIMG = $this->validate([
                     'img'   => [
                                'uploaded[img]',
                                'mime_in[img,image/png,image/jpg,image/jpeg,image/gif]',
                                'max_size[img,4096]',
                                ],
                    ]);
                 if($validaIMG){
                     $novoNome = $img->getRandomName();
                     $img->move('img/noticias',$novoNome);

                                     //gravar
                $model->save([
                    'id' => $id,
                    'titulo'=> $titulo,
                    'autor'=> $autor,
                    'descricao'=> $descricao,
                    'img' => $novoNome,
                ]);
                    return redirect('noticias');
                 } else {
                    $data['title'] = "Erro ao gravar a notícia";
                    echo view('templates/header',$data);
                    echo view('pages/noticia_gravar');
                    echo view('templates/footer');
        
                 }      
            }
            

        } else {
            $data['title'] = "Erro ao gravar a notícia";
            echo view('templates/header',$data);
            echo view('pages/noticia_gravar');
            echo view('templates/footer');
    
        }

    }

    //Excluir
    public function excluir($id = NULL){

        //Verifica se há uma sessão em execução para o usuário
        $data['session'] = \Config\Services::session();

        if(!$data['session']->get('logged_in')){
            return redirect('login');
        }

        $model = new NoticiasModel();
        $model->delete($id);
        return redirect('noticias');
    }

}