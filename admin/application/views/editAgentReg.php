<?php $uri=$this->uri->segment('3');?>
<?php if($uri){
$this->db->where("id",$uri);
$aginfo=$this->db->get('agent_info');
	?>
<div class="main-content">
	<div class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h4>Update Employee Form</h4>

						</div>
						<form method="post"	action="<?php echo base_url()?>index.php/apanel/editAgent" enctype="multipart/Form-data" >
							<input type="hidden" value="<?php echo $uri; ?>" name="uriid">
							<div class="card-body">
								<div class="row" id="regForm">
									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
										    <?php if($this->uri->segment(4)=="success"){?>
										        <div class="alert alert-success col-md-12 col-lg-12 col-xs-12"> Agent Registration is update successfully!</div>
										    <?php }else{
										    if($this->uri->segment(4)=="false"){?>
										     <div class="alert alert-warning col-md-12 col-lg-12 col-xs-12"> Please Try Again !</div>
										    
										   <?php  }}?>
										   		<div class="col-xs-6 col-md-6 col-lg-6">
												    </div>
										</div> 
										</div>
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
																value="<?php echo $aginfo->row()->name;?>" name="agname"
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
																value="<?php echo $aginfo->row()->fname;?>" name="fname"
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
																value="<?php echo $aginfo->row()->mname;?>" name="mname"
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
																value="<?php echo $aginfo->row()->address;?>" name="address"
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
															
												<select class="form-control" name="state" id="state" value ="<?php echo $aginfo->row()->state;?>">
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
															
								<select id="city" name="city" value="<?php echo $aginfo->row()->city;?>" class="form-control">
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
														
																 <select class="form-control" id="area" name="area"  value="<?php echo $aginfo->row()->area;?>">
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
															<input type="text" class="form-control"	value="<?php echo $aginfo->row()->pin;?>" name="pincode"	id="pincode" required="required">
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
																value="<?php echo $aginfo->row()->dob;?>" name="dob"
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
																value="<?php echo $aginfo->row()->email;?>" name="email"
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
															<input type="text" class="form-control"
																value="<?php echo $aginfo->row()->mobile;?>" name="mob"
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
																<i class="far fa-edit">&nbsp;Update</i>
															</button>
														</div>
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
<?php } ?>