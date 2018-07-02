<?php 
   // pr($userPhoto); exit;
?>

<div class="content-container module contact-page">
        	
            <!-- Title Section -->
            <div class="title-section">
                <div class="row">
                    <div class="small-12 columns">
                        <h1>Transferring To Paypal</h1>
                        <p>Please wait some time.. you are transferring to Paypal</p>
                         <form action="<?php echo Configure::read("PAYPAL_URL");?>" id="paypal_page" method="post" name="paypal_page">
                        <input type="hidden" name="cmd" value="_xclick">
                        <input type="hidden" name="business" value="<?php echo $sitesetting['SiteSetting']['paypal_email']?>">
                        <input type="hidden" name="item_name" value="">
                        <input type="hidden" name="currency_code" value="USD">
                        <input type="hidden" name="no_shipping" value="1">
                        <input type="hidden" name="rm" value="2">
                        <input type="hidden" name="notify_url" value="<?php echo $site_url;?>ipnadvertisement.php">
                        <input type="hidden" name="amount" id="amount" value="<?php echo $this->Session->read('price')?>">
                        <input type="hidden" name="src" value="1">
                        <input type="hidden" name="sra" value="1">
                        <input type="hidden" name="custom" value="<?php echo $this->Session->read('lastid')?>">
                        <input type="hidden" name="return" value="<?php echo $site_url;?>advertisements/success">
                        <input type="hidden" name="cancel_return" value="<?php echo $site_url;?>advertisements">
                        <input type="hidden" name="country" value="" />
                        <input type="hidden" name="first_name" value="" />  
                        <input type="hidden" name="last_name" value="" />   
                        <input type="hidden" name="address1" value="" />
                        <input type="hidden" name="city" value="" />
                        <input type="hidden" name="state" value="" /> 
                        <input type="hidden" name="zip" value="" />
                        <input type="hidden" name="email" value="" />
                        <input type="hidden" name="night_phone_a" value="" />
                        <input type="hidden" name="night_phone_b" value="" />
                        <input type="hidden" name="night_phone_c" value="" /> 
                </form>



                    </div> <!-- title /-->
                </div><!-- row /-->
            </div>
            <!-- Title Section End -->
        </div>
	    <!-- Content Area Ends -->

            <script>
             $(document).ready(function(){
              setTimeout(function(){ document.paypal_page.submit(); }, 5000);    
             

             })   
            </script>    