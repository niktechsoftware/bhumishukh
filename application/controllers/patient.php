<?php class patient extends CI_Controller{
public function coronary()
{
	 $data['pageTitle'] = 'Patient Form';
		$data['smallTitle'] = 'Patient Form';
	    $data['mainPage'] = 'Patient Form';
		$data['subPage'] = 'Patient Form';
		$data['title'] = 'Patient Form';
	    $data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
	    $data['mainContent'] = 'coronary';
	    $this->load->view("includes/mainContent",$data);
}

	public function pat_registration_form()
	{   
	 $data['pageTitle'] = 'Patient Form';
		$data['smallTitle'] = 'Patient Form';
	    $data['mainPage'] = 'Patient Form';
		$data['subPage'] = 'Patient Form';
		$data['title'] = 'Patient Form';
	    $data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
	    $data['mainContent'] = 'registration_form';
	    $this->load->view("includes/mainContent",$data);
	}
	public function addpatinfo(){
			$this->load->model("Patientmodel");
		    $tblnm ="reg_patient_info";
		    $maxid	=	$this->Patientmodel->pat_max($tblnm);
		    $tblnm ="reg_patient_info";
		    $maxid	=	$maxid+1;
			$username="GSVM".$maxid;
			$rn=rand(9999,99999);
			$usern1=$maxid+$rn;
			$username1="GSVM".$usern1;
			
				$data=array(
				'username'=>$username1,
				'first_name'=>$this->input->post("fname"),
				'middle_name'=>$this->input->post("mname"),
				'last_name'=> $this->input->post("lname"),
				'father_name'=>$this->input->post("father"),
				'mother_name'=>$this->input->post("mother"),
				'gender'=>$this->input->post("gender"),
				'address'=> $this->input->post("address"),
				'post'=>$this->input->post("post"),
				'tehsil'=>$this->input->post("tehsil"),
				'block'=> $this->input->post("block"),
				'city'=>$this->input->post("city"),
				'state'=>$this->input->post("state"),
				'area'=> $this->input->post("area"),
				'pincode'=>$this->input->post("pincode"),
				'email'=>$this->input->post("email"),
				'dob'=>$this->input->post("dob"),
				'mobile_number'=>$this->input->post("mobile"),
				'telephone_number'=>$this->input->post("number"),
				'voter_id'=>$this->input->post("voter"),
				'aadhar_card'=>$this->input->post("adhaar"),
				'pan_card'=>$this->input->post("pancard"),
				'password'=>$this->input->post("password"),
				'martial_status'=>$this->input->post("martial")
	        );
	  if (!empty($_FILES['image']['name'])) {
	       $this->load->library('upload');
			$photo_name = time().trim($_FILES['image']['name']);
			$photo_name=str_replace(' ', '_', $photo_name);
			$logo=$this->input->post('image');
	 		//echo $logo;
			$image_path = realpath(APPPATH . '../assets/img/');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '50000';
			$config['file_name'] = $photo_name;
			$this->upload->initialize($config);
			if($this->upload->do_upload('image')){
			$data['image'] =    $photo_name;
			}else{
			    echo $this->upload->display_errors();
			}}
		    $getid=$this->Patientmodel->addpatient($data);	 
		    if($getid){
		    redirect('patient/pat_registration_form/success/'.$getid); 
		    }else{
		        redirect('patient/pat_registration_form/fail');  
		    }
			
	}
	public function diet()
	{   

	    $data['pageTitle'] = 'Patient Diet';
		$data['smallTitle'] = 'Patient Diet Form';
	    $data['mainPage'] = 'Patient Diet Form';
		$data['subPage'] = 'Patient Diet Form';
		$data['title'] = 'Patient Diet Form';
	    $data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
	    $data['mainContent'] = 'patient_diet';
	    $this->load->view("includes/mainContent", $data);
	}
	public function smoking_status()
	{   

	    $data['pageTitle'] = 'Smoking Status';
		$data['smallTitle'] = 'Smoking Status';
	    $data['mainPage'] = 'Smoking Status';
		$data['subPage'] = 'Smoking Status';
		$data['title'] = 'Smoking Status';
	    $data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
	    $data['mainContent'] = 'smoking_status';
	    $this->load->view("includes/mainContent", $data);
	}
	function alcohol_status(){
	    $data['pageTitle'] = 'Alcohol Status';
		$data['smallTitle'] = 'Alcohol Status';
		$data['mainPage'] = 'alcohol_status';
		$data['subPage'] = 'Alcohol Status';
		$data['title'] = 'Alcohol Status';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'alcohol_status';
		$this->load->view("includes/mainContent", $data);
	    
	}
	function patient_exercise(){
	    $data['pageTitle'] = 'Patient Exercise';
		$data['smallTitle'] = 'Patient Exercise';
		$data['mainPage'] = 'Patient Exercise';
		$data['subPage'] = 'Patient Exercise';
		$data['title'] = 'Patient Exercise';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'patient_exercise';
		$this->load->view("includes/mainContent", $data);
	    
	}
	function newform(){
	    $data['pageTitle'] = 'Patient Exercise';
		$data['smallTitle'] = 'Patient Exercise';
		$data['mainPage'] = 'Patient Exercise';
		$data['subPage'] = 'Patient Exercise';
		$data['title'] = 'Patient Exercise';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'newform';
		$this->load->view("includes/mainContent", $data);
	    
	}
public function patient_list(){
		$this->load->model('Patientmodel');
		$data['row']=$this->Patientmodel->getpatientinfo();
		$data['pageTitle'] = ' Employee list';
		$data['smallTitle'] =' Employee list';
		$data['mainPage'] =  'Employee list';
		$data['subPage'] =' Employee list';
		$data['title'] =' Employee list';
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = 'patient_list';
		$this->load->view("includes/mainContent", $data);

}


	

	function matchid(){
		$username=$this->input->post("username");
		$this->db->where("username",$username);
		$res=$this->db->get("reg_patient_info")->row();
		if($res){
	
			redirect(base_url()."index.php/patient/newform/sucess/".$username);
			
		}
		else{

			redirect(base_url()."index.php/patient/newform/false/");
		}
	}

		function patient_diet(){
		    $username =$this->input->post('pid');
			$this->db->where("username",$this->input->post('pid'));
		    $rpd = 	$this->db->get("reg_patient_info");
		    if($rpd->num_rows()>0){
				$data=array(
				    'reg_id'=>$rpd->row()->id,
					'dietary_habit'=>$this->input->post("dietary_habit"),
					'break_fast'=>$this->input->post("breakfast"),
					'lunch'=>$this->input->post('lunch'),
					'snakes'=>$this->input->post("snake"),
					'dinner'=>$this->input->post('dinner'),
					'red_meat'=>$this->input->post('meat'),
					'number_of_meat_timing'=>$this->input->post('number_of_meat_timing'),
					'meat_routine'=>$this->input->post('meat_routine'),
					'fish'=>$this->input->post('fish'),
					'fish_routine'=>$this->input->post('fish_routine'),
					'number_of_fish_timing'=>$this->input->post('number_of_fish_timing'),
					'desserts'=>$this->input->post('desserts'),
					'desserts_routine'=>$this->input->post('desserts_routine'),
					'number_of_desserts_timing'=>$this->input->post('number_of_desserts_timing'),
					'pork'=>$this->input->post('pork'),
					'pork_routine'=>$this->input->post('pork_routine'),
					'number_of_timing_pork'=>$this->input->post('number_of_timing_pork'),
					'chicken'=>$this->input->post('chicken'),
					'chicken_routine'=>$this->input->post('chicken_routine'),
					'number_of_chicken_timing'=>$this->input->post('number_of_chicken_timing'),
					'fried_food'=>$this->input->post('fried_food'),
					'fried_routine'=>$this->input->post('fried_routine'),
					'number_of_fried_timing'=>$this->input->post('number_of_fried_timing'),
					'milk'=>$this->input->post('milk'),
					'number_of_glassesof_milk'=>$this->input->post('number_of_glassesof_milk'),
					'number_of_timimg'=>$this->input->post('number_of_timimg'),
					'tea'=>$this->input->post('tea'),
					'number_of_glassesof_tea'=>$this->input->post('number_of_glassesof_tea'),
					'coffee'=>$this->input->post('coffee'),
					'number_of_cupof_coffee'=>$this->input->post('number_of_cupof_coffee'),
					'water'=>$this->input->post('water'),
					'number_of_glassesof_water'=>$this->input->post('number_of_glassesof_water'),
					'date'=>date("Y-m-d H:i:s")
					);
				$this->load->model('Patientmodel');
				$this->Patientmodel->insertdiet($data);
				redirect(base_url()."index.php/patient/newform/success/".$username);
		    
		}else{
		   echo "please Contact to Admin"; 
		}
    }
		function patient_smokingstatus(){
		     $username =$this->input->post('pid');
			    $this->db->where("username",$this->input->post('pid'));
		        $rpd = 	$this->db->get("reg_patient_info");
		     
		        if($rpd->num_rows()>0){
				$data=array(
					'reg_id'=>$rpd->row()->id,
					'your_smoking_status'=>$this->input->post('answer'),
					'duration'=>$this->input->post('duration'),
					'when_left'=>$this->input->post('left'),
					'number_of_cigaratte'=>$this->input->post('many'),
					//'number_of_year'=>$this->input->post(''),
					'smokein_family_member'=>$this->input->post('know'),
					'paan_with_tabbacco'=>$this->input->post('paan'),
					'tambakoo'=>$this->input->post('tambacco'),
					'zarda_khaini'=>$this->input->post('zarda'),
					'other'=>$this->input->post('other'),
                    'date'=>date('Y-m-d H:i:s')
					);
				$this->load->model('Patientmodel');
				if($this->Patientmodel->smoking_status($data)){
				 
		    	redirect(base_url()."index.php/patient/newform/success/".$username);
				}else{
				    	redirect(base_url()."index.php/patient/newform/fail/");
				}
		}
		}

		function patient_alcoholstatus(){
		      $username =$this->input->post('pid');
			    $this->db->where("username",$this->input->post('pid'));
		        $rpd = 	$this->db->get("reg_patient_info");
		     
		        if($rpd->num_rows()>0){
				$data=array(
					'reg_id'=>$rpd->row()->id,
					'drinking_alcohol'=>$this->input->post('answer'),
					'alcoholic_beverages'=>$this->input->post('alcohol'),
					'beer'=>$this->input->post('left'),
					'wine'=>$this->input->post('wine'),
					'hard_liquor'=>$this->input->post('hard'),
					'date'=>date("Y-m-d H:i:s")
					);
				$this->load->model('Patientmodel');
				if($this->Patientmodel->alcohol_status($data)){
				 	redirect(base_url()."index.php/patient/newform/success/".$username);
				}else{
				     redirect(base_url()."index.php/patient/newform/fail");
				}
		
		}}
		
		function patient_exercisestatus(){
		 $username =$this->input->post('pid');
			    $this->db->where("username",$this->input->post('pid'));
		        $rpd = 	$this->db->get("reg_patient_info");
		     
		        if($rpd->num_rows()>0){
				$data=array(
					'reg_id'=>$rpd->row()->id,
					'sitting_for_large_time'=>$this->input->post('sitting'),
					'yoga'=>$this->input->post('yoga'),
					'sakha'=>$this->input->post('sakha'),
					'gym'=>$this->input->post('gym'),
					'walk'=>$this->input->post('walk'),
					'running'=>$this->input->post('running'),
					'swimming'=>$this->input->post('swimming'),
					'never'=>$this->input->post('never'),
					'other'=>$this->input->post('other'),
					'frequency'=>$this->input->post('frequency'),
					'sedantary'=>$this->input->post('sedantary'),
					'moderate'=>$this->input->post('moderate'),
					'vigorous'=>$this->input->post('vigorous'),
					'duration'=>$this->input->post('duration'),
					'routine'=>$this->input->post('routine'),
					'activity'=>$this->input->post('activity'),
					'fitness'=>$this->input->post('fitness'),
					'improve_fitness'=>$this->input->post('improve_fitness'),
					'sleep_hour'=>$this->input->post('sleep_hour'),
					'exposure'=>$this->input->post('exposure'),
					'date' =>date('Y-m-d H:i:s')
					);
				$this->load->model('Patientmodel');
				if($this->Patientmodel->exercise_status($data)){
			
				redirect(base_url()."index.php/patient/newform/success/".$username);
				}else{
				    redirect(base_url()."index.php/patient/newform/fail"); 
				}
		
            }

		}
 
}