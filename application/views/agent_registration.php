<div class="main-content">
	<div class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h4>Add Employee Form</h4>

						</div>
					
							<div class="card-body">
								<div class="row" id="regForm">
									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
										    <?php if($this->uri->segment(3)=="success"){?>
										        <div class="alert alert-success col-md-12 col-lg-12 col-xs-12"> Agent Registration is done successfully!</div>
										    <?php }else{
										    if($this->uri->segment(3)=="false"){?>
										     <div class="alert alert-warning col-md-12 col-lg-12 col-xs-12"> Please Try Again !</div>
										    
										   <?php  }}?>
										   		<div class="col-xs-6 col-md-6 col-lg-6">
												    </div>
										</div> 
										</div>
								<form method="post"	action="<?php echo base_url()?>index.php/apanel/agent_registration" enctype="multipart/Form-data" >
										 <div class="col-md-12 col-lg-12 col-xs-12">
										    <div class="row">
											<div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="form-group row">
													<div class="col-md-4">
														<label>AGENT ID<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-8">
														<div class="form-group">
															<input type="text" class="form-control"
																value="<?if($val>1){ echo $agInfo->username; } ?>" name="adId"
																id="adId" required="required">
														</div>
								
                                         </div>
												</div>


											</div>
											<div class="col-xs-6 col-md-6 col-lg-6" id="rahulcc">
												<div class="form-group row">
												
												</div>

											</div>
											
											<script>
												$("#adId").keyup(function(){
                                    					var adId = $("#adId").val();
                                    				   var agent=1;
                                    					$.post("<?php echo site_url("apanel/checkcc") ?>",{adId : adId,agent: agent}, function(data){
                                    					$("#rahulcc").html(data);
                                    						});
                                    				});
                                    			</script>		
											</div>
											<?php if($val==1){?>
											 <div class="col-md-12 col-lg-12 col-xs-12">
										           <strong>Wrong Agent Id please try again!</strong>
											</div>
											<?php } ?>
											</div>
											</form>
											<?php if($val > 1){?>
										<form method="post"	action="<?php echo base_url()?>index.php/apanel/addAgent" enctype="multipart/Form-data" >
										    <input type="hidden" value="<?php echo $agInfo->id;?>" name="agid">
										  <div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
											<div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-5">
														<label>AGENT NAME<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
															<input type="text" class="form-control"
																value="" name="agname"
																id="" required="required">
														</div>
								
                                         </div>
												</div>


											</div>
												<div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-5">
														<label>FATHER NAME<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
															<input type="text" class="form-control"
																value="" name="fname"
																id="" required="required">
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
                                                														<label>MOTHER NAME<span title="Required" style="color: red;">*</span></label>
                                                													</div>
                                                													<div class="col-md-7">
                                                														<div class="form-group">
                                                															<input type="text" class="form-control"
                                                																value="" name="mname"
                                                																id="" required="required">
                                                														</div>
                                                								
                                                                                         </div>
                                                												</div>
                                                
                                                
                                                											</div>
                                                											<div class="col-xs-6 col-md-6 col-lg-6">
                                                
                                                												<div class="form-group row">
                                                													<div class="col-md-5">
                                                														<label>ADDRESS<span title="Required" style="color: red;">*</span></label>
                                                													</div>
                                                													<div class="col-md-7">
                                                														<div class="form-group">
                                                															<input type="text" class="form-control"
                                                																value="" name="address"
                                                																id="name" required="required">
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
                                                														<label>STATE<span title="Required" style="color: red;">*</span></label>
                                                													</div>
                                                													<div class="col-md-7">
                                                														<div class="form-group">
                                                															
                                                												<select class="form-control" name="state" id="state" value ="">
                                                					                                 <option>--Select State--</option>
                                                					                                 <?php 
                                                													 $this->db->distinct();
                                                													$this->db->select("state");
                                                													$dist=  $this->db->get("city_state");
                                                													foreach($dist->result() as $row):?>
                                                						<option value="<?php echo $row->state;?>"><?php echo $row->state;?></option>
                                                					                                           <?php endforeach;?>
                                                					                                 </select>     
                                                					                                     
                                                										                   
                                                										                    <script>
                                                														$("#state").change(function(){
                                                															var state = $("#state").val();
                                                															//alert(state);
                                                															$.post("<?php echo base_url() ?>index.php/apanel/getCity",{state : state},function(data){
                                                																$("#city").html(data);
                                                															});
                                                														});
                                                
                                                														
                                                														</script>
                                                
                                                														</div>
                                                								
                                                                                         </div>
                                                												</div>
                                                
                                                										</div>
                                                											<div class="col-xs-6 col-md-6 col-lg-6">
                                                
                                                												<div class="form-group row">
                                                													<div class="col-md-5">
                                                														<label>CITY<span title="Required" style="color: red;">*</span></label>
                                                													</div>
                                                													<div class="col-md-7">
                                                														<div class="form-group">
                                                															
                                                								<select id="city" name="city" class="form-control">
                                                								                                 <option>--Select City--</option>
                                                								                                 </select>     
                                                								                                 
                                                								                                    <script type="text/javascript">
                                                
                                                																	$("#city").change(function(){
                                                																		var state = $("#state").val();
                                                																		var city = $("#city").val();
                                                																		//alert(state);
                                                																		$.post("<?php echo base_url() ?>index.php/apanel/getArea",{city : city,state : state},function(data){
                                                																			$("#area").html(data);
                                                																		});
                                                																	});
                                                
                                                																	</script>
                                                
                                                 </div>																	</div>
                                                																	</div>	
                                                
                                                                                         </div>
                                                											
                                                												
                                                										</div>
                                                	</div>
                                                <div class="col-md-12 col-lg-12 col-xs-12">
                                                										<div class="row">
                                                										<div class="col-xs-6 col-md-6 col-lg-6">
                                                
                                                												<div class="form-group row">
                                                													<div class="col-md-5">
                                                														<label>AREA<span title="Required" style="color: red;">*</span></label>
                                                													</div>
                                                													<div class="col-md-7">
                                                														<div class="form-group">
                                                														
                                                																 <select  class="form-control" id="area" name="area" >
                                                                                 <option>--Select Area--</option>
                                                                                 </select>     
                                                														</div>
                                                								
                                                                                         </div>
                                                												</div>
                                                
                                                
                                                											</div>
                                                											<div class="col-xs-6 col-md-6 col-lg-6">
                                                
                                                												<div class="form-group row">
                                                													<div class="col-md-5">
                                                														<label>PIN<span title="Required" style="color: red;">*</span></label>
                                                													</div>
                                                													<div class="col-md-7">
                                                														<div class="form-group">
                                                															<input type="text" class="form-control"	value="" name="pincode"	id="pincode" required="required">
                                                                        										<script>
                                                                                                                $("#area").change(function(){
                                                                                    								var state = $("#state").val();
                                                                                    								var city = $("#city").val();
                                                                                    								var area = $("#area").val();
                                                                                    								//alert(state);
                                                                                    								$.post("<?php echo base_url() ?>index.php/common/getPin",{area : area,city : city,state : state},function(data){
                                                                                    									$("#pincode").val(data);
                                                                                    								});
                                                                                    							});
                                                                                    						</script>
                                                
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
                                                														<label>DATE OF BIRTH<span title="Required" style="color: red;">*</span></label>
                                                													</div>
                                                													<div class="col-md-7">
                                                														<div class="form-group">
                                                															<input type="date" class="form-control"
                                                																value="" name="dob"
                                                																id="name" required="required">
                                                														</div>
                                                								
                                                                                         </div>
                                                												</div>
                                                
                                                
                                                											</div>
                                                											<div class="col-xs-6 col-md-6 col-lg-6">
                                                												<div class="form-group row">
                                                													<div class="col-md-5">
                                                															<label>GENDER</label>
                                                													</div>
                                                													<div class="col-md-7">
                                                														<div class="form-group">
                                                
                                                                    <select class="form-control" id="gender" name="gender"
                                                                      value="" required="required">
                                                                      <option value="">-Select Gender-</option>
                                                                      <option value="1">Male</option>
                                                                      <option value="2">Female</option>
                                                                      <option value="3">Transgender</option>
                                                                     
                                                                    </select>														</div>
                                                								
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
                                                														<label>EMAIL</label>
                                                													</div>
                                                													<div class="col-md-7">
                                                														<div class="form-group">
                                                															<input type="email" class="form-control"
                                                																value="" name="email"
                                                																id="name" >
                                                														</div>
                                                								
                                                                                         </div>
                                                												</div>
                                                
                                                
                                                											</div>
                                                												<div class="col-xs-6 col-md-6 col-lg-6">
                                                
                                                												<div class="form-group row">
                                                													<div class="col-md-5">
                                                														<label>MOBILE NUMBER</label>
                                                													</div>
                                                													<div class="col-md-7">
                                                														<div class="form-group">
                                                															<input type="mob" class="form-control"
                                                																value="" name="mob"
                                                																id="name" >
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
                                                																id="" style="margin-left:700px;">
                                                																<i class="far fa-edit">&nbsp;Submit</i>
                                                															</button>
                                                														</div>
                                                													</div>
                                                												</div>
                                                
                                                											</div>
                                                										</div>
                                                									</div>
</form>
    <?php } ?>
								


							

								</div>
							</div>
					
					</div>
				

				</div>
			</div>
		</div>
	</div>
</div>

