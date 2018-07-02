(function($) {
	$(document).ready(function() {
		//$.slidebars();
	});
}) (jQuery);
			
			
(function($) {
	$(document).ready(function() {
		// Initiate Slidebars
		//$.slidebars();
		
		// Slidebars Submenus
		$('.sb-toggle-submenu').off('click').on('click', function() {
			$submenu = $(this).parent().children('.sb-submenu');
			$(this).add($submenu).toggleClass('sb-submenu-active'); // Toggle active class.
			
			if ($submenu.hasClass('sb-submenu-active')) {
				$submenu.slideDown(200);
			} else {
				$submenu.slideUp(200);
			}
		});
	});
}) (jQuery);
			
					
(function($) {
	$(document).ready(function() {
		// Initiate Slidebars
		//$.slidebars();
		
		// Slidebars Submenus
		$('.sb-toggle-submenu2').off('click').on('click', function() {
			$submenu2 = $(this).parent().children('.sb-submenu2');
			$(this).add($submenu2).toggleClass('sb-submenu-active2'); // Toggle active class.
			
			if ($submenu2.hasClass('sb-submenu-active2')) {
				$submenu2.slideDown(200);
			} else {
				$submenu2.slideUp(200);
			}
		});
	});
}) (jQuery);

$('body').on('hidden.bs.modal', '.modal', function () {
  	$(this).removeData('bs.modal');
});

$(document).on('click','.change-city-button', function() {
	$('#regions').slideToggle();
});

function openLoginPopUp(msg)
{
	if(msg)
	var title = Login_Please+' : '+msg;
	else
	var title = Login_Please;
	var tempasset =admintemplateassets;
	BootstrapDialog.show({
			type : BootstrapDialog.TYPE_PRIMARY,
			title: title,
			message: $('<div><div style="text-align:center;"> <img src="'+tempasset+'img/ajax-modal-loading.gif" alt="" class="loading"></div></div>').load(siteurl+'login_popup'),
			onshow: function(dialogRef){}
	});
}

$(document).on('click','.facebook',function(){
	fbs_click();
});
$(document).on('click','.twitter',function(){
	twt_click();
});
$(document).on('click','.google',function(){
	google_click();
});
$(document).on('click','.linkedin',function(){
	linkedin_click();
});
$(document).ready(function() {
				/**Simple image gallery. Uses default settings*/
		$("a.fancybox").fancybox({
	  fitToView: false,
	  autoSize: false,
	  afterLoad: function(){
	   this.width = $(this.element).data("width");
	   this.height = $(this.element).data("height");
	  }
	 }); // fancybox
	// Change title type, overlay closing speed
				$(".fancybox-effects-a").fancybox({
				});
	});


function fbs_click()
{
	u=currentUrl;
	t=document.title;

	window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),
			'sharer',
			'toolbar=0,status=0,top=150,left=200,width=626,height=300');

	return false;
}
function twt_click()
{
	u=currentUrl;
	t=document.title;
window.open('http://www.twitter.com/share?url='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),
			'sharer',
			'toolbar=0,status=0,top=150,left=200,width=626,height=300');

	return false;
}

function google_click()
{
	u=currentUrl;
	t=document.title;
	window.open('http://plus.google.com/share?url='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),
		'sharer',
		'toolbar=0,status=0,top=150,left=200,width=626,height=300');

	return false;
}
function linkedin_click()
{
	u=currentUrl;
	t=document.title;
	window.open('https://www.linkedin.com/shareArticle?source=&title='+encodeURIComponent(t)+'&summary='+encodeURIComponent(t)+'&mini=true&url='+encodeURIComponent(u),
		'sharer',
		'toolbar=0,status=0,top=150,left=200,width=626,height=450');

	return false;
}
function security_code_refresh(width,height){
	if(width == null)
	{
		width= '';
	}
	if(height == null)
	{
		height= '';
	}
	$.get( siteurl+'refresh-captach?width='+width+'&height='+height , function( data ) {
		$("#security_code_refresh_img").html(data);
	});
}
