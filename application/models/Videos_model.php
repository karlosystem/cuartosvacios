<?php
class Videos_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

public function verificar_codigo($codigo) {
    $this->db->where('serie_random', $codigo);
    $this->db->where('status', 1);
    $query = $this->db->get('video');
    return ($query->num_rows() > 0);
}


  // Total de registros
  public function total_videos_activos()
	{
		$sql = "SELECT COUNT(*) AS total
            FROM video v 
            LEFT JOIN listado c 
                ON v.`code_room` = c.`txt_codigo`
            WHERE v.`code_room` IS NOT NULL 
              AND v.`code_room` <> '' 
              AND v.`status` = 1
              AND v.`fk_estado` NOT IN (3, 4)";
              
		return $this->db->query($sql)->row()->total;
	}

  /*   public function listado_videos_activos()
  {
    $sql = "SELECT  v.id, v.video_title, v.`yt_id`, v.`yt_thumb`, v.`txt_video`,
    v.`status`, v.`code_room`, s.`txt_descripcion` AS tamano, v.`serie_random`, tp.`txt_abreviado` AS habitacion, 
    e.`txt_descripcion` AS estado,
    v.`v_destacado`, v.`modificacion`,
    FORMAT(c.txt_precio_solo, 2)        AS solo_semanal,
    FORMAT(c.txt_precio_pareja, 2)      AS pareja_semanal,
    FORMAT(c.txt_precio_mensual, 2)     AS solo_mensual,
    FORMAT(c.txt_precio_mensual01, 2)   AS pareja_mensual
      FROM video v 
      LEFT JOIN listado 		c  ON v.`code_room` = c.`txt_codigo`
      LEFT JOIN size    		s  ON c.`fk_size` = s.`pk_size`
      LEFT JOIN tipo_habitacion	tp ON c.`fk_tipo` = tp.`pk_tipo_habitacion`
      LEFT JOIN estado		e  ON c.`fk_estado` = e.`pk_estado`
      WHERE v.`code_room`  IS NOT NULL AND c.`fk_estado` <> 4 AND v.`code_room` <> '' AND v.`status` = 1
      ORDER BY v.modificacion DESC";
    $result = $this->db->query($sql);
    return $result->result_array();
  } */

  // Obtiene los videos con paginación
  public function listado_videos_activos($limit, $offset)
  {
    $sql = "SELECT v.id, v.video_title, v.`yt_id`, v.`yt_thumb`, v.`txt_video`,
                v.`status`, v.`code_room`, s.`txt_descripcion` AS tamano, 
                v.`serie_random`, tp.`txt_abreviado` AS habitacion, 
                e.`txt_descripcion` AS estado,
                v.`v_destacado`, v.`modificacion`, v.`txt_etiqueta`,
                CASE 
                    WHEN v.txt_precio_solo_semanal IS NOT NULL 
                      AND v.txt_precio_solo_semanal <> '' 
                      THEN FORMAT(v.txt_precio_solo_semanal, 2)
                    ELSE FORMAT(v.txt_precio_solo_mensual, 2)
                  END AS precio_solo,
                CASE 
                  WHEN v.txt_precio_pareja_semanal IS NOT NULL 
                    AND v.txt_precio_pareja_semanal <> '' 
                    THEN FORMAT(v.txt_precio_pareja_semanal, 2)
                  ELSE FORMAT(v.txt_precio_pareja_mensual, 2)
                END AS precio_pareja
                FROM video v 
                LEFT JOIN size s ON v.`fk_size` = s.`pk_size`
                LEFT JOIN tipo_habitacion tp ON v.`fk_tipo` = tp.`pk_tipo_habitacion`
                LEFT JOIN estado e ON v.`fk_estado` = e.`pk_estado`
                WHERE v.`code_room` IS NOT NULL
                  AND v.`code_room` <> '' 
                  AND v.`status` = 1
				  AND v.`fk_estado` NOT IN (3, 4)
                ORDER BY v.modificacion DESC
                LIMIT $offset, $limit";

    return $this->db->query($sql)->result_array();
  }

  public function search_video($keyword)
  {
    $sql = "Select * from video";
    $cond = "";

    $cond .= ($cond == "") ? " WHERE " : " AND ";
    $cond .= "serie_random  LIKE '%" . $this->db->escape_str($keyword) . "%'";

    $sql .= $cond;

    $result = $this->db->query($sql);
    return $result->result_array();
  }


  public function get_whats_new()
  {
    $sql = "select * from exp_tbl_sub_products ORDER BY sp_date DESC";
    $query = $this->db->query($sql);
    return $query->row_array();
  }
  public function get_special()
  {
    $sql = "select * from exp_tbl_sub_products  where special_status=1 ORDER BY rand() LIMIT 5";
    $query = $this->db->query($sql);
    return $query->row_array();
  }
}
