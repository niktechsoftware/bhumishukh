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
                     	<form method="post"	action="<?php echo base_url()?>apanel/createPlanSave" enctype="multipart/Form-data" >
							<div class="card-body">
								<div class="row" id="regForm">
								    	<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
										    <?php if($this->uri->segment(3)=="success"){?>
										        <div class="alert alert-success col-md-12 col-lg-12 col-xs-12">Plan Name is created successfully!</div>
										    <?php }else{
										    if($this->uri->segment(3)=="false"){?>
										     <div class="alert alert-danger col-md-12 col-lg-12 col-xs-12"> Please Try Again !</div>
										    
										   <?php  }}?>
										   		<div class="col-xs-6 col-md-6 col-lg-6">
												    </div>
										</div> 
										</div>
								    <div class="col-md-12 col-lg-12 col-xs-12">
                    			    	<div class="row">
                                          <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="form-group row">
                                              <div class="col-md-3"><label>INR (Rs./)</label></div>
                                              <div class="col-md-7">
                                                  <div class="form-group">
                                                    	<select class="form-control" name="inrv" id="inrv" required="required">
                                                			<option>--Select Rupees--</option>       
                                                			<option value="1">1</option>
                                                		 </select>
                                                  </div>
                                               </div>
                                            </div>
                                          </div>
                                           <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="form-group row">
                                              <div class="col-md-3"><label>Business Valuem</label></div>
                                              <div class="col-md-7">
                                                  <div class="form-group">
                                                     <input type="text" name ="bv" id ="bv" class="form-control" required="required" >
                                                  </div>
                                               </div>
                                            </div>
                                          </div>
                                         </div>   
                                         <div class="row">
                                          <div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-5"></div>
													<div class="col-md-7">
														<div class="form-group">
															<button type="submit" class="btn btn-primary">
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
                    <div class="table-responsive">
                         <table class="table table-striped" id="table-1">

                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th> Business Rupess</th>
                            <th>Business Valuem(BV)</th>
                            <th>Percentage(%)</th>
                            <th>Created Date</th>
                            <th>Action</th>
                          </tr>
                            </thead>
                              <tbody>
                         <tr>
                             <?php  $plan= $this->db->get("bv_master");
                             if( $plan->num_rows()>0){
                                 $i=1;
                               foreach( $plan->result() as  $plan):
                             ?>
                            <td class="text-center"><?php echo $i;?></td>
                               <input type="hidden" id="ex_id<?= $plan->id;?>" value="<?= $plan->id;?>">
                                 <td >
                                  <label id="sh_ex<?= $plan->id;?>" ><?php echo $plan->valuem_rupee;?></label>
                                
                                 </td>
                                 
                                  <td >
                                  <label id="sh_ex<?= $plan->id;?>" ><?php echo $plan->valuem_bv;?></label>
                                </td>
                                <td>
                                  <label id="sh_ex<?= $plan->id;?>" ><?php echo $plan->percentage;?></label>
                                 
                                </td>
                                 <td >
                                  <label id="sh_ex<?= $plan->id;?>" ><?php echo $plan->created;?></label>
                                
                                </td>
                                                
                                <td><input type="button" value="Edit" id="edt<?= $plan->id;?>" class="btn btn-warning"/>
                                    <input type="button" value="delete" id="update<?= $plan->id;?>" class="btn btn-danger"/>
                                </td> 
                            
                             </tr>
                                                        
                             <?php $i++; endforeach; } ?>
                       </tbody>
                        
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </section>    
  </div>
