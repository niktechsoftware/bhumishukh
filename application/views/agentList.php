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
                    <div class="row">
                        <?php if($this->uri->segment(3)=="success"){?>
                            <div class="alert alert-success col-md-12 col-lg-12 col-xs-12">Agent is deleted successfully!</div>
                        <?php }else{
                        if($this->uri->segment(3)=="false"){?>
                         <div class="alert alert-warning col-md-12 col-lg-12 col-xs-12">Something went wrong Please Try Again !</div>
                        
                       <?php  }}?>
                          <div class="col-xs-6 col-md-6 col-lg-6">
                            </div>
                    </div> 
                   
                    </div>
                    	<form method="post"	action="<?php echo base_url()?>index.php/apanel/downLineAgentList" enctype="multipart/Form-data" >
                    	    
                  <div class="col-md-12 col-lg-12 col-xs-12">
										    <div class="row">
											<div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="form-group row">
													<div class="col-md-5">
														<label>AGENT ID<span title="Required" style="color: red;"></span></label>
													</div>
													<div class="col-md-7">
														<div class="form-group">
															<input type ="text" name= "username" class="form-control" id="adId">
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
                    </form>
                      <table class="table table-striped" id="table-1">
                     
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                           <!-- <th>Agent ID</th>-->
                            <th>level</th>
                            <th>Parent Agent</th>
                            <th>Sub ID</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                      //echo "<pre>";
       //print_r($finalData);
       //echo "</pre>";
	   
                       if($finalData){
                          $i=1;
                        foreach($finalData as $key => $value):?>
                             
                                  <?php 
                                    $finalDataSubIds = $finalData[$key]['subIDs'];
                                    foreach($finalDataSubIds as $row => $j): ?>
                                     <tr>
                                         <td class="text-center"><?php echo $i;?> </td>
                                        <td><?php echo $finalData[$key]['Level'];?> </td>
                                        <?php $this->db->where("reff_id",$finalData[$key]['parentID']);
                                       $aginfo= $this->db->get("agent_info");
                                        ?>
                                        
                                        <td><?php echo $aginfo->row()->name."     "."[".$aginfo->row()->username."]" ;?> </td>
                                        <?php $this->db->where("id",$finalDataSubIds[$row]);
                                            $agin=$this->db->get("agent_info");?>
                                        <td><?php echo $agin->row()->name."     "."[".$agin->row()->username."]";?></td>
                                    </tr>
                                  <?php
                                   $i++; endforeach;
                                  ?>
                           
                         <?php  endforeach; } ?>
                          
                        </tbody>
                         
                        
                      </table>
                  </div>
                </div>
              </div>
            </div>
