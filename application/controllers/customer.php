<?php
class customer extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->is_login();
		$this->load->model("cmodel");
	}
	function is_login(){
		$is_login = $this->session->userdata('is_login');
		$is_lock = $this->session->userdata('is_lock');
		$logtype = $this->session->userdata('login_type');
		if(!$is_login){
			//echo $is_login;
			redirect("welcome/index");
		}
		elseif(!$is_lock){
			redirect("welcome/lockPage");
		}
	}
	function customer_list(){
		$uriv = $this->uri->segment(3);
		if($uriv==1){
			$status=1;
			$page = "Active";
	
		}else{
			if($uriv==2){
				$status=0;
				$page = "Inctive";
			}else{
				if($uriv==3){
					$status=2;
					$page = "Paid Inactive";
				}
			}
		}
		$matchcon="status";
		$tblname="customer_info";
	
		$dt = $this->cmodel->getcustomerdata($matchcon,$status,$tblname);
		$data['row']=$dt;
		$data['uriv'] = $uriv;
		$data['pageTitle'] = $page.' Customer list';
		$data['smallTitle'] = $page.' Customer list';
		$data['mainPage'] = $page.' Customer list';
		$data['subPage'] = $page.' Customer list';
		$data['title'] = $page.' Customer list';
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = 'active_list';
		$this->load->view("includes/mainContent", $data);
	
	}
	
   function	 edit_profile(){
	  $cid= $this->input->post("id");
	  	$photo_name = time().trim($_FILES['photo']['name']);
	  	
	  $data["customer_name"]= $this->input->post("cname");
	  $data["fname"]= $this->input->post("fname");
	  $data["city"]= $this->input->post("city");
	  $data["state"]= $this->input->post("state");
	  $data["current_address"]= $this->input->post("cadd");
	  $data["permanent_address"]= $this->input->post("peradd");
	  $data["pin"]= $this->input->post("pin");
	  $data["email"]= $this->input->post("email");
	  $data["mobilenumber"]= $this->input->post("mno");
	  $data["altnumber"]= $this->input->post("pmno");
	  $data["adhaarnumber"]= $this->input->post("adhar");
	  $data["pannumber"]= $this->input->post("panno");
	  $data["gender"]= $this->input->post("gen");
	  $data["dob"]= $this->input->post("dob");
	  $data["password"]= $this->input->post("password");
	  
	 // $data["photo"]= $this->input->post("photo");
	  
	  	$this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/img/users/');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '500';
			$config['file_name'] = $photo_name;
				if (!empty($_FILES['photo']['name'])) {
			$this->upload->initialize($config);
			 $f1= $this->upload->do_upload('photo');
	     	$data["image"]=$photo_name;
			
				}else{
				    $this->db->where("id",$cid);
				   $cust_dt= $this->db->get("customer_info");
				   if($cust_dt->num_rows()>0){
				      $data["image"]= $cust_dt->row()->image;
				   }
				}
			     	$this->db->where("id",$cid);
			$dt=	$this->db->update("customer_info",$data);
			if($dt){
			  redirect("clogin/customer_profile");
			}
				
	  

	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	}
}