<?php
class Login extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->is_login();
	}
	function is_login(){
		$is_login = $this->session->userdata('is_login');
		$is_lock = $this->session->userdata('is_lock');
		$logtype = $this->session->userdata('login_type');
		if($logtype != 1){
			//echo $is_login;
			redirect("welcome/index");
		}
		elseif(!$is_login){
			//echo $is_login;
			redirect("welcome/index");
		}
		elseif(!$is_lock){
			redirect("welcome/lockPage");
		}
	}
	public function index(){
		$data['pageTitle'] = 'Admin Dashboard';
		$data['smallTitle'] = 'Overview of all Section';
		$data['mainPage'] = 'Dashboard';
		$data['subPage'] = 'dashboard';

		$data['title'] = 'UMA Dashboard';

		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/dashboardJs';
		$data['mainContent'] = 'dashboard';
		$this->load->view("includes/mainContent", $data);
	}
        public function view_complain(){
            	$data['pageTitle'] = 'View Complain';
		$data['smallTitle'] = 'View Complain';
		$data['mainPage'] = 'View Complain';
		$data['subPage'] = 'View Complain';

		$data['title'] = 'View Complain';
		$data['rty']=$this->loginmodel->alldata();

		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/dashboardJs';
		$data['mainContent'] = 'view_complain';
           $this->load->view("includes/mainContent", $data);
           
        }
        
        function changecomStatus(){
            $status = $this->input->post("status");
            $cid = $this->input->post("cid");
            
             $this->loginmodel->updatecid($cid,$status);
            echo "Solved";
        }
        
        public function payment(){
        	$data['pageTitle'] = 'payment';
        	$data['smallTitle'] = 'payment';
        	$data['mainPage'] = 'payment';
        	$data['subPage'] = 'payment';
        
        	$data['title'] = 'payment';
        	$data['rty']=$this->loginmodel->alldata();
        
        	$data['headerCss'] = 'headerCss/dashboardCss';
        	$data['footerJs'] = 'footerJs/dashboardJs';
        	$data['mainContent'] = 'payment';
        	$this->load->view("includes/mainContent", $data);
        	 
        }
        public function report(){
        	$data['pageTitle'] = 'report';
        	$data['smallTitle'] = 'report';
        	$data['mainPage'] = 'report';
        	$data['subPage'] = 'report';
        
        	$data['title'] = 'report';
        	$data['rty']=$this->loginmodel->alldata();
        
        	$data['headerCss'] = 'headerCss/dashboardCss';
        	$data['footerJs'] = 'footerJs/dashboardJs';
        	$data['mainContent'] = 'report';
        	$this->load->view("includes/mainContent", $data);
        
        }
        public function generatebill(){
        	$data['pageTitle'] = 'generatebill';
        	$data['smallTitle'] = 'generatebill';
        	$data['mainPage'] = 'generatebill';
        	$data['subPage'] = 'generatebill';
        
        	$data['title'] = 'generatebill';
        	$data['rty']=$this->loginmodel->alldata();
        
        	$data['headerCss'] = 'headerCss/dashboardCss';
        	$data['footerJs'] = 'footerJs/dashboardJs';
        	$data['mainContent'] = 'generatebill';
        	$this->load->view("includes/mainContent", $data);
        
        }
        public function addemployee(){
        	$data['pageTitle'] = 'addemployee';
        	$data['smallTitle'] = 'addemployee';
        	$data['mainPage'] = 'addemployee';
        	$data['subPage'] = 'addemployee';
        
        	$data['title'] = 'addemployee';
        	$data['rty']=$this->loginmodel->alldata();
        
        	$data['headerCss'] = 'headerCss/dashboardCss';
        	$data['footerJs'] = 'footerJs/dashboardJs';
        	$data['mainContent'] = 'addemployee';
        	$this->load->view("includes/mainContent", $data);
        
        }
}