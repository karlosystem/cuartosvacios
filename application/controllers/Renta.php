<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Renta extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("admin/common_model");
		// ... otros modelos
	}

	// En tu método index de Renta.php
	public function index($slug = null)
	{
		if (!$slug) {
			show_404();
		}

		// 1. Obtener la información general del condado (meta tags)
		$data['condado'] = $this->common_model->get_condado_by_slug($slug);

		if (empty($data['condado'])) {
			show_404();
		}

		// 2. Obtener las habitaciones específicas para este condado
		// Aquí es donde usas el nuevo método que acabas de agregar:
		$data['habitaciones'] = $this->common_model->get_habitaciones_por_condado($slug);

		// 3. Pasar variables de SEO
		$data['title_header_page'] = $data['condado']['meta_title'];
		$data['description_header_page'] = $data['condado']['meta_description'];
		$data['keywords_header_page'] = $data['condado']['meta_keywords'];

		// Cargar vistas
		$this->load->view('templates/header', $data);
		$this->load->view('templates/condado', $data); // Aquí mostrarás el listado
		$this->load->view('templates/footer', $data);
	}
}
