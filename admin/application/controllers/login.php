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

		$data['title'] = 'Chaanan Dashboard';

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
	
}