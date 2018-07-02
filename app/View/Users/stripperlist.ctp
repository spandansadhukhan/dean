
   
	
	
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
					<div class="cityHeading mt-2 p-2">Cities/Regions:</div>
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
					<h2 class="mb-0">Browse Strippers</h2>
				</div>
					<div class="row">
                                             <?php 
            if(!empty($list))
            {
            foreach($list as $lists)
            {                
            ?>
					
                                            <div class="col-lg-4 mb-2">
                                                <div class="bg-gray p-1 middleImage">
                                                    <?php if($lists['User']['profile_image'] != ''){ ?>
							<a href="<?php echo $this->webroot ?>escorts/escortdetails/<?php echo base64_encode($lists['User']['id']); ?>"><div class="middleImagePart" style="background:url('<?php echo $this->webroot?>user_images/<?php echo $lists['User']['profile_image'];?>') no-repeat;" onclick="redirect_detaiils('<?php echo base64_encode($lists['User']['id']); ?>');">
                                                    <?php }else{ ?>
                                                     <a href="<?php echo $this->webroot ?>escorts/escortdetails/<?php echo base64_encode($lists['User']['id']); ?>"><div class="middleImagePart" style="background:url('<?php echo  $this->webroot; ?>noimage.png') no-repeat;" onclick="redirect_detaiils('<?php echo base64_encode($lists['User']['id']);?>');">       
                                                            
                                                    <?php } ?>
                                                            <ul class="middleList">
								   <li>
								   	   <span class="icon"><img src="<?php echo  $this->Html->url('/') ?>images/icon1.png"></span>
								   </li>
								   <li>
								   	<span class="icon"><img src="<?php echo  $this->Html->url('/') ?>images/icon2.png"></span>
								   </li>
								   <li>
								   		<span class="icon"><img src="<?php echo  $this->Html->url('/') ?>images/icon3.png"></span>
								   </li>
								   <li>
								   		<span class="icon"><img src="<?php echo  $this->Html->url('/') ?>images/icon4.png"></span>
								   </li>
							    </ul>
                                                     </div></a>
							<div class="d-flex justify-content-between girlName mt-2 mb-2">
								<h2 class="text-uppercase"><!--Patty--><?php echo $lists['User']['name']; ?></h2>
								<div class="flag"><img src="<?php echo  $this->Html->url('/') ?>images/flag.jpg"></div>
							</div>
							<div class="d-flex justify-content-between girlAge mt-2 mb-2">
                                                            <?php  
                                                    $date =  date('Y',strtotime($lists['User']['birthday']));
                                                    $age=date('Y')-$date;
                                                    ?>
								<p class="mb-0">Age: <?php echo $age; ?>years</p>
								<p class="mb-0">Oxford</p>
							</div>
							<div class="d-flex justify-content-between bottomRate mt-2 mb-2">
								<p class="mb-0">Rates from <?php if(!empty($lists['Rate'][0]['30min_incall'])){echo '&#128;'.$lists['Rate'][0]['30min_incall'];}else{echo 'No rate';} ?></p>
								<p class="mb-0"><i class="fa fa-thumbs-up" aria-hidden="true"></i>
</p>
							</div>
                                                            <span class="t2<?php echo $lists['User']['id'];?>" style="display:none;">
                                                            <?php 
                                                                if($this->Session->read('fuid')){
                                                            ?>    
                                                                <a href="javascript:void(0);" onclick="add_to_fav('<?php echo $lists['User']['id'];?>', '<?php echo $this->Session->read('fuid')?>')">
                                                            <?php }else{ ?>
                                                                    <a href="javascript:void(0);" class="pull-right" onclick="javascript:alert('Please Login to Add to Favorite!!');
                                                                            return false;">
                                                            <?php }?>    
                                                                        <img src="<?php echo  $this->Html->url('/') ?>images/thumbs_up.png" alt="" style="vertical-align:text-bottom;" title="4 Votes"  /></a>
                                                            </span>
						</div>
					
                                        </div>
                                    <?php }
                                }else{ ?>
                                            
                                       <div class="col-lg-4 mb-2"> 
                                           
                                         <h2 style="color:#fff">No results found</h2>
                                       </div>
                                            
                                            
                                    <?php } ?>
                                            

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
