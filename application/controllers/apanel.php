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
	
	function createBv(){
	     $data['pageTitle'] = 'Create B V';
		$data['smallTitle'] = 'Business Value';
		$data['mainPage'] = 'Business Value Setting';
		$data['subPage'] = 'Business Value';
		$data['title'] = 'Business Value';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'createBv';
		$this->load->view("includes/mainContent", $data);
	}
	
	function createPlanSave(){
	    $bv     =  $this->input->post("bv");
	   $inrv    =  $this->input->post("inrv");
	   $per = ($bv*100)/$inrv;
	   $data =array(
	       'valuem_rupee'=>$inrv,
	       'valuem_bv'=>$bv,
	       'percentage'=>$per,
	       'created'=>date("Y-m-d H:i:s")
	       );
	       
	       if($this->db->insert("bv_master",$data)){
	           	redirect(base_url()."index.php/apanel/createBv/sucess/");
	       }else{
	           redirect(base_url()."index.php/apanel/createBv/false/");
	       }
	     
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//		*******************************UPASANA CODE***************************************** 
		

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
		function activeInactiveList(){
		$uri = $this->uri->segment(3);
		if($uri==1){
		    $status=1;
		    $uri=1;
		    $pagename = "Active Agent List";
		}else{
		    $status=0;
		    $uri=2;
		    $pagename = "Inactive Agent List";
		}
		$this->db->where("status",$status);
		$aginfo= $this->db->get("agent_info");
		$data['uri']=$uri;
		$data['aginfo']=$aginfo;
	    $data['pageTitle'] = 'Agent List';
		$data['smallTitle'] =  $pagename;
		$data['mainPage'] = 'Agent List';
		$data['subPage'] = 'Agent List';
		$data['title'] = 'Agent List';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'activeInactiveList';
		$this->load->view("includes/mainContent", $data);
	    
	}
	function changeStatusRank(){
	   $rankid = $this->input->post("rankid");
	   $employeeid = $this->input->post("employeeid");
	   $status = $this->input->post("status");
	    $dataupdate = array(
	        'status' => $status,
	        'position'=>$rankid
	        );
	        $this->db->where("id",$employeeid);
	        if($this->db->update("agent_info",$dataupdate)){
	            echo 1;
	        }else{
	            echo 0;
	        }
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
	    if($this->input->post("adId")){
	        $val= $this->input->post("adId");
	         $this->db->where("position >",1);
	         $this->db->where("username",$val);
	         $agInfo=$this->db->get("agent_info");
	         if($agInfo->num_rows()>0){
	             $val=2;
	             $data['agInfo']=$agInfo->row();
	         }else{
	             $val=1;
	         }
	    }else{
	        $val=0;
	    }
	    
	    $data['val']=$val;
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
	    if($this->uri->segment(3)){
	     $data['uri']   =$this->uri->segment(3);
	    }else{
	     $data['uri']=$this->session->userdata("customer_id") ; 
	    }
	   // $uri= $this->uri->segment("3");
		$this->load->library("form_validation");
// 		$this->load->model("adminmodel");
// 		$data['crecord'] = $this->adminmodel->getAgrecord();
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
	    $uri=$this->uri->segment(4);
	   // $this->db->where("username",$uri);
	   // $aginfo=$this->db->get("agent_info");
	    
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
	   $loginType= $this->session->userdata("login_type");
	   if($loginType==1){
	        $data['aginfo']=$this->db->get('agent_info');
	   }else{
	        $cid = $this->session->userdata("customer_id");
	        $this->db->where("reff_id",$cid);
	        $data['aginfo']=$this->db->get('agent_info');
	   }
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
	function downLineAgentList(){
	   $loginType= $this->session->userdata("login_type");
	   if(($loginType==1) && (strlen($this->input->post("username"))<1)){
	        $agentarray=305;
	   }else{
	       if($this->input->post("username")){
	           $username =$this->input->post("username");
	           $this->db->where("username",$username);
	          $aginfo= $this->db->get("agent_info");
	          if($aginfo->num_rows()>0){
	          $agentarray=$aginfo->row()->id;
	          }else{
	              echo "wrong Username";
	          }
	       }else{
	        $cid = $this->session->userdata("customer_id");
	        $agentarray=$cid;
	       }
	   }
	   $this->load->model("daybook");
	   $emptyArray = array();
	   //$allid = $this->daybook->getAgentByagid($agentarray);
	   
	   $finalArray = array();
	   $tempData = array();
	   for($i = 1; $i <= 12; $i++) {
	       
	       if($i == 1) {
	            $mainData = $this->daybook->getSubAgent($agentarray, $i);
	            $tempData = $mainData['subIDs'];
	            array_push($finalArray, $mainData);
	       }
	       else if(sizeof($tempData) > 0) {
	           $flag = array();
	            foreach($tempData as $subID) {
	                $mainData1 = $this->daybook->getSubAgent($subID, $i);
	                $flag = array_merge($flag, $mainData1['subIDs']);
	                 array_push($finalArray, $mainData1);
	            }
	            $tempData = $flag;
	       }
	   }
	  // echo "<pre>";
       //print_r($finalArray);
       //echo "</pre>";
	   
	  // print_r($allid);
	  
	    $data['finalData']=$finalArray;
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
		
	function planName(){
	    $data['pageTitle'] = 'Plan Name';
		$data['smallTitle'] = 'Plan Name';
		$data['mainPage'] = 'Plan Name';
		$data['subPage'] = 'Plan Name';
		$data['title'] = 'Plan Name';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'planName';
		$this->load->view("includes/mainContent", $data);
	    
	}
	
	function assignPlan(){
	    $data['pageTitle'] = 'Assign Plan';
		$data['smallTitle'] = 'Assign Plan';
		$data['mainPage'] = 'Assign Plan';
		$data['subPage'] = 'Assign Plan';
		$data['title'] = 'Assign Plan';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'assignPlan';
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
			$rn1=rand(9999,99999);
			$pass1=$rn1;
			$password1="20".$pass1;
		  $agid=$this->input->post('agid');
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
		     "reff_id"=>	$agid,
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
		 	"status"=>"0",
		 	"date" => date("Y-m-d")
		 );
		 $this->load->model('Adminmodel');
		 if($this->Adminmodel->addAgent($data)){
		     $msg = "Dear ". $name ." Your Registration is successfully Done,Your Username is ".$username.",password is ".$password."
		 is ".$password. " Please Login https://bhoomisukh.com/ to update your kyc And Contact to Admin for Activate your account.";
                 	sms($mob, $msg);
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

    function createPlan(){
        $pname=$this->input->post('pname');
        $data=array(
            "name" =>$pname,
            "craeated" => date("Y-m-d")
            );
       $this->load->model('adminmodel');
	  if($this->adminmodel->createPlan($data)){
			redirect('apanel/planName/success');
		 }
		 else{
		    redirect('apanel/planName/false'); 
		 } 
    }

    function assignPlanVal(){
        $pid=$this->input->post('planid');
        $unitid=$this->input->post('unitid');
        $size=$this->input->post('size');
        $price=$this->input->post('price');
        $data=array(
            "plan_id" => $pid,
            "unit_id" =>$unitid,
            "size" =>$size,
            "price" =>$price,
            
            );
              $this->load->model('adminmodel');
	  if($this->adminmodel->assignPlan($data)){
			redirect('apanel/assignPlan/success');
		 }
		 else{
		    redirect('apanel/assignPlan/false'); 
		 } 
        
    }
    function deletePlan(){
            $reg_id = $this->uri->segment('3');
		    $this->load->model('Adminmodel');
		    if($this->Adminmodel->deletePlan($reg_id))
		   	{
		    redirect('apanel/planName/deleted');
		    }
		    else{
		       redirect('apanel/planName/notdeleted');
		    }
	 }
	 function deleteAsspln(){
            $reg_id = $this->uri->segment('3');
		    $this->load->model('Adminmodel');
		    if($this->Adminmodel->deleteAsspln($reg_id))
		   	{
		    redirect('apanel/assignPlan/deleted');
		    }
		    else{
		       redirect('apanel/assignPlan/notdeleted');
		    }
	 }
    function getAgentByagid(){
        
    }
    
    public function updatePlanname(){
     $this->load->model('adminmodel');
		$plan_id = $this->input->post('plan_id');
		$plan_n = $this->input->post('plan_n');
		$chk = $this->adminmodel->update_plan($plan_id,$plan_n);
		if($chk)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	//	echo 1;
    
}
  public function updateAssignPlan(){
     $this->load->model('adminmodel');
		$plan_id = $this->input->post('plan_id');
		$plan_p = $this->input->post('plan_p');
		$plan_s = $this->input->post('plan_s');
		$chk = $this->adminmodel->update_Aplan($plan_id,$plan_p,$plan_s);
		if($chk)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	//	echo 1;updateAssignPlan
    
}    
public function checkcc(){
		$adId = $this->input->post("adId");
		$aorc = $this->input->post("agent");
	    $this->load->model("adminmodel");
		$var= $this->adminmodel->getValue1($adId);
					if($var->num_rows() > 0){
				        $row=$var->row();
				if($row->position >1){
				
					?>
												<div class="alert alert-success">
													<button data-dismiss="alert" class="close">
														&times;
													</button>
													ID Found ! <strong><?php echo $row->name; ?>
													
												</strong></div>
													<button type="submit" class="btn btn-primary" id="pro" style=""><i class="far fa-edit">&nbsp;Submit</i></button>
												
												<?php 
									
		}else{
		    	?><div class="alert alert-warning">
					<button data-dismiss="alert" class="close">
					&times;
						</button>
						ID Found ! But Not Permitted to join Agent <strong><?php echo $row->name; ?>
						</strong>
				</div>
						<button type="submit" class="btn btn-primary" id="pro" style=""><i class="far fa-edit">&nbsp;Submit</i></button>
		<?php 
		}	    
					}
		else{
			
			if($var->num_rows() > 0){
				
					?>
									<div class="alert alert-success">
										<button data-dismiss="alert" class="close">
											&times;
										</button>
										ID Found ! <strong><?php echo $var->row()->name; ?></strong>
									</div>
										<button type="submit" class="btn btn-primary" id="pro" style=""><i class="far fa-edit">&nbsp;Submit</i></button>
									<?php 
									
								}
							else{
								?>
									<div class="alert alert-danger">
										<button data-dismiss="alert" class="close">
											&times;
										</button>
										Sorry :( <strong><?php echo "Agent Not Found ! Wrong Agent Id"; ?></strong>
									</div>
								<?php
								
							}
		}
	}
	function createEx(){
       
		$data['subPage'] = 'Expenditure';
		$data['smallTitle'] = 'Expenditure';
		$data['bigTitle'] = 'Expenditure';
		$data['title'] = 'Expenditure';
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = 'addExpenditure';
		$this->load->view("includes/mainContent", $data);

}
function createSubEx(){
       
		$data['subPage'] = 'Sub Expenditure';
		$data['smallTitle'] = 'Sub Expenditure';
		$data['bigTitle'] = 'Sub Expenditure';
		$data['title'] = 'Sub Expenditure';
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = 'addSubExpenditure';
		$this->load->view("includes/mainContent", $data);

}
	public function deletesubexp()
	{
	  $id=  $this->uri->segment('3');
      $this->load->model('adminmodel');
    $dexp=$this->adminmodel->deleteSubExp($id);
    $data['dexp']=$dexp;
    redirect(base_url()."apanel/createEx");
	}
	
		public function createSubexp(){
    	$data=array(
        	'sub_expenditure_name' => $this->input->post("subExpName"),
        	'exp_id'=> $this->input->post('expName'),		
        	
    	);	
    $this->load->model('adminmodel');
    $subExp=$this->adminmodel->createSubexp($data);
    $data['subExp']=$subExp;
    redirect(base_url()."apanel/createSubEx/success/");
                 }	
                 
        	function createxpe(){
		$exp= $this->input->post('exp');
		$this->load->model('adminmodel');
	    $expdata=$this->adminmodel->createxpe($exp);
		$data['expdata']=$expdata;
		redirect('apanel/createEx/success/',$data);
	}
	
	public function deleteExp()
	{
	  $id=  $this->uri->segment('3');
      $this->load->model('adminmodel');
    $dexp=$this->adminmodel->deleteExp($id);
    $data['dexp']=$dexp;
    redirect(base_url()."apanel/createEx");
	}         
   function cashPayment(){

    $data['pageTitle'] = 'Cash Payment';
    $data['smallTitle'] = 'Cash Payment';
    $data['mainPage'] = 'Cash Payment';
    $data['subPage'] = 'Cash Payment';
    $data['title'] = 'Cash Payment';
    $data['headerCss'] = 'headerCss/customerlistcss';
    $data['footerJs'] = 'footerJs/customerlistjs';
    $data['mainContent'] = 'cashPayment';
    $this->load->view("includes/mainContent", $data);

}                  
   function dTransaction(){
    $data['pageTitle'] = 'Director Transaction';
    $data['smallTitle'] = 'HandOver Transaction';
    $data['mainPage'] = 'HandOver Transaction';
    $data['subPage'] = 'HandOver Transaction';
    $data['title'] = 'HandOver Transaction';
    $data['headerCss'] = 'headerCss/customerlistcss';
    $data['footerJs'] = 'footerJs/customerlistjs';
    $data['mainContent'] = 'dTransaction';
    $this->load->view("includes/mainContent", $data);

}            
	//		*******************************END UPASANA CODE*************************************	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
}