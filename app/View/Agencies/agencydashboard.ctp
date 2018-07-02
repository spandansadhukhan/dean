<style>
    .modal-backdrop.fade.in {position: relative;}
    .containerss{ position: absolute; top: 2%; left: 3%; right: 0; bottom: 0; }
    .action{ width: 100px; height: 30px; margin: 10px 0; }
    .cropped>img{ margin-right: 10px; }
    .wrap{
        width: 700px;
        margin: 10px auto;
        padding: 10px 15px;
        background: white;
        border: 2px solid #DBDBDB;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        text-align: center;
        overflow: hidden;

    }
    img#uploadPreview{
        border: 0;
        border-radius: 3px;
        -webkit-box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, .27);
        box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, .27);
        margin-bottom: 30px;
        overflow: hidden;
        max-width: 100%;
        max-height: 100%
    }
    input[type="submit"]{
        border-radius: 10px;
        /*background-color: #61B3DE;*/
        border: 0;
        color: white;
        font-weight: bold;
        padding: 6px 15px 5px;
        cursor: pointer;
    }
    .choose_file{
        position:relative;
        display:inline-block;
        /*border-radius:8px;*/
        border:0 none;
        padding: 5px 6px 5px 8px;
        font: normal 14px Myriad Pro, Verdana, Geneva, sans-serif;
        margin-top: 2px;
        background:#61b3de;
        /*background:#f98d29;*/
        color: #fff;
        width: 30%;
        border-radius: 10px;
        color: white;
        cursor: pointer;
        font-weight: bold;
    }
    .choose_file input[type="file"]{
        -webkit-appearance:none;

        top:0; left:0;
        opacity:0;
    }

</style>

<script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>
<?php
echo $this->Html->script('script');
?>
<?php
echo $this->Html->css('imgareaselect-animated');
?>
<?php
echo $this->Html->script('jquery.imgareaselect.pack');
?>

	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('agent_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<div class="row">
							<div class="col-lg-7">
								<h2 class="mb-0">My Advanced Directory Home</h2>
								<span class="d-block">Last Logged In: 25 Minutes 15 secondes Ago</span>
							</div>
							<div class="col-lg-5">
								<ul class="list-unstyled profApp">
									<li class="mr-4 approvedProf"> <?php
echo $user['User']['is_approved'] != 1 ? '<i class="fa fa-times-circle"></i> Approval Pending' : '<i class="fa fa-check-circle""></i> Approved';
?></li>
									<li><i class="fa fa-user"></i> View Profile</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row mt-4">
						<div class="col-lg-3">
							<div class="profImage">
                                                            <?php if ($user['User']['profile_image'] != "") { ?>
								<img src="<?php echo $this->Html->url('/'); ?>user_images/<?php echo $user['User']['profile_image']; ?>" class="img-fluid">
                                                                
                                                            <?php }else{ ?>
                                                                
                                                                <img src="<?php echo $this->Html->url('/'); ?>images/noimage.png" class="img-fluid">
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
										   <div class="namePart mt-1 ml-2"><?php echo $user['User']['first_name'] . " " . $user['User']['last_name'];?></div>
										   
										</li>
										<li class="mb-2">
										   <div class="nameField p-1">Location</div>
										   <div class="namePart mt-1 ml-2"><?php echo $user['Country']['name'] . " , " . $user['City']['name']; ?></div>
										</li>
										<li class="mb-2">
										   <div class="nameField p-1">Total Escorts Added</div>
										   <div class="namePart mt-1 ml-2">No Profile Added Yet </div>
										</li>
										<li class="mb-2">
										   <div class="nameField p-1">Membership Status</div>
										   <div class="namePart mt-1 ml-2">Free</div>
										</li>
										<li class="mb-2">
										   <div class="nameField p-1">Account Status</div>
										   <div class="namePart mt-1 ml-2">Not Approved (Your profile not publish and listed on The Directory )</div>
										</li>
									</ul>
								</div>
								</div>
								<div class="col-lg-4">
									<div class="profRightP">
                                                                            <a class="btn btn-primary btn-block btnPart" href="<?php echo $this->webroot;?>agencies/editagentprofile">Edit Profile</a>						   
									   <button type="button" class="btn btn-primary btn-block btnPart">Advertise with Us</button>					   
									   <button type="button" class="btn btn-primary btn-block btnPart">Ad-on Service</button>						   
                                                                      <a class="btn btn-primary btn-block btnPart" href="<?php echo $this->webroot;?>agencies/postbanner">Home Page Banner Ad</a>
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
					<div class="row">
						<div class="col-lg-12">
							<div class="addMembership p-2 mt-5">
								<div class="row">
									<div class="col-lg-10">
										<h2 class="mb-0 mt-0">Add membership to your escort profile</h2>
										<p class="mb-0 mt-0">Do you want to purchase membership for your escort?</p>
									</div>
									<div class="col-lg-2">
										<button type="button" class="btn btn-primary btn-block btnPart">Click Here</button>
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
								<div class="col-lg-2"><div  onclick="showhide()"><i class="fa fa-chevron-circle-down"></i> Show</div>
							</div>
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
                                <p class="mb-0 pl-2">Upload Agency/Club Photos</p>
                        </div>
                        <div class="col-lg-3">
                                <p class="mb-0"> up to <?php echo $permissions->uploadphotos?> Photos</p>
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
                                <p class="mb-0 pl-2">Add Escort Profiles</p>
                        </div>
                        <div class="col-lg-3">
                                <p class="mb-0"><?php echo $permissions->add_escort_profile==-1?'Unlimited':$permissions->add_escort_profile?></p>
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
                                <p class="mb-0"><?php echo $permissions->upload_video?'Second Videos per Escort':"No"?></p>
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
                                <p class="mb-0 pl-2">Agency Profile Description</p>
                        </div>
                        <div class="col-lg-3">
                                <p class="mb-0"><?php echo $permissions->my_profile?> characters</p>
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
                                <p class="mb-0"><?php echo $permissions->customer_blacklist?"Yes":"No"?></p>
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
                                <p class="mb-0 pl-2">Web Site Booking Feature</p>
                        </div>
                        <div class="col-lg-3">
                                <p class="mb-0"><?php echo !empty($permissions->direct_booking)?"Yes":"No";?></p>
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
                                <p class="mb-0 pl-2">Priority Profile Listing</p>
                        </div>
                        <div class="col-lg-3">
                                <p class="mb-0"><?php echo $permissions->prioritylisting?"Yes":"No"?></p>
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
                                <p class="mb-0 pl-2">Receive Reviews</p>
                        </div>
                        <div class="col-lg-3">
                                <p class="mb-0"><?php echo $permissions->receive_review?"Yes":"No"?></p>
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
        
        
        
</ul>
							 				</div>
							 			</div>
<div class="col-lg-6">
        <div class="escortLeftpart">
                <ul>
                        <li>
                                <div class="row">
                                        <div class="col-lg-7">
                                                <p class="mb-0 pl-2">Contact Information</p>
                                        </div>
                                        <div class="col-lg-3">
                                                <p class="mb-0"><?php echo $permissions->contact_info?"Yes":"No"?></p>
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
                                                <p class="mb-0 pl-2">Company Website</p>
                                        </div>
                                        <div class="col-lg-3">
                                                <p class="mb-0"><?php echo $permissions->own_website?"Yes":"No"?></p>
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
                                                <p class="mb-0 pl-2">Upcoming Events</p>
                                        </div>
                                        <div class="col-lg-3">
                                                <p class="mb-0"><?php echo $permissions->upcomeing_event?"Yes":"No"?></p>
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
                                                <p class="mb-0 pl-2">Free Email Account</p>
                                        </div>
                                        <div class="col-lg-3">
                                                <p class="mb-0"><?php echo !empty($permissions->free_email)?"Yes":"No"?></p>
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
                                                <p class="mb-0 pl-2">Manage Online Shop</p>
                                        </div>
                                        <div class="col-lg-3">
                                                <p class="mb-0"><?php echo $permissions->onlineshop?"Yes":"No"?></p>
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
                                                <p class="mb-0 pl-2">Banner Advertising</p>
                                        </div>
                                        <div class="col-lg-3">
                                                <p class="mb-0"><?php echo !empty($permissions->post_add)?"Yes":"No"?></p>
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
                                                <p class="mb-0"><?php echo $permissions->blog?"Yes":"No"?></p>
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
                                                <p class="mb-0 pl-2">Chat Feature</p>
                                        </div>
                                        <div class="col-lg-3">
                                                <p class="mb-0"><?php echo $permissions->chat?"Yes":"No"?></p>
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
                                                <p class="mb-0 pl-2">Place Adult Job Ads</p>
                                        </div>
                                        <div class="col-lg-3">
                                                <p class="mb-0"><?php echo !empty($permissions->place_adult)?"Yes":"No"?></p>
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
                                                <p class="mb-0 pl-2">Google Maps Listing</p>
                                        </div>
                                        <div class="col-lg-3">
                                                <p class="mb-0"><?php echo $permissions->google_map?"Yes":"No"?></p>
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
<!--							 		<div class="upgradeMembership text-center mb-4">
							 			<button class="btn btn-primary btnPart">Upgrade Membership Now</button>
							 		</div>-->
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
                                                                                            <th colspan="3" class="text-center"><i class="fa fa-life-ring mr-3"></i><a class="text-center" href="javascript:;" onclick="redeem_request()">Redeem Credits</a></th>
											
                                                                                            <th colspan="3" class="text-center"><i class="fa fa-life-ring mr-3"></i><a href="#">Credits Transaction</a></th>
											</tr>
											</tfoot>
									    <tbody>
									      <tr>
									        <td>00.00 Credits</td>
									        <td>00.00 Credits</td>
									        <td>00.00 Credits</td>
									        <td>00.00 Credits</td>
									        <td>00.00 Credits</td>
									        <td>00.00 Credits</td>
									      </tr>
									    </tbody>
									  </table>
								</div>
							</div>
						</div>
                                    
                                    
						<div class="membershipPart mb-3">
							<div class="row">
								<div class="col-lg-1">
									<i class="fa fa-home"></i>
								</div>
								<div class="col-lg-9">
									<h2 class="mb-0">My Shop Statistics</h2>
									<p class="mb-0">Manage All Your Shop</p>
								</div>
                                                            <div class="col-lg-2"><div  onclick="showhide2()"><i class="fa fa-chevron-circle-down"></i> Show</div></div>
							</div>
						</div>
                                    
                                    <div class="escortTour" id="newpost2">
							<div class="row">
								<div class="col-lg-12">
									<table class="table escortTable1">
									    <thead>
									      <tr>
									        <th>Physical Items</th>
									        <th>Web Cam Session</th>
									        <th>Private  Album</th>
									        <th>Private Videos</th>
									        <th>New Orders</th>
									        <th>Total Order Amount</th>
									      </tr>
									    </thead>
									    <tfoot>
											<tr>
                                                                                            <th colspan="3" class="text-center"><i class="fa fa-life-ring mr-3"></i><a class="text-center" href="#">Manage Shop</a></th>
											
                                                                                            <th colspan="3" class="text-center"><i class="fa fa-life-ring mr-3"></i><a href="#">My Sold Items</a></th>
											</tr>
											</tfoot>
									    <tbody>
									      <tr>
									        <td>0</td>
									        <td>0</td>
									        <td>0</td>
									        <td>0</td>
									        <td>0</td>
									        <td>00.00 Credits</td>
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
  </body>
</html>