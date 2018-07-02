
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('escort_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<div class="row">
							<div class="col-lg-7">
								<h2 class="mb-0">My Advanced Directory Home</h2>
								<span class="d-block">Last Logged In: 25 Minutes 15 secondes Ago</span>
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
										   <div class="namePart mt-1 ml-2"><?php echo $user['User']['first_name'] . " " . $user['User']['last_name']; ?></div>
										   
										</li>
										<li class="mb-2">
										   <div class="nameField p-1">Location</div>
										   <div class="namePart mt-1 ml-2"><?php
echo $user['Country']['name'] . " , " . $user['City']['name'];
?></div>
										</li>
                                                                                
                                                                                
                                                                                <?php  
                                                    $date =  date('Y',strtotime($user['User']['birthday']));
                                                    $age=date('Y')-$date;
                                                    ?>
                                                                                
                                                                                
										<li class="mb-2">
										   <div class="nameField p-1">Age</div>
										   <div class="namePart mt-1 ml-2"><?php echo $age;?> Years</div>
										</li>
										<li class="mb-2">
										   <div class="nameField p-1">Ethnicity</div>
										   <div class="namePart mt-1 ml-2">white</div>
										</li>
										<li class="mb-2">
										   <div class="nameField p-1">Avalability</div>
										   <div class="namePart mt-1 ml-2">Incall/Outcall</div>
										</li>
										<li class="mb-2">
										   <div class="nameField p-1">Membership Status</div>
										   <div class="namePart mt-1 ml-2">Diamond(valid till 02 May, 2018)
										      <a href="#" class="d-block">Upgrade Membership</a>
										   </div>
										</li>
										<li class="mb-2">
										   <div class="nameField p-1">Account Status</div>
										   <div class="namePart mt-1 ml-2">Profile Approved(Your profile is published and listed on advance directory)
										   </div>
										</li>
									</ul>
								</div>
								</div>
								<div class="col-lg-4">
									<div class="profRightP">
                                                                            <a class="btn btn-primary btn-block btnPart" href="<?php
                                                                            echo $this->webroot;?>escorts/editescortprofile">Edit Your Profile</a>						   
									   <button type="button" class="btn btn-primary btn-block btnPart">Advertise with Us</button>					   
									   <button type="button" class="btn btn-primary btn-block btnPart">Ad-on Service</button>						   
								   </div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="onlineStatus">
										<label class="float-left">Online Status</label>
										<div class="float-right backgroundWhite"><input checked data-toggle="toggle" type="checkbox"></div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="onlineStatus">
										<label class="float-left">Account Status</label>
										<div class="float-right"><input checked data-toggle="toggle" type="checkbox"></div>
										<div class="clearfix"></div>
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
									<h2 class="mb-0">Your Current membership features</h2>
									<p class="mb-0">Get VIP Membership</p>
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
							 					<ul>
							 						<li>
							 							<div class="row">
							 								<div class="col-lg-7">
							 									<p class="mb-0 pl-2">Escort Tour</p>
							 								</div>
							 								<div class="col-lg-3">
							 									<p class="mb-0">Yes</p>
							 								</div>
							 								<div class="col-lg-2">
							 									<p class="mb-0"><i class="fa fa-check" aria-hidden="true"></i>
</p>
							 								</div>
							 							</div>
							 						</li>
							 						<li>
							 							<div class="row">
							 								<div class="col-lg-7">
							 									<p class="mb-0 pl-2">Manage Schedule</p>
							 								</div>
							 								<div class="col-lg-3">
							 									<p class="mb-0"><?php echo $permissions->manage_schedule?"Yes":"No"?></p>
							 								</div>
							 								<div class="col-lg-2">
							 									<p class="mb-0"><i class="fa fa-check" aria-hidden="true"></i>
</p>
							 								</div>
							 							</div>
							 						</li>
							 						<li>
							 							<div class="row">
							 								<div class="col-lg-7">
							 									<p class="mb-0 pl-2">Update Status(My Wall)</p>
							 								</div>
							 								<div class="col-lg-3">
							 									<p class="mb-0">Yes</p>
							 								</div>
							 								<div class="col-lg-2">
							 									<p class="mb-0"><i class="fa fa-check" aria-hidden="true"></i>
</p>
							 								</div>
							 							</div>
							 						</li>
							 						<li>
							 							<div class="row">
							 								<div class="col-lg-7">
							 									<p class="mb-0 pl-2">Upload Photos</p>
							 								</div>
							 								<div class="col-lg-3">
							 									<p class="mb-0"><?php echo $permissions->uploadphotos?> Photos</p>
							 								</div>
							 								<div class="col-lg-2">
							 									<p class="mb-0"><i class="fa fa-check" aria-hidden="true"></i>
</p>
							 								</div>
							 							</div>
							 						</li>
							 						<li>
							 							<div class="row">
							 								<div class="col-lg-7">
							 									<p class="mb-0 pl-2">Email Messaging</p>
							 								</div>
							 								<div class="col-lg-3">
							 									<p class="mb-0">Yes</p>
							 								</div>
							 								<div class="col-lg-2">
							 									<p class="mb-0"><i class="fa fa-check" aria-hidden="true"></i>
</p>
							 								</div>
							 							</div>
							 						</li>
							 						<li>
							 							<div class="row">
							 								<div class="col-lg-7">
							 									<p class="mb-0 pl-2">Customer Blacklist</p>
							 								</div>
							 								<div class="col-lg-3">
							 									<p class="mb-0">Yes</p>
							 								</div>
							 								<div class="col-lg-2">
							 									<p class="mb-0"><i class="fa fa-check" aria-hidden="true"></i>
</p>
							 								</div>
							 							</div>
							 						</li>
							 						<li>
							 							<div class="row">
							 								<div class="col-lg-7">
							 									<p class="mb-0 pl-2">Google Maps</p>
							 								</div>
							 								<div class="col-lg-3">
							 									<p class="mb-0"><?php echo $permissions->google_map?'Yes':'No'?></p>
							 								</div>
							 								<div class="col-lg-2">
							 									<p class="mb-0"><i class="fa fa-check" aria-hidden="true"></i>
</p>
							 								</div>
							 							</div>
							 						</li>
							 						<li>
							 							<div class="row">
							 								<div class="col-lg-7">
							 									<p class="mb-0 pl-2">Blog Feature</p>
							 								</div>
							 								<div class="col-lg-3">
							 									<p class="mb-0"><?php echo $permissions->blog?'Yes':"No"?></p>
							 								</div>
							 								<div class="col-lg-2">
							 									<p class="mb-0"><i class="fa fa-check" aria-hidden="true"></i>
</p>
							 								</div>
							 							</div>
							 						</li>
							 					</ul>
							 				</div>
							 			</div>
							 			<div class="col-lg-6">
							 				<div class="escortLeftpart">
							 					<ul>
							 						<li>
							 							<div class="row">
							 								<div class="col-lg-7">
							 									<p class="mb-0 pl-2">Direct Booking</p>
							 								</div>
							 								<div class="col-lg-3">
							 									<p class="mb-0">Yes</p>
							 								</div>
							 								<div class="col-lg-2">
							 									<p class="mb-0"><i class="fa fa-check" aria-hidden="true"></i>
</p>
							 								</div>
							 							</div>
							 						</li>
							 						<li>
							 							<div class="row">
							 								<div class="col-lg-7">
							 									<p class="mb-0 pl-2">Set Happy Hour</p>
							 								</div>
							 								<div class="col-lg-3">
							 									<p class="mb-0"><?php echo $permissions->set_happyhour?"Yes":"No"?></p>
							 								</div>
							 								<div class="col-lg-2">
							 									<p class="mb-0"><i class="fa fa-check" aria-hidden="true"></i>
</p>
							 								</div>
							 							</div>
							 						</li>
							 						<li>
							 							<div class="row">
							 								<div class="col-lg-7">
							 									<p class="mb-0 pl-2">Create Website</p>
							 								</div>
							 								<div class="col-lg-3">
							 									<p class="mb-0">Yes</p>
							 								</div>
							 								<div class="col-lg-2">
							 									<p class="mb-0"><i class="fa fa-check" aria-hidden="true"></i>
</p>
							 								</div>
							 							</div>
							 						</li>
							 						<li>
							 							<div class="row">
							 								<div class="col-lg-7">
							 									<p class="mb-0 pl-2">Upload Videos</p>
							 								</div>
							 								<div class="col-lg-3">
							 									<p class="mb-0"><?php echo $permissions->uploadphotos?> Videos</p>
							 								</div>
							 								<div class="col-lg-2">
							 									<p class="mb-0"><i class="fa fa-check" aria-hidden="true"></i>
</p>
							 								</div>
							 							</div>
							 						</li>
							 						<li>
							 							<div class="row">
							 								<div class="col-lg-7">
							 									<p class="mb-0 pl-2">Manage Shop</p>
							 								</div>
							 								<div class="col-lg-3">
							 									<p class="mb-0"><?php echo $permissions->manage_onlineshop?"Yes":"No"?></p>
							 								</div>
							 								<div class="col-lg-2">
							 									<p class="mb-0"><i class="fa fa-check" aria-hidden="true"></i>
</p>
							 								</div>
							 							</div>
							 						</li>
							 						<li>
							 							<div class="row">
							 								<div class="col-lg-7">
							 									<p class="mb-0 pl-2">Show Services</p>
							 								</div>
							 								<div class="col-lg-3">
							 									<p class="mb-0">Yes</p>
							 								</div>
							 								<div class="col-lg-2">
							 									<p class="mb-0"><i class="fa fa-check" aria-hidden="true"></i>
</p>
							 								</div>
							 							</div>
							 						</li>
							 						<li>
							 							<div class="row">
							 								<div class="col-lg-7">
							 									<p class="mb-0 pl-2">User Chat</p>
							 								</div>
							 								<div class="col-lg-3">
							 									<p class="mb-0">Yes</p>
							 								</div>
							 								<div class="col-lg-2">
							 									<p class="mb-0"><i class="fa fa-check" aria-hidden="true"></i>
</p>
							 								</div>
							 							</div>
							 						</li>
							 						<li>
							 							<div class="row">
							 								<div class="col-lg-7">
							 									<p class="mb-0 pl-2">Add Classified Ads</p>
							 								</div>
							 								<div class="col-lg-3">
							 									<p class="mb-0">Yes</p>
							 								</div>
							 								<div class="col-lg-2">
							 									<p class="mb-0"><i class="fa fa-check" aria-hidden="true"></i>
</p>
							 								</div>
							 							</div>
							 						</li>
							 					</ul>
							 				</div>
							 			</div>
							 		</div>
							 		<div class="upgradeMembership text-center mb-4">
							 			<button class="btn btn-primary btnPart">Upgrade Membership Now</button>
							 		</div>
							 	</div>
							</div>
						</div>
						<div class="membershipPart mb-3">
							<div class="row">
								<div class="col-lg-1">
									<i class="fa fa-vcard-o"></i>
								</div>
								<div class="col-lg-9">
									<h2 class="mb-0">My Credits</h2>
									<p class="mb-0">Manage All Your Credits</p>
								</div>
								<div class="col-lg-2"><div  onclick="showhide1()"><i class="fa fa-chevron-circle-down"></i> Show</div></div>
							</div>
						</div>
						<div class="escortTour" id="newpost1">
							<div class="row">
								<div class="col-lg-12">
									<table class="table escortTable1">
									    <thead>
									      <tr>
									        <th>Total Purchased</th>
									        <th>Total Rewarded</th>
									        <th>Total Earned</th>
									        <th>Total Used</th>
									        <th>Total Redeem</th>
									        <th>Available Balance</th>
									      </tr>
									    </thead>
									    <tfoot>
											<tr>
											<th colspan="3" class="text-center"><i class="fa fa-life-ring mr-3"></i>Redeem Credits</th>
											
											<th colspan="3" class="text-center"><i class="fa fa-life-ring mr-3"></i>Credits Transaction</th>
											</tr>
											</tfoot>
									    <tbody>
									      <tr>
									        <td>3150.00 Credits</td>
									        <td>1500.00 Credits</td>
									        <td>320.00 Credits</td>
									        <td>1024.00 Credits</td>
									        <td>900.00 Credits</td>
									        <td>3046.00 Credits</td>
									      </tr>
									    </tbody>
									  </table>
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