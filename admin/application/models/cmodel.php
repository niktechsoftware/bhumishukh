<?php 
    class Cmodel extends CI_Model{
			
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
        
        	function gettree($id,$tblnm){
	     	    $this->db->where("c_id",$id);
	     	  return  $this->db->get($tblnm);
	     	}
        
        function activestatus($custid,$mpin,$tblnm){
        	$this->db->where("status",0);
        	$this->db->where("username",$custid);
        	$checksv = $this->db->get($tblnm);
        	$this->db->where("status",0);
        	$this->db->where("mpin",$mpin);
        	$checkpinv =  $this->db->get("mpin");
        	if(($checksv->num_rows()>0)&& ($checkpinv->num_rows()>0)){
        		$jid = $checksv->row()->id;
        		$joinerid=$checksv->row()->joiner_id;
        		$this->tree->selectPosition($jid,$joinerid);
        	$arr =array(
        			"status" =>1,
        			"active_date"=>date('Y-m-d H:i:s')
        	);
        
        	$this->db->where("username",$custid);
        	  $this->db->update($tblnm,$arr);
        	  $data = array(
        	  		"status" =>1,
        	  		"active_mpin_date"=>date('Y-m-d H:i:s'),
        	  		"id_active" =>$custid
        	  );
        	 
        	  if(!($checksv->row()->joiner_id==0)){
        	  	$getpg =$checksv->row()->joiner_id;
        	  }else{
        	  	$this->db->limit(1);
        	  	$gty = $this->db->get("silver_tree");
        	  	$getpg = $gty->row()->c_id;
        	  }
        	 
        	  $this->db->where("mpin",$mpin);
        	  $this->db->update("mpin",$data);
        	  $mobile = $checksv->row()->mobilenumber;
        	  $cname =$checksv->row()->employee_iname;
        	  $sms = "Dear Customer ".$cname."Your ID is Successfully Activated.Welcome to Umravati Marketing Pvt.Ltd. http://www.umpl.in.net";
        	  sms($mobile,$sms);
        	  return true;
        	}else{
        		echo " Customer ID Error";
        	}
        }
        
        
        function insertCustomer($data){
            $query =$this->db->insert('employee_info',$data);
            return $query; 
        }
        
        function checkStatus($table,$user){
        	$this->db->where('username',$user);
        	$c_ID=$this->db->get($table);
        	if($c_ID->num_rows()>0){
        		$data = array(
        		'msg' =>  '<div class ="alert alert-success">'.$c_ID->row()->employee_name.'</div>',
        		'checkv'=>true		
        	);
        	}else{
        		$data=array(
        		'msg'=> '<div class ="alert alert-danger">Wrong sponsor UserID. </div>',
        		"checkv"=>false		
        		);
        			}
        			return $data;	
        }
        function checkStatus_pin($table,$user){
        	$this->db->where('username',$user);
        	$data=$this->db->get($table);
        
        			return $data;	
        }
        
        function getrowid($username){
        	$this->db->where("username",$username);
        		$this->db->where("status",1);
        	$getrow = $this->db->get("employee_info")->row()->id;
        	return $getrow;
        }
			function abc($id)
			{
				return $id;
			}
        function getCrecord($id){
        	$this->db->where('id',$id);
        	$record = $this->db->get("employee_info");
        	return $record;
	     	}
		function pay_detail_insert($cust_id,$txn,$reffno)
		{
			$this->db->where("c_id",$cust_id);
			$pyd = $this->db->get("pay_details");
			if($pyd->num_rows()>0){
				$val = array(
						'reffno' => $reffno,
						'transaction' => $txn,
						
				);
				$this->db->where("c_id",$cust_id);
				$insrt = $this->db->update("pay_details",$val);
				return $insrt;
			}else{
			$val = array(
						'c_id' => $cust_id,
						
						'reffno' => $reffno,
						'transaction' => $txn,
						
			);
        	// $this->db->where('id',$id);
        	$insrt = $this->db->insert("pay_details",$val);
        	return $insrt;
			}
		}
		
		//aarju mathods
		function getcustomerdata($matchcon,$status,$tblname){
			if($status==2){
				$req = $this->db->query("select employee_info.id,employee_info.parent_id,employee_info.employee_iname,employee_info.fname,employee_info.status,employee_info.mobilenumber,employee_info.email,employee_info.current_address,employee_info.city,pay_details.reffno,pay_details.transaction,pay_details.uploadfile from employee_info,pay_details where employee_info.id = pay_details.c_id and employee_info.status=0");

				return $req;
			}else{
				$this->db->where($matchcon,$status);
				return  $this->db->get($tblname);
			}
		
		}
		function getpaydetails(){
			return  $this->db->get("pay_details");
		}
		 function getTransaction($cid,$incometype){
		 	$this->db->where("transaction_type",$incometype);
		 	$this->db->where("paid_to",$cid);
		 	$getrecord = $this->db->get("inner_daybook");
		 	return $getrecord;
		 }
		 
		 
    function getGold($cid){
 	$this->db->select_sum("amount");
 			$this->db->where("transaction_type",4);
		 	$this->db->where("paid_to",$cid);
		 	return $this->db->get("inner_daybook");
		 }
		 function getSilver($cid){
		 	$this->db->select_sum("amount");
		 	$this->db->where("transaction_type",1);
		 	$this->db->where("paid_to",$cid);
		 	return $this->db->get("inner_daybook");
		 }
		
		function getDiamond($cid){
			$this->db->select_sum("amount");
		 	$this->db->where("transaction_type",7);
		 	$this->db->where("paid_to",$cid);
		 	return $this->db->get("inner_daybook");
		 }
		 function getCrown($cid){
		 	$this->db->select_sum("amount");
		 	$this->db->where("transaction_type",8);
		 	$this->db->where("paid_to",$cid);
		 	return $this->db->get("inner_daybook");
		 }
		
		 function getDirect($cid){
		     	$this->db->where("c_id",$cid);
		 	return $this->db->get("direct_income");
		 }
		 function getAutoPool($cid){
		     	$this->db->where("c_id",$cid);
		 	return $this->db->get("autopool_details");
		 }
		  function oral_cancer_proforma($data){
		     $oral=	$this->db->insert("oral_cancer_proforma",$data);
		 	return $oral;
		 }
		   function breast_cancer_proforma($data){
		     $breast=	$this->db->insert("breast_cancer_proforma",$data);
		 	return $breast;
		 }
		  function diabetes_proforma($data){
		     $diabetes=	$this->db->insert("diabetes_proforma",$data);
		 	return $diabetes;
		 }
		   function hypertension_proforma($data){
		     $hypertension=	$this->db->insert("hypertension_proforma",$data);
		 	return $hypertension;
		 	
		 }
		    function coronary_proforma($data){
		     $coronary=	$this->db->insert("coronary_proforma",$data);
		 	return $coronary;
		 	
		 }
		 
		
		//aarju mathods
    }

?>