
<ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="<?php echo base_url()?>index.php/clogin/index" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
              
            </li>
            
               <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="users"></i><span>Agent</span></a>
              <ul class="dropdown-menu">
          <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/agent_registration">Registration Form </a></li>
           <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/agentCheckId">KYC Info</a></li>
           <!-- <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/agentList">Agent List</a></li>-->
          <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/agent_profile">Agent  Profile</a></li>
          <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/checkBusiness">Check Business</a></li>
                 </ul>
            </li>
             <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="user-plus"></i><span>Customer</span></a>
              <ul class="dropdown-menu">
           <li><a class="nav-link" href="<?php echo base_url();?>index.php/customer/addCust">Add Customer</a></li>
           <li><a class="nav-link" href="<?php echo base_url();?>index.php/customer/customerList">Search Customer</a></li>
           </ul>
            </li>
             <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="anchor"></i><span>Account Details</span></a>
              <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/acDetails"> Account Details</a></li>
        
           </ul>
            </li>
          
			 <li class="dropdown">
              	<a href="<?php echo base_url();?>index.php/welcome/index" class="nav-link has-dropdown"><i data-feather="anchor"></i><span>Logout</span></a>
	            
            </li>
 
          </ul>