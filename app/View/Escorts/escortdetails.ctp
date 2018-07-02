
<section class="mt-4">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="profileViewedUpper p-3">
					<div class="row">
						<div class="col-lg-3">
							<h4 class="mb-0 mt-1">PATTY <img src="<?php echo  $this->Html->url('/') ?>images/rightIcon.jpg"></h4>
						</div>
						<div class="col-lg-5">
							<div class="text-center">
								<div class="middlePhNo d-inline-block"><i class="fa fa-phone-square mr-2"></i>+306980077894
								<span class="d-block"><small>Telephone</small></span></div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="float-right text-right">
								Profile viewed:
								<span class="grey-back">0</span>
								<span class="grey-back">0</span>
								<span class="grey-back">0</span>
								<span class="grey-back">0</span>
								<span class="grey-back">0</span>
								<p class="mb-0">Last login date:not login yet online now</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="mt-4 profDetailsPart">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
		            <ul class="nav nav-tabs mt-4 tabParts">
					  <li ><a data-toggle="tab" href="#home" class="active">Images<span class="colorPink ml-2">(9)</span></a></li>
					  <li><a data-toggle="tab" href="#menu1">Videos <span class="colorPink ml-2">(1)</span></a></li>
					</ul>
					<div class="tab-content">
					  <div id="home" class="tab-pane in active">
					  	<a class="btn btn-primary font-12">Private Pictures</a>
					  	<a class="btn btn-primary font-12">Private Videos</a>
					  	<div class="womanPictures">
					  		<ul class="pl-0">
					  			<li class="mt-2"><img src="<?php echo  $this->Html->url('/') ?>images/nakedWoman2.jpg" class="img-fluid"></li>
					  			<li class="mt-2"><img src="<?php echo  $this->Html->url('/') ?>images/nakedWoman.png" class="img-fluid"></li>
					  			<li class="mt-2"><img src="<?php echo  $this->Html->url('/') ?>images/escort16.jpg" class="img-fluid"></li>
					  			<li class="mt-2"><img src="<?php echo  $this->Html->url('/') ?>images/standingCallGirl.jpg" class="img-fluid"></li>
					  		</ul>
					  	</div>
					  </div>
					  <div id="menu1" class="tab-pane">
					  </div>
					</div>
	</div>
			<div class="col-lg-9">
				<div class="row">
					<div class="col-lg-9">
						<div class="d-flex justify-content-start align-items-center votesPart">
							
							<h4 class="colorGray mb-0 mr-3"><span class="d-block votes">Votes</span>10</h4>
							<p class="mb-0">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,</p>
						</div>
						<div class="video mt-3">
							<iframe width="100%" height="315" src="https://www.youtube-nocookie.com/embed/OIQQ8jmsbMM" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
						</div>
						<ul class="nav nav-tabs mt-4 tabParts tabPart121">
					  <li ><a data-toggle="tab" href="#esCort121" class="active">Profile Information</a></li>
					  <li><a data-toggle="tab" href="#esCort122">Rates and Schedules</a></li>
					  <li><a data-toggle="tab" href="#esCort123">Tours <span class="colorPink ml-2">(1)</span></a></li>
					  <li><a data-toggle="tab" href="#esCort124">Reviews (0) and Comment (0)</a></li>
					  <li><a data-toggle="tab" href="#esCort125">Blogs <span class="colorPink ml-2">(1)</span></a></li>
					  <li><a data-toggle="tab" href="#esCort126">My Wall <span class="colorPink ml-2">(1)</span></a></li>
					  <li><a data-toggle="tab" href="#esCort127">Shop <span class="colorPink ml-2">(1)</span></a></li>
					  <li><a data-toggle="tab" href="#esCort128">Happy Hour <span class="colorPink ml-2">(1)</span></a></li>
					  <li><a data-toggle="tab" href="#esCort129">Location</a></li>
					</ul>
					<div class="tab-content">
					  <div id="home" class="tab-pane in active">
					  	<div class="row">
					  		<div class="col-lg-6">
					  			<div class="profLeftP">
									<ul>
										<li class="mb-2">
										   <div class="nameField p-1">Escort Type</div>
										   <div class="namePart mt-1 ml-2"><?php echo ($users[0]['EscortType']['name']!=""?$users[0]['EscortType']['name']:"N/A") ?> (<?php echo ($users[0]['User']['gender']=="F"?"Female":"Male"); ?>)</div>
										   
										</li>
										<li class="mb-2">
										   <div class="nameField p-1">Eye Color</div>
										   <div class="namePart mt-1 ml-2"><?php echo ($users[0]['Eyecolor']['color_name']!=""?$users[0]['Eyecolor']['color_name']:"N/A") ?></div>
										</li>
										<li class="mb-2">
										   <div class="nameField p-1">Height</div>
										   <div class="namePart mt-1 ml-2"><?php echo $users[0]['User']['height']." ft" ?></div>
										</li>
										<li class="mb-2">
										   <div class="nameField p-1">Availability</div>
										   <div class="namePart mt-1 ml-2">Incall/Outcall</div>
										</li>
										<li class="mb-2">
										   <div class="nameField p-1">Body Type</div>
										   <div class="namePart mt-1 ml-2"><?php echo ($users[0]['BodyType']['body_type']!=""?$users[0]['Haircolor']['color_name']:"N/A") ?></div>
										</li>
										<li class="mb-2">
										   <div class="nameField p-1">Bust Size</div>
										   <div class="namePart mt-1 ml-2"><?php echo $users[0]['User']['bust_size']." cm" ?>
										   </div>
										</li>
										<li class="mb-2">
										   <div class="nameField p-1">Orientation</div>
										   <div class="namePart mt-1 ml-2">N/A
										   </div>
										</li>
										<li class="mb-2">
										   <div class="nameField p-1">Statistics</div>
										   <div class="namePart mt-1 ml-2">N/A
										   </div>
										</li>
									</ul>
								</div>
					  		</div>
					  		<div class="col-lg-6">
					  			<div class="profLeftP">
									<ul>
										<li class="mb-2">
										   <div class="nameField p-1">Age</div>
										   <div class="namePart mt-1 ml-2"><?php echo ($users[0]['User']['birthday']!="0000-00-00")?date_diff(date_create($users[0]['User']['birthday']), date_create('today'))->y:"N/A" ?></div>
										   
										</li>
										<li class="mb-2">
										   <div class="nameField p-1">Experience</div>
										   <div class="namePart mt-1 ml-2">Very Experienced</div>
										</li>
										<li class="mb-2">
										   <div class="nameField p-1">Weight</div>
										   <div class="namePart mt-1 ml-2"><?php echo $users[0]['User']['weight']." kg" ?></div>
										</li>
										<li class="mb-2">
										   <div class="nameField p-1">Hair Color</div>
										   <div class="namePart mt-1 ml-2"><?php echo ($users[0]['Haircolor']['color_name']!=""?$users[0]['Haircolor']['color_name']:"N/A") ?></div>
										</li>
										<li class="mb-2">
										   <div class="nameField p-1">Ethnicity</div>
										   <div class="namePart mt-1 ml-2">White</div>
										</li>
										<li class="mb-2">
										   <div class="nameField p-1">Origin</div>
										   <div class="namePart mt-1 ml-2"><?php echo ($users[0]['Origin']['name']!=""?$users[0]['Origin']['name']:"N/A") ?>
										   </div>
										</li>
										<li class="mb-2">
										   <div class="nameField p-1">Dress Size</div>
										   <div class="namePart mt-1 ml-2">N/A
										   </div>
										</li>
									</ul>
								</div>
					  		</div>
					  	</div>
					  </div>
					  <div id="menu1" class="tab-pane">
					  </div>
					</div>
					</div>
					<div class="col-lg-3 rightPartss">
						<ul class="pl-0 socialIcon mb-2">
							<li class="faceBookColor"><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li class="twitterColor"><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li class="googlePlusColor"><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li class="linkedInColor"><a href="#"><i class="fa fa-linkedin"></i></a></li>
							<div class="clearfix"></div>
						</ul>
						<button type="button" class="btn btn-primary btn-block mb-2">Send Message</button>
						<button type="button" class="btn btn-primary btn-block btn-sm mb-2">Book Me</button>
						<button type="button" class="btn btn-primary btn-block btn-sm btnPart2 mb-2 text-left"><span><i class="fa fa-star" aria-hidden="true"></i>
</span>Add to Favorite</button>
						<button type="button" class="btn btn-primary btn-block btn-sm btnPart2 mb-2 text-left"><span><i class="fa fa-bell" aria-hidden="true"></i>
</span>Alert Me</button>
						<button type="button" class="btn btn-primary btn-block btnPart2 mb-2 text-left"><span><i class="fa fa-thumbs-up" aria-hidden="true"></i>

</span>Voted</button>
<button type="button" class="btn btn-primary btn-block btnPart2 mb-2 text-left"><span><i class="fa fa-flag" aria-hidden="true"></i></span>Report a Fake</button>
					</div>
				</div>
			</div>
		</div>
	</div>			
</section>
