<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
		if(!isset($_SESSION['id_usuario']) || !isset($_SESSION['logado'])) {
			redirect('login');
		}
	}
}