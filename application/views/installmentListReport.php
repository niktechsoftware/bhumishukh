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
                    <input type="hidden" name ="sdate" value="<?php echo $sdate;?>" >
                    <input type="hidden" name ="edate" value="<?php echo $edate;?>" >
                
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                     
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>PAID BY</th>
                            <th>RECIEVED BY</th>
                            <th>REASON</th>
                            <th>AMOUNT</th>
                            <th>INVOICE NO.</th>
                            <th>PAY DATE</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                          <?php 
                           if($gdbd->num_rows()>0){
                                $i=1;
                                foreach($gdbd->result() as $gt):  ?>
                                <td><?php echo $i;?></td>    
                                <?php $this->db->where("id",$gt->paid_by);
                                      $cinfo=  $this->db->get("customer_info");
                                ?>
                                <td><?php echo $cinfo->row()->name;?></td> 
                                <td><?php if($gt->paid_to==1){echo "ADMIN"; }else{echo $gt->paid_to; }?></td>
                                
                                <td><?php if($gt->reason==1){echo "INSTALLMENT"; }else{ }?></td> 
                                <td><?php  echo $gt->amount;?></td>
                                <?php $this->db->where("id",$gt->invoice_no);
                                      $is=  $this->db->get("invoice_serial");?>
                                <td><a href="<?php echo base_url();?>index.php/customer/installmentInvoice/<?php echo $gt->invoice_no;?>/<?php echo $gt->paid_by;?>"><?php echo $is->row()->invoice_Number;?></a></td> 
                                <td><?php echo $gt->pay_date;?></td>  
                          </tbody>  
                          <?php $i++; endforeach; }?>
                        
                        
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
