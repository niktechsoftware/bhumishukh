<?php
class DaybookController extends CI_Controller{

  function __construct()
	{
		parent::__construct();
		$this->is_login();
		$this->load->model('daybook');
	
	}
	function is_login(){
		$is_login = $this->session->userdata('is_login');
		$is_lock = $this->session->userdata('is_lock');
		$logtype = $this->session->userdata('login_type');
		if(!$is_login){
			//echo $is_login;
			redirect("welcome/index");
		}
		elseif(!$is_lock){
			redirect("welcome/lockPage");
		}
  }
  function daybook(){
    $uri=$this->uri->segment(3);
   
    if($uri==1){
      $data['outdb']=$this->daybook->outer_daybook();
    }
    else{
      $data['inndb']=$this->daybook->inner_daybook();
    }
    $data['uri']=$uri;
    $data['pageTitle'] = 'Daybook';
    $data['smallTitle'] = 'Daybook ';
    $data['mainPage'] = 'Accounting';
    $data['subPage'] = 'Accounting';
    $data['title'] = 'Daybook';
    $data['headerCss'] = 'headerCss/customerlistcss';
    $data['footerJs'] = 'footerJs/customerlistjs';
    $data['mainContent'] = 'daybook';
    $this->load->view("includes/mainContent", $data);
  }
  

function getroiandpool(){
 
    $data['pageTitle'] = 'Daybook';
    $data['smallTitle'] = 'Daybook ';
    $data['mainPage'] = 'Accounting';
    $data['subPage'] = 'Accounting';
    $data['title'] = 'Daybook';
    $data['headerCss'] = 'headerCss/customerlistcss';
    $data['footerJs'] = 'footerJs/customerlistjs';
    $data['mainContent'] = 'daybookpool';
    $this->load->view("includes/mainContent", $data);
}

function daybookTrans(){
     $data['camount']=0;
     $data['pageTitle'] = 'Monthly Balance ';
    $data['smallTitle'] = 'Daybook ';
    $data['mainPage'] = 'Monthly Balance';
    $data['subPage'] = 'Monthly Balance';
    $data['title'] = 'Monthly Balance';
    $data['headerCss'] = 'headerCss/customerlistcss';
    $data['footerJs'] = 'footerJs/customerlistjs';
    $data['mainContent'] = 'daymonthly';
    $this->load->view("includes/mainContent", $data);
}

function getdata(){
    $camount =0;
    $sdate = $this->input->post("sdate");
     $edate = $this->input->post("edate");
     $this->db->select_sum("amount");
      $this->db->where("debit_credit",0);
     $this->db->where("transaction_type",14);
     $this->db->where("DATE(date1) > ",$sdate);
     $this->db->where("Date(date1) <",$edate);
    $cam =  $this->db->get("inner_daybook");
    if($cam->num_rows()>0){
    $camount= $cam->row()->amount;
     $data['sdate']=$sdate;
      $data['edate']=$edate;
    }
    else{
        $camount=0;
        
    }
    $data['camount']=$camount;
    $data['pageTitle'] = 'Monthly Balance ';
    $data['smallTitle'] = 'Daybook ';
    $data['mainPage'] = 'Monthly Balance';
    $data['subPage'] = 'Monthly Balance';
    $data['title'] = 'Monthly Balance';
    $data['headerCss'] = 'headerCss/customerlistcss';
    $data['footerJs'] = 'footerJs/customerlistjs';
    $data['mainContent'] = 'daymonthly';
    $this->load->view("includes/mainContent", $data);
     
}
function dBookDetail(){

    $data['pageTitle'] = 'Daybook Detail';
    $data['smallTitle'] = 'Daybook Detail';
    $data['mainPage'] = 'Daybook Detail';
    $data['subPage'] = 'Daybook Detail';
    $data['title'] = 'Daybook Detail';
    $data['headerCss'] = 'headerCss/customerlistcss';
    $data['footerJs'] = 'footerJs/customerlistjs';
    $data['mainContent'] = 'admin/dBookDetail';
    $this->load->view("includes/mainContent", $data);

}
function dayBookReport(){
    $sdate = $this->input->post("sdate");
    $edate = $this->input->post("edate");
    $q  = $this->input->post("type");
    $data['sdate']=$sdate;
    $data['edate']=$edate;
    $data['q']=$q;
    $this->load->model('daybook');
    $gdbd=$this->daybook->getdaybookByDate($sdate,$edate,$q);
    $data['gdbd']=$gdbd;
    $data['pageTitle'] = 'Daybook Detail';
    $data['smallTitle'] = 'Daybook Detail';
    $data['mainPage'] = 'Daybook Detail';
    $data['subPage'] = 'Daybook Detail';
    $data['title'] = 'Daybook Detail';
    $data['headerCss'] = 'headerCss/customerlistcss';
    $data['footerJs'] = 'footerJs/customerlistjs';
    $data['mainContent'] = 'admin/dayBookReport';
    $this->load->view("includes/mainContent", $data);
}

}
?>