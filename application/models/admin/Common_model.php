<?php
class Common_model extends CI_Model
{
	public function insert_data($data, $tbl_name)
	{
		$sql = $this->db->insert($tbl_name, $data);
		return ($this->db->error() === 0);
	}

	public function get_condado_by_slug($slug)
	{
		$this->db->where('slug', $slug);
		$query = $this->db->get('tbl_condados_ny');
		return $query->row_array(); // Devuelve una sola fila
	}


public function get_habitaciones_por_condado($slug)
{
    // Agregamos el subquery para contar videos usando el alias 'v'
    $this->db->select('v.*, (SELECT COUNT(*) FROM video WHERE video.code_room = v.txt_codigo) as total_videos');
    $this->db->from('vw_habitaciones_disponibles AS v');
    $this->db->join('tbl_zipcodes_ny AS z', 'v.txt_zip = z.zipcode', 'inner');
    $this->db->join('tbl_zonas_ny AS zn', 'z.id_zona = zn.id', 'inner');
    $this->db->join('tbl_condados_ny AS c', 'zn.id_condado = c.id', 'inner');
    $this->db->where('c.slug', $slug);

    $query = $this->db->get();
    return $query->result();
}

public function get_current_page_records($limit, $start)
{
    $this->db->select('vw.*, (SELECT COUNT(*) FROM video WHERE video.code_room = vw.txt_codigo) as total_videos');
    
    // --- AGREGA ESTAS DOS LÍNEAS AQUÍ ---
    // Primero ordena por fecha de creación, luego por fecha de edición
    $this->db->order_by('fecha_registro', 'DESC');
    $this->db->order_by('fecha_ingreso', 'DESC');
    // ------------------------------------

    $this->db->limit($limit, $start);
    $query = $this->db->get("vw_habitaciones_disponibles vw");

    if ($query->num_rows() > 0) {
        return $query->result();
    }

    return false;
}

	public function get_favoritos_by_ids($ids)
	{
		// 1. Verificación de seguridad: si no hay IDs, no hacemos la consulta
		if (empty($ids)) {
			return false;
		}

		// 2. Seleccionamos todos los campos de la vista y el conteo de videos
		$this->db->select('vw.*, (SELECT COUNT(*) FROM video WHERE video.code_room = vw.txt_codigo) as total_videos');
		$this->db->from('vw_habitaciones_disponibles vw');

		// 3. Filtramos extrayendo los 5 números de la derecha de 'txt_serie'
		// El tercer parámetro 'FALSE' es VITAL para que CI no intente escapar la función RIGHT()
		$this->db->where_in('RIGHT(vw.txt_serie, 5)', $ids, FALSE);

		$query = $this->db->get();

		// 4. Retornamos los resultados si existen
		if ($query->num_rows() > 0) {
			return $query->result();
		}

		return false;
	}

	public function get_cuartos_premium()
	{
		$today = date('Y-m-d');

		$this->db->select('
        vd.id as destacado_id, 
        vd.etiqueta as etiqueta_premium, 
		vd.telefono,
        v.id as video_actual_id,
        v.yt_id,
        v.txt_precio_solo_semanal, 
        v.txt_precio_pareja_semanal, 
        v.txt_precio_solo_mensual, 
        v.txt_precio_pareja_mensual,
        v.code_room,
        th.txt_descripcion as tipo_inquilino_completo, 
        th.txt_abreviado as inquilino_abreviado,
        vw.pk_listing,
        vw.txt_sector,
        vw.txt_ciudad,
		vw.int_mapa,
		vw.txt_latitud,
		vw.txt_longitud
    ');
		$this->db->from('videos_destacados vd');
		$this->db->join('video v', 'vd.video_id = v.id', 'inner');
		$this->db->join('tipo_habitacion th', 'v.fk_tipo = th.pk_tipo_habitacion', 'left');
		$this->db->join('vw_habitaciones_disponibles vw', 'v.code_room = vw.txt_codigo', 'left');
		$this->db->where('vd.estado', 1);
		$this->db->where('vd.fecha_inicio <=', $today);
		$this->db->where('vd.fecha_termino >=', $today);
		// NUEVOS FILTROS DE VALIDACI�N (TABLA VIDEO)
		//$this->db->where('v.status', 1);      // El video debe estar Activo
		$this->db->where('v.fk_estado', 1);  // El cuarto debe estar AVAILABLE (ID 1)
		$this->db->order_by('vd.id', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function insert_upload_contact($data, $tbl_name)
	{
		$sql = $this->db->insert($tbl_name, $data);
		return ($this->db->insert_id());
	}

	public function get_total()
	{
		return $this->db->count_all("vw_habitaciones_disponibles");
	}

	public function get_order_by_user_id($u_id)
	{
		$sql = "select t_o.*,t_u.* from exp_tbl_orders as t_o
							LEFT JOIN exp_tbl_users as t_u ON t_o.cust_id=t_u.u_id
					where t_o.cust_id='$u_id' ORDER BY t_o.order_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_all_list($tbl_name, $limit = 0, $limit_start = 0, $orderby = 0, $col = 0)
	{
		$sql = "SELECT * from $tbl_name";

		if ($limit > 0) {
			$sql .= " LIMIT $limit_start, $limit";
		}

		if ($orderby != "") {
			$sql .= " ORDER BY  $col $orderby";
		}

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function change_status($table, $column, $value, $uniqueNameCol, $uniqueColValue)
	{
		$query = $this->db->query("UPDATE " . $table . " SET `" . $column . "` = '" . $value . "' WHERE `" . $uniqueNameCol . "` = '" . $uniqueColValue . "' ");
		return true;
	}

	public function delete_item($table, $column, $value)
	{
		$query = $this->db->query("DELETE FROM " . $table . " WHERE $column IN (" . $value . ") ");
		return true;
	}

	public function get_item_by_id($tbl_name, $col, $value)
	{
		$this->db->where($col, $value);
		$query = $this->db->get($tbl_name);
		//echo $query;
		//exit();
		if ($query->num_rows > 1) {
			return $query->result_array();
		} else {
			return $query->row_array();
		}
	}

	public function get_result_array_by_id($tbl_name, $col, $value)
	{
		$this->db->where($col, $value);
		$query = $this->db->get($tbl_name);
		return $query->result_array();
	}


	public function update_item_by_id($tbl_name, $data_arr, $cnd_arr)
	{
		$this->db->update($tbl_name, $data_arr, $cnd_arr);
		return ($this->db->error());
	}

	function calculate_price($p_id, $sp_id, $comb)
	{
		$sql = "SELECT * FROM exp_tbl_pricing WHERE  p_id=$p_id AND sp_id=$sp_id AND combination='$comb'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function get_available_sizes($p_id = 0, $sp_id = 0, $comb = "", $column = "")
	{
		$sql = "SELECT * FROM exp_tbl_pricing  LEFT JOIN tbl_size  ON exp_tbl_pricing.size=tbl_size.size_id  
			 WHERE  p_id=$p_id AND sp_id=$sp_id AND combination='$comb' 
			 GROUP BY size ORDER BY size";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function get_available_qtys($p_id = 0, $sp_id = 0, $comb = "", $column = "")
	{
		$sql = "SELECT * FROM exp_tbl_pricing  LEFT JOIN  exp_tbl_qty  ON  exp_tbl_pricing.quantity = exp_tbl_qty.qty_id 
			 WHERE  p_id=$p_id AND sp_id=$sp_id AND combination='$comb' 
			 GROUP BY quantity ORDER BY quantity";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function get_attr_pricing($qty = 0, $p_id = 0, $sp_id = 0, $comb = "")
	{
		$sql = "SELECT * FROM exp_tbl_pricing WHERE  p_id=$p_id AND sp_id=$sp_id AND combination='$comb' AND quantity=$qty ORDER BY pricing_id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function get_subproduct_attributes($p_id, $sp_id)
	{
		$sql = "SELECT * FROM  exp_tbl_assigned_attributes  LEFT JOIN  exp_tbl_attributes 
			ON  exp_tbl_assigned_attributes.att_id=exp_tbl_attributes.att_id WHERE p_id=$p_id AND sp_id=$sp_id 
			GROUP BY  exp_tbl_assigned_attributes.att_id ";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	public function get_subproduct_attribute_values($p_id, $sp_id, $att_id)
	{
		$sql = "SELECT * FROM  exp_tbl_assigned_attributes  LEFT JOIN  exp_tbl_attribute_values 
			ON  exp_tbl_assigned_attributes.val_id=exp_tbl_attribute_values.value_id WHERE p_id=$p_id AND sp_id=$sp_id  AND  exp_tbl_assigned_attributes.att_id=$att_id 	
			ORDER BY  exp_tbl_attribute_values.value_id";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	public function get_all_quantities_of_product($p_id, $sp_id, $combination, $size)
	{
		$sql = "SELECT * FROM  exp_tbl_pricing  LEFT JOIN  exp_tbl_qty 
			ON  exp_tbl_pricing.quantity=exp_tbl_qty.qty_id 
			WHERE p_id=$p_id AND sp_id=$sp_id  AND  combination='$combination'  AND size=$size ";
		$result = $this->db->query($sql);
		return $result->result_array();
	}


	public function get_item_price($p_id, $sp_id, $combination, $size, $q)
	{
		$sql = "SELECT * FROM  exp_tbl_pricing 
			WHERE p_id= '$p_id' AND sp_id='$sp_id'  AND  combination='$combination'  AND size='$size' AND quantity='$q' ";
		$result = $this->db->query($sql);
		return $result->row_array();
	}



	public function get_all_state($tbl_name, $cntry_id)
	{
		$sql = "SELECT * from $tbl_name where country_id='$cntry_id'";

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function paypal_credentials()
	{
		$sql = "Select * from exp_tbl_paypal_setting";
		$query = $this->db->query($sql);
		return $query->row_array();
	}



	public function get_upload_artwork($row_id)
	{
		$sql = "Select * from exp_tbl_artwork WHERE r_id = '$row_id'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function delete_artwork($row_id)
	{
		$sql = "DELETE FROM exp_tbl_artwork  WHERE up_id = '$row_id'";
		$query = $this->db->query($sql);
	}

	public function get_admin_detail()
	{
		$sql = "select * from exp_tbl_admins where admin_id='1'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function update_admin_detail($user_name, $email)
	{
		$sql = "update exp_tbl_admins set username='$user_name' ,email='$email' where admin_id='1'";
		$query = $this->db->query($sql);
		return ($this->db->_error_number() === 0);
	}
}
