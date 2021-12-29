<?php
namespace App\Database\Seeds;

class Noticias extends \CodeIgniter\Database\Seeder{

    public function run(){

        $data = [
            'titulo'=> 'Titulo da noticia 1',
            'descricao'=> '	Lorem ipsum non tempus dictumst at fusce rutrum eros a, habitasse tortor rutrum class est interdum primis. ipsum urna volutpat commodo vestibulum phasellus potenti pellentesque sit consectetur urna lacinia hendrerit quisque congue dolor venenatis iaculis vel luctus, porttitor morbi accumsan eu sem hac quis consequat mollis cubilia nibh neque morbi curabitur nisi ligula sociosqu accumsan. fermentum donec magna accumsan neque faucibus justo lectus lorem condimentum, nisl in convallis nulla hendrerit odio massa. ipsum placerat orci quisque gravida maecenas aptent ultrices commodo, vestibulum donec ultrices tristique torquent conubia justo, conubia tortor sodales justo lacus elit hac. ',
            'autor'=> 'Israel Ruiz'
        ];
        $this->db->table('noticias')->insert($data);
    }
}