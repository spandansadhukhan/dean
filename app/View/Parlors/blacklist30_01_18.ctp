<?php
	//pr($user); exit;
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

				<a style="display:none;" href="#;" class="website_activate"></a>
				<?php echo $this->element('parlor_sidebar'); ?>
				<div class="triangleBottomleft firstItem"></div>
				</div>
<div class="right-my-account">
<div class="right-my-account-blocks">
<div class="detail-heading">
    <section class="title-left">
            <h1 style="display:inline-block;">Blacklist Customers</h1>
            
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
    <li data-link="tab1" id="tab1" class="z-tab"><a class="z-link">Blacklist</a></li>
    <!-- <li data-link="tab2" id="tab2" class="z-tab"><a class="z-link">Outbox</a></li> -->
    <li data-link="tab3" id="tab3" class="z-tab"><a class="z-link">Add to Blacklist</a></li>
</ul>

<div class="h-content2 z-container" style="min-height: 442px;">
    <!-- Tab1 -->
    <div class="z-content"><div class="z-content-inner">
		 <form action="#" method="post" accept-charset="utf-8" class="" id="myformmessageoutbox">
		 <input type="hidden" name="from_id" value="<?php echo $this->Session->read('fuid');?>">      
		 	<span id="input_hidden_fields"></span>
         <div class="select-filters-sort">
                          <div class="selectaa">
                            <h4>Blacklist</h4>
                            <!-- <ul>
                              <li><a class="select-all disabled" onclick="checkUncheckAllBlacklist('check')" href="#">All</a></li>
                              <li><a class="select-none disabled" onclick="checkUncheckAllBlacklist('uncheck')" href="#">None</a></li>
                            </ul> -->
                          </div>
                          <!-- <section class="cate"> <a onclick="doTask('delete')" href="#">Delete</a> <a onclick="doTask('read')" href="#">Mark Read</a> <a onclick="doTask('unread')" href="#">Mark Unread</a>
                            <section class="clr"></section>
                          </section> -->
                          <section class="clr"></section>
                        </div>
                 <div class="table-responsive for-msg">
							<table class="table table-vcenter">
								
							<?php if(!empty($user2)){ ?>
							<thead>
												<tr>
												<td>Sl No#</td>
												<td>Image</td>
												<td>Name</td>
												<td>Email</td>
												<td>Action</td>
												</tr>
												</thead>
								<tbody>
											<?php
											$count = 1;	
											foreach ($user2 as $showuser) {
											?>
												<tr>
												<td><?php echo $count; ?></td>
												<td><?php if($showuser['User']['profile_image'] != ''){ ?>
													<img src="<?php echo $this->webroot?>user_images/<?php echo $showuser['User']['profile_image']; ?>" width="50px" height="50px"/>
													<?php }else{ ?>
												<img src="<?php echo $this->webroot?>noimage.png" width="50px" height="50px"/>
															
													<?php } ?>
												</td>
												<td><?php echo $showuser['User']['name']; ?></td>
												<td><?php echo $showuser['User']['email']; ?></td>
												<td><a href="javascript:void(0);" class="btn btn-primary"><i class="fa fa-delete"></i></a></td>
												</tr>
												<?php 
												$count++;
												} 
												?>
											</tbody>

							<?php }else{ ?>

							 <div class="no-record" id="nomsg_show" >No Blacklisted User In you List</div>
							<?php					
											}
											?>

							
							</table>
                        </div>
				</div>
				</form>	</div>
	
					<div class="z-content">
					<div class="z-content-inner">
					<div class="tom1  for-msg">
					<form id="msg_form" method="post" action="<?php echo $this->webroot?>parlors/add_to_blacklist">
						<input type="hidden" name="from_id" value="<?php echo $this->Session->read('fuid'); ?>">
						<div class="smart-forms">
						<div class="ajax_report notification spacer-t5 form-msg "> <a class="close-btn" onClick="close_div();" href="#;">×</a> <span class="ajax_message">Hello Message</span> </div>
						</div>  
						<section class="t1 t1-t">
						<label for="label" style="color:#000 !important;">To: <span>*</span></label>
						<select name="to_id[]" style="width:100%;" multiple="multiple" required>
						<option value="">Select Recipient</option>
						<?php 	
						foreach ($userotherlists as $showusers) {
						?>
						<option value="<?php echo $showusers['User']['id']?>"><?php echo $showusers['User']['name']?></option>
						<?php			
						}
						?>
						</select>
						<section class="clr">
						</section>
                                                </section>


						<section class="t1 t1-t">
						<label for="label" class="blank" style="color:#000 !important;">&nbsp;</label>
						<section class="tbut">
						<!-- <input type="submit" value="Send" id="button" name="button" class="buttonGrey"> -->

						<input class="btn btn-primary" type="submit" value="Blacklist"/>
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

