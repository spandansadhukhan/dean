<?php
session_start();
ob_start();
include('administrator/includes/config.php');
if($_SESSION['user_id']=='')
{
	header("location:login.php");
}

if(isset($_GET['action']) && $_GET['action']=='delete')
{
	$item_id=$_GET['cid'];
	mysql_query("delete from  artist_portfolio where id='".$item_id."'");
	$_SESSION['msg']=message('deleted successfully',1);
	header('Location: list_portfolio.php');
	exit();
}

$userdetails=mysql_fetch_array(mysql_query("SELECT * FROM `artist_user` WHERE `id`='".$_SESSION['user_id']."'"));
$country = mysql_fetch_array(mysql_query("select * from `artist_countries` where `id`='".$userdetails['country']."'"));
$state = mysql_fetch_array(mysql_query("select * from `artist_states` where `id`='".$userdetails['state']."'"));
$city = mysql_fetch_array(mysql_query("select * from `artist_cities` where `id`='".$userdetails['city']."'"));

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Ourtistry - Calendar</title>
	 <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.css" rel="stylesheet">
        
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script language="JavaScript" src="calendar_db.js"></script>
<link rel="stylesheet" href="calendar.css">

<link href='event_calendar/fullcalendar.css' rel='stylesheet' />
<link href='event_calendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<!--<script src="event_calendar/lib/jquery.min.js"></script>-->
<script src="event_calendar/lib/moment.min.js"></script>
<script src="event_calendar/fullcalendar.min.js"></script>
   
   
<script type="text/javascript">

	$(document).ready(function() {

		$('#calendar').fullCalendar({
                   eventClick: function(calEvent, jsEvent, view) {
                        var id= calEvent.id;
                        var d =new Date(calEvent.start);
                        var f =new Date(calEvent.end);
                        var st=d.getFullYear()+"-"+(parseInt(d.getMonth())+1)+"-"+d.getDate()+" "+d.getHours()+":"+d.getMinutes();
                        var et=f.getFullYear()+"-"+(parseInt(f.getMonth())+1)+"-"+f.getDate()+" "+f.getHours()+":"+f.getMinutes();
                        var seconds =  (f- d)/(1000*3600);

                        
                    },
			defaultDate: '<?php echo date('Y-m-d');?>',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			<?php
			$counter = 1;
			$first_day_of_current_month = date('Y-m-01');
			$last_day_of_current_month = date('Y-m-t');
		        $sql_booking12 = "SELECT * FROM `artist_proposal` WHERE `user_id`='".$_SESSION['user_id']."'";
			$exe_booking12 = mysql_query($sql_booking12) or die(mysql_error());
			$num_booking12 = mysql_num_rows($exe_booking12);
			if($num_booking12>0)
			{
			?>
			events: [
			<?php
			while($arr_booking12 = mysql_fetch_array($exe_booking12))
			{
                        $job = mysql_fetch_array(mysql_query("select * from `artist_job` where `id`='".$arr_booking12['job_id']."'"));	
                        if($job['date']!='')
                        {			
			?>
				{
					id:'<?php echo $arr_booking12['id'];?>',
                                        title: '<?php echo $job['title']?>',
					url: 'http://ourtistry.com/job_details.php?id=<?php echo $job['id']?>',
					start: '<?php echo $job['date'] ?>',
                                        end: '<?php echo $job['job_ending_date'] ?>'
				},
                                
				<?php
				}
				?>
				<?php
				$counter++;
			
                        }
			?>
			]
			<?php
			}
			else
			{
			?>
			events: [
			]
			<?php
			}
			?>
		});
		
	});

</script>
   
   
   
   <style>
       #calendar {
		max-width: 700px;
		margin: 0 auto;
	}
   </style>
        
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-74771829-1', 'auto');
  ga('send', 'pageview');

</script>
  
  </head>
  <body>
  
   <!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5BR4NJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5BR4NJ');</script>
<!-- End Google Tag Manager -->
  
  	<header>
	<?php include "includes/header.php"; ?>
  </header>	
	
	<section class="dashboard_section">
		<div class="container">
			<div class="row">
				<?php include "includes/sidebar.php"; ?>
				<div class="col-md-9 col-sm-9">
					<div class="right_dashboard">
						<div class="row dashtop">
							<div class="col-lg-12">
								<h3><?php echo $userdetails['fname'].' '.$userdetails['lname'] ?></h3>
								<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing</p> -->
								<!--<p class="country_desc"><span><img alt="" src="images/flag.jpg"> </span> <?php echo $country['name'] ?> | <?php echo $state['name'] ?> | <?php echo $city['name'] ?></p>-->
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-8">
							<div id="calendar"></div>
							<div class="clearfix"></div>
							<a href="<?php echo $_SERVER['HTTP_REFERER'] ?>" style="display:block;margin-top:17px"><img src="images/back.png" /></a>
								
							</div>
				<?php include "includes/right_panel.php"; ?> 
					
				</div>
			</div>
		</div>
	</div></div></section>
		
	
	
	<?php include "includes/footer.php"; ?>
    
   <!-- <script src="js/jquery.js"></script>-->
    <script src="js/bootstrap.js"></script>
   <script src="js/bootstrap.min.js"></script> 
<!--   <script type="text/javascript">
  window.jQuery || document.write("<script src='js/jquery-2.0.3.min.js'>"+"<"+"/script>");
</script>		-->
<!--<script>
  $(document).ready(function() {     
    $('.thumbnail').hover(
      function(){
        $(this).find('.caption').slideDown(250); //.fadeIn(250)
      },
      function(){
        $(this).find('.caption').slideUp(250); //.fadeOut(205)
      }
    ); 
  });
</script>-->

<style>
.fc-time{
	
	display:none;
	
}	
</style>


<?php include "includes/all.php"; ?>
  </body>
</html>