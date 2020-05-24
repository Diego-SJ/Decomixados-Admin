<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_model extends CI_Model {

    function saveProduct($data){
        $this->db->insert("product",$data);
        $id = $this->db->insert_id();
        return $id;
    }

    function getAllProducts(){
        $query = $this->db->get("vw_products");
        return $query->result();
    }

    function saveOffer($data){
        $this->db->insert("offers",$data);
        $id = $this->db->insert_id();
        return $id;
    }

    function getAllOffers(){
        $query = $this->db->get("vw_offers");
        return $query->result();
    }

    function deleteProduct($idproduct){
        $this->db->where("idproduct",$idproduct);
        return $this->db->delete("product");
    }

    function deleteOffer($id_offer){
        $this->db->where("id_offer",$id_offer);
        return $this->db->delete("offers");
    }

    function updateProduct($data,$idproduct){
        $this->db->where("idproduct",$idproduct);
        return $this->db->update("product",$data);
    }

    function updateOffer($data,$id_offer){
        $this->db->where("id_offer",$id_offer);
        return $this->db->update("offers",$data);
    }

    function getInfoProduct($idproduct){
        $this->db->where("idproduct",$idproduct);
        $result = $this->db->get("product");
        return $result->row();
    }

    function getOffer($id_offer){
        $this->db->where("id_offer",$id_offer);
        $result = $this->db->get("offers");
        return $result->row();
    }

}