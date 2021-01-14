<?php class dashboard extends CI_Controller{
   
function totalCustomerbyagId(){
    $agId=305;
    $rank=2;
    $this->load->model("dashboardmodel");
    $tcaid=$this->dashboardmodel->totalCustomerbyagId($agId,$rank);
    if($tcaid->num_rows()>0){
    print_r($tcaid);
    }
}    
    
    
}
?>    