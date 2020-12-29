<style>
.mySlides {display:none;}
</style>
<table width="70%" border="0" cellspacing="0" cellpadding="0">     
           	<tr>
			<td width="90%" >
<div class="w3-container">
  
</div>

<div class="w3-content w3-section" style="max-width:700px">
  <img class="mySlides w3-animate-fading" src='<?php echo base_url();?>assets/images/1.jpg' style="height:400px;width:1125px;">
  <img class="mySlides w3-animate-fading"  src='<?php echo base_url();?>assets/images/2.jpg'  style="height:400px;width:1125px">
  <img class="mySlides w3-animate-fading"   src='<?php echo base_url();?>assets/images/3.jpg'  style="height:400px;width:1125px">
  <img class="mySlides w3-animate-fading"  src='<?php echo base_url();?>assets/images/4.jpg'  style="height:400px;width:1125px">
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 9000);    
}
</script>
 </td>       </tr>
					        


						        </table>