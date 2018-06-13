<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {
    
    public function verificar_sessao() {
        //Se não estiver logado redireciona para a tela de login
        if ($this->session->userdata('log') != 'algodao_doce') {
            $this->session->sess_destroy();
            redirect('login');
        }
    }

    //Manter Cliente
    public function index() {
        $this->verificar_sessao();
        
        //Chamar a model
        $this->load->model('cliente_model', 'cli');

        $data['lista'] = $this->cli->lista();

        $this->load->view('menu/menu');
        $this->load->view('cliente/cliente', $data);
    }

    //Cadastrar de cliente
    public function cadastro() {
        $this->verificar_sessao();

        //Chamar a model
        $this->load->model('cliente_model', 'cli');

        //Faz o cadastro
        switch ($this->cli->cadastro()) {
            case 1:

                $data = array(
                    'msg' => 'Cliente cadastrado com sucesso!',
                    'class' => 'success'
                );

                $this->session->set_flashdata('cliente', $data);

                redirect('cliente');

                break;

            case 2:

                $data = array(
                    'msg' => 'Erro ao cadastrar o cliente!',
                    'class' => 'danger'
                );

                $this->session->set_flashdata('cliente', $data);

                redirect('cliente');

                break;
            
            case 3:

                $data = array(
                    'msg' => 'CNPJ já cadastrado!',
                    'class' => 'danger'
                );

                $this->session->set_flashdata('cliente', $data);

                redirect('cliente');

                break;

            default:

                $data = array(
                    'msg' => 'Erro ao cadastrar o cliente!',
                    'class' => 'danger'
                );

                $this->session->set_flashdata('cliente', $data);

                redirect('cliente');

                break;
        }
        
    }
    
    //Editar cliente
    public function editar() {
        $this->verificar_sessao();

        //Chamar a model
        $this->load->model('cliente_model', 'cli');

        //Faz a edição
        switch ($this->cli->editar()) {
            case 1:

                $data = array(
                    'msg' => 'Cliente editado com sucesso!',
                    'class' => 'success'
                );

                $this->session->set_flashdata('cliente', $data);

                redirect('cliente');

                break;

            case 2:

                $data = array(
                    'msg' => 'Erro ao editar o cliente!',
                    'class' => 'danger'
                );

                $this->session->set_flashdata('cliente', $data);

                redirect('cliente');

                break;
            
            default:

                $data = array(
                    'msg' => 'Erro ao editar o cliente!',
                    'class' => 'danger'
                );

                $this->session->set_flashdata('cliente', $data);

                redirect('cliente');

                break;
        }

    }
    
    //Excluir cliente
    public function excluir() {
        $this->verificar_sessao();

        //Chamar a model
        $this->load->model('cliente_model', 'cli');

        //Faz a exclusão
        switch ($this->cli->excluir()) {
            case 1:

                $data = array(
                    'msg' => 'Cliente excluido com sucesso!',
                    'class' => 'success'
                );

                $this->session->set_flashdata('cliente', $data);

                redirect('cliente');

                break;

            case 2:

                $data = array(
                    'msg' => 'Erro ao excluir o cliente!',
                    'class' => 'danger'
                );

                $this->session->set_flashdata('cliente', $data);

                redirect('cliente');

                break;
            
            default:

                $data = array(
                    'msg' => 'Erro ao excluir o cliente!',
                    'class' => 'danger'
                );

                $this->session->set_flashdata('cliente', $data);

                redirect('cliente');

                break;
        }

    }
    
    //Editar logo
    public function logo() {
        $this->verificar_sessao();

        //Chamar a model
        $this->load->model('cliente_model', 'cli');

        //Faz a alteração da logo
        switch ($this->cli->logo()) {
            case 1:

                $data = array(
                    'msg' => 'Logo alterada com sucesso!',
                    'class' => 'success'
                );

                $this->session->set_flashdata('cliente', $data);

                redirect('cliente');

                break;

            case 2:

                $data = array(
                    'msg' => 'Erro ao alterar a logo!',
                    'class' => 'danger'
                );

                $this->session->set_flashdata('cliente', $data);

                redirect('cliente');

                break;
            
            default:

                $data = array(
                    'msg' => 'Erro ao alterar a logo!',
                    'class' => 'danger'
                );

                $this->session->set_flashdata('cliente', $data);

                redirect('cliente');

                break;
        }

    }

}
