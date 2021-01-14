<?php class dashboardmodel extends CI_Model{
 
 function getdata($table,$ccode){
    
     return $this->db->get($table);
 }
 
function totalCustomerbyagId($agId,$rank){
    $this->db->where("reff_id",$agId);
    $cinfo=$this->db->get("customer_info");
    return $cinfo;
}   
 }
 