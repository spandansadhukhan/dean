<section id="contentsection">
<div id="wait-div" class="wait-div">
  <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
    Please wait    ....</span> </span> </div>
</div>

<div class="col-full">
<link href="http://107.170.152.166/team2/escort/css/new-tab.css" rel="stylesheet">
<script src="http://107.170.152.166/team2/escort/js/new-tab2.js" type="text/javascript"></script>
<script src="http://107.170.152.166/team2/escort/js/new.js" type="text/javascript"></script>

<!--For multiple upload js-->
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" />
<link rel="stylesheet" href="http://107.170.152.166/team2/escort/css/jquery.ui.plupload.css" type="text/css" />
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<!-- production -->
<script type="text/javascript" src="http://107.170.152.166/team2/escort/js/plupload.full.min.js"></script>
<script type="text/javascript" src="http://107.170.152.166/team2/escort/js/jquery.ui.plupload/jquery.ui.plupload.js"></script>
<script type="text/javascript" src="http://107.170.152.166/team2/escort/js/jquery.pulsate.min.js"></script>


<script>
function getRegion(country_id)
{
	if(country_id == '')
	{
		$('#region').val('');
		cityCheck();
		return false;
	}

		var posturl=siteurl+'getregionjquery/'+country_id;
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
			  		$('#region').html('');
					$('#city').html('');
					$('#s2id_city span').text('');
					$('#s2id_region span').text('');
					$('#region_div').show('slow');
					$('#region').html('<option value="">Select Region</option>');
					$('#city').html('<option value="">Select Region First</option>');
					$('#city1').html('<option value="">Select Region First</option>');
					$.each(data.region, function(key, value) {

						$('#region').append('<option value="'+value.id+'">'+value.region_name+'</option>');


					});
		 }
		 else
		 {
			 $('#region').html('');
			 $('#city').html('');
			 $('#city1').html('');
			 $('#s2id_city span').text('');
			 $('#s2id_region span').text('');
			 $('#region_div').hide('slow');
			 getCity_country(country_id);
		  }
	  },
	  error: function (data) {
		 alert("Server Error.");
		 return false;
	  }
	});

	return false;

}

function getCity_country(country_id)
{
	if(country_id == '')
	{
		$('#city').val('');
		$('#city1').val('');
		regionCheck();
		return false;
	}

		var posturl=siteurl+'getcitybyCountryjquery/'+country_id;
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
			 		//var textval	=	'http://layout9.demoparlour.com/advdirectory/profile/';
					//var Response	=	data.slug;
					//var display	=	textval+Response;


			  		$('#city').html('');
			  		$('#city1').html('');
					$('#s2id_city span').text('');
					$('#city').html('<option value="">Select City</option>');
					$('#city1').html('<option value="">Select City</option>');
					$.each(data.city, function(key, value) {

						$('#city').append('<option value="'+value.id+'">'+value.city_name+'</option>');
						$('#city1').append('<option value="'+value.id+'">'+value.city_name+'</option>');
					});
					//$('#city').value(display);
		 }
		 else{
					$('#city').html('');
					$('#s2id_city span').text('');
					$('#city').html('<option value="">No City Found</option>');
					$('#city1').html('<option value="">No City Found</option>');
			 }
	  },
	  error: function (data) {
		 alert("Server Error.");
		 return false;
	  }
	});

	return false;

}

function getCity(region_id)
{
	if(region_id == '')
	{
		$('#city').val('');
		$('#city1').val('');
		regionCheck();
		return false;
	}

		var posturl=siteurl+'getcityjquery/'+region_id;
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
			 		//var textval	=	'http://layout9.demoparlour.com/advdirectory/profile/';
					//var Response	=	data.slug;
					//var display	=	textval+Response;


			  		$('#city').html('');
			  		$('#city1').html('');
					$('#s2id_city span').text('');
					$('#city').html('<option value="">Select City</option>');
					$.each(data.city, function(key, value) {
						$('#city').append('<option value="'+value.id+'">'+value.city_name+'</option>');
						$('#city1').append('<option value="'+value.id+'">'+value.city_name+'</option>');
					});
					//$('#city').value(display);
		 }
		 else{
					$('#city').html('');
					$('#city1').html('');
					$('#s2id_city span').text('');
					$('#city').html('<option value="">No City Found</option>');
					$('#city1').html('<option value="">No City Found</option>');
			 }
	  },
	  error: function (data) {
		 alert("Server Error.");
		 return false;
	  }
	});

	return false;

}
function changeStatus(task,id)
{
	if(task=='No')
	{
		var status_message= 'Unpublish';
	}
	else
	{
		var status_message= 'Publish';
	}
	BootstrapDialog.confirm('Are you sure to '+status_message+' this Item?', function(r){
	if (r==true)
	{
		var siteurl="http://layout9.demoparlour.com/advdirectory/";
		var posturl=siteurl+'classified-ads/setstatus/'+task+'/'+id;
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
				if(task=='Yes')
				{
				   $("#publish_status_"+id).text('Published');
				   $(".pactive_"+id).hide('slow');
				   $(".pinactive_"+id).show('slow');
				} else {
				   $("#publish_status_"+id).text('Unpublished');
				   $(".pinactive_"+id).hide('slow');
				   $(".pactive_"+id).show('slow');
				}

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

function deleteAd(id)
{
	BootstrapDialog.confirm('Are You Sure To Delete This Ad?', function(r){
	//var r=confirm("Are You Sure To Delete This Ad ?");
	if (r==true)
	{
		var siteurl="http://layout9.demoparlour.com/advdirectory/";
		var posturl=siteurl+'classified-ads/delete/'+id;
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
				$("#row_"+id).hide('slow').remove();
				 //$("#success").html(data.success_message);
				if(data.no_record)
				{
					$("#no_record").show('slow');
				}
				//$("#success").fadeOut('slow');
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
function view_classified(id)
{
			var tempasset ='http://layout9.demoparlour.com/advdirectory/assets/admin/';
			BootstrapDialog.show({
			type : BootstrapDialog.TYPE_PRIMARY,
			title: 'My Classified Ads',
			message: $('<div><div style="text-align:center;"> <img src="'+tempasset+'img/ajax-modal-loading.gif" alt="" class="loading"></div></div>').load('http://layout9.demoparlour.com/advdirectory/classified-ads/view-record/'+id),
			onshow: function(dialogRef){}
			});
}
</script>
<div class="col-left">
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
                                                <a style="display:none;" href="#;" class="website_activate"></a>
                                                    <?php echo $this->element('parlor_sidebar'); ?>
                                                <div class="triangleBottomleft firstItem"></div>
                                            </div>
<div class="right-my-account">
<div class="right-my-account-blocks">
<div class="detail-heading">

    <section class="title-left">
      <!--      <a href="http://layout9.demoparlour.com/advdirectory/user/manage-shop" class="ulink"> Manage Shop </a> >>  Physical items -->
            <br>
            <h1 style="display:inline-block;"> Manage Events </h1>

          </section>

          <div class="clr"></div>
          </div>

          <div class="right-my-account-blocks-inner">
							<div class="smart-forms">
                  		 
                  		 
                  		 
                  		 <div class="table-responsive for-msg">
                            <div id="countp" style="display:none">0</div><table class="table table-vcenter table-striped">
                            <thead>
                            <tr><th>Location</th>
                            <th>From Date</th>
                            <th>To Date</th>
                            <th>Phone Number</th>
                              <th>Option</th>
                            </tr></thead>
                                <tbody>
																		
                                   </tbody>
                                    <tbody><tr id="no-record">
									   <td class="no-record" colspan="7">No Record Found</td>
									 </tr>
                            </tbody></table>
                        </div>
                  		 
                  		 
                </div>
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

<!-- For multiple uploader -->
<script type="text/javascript">
// Initialize the widget when the DOM is ready
$(function() {
	$("#uploader").plupload({
		// General settings
		runtimes : 'html5,flash,silverlight,html4',
		url : '#',
		max_file_count: 50,
		chunk_size: '1mb',
		// Resize images on clientside if we can
		filters : {
			// Maximum file size
			max_file_size : '1000mb',
			// Specify what files to browse for
			mime_types: [
				{title : "Image files", extensions : "jpg,gif,png,jpeg"},
				{title : "Zip files", extensions : "zip"}
			]
		},
		// Rename files by clicking on their titles
		rename: true,
		// Sort files
		sortable: true,
		// Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
		dragdrop: true,
		// Views to activate
		views: {
			list: true,
			thumbs: true, // Show thumbs
			active: 'thumbs'
		},
		// Flash settings
		flash_swf_url : '#',
		// Silverlight settings
		silverlight_xap_url : '#'
	});
	$('#uploader').on('complete', function() {
				 $("#button_frm").removeAttr("disabled");
				  $('#button_frm').pulsate({
                    color: "#399bc3",
                    repeat: true
                });
	});
});
</script>
</div>


 <div class="col-right">
       <?php echo $this->element('user_banner');?>
    </div>
    
</section>
<div class="clr"></div>