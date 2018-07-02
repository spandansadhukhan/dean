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
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('user_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<h2 class="font-weight-normal">Email Messages</h2>
					</div>
					<ul class="nav nav-tabs mt-4 tabParts">
					  <li class="active"><a data-toggle="tab" href="#home">Inbox</a></li>
					  <li><a data-toggle="tab" href="#menu1">Outbox</a></li>
					  <li><a data-toggle="tab" href="#menu2">Compose</a></li>
					</ul>
					<div class="tab-content tabberPart">
					  <div id="home" class="tab-pane in active">
					  	<div class="selectField">
					  		<div class="row">
					  			<div class="col-lg-6">
					  				<p>Select: All|None</p>
					  			</div>
					  			<div class="col-lg-6 float-right">
					  				<button type="button" class="btn btn-primary btnPart2 mr-2 ml-4">Delete</button>
					  				<button type="button" class="btn btn-primary btnPart2 mr-2">Mark Read</button>
					  				<button type="button" class="btn btn-primary btnPart2">Mark Unread</button>
					  			</div>
					  		</div>
					  	</div>
					  	
						
						
                                              <?php
                                             if(!empty($messagelist)){
                                                $count = 1;	
                                                foreach ($messagelist as $showuser) {
                                                ?>
					  	<div class="messagepart mt-3 pb-3">
					  		<div class="row">
					  			<div class="col-lg-1">
					  				<div class="checkbox mt-2">
									  <label><input type="checkbox" value=""></label>
									</div>
					  			</div>
					  			<div class="col-lg-9">
					  				<div class="row">
					  					<div class="col-lg-1">
					  						<div class="profileImage"><img src="images/brown_man.png"></div>
					  					</div>
					  					<div class="col-lg-11">
					  						<h2><?php echo $showuser['Message']['title']; ?></h2>
					  						<p><?php echo $showuser['Message']['message']; ?></p>
					  					</div>
					  				</div>
					  			</div>
					  			<div class="col-lg-2">
                                                                    <a class="btn btn-primary btnPart" href="<?php echo $this->Html->url('/');?>users/messagedetails/<?php echo base64_encode($showuser['Message']['id']); ?>"><i class="fa fa-eye"></i></a>							
					  				<button type="button" class="btn btn-primary btnPart"><i class="fa fa-reply" aria-hidden="true"></i>
</button>
					  			</div>
					  		</div>
					  	</div>
                                             <?php } }else{ ?>
					  	
                                              <div class="messagepart mt-3 pb-3">
                                                  
                                                  No Messages Found..
                                              </div>
                                              
                                             <?php } ?>
					  	
					  </div>
					  <div id="menu1" class="tab-pane fade">
					  	
					  </div>
					  <div id="menu2" class="tab-pane fade">
					  	<div class="tom1  for-msg">
                            <form action="#" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui">									  
                                <section class="t1 t1-t">
                                    <label for="label">To: <span>*</span></label>
                                    <select name="to_member_id" class="form-control selectField">
                                        <option value="">Select Recipient</option>
                                        <?php
                                                foreach ($userlist as $showusers) {
                                                    ?>
                                                    <option value="<?php echo $showusers['User']['id'] ?>"><?php echo $showusers['User']['name'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                    </select>
                                    <section class="clr">
                                    </section>

<!--										  <section class="t1 t1-t">
                                                                                                <label for="label">From: <span>*</span></label>
                                                                                                <input type="hidden" value="nits.karunadri@gmail.com" name="from_email">
                                                                                                <input type="text" class="form-control text-field" value="kar123" name="username" readonly="readonly">
                                                                                                <section class="clr"></section>
                                                                                  </section>-->

                                    <section class="t1 t1-t">
                                        <label for="label">Subject: <span>*</span></label>
                                        <input type="text" value="" name="subject" class="form-control text-field">
                                        <section class="clr"></section>
                                    </section>

                                    <section class="t1 t1-t">
                                        <label for="label">Message: <span>*</span></label>
                                        <textarea name="message" class="form-control text-field" id="message" placeholder="Type your message..."></textarea>
                                        <section class="clr"></section>
                                    </section>

                                    <section class="t1 t1-t">
                                        <label for="label" class="blank">&nbsp;</label>
                                        <section class="tbut">
                                            <input type="submit" value="Send" id="button" name="button" class="buttonGrey">
                                        </section>
                                        <section class="clr"></section>
                                    </section>
                                </section>
                            </form> 
                            </div>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
   