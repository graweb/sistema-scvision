<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Oticas_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get(){
        $this->db->where('situacao', 1);
        return $this->db->get('tb_oticas')->result();
    }

    public function listarCombo()
    {
        $this->db->select('*');
        $this->db->from('tb_oticas');
        $this->db->where('situacao', 1);
        return json_encode($this->db->get()->result());
    }

    public function cadastrar(){
        return $this->db->insert('tb_oticas',array(
            'otica'=>$this->input->post('otica', true),
            'situacao'=>$this->input->post('situacao', true),
        ));
    }

    public function atualizar($id)
    {
        $this->db->where('id_otica', $id);
        return $this->db->update('tb_oticas',array(
            'otica'=>$this->input->post('otica', true),
            'situacao'=>$this->input->post('situacao', true),
            'atualizado_em' => date('Y-m-d H:i:s')
        ));
    }

    public function desativar($id)
    {
        $this->db->where('id_otica', $id);
        return $this->db->update('tb_oticas',array(
            'situacao'=>$this->input->post('situacao_otica_ativar_desativar',true)
        ));
    }

    public function getJson()
    {
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id_otica';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page-1) * $rows;

        $id_otica = isset($_POST['id_otica']) ? strval($_POST['id_otica']) : '';
        $otica = isset($_POST['otica']) ? strval($_POST['otica']) : '';

        //$this->db->select('*');
        //$this->db->from('tb_oticas');
        $this->db->limit($rows, $offset);
        $this->db->order_by($sort, $order);
        $this->db->like('id_otica', $id_otica);
        $this->db->like('otica', $otica);

        $criteria = $this->db->get('tb_oticas');

        $result = array();
        $result['total'] = $this->db->get('tb_oticas')->num_rows();
        $row = array();
        
        foreach($criteria->result_array() as $data)
        {   
            $row[] = array(
                'id_otica'=>$data['id_otica'],
                'otica'=>$data['otica'],
                'situacao'=>$data['situacao']
            );
        }
        $result=array_merge($result,array('rows'=>$row));
        return json_encode($result);
    }
}