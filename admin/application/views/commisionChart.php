<input type="hidden" id ="mid" value ="<?php //echo $mid;?>"/>
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          <h4><?php echo $smallTitle;?></h4>
                        </div>
                        <div class="card-body"   
    
     <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                           <th>Sno</th>
                   <th>Rank Name</th>
                  <th style="center">1 year%</th>
                   <th style="center">2 year%</th>
                    <th style="center">3 year%</th>
                     <th style="center">4 year%</th>
                      <th style="center">5 year%</th>
                       <th style="center">6 year%</th>
                       <th>Action</th>
                          </tr>
                        </thead>
                              <tbody>
                                  <?php $phndetails = $this->db->get("commission_chart");
                                      if($phndetails->num_rows()>0){
                              $j =1; foreach($phndetails->result() as $phnd): ?>
                                 <tr>
                                  <td><?php echo $j;?></td>
                                    <input type="hidden" id="rank_id<?php echo $phnd->id;?>" value="<?= $phnd->id;?>">
                                  <td><?php echo $phnd->name_of_rank;?></td>
                                  <td><input class="form-control" type="text" id="year1<?php echo $phnd->id;?>" name="year1" value="<?php echo $phnd->year_1;?>"></td>
                                  <td><input class="form-control" type="text" id="year2<?php echo $phnd->id;?>"name="year1" value="<?php echo $phnd->year_2;?>"></td>
                                  <td><input class="form-control" type="text" id="year3<?php echo $phnd->id;?>"name="year1" value="<?php echo $phnd->year_3;?>"></td>
                                  <td><input class="form-control" type="text" id="year4<?php echo $phnd->id;?>"name="year1" value="<?php echo $phnd->year_4;?>"></td>
                                  <td><input class="form-control" type="text" id="year5<?php echo $phnd->id;?>"name="year1" value="<?php echo $phnd->year_5;?>"></td>
                                  <td><input class="form-control" type="text" id="year6<?php echo $phnd->id;?>"name="year1" value="<?php echo $phnd->year_6;?>"></td>
                                 <td><button type="button" class="btn btn-primary" id="sts<?= $phnd->id;?>"><i class="far fa-edit">&nbsp;Save</i></button></td>
                                   
                                 <script>
                                   //alert('hiii');
                                    $("#sts<?php echo $phnd->id;?>").click(function(){
                                    var year1 = $("#year1<?php echo $phnd->id;?>").val();
                                    var year2 = $("#year2<?php echo $phnd->id;?>").val();
                                    var year3 = $("#year3<?php echo $phnd->id;?>").val();
                                    var year4 = $("#year4<?php echo $phnd->id;?>").val();
                                    var year5 = $("#year5<?php echo $phnd->id;?>").val();
                                    var year6 = $("#year6<?php echo $phnd->id;?>").val();
                                    var rank_id = $("#rank_id<?php echo $phnd->id;?>").val();
                                  
                                    $.post("<?php echo site_url(); ?>/adminController/updateRankvalue",
                                    {
                                        year1 : year1 , year2 : year2, year3 : year3 , year4 : year4 , year5 : year5 , year6 :year6 , rank_id : rank_id }
                                      ,function(data){
                                      alert(data);
                                      if(data==1) {
                                       alert("Value Updated Successfully !");
                                         location.reload();
                                          $("#sts<?php echo $phnd->id;?>").html("Updated");
                                           }else if(data==0) {
                                          alert("Value Not Updated !");
                                           }
                                         });
                                         });
                                  </script>
                                </tr>



                         <?php $j++; endforeach; }?>
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
