<?php
class Rooms_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function search_rooms($keyword)
	{
		$sql = "Select * from vw_habitaciones_disponibles";
		$cond = "";
		$cond .= ($cond == "") ? " WHERE " : " AND ";
		$cond .= "txt_zip  LIKE '%" . $this->db->escape_str($keyword) . "%'";
		$sql .= $cond;
		$result = $this->db->query($sql);
		return $result->result_array();
	}
}
