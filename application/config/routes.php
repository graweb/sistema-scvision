<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'scvision';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// ROTAS DE LAYOUT
$route['menu'] = 'scvision/menu';
$route['painel'] = 'scvision/painel';
$route['rodape'] = 'scvision/rodape';

$route['autenticar'] = 'scvision/autenticar';
$route['login'] = 'scvision/login';
$route['logout'] = 'scvision/sair';