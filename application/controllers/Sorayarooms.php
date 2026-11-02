<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sorayarooms extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("admin/common_model");
		$this->load->model("users_model");
		$this->load->model("rooms_model");
	}

	public function save()
	{
		$this->load->library('recaptcha');
		$this->load->library('email');

		$image = base_url() . 'assets/images/logo-soraya-email.png';

		$tbl_name = "exp_tbl_contactenos";
		$data = array(
			"name" => $this->input->post("name"),
			"mobile" => $this->input->post("mobile"),
			"email" => $this->input->post("email"),
			"enquiry" => $this->input->post("enquiry"),
			"dept" => $this->input->post("id"),
			"web" => 'CV'
		);
		$name = $this->input->post("name");
		$user_email = $this->input->post("email");
		$user_mobile = $this->input->post("mobile");
		$description = $this->input->post("enquiry");
		$room_id = $this->input->post("id");
		$city = str_replace(' ', '-', safename($this->input->post("city")));

		$captcha_answer = $this->input->post('g-recaptcha-response', true);
		$response = $this->recaptcha->verifyResponse($captcha_answer);

		if ($response['success']) {
			$result = $this->common_model->insert_data($data, $tbl_name);
			$admin_email = $this->common_model->get_admin_detail();
			$ad_email = $admin_email['email'];

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
			$message = str_replace("[ROOM_ID]", $room_id, $message);
			$message = str_replace("[IMAGE_PATH]", $image, $message);
			$this->email->message($message);
			$this->email->send();

			$this->session->set_userdata("valid_box", "1");
			$this->session->set_userdata("success_message", "Su formulario ha sido enviado con exito");
			redirect(base_url() . "sorayarooms/cuartos_vacios/" . $city . "/" . $room_id);
		} else {
			$this->session->set_userdata("error_box", "1");
			$this->session->set_userdata("success_message", "Error occurred: verifique que todo se ha ingresado");
			redirect(base_url() . "sorayarooms/cuartos_vacios/" . $city . "/" . $room_id);
		}
	}

	public function cuartos_vacios()
	{
		$this->load->library('recaptcha');
		$room_id = "S-" . $this->uri->segment(4);
		$tbl_name = "vw_habitaciones_disponibles";
		$col = "txt_serie";
		$product_seo = $this->common_model->get_item_by_id($tbl_name, $col, $room_id);

		// 1. MAPEO DE ATRIBUTOS (Compatible con PHP 5.6)
		$comodidades = array();
		if (isset($product_seo['int_wifi']) && $product_seo['int_wifi'] == 1) $comodidades[] = "WiFi";
		if (isset($product_seo['int_cocina']) && $product_seo['int_cocina'] == 1) $comodidades[] = "cocina";
		if (isset($product_seo['int_bpriv']) && $product_seo['int_bpriv'] == 1) $comodidades[] = "baño privado";
		if (isset($product_seo['int_amoblado']) && $product_seo['int_amoblado'] == 1) $comodidades[] = "amoblado";
		if (isset($product_seo['int_lavanderia']) && $product_seo['int_lavanderia'] == 1) $comodidades[] = "lavandería";
		if ((isset($product_seo['int_ascensor']) && $product_seo['int_ascensor'] == 1) || (isset($product_seo['int_elevador']) && $product_seo['int_elevador'] == 1)) $comodidades[] = "ascensor";
		if (isset($product_seo['int_ind']) && $product_seo['int_ind'] == 1) $comodidades[] = "entrada independiente";
		if (isset($product_seo['int_kds']) && $product_seo['int_kds'] == 1) $comodidades[] = "apto para niños";
		if (isset($product_seo['int_mascota']) && $product_seo['int_mascota'] == 1) $comodidades[] = "mascotas permitidas";

		// Construcción de la frase de atributos
		$texto_comodidades = "";
		if (!empty($comodidades)) {
			$texto_comodidades = " Cuenta con: " . implode(", ", $comodidades) . ".";
		}

		// 2. SEO - META TITLE
		$data['title_header_page'] = "Renta de Cuarto en " . $product_seo['txt_ciudad'] . " | " . $product_seo['tipo'] . " " . $product_seo['txt_serie'] . " | Soraya Rooms";

		// 3. SEO - META DESCRIPTION
		$resumen = !empty($product_seo['txt_resumen']) ? $product_seo['txt_resumen'] : (isset($product_seo['txt_caracteristicas']) ? $product_seo['txt_caracteristicas'] : '');
		$meta_description = "Alquiler de habitación en " . $product_seo['txt_sector'] . ", " . $product_seo['txt_ciudad'] . "." . $texto_comodidades . " " . $resumen;

		// Cortamos a 155 caracteres para que Google no lo recorte feo
		$data['description_header_page'] = mb_strimwidth($meta_description, 0, 155, "...") . " ¡Múdate hoy mismo!";

		// 4. SEO - KEYWORDS
		$zona = $product_seo['txt_sector'] . " " . $product_seo['txt_ciudad'];
		$comodidad_principal = isset($comodidades[0]) ? $comodidades[0] : "baño";

		$data['keywords_header_page'] = "cuartos en " . $zona . ", rento habitacion " . $zona . ", cuarto con " . $comodidad_principal . ", " . $product_seo['txt_etiqueta'] . ", rento cuartos, se rentan cuartos, cuartos NYC, habitaciones amobladas";

		$this->load->view("templates/header", $data);
		$this->load->view("templates/room");
		$this->load->view("templates/footer");
	}

	public function index($offset = 0)
	{
		$this->load->library('pagination');

		// init params
		$data = array();
		$limit_per_page = 24;
		$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_records = $this->common_model->get_total();

		if ($total_records > 0) {
			// get current page records
			$data["results"] = $this->common_model->get_current_page_records($limit_per_page, $start_index);

			// ==========================================
			// CORREGIDO: Asignar color temático a cada cuarto regular
			// ==========================================
			if (!empty($data["results"])) {
				foreach ($data["results"] as &$cuarto) {
					// Extraer el tipo de inquilino (campo viene con texto largo)
					$tipo_completo = isset($cuarto->tipo) ? $cuarto->tipo : '';

					// Extraer los primeros 3-4 caracteres para obtener la abreviatura
					// Ej: "Hombre / Male (M)" -> "H"
					// Ej: "U/P (Unisex or Couple)" -> "U/P"
					$tipo_cuarto = '';
					if (!empty($tipo_completo)) {
						// Buscar si hay un patrón como "H/P" o "U/P" al inicio
						if (preg_match('/^(H\/P|M\/P|U\/P)/i', $tipo_completo, $matches)) {
							$tipo_cuarto = strtoupper($matches[1]);
						} else {
							// Tomar solo la primera letra (H, M, U, P)
							$primer_caracter = strtoupper(trim(substr($tipo_completo, 0, 1)));
							if (in_array($primer_caracter, array('H', 'M', 'U', 'P'))) {
								$tipo_cuarto = $primer_caracter;
							}
						}
					}

					$cuarto->room_color = $this->getRoomColor($tipo_cuarto);
				}
			}

			$config['base_url'] = base_url() . 'sorayarooms/index';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config["uri_segment"] = 3;

			// inicializar la paginacion
			$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination" style="justify-content: center;">';
			$config['full_tag_close']   = '</ul></nav></div>';
			$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close']    = '</span></li>';
			$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
			$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['next_tag_close']   = '<span aria-hidden="true"></span></span></li>';
			$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['prev_tag_close']   = '</span></li>';
			$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['first_tag_close']  = '</span></li>';
			$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['last_tag_close']   = '</span></li>';

			$this->pagination->initialize($config);

			// build paging links
			$data["cuartos_array"] = $this->pagination->create_links();
		}

		$tbl = "banners";
		$col = "int_estado";
		$value = "1";
		$data['banners'] = $this->common_model->get_all_list($tbl, $col, $value);

		$data['title_header_page'] = 'Rento Cuarto Vacio | Cuartos economicos y baratos en Renta - Bronx NY';
		$data['description_header_page'] = 'Cuartos Vacios Baratos o en Alquiler, Cuartos en Renta Habitaciones Disponibles en el Bronx, Para Personas Solas o Parejas, Cuartos disponibles, Cuartos en el Bronx, Rento cuarto, Cuarto amoblado, Cuarto en renta, Necesito cuarto, Busco cuarto, Cuartos independientes, Mudese hoy mismo a un cuarto, Cuartos para pareja, Cuarto para persina sola, Cuartos en New York';
		$data['keywords_header_page'] = 'Se rentan cuartos amoblados y vacios a personas solas o pareja, si tiene cuartos disponibles llamenos, mudese hoy mismo a cuarto';

		// Traer los cuartos VIP para la parte superior
		$data["premium_results"] = $this->common_model->get_cuartos_premium();

		// ==========================================
		// CORREGIDO: Asignar color temático a los cuartos Premium/VIP
		// ==========================================
		if (!empty($data["premium_results"])) {
			foreach ($data["premium_results"] as &$vip) {
				// En premium el campo puede venir como objeto, verificamos varias posibilidades
				$tipo_vip = '';
				if (isset($vip->tipo)) {
					$tipo_vip = $vip->tipo;
				} elseif (isset($vip->txt_abreviado)) {
					$tipo_vip = $vip->txt_abreviado;
				} elseif (isset($vip->inquilino_abreviado)) {
					$tipo_vip = $vip->inquilino_abreviado;
				}
				$vip->room_color = $this->getRoomColor($tipo_vip);
			}
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/index');
		$this->load->view('templates/footer', $data);
	}

	/**
	 * Devuelve el color hexadecimal según el tipo de inquilino
	 * Compatible con PHP 5.6
	 * 
	 * @param string $tipo
	 * @return string
	 */
	private function getRoomColor($tipo)
	{
		$colors = array(
			'M'   => '#FF69B4', // Rosado (Mujer)
			'H'   => '#4169E1', // Azul (Hombre)
			'U'   => '#FFD700', // Amarillo (Unisex)
			'P'   => '#32CD32', // Verde (Pareja)
			'H/P' => '#D2B48C', // Marrón Claro (Hombre/Pareja)
			'M/P' => '#FF8C00', // Naranja (Mujer/Pareja)
			'U/P' => '#9370DB'  // Morado (Unisex/Pareja)
		);

		// Limpiamos espacios y convertimos a mayúsculas para asegurar la coincidencia
		$tipo_limpio = strtoupper(trim($tipo));

		// Devuelve el color asignado o un gris neutro (#6c757d) por defecto si no coincide
		return isset($colors[$tipo_limpio]) ? $colors[$tipo_limpio] : '#6c757d';
	}
}
