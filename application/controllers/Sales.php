<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

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
			'sales' => $this->Sales_model->getAllSales(),
		);

		$this->load->view('layout/header');
		$this->load->view('admin/sales',$data);
		$this->load->view('layout/footer');
    }
    
    public function detail()
	{
		$idsales = $this->input->get('idsales');
		$info_sale = $this->Sales_model->getInfoSaleArray($idsales);

		$iduser = $info_sale['iduser'];
		
		$data = array (
			'user' => $this->Users_model->getInfoUser($iduser),
			'sale' => $this->Sales_model->getInfoSale($idsales),
			'products' => $this->Sales_model->getProductsBySale($idsales),
		);
		$this->load->view('layout/header');
		$this->load->view('admin/sales_detail',$data);
		$this->load->view('layout/footer');
	}

	public function sendPurchase($idsales){
		$data = array (
			'status' => 'finalizado',
		);

		if($this->Sales_model->updateSale($data,$idsales)){
			$this->session->set_flashdata('success', '¡Pedido enviado!');
			redirect(base_url().'sales/detail?idsales='.$idsales);
		} else {
			$this->session->set_flashdata('error', '¡Algo salió mal, intenta más tarde!');
			redirect(base_url().'sales/detail?idsales='.$idsales);
		}
	}

	public function delete($idsales){
		if($this->Sales_model->deleteSale($idsales)){
			$this->session->set_flashdata('success', '¡Venta eliminada!');
			redirect(base_url()."sales");
		} else {
			$this->session->set_flashdata('error', 'No se pudo eliminar.');
			redirect(base_url()."sales");
		}
	}
}
