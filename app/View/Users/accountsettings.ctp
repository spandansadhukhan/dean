<section id="contentsection">
<div id="wait-div" class="wait-div">
  <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
    Please wait    ....</span> </span> </div>
</div>

<div class="col-left">
<!-- For Account Close Div -------->
<script type="text/javascript">
function showDiv()
{	
  $('#close_res').slideDown('slow');
}
function hideDiv(divid)
{
  $('#close_res').slideUp('slow');
}
</script>
<script type="text/javascript">
function showDivClose()
{	
  $('#close').slideDown('slow');
}
function hideDivClose(divid)
{
  $('#close').slideUp('slow');
}
</script>
<section id="wrapper">
<section id="middle">
<section id="middle-inner">

 <section class="all-pins-do">
<div class="my-account-inner">
<div class="sb-toggle-right navbar-right">
				<div class="navicon-line"></div>
				<div class="navicon-line"></div>
				<div class="navicon-line"></div>
			</div><!-- /.sb-control-right -->
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
                                                    .tom1 label {
																    color: #000!important;
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
            <h1 style="display:inline-block;">Account Setting</h1>
            
          </section>
                   
          
   
          
          <div class="clr"></div>
          </div>
           
          <div class="right-my-account-blocks-inner for-setting">
 
          <div class="detail-heading" style="background: none;">
    <section class="title-left">
            <h1 style="display:inline-block;font-size: 20px;">Change Your Basic Settings </h1>
            
          </section>
                   
          
   
          
          <div class="clr"></div>
          </div>
          <div class="tom1 for-setting">
			  <form action="#" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui">			  <div class="smart-forms smart-container">
						<div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onClick="close_div();" href="javascript:;">×</a> <span class="ajax_message">Hello Message</span> </div>
					</div> 
              <section class="t1">
                <label for="label">Name: <span>*</span></label>
                <input type="text" name="name" class="" value="Karuna" style="margin:0;" > 
                                <section class="clr"></section>
              </section>
              <section class="t1">
                <label for="label">User Name: <span>*</span></label>
                <input type="text" name="username" class="" value="kar123" readonly style="margin:0;" > 
                                <section class="clr"></section>
              </section>
              <section class="t1">
                <label for="label">Email Address: <span>*</span></label>
                <input type="text" name="email" class="" value="nits.karunadri@gmail.com" readonly style="margin:0;" > 
                                <section class="clr"></section>
              </section>
              <section class="t1">
                                        <label for="label">
											Country <span>*</span></label>
                                            <select name="country" class="form-control"  onChange="getRegion(this.value)">
												<option value=" ">Select Country</option>
																									<option value="25" >
														Argentina													</option>
																									<option value="6" >
														Australia													</option>
																									<option value="73" >
														Austria													</option>
																									<option value="12" >
														Bahamas													</option>
																									<option value="79" >
														Bahrain													</option>
																									<option value="15" >
														Bangladesh													</option>
																									<option value="22" >
														Belgium													</option>
																									<option value="49" >
														Bolivia													</option>
																									<option value="13" >
														Brazil													</option>
																									<option value="14" >
														Bulgaria													</option>
																									<option value="27" >
														Cameroon													</option>
																									<option value="1" >
														Canada													</option>
																									<option value="65" >
														Chile													</option>
																									<option value="17" >
														China													</option>
																									<option value="32" >
														Costa Rica													</option>
																									<option value="87" >
														Cyprus													</option>
																									<option value="62" >
														Czech Republic													</option>
																									<option value="48" >
														Denmark													</option>
																									<option value="34" >
														Dominican Republic													</option>
																									<option value="64" >
														Ecuador													</option>
																									<option value="82" >
														Egypt													</option>
																									<option value="35" >
														El Salvador													</option>
																									<option value="42" >
														Finland													</option>
																									<option value="21" >
														France													</option>
																									<option value="19" >
														Germany													</option>
																									<option value="86" >
														Greece													</option>
																									<option value="39" >
														Guam													</option>
																									<option value="40" >
														Guatemala													</option>
																									<option value="43" >
														Hong Kong													</option>
																									<option value="24" >
														Hungary													</option>
																									<option value="44" >
														Iceland													</option>
																									<option value="7"  selected="selected" >
														India													</option>
																									<option value="46" >
														Indonesia													</option>
																									<option value="18" >
														Ireland													</option>
																									<option value="41" >
														Israel													</option>
																									<option value="20" >
														Italy													</option>
																									<option value="47" >
														Jamaica													</option>
																									<option value="37" >
														Japan													</option>
																									<option value="76" >
														Jordan													</option>
																									<option value="26" >
														Korea													</option>
																									<option value="80" >
														Kuwait													</option>
																									<option value="83" >
														Lebanon													</option>
																									<option value="51" >
														Luxembourg													</option>
																									<option value="52" >
														Malaysia													</option>
																									<option value="53" >
														Malta													</option>
																									<option value="5" >
														Mexico													</option>
																									<option value="56" >
														Morocco													</option>
																									<option value="9" >
														Netherlands													</option>
																									<option value="78" >
														New Zealand													</option>
																									<option value="54" >
														Nicaragua													</option>
																									<option value="58" >
														Nigeria													</option>
																									<option value="59" >
														Norway													</option>
																									<option value="60" >
														Pakistan													</option>
																									<option value="61" >
														Panama													</option>
																									<option value="50" >
														Peru													</option>
																									<option value="31" >
														Philippines													</option>
																									<option value="63" >
														Poerto Rico													</option>
																									<option value="72" >
														Poland													</option>
																									<option value="36" >
														Portugal													</option>
																									<option value="81" >
														Qatar													</option>
																									<option value="23" >
														Romania													</option>
																									<option value="57" >
														Russia													</option>
																									<option value="67" >
														Singapore													</option>
																									<option value="28" >
														South Africa													</option>
																									<option value="8" >
														Spain													</option>
																									<option value="38" >
														Sweden													</option>
																									<option value="16" >
														Switzerland													</option>
																									<option value="68" >
														Taiwan													</option>
																									<option value="84" >
														Thailand													</option>
																									<option value="77" >
														Turkey													</option>
																									<option value="69" >
														Ukraine													</option>
																									<option value="4" >
														United Arab Emirates													</option>
																									<option value="2" >
														United Kingdom													</option>
																									<option value="3" >
														United States													</option>
																									<option value="55" >
														Uruguay													</option>
																									<option value="29" >
														Venezuela													</option>
																									<option value="70" >
														VietNam													</option>
																									<option value="71" >
														Virgin Islands													</option>
												                                            </select>
				</section>
											  <section class="form-group t1" id="region_div"  style="display:none">
                                        <label for="label">
											Region</label>
                                            <select name="state" class="form-control" id="region" onChange="getCity(this.value)">
												<option value=" ">Seleziona Regione</option>
												                                            </select>
							  </section>
				 							  <section class="form-group">
                                        <label class="col-md-2 control-label" for="example-text-input" style="padding-left: 0;">
											City<span>*</span></label>
                                            <select name="city" class="form-control" id="city">
												<option value=" ">Select City</option>
																									<option value="7" >
														Ahmedabad													</option>
																									<option value="39" >
														Bangalore													</option>
																									<option value="56" >
														Bhubaneswar													</option>
																									<option value="110" >
														Chandigarh													</option>
																									<option value="119" >
														Chennai													</option>
																									<option value="161" >
														Delhi													</option>
																									<option value="234" >
														Goa													</option>
																									<option value="280" >
														Hyderabad													</option>
																									<option value="285" >
														Indore													</option>
																									<option value="293" >
														Jaipur													</option>
																									<option value="311" >
														Kerala													</option>
																									<option value="322" >
														Kolkata													</option>
																									<option value="362" >
														Lucknow													</option>
																									<option value="423" >
														Mumbai													</option>
																									<option value="514"  selected="selected" >
														Pune													</option>
																									<option value="624" >
														Surat													</option>
												                                            </select>
							  </section>
				<section class="t1">
                <label for="label">Phone: <span>*</span></label>
                <input type="text" name="phone" class="" value="" style="margin:0;" > 
                                <section class="clr"></section>
              </section>
				<section class="t1">
                <label for="label">Zip Code: </label>
                <input type="text" name="zip" class="" value="" style="margin:0;" placeholder="Zip Code"> 
                                <section class="clr"></section>
              </section>
				<section class="t1">
                <label for="label">Introduction: <span>*</span></label>
                <textarea class="form-control " name="introduction" placeholder="Introduction"></textarea>
                                <section class="clr"></section>
              </section>
              <section class="t1 t1-t">
                 <label for="label" class="blank">&nbsp;</label>
               <section class="tbut">
            <input type="submit" value="Change Settings" id="button" name="button" class="buttonGrey">
          </section>
                                <section class="clr"></section>
              </section>
			<section class="clr"></section>
			</form>          </div>
							<br />

							<div class="detail-heading" style="background: none;">
							<section class="title-left">
							<h1 style="display:inline-block;font-size: 20px;">Change Password</h1>

							</section>




							<div class="clr"></div>
							</div>
							<div class="tom1  for-tour">

							<form action="#" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui1">       <div class="smart-forms">
							<div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onClick="close_div();" href="javascript:;">×</a> <span class="ajax_message">Hello Message</span> </div>                
							<br>   </div>
							<section class="t1 t1-t">
							<label for="label">Current Password: <span>*</span></label>
							<input type="password" value="" id="oldpassword" name="oldpassword" placeholder="Current Password">
							<section class="clr"></section>
							</section>
							<section class="t1 t1-t">
							<label for="label">New Password: <span>*</span></label>
							<input type="password" value="" id="newpassword" name="newpassword" placeholder="New Password">
							<section class="clr"></section>
							</section>
							<section class="t1 t1-t">
							<label for="label">Confirm Password: <span>*</span></label>
							<input type="password" value="" id="cpassword" name="cpassword" placeholder="Confirm Password">
							<section class="clr"></section>
							</section>
							<div class="clr"></div>
              
							<section class="t1 t1-t">
							<label for="label" class="blank">&nbsp;</label>
							<section class="tbut">
							<input type="submit" value="Change Password" id="button" name="button" class="buttonGrey">
							</section>
							<section class="clr"></section>
							</section>
              </form><section class="clr"></section>
                                    </div>
                                    <br />
                                    
                                    <div class="detail-heading" style="background: none;">
    <section class="title-left">
            <h1 style="display:inline-block;font-size: 20px;">Newsletter Setting</h1>
            
          </section>
                   
          
   
          
          <div class="clr"></div>
          </div>
                                    <div class="tom1  for-tour">
          <form action="#" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui2">       <div class="smart-forms">
          <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onClick="close_div();" href="javascript:;">×</a> <span class="ajax_message">Hello Message</span> </div>                
              </div>
                                    
              
              
              <section class="t1 t1-t" style="width: auto; float:none;">
                <label for="label" style="width: auto;"> Subscribe/Unsubcribe Newsletter: <span>*</span></label>
             <div class="smart-wrap" style="float:left; width: 60%;">
    	<div class="smart-forms smart-container ">
        
        	<!-- end .form-header section -->
   	          <div class="section" style="margin: 5px 0 0 0">
                    
                    	<div class="option-group field">
                        
                            <label class="option">
                                <input type="radio" value="Yes"  name="newsletter_subscription">
                                <span class="radio"></span> Yes        
                            </label>
                            
                            <label class="option">
                                <input type="radio" value="No" checked  name="newsletter_subscription">
                                <span class="radio"></span> No                  
                            </label>
               
                        
                        </div><!-- end .option-group section -->
                        
                    </div><!-- end  section -->                     
   
        
            
        </div><!-- end .smart-forms section -->
    </div>
                                <section class="clr"></section>
              </section>
              
              <div class="clr"></div>
              
              <section class="t1 t1-t">
                 <label for="label" class="blank">&nbsp;</label>
               <section class="tbut">
            <input type="submit" value="Update Changes" id="button" name="button" class="buttonGrey">
          </section>
                                <section class="clr"></section>
              </section>
              </form>              
              <section class="clr"></section>
                                    </div>
                                      <br />

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