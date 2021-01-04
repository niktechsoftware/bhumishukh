<?php class customer extends CI_Controller{
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
	function addCust(){
	    $data['pageTitle'] = 'Customer Registration';
		$data['smallTitle'] = 'Customer Registration';
		$data['mainPage'] = 'Customer Registration';
		$data['subPage'] = 'Customer Registration';
		$data['title'] = 'Customer Registration';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'addCustomer';
		$this->load->view("includes/mainContent", $data);
	    
	}
	function editCustomer(){
	    $data['pageTitle'] = 'Customer Registration';
		$data['smallTitle'] = 'Customer Registration';
		$data['mainPage'] = 'Customer Registration';
		$data['subPage'] = 'Customer Registration';
		$data['title'] = 'Customer Registration';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'editCustomer';
		$this->load->view("includes/mainContent", $data);
	    
	}
	function customerList(){
	    $data['pageTitle'] = 'Customer List';
		$data['smallTitle'] = 'Customer List';
		$data['mainPage'] = 'Customer List';
		$data['subPage'] = 'Customer List';
		$data['title'] = 'Customer List';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'customerList';
		$this->load->view("includes/mainContent", $data);
	    
	}
	function addCustomer(){
			$this->load->model("Cmodel");
			 $tblnm ="agent_info";
		   	$maxid	=	$this->Cmodel->cust_max($tblnm);
		    $tblnm ="customer_info";
		    $maxid	=	$maxid+1;
			$username="BSIPL".$maxid;
			$rn=rand(9999,99999);
			$usern1=$maxid+$rn;
			$username1="BSIC".$usern1;
			$rn1=rand(9999,999);
			$pass1=$rn1;
			$password1="BSC20".$pass1;
		 $name = $this->input->post('name');
		 $fname = $this->input->post('fname');
		 $mname = $this->input->post('mname');
		 $address = $this->input->post('address');
		 $state = $this->input->post('state');
		 $city = $this->input->post('city');
		 $area = $this->input->post('area');
		 $pincode = $this->input->post('pincode');
		 $dob = $this->input->post('dob');
		 $gender = $this->input->post('gender');
		 $email = $this->input->post('email');
		 $mob = $this->input->post('mob');
		 $username = $username1;
		 $password = $password1;
		 $data=array(
		 	"name" =>$name,
		 	"fname" => $fname,
		 	"mname" =>$mname, 
		 	"address" => $address,
		 	"state" => $state,
		 	"city" => $city,
		 	"area" => $area,
		 	"pin" => $pincode,
		 	"dob" => $dob,
		 	"gender" => $gender,
		 	"email" => $email,
		 	"mobile" => $mob,
		 	"username" => $username,
		 	"password" => $password,
		 	"date" => date("Y-m-d")
		 );
		 $this->load->model('Cmodel');
		 if($this->Cmodel->addCust($data)){
		 	redirect('customer/addCust/success');
		 }
		 else{
		    redirect('customer/addCust/false'); 
		 }
	}
	function editCust(){

		$uri=$this->input->post('uriid');
		$name = $this->input->post('name');
		 $fname = $this->input->post('fname');
		 $mname = $this->input->post('mname');
		 $address = $this->input->post('address');
		 $state = $this->input->post('state');
		 $city = $this->input->post('city');
		 $area = $this->input->post('area');
		 $pincode = $this->input->post('pincode');
		 $dob = $this->input->post('dob');
		 $gender = $this->input->post('gender');
		 $email = $this->input->post('email');
		 $mob = $this->input->post('mob');
		$data=array(
		 	"name" =>$name,
		 	"fname" => $fname,
		 	"mname" =>$mname, 
		 	"address" => $address,
		 	"state" => $state,
		 	"city" => $city,
		 	"area" => $area,
		 	"pin" => $pincode,
		 	"dob" => $dob,
		 	"gender" => $gender,
		 	"email" => $email,
		 	"mobile" => $mob,
		 );
		 $this->load->model('Cmodel');
		 if($this->Cmodel->updateCust($data,$uri)){
		 	redirect('customer/editCustomer/'.$uri.'/success');
		 }
		 else{
		    redirect('customer/editCustomer/false'); 
		 }
	}

	function deleteCust(){
		    $reg_id = $this->uri->segment('3');
		    $this->load->model('Cmodel');
		    if($this->Cmodel->deleteCust($reg_id))
		   	{
		    redirect('customer/customerList/success');
		    }
		    else{
		       redirect('customer/customerList/false');
		    }
	
		}
}