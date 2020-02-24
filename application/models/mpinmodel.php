<?php
class mpinmodel extends CI_Model{
	
	
	function gettotalPin($pinid){
		$this->db->where("id",$pinid);
		$tot = $this->db->get("mpin");
		return $tot;
	}
	
	
	
	
	
	//
	function getPinDetails($id){
		if($id){
		$this->db->where("customer_id",$id);
		$result = $this->db->get("mpin_master");
		return $result;
		}else{
			$result = $this->db->get("mpin_master");
			return $result;
		}
	}
	
	function pin_max($tblnm){
		$this->db->select_max('id');
		$this->db->from($tblnm);
		$maxid=$this->db->get();
		if($maxid->num_rows()>0){
			return $maxid->row()->id;
		}else{
			return 1;
		}
	}
	function max_invoice($tblnm){
		$this->db->select_max('invoice_no');
		$this->db->from($tblnm);
		$maxid=$this->db->get();
		if($maxid->num_rows()>0){
			return $maxid->row()->invoice_no;
		}else{
			return 1;
		}
	}
	
	function genSavePin($cid,$nopin,$id,$pinamount){
		$this->db->where("id",$id);
		$oldcheck = $this->db->get("mpin_master");
		$tblnm="invoice_serial";
		$maxid=$this->max_invoice($tblnm)+1;
		
		$invoice_number=$maxid;
		$invoice=array(
			"invoice_no"=>$invoice_number,
			"reason"=>"Generate Mpin",
			"invoice_date"=>date('Y-m-d H:i:s'),
				"c_id"=>$cid
		);
		$this->db->insert("invoice_serial",$invoice);

		
		if(!($oldcheck->num_rows()>0)){
		$data = array(
				"id" 			=>$id,
				"nop" 			=>$nopin,
				"customer_id"	=>$cid,
				"date"			=>date('Y-m-d H:i:s')
		);
		$dt=$this->db->insert("mpin_master",$data);
		if($dt){
		

		for($i=0;$i<$nopin;$i++){
			$pin= random_string('numeric',6);
			 
			// exit();
			$checkpv = $this->checkDubPin($pin);
			$datapin=array(
					"id"=>$id,
					"mpin"=>$checkpv,
					"status"=>0
			);
			$this->db->insert("mpin",$datapin);
		}
		 $out_daybook =array(
			"paid_to" =>-1,
			"paid_from" => $cid,
			"transaction_type" => 14,
			"amount" => $pinamount,
			"invoice_no"=>$invoice_number,
			"debit_credit" =>0,
			"date1" => date('Y-m-d H:i:s')

		); 
	
		$this->db->insert("inner_daybook",$out_daybook); 
		
		return true;
		
		} } else{
			echo "Try AFter Some time Network Problem";
		}
	}
	function checkDubPin($pin){
		$this->db->where("mpin",$pin);
		$checkmpins = $this->db->get("mpin");
		if($checkmpins->num_rows()>0){
			$pin= random_string('numeric',6);
			$checkpv = $this->checkDubPin($pin);
		}
		else{
		return $pin;
		}
		}

	
}