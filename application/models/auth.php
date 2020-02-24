<?php
class auth extends CI_Model{
    function insertdata($data){
        $this->db->insert("customer_complain",$data);
        return true;
    }
}