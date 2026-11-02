<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'sorayarooms';
$route['404_override'] = 'my404';
$route['translate_uri_dashes'] = FALSE;
// Esto captura la URL "renta/cualquier-cosa" y se la pasa al controlador "renta" función "index"
$route['renta/(:any)'] = 'renta/index/$1';