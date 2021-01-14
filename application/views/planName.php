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
                     	<form method="post"	action="<?php echo base_url()?>apanel/createPlan" enctype="multipart/Form-data" >
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
                                              <div class="col-md-3"><label>Plan Name</label></div>
                                              <div class="col-md-7">
                                                  <div class="form-group">
                                                    <input type="text" class="form-control" name="pname" value="">
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
                            <th> Plan Name</th>
                           <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                            </thead>
                              <tbody>
                         <tr>
                             <?php  $plan= $this->db->get("plan_name");
                             if( $plan->num_rows()>0){
                                 $i=1;
                               foreach( $plan->result() as  $plan):
                             ?>
                            <td class="text-center"><?php echo $i;?></td>
                               <input type="hidden" id="ex_id<?= $plan->id;?>" value="<?= $plan->id;?>">
                                 <td id ="ex_id<?= $plan->id;?>">
                                  <label id="sh_ex<?= $plan->id;?>" ><?php echo $plan->Name;?></label>
                                  <input type="text" id="edit_ex_id<?= $plan->id;?>" value="<?php echo $plan->Name;?>" class="form-control">
                                                </td>
                                                  <td><input type="button" value="Edit" id="edt<?= $plan->id;?>" class="btn btn-warning"/>
                                                      <input type="button" value="Update" id="update<?= $plan->id;?>" class="btn btn-success"/>
                                                 </td> 
                             <td><button type="button" class="btn btn-danger">
                            <a href="<?php echo base_url();?>apanel/deletePlan/<?php echo $plan->id;?>">
                            <i class="fa fa-trash" style="color:white"></i>
                            </a></button></td>
                             </tr>
                                                              <script>
                                                                $("#edit_ex_id<?= $plan->id;?>").hide();
                                                                    $("#update<?= $plan->id;?>").hide();
                                                                    $("#edt<?= $plan->id;?>").show();
                                                                    $("#sh_ex<?= $plan->id;?>").show();
                                                            
                                                                      $("#edt<?= $plan->id;?>").click(function(){
                                                                    //  alert("dfgfg");
                                                                        $("#edit_ex_id<?= $plan->id;?>").show();
                                                                        $("#update<?= $plan->id;?>").show();
                                                                        $("#edt<?= $plan->id;?>").hide();
                                                                        $("#sh_ex<?= $plan->id;?>").hide();
                                                                            $("#update<?= $plan->id;?>").click(function(){
                                                                                // alert("3");
                                                                                var plan_n =  $("#edit_ex_id<?= $plan->id;?>").val();
                                                                                var plan_id = $("#ex_id<?= $plan->id;?>").val();
                                                                               // alert(plan_n);
                                                                               //  alert(plan_id);
                                                                                $.post("<?= site_url();?>/apanel/updatePlanname",{plan_n : plan_n,plan_id:plan_id},function(data){
                                                                                   // alert('1');
                                                                                    if(data==1)
                                                                                    {
                                                                                        alert("Update Successfully");
                                                                                        location.reload();
                                                                                    }
                                                                                    else if(data==0)
                                                                                    {
                                                                                        alert("Not Updated");
                                                                                    }
                                                                                });
                                                                            });
                                                                    });
                                                                  
                                                                </script>
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
