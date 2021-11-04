<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Formas_pagamento_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get(){
        return $this->db->get('tb_formas_pagamento')->result();
    }

    public function listarCombo()
    {
        return json_encode($this->db->get('tb_formas_pagamento')->result());
    }

    public function cadastrar(){
        return $this->db->insert('tb_formas_pagamento',array(
            'codigo_forma_pagamento'=>$this->input->post('codigo_forma_pagamento', true),
            'descricao'=>$this->input->post('descricao', true),
            'valor'=>$this->input->post('valor', true),
        ));
    }

    public function atualizar($id)
    {
        $this->db->where('id_forma_pagamento', $id);
        return $this->db->update('tb_formas_pagamento',array(
            'codigo_forma_pagamento'=>$this->input->post('codigo_forma_pagamento', true),
            'descricao'=>$this->input->post('descricao', true),
            'valor'=>$this->input->post('valor', true),
            'atualizado_em' => date('Y-m-d H:i:s')
        ));
    }

    public function getJson()
    {
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'codigo_forma_pagamento';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page-1) * $rows;

        $codigo_forma_pagamento = isset($_POST['codigo_forma_pagamento']) ? strval($_POST['codigo_forma_pagamento']) : '';

        $this->db->limit($rows, $offset);
        $this->db->order_by($sort, $order);
        $this->db->like('codigo_forma_pagamento', $codigo_forma_pagamento);

        $criteria = $this->db->get('tb_formas_pagamento');

        $result = array();
        $result['total'] = $this->db->get('tb_formas_pagamento')->num_rows();
        $row = array();
        
        foreach($criteria->result_array() as $data)
        {   
            $row[] = array(
                'id_forma_pagamento'=>$data['id_forma_pagamento'],
                'codigo_forma_pagamento'=>$data['codigo_forma_pagamento'],
                'descricao'=>$data['descricao'],
                'valor'=>$data['valor']
            );
        }
        $result=array_merge($result,array('rows'=>$row));
        return json_encode($result);
    }
}