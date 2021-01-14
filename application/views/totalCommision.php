<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
              	<div class="col-12">
                	<div class="card">
                  		<div class="card-header">
                    		<h4><?php echo $smallTitle;?></h4>
                 		 </div>
                  		<div class="card-body">
                  			<div class="col-md-12 col-lg-12 col-xs-12">
                  			    	<form method="post"	action="<?php echo base_url()?>index.php/daybookController/totalCommision" enctype="multipart/Form-data" >
										 <div class="col-md-12 col-lg-12 col-xs-12">
										    <div class="row">
    											<div class="col-xs-6 col-md-6 col-lg-6">
                                                    <div class="form-group row">
    													<div class="col-md-5">
    														<label>AGENT ID<span title="Required" style="color: red;">*</span></label>
    													</div>
    													<div class="col-md-7">
    														<div class="form-group">
    															<input type="text" class="form-control"
    																value="<?php if($val>1){ echo $agInfo->username; } ?>" name="adId"
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
    																id="" style="">
    																<i class="far fa-edit">&nbsp;Submit</i>
    															</button>
    														</div>
    													</div>
    												</div>
    
    							</div>
											</div>
											<?php if($val==1){?>
											 <div class="col-md-12 col-lg-12 col-xs-12">
										           <strong>Wrong Agent Id please try again!</strong>
											</div>
											<?php } ?>
											</div>
											</form>
											<?php if($val > 1){?>
                  				<form method="post"	action="<?php echo base_url()?>index.php/daybookController/totalCommisionReport" enctype="multipart/Form-data" >
                  				    <input type="hidden" value="<?php echo $agInfo->id;?>" name="agid">
                  					<div class="row">
									    <div class="col-xs-12 col-md-12 col-lg-12">
										<div class="form-group row">
											<div class="col-md-6">
												<label>START DATE</label>
												<input type="date" class="form-control"	value="" name="sdate">
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>END DATE</label>
													<input type="date" class="form-control"	value="" name="edate">
												</div>
											</div>
                                        </div>
                                    </div>
                                        <div class="col-xs-12  col-md-12 col-lg-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
													    <button type="submit" class="btn btn-primary" style="margin-left:80%;"><i class="fas fa-check">&nbsp;OK</i></button>
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
</section>
</div>
