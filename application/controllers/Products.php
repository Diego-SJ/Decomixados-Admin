<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct(){
        parent:: __construct();
		$this->load->model("Product_model");
		$this->load->model("Categories_model");
		if($this->session->userdata('USERA_ID') == '' || $this->session->userdata('USERA_AT') != '0') {  
            redirect(base_url());  
        } 
    }

	public function index()
	{

		$data = array (
			'products' => $this->Product_model->getAllProducts(),
			'categories' => $this->Categories_model->getInfoCategories(),
		);
		

		$this->load->view('layout/header');
		$this->load->view('admin/products',$data);
		$this->load->view('layout/footer');
	}

	public function saveProduct() {
		$this->load->library('form_validation');
		
		$name = $this->input->post('fspName');
		$price_v = $this->input->post('fspPriceV');
		$stock = $this->input->post('fspStock');
		$description = $this->input->post('fspDescription');
		$category = $this->input->post('fspCategory');
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
				'image2' => '',
				'image3' => '',
				'image4' => '',
				'price_c' => '',
				'price_v' => $price_v,
				'stock' => $stock,
				'provider' => '',
				'idcategories' => $category,
			);

			if ($idproduct = $this->Product_model->saveProduct($pruduct_db)) {
				$this->session->set_flashdata('success', 'Producto registrado exitosamente');  
				redirect(base_url().'products/edit?idproduct='.$idproduct);  
			} else {
				$this->session->set_flashdata('error', 'El producto no se pudo registrar');  
				redirect(base_url().'products');  
			}
        }
	}

	public function updateProduct($idproduct) {

		$name = trim($this->input->post('fspName'));
		$price_v = trim($this->input->post('fspPriceV'));
		$stock = trim($this->input->post('fspStock'));
		$description = trim($this->input->post('fspDescription'));
		$category = trim($this->input->post('fspCategory'));


		if($_FILES['fileUpload']['name'] != NULL){
			$config['upload_path'] = './uploads/archivos/products/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = '20048';

			$this->load->library('upload',$config);
			if (!$this->upload->do_upload("fileUpload")) {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect(base_url().'products/edit/'.$idproduct); 
			} else {
				$file_info = $this->upload->data();
				$image =base_url().'uploads/archivos/products/'.$file_info['file_name'];
				
				$pruduct_db = array(
					'name' => $name,
					'description' => $description,
					'image' => $image,
					'price_v' => $price_v,
					'stock' => $stock,
					'idcategories' => $category,
				);

				if ($this->Product_model->updateProduct($pruduct_db,$idproduct)) {
					$this->session->set_flashdata('success', 'Producto actualizado con exito');  
					redirect(base_url().'products/edit?idproduct='.$idproduct); 
				} else {
					$this->session->set_flashdata('error', 'El producto no se actualizó.');  
					redirect(base_url().'products/edit?idproduct='.$idproduct);  
				}
			}
		} else {
			$pruduct_db = array(
				'name' => $name,
				'description' => $description,
				'price_v' => $price_v,
				'stock' => $stock,
				'idcategories' => $category,
			);

			if ($this->Product_model->updateProduct($pruduct_db,$idproduct)) {
				$this->session->set_flashdata('success', 'Producto actualizado con exito');  
				redirect(base_url().'products/edit?idproduct='.$idproduct); 
			} else {
				$this->session->set_flashdata('error', 'El producto no se actualizó.');  
				redirect(base_url().'products/edit?idproduct='.$idproduct);  
			}
		}
	}
	

	public function edit(){
		$idproduct = $this->input->get('idproduct');
		$data = array(
			'product' => $this->Product_model->getInfoProduct($idproduct),
			'categories' => $this->Categories_model->getInfoCategories(),
		);
		$this->load->view('layout/header');
		$this->load->view('admin/products_edit',$data);
		$this->load->view('layout/footer');
	}
	
	public function delete(){
		$idproduct = $this->input->get('idproduct');
		if($this->Product_model->deleteProduct($idproduct)){
			$this->session->set_flashdata('success', '¡Producto eliminado!');
			redirect(base_url()."products");
		} else {
			$this->session->set_flashdata('error', 'No se pudo eliminar.');
			redirect(base_url()."products");
		}
	}
}
