<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rooms extends MY_Controller
{


  public function __construct()
  {
    parent::__construct();
    $this->load->model("admin/common_model");
    $this->load->model("rooms_model");
  }

  public function search_rooms()
  {
    $keyword = $this->input->post("keyword");
    $data["room_array"] = $this->rooms_model->search_rooms($keyword);

    $data["title_header_page"] = "Search Result";
    $data['description_header_page'] = 'description Home';
    $data['keywords_header_page'] = 'keywords Home';

    $data["dato"] = $keyword;

    $this->load->view("templates/header", $data);
    $this->load->view("templates/rooms_listing");
    $this->load->view("templates/footer");
  }
}
