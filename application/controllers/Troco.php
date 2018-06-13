<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Troco extends CI_Controller {
    
    public function verificar_sessao() {
        //Se não estiver logado redireciona para a tela de login
        if ($this->session->userdata('log') != 'algodao_doce') {
            $this->session->sess_destroy();
            redirect('login');
        }
    }

    //Troco
    public function index() {
        $this->verificar_sessao();
        
        $this->load->view('menu/menu');
        $this->load->view('troco/troco');
    }

    public function valor() {
        $this->verificar_sessao();
        
        $valor = str_replace(',', '.', str_replace('.', '', $this->input->post('valor')));

        for ($v = 0; $valor >= 100; $v++) {
            $valor = $valor - 100;
        }
        $qtd['100'] = $v;

        for ($v = 0; $valor >= 50; $v++) {
            $valor = $valor - 50;
        }
        $qtd['50'] = $v;

        for ($v = 0; $valor >= 20; $v++) {
            $valor = $valor - 20;
        }
        $qtd['20'] = $v;

        for ($v = 0; $valor >= 10; $v++) {
            $valor = $valor - 10;
        }
        $qtd['10'] = $v;

        for ($v = 0; $valor >= 5; $v++) {
            $valor = $valor - 5;
        }
        $qtd['5'] = $v;

        for ($v = 0; $valor >= 2; $v++) {
            $valor = $valor - 2;
        }
        $qtd['2'] = $v;

        for ($v = 0; $valor >= 1; $v++) {
            $valor = $valor - 1;
        }
        $qtd['1'] = $v;

        for ($v = 0; $valor >= 0.5; $v++) {
            $valor = $valor - 0.5;
        }
        $qtd['050'] = $v;

        for ($v = 0; $valor >= 0.25; $v++) {
            $valor = $valor - 0.25;
        }
        $qtd['025'] = $v;

        for ($v = 0; $valor >= 0.1; $v++) {
            $valor = $valor - 0.1;
        }
        $qtd['010'] = $v;

        //adicionei o 0.05 para não ter muitos 0.01
        for ($v = 0; $valor >= 0.05; $v++) {
            $valor = $valor - 0.05;
        }
        $qtd['005'] = $v;

        for ($v = 0; $valor >= 0.01; $v++) {
            $valor = $valor - 0.01;
        }
        $qtd['001'] = $v;

        $qtd['valor'] = $valor;

        $this->session->set_flashdata('troco', $qtd);

        redirect('troco');
    }

    public function teste() {
        $valor = 289.95;

        for ($v = 0; $valor >= 100; $v++) {
            $valor = $valor - 100;
        }
        $qtd['100'] = $v;

        for ($v = 0; $valor >= 50; $v++) {
            $valor = $valor - 50;
        }
        $qtd['50'] = $v;

        for ($v = 0; $valor >= 20; $v++) {
            $valor = $valor - 20;
        }
        $qtd['20'] = $v;

        for ($v = 0; $valor >= 10; $v++) {
            $valor = $valor - 10;
        }
        $qtd['10'] = $v;

        for ($v = 0; $valor >= 5; $v++) {
            $valor = $valor - 5;
        }
        $qtd['5'] = $v;

        for ($v = 0; $valor >= 2; $v++) {
            $valor = $valor - 2;
        }
        $qtd['2'] = $v;

        for ($v = 0; $valor >= 1; $v++) {
            $valor = $valor - 1;
        }
        $qtd['1'] = $v;

        for ($v = 0; $valor >= 0.5; $v++) {
            $valor = $valor - 0.5;
        }
        $qtd['0.5'] = $v;

        for ($v = 0; $valor >= 0.25; $v++) {
            $valor = $valor - 0.25;
        }
        $qtd['0.25'] = $v;

        for ($v = 0; $valor >= 0.1; $v++) {
            $valor = $valor - 0.1;
        }
        $qtd['0.10'] = $v;

        //adicionei o 0.05 para não ter muitos 0.01
        for ($v = 0; $valor >= 0.05; $v++) {
            $valor = $valor - 0.05;
        }
        $qtd['0.05'] = $v;

        for ($v = 0; $valor >= 0.01; $v++) {
            $valor = $valor - 0.01;
        }
        $qtd['0.01'] = $v;

        print_r($qtd);
    }

}
