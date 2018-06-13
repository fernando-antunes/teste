<?php

class Cliente_model extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    public function cadastro() {

        //Recebe o CNPJ para verificar se ja esta cadastrado no banco de dados
        $this->db->where('cl_cnpj', $this->input->post('cl_cnpj'));

        //Se não tiver nenhum registro no banco com o CNPJ informado pelo usuario
        //Ele cadastra os dados que foram enviados
        if (count($this->db->get('cliente')->result()) == 0) {

            //Faz a configuração do upload
            $config['upload_path'] = './assets/logo/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['encrypt_name'] = TRUE;
            $config['overwrite'] = TRUE;

            //Inicializa a configuração
            $this->upload->initialize($config);

            //Realiza o upload
            if ($this->upload->do_upload('cl_logo')) {
                //Pega os dados do upload
                $upload = $this->upload->data();

                //Pega os dados para cadastrar no banco
                $data['cl_nome'] = $this->input->post('cl_nome');
                $data['cl_cnpj'] = $this->input->post('cl_cnpj');
                $data['cl_logo'] = $upload['file_name'];

                //Realiza o cadastro
                if ($this->db->insert('cliente', $data)) {

                    return 1;
                } else {

                    return 2;
                }
            } else {
                $erros = $this->upload->display_errors();
                echo $erros;
            }
        } else {

            return 3;
        }
    }

    public function lista() {
        //Seleciona a colunas do banco de dados
        $this->db->select('cl_cd, cl_nome, cl_cnpj, cl_logo');

        //realiza a consulta
        return $this->db->get('cliente')->result();
    }

    public function editar() {
        //Recebe os dados para realizar o update
        $cd = $this->input->post('cd');
        $data['cl_nome'] = $this->input->post('cl_nome');
        $data['cl_cnpj'] = $this->input->post('cl_cnpj');

        //filtra o update
        $this->db->where('cl_cd', $cd);

        //Realiza o update
        if ($this->db->update('cliente', $data)) {

            return 1;
        } else {

            return 2;
        }
    }

    public function excluir() {
        //Recebe os dados para realizar o delete
        $cd = $this->input->post('cd');

        //filtra a consulta
        $this->db->where('cl_cd', $cd);

        //realiza a consulta
        $consulta = $this->db->get('cliente')->result();

        //filtra o delete
        $this->db->where('cl_cd', $cd);

        //Realiza o delete
        if ($this->db->delete('cliente')) {

            //apaga a logo do cliente
            $filestring = APPPATH . '../assets/logo/' . $consulta[0]->cl_logo;
            unlink($filestring);

            return 1;
        } else {

            return 2;
        }
    }

    public function logo() {
        //Recebe os dados para realizar o delete
        $cd = $this->input->post('cd');

        //filtra a consulta
        $this->db->where('cl_cd', $cd);

        //realiza a consulta
        $consulta = $this->db->get('cliente')->result();

        //Faz a configuração do upload
        $config['upload_path'] = './assets/logo/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['encrypt_name'] = TRUE;
        $config['overwrite'] = TRUE;

        //Inicializa a configuração
        $this->upload->initialize($config);

        //Realiza o upload
        if ($this->upload->do_upload('cl_logo')) {
            //Pega os dados do upload
            $upload = $this->upload->data();

            //Pega os dados para realizar o update no banco
            $data['cl_logo'] = $upload['file_name'];

            //filtra a consulta
            $this->db->where('cl_cd', $cd);

            //Realiza o cadastro
            if ($this->db->update('cliente', $data)) {

                //apaga a logo do cliente
                $filestring = APPPATH . '../assets/logo/' . $consulta[0]->cl_logo;
                unlink($filestring);

                return 1;
            } else {

                return 2;
            }
        } else {
            $erros = $this->upload->display_errors();
            echo $erros;
        }
    }

}
