
<div class="main-content">
	<div class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h4>Update KYC Details</h4>
						</div>
						<form method="post"	action="<?php echo base_url()?>index.php/apanel/matchid" enctype="multipart/Form-data" >
							<div class="card-body">
								<div class="row" id="regForm">
									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
										    <?php if($this->uri->segment(3)=="false"){?>
										        <div class="alert alert-danger col-md-12 col-lg-12 col-xs-12"> Wrong Username Please Try Again !!</div>
										    <?php } ?>
										   		<div class="col-xs-6 col-md-6 col-lg-6">
												    </div>
										</div> 
										</div>
									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3">
														<label>Enter Agent ID<span title="Required" style="color: red;">*</span></label>
													</div>
													<div class="col-md-9">
														<div class="form-group">
															<input type="text" class="form-control"
																value="" name="username"
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
                                    				   
                                    					$.post("<?php echo site_url("apanel/checkcc") ?>",{adId : adId}, function(data){
                                    					$("#rahulcc").html(data);
                                    						});
                                    				});
                                    			</script>	
							</div>
						</div>
				</form>
			</div>
		</div>
	