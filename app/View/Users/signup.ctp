<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
function show_hide(user_type){
    srtipper_type=$("#srtipper_type").val();
    if(user_type=='C' || user_type=='A' || user_type=='P')
    {
       $("#club_agent_div").show();
       $("#business_name").attr("required",true);
      $("#gender_div").hide();
       
       
    }
    else if(user_type=='U')
    {
      $("#gender_div").hide();
      $("#club_agent_div").hide();
      $("#business_name").removeAttr("required");  
    }
    
    else if(user_type=='E')
    {
      $("#gender_div").show();
      $("#club_agent_div").hide();
      $("#business_name").removeAttr("required");  
    }
    
    else
    {
         $("#club_agent_div").hide();
         $("#business_name").removeAttr("required");
         $("#gender_div").hide();
    }
        
        
    }
    
    function show_type(user_type)
    {
        
      if(user_type=='S') 
      {
        $("#type_div").show();  
      }
      else
      {
        $("#type_div").hide();  
      }
    }
    function show_perlour(user_type)
    {
        if(user_type=='C' ||  user_type=='A')
        {
             $("#club_agent_div").show();
             $("#business_name").attr("required",true);
             $("#gender_div").hide();
       
        }
        else{
            $("#club_agent_div").hide();
             $("#gender_div").show();
            $("#business_name").removeAttr("required");
                    
        }
        
    }
    
    function shownotes(user_type)
    {
                $srtipper_type=$("#srtipper_type").val();
                if(user_type=='C' ||  user_type=='A' || user_type=='P' || $srtipper_type=='C' || $srtipper_type=='A')
                {
                    $("#clubnote").show();
                    $("#escortnote").hide();
                }
                else if(user_type=='E' || $srtipper_type=='I')
                {
                    $("#clubnote").hide();
                    $("#escortnote").show();
                }
                else
                {
                    $("#clubnote").hide();
                    $("#escortnote").hide();
                }

        
    }

</script>
<script type="text/javascript">
         // $("#gender").hide();
    

            function getStateCityList(cid) {
                //alert(cid);
                $.ajax({
                    type: "POST",
                    url: "<?php echo $this->Html->url('/'); ?>users/getCityListOfState/",
                    //dataType: "json",
                    data: {cid: cid}
                }).done(function (msg) {
                    //alert(msg);
                    // ctlt
                    $("#ctlt").html(msg);
                });
            }

            function getCityList(cid) {
                //alert(cid);
                $.ajax({
                    type: "POST",
                    url: "<?php echo $this->Html->url('/'); ?>users/getCityListOfCountry/",
                    //dataType: "json",
                    data: {cid: cid}
                }).done(function (msg) {
                    //alert(msg);
                    // ctlt
                    $("#ctlt").html(msg);
                });
            }

            function checkUsername(username) {
                if (/^[a-zA-Z0-9]*$/.test(username) == false) {
                    $("#ugreen").hide('');
                    $("#ured").show('');
                    $("#ured").text(' Invalid Username!');
                    //$("#username").attr("placeholder", username).val("").focus().blur();
                    //BootstrapDialog.alert('Username contains invalid characters. Only letters or numbers please');
                    return false;
                }

                if (username) {
                    //$('#wait-div-username').show();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo $this->Html->url('/'); ?>users/checkusername/",
                        //dataType: "json",
                        data: {username: username}
                    }).done(function (msg) {
                        $('#wait-div-email').hide();
                        if (msg == 1) {
                            $("#ugreen").hide('');
                            $("#ured").show('');
                            $("#ured").text('Username already exists!');
                            //BootstrapDialog.alert('Email already exists!. Try with another.');
                            $("#username").attr("placeholder", username).val("").focus().blur();
                        } else if (msg == 0) {
                            $("#ured").hide('');
                            $("#ugreen").show('');
                            $("#ugreen").text('Username available');
                        }
                    });
                }
            }

            function validateEmail(email) {
                var re = /\S+@\S+\.\S+/;
                return re.test(email);
            }
            function checkEmail(email) {
                if (!validateEmail(email)) {
                    $("#ugreene").hide('');
                    $("#urede").show('');
                    $("#urede").text(' Invalid Email!');
                    //BootstrapDialog.alert('Invalid Email');
                    return false;
                }

                if (email) {
                    $('#wait-div-email').show();
                    $.ajax({
                        type: "POST",
                        //url: "<?php echo $this->Html->url('/'); ?>users/checkemail/",
                        url: "<?php echo $this->Html->url('/'); ?>users/checkemail/",
                        //dataType: "json",
                        data: {email: email}
                    }).done(function (msg) {
                        $('#wait-div-email').hide();
                        if (msg == 1) {
                            $("#ugreene").hide('');
                            $("#urede").show('');
                            $("#urede").text('Email already exists!');
                            //BootstrapDialog.alert('Email already exists!. Try with another.');
                            $("#email").attr("placeholder", email).val("").focus().blur();
                        } else if (msg == 0) {
                            $("#urede").hide('');
                            $("#ugreene").show('');
                            $("#ugreene").text('Email available');
                        }
                    });
                }
            }

            function show_stripper_type()
            {
                $(".ts").show();

                  // $(".ts").slideDown("slow", function(){
                  // });
            }

        </script>

	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="acntSetting p-1 mb-2">
						<h2 class="font-weight-normal">Escort Registration</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<img src="<?php echo  $this->Html->url('/') ?>images/escort2.jpg" class="img-fluid">
				</div>
				<div class="col-lg-8">
                                    <form action="" method="post" accept-charset="utf-8"  id="form-ui">
					<div class="escortReg">
                                            <div>
						<P class="mb-2 pb-2 acntTypeHeading">Your Account type: <span>Independent Escort/ Private Girl</span></P>
                                                 <div class="selectStyle">
                                                            <select name="user_type" id="user_type" required="required" class="form-control" onchange="show_hide(this.value);show_type(this.value);shownotes(this.value)" size="1">
                                                                <option value=""> Select Member Type </option>
                                                                    <?php foreach ($utype as $ut) { ?>
                                                                    <option  value="<?php echo $ut['UserType']['type'] ?>"><?php echo $ut['UserType']['name'] ?> </option>
                                                                    <?php } ?>
                                                            </select>
                                                        </div>
                                                
                                            </div>
                                           <section class="t1">
                                                        <div class="selectStyle">
                                                            <p id="clubnote" style=" display:none;">
     
                                                            NOTE: Once you click Join Now you will then select a Membership (Compare Memberships HERE).
                                                            After you have selected your Membership Type you will then be able to create a profile and enter
                                                            details, description, services offered etc. You will also be able to update or make changes to your
                                                            Profile whenever you wish to.
                                                            Please Note: Membership Features are dependent on which Membership you choose.
                                                            Upload photos; please see our Terms and Conditions regarding Profile Photos and Videos. All photos
                                                            and videos must be verified by our Admin first so we know it is actually you.
                                                            The verification process is fast, simple and easy to do. Once you have joined simply e-mail us a full
                                                            length photo of yourself (full nude is not required) plus a photo of you holding a current newspaper
                                                            or magazine showing the day and date.
                                                            If you have any questions, require help or are new to the industry and need some guidance then
                                                            please contact our Support Team <a href="<?php echo $this->webroot; ?>contacts">HERE</a>
                                                                
                                                            </p>
                                                            <p id="escortnote" style=" display:none;">
                                                            NOTE: Once you click Join Now you will then be able to create your profile and enter all your
                                                            working details, services offered plus an eye catching description of yourself. You will also be able to
                                                            update or make changes to your Profile whenever you wish to.
                                                            Membership Features are dependent on which Membership you choose of which you will be able to
                                                            choose after clicking Join Now � Please Compare Memberships HERE. (Place a link to the Compare
                                                            Escort Memberships page)
                                                            Last step is to upload your photos, please see our Terms and Conditions regarding Profile Photos and
                                                            Videos. All photos and videos must be verified first so we know it is actually you.
                                                            The verification process is fast, simple and easy to do. Once you have joined simply e-mail us a full
                                                            length photo of yourself (nude is not required) plus a photo of you holding a current newspaper or
                                                            magazine showing the day and date.
                                                            If you have any questions, require help or are new to the industry and need some guidance then
                                                            please contact our Support Team <a href="<?php echo $this->webroot; ?>contacts">HERE</a>
                                                                
                                                            </p>
                                                            <p id="usernote">
                                                                
                                                            </p>
                                                        </div>
                                                        <section class="clr"></section>
                                                    </section>    
                                                
                                                
                                                
						<div class="mt-3">
							<P class="mb-2 pb-2 acntTypeHeading">Personal Information:</P>
							<div class="form-group row">
							  <label class="col-lg-4 col-form-label text-right">Name<span>*</span>:</label>
							  <div class="col-lg-8">
                                                              <input type="text" class="form-control text-field large" value="" id="first_name" required="required" name="first_name" maxlength="20">
							  </div>
							</div>
                                                        
                                                        
                                                        <section class="ts strp" style="display:none;" id="type_div">
                                                            <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label text-right"> Type <span>*</span>: </label>
                                                        <div class="selectStyle col-lg-8">
                                                            <select name="srtipper_type" id="srtipper_type" class="form-control" size="1" onchange="show_perlour(this.value);shownotes(this.value);">
                                                                <option value="">Select Stripper Type</option>
                                                                <option value="C">Club</option>
                                                                <option value="A">Agent</option>
                                                                 <option value="I">Independent</option>
                                                            </select>
                                                        </div>
                                                        <section class="clr"></section>
                                                        </div> 
                                                    </section>
                                                        
                                                   <section>
                                                        <section class="t1" id="club_agent_div" style="display:none;">
                                                            <div class="form-group row">
                                                            <label class="col-lg-4 col-form-label text-right"> Club/Agency/Parlour Name<span>*</span>: </label>
                                                            <div class="col-lg-8">
                                                            <input type="text" value="" id="business_name" name="business_name" maxlength="20" class="form-control text-field large">
                                                            <section class="clr"></section>
                                                            </div>
                                                            </div>
                                                        </section>
                                                    </section>     
                                                        
                                                        
                                                        
                                                        
                                                        
							<div class="form-group row">
							  <label class="col-lg-4 col-form-label text-right">Gender<span>*</span>:</label>
							  <div class="col-lg-8">
							    <p class="d-inline-block mr-4 mb-0 mt-2">
							    <input id="test1" name="radio-group" checked="" type="radio">
							    <label for="test1">Male(straight)</label>
							  </p>
							  <p class="d-inline-block mr-4 mb-0 mt-2">
							    <input id="test2" name="radio-group" checked="" type="radio">
							    <label for="test2">Male(gay)</label>
							  </p>
							  <p class="d-inline-block mr-4 mb-0 mt-2">
							    <input id="test3" name="radio-group" checked="" type="radio">
							    <label for="test3">Female</label>
							  </p>
							  <p class="d-inline-block mr-4 mb-0 mt-2">
							    <input id="test4" name="radio-group" checked="" type="radio">
							    <label for="test4">Trans</label>
							  </p>
							  </div>
							</div>
                                                        
                                                        <section class="t1">
                                                            <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label text-right"> Country <span>*</span>: </label>
                                                        <div class="selectStyle col-lg-8">
                                                           
                                                            <select name="country_id" id="country_id" required="required"  class="form-control" size="1">
<!--                                                                <option value=""> Select Country </option>-->
                                                                    <?php foreach ($countries2 as $cntk => $cntv) { ?>
                                                                        <option  value="<?php echo $cntk ?>" > <?php echo $cntv ?> </option>
                                                                    <?php } ?>
                                                            </select>
                                                        </div>
                                                        <section class="clr"></section>
                                                            </div>
                                                    </section>
                                                        
                                                        
                                                            <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label text-right"> City/Region <span>*</span>: </label>
                                                        <div class="selectStyle col-lg-8" id="ctlt">
                                                            <select name="city_id" id="city_id"  class="form-control" size="1">
                                                                <option value="">Select City</option>
                                                                <?php
                                                                foreach($locationsarray as $location)
                                                                {
                                                                ?>
                                                                <option value="<?php echo $location['Location']['id']?>"><?php echo $location['Location']['name']?></option>
                                                                <?php } ?>
                                                                
                                                            </select>
                                                        </div>
                                                        <section class="clr"></section>
                                                            </div>
                                                    


							<div class="form-group row">
							  <label class="col-lg-4 col-form-label text-right">Telephone No<span>*</span>:</label>
							  <div class="col-lg-8">
                                                              <input class="form-control text-field" type="text" id="phone" name="phone" required="required">
							  </div>
							</div>
                                                        
                                                        
                                                        <div class="form-group row">
							  <label class="col-lg-4 col-form-label text-right">Landline No<span>*</span>:</label>
							  <div class="col-lg-8">
                                                              <input class="form-control text-field" type="text" id="phone" name="mobile_no" required="required">
							  </div>
							</div>
                                                      
                                                        
                                                        <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label text-right"> Email Address : <span>*</span></label>
                                                       <div class="col-lg-8">

                                                            <input type="email" onblur="checkEmail(this.value)" required="required" value="" maxlength="50" class="form-control text-field large"
                                                                   id="email" name="email" style="width:100%;" >
                                                            <div style="display:none" id="wait-div-email">
                                                                <img src="http://layout9.demoparlour.com/advdirectory/assets/layout9/images/loding_small.gif"></div>
                                                            <div class="checkusername ured" id="urede"></div>
                                                            <div class="checkusername ugreen" id="ugreene"></div>
                                                        
                                                       </div>
                                                        <section class="clr"></section>
                                                        </div>
                                                   
                                                        <div class="form-group row">
							  <label class="col-lg-4 col-form-label text-right">Would you like a FREE e-mail address:</label>
							  <div class="col-lg-8">
							    <p class="d-inline-block mr-4 mb-0 mt-2">
							    <input type="radio" name="is_freeemail" value="1">
							    <label >Yes</label>
							  </p>
							  <p class="d-inline-block mr-4 mb-0 mt-2">
                                                              <input type="radio" name="is_freeemail" value="0" >
							    <label>No</label>
							  </p>
							  
							  </div>
							</div>
                                                        
                                                       <div class="form-group row">
							  <label class="col-lg-4 col-form-label text-right">Do you require a photographer?:</label>
							  <div class="col-lg-8">
							    <p class="d-inline-block mr-4 mb-0 mt-2">
							    <input type="radio" name="is_photographer" value="1">
							    <label>Yes</label>
							  </p>
							  <p class="d-inline-block mr-4 mb-0 mt-2">
							    <input type="radio" name="is_photographer" value="0" >
							    <label>No</label>
							  </p>
							  
							  </div>
							</div> 
                                                        
                                                     
						</div>
						
						
						
						
						<div class="mt-4">
							<P class="mb-2 pb-2 acntTypeHeading">Login Information</P>
<!--							<div class="form-group row">
							  <label class="col-lg-4 col-form-label text-right">User Name<span>*</span>:</label>
							  <div class="col-lg-8">
							    <input class="form-control text-field" type="text">
							  </div>
							</div>-->
                                                        
                                                        
                                                            <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label text-right"> User Name <span>*</span>:</label>
                                                        <!--<div style=" float: left;position: relative;width: 646px;" class="euro-avai">-->
                                                            <div class="col-lg-8">
                                                            <input type="text" onblur="checkUsername(this.value)" required="required" value="" maxlength="20" class="form-control text-field large" id="username" name="username" style="width:100%;" >
                                                            </div>
                                                            <div style="display:none" id="wait-div-username">
                                                                <img src="http://layout9.demoparlour.com/advdirectory/assets/layout9/images/loding_small.gif"></div>
                                                            <div class="checkusername ured" id="ured"></div>
                                                            <div class="checkusername ugreen" id="ugreen"></div>
                                                        <!--</div>-->
                                                        <section class="clr"></section>
                                                            </div>
                                                    
                                                        
                                                        
							<div class="form-group row">
							  <label class="col-lg-4 col-form-label text-right">Password<span>*</span>:</label>
							  <div class="col-lg-8">
							    <input type="password" value="" maxlength="50" class="form-control text-field large" required="required" id="password" name="password" >
							  </div>
							</div>

							<div class="form-group row">
							  <label class="col-lg-4 col-form-label text-right">Confirm Password<span>*</span>:</label>
							  <div class="col-lg-8">
							    <input type="password" value="" maxlength="50" class="form-control text-field large" required="required" id="cpassword" name="cpassword" >
							  </div>
							</div>

                                                        <section class="t1">
                                                        <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label text-right">Additional Notes:</label>
                                                        <div class="col-lg-8">
                                                        <textarea class="form-control text-field large" name="notes"></textarea>
                                                        </div>
                                                        
                                                        <section class="clr"></section>
                                                        </div>
                                                        </section>
						</div>
						
						<div class="mt-4">
							<P class="mb-2 pb-2 acntTypeHeading">Other Information</P>
<!--							<div class="form-group row">
							  <label class="col-lg-4 col-form-label text-right">Enter Security Code<span>*</span>:</label>
							  <div class="col-lg-3">
							    <input class="form-control text-field" type="text">
							  </div>
							  <div class="col-lg-3">
							    <img src="images/captcha.png" class="img-fluid">
							  </div>
							</div>-->
                                                        <div class="form-group row">
                                                        <div class="smart-forms smart-container col-lg-3">
                                                                <div class="colm colm4">
                                                                    <label class="field option block" style="width: auto;">
                                                                        <div class="g-recaptcha" data-sitekey="6LcBtBsUAAAAAIJRtqR4na2iQCLk9rEVFsZEOaBI" style=" margin-top:5px"></div> 
                                                                </div>
                                                            </div>
                                                        </div>
							<div class="form-group row">
							  <div class="col-lg-4 col-form-label text-right"></div>
							  <div class="col-lg-8">
							  	  <div>
								    
                                                                    <input type="checkbox" id="box-1" required="required" name="terms" value="1" >
  									<label for="box-1">You Must Agree to Our <span class="termsOfservice">Terms of Service</span></label>
								  </div>
								  <div>
								    
                                                                    <input type="checkbox" id="box-2" name="is_newsletter" value="1">
  									<label for="box-2">Subscribe for Newsletter</label>
								  </div>
							  </div>
							</div>
							<div class="form-group row">
							  <div class="col-lg-4 col-form-label text-right"></div>
							  <div class="col-lg-8">
									
                                                                        <input type="submit" value="Join Now" id="submit" name="submit" class="btn btn-primary buttonGrey">
							  </div>
						</div>
					</div>
				</div>
                                    </form>
			</div>
		</div>
	</section>
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
    
    
    <script>
    	$(function(){

    $('.spinner .btn:first-of-type').on('click', function() {
      var btn = $(this);
      var input = btn.closest('.spinner').find('input');
      if (input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max'))) {    
        input.val(parseInt(input.val(), 10) + 1);
      } else {
        btn.next("disabled", true);
      }
    });
    $('.spinner .btn:last-of-type').on('click', function() {
      var btn = $(this);
      var input = btn.closest('.spinner').find('input');
      if (input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min'))) {    
        input.val(parseInt(input.val(), 10) - 1);
      } else {
        btn.prev("disabled", true);
      }
    });

})
    </script>
    <script>
     function showhide()
     {
           var div = document.getElementById("newpost");
    if (div.style.display !== "none") {
        div.style.display = "none";
    }
    else {
        div.style.display = "block";
    }
     }
  </script>
  <script>
     function showhide1()
     {
           var div = document.getElementById("newpost1");
    if (div.style.display !== "none") {
        div.style.display = "none";
    }
    else {
        div.style.display = "block";
    }
     }
  </script>
  </body>
</html>