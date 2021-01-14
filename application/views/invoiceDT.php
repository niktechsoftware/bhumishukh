<?php $uri=$this->uri->segment('3');?>
</br>
</br>
<div class="main-content">
	<div class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h4></h4>
						</div>
							<div class="card-body">
								<div class="row" id="regForm">
						            <div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
										    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    	<style type="text/css">

	@media print
	{
			body * { visibility: hidden; }
			#printcontent * { visibility: visible; }
			#printcontent { position: absolute; top: -20px; left: 30px; }
	    }
	    
	    .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}
  
  
 
    .nob{
    	border: none;
    }

td, th {
  border:
  text-align: left;
  padding: 8px;
}    
    </style>
    <script>
        function convert_number(number)
        {
            if ((number < 0) || (number > 999999999))
            {
                return "Number is out of range";
            }
            var Gn = Math.floor(number / 10000000);  
            number -= Gn * 10000000;
            var kn = Math.floor(number / 100000);     /* lakhs */
            number -= kn * 100000;
            var Hn = Math.floor(number / 1000);      /* thousand */
            number -= Hn * 1000;
            var Dn = Math.floor(number / 100);       /* Tens (deca) */
            number = number % 100;               /* Ones */
            var tn= Math.floor(number / 10);
            var one=Math.floor(number % 10);
            var res = "";

            if (Gn>0){
                res += (convert_number(Gn) + " Crore");
            }
            if (kn>0){
                res += (((res=="") ? "" : " ") +
                    convert_number(kn) + " Lakhs");
            }
            if (Hn>0){
                res += (((res=="") ? "" : " ") +
                    convert_number(Hn) + " Thousand");
            }

            if (Dn){
                res += (((res=="") ? "" : " ") +
                    convert_number(Dn) + " hundred");
            }


            var ones = Array("", "One", "Two", "Three", "Four", "Five", "Six","Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen","Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen","Nineteen");
            var tens = Array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty","Seventy", "Eigthy", "Ninety");

            if (tn>0 || one>0)
            {
                if (!(res==""))
                {
                    res += " and ";
                }
                if (tn < 2)
                {
                    res += ones[tn * 10 + one];
                }
                else
                {

                    res += tens[tn];
                    if (one>0)
                    {
                        res += ("-" + ones[one]);
                    }
                }
            }

            if (res=="")
            {
                res = "zero";
            }
            return res;
        }

    </script>
<?php //$school_code = $this->session->userdata("school_code");?>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	<title>Cash Invoice</title>
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/style.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/print.css' media="print" />
	<script type='text/javascript'  src='<?php echo base_url(); ?>assets/js/invoice_js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript'  src='<?php echo base_url(); ?>assets/js/invoice_js/example.js'></script>
</head>

<body calss="form-control" style="background-color:#FFF3D8;">
 <div id="printcontent"  style="margin-left:100px; " calss="form-control" >
    <div id="page-wrap" calss="form-control" style="background-color:#FFFBD8; width:900px; height:500px;">
<?php 
	$info=$this->db->get("general_settings")->row(); ?>	
	
		<table calss="form-control">
	
			<tr calss="form-control">
		    <td calss="form-control" style="border: none;"><img src="http://niktechsoftware.in/bakery/assets/images/logo-1.png" style="width:90px; height:80px; margin-left:100px;"></td>
				<td calss="form-control" width="90%" style="border: none;">
				    <h2 calss="form-control" align="center" style="font-variant:small-caps; margin-right:150px; font-size:40px; color:;">
					<?php echo "Classic Bakery";
					?>
                    </h2>
			        <h3 calss="form-control" align="center" style="font-variant:small-caps; margin-right:150px;color:; font-size:25px; ">
					<?php echo $info->address_1.'  '.$info->state.'  '.$info->pin;?>
			        </h3>
			        <h3 calss="form-control" align="center" style="font-variant:small-caps; margin-right:150px; font-size:25px;">
						<?php echo $info->mobile_number;?>
			        </h3>
			        <h3 calss="form-control" align="center" style="font-variant:small-caps; margin-right:150px; font-size:25px;">
						<?php if(strlen($info->email1 > 0 )){echo "Phone : ".$info->email1.", ";} ?>
			           <?php echo "Mobile :"?><?php echo $info->phone_number.','.$info->mobile_number;; ?>
			           
			        </h3>
				</td>
			
			</tr>
		</table>
		<div id="customer" calss="form-control">
        	  <div calss="form-control" style="display:inline-block;">
        	       <?php $this->db->where('receipt_no',$uri);
                    	 	 $cashpay=$this->db->get('cash_payment');
                    	 	 foreach($cashpay->result() as $cashpay):
                    	 	 $emp=$this->db->get('agent_info');
                    	 	 ?>
                <table calss="form-control" style="border: none;">
                    <tr calss="form-control">
                       <tdcalss="form-control" style="border:none; font-size:20px;"><strong>To</strong></td>
                    </tr>
                    <tr calss="form-control">
                    	<td calss="form-control" style="border:none;">
                    
                    	 	<strong>
                    	 	
                        <span calss="form-control" style="color:; font-size:20px;"><?php echo '<strong>Name. :';?> </strong></span><span style="color:; font-size:20px;"> 
                  <?php if($cashpay->valid_id){
                      if($emp->num_rows()>0){
							    
							    echo $emp->row()->name;
							    } else {echo "N/A";
							        
							    }} ?>
                        </span>
                        
                          </strong>
                        </td>
                    </tr>
              
            </table>
          	</div>
          	  <div calss="form-control" style="float:right">
            <table calss="form-control"  style="border: none;">
               
                <tr class="form-control">
                    <td calss="form-control">
                    <span style="color:;font-size:20px;"><b><?php echo 'Reciept No. :';	?></b></span>
                    </td>
                             <td calss="form-control"><span style="color:; font-size:20px;"><b><?php echo $cashpay->receipt_no; ?></b></span></td>
                </tr>
                <tr>
                    <td calss="form-control"> <span style="color:; font-size:20px;"><b>Date:</b></span></td>
                    <td calss="form-control"><span style="color:; font-size:20px;"><b><?php echo $cashpay->pay_date; ?></b></span></td>
                </tr>
                 
            </table>
            
            </div>
            
		 </div>
		 </br>
		 </br>
		 </br>
		 <table  style="width:100%;"  style="border: none;">
         <tr>
        		       <th width="3%">No.</th>
        		       <th width="14%">From</th>
        		       <th width="14%">To</th>
                       <th width="6%">Bank Name</th>
                       <th width="6%">Account Number</th>
                       <th width="6%">reason</th>
                       <th width="5%">amount</th>
         </tr>
       
       <tr class="item-row">
		      <td><?php echo 1; ?></td>
		      <td><?php echo $cashpay->id_name; ?></td>
		      <td><?php echo $cashpay->valid_id; ?></td>
		       <td><?php echo $cashpay->bank_name; ?></td>
		        <td><?php echo $cashpay->account_number; ?></td>
		     <td><?php echo $cashpay->reason; ?></td>
              <td><?php echo $cashpay->amount; ?></td>
		     
		  </tr>
</table>
		 </br>
	
	<div style="background-color:#FFF894; height:20px; font-size:15px;"><strong calss="form-control">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Paid Amount in Words : </strong><b><script> document.write(convert_number(<?php  echo $cashpay->amount; ?>)); </script>Only /-</b></span> </div><br>
		<div id="terms">
						<h5>Terms</h5>
						<textarea></textarea>
					</div>
			<?php endforeach;?>
		  </body>
</div>
</br>
</br></br>
</br>
</br>

<div class="invoice-buttons" style="text-align:center;">
    <button class="button button2" type="button"   onclick="window.print();">
      <i class="fa fa-print padding-right-sm"></i> Print Reciept
    </button>
  </div>
</html> 
										    </div>
										   </div>
										  </div>
										 </div>
										</form> 
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>	
