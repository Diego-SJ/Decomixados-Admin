<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users_model extends CI_Model {

    function getInfoUsers(){
        $result = $this->db->get("user");
        return $result->result();
    }

    function deleteUser($iduser){
        $this->db->where("iduser",$iduser);
        return $this->db->delete("user");
    }

    function updateUser($data,$iduser){
        $this->db->where("iduser",$iduser);
        return $this->db->update("user",$data);
    }

    function getInfoUser($iduser){
        $this->db->where("iduser",$iduser);
        $result = $this->db->get("user");
        return $result->row();
    }

    function getAddressByUser($iduser){
        $this->db->where("iduser",$iduser);
        $result = $this->db->get("address");
        return $result->result();
    }

    function getWishlistByUser($iduser){
        $this->db->where("iduser",$iduser);
        $result = $this->db->get("vw_wishlist");
        return $result->result();
    }
}