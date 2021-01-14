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
  
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//		*******************************UPASANA CODE*****************************************

  
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
  


	function dBookDetail(){
	    $data['pageTitle'] = 'Daybook';
		$data['smallTitle'] = 'Daybook';
		$data['mainPage'] = 'Daybook';
		$data['subPage'] = 'Daybook';
		$data['title'] = 'Daybook';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'dayBook';
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
    $data['mainContent'] = 'daybookReport';
    $this->load->view("includes/mainContent", $data);
}
function installmentList(){
	    $data['pageTitle'] = 'Installment List';
		$data['smallTitle'] = 'Installment List';
		$data['mainPage'] = 'Installment List';
		$data['subPage'] = 'Installment List';
		$data['title'] = 'Installment List';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'installmentList';
		$this->load->view("includes/mainContent", $data);
	    
	}
	
function installmentListReport(){
         $loginType= $this->session->userdata("login_type");
	   if($loginType==1){
	        $data['aginfo']=$this->db->get('agent_info');
	   }else{
	        $cid = $this->session->userdata("customer_id");
	        $this->db->where("reff_id",$cid);
	        $data['aginfo']=$this->db->get('agent_info');
	   }
        $sdate = $this->input->post("sdate");
        $edate = $this->input->post("edate");
        $data['sdate']=$sdate;
        $data['edate']=$edate;
        $this->load->model('daybook');
        $gdbd=$this->daybook->getinstllmentByDate($sdate,$edate);
        $data['gdbd']=$gdbd;
	    $data['pageTitle'] = 'Installment List';
		$data['smallTitle'] = 'Installment List';
		$data['mainPage'] = 'Installment List';
		$data['subPage'] = 'Installment List';
		$data['title'] = 'Installment List';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'installmentListReport';
		$this->load->view("includes/mainContent", $data);
	    
	}	
	function totalCommision(){
	     if($this->input->post("adId")){
	        $val= $this->input->post("adId");
	         $this->db->where("username",$val);
	         $agInfo=$this->db->get("agent_info");
	         if($agInfo->num_rows()>0){
	             $val=2;
	             $data['agInfo']=$agInfo->row();
	         }else{
	             $val=1;
	         }
	    }else{
	        $val=0;
	    }
	    $data['val']=$val;
	    $data['pageTitle'] = 'Total Commision';
		$data['smallTitle'] = 'Total Commision';
		$data['mainPage'] = 'Total Commision';
		$data['subPage'] = 'Total Commision';
		$data['title'] = 'Total Commision';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'totalCommision';
		$this->load->view("includes/mainContent", $data);
	    
	}	
function totalCommisionReport(){
        $agid=$this->input->post("agid");
        $sdate = $this->input->post("sdate");
        $edate = $this->input->post("edate");
        $data['sdate']=$sdate;
        $data['edate']=$edate;
        $this->load->model('daybook');
        $gdbd=$this->daybook->totalCommisionReport($sdate,$edate,$agid);
        $data['gdbd']=$gdbd;
	    $data['pageTitle'] = 'Commision List';
		$data['smallTitle'] = 'Commision List';
		$data['mainPage'] = 'Commision List';
		$data['subPage'] = 'Commision List';
		$data['title'] = 'Commision List';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/customerJs';
		$data['mainContent'] = 'totalCommisionReport';
		$this->load->view("includes/mainContent", $data);
	    
	}		
 function addCPayment(){
        	$this->load->model("Daybook");
		    $tblnm ="cash_payment";
		    $maxid	=	$this->Daybook->cash_max($tblnm);
		    $maxid	=	$maxid+1;
			$billno="4000".$maxid;
			$rn=rand(9999,99999);
			$usern1=$maxid+$rn;
			$billno1="CPI".$usern1;
        $data=array(
           "exp_id"=>$this->input->post('expName'),
           "sub_exp_id" =>$this->input->post('expenditurer'),
           "valid_id"=>$this->input->post('empId'),
           "pay_date" =>$this->input->post('pdate'),
           "reason" => $this->input->post('reason'),
           "amount" =>$this->input->post('amount'),
           "receipt_no" =>$billno1,
           );
            $data1=array(
          "paid_to" =>"Classic Bakery",
           "paid_by"=>$this->input->post('empId'),
           "pay_date" =>$this->input->post('pdate'),
           "status" => 1,
           "dabit_cradit"=>0,
           "pay_mode" => "Cash",
           "reason" => $this->input->post('reason'),
           "amount" =>$this->input->post('amount'),
           "invoice_no" =>$billno1,
           );
           $cash=$this->Daybook->cashPayment($data);
            $daybook=$this->Daybook->ddata($data1);
         
           if($cash && $daybook){
               	redirect("daybookController/invoiceCashPayment/".$billno1);
           }else{
               	redirect("daybookController/cashPayment/fail/");
           }
   }                	
	function expenditure_depart(){
		$expenditure_id = $this->input->post("expenditure_id");
		$this->db->where("exp_id",$expenditure_id);
		$rt = $this->db->get("sub_expenditure");

		?> 
		<option value="0">-Select Sub Expenditure-</option>
		<?php 
		if($rt->num_rows()>0){
			foreach($rt->result() as $row):
			?>  <option value="<?php echo $row->id;?>"><?php echo $row->sub_expenditure_name;?> </option>
			 <?php  endforeach;}
	} 
	
	     
  function directorTransaction(){
      	$this->load->model("Daybook");
		    $tblnm ="cash_payment";
		    $maxid	=	$this->Daybook->cash_max($tblnm);
		    $maxid	=	$maxid+1;
			$billno="4000".$maxid;
			$rn=rand(9999,99999);
			$usern1=$maxid+$rn;
			$billno1="DTI".$usern1;
		    $ac=$this->input->post('action');
			if($ac=="to director"){
			    $status=0;
			}else{
			  $status=1;
			}
		
			$invoice=array(
	            "invoice_Number" => $billno1,
	            "reason" => "2",
	       );
	         $this->db->insert("invoice_serial",$invoice);
	      $last_id=$this->db->insert_id();
      $data=array(
         "id_name" =>$this->input->post('action'),
         "bank_name" =>$this->input->post('bankname'),
         "account_number" =>$this->input->post('account'),
         "valid_id" =>$this->input->post('payeename'),
          "amount" =>$this->input->post('amount'),
          "reason" =>5,
          "pay_date" => date("Y/m/d"),
          "receipt_no" =>$billno1
          );
          $data1=array(
         "paid_by" =>$this->input->post('action'),
        "paid_to" =>$this->input->post('payeename'),
          "amount" =>$this->input->post('amount'),
          "reason" =>5,
          "dabit_cradit" =>$status,
          "pay_date" => date("Y/m/d"),
          "invoice_no" =>$last_id
          );
      $this->load->model('daybook');
      $dt=$this->daybook->directTrans($data);
       $dy=$this->daybook->directTransDaybook($data1);
      if($dt && $dy){
        	redirect("daybookController/invoiceDT/".$billno1);
      }else{
          	redirect("daybookController/dTransaction/fail");
      }
          
  }     
   function invoiceDT(){
         $this->load->view("invoiceDT");
      } 
	//		*******************************END UPASANA CODE*************************************	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
?>