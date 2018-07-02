<?php
    error_reporting(1);
    session_start();
    ob_start();
    include 'administrator/includes/config.php';
    if(!isset($_SESSION['user_id'])){
      header('location:denied.php');
      exit;
    }
    ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Boat Rent</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/jquery.bxslider.css" rel="stylesheet" type="text/css">
    <link href="css/build.css" rel="stylesheet" type="text/css">
  
    <!-- comment to fix ruined header  -->
    <!-- <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" media="screen"
     href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
    
   
    <style>
      #calendar {
          max-width: 700px;
          margin: 0 auto;
      }
      .fc-scroller {
          height: 100% !important;
      }
      .bootstrap-datetimepicker-widget{
      z-index:99999;
      }
    </style>

    <script type="text/javascript">
    function changeboat(aa){
      location.href='scheduler.php?boatID='+aa;
    }
    </script>
 
  </head>
  <body>
      <!-- Modal HTML -->
     <?php include 'includes/header_new.php';?>
      <section class="my-account-sec">
        <div class="container">
          <div class="row">
            <?php include 'includes/my_left_panel.php';?>
            <div class="col-md-9 col-sm-8">

              <div class="account-right-hold">

                <select name="boat_id"  id="boat_id" style="position: absolute; float-left:20%; height: 30px; width: 16%;" onChange="changeboat(this.value);">
                  <option value="0">Select Boat</option>
                  <?php
                  $queryBoat = "SELECT `boatsite_boat`.`id`, `boatsite_boat`.`name`, `boatsite_boat`.`is_maintenence` FROM `boatsite_boat_request` JOIN `boatsite_boat` ON `boatsite_boat_request`.`boat_id`=`boatsite_boat`.`id` where `boatsite_boat_request`.`status`=1 AND (`boatsite_boat_request`.`user_id` = ".$_SESSION['user_id']." OR `boatsite_boat_request`.`owner_id` = ".$_SESSION['user_id'].")";

                  $fetch_boat=mysql_query($queryBoat);

                  while($row_boat = mysql_fetch_assoc($fetch_boat)) {
                    if($row_boat['is_maintenence']!=1){
                    ?>
                    <option value="<?php echo $row_boat['id']; ?>" <?php if($_REQUEST['boatID']==$row_boat['id']){?> selected <?php } ?>><?php echo $row_boat['name']; ?></option>
                    <?php } ?>
                    
                  <?php } ?>
                </select>

                <h3 class="text-center">Scheduler</h3>
                <?php if($_REQUEST['boatID']!=''){ ?>
                  <div id="calendar"></div>

                  <div class="popup cal-popup" style="display: none;">
                    <a href="javascript:void(0);" id="close_pop"><i class="glyphicon glyphicon-remove"></i></a>
                    <div id="book_form" style="display:none;">     
                      <h3>Reserve Your Boat Share</h3>
                      <p>Select a time slot to book shared boat</p>

                      <form id="reserve_share" method="POST" action="">
                        <input type='hidden' name="date_time" id="date_time" value="">
                        <div class="form-group" style="display:none;">
                          <input type="checkbox" class"form-control" value="1" id="whole_day" name="whole_day"> Whole Day Book                    
                        </div>

                        <div class="form-group">
                          <div id="datetimepicker3" class="input-append">

                            <select name="start_time" id="start_time" class="form-control">
                              <option value="">Select Start Time</option>
                              <option value="1">Full day (9 AM to 9 AM)</option>
                              <option value="2">Slot 1(9 AM to 2 PM)</option>
                              <option value="3">Slot 2(1 PM to 9 AM)</option>
                            </select>

                            <span class="add-on" style="">
                              <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                          </div>
                        </div>

                        <div class="form-group">
                          <button type="button" id="save_res" class="btn btn-primary">Reserve</button>
                        </div>
                      </form>
                      <span id="succ"></span>
                    </div>

                    <div id="book_form_not_avilable" style="display:none;">     
                      <h3>Reserve Your Boat Share</h3>
                      <p>Sorry!!! This date is not available. Try Another date..</p>
                    </div>     
                  </div>

                <?php } else{ ?>
                  <p>Please Select a Boat First...</p>
                <?php } ?>
                
              </div>

            </div>
          </div>
        </div>
      <!-- </div> -->
      </section>
    <?php include 'includes/footer.php';?>
 
  </body>
 
<script src="js/bootstrap.min.js"></script>

<link href='event_calendar/fullcalendar.css' rel='stylesheet' />
<link href='event_calendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src="event_calendar/lib/moment.min.js"></script>
<script src="event_calendar/fullcalendar.js"></script>

<script type="text/javascript"
 src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
</script>

<script type="text/javascript">
  $(document).ready(function () {
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    var calendar = $('#calendar').fullCalendar({
        aspectRatio: 1.45,
        droppable: true,
        weekend: true,
        firstHour: 7,
        columnFormat: {
            month: 'dddd',
            week: 'ddd, dS',
            day: 'dddd, MMM dS'
        },
        header: {
            right: 'prev,next',
            center: 'title',
            left: 'month,agendaWeek,agendaDay'
        },
        editable: true,
        defaultView: 'month',
        firstDay: 1,
        handleWindowResize: true,
        dragOpacity: 0.7,
        allDayDefault: false,
        //events: "event_calendar/events.php?creator=<?php print_r($_SESSION['uid']); ?>",
        //timeFormat: 'HH:mm { - HH:mm}',
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
          //alert("kjhsdf");
      	  $('#book_form').hide();
      	  $('#book_form_not_avilable').hide();   
          var newDate = start.format("YYYY-MM-DD");
         
          $('#date_time').val('');
          $('#date_time').val(newDate);
             
      		$.ajax({
      			url: "checkBooking.php",
      			data: 'curdate=' + newDate+ '&userID=<?php echo $_SESSION['user_id'];?>&boatID=<?php echo $_REQUEST['boatID'];?>',
      			type: "POST",
      			success: function (response) {
      			if(response.trim()=='0'){
        			$('#book_form').hide();
        			$('#book_form_not_avilable').show('slow');
        		}else{
        			$('#start_time').html(response.trim());
        			$('#book_form_not_avilable').hide();
        			$('#book_form').show('slow');
        			}
      			}
      		});
             
          $(".popup").css({
            'display': 'block',
            'opacity': '0'
          }).animate({
            'opacity': '1',
            'top': '45%'
          }, 1000);

        },
             
              eventSources: [

        // your event source
        {
       
        <?php
          $counter = 1;
          $first_day_of_current_month = date('Y-m-01');
          $last_day_of_current_month = date('Y-m-t');
          $sql_booking = "SELECT * FROM `boatsite_bookings` WHERE `user_id`='" . $_SESSION['user_id'] . "' AND `boat_id`='".$_REQUEST['boatID']."'";
          $exe_booking = mysql_query($sql_booking) or die(mysql_error());
          $num_booking = mysql_num_rows($exe_booking);
       
       
      
       
            if ($num_booking > 0) {
        ?>
        events: [
       
        <?php
        while($row = mysql_fetch_assoc($exe_booking)) {
          $timing="";
          if($row['booking_time']==1){
            $timing="Full day";
          } else if($row['booking_time']==2){
            $timing="(9 AM to 2 PM)";
          } else if($row['booking_time']==3){
            $timing="(1 PM to 9 AM)";
          }
          $sharer_name = mysql_fetch_object(mysql_query("SELECT * from boatsite_user where `id` = '".$row['user_id']."'"));

          $queryboat = "SELECT name,id,title FROM boatsite_boat WHERE id = '".$row['boat_id']."'";
          $resBoat = mysql_query($queryboat);
          $rowboat = mysql_fetch_assoc($resBoat);

          $boat_sharer_id = $row['user_id'];

          ?>
          {
          id:'<?php echo $row["id"]; ?>',
          title: '<?php echo $sharer_name->fname." ".$timing; ?>',
          start: '<?php echo $row["booking_from"] ?>',
          end: '<?php echo $row["booking_to"] ?>',
          },
        <?php } ?>
           
           
           
        ]
  
   
<?php
} else {
?>
events: [
        ]

<?php
}


?>
        }

        // any other event sources...

    ],eventDrop: function (event, delta) {
                  start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
                  end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
                  $.ajax({
                      //url: 'fullcalendar/update_events.php',
                      data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                      type: "POST",
                      success: function (response) {
                          console.log(response);
                      }
                  });
              },
              eventClick: function (event, jsEvent, view) {
             
             
             
             
                  if (confirm("Really delete event " + event.title + "with id " + event.id + "?")) {
                      $.ajax({
                          //url: "fullcalendar/delete_event.php",
                          url: "delete_event.php",
                          data: 'eid=' + event.id,
                          type: "POST",
                          success: function (response) {
                              console.log(response);
                              calendar.fullCalendar('removeEvents', event.id);
                          }
                      });
                  }
              },
              eventResize: function (event) {
                  start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
                  end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
                  $.ajax({
                      url: 'fullcalendar/update_events.php',
                      data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                      type: "POST",
                      success: function (response) {
                          console.log(response);
                      }
                  });
              },
          });
          $('#external-events div.external-event').each(function () {
              var eventObject = {
                  title: $.trim($(this).text()),
                  backgroundColor: $.trim($(this).attr('bgc'))
              };
              $(this).data('eventObject', eventObject);
              $(this).draggable({
                  zIndex: 999,
                  revert: true,
                  revertDuration: 0
              });
          });
      });
</script>

<script type="text/javascript">

  $(function() {
    $('#datetimepicker3').datetimepicker({
      pickDate: false
    });
  });
 $(function() {
    $('#datetimepicker4').datetimepicker({
      pickDate: false
    });
  });


$(document).ready(function() {
        $(function () {
            $('#datetimepicker6').datetimepicker();
            $('#datetimepicker7').datetimepicker({
                useCurrent: false //Important! See issue #1075
            });
            $("#datetimepicker6").on("dp.change", function (e) {
                $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
            });
            $("#datetimepicker7").on("dp.change", function (e) {
                $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
            });
        });
    });
</script>

<style type="text/css">
  .cal-popup {
    display:none;
    position:fixed;
    top:50%;
    left:50%;
    background-color:#f5f5f5;
    z-index:9999;
    height:56%;
    width: 35%;
    border:1px;
    border-color:grey;
    border-radius:3px;
    border-style:solid;
    padding:10px;
    -moz-transition:all .2s ease-out 0;
    -webkit-transition:all .2s ease-out 0;
    transition:all .2s ease-out 0;
}

.fc-agendaWeek-button{display: none;}
.fc-agendaDay-button{display: none;}

.fc-time{display: none;}
</style>
<script type="text/javascript">
 
  $("#save_res").on('click',function(){

        var date_time = $("#date_time").val();
        var start_time = $("#start_time").val();
        var end_time = $("#end_time").val();
       // var spots    = $("#spots").val();
        var boat_id  = $("#boat_id").val();
        var whole_day = $("#whole_day").val();
      
       
        if(boat_id==0)
        {
            alert('Select a Boat');
            return false;
        }
        else
        {
       
          $.ajax({
          url: "save_res.php",
          type: "post",
/*          data: {start_time:start_time,end_time:end_time,spots:spots,boat_id:boat_id,start_date:date_time,end_date:date_time,whole_day:whole_day},*/
		  
	 data: {start_time:start_time, end_time:end_time, boat_id:boat_id, start_date:date_time, end_date:date_time, whole_day:whole_day}, 
          success: function(newData){
            $("#succ").html(newData);
            setTimeout(function(){
              location.reload();
            },2000);
          }
          });
         
          }

      });
$("#close_pop").on('click',function(){
  $(".cal-popup").css("display", "none");
});
</script>
</html>

<!--<style>
    .fc-toolbar > .fc-left > h2 {float: none!important;}
</style>-->
<?php ob_flush(); ?>