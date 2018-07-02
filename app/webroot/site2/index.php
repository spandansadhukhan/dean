<?php
ob_start();
session_start();
define(SITE_URL, "http://thedirectory.nz/newver/");
$link = mysql_connect("localhost", "avik_escort", "Host!@#$%^") or die("Error in Connection. Check Server Configuration.");
mysql_select_db("admin_escort", $link) or die("Database not Found. Please Create the Database.");
include 'class.phpmailer.php';

if ($_REQUEST['submit']) {

    $name = isset($_REQUEST['fullname']) ? $_REQUEST['fullname'] : '';
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : '';
    $message = isset($_REQUEST['message']) ? $_REQUEST['message'] : '';

    $mail_to_send = isset($_REQUEST['mail_to_send']) ? $_REQUEST['mail_to_send'] : '';
    $mail_to_name = isset($_REQUEST['mail_to_name']) ? $_REQUEST['mail_to_name'] : '';
    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';


    $Subject1 = "Someone Contacted Your Site";


    $TemplateMessage.="<br/><br/>Hi  $mail_to_name,";
    $TemplateMessage.="<br>";



    $TemplateMessage.="<br>Contact Person:" . $name;
    $TemplateMessage.="<br><br>";
    $TemplateMessage.=" Email Address : " . $email;
    $TemplateMessage.="<br>";
    $TemplateMessage.="Phone No : " . $phone;
    $TemplateMessage.="<br>";

    $TemplateMessage.="Message : " . $message;
    $TemplateMessage.="<br>";


    $TemplateMessage.="<br><br><br/>Thanks & Regards<br/>";
    $TemplateMessage.="The Directory";
    $TemplateMessage.="<br><br><br>This is a post-only mailing.  Replies to this message are not monitored
  or answered.";
    $mail1 = new PHPMailer;
    $mail1->FromName = "The Directory Team";
    $mail1->From = "info@thedirectory.com";
    $mail1->Subject = $Subject1;



    $mail1->Body = stripslashes($TemplateMessage);
    $mail1->AltBody = stripslashes($TemplateMessage);
    $mail1->IsHTML(true);
    $mail1->AddAddress($mail_to_send, "thedirectory.com");
    $mail1->Send();

    $_SESSION['MSG'] = 1;
    header("location:index.php?id=" . base64_encode($id));
    exit();
}
?>


<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Escort</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
        <link href="css/jquery.fancybox.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
    </head>


    <?php
    $id = base64_decode($_REQUEST['id']);
    $userifo = mysql_fetch_object(mysql_query("select * from `users` where `id`='" . $id . "'"));
    $social = mysql_fetch_object(mysql_query("select * from `social_settings` where `user_id`='" . $id . "'"));
    $rate = mysql_fetch_assoc(mysql_query("select * from `rates` where `user_id`='" . $id . "'"));
    ?>


    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) -->
                    <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt=""></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about-me">About</a></li>
                        <li><a href="#gallery">Gallery</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <section class="home_banner" id="home">
            <div class="bs-example">
                <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>   
                    <!-- Wrapper for carousel items -->
                    <div class="carousel-inner">

                        <div class="carousel-inner">
                            <?php
                            $c = 0;
                            $bb = mysql_query("select * from `morebanners` where `user_id`='" . $id . "'");
                            $num = mysql_num_rows($bb);
                            if ($num > 0) {
                                while ($img = mysql_fetch_object($bb)) {
                                    if ($c == 0) {
                                        $class = "active";
                                    } else {
                                        $class = "";
                                    }
                                    ?>
                                    <div class="<?php echo $class; ?> item">
                                        <img src="<?php echo SITE_URL ?>user_banners/<?php echo $img->image ?>" alt="First Slide">
                                    </div>
                                    <?php
                                    $c++;
                                }
                            }
                            ?>

                        </div>  

                    </div>
                    <!-- Carousel controls -->
                    <!--<a class="carousel-control left" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="carousel-control right" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>-->
                </div>
            </div>
        </section>


        <section class="about" id="about-me">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <?php
                        if ($_SESSION['MSG'] == 1) {
                            echo "<span class='alert alert-success' style='margin-left: 435px'>Mail Sent. Escort may contact you shortly.</span>";
                            $_SESSION['MSG'] = '';
                        }
                        ?>


                        <h1><span>About <?php echo $userifo->name ?></span></h1>
                    </div>
                </div>
                <div class="row about-bottom">
                    <div class="col-md-10 center-div">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <h3>About</h3>
                                <p><?php echo $userifo->about ?></p>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <h3>Rates</h3>
                                <p>
                                    
                                    <table>
                            <tr>
                                <td>Rates</td>
                                <td style="width:30%">Incall</td>
                                <td style="width:30%">Outcall</td>
                            </tr>
                            <tr>
                                <td>30 Min</td>
                                <td><?php echo !empty($rate['30min_incall'])?$rate['30min_incall']:"N/A" ?></td>
                                <td><?php echo !empty($rate['30min_outcall'])?$rate['30min_outcall']:"N/A" ?></td>
                            </tr>
                            <tr>
                                <td>1 Hour</td>
                                <td><?php echo !empty($rate['1hr_incall'])?$rate['1hr_incall']:"N/A" ?></td>
                                <td><?php echo !empty($rate['1hr_outcall'])?$rate['1hr_outcall']:"N/A" ?></td>
                            </tr>
                            <tr>
                                <td>2 Hour</td>
                                <td><?php echo !empty($rate['2hr_incall'])?$rate['2hr_incall']:"N/A" ?></td>
                                <td><?php echo !empty($rate['2hr_outcall'])?$rate['2hr_outcall']:"N/A" ?></td>
                            </tr>
                            <tr>
                                <td>3 Hour</td>
                                <td><?php echo !empty($rate['30min_incall'])?$rate['30min_incall']:"N/A"; ?></td>
                                <td><?php echo !empty($rate['3hr_outcall'])?$rate['3hr_outcall']:"N/A" ?></td>
                            </tr>
                            <tr>
                                <td>Additional Hours</td>
                                <td><?php echo !empty($rate['addhr_incall'])?$rate['addhr_incall']:"N/A" ?></td>
                                <td><?php echo !empty($rate['addhr_outcall'])?$rate['addhr_outcall']:"N/A" ?></td>
                            </tr>
                            <tr>
                                <td>Overnight</td>
                                <td><?php echo !empty($rate['night_incall'])?$rate['night_incall']:"N/A" ?></td>
                                <td><?php echo !empty($rate['night_outcall'])?$rate['night_outcall']:"N/A" ?></td>
                            </tr>
                            <tr>
                                <td>1 Day</td>
                                <td><?php echo !empty($rate['1day_incall'])?$rate['1day_incall']:"N/A" ?></td>
                                <td><?php echo !empty($rate['1day_outcall'])?$rate['1day_outcall']:"N/A" ?></td>
                            </tr>
                            <tr>
                                <td>2 Day</td>
                                <td><?php echo !empty($rate['2day_incall'])?$rate['2day_incall']:"N/A" ?></td>
                                <td><?php echo !empty($rate['2day_outcall'])?$rate['2day_outcall']:"N/A" ?></td>
                            </tr>
                            <tr>
                                <td>Weekend</td>
                                <td><?php echo !empty($rate['weekend_incall'])?$rate['weekend_incall']:"N/A" ?></td>
                                <td><?php echo !empty($rate['weekend_outcall'])?$rate['weekend_outcall']:"N/A" ?></td>
                            </tr>
                        </table>
                                    
                                </p>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <h3>Personal Informations</h3>
                                <ul class="about-list">
                                    <li>
                                        <p><b>Name:</b> <?php echo $userifo->name ; ?></p>
                                    </li>
                                    <li>
                                        <p><b>Phone:</b> <?php echo $userifo->phone_no ?></p>
                                    </li>
                                    <li>
                                        <p><b>Email:</b> <?php echo $userifo->email ?></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="gallery-section" id="gallery">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1><span>Gallery</span></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="gallery">
                            <?php
                            $bb = mysql_query("select * from `moreimages` where `user_id`='" . $id . "'");
                            $num = mysql_num_rows($bb);
                            if ($num > 0) {
                                while ($img = mysql_fetch_object($bb)) {
                                    ?>

                                    <li>
                                        <a class="fancybox" href="<?php echo SITE_URL ?>user_webimages/<?php echo $img->image ?>" data-fancybox-group="gallery" title="<?php echo $userifo->first_name . ' ' . $userifo->last_name ?>"><img src="<?php echo SITE_URL ?>user_webimages/<?php echo $img->image ?>" alt="" /></a>
                                    </li>

                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact-section text-center" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1><span>Contact Me</span></h1>
                    </div>
                </div>
                <div class="row about-bottom">
                    <div class="col-md-10 center-div">
                        <h3><i class="fa fa-phone"></i> <?php echo $userifo->phone_no ?></h3>
                        <h3><i class="fa fa-link"></i> <?php echo $userifo->email ?></h3>
                    </div>
                </div>
            </div>
        </section>

        <section class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <p class="copyright">© <?php echo date("Y");?> companyname | All rights reserved.</p>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <ul class="social-links">
                            <li><a href="<?php echo $social->fb_link ?>" class="fa fa-facebook" target="_blank"></a></li>
                            <li><a href="<?php echo $social->twitt_link ?>" class="fa fa-twitter" target="_blank"></a></li>
                            <li><a href="<?php echo $social->google_link ?>" class="fa fa-google-plus" target="_blank"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </body>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript">
        $(function () {
            $('.navbar-collapse .navbar-nav li a').on('click', function (event) {
                var $anchor = $(this);
                $('html, body').stop().animate({
                    scrollTop: $($anchor.attr('href')).offset().top
                }, 1000, 'easeInOutExpo');
                event.preventDefault();
            });
        });
    </script>

    <!-- Add fancyBox main JS files -->
    <script type="text/javascript" src="js/jquery.fancybox.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.fancybox').fancybox();
            // Change title type, overlay closing speed
            $(".fancybox-effects-a").fancybox({
                helpers: {
                    title: {
                        type: 'outside'
                    },
                    overlay: {
                        speedOut: 0
                    }
                }
            });

            // Disable opening and closing animations, change title type
            $(".fancybox-effects-b").fancybox({
                openEffect: 'none',
                closeEffect: 'none',
                helpers: {
                    title: {
                        type: 'over'
                    }
                }
            });

            // Set custom style, close if clicked, change title type and overlay color
            $(".fancybox-effects-c").fancybox({
                wrapCSS: 'fancybox-custom',
                closeClick: true,
                openEffect: 'none',
                helpers: {
                    title: {
                        type: 'inside'
                    },
                    overlay: {
                        css: {
                            'background': 'rgba(238,238,238,0.85)'
                        }
                    }
                }
            });

            // Remove padding, set opening and closing animations, close if clicked and disable overlay
            $(".fancybox-effects-d").fancybox({
                padding: 0,
                openEffect: 'elastic',
                openSpeed: 150,
                closeEffect: 'elastic',
                closeSpeed: 150,
                closeClick: true,
                helpers: {
                    overlay: null
                }
            });
        });
    </script>


</html>