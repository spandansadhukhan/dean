<div class="left-my-account-menu">
    <ul>
        <li><a href="<?php echo $this->Html->url('/')?>escorts/escortdashboard" class="active"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="<?php echo $this->Html->url('/')?>escorts/editescortprofile"><i class="fa fa-user"></i> My Profile</a></li>
        <li><a href="<?php echo $this->Html->url('/')?>escorts/mypphoto"><i class="fa fa-file-photo-o"></i> My Photos</a></li>
        <li><a href="<?php echo $this->Html->url('/')?>escorts/myvideo"><i class="fa fa-video-camera"></i> My Videos</a></li>
        <li><a href="<?php echo $this->Html->url('/')?>escorts/rateandservice"><i class="fa fa-money"></i> Rates &amp; Services</a></li>
<!--        <li><a 
         <?php if($permissions->banner_advertising){?>       
         href="<?php echo $this->Html->url('/')?>advertisements"
         <?php }else{?>
         href="<?php echo $this->Html->url('/')?>advertisements"
         onclick="show_modal('Post Banner','banner_advertising')"

         <?php } ?>
         
         
         ><i class="fa fa-money"></i>Post Banner</a></li>-->
        <li><a <?php //if($permissions->email_messageing){?>href="<?php echo $this->Html->url('/')?>escorts/message" <?php //}else{?> <!--href="javascript:void(0)" onclick="show_modal('Message','email_messageing')"--> <?php //}?>  ><i class="fa fa-envelope"></i>Message</a></li>
        <li><a 
                <?php if($permissions->set_happyhour){?>
                href="<?php echo $this->Html->url('/')?>escorts/set_happy_hours"
                <?php }else{?>
                href="javascript:void(0)" onclick="show_modal('Set happy Hours','set_happyhour')"

                <?php }?>
               
               
               
               ><i class="fa fa-envelope"></i>Set happy Hours</a></li>
        <li><a 
                <?php
                 if($permissions->tour_feature)
                 {
                 ?>
                href="<?php echo $this->Html->url('/')?>escorts/escort_tour_plans"
                <?php }else{?>
                href="javascript:void(0)" onclick="show_modal('Escort Tour Plans','tour_feature')"
                <?php  }?>
               
               ><i class="fa fa-envelope"></i>Escort Tour Plans</a></li>
        <li><a href="<?php echo $this->Html->url('/')?>escorts/mybookingrequests"><i class="fa fa-support"></i>My Booking Requests</a></li>
        <li><a href="<?php echo $this->Html->url('/')?>escorts/manage_booking"><i class="fa fa-support"></i>Manage booking</a></li>
        <!-- <li><a href="<?php echo $this->Html->url('/')?>escorts/mycomments"><i class="fa fa-comment"></i>My Comments</a></li> -->
        <li><a 
                <?php if($permissions->receive_review){?>
                href="<?php echo $this->Html->url('/')?>escorts/myreviews"
                <?php }else{?>
                href="javascript:void(0)"
                onclick="show_modal('My Reviews','receive_review')"
                <?php }?>
               
               >
                
                <i class="fa fa-quote-right"></i>My Reviews</a></li>
        <!-- <li><a href="<?php echo $this->Html->url('/')?>escorts/myfollowing"><i class="fa fa-mail-reply"></i>My Followings</a></li> -->
       <!--  <li><a href="<?php echo $this->Html->url('/')?>escorts/myfollowerupdates"><i class="fa fa-mail-reply"></i>My Follower</a></li> -->

        <li><a 
                <?php //if($permissions->add_on_service){?>
                href="<?php echo $this->Html->url('/')?>escorts/adonservices"
                <?php //}else{ ?>
                
                <!-- href="javascript:void(0)"
                onclick="show_modal('Ad-on Services','add_on_service')" --->
                <?php //}?>
               
               ><i class="fa fa-adn"></i>Ad-on Services</a></li>
        <li><a href="<?php echo $this->Html->url('/')?>escorts/mypurchasedlists"><i class="fa fa-database"></i>My Purchased Items</a></li>

        <li><a 
                <?php if($permissions->customer_blacklist){ ?>
                href="<?php echo $this->Html->url('/')?>escorts/myblacklistcustomer"
                <?php }else{?>
                href="javascript:void(0)" onclick="show_modal('Manage Blacklists','customer_blacklist')"
                <?php }?>
               
               ><i class="fa fa-database"></i>Manage Blacklists</a></li>
<!--            <li><a href="<?php echo $this->Html->url('/')?>escorts/escortshops"><i class="fa fa-money"></i>Escort Shops</a></li>-->
        
        <li><a href="<?php echo $this->Html->url('/')?>escorts/credittransactions"><i class="fa fa-bar-chart-o"></i>Credit Transactions</a></li>
        <li><a 
                <?php if($permissions->have_webpage){ ?>
                href="<?php echo $this->Html->url('/')?>escorts/websitetemplate"
                <?php }else{ ?>
                href="javascript:void(0)" onclick="show_modal('Website template','have_webpage')"
                <?php }?>
                ><i class="fa fa-file-image-o"></i>Website template</a></li>
        <li><a href="<?php echo $this->Html->url('/')?>escorts/private_gallery"><i class="fa fa-file-photo-o"></i>Private gallery</a></li>
        <li><a href="<?php echo $this->Html->url('/')?>escorts/accountsettings"><i class="fa fa-gears"></i>Account Settings</a></li>
        <li><a <?php if($permissions->blog){ ?>href="<?php echo $this->webroot; ?>blogs"<?php }else{?>  href="javascript:void(0)" onclick="show_modal('Manage Blog','blog')"<?php }?>
                                         ><i class="fa fa-comments"></i> Manage Blog</a></li>
        <li><a 
                <?php if($permissions->manage_schedule){ ?>
                href="javascript:void(0)"
                <?php }else{ ?>
                href="javascript:void(0)" onclick="show_modal('Manage Booking','manage_schedule')"

                <?php } ?>
               
               
               ><i class="fa fa-send"></i> Manage Booking</a></li>
        <li><a <?php //if($permissions->list_classified){ ?>
                href="<?php echo $this->webroot; ?>escorts/classified"
                <?php //}else{ ?>
                <!--
                href="javascript:void(0)" onclick="show_modal('Classified Ads','list_classified')"-->

                <?php //} ?>><i class="fa fa-bookmark"></i> Classified Ads</a></li>
        <li><a <?php if($permissions->manage_onlineshop){ ?>
               href="<?php echo $this->Html->url('/')?>escorts/escortshops" onclick="show_modal('Manage Shop','manage_onlineshop')"

                <?php }else{ ?>
                href="javascript:void(0)"
                onclick="show_modal('Manage Shop','manage_onlineshop')"
                
                <?php } ?>><i class="fa fa-bank"></i>Manage Shop  </a></li>
        <!--
        <li><a href="javascript:void(0)"><i class="fa fa-envelope"></i> Email Messages<sup class="unread unreadCount" id="unreadmsg">0</sup></a></li>
        <li><a href="javascript:void(0)"><i class="fa fa-rocket"></i> Set Tour Plans</a></li>
        <li><a href="javascript:void(0)"><i class="fa fa-crosshairs"></i> Set Happy Hours</a></li>
        <li><a href="javascript:void(0)"><i class="fa fa-comments"></i> Manage Blogs</a></li>
        <li><a href="javascript:void(0)"><i class="fa fa-send"></i> Manage Schedule</a></li>
        <li><a href="javascript:void(0)"><i class="fa fa-support"></i> Manage Bookings <sup class="unread unreadCount" id="unreadcomment">0</sup></a></li>
        <li><a href="javascript:void(0)"><i class="fa fa-crosshairs"></i> My Wall</a></li>
        <li><a href="javascript:void(0)"><i class="fa fa-bookmark"></i> Classified Ads</a></li>
        <li><a href="javascript:void(0)"><i class="fa fa-comment"></i> My Comments <sup class="unread unreadCount" id="unreadcomment">0</sup></a></li>
        <li><a href="javascript:void(0)"><i class="fa fa-quote-right"></i> My Reviews<sup class="unread unreadCount" id="unreadreview">0</sup></a></li>
        <li><a href="javascript:void(0)"><i class="fa fa-mail-reply"></i> My Followers</a></li>
        <li><a href="javascript:void(0)"><i class="fa fa-bank"></i>Manage Shop  </a></li>
        <li><a href="javascript:void(0)"><i class="fa fa-file-image-o"></i> Create Website </a>
        </li>
        <li><a href="javascript:void(0)"><i class="fa fa-users"></i> Blacklist Customers</a></li>
        <li><a href="javascript:void(0)"><i class="fa fa-shopping-cart"></i> My Orders</a></li>

        <li><a href="javascript:void(0)"><i class="fa fa-adn"></i> Ad-on Services</a></li>

        <li><a href="javascript:void(0)"><i class="fa fa-bar-chart-o"></i>Credit Transactions  </a></li>
        <li><a href="javascript:void(0)"><i class="fa fa-gears"></i> Account Settings</a></li>
        -->
        <li><a href="<?php echo $this->Html->url('/')?>users/logout"><i class="fa fa-power-off"></i> Logout</a></li>
    </ul>
</div>

<?php echo $this->Html->script('bootstrap');?>
  <!-- Modal -->
  <div class="modal fade" id="membershipmodal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="Heading"></h4>
        </div>
        <div class="modal-body">
          <p id="msg_container"></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal" onclick="location.href='<?php echo $this->webroot;?>escorts/escortdashboard'">Go</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <div class="modal fade" id="imgupload" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Photo</h4>
        </div>
        <div class="modal-body">
          <p>Please upgrade your membership for upload more photos</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal" onclick="location.href='<?php echo $this->webroot;?>escorts/escortdashboard'">Go</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <div class="modal fade" id="videoupload" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Video</h4>
        </div>
        <div class="modal-body">
          <p>Please upgrade your membership for upload more videos </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal" onclick="location.href='<?php echo $this->webroot;?>escorts/escortdashboard'">Go</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<script>
  function show_modal(heading,key)
  {
       $.get("<?php echo $this->webroot;?>users/membership_name/"+key,function($result){
       $("#Heading").html(heading);
       $("#msg_container").html("Please upgrade your membership to "+$result);
       $("#membershipmodal").modal("show");    
       });
     
  }
  </script> 
  <style>
      .modal-backdrop.in
      {
           z-index:-1 !important;
      }
  </style>    