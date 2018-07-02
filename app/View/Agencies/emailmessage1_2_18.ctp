<section id="contentsection">
<div id="wait-div" class="wait-div">
  <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
    Please wait    ....</span> </span> </div>
</div>

<div class="col-left">

<script>
	  var task = '';
	  if(task == 'Yes')
		var showTab = 'tab3';
		else
		var showTab = 'tab1';
        jQuery(document).ready(function ($) {
            /* jQuery activation and setting options for the tabs including defaultTab*/
            jQuery("#nav-tabzoo").zozoTabs({
                theme: "silver",
                position: "top-left",
                defaultTab: showTab
                
            });
        });
    </script>
<script type="text/javascript">
function checkUncheckAllInbox(task)
{
	if(task=='check')
    $(".inboxcheckbox").attr('checked', 'checked');
	else if(task=='uncheck')
    $(".inboxcheckbox").removeAttr('checked', 'checked');
}
</script>
<script type="text/javascript">
function checkUncheckAllOutbox(task)
{
	if(task=='check')
    $(".outboxcheckbox").attr('checked', 'checked');
	else if(task=='uncheck')
    $(".outboxcheckbox").removeAttr('checked', 'checked');
}
</script>
<script type="text/javascript">
function doTask(task)
{
	$('#input_hidden_fields').html('');
	$('#input_hidden_fields').html('<input type="hidden" name="task" value="'+task+'"/>');
	var len = $("[class='inboxcheckbox']:checked").length;
	if(len>0)
	{
		$('#myformmessage').submit();
		$(".inboxcheckbox").removeAttr('checked', 'checked');
	}
	else
	BootstrapDialog.alert('Please select message');
}
function showdiv(id)
{
	$("#show_"+id).toggle('slow');
	$.get( "messages/read?msg_id="+id, function(data) {
			
				$("#unreadmsg").text(data.unrd_msg);
				$(".row_"+id).addClass('read');
				$(".row_"+id).removeClass('unread');
				 });
}
function closeDiv(divId)
{
		if(divId!=null){
			jQuery('#show_'+divId).slideUp('slow');
		}
		
}
</script>
<script type="text/javascript">
function doTaskOutbox(task)
{
	$('#input_hidden_fieldsoutbox').html('');
	$('#input_hidden_fieldsoutbox').html('<input type="hidden" name="task" value="'+task+'"/>');
	
	var lenoutbox = $("[class='outboxcheckbox']:checked").length;
	if(lenoutbox>0){
	$('#myformmessageoutbox').submit();
	$(".outboxcheckbox").removeAttr('checked', 'checked');}
	else
	BootstrapDialog.alert('Please select message');
	
}
</script>
<script type="text/javascript"> 
$(document).ready(function() {
$("#myformmessage").submit(function(event){
var posturl=$(this).attr('action');
$(this).ajaxSubmit({
				url: posturl,
				dataType: 'json',
				beforeSend: function(){
				 //$("input[type=submit]").attr("disabled", "disabled");
				 $('#wait-div').show();
				},
				success: function(response){
					$("input[type=submit]").removeAttr("disabled");
					 $('#wait-div').hide();
					if(response.success)
					 {
						$("#unreadmsg").text(response.unrd_msg);
						 if(response.task=='delete')
						 {
							 var inbox_size = $("#countp").text();
							
						 	$.each(response.ids, function( key, value ) {
							$("#row_"+value).fadeOut(300);
							
							$("#countp").text(inbox_size-1);
							if(inbox_size-1==0)
							$("#nomsg_show").slideDown(800);
							 });
						 }
						 else if(response.task=='read')
						 {
						     
							$.each(response.ids, function( key, value ) {
							$(".row_"+value).addClass('read');
							$(".row_"+value).removeClass('unread');
							 });
						 }
						 else if(response.task=='unread')
						 {
						 	
							$.each(response.ids, function( key, value ) {
							$(".row_"+value).addClass('unread');
							$(".row_"+value).removeClass('read');
							 });
						 }
							
							if(response.resetform)
							$(".formclass").resetForm();
					 }
					 else
					 {
							
					 }
				},
				error:function(response){alert( 'Connection error')}
			});
return false;
});



$("#myformmessageoutbox").submit(function(event){
var posturl=$(this).attr('action');
$(this).ajaxSubmit({
				url: posturl,
				dataType: 'json',
				beforeSend: function(){
				 //$("input[type=submit]").attr("disabled", "disabled");
				 $('#wait-div').show();
				},
				success: function(response){
					$("input[type=submit]").removeAttr("disabled");
					 $('#wait-div').hide();
					if(response.success)
					 {
						 if(response.task=='delete')
						 {
							var outbox_size = $("#countout").text();
							 
							 $.each(response.ids, function( key, value ) {
							 $("#row_"+value).fadeOut(300);
						
							$("#countout").text(outbox_size-1);
							if(outbox_size-1==0)
							$("#nooutmsg_show").slideDown(800);
							 });
						 }
						 else if(response.task=='read')
						 {
						 	$.each(response.ids, function( key, value ) {
							$(".row_"+value).addClass('read');
							$(".row_"+value).removeClass('unread');
							 });
						 }
						 else if(response.task=='unread')
						 {
						 	$.each(response.ids, function( key, value ) {
							$(".row_"+value).addClass('unread');
							$(".row_"+value).removeClass('read');
							 });
						 }
							
							if(response.resetform)
							$(".formclass").resetForm();
					 }
					 else
					 {
							
					 }
				},
				error:function(response){alert( 'Connection error')}
			});
return false;
});

return false;
});	

function showSelected(member_id)
{	
    $("#selected_"+member_id).attr('selected', 'selected');
}
</script>
<style>
.unread {
background: none repeat scroll 0 0 #FDF6CA;
}
.read {
background: none repeat scroll 0 0 #F9F9F9;
}
</style>
<section id="wrapper">
<section id="middle">
<section id="middle-inner">

 <section class="all-pins-do">
<div class="my-account-inner"><div class="sb-toggle-right navbar-right">
				<div class="navicon-line"></div>
				<div class="navicon-line"></div>
				<div class="navicon-line"></div>
			</div>
 <div class="left-my-account-menu-m">
                                                <div class="triangleBottomRight firstItem"></div>
                                                <style>
                                                    .unreadCount {
                                                        background: linear-gradient(to bottom, #fdf6ca 0%, #fdf6ca 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
                                                        border-radius: 50%;
                                                        color: #620c29;
                                                        display: inline-block;
                                                        font-family: arial;
                                                        font-size: 12px;
                                                        font-weight: bold;
                                                        height: 20px;
                                                        line-height: 20px;
                                                        text-align: center;
                                                        width: 20px;
                                                        vertical-align:sub;
                                                    }
                                                </style>
                                                <a style="display:none;" href="#;" class="website_activate"></a>
                                                    <?php echo $this->element('agent_sidebar'); ?>
                                                <div class="triangleBottomleft firstItem"></div>
                                            </div>
<div class="right-my-account">
<div class="right-my-account-blocks">
<div class="detail-heading">
    <section class="title-left">
            <h1 style="display:inline-block;">Email Messages</h1>
            
          </section>
                   
          
   
          
          <div class="clr"></div>
          </div>
           
       
          <div class="right-my-account-blocks-inner">
          
            <section class="f-section f-whiteSmoke f-border-top  f-bottom-100" id="section-autoplay">
   <div class="f-content container autoplay">
       
                <div id="nav-tabzoo" >

				<ul class="z-tabs-nav z-tabs-mobile" style="display: none;">
				<li><a style="text-align: left;" class="z-link">
                <span class="z-title">tab3</span><span class="z-arrow"></span></a></li></ul>
                <i class="z-dropdown-arrow"></i><ul class="z-tabs-nav z-tabs-desktop">
    <li data-link="tab1" id="tab1" class="z-tab"><a class="z-link">Inbox</a></li>
    <li data-link="tab2" id="tab2" class="z-tab"><a class="z-link">Outbox</a></li>
    <li data-link="tab3" id="tab3" class="z-tab"><a class="z-link">Compose</a></li>
</ul>

<div class="h-content2 z-container" style="min-height: 442px;">
    <!-- Tab1 -->
    <div class="z-content"><div class="z-content-inner">
		 <form action="#" method="post" accept-charset="utf-8" class="" id="myformmessage">         <span id="input_hidden_fields"></span>
         <div class="select-filters-sort">
                          <div class="selectaa">
                            <h4>Select:</h4>
                            <ul>
                              <li><a class="select-all disabled" onclick="checkUncheckAllInbox('check')" href="#">All</a></li>
                              <li><a class="select-none disabled" onclick="checkUncheckAllInbox('uncheck')" href="#">None</a></li>
                            </ul>
                          </div>
                          <section class="cate"> <a onclick="doTask('delete')" href="#">Delete</a> <a onclick="doTask('read')" href="#">Mark Read</a> <a onclick="doTask('unread')" href="#">Mark Unread</a>
                            <section class="clr"></section>
                          </section>
                          <section class="clr"></section>
                        </div>
                 <div class="table-responsive for-msg">
                            <table class="table table-vcenter">
                                <tbody>
									<span id="countp" style="display:none">
								  0								  </span>
									                                    </tbody>
                                    <div class="no-record" id="nomsg_show" >No Message Found In Your Inbox</div>
                            </table>
                        </div>
				</div>
				</form>	</div>
	<!-- Tab1 End -->
	<!-- Tab2 -->
    <div class="z-content"><div class="z-content-inner">
                <form action="#" method="post" accept-charset="utf-8" class="" id="myformmessageoutbox">											
				  <span id="input_hidden_fieldsoutbox"></span>
				   <div class="select-filters-sort">
                          <div class="selectaa">
                            <h4>Select:</h4>
                            <ul>
                              <li><a class="select-all disabled" onclick="#" href="#">All</a></li>
                              <li><a class="select-none disabled" onclick="#" href="#">None</a></li>
                            </ul>
                          </div>
                          <section class="cate"> <a onclick="doTaskOutbox('delete')" href="#">Delete</a> 
                            <section class="clr"></section>
                          </section>
                          <section class="clr"></section>
                        </div>
				<div class="table-responsive for-msg">
                            <table class="table table-vcenter table-striped">
                                <tbody>
									 <span id="countout" style="display:none">
									  0									  </span>
									                                    </tbody>
                                    <div class="no-record" id="nooutmsg_show" >No Message Found In Your Outbox</div>
                            </table>
                        </div>
				</div>
			</form>	</div>
    <!-- Tab2 End-->
    <!-- Tab3 -->
    <div class="z-content"><div class="z-content-inner">
                            		<div class="tom1  for-msg">
                                     <form action="#" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui">									<div class="smart-forms">
									<div class="ajax_report notification spacer-t5 form-msg "> <a class="close-btn" onClick="close_div();" href="#;">�</a> <span class="ajax_message">Hello Message</span> </div>
									</div>  
										<section class="t1 t1-t">
											<label for="label">To: <span>*</span></label>
												<select name="to_member_id" style="width:100%;">
												<option value="">Select Recipient</option>
																								</select>
											<section class="clr">
										</section>

										  <section class="t1 t1-t">
												<label for="label">From: <span>*</span></label>
												<input type="hidden" value="nits.karunadri@gmail.com" name="from_email" readonly >
												<input type="text" value="kar123" name="username" readonly>
												<section class="clr"></section>
										  </section>
										  
										  <section class="t1 t1-t">
											<label for="label">Subject: <span>*</span></label>
											<input type="text" value="" name="subject">
											<section class="clr"></section>
										  </section>
										  
										  <section class="t1 t1-t">
											<label for="label">Message: <span>*</span></label>
											<textarea name="message" class="inputtext" id="message" placeholder="Type your message..."></textarea>
											<section class="clr"></section>
										  </section>
										  
										  <section class="t1 t1-t">
											<label for="label" class="blank">&nbsp;</label>
											<section class="tbut">
												<input type="submit" value="Send" id="button" name="button" class="buttonGrey">
											</section>
											<section class="clr"></section>
										  </section>
										  </form>                                    </div>	
			</div>
    </div>
    <!-- Tab3 End-->
</div></div>
        

           </div>
</section>
          
          
                       
           
        
                <div class="clr"></div>
                </div>
</div>


 <div class="clr"></div>
</div>
 <div class="clr"></div>
</div>
 </section>
 <!--<div id="promo-bottom">
 
 </div>-->
</section>
</section>
</section>
</div>

    <div class="col-right">
        <section id="banners">
            <a class="banner200x333 promo" href="javascript:void(0)"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x333 promo" href="javascript:void(0)"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x200 promo" href="javascript:void(0)"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
        </section>
    </div>
</section>
<div class="clr"></div>