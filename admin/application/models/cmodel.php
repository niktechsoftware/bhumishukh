<?php 
    class Cmodel extends CI_Model{
			
        function cust_max($tblnm){
            $this->db->select_max('id');
						$this->db->from($tblnm);
						$maxid=$this->db->get();
						if($maxid->num_rows()>0){
			      	return $maxid->row()->id;
						}else{
							return 1; 
						}
        }
      function addCust($data){
	$this->db->insert("customer_info",$data);
	return true;

}
 function getCrecord($id){
        	$this->db->where('id',$id);
        	$record = $this->db->get("agent_info");
        	return $record;
	     	}
function updateCust($data,$uri){
	$this->db->where("id",$uri);
	$result =  $this->db->update('customer_info',$data);
	return $result;
}
function deleteCust($reg_id){
	$this->db->where("id",$reg_id);
	$res=$this->db->delete("customer_info");
	return $res;
}


        	
    }

?>