<div class="main-content">
	<div class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h4>Salary Formate</h4>
                        </div>
					    <div class="card-body">
							<div class="row" id="">
							    	<?php
		if($qres->num_rows()>0){
		$qs = $qres->row();
	print_r($qs);
	 ?>
							    <form action="<?php echo base_url()?>employeeController/configureSalary" method="post">
    							    <div class="col-md-12 col-lg-12 col-xs-12">
    									<div class="row">
    									     <div class="col-md-12 col-lg-12 col-xs-12">
										            <div class="row">
										                	<?php 	                   
												
													$this->db->where("id",$eid);
													$un= $this->db->get("agent_info");
													print_r($un);
													?>
                											<div class="col-xs-6 col-md-6 col-lg-6">
                                                                <div class="form-group row">
                													    <div class="col-md-5">
                														    <label>EMPLOYEE ID <span title="Required" style="color: red;">*</span></label>
                												        </div>
                												        <div class="col-md-7">
                														    <div class="form-group">
                															    <input type="text" class="form-control" value ="<?php echo $un->row()->username; ?>" name="name" id="">
                														    </div>
                								                        </div>
                												</div>
                                                            </div>
												            <div class="col-xs-6 col-md-6 col-lg-6">
                                                                 <div class="form-group row">
                    													<div class="col-md-5">
                    														<label>EMPLOYEE NAME<span title="Required" style="color: red;">*</span></label>
                    													</div>
                    													<div class="col-md-7">
                    														<div class="form-group">
                    															<input type="text" class="form-control" value="<?php echo $un->row()->name; ?>" name="empname" id="empname" required="required">
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
                													    <div class="col-md-5">
                														    <label>BASIC SALARY <span title="Required" style="color: red;">*</span></label>
                												        </div>
                												        <div class="col-md-7">
                														    <div class="form-group">
                															    <input type="text" class="form-control" value ="<?php //echo $un->row()->username; ?>" name="name" id="" required="required">
                														    </div>
                								                        </div>
                												</div>
                                                            </div>
												            <div class="col-xs-6 col-md-6 col-lg-6">
                                                                 <div class="form-group row">
                    													<div class="col-md-5">
                    														<label>PROVIDENT FUND<span title="Required" style="color: red;">*</span></label>
                    													</div>
                    													<div class="col-md-7">
                    														<div class="form-group">
                    															<input type="text" name="ProvidentFund" id="ProvidentFund" class="form-control" value="<?php //echo $qs->ProvidentFund; ?>" required="required">
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
                													    <div class="col-md-5">
                														    <label>STATE INSURANCE (SI)<span title="Required" style="color: red;">*</span></label>
                												        </div>
                												        <div class="col-md-7">
                														    <div class="form-group">
                															    <input type="text" class="form-control" name="employeeStateInsurance" id="employeeStateInsurance" value="<?php //echo $qs->employeeStateInsurance; ?>"  required="required">
                														    </div>
                								                        </div>
                												</div>
                                                            </div>
												            <div class="col-xs-6 col-md-6 col-lg-6">
                                                                 <div class="form-group row">
                    													<div class="col-md-5">
                    														<label>	MEDICAL ALLOWANCE (MA)<span title="Required" style="color: red;">*</span></label>
                    													</div>
                    													<div class="col-md-7">
                    														<div class="form-group">
                    															<input type="text" name="medicalAllowance" value="<?php //echo $qs->medicalAllowance; ?>" id="medicalAllowance" class="form-control"  required="required">
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
                													    <div class="col-md-5">
                														    <label>TRANSPORT ALLOWANCE (TA)<span title="Required" style="color: red;">*</span></label>
                												        </div>
                												        <div class="col-md-7">
                														    <div class="form-group">
                															    <input type="text" class="form-control" name="transportAllowance" value="<?php //echo $qs->transportAllowance; ?>" id="transportAllowance"  required="required">
                														    </div>
                								                        </div>
                												</div>
                                                            </div>
												            <div class="col-xs-6 col-md-6 col-lg-6">
                                                                 <div class="form-group row">
                    													<div class="col-md-5">
                    														<label>		DEARNESS ALLOWANCE (DA)<span title="Required" style="color: red;">*</span></label>
                    													</div>
                    													<div class="col-md-7">
                    														<div class="form-group">
                    															<input type="text"  name="dearnessAllowance" value="<?php //echo $qs->dearnessAllowance; ?>" id="dearnessAllowance"  class="form-control"  required="required">
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
                													    <div class="col-md-5">
                														    <label>	HOUSE RENT ALLOWANCE (HRA)<span title="Required" style="color: red;">*</span></label>
                												        </div>
                												        <div class="col-md-7">
                														    <div class="form-group">
                															    <input type="text" class="form-control" name="houseRentAllowance" value="<?php //echo $qs->houseRentAllowance; ?>" id="houseRentAllowance"  required="required">
                														    </div>
                								                        </div>
                												</div>
                                                            </div>
												            <div class="col-xs-6 col-md-6 col-lg-6">
                                                                 <div class="form-group row">
                    													<div class="col-md-5">
                    														<label>Total Leave<span title="Required" style="color: red;">*</span></label>
                    													</div>
                    													<div class="col-md-7">
                    														<div class="form-group">
                    															<input type="text"  name="skillAllowance" value="" id="skillAllowance" value="<?php //echo $qs->skillAllowance; ?>"  disabled="disabled" class="form-control"  required="required">
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
                													    <div class="col-md-5">
                														    <label>	Deduction Due to Absent <span title="Required" style="color: red;">*</span></label>
                												        </div>
                												        <div class="col-md-7">
                														    <div class="form-group">
                															    <input type="text" class="form-control" name="spcialAllowance" value="" id="spcialAllowance" value="<?php //echo $qs->spcialAllowance; ?>" disabled="disabled">
                														    </div>
                								                        </div>
                												</div>
                                                            </div>
												            <div class="col-xs-6 col-md-6 col-lg-6">
                                                                 <div class="form-group row">
                    													<div class="col-md-5">
                    														<label>	ENCENTIEVE<span title="Required" style="color: red;">*</span></label>
                    													</div>
                    													<div class="col-md-7">
                    														<div class="form-group">
                    															<input type="text"  name="encentieve" value="<?php //echo $qs->encentieve; ?>" id="encentieve"  class="form-control"  required="required">
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
                													    <div class="col-md-5">
                														    <label>	ENCENTIEVE <span title="Required" style="color: red;">*</span></label>
                												        </div>
                												        <div class="col-md-7">
                														    <div class="form-group">
                															    <input type="text" class="form-control" name="encentieve" value="<?php //echo $qs->encentieve; ?>" id="encentieve" >
                														    </div>
                								                        </div>
                												</div>
                                                            </div>
												            <div class="col-xs-6 col-md-6 col-lg-6">
                                                                 <div class="form-group row">
                    													<div class="col-md-5">
                    														<label>	BONUS<span title="Required" style="color: red;">*</span></label>
                    													</div>
                    													<div class="col-md-7">
                    														<div class="form-group">
                    															<input type="text" name="bonus" value="<?php //echo $qs->bonus; ?>" id="bonus"  class="form-control"  required="required">
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
                													    <div class="col-md-5">
                														    <label>	GROSS <span title="Required" style="color: red;">*</span></label>
                												        </div>
                												        <div class="col-md-7">
                														    <div class="form-group">
                															    <input type="text" class="form-control"  name="gross_s" value="<?php //echo $qs->gross_s; ?>" id="gross_s">
                														    </div>
                								                        </div>
                												</div>
                                                            </div>
												            	<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-5"></div>
													<div class="col-md-7">
														<div class="form-group">
															<button type="submit" class="btn btn-primary"
																id="" >
																<i class="far fa-edit">&nbsp;UPDATE SALARY FORMAT</i>
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
    							 	<?php }else{ ?>
    							   <form action="<?php echo base_url()?>employeeController/configureSalary" method="post">
    							    <div class="col-md-12 col-lg-12 col-xs-12">
    									<div class="row">
    									     <div class="col-md-12 col-lg-12 col-xs-12">
										            <div class="row">
                											<div class="col-xs-6 col-md-6 col-lg-6">
                                                                <div class="form-group row">
                													    <div class="col-md-5">
                														    <label>EMPLOYEE ID <span title="Required" style="color: red;">*</span></label>
                												        </div>
                												        <div class="col-md-7">
                														    <div class="form-group">
                															   	<input type = "text"  value ="<?php //echo $un->username; ?>" class="form-control" />
						                                                        <input type = "hidden" name = "empid" value ="<?php //echo $eid; ?>"  />
                														    </div>
                								                        </div>
                												</div>
                                                            </div>
												            <div class="col-xs-6 col-md-6 col-lg-6">
                                                                 <div class="form-group row">
                    													<div class="col-md-5">
                    														<label>EMPLOYEE NAME<span title="Required" style="color: red;">*</span></label>
                    													</div>
                    													<div class="col-md-7">
                    														<div class="form-group">
                    															<input type="text" class="form-control" value="" name="empname" id="empname" required="required">
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
                													    <div class="col-md-5">
                														    <label>BASIC SALARY <span title="Required" style="color: red;">*</span></label>
                												        </div>
                												        <div class="col-md-7">
                														    <div class="form-group">
                															    <input type="text" class="form-control" value ="<?php //echo $un->row()->username; ?>" name="basicSalary" id="basicSalary" required="required">
                														    </div>
                								                        </div>
                												</div>
                                                            </div>
												            <div class="col-xs-6 col-md-6 col-lg-6">
                                                                 <div class="form-group row">
                    													<div class="col-md-5">
                    														<label>PROVIDENT FUND<span title="Required" style="color: red;">*</span></label>
                    													</div>
                    													<div class="col-md-7">
                    														<div class="form-group">
                    															<input type="text"  name="ProvidentFund" id="ProvidentFund" class="form-control" value="<?php //echo $qs->ProvidentFund; ?>" required="required">
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
                													    <div class="col-md-5">
                														    <label>STATE INSURANCE (SI)<span title="Required" style="color: red;">*</span></label>
                												        </div>
                												        <div class="col-md-7">
                														    <div class="form-group">
                															    <input type="text" class="form-control"  name="employeeStateInsurance" id="employeeStateInsurance" value="<?php //echo $qs->employeeStateInsurance; ?>"  required="required">
                														    </div>
                								                        </div>
                												</div>
                                                            </div>
												            <div class="col-xs-6 col-md-6 col-lg-6">
                                                                 <div class="form-group row">
                    													<div class="col-md-5">
                    														<label>	MEDICAL ALLOWANCE (MA)<span title="Required" style="color: red;">*</span></label>
                    													</div>
                    													<div class="col-md-7">
                    														<div class="form-group">
                    															<input type="text" name="medicalAllowance" id="medicalAllowance" value="<?php //echo $qs->medicalAllowance; ?>"  class="form-control"  required="required">
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
                													    <div class="col-md-5">
                														    <label>TRANSPORT ALLOWANCE (TA)<span title="Required" style="color: red;">*</span></label>
                												        </div>
                												        <div class="col-md-7">
                														    <div class="form-group">
                															    <input type="text" class="form-control" name="transportAllowance" id="transportAllowance"  required="required">
                														    </div>
                								                        </div>
                												</div>
                                                            </div>
												            <div class="col-xs-6 col-md-6 col-lg-6">
                                                                 <div class="form-group row">
                    													<div class="col-md-5">
                    														<label>		DEARNESS ALLOWANCE (DA)<span title="Required" style="color: red;">*</span></label>
                    													</div>
                    													<div class="col-md-7">
                    														<div class="form-group">
                    															<input type="text" name="dearnessAllowance" id="dearnessAllowance"  class="form-control"  required="required">
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
                													    <div class="col-md-5">
                														    <label>	HOUSE RENT ALLOWANCE (HRA)<span title="Required" style="color: red;">*</span></label>
                												        </div>
                												        <div class="col-md-7">
                														    <div class="form-group">
                															    <input type="text" class="form-control"   name="houseRentAllowance" id="houseRentAllowance" required="required">
                														    </div>
                								                        </div>
                												</div>
                                                            </div>
												            <div class="col-xs-6 col-md-6 col-lg-6">
                                                                 <div class="form-group row">
                    													<div class="col-md-5">
                    														<label>Total Leave<span title="Required" style="color: red;">*</span></label>
                    													</div>
                    													<div class="col-md-7">
                    														<div class="form-group">
                    															<input type="text"  name="skillAllowance" value="" id="skillAllowance" value="<?php //echo $qs->skillAllowance; ?>"  disabled="disabled" class="form-control"  required="required">
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
                													    <div class="col-md-5">
                														    <label>	Deduction Due to Absent <span title="Required" style="color: red;">*</span></label>
                												        </div>
                												        <div class="col-md-7">
                														    <div class="form-group">
                															    <input type="text" class="form-control" name="spcialAllowance" value="" id="spcialAllowance" value="<?php //echo $qs->spcialAllowance; ?>" disabled="disabled">
                														    </div>
                								                        </div>
                												</div>
                                                            </div>
												            <div class="col-xs-6 col-md-6 col-lg-6">
                                                                 <div class="form-group row">
                    													<div class="col-md-5">
                    														<label>	ENCENTIEVE<span title="Required" style="color: red;">*</span></label>
                    													</div>
                    													<div class="col-md-7">
                    														<div class="form-group">
                    															<input type="text"  name="encentieve" value="<?php //echo $qs->encentieve; ?>" id="encentieve"  class="form-control"  required="required">
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
                													    <div class="col-md-5">
                														    <label>	ENCENTIEVE <span title="Required" style="color: red;">*</span></label>
                												        </div>
                												        <div class="col-md-7">
                														    <div class="form-group">
                															    <input type="text" class="form-control" name="encentieve" value="<?php //echo $qs->encentieve; ?>" id="encentieve" >
                														    </div>
                								                        </div>
                												</div>
                                                            </div>
												            <div class="col-xs-6 col-md-6 col-lg-6">
                                                                 <div class="form-group row">
                    													<div class="col-md-5">
                    														<label>	BONUS<span title="Required" style="color: red;">*</span></label>
                    													</div>
                    													<div class="col-md-7">
                    														<div class="form-group">
                    															<input type="text" name="bonus" value="<?php //echo $qs->bonus; ?>" id="bonus"  class="form-control"  required="required">
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
                													    <div class="col-md-5">
                														    <label>	GROSS <span title="Required" style="color: red;">*</span></label>
                												        </div>
                												        <div class="col-md-7">
                														    <div class="form-group">
                															    <input type="text" class="form-control"  name="gross_s" value="<?php //echo $qs->gross_s; ?>" id="gross_s">
                														    </div>
                								                        </div>
                												</div>
                                                            </div>
												            	<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-5"></div>
													<div class="col-md-7">
														<div class="form-group">
															<button type="submit" class="btn btn-primary"
																id="" >
																<i class="far fa-edit">&nbsp;SAVE SALARY FORMAT</i>
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
    							 <?php } ?>
					        </div>
					    </div>
			        </div>
		        </div>
	        </div>
        </div>
    </div>
</div>    