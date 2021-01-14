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
                      	<form method="post"	action="<?php echo base_url()?>index.php/apanel/createxpe" enctype="multipart/Form-data" >
							<div class="card-body">
								<div class="row" id="regForm">
									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
										    <?php if($this->uri->segment(3)=="success"){?>
										        <div class="alert alert-success col-md-12 col-lg-12 col-xs-12">Expenditure is successfully entered!</div>
										    <?php }
										    else{
										    if($this->uri->segment(4)){?>
										     <div class="alert alert-warning col-md-12 col-lg-12 col-xs-12"> Please Try Again !</div>
										    
										   <?php  }}?>
											
												<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-5"><label>Add Expenditure</label></div>
													<div class="col-md-7">
													    <div class="form-group">
                                                            <input type="text" class="form-control" name="exp">
														</div>
								                    </div>
												</div>
                                            </div>
									
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
					</form>

                      <div id="setValue"></div>
                      
                   <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                     <?php  ?>
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                          
                            <th>Expenditure Name</th>
                            <th>Delete</th>
                         
                          </tr>
                            </thead>
                        <tbody>
                        <?php 
                        $expdata=$this->db->get('expenditure');
                        $i=1; foreach($expdata->result() as $row):?>
                         <tr>
                              <td><?php echo $i;?></td>
                             
                             <td><?php echo $row->expenditure_name;?></td>
                            
                             <td><button type="button" class="btn btn-danger">
                                 	<a href="<?php echo base_url();?>apanel/deleteExp/<?php echo $row->id;?>">
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
