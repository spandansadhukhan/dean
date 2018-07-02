<!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">
            <a href="<?php echo $this->webroot.'admin/users/dashboard';?>"><img src="<?php echo $this->webroot?>no_logo.png" alt="" width="120" height="50"></a>
        </div>

        <div class="logo-icon text-center">
             <a href="<?php echo $this->webroot.'admin/users/dashboard';?>"><img src="<?php echo $this->webroot?>no_logo.png" alt="" width="120" height="50"></a>
        </div>
        <!--logo and iconic logo end-->

        <div class="left-side-inner">

            <!-- visible to small devices only -->
            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media logged-user">
                    <img alt="" src="<?php echo $this->webroot.'admin_styles/images/photos/user-avatar.png';?>" class="media-object">
                    <div class="media-body">
                        <h4><a href="#">John Doe</a></h4>
                        <span>"Hello There..."</span>
                    </div>
                </div>

                <h5 class="left-nav-title">Account Information</h5>
                <ul class="nav nav-pills nav-stacked custom-nav">
		  <li><a href="<?php echo $this->webroot.'admin/users/edit/2' ?>"><i class="fa fa-user"></i>  Profile</a></li>
                  <li><a href="<?php echo $this->webroot.'admin/users/changepwd' ?>"><i class="fa fa-cog"></i>  Settings</a></li>
                  <li><a href="<?php echo $this->webroot.'admin/users/logout' ?>"><i class="fa fa-sign-out"></i> Log Out</a></li>
                </ul>
            </div>

            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li class="active">
		    <a href="<?php echo $this->webroot.'admin/users/dashboard';?>"><i class="fa fa-clock-o sidebar-nav-icon"></i>Dashboard</a>
		</li>
		<li class="menu-list">
                   <a href="#"><i class="fa fa-cogs sidebar-nav-icon"></i>General Settings</a>
                    <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/site_settings/edit/1';?>">Site Settings</a>
                        </li>
                        <li class="">
                            <a href="">Email Settings</a>
                        </li>
                        <li class="">
                            <a href="">Payment Settings</a>
                        </li>
                        <li class="">
                            <a href="">SEO Settings</a>
                        </li>
                        <li class="">
                           <a href="<?php echo $this->webroot.'admin/credits/creditsetting';?>">Credit Settings</a>
                        </li>
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/users/subadmin';?>">Sub Admin Users</a>

                        </li>   
                    </ul>
                </li>
		<li class="menu-list">
                   <a href="#"><i class="fa fa-language"></i> Languages</a>
                    <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">Front Language Settings</a>
                        </li>
                        <li class="">
                            <a href="">Admin Language Settings</a>
                        </li>
                        <li class="">
                            <a href=""> Site Messages</a>
                        </li>
                        <li class="">
                            <a href="">Language Settings</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
                   <a href="#"><i class="fa fa-css3 sidebar-nav-icon"></i> Layout/CSS Manager</a>
                    <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">Header</a>
                        </li>
                        <li class="">
                            <a href="">Footer</a>
                        </li>
                        <li class="">
                            <a href="">Sub Middle Wrappers</a>
                        </li>
                        <li class="">
                            <a href="">Filters</a>
                        </li>
			<li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">Site Listing Boxes</a>
                        </li>
                        <li class="">
                            <a href="">Generals</a>
                        </li>
                        <li class="">
                            <a href="">Css Settings</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
                   <a href="#"><i class="fa fa-table sidebar-nav-icon"></i>Contents</a>
                    <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">Static Pages</a>
                        </li>
                        <li class="">
                            <a href="">Header Menu</a>
                        </li>
                        <li class="">
                            <a href="">Footer Menu</a>
                        </li>
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/contents';?>">Content Sections</a>
                        </li>
			<li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">Site Listing Boxes</a>
                        </li>
                        <li class="">
                            <a href="">Generals</a>
                        </li>
                        <li class="">
                            <a href="">Css Settings</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
                   <a href="#"><i class="fa fa-female sidebar-nav-icon"></i> Escorts</a>
                    <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/escorts/';?>">All Escorts</a>
                        </li>
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/escorts/pendinglist';?>">Pending Approvals</a>
                        </li>
                        <li class="">
                            <a href="">Escort On Tour</a>
                        </li>
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/users/addescort';?>">Add New Escort</a>
                        </li>
			<li class="">
                            <a href="<?php echo $this->webroot.'admin/escorts/';?>">Account Closed By Member</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
                   <a href="#"><i class="fa fa-group sidebar-nav-icon"></i> Agencies</a>
                     <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/agencies/';?>">All Agencies</a>
                        </li>
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/agencies/pendinglist';?>">Pending Approvals</a>
                        </li>
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/users/addagency';?>">Add New Agency</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
                   <a href="#"><i class="fa fa-group sidebar-nav-icon"></i> Clubs </a>
		   <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">All Clubs</a>
                        </li>
			<li class="">
                            <a href="">Club Models</a>
                        </li>
                        <li class="">
                            <a href="">Club Types</a>
                        </li>
                        <li class="">
                            <a href="">Pending Approvals</a>
                        </li>
                        <li class="">
                            <a href="">Add New Club</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
                   <a href="#"><i class="fa fa-group sidebar-nav-icon"></i>Massage Parlours </a>
		   <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">All Massage Parlours</a>
                        </li>
			<li class="">
                            <a href="">Add Massage Parlours</a>
                        </li>
                        <li class="">
                            <a href="">All Girls</a>
                        </li>
                        <li class="">
                            <a href="">Pending Approvals</a>
                        </li>
                        <li class="">
                            <a href="">Add New Club</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
                   <a href="#"><i class="fa fa-user sidebar-nav-icon"></i> Users </a>
		   <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/users/list';?>">All Users</a>
                        </li>
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/users/add';?>">Add New User</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
                   <a href="#"><i class="fa fa-sort-amount-asc sidebar-nav-icon"></i>Attributes</a>
		   <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">Escorts Attributes</a>
                        </li>
			<li class="">
                            <a href="">Common Physical Attributes</a>
                        </li>
                        <li class="">
                            <a href="">Parlour Attributes</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
                   <a href="#"><i class="fa fa-magnet sidebar-nav-icon"></i>Locations</a>
		   <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">Countries</a>
                        </li>
			<li class="">
                            <a href="">States/Province</a>
                        </li>
                        <li class="">
                            <a href="">Cities</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
		    <a href="#"><i class="fa fa-blogger sidebar-nav-icon"></i>Blogs</a>
		   <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">All Blogs</a>
                        </li>
			<li class="">
                            <a href="">Blog Categories</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
		    <a href="#"><i class="fa fa-message_empty sidebar-nav-icon"></i>Communications</a>
		   <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">Site Inquires</a>
                        </li>
			<li class="">
                            <a href="">Fake Reports</a>
                        </li>
			<li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">Verification Requests</a>
                        </li>
			<li class="">
                            <a href="">Users Communications</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
		    <a href="#"><i class="fa fa-bullhorn sidebar-nav-icon"></i>Advertisement</a>
		   <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">All Banner Advertisements</a>
                        </li>
			<li class="">
                            <a href="">Purchased Advertisements</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
		    <a href="#"><i class="fa fa-glass sidebar-nav-icon"></i> Memberships</a>
		   <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">All Membership Plans</a>
                        </li>
			<li class="">
                            <a href="">All Free Membership Plans</a>
                        </li>
			<li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">Purchased Memberships</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
		    <a href="#"><i class="fa fa-lock sidebar-nav-icon"></i> Securities</a>
		   <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">Ban Ip</a>
                        </li>
			<li class="">
                            <a href="">Web logs</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
		    <a href="#"><i class="fa fa-eur sidebar-nav-icon"></i> Credits</a>
		   <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/credits/creditsetting';?>">Credit Settings</a>
                        </li>
			<li class="">
                            <a href="<?php echo $this->webroot?>admin/credits/">Credit Packages</a>
                        </li>
			<li class="">
                            <a href="">Credit Purchased</a>
                        </li>
			<li class="">
                            <a href="<?php echo $this->webroot?>admin/credit_assigns/">Free Credits Assign</a>
                        </li>
			<li class="">
                            <a href="">Credit Redeem Request</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
		    <a href="#"><i class="fa fa-star sidebar-nav-icon"></i> News Manager</a>
		   <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">All News</a>
                        </li>
			 </ul>
                </li>
		<li class="menu-list">
		    <a href="#"><i class="fa fa-bug sidebar-nav-icon"></i> Blacklist</a>
                    <ul class="sub-menu-list">
                        <li class="">
                            <a href="">Blacklist Customers</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
		    <a href="#"><i class="fa fa-search sidebar-nav-icon"></i> Advertiser Activities</a>
		   <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">Escort Reviews</a>
                        </li>
			<li class="">
                            <a href="">Profile Comments</a>
                        </li>
			<li class="">
                            <a href="">Escort Status</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
		   <a href="#"><i class="fa fa-more_items sidebar-nav-icon"></i> Transactions</a>
		   <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">All Transactions</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
		    <a href="#"><i class="fa fa-shopping-cart sidebar-nav-icon"></i> Shop Manager</a>
		   <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">Shop Item Categories</a>
                        </li>
			<li class="">
                            <a href="">Private Video Category</a>
                        </li>
			<li class="">
                            <a href="">Escort Selling Items</a>
                        </li>
			<li class="">
                            <a href="">Sold Item Transactions</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
		    <a href="#"><i class="fa fa-file-image-o sidebar-nav-icon"></i> Website</a>
		   <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">Website Templates</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
		    <a href="#"><i class="fa fa-file-image-o sidebar-nav-icon"></i> Classified Ads</a>
		   <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">Classified Category</a>
                        </li>
			<li class="">
                            <a href="">Classified Ad Manager</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
		    <a href="#"><i class="gi gi-paperclip sidebar-nav-icon"></i>Email Templates</a>
		   <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">Email Tempates For Admin</a>
                        </li>
			<li class="">
                            <a href="">Email Templates for Site Users</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
		    <a href="#"><i class="gi gi-glass sidebar-nav-icon"></i> Adult Job</a>
		   <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">All Adult Job</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
		    <a href="#"><i class="gi gi-envelope sidebar-nav-icon"></i>Newsletter Manager</a>
		   <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">All Newsletters</a>
                        </li>
			<li class="">
                            <a href="">All Newsletter Subscribers</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
		    <a href="#"><i class="fa fa-inbox sidebar-nav-icon"></i>Event Manager</a>
		   <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">Event Manager</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
		    <a href="#"><i class="fa fa-users sidebar-nav-icon"></i>Avatar Manager</a>
		   <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">All Avatars</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
		    <a href="#"><i class="fa fa-link sidebar-nav-icon"></i>Meta Manager</a>
		   <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">All Meta Tag</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
		    <a href="#"><i class="fa fa-comments-o sidebar-nav-icon"></i>FAQ</a>
		   <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">FAQ Categories</a>
                        </li>
			<li class="">
                            <a href="">All FAQs</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
		    <a href="#"><i class="fa fa-adn sidebar-nav-icon"></i>Ad-on Services</a>
		   <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">All Ad-on Services</a>
                        </li>
			<li class="">
                            <a href="">Purchased Ad-on</a>
                        </li>
                    </ul>
                </li>
		<li class="menu-list">
		    <a href="#"><i class="fa fa-trash-o sidebar-nav-icon"></i>Trash Manager</a>
		   <ul class="sub-menu-list">
                        <li class="">
                            <a href="<?php echo $this->webroot.'admin/';?>">All Trash Members</a>
                        </li>
                    </ul>
                </li>
               <!-- <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>Manage User</span></a>
                    <ul class="sub-menu-list">
                        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'list')); ?></li>
                    </ul>
                </li>
                <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>Manage SiteSettings</span></a>
                    <ul class="sub-menu-list">
                        <li><?php echo $this->Html->link(__('Manage Logo'), array('controller' => 'site_settings', 'action' => 'sitelogo', 1)); ?></li>
			<li><?php echo $this->Html->link(__('Manage Site Settings'), array('controller' => 'site_settings', 'action' => 'edit', 1)); ?></li>
                    </ul>
                </li>
		<li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>Manage Category</span></a>
                    <ul class="sub-menu-list">
                        <li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?></li>
                    </ul>
                </li>

                <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>Manage Service</span></a>
                    <ul class="sub-menu-list">
                        <li><?php echo $this->Html->link(__('New Service'), array('controller' => 'services', 'action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('List Services'), array('controller' => 'services', 'action' => 'index')); ?></li>
                    </ul>
                </li>
		<li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>Manage Hair Colors</span></a>
                    <ul class="sub-menu-list">
                        <li><?php echo $this->Html->link(__('New Hair colors'), array('controller' => 'users', 'action' => 'haircolor_add')); ?></li>
                	<li><?php echo $this->Html->link(__('List Hair colors'), array('controller' => 'users', 'action' => 'haircolor_list')); ?></li>
                    </ul>
                </li>
		<li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>Manage Eye Colors</span></a>
                    <ul class="sub-menu-list">
                        <li><?php echo $this->Html->link(__('New Eye colors'), array('controller' => 'users', 'action' => 'eyecolor_add')); ?></li>
               		<li><?php echo $this->Html->link(__('List Eye colors'), array('controller' => 'users', 'action' => 'eyecolor_list')); ?></li>
                    </ul>
                </li>
                <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>Manage Body Type</span></a>
                    <ul class="sub-menu-list">
                        <li><?php echo $this->Html->link(__('New Body Type'), array('controller' => 'body_types', 'action' => 'add')); ?></li>
                    <li><?php echo $this->Html->link(__('List Body Types'), array('controller' => 'body_types', 'action' => 'index')); ?></li>
                    </ul>
                </li>

                 <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>Manage Escort Type</span></a>
                    <ul class="sub-menu-list">
                        <li><?php echo $this->Html->link(__('New Escort Type'), array('controller' => 'escort_types', 'action' => 'add')); ?></li>
                    <li><?php echo $this->Html->link(__('List Escort Types'), array('controller' => 'escort_types', 'action' => 'index')); ?></li>
                    </ul>
                </li>

                <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>Manage Rules</span></a>
                    <ul class="sub-menu-list">
                        <li><?php echo $this->Html->link(__('New Rule'), array('controller' => 'rules', 'action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Rules'), array('controller' => 'rules', 'action' => 'index')); ?></li>
		
			<li><?php echo $this->Html->link(__('New Rule Option'), array('controller' => 'rule_options', 'action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Rule Options'), array('controller' => 'rule_options', 'action' => 'index')); ?></li>
                    </ul>
                </li>
		<li><?php echo $this->Html->link(__('Manage Contents'), array('controller' => 'contents', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Manage Email Template'), array('controller' => 'email_templates', 'action' => 'index')); ?></li>
                <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>Manage Profile</span></a>
                    <ul class="sub-menu-list">
                        <li><?php echo $this->Html->link(__('Edit Profile'), array('controller' => 'users', 'action' => 'admin_edit', 2)); ?> </li>	
               		<li><?php echo $this->Html->link(__('Change Password'), array('controller' => 'users', 'action' => 'admin_changepwd')); ?> </li>	
                    </ul>
                </li>
                <li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'admin_logout')); ?> </li>	-->	

            </ul>
            <!--sidebar nav end-->

        </div>
    </div>
<!-- left side end-->
<!--<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
                <li><?php echo $this->Html->link(__('Dashboard'), array('controller' => 'users', 'action' => 'dashboard')); ?></li>
                <li><?php echo $this->Html->link(__('Manage Logo'), array('controller' => 'site_settings', 'action' => 'sitelogo', 1)); ?></li>
		<li><?php echo $this->Html->link(__('Site Settings'), array('controller' => 'site_settings', 'action' => 'edit', 1)); ?></li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'list')); ?></li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('New Hair colors'), array('controller' => 'users', 'action' => 'haircolor_add')); ?></li>
                <li><?php echo $this->Html->link(__('List Hair colors'), array('controller' => 'users', 'action' => 'haircolor_list')); ?></li>
                <li><?php echo $this->Html->link(__('New Eye colors'), array('controller' => 'users', 'action' => 'eyecolor_add')); ?></li>
                <li><?php echo $this->Html->link(__('List Eye colors'), array('controller' => 'users', 'action' => 'eyecolor_list')); ?></li>
                <li><?php echo $this->Html->link(__('New Rule'), array('controller' => 'rules', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Rules'), array('controller' => 'rules', 'action' => 'index')); ?></li>
		
		<li><?php echo $this->Html->link(__('New Rule Option'), array('controller' => 'rule_options', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Rule Options'), array('controller' => 'rule_options', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Contents'), array('controller' => 'contents', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Email Template'), array('controller' => 'email_templates', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Edit Profile'), array('controller' => 'users', 'action' => 'admin_edit', 2)); ?> </li>	
                <li><?php echo $this->Html->link(__('Change Password'), array('controller' => 'users', 'action' => 'admin_changepwd')); ?> </li>	
                <li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'admin_logout')); ?> </li>		
	</ul>
</div>-->
<style>
    .custom-nav > li > a {
    border-radius: 0;
    color: #fff;
    padding: 2px 20px;
}

.custom-nav .sub-menu-list > li > a {
    color: #fff;
    display: block;
    font-size: 13px;
    padding: 1px 5px 2px 45px;
    transition: all 0.2s ease-out 0s;
}
</style>
