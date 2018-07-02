function onlyCustomer()
{
	BootstrapDialog.alert(favmembertype);
}
function onlyCustomerFav()
{
	BootstrapDialog.alert(favmembertype);
}
function alreadyVoted()
{
	BootstrapDialog.alert(voted);		
}
 
function addremoveFromFavorite($this,prf_id)
{
	var sessionId=logged_member_id;
	if(sessionId != '')
	{
		var posturl=siteurl+'escort-addremovefavorite/'+prf_id+'/'+pagetype;
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
			  if(data.task=='add')
			  {
				  $($this).find('.fa-star').addClass('favourite');
				  $("#favspan").text(rmfavorite);
				  $('#totalfav').html(data.totalfav);
			  }
			  else
			  {
				  $($this).find('.fa-star').removeClass('favourite');
				  $("#favspan").text(addfavorite);
				  $('#totalfav').html(data.totalfav);
			  }
		  }
	  },
	  error: function (data) {
		 BootstrapDialog.alert(servrerror);
		 return false;
	  }
	});
	}
	else
	{
		openLoginPopUp(loginfirst);
	}
	return false;
}

function voteMe($this,mem_id)
{
	sessionId=logged_member_id;
	mem_type=logged_member_type;
	if(sessionId != '')
	{
		if(!pagevoteurl)
		var pagevoteurl = 'escort-vote';
		var posturl=siteurl+pagevoteurl+'/'+mem_id;
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
			  $($this).find('.fa-thumbs-up').addClass('votedcolor');
			  $('#totalvotes').html(data.totalvotes);
			  $('#vote').text("Voted");
			  $('.notification').show();
			  $('#voteStatus').html(data.voteStatus);
			  $(".voteme").attr('onclick',"javascript:alreadyVoted();");
		  }
	  },
	  error: function (data) {
		 BootstrapDialog.alert(servrerror);
		 return false;
	  }
	});
	}
	else
	{
		openLoginPopUp(loginfirst);
	}
	return false;
}

function likeMyStatus(sta_id,mem_id)
{
	sessionId=logged_member_id;
	mem_type=logged_member_type;
	if(sessionId != '' && mem_type=='Customer')
	{
		var posturl = siteurl+'escort-like-status/'+mem_id+'/'+sta_id;
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
				  $('#likemystatus_'+sta_id).html(data.datatoappend);
				  $('#likecount_'+sta_id).text(data.likeCount);
			  }
		  },
		  error: function (data) {
			 BootstrapDialog.alert(servrerror);
			 return false;
		  }
		});
	}
	else if(sessionId)
	{
		BootstrapDialog.alert("Please login as a customer account");
		return false;
	}
	else
	{		
		openLoginPopUp();
	}
	return false;
}


function dislikeMyStatus(sta_id,mem_id)
{
	sessionId=logged_member_id;
	mem_type=logged_member_type;
	if(sessionId != '' && mem_type=='Customer')
	{		
		window.location.href=siteurl+'escort-dislike-status/'+mem_id+'/'+sta_id;			
	}
	else if(sessionId)
	{
		BootstrapDialog.alert("Please login as a customer account");
		return false;
	}
	else
	{		
		BootstrapDialog.alert(loginfirst);
	}
	return false;		
}

function send_message(name,slug)
{
	if(!logged_member_id)
	{
		openLoginPopUp();
	}
	else
	{
		var tempasset =admintemplateassets;
		BootstrapDialog.show({
		type : BootstrapDialog.TYPE_PRIMARY,
		title: 'Send Message To '+name,
		message: $('<div><div style="text-align:center;"> <img src="'+tempasset+'img/ajax-modal-loading.gif" alt="" class="loading"></div></div>').load(siteurl+'send-message/'+slug),
		onshow: function(dialogRef){}
		});
	}
}
	
function initialize() {
	var latLng = new google.maps.LatLng(late,longitude);
	var mapCanvas = document.getElementById('map-canvas');
	var mapOptions = {
	  center: latLng,
	  zoom: 12,
	  mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	var map = new google.maps.Map(mapCanvas, mapOptions)

	var marker = new google.maps.Marker({
	  map: map,
	  position: latLng,
	  draggable: false
	});
  }
	
	$(document).on("click", ".more", function (event) {
		var ID = $(this).attr("id");
		if(ID)
		{
			$("#more"+ID).html('<img src="'+templateassets+'images/loading.gif"  width="20" height="20" /> Please wait system is load more records..');
				$.ajax({
						type: "GET",
						url: siteurl+more_url+"/"+ID,
						cache: false,
						success: function(html){
							
						$("#review-list").append(html);
						$("#more"+ID).remove();
						$("#more_clr"+ID).remove();
						}
					});
		}
		else
		{
			$(".morebox").html('<div class="no-record">'+no_record+'..</div>');
		}
		return false;
	});
	
	
	$(document).on("click", ".send_message", function (event) {
		if(!logged_member_id)
		{
			openLoginPopUp();
		}
		else
		{
			var tempasset =admintemplateassets;
			BootstrapDialog.show({
			type : BootstrapDialog.TYPE_PRIMARY,
			title: msgtitle,
			message: $('<div><div style="text-align:center;"> <img src="'+tempasset+'img/ajax-modal-loading.gif" alt="" class="loading"></div></div>').load(siteurl+'send-message/'+slug),
			onshow: function(dialogRef){}
			});
		}
	});
	
	
	$(document).on("click", ".alert_me_pop", function (event) {
		if(!logged_member_id)
		{
			openLoginPopUp();
		}
		else
		{
			var tempasset =admintemplateassets;
			BootstrapDialog.show({
			type : BootstrapDialog.TYPE_PRIMARY,
			title: alerttitle,
			message: $('<div><div style="text-align:center;"> <img src="'+tempasset+'img/ajax-modal-loading.gif" alt="" class="loading"></div></div>').load(siteurl+'escort-alert-me/'+slug),
			onshow: function(dialogRef){}
			});
		}
	});
	
	$(document).on("click", ".reported_user_pop", function (event) {
		if(!logged_member_id)
		{
			openLoginPopUp();
		}
		else
		{
			var tempasset = admintemplateassets;
			BootstrapDialog.show({
			type : BootstrapDialog.TYPE_PRIMARY,
			title: fktitle,
			message: $('<div><div style="text-align:center;"> <img src="'+tempasset+'img/ajax-modal-loading.gif" alt="" class="loading"></div></div>').load(siteurl+'fake-report/'+slug),
			onshow: function(dialogRef){}
			});
		}
	});
	
	$(document).on("click", ".write_review_pop", function (event) {
		if(!logged_member_id)
		{
			openLoginPopUp();
		}
		else
		{
			if(!pagereviewurl)
			var pagereviewurl = 'escort-write-reviews';
			var tempasset =admintemplateassets;
			BootstrapDialog.show({
			type : BootstrapDialog.TYPE_PRIMARY,
			title: rwtitle,
			message: $('<div><div style="text-align:center;"> <img src="'+tempasset+'img/ajax-modal-loading.gif" alt="" class="loading"></div></div>').load(siteurl+pagereviewurl+'/'+slug),
			onshow: function(dialogRef){}
			});
		}
	});
	
	
	$(document).on("click", ".chat_now", function (event) {
		if(!logged_member_id)
		{
			openLoginPopUp();
		}
		else if(logged_member_type =='Customer')
		{
			jqac.arrowchat.chatWith(id);
		}
		else
		{
			BootstrapDialog.alert(chatmember);
		}
	});
	
	$(document).on("click", ".more_about", function (event) {
		BootstrapDialog.show({
		type : BootstrapDialog.TYPE_PRIMARY,
		title: biotitle,
		message: $('<div></div>').load(siteurl+'escort-profiles/more-about/'+slug),
		});
	});
	
	$(document).on("click", ".write_comment", function (event) {
		if(!logged_member_id)
		{
			openLoginPopUp();
		}
		else
		{
			var tempasset =admintemplateassets;
			BootstrapDialog.show({
			type : BootstrapDialog.TYPE_PRIMARY,
			title: cmntitle,
			message: $('<div><div style="text-align:center;"> <img src="'+tempasset+'img/ajax-modal-loading.gif" alt="" class="loading"></div></div>').load(siteurl+'escort-write-comment/'+slug),
			onshow: function(dialogRef){}
			});
		}
	});
	
	$(document).on("click", ".book_me", function (event) {
		if(!logged_member_id)
		{
			openLoginPopUp();
		}
		else
		{
			BootstrapDialog.show({
			type : BootstrapDialog.TYPE_PRIMARY,
			title: bktitle,
			message: $('<div><div style="text-align:center;"> <img src="'+admintemplateassets+'img/ajax-modal-loading.gif" alt="" class="loading"></div></div>').load(siteurl+'escort-booking/'+slug),
			onshow: function(dialogRef){}
			});
		}
	});

   
   $(document).on("click", ".load_more_img", function (event) {
	
	var ID = $(this).attr("id");
	
	if(ID)
		{
		
			$("#more_images"+ID).html('<img src="'+templateassets+'images/loading-bar.gif"  width="50" height="50" />');
			$.ajax({
					type: "GET",
					url: siteurl+"get-escort-images/"+id+"/"+ID,
					dataType: 'json',
					cache: false,
					success: function(data){
					result = parseInt(ID,10);
					var nextImgoffset = parseInt(result + 3);
					if(nextImgoffset < totalimagesCount)
					$('#more_images'+ID).hide();
					if(data.success)
					{
						$.each(data.images, function(key, value) {
								dataAppend 	= '<li style="margin-bottom: 10px;"><a class="fancybox-effects-a" data-fancybox-group="gallery" href="'+value.image_url_full+'"><img src="'+value.image_url+'" alt="" /></a></li>';
							$('#laod_images').append(dataAppend);
						});
						if((data.images).length==0)
						$('.no-record').html('<center><h3>'+noimage+'</h3></center>');
						else
						{
							result = parseInt(ID,10);
							var nextImgoffset = parseInt(result + 3);
							$('#laod_images').append('<li><div id="more_images'+nextImgoffset+'" class="no-record"><a href="javascript:void(0);" id="'+nextImgoffset+'" class="buttonGrey load_more_img">'+loadmore+'</a></div></li>');
						}
					}
					else
					{
						$('.no-record').html('<center>'+noimage+'</center>');
					}
				  },
				  error: function (data) {
					 alert(servrerror);
					 return false;
				  }
				});
		}
	else
		{
			
			$(".morebox").html('<div class="no-record">'+nomoreimages+'..</div>');
		}
		return false;
	});

	$(document).on("click", ".load_more_comments", function (event) {

		var ID = $(this).attr("id");
		
			if(ID)
				{
					$.ajax({
							type: "GET",
							url: siteurl+'get-more-comments/'+id+'/'+ID,
							dataType: 'json',
							cache: false,
							success: function(data){
							result = parseInt(ID,10);
							var nextCommentoffset = parseInt(result + 3);
							if(nextCommentoffset < totalcommentCount)
							$('#more_comments'+ID).hide();
							if(data.success)
							{
								$.each(data.comments, function(key, value) {
									
									dataAppend 	='<section id="more_section_10" class="more_section" style="margin-bottom:10px">';
									dataAppend 	+='<ul><b><li><i class="fa fa-user"></i>'+value.name+' <span style="float:right;"><i class="fa fa-calendar"></i>'+value.date+'</span></li></b>';
									dataAppend 	+='<li><i class="fa fa-comment"></i>'+value.comment+'</li><section class="clr"></section></ul></section>';
									$('.commentlist').append(dataAppend);
								});
								if((data.comments).length==0)
								{
								$('.commentlist').append('<div class="no-record" style="width:650px">'+nocomment+'</div>');
								$('#more_comments'+ID).hide();
								}
								else
								{
									result = parseInt(ID,10);
									var nextCommentoffset = parseInt(result + 3);
									$('.commentlist').append('<h3 id="more_comments'+nextCommentoffset+'" class="m-button"><a style="float:right" class="auto-wi load_more_comments"  href="javascript:void(0)" id="'+nextCommentoffset+'">'+nocomment+'</a></h3>');
								}
							}
							else
							{
								$('.commentlist').append('<div class="no-record" style="width:650px"> '+nocomment+'</div>');
							}
						  },
						  error: function (data) {
							 alert(servrerror);
							 return false;
						  }
						});
				}
			else
				{
					
					$(".morebox").html('<div class="no-record">'+nomorecomment+'..</div>');
				}
		return false;
	});
	  
   //google.maps.event.addDomListener(window, 'load', initialize);
   
   $(document).on('click', '.map', function() {
		initialize();
	});
	
function viewModel(slug,name)
{
		
			var tempasset =admintemplateassets;
			BootstrapDialog.show({
			type : BootstrapDialog.TYPE_PRIMARY,
			title: name+' '+mdltitle,
			message: $('<div><div style="text-align:center;"> <img src="'+tempasset+'img/ajax-modal-loading.gif" alt="" class="loading"></div></div>').load(siteurl+'club-view-model/'+slug),
			onshow: function(dialogRef){}
			});
	
}
function viewModelparlour(slug,name)
{
		
			var tempasset =admintemplateassets;
			BootstrapDialog.show({
			type : BootstrapDialog.TYPE_PRIMARY,
			title: name+' '+mdltitle,
			message: $('<div><div style="text-align:center;"> <img src="'+tempasset+'img/ajax-modal-loading.gif" alt="" class="loading"></div></div>').load(siteurl+'view-model/'+slug),
			onshow: function(dialogRef){}
			});
		
}

function likeStatus($this,taskId,task)
{
	sessionId=logged_member_id;
	if(sessionId != '')
	{
		if(sessionId != taskId)
		{
			var posturl=siteurl+'club/like-status/'+taskId+'/'+task;
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
					  $('.like-action').find('a').removeClass('active');
					  $($this).addClass('active');
					  $('.like-action').find('#like').html(data.totalLikes);
					  $('.like-action').find('#dislike').html(data.totalUnlikes);
					  $('#like_status').html(data.likeStatus);
				  }
				  else
				  {
					  show_messege(data.error_message,'error');
				  }
			  },
			  error: function (data) {
				 BootstrapDialog.alert(servrerror);
				 return false;
			  }
			});
		}
		else
		{
			 show_messege(youcannot+' '+task+' '+yourself,'error');
		}
	}
	else
	{
		login_popup();
	}
	return false;
}

function favouriteStatus($this,taskId)
{
	sessionId=logged_member_id;
	if(sessionId != '')
	{
		if(sessionId != taskId)
		{
			var posturl=siteurl+'club/favorite-status/'+taskId;
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
					  if(data.task=='add')
					  {
						  $($this).find('i').addClass('favrouite');
						  $($this).find('span').html(rmfavorite);
					  }
					  else if(data.task=='remove')
					  {
						  $($this).find('i').removeClass('favrouite');
						  $($this).find('span').html(addfavorite);
					  }
				  }
				  else
				  {
					  show_messege(data.error_message,'error');
				  }
			  },
			  error: function (data) {
				 BootstrapDialog.alert(servrerror);
				 return false;
			  }
			});
		}
		else
		{
			 show_messege(selffavourite,'error');
		}
	}
	else
	{
		login_popup();
	}
	return false;
}
