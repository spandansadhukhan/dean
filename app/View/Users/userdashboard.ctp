
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('user_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<div class="row">
							<div class="col-lg-7">
								<h2 class="mb-0">My Advanced Directory Home</h2>
								
							</div>
							<div class="col-lg-5">
								<ul class="list-unstyled profApp">
                                                                    
                                                                    <?php
echo $user['User']['is_approved'] != 1 ? '<li class="mr-4 approvedProf"><i class="fa fa-times"></i>Approval pending</li>' : '<li class="mr-4 approvedProf"><i class="fa fa-check"></i> Profile Approved</li>';
?>
									<li><i class="fa fa-user"></i> View Profile</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row mt-4">
						<div class="col-lg-3">
							<div class="profImage">
                                                            
                                                            <?php
if ($user['User']['profile_image'] != "") { ?>
                                                 <img src="<?php echo $this->Html->url('/');?>user_images/<?php echo $user['User']['profile_image'];?>" class="img-fluid">
                                                 
<?php }else{ ?>
         <img src="<?php echo $this->Html->url('/');?>images/noimage.png" class="img-fluid">                                        
                                                 
<?php } ?>
                                                 
                                                 
                                                 
                                                 
							</div>
						</div>
						<div class="col-lg-9">
							<div class="row">
								<div class="col-lg-8">
									<div class="profLeftP">
									<ul>
										<li class="mb-2">
										   <div class="nameField p-1">Name</div>
										   <div class="namePart mt-1 ml-2"><?php echo $user['User']['name']; ?></div>
										   
										</li>
                                                                                
                                                                                <li class="mb-2">
										   <div class="nameField p-1">User Name</div>
										   <div class="namePart mt-1 ml-2"><?php echo $user['User']['username'];?> </div>
										</li>
                                                                                
                                                                               <li class="mb-2">
										   <div class="nameField p-1">Email Address</div>
										   <div class="namePart mt-1 ml-2"><?php echo $user['User']['email'];?></div>
										</li> 
                                                                                
										<li class="mb-2">
										   <div class="nameField p-1">Location</div>
										   <div class="namePart mt-1 ml-2"><?php
echo $user['Country']['name'] . " , " . $user['City']['name'];
?></div>
										</li>
                                                                              
                                                                                
										<li class="mb-2">
										   <div class="nameField p-1">My Favorites</div>
										   <div class="namePart mt-1 ml-2">0</div>
										</li>
                                                                                
										
										<li class="mb-2">
										   <div class="nameField p-1">My Followings</div>
										   <div class="namePart mt-1 ml-2">0</div>
										</li>
                                                                                <li class="mb-2">
										   <div class="nameField p-1">Total Reviews Posted</div>
										   <div class="namePart mt-1 ml-2">0</div>
										</li>
                                                                                
										
										<li class="mb-2">
										   <div class="nameField p-1">Account Status</div>
                                                                                   <?php if($user['User']['is_active'] == 1){ ?>
										   <div class="namePart mt-1 ml-2">Profile Is Active </div>
                                                                                   <?php }else{ ?>
                                                                                   
                                                                                   <div class="namePart mt-1 ml-2">Profile Is Not Active </div>
                                                                                   <?php } ?>
										</li>
									</ul>
								</div>
								</div>
                                                            
                                                            
                                                            
                                                            
								<div class="col-lg-4">
									<div class="profRightP">
                                                                            <a class="btn btn-primary btn-block btnPart" href="<?php
                                                                            echo $this->webroot;?>users/edituserprofile">Edit Your Profile</a>						   
									   					   
								   </div>
								</div>
							</div>
							
							
						</div>
					</div>
                                    
                                    
                                    
                                    
					<div class="currentMembership mt-3">
						<div class="membershipPart mb-3">
							<div class="row">
								<div class="col-lg-1">
									<i class="fa fa-briefcase"></i>
								</div>
								<div class="col-lg-9">
									<h2 class="mb-0">Site News</h2>
									
								</div>
								<div class="col-lg-2" ><div  onclick="showhide()"><i class="fa fa-chevron-circle-down"></i> Show</div></div>							
							</div>
						</div>
						<div class="row" >
							<div class="col-lg-12" >
							 	<div class="escortTour" id="newpost">
							 		<div class="row">
							 			<div class="col-lg-6">
							 				<div class="escortLeftpart">
							 					
                                                                                            <div class="sec1" style="width: 290px;">
                                                                <div class="detail-heading">
                                                                    <section class="title-left">
                                                                        <h1 style="display:inline-block;">Credits</h1>
                                                                    </section>
                                                                    <div class="clr"></div>
                                                                </div>
                                                                <div class="right-my-account-blocks-inner">
                                                                    <span class="avai-cre">MyAvailable Credits</span>
                                                                    <div class="destination">
                                                                        <strong><?php echo $user['User']['credit_number'];?> Credits </strong>
                                                                    </div>
                                                                   <!--  <div class="destination-used">
                                                                        <span style="text-align: center;">Credit-In : 0 </span><br>
                                                                        <span style="text-align: center;">Credit-Out : 0 </span>
                                                                        <div class="clr"></div>
                                                                    </div> -->
                                                                    <!-- <a style="margin: 7px 0 0; display:block;" class="buttonGrey" data-type="iframe" href="#">Buy Credits</a> -->

                                                            <form action="<?php echo $this->webroot ?>users/membershippayment" method="POST">
                                                            <input type="hidden" name="data[User][user_id]" value="<?php echo $this->Session->read('fuid'); ?>">
                                                            <div class="" style="text-align: center;">
                                                            <?php if(!empty($membershipall)) {
                                                            foreach($membershipall as $membership)
                                                            {
                                                            ?>
                                                            <input type="radio" name="data[Escort][membership_id]" value="<?php echo $membership['Membership']['id'] ?>" <?php if($user['User']['membership_id']==$membership['Membership']['id']) { ?> checked <?php } ?>><?php echo $membership['Membership']['name'] ?>
                                                            <?php } } ?>
                                                            </div>

                                                            <div class="" style="text-align: center;">
                                                            <!--<a href="#" style="margin: 7px 0 0;" class="buttonGrey">Upgrade Membership Now</a>-->
                                                            <input type="submit" name="submit" value="Buy Credits" class="buttonGrey">
                                                            </div>
                                                            </form>


                                                                </div>
                                                            </div>
                                                                                            
                                                                                            
                                                                                            
							 				</div>
							 			</div>
							 			
							 		</div>
							 		
							 	</div>
							</div>
						</div>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            <div class="membershipPart mb-3">
							<div class="row">
								<div class="col-lg-1">
									<i class="fa fa-briefcase"></i>
								</div>
								<div class="col-lg-9">
									<h2 class="mb-0">My Recent Comments</h2>
									
								</div>
								<div class="col-lg-2" ><div  onclick="showhide1()"><i class="fa fa-chevron-circle-down"></i> Show</div></div>							
							</div>
						</div>
                                            
                                            <div class="row" >
							<div class="col-lg-12" >
							 	<div class="escortTour" id="newpost1">
							 		<div class="row">
							 			<div class="col-lg-6">
							 				<div class="escortLeftpart">
							 					
                                                                                            <div class="right-my-account-blocks-inner">
                                                                <div class="col-md-4">
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-body">
                                                                            <div class="row">
                                                                                <div class="col-xs-12">
                                                                                    <ul id="demo1" style="overflow-y: hidden; height: 32px;"><div class="no-record">No Comment Found</div>

                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="panel-footer"> 	<ul class="pagination pull-right" style="margin: 0px;"><li><a href="#" class="prev"><i class="fa fa-angle-down"></i></a></li><li><a href="#" class="next"><i class="fa fa-angle-up"></i></a></li></ul><div class="clearfix"></div></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                                            
                                                                                            
                                                                                            
							 				</div>
							 			</div>
							 			
							 		</div>
							 		
							 	</div>
							</div>
						</div>
                                            
                                            
                                            
                                            
                                            
                                            
                                            <div class="membershipPart mb-3">
							<div class="row">
								<div class="col-lg-1">
									<i class="fa fa-briefcase"></i>
								</div>
								<div class="col-lg-9">
									<h2 class="mb-0">My Recent Reviews</h2>
									
								</div>
								<div class="col-lg-2" ><div  onclick="showhide2()"><i class="fa fa-chevron-circle-down"></i> Show</div></div>							
							</div>
						</div>
                                            
                                            <div class="row" >
							<div class="col-lg-12" >
							 	<div class="escortTour" id="newpost2">
							 		<div class="row">
							 			<div class="col-lg-6">
							 				<div class="escortLeftpart">
							 					
                                                                                            <div class="right-my-account-blocks-inner">
                                                                <div class="col-md-4">
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-body">
                                                                            <div class="row">
                                                                                <div class="col-xs-12">
                                                                                    <ul id="demo2" style="overflow-y: hidden; height: 32px;">
                                                                                        <div class="no-record">No Review Found</div></ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="panel-footer">
                                                                            <ul class="pagination pull-right" style="margin: 0px;">
                                                                                <li><a href="#" class="prev"><i class="fa fa-angle-down"></i></a></li>
                                                                                <li><a href="#" class="next"><i class="fa fa-angle-up"></i></a></li>
                                                                            </ul><div class="clearfix">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                                            
                                                                                            
                                                                                            
							 				</div>
							 			</div>
							 			
							 		</div>
							 		
							 	</div>
							</div>
						</div>
                                            
                                            
                                            
                                            
                                            
                                            
						
						
					</div>
				</div>
			</div>
		</div>
	</section>
<script>
    	$(function(){

    $('.spinner .btn:first-of-type').on('click', function() {
      var btn = $(this);
      var input = btn.closest('.spinner').find('input');
      if (input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max'))) {    
        input.val(parseInt(input.val(), 10) + 1);
      } else {
        btn.next("disabled", true);
      }
    });
    $('.spinner .btn:last-of-type').on('click', function() {
      var btn = $(this);
      var input = btn.closest('.spinner').find('input');
      if (input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min'))) {    
        input.val(parseInt(input.val(), 10) - 1);
      } else {
        btn.prev("disabled", true);
      }
    });

})
    </script>
    <script>
     function showhide()
     {
           var div = document.getElementById("newpost");
    if (div.style.display !== "none") {
        div.style.display = "none";
    }
    else {
        div.style.display = "block";
    }
     }
  </script>
  <script>
     function showhide1()
     {
           var div = document.getElementById("newpost1");
    if (div.style.display !== "none") {
        div.style.display = "none";
    }
    else {
        div.style.display = "block";
    }
     }
  </script>
  
  
  <script>
     function showhide2()
     {
           var div = document.getElementById("newpost2");
    if (div.style.display !== "none") {
        div.style.display = "none";
    }
    else {
        div.style.display = "block";
    }
     }
  </script>