
    <script type="text/javascript">
$(document).ready(function(){
	
	//Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});
	
	//Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
});

function navigateUserToPage(val)
	{
		 $('html, body').animate({
        'scrollTop' : $("#display_div_"+val).position().top+170
   		 });
	}
function purchaseAds(val)
	{
		//alert(val);
		if(val)
		{
			var site_url = '#';
			//alert(site_url+'advertise-banner/'+val);
			window.location = site_url+'advertise-banner/'+val
		}
	}

</script>
	
	
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('agent_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting d-flex justify-content-between align-items-center p-1">
						<h2 class="font-weight-normal">Ad-On Services</h2>
						<select class="form-control width245px text-white" name="adon_nav" onchange="navigateUserToPage(this.value)">
							<option>Go to Ad On.....</option>
                                                        <option value="25">Advertiser Ads  </option>
							
						</select>
					</div>
					
					
					<div class="adServicePart">
						<div class="adOnservices bg-green p-2 mt-3">
						<h4 class="mb-0 text-white font-16 font-weight-bold text-uppercase d-inline-block mr-5">Ad On Service</h4>					<p class="text-white font-16 font-weight-normal d-inline-block mb-0">Advertiser Ads</p>
					</div>
						<div class="bg-gray-2 p-3">
					<div class="row">
						<div class="col-lg-3">
							<div class="leftAddOn p-2 d-flex justify-content-center align-items-center">
								<div class="escortOfTheWeek bg-white">
									<h5>Escort of the Week</h5>
									<div class="text-center">
										<img src="<?php echo  $this->Html->url('/') ?>images/womanInBlack.png" class="img-fluid">
									</div>
<!--									<div class="blackPart p-1">
										<h5 class="text-white text-left m-0 text-uppercase">Your Name</h5>
										<p class="text-white text-left m-0">Country Name</p>
									</div>-->
								</div>
								
							</div>
							<div class="blackPart text-center p-2 bottomPart1">
								<h4 class="text-white m-0 text-uppercase">Patty 123</h4>
								<p class="text-white m-0 text-uppercase">Barcelona</p>
							</div>
						</div>
						<div class="col-lg-9">
							<div class="insideTheAdon p-3">
								<h2 class="mb-0">Features inside this Ad-on service</h2>
								<p class="mb-0 mt-3">Escore of the Week.</p>
								<div class="getThisAddon p-2">
									<p class="text-center m-0">Get this Ad-on just @400.00 $NZ for 2 week</p>
								</div>
							</div>
						</div>
					</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	