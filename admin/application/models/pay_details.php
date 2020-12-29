<?php 
    class pay_details extends CI_Model{
        
        function checkStatus($cid){
           $this->db->where("c_id",$cid);
			$maxid=$this->db->get("pay_details");
			if($maxid->num_rows()>0){
				return $maxid;
			}else{
				return false; 
			}
        }
        
       
        
    }
?>