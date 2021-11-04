<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes_fornecedores_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get(){
        return $this->db->get('tb_clientes_fornecedores')->result();
    }

    public function listarCombo()
    {
        $this->db->select('*');
        $this->db->from('tb_clientes_fornecedores');
        $this->db->where('situacao', 1);
        return json_encode($this->db->get()->result());
    }

    public function cadastrar(){
        return $this->db->insert('tb_clientes_fornecedores',array(
            'razao_social'=>$this->input->post('razao_social', true),
            'cnpj'=>$this->input->post('cnpj', true),
            'cpf'=>$this->input->post('cpf', true),
            'banco'=>$this->input->post('banco', true),
            'agencia'=>$this->input->post('agencia', true),
            'conta'=>$this->input->post('conta', true),
            'cep'=>$this->input->post('cep', true),
            'uf'=>$this->input->post('uf', true),
            'estado'=>$this->input->post('estado', true),
            'cidade'=>$this->input->post('cidade', true),
            'bairro'=>$this->input->post('bairro', true),
            'tipo_logradouro'=>$this->input->post('tipo_logradouro', true),
            'logradouro'=>$this->input->post('logradouro', true),
            'numero'=>$this->input->post('numero', true),
            'complemento'=>$this->input->post('complemento', true),
            'situacao'=>$this->input->post('situacao', true),
            'tipo'=>$this->input->post('tipo', true),
        ));
    }

    public function atualizar($id)
    {
        $this->db->where('id_cliente_fornecedor', $id);
        return $this->db->update('tb_clientes_fornecedores',array(
            'razao_social'=>$this->input->post('razao_social', true),
            'cnpj'=>$this->input->post('cnpj', true),
            'cpf'=>$this->input->post('cpf', true),
            'banco'=>$this->input->post('banco', true),
            'agencia'=>$this->input->post('agencia', true),
            'conta'=>$this->input->post('conta', true),
            'cep'=>$this->input->post('cep', true),
            'uf'=>$this->input->post('uf', true),
            'estado'=>$this->input->post('estado', true),
            'cidade'=>$this->input->post('cidade', true),
            'bairro'=>$this->input->post('bairro', true),
            'tipo_logradouro'=>$this->input->post('tipo_logradouro', true),
            'logradouro'=>$this->input->post('logradouro', true),
            'numero'=>$this->input->post('numero', true),
            'complemento'=>$this->input->post('complemento', true),
            'situacao'=>$this->input->post('situacao', true),
            'tipo'=>$this->input->post('tipo', true),
            'atualizado_em' => date('Y-m-d H:i:s')
        ));
    }

    public function ativarDesativar($id)
    {
        $this->db->where('id_cliente_fornecedor', $id);
        return $this->db->update('tb_clientes_fornecedores',array(
            'situacao'=>$this->input->post('situacao_cliente_fornecedor_ativar_desativar',true)
        ));
    }

    public function getJson()
    {
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id_cliente_fornecedor';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
        $offset = ($page-1) * $rows;

        $id_cliente_fornecedor = isset($_POST['id_cliente_fornecedor']) ? strval($_POST['id_cliente_fornecedor']) : '';
        $razao_social = isset($_POST['razao_social']) ? strval($_POST['razao_social']) : '';

        $this->db->limit($rows, $offset);
        $this->db->order_by($sort, $order);
        $this->db->like('id_cliente_fornecedor', $id_cliente_fornecedor);
        $this->db->like('razao_social', $razao_social);

        $criteria = $this->db->get('tb_clientes_fornecedores');

        $result = array();
        $result['total'] = $this->db->get('tb_clientes_fornecedores')->num_rows();
        $row = array();
        
        foreach($criteria->result_array() as $data)
        {   
            $row[] = array(
                'id_cliente_fornecedor'=>$data['id_cliente_fornecedor'],
                'razao_social'=>$data['razao_social'],
                'cnpj'=>$data['cnpj'],
                'cpf'=>$data['cpf'],
                'banco'=>$data['banco'],
                'agencia'=>$data['agencia'],
                'conta'=>$data['conta'],
                'cep'=>$data['cep'],
                'uf'=>$data['uf'],
                'estado'=>$data['estado'],
                'cidade'=>$data['cidade'],
                'bairro'=>$data['bairro'],
                'tipo_logradouro'=>$data['tipo_logradouro'],
                'logradouro'=>$data['logradouro'],
                'numero'=>$data['numero'],
                'complemento'=>$data['complemento'],
                'situacao'=>$data['situacao'],
                'tipo'=>$data['tipo'],
            );
        }
        $result=array_merge($result,array('rows'=>$row));
        return json_encode($result);
    }
}