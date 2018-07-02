 <?php //echo($this->element('profile_header'));?>
 <?php ?>
 <link rel='stylesheet'href='<?php echo($this->webroot)?>css/submit_profile.css' type='text/css' media='all' />
   <div class="body-wrapper">
   <div class="container">
       <div class="row">
          <div class="calendar"></div>
                                
                         



           
       </div>
   </div>
   </div>
   
   <div style="position: fixed; border-radius: 7px;top:35%; width: 500px; height:auto; background-color: #fff;  left: 34%; z-index: 9; display:none;" id="popp">
                           <form name="post_appointment" id="post_appointment" method="post" action="<?php echo $this->webroot;?>users/appointment/<?php echo $aid;?>">
                             <h2 style="padding:2%; background-color:#4FA8FF; color: #fff; border-radius: 7px 7px 0 0;">Appointment</h2>
                             <div style="padding: 3%;">Appointment on : <span id="sttm_div"></span></div>
                             <div id="err_past" style='color:#ff0000;margin-left:15px'></div>
                             <div style="padding: 3%;"><div style="float:left;width:27%;margin-top:9px">Time :</div>
                             <div style="float:left;margin-right:15px" id="select_time"></div>
                             <div style="clear:both"></div>
                             <div style="padding: 2%;"><div style="float:left;width:27%;margin-top:9px">Service :</div>
                             <div style="float:left;margin-right:15px"><select name="data[service]" id="service" style="height:30px;width:200px;font-size:16px;" >
                                     <option value="">Select Service</option>
                                     <?php foreach($selected_services as $key => $selected_services_val) {?>
                                     <option value="<?php echo $key; ?>"><?php echo $selected_services_val; ?></option>
                                     <?php } ?>
                                     
                                 </select>
                             
                             </div></div>
                             
                             
                              <input type="hidden" name="data[aname]" id="aname" value="<?php echo $aname;?>">
                              <input type="hidden" name="data[aid]" id="aid" value="<?php echo $aid;?>">
                              <input type="hidden" name="data[hidid]" id="hidid">
                              <input type="hidden" name="data[hiduserid]" id="hiduserid">
                            </div>
                            <div style="padding: 3%;margin-top: 15px;" ><div style="float:left;width:27%;margin-bottom:15px">Note :</div> <div style="float:left;margin-bottom:15px; width:73%;"><input type="text" name="data[title]" id="title"  class="small_width" ></div></div>
                            <div style="clear:both"></div>
                             <!--<div style="padding: 1% 3%;"><div style="float:left;width:27%;margin-bottom:15px">Description :</div> <div style="float:left;margin-bottom:15px;width:73%;"><textarea style="padding-top:5px; padding-bottom: 5px;" name="data[description]" class="small_width" id="description" ></textarea><div style="clear:both"></div><span id="timeerror"></span></div></div>
                             <div style="clear:both"></div> -->
                               <div style="margin-left:25%; margin-bottom: 3%;margin-right: 3%;">
                                   <div style="float: left; "><input onclick="add_edit();" type="button" value="Save" class="save_button" id="addeditbtn" style="border:none; cursor:pointer; float: none;"><img src="<?php echo $this->webroot;?>images/ajax-loader-new.gif" style="display:none;margin-top:14px" id="horizontal_loading"></div>
                                   <div style="float: right;"><input type="button" onclick="cancelev();" value="Cancel" class="secondary1" style="border:none; cursor:pointer; float: right; margin-right: 7%; margin-top: 0 !important;"></div>
                                    <div style="clear:both;"></div>
                              </div>  
                          </form>                
    </div>
    
    <div style="position: fixed; border-radius: 7px;top:30%; width: 400px; height:auto; background-color: #fff;  left: 40%; z-index: 9; display:none;" id="popperror">
                             <h2 style="padding:2%; background-color:#4FA8FF; color: #fff; border-radius: 7px 7px 0 0;">Sorry</h2>
                             <div style="padding: 3%">Sorry! you can't make appointment on previous dates.</div>
                             <div style="padding: 3%">Please select next available dates for appointment. Thanks.</div>
                             <div style="margin-left:3%; margin-bottom: 3%;">
                                   <div class="save_button_new" style="float: right; width:45%;"><input type="button" onclick="canceleverror();" value="Close" class="save_button" style="border:none; cursor:pointer; float: right; margin-right: 7%;"></div>
                                    <div style="clear:both;"></div>
                              </div>                  
    </div>
    
    <div style="position: absolute; border-radius: 7px; border:1px solid #000;top:45%; width: auto; height:auto;left: 48%; z-index: 9; display:none; background-color: #fff; " id="poppspinner">
          <img src="<?php echo $this->webroot;?>images/big-spinner.gif" style="margin:0 auto">  
    </div>
   
   <style>
    .select_box{font-size:15px!important; padding: 8px 5px;}
    .ui-switch{border:none!important;}
    .tb_message{float:right!important; width: auto!important; margin-left:10px;}.step1_submit{height:auto!important;}</style>

<script src="<?php echo($this->webroot)?>js/jquery.min.js" type="text/javascript"></script>


<link href='<?php echo($this->webroot)?>js/fullcalendar.css' rel='stylesheet' />
<link href='<?php echo($this->webroot)?>js/jquery.switch.css' rel='stylesheet' />

<script src='<?php echo($this->webroot)?>js/lib/moment.min.js'  ></script>

<script src='<?php echo($this->webroot)?>js/fullcalendar.js' ></script>
<script>
function includeZero(time){
        if(parseInt(time)<10){
         time="0"+time;   
        }else{
            time=time;
        }
        return(time);
        
    }
function openpop(st,et,day,s_t,id,user_id){
        var weekday=new Array(7);
       <?php
 if(1==1){?>
        weekday[0]="Sunday";
        weekday[1]="Monday";
        weekday[2]="Tuesday";
        weekday[3]="Wednesday";
        weekday[4]="Thursday";
        weekday[5]="Friday";
        weekday[6]="Saturday";
	<?php	}else{?>
		
		
        weekday[0]="Sonntag";
        weekday[1]="Montag";
        weekday[2]="Dienstag";
        weekday[3]="Mittwoch";
        weekday[4]="Donnerstag";
        weekday[5]="Freitag";
        weekday[6]="Samstag";
	<?php 	}?>
        
        
        var dts=new Date(s_t);
                 

        var newst=includeZero(parseInt(dts.getMonth())+1)+"."+includeZero(dts.getDate())+"."+dts.getFullYear();
        //alert(newst)
        $("#popp").fadeIn();
        $('#hiduserid').val(user_id);
        $('#hidid').val(id);
        $("#sttm_div").html(weekday[day]+' '+newst  );
}

function getval(val)
{
 var weekday=new Array(7);
 
 <?php
 if(1==1){?>
        weekday[0]="Sunday";
        weekday[1]="Monday";
        weekday[2]="Tuesday";
        weekday[3]="Wednesday";
        weekday[4]="Thursday";
        weekday[5]="Friday";
        weekday[6]="Saturday";
	<?php	}else{?>
		
		
        weekday[0]="Sonntag";
        weekday[1]="Montag";
        weekday[2]="Dienstag";
        weekday[3]="Mittwoch";
        weekday[4]="Donnerstag";
        weekday[5]="Freitag";
        weekday[6]="Samstag";
	<?php 	}?>
		
		
		
    
 var val_split=val.split("@");
 var dts=new Date(val_split[0]);
 var newst=includeZero(parseInt(dts.getMonth())+1)+"."+includeZero(dts.getDate())+"."+dts.getFullYear();
 $("#sttm_div").html(weekday[dts.getDay()]+' '+newst);
}

function add_edit()
{
   var start_time=$('#appo_time').val();
   var title=$('#title').val();
   var description=$('#description').val();
   var service=$('#service').val();
   if(start_time=='')
   {
   }
   else
   {
   }
   /*if(title == ''){
   alert('Please enter title');
   return false;
   }*/
   if(description == ''){
   alert('Please enter description');
   return false;
   }
   if(service == ''){
   alert('Please Select a service');
   return false;
   }
   if(start_time!='')
   {
		$('#addeditbtn').hide();
		$('#horizontal_loading').show();
		$('#post_appointment').submit();
       /*$.ajax({
	            url : "<?php echo($this->webroot)?>users/check_past_time",
	            type: "POST",
	            data:{'datetm':start_time},
	            success: function(data)
	            {
                        if(data.trim()==1){
                             $("#err_past").html("");
                             $('#addeditbtn').hide();
                             $('#horizontal_loading').show();
                             var event_id=$('#hidid').val();
                             $.post('<?php echo($this->webroot);?>users/check_aval_time/'+start_time+'/'+event_id, function(data){
                                if(data=='available')
                                {
                                  $('#addeditbtn').hide();
                                  $('#horizontal_loading').show();
                                  $('#post_appointment').submit();
                                }
                                else
                                {
                                  $('#horizontal_loading').hide();
                                  $('#timeerror').html("<font color='#ff0000'>aabbcc</font>");
                                  $('#addeditbtn').show();         
                                }
                             });
                        }else{
                            $("#err_past").html("Schedule time not valid.");
                        }
                    }
       })
       
       
       var event_id=$('#hidid').val();
                             $.post('<?php echo($this->webroot);?>users/check_aval_time/'+start_time+'/'+event_id, function(data){
                                if(data=='available')
                                {
                                  $('#addeditbtn').hide();
                                  $('#horizontal_loading').show();
                                  $('#post_appointment').submit();
                                }
                                else
                                {
                                  $('#horizontal_loading').hide();
                                  $('#timeerror').html("<font color='#ff0000'>aabbcc</font>");
                                  $('#addeditbtn').show();         
                                }
                             });*/
  }
}



function cancelev()
{ 
   $("#err_past").html("");
   $('#hiduserid').val('');
   $('#hidid').val('');
   $("#sttm_div").html('');
   $('#appo_time').val('');
   $('#title').val('');
   $('#description').val('');
   $('#horizontal_loading').hide();
   $('#addeditbtn').show();
   $('#timeerror').html('');
   $('#select_time').html('');
   $('#start_time').css({'border':'1px solid #737c85'});
   $('#end_time').css({'border':'1px solid #737c85'});
   $('#title').css({'border':'1px solid #737c85'});
   $('#description').css({'border':'1px solid #737c85'});
   $("#popp").fadeOut();
   
}  
function canceleverror()
{ 
  $("#popperror").fadeOut();
}   
var logic =''; 
 $(document).ready(function(){
   $('.calendar').fullCalendar({
   		
       eventResize: function(event, delta, revertFunc) {   
       },eventClick: function(calEvent, jsEvent, view) {
          if(calEvent.title!="Booked"){
           $("#err_past").html("");
           $('#poppspinner').show();
           $("#popperror").fadeOut();
           $("#popp").fadeOut();
           $('#hiduserid').val('');
           $('#hidid').val('');
           $("#sttm_div").html('');
           $('#appo_time').val('');
           $('#title').val('');
           $('#description').val('');
           $('#horizontal_loading').hide();
           $('#addeditbtn').show();
           $('#timeerror').html('');
           $('#select_time').html('');
           $('#start_time').css({'border':'1px solid #737c85'});
           $('#end_time').css({'border':'1px solid #737c85'});
           $('#title').css({'border':'1px solid #737c85'});
           $('#description').css({'border':'1px solid #737c85'});
        
           var id=calEvent.id;
           var row_id=calEvent.row_id;
           var d =new Date(calEvent.start);
           var f =new Date(calEvent.end);
           var st=d.getFullYear()+"-"+(parseInt(d.getMonth())+1)+"-"+d.getDate()+" "+f.getHours()+":"+f.getMinutes();
           var et=f.getFullYear()+"-"+(parseInt(f.getMonth())+1)+"-"+f.getDate()+" "+f.getHours()+":"+f.getMinutes();
           var s_t=d.getFullYear()+"-"+includeZero((parseInt(d.getMonth())+1))+"-"+includeZero(d.getDate());
           var s_t_chk=d.getFullYear()+"-"+includeZero((parseInt(d.getMonth())+1))+"-"+includeZero(d.getDate())+"@"+includeZero(f.getHours())+":"+includeZero(f.getMinutes());
		   
		   var e_t_chk=f.getFullYear()+"-"+includeZero((parseInt(f.getMonth())+1))+"-"+includeZero(f.getDate())+"@"+includeZero(f.getHours())+":"+includeZero(f.getMinutes());
           
           
            $.ajax({
	            url : "<?php echo($this->webroot)?>users/check_appointment_date",
	            type: "POST",
	            data:{'datetm':e_t_chk},
	            success: function(data)
	            {
		       if(data=='yes'){
		   $('#poppspinner').hide();
		   $("#popperror").fadeIn();
		} else {
		   $.post('<?php echo($this->webroot);?>users/get_appointment_time/'+row_id+'/'+s_t, function(data){
		       var obj = $.parseJSON(data);
		       $('#select_time').html(obj.dropdown);
		       
		       $('#poppspinner').hide();
		       openpop(st,et,d.getDay(),s_t,obj.id,obj.user_id);
		   });
		}
	            }
	       }); 
           
           
         } 
       },
       defaultView: 'agendaWeek',
                     timezone:'local',
                     selectOverlap:false,
                     slotEventOverlap:false,
                     allDaySlot:false,
                     axisFormat:'H:mm ',
                     slotDuration: '00:30:00',
                     editable: false,
                     timeFormat: 'HH:mm',
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
		scrollTime: "00:00",
		defaultDate: '<?php echo date('Y-m-d');?>',
		selectable: false,
		selectHelper: true,
	        editable: false,
	        eventLimit: true,
	        events: [
                <?php if(!empty($events)){foreach($events as $key=>$ftch){
                 if($ftch['UserEvent']['booked']=='no'){
                   $title='Available';
                   $backgroundColor='';
                 }
                 else
                 {
                  $title='Blocked';
                  $backgroundColor='backgroundColor: "red"';
                 }
                ?>
		        {
                                id:'<?php echo $ftch['UserEvent']['unique_id'];?>',
                                row_id:'<?php echo $ftch['UserEvent']['id'];?>',
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
 



</script>
<style>
.fc-time-grid-container{height: auto!important;}
#calendar{margin-top:2%;}
tr{height: 10px;}
.ui-switch:focus{border:none!important;  border-color:#fff!important;}    
.ui-switch-handle{background: url('')!important; background-color: #F2F5F7!important;
    border: 1px solid #D7D9DA;
    border-radius: 100%;
    height: 18px;
     width: 18px;
    position: absolute;
    right: 0;
    top: 0;}
    
  @media only screen and (min-width: 768px) and (max-width: 1035px) {
    	#popp,#popperror{width:60% !important;left:20% !important;}
    }
    @media only screen and (max-width: 767px) {
    	#popp,#popperror{width:92% !important;left:4% !important;top:10% !important}
    	
    	#popperror .save_button_new{margin-right:10px !important}
    }   
    .small_width{border: 1px solid #a0a0a0 ;
    border-radius: 4px;
    color: #000;
    float: left;
    font-family: Conv_SourceSansPro-Regular;
    font-size: 15px;
    height: 42px;
    padding: 0;
	padding: 0 3% !important;
    width: 94%;}
.small_width:focus{border: 1px solid rgba(71, 165, 182, 1);
    box-shadow: 0 0 5px rgba(71, 165, 182, 1);
    color: #000;
    margin: 0;
    padding: 0;}
    .calendar{background:#fff !important;}
    
    
    .save_button {
    background: linear-gradient(#B5D14D, #9DBE25) repeat scroll 0% 0% transparent;
    border: 1px solid #9CBD23;
    border-radius: 3px;
    color: #FFF;
    float: right;
    font-family: arial;
    font-size: 18px;
    font-weight: 700;
    height: 34px;
    line-height: 34px;
    margin: 5px 0px;
    padding: 0px 25px;
    width: auto;
}
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

</style>
