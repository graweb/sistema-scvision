<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hirschberg extends MY_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->model('hirschberg_model', '', TRUE);
    }

    // PÁGINA DE USUÁRIOS
	public function index()
	{
		$this->load->view('cadastros/hirschberg/hirschberg');
	}

    // LISTAR
    public function listar()
    {
        echo $this->hirschberg_model->getJson();
    }

    // LISTAR COMBO
    public function listarCombo()
    {
        echo $this->hirschberg_model->listarCombo();
    }

    // CADASTRAR
    public function cadastrar()
    {
        if(!isset($_POST))
            show_404();
        
        if($this->hirschberg_model->cadastrar())
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }

    // ATUALIZAR
    public function atualizar($id_usuario)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->hirschberg_model->atualizar($id_usuario))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }
}