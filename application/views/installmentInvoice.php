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
    </style>
<?php //$school_code = $this->session->userdata("school_code");?>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	<title>Cash Invoice</title>
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/style.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/print.css' media="print" />
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/example.js'></script>
</head>
</br>
</br></br>
<body>
 <div id="printcontent">
    <div id="page-wrap">
<?php 
	$info=$this->db->get("general_settings")->row();
	
?>		
		<table style="width: 100%; border: none;">
			<tr>
		
				<td width="90%" style="border: none;">
				
				<h1 align="center" style="font-variant:small-caps;">
				    <?php	echo $info->business_name; ?></br>
			        </h1>
			        <h2 align="center" style="font-variant:small-caps;">
						<?php	echo $info->address_1; ?>
			        </h2>
					
			        <h3 align="center" style="font-variant:small-caps;">
						<?php echo $info->state." - ".$info->pin; ?>
			        </h3>
			        <h3 align="center" style="font-variant:small-caps;">
						<?php if(strlen($info->email1 > 0 )){echo "Phone : ".$info->email1.", ";} ?><?php echo "Mobile : ".$info->phone_number; ?>
			        </h3>
				</td>
			</tr>
		</table>
		<?php
 $uri= $this->uri->segment("3");
 $uri1= $this->uri->segment("4");
 $this->db->where("id",$uri1);
 $cinfo=$this->db->get("customer_info")->row();
 $this->db->where("invoice_no",$uri);
  $this->db->where("reason",1);
 $daybook=$this->db->get("day_book")->row();
 $this->db->where("id",$daybook->invoice_no);
 $is=$this->db->get("invoice_serial");
 $this->db->where("customer_id",$cinfo->id);
 $cplan=$this->db->get("customer_plan");
 $this->db->where("id",$cplan->row()->plan_id);
$pname=$this->db->get("plan_name");
$this->db->where("plan_id",$pname->row()->id);
$assplan=$this->db->get("assign_plan");
$this->db->where("id",$assplan->row()->unit_id);
$unit=$this->db->get("plan_unit");

?>	
			<table style="width: 100%; border: none;">
			<tr>
		
				<td width="90%" style="border: none;">
				
				<h2 align="center" style="font-variant:small-caps;"><?php echo $pname->row()->Name."  ".$cplan->row()->house_number." "."Installment Invoice";?> </h2>
			        
				</td>
			</tr>
		</table>
		
		   <div id="customer">
        	  <div style="display:inline-block;">

            <table >
                    <tr>
                       <td style="border:none;"><strong>To</strong></td>
                    </tr>
                    <tr>
                    	<td style="border:none;">
                    	 	<strong>
                        <?php echo $cinfo->name; ?>
                    	  </strong>
                        </td>
                    </tr>
                    <tr>
                    	<td style="border:none;">
                    	  <?php echo '<strong>Mobile No. :</strong>'.$cinfo->mobile; ?>
                    	  <br/>
                    	  <?php 
                    	  echo '<strong>Address. :</strong>'.$cinfo->address.",".$cinfo->city."<br>".$cinfo->state."-".$cinfo->pin; ?>
                    	 
                        </td>
                        
                    	  
                        
                    </tr>
            </table>
			</div>
		
            <div style="display:inline-block; float:right">
            <table>
                <tr>
                    <td class="meta-head" colspan="2"><h3>Cash Payment</h3></td>
                </tr>
                <tr>
                    <td >
                    	<?php echo 'Reciept No. :';	?>
                    </td>
                    <?php  if($is->num_rows()>0){ ?>
                  <td><?php echo $is->row()->invoice_Number;  ?></td>
                  <?php } ?>
                </tr>
                <tr>
                    <td >Date:</td>
                    <td><?php echo $daybook->pay_date; ?></td>
                </tr>
                  <tr>
                    <td >Mode:</td>
                    <td><?php echo $daybook->pay_mode; ?></td>
                </tr>
            </table>
            </div>
		 </div>
		
		<table id="items">
		     <tr>
		       <th width="3%">#</th>
		       <th width="12%">Customer Id</th>
		      <!-- <th width="12%">Customer Name</th>
		       <th width="12%">Father Name</th>
		       <th width="12%">Plan Name</th>
		       <th width="12%">House Number</th>
		       <th width="16%">Size</th>
		       <th width="16%">Amount</th>-->
		       <th width="12%">Due From</th>
		       <th width="12%">Due To</th>
		       <th width="16%">Number Of Installments</th>
		        <th width="8%">Installment Amount</th>
             </tr>
<?php 
$i=1;
$totPrice=0;
?>
 <tr>
		      <td><?php echo $i; ?></td>
		      <td><?php echo $cinfo->username;?></td>
		     
		     <!-- <td><?php echo $cinfo->name; ?></td>
		      <td><?php echo $cinfo->fname;?></td>
		      <td><?php echo $pname->row()->Name;?></td>
		    <td><?php echo $cplan->row()->house_number;?></td>
		     <td><?php echo $assplan->row()->size."  ".$unit->row()->unit_name; ?></td>
		       <td><?php echo $assplan->row()->price; ?></td>-->
		      <td><?php echo $daybook->pay_date;?></td>
		      <td><?php echo $daybook->pay_date;?></td>
		      <td><?php echo "1"; ?></td>
		      <td><?php echo $daybook->amount; ?></td>
		      <!--<td><?php //echo $totPrice; ?></td>
		      <td><?php //echo $unit->row()->unit_name; ?></td>-->
		   </tr>
		   <?php $totPrice1=$totPrice+$daybook->amount; ?>
	  <tr>
		      <td><?php //echo $i; ?></td>
		      <td></td>
		      <td></td>
		     
		      
		      <td>Total</td>
		      <td><?php //echo $totquantity; ?></td>
		      <td><?php echo $totPrice1; ?></td>
		       <!--<td></td>
		      <td></td>-->
		   </tr>
		</table>
			
		<div>
		
		</br>
		<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Paid Amount in Words : </strong><script> document.write(convert_number(<?php  echo $totPrice1; ?>)); </script> Only /-<br>
		
		<table style="width: 100%;border:1px solid black; ">
			<tbody>
				<tr>
					<td style="border:1px solid black; padding-left: 30px;">
					     <h3>*All the above payments are subject to cheque realization, wherever applicable. </h3>
					     </br>
                       <h3>* This document is elecrtically generated, for any queries please contact the servicing branch. </h3>
                        </td>
				
				</tr>
			</tbody>
		</table>
		</div>
		<div id="terms">
		  <h5>Terms</h5>
		  <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
		</div>
		<div class="invoice-buttons" style="text-align:center;">
    <button class="button button2" type="button"  onclick="window.print();">
      <i class="fa fa-print padding-right-sm"></i> Print Reciept
    </button>
  </div>
	</div>
	<br/><br/>
 </div>
</body>

</html>