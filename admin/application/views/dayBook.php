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
                  				<form method="post"	action="<?php echo base_url()?>index.php/apanel/dayBookReport" enctype="multipart/Form-data" >
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
                                                 	<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="form-group row">
													
												<div class="col-xs-6 col-md-6 col-lg-6">

												<div class="form-group row">
													
													<div class="col-md-3" Style="margin-left:10%;">
														<div class="form-group">
															BOTH<input type="radio" class="form-control"
																value="2" name="type" checked="checked" style="height:20px; width:20px;">
																
														</div>
													</div>
														<div class="col-md-3">
														<div class="form-group">
															<lebel>CREDIT</lebel>
															<input type="radio" class="form-control"
																value="1" name="type" style="height:20px; width:20px;">
																
														</div>
								
                                                         </div>
                                                         <div class="col-md-4">
                														<div class="form-group">
                															DEBIT<input type="radio" class="form-control"
                																value="0" name="type" required="required" style="height:20px; width:20px;">
                																
                														</div>
                								
                                                         </div>
                												</div>


											</div>
											<div class="col-xs-6  col-md-6 col-lg-6">
                                                    <div class="form-group row">
                                                     <div class="col-md-12">
													
												
                                                    </div>
                                                   
                                                    <div class="col-md-12">
													</br>
													</br>
													<button type="submit" class="btn btn-primary" style="margin-left:50%;"><i class="fas fa-check">&nbsp;OK</i></button>
                										
											
								
                                                    </div> </div>
												</div>
										</div>
									</div>





                                                 


											</div>

											</div>
									</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>
</section>
</div>
