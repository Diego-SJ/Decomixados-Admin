<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sales_model extends CI_Model {

    function getAllSales(){
        $result = $this->db->get("sales");
        return $result->result();
    }

    function getInfoSale($idsales){
        $this->db->where("idsales",$idsales);
        $result = $this->db->get("sales");
        return $result->row();
    }

    function getInfoSaleArray($idsales){
        $this->db->where("idsales",$idsales);
        $result = $this->db->get("sales");
        return $result->row_array();
    }

    function deleteSale($idsales){
        $this->db->where("idsales",$idsales);
        return $this->db->delete("sales");
    }

    function updateSale($data,$idsales){
        $this->db->where("idsales",$idsales);
        return $this->db->update("sales",$data);
    }

    function getSaleByUser($iduser){
        $this->db->where("iduser",$iduser);
        $result = $this->db->get("sales");
        return $result->result();
    }

    function getProductsBySale($idsales){
        $this->db->where("idsales",$idsales);
        $result = $this->db->get("vw_detail_sale");
        return $result->result();
    }
}