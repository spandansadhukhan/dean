<section id="contentsection">
<div id="wait-div" class="wait-div">
  <div class="wait-divin"> <span style="background: url('images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
    Please wait    ....</span> </span> </div>
</div>

<div class="col-left">
<section id="wrapper">
<section id="middle">
<section id="middle-inner">
 <section class="all-pins-do">
 <h2 class="title">Checkout</h2>
<div class="clr"></div>
<section class="content-static" style="background: #fff;">

	      <section class="register-box" style="width: 100%">
	       <section class="register-box-in">
            <h3>Personal Details:</h3>
                            <span style="display:none" id="mem_balance">100.00</span>
                 <span style="display:none" id="total_credits">100</span>
            <section class="tom1">
              <section class="t1">
                <label>Name: </label>
                <acronym>
                <?php echo $userpanties['User']['name'] ?></acronym>
                <section class="clr"></section>
              </section>
              <section class="t1">
                <label>Email Address: </label>
                <acronym>
                <?php echo $userpanties['User']['email'] ?></acronym>
                <section class="clr"></section>
              </section>
              <section class="t1">
                <label>Phone No: </label>
                <acronym>
                <?php echo $userpanties['User']['phone_no'] ?> </acronym>
                <section class="clr"></section>
              </section>
              
            </section>
          </section> </section>
                     <section class="register-box" style="float:right; width:100%; margin-top:10px;">
                     <section class="register-box-in">
            <h3>Payment Details:</h3>
            <section class="tom1">
              
              <section class="t1">
                <label>Total Payment: </label>
                <acronym>$<?php echo $this->Session->read('totalamount') ?>
                </acronym>
                <section class="clr"></section>
              </section>
     <!--         <section class="t1">
                <label>Credit_Conversion_Rate: </label>
                <acronym>1 EUR =  Coints                </acronym>
                <section class="clr"></section>
              </section>
  -->          </section>
          </section>    </section>

<?php echo $this->Form->create('Billing',array('enctype'=>'multipart/form-data')); ?>
<?php echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$this->Session->read('fuid'))); ?>

<section class="register-box" style="margin-top:10px;">
	       <section class="register-box-in">
            <h3>Shipping Address:</h3>
                            <span style="display:none" id="mem_balance">100.00</span>
                 <span style="display:none" id="total_credits">100</span>
            <section class="tom1">
              <div class="form-profile-block">
                                                <label class="pl"> Name:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field">
                                                            <?php echo $this->Form->input('shipping_name',array('class'=>'gui-input','required'=>'required','label'=>false,'div'=>false,'placeholder'=>'Name','value'=>$userpanties['User']['name'],'id'=>'shipname')); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                                <div class="form-profile-block">
                                                <label class="pl"> Email:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field">
                                                            <?php echo $this->Form->input('shipping_email',array('class'=>'gui-input','required'=>'required','label'=>false,'div'=>false,'placeholder'=>'Email','value'=>$userpanties['User']['email'],'id'=>'shipemail')); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="form-profile-block">
                                                <label class="pl"> Phone No:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field">
                                                            <?php echo $this->Form->input('shipping_phone',array('class'=>'gui-input','required'=>'required','label'=>false,'div'=>false,'placeholder'=>'Name','value'=>$userpanties['User']['phone_no'],'id'=>'shipphone')); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-profile-block">
                                                <label class="pl"> Address:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field">
                                                            <?php echo $this->Form->input('shipping_address1',array('class'=>'form-control','required'=>'required','label'=>false,'div'=>false,'placeholder'=>'Address1','id'=>'baddress1')); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-profile-block">
                                                <label class="pl"> Country:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field">
                                                            <?php echo $this->Form->input('shipping_country_id',array('empty'=>'Choose Country','label'=>false,'div'=>false,'options'=>$countries, 'class'=>'gui-input','id'=>'CountryId','required'=>'required','style'=>'width:288px;')); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-profile-block">
                                                <label class="pl"> State:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field">
                                                            <?php echo $this->Form->input('shipping_state_id',array('empty'=>'Choose State','label'=>false,'div'=>false,'options'=>$states, 'class'=>'gui-input','required'=>'required','id'=>'StateId','style'=>'width:288px;')); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-profile-block">
                                                <label class="pl"> City:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field">
                                                            <?php echo $this->Form->input('shipping_city_id',array('empty'=>'Choose City','label'=>false,'div'=>false,'options'=>$cities, 'class'=>'gui-input','id'=>'CityId','style'=>'width:288px;')); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-profile-block">
                                                <label class="pl"> Zip Code:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field">
                                                          <?php echo $this->Form->input('shipping_zip',array('class'=>'gui-input','required'=>'required','label'=>false,'div'=>false,'placeholder'=>'Zip','id'=>'shipzip')); ?>  
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
              
              
             </section>
            </section>
           </section>

<section class="register-box" style="float: right; margin-top:10px;">
	       <section class="register-box-in">
            <h3>Billing Address:</h3>
                            <span style="display:none" id="mem_balance">100.00</span>
                 <span style="display:none" id="total_credits">100</span>
            <section class="tom1">
              <div class="form-profile-block">
                                                <label class="pl"> Name:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field">
                                                            <?php echo $this->Form->input('billing_name',array('class'=>'gui-input','required'=>'required','label'=>false,'div'=>false,'placeholder'=>'Name','value'=>$userpanties['User']['name'],'id'=>'billname')); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                                <div class="form-profile-block">
                                                <label class="pl"> Email:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field">
                                                            <?php echo $this->Form->input('billing_email',array('class'=>'gui-input','required'=>'required','label'=>false,'div'=>false,'placeholder'=>'Email','value'=>$userpanties['User']['email'],'id'=>'billemail')); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="form-profile-block">
                                                <label class="pl"> Phone No:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field">
                                                            <?php echo $this->Form->input('billing_phone',array('class'=>'gui-input','required'=>'required','label'=>false,'div'=>false,'placeholder'=>'Name','value'=>$userpanties['User']['phone_no'],'id'=>'billphone')); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-profile-block">
                                                <label class="pl"> Address:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field">
                                                            <?php echo $this->Form->input('address1',array('class'=>'form-control','required'=>'required','label'=>false,'div'=>false,'placeholder'=>'Address1','id'=>'baddress1')); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="form-profile-block">
                                                <label class="pl"> Country:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field">
                                                            <?php echo $this->Form->input('country_id',array('empty'=>'Choose Country','label'=>false,'div'=>false,'options'=>$countries, 'class'=>'gui-input','id'=>'CountryId1','required'=>'required','style'=>'width:288px;')); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-profile-block">
                                                <label class="pl"> State:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field">
                                                            <?php echo $this->Form->input('state_id',array('empty'=>'Choose State','label'=>false,'div'=>false,'options'=>$states, 'class'=>'gui-input','required'=>'required','id'=>'StateId1','style'=>'width:288px;')); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-profile-block">
                                                <label class="pl"> City:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field">
                                                            <?php echo $this->Form->input('city_id',array('empty'=>'Choose City','label'=>false,'div'=>false,'options'=>$cities, 'class'=>'gui-input','id'=>'CityId1','style'=>'width:288px;')); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-profile-block">
                                                <label class="pl"> Zip Code:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field">
                                                            <?php echo $this->Form->input('zip',array('class'=>'gui-input','required'=>'required','label'=>false,'div'=>false,'placeholder'=>'Zip','id'=>'billzip')); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
              
              
             </section>
            </section>
            
            
</section>

 <section class="register-box" style="float:right; width:100%; margin-top:10px; border: none;">
                    <div class="buttonOuterRed H45" style="float:right;">
              <input type="submit" name="submit" value="Order Now" class="buttonGrey submitButt">
            </div>
                      </section>

                    <?php echo $this->Form->end(); ?>
          
          <div id="error_div" class="isa_error" style="display:none"></div>
               <section class="clr"></section>
               <br /><br />
          <!--<form action="#" method="post" accept-charset="utf-8" class="smart-forms smart-container" id="checkout_form">          <div class="understad">
            <h3>Payment Options</h3>
            <ul>
              <li class="inputContainer">
				  <div class="option-group field">
                        
                       								                            <label class="option">
                                    <input type="radio" name="payment_option" value="creditcard" id="checkMan2" class="payment_option" onclick="CheckForSubmit(this.value)">
                                <span class="radio"></span>   Pay through Credit Cards <img alt="" src="http://layout9.demoparlour.com/advdirectory/assets/layout9/images/cards-footer.png" style="width: 70px;vertical-align:middle;">                 
                            </label>
                                                                                    <label class="option">
                                 <input type="radio" name="payment_option" value="direct" id="checkMan3" class="payment_option" onclick="CheckForSubmit(this.value)">
                                <span class="radio"></span> Direct Payment                  
                            </label>
                                                                                       					
                        </div>
                        
				   </li>
			
			</ul>
            
            <div class="clr"></div>
          </div>
          </form> -->  
 </section>
 </section>
</section>
</section>
</section>
<style>.tom1 label {text-align: left;}</style>
<!-- These variable are important because these are used in checkou.js-->
<script type="text/javascript">
var not_sufficient_credits = 'You have not sufficient credits';
var select_Payment_Option = 'Please select a Payment Option';
</script>
<script src="http://layout9.demoparlour.com/advdirectory/assets/layout9/js/custom/checkout.js"></script>
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

<style>
	label,h3 {
		    color: #3e3e3e;
	}
	.tom1 label {
		color:#3e3e3e!important;
	}
	.form-profile-block .inputContainer textarea {
    margin: 0;
    width: 280px;
}
</style>
<div class="clr"></div>


<script type="text/javascript" >

    $("#CountryId").on('change', function () {
        var stId = $("#CountryId").val();
        $.ajax({
            type: "POST",
            url: "<?php echo $this->webroot ?>pages/country_state/",
            //dataType: "json",
            data: {stId: stId}
        }).done(function (msg) {
            //getStList
            $('#StateId').html(msg);
        });

    });

    $("#StateId").on('change', function () {
        var stId = $("#StateId").val();
        $.ajax({
            type: "POST",
            url: "<?php echo $this->webroot ?>pages/state_city/",
            //dataType: "json",
            data: {stId: stId}
        }).done(function (msg) {
            //getStList
            $('#CityId').html(msg);
        });

    });


    $("#CountryId1").on('change', function () {
        var stId = $("#CountryId1").val();
        $.ajax({
            type: "POST",
            url: "<?php echo $this->webroot ?>pages/country_state/",
            //dataType: "json",
            data: {stId: stId}
        }).done(function (msg) {
            //getStList
            $('#StateId1').html(msg);
        });

    });

    $("#StateId1").on('change', function () {
        var stId = $("#StateId1").val();
        $.ajax({
            type: "POST",
            url: "<?php echo $this->webroot ?>pages/state_city/",
            //dataType: "json",
            data: {stId: stId}
        }).done(function (msg) {
            //getStList
            $('#CityId1').html(msg);
        });

    });

</script>