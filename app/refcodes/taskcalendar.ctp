<!-- <script>
var mykey = 'AIzaSyA_vJ3k7a4NDQMx2I33Nxpt4cewJrQLz2o';
var calendarid = 'nits.sandeeptewary@gmail.com';

$.ajax({
	type: 'GET',
	url: encodeURI('https://www.googleapis.com/calendar/v3/calendars/' + calendarid+ '/events?key=' + mykey),
	dataType: 'json',
	success: function (response) {
		console.log(response)
	},
	error: function (response) {
		console.log(response);
	}
});
</script> -->
<?php echo($this->element('profile_header'));?>
 <?php ?>
   <div class="body-wrapper">
   <div class="container">
    <div class="row">
        <div class="pull-right">
            <a href="/users/clientappointment" class="btn btn-primary btn-sm">Book a Client</a>
        </div>
    </div>
       <div class="row">
          <div id="calendar"></div>
                                
                         



           
       </div>
   </div>
   </div>
   
   <div id="popp" style="display:none;">                             
                             <h2 style="padding:2%; background-color:#1A85B4; color: #fff; border-radius: 7px 7px 0 0;">Availability</h2>
                             <input type="hidden" id="sttm">
                             <input type="hidden" id="entm">
                             <input type="hidden" id="ev_id">
                             <input type="hidden" id="ev_tp">                             
                             <div style="padding: 3%;">Available :<span id="sttm_div"></span></div>
                              
                               <div style="margin-left:3%; margin-bottom: 3%;">
                                  
                                   <div class="sign_hld" style="float: left; width:30%;"><input onclick="add_edit();" type="button" value="Save" class="sign_btn" id="sve"style="border:none; cursor:pointer; float: none;"></div>
                                   
                                   <div class="sign_hld" style="float: left; width:30%; display:none;" id="dll_div"><input id="dll"  type="button" value="Delete" class="secondary" style="border:none; cursor:pointer; float: none;"></div>
                                 
                                   <div class="sign_hld" style="float: right; width:30%;"><input type="button" onclick="cancelev();" value="Cancel" class="secondary" style="border:none; cursor:pointer; float: right; margin-right: 7%;"></div>
                                    <div style="clear:both;"></div>
                              </div>
                         </div>

<script src="<?php echo($this->webroot)?>js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo($this->webroot)?>js/jquery.switch.min.js" type="text/javascript"></script>

<link href='<?php echo($this->webroot)?>js/fullcalendar.css' rel='stylesheet' />
<link href='<?php echo($this->webroot)?>js/jquery.switch.css' rel='stylesheet' />

<script src='<?php echo($this->webroot)?>js/lib/moment.min.js'  ></script>

<script src='<?php echo($this->webroot)?>js/fullcalendar.js' ></script>
<script src='<?php echo($this->webroot)?>js/gcal.js' ></script>


<script>
function cancelev(){    
        var type=  $("#ev_tp").val();
        $("#popp").fadeOut();
        location.href='';       
       
}
function add_edit()
{
var title='Available';
var chk=$("#check").val();
var st= $("#sttm").val();
var et= $("#entm").val();
var id= $("#ev_id").val();
var type=  $("#ev_tp").val();

//return false;

if(type=='edit'){
    var urls='<?php echo($this->webroot)?>users/editcalenderdata?end='+et+'&id='+id+'&strt='+st+'&recur='+chk;
}else{
   var urls='<?php echo($this->webroot)?>users/savecalenderdata?title='+title+'&start='+st+'&end='+et+'&recur='+chk;  
}

$.ajax({
    url : urls,
    type: "POST",
    success: function(data)
    {
       $("#popp").fadeOut();   
       
         location.href='' ;  
     }
});
}

$(document).ready(function(){
    /*$('#calendar').fullCalendar({
        googleCalendarApiKey: 'AIzaSyA_vJ3k7a4NDQMx2I33Nxpt4cewJrQLz2o',
        events: {
            googleCalendarId: 'nits.sandeeptewary@gmail.com'
        }
    });*/

   $('#calendar').fullCalendar({
    eventResize: function(event, delta, revertFunc) {
			var id=event.id;
			var d =new Date(event.start);
			var f =new Date(event.end);
			var st=d.getFullYear()+"-"+(parseInt(d.getMonth())+1)+"-"+d.getDate()+" "+d.getHours()+":"+d.getMinutes();
			var et=f.getFullYear()+"-"+(parseInt(f.getMonth())+1)+"-"+f.getDate()+" "+f.getHours()+":"+f.getMinutes();
			var seconds =  (f- d)/(1000*3600);
			if(Number.isInteger(seconds)){
					
					 reccr=1;
						openpop(st,et,id,'edit',d.getDay(),f.getDay(),reccr);
			}else{
				  
					
					reccr=1;
						openpop(st,et,id,'edit',d.getDay(),f.getDay(),reccr);        
			}
       },eventClick: function(calEvent, jsEvent, view) {
			var id= calEvent.id;
			
			var d =new Date(calEvent.start);
			var f =new Date(calEvent.end);
			var st=d.getFullYear()+"-"+(parseInt(d.getMonth())+1)+"-"+d.getDate()+" "+d.getHours()+":"+d.getMinutes();
			var et=f.getFullYear()+"-"+(parseInt(f.getMonth())+1)+"-"+f.getDate()+" "+f.getHours()+":"+f.getMinutes();
			var seconds =  (f- d)/(1000*3600);

			if(Number.isInteger(seconds)){
					 
					  reccr=1;
					openpop(st,et,id,'edit',d.getDay(),f.getDay(),reccr);
					
			}
			else
			{                         
					//alert("asdf");
					//location.href='';
					reccr=1;
					openpop(st,et,id,'edit',d.getDay(),f.getDay(),reccr);
			}
          
       },
       eventDrop: function(event,dayDelta,minuteDelta,allDay,revertFunc) {
                  var id=event.id;
                  var d =new Date(event.start);
                  var f =new Date(event.end);     
                  var st=d.getFullYear()+"-"+(parseInt(d.getMonth())+1)+"-"+d.getDate()+" "+d.getHours()+":"+d.getMinutes();
                  var et=f.getFullYear()+"-"+(parseInt(f.getMonth())+1)+"-"+f.getDate()+" "+f.getHours()+":"+f.getMinutes();
                 
                  reccr=1;
                     openpop(st,et,id,'edit',d.getDay(),f.getDay(),reccr);
                  
                },
       defaultView: 'agendaWeek',
                timeFormat: 'HH:mm',
                timezone:'local',
                ignoreTimezone:false,
                selectOverlap:false,
                slotEventOverlap:false,
                allDaySlot:false,
                axisFormat:'H:mm ',
                slotDuration: '00:30:00',
                editable: false,
                disableDragging:true,
                columnFormat: {
		        month: 'ddd', 
		        week: 'ddd M.D.',
		        day: 'dddd' 
	        },
                firstDay:1,
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		defaultDate: '<?php echo date('Y-m-d');?>',
		selectable: true,
		selectHelper: true,
		select: function(start, end,jsEvent, view) {  
                        var title = "Available";
                        var eventData;
                        if (title) {
                        eventData = {
	                        title: title,
	                        start: start,
	                        end: end,
	                        overlap:false
                        };

                        var d =new Date(start);
                        var f =new Date(end);
                        var st=d.getFullYear()+"-"+(parseInt(d.getMonth())+1)+"-"+d.getDate()+" "+d.getHours()+":"+d.getMinutes();
                        var et=f.getFullYear()+"-"+(parseInt(f.getMonth())+1)+"-"+f.getDate()+" "+f.getHours()+":"+f.getMinutes();
                        var seconds =  (f- d)/(1000*3600);

                        if(Number.isInteger(seconds)){
                              openpop(st,et,'','add',d.getDay(),f.getDay(),'');
                        }else{
                             //alert("nonre"); 
                             openpop(st,et,'','add',d.getDay(),f.getDay(),'');    
                             //location.href='';       
                        }
                                
                          $('#calendar').fullCalendar('renderEvent', eventData, true); 
                                
			}
			 
			},
	        editable: true,
	        eventLimit: true,
          events: [
            <?php if(!empty($events)){ foreach($events as $key=>$ftch){ 
            if($ftch['UserEvent']['booked']=='no'){
            $title='Available';
            $backgroundColor='';
            }else{
            $title='Blocked';
            $backgroundColor='backgroundColor: "red"';
            }
            ?>
            {
              id:'<?php echo $ftch['UserEvent']['unique_id'];?>',
              title: '<?php echo $title;?>',
              start: '<?php echo str_replace(" ", "T", $ftch['UserEvent']['start_time'])?>',
              end: '<?php echo str_replace(" ", "T", $ftch['UserEvent']['end_time'])?>',
              overlap:false,
              <?php echo $backgroundColor;?>
            },
            <?php }}?>
          ]
	});

 });
 
 function addZero(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
 
 function openpop(st,et,id,type,day,dayend,reccr){  

    if(parseInt(reccr)==1)
    {
       $("#check").val("0");
      $('#check').switchify().each(function() {
          
          
          
       }); 

    }
    else if(parseInt(reccr)>1){
       $("#check").val("1");
        $('#check').switchify().each(function() {
          
          
       }); 
    }
    else
    {
            $('#check').switchify().each(function() {
            $(this).data('switch').bind('switch:slide', function(e, type1) {
            if(type1=='on'){
                   
                        

                    $(".ui-switch-upper").css("right","15px")
                    $( this ).find( ".ui-switch-upper" ).css("right","15px")
                    $("#check").val("1");
                }else{
                  
                   $( this ).find( ".ui-switch-upper" ).css("right","20px");
                 
                   $("#check").val("0");  
                }
              });
          });
     }
       
        var weekday=new Array(7);
       
        weekday[0]="Sunday";
        weekday[1]="Monday";
        weekday[2]="Tuesday";
        weekday[3]="Wednesday";
        weekday[4]="Thursday";
        weekday[5]="Friday";
        weekday[6]="Saturday";
	
        
        $("#popp").fadeIn();
        $("#sttm").val(st);
        $("#entm").val(et);
        $("#ev_id").val(id);
        $("#ev_tp").val(type);
        
        
        var splst=st.split(" ")
  
        var splet=et.split(" ")

        var diffstart=splst[1].split(":");
        
        splst[1]=addZero(diffstart[0])+":"+addZero(diffstart[1]);
         var diffend=splet[1].split(":");
        splet[1]=addZero(diffend[0])+":"+addZero(diffend[1])
        
       
          $("#sttm_div").html(weekday[day]+" "+addZero(splst[1])+" - "+weekday[dayend]+" "+addZero(splet[1]));
 
         if(type=='edit' || type=='del'){
             $("#dll_div").show();
            
             $("#sve").val("Save")
             $("#dll").attr('onclick','deleteevent("'+id+'")');
         }else{
            
          $("#sve").val("Save")   
        }  
}

function deleteevent(ID){
      var r = confirm("Want to delete");
        if (r == true) {
            $.ajax({
                    url : '<?php echo($this->webroot)?>users/delcalenderdata?id='+ID,
                    type: "POST",
                    success: function(data)
                    {
                      $("#popp").fadeOut();
                      $('#calendar').fullCalendar('removeEvents',ID);
                    }
            }); 
           
        }                 
}

</script>

<style>
 .fc-view-container{font-family:arial;}
 .fc-center h2{color: #1A85B4;font-family: arial;}
.ui-switch{border:0px !important;}
.fc-time-grid-container{height: auto!important;}
#calendar{margin-top:2%;}
tr{height: 10px;}
.ui-switch:focus{border:none !important;  border-color:#fff !important;}    
.ui-switch-handle{background: url('')!important; background-color: #F2F5F7!important;
    border: 1px solid #D7D9DA;
    border-radius: 100%;
    height: 18px;
    width: 18px;
    position: absolute;
    right: 0;
    top: 0;}
.tb_message{margin-top:0;}

#popp{
	position: fixed; border-radius: 7px; top:60%; width: 30%; height:auto; background-color: #fff;  left: 30%; z-index: 9; 
}
#popp{font-family: Conv_SourceSansPro-Regular;}
#popp h2{margin-top:0px;}

.sign_btn{background: linear-gradient(#b5d14d,#9dbe25) rgba(0,0,0,0) !important;border: 1px solid #9cbd23 !important;color:#fff !important;}
.sign_btn:hover {background: linear-gradient(#A0BC38,#84A50C) rgba(0,0,0,0) !important;}

input[type=button]{
cursor: pointer;
border-radius: 3px;
font-family: arial;
font-size: 18px;
font-weight: 700;
height: 38px;
width: auto;
padding: 0 8px;
margin: 0 5px;
background: #efefef;
border: solid 1px #999999 !important;
color: #3f3f3f;
}

@media only screen and (max-width: 767px) {
    #popp{width:90% !important;left:5% !important;}
    .sign_hld{width:98% !important;float:left}
}
.sign_btn:hover{padding:0 8px !important;}
.fc-slats{height:720px;}
.ui-switch-on,.ui-switch-off{width:93px !important; padding:0 0 0 5px !important; text-align: left!important;}
.ui-switch-middle{width:108px !important;}
</style>
