<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

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
			'categories' => $this->Categories_model->getInfoCategories(),
        );
        
		$this->load->view('layout/header');
		$this->load->view('admin/categories',$data);
		$this->load->view('layout/footer');
    }
    
    public function save(){
        $name = strtolower(trim($this->input->post('catName')));
        $file_info = '';
        $img1 = '';

        if($_FILES['img_home']['name'] != NULL){
			$config['upload_path'] = './uploads/archivos/products/';
			$config['overwrite'] = TRUE;
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = '20048';

            $this->load->library('upload',$config);

            if (!$this->upload->do_upload("img_home")) {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect(base_url().'products');  
			} else {
                $file_info = $this->upload->data();
                $img1 = base_url().'uploads/archivos/products/'.$file_info['file_name'];
                
                $data = array(
                    'name' => $name,
                    'description' => '',
                    'image' => $img1,
                    'imagev2' => '',
                );
                if($this->Categories_model->saveCategory($data)) {
                    $this->session->set_flashdata('success', 'Categoría registrada con exito');  
                    redirect(base_url().'categories');  
                } else {
                    $this->session->set_flashdata('error', 'La categoría no se pudo registrar');  
                    redirect(base_url().'categories');  
                }
            }
        }
        
    }

    public function update($idcategories){
        $name = strtolower(trim($this->input->post('catName')));
        $file_info = '';
        $img1 = '';

        if($_FILES['img_home']['name'] != NULL){
			$config['upload_path'] = './uploads/archivos/products/';
			$config['overwrite'] = TRUE;
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = '20048';

            $this->load->library('upload',$config);

            if (!$this->upload->do_upload("img_home")) {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect(base_url().'products');  
			} else {
                $file_info = $this->upload->data();
                $img1 = base_url().'uploads/archivos/products/'.$file_info['file_name'];
                
                $data = array(
                    'name' => $name,
                    'image' => $img1,
                );
                if($this->Categories_model->updateCategory($data,$idcategories)) {
                    $this->session->set_flashdata('success', 'Categoría actualizada con exito');  
                    redirect(base_url().'categories/edit?idcategories='.$idcategories);   
                } else {
                    $this->session->set_flashdata('error', 'La categoría no se pudo actualizar.');  
                    redirect(base_url().'categories/edit?idcategories='.$idcategories);  
                }
            }
        } else {
            $data = array(
                'name' => $name,
            );
            if($this->Categories_model->updateCategory($data,$idcategories)) {
                $this->session->set_flashdata('success', 'Categoría actualizada con exito');   
                redirect(base_url().'categories/edit?idcategories='.$idcategories);  
            } else {
                $this->session->set_flashdata('error', 'La categoría no se pudo actualizar.');  
                redirect(base_url().'categories/edit?idcategories='.$idcategories);  
            }
            
        }
        
    }

    public function edit(){
        $idcategories = $this->input->get('idcategories');
		$data = array(
			'category' => $this->Categories_model->getInfoCategory($idcategories),
		);
		$this->load->view('layout/header');
		$this->load->view('admin/categories_edit',$data);
		$this->load->view('layout/footer');
	}
	
	public function delete(){
        $idcategories = $this->input->get('idcategories');
		if($this->Categories_model->deleteCategory($idcategories)){
			$this->session->set_flashdata('success', 'Categoría eliminada con exito');
			redirect(base_url()."categories");
		} else {
			$this->session->set_flashdata('error', 'No se pudo eliminar la categoría');
			redirect(base_url()."categories");
		}
	}
}
