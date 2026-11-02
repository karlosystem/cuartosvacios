<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Aplicacion extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("admin/common_model");
  }

  public function index()
  {
    $this->load->library('recaptcha');
    $data["title_header_page"] = "Registration Form For Vacant Rooms Available For Rent - Rooms in New York, Rooms for couples";
    $data['description_header_page'] = 'Rooms for couples, Rooms for Single Person, Rooms in New York, Cheap Rooms, Affordable Rooms, Rooms to Shared, Rooms in Westcherter, Rooms in Fordham Road, Rooms near Train Station, Rooms near Public Transportation, Looking for Roommates, Cozy Rooms, Unfurnished Rooms, Private Rooms in Shared APT, Clean Private Room.';
    $data['keywords_header_page'] = 'Rooms for couples, Rooms for Single Person, Rooms in New York, Cheap Rooms, Affordable Rooms, Rooms to Shared, Rooms in Westcherter, Rooms in Fordham Road, Rooms near Train Station, Rooms near Public Transportation, Looking for Roommates, Cozy Rooms, Unfurnished Rooms, Private Rooms in Shared APT, Clean Private Room.';

    //$this->load->view('templates/header_aplicacion', $data);
    $this->load->view('templates/aplicattion');
    //$this->load->view('templates/footer_aplicacion');
  }



  public function espanol()
  {
    $this->load->library('recaptcha');
    $data["title_header_page"] = "Formulario de Ingreso de Cuartos Vacios Disponibles Para Rentar en Bronx - Cuartos para Compartir";
    $data['description_header_page'] = 'Cuartos Vacios disponibles, Cuartos en el Bronx, Rento cuarto, Cuarto amoblado, Cuarto en renta, Necesito cuarto, Busco cuarto, Cuartos independientes, Mudese hoy mismo a un cuarto, Cuartos para pareja, Cuarto para persona sola, Cuartos en New York, Cuartos Baratos, Cuartos para Compartir, Cuartos en Weschester, Cuartos por fordham, Cuartos cerca del tren, Cuartos económicos, múdese hoy mismo a cuarto';
    $data['keywords_header_page'] = 'Cuartos disponibles, Cuartos en el Bronx, Rento cuarto, Cuarto amoblado, Cuarto en renta, Necesito cuarto, Busco cuarto, Cuartos independientes, Mudese hoy mismo a un cuarto, Cuartos para pareja, Cuarto para persona sola, Cuartos en New York, Cuartos Baratos, Cuartos para Compartir, Cuartos en Weschester, Cuartos por fordham, Cuartos cerca del tren, Cuartos económicos, múdese hoy mismo a cuarto';

    //$this->load->view('templates/header_aplicacion', $data);
    $this->load->view('templates/aplicacion_es');
    //$this->load->view('templates/footer');
  }

  public function exito()
  {
    $data["title_header_page"] = "Form Aplication";
    $data['description_header_page'] = 'Aplication 01';
    $data['keywords_header_page'] = 'Aplication 01';

    $this->load->view('templates/header', $data);
    $this->load->view('templates/aplicacion_exito');
    $this->load->view('templates/footer');
  }


  public function guardar()
  {
    $this->load->library('recaptcha');
    $tbl_name = "aplicacion";
    $data = array(
      "nombre_completo" => $this->input->post("txt_full_name"),
      "procedencia" => $this->input->post("txtprocedencia"),
      "couple" => $this->input->post("txtcouple"),
      "telefono" => $this->input->post("txt_phone"),
      "direccion_actual" => $this->input->post("txt_present_address"),
      "ciudad" => $this->input->post("txt_city"),
      "estado" => $this->input->post("txt_estado"),
      "propietario_actual" => $this->input->post("txt_present_landlord"),
      "propietario_telefono" => $this->input->post("txt_present_phone"),
      "empleo_empresa" => $this->input->post("txt_company_name"),
      "empleo_telefono" => $this->input->post("txt_company_phone"),
      "empleo_rubro" => $this->input->post("txt_company_rubro"),
      "empleo_tiempo" => $this->input->post("txt_company_how_long"),
      "empleo_direccion" => $this->input->post("txt_company_address"),
      "empleo_ciudad" => $this->input->post("txt_company_city"),
      "empleo_estado" => $this->input->post("txt_company_state"),
      "referencia_nombre_1" => $this->input->post("txt_full_name_reference_1"),
      "referencia_telefono_1" => $this->input->post("txt_phone_reference_1"),
      "referencia_relacion_1" => $this->input->post("txt_relation_reference_1"),
      "referencia_nombre_2" => $this->input->post("txt_full_name_reference_2"),
      "referencia_telefono_2" => $this->input->post("txt_phone_reference_2"),
      "referencia_relacion_2" => $this->input->post("txt_relation_reference_2"),
      "emergencia_nombre" => $this->input->post("txt_name_emergency"),
      "emergencia_telefono" => $this->input->post("txt_phone_emergency"),
      "biografia" => $this->input->post("txt_acerca"),
      "dia_mudanza" => $this->input->post("sle_dia"),
      "mes_mudanza" => $this->input->post("sle_mes"),
      "anio_mudanza" => $this->input->post("sle_anio"),
      "fk_estado" => 5,
      "activo" => 0,
      "origen" => $this->input->post("optorigen"),
      "fecha_registro" => date("Y-m-d"),
    );

    $name = $this->input->post("txt_full_name");
    $phone = $this->input->post("txt_phone");
    $address = $this->input->post("txt_present_address");
    $city = $this->input->post("txt_city");
    $state = $this->input->post("txt_estado");
    $present_landlord = $this->input->post("txt_present_landlord");
    $present_phone = $this->input->post("txt_present_phone");
    $company_name = $this->input->post("txt_company_name");
    $company_phone = $this->input->post("txt_company_phone");
    $company_rubro = $this->input->post("txt_company_rubro");
    $company_longtime = $this->input->post("txt_company_how_long");
    $company_address = $this->input->post("txt_company_address");
    $company_city = $this->input->post("txt_company_city");
    $company_state = $this->input->post("txt_company_state");

    $reference_name1 = $this->input->post("txt_full_name_reference_1");
    $reference_phone1 = $this->input->post("txt_phone_reference_1");
    $reference_relation1 = $this->input->post("txt_relation_reference_1");

    $reference_name2 = $this->input->post("txt_full_name_reference_2");
    $reference_phone2 = $this->input->post("txt_phone_reference_2");
    $reference_relation2 = $this->input->post("txt_relation_reference_2");

    $emergency_name = $this->input->post("txt_name_emergency");
    $emergency_phone = $this->input->post("txt_phone_emergency");

    $mudanza_dia = $this->input->post("sle_dia");
    $mudanza_mes = $this->input->post("sle_mes");
    $mudanza_anio = $this->input->post("sle_anio");

    $origen = $this->input->post("radio-origen");

    $user_email = $this->input->post("txt_email");
    $description = $this->input->post("txt_acerca");
    
    $admin_email = $this->common_model->get_admin_detail();
    $ad_email = $admin_email['email'];

    $captcha_answer = $this->input->post('g-recaptcha-response', true);
    $response = $this->recaptcha->verifyResponse($captcha_answer);

    if ($response['success']) {
      $result = $this->common_model->insert_data($data, $tbl_name);
      $this->session->set_userdata("valid_box", "1");
      $this->session->set_userdata("success_message", "Your aplication has been sent..We will contact you soon.");
      redirect(base_url() . "aplicacion/exito");
    } else {
      $this->session->set_userdata("error_box", "1");
      $this->session->set_userdata("success_message", "Error occurred: check if you are not a robot");
      //redirect(base_url() . "aplicacion");
    }

    

   /*  if ($this->email->send()) {
      $this->session->set_userdata("valid_box", "1");
      $this->session->set_userdata("success_message", "Your aplication has been sent..We will contact you soon.");
      redirect(base_url() . "aplicacion/exito");
    } else {
      $this->session->set_userdata("error_box", "1");
      $this->session->set_userdata("success_message", "Error occurred");
      redirect(base_url() . "aplicacion");
    } */

    
  }
}
