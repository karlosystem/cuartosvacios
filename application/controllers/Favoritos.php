<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Favoritos extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/common_model");
    }

    public function index()
    {
        $this->load->library('recaptcha');

        $data['title_header_page'] = 'Favoritos';
        $data['description_header_page'] = 'Favoritos';
        $data['keywords_header_page'] = 'favoritos';
        $data['codigo_url'] = "";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/favoritos');
        $this->load->view('templates/footer', $data);
    }

    public function cargar_favoritos_ajax()
    {
        $ids = $this->input->post('ids');

        if (!empty($ids) && is_array($ids)) {
            $resultados = $this->common_model->get_favoritos_by_ids($ids);

            if ($resultados) {
                date_default_timezone_set('America/New_York');
                $hoy_sistema = date('Y-m-d');

                foreach ($resultados as $cuarto) {
                    // Lógica de Precios y Periodos
                    $data['periodo'] = "";
                    $data['precio_solo'] = "";
                    $data['precio_pareja'] = "";

                    if (!empty($cuarto->txt_precio_solo) || !empty($cuarto->txt_precio_pareja)) {
                        $data['periodo'] = "SEMANAL";
                        $data['precio_solo'] = "$ " . $cuarto->txt_precio_solo;
                        $data['precio_pareja'] = "$ " . $cuarto->txt_precio_pareja;
                    }
                    if (!empty($cuarto->txt_precio_mensual) || !empty($cuarto->txt_precio_mensual01)) {
                        $data['periodo'] = "MENSUAL";
                        $data['precio_solo'] = "$ " . $cuarto->txt_precio_mensual;
                        $data['precio_pareja'] = "$ " . $cuarto->txt_precio_mensual01;
                    }

                    // Fechas
                    $f_registro = trim(substr((string)$cuarto->fecha_registro, 0, 10));
                    $f_ingreso  = trim(substr((string)$cuarto->fecha_ingreso, 0, 10));

                    $data['mostrar_tag'] = false;
                    $data['clase_tag'] = "";
                    $data['texto_tag'] = "";
                    $data['clase_borde_cuadro'] = "";

                    if ($f_registro == $hoy_sistema) {
                        $data['mostrar_tag'] = true;
                        $data['clase_tag']   = "label-nuevo";
                        $data['texto_tag']   = "NUEVO";
                        $data['clase_borde_cuadro'] = "card-nuevo";
                    } elseif ($f_ingreso == $hoy_sistema) {
                        $data['mostrar_tag'] = true;
                        $data['clase_tag']   = "label-actualizado";
                        $data['texto_tag']   = "ACTUALIZADO";
                        $data['clase_borde_cuadro'] = "card-actualizado";
                    }

                    // ==========================================
                    // NUEVO: Obtener color temático
                    // ==========================================
                    $tipo_completo = isset($cuarto->tipo) ? $cuarto->tipo : '';
                    $tipo_cuarto = '';
                    if (!empty($tipo_completo)) {
                        if (preg_match('/^(H\/P|M\/P|U\/P)/i', $tipo_completo, $matches)) {
                            $tipo_cuarto = strtoupper($matches[1]);
                        } else {
                            $primer_caracter = strtoupper(trim(substr($tipo_completo, 0, 1)));
                            if (in_array($primer_caracter, array('H', 'M', 'U', 'P'))) {
                                $tipo_cuarto = $primer_caracter;
                            }
                        }
                    }
                    $data['theme_color'] = $this->getRoomColor($tipo_cuarto);

                    // Variables adicionales
                    $data['cuarto'] = $cuarto;
                    $data['etiqueta'] = $cuarto->txt_etiqueta;
                    $data['is_favorito'] = true;
                    $data['codigo_limpio'] = str_replace("S-", "", $cuarto->txt_serie);

                    $this->load->view('templates/tarjeta_cuarto_item', $data);
                }
            } else {
                echo '<div class="col-12 text-center py-5"><h4>No se encontraron favoritos.</h4></div>';
            }
        }
    }

    /**
     * Devuelve el color hexadecimal según el tipo de inquilino
     */
    private function getRoomColor($tipo)
    {
        $colors = array(
            'M'   => '#FF69B4',
            'H'   => '#4169E1',
            'U'   => '#FFD700',
            'P'   => '#32CD32',
            'H/P' => '#D2B48C',
            'M/P' => '#FF8C00',
            'U/P' => '#9370DB'
        );

        $tipo_limpio = strtoupper(trim($tipo));
        return isset($colors[$tipo_limpio]) ? $colors[$tipo_limpio] : '#6c757d';
    }
}