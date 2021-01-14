<?php 
    class Adminmodel extends CI_Model{
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//		*******************************UPASANA CODE*****************************************   	
    	 function ag_max($tblnm){
            $this->db->select_max('id');
						$this->db->from($tblnm);
						$maxid=$this->db->get();
						if($maxid->num_rows()>0){
			      	return $maxid->row()->id;
						}else{
							return 1; 
						}
        }
/*  function getAgrecord(){
        	$agrecord=$this->db->get('agent_info');
        	return $agrecord;
        }*/
        function getrecord(){
        	$crecord=$this->db->get('general_settings');
        	return $crecord;
        }

    function getState(){
	//$school_code = $this->session->userdata("school_code");
	$result = $this->db->query("select DISTINCT state FROM city_state ORDER BY state");
	return $result;
}

function getCity($state){
	//$school_code = $this->session->userdata("school_code");
	$result = $this->db->query("select DISTINCT city FROM city_state WHERE state = '$state' ORDER BY city");
	return $result;
}

function getArea($state,$city){
	//$school_code = $this->session->userdata("school_code");
	$result = $this->db->query("select DISTINCT area FROM city_state WHERE city = '$city' AND state = '$state'  ORDER BY area");
	return $result;
}


function getPin($state,$city,$area){
	//$school_code = $this->session->userdata("school_code");
	$result = $this->db->query("select DISTINCT pin FROM city_state WHERE city = '$city' AND state = '$state' AND area = '$area'  ORDER BY area LIMIT 1");
	return $result;
}

function addAgent($data){
	$this->db->insert("agent_info",$data);
	return true;

}
function updateDocInfo($data){
	$this->db->insert("agent_doc_info",$data);
	return true;

}
function updateAgent($data,$uri){
	$this->db->where("id",$uri);
	$result =  $this->db->update('agent_info',$data);
	return $result;
}
function deleteAgent($reg_id){
	$this->db->where("id",$reg_id);
	$res=$this->db->delete("agent_info");
	return $res;
}


	public function createPlan($data){
	   $pdata= $this->db->insert("plan_name",$data);
	   return true;
	}
		public function assignPlan($data){
	   $pdata= $this->db->insert("assign_plan",$data);
	   return true;
	}
function deletePlan($reg_id){
	$this->db->where("id",$reg_id);
	$res=$this->db->delete("plan_name");
	return $res;
}	
function deleteAsspln($reg_id){
	$this->db->where("id",$reg_id);
	$res=$this->db->delete("cust_assign_plan");
	return $res;
}	
function update_plan($plan_id,$plan_n)
		{
			$val = array('name'=>$plan_n);
			$this->db->where('id',$plan_id);
			return $updt = $this->db->update('plan_name',$val); 
		}	
	function update_Aplan($plan_id,$plan_p,$plan_s)
		{
			$val = array('price'=>$plan_p, 'size'=>$plan_s);
			$this->db->where('id',$plan_id);
			return $updt = $this->db->update('assign_plan',$val); 
		}
		
	  function getValue1($temps){
    	$this->db->where("status",1);
    	$this->db->where("username",$temps);
    	$dam = $this->db->get("agent_info");
    	return $dam;
    }	
	function createxpe($exp){
		$data=array(
			'expenditure_name'=>$exp,
		);
		$this->db->insert('expenditure',$data);
		return true;
	}
	function deleteExp($id){
	    $this->db->where("id",$id);
	  if($this->db->delete("expenditure")){
	    redirect(base_url()."apanel/createEx");
	  }else{
	      echo "1";
	 	}
	}
	function createSubexp($data){
	    $this->db->insert('sub_expenditure',$data);
	    return true;
	}
	
		function deleteSubExp($id){
	    $this->db->where("id",$id);
	    if($this->db->delete("sub_expenditure")){
	    redirect(base_url()."apanel/createSubEx");
	  }else{
	      echo "1";
	 	}
	}		
	function employeeList(){
	
		$this->db->where("status",1);
		$result = $this->db->get("agent_info");
		return $result;
	}		
public function getSalaryDetail($eid){
	
		$this->db->where('emp_id',$eid);
	
		$detail = $this->db->get('emp_salary_struct');
		return $detail;
	}		
		
		
		
		
		
		
		
		
		
		
		
		
	//		*******************************END UPASANA CODE*************************************	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
    }
    
    ?>