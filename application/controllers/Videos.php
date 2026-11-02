<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Videos extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("admin/common_model");
    $this->load->model("videos_model");
    $this->load->library('pagination');
  }

  /*   public function index()
  {
	  $data["video_youtube"] = $this->videos_model->listado_videos_activos();

    $data["title_header_page"] = "Videos - Cuartos Vacios en el Bronx";
    $data['description_header_page'] = 'Cuartos disponibles, Cuartos en el Bronx, Rento cuarto, Cuarto amoblado, Cuarto en renta, Necesito cuarto, Busco cuarto, Cuartos independientes, Mudese hoy mismo a un cuarto, Cuartos para pareja, Cuarto para persona sola, Cuartos en New York, Cuartos Baratos, Cuartos para Compartir, Cuartos en Weschester, Cuartos por fordham, Cuartos cerca del tren';
    $data['keywords_header_page'] = 'Cuartos disponibles, Cuartos en el Bronx, Rento cuarto, Cuarto amoblado, Cuarto en renta, Necesito cuarto, Busco cuarto, Cuartos independientes, Mudese hoy mismo a un cuarto, Cuartos para pareja, Cuarto para persona sola, Cuartos en New York, Cuartos Baratos, Cuartos para Compartir, Cuartos en Weschester, Cuartos por fordham, Cuartos cerca del tren, Cuartos económicos, múdese hoy mismo a cuarto';

    $this->load->view('templates/header', $data);
    $this->load->view('templates/videos');
    $this->load->view('templates/footer');
  } */

  public function validar_codigo_ajax()
  {
    $codigo = $this->input->post('codigo');
    $codigo_limpio = trim($codigo);

    // Si el usuario escribió "V-54710", extraemos solo los números
    // Si escribió "54710", lo dejamos igual
    $solo_numeros = preg_replace('/[^0-9]/', '', $codigo_limpio);

    // Para validar en la base de datos, seguimos necesitando el "V-" 
    // porque así está guardado en tu tabla MySQL
    $existe = $this->videos_model->verificar_codigo("V-" . $solo_numeros);

    if ($existe) {
      // AQUÍ ELIMINAMOS EL V- DE LA URL
      echo json_encode(['status' => 'success', 'url' => base_url("videos/search_video?codigo=" . $solo_numeros)]);
    } else {
      echo json_encode(['status' => 'error', 'message' => 'El código de video ingresado no existe.']);
    }
  }

  public function index()
  {
    $config = array();
    $config["base_url"] = base_url("videos/index");
    $config["total_rows"] = $this->videos_model->total_videos_activos();
    $config["per_page"] = 30;
    $config["uri_segment"] = 3;

    // Estilos simples (opcional)

    // Bootstrap 4 Pagination
    $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
    $config['full_tag_close'] = '</ul></nav>';

    $config['first_link'] = 'Primero';
    $config['first_tag_open'] = '<li class="page-item">';
    $config['first_tag_close'] = '</li>';

    $config['last_link'] = 'Último';
    $config['last_tag_open'] = '<li class="page-item">';
    $config['last_tag_close'] = '</li>';

    $config['next_link'] = 'Siguiente';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';

    $config['prev_link'] = 'Anterior';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close'] = '</span></li>';

    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';

    $config['attributes'] = array('class' => 'page-link');

    $this->pagination->initialize($config);

    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

    $data["video_youtube"] = $this->videos_model
      ->listado_videos_activos($config["per_page"], $page);

    $data["links"] = $this->pagination->create_links();

    $data["title_header_page"] = "Videos - Cuartos Vacios en el Bronx";
    $data['description_header_page'] = 'Cuartos disponibles, Cuartos en el Bronx';
    $data['keywords_header_page'] = 'Search Video Result';

    $this->load->view('templates/header', $data);
    $this->load->view('templates/videos', $data);
    $this->load->view('templates/footer');
  }

  public function search_video()
  {
    // 1. Intentamos obtener el valor por POST (Formulario manual)
    $keyword = $this->input->post("keyword");

    // 2. Si POST está vacío, intentamos obtenerlo por GET (Desde el Modal)
    if (empty($keyword)) {
      $keyword = $this->input->get("codigo");
    }

    // 3. Ejecutamos la búsqueda en el modelo con el código obtenido
    $data["video_array"] = $this->videos_model->search_video($keyword);

    // Configuración de metadatos para la página de resultados
    $data['title_header_page'] = "Search Video Result";
    $data['description_header_page'] = 'Search Video Result';
    $data['keywords_header_page'] = 'Search Video Result';

    // Pasamos el término buscado a la vista para mostrarlo en el input
    $data["dato"] = $keyword;

    // 4. Cargamos las vistas
    $this->load->view("templates/header", $data);
    $this->load->view("templates/videos_search", $data); // Asegúrate de pasar $data aquí también
    $this->load->view("templates/footer");
  }

  public function youtubeid($url)
  {
    if (preg_match('%youtube\\.com/(.+)%', $url, $match)) {
      $match = $match[1];
      $replace = array("watch?v=", "v/", "vi/");
      $match = str_replace($replace, "", $match);
    }
    return $match;
  }

  public  function _GetVideoIdFromUrl($url)
  {
    $parts = explode('?v=', $url);
    if (count($parts) == 2) {
      $tmp = explode('&', $parts[1]);
      if (count($tmp) > 1) {
        return $tmp[0];
      } else {
        return $parts[1];
      }
    } else {
      return $url;
    }
  }


  public function EmbedVideo($videoid, $width = 410, $height = 170)
  {
    $videoid = $this->_GetVideoIdFromUrl($videoid);
    return '<object width="' . $width . '" height="' . $height . '"><param name="movie" value="https://www.youtube.com/v/' . $videoid . '"></param><param name="wmode" value="transparent"></param><embed src="https://www.youtube.com/v/' . $videoid . '" type="application/x-shockwave-flash" wmode="transparent" width="' . $width . '" height="' . $height . '"></embed></object>';
  }

  public function GetImg($videoid, $imgid = 1)
  {
    $videoid = $this->_GetVideoIdFromUrl($videoid);
    return "http://img.youtube.com/vi/$videoid/$imgid.jpg";
  }

  public function ShowImg($videoid, $imgid = 1, $w = 250, $h = 200, $alt = 'CuartosVacios - VIDEO YOUTUBE')
  {
    return "<img src='" . $this->GetImg($videoid, $imgid) . "' width='" . $w . "' height='" . $h . "' border='0' alt='" . $alt . "' title='" . $alt . "' />";
  }
}
