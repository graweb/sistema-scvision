<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ficha_clinica extends MY_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->model('ficha_clinica_model', '', TRUE);
    }

    // PÁGINA DE USUÁRIOS
	public function index()
	{
        $this->load->model('oticas_model');
        $this->data['list_oticas'] = $this->oticas_model->get();
        $this->load->model('formas_pagamento_model');
        $this->data['list_formas_pgto'] = $this->formas_pagamento_model->get();
        $this->load->model('hirschberg_model');
        $this->data['list_hirschberg'] = $this->hirschberg_model->get();
        $this->load->model('olho_dominante_model');
        $this->data['list_olho_dominante'] = $this->olho_dominante_model->get();
		$this->load->view('cadastros/ficha_clinica/ficha_clinica', $this->data);
	}

    // LISTAR
    public function listar()
    {
        echo $this->ficha_clinica_model->getJson();
    }

    // CADASTRAR
    public function cadastrar()
    {
        if(!isset($_POST))
            show_404();
        
        if($this->ficha_clinica_model->cadastrar())
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }

    // ATUALIZAR
    public function atualizar($id_ficha = null)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->ficha_clinica_model->atualizar($id_ficha))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }

    // FINALIZAR
    public function finalizar($id = null)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->ficha_clinica_model->finalizar($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }

    // CANCELAR
    public function cancelar($id = null)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->ficha_clinica_model->cancelar($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }
}