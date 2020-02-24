<?php 
    class Adminmodel extends CI_Model{
function getrecord(){
        	$record = $this->db->get("general_settings");
        	return $record;
	     	}
	     	
	 	function updateAdminPassword($data){
		//$this->db->where("school_code",$this->session->userdata("school_code"));
		if($this->db->update("general_settings",$data)){
			return true;
		}
		else{
			return false;
		}
	}
	
	function treedata($tblnm){
	    return $this->db->get($tblnm);
	    
	}
   
   function alldata(){
		$reg=$this->db->get("customer_complain");
		return $reg;
	}

    }
    
    ?>