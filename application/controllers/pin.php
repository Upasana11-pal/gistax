<?php
class pin extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->is_login();
		$this->load->model("cmodel");
		$this->load->model("mpinmodel");
		$this->load->model("pay_details");
		$this->load->model("tree");
	}
	function is_login(){
		$is_login = $this->session->userdata('is_login');
		$is_lock = $this->session->userdata('is_lock');
		$logtype = $this->session->userdata('login_type');
		
		if((!$is_login)&& (!$logtype==1)){
			//echo $is_login;
			redirect("welcome/index");
		}
		elseif(!$is_lock){
			redirect("welcome/lockPage");
		}
	}

	function pinDetails(){
	
		$pinid = $this->uri->segment("3");
		$pin = $this->mpinmodel->gettotalPin($pinid);
		$data['pind']=$pin;
		$data['cid']=$this->uri->segment("4");
		$data['pageTitle'] = 'PIN Panel';
		$data['smallTitle'] = 'PIN Management ';
		$data['mainPage'] = 'PIN Panel';
		$data['subPage'] = 'PIN Panel';
		$data['title'] = 'UMA PIN Panel';
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
			
		$data['mainContent'] = 'pin/mpinDetails';
		$this->load->view("includes/mainContent", $data);
	}
	
	function generatePin(){
		if($this->uri->segment("3")){
			$id = $this->uri->segment("3");
			$checkv = $this->mpinmodel->getPinDetails($id);
			$data['checkv']=$checkv;
			$data['id']=$id;
		}else{
			if($this->input->post("id")){
				$id = $this->input->post("id");
				$checkv = $this->mpinmodel->getPinDetails($id);
				$data['checkv']=$checkv;
				$data['id']=$id;
			}else{
				$id=0;
				$checkv = $this->mpinmodel->getPinDetails($id);
				$data['checkv']=$checkv;
				$data['id']=0;
			}
		}
		 
		$data['pageTitle'] = 'PIN Panel';
		$data['smallTitle'] = 'PIN Management ';
		$data['mainPage'] = 'PIN Panel';
		$data['subPage'] = 'PIN Panel';
		$data['title'] = 'UMA PIN Panel';
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		 
		$data['mainContent'] = 'pin/mpin';
		$this->load->view("includes/mainContent", $data);
	
	}
	function pinDelete(){
		$id = $this->uri->segment("3");
		$cid=$this->uri->segment("4");
		
		$this->db->where("status",0);
		$this->db->where("id",$id);
		$this->db->delete("mpin");
		redirect(base_url()."index.php/pin/generatePin/".$cid);
		
	}
	function genSavePin(){
		if(strlen($this->input->post("uid"))>0){
			$uid = $this->input->post("uid");
			$this->db->where("username",$uid);
			$vci = $this->db->get("customer_info");
			if($vci->num_rows()>0){
				$cid = $vci->row()->id;
			}
		}else{
			$cid = $this->input->post("cid");
		}
		$nopin = $this->input->post("nopin");
	
		$pinamount = $this->input->post("pingenVale");
		$tblnm="mpin_master";
		$id = $this->mpinmodel->pin_max($tblnm)+1;
		$val = $this->mpinmodel->genSavePin($cid,$nopin,$id,$pinamount);
		if($val){
			redirect("pin/generatePin/$cid/success");
		}
	}
	
	
	function pay(){
	 $pay= $this->input->post('pay');
	 $totv= $this->input->post('totv');
	  $paid_from= "admin";
	   $paid_to= $this->input->post('cid');
	  if(($totv > $pay)&&($pay > 0)){
	  
		$pvalue = $this->cmodel->insertpay($pay,$paid_from,$paid_to);
     if($pvalue){ 
         
         echo $pvalue." Paid Success fully";
     }
	  }else{
	      echo "INVALID AMOUNT";
	  }
		
	}
	function mpinused(){
		
		$pinid = $this->uri->segment("3");
		$pin = $this->mpinmodel->gettotalPin($pinid);
		$data['pind']=$pin;
		$data['cid']=$this->uri->segment("4");
		$data['pageTitle'] = 'PIN Panel';
		$data['smallTitle'] = 'PIN Management ';
		$data['mainPage'] = 'PIN Panel';
		$data['subPage'] = 'PIN Panel';
		$data['title'] = 'UMA PIN Panel';
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		 
		$data['mainContent'] = 'pin/mpinused';
		$this->load->view("includes/mainContent", $data);
	}
		function new_req_pin(){
    		$this->load->library("form_validation");
        	$data['pageTitle'] = 'PIN Panel';
        	$data['smallTitle'] = 'PIN Management ';
        	$data['mainPage'] = 'PIN Panel';
        	$data['subPage'] = 'PIN Panel';
        	$data['title'] = 'UMA PIN Panel';
            $data['headerCss'] = 'headerCss/customerlistcss';
            $data['footerJs'] = 'footerJs/customerJs';
            $data['mainContent'] = 'pin/new_req_pin';
            $this->load->view("includes/mainContent", $data);
	}
	function mpin_detail(){
    	$data['pageTitle'] = 'PIN Panel';
    	$data['smallTitle'] = 'PIN Management ';
    	$data['mainPage'] = 'PIN Panel';
    	$data['subPage'] = 'PIN Panel';
    	$data['title'] = 'UMA PIN Panel';
    	$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = 'pin/final_mpin_detail';
     $this->load->view("includes/mainContent", $data);
	}
	
	
	function totalmpindetail(){
    	$data['pageTitle'] = 'PIN Panel';
    	$data['smallTitle'] = 'PIN Management ';
    	$data['mainPage'] = 'PIN Panel';
    	$data['subPage'] = 'PIN Panel';
    	$data['title'] = 'UMA PIN Panel';
    	$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = 'pin/totalmpindetail';
     $this->load->view("includes/mainContent", $data);
	}
		function generatePin1(){
	$parentID= $this->input->post('parent_id');
		$getvalue = $this->cmodel->checkStatus_pin("customer_info",$parentID)->row()->id;
		//print_r($getvalue);
	redirect("pin/generatePin/$getvalue");
		
	}
	
	
	function activateCustomer(){
		$idforact=$this->input->post("idforact");
		$mpin = $this->input->post("mpin");
		$custid=$idforact;
		$tblnm="customer_info";
		
		$dt = $this->cmodel->activestatus($custid,$mpin,$tblnm);
		if($dt){
		    
			echo "Activated" ;
		}
	}
}