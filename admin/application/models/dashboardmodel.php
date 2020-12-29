<?php class dashboardmodel extends CI_Model{
 
 function getdata($table,$ccode){
    
     return $this->db->get($table);
 }
 
 
 }
 