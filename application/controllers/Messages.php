<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

	public function __construct(){
        parent:: __construct();
		$this->load->model("Profile_model");
		if($this->session->userdata('USERA_ID') == '' || $this->session->userdata('USERA_AT') != '0') {  
            redirect(base_url());  
        } 
    }

	public function index()
	{
		$iduser = $this->session->userdata('USERA_ID');

		$myaccount = array(
			'messages'   => $this->Profile_model->getMessages(),
		);

		$this->load->view('layout/header');
		$this->load->view('admin/messages',$myaccount);
		$this->load->view('layout/footer');
	}
	
	public function delete(){
		$idmessage = $this->input->get('idmessage');

		if($this->Profile_model->deleteMessage($idmessage)){
			$this->session->set_flashdata('success', 'Mensaje eliminado');
			redirect(base_url().'messages');
		} else {
			$this->session->set_flashdata('error', 'El mensaje no se pudo eliminar');
			redirect(base_url().'messages');
		}
	}
}
