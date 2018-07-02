<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'ESCORT');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?> - <?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		#echo $this->Html->css('cake.generic');
		echo $this->Html->css('style');
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('bootstrap-theme');
                echo $this->Html->css('jquery.bxslider');
                echo $this->Html->css('font-awesome.min');
		
		echo $this->Html->script('jquery.min');
		echo $this->Html->script('bootstrap.min');
                echo $this->Html->script('jquery.bxslider');
                //echo $this->Html->script('bootstrap.min');
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
   
    <!--<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700,100' rel='stylesheet' type='text/css'>
    <link href="<?php //echo $this->webroot;?>font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">-->
</head>
<body>
    <?php
    $ActiveController=$this->params['controller'];
    $ActiveAction=$this->params['action'];
    if($ActiveController=='users' && $ActiveAction=='index'){
        $NavClass='navbar-fixed-top';
    }else{
        $NavClass='bg-black';
    }
    
    /*if($ActiveController=='users' && ($ActiveAction=='dashboard' || $ActiveAction=='my_task' || $ActiveAction=='editprofile' || $ActiveAction=='change_password')){
        $NavClass='bg-black after_login';
    }*/
   
            
    $uploadFolder = "site_logo";
    $uploadPath = WWW_ROOT . $uploadFolder;
    $site_logo = $sitesetting['SiteSetting']['site_logo'];
    if(file_exists($uploadPath . '/' . $site_logo) && $site_logo!=''){
        $LogoPath=$this->webroot.'site_logo/'.$site_logo;
            //echo($this->Html->image('/site_logo/'.$site_logo, array('alt' => 'Site Logo', 'height'=> '100px', 'width'=> '200px')));
    }else{
        $LogoPath=$this->webroot.'images/logo.png';
    }
?>
   
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                    <nav class="navbar navbar-default" role="navigation">
                    <a class="navbar-brand" href="<?php echo $this->webroot;?>"><img src="<?php echo $LogoPath;?>" alt=""></a>
                    <ul class="nav navbar-nav navbar-right top-navbar">
                        <?php
                        $userid = $this->Session->read('userid');
                        $username = $this->Session->read('username');
                        if(isset($userid) && $userid!=''){
                            echo '<li><a href="'.$this->webroot.'users/dashboard" class="r_butt"><i class="fa fa-user"></i> My Account</a></li>';
                            echo '<li><a href="'.$this->webroot.'users/logout" class="r_butt"><i class="fa fa-sign-out"></i> Logout</a></li>';
                        }else{
                        ?>
                            <li><a href="<?php echo $this->webroot;?>users/login" class="r_butt"><i class="fa fa-lock"></i> Login</a></li>
                            <li><a href="<?php echo $this->webroot;?>users/signup" class="r_butt"><i class="fa fa-user"></i> Register</a></li>
                        <?php }?>
                        
                    </ul>
                    </nav>
                    <nav class="navbar navbar-inverse">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="<?php echo $this->webroot;?>">Home</a></li>
                                <li><a href="">About US</a></li>
                                <li><a href="">advertise jobs</a></li>
                                <li><a href="">cars for sale</a></li>
                                <li><a href="">employment</a></li>
                                <li><a href="">dating</a></li>
                                <li><a href="">male escort</a></li>
                                <li><a href="">female escorts</a></li>
                            </ul>
                        </div>
                    </nav>
                    <?php
                    if($ActiveController=='users' && $ActiveAction=='index'){
                    ?>
                    <div class="home-slider">
                        <div class="slider_text_holder">
                            <div class="slide-content">
                                <h3>Search Filter:</h3>
                                <form>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                    <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                                                    </span>
                                                    <input style="border-left: 0" type="text" class="form-control" placeholder="Find your requerment?">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select class="form-control"><option>Select Category</option></select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select class="form-control"><option>Select Category</option></select>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-sm-12">
                                            <a href="" class="btn btn-primary pull-left">Search</a>
                                            <p class="pull-right advance-srch">Advanced search?</p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <ul class="bxslider">
                            <li>
                                <div class="slider-pic">
                                        <img src="<?php echo $this->webroot;?>images/slide-1.jpg">
                                </div>
                            </li>
                            <li>
                                <div class="slider-pic">
                                        <img src="<?php echo $this->webroot;?>images/slide-1.jpg">
                                </div>
                            </li>
                        </ul>
                    </div>
                    <?php }?>
                    <div class="main-wrapper">
                        <?php echo '<center>'.$this->Session->flash().'</center>'; ?> 
                        <?php echo $this->fetch('content'); ?>
                    
                    <div class="clearfix"></div>
                    <footer>
                        <section class="top-footer">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="about-hold">
                                                <h3>ABOUT US</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="footer-box">
                                                    <ul class="footer-links">
                                                        <li><a href="">Advertise Jobs</a></li>
                                                        <li><a href="">Cars for Sale</a></li>
                                                        <li><a href="">Employment</a></li>
                                                        <li><a href="">Dating</a></li>
                                                        <li><a href="">Male and Female Escort</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="footer-box">
                                                    <ul class="footer-links">
                                                        <li><a href="<?php echo $this->webroot;?>">Home</a></li>
                                                        <li><a href="">About Us</a></li>
                                                        <li><a href="">Contact Us</a></li>
                                                        <li><a href="">Terms & Conditions</a></li>
                                                        <li><a href="">Privacy Policy</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <ul class="footer-links">
                                                    <li><a href="<?php echo $this->webroot;?>users/signup">Register</a></li>
                                                    <li><a href="">Our Latest Blogs</a></li>
                                                    <li><a href="">Reviews</a></li>
                                                    <li><a href="">Latest Status</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </section>
                        <section class="bottom-footer">
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <p class="copyright">&copy; <?php echo date('Y');?> companyname.nz. All rights reserved.</p>
                                    <p class="social-icons">
                                        <a href="<?php echo $sitesetting['SiteSetting']['facebook_url'];?>" class="fa fa-facebook"></a>
                                        <a href="<?php echo $sitesetting['SiteSetting']['twitter_url'];?>" class="fa fa-twitter"></a>
                                        <a href="" class="fa fa-google-plus"></a>
                                        <a href="<?php echo $sitesetting['SiteSetting']['linkedIn_url'];?>" class="fa fa-linkedin"></a>

                                        </p>
                                </div>
                            </div>
                        </section>
                    </footer>
                </div>

            </div>
            <div class="col-md-2" style="padding-top: 10px">
                <div class="advertisement-box">
                        <img src="<?php echo $this->webroot;?>images/ad-1.jpg" alt="">
                </div>
                <div class="advertisement-box">
                        <img src="<?php echo $this->webroot;?>images/ad-2.jpg" alt="">
                </div>
                <div class="advertisement-box">
                        <img src="<?php echo $this->webroot;?>images/ad-3.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
    
<script>
    $(document).ready(function(){       
        setTimeout(function() {
             $('.message').fadeOut('slow');
             $('.success').fadeOut('slow');
        }, 3000);

        $('.bxslider').bxSlider({
            auto: true,
            autoControls: true
        });

    });

</script>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>
