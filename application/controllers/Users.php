<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct(){
        parent:: __construct();
		$this->load->model("Product_model");
		$this->load->model("Categories_model");
		$this->load->model("Users_model");
		$this->load->model("Sales_model");
		if($this->session->userdata('USERA_ID') == '' || $this->session->userdata('USERA_AT') != '0') {  
            redirect(base_url());  
        } 
    }

	public function index()
	{
		$data = array (
			'users' => $this->Users_model->getInfoUsers(),
		);

		$this->load->view('layout/header');
		$this->load->view('admin/users',$data);
		$this->load->view('layout/footer');
	}

	public function detail($iduser){

		$data = array (
			'user' => $this->Users_model->getInfoUser($iduser),
			'sales' => $this->Sales_model->getSaleByUser($iduser),
			'wishlist' => $this->Users_model->getWishlistByUser($iduser),
			'addresses' => $this->Users_model->getAddressByUser($iduser),
		);

		$this->load->view('layout/header');
		$this->load->view('admin/users_detail',$data);
		$this->load->view('layout/footer');
	}

	public function downUser($iduser){
		$data = array (
			'status' => 0,
		);

		if($this->Users_model->updateUser($data,$iduser)){
			$this->detail($iduser);
		}
	}
	public function upUser($iduser){
		$data = array (
			'status' => 1,
		);

		if($this->Users_model->updateUser($data,$iduser)){
			$this->detail($iduser);
		}
	}
}
