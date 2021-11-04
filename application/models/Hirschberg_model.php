<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hirschberg_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get(){
        return $this->db->get('tb_hirschberg')->result();
    }

    public function listarCombo()
    {
        return json_encode($this->db->get('tb_hirschberg')->result());
    }

    public function cadastrar(){
        return $this->db->insert('tb_hirschberg',array(
            'codigo_hirschberg'=>$this->input->post('codigo_hirschberg', true),
            'descricao'=>$this->input->post('descricao', true),
        ));
    }

    public function atualizar($id)
    {
        $this->db->where('id_hirschberg', $id);
        return $this->db->update('tb_hirschberg',array(
            'codigo_hirschberg'=>$this->input->post('codigo_hirschberg', true),
            'descricao'=>$this->input->post('descricao', true),
            'atualizado_em' => date('Y-m-d H:i:s')
        ));
    }

    public function getJson()
    {
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'codigo_hirschberg';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page-1) * $rows;

        $codigo_hirschberg = isset($_POST['codigo_hirschberg']) ? strval($_POST['codigo_hirschberg']) : '';

        $this->db->limit($rows, $offset);
        $this->db->order_by($sort, $order);
        $this->db->like('codigo_hirschberg', $codigo_hirschberg);

        $criteria = $this->db->get('tb_hirschberg');

        $result = array();
        $result['total'] = $this->db->get('tb_hirschberg')->num_rows();
        $row = array();
        
        foreach($criteria->result_array() as $data)
        {   
            $row[] = array(
                'id_hirschberg'=>$data['id_hirschberg'],
                'codigo_hirschberg'=>$data['codigo_hirschberg'],
                'descricao'=>$data['descricao']
            );
        }
        $result=array_merge($result,array('rows'=>$row));
        return json_encode($result);
    }
}