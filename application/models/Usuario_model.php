<?php

class Usuario_model extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    public function cadastro() {
        //Recebe os dados
        $data['us_nome'] = $this->input->post('us_nome');
        $data['us_email'] = $this->input->post('us_email');
        $data['us_senha'] = sha1($this->input->post('us_senha'));
        $data['us_nivel'] = $this->input->post('us_nivel');

        //Tenta cadastrar 
        if ($this->db->insert('usuario', $data)) {
            //Se cadastrar retorna 1
            return 1;
        } else {
            //Senão cadastrar retorna 2
            return 2;
        }
    }

    public function lista() {
        //Seleciona ad colunas do banco de dados
        $this->db->select('us_cd, us_nome, us_email, us_nivel');

        //Não mostra o Administrador admin
        $this->db->where('us_cd !=', 1);

        //realiza a consulta
        return $this->db->get('usuario')->result();
    }

    public function editar() {
        //Recebe os dados
        $cd = $this->input->post('cd');
        $data['us_nome'] = $this->input->post('us_nome');
        $data['us_email'] = $this->input->post('us_email');
        $data['us_senha'] = sha1($this->input->post('us_senha'));
        $data['us_nivel'] = $this->input->post('us_nivel');

        //filtra o update
        $this->db->where('us_cd', $cd);

        //Tenta editar 
        if ($this->db->update('usuario', $data)) {
            //Se editar retorna 1
            return 1;
        } else {
            //Senão editar retorna 2
            return 2;
        }
    }

    public function excluir() {
        //Recebe os dados
        $cd = $this->input->post('cd');

        //filtra o update
        $this->db->where('us_cd', $cd);

        //Tenta excluir
        if ($this->db->delete('usuario')) {
            //Se excluir retorna 1
            return 1;
        } else {
            //Senão excluir retorna 2
            return 2;
        }
    }

    public function senha() {
        //Recebe os dados
        $cd = $this->input->post('cd');
        $senha = sha1($this->input->post('us_senha'));
        $confirme = sha1($this->input->post('us_confirme'));

        //confirma se as senhas são iguais
        if ($senha == $confirme) {
            //recebe a senha para atualizar ela
            $data['us_senha'] = sha1($this->input->post('us_senha'));
            
            //filtra o update
            $this->db->where('us_cd', $cd);

            //Tenta editar 
            if ($this->db->update('usuario', $data)) {
                //Se editar retorna 1
                return 1;
            } else {
                //Senão editar retorna 2
                return 2;
            }
        } else {
            return 3;
        }
    }

}
