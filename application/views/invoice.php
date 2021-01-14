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
 $cinfo=$this->db->get("customer_info");
 $this->db->where("id",$uri);
 $inv=$this->db->get("invoice_serial");
  if($inv->num_rows()>0){ 
 $this->db->where("invoice_no",$inv->row()->id);
$daybook=$this->db->get("day_book");
if($daybook->num_rows()>0){
 $this->db->where("invoice_no",$daybook->row()->invoice_no);
 $cplan=$this->db->get("customer_plan");
$this->db->where("id",$cplan->row()->plan_id);
$plann=$this->db->get("plan_name");
$this->db->where("plan_id",$cplan->row()->plan_id);
$assplan=$this->db->get("assign_plan");
$this->db->where("id",$assplan->row()->unit_id);
$unit=$this->db->get("plan_unit");
?>	
			<table style="width: 100%; border: none;">
			<tr>
		
				<td width="90%" style="border: none;">
				
				<h2 align="center" style="font-variant:capital-caps;"><?php echo $plann->row()->Name." "."Scheme Invoice";?> </h2>
			        
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
                        <?php echo $cinfo->row()->name; ?>
                    	  </strong>
                        </td>
                    </tr>
                    <tr>
                    	<td style="border:none;">
                    	  <?php echo '<strong>Mobile No. :</strong>'.$cinfo->row()->mobile; ?>
                    	  <br/>
                    	  <?php 
                    	  echo '<strong>Address. :</strong>'.$cinfo->row()->address.",".$cinfo->row()->city."<br>".$cinfo->row()->state."-".$cinfo->row()->pin; ?>
                    	 
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
                  
                  <td><?php echo $inv->row()->invoice_Number;  ?></td>
                 
                </tr>
                <tr>
                    <td >Date:</td>
                    <td><?php echo $daybook->row()->pay_date; ?></td>
                </tr>
                  <tr>
                    <td >Mode:</td>
                    <td><?php echo $daybook->row()->pay_mode; ?></td>
                </tr>
            </table>
            </div>
		 </div>
		
		<table id="items">
		     <tr>
		       <th width="3%">#</th>
		        <th width="12%">Customer Id</th>
		        <th width="12%">Customer Name</th>
		       <th width="12%">Father Name</th>
		       <th width="12%">Plan Name</th>
		       <th width="12%">House Number</th>
		       <th width="16%">Size</th>
		       <th width="16%">Amount</th>
               <th width="8%">Advance Amount</th>
             
             </tr>
<?php 
$i=1;

?>
 <tr>
		      <td><?php echo $i; ?></td>
		      <td><?php echo $cinfo->row()->username;?></td>
		        <td><?php echo $cinfo->row()->name;; ?></td>
		      <td><?php echo $cinfo->row()->fname;?></td>
		      <td><?php echo $plann->row()->Name;?></td>
		    <td><?php echo $cplan->row()->house_number;?></td>
		     <td><?php echo $assplan->row()->size."  ".$unit->row()->unit_name; ?></td>
		       <td><?php echo $assplan->row()->price; ?></td>
		      <td><?php echo $daybook->row()->amount; ?></td>
		   </tr>
		   <?php $totPrice1=0;
		   $totPrice=$totPrice1+$daybook->row()->amount;
		   ?>
<!--	  <tr>
		      <td><?php //echo $i; ?></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td><?php //echo $totquantity; ?></td>
		      <td></td>
		      <td>Total</td>
		      <td></td>
		      <td><?php echo $totPrice; ?></td>
		   </tr>-->
		    <tr>
		      <td><?php //echo $i; ?></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td><?php //echo $totquantity; ?></td>
		      <td></td>
		      <td>Paid</td>
		      <td></td>
		      <td><?php echo $daybook->row()->amount; ?></td>
		   </tr>
		     <tr>
		      <td><?php //echo $i; ?></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td><?php //echo $totquantity; ?></td>
		      <td></td>
		      <td>Balance</td>
		      <td></td>
		      <?php $totPrice2=$assplan->row()->price-$daybook->row()->amount;?>
		      <td><?php echo $totPrice2; ?></td>
		   </tr>
		</table>
			
		<div>
		
		</br>
		<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Paid Amount in Words : </strong><script> document.write(convert_number(<?php  echo $totPrice; ?>)); </script> Only /-<br>
		<?php  } }?>
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