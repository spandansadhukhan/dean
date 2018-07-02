	var base_url = "";

	var lang_segment = "";

	var translated_more = "more";

	var translated_less = "less";

	var static_url = '';
	
	$("#agencylog").scroll_navi();
	
	
	  $(document).on("click", ".change-city", function () {
		$("#change-citycontent").slideToggle(400);
		$("#close-pop-bt").delay(500).toggleClass('open');
	  });


	  $(document).on("click", ".sign_in_toggle", function () {
		$("#topnavcontent").slideToggle('slow');
		$("#hamburger").delay(500).toggleClass('open');
	  });


	  $(document).on("click", ".change-countr", function () {
		$("#change-locationcontent").slideToggle(400);
		$("#hamburger").delay(500).toggleClass('open');
	  });

	  	$(document).on("click", ".show-filter", function () {
		$("#show-filter-content").slideToggle(400);
		$("#hamburger").delay(500).toggleClass('open');
	  });

		$(document).on("click", ".select-country", function (event) {
				var admintempasset =admintemplateassets;
				BootstrapDialog.show({
				type : BootstrapDialog.TYPE_PRIMARY,
				title: Change_Country,
				message: $('<div><div style="text-align:center;"> <img src="'+admintempasset+'img/ajax-modal-loading.gif" alt="" class="loading"></div></div>').load(siteurl+'changeCountry'),
			});
		});
		
		function close_div()
		{
			$('.ajax_report').hide();
			$('.notification').hide();

			$('.isa_success').hide();
			$('.isa_error').hide();
		}
		
		function agencyReturnLogin()
		{
			window.location.href = siteurl+'agency-return-login';
		}
		function adminReturnLogin()
		{
		   window.location.href = siteurl+adminName+'/adminreturnlogin';
		}
		function ajaxPageCallBack(data)
		{
			setListingForm(data);
		}
		function setListingForm(data)
		{
			var $container = $('#container');
			$container.imagesLoaded( function(){});
				
			$("#container").html('');
			$("#container").infinitescroll('destroy');
			$("#container").masonry('reload');
			
			$("#container").append(data.escorts_filter);
			$container.imagesLoaded( function()
			{
				$container.masonry(
				{
				itemSelector : '.pin_d'
				});
			})
			$("#container").masonry('reload');
			$(".morebox").hide();
			if(data.profilecount==0)
			$(".no-record").show();
			else
			$(".no-record").hide();
		}
		function showmore(id)
		{
			var chk=$('#more_txt_'+id).text();
			if(chk=='more'){
				$('#more_txt_'+id).text(less);
			}else{
				$('#more_txt_'+id).text(more);	
			}
			$("#show_text_"+id).toggle('slow');

		}
	
