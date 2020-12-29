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
	function customer_list(){
		$uriv = $this->uri->segment(3);
		if($uriv==1){
			$status=1;
			$page = "Active";
	
		}else{
			if($uriv==2){
				$status=0;
				$page = "Inctive";
			}else{
				if($uriv==3){
					$status=2;
					$page = "Paid Inactive";
				}
			}
		}
		$matchcon="status";
		$tblname="employee_info";
	
		$dt = $this->cmodel->getcustomerdata($matchcon,$status,$tblname);
		$data['row']=$dt;
		$data['uriv'] = $uriv;
		$data['pageTitle'] = $page.' Employee list';
		$data['smallTitle'] = $page.' Employee list';
		$data['mainPage'] = $page.' Employee list';
		$data['subPage'] = $page.' Employee list';
		$data['title'] = $page.' Employee list';
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = 'active_list';
		$this->load->view("includes/mainContent", $data);
	
	}
	
   function	 edit_profile(){
	  $cid= $this->input->post("id");
	  	$photo_name = time().trim($_FILES['photo']['name']);
	  $data["employee_iname"]= $this->input->post("cname");
	  $data["fname"]= $this->input->post("fname");
	  $data["city"]= $this->input->post("city");
	  $data["state"]= $this->input->post("state");
	  $data["current_address"]= $this->input->post("cadd");
	  $data["permanent_address"]= $this->input->post("peradd");
	  $data["pin"]= $this->input->post("pin");
	  $data["email"]= $this->input->post("email");
	  $data["mobilenumber"]= $this->input->post("mno");
	  $data["altnumber"]= $this->input->post("pmno");
	  $data["adhaarnumber"]= $this->input->post("adhar");
	  $data["pannumber"]= $this->input->post("panno");
	  $data["gender"]= $this->input->post("gender");
	  $data["dob"]= $this->input->post("dob");
	  $data["password"]= $this->input->post("password");
	  
	 // $data["photo"]= $this->input->post("photo");
	  	if (!empty($_FILES['photo']['name'])){
	  	    $this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/img/users/');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '50000';
			$config['file_name'] = $photo_name;
			
			$this->upload->initialize($config);
			 if($this->upload->do_upload('photo')){
	     	$data["image"]=$photo_name;
	    	}
	  	}
	  	    $this->db->where("id",$cid);
			$dt=	$this->db->update("employee_info",$data);
        if($dt){
        		redirect("clogin/customer_profile/$cid/success");
        			}else{
        		redirect("clogin/customer_profile/$cid/fail");   
        			}
			}

			function Diagnosis_of_disease(){
				
	    $data['pageTitle'] = 'Diagnosis_of_disease';
		$data['smallTitle'] = 'Diagnosis_of_disease';
		$data['mainPage'] = 'Diagnosis_of_disease';
		$data['subPage'] = 'Diagnosis_of_disease';
		$data['title'] = 'Diagnosis_of_disease';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'diagnosis_of_disease';
		$this->load->view("includes/mainContent", $data);
	    
	}
		public function addpatient()
	{   

	    $data['pageTitle'] = 'Patient Form';
		$data['smallTitle'] = 'Patient Form';
	    $data['mainPage'] = 'Patient Form';
		$data['subPage'] = 'Patient Form';
		$data['title'] = 'Patient Form';
	    $data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
	    $data['mainContent'] = 'addpatient';
	    $this->load->view("includes/mainContent", $data);
	}


function Oral_Cancer(){
	    $data['pageTitle'] = 'Oral Cancer ';
		$data['smallTitle'] = 'Oral Cancer ';
		$data['mainPage'] = 'Oral Cancer ';
		$data['subPage'] = 'Oral Cancer ';
		$data['title'] = 'Oral Cancer ';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'oral_cancer_proforma';
		$this->load->view("includes/mainContent", $data);
	    
	}

	function Breast_Cancer(){
	    $data['pageTitle'] = 'Breast Cancer ';
		$data['smallTitle'] = 'Breast Cancer ';
		$data['mainPage'] = 'Breast Cancer ';
		$data['subPage'] = 'Breast Cancer ';
		$data['title'] = 'Breast Cancer ';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'breast_cancer_proforma';
		$this->load->view("includes/mainContent", $data);
	    
	}
	function hypertension(){
	    $data['pageTitle'] = 'Hypertension_Proforma';
		$data['smallTitle'] = 'Hypertension_Proforma';
		$data['mainPage'] = 'Hypertension_Proforma';
		$data['subPage'] = 'Hypertension_Proforma';
		$data['title'] = 'Hypertension_Proforma';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'hypertension_proforma';
		$this->load->view("includes/mainContent", $data);
	    
	}
	function table(){
	    $data['pageTitle'] = 'Hypertension_Proforma';
		$data['smallTitle'] = 'Hypertension_Proforma';
		$data['mainPage'] = 'Hypertension_Proforma';
		$data['subPage'] = 'Hypertension_Proforma';
		$data['title'] = 'Hypertension_Proforma';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'table';
		$this->load->view("includes/mainContent", $data);
	    
	}
	function diabetes(){
	    $data['pageTitle'] = 'Diabetes_Proforma';
		$data['smallTitle'] = 'Diabetes_Proforma';
		$data['mainPage'] = 'Diabetes_Proforma';
		$data['subPage'] = 'Diabetes_Proforma';
		$data['title'] = 'Diabetes_Proforma';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'diabetes_proforma';
		$this->load->view("includes/mainContent", $data);
	    
	}
	function coronary(){
	    $data['pageTitle'] = 'Coronary_proforma';
		$data['smallTitle'] = 'Coronary_proforma';
		$data['mainPage'] = 'Coronary_proforma';
		$data['subPage'] = 'Coronary_proforma';
		$data['title'] = 'Coronary_proforma';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'coronary_proforma';
		$this->load->view("includes/mainContent", $data);
	    
	}
	function bpi(){
	    $data['pageTitle'] = 'Biochemicl_Parameters';
		$data['smallTitle'] = 'Biochemicl_Parameters';
		$data['mainPage'] = 'Biochemicl_Parameters';
		$data['subPage'] = 'Biochemicl_Parameters';
		$data['title'] = 'Biochemicl_Parameters';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'biochemical_parameters';
		$this->load->view("includes/mainContent", $data);
	    
	}


function observation(){
	    $data['pageTitle'] = 'Observation';
		$data['smallTitle'] = 'Observation';
		$data['mainPage'] = 'Observation';
		$data['subPage'] = 'Observation';
		$data['title'] = 'Observation';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'Observation';
		$this->load->view("includes/mainContent", $data);
	    
	}



	function oralcancer_proforma(){
	$data=array(
		"date"=>date("Y-m-d"),
	    "mother"=> $this->input->post("mother"),
	    "father"=> $this->input->post("father"),
	    "aunt"=> $this->input->post("aunt"),
	    "sister"=> $this->input->post("sister"),
	    "brother"=> $this->input->post("brother"),
	    "cousin"=> $this->input->post("cousin"),
	    "others"=> $this->input->post("other"),
	    "treatment_for_any"=> $this->input->post("treatment"),
	    "family_oral_cancer"=> $this->input->post("oraldetail"),
	    "mouth_disease"=> $this->input->post("mouthdisease"),
	    "history_medical_paper"=> $this->input->post("mouthdiseasedetail"),
	    "radiotherapy_report"=> $this->input->post("radiotherapy"),
	    "chemotherapy"=> $this->input->post("chemotherapy"),
	    "drugs_name"=> $this->input->post("drugs"),
	    "ct_scan"=> $this->input->post("ct_scan"),
	    "mother"=> $this->input->post("mother"),
	    "father"=> $this->input->post("father"),
	    "aunt"=> $this->input->post("aunt"),
	    "sister"=> $this->input->post("sister"),
	    "brother"=> $this->input->post("brother"),
	    "cousin"=> $this->input->post("cousin"),
	    "others"=> $this->input->post("other"),
	    "treatment_for_any"=> $this->input->post("treatment"),
	    "family_oral_cancer"=> $this->input->post("oraldetail"),
	    "mouth_disease"=> $this->input->post("mouthdisease"),
	    "history_medical_paper"=> $this->input->post("mouthdiseasedetail"),
	    "radiotherapy_report"=> $this->input->post("radiotherapy"),
	    "chemotherapy"=> $this->input->post("chemotherapy"),
	    "drugs_name"=> $this->input->post("drugs"),
	    "ct_scan"=> $this->input->post("ct_scan"),
	    "mri"=> $this->input->post("mri"),
	    "oral_squamous_cell_carcinoma"=> $this->input->post("squamous_cell"),
	    "buccal_mucosa"=> $this->input->post("buccal"),
	     "buccal_mucosa_vestibule"=> $this->input->post("sister"),
	    "buccal_mucosa_vestibule"=> $this->input->post("buccalvestibula"),
	    "alveolar_mucosa"=> $this->input->post("alveolar"),
	    "palate"=> $this->input->post("palate"),
	    "vestibule"=> $this->input->post("vestibule"),
	    "tounge"=> $this->input->post("tounge"),
	    "lip"=> $this->input->post("lip"),
	    "well_differentiated"=> $this->input->post("well_differentiated"),
	    "moderately_differentiated"=> $this->input->post("moderately"),
	    "poorly_differentiated"=> $this->input->post("poorly"),
	    "addition_details"=> $this->input->post("additionaldetails"),
	    "t1"=> $this->input->post("t1"),
	    "t2"=> $this->input->post("t2"),
	    "t3"=> $this->input->post("t3"),
	    "t4"=> $this->input->post("t4"),
	    "n1"=> $this->input->post("n1"),
	    "n2"=> $this->input->post("n2"),
	    "n2a"=> $this->input->post("n2a"),
	    "n2b"=> $this->input->post("n2b"),
	    "n2c"=> $this->input->post("n2c"),
	    "n3"=> $this->input->post("n3"),
	    "m0"=> $this->input->post("m0"),
	    "m1"=>$this->input->post("m1")
	);
			$this->load->model("Cmodel");
			$this->Cmodel->oral_cancer_proforma($data);	 
			redirect('customer/Oral_Cancer'); 
			//echo "submmitted";
				//print_r($data);
}

function breast_cancer_proforma(){
	$data=array(
		"date"=>date("Y-m-d"),
	    "many_children"=> $this->input->post("children"),
	    "your_ageat_first_child_birth"=> $this->input->post("age"),
	    "breast_feed_your_baby"=> $this->input->post("breastfeed"),
	    "duration_breast_feed_baby"=> $this->input->post("duration"),
	    "miscarriage"=> $this->input->post("miscarriage"),
	    "abortion"=> $this->input->post("abortion"),
	    "ectopic_pragnancy"=> $this->input->post("ectopic"),
	    "visited_doctor"=> $this->input->post("visited"),
	    "medication_treatment_breast_cancer"=> $this->input->post("disease"),
	    "drugs_name"=> $this->input->post("drugs"),
	    "diagnosed_breast_cancer"=> $this->input->post("familycancer"),
	    "diagnosed_ovarian_cancer"=> $this->input->post("ovariancancer"),
	    "mother"=> $this->input->post("mother"),
	    "father"=> $this->input->post("father"),
	    "aunt"=> $this->input->post("aunt"),
	    "sister"=> $this->input->post("sister"),
	    "cousin"=> $this->input->post("cousin"),
	    "other"=> $this->input->post("other"),
	    "breast_examination"=> $this->input->post("examination"),
	    "age_of_menarche"=> $this->input->post("ageofmenarche"),
	    "age_of_menopausal"=> $this->input->post("ageofmenopausal"),
	    "primary"=> $this->input->post("primary"),
	    "mammography"=> $this->input->post("mammography"),
	    "chest_xray"=> $this->input->post("chestreport"),
	    "usg"=> $this->input->post("usg"),
	    "bone_scan"=> $this->input->post("bonescan"),
	    "pet_scan"=> $this->input->post("petscan"),
	    "histopathology_ca_breast"=> $this->input->post("cabreast"),
	    "er_report_status"=> $this->input->post("erreport"),
	    "t1"=> $this->input->post("t1"),
	    "t2"=> $this->input->post("t2"),
	    "t3"=> $this->input->post("t3"),
	    "t4"=> $this->input->post("t4"),
	    "n1"=> $this->input->post("n1"),
	    "n2"=> $this->input->post("n2"),
	    "n2a"=> $this->input->post("n2a"),
	    "n2b"=> $this->input->post("n2b"),
	    "n2c"=> $this->input->post("n2c"),
	    "n3"=> $this->input->post("n3"),
	    "m0"=> $this->input->post("m0"),
	    "m1"=>$this->input->post("m1"),
	    "history_of_chemotherapy"=> $this->input->post("hormonal"),
	    "post_operative_specimen"=> $this->input->post("specimen")
	);
			$this->load->model("Cmodel");
			$this->Cmodel->breast_cancer_proforma($data);	 
			redirect('customer/Breast_Cancer'); 
				//echo "submmitted";
				//print_r($data);
}

function diabetes_proforma(){
	$data=array(
		"date"                      =>  date("Y-m-d"),
	    "known_about_diabetes"      =>  $this->input->post("knownaboutdiabetes"),
	    "family_history_diabetes"   =>  $this->input->post("familyhistory"),
	    "whoom"                     =>  $this->input->post("whoom"),
	    "blood_sugar_level"         =>  $this->input->post("blood_sugar"),
	    "why"                       =>  $this->input->post("bloodsugardetail"),
	    "one"                       =>  $this->input->post("one"),
	    "two"                       =>  $this->input->post("two"),
	    "three"                     =>  $this->input->post("three"),
	    "more"                      =>  $this->input->post("more"),
	    "when_you_test"             =>  $this->input->post("whentest"),
	    "low_blood_pressure"        =>  $this->input->post("lbp"),
	    "regular"                   =>  $this->input->post("regular"),
	    "mixtard_insulin"           =>  $this->input->post("mixtard_insulin"),
	    "oral_hypoglycemic_agents"  =>  $this->input->post("oral_hypoglycemic_agents"),
	    "morning"                   =>  $this->input->post("morning"),
	    "midday"                    =>  $this->input->post("midday"),
	    "afternoon"                 =>  $this->input->post("afternoon"),
	    "evening"                   =>  $this->input->post("evening"),
	    "night"                     =>  $this->input->post("night"),
	    "treat_low_blood_pressure"  =>  $this->input->post("treatlowbloodsugar"),
	    "ever_lost_sensetolow_blood_pressure"   => $this->input->post("lostsense"),
	    "when_itlast_occur"         =>  $this->input->post("bloodsugar"),
	    "hba1c_blood_sugar_level"   =>  $this->input->post("hbalc"),
	    "last_level"                =>  $this->input->post("last_level"),
	    "daily"                     =>  $this->input->post("daily"),
	    "weekly"                    =>  $this->input->post("weekly"),
	    "monthly"                   =>  $this->input->post("monthly"),
	    "other"                     =>  $this->input->post("other"),
	    "bpmorning"                 =>  $this->input->post("morning"),
	    "bpmidday"                  =>  $this->input->post("bpmidday"),
	    "bpafternoon"               =>  $this->input->post("bpafternoon"),
	    "bpevening"                 =>  $this->input->post("bpevening"),
	    "at_night"                  =>  $this->input->post("at_night"),
	    "treat_blood_sugar"         =>  $this->input->post("treatsugar"),
	    "addition_information"      =>  $this->input->post("addition_information"),
	    "high_bp"                   =>  $this->input->post("hbpressure"),
	    "medicine"                  =>  $this->input->post("hbpressuredtl"),
	    "heart_disease"             =>  $this->input->post("hrtdisease"),
	    "hd_medicine"               =>  $this->input->post("hrtdiseasedetail"),
	    "high_cholestrol"           =>  $this->input->post("hghcholestrol"),
	    "hc_medicine"               =>  $this->input->post("hghcholestroldetail"),
	    "high_triglycerides"        =>  $this->input->post("hghtrigly"),
	    "htri_medicine"             =>  $this->input->post("hghtriglydetail"),
	    "cataract"                  =>  $this->input->post("glaucoma"),
	    "ct_medicine"               =>  $this->input->post("glaucomadetail"),
	    "stroke"                    =>  $this->input->post("stroke"),
	    "stroke_medicine"           =>  $this->input->post("strokedetail"),
	    "retinotherapy"             =>  $this->input->post("retinopathy"),
	    "retina_medicine"           =>  $this->input->post("retinopathydetail"),
	    "kidney_problem"            =>  $this->input->post("kidneyproblem"),
	    "kid_medicine"              =>  $this->input->post("kidneyprobdetail"),
	    "neuropathy"                =>  $this->input->post("neuropathy"),
	    "neuropathy_medicine"       =>  $this->input->post("neuropathydetail"),
	    "addition_information"      =>  $this->input->post("addition_information"),
	    "teeth_gum"                 =>  $this->input->post("teethndgum"),
	    "teeth_medicine"            =>  $this->input->post("teethndgumdetail"),
	    "osteoporosis"              =>  $this->input->post("osteoporosis"),
	    "osteoporosis_medicine"     =>  $this->input->post("osteoporosisdetail"),
	    "sexual_dysfunction"        =>  $this->input->post("dysfunction"),
	    "sexual_medicine"           =>  $this->input->post("sexual_medicine"),
	    "organ_transplant"          =>  $this->input->post("organ_transplant"),
	    "Organ_transplant_medicine" =>  $this->input->post("Organ_transplant_medicine"),
	    "thyroid_dysfunction"       =>  $this->input->post("thyroiddys"),
	    "thyroid_dysfunction_medicine"  => $this->input->post("thyroiddysdetail"),
	    "polycystic_ovarian_disease"    => $this->input->post("polycystic"),
	    "polycystic_ovarian_disease_medicine"=> $this->input->post("polycysticdetail"),
    	"complication_of_diabetes"      => $this->input->post("complication"),
	    "others"                    => $this->input->post("others"),
	    "other_medicine"            => $this->input->post("otherdetail"),
	    "taking_any_medicine"       => $this->input->post("compldiabetesdetail"),
	    "seewell_with_lense"        => $this->input->post("lense"),
	    "take_pills_for_diabetes"   => $this->input->post("take_pills"),
	    "type_of_pills"             => $this->input->post("type_of_pill"),
	    "time_of_day"               => $this->input->post("time_of_day"),
	    "duration_of_use"           => $this->input->post("duration_of_use"),
	    "take_insulin"              => $this->input->post("take_insulin"),
	    "regular_insulin"           => $this->input->post("regular_insulin"),
	    "take_mixtard_insulin"      => $this->input->post("take_mixtard_insulin"),
	    "see_doctor_monthly"        => $this->input->post("monthly"),
	    "every_3month"              => $this->input->post("every_3month"),
	    "every_6month"              => $this->input->post("every_6month"),
	    "not_visited"               => $this->input->post("not_visited"),
	    "last_eye_checkup"          => $this->input->post("last_eye_checkup"),
	    "angry"                     => $this->input->post("angry"),
	    "afraid"                    => $this->input->post("afraid"),
	    "confused"                  => $this->input->post("confused"),
	    "sad"                       => $this->input->post("sad"),
	    "upset"                     => $this->input->post("upset"),
	    "eat_better_other"          => $this->input->post("eat_better_other"),
	    "much_stresss"              => $this->input->post("much_stresss"),
	    "stress_example"            => $this->input->post("stress_example"),
	    "handle_stress"             => $this->input->post("handle_stress"),
	    "depressed"                 => $this->input->post("depressed"),
	    "depressed_example"         => $this->input->post("depressed_example"),
	    "diabetes_diet_plan"        => $this->input->post("dietplan"),
	    "special_meal"              => $this->input->post("specialmeal"),
	    "low_crbohydrate"           => $this->input->post("low_crbohydrate"),
	    "low_cholestrol"            => $this->input->post("low_cholestrol"),
	    "other_meal"                => $this->input->post("other_meal"),
	    "change_weight"             => $this->input->post("change_weight"),
	    "gain"                      => $this->input->post("gain"),
	    "gain_weight_in_kg"         => $this->input->post("gain_weight_in_kg"),
	    "depressed_example"         => $this->input->post("depressed_example"),
	    "loss"=> $this->input->post("loss"),
	    "loss_weight_in_kg"=> $this->input->post("loss_weight_in_kg"),
	    "height"=> $this->input->post("height"),
	    "age"=> $this->input->post("age"),
	    "current_weight"=> $this->input->post("current_weight"),
	    "happy_with_your_current_weight"=> $this->input->post("happyyrweight"),
	    "loosing_weight"=> $this->input->post("loosingweight"),
	    "food_alergies"=> $this->input->post("foodalergies"),
	    "food_name"=> $this->input->post("food_name"),
	    "bevarage_intolerance"=> $this->input->post("bevarage_intolerance"),
	    "bev_foods_name"=> $this->input->post("intolerancefood"),
	    "your_appetite"=> $this->input->post("your_appetite"),
	    "digestion_problem"=> $this->input->post("digestionprblm"),
	    "chewing"=> $this->input->post("chewing"),
	    "swallowing"=> $this->input->post("swallowing"),
	    "stomachache"=> $this->input->post("stomachache"),
	    "diarrhea"=> $this->input->post("diarrhea"),
	    "constipation"=> $this->input->post("constipation"),
	    "taking_vitamin"=> $this->input->post("taking_vitamin"),
	    "niacin"=> $this->input->post("niacin"),
	    "salt_subtitute"=> $this->input->post("salt_subtitute"),
	    "vitamin_d"=> $this->input->post("vitamin_d"),
	    "calcium"=> $this->input->post("calcium"),
	    "chromium"=> $this->input->post("chromium"),
	    "selenium"=> $this->input->post("selenium"),
	    "iron"=> $this->input->post("iron"),
	    "folic_acid"=> $this->input->post("folicacid"),
	    "vitamin_e"=> $this->input->post("vitamin_e"),
	    "vitamin_b6"=> $this->input->post("vitaminb6"),
	    "vitamin_b12"=> $this->input->post("vitaminb12")
    );
			$this->load->model("Cmodel");
			$this->Cmodel->diabetes_proforma($data);	 
			redirect('customer/diabetes'); 
			echo "submmitted";
				//print_r($data);
}


function hypertenstion_proforma(){
	$data=array(
		"date"=>date("Y-m-d"),
	    "headache"=> $this->input->post("headache"),
	    "anxity"=> $this->input->post("anxity"),
	    "restlessness"=> $this->input->post("restlessness"),
	    "sweatign_sudden_onset"=> $this->input->post("sweatign_sudden_onset"),
	    "notice_your_heartbeat"=> $this->input->post("notice_your_heartbeat"),
	    "nasal_bleeding"=> $this->input->post("nasal_bleeding"),
	    "monthly"=> $this->input->post("monthly"),
	    "every_3month"=> $this->input->post("every_3month"),
	    "every_6month"=> $this->input->post("every_6month"),
	    "once_a_year"=> $this->input->post("once_a_year"),
	    "high_blood_pressure"=> $this->input->post("high_blood_pressure"),
	    "hbp_detail"=> $this->input->post("hbp_detail"),
	    "blood_pressure_reading"=> $this->input->post("blood_pressure_reading"),
	    "blood_pressure_high_loss"=> $this->input->post("blood_pressure_high_loss"),
	    "high_low_bp_reading"=> $this->input->post("high_low_bp_reading"),
	    "check_blood_pressure"=> $this->input->post("check_blood_pressure"),
	    "fill_reading"=> $this->input->post("fill_reading"),
	    "checking_tdate"=> $this->input->post("checking_tdate"),
	    "blurry_vision"=> $this->input->post("blurry_vision"),
	    "chest_pain"=> $this->input->post("chest_pain"),
	    "dizziness"=> $this->input->post("dizziness"),
	    "symptoms_headache"=> $this->input->post("symptoms_headache"),
	    "none"=> $this->input->post("none"),
	    "other"=> $this->input->post("other"),
	    "affect_performance_ability"=> $this->input->post("affect_performance_ability"),
	    "how_affect"=> $this->input->post("how_affect"),
	    "physical_activity"=> $this->input->post("physical_activity"),
	    "physical_activity_detail"=> $this->input->post("physical_activity_detail"),
	    "diabetes"=> $this->input->post("diabetes"),
	    "diabetes_detail"=> $this->input->post("diabetes_detail"),
	    "heartattack"=> $this->input->post("heartattack"),
	    "heartattack_detail"=> $this->input->post("heartattack_detail"),
	    "heart_failure"=> $this->input->post("heart_failure"),
	    "heart_failure_detail"=> $this->input->post("heart_failure_detail"),
	    "enlarged_heart"=> $this->input->post("enlarged_heart"),
	    "angina"=> $this->input->post("chest_pain"),
	    "chest_pain_detail"=>$this->input->post("chest_pain_detail"),
	    "coronary_bypass"=> $this->input->post("coronary_bypass"),
	    "coronary_bypass_detail"=> $this->input->post("coronary_bypass_detail"),
	    "stroke"=> $this->input->post("stroke"),
	    "stroke_detail"=> $this->input->post("stroke_detail"),
	    "high_cholestrol"=> $this->input->post("high_cholestrol"),
	    "high_cholestrol_detail"=> $this->input->post("high_cholestrol_detail"),
	    "kidney_dysfunction"=> $this->input->post("kidney_dysfunction"),
	    "kidney_dysfunction_detail"=> $this->input->post("kidney_dysfunction_detail"),
	    "kidney_dialysis"=> $this->input->post("kidney_dialysis"),
	    "kidney_dialysis_detail"=> $this->input->post("kidney_dialysis_detail"),
	    "norrowing_of_arteries"=> $this->input->post("norrowing_of_arteries"),
	    "norrowing_of_arteries_detail"=> $this->input->post("norrowing_of_arteries_detail"),
	    "speach_difficulty"=> $this->input->post("speach_difficulty"),
	    "speach_difficulty_detail"=> $this->input->post("speach_difficulty_detail"),
	    "weakness_one_side"=> $this->input->post("weakness_one_side"),
	    "slurred_speech"=> $this->input->post("slurred_speech"),
	    "slurred_speech_detail"=> $this->input->post("slurred_speech_detail"),
	    "loss_of_balance"=> $this->input->post("loss_of_balance"),
	    "loss_of_balance_detail"=>$this->input->post("loss_of_balance_detail"),
	    "fainting_losing"=> $this->input->post("fainting_losing"),
	    "fainting_losing_detail"=> $this->input->post("fainting_losing_detail"),
	    "dizziness2"=> $this->input->post("dizziness2"),
	    "feeling_depressed"=> $this->input->post("feeling_depressed"),
	    "feeling_tried"=> $this->input->post("feeling_tried"),
	    "shortness_of_breath"=> $this->input->post("shortness_of_breath"),
	    "cough"=> $this->input->post("cough"),
	    "decreased_interest_insex"=> $this->input->post("decreased_interest_insex"),
	    "headache3"=> $this->input->post("headache3"),
	    "tinglings_of_hand"=> $this->input->post("tinglings_of_hand"),
	    "leg_cramps"=> $this->input->post("leg_cramps"),
	    "swelling"=> $this->input->post("swelling"),
	    "thumping_racing_heart"=> $this->input->post("thumping_racing_heart"),
	    "feeling_week_standup"=> $this->input->post("feeling_week_standup"),
	    "diificulty_in_sleeping"=> $this->input->post("diificulty_in_sleeping"),
	    "unable_toget_erection"=> $this->input->post("unable_toget_erection"),
	    "cold_hand_feet"=> $this->input->post("cold_hand_feet"),
	    "diificulty_in_breathing"=> $this->input->post("diificulty_in_breathing"),
	    "reduce_salt"=> $this->input->post("reduce_salt"),
	    "walk_exercise"=> $this->input->post("walk_exercise"),
	    "serving_of_vegetable"=> $this->input->post("serving_of_vegetable"),
	    "maintain_normal_weight"=> $this->input->post("maintain_normal_weight"),
	    "alcohol_in_moderation"=> $this->input->post("alcohol_in_moderation"),
	    "blood_pressure_medication"=> $this->input->post("blood_pressure_medication"),
	    "7day_pillbox"=> $this->input->post("7day_pillbox"),
	    "carry_pills_withme"=> $this->input->post("carry_pills_withme"),
	    "take_pills_same_time"=> $this->input->post("take_pills_same_time"),
	    "keep_pills_see_them"=> $this->input->post("keep_pills_see_them"),
	    "use_watch_with_alarms"=> $this->input->post("use_watch_with_alarms"),
	    "other_specify"=> $this->input->post("other_specify"),
	    "blood_pressure_monotor"=> $this->input->post("blood_pressure_monotor"),
	    "keep_track_bp_reading"=> $this->input->post("keep_track_bp_reading"),
	    "check_food_lebel"=> $this->input->post("check_food_lebel"),
	    "step_counter"=> $this->input->post("step_counter"),
	    "fruit_serving"=> $this->input->post("fruit_serving"),
	    "vegetable_serving"=> $this->input->post("vegetable_serving"),
	    "timing_of_drink_alcohol"=> $this->input->post("timing_of_drink_alcohol"),
	    "eat_salty_snakes"=> $this->input->post("eat_salty_snakes"),
	    "eat_fast_food"=> $this->input->post("eat_fast_food"),
	    "eat_chicken_soup"=> $this->input->post("eat_chicken_soup")
	 
);
			$this->load->model("Cmodel");
			$this->Cmodel->hypertension_proforma($data);	 
			redirect('customer/hypertension'); 
			
}

function coronary_proforma(){
	$data=array(
		"date"=>date("Y-m-d"),
	    "bp_too_low"=> $this->input->post("bp_too_low"),
	    "bp_low_detail"=> $this->input->post("bp_low_detail"),
	    "pain_your_chest"=> $this->input->post("pain_your_chest"),
	    "pain_your_chest_detail"=> $this->input->post("pain_your_chest_detail"),
	    "own_heart_beat"=> $this->input->post("own_heart_beat"),
	    "extra_heartbeat"=> $this->input->post("extra_heartbeat"),
	    "ankles_badly_swollen"=> $this->input->post("ankles_badly_swollen"),
	    "coronary_heart_disease"=> $this->input->post("coronary_heart_disease"),
	    "cold_hand_feet_trouble"=> $this->input->post("cold_hand_feet_trouble"),
	    "excretion_at_rest"=> $this->input->post("excretion_at_rest"),
	    "get_out_of_breath"=> $this->input->post("get_out_of_breath"),
	    "cholestrol_level_high"=> $this->input->post("cholestrol_level_high"),
	    "morning_cough"=> $this->input->post("morning_cough"),
	    "coughing_up_blood"=> $this->input->post("coughing_up_blood"),
	    "increased_anxiety"=> $this->input->post("increased_anxiety"),
	    "recurrent_fatigue"=> $this->input->post("recurrent_fatigue"),
	    "migraine"=> $this->input->post("migraine"),
	    "painful_knees"=> $this->input->post("painful_knees"),
	    "walking_short_distances"=> $this->input->post("walking_short_distances"),
	    "exposure_to_loud_noises"=> $this->input->post("exposure_to_loud_noises"),
	    "pneumonia_accompanied"=> $this->input->post("pneumonia_accompanied"),
	    "weight_loss"=> $this->input->post("weight_loss"),
	    "dehydration_rapid_heartbeat"=> $this->input->post("dehydration_rapid_heartbeat"),
	    "vein_thrombosis"=> $this->input->post("vein_thrombosis"),
	    "causes_of_dm"=> $this->input->post("causes_of_dm"),
	    "detached_retina"=> $this->input->post("detached_retina"),
	    "cause_of_hypertension"=> $this->input->post("cause_of_hypertension"),
	    "lens_transplant"=> $this->input->post("lens_transplant"),
	    "period_problems"=> $this->input->post("period_problems"),
	    "childbirth_related_problem"=> $this->input->post("childbirth_related_problem"),
	    "urine_loss"=> $this->input->post("urine_loss"),
	    "pap_smear"=> $this->input->post("pap_smear"),
	    "hormone_replacement_therapy"=> $this->input->post("hormone_replacement_therapy"),
	    "heart_failure_detail"=> $this->input->post("heart_failure_detail"),
	    "enlarged_heart"=> $this->input->post("enlarged_heart"),
	    "angina"=> $this->input->post("chest_pain"),
	    "chest_pain_detail"=>$this->input->post("chest_pain_detail"),
	    "coronary_bypass"=> $this->input->post("coronary_bypass"),
	    "prescription_taken"=> $this->input->post("prescription_taken"),
	    "self_prescribed_medication"=> $this->input->post("self_prescribed_medication"),
	    "date_of_physical_examination"=> $this->input->post("date_of_physical_examination"),
	    "physical_examination_result"=> $this->input->post("physical_examination_result"),
	    "date_of_chest_xray"=> $this->input->post("date_of_chest_xray"),
	    "chest_xray_result"=> $this->input->post("chest_xray_result"),
	    "date_of_electrocardiogram"=> $this->input->post("date_of_electrocardiogram"),
	    "electrocardiogram_result"=> $this->input->post("electrocardiogram_result"),
	    "date_of_dental_checkup"=> $this->input->post("date_of_dental_checkup"),
	    "dental_checkup_result"=> $this->input->post("dental_checkup_result"),
	    "diagnostic_test"=> $this->input->post("diagnostic_test"),
	    "hospitalization"=> $this->input->post("hospitalization"),
	    "drug_allergies"=> $this->input->post("drug_allergies"),
	    "arine_in_place_of_butter"=> $this->input->post("arine_in_place_of_butter"),
	    "extra_sugar_usage"=> $this->input->post("extra_sugar_usage"),
	    "add_salt_food"=> $this->input->post("add_salt_food"),
	    "compared_to_weekdays"=> $this->input->post("compared_to_weekdays"),
	    "how_many_time_ago"=>$this->input->post("how_many_time_ago"),
	    "rheumatic_fever"=> $this->input->post("rheumatic_fever"),
	    "disease_of_artries"=> $this->input->post("disease_of_artries"),
	    "varicose_venis"=> $this->input->post("varicose_venis"),
	    "arthritisof_legs"=> $this->input->post("arthritisof_legs"),
	    "abnormal_blood_sugar_test"=> $this->input->post("abnormal_blood_sugar_test"),
	    "phlebitis"=> $this->input->post("phlebitis"),
	    "fainting_spells"=> $this->input->post("fainting_spells"),
	    "epilepsy"=> $this->input->post("epilepsy"),
	    "stroke2"=> $this->input->post("stroke2"),
	    "tinglings_of_hand"=> $this->input->post("tinglings_of_hand"),
	    "diptheria"=> $this->input->post("diptheria"),
	    "scarlet_fever"=> $this->input->post("scarlet_fever"),
	    "infectious_mononucleosis"=> $this->input->post("infectious_mononucleosis"),
	    "emotional_problem"=> $this->input->post("emotional_problem"),
	    "anemia"=> $this->input->post("anemia"),
	    "thyroid_dysfunction"=> $this->input->post("thyroid_dysfunction"),
	    "pneumonia"=> $this->input->post("pneumonia"),
	    "lung_disease"=> $this->input->post("lung_disease"),
	    "injuries_to_back"=> $this->input->post("injuries_to_back"),
	    "cardiac_infarction"=> $this->input->post("cardiac_infarction"),
	    "how_treatment"=> $this->input->post("how_treatment"),
	    "ecg_ischaemic"=> $this->input->post("ecg_ischaemic"),
	    "ecg_ischaemic_detail"=> $this->input->post("ecg_ischaemic_detail"),
	    "pf_arrhythmia"=> $this->input->post("pf_arrhythmia"),
	    "pf_arrhythmia_detail"=> $this->input->post("pf_arrhythmia_detail"),
	    "blood_pressure_high_at_age"=> $this->input->post("blood_pressure_high_at_age"),
	    "bphigh_at_age_detail"=> $this->input->post("bphigh_at_age_detail"),
	    "beta_blocker"=> $this->input->post("beta_blocker"),
	    "beta_blocker_detail"=> $this->input->post("beta_blocker_detail"),
	    "pacemaker_fitted"=> $this->input->post("pacemaker_fitted"),
	    "pacemaker_fitted_detail"=> $this->input->post("pacemaker_fitted_detail"),
	    "intermittent_claudication"=> $this->input->post("intermittent_claudication"),
	    "intermittent_claudication_detail"=> $this->input->post("intermittent_claudication_detail"),
	    "heart_surgery"=> $this->input->post("heart_surgery"),
	    "heart_surgery_detail"=> $this->input->post("heart_surgery_detail"),
	    "insulin_injection"=> $this->input->post("insulin_injection"),
	    "insulin_injection_detail"=> $this->input->post("insulin_injection_detail"),
	    "the_diabetes_stable"=> $this->input->post("the_diabetes_stable"),
	    "diabetes_stable_detail"=> $this->input->post("diabetes_stable_detail"),
	    "hypo_glycaemic_episode"=> $this->input->post("hypo_glycaemic_episode"),
	    "hypo_glycaemic_detail"=> $this->input->post("hypo_glycaemic_detail"),
	    "suffered_any_attack"=> $this->input->post("suffered_any_attack"),
	    "suffered_any_attack_detail"=> $this->input->post("suffered_any_attack_detail"),
	    "progressive_disorder"=> $this->input->post("progressive_disorder"),
	    "progressive_disorder_detail"=> $this->input->post("progressive_disorder_detail"),
	    "cerebrovascular_accident"=> $this->input->post("cerebrovascular_accident"),
	    "cerebrovascular_accident_detail"=> $this->input->post("cerebrovascular_accident_detail"),
	    "preventing_communication"=> $this->input->post("preventing_communication"),
	    "preventing_communication_detail"=> $this->input->post("preventing_communication_detail"),
	    "hearing_defect"=> $this->input->post("hearing_defect"),
	    "hearing_defect_detail"=> $this->input->post("hearing_defect_detail"),
	    "history_of_psychosis"=> $this->input->post("history_of_psychosis"),
	    "history_of_psychosis_detail"=> $this->input->post("history_of_psychosis_detail"),
	    "abuse_alcohol"=> $this->input->post("abuse_alcohol"),
	    "abuse_alcohol_detail"=> $this->input->post("abuse_alcohol_detail"),
	    "mental_disorder"=> $this->input->post("mental_disorder"),
	    "mental_disorder_detail"=> $this->input->post("mental_disorder_detail"),
	    "cataract_removed"=> $this->input->post("cataract_removed"),
	    "snelling"=> $this->input->post("snelling"),
	    "snelling_detail"=> $this->input->post("snelling_detail"),
	    "weaker_eye"=> $this->input->post("weaker_eye"),
	    "weaker_eye_detail"=> $this->input->post("weaker_eye_detail"),
	    "6/36_respectively"=> $this->input->post("6/36_respectively"),
	    "6/36_respectively_detail"=> $this->input->post("6/36_respectively_detail"),
	    "monocular_vision"=> $this->input->post("monocular_vision"),
	    "monocular_vision_detail"=> $this->input->post("monocular_vision_detail"),
	    "pathological_field_defect"=> $this->input->post("pathological_field_defect"),
	    "pathological_detail"=> $this->input->post("pathological_detail"),
	    "physical_disability"=> $this->input->post("physical_disability"),
	    "physical_disability_detail"=> $this->input->post("physical_disability_detail")
    );
			$this->load->model("Cmodel");
			$this->Cmodel->coronary_proforma($data);	 
			redirect('customer/coronary_proforma'); 
    }

function matchempid(){
		$username=$this->input->post("username");
		$this->db->where("id",$username);
		$res=$this->db->get("employee_info")->row();
		if($res){
			redirect(base_url()."index.php/customer/observation/sucess/".$username);
		}
		else{
			redirect(base_url()."index.php/customer/observation/false/");
		}
	}
}