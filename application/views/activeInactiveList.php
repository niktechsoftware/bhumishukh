             
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
                                <div class="table-responsive">
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
                                        <table class="table table-striped" id="table-1">
                     
                                                        <thead>
                                                            <tr>
                                                            <th >S.No.</th>
                                                            <th>User Name</th>
                                                            <th>Agent Name</th>
                                                            <th>Father Name</th>
                                                            <th>Mobile Number</th>
                                                            <th>Email Id</th>
                                                            <th>Address</th>
                                                            <th>City</th>
                                                            <th>Parent Id</th>
                                                            <th>Rank</th>
                                                            <th>Action</th>
                                                               
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                    <?php 
                                   
                                   if($aginfo->num_rows()>0){
                                      $i=1;
                                    foreach($aginfo->result() as $data):
                                    ?>
                                      <tr>
                                        <td><?php echo $i;?></td>
                                        <td class="align-middle" ><a href="<?php echo base_url();?>index.php/apanel/agent_profile/<?php echo $data->id; ?>"><?php echo $data->username;?></a>
                                        <input type="hidden" id="emp_id<?php echo $i;?>" value="<?php echo $data->id;?>"></td>
                                        <td><?php echo $data->name;?></td>
                                        <td><?php echo $data->fname;?></td>
                                        <td><?php echo $data->mobile;?></td>
                                        <td><?php echo $data->email;?></td>
                                        <td><?php echo $data->address;?></td>
                                        <td><?php echo $data->city;?></td>
                                        <?php $this->db->where("id",$data->reff_id);
                                               $aginfo= $this->db->get("agent_info");
                                        ?>
                                        <td><b> <?php echo $aginfo->row()->username;?></b> </td>
                                     <?php $pc=$this->db->get("promotion_chart");?>
                                     <td>
                                    <?php if($uri==2){?>
                                     <select name="rankid" id="rank_id<?php echo $i;?>" class="form-control">
                                  <option value="">--Select Rank--</option>
                                 <?php   foreach($pc->result() as $pc):?>
                                  <option value="<?php echo $pc->id;?>"><?php echo $pc->id."  ".$pc->rank_name;?></option>
                                      <?php  endforeach;?>
                                        
                              </select>
                              <?php }else{
                                 echo  $data->position;
                                }?>
                               </td>
                                <td>
                                <?php if($uri==2){?>
                                    <a href="#" id="doactive<?php echo $i;?>" class="btn btn-success" >Activate
                                    </a>
                                <?php }else{?> 
                                 <a href="#" id="doinactive<?php echo $i;?>" class="btn btn-danger" >Inactive
                                <?php   }?>
                                </td>    
                            <script>   
                                $("#doactive<?php echo $i;?>").click(function(){
    	        	            var rankid = $("#rank_id<?php echo $i;?>").val();
    	        	            if(rankid.length>0){
    	        	            var employeeid = $("#emp_id<?php echo $i;?>").val();
    	        	            //alert(employeeid);
                	        	  var status =1;
                    	            $.post("<?php echo site_url('apanel/changeStatusRank') ?>", {rankid : rankid, employeeid : employeeid, status : status}, function(data){
                    	                if(data==1){
                    	                $("#doactive<?php echo $i;?>").html("Success");
                    	                }else{
                    	                    alert(data);
                    	                }
                    	    		});
    	        	            }else{
    	        	                alert("Please Select Rank First.");
    	        	            }
                    	        });
                    	        
                    	         $("#doinactive<?php echo $i;?>").click(function(){
    	        	            var rankid = "";
    	        	            var employeeid = $("#emp_id<?php echo $i;?>").val();
    	        	            alert(employeeid);
                	        	  var status =0;
                    	            $.post("<?php echo site_url('apanel/changeStatusRank') ?>", {rankid : rankid, employeeid : employeeid, status : status}, function(data){
                    	                if(data==1){
                    	                $("#doinactive<?php echo $i;?>").html("Success");
                    	                }else{
                    	                    alert(data);
                    	                }
                    	    		});
    	        	          
                    	        });
    	                    </script> 
                                       
                                		  </tr>
                                      
                                      <?php 
                                      $i++; endforeach; } ?>
                                      
                                    </tbody>
                                     
                                    
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
