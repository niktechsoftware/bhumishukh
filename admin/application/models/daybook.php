<?php
Class Daybook extends CI_Model{

function getDaybookDetail(){
	$gt=$this->db->get('day_book');
	return $gt;
}
function getdaybookByDate($sdate,$edate,$q){
		if($q==0){
			$res = $this->db->query("SELECT  * FROM day_book where dabit_cradit =1 and DATE(pay_date)>='$sdate' and DATE(pay_date)<='$edate'");
			return $res;
		}
		if($q==1){
			$res = $this->db->query("SELECT  * FROM day_book where dabit_cradit = 0 and DATE(pay_date)>='$sdate' and DATE(pay_date)<='$edate'");
			return $res;
		}
		if($q==2){
			$resd = $this->db->query("SELECT  * FROM day_book where DATE(pay_date)>='".$sdate."' and DATE(pay_date)<=.$edate.");
			$res = $resd;
			return $res;
		}
	}

}
?>