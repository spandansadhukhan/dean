<?php
 $controller=($this->params->controller);
 $action=$this->params->action;
?>
<?php echo $this->Html->script('jquery.min.js'); ?>
<section class="header">
    	<div class="headerTop">
    		
    			<nav class="navbar navbar-expand-sm navbar-dark" style="background: #d5a004;">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<!-- Links -->
				<div class="collapse navbar-collapse" id="nav-content">
					<div class="container">   
				<ul class="navbar-nav navPart">
					<li class="nav-item homeMenu ">
					<a class="nav-link " href="<?php echo  $this->Html->url('/')?>"><i class="fa fa-home"></i></a>
					</li>
					<li class="nav-item dropdown <?php echo ($controller=='users' and $action=='escortlist')?'active':''; ?>">
					<a class="nav-link dropdown-toggle" ata-toggle="dropdown" href="<?php echo $this->webroot ?>users/escortlist/F">Escorts</a>
                                        <ul class="dropdown-menu">
                        <li> <a href="<?php echo $this->webroot ?>users/escortlist/F">Female</a></li>
                        <li> <a href="<?php echo $this->webroot ?>users/escortlist/T">Trans</a></li>
                    </ul>
					</li>
					<li class="nav-item <?php echo ($controller=='pages' and $action=='agencies')?'active':''; ?>">
						<a class="nav-link"  href="<?php echo $this->webroot?>agencies/"> Agencies</a>
						
						
					</li>
					<li class="nav-item <?php echo ($controller=='pages' and $action=='clubs')?'active':''; ?>">
					<a class="nav-link" href="<?php echo $this->webroot?>clubs/">Clubs</a>
					</li>
					<li class="nav-item <?php echo ($controller=='users' and $action=='massageparlours')?'active':''; ?>">
					<a class="nav-link" href="<?php echo $this->webroot ?>users/massageparlours">Sensual Massage</a>
					</li>
                                        
                                        
<!--                     <li class="<?php echo ($controller=='users' and $action=='stripperlist')?'activenew':''; ?>"> <a href="javascript:void(0)">Strippers</a>
                    <ul>
                        <li> <a href="<?php echo $this->webroot ?>users/stripperlist/I">Independent Strippers</a></li>
                        <li> <a href="<?php echo $this->webroot ?>users/stripperlist/C">Strip Clubs</a></li>
                        <li> <a href="<?php echo $this->webroot ?>users/stripperlist/A">Stripper Agents</a></li>
                    </ul>  
                </li>                   -->
                                        
                                        
                                        
                                        
                                        
					<li class="nav-item dropdown <?php echo ($controller=='users' and $action=='stripperlist')?'activenew':''; ?>">
					<a class="nav-link dropdown-toggle" ata-toggle="dropdown" href="javascript:void(0)">Strip Clubs</a>
                                        <ul class="dropdown-menu">
                        <!--<li> <a href="<?php echo $this->webroot ?>users/stripperlist/I">Independent Strippers</a></li>-->
                        <li> <a href="<?php echo $this->webroot ?>users/stripperlist/A">Strip Clubs</a></li>
                        <!--<li> <a href="<?php echo $this->webroot ?>users/stripperlist/C">Stripper Agents</a></li>-->
                    </ul> 
                                        
					</li>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
					<li class="nav-item <?php echo ($controller=='pages' and $action=='shop')?'active':''; ?>">
					<a class="nav-link" href="<?php echo $this->webroot ?>pages/shop">Shop</a>
					</li>
					<li class="nav-item <?php echo ($controller=='users' and $action=='advertisements/listing')?'active':''; ?>">
					<a class="nav-link" href="<?php echo $this->Html->url('/');?>advertisements/listing">Advertise</a>
					</li>
					<li class="nav-item <?php echo ($controller=='users' and $action=='contacts')?'active':''; ?>">
					<a class="nav-link" href="<?php echo $this->Html->url('/');?>contacts">Contact Us</a>
					</li>
				</ul>
					</div>
				</nav>
    	</div>
    </section>
<section class="banner" style="background:url(<?php echo $this->webroot;?>images/banner.jpg) no-repeat;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logoPart">
						<div class="logo mt-3">
							<img src="<?php echo $this->webroot;?>images/logo1.png" class="img-responsive">
						</div>
						<div class="languageSelection">
							<div class="upperPart">
								<div class="selectLan">
									<p>Select Language</p>
									<div class="flag"><img src="<?php echo $this->webroot;?>images/flag.jpg"><i class="fa fa-chevron-down d-inline-block ml-3"></i></div>
								</div>
								<div class="socialLink">
									<p class="text-right">Follow us on:</p>
									<ul class="socialLink">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="#"><i class="fa fa-youtube"></i></a></li>
									</ul>
								</div>
							</div>
                                                    
                                                    <?php if( $this->Session->read('flogin') == "yes" ){ ?>
                                                    <div class="lowerPart text-right">
                                                            <i class="fa fa-lock mr-2"></i><a href="<?php echo $this->Html->url('/')?>users/logout" class="btn btn-primary login">LogOut</a>
                                                                <a class="btn btn-primary register" href="<?php echo $this->Html->url('/')?><?php echo $this->Session->read('fdashboard')?>"><i class="fa fa-desktop mr-2"></i>Dashboard</a>
							</div>
                                                    
                                                    <?php }else{ ?>
                                                    
                                                    
                                                    
							<div class="lowerPart text-right">
                                                            <a href="javascript:void(0);" id="login" class="btn btn-primary login"><i class="fa fa-lock mr-2"></i>LogIn</a>
                                                                <a class="btn btn-primary register" href="<?php echo $this->Html->url('/')?>users/register"><i class="fa fa-desktop mr-2"></i>Register</a>
							</div>
                                                    <?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="lowerNav">
		<nav class="navbar navbar-expand-sm navbar-dark">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<!-- Links -->
				<div class="collapse navbar-collapse" id="nav-content">
					<div class="container">   
				<ul class="navbar-nav">
					<li class="nav-item">
					<a class="nav-link" href="#">Escorts On Tour</a>
					</li>
					<li class="nav-item active">
					<a class="nav-link" href="<?php echo $this->Html->url('/');?>online-escorts">Online Escorts</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="<?php echo $this->Html->url('/');?>escort-reviews">Escort Reviews</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="<?php echo $this->Html->url('/');?>happy-hours">Happy Hours</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="#">Message Board</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="<?php echo $this->webroot ?>pages/blog">Blogs</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="<?php echo $this->webroot ?>pages/workrooms">Work Rooms</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="<?php echo $this->Html->url('/');?>classified-ads">Classified Ads</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="#">FAQ</a>
					</li>
				</ul>
					</div>
				</nav>
	</section>

<script>
    $(function(){
        $("#login").click(function(){
            $("#topnavcontent").show('1000');
        })
    })
    
   
    
    
    
</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5a7288d2d7591465c707456b/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->