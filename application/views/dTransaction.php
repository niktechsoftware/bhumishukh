<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4><?php echo $smallTitle;?></h4>
                  </div>
                 
                  <div class="card-body">
                     	<form method="post"	action="<?php echo base_url()?>daybookController/directorTransaction" enctype="multipart/Form-data" >
							<div class="card-body">
								<div class="row" id="regForm">
									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
										    <?php if($this->uri->segment(3)=="success"){?>
										        <div class="alert alert-success col-md-12 col-lg-12 col-xs-12">Transaction is successfully done!</div>
										    <?php }?>
										   <div class="col-xs-6 col-md-6 col-lg-6">
											   	<div class="form-group row">
													<div class="col-md-3"><label>Action</label></div>
													<div class="col-md-7">
													    <div class="form-group">
                                  <select required="required" name ="action"  id=""  class="form-control">
                                                      <option value="">--Select--</option>
                                                        <option value = "to director" >Handover To Director</option>
                                                            <option value = "from director" >Received From Director</option>
                                                    
                                       </select>
														</div>
								                    </div>
												</div>
                                        </div>
                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                        <div class="form-group row">
                                            <div class="col-md-3"><label>Bank Name</label></div>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                     <input type="text" class="form-control" name="bankname">
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
													<div class="col-md-3"><label>Account Number</label></div>
													<div class="col-md-7">
													    <div class="form-group">
                                                         <input type="text" class="form-control" name="account">
														</div>
								                    </div>
												</div>
                                        </div>
                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                       <div class="form-group row">
                                          <div class="col-md-3"><label>Paid To</label></div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                     <input type="text" class="form-control" name="payeename">
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
                                          <div class="col-md-3"><label>Amount</label></div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                     <input type="text" class="form-control" name="amount">
                                                </div>
                                            </div>
                                        </div>
                                     </div>  
                                      <div class="col-xs-6 col-md-6 col-lg-6">
											   	<div class="form-group row">
													<div class="col-md-3"><label>Reason</label></div>
													<div class="col-md-7">
													    <div class="form-group">
                                                       <textarea name="reason" class="form-control"></textarea>
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
															<button type="submit" class="btn btn-primary" style="margin-left:700px;">
																<i class="far fa-edit">&nbsp;Submit</i>
															</button>
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
        </div>
   	</div>
</div>
