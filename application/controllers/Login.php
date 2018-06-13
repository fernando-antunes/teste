<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    //GFunção responsaval por chamar a pagina de login
    public function index() {
        //Chamar pagina de login
        $this->load->view('login/login');
    }

    public function logar() {

        //Chamar a model
        $this->load->model('login_model', 'login');

        //Faz o cadastro
        switch ($this->login->logar()) {
            case 1:

                $data = array(
                    'inicio' => 'Bem vindo ao sistema ' . $this->session->nome . '!',
                    'class' => 'success'
                );

                $this->session->set_flashdata($data);

                redirect('inicio');

                break;

            case 2:

                $data = array(
                    'login' => 'Senha ou e-mail errado!',
                    'class' => 'danger'
                );

                $this->session->set_flashdata($data);

                redirect('login');

                break;

            default:

                $data = array(
                    'login' => 'Senha ou e-mail errado!',
                    'class' => 'danger'
                );

                $this->session->set_flashdata($data);

                redirect('login');

                break;
        }
    }
    
    public function sair() {
        $this->session->sess_destroy();
        
        redirect('login');
    }

}
