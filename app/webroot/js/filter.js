	function changeCategory(type)
	{ 
		var page_type = page_type;
		var page_type_value = page_type_value;
		if(page_type) 
		{
			var caturl = siteurl+'category-record/'+type+'/'+page_type+'/'+page_type_value;
		} 
		else
		{
			var caturl = siteurl+'category-record/'+type;
		}
		$(this).ajaxSubmit({
			url: caturl,
			dataType: 'json',
			success: function(data){				
					$('.category_content').html('');
					$.each(data.record, function(key, value) {
						
						if(type!='eyecolor' && type!='haircolor' ) {
						if(key>2) {
					$('.category_content').append('<label><input type="checkbox" name="'+data.field_name+'" value="'+value.id+'" class="af_i_1"> <span title="'+value.name+'" class="grey lbl_incall">'+value.name+' </span><div class="clear"></div></label>');
						}
					}else
					{
					$('.category_content').append('<label><input type="checkbox" name="'+data.field_name+'" value="'+value.id+'" class="af_i_1"> <span title="'+value.name+'" class="grey lbl_incall">'+value.name+' </span><div class="clear"></div></label>');
					}
					});
			},
			error:function(data){
				alert(Connection_error)
			}
		});
		return false;
		$("#change-divcontent").submit();
	}
	
	function changePhisical(type)
	{ 								
		$('.category_content').html('');
		if(type =='weight')
		{
			for(i=80;i<300;i++)
			{
				var weight = parseFloat(i/2.2);
				$('.category_content').append('<label><input type="checkbox" name="weight_ids[]" value="'+i+'" class="af_i_1"> <span style="width:140px;" title="'+i+'" class="grey lbl_incall">'+i+' lbs('+weight.toFixed(2)+' kg) </span><div class="clear"></div></label>');
			}
		}
		else if(type =='height')
		{
			for(i=150;i<220;i++)	
			{
				var height = parseFloat(i*0.032808);
				$('.category_content').append('<label><input type="checkbox" name="height_ids[]" value="'+i+'" class="af_i_1"> <span style="width:140px;" title="'+i+'" class="grey lbl_incall">'+height.toFixed(2)+' feet('+i+' cm) </span><div class="clear"></div></label>');									
			}
		}
		else if(type =='age')
		{
			for(i=30;i<60;i++)	
			{
				$('.category_content').append('<label><input type="checkbox" name="age_range" value="'+i+'" class="af_i_1"> <span title="'+i+' - '+parseInt(4+i)+'" class="grey lbl_incall">'+i+' - '+parseInt(4+i)+' </span><div class="clear"></div></label>');									
				i=i+4;
			}
		}
		else if(type =='cupsize')
		{
			for(i=18;i<60;)	
			{						
				$('.category_content').append('<div class="city-li"><a  href="'+siteurl+'escorts-by-'+type+'/'+i+'" ><div class="city"><div class="cityName">'+i+' - '+(4+i)+'</div><div class="clearer"></div></div></a></div>');											
				i=i+4;
			}
		}
		else if(type =='gender')
		{
			$('.category_content').append('<label><input type="checkbox" name="gender" value="Hector Couple" class="af_i_1"> <span title="'+Hetro_couple+'" class="grey lbl_incall">'+Hetro_couple+'</span><div class="clear"></div></label>');											
			$('.category_content').append('<label><input type="checkbox" name="gender" value="Female Couple" class="af_i_1"> <span title="'+Female_Couple+'" class="grey lbl_incall">'+Female_Couple+'</span><div class="clear"></div></label>');											
			$('.category_content').append('<label><input type="checkbox" name="gender" value="Male Couple" class="af_i_1"> <span title="'+Male_Couple+'" class="grey lbl_incall">'+Male_Couple+'</span><div class="clear"></div></label>');											
			$('.category_content').append('<label><input type="checkbox" name="gender" value="Trans Couple" class="af_i_1"> <span title="'+Trans_Couple+'" class="grey lbl_incall">'+Trans_Couple+'</span><div class="clear"></div></label>');											
			
		}
	}
  	
	 $(document).on("change", "#advance_search_form input", function (event) {
		$('#advance_search_form').submit();
	});
  
	  $(document).on("click", ".change-category", function () {
		$("#change-divcontent").slideDown(400);
		$("#close-pop-bt").delay(500).toggleClass('open');
	  });

	$(document).on("click", ".close_div", function () {
		$("#change-divcontent").slideUp(400);
	});
	
	$(document).on("change", "#agency_search_form input:radio", function (event) {
		var lable = $(this).closest('li').find('label').html();
		$('#alltimespan').html(lable);
	});
	
	$(document).on("change", "#parlour_search_form input:radio", function (event) {
		var lable = $(this).closest('li').find('label').html();
		$('#alltimespan').html(lable);
	});
	
	$(document).on("change", "#advance_search_form input:radio", function (event) {
		var lable = $(this).closest('li').find('label').html();
		$(this).closest('.select-wrapper').find('li .allallspan').html(lable);
		
	});
	$(document).on("change", "#club_search_form input:radio", function (event) {
		var lable = $(this).closest('li').find('label').html();
		$(this).closest('.select-wrapper').find('li .allallspan').html(lable);
		
	});
	$(document).on("change", "#agency_search_form input", function (event) {
		$('#agency_search_form').submit();
	});
	$(document).on("change", "#parlour_search_form input", function (event) {
		$('#parlour_search_form').submit();
	});
	
	$(document).on("change", "#club_search_form input", function (event) {
		$('#club_search_form').submit();
	});
