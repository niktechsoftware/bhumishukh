
     
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
              <div class="row ">
                  <?php
                   
                  //  $sp = $this->db->query("select * from study_plan where  status =1");
                   //if($sp->num_rows()>0){
                       //foreach($sp->result() as $unip):?>
                           <div class="col-xl-3 col-lg-6">
                                  <div class="card l-bg-green-dark">
                                    <div class="card-statistic-3">
                                      <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                                      <div class="card-content">
                                        <h4 class="card-title"></h4>
                                        <span></span>
                                        <div class="progress mt-1 mb-1" data-height="8">
                                          <div class="progress-bar l-bg-purple" role="progressbar" data-width="25%" aria-valuenow="25"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mb-0 text-sm">
                                          <span class="mr-2"><i class="fa fa-arrow-up"></i> </span>
                                          <span class="text-nowrap"></span>
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                          <?php //endforeach;
                 //  }
                   
           
         
         // $this->db->where("id",$this->session->userdata("customer_id"));
           // $edt =$this->db->get("employee_info")->row();
                   // $sp1=$this->db->query("select study_plan.id, study_plan.page_name, study_plan.plan_name from study_plan join assign_plan1 on assign_plan1.plan_id =study_plan.id where assign_plan1.master_plan_id='$edt->studyplan_master_id' " );
          
             // if($sp1->num_rows()>0){
             // 	foreach($sp1->result() as  $row):
              
              	?>
              	
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-green-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                  <div class="card-content">
                    <h4 class="card-title"> <?php //echo $row->plan_name;?></h4>
                    <span></span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-purple" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i> </span>
                      <span class="text-nowrap"></span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            
             <?php //endforeach;}?>
            
        
           
          </div>
            
           
         
          <div class="row">
            <div class="col-12 col-sm-12 col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4></h4>
                </div>
                <div class="card-body">
                 
                  <table class="table table-bordered table-hover table-responsive text-nowrap"> <tr> <thead><th></th><th></th><th></th></tr></thead>
                  
                  
                  <tbody>
                     
                     
                      </tbody>
                  
                  </table>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-6">
              <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                  <div class="summary">
                      
                     
                  <table class="table table-bordered table-hover table-responsive text-nowrap"> <tr> <thead><th></th><th></th><th></th></tr></thead>
                  
                  
                  <tbody>
                      
                  
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          
          
         