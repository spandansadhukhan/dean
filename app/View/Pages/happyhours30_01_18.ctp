 <?php echo $this->element('banner');?>               
<section id="contentsection">
<?php echo $this->element('carousel_slider');?>
                    <div id="wait-div" class="wait-div">
                        <!-- <div class="wait-divin"> 
                            <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
                                    Please wait    ....</span> </span> 
                         </div> -->
                    </div>
                    <?php echo $this->Form->create("Filter",array('method'=>'post',"id"=>'SearchForm'));?>
                <div class="searchbar">
            
		<ul>
			<li style="width:20%">
                                <?php echo $this->Form->input("name", array('placeholder'=>"Search By Name:",'div'=>false,'label' => false));?>                                                      
				<button class="search"><i class="fa fa-search"></i></button>
			</li>
			<li style="width:15%">
                        <?php echo $this->Form->input("country_id", array('options'=>$showcountry,'div'=>false,'label' => false));?>                                                      
			</li>
                        
			<li style="width:13%">				
                        <?php echo $this->Form->input("city_id", array('options'=>$locationsarray,'empty'=>'Select Location','div'=>false,'label' => false));?>                                                      
			</li>
                        <li style="width:13%">				
                        <?php echo $this->Form->input("nationality_id", array('options'=>$nationalities,'empty'=>'Nationality','div'=>false,'label' => false));?>                                                      
			</li>
                        
                        <li style="width:9%">
                            <?php echo $this->Form->input("age", array('options'=>$agearr,'empty'=>'Select Age','div'=>false,'label' => false));?>                                                      
                        </li>
			
			<li style="width:9%">
                            <?php echo $this->Form->input("gender", array('options'=>$genders,'empty'=>'Gender','div'=>false,'label' => false));?>                                                      
			</li>
                        <li style="width:9%">
                            <?php echo $this->Form->input("verifieds", array('options'=>$verifieds,'empty'=>'Verified','div'=>false,'label' => false));?>                                                      
			</li>

			
		</ul>
	</div>
        <div class="searchbar">
		<ul>
		       <li >	
                            <?php echo $this->Form->input("service_id", array('options'=>$services,'empty'=>'Service','div'=>false,'label' => false));?>                                                      
			</li>
                        <li style=" width:11%">	
                            <?php echo $this->Form->input("availability_id", array('options'=>$availabilities,'empty'=>'Availability','div'=>false,'label' => false));?>                                                      
			</li>
                        <li style=" width:11%">	
                            <?php echo $this->Form->input("is_show_face", array('options'=>$showing_face,'empty'=>'Showing Face','div'=>false,'label' => false));?>                                                      
			</li>
                        <li style=" width:11%">	
                            <?php echo $this->Form->input("height", array('options'=>$heights,'empty'=>'Height','div'=>false,'label' => false));?>                                                      
			</li>
                        <li style="width:9%;">
                        <?php echo $this->Form->input("haircolor_id", array('options'=>$haircolors,"empty"=>"Hair Color",'div'=>false,'label' => false));?>                                                      
			</li>
                        
			<li style="width:9%;">				
                        <?php echo $this->Form->input("cup_size", array('options'=>$cups,'empty'=>'Size','div'=>false,'label' => false));?>                                                      
			</li>
                        <li style="width:9%;">				
                        <?php echo $this->Form->input("bust_size", array('options'=>$busts,'empty'=>'Bust','div'=>false,'label' => false));?>                                                      
			</li>          
			<li style="width:8%">
                            <button type="submit" class="btn btn-default">Search</button>
			</li>
                        <li style="width:8%">
                            <button type="button" class="btn btn-default" onclick="location.href='<?php echo $this->webroot;?>happy-hours'">Clear</button>
			</li>
		</ul>
	</div>
       <?php echo $this->Form->end();?>

                    <div class="col-left">
                        <section id="wrapper">
                            <section id="middle">
                                <section id="middle-inner">
                                    <section class="all-pins-do">
                                        <div class="detail-heading" style="padding: 0 5px;">
                                        <h2 class="title">
                                            Happy Hours        </h2>
                                        </div>    
                                        <div class="clr"></div>
                                        <section class="pin-wrapper">
                                            <div class="in-content" id="happyhour-list">

                                                <?php 
                                                      foreach ($userinfos as $showinfos){
                                                ?>
                                                <div class="happy-hour-escort">
                                                    <div class="heading-happ">
                                                        <h3><a href="javascript:void(0);"><?php echo $showinfos['User']['name']?>
                                                                </a></h3>
                                                    </div>
                                                    <div class="photos-happy">
                                                        <a class="main highslide" href="<?php echo $this->webroot?>escort-details/<?php echo base64_encode($showinfos['User']['id'])?>"> 
                                                            <?php
                                                            if(!empty($showinfos['User']['profile_image']))
                                                            {
                                                            ?>
                                                            <img src="<?php echo $this->webroot?>user_images/<?php echo $showinfos['User']['profile_image']?>" alt="thedirectory" height="250px" width="250px"/> 
                                                            <?php }else{?>
                                                            <img src="<?php echo $this->webroot?>noimage.png" alt="thedirectory" height="250px" width="250px"/> 
                                                            <?php }?>
                                                            <span class="new-p100s-en"></span> 
                                                        </a>
                                                        <a class="highslide" href="javascript:void(0);"> <img src="<?php echo $this->webroot?>user_images/<?php echo $showinfos['User']['profile_image']?>" alt="thedirectory" height="50px" width="50px"/> 
                                                        </a>
                                                       <!--  <a class="highslide" href="<?php echo  $this->Html->url('/') ?>images/o_1ag652h3e1dauvioms6pe7ko7a1460493538-112x78.jpg"/> 
                                                        </a> -->
                                                    </div>
                                                    <div class="happy-girl-about">
                                                        <section class="happy_phone"><i class="fa fa-phone-square"></i>
                                                            <?php echo $showinfos['Happyhour']['phone_number']; ?>            
                                                        </section>
                                                        <section class="happy_rate"><i class="fa fa-cubes"></i>
                                                            <?php echo $showinfos['Happyhour']['happy_hour_rate']; ?>  @ <?php echo $showinfos['Happyhour']['service_id']; ?> Only                
                                                        </section>
                                                        <section class="clr"></section>
                                                        <!-- <section class="cusprofile-info">
                                                            <ul>
                                                                <li> <span class="s-left1"><i class="fa fa-location-arrow"></i>
                                                                        Post ID                      :</span><span class="s-right">
                                                                        1                      </span>
                                                                    <section class="clr"></section>
                                                                </li>
                                                                <li> <span class="s-left1"><i class="fa fa-calendar"></i>
                                                                        Timing                      :</span><span class="s-right">
                                                                        Everyday                      5                      to                      7                      </span>
                                                                    <section class="clr"></section>
                                                                </li>
                                                                <li> <span class="s-left1"><i class="fa fa-building"></i>
                                                                        City                      :</span><span class="s-right">
                                                                        Brighton                      </span>
                                                                    <section class="clr"></section>
                                                                </li>
                                                                <li> <span class="s-left1"><i class="fa fa-list"></i>
                                                                        Category                      :</span><span class="s-right">
                                                                        Morenas,Black Escorts                      </span>
                                                                    <section class="clr"></section>
                                                                </li>
                                                                <section class="clr"></section>
                                                            </ul>
                                                            <section class="clr"></section>
                                                        </section> -->
                                                        <div class="introtext">
                                                            <p><?php echo $showinfos['Happyhour']['description']; ?></p>
                                                        </div>
                                                        <div style="text-align:right;"> <!-- <a href="javascript:void(0)" onclick="send_message('Patty', 'patty')" style="display:inline-block; " class="buttonGrey sm-b" >
                                                                Send Message                  </a> --> 
                                                                <a href="<?php echo $this->webroot?>escort-details/<?php echo base64_encode($showinfos['User']['id'])?>" style="display:inline-block;" class="buttonGrey  sm-b" >View Profile</a></div>
                                                        <section class="clr"></section>
                                                    </div>
                                                    <section class="clr"></section>
                                                </div>  
                                                <?php } ?>
                                            </div>
                                            <section class="pagi pgn01 grey">
                                                <center>
                                                    <div id="morewait"></div>
                                                </center>
                                                <!-- For Load More part -->
                                                <!-- Load More part ends here-->
                                            </section>
                                            <section class="clr"></section>
                                        </section>
                                        <div class="paging" id="pagination" style=" margin-left:15px; text-align:left;">
                                            <?php
                                            echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
                                            echo $this->Paginator->numbers(array('separator' => ''));
                                            echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
                                            ?>
                                        </div>
                                    </section>
                                </section>
                            </section>
                        </section>
                        
                    </div>

                      <div class="col-right">
                     <?php echo $this->element('user_banner');?>     
                     </div>
                </section>
                <div class="clr"></div>