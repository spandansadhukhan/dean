<?php ?>
<!-- header section start-->
        <div class="header-section">

            <!--toggle button start-->
            <a class="toggle-btn"><i class="fa fa-bars"></i></a>
            <!--toggle button end-->

            <!--search start-->
            <form class="searchform" action="index.html" method="post">
                <!--<input type="text" class="form-control" name="keyword" placeholder="Search here..." />-->
            </form>
            <!--search end-->

            <!--notification menu start -->
            <div class="menu-right">
                <ul class="notification-menu">
                    
                    <li>
                        <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo $this->webroot;?>images/photos/user-avatar.png" alt="" />
                            <?php echo $userdetails['User']['username'];?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <li><a href="<?php echo $this->webroot.'admin/users/edit/2' ?>"><i class="fa fa-user"></i>  Profile</a></li>
                            <li><a href="<?php echo $this->webroot.'admin/users/changepwd' ?>"><i class="fa fa-cog"></i>  Settings</a></li>
                            <li><a href="<?php echo $this->webroot.'admin/users/logout' ?>"><i class="fa fa-sign-out"></i> Log Out</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!--notification menu end -->

        </div>
        <!-- header section end-->
<!--<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
			 <span class="icon-bar"></span>
			 <span class="icon-bar"></span>
			</a>
			<a class="brand" href="javascript:void(0)">Admin Panel</a>
			<div class="nav-collapse collapse">
				<ul class="nav pull-right">
					<li class="dropdown">
						<a href="javascript:void(0)" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i>&nbsp;&nbsp;<?php echo(((isset($getloggedinUser) && $getloggedinUser['User']['first_name']!='')?$getloggedinUser['User']['first_name']:'').' '.((isset($getloggedinUser) && $getloggedinUser['User']['last_name']!='')?$getloggedinUser['User']['last_name']:''))?>&nbsp;&nbsp;<i class="caret"></i>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a tabindex="-1" href="<?php echo($this->webroot)?>admin/users/edit/<?php echo((isset($getloggedinUser) && $getloggedinUser['User']['id']!='')?$getloggedinUser['User']['id']:'');?>">Edit Profile</a>
							</li>
							<li class="divider"></li>
							<li>
								<a tabindex="-1" href="<?php echo($this->webroot)?>admin/users/logout">Logout</a>
							</li>
						</ul>
					</li>
				</ul>
				<ul class="nav">
					
					<li <?php if($this->params['controller']=='site_settings' && $this->params['action']=='admin_edit')
        {?>class="active"<?php } ?>>
						<a href="<?php echo($this->webroot)?>admin/site_settings/edit/1">Settings
						</a>
						
					</li>
					
					<li class="dropdown <?php if($this->params['controller']=='users' && $this->params['action']!='admin_dashboard'){echo 'active';} ?>">
						<a href="javascript:void(0)" role="button" class="dropdown-toggle" data-toggle="dropdown">Admin <i class="caret"></i>

						</a>
						<ul class="dropdown-menu">
							<li>
								<a tabindex="-1" href="<?php echo($this->webroot)?>admin/users/list">Admin List</a>
							</li>
							
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>-->
