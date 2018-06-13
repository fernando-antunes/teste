<?php

class Login_model extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    public function logar() {
        //recebe os dados do login
        $email = $this->input->post('email');
        $senha = sha1($this->input->post('senha'));

        //filtra a consulta
        $this->db->where('us_email', $email);
        $this->db->where('us_senha', $senha);

        //realiza a consulta
        $data = $this->db->get('usuario')->result();

        //verifica se so foi encontrado um usuário
        if (count($data) == 1) {

            //pega os dados do usuário no banco
            $login['cd'] = $data[0]->us_cd;
            $login['nome'] = $data[0]->us_nome;
            $login['nivel'] = $data[0]->us_nivel;
            $login['log'] = 'algodao_doce';

            //cria a sessão
            $this->session->set_userdata($login);

            //vai para a pagina principal
            return 1;
        } else {

            //volta para o login
            return 2;
        }
    }

}
