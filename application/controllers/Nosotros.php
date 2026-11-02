<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Nosotros extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("admin/common_model");
  }

  public function index()
  {
    $this->load->library('recaptcha');

    $data['title_header_page'] = 'Cuartos Disponibles en el Bronx para persona sola o Pareja';
    $data['description_header_page'] = 'Cuartos disponibles, Cuartos en el Bronx, Rento cuarto, Cuarto amoblado, Cuarto en renta, Necesito cuarto, Busco cuarto, Cuartos independientes, Mudese hoy mismo a un cuarto, Cuartos para pareja, Cuarto para persona sola, Cuartos en New York, Cuartos Baratos, Cuartos para Compartir, Cuartos en Weschester, Cuartos por fordham, Cuartos cerca del tren, Cuartos económicos, múdese hoy mismo a cuarto';
    $data['keywords_header_page'] = 'alquiler,rooms,vacios,habitaciones,free,avisos,gratis,departamento,precios,solo,pareja,grande,mediano,vacio';


    $this->load->view('templates/header', $data);
    $this->load->view('templates/nosotros');
    $this->load->view('templates/footer');
  }
}
