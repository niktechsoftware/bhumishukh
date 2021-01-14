<?php
Class Daybook extends CI_Model{
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//		*******************************UPASANA CODE***************************************** 
function getDaybookDetail(){
	$gt=$this->db->get('day_book');
	return $gt;
}
function getdaybookByDate($sdate,$edate,$q){
    if($q==0){
			$res = $this->db->query("SELECT *  FROM day_book  WHERE dabit_cradit = 0 AND DATE(pay_date)>='".$sdate."' and DATE(pay_date)<='".$edate."'");
			return $res;
		}
		if($q==1){
			$res = $this->db->query("SELECT *  FROM day_book  WHERE  dabit_cradit = 1 AND DATE(pay_date)>='".$sdate."' and DATE(pay_date)<='".$edate."'");
				return $res;
		}
		if($q==2){
			$resd = $this->db->query("SELECT *  FROM day_book  WHERE  DATE(pay_date)>='".$sdate."' and DATE(pay_date)<='".$edate."'");
				$res =$resd;
			return $res;
		}
	

	}
	public function getHousebyPlanid($planid){
		$query = $this->db->query("SELECT * FROM customer_plan WHERE plan_id ='$planid'");
		return $query;
	}
	function getinstllmentByDate($sdate,$edate){
			$res = $this->db->query("SELECT *  FROM day_book  WHERE  reason = 1 AND DATE(pay_date)>='".$sdate."' and DATE(pay_date)<='".$edate."'");
			return $res;
		}
	function getDepositedmonth($custid,$planid){
	    
		$getDepositeMonth = $this->db->query("select sum(day_book.month) as totmonth  from day_book join customer_plan on day_book.invoice_no =  customer_plan.invoice_no where day_book.paid_by ='$custid' AND customer_plan.id='$planid' ");
		return $getDepositeMonth;
	}	
	
function totalCommisionReport($sdate,$edate,$agid){
			$res = $this->db->query("SELECT *  FROM day_book  WHERE  paid_to = '$agid' AND DATE(pay_date)>='".$sdate."' and DATE(pay_date)<='".$edate."'");
			return $res;
		}
	function getdaybookByAgid($agid){
	    $dy=$this->db->query("select sum(amount) as tota from daybook where paid_to='$custid'");
	    return $dy;
	}	
	
	function getSubAgent($refID, $level) {
	    $result = $this->db->query("SELECT * FROM `agent_info` WHERE reff_id = $refID AND id != $refID");
	    $subIDs = array();
	    foreach($result->result() as $value) {
	        array_push($subIDs, $value->id);    
	    }
	    return array(
    	    "Level"=> $level,
    	    "parentID" => $refID,
    	    "subIDs" => $subIDs
        );
	}
	

		function getSubCustomer($refID, $level) {
	    $result = $this->db->query("SELECT * FROM `customer_info` WHERE reff_id = $refID AND id != $refID");
	    $subIDs = array();
	    foreach($result->result() as $value) {
	        array_push($subIDs, $value->id);    
	    }
	    return array(
    	    "Level"=> $level,
    	    "parentID" => $refID,
    	    "subIDs" => $subIDs
        );
	}
	
 function cashPayment($data){
        $this->db->insert('cash_payment',$data);
        return true;
    } 	
		function cash_max($tblnm){
            $this->db->select_max('sno');
						$this->db->from($tblnm);
						$maxid=$this->db->get();
						if($maxid->num_rows()>0){
			      	return $maxid->row()->sno;
						}else{
							return 1; 
						}
        }
        	function directTrans($data){
	    $this->db->insert('cash_payment',$data);
	    return true;
	}
		function directTransDaybook($data1){
	    $this->db->insert('day_book',$data1);
	    return true;
	}
	//		*******************************END UPASANA CODE*************************************	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
?>