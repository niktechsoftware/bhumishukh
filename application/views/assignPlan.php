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
                     	<form method="post"	action="<?php echo base_url()?>apanel/assignPlanVal" enctype="multipart/Form-data" >
							<div class="card-body">
								<div class="row" id="regForm">
								    	<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
										    <?php if($this->uri->segment(3)=="success"){?>
										        <div class="alert alert-success col-md-12 col-lg-12 col-xs-12">Assign Plan is assigned successfully!</div>
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
                                              <div class="col-md-3"><label>Plan Id</label></div>
                                              <div class="col-md-7">
                                                  <div class="form-group">
                                                     
                                                    <select class="form-control" name="planid" value="">
                                                        <option value="">--Select Plan-- </option>
                                                         <?php $plan=$this->db->get("plan_name");
                                                       foreach( $plan->result() as  $plan): ?>
                                                        <option value="<?php echo $plan->id; ?>"><?php echo $plan->Name; ?> </option>
                                                        <?php endforeach; ?>
                                                    </select>    
                                                  </div>
                                               </div>
                                            </div>
                                          </div>
                                           <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="form-group row">
                                              <div class="col-md-3"><label>Plan Unit</label></div>
                                              <div class="col-md-7">
                                                  <div class="form-group">
                                                     
                                                    <select class="form-control" name="unitid" value="">
                                                        <option value="">--Select Plan-- </option>
                                                         <?php $plan=$this->db->get("plan_unit");
                                                       foreach( $plan->result() as  $plan): ?>
                                                        <option value="<?php echo $plan->id; ?>"><?php echo $plan->unit_name; ?> </option>
                                                        <?php endforeach; ?>
                                                    </select>    
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
                                              <div class="col-md-3"><label>Size</label></div>
                                              <div class="col-md-7">
                                                  <div class="form-group">
                                                    <input type="text" class="form-control" name="size" value="">
                                                  </div>
                                               </div>
                                            </div>
                                          </div> 
                    			    	    
                                          <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="form-group row">
                                              <div class="col-md-3"><label>Price</label></div>
                                              <div class="col-md-7">
                                                  <div class="form-group">
                                                    <input type="text" class="form-control" name="price" value="">
                                                  </div>
                                               </div>
                                            </div>
                                          </div>
                                          <div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-5"></div>
													<div class="col-md-7">
														<div class="form-group">
															<button type="submit" class="btn btn-primary" style="margin-left:600px;">
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
                             <th> Unit Name</th>
                              <th>Size</th>
                               <th>Price</th>
                                <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                            </thead>
                              <tbody>
                         <tr>
                             <?php  $plan= $this->db->get("assign_plan");
                              if( $plan->num_rows()>0){
                          $i=1;
                               foreach( $plan->result() as  $plan):
                             ?>
                            <td class="text-center"><?php echo $i;?></td>
                             <input type="hidden" id="ex_id<?= $plan->id;?>" value="<?= $plan->id;?>">
                            <td><?php 
                            $this->db->where("id",$plan->plan_id);
                            $planname=$this->db->get("plan_name");
                            foreach($planname->result() as $planname):
                            echo $planname->Name;?>
                            <?php endforeach; ?>
                            </td>
                            <td><?php 
                             $this->db->where("id",$plan->unit_id);
                            $planunit=$this->db->get("plan_unit");
                            foreach($planunit->result() as $planunit):
                            echo $planunit->unit_name;?>
                            <?php endforeach; ?></td>
                              <td id ="ex_size<?= $plan->id;?>">
                                  <label id="sh_ex<?= $plan->id;?>" ><?php echo $plan->size;?></label>
                                  <input type="text" id="edit_size<?= $plan->id;?>" value="<?php echo $plan->size;?>" class="form-control">
                                                </td>
                             <td id ="ex_price<?= $plan->id;?>">
                                  <label id="sh_ex1<?= $plan->id;?>" ><?php echo $plan->price;?></label>
                                  <input type="text" id="edit_price<?= $plan->id;?>" value="<?php echo $plan->price;?>" class="form-control">
                                                </td>
                              <td><input type="button" value="Edit" id="edt<?= $plan->id;?>" class="btn btn-warning"/>
                                                      <input type="button" value="Update" id="update<?= $plan->id;?>" class="btn btn-success"/>
                                                 </td> 
                                                 <script>
                                                                $("#edit_size<?= $plan->id;?>").hide();
                                                                $("#edit_price<?= $plan->id;?>").hide();
                                                                    $("#update<?= $plan->id;?>").hide();
                                                                    $("#edt<?= $plan->id;?>").show();
                                                                    $("#sh_ex<?= $plan->id;?>").show();
                                                                     $("#sh_ex1<?= $plan->id;?>").show();
                                                                      $("#edt<?= $plan->id;?>").click(function(){
                                                                    //  alert("dfgfg");
                                                                        $("#edit_size<?= $plan->id;?>").show();
                                                                        $("#edit_price<?= $plan->id;?>").show();
                                                                        $("#update<?= $plan->id;?>").show();
                                                                        $("#edt<?= $plan->id;?>").hide();
                                                                        $("#sh_ex<?= $plan->id;?>").hide();
                                                                          $("#sh_ex1<?= $plan->id;?>").hide();
                                                                            $("#update<?= $plan->id;?>").click(function(){
                                                                                 //alert("3");
                                                                                var plan_s =  $("#edit_size<?= $plan->id;?>").val();
                                                                                var plan_p =  $("#edit_price<?= $plan->id;?>").val();
                                                                                var plan_id = $("#ex_id<?= $plan->id;?>").val();
                                                                                $.post("<?= site_url();?>/apanel/updateAssignPlan",{plan_s : plan_s,plan_id:plan_id , plan_p: plan_p},function(data){
                                                                                  //  alert(data);
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
                             <td><button type="button" class="btn btn-danger">
                            <a href="<?php echo base_url();?>apanel/deleteAsspln/<?php echo $plan->id;?>">
                            <i class="fa fa-trash" style="color:white"></i>
                            </a></button></td>
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
