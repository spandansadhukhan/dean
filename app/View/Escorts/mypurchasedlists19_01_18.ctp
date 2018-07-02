<section id="contentsection">
<div id="wait-div" class="wait-div">
  <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
    Please wait    ....</span> </span> </div>
</div>

<div class="col-left">
<link href="http://107.170.152.166/team2/escort/css/new-tab.css" rel="stylesheet">
<script src="http://107.170.152.166/team2/escort/js/new-tab2.js" type="text/javascript"></script>
<script src="http://107.170.152.166/team2/escort/js/new.js" type="text/javascript"></script>

<script type="text/javascript">
function updateOrder(t_id)
{
BootstrapDialog.confirm('"If you have received this item, set the order status completed".A completed order means you have received the item from seller in satisfactory condition?', function(r){
	if (r==true)
	{
		var siteurl="http://107.170.152.166/team2/escort/";
		var posturl=siteurl+'customer/set-delievery-status/'+t_id;
		$.ajax({
		url: posturl,
		dataType: 'json',
		type: "GET",
		beforeSend: function(){
				 $('#wait-div').show();
				},
	  success: function(data){
	  $('#wait-div').hide();
		 if(data.success)
		  {  
				   $("#delievery_h_"+t_id).hide('slow');
				   parent.$.fancybox.close();
				
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
<div class="my-account-inner">
	<div class="sb-toggle-right navbar-right">
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
          
            <h1 style="display:inline-block;"> My Purchase History</h1>
            
          </section>
                  
          <div class="clr"></div>
          </div>
 
          <div class="right-my-account-blocks-inner">
           <section class="my-profile-part">
                <section class="manage-shop shopfull5">
                  <section class="manage-title"><i class="fa fa-shopping-cart"></i>
                    <h1>My Order Statistics</h1>
                    <h5>Manage all your orders</h5>
                  </section>
                  <section class="manage-couting clear sadadad-sdsd">
                    <section class="mc1"> <cite>Total Items <br>
                      Purchased </cite> <span>
                      0                      </span> </section>
                    <section class="mc1"> <cite>Total Webcam<br>
                      Session Purchased </cite> <span>
                      0                      </span> </section>
                    <section class="mc1"> <cite>Total Private Gallery <br>
                      Purchased </cite> <span>
                      0                      </span> </section>
                    <section class="mc1"> <cite>Total Private Videos <br>
					Purchased </cite> <span>
                      0                      </span> </section>
                    <section class="mc1"> <cite>Total <br>
                      Order Amount </cite> <span>
                      0                      Coints                      </span> </section>
                  </section>
                  <section class="clr"></section>
                </section>
                <section class="clr"></section>
              </section>
                 <br />
          	   <section class="f-section f-whiteSmoke f-border-top  f-bottom-100" id="section-autoplay">
					<div class="f-content autoplay">
			   
						<div data-options="{"deeplinking": true, "multiline": true,"defaultTab": "tab1","manualTabId":true, 
						"shadows": true, "rounded": false, "size":"medium", "animation": {"effects": "slideH", "duration": 500, 
						"type": "jquery", "easing": "easeOutQuint"}, "position": "top-left"}" class="marginBottom z-tabs-icons2 z-icons-dark  z-icons-large2 z-multiline hover medium z-shadows 
						z-tabs horizontal top top-left silver" data-role="z-tab" data-style="normal" data-orientation="horizontal" 
						data-theme="silver" >

						<ul class="z-tabs-nav z-tabs-mobile" style="display: none;">
							<li><a style="text-align: left;" class="z-link">
								<span class="z-title"></span><span class="z-arrow"></span></a></li></ul>
							<i class="z-dropdown-arrow"></i><ul class="z-tabs-nav z-tabs-desktop">
							<li data-link="inbox" class="z-tab"><a class="z-link">Item History</a></li>
							<li data-link="outbox" class="z-tab"><a class="z-link">Webcam Sessions History</a></li>
							<li data-link="compose" class="z-tab"><a class="z-link">Private Photo History</a></li>
							<li data-link="compose" class="z-tab"><a class="z-link">Private Video History</a></li>
							
						</ul>
						
								<div class="h-content2 z-container" style="min-height: 442px;">
									<!-- Tab1 -->
									
											<div class="z-content">
											<div class="z-content-inner">
                                                
      <div class="table-responsive for-msg">
                            <table class="table table-vcenter table-striped">
                            <thead>
                            <tr><th>Ord Id</th>
                            <th>Item Information</th>
                            <th>Seller Information</th>
                            <th>Order Amount</th>
                             <th></th>
                              <th>Order Status</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            
                                <tbody>
                                <span id="countp" style=" display:none">
                     
                      </span>
                   
									                                         
                                     
                                                                        </tbody>
                                    
                            </table>
                               <section class="no-record" id="noitem" >No  Item Purchased.</section>
                        </div>                                          
                                                
                                                
                                                
                       								    
                    <section class="clr"></section>
												</div>
													
										</div>
							
							 
                                        <!-- Tab1 End -->
									<!-- Tab2 -->
											<div class="z-content">
												<div class="z-content-inner">
                                                
      <div class="table-responsive for-msg">
                            <table class="table table-vcenter table-striped">
                            <thead>
                            <tr><th>Ord Id</th>
                            <th>Item Information</th>
                            <th>Seller Information</th>
                            <th>Order Amount</th>
                             <th>Order Date</th>
                              <th>Order Status</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            
                                <tbody>
                                <span id="countp" style=" display:none">
                     
                      </span>
                   
									                                         
                                     
                                                                        </tbody>
                                    
                            </table>
                               <section class="no-record" id="noitem" >No Webscam session Purchased.</section>
                        </div>                                          
                                                
                                                
                                                
                       								    
                    <section class="clr"></section>
												</div>
											</div>
									<!-- Tab2 End-->
									<!-- Tab3 -->
											<div class="z-content">
												<div class="z-content-inner">
                                                
      <div class="table-responsive for-msg">
                            <table class="table table-vcenter table-striped">
                            <thead>
                            <tr><th>Ord Id</th>
                            <th>Item Information</th>
                            <th>Seller Information</th>
                            <th>Order Amount</th>
                             <th>Order Date</th>
                              <th>Order Status</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            
                                <tbody>
                                <span id="countp" style=" display:none">
                     
                      </span>
                   
									                                         
                                     
                                                                        </tbody>
                                    
                            </table>
                            <section class="no-record" id="noitem" >No Private Photo Purchased.</section>
                        </div>                                          
                                                
                                                
                                                
                       								    
                    <section class="clr"></section>
												</div>
												</div>
											<!-- Tab3 End-->
											<!-- Tab4 -->
											<div class="z-content">
												<div class="z-content-inner">
                                                
      <div class="table-responsive for-msg">
                            <table class="table table-vcenter table-striped">
                           <thead>
                            <tr><th>Ord Id</th>
                            <th>Item Information</th>
                            <th>Seller Information</th>
                            <th>Order Amount</th>
                             <th>Order Date</th>
                              <th>Order Status</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            
                                <tbody>
                                <span id="countp" style=" display:none">
                     
                      </span>
                   
									                                         
                                     
                                                                        </tbody>
                                    
                            </table>
                            <section class="no-record" id="noitem" >No Private Video Purchased.</section>
                        </div>                                          
                                                
                                                
                                                
                       								    
                    <section class="clr"></section>
												</div>
											</div>
									<!-- Tab4 End-->
									
									
								</div>

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

</section>
</section>
</section>
</div>

<div class="col-right">
    <?php echo $this->element("user_banner"); ?>    
    </div>
</section>
<div class="clr"></div>