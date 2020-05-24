<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
        parent:: __construct();
		$this->load->model("Home_model");
		if($this->session->userdata('USERA_ID') == '' || $this->session->userdata('USERA_AT') == '') {  
            redirect(base_url());  
        } 
    }

	public function index()
	{
		$data = array (
			'products' => $this->Home_model->getTotalProducts(),
			'sales' => $this->Home_model->getTotalSales(),
			'categories' => $this->Home_model->getTotalCategories(),
			'users' => $this->Home_model->getTotalUsers(),
		);

		$this->load->view('layout/header');
		$this->load->view('admin/home',$data);
		$this->load->view('layout/footer');
    }
}
