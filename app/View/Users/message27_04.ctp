<section id="contentsection">
<div id="wait-div" class="wait-div">
  <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
    Please wait    ....</span> </span> </div>
</div>

<div class="col-left">
<script type="text/javascript">
function deleteAd(id)
{
	BootstrapDialog.confirm("Are you sure to unfollow ?", function(result){
	//var r=confirm("Are you sure to unfollow ?");
	if (result)
	{
		var siteurl="http://107.170.152.166/team2/escort/";
		var posturl=siteurl+'customer/block-followings/'+id;
		$.ajax({
		url: posturl,
		dataType: 'json',
		type: "GET",
		beforeSend: function(){
				 $('#wait-div').show();
				},
	  success: function(data){
	  $('#wait-div').hide();
		 if(data.success_message)
		  {  
				$("#add_"+id).hide('slow');
				 $("#success").show('slow');
				 $("#success").html(data.success_message);
				$("#success").fadeOut('slow');
		  }
	  },
	  error: function (data) {
		 alert("Server Error.");
		 return false;
	  }
	});
	
	}
	});
	return false;
	
}
</script>
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
                                                    <?php echo $this->element('user_sidebar'); ?>
                                                <div class="triangleBottomleft firstItem"></div>
                                            </div>

							<div class="right-my-account">
								<div class="right-my-account-blocks">
									<div class="detail-heading">
										<section class="title-left">
										<h1 style="display:inline-block;"> My Inbox</h1>
										</section>
										<div class="clr"></div>
									</div>
										<div class="smart-forms">
										<div  class="notification alert-success spacer-t10" id="success" style="display:none"></div>                        
									</div>
									<div class="right-my-account-blocks-inner">
										<!-- <div class="smart-forms">
										<div  class="notification alert-success spacer-t10" id="success" style="display:none"></div>                        
										</div>
										<div class="no-record">No Record Found</div>		 -->
											<?php
											//pr($messagelist); exit;

											if(!empty($messagelist)){
											?>
											<table class="table">
												<thead>
												<tr>
												<td>Sl No#</td>
												<td>Message With</td>
												<td>Title</td>
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
												<td><?php echo $showuser['User']['first_name']." ".$showuser['User']['last_name']; ?></td>
												<td><?php echo $showuser['Message']['title']; ?></td>
												<td><a class="btn btn-sm btn-primary" href="<?php echo $this->Html->url('/');?>users/messagedetails/<?php echo base64_encode($showuser['Message']['id']); ?>"><i class="fa fa-fw fa-eye"></i>View<!-- <i class="fa fa-eye" aria-hidden="true"></i> -->
												</a> &nbsp; &nbsp;
												<?php //echo $this->Form->postLink('<i class="fa fa-fw fa-trush"></i>Delete', array('action' => 'deletemessage', $showuser['Message']['id']),array("class"=>"btn btn-sm btn-danger"), __('Are you sure you want to Delete?')); ?>
												<?php echo $this->Form->postLink(
													$this->Html->tag('i', '', 
														array('class' => 'fa fa-fw fa-times')
													).'Delete', array('action' => 'deletemessage', $showuser['Message']['id']), 
													array('escape'=>false),
													 __('Are you sure you want to Delete?'), 
													 array("class"=>"btn btn-sm btn-danger")
												); ?>
												</td>
												</tr>
											
												<?php 
												$count++;
												} 
												?>
											</tbody>
											</table>
											<?php }else{
											echo 'No Messages Found';
											?>
											
											<?php } ?>

									</div>
								</div>
							</div>
	
	<div class="clr"></div>
</div>
 <div class="clr"></div>
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