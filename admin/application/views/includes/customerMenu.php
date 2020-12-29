
<ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="<?php echo base_url()?>index.php/clogin/index" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
              
            </li>
            
             <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="user-check"></i><span>Personal</span></a>
              <ul class="dropdown-menu">
                   <li><a href="<?php echo base_url();?>index.php/clogin/customer_profile">View/Edit Profile</a></li>
					<li><a href="<?php echo base_url();?>index.php/clogin/customer_profile">Bank Details</a></li>
              </ul>
            </li>
			<li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="user-check"></i><span>Business</span></a>
              <ul class="dropdown-menu">
                  
					<li><a href="<?php echo base_url();?>index.php/clogin/customer_profile">Total Business</a></li>
					<li><a href="<?php echo base_url();?>index.php/clogin/customer_profile">Current Business</a></li>
              </ul>
            </li>
              <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="mail"></i><span>Customer</span></a>
              <ul class="dropdown-menu">
               <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/cod/">List</a></li>
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/coupon/">Add New</a></li>
				<li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/coupon/">Update KYC</a></li>
               
              </ul>
            </li>
             <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="mail"></i><span>Business</span></a>
              <ul class="dropdown-menu">
               <li><a class="nav-link" href="<?php echo base_url();?>index.php/Bill_controller/saleProduct">Over All</a></li>
                <li><a class="nav-link" href="#">Agent Wise</a></li>
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/Bill_controller/sBillHistory">Customer Wise</a></li>
              </ul>
            </li>
            
          
             <li class="dropdown">
              	<a href="#" class="nav-link has-dropdown"><i data-feather="anchor"></i><span>SMS Panel</span></a>
	              <ul class="dropdown-menu">
	                	<li><a class="nav-link" href="<?php echo base_url();?>index.php/clogin/downline/1">Send SMS</a></li>
	            </ul>
            </li>
			 <li class="dropdown">
              	<a href="#" class="nav-link has-dropdown"><i data-feather="anchor"></i><span>Logout</span></a>
	            
            </li>
 
          </ul>