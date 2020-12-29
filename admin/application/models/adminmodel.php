<?php 
    class Adminmodel extends CI_Model{
    	
    	function getEmployee(){
    		$record = $this->db->query("select * from employee_info where status =1");
    		//print_r($record->result());
    		//exit();
    		return $record;
    	}
function getrecord(){
        	$record = $this->db->get("general_settings");
        	return $record;
	     	}
	     	
	 	function updateAdminPassword($data){
		//$this->db->where("school_code",$this->session->userdata("school_code"));
		if($this->db->update("general_settings",$data)){
			return true;
		}
		else{
			return false;
		}
	}
	
	function treedata($tblnm){
	    return $this->db->get($tblnm);
	    
	}
   
   function alldata(){
		$reg=$this->db->get("customer_complain");
		return $reg;
	}
	public function update_admin_profile($data){
		
		$result = $this->db->update("general_settings",$data);
		if($result):
			return true;
		endif;
	}
	
public function addemployee($data){
		$info=$this->db->insert("employee_info",$data);
		return $info;
	}
	public function getinfo(){
		$info=$this->db->get("employee_info");
		return $info;
	}
    }
    
    ?>