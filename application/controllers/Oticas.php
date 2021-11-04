<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Oticas extends MY_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->model('oticas_model', '', TRUE);
    }

    // PÁGINA DE USUÁRIOS
	public function index()
	{
		$this->load->view('cadastros/oticas/oticas');
	}

    // LISTAR
    public function listar()
    {
        echo $this->oticas_model->getJson();
    }

    // LISTAR COMBO
    public function listarCombo()
    {
        echo $this->oticas_model->listarCombo();
    }

    // CADASTRAR
    public function cadastrar()
    {
        if(!isset($_POST))
            show_404();
        
        if($this->oticas_model->cadastrar())
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }

    // ATUALIZAR
    public function atualizar($id_usuario)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->oticas_model->atualizar($id_usuario))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }

    // DESATIVAR
    public function desativar($id = null)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->oticas_model->desativar($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }
}