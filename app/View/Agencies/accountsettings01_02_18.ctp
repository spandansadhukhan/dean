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
                                                </style>
                                                <a style="display:none;" href="#;" class="website_activate"></a>
                                                    <?php echo $this->element('agent_sidebar'); ?>
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
            <h1 style="display:inline-block;font-size: 20px;">Your Email</h1>
            
          </section>
                   
          
   
          
          <div class="clr"></div>
          </div>
          <div class="tom1 for-setting">
              <section class="t1">
                <label for="label">Email Address: <span>*</span></label>
                <input type="text" required name="email" class="" value="nits.bikash@gmail.com" readonly style="margin:0;" > 
                                <section class="clr"></section>
              </section>
	<section class="clr"></section>
                                    </div>
                                    <br />
			<div class="detail-heading" style="background: none;">
			<section class="title-left">
				<h1 style="display:inline-block;font-size: 20px;">Private Information (only for admin purpose)</h1>
			 </section>
			 <div class="clr"></div>
			</div>
			
			<div class="tom1 for-setting">
				   <form action="#" method="post" accept-charset="utf-8" class="ajaxform" id="private-info">				     <div class="smart-forms">
          <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onClick="close_div();" href="javascript:;">×</a> <span class="ajax_message">Hello Message</span> </div>                
           <br>   </div>
				<section class="t1">
					<label for="label">Real Name: <span>*</span></label>
					<input type="text" name="actual_name" class="" value="" style="margin:0;" placeholder="Real Name"> 
                    <section class="clr"></section>
				</section>
				<section class="t1">
					<label for="label">Real Email: <span>*</span></label>
					<input type="text" name="actual_email" class="" value="" style="margin:0;" placeholder="Real Email"> 
                    <section class="clr"></section>
				</section>
				<section class="t1">
					<label for="label">Real Contact Number: <span>*</span></label>
					<input type="text" name="actual_number" class="" value="" style="margin:0;" placeholder="Real Contact Number"> 
                    <section class="clr"></section>
				</section>
				
					<section class="clr"></section>
				<section class="t1">
					<label for="label">Registered Since: <span>*</span></label>
					
					  <select class="inputContainer" style="width:150px;" id="actual_date" name="actual_date">
                        <option value="">Select Year</option>
                    							<option  value="2016" >2016</option>
												<option  value="2015" >2015</option>
												<option  value="2014" >2014</option>
												<option  value="2013" >2013</option>
												<option  value="2012" >2012</option>
												<option  value="2011" >2011</option>
												<option  value="2010" >2010</option>
												<option  value="2009" >2009</option>
												<option  value="2008" >2008</option>
												<option  value="2007" >2007</option>
												<option  value="2006" >2006</option>
												<option  value="2005" >2005</option>
												<option  value="2004" >2004</option>
												<option  value="2003" >2003</option>
												<option  value="2002" >2002</option>
												<option  value="2001" >2001</option>
												<option  value="2000" >2000</option>
												<option  value="1999" >1999</option>
												<option  value="1998" >1998</option>
												<option  value="1997" >1997</option>
												<option  value="1996" >1996</option>
												<option  value="1995" >1995</option>
												<option  value="1994" >1994</option>
												<option  value="1993" >1993</option>
												<option  value="1992" >1992</option>
												<option  value="1991" >1991</option>
												<option  value="1990" >1990</option>
												<option  value="1989" >1989</option>
												<option  value="1988" >1988</option>
												<option  value="1987" >1987</option>
												<option  value="1986" >1986</option>
						                        </select>
                    
                    
                    <section class="clr"></section>
				</section>
					<section class="clr"></section>
				<section class="t1 t1-t">
						<label for="label" class="blank">&nbsp;</label>
					<section class="tbut">
						<input type="submit" value="Submit" id="submit" name="submit" class="buttonGrey">
					</section>
                    <section class="clr"></section>
				</section>
           </form>            </div><br />
                                    
    <div class="detail-heading" style="background: none;">
    <section class="title-left">
            <h1 style="display:inline-block;font-size: 20px;">Change Password</h1>
            
          </section>
                   
          
   
          
          <div class="clr"></div>
          </div>
                                    <div class="tom1  for-tour">
                                 
               <form action="#" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui">       <div class="smart-forms">
          <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onClick="close_div();" href="javascript:;">×</a> <span class="ajax_message">Hello Message</span> </div>                
           <br>   </div>
                 <section class="t1 t1-t">
                <label for="label">Current Password: <span>*</span></label>
                <input type="password" value="" id="oldpassword" name="password_old" placeholder="Current Password">
                                <section class="clr"></section>
              </section>
                <section class="t1 t1-t">
                <label for="label">New Password: <span>*</span></label>
                <input type="password" value="" id="newpassword" name="password" placeholder="New Password">
                                <section class="clr"></section>
              </section>
                <section class="t1 t1-t">
                <label for="label">Confirm Password: <span>*</span></label>
                <input type="password" value="" id="cpassword" name="password2" placeholder="Confirm Password">
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
             <div class="smart-wrap" style="float:left; width: 40%;">
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
                                    
                                    <div class="detail-heading" style="background: none;">
    <section class="title-left">
            <h1 style="display:inline-block;font-size: 20px;">Close Your Account</h1>
            
          </section>
                   
          
   
          
          <div class="clr"></div>
          </div>
                                    <div class="tom1  for-tour">
<!--
                                    <p style="margin-lefT: 10px;" class="p-no-mar">(Please Specify Reason To Close Your Account)</p>
-->
                                   <form action="#" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui3">									 <div class="smart-forms">
									  <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onClick="close_div();" href="javascript:;">×</a> <span class="ajax_message">Hello Message</span> </div>                
										 </div>
								  
								  <section class="t1 t1-t" style="width: auto; float:none;">
									<label for="label" style="width: auto;"> Close Account: <span>*</span></label>
								 <div class="smart-wrap" style="float:left; width: 50%;">
							<div class="smart-forms smart-container ">
							
								<!-- end .form-header section -->
							
					  
										<div class="section" style="margin: 5px 0 0 0">
										
											<div class="option-group field">
											
												<label class="option">
													<input type="radio" value="Yes"  name="account_close_by_member">
													<span class="radio"></span> Yes        
												</label>
												
												<label class="option">
													<input type="radio" value="No" checked  name="account_close_by_member">
													<span class="radio"></span> No                  
												</label>
								   
											
											</div><!-- end .option-group section -->
											
										</div><!-- end  section -->                     
					   
							
								
							</div><!-- end .smart-forms section -->
						</div>
													<section class="clr"></section>
								  </section>
								  <section class="t1 t1-t" style="width: auto; float:none;">
									<label for="label" style="width: auto;"> Do you want to Permanently Delete Your Account: <span>*</span></label>
								 <div class="smart-wrap" style="float:left; width: 50%;">
							<div class="smart-forms smart-container ">
							
								<!-- end .form-header section -->
							
										<div class="section" style="margin: 5px 0 0 0">
										
											<div class="option-group field">
											
												<label class="option">
													<input type="radio" onClick="showDiv()" value="Yes"  name="account_delete_by_member">
													<span class="radio"></span> Yes        
												</label>
												
												<label class="option">
													<input type="radio" value="No" onClick="hideDiv()" checked  name="account_delete_by_member">
													<span class="radio"></span> No                  
												</label>
								   
											
											</div><!-- end .option-group section -->
											
										</div><!-- end  section -->                     
					   
							</div><!-- end .smart-forms section -->
						</div>
													<section class="clr"></section>
								  </section>
								  
									  <section class="t1-t" id="close_res" style="display:none;">
								   
									  <label>Specify Reason:</label>
									  <div class="inputContainer">
							  <div class="section">
										
												<textarea  placeholder="Delete reason message" size="50px" name="delete_reason_message" id="comment" class="gui-textarea"></textarea>
												</span>   
										
										</div>
										</div>
										</section>
						   
								  <div class="clr"></div>
								  
								  <section class="t1 t1-t">
									<label for="label" class="blank">&nbsp;</label>
								   <section class="tbut">
								<input type="submit" value="Save" id="button" name="button" class="buttonGrey">
							  </section>
								<section class="clr"></section>
								  </section>
					</form>              <section class="clr"></section>
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
<style>
	.tom1 label {
    color: #000!important;
}
</style>