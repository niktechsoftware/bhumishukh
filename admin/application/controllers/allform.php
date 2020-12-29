<?php
class AllForm extends CI_Controller{
	public function editProfile(){
	   
	    $this->load->model("general_settings");
		$data['info'] = $this->general_settings->getInfoById($this->input->post("id"));
		$data['subPage'] = 'Profile';
		$data['smallTitle'] = 'Edit Profile';
		$data['bigTitle'] = 'Edit Your Profile - '.$data['info']->username;
		$data['title'] = 'The Life Style | Edit Profile';
		$data['headerCss'] = "admin/headerCss/studentRegisterCss";
		$data['footerJs'] = "admin/footerJs/studentRegisterJs";
		$data['body'] = 'edit_profile';
		
		$this->load->view("include/admin/mainContent", $data);
	}
	

	
	
	
//-------------------------------------------------------------------- Update Profile ----------------------------------------
	public function updateProfile(){
	    $this->load->model("general_settings");
		$data = $this->general_settings->updateInfo();
		if($data['isTrue']){
			redirect(base_url()."apanel/profile/".$data['id']."");
		}else{
			redirect(base_url()."apanel/profile/");
		}
	}
//----------------------------------------------------------- Add new Branch informaton ------------------------

	function addNewProfile(){
	    $this->load->model("general_settings");
	    $username = $this->general_settings->saveInfo();
		if($username){
		    $mobileno= $this->input->post("mobile_number");
		    $password =$this->input->post("pass");
		    $sms="Dear branch your registration is done successfully Your userusername ".$username." and loginpassword is ".$password." thanks for being our part.The Life Styles";
		    mysms($sms,$mobileno);
		    $branchname =$this->input->post("clinic_name");
		    $email1 =$this->input->post("email1");
		    $email2 =$this->input->post("email2");
		    $email = $email1.",".$email2;
		     $subject = "Registration In Success";
	            $ccregisterEmail="singhkullu12@gmail.com";
	          
	             $this->sendMail($email,$subject,$ccregisterEmail,$sms);
		    
		    
			redirect(base_url()."apanel/inactivebranchList/");
		}else{
			redirect(base_url()."apanel/addprofile/False");
		}
	}
	
	function sendMail($email1,$schoolname,$ccregisterEmail,$message){
	        $this->load->library('email');
			$this->email->from('info@thelifestylesapp.com', $schoolname);
			$this->email->to($email1);
			$this->email->cc($ccregisterEmail);
			$this->email->subject('Branch Registration Done Successfully');
			$this->email->message($message);
			$this->email->send();
        }
//----------------------------------------------------------- Add new Branch informaton ------------------------	
	public function saveRegister(){
		$data = $this->student_info->saveInfo();
		if($data['isTrue']){
			redirect(base_url()."apanel/printRegister/".$data['id']."/lkfjsaodif0w9809sodiuf4rifsd9f80w934oiwoifu");
		}
	}
	
	public function editpmgdisha(){
		$data['subPage'] = 'Profile';
		$data['smallTitle'] = 'Edit Profile';
		$data['pageTitle'] = 'Edit Your Profile';
		$data['title'] = 'Pain Clinic | Edit Profile';
		$data['headerCss'] = 'headerCss/messageCss';
		$data['footerJs'] = 'footerJs/profileJs';
		$data['mainContent'] = 'editpmgdisha';
		
		$this->load->view("include/template", $data);
	}
	
	
	public function saveEditPmgdisha(){
		
			$sino = $this->input->post("sino");
			$val = array(
					"mobile1" => $this->input->post("mobile1"),
					"mobile2" => $this->input->post("mobile2"),
					
			);
				
			$this->db->where("sino",$sino);
			if($this->db->update("pmgdish",$val)){
				redirect(base_url()."apanel/pmgdishaList/");
			}else{
				redirect(base_url()."apanel/pmgdishaList/");
			}
		
		
	}
	public function savepmgdisha(){
	    if($this->session->userdata("clinic_id")){
		$string = time().trim($_FILES['cphoto']['name']);
		$photo_name = str_replace(' ', '', $string);
		$data=array(
				'name'=>$this->input->post("title"),
				'sino'=>$this->input->post("sino"),
				'aadhar_number'=>$this->input->post("aadhar_number"),
				'name'=>$this->input->post("name"),
				'fname'=>$this->input->post("fname"),
				'mother_name'=>$this->input->post("mother_name"),
				'gaurdian_name'=>$this->input->post("gaurdian_name"),
				'mobile1'=>$this->input->post("mobile1"),
				'mobile2'=>$this->input->post("mobile2"),
				'year'=>$this->input->post("year"),
				'student_image'=>$photo_name,
				'status'=>"pending",
				'branch_id'=>$this->session->userdata("clinic_id")
				
				
		);
		$query = $this->db->insert("pmgdish",$data);
		if($query){
			$this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/images/pmgdisha/');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'png|jpg|jpeg|gif';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
		}
		if (!empty($_FILES['cphoto']['name'])) {
			$this->upload->initialize($config);
			$this->upload->do_upload('cphoto');
			redirect(base_url()."apanel/pmgdishForm");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
		
	}else{
	   echo  "Please Retry";
	}
	
	}	
	
	public function uploadCoursePdf(){
		
		$string = time().trim($_FILES['cphoto']['name']);
		$photo_name = str_replace(' ', '', $string);
		 $data=array(
				'coursedesc'=>$this->input->post("coursedesc"),
                                 'date' => date("Y-m-d"),

				
				'coursepdf'=>$photo_name,
				
				
		);
		$query = $this->db->insert("coursepdf",$data);
		if($query){
			$this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/course/');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'pdf|csv|doc';
			$config['max_size'] = '2048';
			$config['file_name'] = $photo_name;
		}
		if (!empty($_FILES['cphoto']['name'])) {
			$this->upload->initialize($config);
			$this->upload->do_upload('cphoto');
			redirect(base_url()."apanel/freeDemo");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	
	public function deleteuploadCoursePdf(){
		$this->db->where("id",$this->uri->segment(3));
		
		$old_img = $this->uri->segment(4);
		
		if($this->db->delete("coursepdf")){
		@chmod("assets/course/" . $old_img, 0777);
		@unlink("assets/course/" . $old_img);
			redirect("apanel/freeDemo");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	
	
	public function uploadStudyMeteriaPdf(){
		
		$string = time().trim($_FILES['cphoto']['name']);
		$photo_name = str_replace(' ', '', $string);
		 $data=array(
				'coursedesc'=>$this->input->post("coursedesc"),
                                 'date' => date("Y-m-d"),

				
				'coursepdf'=>$photo_name,
				
				
		);
		$query = $this->db->insert("studymeterialpdf",$data);
		if($query){
			$this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/studymeterial/');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'pdf|csv|doc';
			$config['max_size'] = '2048';
			$config['file_name'] = $photo_name;
		}
		if (!empty($_FILES['cphoto']['name'])) {
			$this->upload->initialize($config);
			$this->upload->do_upload('cphoto');
			redirect(base_url()."apanel/studymeterial");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	
	public function deleteuploadStudyMeteriaPdf(){
		$this->db->where("id",$this->uri->segment(3));
		
		$old_img = $this->uri->segment(4);
		
		if($this->db->delete("studymeterialpdf")){
		@chmod("assets/studymeterial/" . $old_img, 0777);
		@unlink("assets/studymeterial/" . $old_img);
			redirect("apanel/studymeterial");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	
	public function popup(){
		
		$string = time().trim($_FILES['cphoto']['name']);
		$photo_name = str_replace(' ', '', $string);
		 $data=array(
				
                                 'date' => date("Y-m-d"),

				
				'popup'=>$photo_name,
				
				
		);
		$query = $this->db->insert("popup",$data);
		if($query){
			$this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|png|jpe|jpeg|gif'; 
			$config['max_size'] = '2048';
			$config['file_name'] = $photo_name;
		}
		if (!empty($_FILES['cphoto']['name'])) {
			$this->upload->initialize($config);
			$this->upload->do_upload('cphoto');
			redirect(base_url()."apanel/popup");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	
	public function deletepopup(){
		$this->db->where("id",$this->uri->segment(3));
		
		$old_img = $this->uri->segment(4);
		
		if($this->db->delete("popup")){
		@chmod("assets/" . $old_img, 0777);
		@unlink("assets/" . $old_img);
			redirect("apanel/popup");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	public function deletepmgdishaStudent(){
		$this->db->where("sino",$this->uri->segment(3));
		
		$old_img = $this->uri->segment(4);
		
		if($this->db->delete("pmgdish")){
		@chmod("assets/images/pmgdisha/" . $old_img, 0777);
		@unlink("assets/images/pmgdisha/" . $old_img);
			redirect("apanel/pmgdishalist");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	
	public function editSaveRegisterp(){
		$student_id = $this->input->post('student_id');
		$photo_name = time().trim($_FILES['cphoto']['name']);
		$signature =time().trim($_FILES['signature']['name']);
		$new_img = array(
			
						"photo"=> $photo_name,
						"signature"=>$signature
				);
		$this->load->model("student_info");
		if($query = $this->student_info->updateStudentInfo($new_img,$student_id)){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/stuImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '2024';
			$config['file_name'] = $photo_name;
			
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['cphoto']['name'])) {
				$this->upload->initialize($config);
				$this->upload->do_upload('cphoto'); 
			}
		}
		$this->load->library('upload');
		$image_path = realpath(APPPATH . '../assets/images/stuImage');
		$config['upload_path'] = $image_path;
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '2024';
		$config['file_name'] = $signature;
		
		if (!empty($_FILES['signature']['name'])) {
			$this->upload->initialize($config);
			
			if ($this->upload->do_upload('signature'))  {
				
				
			}
		}
		redirect("apanel/studentEdit/$student_id");
	}
	public function editSaveRegister(){
		$student_id = $this->input->post('student_id');
		$photo_name = time().trim($_FILES['cphoto']['name']);
		$signature =time().trim($_FILES['signature']['name']);
		$new_img = array(
				"name" => $this->input->post("name"),
				"fName" => $this->input->post("fname"),
				"address" => $this->input->post("address"),
				"city" => $this->input->post("city"),
				"state" => $this->input->post("state"),
				"pin" => $this->input->post("pin"),
				"mobile" => $this->input->post("mobile"),
				"mother_name"=>$this->input->post("mother_name"),
				"aadhar_number"=>$this->input->post("aadhar_number"),
				"dob" => date("Y-m-d", strtotime($this->input->post("dob"))),
				"heighQ" => $this->input->post("heighQ"),
				"courseApplied" => $this->input->post("courseApplied"),
				"timing" => $this->input->post("timing"),
				"gender" => $this->input->post("gender"),
				"total_fee" => $this->input->post("total_fee"),
				"num_of_install" => $this->input->post("numofinstall"),
				"type_of_install" => $this->input->post("toi"),
				"fee_method" => $this->input->post("fee_method"),
				"branch_id" => $this->input->post("branchId"),
				"branch_no" => $this->input->post("batchId"),
				"reffered_id" => $this->input->post("reffId"),
				"remark"=>$this->input->post("remark"),
				"certificate_no"=>$this->input->post("certificate_no"),
				"sr_no"=>$this->input->post("sr_no"),
				"isApprove" => "yes"
		);
		$this->load->model("student_info");
		if($query = $this->student_info->updateStudentInfo($new_img,$student_id)){
			
		redirect("apanel/studentEdit/$student_id");
	}
	}

		public function editSave_web_Register(){
		$student_id = $this->input->post('student_id');
		$photo_name = time().trim($_FILES['studentImage']['name']);
		//$signature =time().trim($_FILES['signature']['name']);
		$web_data = array(
				"name" => $this->input->post("name"),
				"fName" => $this->input->post("fname"),
				"address" => $this->input->post("address"),
				"city" => $this->input->post("city"),
				"state" => $this->input->post("state"),
				"pin" => $this->input->post("pin"),
				"mobile" => $this->input->post("mobile"),
				"mother_name"=>$this->input->post("mother_name"),
				"aadhar_number"=>$this->input->post("aadhar_number"),
				"dob" => date("Y-m-d", strtotime($this->input->post("dob"))),
				"heighQ" => $this->input->post("heighQ"),
				"courseApplied" => $this->input->post("courseApplied"),
				"timing" => $this->input->post("timing"),
				"gender" => $this->input->post("gender"),
				"pay_amount" => $this->input->post("total_fee"),
				"num_of_install" => $this->input->post("numofinstall"),
				"type_of_install" => $this->input->post("toi"),
				"fee_method" => $this->input->post("fee_method"),
				"branch_id" => $this->input->post("branchId"),
				"branch_no" => $this->input->post("branchNo"),
				"remark"=>$this->input->post("remark"),
				//"remark"=>$this->input->post("remark"),
				"certificate_no"=>$this->input->post("certificate_no"),
				"sr_no"=>$this->input->post("sr_no"),
		);
		$this->load->model("student_info");
		if($query = $this->student_info->updatewebStudentInfo($web_data,$student_id)){
			
		redirect("apanel/studentwebEdit/$student_id");
		}
	}
	
	public function noticeBoard(){
	
		$data = array(
				"title" => $this->input->post("title"),
				"msg" => $this->input->post("content"),
				"date" => date("Y-m-d")
		);
		
		if($this->db->insert("notice",$data)){
			redirect(base_url()."apanel/noticeBoard/true");
		}else{
			redirect(base_url()."apanel/noticeBoard/false");
		}
		
	}
	
	public function deletenoticeBoard(){
		$this->db->where("id",$this->uri->segment(3));
	if($this->db->delete("notice")){
		
			redirect(base_url()."apanel/noticeBoard/deltrue");
		}else{
			redirect(base_url()."apanel/noticeBoard/delfalse");
		}
	}
	
//-----------------------------------------------------------------------------------------------------------------------	
	
	public function deleteEnquiry(){
	$this->db->where("sno",$this->uri->segment(3));
	if($this->db->delete("inquiry")){
		
			redirect(base_url()."apanel/inquiry/deltrue");
		}else{
			redirect(base_url()."apanel/inquiry/delfalse");
		}
	}
	
//------------------------------------------------------------------------------------------------------------------------------
	public function saveBatch(){
		$data = array(
				"batch_time" => $this->input->post("batch")
		);
		if($this->db->insert("batch_time",$data)){
			redirect("apanel/batchTime");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	public function saveBatch_number(){
		$data = array(
				"batch_no" => $this->input->post("batch")
		);
		if($this->db->insert("batch_number",$data)){
			redirect("apanel/batchnumber");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	public function saveRefferby(){
		$data = array(
				"refference" => $this->input->post("reff")
		);
		if($this->db->insert("reffered_by",$data)){
			redirect("apanel/refferby");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}

	public function editBatch(){
		$data = array(
				"batch_time" => $this->input->post("batch")
		);
		$data1= array(
				"timing"=>$this->input->post("batch")
		);
		
		$oldbatch = $this->input->post("batchold");
		
		$this->db->where("id",$this->input->post("id"));
		if($this->db->update("batch_time",$data)){
			$this->db->where("timing",$oldbatch);
			$this->db->update("student_info",$data1);
			redirect("apanel/batchTime");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	public function editBatch_number(){
		//echo $d=$this->input->post('id');
		// $data = array(
		// 		"branch_no" => $this->input->post("batch")
		// );
		// $data1= array(
		// 		"timing"=>$this->input->post("batch")
		// );
		// $data = array(
		// 		"branch_no" => $this->input->post("batch")
		// );
		// $oldbatch = $this->input->post("batchold");
		
		// $this->db->where("id",$this->input->post("id"));
		// if($this->db->update("student_info",$data)){
		// 	$this->db->where("branch_no",$oldbatch);
		// 	$this->db->update("student_info",$data1);
		// 	redirect("apanel/batchnumber");
		// }
		// else{
		// 	echo "Somthing going wrong. Please Contact Site administrator";
		// }
		// echo $this->input->post('id');
		// echo $this->input->post('batch');
		// echo $this->input->post('batchold');
		// exit();

		 $data=array(
		'batch_no'=>$this->input->post('batch')
	     );
	
			$this->db->where('id',$this->input->post('id'));
			$update=$this->db->update('batch_number',$data);
			if($update){
			redirect("apanel/batchnumber");
			}
			else
			{
				echo "somthing wrong";

			}
		
	}

	public function editrefferby(){
	
		 $data=array(
		'refference'=>$this->input->post('reff')
	     );
	
			$this->db->where('id',$this->input->post('id'));
			$update=$this->db->update('reffered_by',$data);
			if($update){
			redirect("apanel/refferby");
			}
			else
			{
				echo "somthing wrong";

			}
		
	}

	public function deleteBatch(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("batch_time")){
			redirect("apanel/batchTime");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	public function deleteBatchnumber(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("batch_number")){
			redirect("apanel/batchnumber");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}

	public function deleteReference(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("reffered_by")){
			redirect("apanel/refferby");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
//------------------------------------------------------------------------------------------------------------------------------
	public function saveBatchNew(){
		$data = array(
				"batch_time" => $this->input->post("batch")
		);
		if($this->db->insert("batch_new",$data)){
			redirect("apanel/batchTimeNew");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	public function editBatchNew(){
		$data = array(
				"batch_time" => $this->input->post("batch")
		);
		$this->db->where("id",$this->input->post("id"));
		if($this->db->update("batch_new",$data)){
			redirect("apanel/batchTimeNew");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	public function deleteBatchNew(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("batch_new")){
			redirect("apanel/batchTimeNew");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
//------------------------------------------------------------------------------------------------------------------------------
	public function saveBatchSpecial(){
		$data = array(
				"batch_time" => $this->input->post("batch")
		);
		if($this->db->insert("batch_special",$data)){
			redirect("apanel/batchTimeSpecial");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	public function editBatchSpecial(){
		$data = array(
				"batch_time" => $this->input->post("batch")
		);
		$this->db->where("id",$this->input->post("id"));
		if($this->db->update("batch_special",$data)){
			redirect("apanel/batchTimeSpecial");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	public function deleteBatchSpecial(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("batch_special")){
			redirect("apanel/batchTimeSpecial");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}

	public function deletewebStudents(){
		$this->db->where("student_id",$this->uri->segment(3));
		if($this->db->delete("web_student_requ")){
			redirect("apanel/olr");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
//------------------------------------------------------------------------------------------------------------------------------
	public function saveExpenseList(){
		$data = array(
				"eName" => $this->input->post("batch")
		);
		if($this->db->insert("expense",$data)){
			redirect("apanel/expenseList");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	public function editExpenseList(){
		$data = array(
				"eName" => $this->input->post("batch")
		);
		$this->db->where("id",$this->input->post("id"));
		if($this->db->update("expense",$data)){
			redirect("apanel/expenseList");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	public function deleteExpenseList(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("expense")){
			redirect("apanel/expenseList");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
//------------------------------------------------------------------------------------------------------------------------------
	public function saveCourse(){
		$data = array(
				"course_name" => $this->input->post("course"),
				"duration_in_months" => $this->input->post("dureation"),
				"detail" => $this->input->post("detial")
		);
		if($this->db->insert("courses",$data)){
			redirect("apanel/courses");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	public function editCourse(){
		$data = array(
				"course_name" => $this->input->post("course"),
				"course_fee" => $this->input->post("course_fee"),
				"duration_in_months" => $this->input->post("dureation"),
				"Form_fee" => $this->input->post("Form_fee"),
				"Registration_Fee" => $this->input->post("Registration_Fee"),
				"Exam_fee" => $this->input->post("Exam_fee"),
				"Late_Fee" => $this->input->post("Late_Fee"),
				"detail" => $this->input->post("detail")
		);
		$this->db->where("id",$this->input->post("id"));
		if($this->db->update("courses",$data)){
			redirect("apanel/courses");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	public function deleteCourse(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("courses")){
			redirect("apanel/courses");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
public function deleteStudent(){
		$stuid_id =$this->uri->segment(3);
		?>
			<script>       

			var person = prompt("Please enter Admin Password to delete", "");

			if (person == null || person == "" || person!="rahul") {
			    txt = "User cancelled the prompt.";
			    alert("wrong password please try again");
			    window.history.back();
			} else {
				<?php 
			
				$total = $this->db->query("SELECT SUM(paid_amount) as totalpaid from cal_paid_fee WHERE student_id = '$stuid_id'")->row(); 
			    $op1 = $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."'")->row();
				$balance = $op1->closing_balance;
				$close1 = $balance - $total->totalpaid;
				$bal = array(
					"closing_balance" => $close1
			);
		    
			$this->db->where("opening_date",date('Y-m-d'));
			$this->db->update("opening_closing_balance",$bal);
					
				$dayBook = array(
				"paid_to" => "Admin",
				"paid_by" => "Delete Fee",
				"reason" => "Wrong taken Fee",
				"dabit_cradit" => "dabit",
				"amount" => $total->totalpaid,
				"closing_balance" => $close1,
				"pay_date" => date("Y-m-d"),
				"pay_mode" => "Wrong entry",
				"branch_id" => $this->session->userdata("username"),
				"invoice_no" => $stuid_id
			);
					
				$c = $this->day_book->insert($dayBook);
				$this->db->where("student_id",$stuid_id);
				$this->db->delete("student_info");
				$this->db->where("student_id",$stuid_id);	
				$this->db->delete("cal_paid_fee");
				
				?>
				alert('Record Modified!',0);
				window.location=history.go(-1);
					
					
			   
			}
		</script>

		<?php 
	}
	
	function addedStudent(){
		$data1=array(
				'isApprove'=>'Yes'
		);
		$stid = $this->uri->segment(3);
	
		$this->db->where("student_id",$stid);
		$rty = $this->db->get("web_student_requ")->row();
		$this->db->where("id",$rty->courseApplied);
		$rtyu=$this->db->get("courses")->row();
		$id = $this->db->query("SELECT id From student_info order by id DESC Limit 1")->row()->id;
		$id = 1000 + $id+1;
		$id = "ONNIT".$id;
			$data = array(
				"student_id" => $id,
				"name" => $rty->name,
				"fName" => $rty->fName,
				"address" => $rty->address,
				"city" => $rty->city,
				"state" => $rty->state,
				"pin" => $rty->pin,
				"mobile" => $rty->mobile,
				"mother_name"=> $rty->mother_name,
				"aadhar_number"=>$rty->aadhar_number,
				"dob" => date("Y-m-d", strtotime($rty->dob)),
				"heighQ" => $rty->heighQ,
				"courseApplied" => $rty->courseApplied,
				"timing" => $rty->timing,
				"gender" => $rty->gender,
				"email" => $rty->email,
				"password" => $id,
				"total_fee" => $rtyu->course_fee,
                "num_of_install" => "0",
                "type_of_install" => "0",
				"fee_method" => "One Time",
				"joinDate" => date("Y-m-d"),
				"joinTime" => date("H:i:s"),
				"branch_id" => $rty->branch_id,
				"branch_no" => $rty->branch_no,
				"remark"=>$rty->remark,
				"isApprove"=>"Yes"
				
			);
			$courseCode = $rty->courseApplied;
			$this->db->where("id",$courseCode);
			$coursefee = $this->db->get("courses")->row();
			
			
				$feedata =array(
						"student_id"=>$id,
						"Course_fee"=>$coursefee->course_fee,
						"Form_fee"=> $coursefee->Form_fee,
						"Registration_Fee"=>$coursefee->Registration_Fee,
						"Exam_fee"=>$coursefee->Exam_fee,
						"Late_Fee"=>$coursefee->Late_Fee,
						"total_amount"=>$coursefee->course_fee+$coursefee->Form_fee+$coursefee->Registration_Fee+$coursefee->Exam_fee+$coursefee->Late_Fee,
						"should_paid_date"=>date("Y-m-d"),
						"branch_id"=>$rty->branch_id,
						"status"=>"pending"
				);
				$this->db->insert("cal_paid_fee",$feedata);
			
			
			if($this->db->insert("student_info",$data)){
				$abc['id'] = $id;
				$abc['isTrue'] = true;
				if($rty->mobile){
				$phone=$rty->mobile;
				$sms="Welcome to National Institute Of technologies. Please Submit your photo and signature for complete the registration process";
				sms($phone,$sms);
				}
				
			}
		
		
		
		$this->db->where("student_id",$this->uri->segment(3));
		if($this->db->update("web_student_requ",$data1)){
			redirect("apanel/olr");
		}
	}
	
	public function deleteSubject(){
		$rowt = $this->uri->segment(4);
		$this->db->where("sno",$this->uri->segment(3));
		if($this->db->delete("course_subject")){
			$this->db->where("c_id",$rowt);
			$this->db->where("s_id",$this->uri->segment(3));
			$this->db->delete("subject_marks");
			redirect("apanel/defineSubject/$rowt");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	public function fillMarks(){
		$courseid = $this->uri->segment(4);
		$sno = $this->uri->segment(3);
		$data["c_id"]=$courseid;
		$data["s_id"]=$sno;
		$this->db->where("sno",$sno);
		$cs = $this->db->get("course_subject")->row();
		$data["course_subject"]=$cs;
		$this->db->where("courseApplied",$courseid);
		$records = $this->db->get("student_info");
		if($records->num_rows()>0){
			$data["records"]=$records->result();
			$data['subPage'] = 'Settings';
		$data['title'] = "Fill Marks";
		$data['smallTitle'] = "Settings";
		$data['pageTitle'] = "Fill Marks";
		
		$data['mainContent'] = "enterMarks";
		$data['headerCss'] = "headerCss/enterMarksCss";
		$data['footerJs'] = "footerJs/enterMarksJs";
		$this->load->view("include/template",$data);
			
			
			
			
		}else{
			?>
			
			<script>alert("No Record found");</script>
			<?php 
			
		}
		
	}
	
	public function saveStuMarks(){
		$stu_id =$this->input->post("stu_id");
		$atten =$this->input->post("atten");
		$marks_obtain =$this->input->post("marks_obtain");
		 $c_id =$this->input->post("c_id");
		$s_id =$this->input->post("s_id");
		$data = array(
				"c_id"			=>	$c_id,
				"s_id"			=>	$s_id,
				"student_id"	=>	$stu_id,
				"marks_obtain"	=>	$marks_obtain,
				"fsd"			=>	$this->session->userdata("fsd"),
				"careted_date"	=>	date("Y-m-d"),
				"atten"			=>	$atten
		);
		$this->db->insert("subject_marks",$data);
		echo "update";
		
	}
	
	public function updateStuMarks(){
		$stu_id =$this->input->post("stu_id");
		
		$marks_obtain =$this->input->post("marks_obtain");
		$c_id =$this->input->post("c_id");
		$s_id =$this->input->post("s_id");
		$data = array(
				
				"marks_obtain"	=>	$marks_obtain
				
		);
		$this->db->where("c_id",$c_id);
		$this->db->where("s_id",$s_id);
		$this->db->where("student_id",$stu_id);
		$this->db->update("subject_marks",$data);
		echo "updated";
	}
	
	
}