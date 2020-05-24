<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends CI_Controller {

	public function __construct(){
        parent:: __construct();
		$this->load->model("Product_model");
		if($this->session->userdata('USERA_ID') == '' || $this->session->userdata('USERA_AT') != '0') {  
            redirect(base_url());  
        } 
    }

	public function index()
	{

		$data = array (
			'products' => $this->Product_model->getAllProducts(),
			'offer' => $this->Product_model->getAllOffers(),
		);

		$this->load->view('layout/header');
		$this->load->view('admin/offers',$data);
		$this->load->view('layout/footer');
	}

	public function edit()
	{	
		$id_offer = $this->input->get('id_offer');

		$data = array (
			'products' => $this->Product_model->getAllProducts(),
			'offer' => $this->Product_model->getOffer($id_offer),
		);

		$this->load->view('layout/header');
		$this->load->view('admin/offers_edit',$data);
		$this->load->view('layout/footer');
	}

	public function save() {
		$this->load->library('form_validation');
		
		$name = $this->input->post('fspName');
		$idproduct = $this->input->post('fspProduct');
		$description = $this->input->post('fspDescription');
		$image = '';
  
		$config['upload_path'] = './uploads/archivos/products/';
        $config['overwrite'] = TRUE;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '20048';

        $this->load->library('upload',$config);

        if (!$this->upload->do_upload("fileUpload")) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url().'products');  
        } else {
            $file_info = $this->upload->data();
			$image =base_url().'uploads/archivos/products/'.$file_info['file_name'];

			$pruduct_db = array(
				'name' => $name,
				'description' => $description,
				'image' => $image,
				'idproduct' => $idproduct,
			);

			if ($id_offer = $this->Product_model->saveOffer($pruduct_db)) {
				$this->session->set_flashdata('success', 'Oferta registrada exitosamente');  
				redirect(base_url().'offers/edit?id_offer='.$id_offer);  
			} else {
				$this->session->set_flashdata('error', 'La oferta no se pudo agregar');  
				redirect(base_url().'offers');  
			}
        }
	}

	public function update($id_offer) {
		$this->load->library('form_validation');
		
		$name = $this->input->post('fspName');
		$idproduct = $this->input->post('fspProduct');
		$description = $this->input->post('fspDescription');
		$image = '';

		if($_FILES['fileUpload']['name'] != NULL){
			$config['upload_path'] = './uploads/archivos/products/';
			$config['overwrite'] = TRUE;
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = '20048';

			$this->load->library('upload',$config);

			if (!$this->upload->do_upload("fileUpload")) {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect(base_url().'offers');  
			} else {
				$file_info = $this->upload->data();
				$image =base_url().'uploads/archivos/products/'.$file_info['file_name'];

				$pruduct_db = array(
					'name' => $name,
					'description' => $description,
					'image' => $image,
					'idproduct' => $idproduct,
				);

				if ($this->Product_model->updateOffer($pruduct_db,$id_offer)) {
					$this->session->set_flashdata('success', 'Oferta actualizada exitosamente');  
					redirect(base_url().'offers/edit?id_offer='.$id_offer);  
				} else {
					$this->session->set_flashdata('error', 'La oferta no se pudo actualziar');  
					redirect(base_url().'offers/edit?id_offer='.$id_offer);  
				}
			}
		} else {
			$pruduct_db = array(
				'name' => $name,
				'description' => $description,
				'idproduct' => $idproduct,
			);

			if ($this->Product_model->updateOffer($pruduct_db,$id_offer)) {
				$this->session->set_flashdata('success', 'Oferta actualizada exitosamente');  
				redirect(base_url().'offers/edit?id_offer='.$id_offer);  
			} else {
				$this->session->set_flashdata('error', 'La oferta no se pudo actualziar');  
				redirect(base_url().'offers/edit?id_offer='.$id_offer);  
			}
		}
  
		
	}

	public function delete(){
		$id_offer = $this->input->get('id_offer');
		if($this->Product_model->deleteOffer($id_offer)){
			$this->session->set_flashdata('success', 'Oferta eliminada con exito');
			redirect(base_url()."offers");
		} else {
			$this->session->set_flashdata('error', 'La oferta no se pudo eliminar');
			redirect(base_url()."offers");
		}
	}
}
