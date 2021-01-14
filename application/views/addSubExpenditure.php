<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4><?php echo $smallTitle;?></h4>
                  </div>
                  <?php $expd=$this->db->get("expenditure");?>
                  <div class="card-body">
                     	<form method="post"	action="<?php echo base_url()?>apanel/createSubexp" enctype="multipart/Form-data" >
							<div class="card-body">
								<div class="row" id="regForm">
									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
										    <?php if($this->uri->segment(3)=="success"){?>
										        <div class="alert alert-success col-md-12 col-lg-12 col-xs-12">Sub Expenditure is successfully entered!</div>
										    <?php }else{
										    if($this->uri->segment(3)){?>
										     <div class="alert alert-warning col-md-12 col-lg-12 col-xs-12"> Please Try Again !</div>
										    
										   <?php  }}?>
											
												
											<div class="col-xs-6 col-md-6 col-lg-6">
                                <div class="form-group row">
                                  <div class="col-md-3"><label>Expenditure</label></div>
                                  <div class="col-md-7">
                                      <div class="form-group">
                                      <select required="required" name ="expName"  id ="" class="form-control">
                                                      <option value="">Select Expenditure</option>
                                                          <?php foreach($expd->result() as $expd):?>
                                                        <option value = "<?php echo $expd->id;?>" ><?php echo $expd->expenditure_name;?></option>
                                                      <?php endforeach;?>  
                                       </select>
                            </div>
                           </div>
                        </div>
                                            </div>  
                                            <div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-4"><label>Sub Expenditure Name</label></div>
													<div class="col-md-7">
													    <div class="form-group">
                                   <input type="text" class="form-control" name="subExpName">
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
												
													<div class="col-md-12">
														<div class="form-group">
															<button type="submit" class="btn btn-primary" style="margin-left:980px;">
																<i class="far fa-edit">&nbsp;Submit</i>
															</button>
														</div>
													</div>
												</div>
												    </div>
                                            
										</div>
								</div>
				
					</form>

                      <div id="setValue"></div>
                      
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                     <?php $sub=$this->db->get("sub_expenditure");?>

                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th> Name</th>
                           <!-- <th>subcategory Image</th>-->
                            <th>Category</th>
                            <th>Delete</th>
                      
                          </tr>
                           </thead>
                     <tbody>
                           <?php $i=1; foreach($sub->result() as $row):?>
                         <tr>
                             <td><?php echo $i;?></td>
                             <td><?php echo $row->sub_expenditure_name;?></td>
                           <!-- <td><img src="<?php //echo base_url();?>assets/images/client_gallery/<?php //echo $row->image;?>" height="50px;" width="80px;"></td>-->
                             <td><?php $this->db->where('id',$row->exp_id);
                             $exp=$this->db->get('expenditure');
                             echo $exp->row()->expenditure_name;?>
                            <td><button type="button" class="btn btn-danger">
                            <a href="<?php echo base_url();?>apanel/deletesubexp/<?php echo $row->id;?>">
                            <i class="fa fa-trash" style="color:white"></i>
                            </a></button></td>
                             </tr>
                             <?php $i++; endforeach;?>
                       
                       </tbody>
                        
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            	</div>
            	
								</div>
							</div>
