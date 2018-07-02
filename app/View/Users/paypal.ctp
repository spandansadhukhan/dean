<div class="content-container module contact-page">
        	
            <!-- Title Section -->
            <div class="title-section">
                <div class="row">
                    <div class="small-12 columns">
                        <div class="row">
                            <div class="col-sm-12" style="text-align:center;color:#fff">
                                <h3>Transferring To Paypal</h3>
                                <p>Please wait some time.. you are transferring to Paypal</p>
                            </div>
                        </div>

                         <body onLoad="javascript:document.fPaypal.submit();">

                        <form id="fPaypal" name="fPaypal" method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">

                        <input type="hidden" name="cmd" value="_xclick">
                        <input type="hidden" name="rm" value="2">
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="business" value="nits.arpita@gmail.com">
                        <input type="hidden" name="currency_code" value="USD">
                        <input type="hidden" name="notify_url" value="http://thedirectory.nz/ipn.php">
                        <input type="hidden" name="return" value="http://thedirectory.nz/users/success">
                        <input type="hidden" name="cancel_return" value="http://thedirectory.nz/users/failure">
                        <input type="hidden" name="item_name" value="">
                        <input type="hidden" name="amount" value="<?php echo $this->Session->read('finalprice'); ?>">
                        <input type="hidden" name="custom" value="">
                    </form>


                    </div> <!-- title /-->
                </div><!-- row /-->
            </div>
            <!-- Title Section End -->
            
            
        </div>
	    <!-- Content Area Ends -->

       