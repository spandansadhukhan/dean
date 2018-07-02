<div class="content-container module contact-page">
        	
            <!-- Title Section -->
            <div class="title-section">
                <div class="row">
                    <div class="small-12 columns">
                        <h4 style="color:#fff;text-align:center;">Transferring To Paypal</h4>
                        <p style="color:#fff;text-align:center;">Please wait some time.. you are transferring to Paypal</p>
                        <p style="text-align:center;"><img src="<?php echo $this->webroot ?>images/bx_loader.gif" height="50px" width="50px"/></p>

                         <body onLoad="javascript:document.fPaypal.submit();">

                    <form id="fPaypal" name="fPaypal" method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">

                        <input type="hidden" name="cmd" value="_xclick">
                        <input type="hidden" name="rm" value="2">
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="business" value="nits.arpita@gmail.com">
                        <input type="hidden" name="currency_code" value="USD">
                        <input type="hidden" name="notify_url" value="http://107.170.152.166/team2/escort/ipn.php">
                        <input type="hidden" name="return" value="http://107.170.152.166/team2/escort/pages/successpay">
                        <input type="hidden" name="cancel_return" value="http://107.170.152.166/team2/escort/pages/failurepay">
                        <input type="hidden" name="item_name" value="">
                        <input type="hidden" name="amount" value="<?php echo $this->Session->read('totalamount'); ?>">
                        <input type="hidden" name="custom" value="">
                    </form>


                    </div> <!-- title /-->
                </div><!-- row /-->
            </div>
            <!-- Title Section End -->
            
            
        </div>
	    <!-- Content Area Ends -->

       