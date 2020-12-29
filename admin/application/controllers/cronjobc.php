<?php 
class cronjobc extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model("tree");
		$this->load->model('cmodel');
		$this->load->model("mpinmodel");
	}
	
    function directIncome($cid){
    	
    	$d11= $this->db->query("select * from silver_tree where  silver_tree.rightjoiner='$cid'")->num_rows();
    	$d12=$this->db->query("select * from silver_tree where  silver_tree.leftjoiner='$cid' ")->num_rows();
    	$directleft=$d11+$d12;
    	if($directleft>1){
    	    $this->db->where("c_id",$cid);
    	    $getml = $this->db->get("silver_mbalance");
    	    if($getml->row()->level==0){
    	        $updaterc['leveldate'] =date('Y-m-d');
    	        $this->db->where("c_id",$cid);
    	     $this->db->update("silver_mbalance", $updaterc);
    	     $this->db->where("c_id",$cid);
    	    $getml = $this->db->get("silver_mbalance");
    	    }
    	
    	$this->db->where('c_id', $cid);
    	$query2 = $this->db->get('silver_tree');
    	$cor=0;
    	$righttotal=0;
    	$lefttotal=0;
    	$tptpairt = 0;
    	$levelcdate = date("Y-m-d",strtotime($getml->row()->leveldate));
    	if($query2->num_rows()>0){
    		$query2=$query2->row();
    		if($query2->right){
    			$this->db->where("id",$query2->right);
    			$data1 = $this->db->get("customer_info")->row();
    			$acivedate = date("Y-m-d",strtotime($data1->active_date));
    			if(($data1->status)&& ($acivedate >= $levelcdate)){
    				$cor=$cor+1;
    				// echo $query2->right;
    			}
    			 
    			$righttotal =$this->tree->getLeftCountData($query2->right,$cor,"silver_tree",$levelcdate);
    		}
    		if($query2->left){
    		    
    			$this->db->where("id",$query2->left);
    			$data1 = $this->db->get("customer_info")->row();
    			$acivedate = date("Y-m-d",strtotime($data1->active_date));
    			if(($data1->status) && ($acivedate >= $levelcdate)) {
    				$cor=$cor+1;
    				// echo $query2->right;
    			}
    			 
    			$lefttotal =$this->tree->getLeftCountData($query2->left,$cor,"silver_tree",$levelcdate);
    		}
    		if($lefttotal>$righttotal){
    		    $tptpairt=$righttotal;
    		}else{
    		    if($lefttotal<$righttotal){
    		         $tptpairt=$lefttotal;
    		    }else{
    		        $tptpairt=$righttotal;
    		    }
    		}
    		
    	}
    	echo $directleft."-".$tptpairt."<br>";
    	$oldmbal = 0;
    	if($getml->num_rows()>0){
    		$mlevel =$getml->row()->level;
    		$oldmbal=$getml->row()->amount;
    	}else{
    		$datad["c_id"]=$cid;
    		$this->db->insert("silver_mbalance",$datad);
    		$mlevel=0;
    	}
    	if($mlevel>0){
    		$this->db->select_sum("rightt");
    		$this->db->where("level < ",$mlevel+1);
    		$obesr = $this->db->get("direct_income_master");
    		
    		$this->db->select_sum("direct");
    		$this->db->where("level < ",$mlevel+1);
    		$obesd = $this->db->get("direct_income_master");
    		
    		$directleft=$directleft-$obesd->row()->direct;
    		$tptpairt=$tptpairt-$obesr->row()->rightt;
    		
    	}
    	$this->db->where("level >",$mlevel);
    	$getd = $this->db->get("direct_income_master");
    	echo $directleft."-".$tptpairt."<br>";
    	foreach($getd->result() as $dim):
    	if($tptpairt >= $dim->rightt){
    		$upl["level"]=$dim->level;
    		$this->db->where("c_id",$cid);
    		$this->db->update("silver_mbalance",$upl);
    		echo "updated level";
    		if($directleft >= $dim->direct){
    			$upl['amount']=$oldmbal+$dim->income;
    				$tblnm="invoice_serial";
    	            $maxid=$this->mpinmodel->max_invoice($tblnm)+1;
    	           
    	            $invoice_number=$maxid;
    	            
    	            	$invoice=array(
			"invoice_no"=>$invoice_number,
			"reason"=>"Direct Income",
			"invoice_date"=>date('Y-m-d H:i:s'),
			"c_id" =>$cid
		);
		$this->db->insert("invoice_serial",$invoice);
		
		
		
    			$daybookdata = array(
    			        "invoice_no"=>$invoice_number,
    			        "paid_to"=>$cid,
    			        "paid_from"=>"System",
    			        "transaction_type"=>1,
    			        "debit_credit"=>1,
    			        "date1"=>date("Y-m-d H:s:i"),
    			        "amount"=>$dim->income
    			    
    			    );
    			    
    			    $this->db->insert("inner_daybook",$daybookdata);
    		}
    		$this->db->where("c_id",$cid);
    		$this->db->update("silver_mbalance",$upl);
    			echo "updated level 123";
    		$tptpairt=$tptpairt-$dim->rightt;
    		$directleft=$directleft-$dim->direct;
    	}
    	if($tptpairt < $dim->rightt){
    		break;
    	}
    	endforeach;
    	}
    
    } 
    
    
    function pairMachingIncome($cid){
         echo "<br>pair maching of ".$cid."<br>";
        $pair=0;
        $co=0;
        $count1=0;
        $cor=0;
       $lefttotal=0;
       $righttotal=0;
       $table="silver_tree";
       $posl="leftjoiner";
       //count left and right
      $this->db->where('c_id', $cid);
       $query2 = $this->db->get('silver_tree');
       if($query2->num_rows()>0){
            $query2=$query2->row();
            
            
       if($query2->left){
           $this->db->where("id",$query2->left);
           $data1 = $this->db->get("customer_info")->row();
           if($data1->status){
               $co=$co+1;

               //echo $query2->right;

           }
        $lefttotal =$this->tree->getLeftCountData($query2->left,$co,$table);
       }
       
      
       if($query2->right){
           $this->db->where("id",$query2->right);
           $data1 = $this->db->get("customer_info")->row();
           if($data1->status){
               $cor=$cor+1;
              // echo $query2->right;
           }
           
           $righttotal =$this->tree->getLeftCountData($query2->right,$cor,$table);
       }
       }
       echo "left=".$lefttotal."<br>";
       echo "right=".$righttotal."<br>";
      $leftjoin= $lefttotal;
      $rightjoin= $righttotal;
      //invoice code
      	$tblnm="invoice_serial";
		$maxid=$this->mpinmodel->pin_max($tblnm)+1;
		$id1=1000+$maxid;
		$invoice_number="UMAI".$id1;
		//end invoice code
		
        if($rightjoin==$leftjoin){
            $pair=$leftjoin;
          
        }else{
            if($rightjoin > $leftjoin){
             $pair=$leftjoin;
        }else{
            $pair=$rightjoin;
        }}
        echo "<br>pair =".$pair;
        $cps = 	$this->tree->getPair("pair_caping",$cid);
       $getoldPair =  $this->tree->getPair("silver_mbalance",$cid);
       if($getoldPair->num_rows()>0){
       	
       }else{
       	$silverentry=array(
       			"c_id"=>$cid,
       			"pair"=>0,
       			"amount"=>0
       	);
       	$this->tree->insert("silver_mbalance",$silverentry);
       
       }
       	$getoldPair =  $this->tree->getPair("silver_mbalance",$cid);
       if($cps->num_rows()>0){
       $rewardPair = ($pair-($getoldPair->row()->pair+$cps->row()->pair));
       }else{
       	
       	$rewardPair = ($pair-($getoldPair->row()->pair));
       }
        if($rewardPair > 0){
            if($rewardPair > 3){
              
            	$caping = $rewardPair-3;
            	//capping
            	if($caping>0){
            	$daybookCapping = array(
            			"invoice_no"    =>$invoice_number,
            			"paid_to"	        =>$cid,
            			"paid_from"     =>$cid,
            			"transaction_type"=>8,
            			"date1"         =>date('Y-m-d H:i:s'),
            			"amount"           =>((($caping*600)))
            	);
            	$this->db->insert("inner_daybook",$daybookCapping);
            	
            	            		$invoice=array(
			"invoice_no"=>$invoice_number,
			"reason"=>"pair Capping",
			"invoice_date"=>date('Y-m-d H:i:s')
		);
		$this->db->insert("invoice_serial",$invoice);
		
		
            $cps = 	$this->tree->getPair("pair_caping",$cid);
            if($cps->num_rows()>0){
                 $bincapping=array(
                  "pair"=>$cps->row()->pair + $caping,
                  "amount"=>$cps->row()->amount+ ($caping*600)
                   );  
                  $this->tree->update("pair_caping",$bincapping,$cid);
                  
                  
            	
            }else{
                 $bincapping=array("c_id"=>$cid,
                   "pair"=> $caping,
                    "amount"=> ($caping*600)
                     );  
                 $this->tree->insert("pair_caping",$bincapping,$cid);
                 
                 

            }}
            //capping
            $rewardPair=3;
            }
            
            $totsilverpair =$getoldPair->row()->pair + $rewardPair;
            if($getoldPair->row()->pair > 14){
            	$addamount  = $rewardPair*600;
            }else{
            	$addamount  = ($rewardPair*600)/2;
            }
            //update silver
            $daybooksilver = array(
            		"invoice_no"    =>$invoice_number,
            		"paid_to"	        =>$cid,
            		"paid_from"     =>"UMAAdmin",
            		"transaction_type"=>1,
            		"date1"         =>date('Y-m-d H:i:s'),
            		"amount"           =>$addamount
            );
            $this->db->insert("inner_daybook",$daybooksilver);
            $invoice=array(
			"invoice_no"=>$invoice_number,
			"reason"=>"pair silver +upgrade",
			"invoice_date"=>date('Y-m-d H:i:s')
		);
		$this->db->insert("invoice_serial",$invoice);
		
            
            
            $ramount = $getoldPair->row()->amount+ $addamount;
            $binaryincome=array(
            		"pair"=>$totsilverpair,
            		"amount"=>$ramount
            );
            $this->tree->update("silver_mbalance",$binaryincome,$cid);
            
            //update silver
           // for gold
           $getsilverPair =  $this->tree->getPair("silver_mbalance",$cid)->row();
           $this->db->where("c_id",$cid);
           $this->db->delete("gold_mbalance");
           $uppair =$getsilverPair->pair;
           if(($uppair > 14)&&($uppair < 43))
           {
          
          
           
           	//update diamond
           	$this->db->where("c_id",$cid);
           	$this->db->delete("diamond_mbalance");
           	if($uppair > 14){
           		
           		if($uppair < 14){
           			$binaryincome=array(
           					 
           					"c_id"=>$cid,
           					"pair"=>$uppair,
           					"amount"=>$uppair*900
           			);
           			$this->tree->insert("gold_mbalance",$binaryincome,$cid);
           		}else{
           			$gpu =14;
           			$binaryincome=array(
           					 
           					"c_id"=>$cid,
           					"pair"=>$gpu,
           					"amount"=>$gpu*900
           			);
           			$this->tree->insert("gold_mbalance",$binaryincome,$cid);
           			$uppair=$uppair-14;
           		}
           		
           		
           		if($uppair > 14){
           			
           			if($uppair < 14){
           				$binaryincome=array(
           						"c_id"=>$cid,
           						"pair"=>$uppair,
           						"amount"=>$uppair*3000
           				);
           				$this->tree->insert("diamond_mbalance",$binaryincome,$cid);
           			}else{
           				$binaryincome=array(
           						"c_id"=>$cid,
           						"pair"=>14,
           						"amount"=>14*3000
           				);
           				$this->tree->insert("diamond_mbalance",$binaryincome,$cid);
           				$uppair=$uppair-14;
           			}
           			if($uppair > 0){
           			$this->db->where("c_id",$cid);
           			$this->db->delete("crown_mbalance");
           			$binaryincome=array(
           					"c_id"=>$cid,
           					"pair"=>$uppair,
           					"amount"=>($uppair * 20000)
           			);
           			$this->tree->insert("crown_mbalance",$binaryincome,$cid);
           			}
           		}
           		
           		
        }   
            
    	}  
        }  }
  public function poolIncome($cid){
    	  $pair=0;
			
        $co=0;
        $count1=0;
        $cor=0;
       $lefttotal=0;
       $righttotal=0;
       $table="silver_tree";
       $posl="leftjoiner";
     
         	$lefttotal=$this->db->query("select * from silver_tree where  silver_tree.leftjoiner='$cid' ");
             $righttotal= $this->db->query("select * from silver_tree where  silver_tree.rightjoiner='$cid'");
  
      $leftjoin= $lefttotal->num_rows();
      $rightjoin= $righttotal->num_rows();
      $totaljoin =$leftjoin +$rightjoin;
      
     
      	$tblnm="invoice_serial";
		$maxid=$this->mpinmodel->max_invoice($tblnm)+1;
		$id1=1000+$maxid;
		$invoice_number="UMPL".$id1;
		$leveln=0;
		
		if(($totaljoin>2)){
		    	$this->db->where("c_id",$cid);
    			$fty4 =$this->db->get("autopool_details");
		   
			if($fty4->num_rows() > 0){
			    
				$giveamoun = $this->tree->getautopoolamount($lefttotal,$righttotal,$fty4->row()->level,$cid);
			if($giveamoun){     $this->tree->updatepoolamount($fty4->row()->level,$cid);
			}
			$main=0; $lev=0;	foreach($lefttotal->result() as $row):
				        $this->db->where("c_id",$row->c_id);
				      $checkid =  $this->db->get("autopool_details");
				        if($checkid->num_rows()>0){
				            $checkid=$checkid->row();
				            $main++; 
				                	$lefttotal=$this->db->query("select * from silver_tree where  silver_tree.leftjoiner='$checkid->c_id' ");
                                    $righttotal= $this->db->query("select * from silver_tree where  silver_tree.rightjoiner='$checkid->c_id'");
                                    foreach($lefttotal->result() as $row):
                    				        $this->db->where("c_id",$row->c_id);
                    				      $checkid =  $this->db->get("autopool_details");
                    				        if($checkid->num_rows()>0){
                    				            $lev++;
                    				            }else{
                            				            
                            				        }
                            				    endforeach;
                            				     foreach($righttotal->result() as $row):
                    				        $this->db->where("c_id",$row->c_id);
                    				      $checkid =  $this->db->get("autopool_details");
                    				        if($checkid->num_rows()>0){
                    				            $lev++;
                    				            }else{
                            				            
                            				        }
                            				    endforeach;
				        }else{
				            
				        }
				    endforeach;
				    
				    foreach($righttotal->result() as $row):
				        $this->db->where("c_id",$row->c_id);
				      $checkid =  $this->db->get("autopool_details");
				        if($checkid->num_rows()>0){
				            $checkid=$checkid->row();
				            $main++; 
				                	$lefttotal=$this->db->query("select * from silver_tree where  silver_tree.leftjoiner='$checkid->c_id' ");
                                    $righttotal= $this->db->query("select * from silver_tree where  silver_tree.rightjoiner='$checkid->c_id'");
                                    foreach($lefttotal->result() as $row):
                    				        $this->db->where("c_id",$row->c_id);
                    				      $checkid =  $this->db->get("autopool_details");
                    				        if($checkid->num_rows()>0){
                    				            $lev++;
                    				            }else{
                            				            
                            				        }
                            				    endforeach;
                            				     foreach($righttotal->result() as $row):
                    				        $this->db->where("c_id",$row->c_id);
                    				      $checkid =  $this->db->get("autopool_details");
                    				        if($checkid->num_rows()>0){
                    				            $lev++;
                    				            }else{
                            				            
                            				        }
                            				    endforeach;
				        }else{
				            
				        }
				        
				        
				        
				    endforeach;
				    
				   if($main>1 && $lev >7 ) {
				       $this->tree->updatepoolamount($fty4->row()->level,$cid);
				   }
				    
				}else{
				    $dataa =array(
    				"c_id" =>$cid,
    				"level"	=>0,
    				"pool_income"	=>0,
    				"roi_income"	=>0,
    				"date"	=>date("Y-m-d H:i:s")
    		);
    		$this->db->insert("autopool_details",$dataa);
    		$this->tree->getautopoolamount($lefttotal,$righttotal,0,$cid);
				}
			}
		
     }
    
      public function roiincome($cid){
      	  $date2  = date('Y-m-d');
      	 $totroi =  $this->tree->getroitot();
          $date1  =date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $date2) ) ));
          $daytotal = $this->db->query("select * from customer_info where DATE(active_date) = '$date1' ")->num_rows();
          $d10= $this->db->query("select * from silver_tree where  silver_tree.rightjoiner='$cid' and DATE(silver_tree.rightjoiner_date) < '$date1'")->num_rows();
    	$d12=$this->db->query("select * from silver_tree where  silver_tree.leftjoiner='$cid' and DATE(silver_tree.leftjoiner_date) < '$date1' ")->num_rows(); 
    	$d11=$d10+$d12;
    	 echo "totalid".$daytotal;
          if($totroi>0){
          $oneperson = ($daytotal*10/$totroi);
          }else{
             $oneperson=0; 
          }
          if($d11 > 9){
             
          $this->db->where("c_id",$cid);
         $smd =  $this->db->get("silver_mbalance")->row()->roiamount;
         if(($smd < 150000)&&($oneperson > 0)){
             $upd = array(
                 "roiamount"=>$smd+$oneperson
                 );
                 $this->db->where("c_id",$cid);
                 $this->db->update("silver_mbalance",$upd);
                 
                 ////
                 	$tblnm="invoice_serial";
    	            $maxid=$this->mpinmodel->max_invoice($tblnm)+1;
    	           
    	            $invoice_number=$maxid;
    	            
    	            	$invoice=array(
			"invoice_no"=>$invoice_number,
			"reason"=>"roi Income",
			"invoice_date"=>date('Y-m-d H:i:s'),
			"c_id" =>$cid
		);
		$this->db->insert("invoice_serial",$invoice);
		
		
		
    			$daybookdata = array(
    			        "invoice_no"=>$invoice_number,
    			        "paid_to"=>$cid,
    			        "paid_from"=>"System",
    			        "transaction_type"=>4,
    			        "debit_credit"=>1,
    			        "date1"=>date("Y-m-d H:s:i"),
    			        "amount"=>$oneperson
    			    
    			    );
    			    
    			    $this->db->insert("inner_daybook",$daybookdata);
                 ////
                 
         }
           
          }
          }
		
		
		public function updatelevel(){
			$fty1 =$this->db->get("autopool_details");
			if($fty1->num_rows()>0){
				foreach($fty1->result() as $fty):
				$this->db->where("c_id",$fty->c_id);
				$cyp  =$this->db->get("autopool_details")->row();
			if(($cyp->left)&&($cyp->mid)&&($cyp->right)){
				$count=1;
				$count1=1;
				$count2=1;
				$left = $this->tree->getPoolCountData($cyp->left,$count);
				$mid = $this->tree->getPoolCountData($cyp->mid,$count1);
				$right =$this->tree->getPoolCountData($cyp->right,$count2);
				$aumaster=$this->db->get("auto_pool");
			
				$newp=$left+$mid+$right;
				echo "total ".$fty->c_id."-".$newp."<br> ";
				foreach($aumaster->result() as $amp):
				if($amp->person_no > $newp){
					$leveln =$amp->id;
					break;
				}
				endforeach;
			
				$this->db->select_sum("pool_amount");
				$this->db->where("id <",$leveln);
				$paisa = $this->db->get("auto_pool");
				$dup = array(
						"level"=>$leveln-1,
						"pool_income"=>	$paisa->row()->pool_amount
				);
				$this->db->where("c_id",$fty->c_id);
				$this->db->update("autopool_details",$dup);
					$tblnm="invoice_serial";
    	            $maxid=$this->mpinmodel->max_invoice($tblnm)+1;
    	           
    	            $invoice_number=$maxid;
    	            
    	            	$invoice=array(
			"invoice_no"=>$invoice_number,
			"reason"=>"Auto Pool",
			"invoice_date"=>date('Y-m-d H:i:s'),
			"c_id" =>$fty->c_id
		);
		$this->db->insert("invoice_serial",$invoice);
		
		
		
    			$daybookdata = array(
    			        "invoice_no"=>$invoice_number,
    			        "paid_to"=>$fty->c_id,
    			        "paid_from"=>"System",
    			        "transaction_type"=>2,
    			        "debit_credit"=>1,
    			        "date1"=>date("Y-m-d H:s:i"),
    			        "amount"=>$paisa->row()->pool_amount
    			    
    			    );
    			    
    			    $this->db->insert("inner_daybook",$daybookdata);
				
			}
			endforeach;
		}
		}
    
    function generate_income(){
         date_default_timezone_set('Asia/Kolkata');
        $number ="8382829593";
        $msg ="Cron generated";
       sms($number,$msg);
       $this->db->where("status",1);
       $getCustomer = $this->db->get("customer_info");
       if($getCustomer->num_rows()>0){
           
        foreach($getCustomer->result() as $gc):
            //echo $gc->id;
       $this->directIncome($gc->id);
         $this->poolIncome($gc->id);
       $this->roiincome($gc->id);
        endforeach;
      
          //$this->updatelevel();
         
       }

    }
    
}