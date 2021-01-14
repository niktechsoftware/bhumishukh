<?php class dashboard extends CI_Model{
 
 
  function inputdata($data)
  {
  $this->db->insert("online_form",$data);
  return true;     
 
     
  }
 
 
 }?>
