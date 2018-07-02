<?php

$cakeDescription = __d('cake_dev', 'ESCORT');
?>
<!DOCTYPE html>
<html class="csstransforms sb-init" lang="en">

            
            <head>
    <title><?php echo $cakeDescription ?> - <?php echo $title_for_layout; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php echo $this->Html->charset(); ?>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet"> 
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
 <?php 
       
 
 echo $this->Html->css('main');
       echo $this->Html->css('asRange');
       echo $this->Html->css('style');
       echo $this->Html->css('slidebars');
       echo $this->Html->css('slidebars-theme');
       
       
       ?>
    
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    
    
  	
        <?php echo $this->Html->script('jquery-asRange.js'); ?>
  	<script>
    $(document).ready(function() {
      var one = $(".range-example-2").asRange({
        range: true,
        limit: true,
        tip: {
          active: 'onMove'
        }
      });
      console.log(one.asRange('set', [0, 20]));
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
<!--    <div id="modal-regular" class="modal fade" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div style="text-align:center;"> <img style="float:center;" src="<?php echo $this->Html->url('/')?>images/ajax-modal-loading.gif" alt="" class="loading"></div>
            </div>
        </div>
    </div>-->


    <div id="topnavcontent">
        <div class="logininner">
            <div class="close-popup2 sign_in_toggle" id="close-pop-bt" onclick="close_div();"></div>
            <div class="loginin">
                <form action="" method="post" accept-charset="utf-8" id="loginform">
                    <div class="title-login">Sign in</div>
                    <div class="clearer"></div>
                    <div class="login_padding">
	                    <div class="smart-forms">
<!--	                        <div class="ajax_report notification spacer-t5 form-msg">
	                            <a class="close-btn"  href="javascript:void(0);">×</a>
	                            <span class="ajax_message">Hello Message</span></div>-->
	                    </div>
	                    <ul>
	                        <li>
	                        	<p>Username or Email id</p>
	                            <input type="email" placeholder="Email" required="required" name="email" id="logemail" maxlength="50" type="text">
	                            <div class="clr"></div>
	                        </li>
	                        <li style="float:right;">
	                        	<p>Password</p>
	                            <input placeholder="Password" name="password" id="logpassword" required="required" maxlength="50" type="password">
	                            <div class="clr"></div>
	                        </li>
	                    </ul>
	                    <div class="clr"></div>
	                    <div id="notfound" class="title-login" style="color:orangered; font-size: 14px; display: none;border-bottom:none; line-height: 10px;
	                         margin-top: 5px; padding-bottom: 0; margin-bottom: 0;">Invalid Email or Password! </div>

	                    <div id="notactive" class="title-login" style="color:orangered; font-size: 14px; display: none;border-bottom:none; line-height: 10px;
	                         margin-top: 5px; padding-bottom: 0; margin-bottom: 0;"> Your Account not active!. </div>

	                    <div class="send_right"><a class="forgot" href="<?php echo $this->Html->url('/');?>forgot-password">Forgot your password?</a></div>
	                    <div class="">
	                        <div class="buttonOuterGrey">
	                            <button type="button" id="loginButon" onclick="loginUser()" class="buttonGrey">Login</button>
	                        </div>
	                    </div>
	                    <div class="clr"></div>
	                    <div class="account-re">Do not have account?<a class="register" href="<?php echo $this->Html->url('/')?>users/signup">Register</a></div>
	                    <div class="clr"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<style>
    #topnavcontent {
	display: none;
	position: fixed;
	background: none repeat scroll 0 0 rgba(0, 0, 0, 0.7);
	width: 100%;
	height: 100%;
	top: 0px;
	font-size: 16px;
	line-height: 20px;
	color: #ffffff;
	margin: 0;
	z-index: 1000000000;
	left: 0;
}
</style>

<!--    <div style="margin-left: -270px;" class="sb-slidebar sb-left sb-style-overlay">
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
    </div>-->





    <div style="margin-right: -270px;" class="sb-slidebar sb-right sb-style-overlay">
        <nav>
            <ul class="vertical-nav dark red sb-menu">
            </ul>
        </nav>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
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
        
        //alert('ok');
        var email = $("#logemail").val();
        var pass = $("#logpassword").val();

        if($("#logemail").val() == ""){ alert('Login Email Can not be blank'); $("#logemail").focus(); return false; }
        if($("#logpassword").val() == ""){ alert('Login Password Can not be blank'); $("#logpassword").focus(); return false; }

        if (!valEmail(email)) { alert('Invalid Login Email'); return false; }

//        $.ajax({
//            type: "POST",
//            url: "<?php echo $this->Html->url('/'); ?>users/frontUserLogin/",
//            //dataType: "json",
//            data: {email: email, pass:pass}
//        }).done(function (msg) {
//            //alert(msg);
//            if(msg == "notfound"){
//                //alert("Invalid Email or Password. Try again.");
//                $("#notactive").css("display","none");
//                $("#notfound").css("display","block");
//            } else if(msg == "notactive"){
//                $("#notfound").css("display","none");
//                $("#notactive").css("display","block");
//            } else if(msg == "u"){
//                window.location.href = "<?php echo Router::url(array('controller' => 'users', 'action' => 'userdashboard')); ?>";
//            } else if(msg == "e"){
//                window.location.href = "<?php echo Router::url(array('controller' => 'escorts', 'action' => 'escortdashboard')); ?>";
//            } else if(msg == "a"){
//                window.location.href = "<?php echo Router::url(array('controller' => 'agencies', 'action' => 'agencydashboard')); ?>";
//            } else if(msg == "c"){
//                window.location.href = "<?php echo Router::url(array('controller' => 'clubs', 'action' => 'clubdashboard')); ?>";
//            } else if(msg == "p"){
//                window.location.href = "<?php echo Router::url(array('controller' => 'parlors', 'action' => 'parlordashboard')); ?>";
//            }else if(msg == "s"){
//                window.location.href = "<?php echo Router::url(array('controller' => 'strippers', 'action' => 'stripperdashboard')); ?>";
//            }
//        });

        //alert(pass);
        $.post("<?php echo $this->webroot; ?>users/frontUserLogin", {email: email, pass:pass}, function(msg){
            //alert(msg);
         if(msg.trim() == "notfound")
            {
                $("#notactive").css("display","none");
                $("#notfound").css("display","block");
            } 
            if(msg.trim() == "notactive"){
                $("#notfound").css("display","none");
                $("#notactive").css("display","block");
            } 
       
            if(msg.trim() == "u"){
                window.location.href = "<?php echo Router::url(array('controller' => 'users', 'action' => 'userdashboard')); ?>";
            } 
            if(msg.trim() == "e"){
                window.location.href = "<?php echo Router::url(array('controller' => 'escorts', 'action' => 'escortdashboard')); ?>";
            } 
            if(msg.trim() == "a"){
                window.location.href = "<?php echo Router::url(array('controller' => 'agencies', 'action' => 'agencydashboard')); ?>";
            } 
            if(msg.trim() == "c"){
                window.location.href = "<?php echo Router::url(array('controller' => 'clubs', 'action' => 'clubdashboard')); ?>";
            } 
            if(msg.trim() == "p"){
                window.location.href = "<?php echo Router::url(array('controller' => 'parlors', 'action' => 'parlordashboard')); ?>";
            }
            if(msg.trim() == "s"){
                window.location.href = "<?php echo Router::url(array('controller' => 'strippers', 'action' => 'stripperdashboard')); ?>";
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
<script>
    
    function close_div(){
     $("#topnavcontent").hide();  
   } 
  
</script>
<script>
    $(function () {
        $('#gggggggg').raty({
            click: function (score, evt) {
                $("#score").attr('value', score);
            }
        });

    });
</script>
<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
