               
<section id="contentsection" class="container">
                    <?php echo $this->Form->create("Filter",array('method'=>'post',"id"=>'SearchForm'));?>
                    <div class="row">
                    
       <?php echo $this->Form->end();?>

                    <div class="col-lg-9">
                    	<div class="col-left">
                        <section id="happyHours">
                            <section id="middle">
                                <section id="middle-inner">
                                    <section class="all-pins-do">
                                        <div class="detail-heading" style="padding: 0 5px;">
                                        <div class="directoryEscortHeading p-2 mb-4 mt-4">
								                        <h2 class="mb-0"> 
								         Happy Hours      </h2>
								                    </div>
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
                                                    <div class="row">
                                                    	<div class="col-lg-4">
                                                    	<div class="photos-happy">
                                                        
                                                        
														
														
														<div id="gallery">
														  <div id="panel">
														    <a class="main highslide" href="<?php echo $this->webroot?>escort-details/<?php echo base64_encode($showinfos['User']['id'])?>"> 
                                                            <?php
                                                            if(!empty($showinfos['User']['profile_image']))
                                                            {
                                                            ?>
                                                            <img src="<?php echo $this->webroot?>user_images/<?php echo $showinfos['User']['profile_image']?>" alt="thedirectory" height="250px" width="250px" id="largeImage"/> 
                                                            <?php }else{?>
                                                            <img src="<?php echo $this->webroot?>noimage.png" alt="thedirectory" height="250px" width="250px" id="largeImage"/> 
                                                            <?php }?>
                                                            <span class="new-p100s-en"></span> 
                                                        </a>
														  </div>
														  <div id="thumbs">
														        <a class="highslide" href="javascript:void(0);"> <img src="<?php echo $this->webroot?>user_images/<?php echo $showinfos['User']['profile_image']?>" alt="thedirectory" height="50px" width="50px"/> 
                                                        </a>
														  </div>
														</div>
                                                    </div>
														</div>
														<div class="col-lg-8">
                                                    	<div class="happy-girl-about">
                                                    	<div class="clear-both">
                                                        <section class="happy_phone float-left"><i class="fa fa-phone-square"></i>
                                                            <?php echo $showinfos['Happyhour']['phone_number']; ?>            
                                                        </section>
                                                        <section class="happy_rate float-right"><i class="fa fa-cubes"></i>
                                                            <?php echo $showinfos['Happyhour']['happy_hour_rate']; ?>  @ <?php echo $showinfos['Happyhour']['service_id']; ?> Only                
                                                        </section>
                                                        </div>
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
                                                        <div class="introtext pt-4">
                                                            <p><?php echo $showinfos['Happyhour']['description']; ?></p>
                                                        </div>
                                                        <div style="text-align:right;"> <!-- <a href="javascript:void(0)" onclick="send_message('Patty', 'patty')" style="display:inline-block; " class="buttonGrey sm-b" >
                                                                Send Message                  </a> --> 
                                                                <a href="<?php echo $this->webroot?>escort-details/<?php echo base64_encode($showinfos['User']['id'])?>" style="display:inline-block;" class="buttonGrey  sm-b" >View Profile</a></div>
                                                        <section class="clr"></section>
                                                    </div>
														</div>
													</div>
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
                                        <div class="paging pagePart mt-4 pt-4" id="pagination" style=" margin-left:15px; text-align:left;">
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
					</div>
					<div class="col-lg-3">
						<h2 class="text-center color-white text-uppercase font-22">Search</h2>
                	<form action="" method="post" id="SearchForm" accept-charset="utf-8">
                	<div style="display:none;"><input name="_method" value="POST" type="hidden"></div>                    <div class="form-group">
                        <label for="exampleInputEmail1">Country</label>
                        <div class="input select"><select name="data[Filter][country_id]" class="form-control selectField" id="sel1">
<option value="158">New Zealand</option>
</select></div>	
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">City/Region</label>
                        <div class="input select"><select name="data[Filter][city_id]" class="form-control selectField" id="sel1">
<option value="">Select Location</option>
<option value="1">Auckland CBD</option>
<option value="2">Auckland - North Shore</option>
<option value="3">Auckland – Rodney</option>
<option value="4">Auckland - South and Eastern Suburbs</option>
<option value="5">Auckland - West</option>
<option value="6">Hamilton</option>
<option value="7">Tauranga</option>
</select></div>	
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Availability</label>
                        <div class="input select"><select name="data[Filter][availability_id]" class="form-control selectField" id="sel1">
<option value="">Availability</option>
<option value="any">Any</option>
<option value="2">Day Incall</option>
<option value="3">Day Outcall</option>
<option value="4">Night Incall</option>
<option value="5">Night Outcall</option>
<option value="6">After 11.pm</option>
</select></div>	
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Location</label>
                        <div class="input select"><select name="data[Filter][nationality_id]" class="form-control selectField" id="sel1">
<option value="">Ethnicity</option>
<option value="any">Any</option>
<option value="1">Indian</option>
<option value="2">Kiwi</option>
<option value="3">Native American</option>
</select></div> 	
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sort By Age</label>
                        <div class="input select"><select name="data[Filter][age]" class="form-control selectField" id="sel1">
<option value="">Select Age</option>
<option value="any">Any</option>
<option value="18-25">18-25</option>
<option value="26-30">26-30</option>
<option value="31-35">31-35</option>
<option value="36-40">36-40</option>
<option value="41-49">41-49</option>
<option value="50">50+</option>
</select></div>	
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sort By Gender</label>
                        <div class="input select"><select name="data[Filter][gender]" class="form-control selectField" id="sel1">
<option value="">Gender</option>
<option value="F">Female</option>
</select></div> 	
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Verified</label>
                        <div class="input select"><select name="data[Filter][verifieds]" class="form-control selectField" id="sel1">
<option value="">Verified</option>
<option value="any">Any</option>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select></div> 	
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sort By Service</label>
                        <div class="input select"><select name="data[Filter][service_id]" class="form-control selectField" id="sel1">
<option value="">Service</option>
<option value="any">Any</option>
<option value="1">Adult Toys</option>
<option value="2">Anal (Greek)</option>
<option value="3">B&amp;D</option>
<option value="4">Bachelor Party</option>
<option value="5">Bi Double</option>
<option value="6">Blow Job</option>
<option value="7">Body Slide</option>
<option value="8">Breast Play</option>
<option value="9">CBT</option>
<option value="10">COB</option>
<option value="11">Costumes</option>
<option value="12">Couples</option>
<option value="13">Cuddling</option>
<option value="14">Deep Throat</option>
<option value="15">Dinner Date</option>
<option value="16">Dirty Talk</option>
<option value="17">Disability Service</option>
<option value="18">Double Penetration</option>
<option value="19">Erotic Strip</option>
<option value="20">Fantasies</option>
<option value="21">Fetishes</option>
<option value="22">FFM</option>
<option value="23">Foot Fetish</option>
<option value="24">Foursome</option>
<option value="25">French Kissing</option>
<option value="26">GFE</option>
<option value="27">Group - 2 or more</option>
<option value="28">Hand Relief</option>
<option value="29">Kissing</option>
<option value="30">Lactating</option>
<option value="31">Lesbian</option>
<option value="32">MMF</option>
<option value="33">Multi Shots</option>
<option value="34">Mutual Masturbation</option>
<option value="35">Mutual Oral</option>
<option value="36">Oral</option>
<option value="37">Overnight Booking</option>
<option value="38">Overseas Companion</option>
<option value="39">Pearl Necklace</option>
<option value="41">Prostate Massage</option>
<option value="40">PSE - Porn Star Experience</option>
<option value="42">Rimming</option>
<option value="43">Sensual Massage</option>
<option value="44">Shower Together</option>
<option value="45">Squirting </option>
<option value="46">Straight Double</option>
<option value="47">Strap on</option>
<option value="48">Swingers</option>
<option value="50">Threesome - 2 Girls 1 Guy</option>
<option value="51">Touching</option>
<option value="52">Toys on me</option>
<option value="53">Toys on you</option>
<option value="54">Two Girls</option>
<option value="56">Voyeurism</option>
<option value="55">Watch Porn</option>
</select></div>	
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Showing Face</label>
                        <div class="input select"><select name="data[Filter][is_show_face]" class="form-control selectField" id="sel1">
<option value="">Showing Face</option>
<option value="any">Any</option>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select></div>	
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sort By Height</label>
                        <div class="input select"><select name="data[Filter][height]" class="form-control selectField" id="sel1">
<option value="">Height</option>
<option value="any">Any</option>
<option value="140-149">140cm-149cm</option>
<option value="150-159">150cm-159cm</option>
<option value="160-169">160cm-169cm</option>
<option value="170-179">170cm-179cm</option>
<option value="180-189">180cm-189cm</option>
<option value="190">190cm+</option>
</select></div>	
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hair color</label>
                        <div class="input select"><select name="data[Filter][haircolor_id]" class="form-control selectField" id="sel1">
<option value="">Hair Color</option>
<option value="any">Any</option>
<option value="1">Blue</option>
<option value="2">Brown</option>
<option value="3">Black</option>
<option value="4">Yellow</option>
<option value="5">White</option>
</select></div>	
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Cup size</label>
                       <div class="input select"><select name="data[Filter][cup_size]" class="form-control selectField" id="sel1">
<option value="">Size</option>
<option value="any">Any</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20+</option>
</select></div> 	
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bust size</label>
                        <div class="input select"><select name="data[Filter][bust_size]" class="form-control selectField" id="sel1">
<option value="">Bust</option>
<option value="any">Any</option>
<option value="A">A</option>
<option value="B">B</option>
<option value="C">C</option>
<option value="D">D</option>
<option value="DD">DD</option>
<option value="E">E</option>
<option value="EE">EE</option>
<option value="F">F</option>
<option value="G">G+</option>
</select></div>	
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-block mt-3">Search</button>
                    
                    </form>
					</div>
					</div>
                </section>
                <div class="clr"></div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
	$('#thumbs a img').click(function(){
    $('#largeImage').attr('src',$(this).attr('src').replace('thumb','large'));
    $('#description').html($(this).attr('alt'));
});
</script>