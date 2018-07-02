<section id="contentsection">
<div id="wait-div" class="wait-div">
  <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
    Please wait    ....</span> </span> </div>
</div>

<div class="col-left">
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

<section id="wrapper">
<section id="middle">
<section id="middle-inner">
<section id="section-left">
<section id="fullwidth-section">
  <section id="content">
    <section class="maintitle clear">
      <h1>
        Ad-on Services      </h1>
      <section class="cate2 styled">
        <select name="adon_nav" onchange="navigateUserToPage(this.value)">
          <option  value="">
          Go To Ad-on          ..</option>
                    <option  value="25">
          Advertiser Ads          </option>
                  </select>
      </section>
      </section>
      <section class="mainbox"> 
        <!-- For escort List View starts here -->
        <section class="es-listing-view listStyle" >
          <ul id="my-escorts-list" class="clear">
                        <div id="display_div_25"></div>
            <li >
              <section class="escort-list" >
                <section class="escort-list-inner">
                  <section class="info alter">
                    <section class="new-name-sjo">
                      <section class="new-name-sjo-le"> <small>
                        Ad-on Service                        </small> </section>
                      <section class="new-name-sjo-ce" style="background:#6bba70;" >
                        <h2 >
                          Advertiser Ads                        </h2>
                      </section>
                      <section class="clr"></section>
                    </section>
                    
                    <div class="advertOption clear">
            <div class="optionHeader">
              <div class="hoverDarker">
                <div class="banner1"> <a href="">												<img src="http://107.170.152.166/team2/escort/images/Advertiser-Ads1-132x149.jpg?cf=true">
											</a> </div>
                                            
                <h1>
                 Karuna<br />Pune                </h1>
             
            </div> </div>
            <div class="optionInfos" style="background: #fff;">
               <div class="option_fea">
               <h2 >
                        Lets see what are the features inside this ad-on service                      </h2>
                      <p >
                        Advertiser Ads                      </p>
                      </div>
              <section class="option_det">
                            
                                
                                
                <div class="buttonOuterYellow">
                                    <div class="buttonYellow"> <a href="#"> Get this Ad-on just                          @
                          120.00 EUR</a> </div>
                                  </div>
              </section>
            </div>
            <div class="clr"></div>
          </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    <!--<div class="adst">
							<div class="pin_d_inner">
                            <div class="triangleBottomRight2 topmargin"></div>
								<div class="bigstrip1" style="letter-spacing:normal; text-transform:uppercase; font-weight:100;"> <span>Advertiser Ads</span> </div>
								<div class="leftimagehover">
									<a href="">
										<div class="leftimagecont leftbg">
										  <div class="leftpic">
											<div class="leftpic-crop">
																							<img src="http://layout9.demoparlour.com/advdirectory/uploads/adon_images/Advertiser-Ads1-132x149.jpg?cf=true">
																						 </div>
										  </div>
										  <div class="clearer"></div>
										  <div class="leftpictext">Karuna<br>
											<span>Pune</span> </div>
										</div>
									</a>
								<div class="smallstrip"> 
									<a href=""><span class="smallitalic">View Girl </span></a> </div>
								</div>
							</div>
						</div>-->
						
                    <!--<section class="about">
                      <h2 >
                        Lets see what are the features inside this ad-on service                      </h2>
                      <p >
                        Advertiser Ads                      </p>
                      <div class="buttonOuterYellow" style="float:right;">
                        <div class=""> <a href="http://layout9.demoparlour.com/advdirectory/adonservices/set-session-values/advertiser-ads" class="buttonGrey" style="font-size:15px;">
                          Get this Ad-on just                          @
                          120.00 EUR                       
                          <i style="margin-left: 5px;
    margin-top: 4px;
    vertical-align: text-top;" class="fa fa-arrow-circle-o-right"></i></a> </div>
                      </div>
                      <section class="clr"></section>
                      <br />
                    </section>-->
                    <section class="clr"></section>
                  </section>
                  <section class="clr"></section>
                </section>
                <section class="clr"></section>
              </section>
              <section class="clr"></section>
            </li>
                                  </ul>
        </section>
        <a href="#" class="scrollToTop"></a> </section>
    </section>
  </section>
  <section class="clr"></section>
</section>
</section>
</section>
</section>

</div>

<div class="col-right">
<?php echo $this->element("user_banner");?>        
</div>
</section>
<div class="clr"></div>