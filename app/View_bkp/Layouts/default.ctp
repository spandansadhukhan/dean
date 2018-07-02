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
<html class="csstransforms sb-init" lang="en">
    <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <?php echo $this->Html->charset(); ?>
    <title>
            <?php echo $cakeDescription ?> - <?php echo $title_for_layout; ?>
    </title>

    <script type="text/javascript">
        var siteurl = 'http://layout9.demoparlour.com/advdirectory/';
        var currentUrl = "http://layout9.demoparlour.com/advdirectory/";
        var time = '1465563571';
        var admintemplateassets = 'http://layout9.demoparlour.com/advdirectory/assets/admin/';
        var templateassets = 'http://layout9.demoparlour.com/advdirectory/assets/layout9/';
        var adminName = 'admin';
        var Login_Please = 'Login Please';
        var Change_Country = 'Change Country';
        var logged_member_id = '';
        var logged_member_type = '';
        var virtual_currency_name = 'Credits';
        var servererror = '';
        var pageckeditor = false;
    </script>


    <?php
            echo $this->Html->meta('icon');

            echo $this->Html->css('flash');
            echo $this->Html->css('bootstrap');
            echo $this->Html->css('base_template');
            echo $this->Html->css('responsive');
            echo $this->Html->css('font-awesome');
            echo $this->Html->css('slidebars');
            echo $this->Html->css('slidebars-theme');
            echo $this->Html->css('smart-forms');
            echo $this->Html->css('jquery');
            echo $this->Html->css('bootstrap-dialog');

            //echo $this->Html->css('cake.generic');

            //echo $this->Html->css('bootstrap-theme');
            //echo $this->Html->css('jquery.bxslider');
            //echo $this->Html->css('font-awesome.min');

            echo $this->Html->script('jquery-1.js');
            echo $this->Html->script('init');
            echo $this->Html->script('bootstrap');
            echo $this->Html->script('bootstrap-dialog');
            echo $this->Html->script('scroll_navi');
            echo $this->Html->script('jquery');
            echo $this->Html->script('formclass');
            echo $this->Html->script('header');
            echo $this->Html->script('jquery_002');

            echo $this->fetch('meta');
            echo $this->fetch('css');
            echo $this->fetch('script');
    ?>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--These variables are important because these are used in footer js -->

    <script type="text/javascript">
        $(document).ready(function () {
            /**Simple image gallery. Uses default settings*/
            $("a.fancybox").fancybox({
                fitToView: false,
                autoSize: false,
                afterLoad: function () {
                    this.width = $(this.element).data("width");
                    this.height = $(this.element).data("height");
                }
            }); // fancybox
            // Change title type, overlay closing speed
            $(".fancybox-effects-a").fancybox({
            });
        });

        $(document).ready(function (e) {
            var filter_box = '';
            $(".advance_search_click").click(function (e) {
                $(".advance-box-part").slideToggle('slow');
                $(".searchint").slideToggle('slow');
            });
            if (filter_box == 'Open')
            {
                $(".advance-box-part").show('fast');
                $(".searchint").hide('fast');
            }


        });
    </script>
</head>
<body>
<section id="fpage">
    <div id="sb-site">



    <?php
        /*
            $ActiveController=$this->params['controller'];
            $ActiveAction=$this->params['action'];
            if($ActiveController=='users' && $ActiveAction=='index'){
                $NavClass='navbar-fixed-top';
            }else{
                $NavClass='bg-black';
            }
        */
        /*if($ActiveController=='users' && ($ActiveAction=='dashboard' || $ActiveAction=='my_task' || $ActiveAction=='editprofile' || $ActiveAction=='change_password')){
            $NavClass='bg-black after_login';
        }*/

        /*
            $uploadFolder = "site_logo";
            $uploadPath = WWW_ROOT . $uploadFolder;
            $site_logo = $sitesetting['SiteSetting']['site_logo'];
            if(file_exists($uploadPath . '/' . $site_logo) && $site_logo!=''){
                $LogoPath=$this->webroot.'site_logo/'.$site_logo;
                    //echo($this->Html->image('/site_logo/'.$site_logo, array('alt' => 'Site Logo', 'height'=> '100px', 'width'=> '200px')));
            } else {
                $LogoPath=$this->webroot.'images/logo.png';
            }
        */
    ?>


<?php echo $this->Session->flash();?>
<?php echo $this->element('header')?>
<?php echo $this->fetch('content'); ?>
<?php echo $this->element('footer')?>


    </div>
</section>
    <div id="modal-regular" class="modal fade" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div style="text-align:center;"> <img style="float:center;" src="<?php echo $this->Html->url('/')?>images/ajax-modal-loading.gif" alt="" class="loading"></div>
            </div>
        </div>
    </div>


    <div id="topnavcontent">
        <div class="logininner">
            <div class="close-popup2 sign_in_toggle" id="close-pop-bt"></div>
            <div class="loginin">
                <form action="" method="post" accept-charset="utf-8" id="loginform">
                    <div class="title-login">Sign in</div>
                    <div class="clearer"></div>
                    <div class="smart-forms">
                        <div class="ajax_report notification spacer-t5 form-msg">
                            <a class="close-btn" onclick="close_div();" href="javascript:void(0);">×</a>
                            <span class="ajax_message">Hello Message</span></div>
                    </div>
                    <ul>
                        <li>
                            <input type="email" placeholder="Email" required="required" name="email" id="logemail" maxlength="50" type="text">
                            <div class="clr"></div>
                        </li>
                        <li style="float:right;">
                            <input placeholder="Password" name="password" id="logpassword" required="required" maxlength="50" type="password">
                            <div class="clr"></div>
                        </li>
                    </ul>
                    <div class="clr"></div>
                    <div class="send_left"><a class="forgot" href="<?php echo $this->Html->url('/');?>forgot-password">Forgot your password?</a></div>
                    <div class="send_right">
                        <div class="buttonOuterGrey">
                            <button type="button" id="loginButon" onclick="loginUser()" class="buttonGrey">Login</button>
                        </div>
                    </div>
                    <div class="clr"></div>
                    <div class="account-re">Do not have account?<a class="register" href="<?php echo $this->Html->url('/')?>users/signup">Register</a></div>
                    <div class="clr"></div>
                </form>
            </div>
        </div>
    </div>


    <div style="margin-left: -270px;" class="sb-slidebar sb-left sb-style-overlay">
        <nav>
            <ul class="sb-menu">
                <li> <a href="<?php echo  $this->Html->url('/')?>">Home</a></li>
                <li> <a href="#">Escorts</a>
                    <ul>
                        <li> <a href="#">Female</a></li>
                        <li> <a href="#">Male</a></li>
                        <li> <a href="#">Trans</a></li>
                    </ul>
                </li>
                <li> <a target="_blank" href="#">Agencies</a></li>
                <li> <a href="#">Adult Clubs</a>
                    <ul>
                        <li> <a href="">Massage Parlour</a></li>
                    </ul>
                </li>
                <li><a href="">Escorts Tours</a></li>
                <li><a href="">Blogs</a></li>
                <li> <a href="">Shop</a>
                    <ul>
                        <li> <a href="">Erotic Item</a></li>
                        <li> <a href="">Webcam Sessions</a></li>
                        <li> <a href="">Private Gallery</a></li>
                        <li> <a href="">Private Videos</a></li>
                    </ul>
                </li>
                <li> <a href="">Advertise</a></li>
            </ul>
        </nav>
    </div>
    <div style="margin-right: -270px;" class="sb-slidebar sb-right sb-style-overlay">
        <nav>
            <ul class="vertical-nav dark red sb-menu">
            </ul>
        </nav>
    </div>
    <script type="text/javascript" src="<?php echo $this->Html->url('/')?>js/slidebars.js"></script>
    <script>
        (function ($) {
            $(document).ready(function () {
                // Initiate Slidebars
                $.slidebars();
            });
        })(jQuery);
    </script>
    <script></script><script type="text/javascript" src="<?php echo $this->Html->url('/')?>js/location.js"></script>
    <script src="<?php echo $this->Html->url('/')?>js/footer.js"></script>

<script>
    $(document).ready(function(){
        setTimeout(function() {
             $('.message').fadeOut('slow');
             $('.success').fadeOut('slow');
             $('.error').fadeOut('slow');
        }, 3000);
    });

</script>

<script>

    function valEmail(email){ var re = /\S+@\S+\.\S+/; return re.test(email); }

    function loginUser() {
        var email = $("#logemail").val();
        var pass = $("#logpassword").val();

        if($("#logemail").val() == ""){ alert('Login Email Can not be blank'); $("#logemail").focus(); return false; }
        if($("#logpassword").val() == ""){ alert('Login Password Can not be blank'); $("#logpassword").focus(); return false; }

        if (!valEmail(email)) { alert('Invalid Login Email'); return false; }

        $.ajax({
            type: "POST",
            url: "<?php echo $this->Html->url('/'); ?>users/frontUserLogin/",
            //dataType: "json",
            data: {email: email, pass:pass}
        }).done(function (msg) {
            //alert(msg);
            if(msg == "notfound"){
                alert("Invalid Email or Password. Try again.");
            } else if(msg == "u"){
                window.location.href = "<?php echo Router::url(array('controller' => 'Users', 'action' => 'userdashboard')); ?>";
            } else if(msg == "e"){
                window.location.href = "<?php echo Router::url(array('controller' => 'Users', 'action' => 'escortdashboard')); ?>";
            } else if(msg == "a"){
                window.location.href = "<?php echo Router::url(array('controller' => 'Users', 'action' => 'agencydashboard')); ?>";
            } else if(msg == "c"){
                window.location.href = "<?php echo Router::url(array('controller' => 'Users', 'action' => 'clubdashboard')); ?>";
            } else if(msg == "p"){
                window.location.href = "<?php echo Router::url(array('controller' => 'Users', 'action' => 'parlordashboard')); ?>";
            }
        });

        //alert(email); alert(pass);

    }


</script>


<script>
	    $("#hideFlashMessage").click(function(){
	        $("#hideFlashMsg").hide();
	    });
</script>

<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
