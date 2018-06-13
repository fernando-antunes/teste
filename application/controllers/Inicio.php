<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
    
    public function verificar_sessao() {
        //Se não estiver logado redireciona para a tela de login
        if ($this->session->userdata('log') != 'algodao_doce') {
            $this->session->sess_destroy();
            redirect('login');
        }
    }

    public function index() {
        $this->load->view('menu/menu');
        $this->load->view('inicio');
    }

}
