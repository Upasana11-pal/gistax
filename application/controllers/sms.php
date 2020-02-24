<?php


class Sms extends CI_Controller {
    	
	function __construct()
	{
		parent::__construct();
		$this->is_login();
		$this->load->model('cmodel');
		$this->load->model('adminmodel');
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

function countChar4(){
	$var= $this->input->post("totalc");
	$varchar=strlen($var);
	echo $varchar;
	}

function notice(){
	/*$count=0;
	$sender = $this->db->get("sms_setting")->row();
	$sende_Detail =$sender;
	$msg =	$this->input->post("msg");
	$mobile =	$this->input->post("mobile");
	sms($mobile,$msg,$sende_Detail->uname,$sende_Detail->password,$sende_Detail->sender_id);
	redirect("sms");*/
}
function all_sms(){
	/*	$smscount=0;
	$count=0;
	$sender = $this->db->get("sms_setting");
	if($sender->num_rows()>0){
	$sende_Detail =$sender->row();
	echo $msg =	$this->input->post("msg");
		$data=$this->db->get("branch");
		//print_r($data->result());exit();
		foreach($data->result() as $dt){
			 sms($dt->mobile,$msg,$sende_Detail->uname,$sende_Detail->password,$sende_Detail->sender_id);
		}
			 redirect("sms");
	}
	*/
     }
	function send_sms()
	{
	   $uri= $this->uri->segment(3);
	   if($uri==1)
	   {
	      $msg= $this->input->post("msg");
	      $number= $this->input->post("mobile");
	     $success= sms($number,$msg);
	     if($success){ ?>
	     <script>
	         alert("Sms Send Successfully.");
	     </script>
	  <?php   redirect("adminController/sms/".$uri,"refresh");
	     }
	     else
	     {?>
	     <script>
	         alert("Sorry ! Sms Not  Send.");
	     </script>
	  <?php   redirect("adminController/sms/".$uri,"refresh");
	     }
	         
	   }
	   elseif($uri==2)
	   { 
	          $msg= $this->input->post("msg");
	          $this->db->where("status",1);
	          $custdata=$this->db->get("customer_info");
	         if($custdata->num_rows()>0){
	             $i=0;
	             foreach($custdata->result() as $row):
	                 if(mb_strlen($row->mobilenumber)>0){
	                $dt= sms($row->mobilenumber,$msg);
	                if($dt){ ?>
        	                 <script>
        	                 alert("Sms Send Successfully.");
        	                 </script>
	                  <?php  redirect("adminController/sms/".$uri,"refresh");
	                }
	                else{  ?>
                    	     <script>
                    	         alert("Sorry ! Sms Not  Send.");
                    	     </script>
	                  <?php   redirect("adminController/sms/".$uri,"refresh");
	                    
	                }
	           }
	           $i++;
	        endforeach;
	    }
	       
	   } 
	   else{
	       
	      $option= $this->input->post("selectTree");
	      if($option==1){
	          $tblnm="silver_tree";
	      }
	      elseif($option==2){
	            $tblnm="gold_tree";
	      }
	       elseif($option==3){
	            $tblnm="diamond_tree";
	      }else{
	           $tblnm="crown_tree";
	      }
	      $treedt=$this->adminmodel->treedata($tblnm);
	      if($treedt->num_rows()>0){
	          $i=0;
	          foreach($treedt->result() as $row):
	              $this->db->where("id",$row->id);
	              $customerdata=$this->db->get("customer_info");
	              if($customerdata->num_rows()>0){
	                  $cdt=$customerdata->row();
	                  if(mb_strlen($cdt->mobilenumber)>0){
	                   
	                     $sucess= sms($cdt->mobilenumber,$msg);
	                     if($sucess){?>
	                         <script>
	                             alert("Sms Send Successfully"); </script>
	                             <?php redirect("adminController/sms/".$uri,"refresh");
	                     }
	                  }
	              }
	              $i++;
	          endforeach;
	      }
	      else{ ?>
	            <script>alert("Sorry ! There is no customer in <?php echo $tblnm;?>"); </script>
	             <?php redirect("adminController/sms/".$uri,"refresh");
	         
	      }
	      
	       
	   }
	        
	   
	    
	}




 }
 ?>