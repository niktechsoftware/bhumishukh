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
                                <table  class="table table-hover" id="sample-table-1">
                                    <thead>
											<tr>
												<th style="width: 5%;">SNo.</th>
												<th style="width: 10%;">Emp. ID.</th>
												<th style="width: 10%;">Name</th>
												<th style="width: 15%;">Configure Salary</th>
												<th style="width: 15%;">Pay Salary</th>
												<th style="width: 60%;">Paid Status</th>
											</tr>
									</thead>
									<tbody id="classDetail">
											<?php $j = 1; ?>
											<?php if(isset($empList)):?>
											<?php foreach($empList as $row):?>
											<tr>
												<td>
													<?php echo $j;?>
												</td>
												<td>
													<?php echo $row->username;?>
													<input type="hidden" id="id<?php echo $j;?>" value="<?php echo $row->id;?>">
												</td>
												<td>

												
							                    		<?php echo $row->name;?>
							                    
												</td>
												<td>
													<?php
														$this->load->model("adminmodel");
													$qres = $this->adminmodel->getSalaryDetail($row->id);
														if($qres->num_rows()>0)
														{?>
														<button type="submit" class="btn btn-primary" id="classSave<?php echo $j;?>" value="<?php echo $row->name;?>" s><i class="far fa-edit">&nbsp;Re Configure</i></button>
												
																</button>
													<?php	}
														else
														{ ?> 
															<button type="submit" class="btn btn-primary" id="classSave<?php echo $j;?>" value="<?php echo $row->name;?>"><i class="far fa-edit">&nbsp;Configure</i></button>
											
														</button>
													<?php	}
													?>
												</td>
													<td>
													    <button type="submit" class="btn btn-primary" id="classSave1<?php echo $j;?>" value="<?php echo $row->name;?>" ><i class="far fa-edit">&nbsp;Pay Salary</i></button>
												<script>		
                                                 jQuery(document).ready(function() {
                                                    		<?php $val = $this->db->count_all("agent_info");
                                                    		
                                                    	for($j=1; $j <= $val; $j++)
                                                    	{?>
                                                    		$("#classSave<?php echo $j;?>").click(function(){
                                                    			var eid = $('#id<?php echo $j;?>').val();
                                                    			var ename = $('#classSave<?php echo $j;?>').val();
                                                    		//alert(eid+ename);
                                                    			$.post("<?php echo site_url('adminController/configsalary') ?>", {eid : eid,ename : ename}, function(data){
                                                                    $("#givenDetail").html(data);
                                                        		});
                                                        		
                                                           		 });
                                                    		<?php }
                                                    	
                                                    	?>
                                                    		<?php $val = $this->db->count_all("agent_info");
                                                    		
                                                    	for($j=1; $j <= $val; $j++)
                                                    	{?>
                                                    		$("#classSave1<?php echo $j;?>").click(function(){
                                                    			var eid = $('#id<?php echo $j;?>').val();
                                                    			var ename = $('#classSave1<?php echo $j;?>').val();
                                                    		//alert(eid+ename);
                                                    			$.post("<?php echo site_url('adminController/salary') ?>", {eid : eid,ename : ename}, function(data){
                                                                    $("#givenDetail").html(data);
                                                        		});
                                                        		
                                                           		 });
                                                    		<?php } ?>   
                                                 });
							                    </script>
												</td>
												<td>
												<?php
											
												$b=array();
												if($qres->num_rows()>0){
													$this->db->select("SUM(monthNo) as month");
												    $this->db->where("emp_id",$row->id);
													$a = $this->db->get("emp_salary_info");
												$this->db->where("emp_id",$row->id);
												$b = $this->db->get("emp_salary_info")->row();
												$month = $a->row()->month;
											//$b=$this->db->query("SELECT fsd FROM emp_salary_info WHERE emp_id = '$row->username' order by `id` asc limit 1")->row();
												if(($month>0)&&($month<12)){

												}else{
													if($month>12){
														$month=$month-12;
													}
												
												}
												}
												else{
											
												$month = 0;
												}
							                         $color = array(
							                             "partition-purple",
							                             "progress-partition-green",
							                             "progress-bar-warning",
							                             "progress-bar-success",
							                             "progress-partition-green",
							                             "partition-azure",
							                             "partition-orange",
							                             "progress-bar-success",
							                             "partition-blue",
							                             "progress-bar-danger",
							                             "progress-bar-danger",
							                             "partition-purple",
							                         );
							                         if($b){

							                    ?>
								                    <div class="progress">
								                       	<input type="hidden" name="fsd" value="<?php e//cho $fsd; ?>" />
								                        <input type="hidden" name="month" value="<?php echo $month; ?>" />
								                        <?php for($i =0 ; $i<=$month-1; $i++):?>
								                        <div class="progress-bar <?php echo $color[$i];?>" style="width: 8.33%">
								                        	<?php echo date("M-y",strtotime("$i month"));?>
								                        </div>
								                        <?php endfor; ?>
								                    </div>
								                    <?php }?>
												</td>
											</tr>
											<?php $j++; ?>
											<?php endforeach; ?>
											<?php endif; ?>
										</tbody>
                        
                       
                        
                      </table> 
                            </div> 
                         </div>
                       
                 </div>
             </div> 
         </div>
        </div> 
    </div>         
    </section>    
</div>    
 <div class="col-md-12 col-lg-12 col-xs-12"   id="givenDetail">
							<div class="row">
										
                            </div>
                        </div>    