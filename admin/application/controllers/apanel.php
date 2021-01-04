<?php class Apanel extends CI_Controller{
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
		
		function acDetails(){
	    $data['pageTitle'] = 'Account Details';
		$data['smallTitle'] = 'Account Details';
		$data['mainPage'] = 'Account Details';
		$data['subPage'] = 'Account Details';
		$data['title'] = 'Account Details';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'acDetails';
		$this->load->view("includes/mainContent", $data);
	    
	}
	function commisionChart(){
	    $data['pageTitle'] = 'Commision Chart';
		$data['smallTitle'] = 'Commision Chart';
		$data['mainPage'] = 'Commision Chart';
		$data['subPage'] = 'Commision Chart';
		$data['title'] = 'Commision Chart';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'commisionChart';
		$this->load->view("includes/mainContent", $data);
	    
	}
	function promotionChart(){
	    $data['pageTitle'] = 'Promotion Chart';
		$data['smallTitle'] = 'Promotion Chart';
		$data['mainPage'] = 'Promotion Chart';
		$data['subPage'] = 'Promotion Chart';
		$data['title'] = 'Promotion Chart';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'promotionChart';
		$this->load->view("includes/mainContent", $data);
	    
	}
	function agent_registration(){
	    $data['pageTitle'] = 'Agent Registration';
		$data['smallTitle'] = 'Agent Registration';
		$data['mainPage'] = 'Agent Registration';
		$data['subPage'] = 'Agent Registration';
		$data['title'] = 'Agent Registration';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'agent_registration';
		$this->load->view("includes/mainContent", $data);
	    
	}

	function editagent_registration(){
	    $data['pageTitle'] = 'Agent Registration';
		$data['smallTitle'] = 'Agent Registration';
		$data['mainPage'] = 'Agent Registration';
		$data['subPage'] = 'Agent Registration';
		$data['title'] = 'Agent Registration';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'editAgentReg';
		$this->load->view("includes/mainContent", $data);
	    
	}

	function agent_profile(){
		$this->load->library("form_validation");
		$this->load->model("adminmodel");
		$data['crecord'] = $this->adminmodel->getAgrecord();
		$data['pageTitle'] = 'Admin Profile';
		$data['smallTitle'] = 'Profile form';
		$data['mainPage'] = 'Admin Profile';
		$data['subPage'] = 'Admin Profile';
		$data['title'] = 'Admin Profile Form';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'agent_profile';
		$this->load->view("includes/mainContent", $data);
	}
	
	    
	

	function agentDocInfo(){
	    $data['pageTitle'] = 'Agent Document Info';
		$data['smallTitle'] = 'Agent Document Info';
		$data['mainPage'] = 'Agent Document Info';
		$data['subPage'] = 'Agent Document Info';
		$data['title'] = 'Agent Document Info';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'agentDocInfo';
		$this->load->view("includes/mainContent", $data);
	    
	}
	function agentCheckId(){
	    $data['pageTitle'] = 'Agent Info';
		$data['smallTitle'] = 'Agent Info';
		$data['mainPage'] = 'Agent  Info';
		$data['subPage'] = 'Agent  Info';
		$data['title'] = 'Agent  Info';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'agentCheckId';
		$this->load->view("includes/mainContent", $data);
	    
	}
	function agentList(){
	    $data['pageTitle'] = 'Agent List';
		$data['smallTitle'] = 'Agent List';
		$data['mainPage'] = 'Agent  List';
		$data['subPage'] = 'Agent  List';
		$data['title'] = 'Agent  List';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'agentList';
		$this->load->view("includes/mainContent", $data);
	    
	}

		function dBookDetail(){
	    $data['pageTitle'] = 'Daybook';
		$data['smallTitle'] = 'Daybook';
		$data['mainPage'] = 'Daybook';
		$data['subPage'] = 'Daybook';
		$data['title'] = 'Daybook';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'dayBook';
		$this->load->view("includes/mainContent", $data);
	    
	}
	function dayBookReport(){
    $sdate = $this->input->post("sdate");
    $edate = $this->input->post("edate");
    $q  = $this->input->post("type");
    $data['sdate']=$sdate;
    $data['edate']=$edate;
    $data['q']=$q;
    $this->load->model('daybook');
    $gdbd=$this->daybook->getdaybookByDate($sdate,$edate,$q);
    $data['gdbd']=$gdbd;
    $data['pageTitle'] = 'Daybook Detail';
    $data['smallTitle'] = 'Daybook Detail';
    $data['mainPage'] = 'Daybook Detail';
    $data['subPage'] = 'Daybook Detail';
    $data['title'] = 'Daybook Detail';
    $data['headerCss'] = 'headerCss/customerlistcss';
    $data['footerJs'] = 'footerJs/customerlistjs';
    $data['mainContent'] = 'dayBookReport';
    $this->load->view("includes/mainContent", $data);
}
	
	function checkBusiness(){
	    $data['pageTitle'] = 'Check Business';
		$data['smallTitle'] = 'Check Business';
		$data['mainPage'] = 'Check Business';
		$data['subPage'] = 'Check Business';
		$data['title'] = 'Check Business';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'checkBusiness';
		$this->load->view("includes/mainContent", $data);
	    
	}

	function notice(){
	    $data['pageTitle'] = 'Notice';
		$data['smallTitle'] = 'Notice';
		$data['mainPage'] = 'Notice';
		$data['subPage'] = 'Notice';
		$data['title'] = 'Notice';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'notice';
		$this->load->view("includes/mainContent", $data);
	    
	}



		function matchid(){
		$username=$this->input->post("username");
		$this->db->where("username",$username);
		$res=$this->db->get("agent_info")->row();
		if($res){
	
			redirect(base_url()."index.php/apanel/agentDocInfo/sucess/".$username);
			
		}
		else{

			redirect(base_url()."index.php/apanel/agentCheckId/false/");
		}
	}
	function getCity(){
		$state = $this->input->post("state");
		$this->load->model("Adminmodel");
		$result = $this->Adminmodel->getCity($state);
	
		echo '<option value="">-City-</option>';
		foreach ($result->result() as $row):
		echo '<option value="'.$row->city.'">'.$row->city.'</option>';
		endforeach;
	}
	
	function getArea(){
		$state = $this->input->post("state");
		$city = $this->input->post("city");
		$this->load->model("Adminmodel");
		$result = $this->Adminmodel->getArea($state,$city);
	
		echo '<option value="">-Area-</option>';
		foreach ($result->result() as $row):
		echo '<option value="'.$row->area.'">'.$row->area.'</option>';
		endforeach;
	}
	
	function getPin(){
		$state = $this->input->post("state");
		$city = $this->input->post("city");
		$area = $this->input->post("area");
		$this->load->model("Adminmodel");
		$result = $this->Adminmodel->getPin($state,$city,$area);
	
		foreach ($result->result() as $row):
		echo $row->pin;
		endforeach;
	}

	function addAgent(){
			$this->load->model("Adminmodel");
		    $tblnm ="agent_info";
		    $maxid	=	$this->Adminmodel->ag_max($tblnm);
		    $tblnm ="agent_info";
		    $maxid	=	$maxid+1;
			$rn=rand(9999,99999);
			$usern1=$maxid+$rn;
			$username1="BSIA".$usern1;
			$rn1=rand(9999,999);
			$pass1=$rn1;
			$password1="BSA20".$pass1;
		 $name = $this->input->post('agname');
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
		 $this->load->model('Adminmodel');
		 if($this->Adminmodel->addAgent($data)){
		 	redirect('apanel/agent_registration/success');
		 }
		 else{
		    redirect('apanel/agent_registration/false'); 
		 }
	}
	function editAgent(){

		$uri=$this->input->post('uriid');
		$name = $this->input->post('agname');
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
		 $this->load->model('Adminmodel');
		 if($this->Adminmodel->updateAgent($data,$uri)){
		 	redirect('apanel/agent_registration/'.$uri.'/success');
		 }
		 else{
		    redirect('apanel/agent_registration/false'); 
		 }
	}

	function deleteAgent(){
		    $reg_id = $this->uri->segment('3');
		    $this->load->model('Adminmodel');
		    if($this->Adminmodel->deleteAgent($reg_id))
		   	{
		    redirect('apanel/agentList/success');
		    }
		    else{
		       redirect('apanel/agentList/false');
		    }
	
		}


	function updateKYCinfo(){
		 $adhar = $this->input->post('aadhar');
		 $pan = $this->input->post('pannumber');
		 $accountnum = $this->input->post('accountnum');
		 $username =$this->input->post('agid');
		 $ifscc = $this->input->post('ifscc');
		 $bname = $this->input->post('bname');
			$this->db->where("username",$this->input->post('agid'));
		    $rpd = 	$this->db->get("agent_info");
		    if($rpd->num_rows()>0){
		 $data=array(
		 	"agent_id"=> $rpd->row()->id, 
		 	"aadhar_number" => $adhar,
		 	"pan_card" =>  $pan,
		 	"account_number" => $accountnum,
		 	"ifsc_code" => $ifscc,
		 	"branch_name" => $bname,
		 	"date" => date("Y-m-d")
		 );
		}
		 $this->load->library('upload');
	if (!empty($_FILES['aadharimage']['name'])) {
	      	$photo_name = time().trim($_FILES['aadharimage']['name']);
			$photo_name=str_replace(' ', '_', $photo_name);
			$image_path = realpath(APPPATH . '../assets/img/doc/');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '50000';
			$config['file_name'] = $photo_name;
			$this->upload->initialize($config);
			if($this->upload->do_upload('aadharimage')){
				$data['aadhar_image']=$photo_name;
			
			}
					else{
					echo $this->upload->display_errors();
					    }
	  }
	  if (!empty($_FILES['panimage']['name'])) {
	      	$photo_name1 = time().trim($_FILES['panimage']['name']);
			$photo_name1=str_replace(' ', '_', $photo_name1);
			$image_path = realpath(APPPATH . '../assets/img/doc/');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '50000';
			$config['file_name'] = $photo_name1;
			$this->upload->initialize($config);
			if($this->upload->do_upload('panimage')){
				$data['pan_image']=$photo_name1;
			}
					else{
					echo  $this->upload->display_errors();
					    }
	  }   
	   if (!empty($_FILES['passimage']['name'])) {
	      	$photo_name2 = time().trim($_FILES['passimage']['name']);
			$photo_name2=str_replace(' ', '_', $photo_name2);
			$image_path = realpath(APPPATH . '../assets/img/doc/');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '50000';
			$config['file_name'] = $photo_name2;
			$this->upload->initialize($config);
			if($this->upload->do_upload('passimage')){
				$data['passbook_image']=$photo_name2;
			}
					else{
					echo  $this->upload->display_errors();
					    }
	  }  
	   if (!empty($_FILES['agimage']['name'])) {
	      	$photo_name3 = time().trim($_FILES['agimage']['name']);
			$photo_name3 =str_replace(' ', '_', $photo_name3);
			$image_path = realpath(APPPATH . '../assets/img/doc/');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '50000';
			$config['file_name'] = $photo_name3;
			$this->upload->initialize($config);
			if($this->upload->do_upload('agimage')){
				$data['image']=$photo_name3;
			}
					else{
					echo  $this->upload->display_errors();
					    }
	  } 

	  $this->load->model('Adminmodel');
	  if($this->Adminmodel->updateDocInfo($data)){
			redirect('apanel/agentDocInfo/success');
		 }
		 else{
		    redirect('apanel/agentDocInfo/false'); 
		 }
	}




		












	//		*******************************END UPASANA CODE*************************************	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
}