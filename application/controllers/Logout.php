<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct(){
        parent:: __construct();
    }

	public function index(){  
		//SESSIONS DESTROY
		$session_data = array(
			'USERA_ID',
			'USERA_NAME',
			'USERA_NAME_C',
			'USERA_USER',
			'USERA_PASS',
			'USERA_PHONE',
			'USERA_STATUS',
			'USERA_AT',
		);
		$this->session->unset_userdata($session_data); 
		if($this->session->userdata('USERA_ID') == NULL){
			redirect(base_url()); 
		}
	}
}
