<?php 
    class Cmodel extends CI_Model{
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//		*******************************UPASANA CODE***************************************** 			
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
 function getAmount($size)
	{
				    $this->db->where('id',$size);
				 	$row1=$this->db->get('assign_plan')->row();
				 	return $row1;
	}

function insdaybook($daybook){
    $q1=$this->db->insert("day_book",$daybook);
    return $q1;
}	
function invoiceSerial($invoice){
    $q1=$this->db->insert("invoice_serial",$invoice);
    return $q1;
}
function updateDocInfo($data){
	$this->db->insert("customer_doc_info",$data);
	return true;

}
public function getSizebyPlanname($plan){
		$query = $this->db->query("SELECT * FROM assign_plan WHERE plan_id ='$plan'");
		return $query;
	}
	  function getValue1($temps){
    	$this->db->where("status",1);
    	$this->db->where("username",$temps);
    	$dam = $this->db->get("customer_info");
    	return $dam;
    }	
	//		*******************************END UPASANA CODE*************************************	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////

        	
    }

?>