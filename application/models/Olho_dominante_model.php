<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Olho_dominante_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get(){
        return $this->db->get('tb_olho_dominante')->result();
    }

    public function listarCombo()
    {
        return json_encode($this->db->get('tb_olho_dominante')->result());
    }

    public function cadastrar(){
        return $this->db->insert('tb_olho_dominante',array(
            'codigo_olho_dominante'=>$this->input->post('codigo_olho_dominante', true),
            'descricao'=>$this->input->post('descricao', true),
        ));
    }

    public function atualizar($id)
    {
        $this->db->where('id_olho_dominante', $id);
        return $this->db->update('tb_olho_dominante',array(
            'codigo_olho_dominante'=>$this->input->post('codigo_olho_dominante', true),
            'descricao'=>$this->input->post('descricao', true),
            'atualizado_em' => date('Y-m-d H:i:s')
        ));
    }

    public function getJson()
    {
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'codigo_olho_dominante';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page-1) * $rows;

        $codigo_olho_dominante = isset($_POST['codigo_olho_dominante']) ? strval($_POST['codigo_olho_dominante']) : '';

        $this->db->limit($rows, $offset);
        $this->db->order_by($sort, $order);
        $this->db->like('codigo_olho_dominante', $codigo_olho_dominante);

        $criteria = $this->db->get('tb_olho_dominante');

        $result = array();
        $result['total'] = $this->db->get('tb_olho_dominante')->num_rows();
        $row = array();
        
        foreach($criteria->result_array() as $data)
        {   
            $row[] = array(
                'id_olho_dominante'=>$data['id_olho_dominante'],
                'codigo_olho_dominante'=>$data['codigo_olho_dominante'],
                'descricao'=>$data['descricao']
            );
        }
        $result=array_merge($result,array('rows'=>$row));
        return json_encode($result);
    }
}