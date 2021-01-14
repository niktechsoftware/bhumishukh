<?php
class loginmodel extends CI_Model{
	function validate(){
		 $loginData=array('is_login'=>false);

		$this->db->where("admin_username", $this->input->post("username"));
		$this->db->where("admin_password", md5($this->input->post("password")));
		$general = $this->db->get("general_settings");
 
		if ($general->num_rows() > 0) {
			$res = $general->row();
			//echo $password;
			$loginData = array(
				"business_name" => $res->business_name,
				"login_type" => 1,
				"name" => $res->customer_name,
				"address_1" => $res->address_1,
				"address_2" => $res->address_2,
				"city" => $res->city,
				"state" => $res->state,
				"pin" => $res->pin,
				"nationality" => $res->nationality,
				"customer_id" => $res->id,
				"phone_number" => $res->phone_number,
				"mobile_number" => $res->mobile_number,
				"email_1" => $res->email1,
				"email_2" => $res->email2,
				"Language" => $res->language,
				"customer_username" => $res->admin_username,
				"customer_password" => $res->admin_password,
				"photo" => $res->ico_logo,
				"logo" => $res->logo,
				"image" =>$res->logo,
				"is_login" => true,
				"is_lock" => true,
				"login_date" => date("d-M-Y"),
				"login_time" => date("H:i:s")
			);
			return $loginData;
		} else{

		//$this->db->where("status",0);
		$uid =$this->input->post("username");
		$pass =$this->input->post("password");
		$query =	$this->db->query("select * from agent_info where  password = '$pass' and (username='$uid' or email ='$uid')" );
		
			
			if ($query->num_rows() > 0) {

				$res = $query->row();
			
				$general = $this->db->get("general_settings");
				$school = $general->row();
				$loginData = array(
					"business_name" => $school->business_name,
					"login_type" => 2,
					"customer_id" => $res->id,
					"name" => $res->name,
					"dob" => $res->dob,
					//"image"=>$res->image,
					//"photo"=>$res->image,
					"customer_username" => $res->username,
					"customer_password" => $res->password,
					"mobile_number" => $res->mobile,
					"currentaddress" => $res->address,
					//"permanentaddress" => $res->permanent_address,
					"city" => $res->city,
					"state" => $res->state,
					"pin" => $res->pin,
					//"pan_number" => $res->pannumber,
					//"adhaar_number" => $res->adhaarnumber,
					"status" => $res->status,
					"logo" => $school->logo,
					"is_login" => true,
					"is_lock" => true,
					"login_date" => date("d-M-Y")
					
				);
				return $loginData;
			}
		
		}
		
	
    }
    
    function validateLock(){
    	$login_type = $this->input->post('logintype');
    	//echo $login_type;
    	//die();
    	if($login_type == 'admin'){

    	//	$this->db->where("school_code",$this->session->userdata("school_code"));
    		$this->db->where("admin_username", $this->input->post("username"));
    		$this->db->where("admin_password", md5($this->input->post("password")));
    		$result = $this->db->get('general_settings');
    		if($result->num_rows() > 0){
    			return true;
    		}
    		else{
    			return false;
    		}
    	}
    	elseif($login_type == "agent"){

    	//	$this->db->where("school_code",$this->session->userdata("school_code"));
    		$this->db->where("status",1);
    		$this->db->where("username", $this->input->post("username"));
    		$this->db->where("password", $this->input->post("password"));
    		$result = $this->db->get('agent_info');
    		if($result->num_rows() > 1){
    			return true;
    		}
    		else{
    			return false;
    		}
    	}
    	else{

    	//	$this->db->where("school_code",$this->session->userdata("school_code"));
    		$this->db->where("status",1);
    		$this->db->where("username", $this->input->post("username"));
    		$this->db->where("password", $this->input->post("password"));
    		$result = $this->db->get('employee_info');
    		if($result->num_rows() > 1){
    			return true;
    		}
    		else{
    			return false;
    		}
    	}
    }
    function alldata(){
		$reg=$this->db->get('customer_complain');
		return $reg;
	}
	function updatecid($cid,$status){
	    $update = array(
	        "status"=>1);
	        
	    
	    $this->db->where("s_no",$cid);
	    $this->db->update("customer_complain",$update);
	    sms("6389224854","Your Complain has been solved!");
	}
    
}