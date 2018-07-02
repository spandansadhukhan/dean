<section id="contentsection">
<div id="wait-div" class="wait-div">
  <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
    Please wait    ....</span> </span> </div>
</div>

<div class="col-left">
<script type="text/javascript">
function showMoreDetail(id)
{
	$("#more_section_"+id).fadeToggle(300);
}
</script>
<script type="text/javascript">
$(document).ready(function(){
	$('.vbox-item').venobox({
        framewidth: '60%',        // default: ''
        frameheight: '300px',       // default: ''
       // default: '#fff'
        titleattr: 'data-title',    // default: 'title'
        numeratio: true,            // default: false
        infinigall: true            // default: false
    });
});

</script>
<style>
.more_section {
	background: linear-gradient(to bottom, #FFFFFF 0%, #F6F6F6 47%, #EDEDED 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
	border: 1px solid #DFDFDF;
	border-radius: 3px;
	padding: 10px;
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
                                                <a style="display:none;" href="javascript:;" class="website_activate"></a>
                                                    <?php echo $this->element('escort_sidebar'); ?>
                                                <div class="triangleBottomleft firstItem"></div>
                                            </div>
          <div class="right-my-account">
<div class="right-my-account-blocks">
<div class="detail-heading">
    <section class="title-left">
             
   
            <h1 style="display:inline-block;">My Follower</h1>
            
          </section>
                   
            <div class="clr"></div>
          </div>
           
   
              
               <!-- <div class="right-my-account-blocks-inner">
                <div class="table-responsive for-msg">
                  <table class="table table-vcenter table-striped">
                    <thead>
                      <tr>
                        <th>Escort Name</th>
                        <th>Escort Photo</th>
                        <th>Type</th>
                        <th style="width:120px;">Action Taken</th>
                        <th>Updated On</th>
                        <th>Details</th>
                      </tr>
                    </thead>
                    <tbody>
                                            
						 
					
                      </tbody>
                  </table>						<div class="no-record" >No Followers Updates</div>
						</div>
					                  <div class="clr"></div>
         

</div> -->
<div class="right-my-account">
                                <div class="right-my-account-blocks">
                                    
                                        <div class="smart-forms">
                                        <div  class="notification alert-success spacer-t10" id="success" style="display:none"></div>                        
                                    </div>
                                    <div class="right-my-account-blocks-inner">
                                        <!-- <div class="smart-forms">
                                        <div  class="notification alert-success spacer-t10" id="success" style="display:none"></div>                        
                                        </div>
                                        <div class="no-record">No Record Found</div>         -->
                                            <?php
                                            //pr($loginuser); exit;

                                            if(!empty($following)){
                                            ?>
                                            <table class="table">
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
                                            //pr($following); exit;
                                            foreach ($following as $showuser) {
                                            ?>
                                                <tr>
                                                <td><?php echo $count; ?></td>
                                                <td>
                                                <a href="javascript:void(0);"> 
                                                <?php if($showuser['User']['profile_image'] != ''){ ?> 
                                                <img src="<?php echo $this->webroot; ?>user_images/<?php echo $showuser['User']['profile_image']; ?>" height="50px" width="50px"> 
                                                <?php }else{ ?>
                                                <img src="<?php echo $this->webroot; ?>noimage.png" height="50px" width="50px"> 
                                                <?php } ?>
                                                </a>
                                                </td>
                                                <td><?php echo $showuser['User']['name']; ?></td>
                                                <td><?php echo $showuser['User']['email']; ?></td>
                                                
                                                <td>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'unfollow', $showuser['Follow']['id']),array("class"=>"btn btn-danger"), __('Are you sure you want to unfollow?')); ?>
                </td>
                                                </tr>
                                                <?php 
                                                $count++;
                                                } ?>
                                            </tbody>
                                            </table>
                                            <?php }else{
                                            echo 'No Results Found';
                                            ?>
                                            
                                            <?php } ?>

                                    </div>
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



            <a class="banner200x333 promo" href="javascript:void(0);"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x333 promo" href="javascript:void(0);"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x200 promo" href="javascript:void(0);"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x200 promo" href="javascript:void(0);"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x100 promo" href="javascript:void(0);"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x100 promo" href="javascript:void(0);"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
        </section>
    </div>
</section>
<div class="clr"></div>