<?php  $uri=$this->uri->segment(4);?>

<div class="main-content">
	<div class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h4>Update KYC Info</h4>

						</div>
						<form method="post"	action="<?php echo base_url()?>index.php/apanel/updateKYCinfo" enctype="multipart/Form-data" >
							<input type="hidden" value="<?php echo $uri;?>" name="agid">
							<div class="card-body">
								<div class="row" id="regForm">
									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
										    <?php if($this->uri->segment(3)=="success"){?>
										        <div class="alert alert-success col-md-12 col-lg-12 col-xs-12"> KYC Info is update successfully!</div>
										    <?php }else{
										    if($this->uri->segment(3)=="false"){?>
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
														<label>AADHAR NUMBER<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
															<input type="text" class="form-control"
																value="" name="aadhar"
																id="" required="required">
														</div>
								
                                         </div>
												</div>


											</div>
												<div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-5">
														<label>AADHAR IMAGE<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
															<input type="file" class="form-control"
																value="" name="aadharimage"
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
														<label>PAN NUMBER<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
															<input type="text" class="form-control"
																value="" name="pannumber"
																id="" required="required">
														</div>
								
                                         </div>
												</div>


											</div>
											<div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													<div class="col-md-5">
														<label>PAN CARD IMAGE<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
															<input type="file" class="form-control"
																value="" name="panimage"
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
														<label>ACCOUNT NUMBER<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
															<input type="text" class="form-control"
																value="" name="accountnum"
																id="" required="required">
														</div>
								
                                         </div>
												</div>


											</div>
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-5">
															<label>PASSBOOK IMAGE</label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
															<input type="file" class="form-control"
																value="" name="passimage"
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
														<label>IFSC CODE<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
															<input type="text" class="form-control"
																value="" name="ifsccd"
																id="" required="required">
														</div>
								
                                         </div>
												</div>


											</div>
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-5">
															<label>BRANCH NAME</label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
															<input type="text" class="form-control"
																value="" name="bname"
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
															<label>UPLOAD YOUR IMAGE</label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
															<input type="file" class="form-control"
																value="" name="agimage"
																id="" required="required">

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
																id=""">
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
					
					</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>

