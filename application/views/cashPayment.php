<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4><?php echo $smallTitle;?></h4>
                  </div>
                  <?php //$categoryDe=$this->db->get("product_category");?>
                  <div class="card-body">
                     	<form method="post"	action="<?php echo base_url()?>daybookController/addCPayment" enctype="multipart/Form-data" >
							<div class="card-body">
								<div class="row" id="regForm">
									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
										    <?php if($this->uri->segment(3)=="success"){?>
										        <div class="alert alert-success col-md-12 col-lg-12 col-xs-12">Transaction is successfully done!</div>
										    <?php }?>
										   <div class="col-xs-6 col-md-6 col-lg-6">
											   	<div class="form-group row">
													<div class="col-md-3"><label>Expenditure</label></div>
													<div class="col-md-7">
													    <div class="form-group">
                                  <select required="required" name ="expName"  id="expenditure"  class="form-control">
                                                      <option value="">Select Expenditure</option>
                                                          <?php $expd=$this->db->get("expenditure");
                                                          foreach($expd->result() as $expd):?>
                                                        <option value = "<?php echo $expd->id;?>" ><?php echo $expd->expenditure_name;?></option>
                                                      <?php endforeach;?>  
                                       </select>
														</div>
								                    </div>
												</div>
                                        </div>
                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                        <div class="form-group row">
                                            <div class="col-md-3"><label>Sub Expenditure</label></div>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                    <select id="expenditurer" class="form-control"  name="expenditurer"  ></select>

                                                </div>
                                            </div>
                                        </div>
                                     </div>  
                                      </div>
									</div>
									<script>
										jQuery(document).ready(function() {
										$('#expenditure').change(function(){
                                			var expenditure_id = $('#expenditure').val();
                                			$.post("<?php echo base_url('index.php/daybookController/expenditure_depart')?>", {expenditure_id : expenditure_id}, function(data){						
                                				 $('#expenditurer').html(data);
                                			})
                                		});
										});
									</script>
										<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
										   <div class="col-xs-6 col-md-6 col-lg-6">
											   	<div class="form-group row">
													<div class="col-md-3"><label>Employee</label></div>
													<div class="col-md-7">
													    <div class="form-group">
                                                        <select required="required" name="empId"  class="form-control">
                                                      <option value="">Select Employee</option>
                                                          <?php $emp=$this->db->get("agent_info");
                                                          foreach($emp->result() as $emp):?>
                                                        <option value = "<?php echo $emp->username;?>" ><?php echo $emp->name;?>[<?php echo $emp->username;?>]</option>
                                                      <?php endforeach;?>  
                                       </select>
														</div>
								                    </div>
												</div>
                                        </div>
                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                       <div class="form-group row">
                                          <div class="col-md-3"><label>Pay Date</label></div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                     <input type="date" class="form-control" name="pdate">
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
													<div class="col-md-3"><label>Reason</label></div>
													<div class="col-md-7">
													    <div class="form-group">
                                                       <textarea name="reason" class="form-control"></textarea>
														</div>
								                    </div>
												</div>
                                        </div>
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
