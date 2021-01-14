<?php
Class AdminController extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->is_login();
		$this->load->model('cmodel');
	
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
	
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//		*******************************UPASANA CODE***************************************** 
   
    public function admin_profile(){
		$this->load->library("form_validation");
		$this->load->model("adminmodel");
		$data['crecord'] = $this->adminmodel->getrecord();
		$data['pageTitle'] = 'Admin Profile';
		$data['smallTitle'] = 'Profile form';
		$data['mainPage'] = 'Admin Profile';
		$data['subPage'] = 'Admin Profile';
		$data['title'] = 'Admin Profile Form';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'admin_profile';
		$this->load->view("includes/mainContent", $data);
	}
	


	public function admin_edit_profile(){  
	$data=array(
				'customer_name'=>$this->input->post("cname"),
				'business_name'=>$this->input->post("bisinessname"),
				'city'=>$this->input->post("city"),
				'state'=>$this->input->post("state"),
				'address_1'=> $this->input->post("cadd"),
				'address_2'=> $this->input->post("peradd"),
				'pin'=>$this->input->post("pin"),
				'email1'=>$this->input->post("email"),
				'email2'=>$this->input->post("email2"),
				'mobile_number'=>$this->input->post("mno"),
				'phone_number'=>$this->input->post("pmno"),
				'aadhar'=>$this->input->post("adhar"),
				'pan_no'=>$this->input->post("panno"),
				'language'=>$this->input->post("language"),
				'nationality'=>$this->input->post("nat")

        );
		 $this->load->library('upload');
	
		
	  if (!empty($_FILES['logo']['name'])) {
	      	$photo_name = time().trim($_FILES['logo']['name']);
			$photo_name=str_replace(' ', '_', $photo_name);
			$image_path = realpath(APPPATH . '../assets/img/');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '50000';
			$config['file_name'] = $photo_name;
			$this->upload->initialize($config);
			if($this->upload->do_upload('logo')){
				$data['logo']=$photo_name;
			
			}
					else{
					echo $this->upload->display_errors();
					    }
	  }
	  if (!empty($_FILES['profile_logo']['name'])) {
	      	$photo_name1 = time().trim($_FILES['profile_logo']['name']);
			$photo_name1=str_replace(' ', '_', $photo_name1);
			$image_path = realpath(APPPATH . '../assets/img/');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '50000';
			$config['file_name'] = $photo_name1;
			$this->upload->initialize($config);
			if($this->upload->do_upload('profile_logo')){
				$data['ico_logo']=$photo_name1;
			}
					else{
					echo  $this->upload->display_errors();
					    }
	  }         
	
	    $this->db->where("id",1);
       if($this->db->update("general_settings",$data)){
	    redirect('adminController/admin_profile/success'); 
       }else{
           echo "1";
       }
			
}
function updateRankvalue(){
	$rank_id = $this->input->post('rank_id');
   	$year1 = $this->input->post('year1');
  	$year2 = $this->input->post('year2');
  	$year3 = $this->input->post('year3');
  	$year4 = $this->input->post('year4');
  	$year5 = $this->input->post('year5');
  	$year6 = $this->input->post('year6');
  	$datas['year_1']=$year1;
  	$datas['year_2']=$year2;
  	$datas['year_3']=$year3;
  	$datas['year_4']=$year4;
  	$datas['year_5']=$year5;
  	$datas['year_6']=$year6;
  $this->db->where("id",$rank_id);
  if($this->db->update("commission_chart",$datas)){
      echo "1";
  }else{
      echo "5";
  }
}
function updatePromvalue(){
	$rank_id = $this->input->post('rank_id');
   	$ad = $this->input->post('ad');
  	$pr = $this->input->post('pr');
  	$fo = $this->input->post('fo');
  	$so = $this->input->post('so');
  	$co = $this->input->post('co');
  	$st = $this->input->post('st');
    $sil = $this->input->post('sil');
   	$gold = $this->input->post('gold');
  	$ruby = $this->input->post('ruby');
  	$em = $this->input->post('em');
  	$diamond = $this->input->post('diamond');
  	
  	$datas['advisor']=$ad;
  	$datas['promoter']=$pr;
  	$datas['f_o']=$fo;
  	$datas['s_o']=$so;
  	$datas['c_o']=$co;
  	$datas['star']=$st;
  	$datas['silver']=$sil;
  	$datas['gold']=$gold;
  	$datas['ruby']=$ruby;
  	$datas['emrald']=$em;
  	$datas['diamond']=$diamond;
  $this->db->where("id",$rank_id);
  if($this->db->update("promotion_chart",$datas)){
      echo "1";
  }else{
      echo "5";
  }
}
//		*******************************END UPASANA CODE*************************************	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////

	
    	public function sms()
	{    
	    $data['uri']= $this->uri->segment(3);
	    $data['pageTitle'] = 'Admin Profile';
		$data['smallTitle'] = 'Profile form';
	    $data['mainPage'] = 'Admin Profile';
		$data['subPage'] = 'Admin Profile';
		$data['title'] = 'Admin Profile Form';
	    $data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
	    $data['mainContent'] = 'writesms';
	    $this->load->view("includes/mainContent", $data);
	}
 function employeeSalary(){
		$data['pageTitle'] = 'Employee Section';
		$data['smallTitle'] = 'Employee Salary details';
		$data['mainPage'] = 'Employee';
		$data['subPage'] = 'Salary';

		$this->load->model("adminmodel");
		$data['empList'] = $this->adminmodel->employeeList()->result();

		$data['title'] = 'Employee/Section';
		 $data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'employeeSalary';
		$this->load->view("includes/mainContent", $data);
	}  
      function configsalary(){
		$eid = $this->input->post("eid");
		$ename = $this->input->post("ename");
		$this->load->model("adminmodel");
	
		$qres = $this->adminmodel->getSalaryDetail($eid);
	    	
			$data['eid'] = $eid;
			$data['ename'] = $ename;
			$data['qres'] = $qres;
			$this->load->view("isSalConfigFalse",$data);	
	}
	function salary(){
		$eid = $this->input->post("eid");
		$ename = $this->input->post("ename");
		$this->load->model("adminmodel");
		$qres = $this->adminmodel->getSalaryDetail($eid);
		if($qres->num_rows()>0)
		{
			$data['eid'] = $eid;
			$data['ename'] = $ename;
			$data['qres'] = $qres;
			$this->load->view("isSalConfigTrue",$data);
			}
		else
		{	
			$data['eid'] = $eid;
			$data['ename'] = $ename;
			$data['qres'] = $qres;
			$data['pageTitle'] = 'Admin Profile';
    		$data['smallTitle'] = 'Profile form';
    	    $data['mainPage'] = 'Admin Profile';
    		$data['subPage'] = 'Admin Profile';
    		$data['title'] = 'Admin Profile Form';
    	    $data['headerCss'] = 'headerCss/dashboardCss';
    		$data['footerJs'] = 'footerJs/customerJs';
		    $data['mainContent'] = 'isSalConfigFalse';
			$this->load->view("includes/mainContent",$data);
		}	
	}
	
		function configureSalary(){
		$data = array(
			"emp_id" => $this->input->post("empid"),
			"basicSalary" => $this->input->post("basicSalary"),
			"ProvidentFund" => $this->input->post("ProvidentFund"),
			"employeeStateInsurance" => $this->input->post("employeeStateInsurance"),
			"medicalAllowance" => $this->input->post("medicalAllowance"),
			"transportAllowance" => $this->input->post("transportAllowance"),
			"dearnessAllowance" => $this->input->post("dearnessAllowance"),
			"houseRentAllowance" => $this->input->post("houseRentAllowance"),
			"skillAllowance" => $this->input->post("skillAllowance"),
			"spcialAllowance" => $this->input->post("spcialAllowance"),
			"encentieve" => $this->input->post("encentieve"),
			"bonus" => $this->input->post("bonus"),
			"gross_s" => $this->input->post("gross_s"),
			"created" =>date("Y-m-d"),
		
		);
		$this->db->insert("emp_salary_struct",$data);
		redirect("adminController/employeeSalary");
	}
	
	
	
}
?>