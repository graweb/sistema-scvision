<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtos extends MY_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->model('produtos_model', '', TRUE);
    }

    // PÁGINA DE USUÁRIOS
	public function index()
	{
		$this->load->view('cadastros/produtos/produtos');
	}

    // LISTAR
    public function listar()
    {
        echo $this->produtos_model->getJson();
    }

    // LISTAR COMBO
    public function listarCombo()
    {
        echo $this->produtos_model->listarCombo();
    }

    // CADASTRAR
    public function cadastrar()
    {
        if(!isset($_POST))
            show_404();
        
        if($this->produtos_model->cadastrar())
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }

    // ATUALIZAR
    public function atualizar($id = null)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->produtos_model->atualizar($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }

    // DESATIVAR
    public function ativarDesativar($id = null)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->produtos_model->ativarDesativar($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }
}