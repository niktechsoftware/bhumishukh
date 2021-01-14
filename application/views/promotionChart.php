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
                  <th style="center">Self B V</th>
                   <th style="center">Advisor</th>
                    <th style="center">Promoter</th>
                     <th style="center">F.O</th>
                      <th style="center">S.O</th>
                       <th style="center">C.O</th>
                       <th style="center">Star</th>
                      <th style="center">Silver</th>
                       <th style="center">Gold</th>
                       <th style="center">Ruby</th>
                      <th style="center">Emrald</th>
                       <th style="center">Diamond</th>
                       <th>Action</th>
                          </tr>
                        </thead>
                              <tbody>
                                  <?php $phndetails = $this->db->get("promotion_chart");
                                      if($phndetails->num_rows()>0){
                              $j =1; foreach($phndetails->result() as $phnd): ?>
                                 <tr>
                                  <td><?php echo $j;?></td>
                                    <input type="hidden" id="rank_id<?php echo $phnd->id;?>" value="<?= $phnd->id;?>">
                                  <td><?php echo $phnd->rank_name;?></td>
                                   <td><?php echo $phnd->self_b_v;?></td>
                                  <td><input class="form-control" type="text" id="ad<?php echo $phnd->id;?>" name="advisor" value="<?php echo $phnd->advisor;?>"></td>
                                  <td><input class="form-control" type="text" id="pr<?php echo $phnd->id;?>"name="promoter" value="<?php echo $phnd->promoter;?>"></td>
                                  <td><input class="form-control" type="text" id="fo<?php echo $phnd->id;?>"name="f_o" value="<?php echo $phnd->f_o;?>"></td>
                                  <td><input class="form-control" type="text" id="so<?php echo $phnd->id;?>"name="s_o" value="<?php echo $phnd->s_o;?>"></td>
                                  <td><input class="form-control" type="text" id="co<?php echo $phnd->id;?>"name="c_o" value="<?php echo $phnd->c_o;?>"></td>
                                   <td><input class="form-control" type="text" id="st<?php echo $phnd->id;?>" name="star" value="<?php echo $phnd->star;?>"></td>
                                  <td><input class="form-control" type="text" id="sil<?php echo $phnd->id;?>"name="silver" value="<?php echo $phnd->silver;?>"></td>
                                  <td><input class="form-control" type="text" id="gold<?php echo $phnd->id;?>"name="gold" value="<?php echo $phnd->gold;?>"></td>
                                  <td><input class="form-control" type="text" id="ruby<?php echo $phnd->id;?>"name="ruby" value="<?php echo $phnd->ruby;?>"></td>
                                  <td><input class="form-control" type="text" id="em<?php echo $phnd->id;?>"name="emrald" value="<?php echo $phnd->emrald;?>"></td>
                                  <td><input class="form-control" type="text" id="diamond<?php echo $phnd->id;?>" name="diamond" value="<?php echo $phnd->diamond;?>"></td>
                                 <td><button type="button" class="btn btn-primary" id="sts<?= $phnd->id;?>"><i class="far fa-edit">&nbsp;Save</i></button></td>
                               
                                 <script>
                                   //alert('hiii');
                                    $("#sts<?php echo $phnd->id;?>").click(function(){
                                    var ad = $("#ad<?php echo $phnd->id;?>").val();
                                    var pr = $("#pr<?php echo $phnd->id;?>").val();
                                    var fo = $("#fo<?php echo $phnd->id;?>").val();
                                    var so = $("#so<?php echo $phnd->id;?>").val();
                                    var co = $("#co<?php echo $phnd->id;?>").val();
                                    var st = $("#st<?php echo $phnd->id;?>").val();
                                    var sil = $("#sil<?php echo $phnd->id;?>").val();
                                    var gold = $("#gold<?php echo $phnd->id;?>").val();
                                    var ruby = $("#ruby<?php echo $phnd->id;?>").val();
                                    var em = $("#em<?php echo $phnd->id;?>").val();
                                    var diamond = $("#diamond<?php echo $phnd->id;?>").val();
                                    var rank_id = $("#rank_id<?php echo $phnd->id;?>").val();
                                  
                                    $.post("<?php echo site_url(); ?>/adminController/updatePromvalue",
                                    {
                                        ad : ad , pr : pr, fo : fo , so : so , co : co , st :st , sil : sil,gold :gold, ruby : ruby, em:em,diamond : diamond , rank_id:rank_id }
                                      ,function(data){
                                      //alert(data);
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
