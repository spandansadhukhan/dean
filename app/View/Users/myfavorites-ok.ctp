<section id="contentsection">
<div id="wait-div" class="wait-div">
  <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
    Please wait    ....</span> </span> </div>
</div>

<div class="col-left">
<!-- <link href="http://107.170.152.166/team2/escort/css/new-tab.css" rel="stylesheet"> 
	<script src="http://107.170.152.166/team2/escort/js/new-tab2.js" type="text/javascript"></script>-->

<script type="text/javascript">
function removeFromFavorite(prf_id,type,favid)
{		
	BootstrapDialog.confirm("Are you sure to delete from your favorite?", function(result){
	//var x=confirm("Are you sure to delete from your favorite");
	if(result)
	{
		var posturl=siteurl+'customer/removefavorite/'+prf_id+'/'+type;
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
				$("#fav_"+favid).hide('slow').remove();
				if(type=='Profile')
				{
					var fsize = document.getElementById('fav_profile_size').value;
					--fsize;
					$("#fav_profile_size").val(fsize);
					if(fsize==0)
					$("#noprofile_show").slideDown(800);
					$("#remove_fav_"+prf_id).fadeOut(500);
				}
				else if(type=='Agency')
				{
					var fsize =  document.getElementById('fav_agency_size').value;
					--fsize;
					$("#fav_agency_size").val(fsize)
					if(fsize==0)
					$("#noagency_show").slideDown(800);
					$("#remove_fav_agn_"+prf_id).fadeOut(500);
				}
				else if(type=='Parlour')
				{
					var fsize =  document.getElementById('fav_parlour_size').value;
					--fsize;
					$("#fav_parlour_size").val(fsize)
					if(fsize==0)
					$("#noparlour_show").slideDown(800);
					$("#remove_fav_parlour_"+prf_id).fadeOut(500);
				}
				else if(type=='Club')
				{
					var fsize =  document.getElementById('fav_club_size').value;
					--fsize;
					$("#fav_club_size").val(fsize)
					if(fsize==0)
					$("#noclub_show").slideDown(800);
					$("#remove_fav_club_"+prf_id).fadeOut(500);
				}
		  }
		  else
		  {
			  alert(data.error_message);
		  }
	  },
	  error: function (data) {
		 alert("Server Error");
		 return false;
	  }
	});
	return false;
	
}	});
}

</script>
<style>
.unread {
background-color: #eaedf1;
}
.read {
background-color: #f9f9f9;
}

.thumb {
    background-color: #FFFFFF;
    border: 1px solid #EDE6E1;
    overflow: hidden;
    padding: 7px;
    position: relative;
}
.thumb.del a {
    color: #FFFFFF;
    display: block;
    font-size: 15px;
    line-height: 18px;
}
</style>
<style>.del-icon {top: 0; right: 0;}</style>
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
            <h1 style="display:inline-block;">My Favorites</h1>
            
          </section>
                   
          
   
          
          <div class="clr"></div>
          </div>
           
       
          <div class="right-my-account-blocks-inner">
          
            <section class="f-section f-whiteSmoke f-border-top  f-bottom-100" id="section-autoplay">
   <div class="f-content container autoplay">
       
                <div data-options="{"deeplinking": true, "multiline": true,"defaultTab": "tab1","manualTabId":true, 
				"shadows": true, "rounded": false, "size":"medium", "animation": {"effects": "slideH", "duration": 500, 
				"type": "jquery", "easing": "easeOutQuint"}, "position": "top-left"}" class="marginBottom z-tabs-icons2 z-icons-dark  z-icons-large2 z-multiline hover medium z-shadows 
				z-tabs horizontal top top-left silver" data-role="z-tab" data-style="normal" data-orientation="horizontal" 
				data-theme="silver" >

				<ul class="z-tabs-nav z-tabs-mobile" style="display: none;">
				<li><a style="text-align: left;" class="z-link">
                <span class="z-title">My Favorites</span><span class="z-arrow"></span></a></li></ul>
                <i class="z-dropdown-arrow"></i><ul class="z-tabs-nav z-tabs-desktop">
    <li data-link="inbox" class="z-tab"><a class="z-link">Favorite Escorts</a></li>
    <li data-link="outbox" class="z-tab"><a class="z-link">Favorite Agencies</a></li>
    <li data-link="outbox" class="z-tab"><a class="z-link">Favorite Parlours</a></li>
    <li data-link="outbox" class="z-tab"><a class="z-link">Favorite Clubs</a></li>
</ul>

<div class="h-content2 z-container" style="min-height: 442px;">
    <!-- Tab1 -->
    <div class="z-content">
				<div class="z-content-inner">
    	<?php
    	//pr($loginuser); exit;

    	if(!empty($loginuser)){
    	?>
    	<table class="table">
    		<thead>
    			<tr>
    				<td>Sl No#</td>
    				<td>Name</td>
    				<td>Email</td>
    				<td>Image</td>
    			</tr>
    		</thead>
    		<tbody>
    	<?php
    	$count = 1;	
    		foreach ($loginuser as $showuser) {
    	?>
    		<tr>
    			<td><?php echo $count; ?></td>
    			<td><?php echo $showuser['User']['name']; ?></td>
    			<td><?php echo $showuser['User']['email']; ?></td>
    			<td>
    				<a href="<?php echo $this->Html->url('/');?>escort-details/<?php echo base64_encode($showuser['User']['id']);?>"> 
    				<?php if($showuser['User']['profile_image'] != ''){ ?> 
    				<img src="<?php echo $this->webroot; ?>user_images/<?php echo $showuser['User']['profile_image']; ?>" height="50px" width="50px"> 
    				<?php }else{ ?>
    				<img src="<?php echo $this->webroot; ?>user_images/noimage.png" height="50px" width="50px"> 
    				<?php } ?>
    			</a>
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
		<!-- <div class="z-content">
			<div class="z-content-inner">
				<span id="input_hidden_fields"></span>
				<div class="for-msg">
				<ul>
				<input type="hidden" id="fav_profile_size" value="0">
				<div class="no-record" id="noprofile_show" >
				You have not added any escort in your favorite list yet
				</div>
				</ul>
				</div>
			</div>
		</div> -->
		<?php } ?>
		</div>
			</div>
	<!-- Tab1 End -->
	<!-- Tab2 -->
			<!-- <div class="z-content">
				<div class="z-content-inner">

				<span id="input_hidden_fieldsoutbox"></span>
				<div class="table-responsive for-msg">
				<input type="hidden" id="fav_agency_size" value="0">
				<div class="no-record" id="noagency_show" >You have not added any agency in your favorite list yet</div>
				</div>
				</div>
			</div> -->
     <!-- Tab3 End-->
  <!-- Tab3 -->
			<!-- <div class="z-content">
				<div class="z-content-inner">
				<span id="input_hidden_fieldsoutbox"></span>
				<div class="table-responsive for-msg">
				<input type="hidden" id="fav_parlour_size" value="0">
				<div class="no-record" id="noparlour_show" >You have not added any parlour in your favorite list yet</div>
				</div>
				</div>
			</div> -->
   
    <!-- Tab3 -->
    <!-- Tab4 -->
		<!-- <div class="z-content">
		<div class="z-content-inner">
						
		<span id="input_hidden_fieldsoutbox"></span>
		<div class="table-responsive for-msg">
		<input type="hidden" id="fav_club_size" value="0">

		<div class="no-record" id="noclub_show" >You have not added any club in your favorite list yet</div>									

		</div>
		</div>
		</div> -->
    
    <!-- Tab4 End-->
    </div>

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
 <!--<div id="promo-bottom">
 
 </div>-->
</section>
</section>
</section>
</div>

<div class="col-right">
      <section id="banners">
          
   
   
                <a class="banner200x333 promo" href="#"> <span class="advertiseText">Advertise<br />
    Here</span> <span class="targetText">Get targeted traffic<br>
    to your website</span>
    <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
    </a>
        <a class="banner200x333 promo" href="#"> <span class="advertiseText">Advertise<br />
    Here</span> <span class="targetText">Get targeted traffic<br>
    to your website</span>
    <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
    </a>
                    <a class="banner200x200 promo" href="#"> <span class="advertiseText">Advertise<br />
    Here</span> <span class="targetText">Get targeted traffic<br>
    to your website</span>
    <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
    </a>
        <a class="banner200x200 promo" href="#"> <span class="advertiseText">Advertise<br />
    Here</span> <span class="targetText">Get targeted traffic<br>
    to your website</span>
    <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
    </a>
                    <a class="banner200x100 promo" href="#"> <span class="advertiseText">Advertise<br />
    Here</span> <span class="targetText">Get targeted traffic<br>
    to your website</span>
    <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
    </a>
        <a class="banner200x100 promo" href="#"> <span class="advertiseText">Advertise<br />
    Here</span> <span class="targetText">Get targeted traffic<br>
    to your website</span>
    <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
    </a>
          </section>
</div>
</section>
<div class="clr"></div>