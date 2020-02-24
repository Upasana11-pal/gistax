<?php
class Clogin extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->is_login();
		$this->load->model('cmodel');
		$this->load->model('tree');
		$this->load->model('pay_details');
		//$this->output->delete_cache();
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
	public function index(){
		$data['pageTitle'] = 'Customer Dashboard';
		$data['smallTitle'] = 'Overview of all Section';
		$data['mainPage'] = 'Dashboard';
		$data['subPage'] = 'dashboard';
		$data['title'] = 'UMPL Customer Dashboard';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/dashboardJs';
		$data['mainContent'] = 'customer/cdashboard';
		$this->load->view("includes/mainContent", $data);
	}
	public function customer_reg(){
		$this->load->library("form_validation");
		$data['pageTitle'] = 'Customer Registration';
		$data['smallTitle'] = 'Registration form';
		$data['mainPage'] = 'Customer Registration';
		$data['subPage'] = 'Customer Registration';
		$data['title'] = 'Customer Registration Form';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'customer/registration';
		$this->load->view("includes/mainContent", $data);
	}
	public function rcvadmin(){
		$this->load->library("form_validation");
		$data['pageTitle'] = 'Recieved Amount ';
		$data['smallTitle'] = 'Recieved Amount';
		$data['mainPage'] = 'Recieved Amount';
		$data['subPage'] = 'Recieved Amount';
		$data['title'] = 'Recieved Amount';
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = 'customer/rcvadmin';
		$this->load->view("includes/mainContent", $data);
	}
		public function pooldetl(){
	   // $this->load->library("form_validation");
		$data['pageTitle'] = 'Auto Pool Detail';
		$data['smallTitle'] = 'Auto Pool Detail';
		$data['mainPage'] = 'Auto Pool Detail';
		$data['subPage'] = 'Auto Pool Detail';
		$data['title'] = 'Auto Pool Detail ';
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = 'customer/pooldetl';
		$this->load->view("includes/mainContent", $data);
	    
	}
		public function Customer_complain(){
	   // $this->load->library("form_validation");
	   	$id=$this->input->post("id");
		//echo "$id";
	   $name=$this->input->post("name");
		//echo "$name";
		$complain=$this->input->post("complain");
		//echo "$complain";
		$data=array(
		        "id" => $id,
				"name" => $name,
		 	    "complain" => $complain,
		 	    "status" => 0
				
          		);
          		$this->load->model("auth");
		$this->auth->insertdata($data);
		
		$data['pageTitle'] = 'Customer Complain Detail';
		$data['smallTitle'] = 'Customer Complain  Detail';
		$data['mainPage'] = 'Customer Complain  Detail';
		$data['subPage'] = 'Customer Complain  Detail';
		$data['title'] = 'Customer Complain  Detail ';
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = 'customer/Customer_complain';
		$this->load->view("includes/mainContent", $data);
		
	    
	}
	public function customer_profile(){
		$this->load->library("form_validation");
	//	$data['crecord'] = $this->cmodel->getCrecord($this->session->userdata("customer_id"));
		if($this->session->userdata("login_type") ==1){	
		    $id = $this->uri->segment(3);
		    $data['crecord'] = $this->cmodel->getCrecord($id);
		}else{	
		    $data['crecord'] = $this->cmodel->getCrecord($this->session->userdata("customer_id"));
		}
		$data['pageTitle'] = 'Customer Profile';
		$data['smallTitle'] = 'Profile form';
		$data['mainPage'] = 'Customer Profile';
		$data['subPage'] = 'Customer Profile';
		$data['title'] = 'Customer Profile Form';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'customer/profile';
		$this->load->view("includes/mainContent", $data);
	}
	function checkID(){
		$parentID= $this->input->post('parent_id');
		//print_r($parentID);

		$getvalue = $this->cmodel->checkStatus("customer_info",$parentID);
		echo (json_encode($getvalue));
	}
	function insertCustmer(){
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		//$this->form_validation->set_rules('parent_id','Sponsor ID','required|is_unique[customer_info.username]');
		$this->form_validation->set_rules('name','Customer Name','required');
		//$this->form_validation->set_rules('selectTree','Please Select Position','required');
		$this->form_validation->set_rules('fname','Father Name','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('city','City','required');
		$this->form_validation->set_rules('state','State','required');
		$this->form_validation->set_rules('pinno','PIN No.','required |exact_length[6]');
		$this->form_validation->set_rules('mobile','Mobile Number','required | numeric |exact_length[10]');
	
		$this->form_validation->set_rules('password','Password','matches[confirm_pwd]');
		$this->form_validation->set_rules('confirm_pwd','Password','matches[password]');

		$this->form_validation->set_rules('dob','Date Of Birth','required');
		$this->form_validation->set_rules('customRadioInline1','Gender','required');
		if($this->form_validation->run()){
			$tblnm ="customer_info";
			$maxid	=	$this->cmodel->cust_max($tblnm);
			
			$maxid	=	$maxid+1;
			
			$username="UMP".$maxid;
			$rn=rand(9999,99999);
			$usern1=$maxid+$rn;
			$username1="UMP".$usern1;
			$rjoinerID= $this->input->post('parent_id');
			$cid  = $this->cmodel->getrowid($rjoinerID);
			if($cid){
			//$ljoinerID= $this->input->post('lJoinerID');
			$name= $this->input->post('name');
			$fname= $this->input->post('fname');
			$address= $this->input->post('address');
			$pinno= $this->input->post('pinno');
			$mobile= $this->input->post('mobile');
			$gender= $this->input->post('customRadioInline1');
			$dob= $this->input->post('dob');
			$password= $this->input->post('password');
			$parent_id= $this->input->post('parent_id');
			$city= $this->input->post('city');
			$state= $this->input->post('state');
			$data= array(
					'parent_id'=>$rjoinerID,
					'fname'=>$fname,
					'joiner_id'=>$cid,
					'customer_name'=>$name,
					'username'=>$username1,
					'password'=>$password,
					'mobilenumber'=>$mobile,
					'current_address'=>$address,
					'city'=>$city,
					'pannumber'=>$this->input->post('panno'),
					'adhaarnumber'=>$this->input->post('aadhar'),
					'state'=>$state,
					'gender'=>$gender,
					'pin'=>$pinno,
					
					
					'status'=>0,
					'joining_date'=>date('Y-m-d'),
					'dob'=>$dob
			);
			if($this->cmodel->insertCustomer($data)){
				
					 $msg = "Dear " . $name . " Your Registration is successfully Done,Your Username is ".$username1." and password is ".$password.
							"Please Login to update http://www.umpl.in.net your details And Contact to Admin for Activate your account.";
                 	sms($mobile, $msg);
					redirect(base_url().'index.php/clogin/cconpage/'.$username1);
				
			}else{
				echo "error";
			}
			
			
			}	else{
		    echo "Invalid sponsor Name";
		}}
			else{
				
				$this->customer_reg();
			}	
		}
		
			function goldtree(){
		    
		     $id= $this->session->userdata("customer_id");
		    
		     $cdt= $this->cmodel->getCrecord($id);
		     $tblnm="gold_tree";
		    $goldt= $this->cmodel->gettree($id,$tblnm);
		     if($goldt->num_rows()>0){
			$data['crecord'] =$cdt;
			
			$data['pageTitle'] = 'My Tree';
			$data['smallTitle'] = 'My Tree';
			$data['mainPage'] = 'My Tree';
			$data['subPage'] = 'My Tree';
			$data['title'] = 'Customer Tree';
			$data['headerCss'] = 'headerCss/dashboardCss';
			$data['footerJs'] = 'footerJs/customerJs';
			$data['mainContent'] = 'customer/goldtree';
			$this->load->view("includes/mainContent", $data);
		     }
		     else{
		        echo  "Sorry ! Currently  You are not in Gold Position.";
		     }
		}
		
		function cconpage(){
			$this->db->where("username",$this->uri->segment(3));
			$getcu = $this->db->get("customer_info");
			$data['crecord'] = $getcu;
			$data['pageTitle'] = 'Customer Registration';
			$data['smallTitle'] = 'Registration form';
			$data['mainPage'] = 'Customer Registration';
			$data['subPage'] = 'Customer Registration';
			$data['title'] = 'Customer Registration Form';
			$data['headerCss'] = 'headerCss/dashboardCss';
			$data['footerJs'] = 'footerJs/customerJs';
			$data['mainContent'] = 'customer/cconpage';
			$this->load->view("includes/mainContent", $data);
		}
		
		function changeStatus(){
			if($this->uri->segment(4)==$this->session->userdata("customer_id")){
				$cid = $this->session->userdata("customer_id");
			}else{
				$cid=$this->session->userdata("customer_id");
			}
			$data['crecord'] = $this->cmodel->getCrecord($cid);
			$this->load->model("pay_details");
			$pd  = $this->pay_details->checkStatus($cid);
			$data['pd']=$pd;
			$data['pageTitle'] = 'Customer Registration';
			$data['smallTitle'] = 'Activation Panel';
			$data['mainPage'] = 'Customer Registration';
			$data['subPage'] = 'Customer Registration';
			$data['title'] = 'Customer Registration Form';
			$data['headerCss'] = 'headerCss/dashboardCss';
			$data['footerJs'] = 'footerJs/customerJs';
			$data['mainContent'] = 'customer/changeStatus';
			$this->load->view("includes/mainContent", $data);
		}

		
		function requestUpdate(){

			$cust_id = $this->session->userdata("customer_id");
			$txn =  $this->input->post("tno");
			$reffno =  $this->input->post("reffno");			
			$file_name   = time().trim($_FILES['photo']['name']); 
			$photo_name = str_replace(' ', '_', $file_name);
			// $val = array('cust_id' => );
			$this->load->model('cmodel');
			$chk = $this->cmodel->pay_detail_insert($cust_id,$txn,$reffno);
			if($chk)
			{				
				$this->load->library('upload');
				$image_path = realpath(APPPATH . '../assets/img/pay/');		  
				  $config['upload_path'] = $image_path;
				  $config['allowed_types'] = 'jpg|jpeg|png|bmp';
				  $config['max_size'] = '500';
				  $config['file_name'] = $photo_name;
				  if (!empty($_FILES['photo']['name']))
				   {
					  $dataphoto =array(
					  		'uploadfile' => $file_name
					  );
					  
					 $this->upload->initialize($config);
					 $a = $this->upload->do_upload('photo');
					$this->db->where("c_id",$cust_id);
					$this->db->update("pay_details",$dataphoto);
					 redirect("clogin/changeStatus/success/$cust_id");
					 
					}
					else 
					{
						redirect("clogin/changeStatus/success/$cust_id");
					}
			}
			else
			{
				echo "data not insert";
			}
		}
		function downline(){
			$tabv = $this->uri->segment("3");
				if($tabv==6)
				{
				    $table="Over All Downline";
				    	$data['crecord'] = $this->cmodel->getCrecord($this->session->userdata("customer_id"));
            		$data['cid'] = $this->session->userdata("customer_id");
            		$count =0;
            			$data['leftrootid']=0;
				$data['rightrootid']=0;
            	
					
				}
			if($tabv==1){
				$table="silver_tree";
				$lposition="leftjoiner";
				$rposition="rightjoiner";
				$data['crecord'] = $this->cmodel->getCrecord($this->session->userdata("customer_id"));
				$cid =$this->session->userdata("customer_id");
				$data['left']=$this->db->query("select * from silver_tree join customer_info where  silver_tree.leftjoiner='$cid' AND customer_info.id=silver_tree.left");
				$data['right']=$this->db->query("select * from silver_tree join customer_info where  silver_tree.rightjoiner='$cid' AND customer_info.id=silver_tree.right");
					
			}
			if($tabv==2){
				$table="gold_tree";
				$lposition="left";
				$rposition="right";
				$data['leftrootid']=0;
				$data['rightrootid']=0;
					$data['cid'] = $this->session->userdata("customer_id");
				$data['crecord'] = $this->cmodel->getCrecord($this->session->userdata("customer_id"));
				$this->db->where('c_id', $this->session->userdata("customer_id"));
    			$leftjoiner = $this->db->get($table);
    			if($leftjoiner->num_rows()>0){
    				if($leftjoiner->row()->left){
    					$leftid =$leftjoiner->row()->left;
    			$data['leftrootid']		=$leftid ;
				$data['left']=$this->tree->mydownline($leftid,$lposition,$table,$tabv);
    				}
    				if($leftjoiner->row()->right){
    					$rightid =$leftjoiner->row()->right;
    					$data['rightrootid']		=$rightid;
    					$data['right']=$this->tree->mydownline($rightid,$rposition,$table,$tabv);
    					
    				}
				
    			}
			}
			if($tabv==3){
				$table="diamond_tree";
			//$table="silver_tree";
				$lposition="left";
				$rposition="right";
				$data['leftrootid']=0;
				$data['rightrootid']=0;
				$data['crecord'] = $this->cmodel->getCrecord($this->session->userdata("customer_id"));
				$this->db->where('c_id', $this->session->userdata("customer_id"));
    			$leftjoiner = $this->db->get($table);
    			if($leftjoiner->num_rows()>0){
    				if($leftjoiner->row()->left){
    					$leftid =$leftjoiner->row()->left;
    			$data['leftrootid']		=$leftid ;
				$data['left']=$this->tree->mydownline($leftid,$lposition,$table,$tabv);
    				}
    				if($leftjoiner->row()->right){
    					$rightid =$leftjoiner->row()->right;
    					$data['rightrootid']		=$rightid;
    					$data['right']=$this->tree->mydownline($rightid,$rposition,$table,$tabv);
    					
    				}
				
    			}
			}
			if($tabv==4){
				$table="crown_tree";
			//$table="silver_tree";
				$lposition="left";
				$rposition="right";
				$data['leftrootid']=0;
				$data['rightrootid']=0;
				$data['crecord'] = $this->cmodel->getCrecord($this->session->userdata("customer_id"));
				$this->db->where('c_id', $this->session->userdata("customer_id"));
    			$leftjoiner = $this->db->get($table);
    			if($leftjoiner->num_rows()>0){
    				if($leftjoiner->row()->left){
    					$leftid =$leftjoiner->row()->left;
    			$data['leftrootid']		=$leftid ;
				$data['left']=$this->tree->mydownline($leftid,$lposition,$table,$tabv);
    				}
    				if($leftjoiner->row()->right){
    					$rightid =$leftjoiner->row()->right;
    					$data['rightrootid']		=$rightid;
    					$data['right']=$this->tree->mydownline($rightid,$rposition,$table,$tabv);
    					
    				}
				
    			}
			}
			
			$data['tabv']=$tabv;
			$data['pageTitle'] = 'My Downline';
			$data['smallTitle'] = $table.' Downline';
			$data['mainPage'] = 'Downline';
			$data['subPage'] = 'Downline';
			$data['title'] = 'Customer Downline';
			$data['headerCss'] = 'headerCss/dashboardCss';
			$data['footerJs'] = 'footerJs/customerJs';
			$data['mainContent'] = 'customer/downline';
			$this->load->view("includes/mainContent", $data);
		}
		function alltree(){
		    
		    	$table="silver_tree";
				$lposition="leftjoiner";
				$rposition="rightjoiner";
				$data['crecord'] = $this->cmodel->getCrecord($this->session->userdata("customer_id"));
				$cid =$this->session->userdata("customer_id");
				$data['left']=$this->db->query("select * from silver_tree join customer_info where customer_info.status=1 and silver_tree.leftjoiner='$cid' AND customer_info.id=silver_tree.left");
				$data['right']=$this->db->query("select * from silver_tree join customer_info where customer_info.status=1 and silver_tree.rightjoiner='$cid' AND customer_info.id=silver_tree.right");
		  if ($this->uri->segment(3)){
	        $id = $this->uri->segment(3);
	        $this->db->where("id", $id);
	    }

	    if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$id = $this->input->post("customer_id");
			$this->db->where("username", $id);
	    }



		$data1 = $this->db->get("customer_info")->row();
		if(!$data1){
			$this->session->set_flashdata('error', 'Wrong userID...');
			redirect('clogin/alltree');
		}
			$data['crecord'] = $this->cmodel->getCrecord($data1->id);
			$data['data'] = $data1;
			$data['pageTitle'] = 'My Downline';
			$data['smallTitle'] = ' Downline';
			$data['mainPage'] = 'Downline';
			$data['subPage'] = 'Downline';
			$data['title'] = 'Customer Downline';
			$data['headerCss'] = 'headerCss/dashboardCss';
			$data['footerJs'] = 'footerJs/customerJs';
			$data['mainContent'] = 'customer/alltree';
			$this->load->view("includes/mainContent", $data);
		}
		
		function getrecord(){
		       $cust_id=$this->input->post("custid");
		    	$table="silver_tree";
				$lposition="leftjoiner";
				$rposition="rightjoiner";
				$data['crecord'] = $this->cmodel->getCrecord($cust_id);
			
				$data1['left']=$this->db->query("select * from silver_tree join customer_info where customer_info.status=1 and silver_tree.leftjoiner='$cust_id' AND customer_info.id=silver_tree.left");
				$data2['right']=$this->db->query("select * from silver_tree join customer_info where customer_info.status=1 and silver_tree.rightjoiner='$cust_id' AND customer_info.id=silver_tree.right");
		print_r($data1);
		print_r($data2);
		
		}
		   
		function tree(){
		    
		     $id= $this->session->userdata("customer_id");
		     echo $id ;
		    $data['crecord'] = $this->cmodel->getCrecord($id);
		   //print_r( $data['crecord']);
			$data['pageTitle'] = 'My Tree';
			$data['smallTitle'] = 'My Tree';
			$data['mainPage'] = 'My Tree';
			$data['subPage'] = 'My Tree';
			$data['title'] = 'Customer Tree';
			$data['headerCss'] = 'headerCss/dashboardCss';
			$data['footerJs'] = 'footerJs/customerJs';
			$data['mainContent'] = 'customer/tree';
			$this->load->view("includes/mainContent", $data);
		}
		public function binarySubGroup() {
	    if ($this->uri->segment(3)){
	        $id = $this->uri->segment(3);
	        $this->db->where("id", $id);
	    }

	    if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$id = $this->input->post("customer_id");
			$this->db->where("username", $id);
	    }



		$data1 = $this->db->get("customer_info")->row();
		if(!$data1){
			$this->session->set_flashdata('error', 'Wrong userID...');
			redirect('dashboard/binaryGroup');
		}
			$data['crecord'] = $this->cmodel->getCrecord($data1->id);
			$data['data'] = $data1;
		
			   
			$data['pageTitle'] = 'My Tree';
			$data['smallTitle'] = 'My Tree';
			$data['mainPage'] = 'My Tree';
			$data['subPage'] = 'My Tree';
			$data['title'] = 'Customer Tree';
			$data['headerCss'] = 'headerCss/dashboardCss';
			$data['footerJs'] = 'footerJs/customerJs';
			$data['mainContent'] = 'customer/tree';
			$this->load->view("includes/mainContent", $data);
			 
			
	}
		
		function income(){
			$incometype = $this->uri->segment("3");
			$cid = $this->session->userdata("customer_id");
		
				$tranname = "Transaction";
				$gdetails = $this->cmodel->getTransaction($cid,$incometype);
		
			
			$data['gdetails']=$gdetails;
			$data['pageTitle'] = $tranname.' Income panel';
			$data['smallTitle'] = $tranname.' Income panel';
			$data['mainPage'] = $tranname.' Income panel';
			$data['subPage'] = $tranname.' Income panel';
			$data['title'] = $tranname.' Income panel';
			$data['headerCss'] = 'headerCss/customerlistcss';
			$data['footerJs'] = 'footerJs/customerlistjs';
			$data['mainContent'] = 'customer/transaction';
			$this->load->view("includes/mainContent", $data);
		}
		
		function walletIncome(){
			$cid = $this->session->userdata("customer_id");
			
				$data['auto'] = $this->cmodel->getAutoPool($cid);
			$data['sw'] = $this->cmodel->getSilver($cid);
			$data['gw'] = $this->cmodel->getGold($cid);
			$data['dw'] = $this->cmodel->getDiamond($cid);
			$data['cw'] = $this->cmodel->getCrown($cid);
			
			$data['pageTitle'] = 'Wallet Income panel';
			$data['smallTitle'] = 'Wallet Income panel';
			$data['mainPage'] = 'Wallet Income panel';
			$data['subPage'] = 'Wallet Income panel';
			$data['title'] = 'Wallet Income panel';
			$data['headerCss'] = 'headerCss/customerlistcss';
			$data['footerJs'] = 'footerJs/customerlistjs';
			$data['mainContent'] = 'customer/wallet';
			$this->load->view("includes/mainContent", $data);
		}
		
		function customer_Account(){
			$this->load->library("form_validation");
			$data['pageTitle'] = ' Account (KYC) panel';
			$data['smallTitle'] = ' Account (KYC) panel';
			$data['mainPage'] = ' Account (KYC) panel';
			$data['subPage'] = ' Account (KYC) panel';
			$data['title'] = ' Account (KYC) panel';
			$data['headerCss'] = 'headerCss/customerlistcss';
			$data['footerJs'] = 'footerJs/customerlistjs';
			$data['mainContent'] = 'customer/customer_Account';
			$this->load->view("includes/mainContent", $data);
		}
		
		function insertAccountD(){
			$cid = $this->input->post("cid");
			$bname=$this->input->post("bname");
			$ifsccode = $this->input->post("ifsccode");
			$branchname = $this->input->post("branchname");
			$accountno = $this->input->post("accountno");
			$aadhar = $this->input->post("aadhar");
			
			$panno=$this->input->post("panno");
			$dob=$this->input->post("dob");
			$nomname=$this->input->post("nomname");
			$nomrel=$this->input->post("nomrel");
			$updata = array(
					'bankname'=>$bname,
					'ifsccode'=>$ifsccode,
					'branchname'=>$branchname,
					'account_no'=>$accountno,
					'pannumber'=>$panno,
					'adhaarnumber'=>$aadhar,
					'nom_name'	=>$nomname,
					'nom_rel'	=>$nomrel,
					'dob'	=>$dob
			);
		
			$this->db->where("id",$cid);
			$this->db->update("customer_info",$updata);
			redirect("clogin/customer_Account/success");
		}

}