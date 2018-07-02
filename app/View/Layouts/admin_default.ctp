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

$cakeDescription = __d('cake_dev', 'Escort Admin Panel');
?>
<?php
if(($this->params['controller']=='users' && $this->params['action']=='admin_index') || ($this->params['controller']=='users' && $this->params['action']=='admin_login') || ($this->params['controller']=='users' && $this->params['action']=='admin_fotgot_password') || ($this->params['controller']=='users' && $this->params['action']=='admin_register'))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">
		<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
    <link href="<?php echo($this->webroot)?>admin_styles/css/style.css" rel="stylesheet">
    <link href="<?php echo($this->webroot)?>admin_styles/css/style-responsive.css" rel="stylesheet">
    <script src="<?php echo($this->webroot)?>admin_styles/js/jquery-1.10.2.min.js"></script>


</head>
<?php echo '<center>'.$this->Session->flash().'</center>'; ?>
<?php echo $this->fetch('content'); ?>
<?php
}
else
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="image/png">

  <!--<title>AdminX</title>-->
  <?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
  <!--icheck-->
  <link href="<?php echo($this->webroot)?>admin_styles/js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
  <link href="<?php echo($this->webroot)?>admin_styles/js/iCheck/skins/square/square.css" rel="stylesheet">
  <link href="<?php echo($this->webroot)?>admin_styles/js/iCheck/skins/square/red.css" rel="stylesheet">
  <link href="<?php echo($this->webroot)?>admin_styles/js/iCheck/skins/square/blue.css" rel="stylesheet">

  <!--dashboard calendar-->
  <link href="<?php echo($this->webroot)?>admin_styles/css/clndr.css" rel="stylesheet">

  <!--Morris Chart CSS -->
  <link rel="stylesheet" href="<?php echo($this->webroot)?>admin_styles/js/morris-chart/morris.css">

  <!--common-->
  <link href="<?php echo($this->webroot)?>admin_styles/css/style.css" rel="stylesheet">
  <link href="<?php echo($this->webroot)?>admin_styles/css/style-responsive.css" rel="stylesheet">
	<!--<link href="<?php echo($this->webroot)?>admin_styles/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo($this->webroot)?>admin_styles/css/bootstrap-theme.css" rel="stylesheet">
	<link href="<?php echo($this->webroot)?>admin_styles/css/bootstrap.min.css" rel="stylesheet">-->


  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
      <script src="<?php echo($this->webroot)?>admin_styles/js/jquery-1.10.2.min.js"></script>

	<?php
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>

<body class="sticky-header">

<section>
    <!-- left side start-->
    <?php echo $this->element('admin_sidebar');?>
    <!-- left side end-->

    <!-- main content start-->
    <div class="main-content" >
	<!-- header section start-->
        <?php echo $this->element('admin_topbar');?>
        <!-- header section end-->

        <!-- page heading start-->
        <?php //echo $this->element('admin_create_menu');?>
        <!-- page heading end-->

        <!--body wrapper start-->
	<?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
        <!--body wrapper end-->

        <!--footer section start-->
        <footer>
            <!--2014 &copy; AdminEx by ThemeBucket-->
		&copy;2016
        </footer>
        <!--footer section end-->


    </div>
    <!-- main content end-->
</section>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="<?php echo($this->webroot)?>admin_styles/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="<?php echo($this->webroot)?>admin_styles/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo($this->webroot)?>admin_styles/js/bootstrap.min.js"></script>
<script src="<?php echo($this->webroot)?>admin_styles/js/modernizr.min.js"></script>
<script src="<?php echo($this->webroot)?>admin_styles/js/jquery.nicescroll.js"></script>



<!--easy pie chart-->
<script src="<?php echo($this->webroot)?>admin_styles/js/easypiechart/jquery.easypiechart.js"></script>
<script src="<?php echo($this->webroot)?>admin_styles/js/easypiechart/easypiechart-init.js"></script>

<!--Sparkline Chart-->
<script src="<?php echo($this->webroot)?>admin_styles/js/sparkline/jquery.sparkline.js"></script>
<script src="<?php echo($this->webroot)?>admin_styles/js/sparkline/sparkline-init.js"></script>

<!--icheck -->
<script src="<?php echo($this->webroot)?>admin_styles/js/iCheck/jquery.icheck.js"></script>
<script src="<?php echo($this->webroot)?>admin_styles/js/icheck-init.js"></script>

<!-- jQuery Flot Chart-->
<script src="<?php echo($this->webroot)?>admin_styles/js/flot-chart/jquery.flot.js"></script>
<script src="<?php echo($this->webroot)?>admin_styles/js/flot-chart/jquery.flot.tooltip.js"></script>
<script src="<?php echo($this->webroot)?>admin_styles/js/flot-chart/jquery.flot.resize.js"></script>


<!--Morris Chart-->
<script src="<?php echo($this->webroot)?>admin_styles/js/morris-chart/morris.js"></script>
<script src="<?php echo($this->webroot)?>admin_styles/js/morris-chart/raphael-min.js"></script>

<!--Calendar-->
<script src="<?php echo($this->webroot)?>admin_styles/js/calendar/clndr.js"></script>
<script src="<?php echo($this->webroot)?>admin_styles/js/calendar/evnt.calendar.init.js"></script>
<script src="<?php echo($this->webroot)?>admin_styles/js/calendar/moment-2.2.1.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>

<!--common scripts for all pages-->
<script src="<?php echo($this->webroot)?>admin_styles/js/scripts.js"></script>

<!--Dashboard Charts-->
<script src="<?php echo($this->webroot)?>admin_styles/js/dashboard-chart-init.js"></script>
<script>

	$(document).ready(function(){
		setTimeout(function() {
			$('.message').fadeOut('slow');
		}, 2000);
		setTimeout(function() {
			$('.success').fadeOut('slow');
		}, 2000);
	});
</script>
</body>
</html>
<?php
}
?>

<?php //echo $this->element('sql_dump'); ?>

