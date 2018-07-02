<?php
	//pr($userlist); exit;
 ?>

<section id="contentsection">
<div id="wait-div" class="wait-div">
  <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
    Please wait    ....</span> </span> </div>
</div>

<div class="col-left">
<link href="http://107.170.152.166/team2/escort/css/new-tab.css" rel="stylesheet">
<script src="http://107.170.152.166/team2/escort/js/new-tab2.js" type="text/javascript"></script>
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
                                                    <?php echo $this->element('parlor_sidebar'); ?>
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
    <!-- <li data-link="tab2" id="tab2" class="z-tab"><a class="z-link">Outbox</a></li> -->
    <li data-link="tab3" id="tab3" class="z-tab"><a class="z-link">Compose</a></li>
</ul>

<div class="h-content2 z-container" style="min-height: 442px;">
    <!-- Tab1 -->
    <div class="z-content"><div class="z-content-inner">
		 <form action="#" method="post" accept-charset="utf-8" class="" id="myformmessageoutbox">
		 <input type="hidden" name="from_id" value="<?php echo $this->Session->read('fuid');?>">      
		 	<span id="input_hidden_fields"></span>
         <div class="select-filters-sort">
                          <div class="selectaa">
                            <h4>Inbox</h4>
                            <!-- <ul>
                              <li><a class="select-all disabled" onclick="checkUncheckAllInbox('check')" href="#">All</a></li>
                              <li><a class="select-none disabled" onclick="checkUncheckAllInbox('uncheck')" href="#">None</a></li>
                            </ul> -->
                          </div>
                          <!-- <section class="cate"> <a onclick="doTask('delete')" href="#">Delete</a> <a onclick="doTask('read')" href="#">Mark Read</a> <a onclick="doTask('unread')" href="#">Mark Unread</a>
                            <section class="clr"></section>
                          </section> -->
                          <section class="clr"></section>
                        </div>
                 <div class="table-responsive for-msg">
							<table class="table table-vcenter">
								
							<?php if(!empty($messagelist)){ ?>
							<thead>
												<tr>
												<td>Sl No#</td>
												<td>Title</td>
												<td>Message</td>
												<td>Action</td>
												</tr>
												</thead>
								<tbody>
											<?php
											$count = 1;	
											foreach ($messagelist as $showuser) {
											?>
												<tr>
												<td><?php echo $count; ?></td>
												<td><?php echo $showuser['Message']['title']; ?></td>
												<td><?php echo $showuser['Message']['message']; ?></td>
												<!-- <td><a href="<?php echo $this->Html->url('/');?>escorts/messagedetails/<?php echo base64_encode($showuser['Message']['id']); ?>"><i class="fa fa-eye" aria-hidden="true"></i>
</a></td>
												</tr> -->

												<td><!-- <a class="btn btn-primary" href="<?php echo $this->Html->url('/');?>escorts/messagedetails/<?php echo base64_encode($showuser['Message']['id']); ?>">View
												</a> --> &nbsp; &nbsp;
												<?php echo $this->Form->postLink(__('Delete'), array('action' => 'deletemessage', $showuser['Message']['id']),array("class"=>"btn btn-danger"), __('Are you sure you want to Delete?')); ?>
												</td>
												<?php 
												$count++;
												} 
												?>
											</tbody>

							<?php }else{ ?>

							 <div class="no-record" id="nomsg_show" >No Message Found In Your Inbox</div>
							<?php					
											}
											?>

							
							</table>
                        </div>
				</div>
				</form>	</div>
	<!-- Tab1 End -->
	<!-- Tab2 -->
    <!-- <div class="z-content"><div class="z-content-inner">
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
			</form>	</div> -->
    <!-- Tab2 End-->
    <!-- Tab3 -->
					<div class="z-content">
					<div class="z-content-inner">
					<div class="tom1  for-msg">
					<form id="msg_form" method="post" action="<?php echo $this->webroot?>parlors/send_msg">
						<input type="hidden" name="from_id" value="<?php echo $this->Session->read('flogin'); ?>">
						<div class="smart-forms">
						<div class="ajax_report notification spacer-t5 form-msg "> <a class="close-btn" onClick="close_div();" href="#;">×</a> <span class="ajax_message">Hello Message</span> </div>
						</div>  
						<section class="t1 t1-t">
						<label for="label" style="color:#000 !important;">To: <span>*</span></label>
						<select name="to_id" style="width:100%;" required>
						<option value="">Select Recipient</option>
						<?php 	
						foreach ($userlist as $showusers) {
						?>
						<option value="<?php echo $showusers['User']['id']?>"><?php echo $showusers['User']['name']?></option>
						<?php			
						}
						?>
						</select>
						<section class="clr"></section>
                                                </section>
						<section class="t1 t1-t">
						<label for="label" style="color:#000 !important;">Title: <span>*</span></label>
						<input type="text" value="" name="title">
						<section class="clr"></section>
						</section>

						<section class="t1 t1-t">
						<label for="label" style="color:#000 !important;">Subject: <span>*</span></label>
						<textarea name="message" name="message" required></textarea>
						<section class="clr"></section>
						</section>



						<section class="t1 t1-t">
						<label for="label" class="blank" style="color:#000 !important;">&nbsp;</label>
						<section class="tbut">
						<!-- <input type="submit" value="Send" id="button" name="button" class="buttonGrey"> -->

						<input class="btn btn-primary" type="submit" value="SEND"/>
						</section>
						<section class="clr"></section>
						</section>
						</form>                                    
					</div>	
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

