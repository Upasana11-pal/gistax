<?php
Class DaybookController extends CI_Controller{

  function __construct()
	{
		parent::__construct();
		$this->is_login();
		$this->load->model('daybook');
	
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
  function daybook(){
    $uri=$this->uri->segment(3);
   
    if($uri==1){
      $data['outdb']=$this->daybook->outer_daybook();
    }
    else{
      $data['inndb']=$this->daybook->inner_daybook();
    }
    $data['uri']=$uri;
    $data['pageTitle'] = 'Daybook';
    $data['smallTitle'] = 'Daybook ';
    $data['mainPage'] = 'Accounting';
    $data['subPage'] = 'Accounting';
    $data['title'] = 'Daybook';
    $data['headerCss'] = 'headerCss/customerlistcss';
    $data['footerJs'] = 'footerJs/customerlistjs';
    $data['mainContent'] = 'daybook';
    $this->load->view("includes/mainContent", $data);
  }
  

function getroiandpool(){
 
    $data['pageTitle'] = 'Daybook';
    $data['smallTitle'] = 'Daybook ';
    $data['mainPage'] = 'Accounting';
    $data['subPage'] = 'Accounting';
    $data['title'] = 'Daybook';
    $data['headerCss'] = 'headerCss/customerlistcss';
    $data['footerJs'] = 'footerJs/customerlistjs';
    $data['mainContent'] = 'daybookpool';
    $this->load->view("includes/mainContent", $data);
}


}
?>