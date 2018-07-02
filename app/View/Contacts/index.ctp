
    
	
	
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="acntSetting p-1 mb-2">
						<h2 class="font-weight-normal">Contact Us</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="contactUs mt-4">
						<h4>If you have any query please fill the form below</h4>
                                                <form action="" method="post" accept-charset="utf-8" id="form-ui">
						<div class="form-group">
    						<label for="exampleInputEmail1">Name*</label>
                                                <input type="text" name="name" id="name" class="form-control text-field" required="" placeholder="Name">
  						</div>
  						<div class="form-group">
    						<label for="exampleInputEmail1">Contact Number</label>
                                                <input type="text" name="phone" id="phone" class="form-control text-field" required="" placeholder="Contact Number">
  						</div>
  						<div class="form-group">
    						<label for="exampleInputEmail1">Email Address</label>
                                                <input type="email" name="email" class="form-control text-field" required="" placeholder="Email Address">
  						</div>
  						<div class="form-group">
    						<label for="exampleInputEmail1">Subject</label>
                                                <input type="text" name="subject" class="form-control text-field" required="" placeholder="Subject">
  						</div>
  						<div class="form-group">
    						<label for="exampleInputEmail1">Message</label>
    						<textarea placeholder="Message" name="message" class="form-control"></textarea>
  						</div>
                                                    <div class="text-center mt-4"><button type="submit" class="btn btn-primary">Send</button></div>
                                        </form>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="enquries pt-4 mt-4">
						<h4 class="text-center">All Enquiries</h4>
						<div class="enquryText pt-3 pb-3 row">
							<div class="col-lg-6"><h5 class="text-white font-18 text-uppercase m-0">Free Phone</h5></div>
							<div class="col-lg-6"><p class="text-white mb-0"><?php  echo $sitesetting["SiteSetting"]["free_phone"]; ?></p></div>
						</div>
						
						<div class="enquryText pt-3 pb-3 row">
							<div class="col-lg-6"><h5 class="text-white font-18 text-uppercase m-0">International</h5></div>
							<div class="col-lg-6"><p class="text-white mb-0"><?php  echo $sitesetting["SiteSetting"]["international_phone"]; ?></p></div>
						</div>
						<div class="enquryText pt-3 pb-3 row">
							<div class="col-lg-6"><h5 class="text-white font-18 text-uppercase m-0">Emergency Contact</h5></div>
							<div class="col-lg-6"><p class="text-white mb-0"><?php  echo $sitesetting["SiteSetting"]["emergency_phone"]; ?></p><br>(Escorts Only)</div>
						</div>
						<div class="enquryText pt-3 pb-3 row">
							<div class="col-lg-6"><h5 class="text-white font-18 text-uppercase m-0">Office Hours</h5></div>
							<div class="col-lg-6"><p class="text-white mb-0"><?php  echo $sitesetting["SiteSetting"]["office_hours"]; ?></p></div>
						</div>
						<div class="enquryText pt-3 pb-3 row border-bottom-0">
							<div class="col-lg-6"><h5 class="text-white font-18 text-uppercase m-0">Mailing Address</h5></div>
							<div class="col-lg-6"><p class=" text-white mb-0">
                                                                <?php  echo $sitesetting["SiteSetting"]["mailing_address"]; ?>
							</p></div>
						</div>
					</div>
				</div>
		</div>
	</section>
	