<?php  $uri= $this->uri->segment(4);

$this->db->where('id',$this->uri->segment(4));
$cp=$this->db->get("customer_info");
$this->db->where("customer_id",$this->uri->segment(4));
 $cplan=$this->db->get("customer_plan");
$this->db->where("id",$cplan->row()->plan_id);
$pn=$this->db->get("plan_name");
$this->db->where("plan_id",$cplan->row()->plan_id);
$ap=$this->db->get("assign_plan");
?>
<div class="main-content">
	<div class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h4>Pay Installment</h4>

						</div>
						<form method="post"	action="<?php echo base_url()?>index.php/customer/paidInstallment" enctype="multipart/Form-data" >
						    <input type="hidden" value="<?php echo $uri; ?>" name="custid">
							<div class="card-body">
								<div class="row" id="regForm">
									<div class="col-md-12 col-lg-12 col-xs-12">
								        <div class="col-md-12 col-lg-12 col-xs-12">
										    <div class="row">
											    <div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-5">
														<label>CUSTOMER ID<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
														    <input  type="hidden" value="<?php if($cp->num_rows()>0){ echo $cp->row()->id; }?>" name="cid">
													        <input type="text" class="form-control"	value="<?php if($cp->num_rows()>0){ echo $cp->row()->username; }?>" id="bondId" name="bondId" readonly required>
														</div>
								
                                         </div>
												</div>


											</div>
											<div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-5">
														<label>CUSTOMER NAME</label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
													<input type="text" class="form-control"	value="<?php if($cp->num_rows()>0){ echo $cp->row()->name; } ?>" id="cname" name="cname" readonly required>
														</div>
								
                                         </div>
												</div>


											</div>
											
											
										   </div>
									     </div>
									        <div class="col-md-12 col-lg-12 col-xs-12">
										    <div class="row">
											    <div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-5">
														<label>FATHER NAME<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
													        <input type="text" class="form-control"	value="<?php if($cp->num_rows()>0){ echo $cp->row()->fname; }?>" id="bondId" name="bondId" readonly required>
														</div>
								
                                         </div>
												</div>


											</div>
											<div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-5">
														<label>AMOUNT</label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
													<input type="text" class="form-control"	value="<?php echo $cplan->row()->installment; ?>" id="amount" name="amount" readonly required>
														</div>
								
                                         </div>
												</div>


											</div>
											
											
										   </div>
									     </div>
									        <div class="col-md-12 col-lg-12 col-xs-12">
										    <div class="row">
											    <div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-5">
														<label>PLAN NAME<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
													         <input type="hidden" value="<?php echo $uri; ?>" name="custid" id="custid">
													        <select name="planname"  class="form-control"	value="" id="planname">
													               <option value="">--Select Plan--</option> 
													            <?php   
													            foreach($pn->result() as $pn):
													            if($cplan->num_rows() > 0){
													            foreach($cplan->result() as $cplan):  ?>
													          
													            <option value="<?php  echo $pn->id; ?>"><?php  echo $pn->Name."(".$cplan->Bond_ID.")"." ".$cplan->house_number; ?></option>   
													            
													            <?php endforeach; } endforeach; ?>
													            
													        </select>
													        
														</div>
								
                                         </div>
												</div>

                          
                            
											</div>
										
											<div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-5">
														<label>HOUSE NUMBER</label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
													<input type="text" class="form-control"	value="<?php  //echo $cplan->house_number; ?>" id="house" name="house" readonly required>
														</div>
								
                                         </div>
												</div>


											</div>
												<div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-5">
														<label>Unit</label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
													<input type="text" class="form-control"	value="<?php  //echo $cplan->house_number; ?>" id="unit" name="unit" readonly required>
														</div>
								
                                         </div>
												</div>


											</div>
											
										   </div>
									     </div>
									        <div class="col-md-12 col-lg-12 col-xs-12">
										    <div class="row">
											    <div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-5">
														<label>SIZE<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
													        <input type="text" class="form-control"	value="<?php //echo $ap->row()->size; ?>" id="size" name="size" readonly required>
														</div>
								
                                         </div>
												</div>


											</div>
											<div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-5">
														<label>DEPOSIT MONTH</label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
													<input type="text" class="form-control"	value="" id="dmonth" name="dmonth" readonly required>
														</div>
								
                                         </div>
												</div>


											</div>
											
											
										   </div>
									     </div>
						                  <div class="col-md-12 col-lg-12 col-xs-12">
										    <div class="row">
											    
												<div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-5">
														<label>DATE<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
															<input type="date" class="form-control"	value="" id="date" name="date" required> 
														</div>
								
                                         </div>
												</div>


											</div>
												<div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-5">
														<label>DESCRIPTION</label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
														<input type="text" class="form-control" value="" name="disc" id="disc" required>
														</div>
								
                                         </div>
												</div>


											</div>
										   </div>
									     </div>
                                          
	<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-5"></div>
													<div class="col-md-7">
														<div class="form-group">
															<button type="submit" class="btn btn-primary"
																id="sub" style="margin-left:600px;">
																<i class="far fa-edit">&nbsp;Submit</i>
															</button>
														</div>
													</div>
												</div>

											</div>

									</div>


								


							

								</div>
							</div>
					
					</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
                                    	<script>
											jQuery(document).ready(function() {
                                                 $("#planname").change(function(){
                                                    	            var planid = $("#planname").val();
                                                    	             var custid = $("#custid").val();
                                                    	            
                                                    	            $.post("<?php echo site_url('customer/getHousebyPlanid') ?>", {planid : planid , custid : custid}, function(data){
                                                    	           //alert(data);
                                                        	var d = jQuery.parseJSON(data);	
                                                	         
                                                	          	    $('#house').val(d.hn);
                                    								$('#size').val(d.size);	
                                           							 $('#unit').val(d.unit_name);
                                           							 $('#dmonth').val(d.month);
                                                	    		});
                                                	        });
                                                	        	  $("#sub").hide();
	 	                                            	$("#disc").keyup(function(){
	 	                                            	   var oth = $("#disc").val();
	 	                                            	  if(oth){
										                     $("#sub").show();
										                  }else{
										                     $("#sub").hide();
										                  }
	 	                                            	});
                                                	        
                                                	        
                                                	        
											});
											</script>