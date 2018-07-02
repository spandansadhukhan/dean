<div class="left-my-account-menu">
    <ul>
        <li><a href="<?php echo $this->Html->url('/')?>agencies/agencydashboard" class="active"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="<?php echo $this->Html->url('/')?>agencies/editagentprofile"><i class="fa fa-user"></i> My Agency Profile </a></li>
        
        
        <li><a href="<?php echo $this->Html->url('/')?>agencies/addescort"><i class="fa fa-plus-circle"></i> Add New Escort</a>
            
            <div class="clr"></div></li>
        <li><a href="<?php echo $this->Html->url('/')?>agencies/membership"><i class="fa fa-plus-circle"></i> Upgrade Membership</a>
            
            <div class="clr"></div></li>
        
        <li>
            
            <a href="<?php echo $this->Html->url('/')?>agencies/postbanner"><i class="fa fa-plus-circle"></i> Post Banner</a>
            
            <div class="clr"></div>
        </li>
       
        
        
        <li><a href="<?php echo $this->Html->url('/')?>agencies/mypphoto"><i class="fa fa-file-photo-o"></i> Photo Gallery</a>
            <div class="clr"></div></li>
        <li><a 
                
                <?php
                if($permissions->upload_video)
                {    
                ?>
                
                href="<?php echo $this->Html->url('/')?>agencies/myvideo"
                <?php }else{?>
                href="javascript:void(0)"
                onclick="javascript:$('#videoupload').modal('show')"

                <?php } ?>
               
               ><i class="fa fa-video-camera"></i> Video Gallery</a></li>
        <li><a 
                <?php if($permissions->set_happyhour){?>
                href="javascript:void(0)"
                <?php }else{?>
                href="javascript:void(0)" onclick="show_modal('Set happy Hours','set_happyhour')"

                <?php }?>
               
               
               
               ><i class="fa fa-envelope"></i>Set happy Hours</a></li>
        <li><a 
                <?php
                if($permissions->messageing)
                {    
                ?>
                href="<?php echo $this->Html->url('/')?>agencies/emailmessage"
                <?php }else{ ?>
                href="javascript:void(0)" onclick="show_modal('Email Messages','messageing')"

                <?php } ?>><i class="fa fa-envelope"></i> Email Messages<sup class="unread unreadCount" id="unreadmsg">0</sup></a><div class="clr"></div></li>
        <li><a 
                <?php
                if($permissions->blog)
                {    
                ?>
                href="<?php echo $this->Html->url('/')?>agencies/manageblogs"
                <?php }else{?>
                href="javascript:void(0)" onclick="show_modal('Manage Blogs','blog')"
                <?php }?>><i class="fa fa-file-code-o"></i> Manage Blogs</a><div class="clr"></div></li>
        <li><a 
                <?php
                if($permissions->classified)
                {    
                ?>
                href="<?php echo $this->Html->url('/')?>agencies/classifiedads"
                <?php }else{?>
                href="javascript:void(0)" onclick="show_modal('Classified Ads','classified')"
                <?php }?>
               
               
               ><i class="fa fa-bookmark"></i> Classified Ads</a><div class="clr"></div></li>

        <li><a 
                <?php
                if($permissions->upcomeing_event)
                {
               ?>
               href="<?php echo $this->Html->url('/')?>agencies/manageevents"

                <?php
                }else{
                ?>
               href="javascript:void(0)"
               onclick="show_modal('Manage Events','upcomeing_event');"
                <?php } ?>
               
               ><i class="fa fa-calendar"></i> Manage Events</a></li>
               
                <li><a 
                <?php if($permissions->own_website){ ?>
                href="javascript:void(0)" 
                <?php }else{ ?>
                href="javascript:void(0)" onclick="show_modal('Website template','own_website')"
                <?php }?>
                ><i class="fa fa-file-image-o"></i>Website template</a></li>

        <li><a 
                
                <?php 
                if($permissions->customer_blacklist)
                {
                ?>
                href="<?php echo $this->Html->url('/')?>agencies/blacklist"
                <?php }else{?>
                href="javascript:void(0)" onclick="show_modal('Blacklist Customers','customer_blacklist')"
                <?php }?>
               
               
               ><i class="fa fa-users"></i> Blacklist Customers</a></li>

        <li><a 
               <?php
                if($permissions->add_onservice)
                {    
                ?> 
                href="<?php echo $this->Html->url('/')?>agencies/adonservice"
                <?php }else{ ?>
                href="javascript:void(0)" onclick="show_modal('Ad-on Services','add_onservice')"

                <?php } ?>
                
                
                ><i class="fa fa-adn"></i> Ad-on Services</a></li>

        
        <li><a href="<?php echo $this->Html->url('/')?>agencies/myorders"><i class="fa fa-shopping-cart"></i> My Orders</a><div class="clr"></div></li>
        <li><a href="<?php echo $this->Html->url('/')?>agencies/credittransaction"><i class="fa fa-bar-chart-o"></i> Credit Transactions  </a><div class="clr"></div></li>
      
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
            <button type="button" class="btn btn-info" onclick="location.href='<?php echo $this->webroot;?>agencies/membership'">Go</button>
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
          <p>Please upgrade your membership for upload  videos </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-info" onclick="location.href='<?php echo $this->webroot;?>agencies/membership'">Go</button>
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
          <button type="button" class="btn btn-info" onclick="location.href='<?php echo $this->webroot;?>agencies/membership'">Go</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <script>
  function show_modal(heading,key)
  {
       $.get("<?php echo $this->webroot;?>agencies/membership_name/"+key,function($result){
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

