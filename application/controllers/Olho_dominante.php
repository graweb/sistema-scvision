<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Olho_dominante extends MY_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->model('olho_dominante_model', '', TRUE);
    }

    // PÁGINA DE USUÁRIOS
	public function index()
	{
		$this->load->view('cadastros/olho_dominante/olho_dominante');
	}

    // LISTAR
    public function listar()
    {
        echo $this->olho_dominante_model->getJson();
    }

    // LISTAR COMBO
    public function listarCombo()
    {
        echo $this->olho_dominante_model->listarCombo();
    }

    // CADASTRAR
    public function cadastrar()
    {
        if(!isset($_POST))
            show_404();
        
        if($this->olho_dominante_model->cadastrar())
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }

    // ATUALIZAR
    public function atualizar($id_usuario)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->olho_dominante_model->atualizar($id_usuario))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }
}