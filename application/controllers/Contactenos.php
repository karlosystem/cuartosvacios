<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contactenos extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("admin/common_model");
  }

  public function index()
  {
    $this->load->library('recaptcha');

    $data['title_header_page'] = 'Renta de Cuartos en BRONX | Renta de habitaciones BRONX';
    $data['description_header_page'] = '¿Tienes un cuarto vacío en casa o quieres aprovechar al máximo una segunda propiedad?';
    $data['keywords_header_page'] = 'programador,php,Lima,sql,css,html,visual studio,paginas web,desarrollo,precios de paginas,angular';

    $this->load->view('templates/header', $data);
    $this->load->view('templates/contactenos');
    $this->load->view('templates/footer');
  }

  public function save()
  {
    $this->load->library('recaptcha');
    $image = base_url() . 'assets/images/logo-soraya-email.png';

    $tbl_name = "exp_tbl_contactenos";
    $data = array(
      "name" => $this->input->post("name"),
      "mobile" => $this->input->post("mobile"),
      "email" => $this->input->post("email"),
      "enquiry" => $this->input->post("enquiry"),
      "web" => 'CV'
    );
    $name = $this->input->post("name");
    $user_email = $this->input->post("email");
    $user_mobile = $this->input->post("mobile");
    $description = $this->input->post("enquiry");

    $captcha_answer = $this->input->post('g-recaptcha-response', true);
    $response = $this->recaptcha->verifyResponse($captcha_answer);

    if ($response['success']) {
      $result = $this->common_model->insert_data($data, $tbl_name);
      $admin_email = $this->common_model->get_admin_detail();
      $ad_email = $admin_email['email'];
      $this->load->library('email');
      $config['mailtype'] = 'html';
      $this->email->initialize($config);
      $this->email->from($user_email, "Sorayarooms-Contact");
      $this->email->to($ad_email);
      $this->email->subject('Contact-us');

      $message = @file_get_contents(base_url() . "/templetes/contact.html");
      $message = str_replace("[CUSTOMER_USERNAME]", $name, $message);
      $message = str_replace("[CUSTOMER_Email]", $user_email, $message);
      $message = str_replace("[CUSTOMER_Mobile]", $user_mobile, $message);
      $message = str_replace("[DESCRIPTION]", $description, $message);
      $message = str_replace("[IMAGE_PATH]", $image, $message);
      $this->email->message($message);
      $this->email->send();

      $this->session->set_userdata("valid_box", "1");
      $this->session->set_userdata("success_message", "Su correo ha sido enviado con exito");
      redirect(base_url() . "contactenos");
    } else {
      $this->session->set_userdata("error_box", "1");
      $this->session->set_userdata("success_message", "Hay un error ingrese todos los datos solicitados");
      redirect(base_url() . "contactenos");
    }
  } //fin de la funcion


}
