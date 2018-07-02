$(document).ready(function() {
$(document).on("submit", ".ajaxform", function (event) 
{
	if(pageckeditor)
	{
	CKupdate();
	}
	var formId=$(this).attr('id');
	if(formId)
	var formClass = '#'+formId;
	else
	var formClass = ".ajaxform";
	var posturl=$(this).attr('action');
	
	$(this).ajaxSubmit({
				url: posturl,
				dataType: 'json',
				beforeSend: function(){
				 $('#wait-div').show();
				 $("#loginButon").attr("disabled",'disabled');
				 $(".diabledbutton").attr("disabled",'disabled');
				},
					success: function(response){
					$(formClass).find('.ajax_report').removeClass('alert-success').removeClass('alert-error');
					
					$('#wait-div').hide();
					$("#loginButon").removeAttr("disabled");
					$(".diabledbutton").removeAttr("disabled");
					$(formClass).find('.ajax_report').fadeIn(600);
					
					if(response.success)
					 {
						$(formClass).find('.ajax_report').addClass('alert-success').children('.ajax_message').html(response.success_message);
					 }
					 else
					 {
						$(formClass).find('.ajax_report').addClass('alert-error').children('.ajax_message').html(response.error_message);
					 }
					
					if(response.url)
					{
					setTimeout(function()
					{
						window.location.href=response.url;
					}, 1000)
					
					}
					if(response.parentUrl)
					{
					setTimeout(function()
					{
						window.top.location.href=response.parentUrl;
					}, 1000)
					
					}
					if(response.resetForm)
					$(formClass).resetForm();
					
					if(response.scrollToElement)
					scrollToElement(response.scrollToElement,1000);
					
					if(response.scrollToThisForm)
					scrollToElement(formClass,1000);
					
					if(response.selfReload)
					location.reload();
					
					if(response.popup)
					{
					parent.$.venobox.frameheight();
					}

					if(response.ajaxtCallBackFunction)
					{
						ajaxtCallBackFunction(response);
					}
					setTimeout(function()
					{
						$(formClass).find('.notification').fadeOut(600);
					}, 4000);
					if(response.message=='popup-login')
					{
					openLoginPopUp(response.return_url);
					}
					if(response.ajaxPageCallBack)
					{
						//alert(response.ajaxPageCallBack);
						response.formClass = formClass;	
						ajaxPageCallBack(response);
					}
					if(response.ajaxPageAgencyCallBack)
					{
						response.formClass = formClass;	
						ajaxPageAgencyCallBack(response);
					}
					if(response.capchaRefresh)
					{
						security_code_refresh(response.capchaWidth,response.capchaHeight);
					}
					
					if(response.disableButton)
					{
						 $("#"+disableButton).removeAttr("disabled");
					}
					
					if(response.readonly)
					{
						 $("#"+response.readonly).attr('readonly','readonly');
					}
					if(response.disable)
					{
						 $("#"+response.disable).attr('disabled','disabled');
					}
					if(response.imageUrl)
					{
						$(formClass).find('#imageUrl').attr("src",response.imageUrl);
					}
					
				},
				error:function(response){
					showConnectionError();
					}
			});
			 
return false;
});
});

function CKupdate(){
    for ( instance in CKEDITOR.instances )
        CKEDITOR.instances[instance].updateElement();
}

function scrollToElement(element,speed)
{
	$('html, body').animate({scrollTop:$(element).position().top-70},speed);
}
function showConnectionError()
{	
	alert('server error');
	//$('#wait-div').hide();
}

