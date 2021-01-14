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
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//		*******************************UPASANA CODE***************************************** 	
	function addCust(){
	     if($this->input->post("adId")){
	        $val= $this->input->post("adId");
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
	    $data['val'] =$val;
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
	    
	     $loginType= $this->session->userdata("login_type");
	   if($loginType==1){
	        $data['aginfo']=$this->db->get('customer_info');
	   }else{
	        $cid = $this->session->userdata("customer_id");
	        $this->db->where("reff_id",$cid);
	        $data['aginfo']=$this->db->get('customer_info');
	   }
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
	
		function custCheckId(){
	    $data['pageTitle'] = 'Customer Check';
		$data['smallTitle'] = 'Customer Check';
		$data['mainPage'] = 'Customer Check';
		$data['subPage'] = 'Customer Check';
		$data['title'] = 'Customer Check';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'custCheckId';
		$this->load->view("includes/mainContent", $data);
	    
	}
		function custDocInfo(){
	    $data['pageTitle'] = 'Customer Check';
		$data['smallTitle'] = 'Customer Check';
		$data['mainPage'] = 'Customer Check';
		$data['subPage'] = 'Customer Check';
		$data['title'] = 'Customer Check';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'custDocInfo';
		$this->load->view("includes/mainContent", $data);
	    
	}
	function customerProfile(){
	    $uri=$this->uri->segment("3");
	    $this->db->where("id",$uri);
	    $crecord=$this->db->get("customer_info");
	    $data['uri']=$uri;
	    $data['crecord']=$crecord;
	    $data['pageTitle'] = 'Customer Profile';
		$data['smallTitle'] = 'Customer Profile';
		$data['mainPage'] = 'Customer Profile';
		$data['subPage'] = 'Customer Profile';
		$data['title'] = 'Customer Profile';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'customerProfile';
		$this->load->view("includes/mainContent", $data);
	    
	}
		function checkCustId(){
	    $data['pageTitle'] = 'Customer Installment';
		$data['smallTitle'] = 'Customer Installment';
		$data['mainPage'] = 'Customer Installment';
		$data['subPage'] = 'Customer Installment';
		$data['title'] = 'Customer Installment';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'checkCustId';
		$this->load->view("includes/mainContent", $data);
	    
	}
		function payInstallment(){
	    $data['pageTitle'] = 'Customer Installment';
		$data['smallTitle'] = 'Customer Installment';
		$data['mainPage'] = 'Customer Installment';
		$data['subPage'] = 'Customer Installment';
		$data['title'] = 'Customer Installment';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'payInstallment';
		$this->load->view("includes/mainContent", $data);
	    
	}
	function invoice(){
		$this->load->view("invoice");
	}
	function installmentInvoice(){
		$this->load->view("installmentInvoice");
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
		  $agid=$this->input->post('agid');
	
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
		     "reff_id" => $agid,
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
		 	"status" => "1",
		 	"date" => date("Y-m-d")
		 );
		 $this->load->model('Cmodel');
		 if($this->Cmodel->addCust($data)){
		       $msg = "Dear ". $name ." Your Registration is successfully Done,Your Username is ".$username.",password is ".$password."
		 is ".$password. "Please Contact to Admin for update your KYC.";
                 	sms($mob, $msg);
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
		function custAssignPlan(){
	    $data['pageTitle'] = 'Assign Plan';
		$data['smallTitle'] = 'Assign Plan';
		$data['mainPage'] = 'Assign Plan';
		$data['subPage'] = 'Assign Plan';
		$data['title'] = 'Assign Plan';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'custAssignPlan';
		$this->load->view("includes/mainContent", $data);
	    
	}	
		function getAmount(){
		 $size = $this->input->post("size");
	     $this->load->model('cmodel');
		$query = $this->cmodel->getAmount($size);
                           $this->db->where('id',$query->id);
				 	       $row2=$this->db->get('assign_plan')->row();
				 	       echo $row2->price;

			
	}
		function cusPlanM(){
	    $data['pageTitle'] = 'Assign Plan';
		$data['smallTitle'] = 'Assign Plan';
		$data['mainPage'] = 'Assign Plan';
		$data['subPage'] = 'Assign Plan';
		$data['title'] = 'Assign Plan';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'cusPlanM';
		$this->load->view("includes/mainContent", $data);
	    
	}	
	function matchCustid(){
		$username=$this->input->post("username");
		$this->db->where("username",$username);
		$res=$this->db->get("customer_info")->row();
		if($res){
	
			redirect(base_url()."index.php/customer/custAssignPlan/success/".$username);
			
		}
		else{

			redirect(base_url()."index.php/customer/cusPlanM/false/");
		}
	}
	function assignCustPlan(){
	    	$this->load->model("Cmodel");
			$tblnm ="customer_info";
		   	$maxid	=	$this->Cmodel->cust_max($tblnm);
		    $tblnm ="customer_info";
		    $maxid	=	$maxid+1;
		    $rn=rand(9999,99999);
		    $maxid1=$maxid+$rn;
		     $rn1=rand(10000,100000);
		    $maxid2=$maxid+$rn1;
		    $username="BSMI".$maxid2;
		    $billno="BSI".$maxid1;
		//$cust= $this->input->post('custid');   
		$plan= $this->input->post("plan");
	    $advance= $this->input->post("advance");
	    $amount= $this->input->post("amount");
	    $landno= $this->input->post("landno");
	    $year= $this->input->post("year");
	    $month=$year*12;
	    $im= $this->input->post("installamount");
	    $this->db->where("username",$this->input->post('custid'));
		$rpd = $this->db->get("customer_info");
		 if($rpd->num_rows()>0){
		     $invoice=array(
	            "invoice_Number" => $billno,
	            "reason" => "2",
	       );
	       
		  $this->db->insert("invoice_serial",$invoice);
	      $last_id=$this->db->insert_id();
	  
	    $data=array(
	        "customer_id" => $rpd->row()->id,
	        "plan_id" => $plan,
	        "house_number" => $landno,
	        "installment" => $im,
	        "duration_months" =>$month,
	        "BOND_ID" =>$username,
	        "created" => date("Y-m-d"),
	        "invoice_no" =>$last_id
	        );
	        
	       $daybook=array(
		     "paid_to"=> $this->session->userdata('customer_id'),
		     "paid_by" => $rpd->row()->id,
		     "reason" =>'2',
		     "dabit_cradit" =>"1",
		     "amount" => $advance,
		     "pay_date" => date("Y-m-d"),
		     "pay_mode" =>"Cash",
		     "invoice_no" =>$last_id,
		     "status" => "1"
		      );
		      $rpd1=$rpd->row()->mobile;
		      $name =$rpd->row()->name;
		     
		      if($this->db->insert("customer_plan",$data) &&  $this->db->insert("day_book",$daybook)){
		            $msg = "Dear ". $name ." Your Bond is successfully assigned to you,For any queries please Contact to Admin.";
                 	sms($rpd1, $msg);
		       redirect('customer/invoice/'.$last_id."/".$rpd->row()->id); 
		      }else{
		          redirect('customer/custAssignPlan/false');
		      }
		 }
	}
		function checkPaidInstallment(){
		$username=$this->input->post("username");
		$this->db->where("username",$username);
		$res=$this->db->get("customer_info")->row();
		if($res){
	
			redirect(base_url()."index.php/customer/payInstallment/success/".$res->id);
			
		}
		else{

			redirect(base_url()."index.php/customer/checkCustId/false/");
		}
	}
		function paidInstallment(){
		    $this->load->model("cmodel");
			$tblnm ="customer_info";
		   	$maxid	=	$this->cmodel->cust_max($tblnm);
		    $tblnm ="customer_info";
		    $maxid	=	$maxid+1;
		    $rn=rand(10000,100000);
		    $maxid1=$maxid+$rn;
		    $inno="BSI".$maxid1;
		    $custId= $this->input->post("cid");
		    $planId= $this->input->post("planname");
		     $dmonth= $this->input->post("dmonth");
		    $bondId= $this->input->post("bondId");
		    $date= $this->input->post("date");
		    $planid = $this->input->post("planname");
		    $amount= $this->input->post("amount");
		    $disc= $this->input->post("disc");
		    $data= array(
		        "customer_id"=>$custId,
		        "plan_id" => $planId,
		        "deposit_months"=>$dmonth,
		        "date" =>$date,
		        "description" =>$disc,
		        );
		      
		    $invoice = array(
		        "invoice_Number" => $inno ,
		        "reason"  => "1"
		        ); 
		  $this->cmodel->invoiceSerial($invoice);    
		  $last_id=$this->db->insert_id();
		  $this->db->where("plan_id",$planId);
	    	$rpd = $this->db->get("customer_plan");
		    if($rpd->num_rows()>0){
		  $daybook = array(
		     "paid_to"=> $this->session->userdata('customer_id'),
		     "paid_by" => $rpd->row()->customer_id,
		     "reason" =>'1',
		     "dabit_cradit" =>"1",
		     "amount" => $amount,
		     "pay_date" => $date,
		     "pay_mode" =>"1",
		     "invoice_no" =>$last_id,
		     "disc" => $disc,
		     "status" => "1"
		      );
		    if($this->db->insert("customer_installment",$data) &&  $this->db->insert("day_book",$daybook)){
		       redirect('customer/installmentInvoice/'.$last_id."/".$rpd->row()->customer_id); 
		      }else{
		          redirect('customer/payInstallment/false');
		      }
		}
		}
		
	function updateKYCinfo(){
		 $adhar = $this->input->post('aadhar');
		 $pan = $this->input->post('pannumber');
		 $accountnum = $this->input->post('accountnum');
		 $username =$this->input->post('agid');
		 $ifscc = $this->input->post('ifsccd');
		 $bname = $this->input->post('bname');
			$this->db->where("username",$this->input->post('agid'));
		    $rpd = 	$this->db->get("customer_info");
		    if($rpd->num_rows()>0){
		 $data=array(
		 	"customer_id"=> $rpd->row()->id, 
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

	  $this->load->model('cmodel');
	  if($this->cmodel->updateDocInfo($data)){
			redirect('customer/custDocInfo/success');
		 }
		 else{
		    redirect('customer/custDocInfo/false'); 
		 }
	}
		function matchid(){
		$username=$this->input->post("username");
		$this->db->where("username",$username);
		$res=$this->db->get("customer_info")->row();
		if($res){
	
			redirect(base_url()."index.php/customer/custDocInfo/".$username);
			
		}
		else{

			redirect(base_url()."index.php/customer/custDocInfo/false/");
		}
	}
	
	
	public function getHousebyPlanid()
		 {
		 
			$planid = $this->input->post("planid");
			$custid = $this->input->post("custid");
			$this->load->model('daybook');
			$query = $this->daybook->getHousebyPlanid($planid); 
		     if($query->num_rows()>0){
		        // print_r($query->row());
			$this->db->where("plan_id",$planid);
			$aplan=$this->db->get("assign_plan");
		    $this->db->where("id",$aplan->row()->unit_id);
		    $pu=$this->db->get("plan_unit");
			$query1=$this->daybook->getDepositedmonth($planid,$custid);
			$hmonth = $query1->row()->totmonth;
		   // echo $hmonth;
			$datemo=date('Y-m-d',(strtotime ( '+$hmonth month' , strtotime ($query->row()->created) ) ));
		    $data= array(
		        "hn" =>$query->row()->house_number,
		        "size" =>$aplan->row()->size,
		        "unit" =>$aplan->row()->unit_id,
		        "month" =>$query->row()->created,
		        "unit_name"=>$pu->row()->unit_name
		        );
		        
		 	echo json_encode($data);
		 
		     }
		 }
		public function getCustomerById(){
	     $loginType= $this->session->userdata("login_type");
	   if(($loginType==1) && (strlen($this->input->post("adId"))<1)){
	        $agentarray=305;
	   }else{
	       if($this->input->post("adId")){
	           $username =$this->input->post("adId");
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
	            $mainData = $this->daybook->getSubCustomer($agentarray, $i);
	            $tempData = $mainData['subIDs'];
	            array_push($finalArray, $mainData);
	       }
	       else if(sizeof($tempData) > 0) {
	           $flag = array();
	            foreach($tempData as $subID) {
	                $mainData1 = $this->daybook->getSubCustomer($subID, $i);
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
	    $data['pageTitle'] = 'Customer List';
		$data['smallTitle'] = 'Customer List';
		$data['mainPage'] = 'Customer  List';
		$data['subPage'] = 'Customer  List';
		$data['title'] = 'Customer  List';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'customerListById';
		$this->load->view("includes/mainContent", $data);
	}
	public function getSizebyPlanname()
		 {
		//	$size = $this->input->post("size");
			$plan = $this->input->post("plan");
			
			$this->load->model('cmodel');
			$query = $this->cmodel->getSizebyPlanname($plan);
			print_r($query->result());
			if($query->num_rows()>0)
			{
           echo   '<option value="">--Select Size--</option>';
			foreach ($query->result() as $row)
			{
				?>
					<option value="<?php echo $row->id;?>"><?php echo $row->size;?></option>
				<?php 
			}
		}
		else
		{
                echo "string";

		}
	}
public function checkcc(){
		$custId = $this->input->post("custId");
	    $this->load->model("cmodel");
		$var= $this->cmodel->getValue1($custId);
	
					if($var->num_rows() > 0){
				$row=$var->row();
    
					?>
												<div class="alert alert-success">
													<button data-dismiss="alert" class="close">
														&times;
													</button>
													ID Found ! <strong><?php echo $row->name; ?>
													
												</strong></div>
													<button type="submit" class="btn btn-primary" id="pro" style=""><i class="far fa-edit">&nbsp;Submit</i></button>
												
												<?php 
												
											//}
										//else{
											?>
												<!--<div class="alert alert-danger">-->
												<!--	<button data-dismiss="alert" class="close">-->
												<!--		&times;-->
												<!--	</button>-->
												<!--	Sorry :( <strong><?php //echo "Student Not Found ! Wrong Student Id"; ?></strong>-->
												<!--</div>-->
											<?php
										//}
			
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
										Sorry :( <strong><?php echo "Customer Not Found ! Wrong Customer Id"; ?></strong>
									</div>
								<?php
								
							}
		}
	}	
		
	//		*******************************END UPASANA CODE*************************************	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////		
		
		
}