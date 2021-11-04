<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Scvision_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function autenticar()
    {
        // RETORNO = 0 - CAMPO E-MAIL/SENHA EM BRANCO
        // RETORNO = 1 - USUÁRIO DESATIVADO
        // RETORNO = 2 - E-MAIL/SENHA INCORRETO
        // RETORNO = 3 - ACESSA O SISTEMA
        $retorno = 3;

        if($this->input->post('email') != "" && $this->input->post('senha') != "")
        {
            $this->load->library('encryption');
            $this->db->where('usuario', $this->input->post('email'));
            $this->db->or_where('email', $this->input->post('email'));
            $this->db->where('senha', hash("sha1", $this->input->post('senha')));
            $pega_usuario = $this->db->get('tb_usuarios')->row();

            if(is_array($pega_usuario) ? count($pega_usuario) : 1)
            {
                if($pega_usuario->situacao == True)
                {
                    $dadosUSuario = array(
                        'id_usuario' => $pega_usuario->id_usuario,
                        'permissao' => $pega_usuario->fk_id_permissao,
                        'nome' => $pega_usuario->nome,
                        'email' => $pega_usuario->email,
                        'mudar_senha' => $pega_usuario->mudar_senha,
                        'logado' => True
                    );

                    $this->session->set_userdata($dadosUSuario);
                    return $retorno;
                }
                else 
                {
                    $retorno = 2;
                    return $retorno;
                }
            } 
            else 
            {
                $retorno = 1;
                return $retorno;
            }
        }
        else
        {
            $retorno = 0;
            return $retorno;
        }
    }
}