<?php 
    class pay_details extends CI_Model{
        
        function checkStatus($cid){
           $this->db->where("c_id",$cid);
			$maxid=$this->db->get("pay_details");
			if($maxid->num_rows()>0){
				return $maxid;
			}else{
				return false; 
			}
        }
        
        function totwallet($cid){
         /*     $this->db->select_sum("amount");
             $this->db->where("paid_to",$cid);
             $this->db->where("debit_credit",0);
            $totdabit = $this->db->get("inner_daybook")->row(); */
            $this->db->select_sum("amount");
            $this->db->where("paid_to",$cid);
            $this->db->where("debit_credit",1);
            $totcredit = $this->db->get("inner_daybook")->row();
											 
											 return $totcredit->amount;
        }
        
    }
?>