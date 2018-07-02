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
                <li class="active"><a href="<?php echo $this->webroot.'admin/users/dashboard';?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>Manage User</span></a>
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
                <li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'admin_logout')); ?> </li>		

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
