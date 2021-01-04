<?php 
    class Adminmodel extends CI_Model{
    	
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

 function getAgrecord(){
        	$agrecord=$this->db->get('agent_info');
        	return $agrecord;
        }
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


    }
    
    ?>