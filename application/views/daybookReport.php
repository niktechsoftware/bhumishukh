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
                             <th>DEBIT</th>
                            <th>CREDIT</th>
                            <th>INVOICE NO.</th>
                            <th>PAY DATE</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                          <?php 
                           $dabit=0;
                          $credit=0;    
                           if($gdbd->num_rows()>0){
                                $i=1;
                                foreach($gdbd->result() as $gt):  ?>
                                <td><?php echo $i;?></td> 
                                  <?php $this->db->where("id",$gt->paid_by);
                                        $cinfo=$this->db->get("customer_info")->row();?>
                                <td><?php echo $cinfo->name;?></td> 
                                <td><?php if($gt->paid_to==1){ echo "BHOOMISUKH";}else{ echo $gt->paid_to; }?></td>
                                  <?php $this->db->where("id",$gt->reason);
                                        $rea=$this->db->get("reason")->row();?>
                                <td><?php echo $rea->reason_name;?></td> 
                                <td style="color: red"><?php if($gt->dabit_cradit == 0 ){ $dabit = $dabit + $gt->amount; echo $gt->amount; } ?></td>
                                <td style="color: green"><?php if($gt->dabit_cradit == 1 || $gt->dabit_cradit == 2){ $credit = $credit + $gt->amount; echo $gt->amount; } ?></td>
                                 <?php $this->db->where("id",$gt->invoice_no);
                                        $invoi=$this->db->get("invoice_serial")->row();?>
                                        <?php if($gt->reason==2){?>
                                <td><a href="<?php echo base_url();?>index.php/customer/invoice/<?php echo $invoi->id?>/<?php echo $gt->paid_by?>"><?php echo $invoi->invoice_Number;?></a></td> 
                                <?php }else if($gt->reason==1){?>
                                 <td><a href="<?php echo base_url();?>index.php/customer/installmentInvoice/<?php echo $invoi->id?>/<?php echo $gt->paid_by?>"><?php echo $invoi->invoice_Number;?></a></td> 
                                <?php }else{?>
                                 <td><a href="<?php echo base_url();?>index.php/customer/invoice/<?php echo $invoi->id?>/<?php echo $gt->paid_by?>"><?php echo $invoi->invoice_Number;?></a></td> 
                                
                                <?php } ?>
                                <td><?php echo $gt->pay_date;?></td>  
                          </tbody>  
                          <?php $i++; endforeach; }?>
                        <tfoot>
							<tr>
								<td>----</td>
								<td>----------</td>
								<td align="right"><strong>Total</strong></td>
								<td>----------</td>
							
								<td><?php echo $dabit; ?></td>
								<td style="color: red"><?php echo $credit; ?></td>
								<td></td>
								<td></td>
							</tr>
						</tfoot>
                        
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
