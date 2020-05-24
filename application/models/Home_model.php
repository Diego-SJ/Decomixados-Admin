<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home_model extends CI_Model {

    function getTotalProducts(){
        $this->db->select('COUNT(*) as total');
        $result = $this->db->get("product");
        return $result->row();
    }
    function getTotalSales(){
        $this->db->where('status','finalizado');
        $this->db->select('COUNT(*) as total');
        $result = $this->db->get("sales");
        return $result->row();
    }
    function getTotalCategories(){
        $this->db->select('COUNT(*) as total');
        $result = $this->db->get("categories");
        return $result->row();
    }
    function getTotalUsers(){
        $this->db->select('COUNT(*) as total');
        $result = $this->db->get("user");
        return $result->row();
    }
}