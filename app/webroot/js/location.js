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
					$.each(data.region, function(key, value) {
					   
						$('#region').append('<option value="'+value.id+'">'+value.region_name+'</option>');
					
					
					});
		 }
		 else 
		 { 
			 $('#region').html('');
			 $('#city').html('');
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

function cityCheck()
{
	var val = $("#region").val();
	if(val)
	$("#region").closest('.mws-form-row').show();
	else
	{
		regionCheck();
	$('#region').html('<option value="">Select Country First</option>');
	}
}

function regionCheck()
{
	var val = $("#city").val();
	if(val)
	$("#city").closest('.mws-form-row').show();
	else
	$('#city').html('<option value="">Select State / Province First</option>');
}

function getCity_country(country_id)
{
	if(country_id == '')
	{
		$('#city').val('');
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
			 		//var textval	=	'<?=site_url()?>profile/';
					//var Response	=	data.slug;
					//var display	=	textval+Response;
					
			  
			  		$('#city').html('');
					$('#s2id_city span').text('');
					$('#city').html('<option value="">Select City</option>');
					$.each(data.city, function(key, value) {
					
						$('#city').append('<option id="'+value.id+'" value="'+value.id+'">'+value.city_name+'</option>');
					});
					hidebasecountry();
					//$('#city').value(display);
		 }
		 else{
					$('#city').html('');
					$('#s2id_city span').text('');
					$('#city').html('<option value="">No City Found</option>');
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
			 		//var textval	=	'<?=site_url()?>profile/';
					//var Response	=	data.slug;
					//var display	=	textval+Response;
					
			  
			  		$('#city').html('');
					$('#s2id_city span').text('');
					$('#city').html('<option value="">Select City</option>');
					$.each(data.city, function(key, value) {
					
						$('#city').append('<option id="'+value.id+'" value="'+value.id+'">'+value.city_name+'</option>');
					});
					hidebasecountry();
					//$('#city').value(display);
		 }
		 else{
					$('#city').html('');
					$('#s2id_city span').text('');
					$('#city').html('<option value="">No City Found</option>');
			 }
	  },
	  error: function (data) {
		 alert("Server Error.");
		 return false;
	  }
	});
	
	return false;
	
}
