<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                  <div class="card-body">
                    <div class="author-box-center">
					<?php if(strlen($crecord->row()->ico_logo > 0)):?>
													<img alt="" height="128" width="138" src="<?php echo base_url();?>assets/img/<?php echo $crecord->row()->ico_logo;?>" />
												<?php else:?>
													<img alt="" width="128" src="<?php echo base_url();?>assets/img/default.png" />	
												<?php endif;?>
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <a href="#"><?php echo $this->session->userdata("name") ; ?></a>
                      </div>
					  <div class="author-box-job">User Id:<?php  echo $crecord->row()->admin_username; ?></div>
                    </div>
                    
                  </div>
                </div>
                
              </div>
              <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                  <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                          aria-selected="true">View</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                          aria-selected="false">Edit</a>
                      </li>
                       <li class="nav-item">
                        <a class="nav-link" id="passwordc" data-toggle="tab" href="#password" role="tab"
                          aria-selected="false">Change Password</a>
                      </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                       
                          <div class="card-header">
                            <h4>Full Profile</h4>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <div class="form-group col-md-3 col-12"><label><b>Name :</b></label></div>
							  <div class="form-group col-md-3 col-12"><label><?php echo $crecord->row()->customer_name; ?></label></div>
                              <div class="form-group col-md-3 col-12"><label><b>Status :</b></label></div>
							  <div class="form-group col-md-3 col-12"> <label><?php if($crecord->row()->status==1){echo "Active";} ?></label> </div>
                            </div>
							
							<div class="row">
                              <div class="form-group col-md-3 col-12"><label><b>City :</b></label></div>
							  <div class="form-group col-md-3 col-12"><label><?php echo $crecord->row()->city; ?></label></div>
                              <div class="form-group col-md-3 col-12"><label><b>State :</b></label></div>
							  <div class="form-group col-md-3 col-12"> <label><?php echo $crecord->row()->state; ?></label> </div>
                            </div>
							<div class="row">
                              <div class="form-group col-md-3 col-12"><label><b>Current Address :</b></label></div>
							  <div class="form-group col-md-3 col-12"><label><?php echo $crecord->row()->address_1; ?></label></div>
                              <div class="form-group col-md-3 col-12"><label><b>Permanent Address :</b></label></div>
							  <div class="form-group col-md-3 col-12"> <label><?php echo $crecord->row()->address_2; ?></label> </div>
                            </div>
							<div class="row">
                              <div class="form-group col-md-3 col-12"><label><b>Pincode :</b></label></div>
							  <div class="form-group col-md-3 col-12"><label><?php echo $crecord->row()->pin; ?></label></div>
                              <div class="form-group col-md-3 col-12"><label><b>Email Id  :</b></label></div>
							  <div class="form-group col-md-3 col-12"> <label><?php echo $crecord->row()->email1; ?></label> </div>
                            </div>
							<div class="row">
                              <div class="form-group col-md-3 col-12"><label><b>Mobile No :</b></label></div>
							  <div class="form-group col-md-3 col-12"><label><?php echo $crecord->row()->mobile_number; ?></label></div>
                              <div class="form-group col-md-3 col-12"><label><b>Phone No :</b></label></div>
							  <div class="form-group col-md-3 col-12"> <label><?php echo $crecord->row()->phone_number; ?></label> </div>
                            </div>
							<div class="row">
                              <div class="form-group col-md-3 col-12"><label><b>GST No :</b></label></div>
							  <div class="form-group col-md-3 col-12"><label><?php echo $crecord->row()->gst_number; ?></label></div>
                              <div class="form-group col-md-3 col-12"><label><b>Fax No :</b></label></div>
							  <div class="form-group col-md-3 col-12"> <label><?php echo $crecord->row()->fax_number; ?></label> </div>
                            </div>
							<div class="row">
                              <div class="form-group col-md-3 col-12"><label><b>User Id:</b></label></div>
							  <div class="form-group col-md-3 col-12"><label><?php echo $crecord->row()->admin_username; ?></label></div>
                              <div class="form-group col-md-3 col-12"><label><b>Language :</b></label></div>
							  <div class="form-group col-md-3 col-12"> <label><?php echo $crecord->row()->language; ?></label> </div>
                            </div>
							<div class="row">
                              <div class="form-group col-md-3 col-12"><label><b>Business Name:</b></label></div>
							  <div class="form-group col-md-3 col-12"><label><?php echo $crecord->row()->business_name; ?></label></div>
                              <div class="form-group col-md-3 col-12"><label><b>Nationality :</b></label></div>
							  <div class="form-group col-md-3 col-12"> <label><?php echo $crecord->row()->nationality; ?></label> </div>
                            </div>
							<div class="row">
                              <div class="form-group col-md-3 col-12"><label><b>Join Date:</b></label></div>
							  <div class="form-group col-md-3 col-12"><label><?php echo $crecord->row()->created;?></label></div>
                             
                            </div>
							
							
                          </div>
                      </div>
                      <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                        <form method="post" class="needs-validation" action="<?php echo base_url();?>index.php/adminController/admin_edit_profile" enctype="multipart/form-data"   >
                          <div class="card-header">
                            <h4>Edit Profile</h4>
                          </div>
                          <div class="card-body">
                            <div class="row">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $crecord->row()->id; ?>">
							<div class="form-group col-md-2 col-12"><label><b>Admin Name</b></label></div>
							  <div class="form-group col-md-4 col-12"><input type="text" class="form-control" name="cname" value="<?php echo $crecord->row()->customer_name; ?>">
                                <div class="invalid-feedback">Please fill in the first name</div>
                              </div>
                              <div class="form-group col-md-2 col-12"><label><b>Status</b></label></div>
                              <div class="form-group col-md-4 col-12"><?php if($crecord->row()->status==1){echo "Active";} ?>
                                <div class="invalid-feedback">Please fill in the last name </div>
                              </div>
                            </div>
							 <div class="row">
							<div class="form-group col-md-2 col-12"><labl><b>City</b></label></div>
							  <div class="form-group col-md-4 col-12"><input type="text" class="form-control" name="city" value="<?php echo $crecord->row()->city; ?>">
                                <div class="invalid-feedback">Please fill in the first name</div>
                              </div>
                              <div class="form-group col-md-2 col-12"><label><b>State</b></label></div>
                              <div class="form-group col-md-4 col-12"><input type="text" class="form-control" name="state" value="<?php echo $crecord->row()->state; ?>">
                                <div class="invalid-feedback">Please fill in the last name </div>
                              </div>
                            </div>
							 <div class="row">
							<div class="form-group col-md-2 col-12"><label><b>Current Address</b></label></div>
							  <div class="form-group col-md-4 col-12"><input type="text" class="form-control" name="cadd" value="<?php echo $crecord->row()->address_1; ?>">
                                <div class="invalid-feedback">Please fill in the first name</div>
                              </div>
                              <div class="form-group col-md-2 col-12"><label><b>Permanent  Address</b></label></div>
                              <div class="form-group col-md-4 col-12"><input type="text" class="form-control" name="peradd" value="<?php echo $crecord->row()->address_2; ?>">
                                <div class="invalid-feedback">Please fill in the last name </div>
                              </div>
                            </div>
							<div class="row">
							<div class="form-group col-md-2 col-12"><label><b>Pincode</b></label></div>
							  <div class="form-group col-md-4 col-12"><input type="text" class="form-control" name="pin" value="<?php echo $crecord->row()->pin; ?>" readonly>
                                <div class="invalid-feedback">Please fill in the first name</div>
                              </div>
                              <div class="form-group col-md-2 col-12"><label><b>Email 1 </b></label></div>
                              <div class="form-group col-md-4 col-12"><input type="text" class="form-control" name="email" value="<?php echo $crecord->row()->email1; ?>">
                                <div class="invalid-feedback">Please fill in the last name </div>
                              </div>
                            </div>
                            <div class="row">
							<div class="form-group col-md-2 col-12"><label><b>Business Name</b></label></div>
							  <div class="form-group col-md-4 col-12"><input type="text" class="form-control" name="bisinessname" value="<?php echo $crecord->row()->business_name; ?>" readonly>
                                <div class="invalid-feedback">Please fill in the first name</div>
                              </div>
                              <div class="form-group col-md-2 col-12"><label><b>Email 2 </b></label></div>
                              <div class="form-group col-md-4 col-12"><input type="text" class="form-control" name="email2" value="<?php echo $crecord->row()->email2; ?>">
                                <div class="invalid-feedback">Please fill in the last name </div>
                              </div>
                            </div>
							 <div class="row">
							<div class="form-group col-md-2 col-12"><label><b>Mobile No</b></label></div>
							  <div class="form-group col-md-4 col-12"><input type="text" class="form-control" name="mno" value="<?php echo $crecord->row()->mobile_number; ?>">
                                <div class="invalid-feedback">Please fill in the first name</div>
                              </div>
                              <div class="form-group col-md-2 col-12"><label><b>Phone No</b></label></div>
                              <div class="form-group col-md-4 col-12"><input type="text" class="form-control" name="pmno" value="<?php echo $crecord->row()->phone_number; ?>">
                                <div class="invalid-feedback">Please fill in the last name </div>
                              </div>
                            </div>
							<div class="row">
							<div class="form-group col-md-2 col-12"><label><b>Adhaar No</b></label></div>
							  <div class="form-group col-md-4 col-12"><input type="text" class="form-control" name="adhar" value="<?php echo $crecord->row()->fax_number; ?>">
                                <div class="invalid-feedback">Please fill in the first name</div>
                              </div>
                              <div class="form-group col-md-2 col-12"><label><b>GST No</b></label></div>
                              <div class="form-group col-md-4 col-12"><input type="text" class="form-control" name="panno" value="<?php echo $crecord->row()->gst_number; ?>">
                                <div class="invalid-feedback">Please fill in the last name </div>
                              </div>
                            </div>
							 <div class="row">
							<div class="form-group col-md-2 col-12"><label><b>Language</b></label></div>
							  <div class="form-group col-md-4 col-12"><input type="text" class="form-control" name="language" value="<?php echo $crecord->row()->language; ?>" readonly>
                                <div class="invalid-feedback">Please fill in the first name</div>
                              </div>
                              <div class="form-group col-md-2 col-12"><label><b>Nationality</b></label></div>
                              <div class="form-group col-md-4 col-12"><input type="text" class="form-control" name="nat" value="<?php echo $crecord->row()->nationality; ?>" readonly>
                                <div class="invalid-feedback">Please fill in the last name </div>
                              </div>
                            </div>
							<div class="row">
							<div class="form-group col-md-2 col-12"><label><b>Profile Image</b></label></div>
							  <div class="form-group col-md-4 col-12"><input type="file" class="form-control" name="profile_logo" value="<?php echo $crecord->row()->ico_logo; ?>" accept="image/*" capture>
                                <div class="invalid-feedback">Please fill in the first name</div>
                              </div>
                              <div class="form-group col-md-2 col-12"><label><b>Logo</b></label></div>
                              <div class="form-group col-md-4 col-12"><input type="file" class="form-control" name="logo" value="<?php echo $crecord->row()->logo; ?>" accept="image/*" capture>
                                <div class="invalid-feedback">Please fill in the last name </div>
                              </div>
                            </div>
							
                          </div>
                          <div class="card-footer text-right">
                            <button class="btn btn-primary"><b>Save Changes</b></button>
                          </div>
                        </form>
                      </div>
                      <!-- password -->
                      
                      <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="passwordc">
                      <!--  <form method="post" class="needs-validation" action="<?php echo base_url();?>index.php/adminController/changePassword" enctype="multipart/form-data"   >-->
                          <div class="card-header">
                            <h4>Change Password Panel</h4>
                          </div>
                          <div class="card-body">
                          
						<div class="row">
							<div class="form-group col-md-6 col-12"><label><b>Enter Current Password</b></label></div>
							  <div class="form-group col-md-6 col-12"><input type="password" class="form-control" id="op" >
                                <div class="invalid-feedback">Please fill in the first name</div>
                              </div>
                              <div class="form-group col-md-6 col-12"><label><b>New Password</b></label></div>
                              <div class="form-group col-md-6 col-12"><input type="password" class="form-control" id="np" >
                                <div class="invalid-feedback">Please fill in the last name </div>
                              </div>
                            </div>
							 <div class="row">
							<div class="form-group col-md-6 col-12"><label><b>Retype New Password</b></label></div>
							  <div class="form-group col-md-6 col-12"><input type="password" class="form-control" id="rnp" >
                                <div class="invalid-feedback">Please fill in the first name</div>
                              </div>
                             
                            </div>
                            <input type = "hidden" id ="userid" value = "<?php echo $crecord->row()->id;?>"/>
							<div  class="col-md-6 col-12" id = "upmsg"></div>
                          </div>
                          <div class="card-footer text-right">
                            <button class="btn btn-primary" id="changep">Change Password</button>
                            <script>	
                            $("#changep").click(function(){
                            var userid = $("#userid").val();  
						    var op = $("#op").val();
						    var np = $("#np").val();
						    var rnp = $("#rnp").val();
						    if(np==rnp){
						    $.post("<?php echo site_url('adminController/changePassword') ?>",{userid : userid , op : op, np : np , rnp : rnp},function(data){
							$("#upmsg").html(data);
							$("#op").val("");
							$("#np").val("");
							$("#rnp").val("");
						    });
						    }else{
						       $("#upmsg").html('<div class ="alert alert-warning">Renter password mismatch</div>'); 
						    }
					    });
                        </script>
                          </div>
                       <!-- </form>-->
                      </div>
                      <!--password end-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label>
                    <span class="control-label p-r-20">Mini Sidebar</span>
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <div class="disk-server-setting m-b-20">
                    <p>Disk Space</p>
                    <div class="sidebar-progress">
                      <div class="progress" data-height="5">
                        <div class="progress-bar l-bg-green" role="progressbar" data-width="80%" aria-valuenow="80"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <span class="progress-description">
                        <small>26% remaining</small>
                      </span>
                    </div>
                  </div>
                  <div class="disk-server-setting">
                    <p>Server Load</p>
                    <div class="sidebar-progress">
                      <div class="progress" data-height="5">
                        <div class="progress-bar l-bg-orange" role="progressbar" data-width="58%" aria-valuenow="25"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <span class="progress-description">
                        <small>Highly Loaded</small>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
     
