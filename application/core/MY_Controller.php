<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        // Cargar el modelo necesario
        $this->load->model("admin/common_model");

        // Obtener los condados globalmente
        $tbl2 = "tbl_condados_ny";
        $col2 = "int_estado";
        $value2 = "1";
        
        // Obtenemos los datos
        $data['condados'] = $this->common_model->get_all_list($tbl2, $col2, $value2);
        
        // USAMOS LOAD->VARS: Esto hace que $condados esté disponible 
        // en CUALQUIER vista que cargues después, sin tener que pasarlo manualmente.
        $this->load->vars($data);
    }
}