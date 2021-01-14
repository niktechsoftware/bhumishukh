<?php
	class general_settings extends CI_Model{
		function saveInfo(){
			$id = $this->input->post('clinic_id');
			$newId = $this->getNewId();
			$logo = time().trim($_FILES['logo']['name']);
			$image = time().trim($_FILES['image']['name']);
			$username ="THELIFE".$newId;
			$val = array(
				
					"username" => $username,
					"password" => $this->input->post("pass"),
					"cilnic_name" => $this->input->post("clinic_name"),
					"address_1" => $this->input->post("address_1"),
					"address_2" => $this->input->post("address_2"),
					"city" => $this->input->post("city"),
					"state" => $this->input->post("state"),
					"pin" => $this->input->post("pin"),
					"phone_number" => $this->input->post("phone_number"),
					"fax_number" => $this->input->post("fax_number"),
					"mobile_number" => $this->input->post("mobile_number"),
					"email1" => $this->input->post("email1"),
				    "status"=>0,
					"email2" => $this->input->post("email2"),
					"head_name" => $this->input->post("head_name"),
					"gst_no" => $this->input->post("gst_no"),
				
					"login_type"=>$this->input->post("login_type"),
					"complete_type"=>$this->input->post("complete_type"),
					"created" =>date('Y-m-d')
			);
			if(strlen($_FILES['image']['name']) > 0):
				$photo_name = time().trim($_FILES['image']['name']);
					
				$this->load->library('upload');
				// Set configuration array for uploaded photo.
				$image_path = realpath(APPPATH . '../assets/images/docImg');
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = '2024';
				$config['file_name'] = $photo_name;
				// Upload first photo and create a thumbnail of it.
				if (!empty($_FILES['image']['name'])) {
					$this->upload->initialize($config);
					if ($this->upload->do_upload('image')) {
					    $val['photo']=$photo_name;
						// ---------------------------------- Reset session value of photo ----------------------
						if($id == $this->session->userdata("clinic_id")):
						$this->session->set_userdata("photo",$photo_name);
						endif;
					}
				}
			endif;
			if(strlen($_FILES['logo']['name']) > 0):
				$photo_name = time().trim($_FILES['logo']['name']);
					
				$this->load->library('upload');
				// Set configuration array for uploaded photo.
				$image_path = realpath(APPPATH . '../assets/images/docImg');
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = '2024';
				$config['file_name'] = $photo_name;
				// Upload first photo and create a thumbnail of it.
				if (!empty($_FILES['logo']['name'])) {
					$this->upload->initialize($config);
					if ($this->upload->do_upload('logo')) {
					     $val['branch_logo']=$photo_name;
						// ---------------------------------- Reset session value of logo ----------------------
						if($id == $this->session->userdata("clinic_id")):
						$this->session->set_userdata("logo",$photo_name);
						endif;
					}
				}
			endif;
			
			if($this->db->insert("branch",$val)){
				return $username;
			}else{
				return false;
			}
		}
		
		function updateInfo(){
		$id = $this->input->post('row_id');
		//echo $id;
		//exit();
				
			if(strlen($_FILES['image']['name']) > 0):
			$photo_name = time().trim($_FILES['image']['name']);
			$new_img = array(
					"image"=> $photo_name
			);
			$old_img = $this->input->post("old_image");
			@chmod("assets/images/docImg/" . $old_img, 0777);
			@unlink("assets/images/docImg" . $old_img);
		
		
				$this->load->library('upload');
				// Set configuration array for uploaded photo.
				$image_path = realpath(APPPATH . '../assets/images/docImg');
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = '1024';
				$config['file_name'] = $photo_name;
				// Upload first photo and create a thumbnail of it.
				if (!empty($_FILES['image']['name'])) {
					$this->upload->initialize($config);
					if ($this->upload->do_upload('image')) {
					   $this->db->where("id",$id);
					   $this->db->update("branch",$new_img);
						// ---------------------------------- Reset session value of photo ----------------------
						if($id == $this->session->userdata("clinic_id")):
						$this->session->set_userdata("photo",$photo_name);
						endif;
					}
				
			}
			endif;
			if(strlen($_FILES['logo']['name']) > 0){
			$photo_name = time().trim($_FILES['logo']['name']);
			$new_img1 = array(
					"logo"=> $photo_name
			);
			$old_img = $this->input->post("old_logo");
			@chmod("assets/images/docImg/" . $old_img, 0777);
			@unlink("assets/images/docImg/" . $old_img);
		
		
				$this->load->library('upload');
				// Set configuration array for uploaded photo.
				$image_path = realpath(APPPATH . '../assets/images/docImg');
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = '1024';
				$config['file_name'] = $photo_name;
				// Upload first photo and create a thumbnail of it.
				if (!empty($_FILES['logo']['name'])) {
					$this->upload->initialize($config);
					if ($this->upload->do_upload('logo')) {
					   $this->db->where("id",$id);
					   $this->db->update("branch",$new_img11);
						// ---------------------------------- Reset session value of logo ----------------------
						if($id == $this->session->userdata("clinic_id")):
							$this->session->set_userdata("logo",$photo_name);
						endif;
					}
				
			}
		}
				
			$val = array(
					"login_type" => $this->input->post("login_type"),
					"cilnic_name" => $this->input->post("clinic_name"),
					"address_1" => $this->input->post("address_1"),
					"address_2" => $this->input->post("address_2"),
					"city" => $this->input->post("city"),
					"state" => $this->input->post("state"),
					"pin" => $this->input->post("pin"),
					"phone_number" => $this->input->post("phone_number"),
					"fax_number" => $this->input->post("fax_number"),
					"mobile_number" => $this->input->post("mobile_number"),
					"email1" => $this->input->post("email1"),
					"email2" => $this->input->post("email2"),
					"head_name" => $this->input->post("head_name")
				
			);
				
			$this->db->where("id",$id);
			if($this->db->update("branch",$val)){
				$data['isTrue'] = true;
				$data['id'] = $id;
				return $data;
			}else{
				$data['isTrue'] = true;
				return $data;
			}
		}
		
		function getInfoById($clinic_id){
			$this->db->where("username",$clinic_id);
			return $this->db->get("branch")->row();
		}
		
		
		function allInfo(){
			return $this->db->get("general_settings")->result();
		}
		function getNewId(){
			$a = $this->db->query("SELECT id FROM branch ORDER BY id DESC LIMIT 1");
			if($a->num_rows() > 0){
				$id = $a->row()->id + 1001;
				return $id;
			}else{
				return 1000;
			}
		}
		function updateImage($new_img,$id){
			$this->db->where("clinic_id",$id);
			if($this->db->update("general_settings",$new_img)){
				return true;
			}else{
				return false;
			}
		}
		
		
		
	}