	
<section class="mt-4">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="contLeftPart p-3 mb-3">
					<div class="row">
						<div class="col-lg-8">
							<h2>Escorts in <span class="d-block">New zealand</span></h2>
							<div class="girlCount p-2">
								<?php echo $total_escort;?> Girls
							</div>
						</div>
						<div class="col-lg-4">
							<img src="<?php echo  $this->Html->url('/') ?>images/10-2-new-zealand-flag-png-hd.png" class="img-fluid">
						</div>
					</div>
					<div class="cityHeading mt-2 p-2">Category:</div>
					<ul class="list-unstyled cityListing">
                                            
						<li class="d-flex justify-content-between">
							<div class="cityname">
								Lorem Ipsum
							</div>
							<div class="citycount">
								21
							</div>
						</li>
						<li class="d-flex justify-content-between">
							<div class="cityname">
								Lorem Ipsum
							</div>
							<div class="citycount">
								21
							</div>
						</li>
						<li class="d-flex justify-content-between">
							<div class="cityname">
								Lorem Ipsum
							</div>
							<div class="citycount">
								21
							</div>
						</li>
						<li class="d-flex justify-content-between">
							<div class="cityname">
								Lorem Ipsum
							</div>
							<div class="citycount">
								21
							</div>
						</li>
					</ul>
				</div>
				
				<div class="contLeftPart p-3">
					<div class="cityHeading mt-2 p-2">Emotional Aspects Related to Escorting</div>
					<div class="escortFood mt-4 mb-4 text-center">
						<img src="<?php echo  $this->Html->url('/') ?>images/callGirl2.jpg" class="img-fluid">
					</div>
					<p class="text-left color-white mb-0">14-07-2018</p>
					<p class="color-white mt-2 mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architect</p>			
					
				</div>
				<div class="cityHeading p-2">All Escort Lessions</div>
			</div>
			<div class="col-lg-6 ">
				<div class="middlePart">
					<div class="directoryEscortHeading p-2 mb-4">
					<h2 class="mb-0">Massage Parlours</h2>
				</div>
					<div class="row">
                                            <?php 
                                if(!empty($escorttours)){
                                    foreach ($escorttours as $showclubs) {
                            ?>
					<div class="col-lg-4 mb-2">
						<div class="bg-gray p-1 middleImage">
							<div class="middleImagePart agency-image" style="background:url(<?php echo $this->webroot?>user_images/<?php echo $showclubs['User']['profile_image']?>) no-repeat;">
							</div>
							<div class="girlName mt-2 mb-2">
								<h2 class="text-uppercase text-center text-uppercase font-14"><?php echo $showclubs['User']['first_name'].$showclubs['User']['last_name']?></h2>
							</div>
							<div class="girlAge text-center mt-2 mb-2">
								<p class="mb-0">Location :<?php echo $showclubs['Country']['name']?></p>
							</div>
							<div class="bottomRate text-center mt-2 mb-2">
								<p><i class="fa fa-phone-square mr-2"></i><?php echo $showclubs['User']['phone_no']?></p>
							</div>
<!--							<div class="escortCount">
								<ul>
									<li><img src="images/callGirl1.jpg"></li>
									<li><img src="images/callGirl2.jpg"></li>
									<li><img src="images/callGirl3.jpg"></li>
									<li><img src="images/callGirl4.jpg"></li>
									<li><img src="images/callGirl5.jpg"></li>
									<div class="clearfix"></div>
								</ul>
							</div>-->
						</div>
					</div>
                                    <?php }
                                }else{ ?>
                                            
                                       <div class="col-lg-4 mb-2"> 
                                           
                                         No Escort Found  
                                       </div>
                                            
                                            
                                    <?php } ?>
                                            
<!--					<div class="col-lg-4 mb-2">
						<div class="bg-gray p-1 middleImage">
							<div class="middleImagePart agency-image" style="background:url(images/escortAgency2.jpg) no-repeat;">
							</div>
							<div class="girlName mt-2 mb-2">
								<h2 class="text-uppercase text-center text-uppercase font-14">Abby 69 Escorts</h2>
							</div>
							<div class="girlAge text-center mt-2 mb-2">
								<p class="mb-0">Total Escorts : 2</p>
							</div>
							<div class="bottomRate text-center mt-2 mb-2">
								<p><i class="fa fa-phone-square mr-2"></i>1234567890</p>
							</div>
							<div class="escortCount">
								<ul>
									<li><img src="images/callGirl1.jpg"></li>
									<li><img src="images/callGirl2.jpg"></li>
									<div class="clearfix"></div>
								</ul>
							</div>
						</div>
						</div>
						<div class="col-lg-4 mb-2">
						<div class="bg-gray p-1 middleImage">
							<div class="middleImagePart agency-image" style="background:url(images/escortAgency3.jpg) no-repeat;">
							</div>
							<div class="girlName mt-2 mb-2">
								<h2 class="text-uppercase text-center text-uppercase font-14">Babylon Girls</h2>
							</div>
							<div class="girlAge text-center mt-2 mb-2">
								<p class="mb-0">Total Escorts : 4</p>
							</div>
							<div class="bottomRate text-center mt-2 mb-2">
								<p><i class="fa fa-phone-square mr-2"></i>1234567890</p>
							</div>
							<div class="escortCount">
								<ul>
									<li><img src="images/callGirl1.jpg"></li>
									<li><img src="images/callGirl2.jpg"></li>
									<li><img src="images/callGirl3.jpg"></li>
									<li><img src="images/callGirl4.jpg"></li>
									<li><img src="images/callGirl5.jpg"></li>
									<div class="clearfix"></div>
								</ul>
							</div>
						</div>
						</div>
						<div class="col-lg-4 mb-2">
						<div class="bg-gray p-1 middleImage">
							<div class="middleImagePart agency-image" style="background:url(images/escortAgency4.jpg) no-repeat;">
							</div>
							<div class="girlName mt-2 mb-2">
								<h2 class="text-uppercase text-center text-uppercase font-14">Chesire In call</h2>
							</div>
							<div class="girlAge text-center mt-2 mb-2">
								<p class="mb-0">Total Escorts : 0</p>
							</div>
							<div class="bottomRate text-center mt-2 mb-2">
								<p><i class="fa fa-phone-square mr-2"></i>1234567890</p>
							</div>
							<div class="escortCount">
								<h2 class="color-white font-22 text-center">No Escort Added</h2>
							</div>
						</div>
						</div>
						<div class="col-lg-4 mb-2">
						<div class="bg-gray p-1 middleImage">
							<div class="middleImagePart agency-image" style="background:url(images/noImageFound.jpeg) no-repeat;">
							</div>
							<div class="girlName mt-2 mb-2">
								<h2 class="text-uppercase text-center text-uppercase font-14">VIP ASIAN PARADISE</h2>
							</div>
							<div class="girlAge text-center mt-2 mb-2">
								<p class="mb-0">Total Escorts : 0</p>
							</div>
							<div class="escortCount">
								<h2 class="color-white font-22 text-center">No Escort Added</h2>
							</div>
						</div>
						</div>
						<div class="col-lg-4 mb-2">
						<div class="bg-gray p-1 middleImage">
							<div class="middleImagePart agency-image" style="background:url(images/escortAgency1.jpg) no-repeat;">
							</div>
							<div class="girlName mt-2 mb-2">
								<h2 class="text-uppercase text-center text-uppercase font-14">VIP ASIAN PARADISE</h2>
							</div>
							<div class="girlAge text-center mt-2 mb-2">
								<p class="mb-0">Total Escorts : 4</p>
							</div>
							<div class="bottomRate text-center mt-2 mb-2">
								<p><i class="fa fa-phone-square mr-2"></i>1234567890</p>
							</div>
							<div class="escortCount">
								<ul>
									<li><img src="images/callGirl1.jpg"></li>
									<li><img src="images/callGirl2.jpg"></li>
									<li><img src="images/callGirl3.jpg"></li>
									<li><img src="images/callGirl4.jpg"></li>
									<li><img src="images/callGirl5.jpg"></li>
									<div class="clearfix"></div>
								</ul>
							</div>
						</div>
						</div>
						<div class="col-lg-4 mb-2">
						<div class="bg-gray p-1 middleImage">
							<div class="middleImagePart agency-image" style="background:url(images/escortAgency1.jpg) no-repeat;">
							</div>
							<div class="girlName mt-2 mb-2">
								<h2 class="text-uppercase text-center text-uppercase font-14">VIP ASIAN PARADISE</h2>
							</div>
							<div class="girlAge text-center mt-2 mb-2">
								<p class="mb-0">Total Escorts : 4</p>
							</div>
							<div class="bottomRate text-center mt-2 mb-2">
								<p><i class="fa fa-phone-square mr-2"></i>1234567890</p>
							</div>
							<div class="escortCount">
								<ul>
									<li><img src="images/callGirl1.jpg"></li>
									<li><img src="images/callGirl2.jpg"></li>
									<li><img src="images/callGirl3.jpg"></li>
									<li><img src="images/callGirl4.jpg"></li>
									<li><img src="images/callGirl5.jpg"></li>
									<div class="clearfix"></div>
								</ul>
							</div>
						</div>
						</div>
						<div class="col-lg-4 mb-2">
						<div class="bg-gray p-1 middleImage">
							<div class="middleImagePart agency-image" style="background:url(images/escortAgency1.jpg) no-repeat;">
							</div>
							<div class="girlName mt-2 mb-2">
								<h2 class="text-uppercase text-center text-uppercase font-14">VIP ASIAN PARADISE</h2>
							</div>
							<div class="girlAge text-center mt-2 mb-2">
								<p class="mb-0">Total Escorts : 4</p>
							</div>
							<div class="bottomRate text-center mt-2 mb-2">
								<p><i class="fa fa-phone-square mr-2"></i>1234567890</p>
							</div>
							<div class="escortCount">
								<ul>
									<li><img src="images/callGirl1.jpg"></li>
									<li><img src="images/callGirl2.jpg"></li>
									<li><img src="images/callGirl3.jpg"></li>
									<li><img src="images/callGirl4.jpg"></li>
									<li><img src="images/callGirl5.jpg"></li>
									<div class="clearfix"></div>
								</ul>
							</div>
						</div>
						</div>
						<div class="col-lg-4 mb-2">
						<div class="bg-gray p-1 middleImage">
							<div class="middleImagePart agency-image" style="background:url(images/escortAgency1.jpg) no-repeat;">
							</div>
							<div class="girlName mt-2 mb-2">
								<h2 class="text-uppercase text-center text-uppercase font-14">VIP ASIAN PARADISE</h2>
							</div>
							<div class="girlAge text-center mt-2 mb-2">
								<p class="mb-0">Total Escorts : 4</p>
							</div>
							<div class="bottomRate text-center mt-2 mb-2">
								<p><i class="fa fa-phone-square mr-2"></i>1234567890</p>
							</div>
							<div class="escortCount">
								<ul>
									<li><img src="images/callGirl1.jpg"></li>
									<li><img src="images/callGirl2.jpg"></li>
									<li><img src="images/callGirl3.jpg"></li>
									<li><img src="images/callGirl4.jpg"></li>
									<li><img src="images/callGirl5.jpg"></li>
									<div class="clearfix"></div>
								</ul>
							</div>
						</div>
						</div>
						<div class="col-lg-4 mb-2">
						<div class="bg-gray p-1 middleImage">
							<div class="middleImagePart agency-image" style="background:url(images/escortAgency1.jpg) no-repeat;">
							</div>
							<div class="girlName mt-2 mb-2">
								<h2 class="text-uppercase text-center text-uppercase font-14">VIP ASIAN PARADISE</h2>
							</div>
							<div class="girlAge text-center mt-2 mb-2">
								<p class="mb-0">Total Escorts : 4</p>
							</div>
							<div class="bottomRate text-center mt-2 mb-2">
								<p><i class="fa fa-phone-square mr-2"></i>1234567890</p>
							</div>
							<div class="escortCount">
								<ul>
									<li><img src="images/callGirl1.jpg"></li>
									<li><img src="images/callGirl2.jpg"></li>
									<li><img src="images/callGirl3.jpg"></li>
									<li><img src="images/callGirl4.jpg"></li>
									<li><img src="images/callGirl5.jpg"></li>
									<div class="clearfix"></div>
								</ul>
							</div>
						</div>
						</div>
						<div class="col-lg-4 mb-2">
						<div class="bg-gray p-1 middleImage">
							<div class="middleImagePart agency-image" style="background:url(images/escortAgency1.jpg) no-repeat;">
							</div>
							<div class="girlName mt-2 mb-2">
								<h2 class="text-uppercase text-center text-uppercase font-14">VIP ASIAN PARADISE</h2>
							</div>
							<div class="girlAge text-center mt-2 mb-2">
								<p class="mb-0">Total Escorts : 4</p>
							</div>
							<div class="bottomRate text-center mt-2 mb-2">
								<p><i class="fa fa-phone-square mr-2"></i>1234567890</p>
							</div>
							<div class="escortCount">
								<ul>
									<li><img src="images/callGirl1.jpg"></li>
									<li><img src="images/callGirl2.jpg"></li>
									<li><img src="images/callGirl3.jpg"></li>
									<li><img src="images/callGirl4.jpg"></li>
									<li><img src="images/callGirl5.jpg"></li>
									<div class="clearfix"></div>
								</ul>
							</div>
						</div>
						</div>
						<div class="col-lg-4 mb-2">
						<div class="bg-gray p-1 middleImage">
							<div class="middleImagePart agency-image" style="background:url(images/escortAgency1.jpg) no-repeat;">
							</div>
							<div class="girlName mt-2 mb-2">
								<h2 class="text-uppercase text-center text-uppercase font-14">VIP ASIAN PARADISE</h2>
							</div>
							<div class="girlAge text-center mt-2 mb-2">
								<p class="mb-0">Total Escorts : 4</p>
							</div>
							<div class="bottomRate text-center mt-2 mb-2">
								<p><i class="fa fa-phone-square mr-2"></i>1234567890</p>
							</div>
							<div class="escortCount">
								<ul>
									<li><img src="images/callGirl1.jpg"></li>
									<li><img src="images/callGirl2.jpg"></li>
									<li><img src="images/callGirl3.jpg"></li>
									<li><img src="images/callGirl4.jpg"></li>
									<li><img src="images/callGirl5.jpg"></li>
									<div class="clearfix"></div>
								</ul>
							</div>
						</div>
						</div>-->
				</div>
				</div>
			</div>
			<div class="col-lg-3">
				<h2 class="text-center color-white text-uppercase font-22">Search</h2>
				<div class="form-group">
    				<label for="exampleInputEmail1">Avalaibility</label>
    				<select class="form-control" id="exampleSelect1">
				      <option>select city/region</option>
				      <option>2</option>
				      <option>3</option>
				      <option>4</option>
				      <option>5</option>
				    </select>	
                </div>
                <div class="form-group">
    				<label for="exampleInputEmail1">City/Region</label>
    				<select class="form-control" id="exampleSelect1">
				      <option>select City</option>
				      <option>2</option>
				      <option>3</option>
				      <option>4</option>
				      <option>5</option>
				    </select>	
                </div>
                <div class="form-group">
    				<label for="exampleInputEmail1">Select Location</label>
    				<select class="form-control" id="exampleSelect1">
				      <option>Select Location</option>
				      <option>2</option>
				      <option>3</option>
				      <option>4</option>
				      <option>5</option>
				    </select>	
                </div>
                <div class="form-group">
    				<label for="exampleInputEmail1">Sort By</label>
    				<select class="form-control" id="exampleSelect1">
				      <option>Vip</option>
				      <option>Standard</option>
				    </select>	
                </div>
                <button type="button" class="btn btn-primary btn-block mt-3">Search</button>
                <div class="advertisePart mb-2 mt-2">
					<img src="<?php echo  $this->Html->url('/') ?>images/bannerImage.jpg" class="img-fluid">
				</div>
				<div class="advertisePart mb-2 mt-2">
					<img src="<?php echo  $this->Html->url('/') ?>images/bannerImage.jpg" class="img-fluid">
				</div>
				<div class="advertisePart mb-2 mt-2">
					<img src="<?php echo  $this->Html->url('/') ?>images/bannerImage.jpg" class="img-fluid">
				</div>
				<div class="advertisePart mb-2 mt-2">
					<img src="<?php echo  $this->Html->url('/') ?>images/bannerImage.jpg" class="img-fluid">
				</div>
				<div class="advertisePart mb-2 mt-2">
					<img src="<?php echo  $this->Html->url('/') ?>images/bannerImage.jpg" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
</section>
