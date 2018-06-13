<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
    
    public function verificar_sessao() {
        //Se não estiver logado redireciona para a tela de login
        if ($this->session->userdata('log') != 'algodao_doce') {
            $this->session->sess_destroy();
            redirect('login');
        }
    }

//Manter Usúario
    public function index() {
        $this->verificar_sessao();
        
        //Chamar a model
        $this->load->model('usuario_model', 'usu');

        $data['lista'] = $this->usu->lista();

        $this->load->view('menu/menu');
        $this->load->view('usuario/usuario', $data);
    }

//Cadastrar Usúario
    public function cadastro() {
        $this->verificar_sessao();

        //Chamar a model
        $this->load->model('usuario_model', 'usu');

        //Faz o cadastro
        switch ($this->usu->cadastro()) {
            case 1:

                $data = array(
                    'msg' => 'Usuário cadastrado com sucesso!',
                    'class' => 'success'
                );

                $this->session->set_flashdata('usuario', $data);

                redirect('usuario');

                break;

            case 2:

                $data = array(
                    'msg' => 'Erro ao cadastrar usuário!',
                    'class' => 'danger'
                );

                $this->session->set_flashdata('usuario', $data);

                redirect('usuario');

                break;

            default:

                $data = array(
                    'msg' => 'Erro ao cadastrar usuário!',
                    'class' => 'danger'
                );

                $this->session->set_flashdata('usuario', $data);

                redirect('usuario');

                break;
        }
    }

    //Editar Usúario
    public function editar() {
        $this->verificar_sessao();

        //Chamar a model
        $this->load->model('usuario_model', 'usu');

        //Faz a edição
        switch ($this->usu->editar()) {
            case 1:

                $data = array(
                    'msg' => 'Usuário editado com sucesso!',
                    'class' => 'success'
                );

                $this->session->set_flashdata('usuario', $data);

                redirect('usuario');

                break;

            case 2:

                $data = array(
                    'msg' => 'Erro ao editar o usuário!',
                    'class' => 'danger'
                );

                $this->session->set_flashdata('usuario', $data);

                redirect('usuario');

            default:

                $data = array(
                    'msg' => 'Erro ao editar o usuário!',
                    'class' => 'danger'
                );

                $this->session->set_flashdata('usuario', $data);

                redirect('usuario');

                break;
        }
    }

    //Excluir Usúario
    public function excluir() {
        $this->verificar_sessao();

        //Chamar a model
        $this->load->model('usuario_model', 'usu');

        //Faz a edição
        switch ($this->usu->excluir()) {
            case 1:

                $data = array(
                    'msg' => 'Usuário excluido com sucesso!',
                    'class' => 'success'
                );

                $this->session->set_flashdata('usuario', $data);

                redirect('usuario');

                break;

            case 2:

                $data = array(
                    'msg' => 'Erro ao excluir o usuário!',
                    'class' => 'danger'
                );

                $this->session->set_flashdata('usuario', $data);

                redirect('usuario');

                break;

            default:

                $data = array(
                    'msg' => 'Erro ao excluir o usuário!',
                    'class' => 'danger'
                );

                $this->session->set_flashdata('usuario', $data);

                redirect('usuario');

                break;
        }
    }

    //Editar senha do Usúario
    public function senha() {
        $this->verificar_sessao();

        //Chamar a model
        $this->load->model('usuario_model', 'usu');

        //Faz a edição
        switch ($this->usu->senha()) {
            case 1:

                $data = array(
                    'msg' => 'Senha do usuário editada com sucesso!',
                    'class' => 'success'
                );

                $this->session->set_flashdata('usuario', $data);

                redirect('usuario');

                break;

            case 2:

                $data = array(
                    'msg' => 'Erro ao editar a senha do usuário!',
                    'class' => 'danger'
                );

                $this->session->set_flashdata('usuario', $data);

                redirect('usuario');

            case 3:

                $data = array(
                    'msg' => 'As senhas não são iguais!',
                    'class' => 'danger'
                );

                $this->session->set_flashdata('usuario', $data);

                redirect('usuario');

            default:

                $data = array(
                    'msg' => 'Erro ao editar a senha do usuário!',
                    'class' => 'danger'
                );

                $this->session->set_flashdata('usuario', $data);

                redirect('usuario');

                break;
        }
    }

}
