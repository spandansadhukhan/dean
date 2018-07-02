<?php ?>
<section class="main_body">
 		<div class="container">
 			<div class="row">
 				<div class="col-md-3">
 					<div class="provider_left">
 						<?php 
                                      $UserProfile_img=isset($user['User']['profile_img'])?$user['User']['profile_img']:'';
							   $uploadImgPath = WWW_ROOT.'user_images';
							   if($UserProfile_img!='' && file_exists($uploadImgPath . '/' . $UserProfile_img)){
								  echo '<img src="'.$this->webroot.'user_images/'.$UserProfile_img.'" alt="" />';
							   }else{
								  echo '<img src="'.$this->webroot.'user_images/default.png" alt=""  />';
							   }
                                    ?>
						<h2><?php echo $user['User']['first_name'].' '.$user['User']['last_name'];?></h2>
						<p>Joined <?php echo date('M d, Y',strtotime($user['User']['join_date']))?> 
						<?php echo $user['User']['city'].', ';echo ((isset($country) && !empty($country))?$country['Country']['name']:'');?></p>
						<ul>
							<li><a href="" class="fa fa-star"></a></li>
							<li><a href="" class="fa fa-star"></a></li>
							<li><a href="" class="fa fa-star"></a></li>
							<li><a href="" class="fa fa-star"></a></li>
							<li><a href="" class="fa fa-star"></a></li>
						</ul>
 					</div>
 				</div>
 				<div class="col-md-9">
 					<div class="provider_head">
 						<img src="http://www.verizon.com/about/sites/default/files/styles/vzc_page_header/public/page-header-images/working_here_header.jpg?itok=HNO3VXjI" alt="" class="img-responsive"/>
 					</div>
 					<div class="whit_bg">
 						<div class="right_dash_board user_task">
	 					<div class="provider_banner_bottom">
							<!-- <ul class="verification">
							 	<li>Varification</li>
							 	<li><a class="fa fa-facebook" href=""></a></li>
							 	<li><a class="fa fa-twitter" href=""></a></li>
							 	<li><a class="fa fa-linkedin" href=""></a></li>
							 	<li class="active"><a class="fa fa-credit-card" href=""></a></li>
							 </ul>-->
	 						<ul class="postesd">
								<li>
									<h2><?php echo $tasks;?></h2>
									<p>Posted</p>
								</li>
								<li>
									<h2><?php echo $complete;?></h2>
									<p>Completed</p>
								</li>
								<li>
									<h2>0</h2>
									<p>Reviews</p>
								</li>
							</ul>
	 					</div>
	 					<div class="detail_des">
							<h3>About</h3>
							<?php echo $user['User']['about']?>
							
						</div>
						<div class="detail_des">
						<?php if(isset($skill) && !empty($skill))
						{
							if($skill['Skill']['speciality']!='' && !empty($skill['Skill']['speciality']))
							{
								$skills = explode(',',$skill['Skill']['speciality']);
								?>
								<h3>Skills</h3>
									<ul class="skills_del">
									<?php foreach($skills as $skl)
									{
										echo '<li>'.$skl.'</li>';
									}
									?>
									</ul>
								</h3>	
								<?php
							}
							
							if($skill['Skill']['language']!='' && !empty($skill['Skill']['language']))
							{
								$lang = explode(',',$skill['Skill']['language']);
								?>
								<h3>Language</h3>
									<ul class="skills_del">
									<?php foreach($lang as $langs)
									{
										echo '<li>'.$langs.'</li>';
									}
									?>
									</ul>
								</h3>	
								<?php
							}
							
							if($skill['Skill']['work']!='' && !empty($skill['Skill']['work']))
							{
								$work = explode(',',$skill['Skill']['work']);
								?>
								<h3>Work</h3>
									<ul class="skills_del">
									<?php foreach($work as $works)
									{
										echo '<li>'.$works.'</li>';
									}
									?>
									</ul>
								</h3>	
								<?php
							}
							
							if($skill['Skill']['education']!='' && !empty($skill['Skill']['education']))
							{
								$edu = explode(',',$skill['Skill']['education']);
								?>
								<h3>Education</h3>
									<ul class="skills_del">
									<?php foreach($edu as $edus)
									{
										echo '<li>'.$edus.'</li>';
									}
									?>
									</ul>
								</h3>	
								<?php
							}
							
						}
						?>
							
							
						</div>
						<div class="detail_des reviw_providr">
							<h3>Review</h3>
							<div class="chat_box_sec">
							<div class="media">
							  <div class="media-left">
							    <a href="#">
							      <img alt="..." src="http://zblogged.com/wp-content/uploads/2015/11/17.jpg" class="media-object">
							    </a>
							  </div>
							  <div class="media-body">
							    <h5>Sandeep <strong><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></strong><span>January 20 at 5:04pm</span></h5>
							    
							    <p>Today is the correct day for Dhoni to resign as this match was almost in our hand with easy win when dhawan was out but Dhoni purposely made the team to loose.</p>
							  </div>
							</div>
							<div class="media">
								  <div class="media-left">
								    <a href="#">
								      <img alt="..." src="http://zblogged.com/wp-content/uploads/2015/11/17.jpg" class="media-object">
								    </a>
								  </div>
								  <div class="media-body">
								    <h5>Sandeep <strong><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></strong><span>January 20 at 5:04pm</span></h5>
								    
								    <p>Today is the correct day for Dhoni to resign as this match was almost in our hand with easy win when dhawan was out but Dhoni purposely made the team to loose.</p>
							  	  </div>
							</div>
							<div class="media">
									  <div class="media-left">
									    <a href="#">
									      <img alt="..." src="http://zblogged.com/wp-content/uploads/2015/11/17.jpg" class="media-object">
									    </a>
									  </div>
									  <div class="media-body">
									    <h5>Sandeep <strong><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></strong><span>January 20 at 5:04pm</span></h5>
									    
									    <p>Today is the correct day for Dhoni to resign as this match was almost in our hand with easy win when dhawan was out but Dhoni purposely made the team to loose.</p>
								  	  </div>
								</div>
								<div class="media">
									  <div class="media-left">
									    <a href="#">
									      <img alt="..." src="http://zblogged.com/wp-content/uploads/2015/11/17.jpg" class="media-object">
									    </a>
									  </div>
									  <div class="media-body">
									    <h5>Sandeep <strong><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></strong><span>January 20 at 5:04pm</span></h5>
									    
									    <p>Today is the correct day for Dhoni to resign as this match was almost in our hand with easy win when dhawan was out but Dhoni purposely made the team to loose.</p>
								  	  </div>
								</div>
								<div class="media">
									  <div class="media-left">
									    <a href="#">
									      <img alt="..." src="http://zblogged.com/wp-content/uploads/2015/11/17.jpg" class="media-object">
									    </a>
									  </div>
									  <div class="media-body">
									    <h5>Sandeep <strong><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></strong><span>January 20 at 5:04pm</span></h5>
									    
									    <p>Today is the correct day for Dhoni to resign as this match was almost in our hand with easy win when dhawan was out but Dhoni purposely made the team to loose.</p>
								  	  </div>
								</div>
						</div>
						</div>
 					</div>
					</div>
 				</div>
 			</div>
 		</div>
 	</section>
