<?php echo $uri= $this->uri->segment(4);?>
<div class="main-content">
	<div class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h4>Assign Plan</h4>

						</div>
						<form method="post"	action="<?php echo base_url()?>index.php/customer/assignCustPlan" enctype="multipart/Form-data" >
						    <input type="hidden" value="<?php echo $uri; ?>" name="custid">
							<div class="card-body">
								<div class="row" id="regForm">
									<div class="col-md-12 col-lg-12 col-xs-12">
									<!--	<div class="row">-->
										    <?php //if($this->uri->segment(3)=="success"){?>
									<!--	        <div class="alert alert-success col-md-12 col-lg-12 col-xs-12"> Employee Registration is done successfully!</div>-->
										    <?php //}else{
										    //if($this->uri->segment(3)){?>
									<!--	     <div class="alert alert-warning col-md-12 col-lg-12 col-xs-12"> Please Try Again !</div>-->
										    
										   <?php // }}?>
									<!--			<div class="col-xs-6 col-md-6 col-lg-6">-->
									<!--			    </div>-->
									<!--	</div> -->
									<!--	</div>-->
										  <div class="col-md-12 col-lg-12 col-xs-12">
										    <div class="row">
											    <div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-5">
														<label>ASSIGN PLAN<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
														<select class="form-control" name="plan" id="plan" value ="">
            					                                 <option>--Select Plan--</option>
            					                                 <?php 	$plan=  $this->db->get("assign_plan");
                    													foreach($plan->result() as $row):
                    													$this->db->where("id",$row->plan_id);
                    													$pname=$this->db->get("plan_name");
                    													foreach($pname->result() as $pname):?>
                    					                            	<option value="<?php echo $pname->id;?>"><?php echo $pname->Name;?></option>
            					                                 <?php endforeach;
            					                                 endforeach; ?>
					                                         </select>
														</div>
								
                                         </div>
												</div>


											</div>
												<div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-5">
														<label>SELECT SIZE<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
															<select class="form-control" name="size" id="size" value ="" required>
            					                                <!-- <option>--Select Size--</option>
            					                                 <?php 	//$plan=  $this->db->get("assign_plan");
                    												// 	foreach($plan->result() as $row):?>
                    												    <option value="<?php echo $row->id;?>"><?php echo $row->size;?></option>-->
            					                                 <?php //endforeach;?>
					                                         </select> 
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
														<label>AMOUNT</label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
													<input type="text" class="form-control"	value="" id="amount" name="amount" required>
														</div>
								
                                         </div>
												</div>


											</div>
												<div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-5">
														<label>HOUSE/LAND NO.</label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
														<input type="text" class="form-control" value="" name="landno" required>
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
														<label>ADVANCED</label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
													<input type="text" class="form-control"	value="" name="advance" id="advance" required>
														</div>
								
                                         </div>
												</div>


											</div>
											  <div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-5">
														<label>REMAINING AMOUNT</label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
													<input type="text" class="form-control"	value="" name="rem" id="rem" required>
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
														<label>YEAR</label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
														<select class="form-control" value="" name="year" id="year" required>
														    <option value="">--Select Year--</option>
														    <option value="5">5 Years</option>
														     <!--<option value="5.6">5 Year 6 Month</option>-->
														    <option value="6">6 Years</option>
														      <option value="7">7 Years</option>
														</select>    
														</div>
								
                                         </div>
												</div>


											</div>
											<div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-5">
														<label></label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
														<select class="form-control" value="" name="year" id="year" required>
														    <option value="">--Select --</option>
														    <option value="1">Monthly</option>
														     <!--<option value="5.6">5 Year 6 Month</option>-->
														    <option value="2">Quarterly</option>
														      <option value="3">Yearly</option>
														</select>    
														</div>
								
                                         </div>
												</div>


											</div>
											    <div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-5">
														<label>INSTALLMENT AMOUNT</label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
													<input type="text" class="form-control"	value="" name="installamount" id="installamount" required>
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
	    $("#sub").hide();
	    $("#size").change(function(){
             var size = $("#size").val();
             $.post("<?php echo site_url('customer/getAmount')?>", {size : size}, function(data){
             $("#amount").val(data);
    	    });
        });
        
        $("#year").change(function(){
            var year = $("#year").val();
            var month = 12;
            var bal = $("#rem").val();
            var a= month*year;
            var b= bal/a;
            document.getElementById('installamount').value=b;
            $("#sub").show();
        });
        
        $('input#advance').keyup(function(){
          	var name = $('#amount').val();
            var name1 = $('#advance').val();
            var a = name - name1;
            document.getElementById('rem').value=a;
		});
		
		 $("#plan").change(function(){
           // var size = $("#size").val();
             var plan = $("#plan").val();
           // alert(plan);
            //alert(size);
            $.post("<?php echo site_url('customer/getSizebyPlanname') ?>", {plan:plan}, function(data){
             //alert(data);
         $("#size").html(data);

    	               
    	    		});
    	        });
	});
</script>
