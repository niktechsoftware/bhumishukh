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
		$data['headerCss'] = 'headerCss/nullCss';
		$data['footerJs'] = 'footerJs/dashboardJs';
		$data['mainContent'] = 'cDashboard';
		$this->load->view("includes/mainContent", $data);
	}


}