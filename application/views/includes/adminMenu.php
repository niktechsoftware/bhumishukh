
<ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="<?php echo base_url();?>index.php/login/" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
              
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="settings"></i><span>Configuration</span></a>
              <ul class="dropdown-menu">
                     <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/createBv">B V Settings</a></li>
                     <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/planName">Plan Name</a></li>
                      <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/assignPlan">Assign Plan </a></li>
					<li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/commisionChart">Edit Commision Chart </a></li>
					<li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/promotionChart">Edit Promotion Chart</a></li>
					
                 </ul>
            </li>
             <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="users"></i><span>Agent</span></a>
              <ul class="dropdown-menu">
          <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/agent_registration">Registration Form </a></li>
           <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/agentCheckId">KYC Info</a></li>
            <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/activeInactiveList/1">Active  List</a></li>
             <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/activeInactiveList/2">Inactive  List</a></li>
             <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/downLineAgentList/">Sub Agent List</a></li>
                 </ul>
            </li>
             <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="users"></i><span>Salary</span></a>
              <ul class="dropdown-menu">
          <li><a class="nav-link" href="<?php echo base_url();?>index.php/adminController/employeeSalary">Salary </a></li>
         
                 </ul>
            </li>
             <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="user-plus"></i><span>Customer</span></a>
              <ul class="dropdown-menu">
           <li><a class="nav-link" href="<?php echo base_url();?>index.php/customer/addCust">Add Customer</a></li>
           <li><a class="nav-link" href="<?php echo base_url();?>index.php/customer/getCustomerById">Get Coustomer By ID</a></li>
           <li><a class="nav-link" href="<?php echo base_url();?>index.php/customer/custCheckId">KYC Info</a></li>
           <li><a class="nav-link" href="<?php echo base_url();?>index.php/customer/customerList">Customer List</a></li>
            <li><a class="nav-link" href="<?php echo base_url();?>index.php/customer/cusPlanM">Customer Assign Plan</a></li>
            <li><a class="nav-link" href="<?php echo base_url();?>index.php/customer/checkCustId">Pay Installment</a></li>
            
            
           </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="file-text"></i><span>Report</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/daybookController/installmentList">Paid Installment</a></li>
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/downLineAgentList">DownLine Agent List</a></li>
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/daybookController/totalCommision">Total Commision</a></li>
              </ul>
            </li>
            <!--
          <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="briefcase"></i><span>Personal Info</span></a>
              <ul class="dropdown-menu">
               <li><a class="nav-link" href="<?php echo base_url();?>index.php/adminController/product_entry">Product Entry</a></li>
               
              </ul>
            </li>
             <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="mail"></i><span>Customer</span></a>
              <ul class="dropdown-menu">
               <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/cod/">List</a></li>
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/coupon/">Add New</a></li>
               
              </ul>
            </li>
             <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="mail"></i><span>Business</span></a>
              <ul class="dropdown-menu">
               <li><a class="nav-link" href="<?php echo base_url();?>index.php/Bill_controller/saleProduct">Over All</a></li>
                <li><a class="nav-link" href="#">Agent Wise</a></li>
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/Bill_controller/sBillHistory">Customer Wise</a></li>
              </ul>
            </li>-->
             <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="trending-up"></i><span>Expenditure</span></a>
              <ul class="dropdown-menu">
               <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/createEx">Create Expenditure</a></li>
                 <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/createSubEx">Create Sub Expenditure</a></li>
              </ul>
            </li>
             <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="credit-card"></i><span>Transaction</span></a>
              <ul class="dropdown-menu">
               <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/cashPayment">Cash Payment</a></li>
               <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/dTransaction">Director Transaction</a></li>
               <!--<li><a class="nav-link" href="<?php echo base_url();?>index.php/daybookController/cashPayment">Received From Director</a></li>-->
              
              </ul>
            </li>
             <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="book-open"></i><span>Daybook</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/daybookController/dBookDetail">Daybook Detail</a></li>
               
              </ul>
            </li>
		 	 <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="message-circle"></i><span>SMS Account</span></a>
              <ul class="dropdown-menu">
               
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/notice/1">Notice</a></li>
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/notice/2">Agent</a></li>
                 <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/notice/3">Agent and Customer</a></li>
                
              </ul>
            </li>
            <!--
     <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="copy"></i><span>Website</span></a>
              <ul class="dropdown-menu">
               
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/daybookController/daybook/2">Notice</a></li>
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/daybookController/daybookTrans/2">Contact Us</a></li>
                 <li><a class="nav-link" href="<?php echo base_url();?>index.php/daybookController/daybookTrans/2">Gallery</a></li>
                <li><a class="nav-link" href="card.html">Marquee Content</a></li>
              </ul>
            </li>-->
          </ul>