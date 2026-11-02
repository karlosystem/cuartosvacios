<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My404 extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->output->set_status_header('404');

    $data['title_header_page'] = 'Se renta cuartos vacios en el Bronx';
    $data['description_header_page'] = 'Rento cuartos vacios a personas solas o pareja, si tiene cuartos vacios llamenos nosotros lo rentamos. visitenos ';
    $data['keywords_header_page'] = 'alquiler,rooms,vacios,habitaciones,free,avisos,gratis,departamento,precios,solo,pareja,grande,mediano,vacio';

    $this->load->view('templates/header', $data);
    $this->load->view('templates/err404');
    $this->load->view('templates/footer');
  }
}
