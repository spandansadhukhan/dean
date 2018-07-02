
<section id="contentsection">
    <div id="wait-div" class="wait-div">
        
    </div>
    <div class="col-left">
        <section id="wrapper">
            <section id="middle">
                <section id="middle-inner">
                    <section class="all-pins-do">
                        <section id="searchResult" class="maintitle">
                            <div class="clr"></div>
                            <section id="middle">
                                <section id="middle-inner">
                                    <section class="all-pins-do">
                                        <div class="my-account-inner"><div class="sb-toggle-right navbar-right">
                                                <div class="navicon-line"></div>
                                                <div class="navicon-line"></div>
                                                <div class="navicon-line"></div>
                                            </div>
                                            <div class="left-my-account-menu-m">
                                                <div class="triangleBottomRight firstItem"></div>
                                                
                                                <a style="display:none;" href="javascript:;" class="website_activate"></a>
                                                <?php echo $this->element('escort_sidebar'); ?>
                                                <div class="triangleBottomleft firstItem"></div>
                                            </div>
                                            <div class="right-my-account">
                                            	<div class="right-my-account-blocks">
<div class="detail-heading">
    <section class="title-left title-part">
            <h1 style="display:inline-block;"> Set Tour Plans</h1>
            
          </section>
             
          <div class="clr"></div>
          </div>
          
          <div class="smart-forms">
				   <div class="notification alert-success spacer-t10" id="success" style="display:none"></div>                        
          </div>
           
          <div class="right-my-account-blocks-inner">
          <div class="detail-heading" style="background: none;">
    <section class="title-left title-part">
            <h1 style="display:inline-block;">Add Tour</h1>
            
          </section>
                   
          
          <div class="clr"></div>
          </div>
            <div class="smart-forms form-part">
                <form method="post" action="<?php echo $this->webroot?>escorts/escort_tour_plans">
                   <input type="hidden" name="escort_id" value="<?php echo $this->Session->read('fuid'); ?>" >
				<div class="country-part">
					<div class="part1">
						<label class="countrytext">Country*:</label>
						<div class="text-field-part">
                            <select class="selectbox" name="country_id">
							<option>Select Country</option>
					         <option value="158">New Zealand</option>
					      </select>
                      </div>
						<div class="clr"></div>
					</div>
					<div class="part1">
						<label class="countrytext">State*:</label>
						<div class="text-field-part">
                            <select class="selectbox" name="state_id">
    							<option>Select State</option>
    							<?php foreach ($allstates as $showstates) { ?>
                                    <option value="<?php echo $showstates['State']['id']?>"><?php echo $showstates['State']['name']?></option>
                               <?php }?>
						</select></div>
						<div class="clr"></div>
					</div>

                    <div class="part1">
                        <label class="countrytext">City*:</label>
                        <div class="text-field-part">
                            <select class="selectbox" name="city_id">
                            <option>Select City</option>
                            <?php foreach ($allcities as $showcities) { ?>
                                <option value="<?php echo $showcities['City']['id']?>"><?php echo $showcities['City']['name']?></option>
                            <?php }?>
                            </select>
                    </div>
                        <div class="clr"></div>
                    </div>
					<div class="clr"></div>
				</div>
				
				<div class="country-part">
					<div class="part1">
						<label class="countrytext">Phone No*:</label>
						<div class="text-field-part"><input type="text" class="textpartt1" name="phone" required></div>
						<div class="clr"></div>
					</div>
					<div class="part1">
						<label class="countrytext">Phone Instructions*:</label>
						<div class="text-field-part"><input type="text" class="textpartt1" name="phone_instruction" required></div>
						<div class="clr"></div>
					</div>
					<div class="clr"></div>
				</div>
				
				<div class="country-part">
					<div class="part1">
						<label class="countrytext">Tour Date*:</label>
						<div class="text-field-part">
							<input type="text" class="textpart12 event_date" placeholder="From" id="from" name="from">
							<input type="text" class="textpart12 event_date" placeholder="To" id="to" name="to">
						</div>
						<div class="clr"></div>
					</div>
					<div class="part1">
						<label class="countrytext"></label>
						<div class="text-field-part">
							<!-- <button type="button" class="text-button">Add Tour</button> -->
                            <input type="submit" name="submit" value="Add Tour" class="text-button">
						</div>
						<div class="clr"></div>
					</div>
					<div class="clr"></div>
				</div>
			</form>
            </div>
			     <div class="detail-heading" style="background: none;">
    <section class="title-left title-part">
            <h1 style="display:inline-block;">My Tour List</h1>
            
          </section>
                   
         
          <div class="clr"></div>
          </div>             
                                    

            <div class="table-responsive for-msg">
                            <div id="countp" style="display:none">0</div>
                            <table class="table table-vcenter table-striped">
                            <thead>
                                <tr>
                                    <th>ID#</th>    
                                    <th>Location</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
								     <?php 
                                                $cnt = 1;
                                                foreach($alloptionstours as $happyhourdata) { ?>
                               <tr>
                                <td><?php echo $cnt;?></td>
                                <td><?php echo $happyhourdata['State']['name']; ?></td>
                                <td><?php echo $happyhourdata['Escorttour']['tour_from']; ?></td>
                                <td><?php echo $happyhourdata['Escorttour']['tour_from']; ?></td>
                                <td><?php echo $this->Form->postLink(__('Delete'), array('action' => 'deleteescorttour', $happyhourdata['Escorttour']['id']),array("class"=>"btn btn-danger"), __('Are you sure you want to Delete?')); ?></td>
                                </tr>         
                                     <?php   
                                        $cnt++;        
                                                }
                                                ?>

                                   </tbody>
                               </table>
                        </div>
          
          

                <div class="clr"></div>
                </div>
</div>
                                            </div>
                                            <div class="clr"></div>
                                        </div>
                                    </section>
                                </section>
                            </section>
                        </section>
                        <div class="clr"></div>
                    </section>
                </section>
            </section>
        </section>
    </div>
    <div class="col-right">
        <section id="banners">
            <a class="banner200x333 promo" href="#"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x333 promo" href="#"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x200 promo" href="#"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
        </section>
    </div>
</section>
<div class="clr"></div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
  

  $( function() {
    $(".event_date").datepicker({
        dateFormat: 'yy-mm-dd'
    });
  } );
  </script>