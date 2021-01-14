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
                            <th class="text-center">
                              #
                            </th>
                           <!-- <th>Customer ID</th>-->
                             <th>Username</th>
                            <th>Customer Name</th>
                            <th>Father Name</th>
                            <th>Mobile Number</th>
                            <th>Email Id</th>
                            <th>Address</th>
                            <th>Parent Id</th>
                            <th>Edit</th> 
                             <th>Delete</th>
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
                             <td><a href="<?php echo base_url();?>index.php/customer/customerProfile/<?php echo $data->id; ?>"><?php echo $data->username;?></a>
                            <!--<td class="align-middle" ><?php echo $data->id;?></a>-->
                            <input type="hidden" id="emp_id<?php echo $i;?>" value="<?php echo $data->id;?>"></td>
                            <td><?php echo $data->name;?></td>
                            <td><?php echo $data->fname;?></td>
                            <td><?php echo $data->mobile;?></td>
                            <td><?php echo $data->email;?></td>
                            <td><?php echo $data->address;?></td>
                             <?php $this->db->where("id",$data->reff_id);
                                   $aginfo= $this->db->get("agent_info");
                                        ?>
                           <td><b> <?php echo $aginfo->row()->username;?></b></td>
                            <td><button type="button" class="btn btn-warning">
                            <a href="<?php echo base_url();?>index.php/customer/editCustomer/<?php echo $data->id;?>">
                            <i class="fa fa-edit" style="color:white"></i>
                            </a></button></td>
                             <td><button type="button" class="btn btn-danger">
                            <a href="<?php echo base_url();?>index.php/customer/deleteCust/<?php echo $data->id;?>">
                            <i class="fa fa-trash" style="color:white"></i>
                            </a></button></td>
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
