<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes_fornecedores extends MY_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->model('clientes_fornecedores_model', '', TRUE);
    }

    // PÁGINA DE CLIENTES
	public function index()
	{
		$this->load->view('cadastros/clientes_fornecedores/clientes_fornecedores');
	}

    // LISTAR
    public function listar()
    {
        echo $this->clientes_fornecedores_model->getJson();
    }

    // LISTAR COMBO
    public function listarCombo()
    {
        echo $this->clientes_fornecedores_model->listarCombo();
    }

    // CADASTRAR
    public function cadastrar()
    {
        if(!isset($_POST))
            show_404();
        
        if($this->clientes_fornecedores_model->cadastrar())
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }

    // ATUALIZAR
    public function atualizar($id_ficha = null)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->clientes_fornecedores_model->atualizar($id_ficha))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }

    // ATIVAR/DESATIVAR
    public function ativarDesativar($id = null)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->clientes_fornecedores_model->ativarDesativar($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }
}