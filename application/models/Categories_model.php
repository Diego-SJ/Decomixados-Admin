<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categories_model extends CI_Model {

    function getInfoCategories(){
        $result = $this->db->get("categories");
        return $result->result();
    }

    function saveCategory($data){
        $this->db->insert("categories",$data);
        return $this->db->affected_rows();
    }

    function deleteCategory($idcategories){
        $this->db->where("idcategories",$idcategories);
        return $this->db->delete("categories");
    }

    function updateCategory($data,$idcategories){
        $this->db->where("idcategories",$idcategories);
        return $this->db->update("categories",$data);
    }

    function getInfoCategory($idcategories){
        $this->db->where("idcategories",$idcategories);
        $result = $this->db->get("categories");
        return $result->row();
    }
}