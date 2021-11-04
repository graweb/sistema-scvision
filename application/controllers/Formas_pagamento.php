<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Formas_pagamento extends MY_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->model('formas_pagamento_model', '', TRUE);
    }

    // PÁGINA DE USUÁRIOS
	public function index()
	{
		$this->load->view('cadastros/formas_pagamento/formas_pagamento');
	}

    // LISTAR
    public function listar()
    {
        echo $this->formas_pagamento_model->getJson();
    }

    // LISTAR COMBO
    public function listarCombo()
    {
        echo $this->formas_pagamento_model->listarCombo();
    }

    // CADASTRAR
    public function cadastrar()
    {
        if(!isset($_POST))
            show_404();
        
        if($this->formas_pagamento_model->cadastrar())
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }

    // ATUALIZAR
    public function atualizar($id_usuario)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->formas_pagamento_model->atualizar($id_usuario))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }
}