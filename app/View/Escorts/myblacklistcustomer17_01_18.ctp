<?php
// pr($getalldata);   exit;
?>

<section id="contentsection">

<div class="col-left">

<section id="wrapper">
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

				<a style="display:none;" href="#;" class="website_activate"></a>
				<?php echo $this->element('escort_sidebar'); ?>
				<div class="triangleBottomleft firstItem"></div>
				</div>
<div class="right-my-account">
<div class="right-my-account-blocks">
<div class="detail-heading">
    <section class="title-left">
            <h1 style="display:inline-block;">Manage Blacklist Clients</h1>
            
          </section>
                   
          
   
          
          <div class="clr"></div>
          </div>
           
       
          <div class="right-my-account-blocks-inner">
          
            <section class="f-section f-whiteSmoke f-border-top  f-bottom-100" id="section-autoplay">
   <div class="f-content container autoplay">
       
                <div id="nav-tabzoo" >

               
  

<div class="h-content2 z-container" style="min-height: 442px;">
    <!-- Tab1 -->
    <div class="z-content">
    <div class="z-content-inner">
    
    
    <div class="tom1  for-msg">
					
					<div class="select-filters-sort">
                          <div class="selectaa">
                            <h4>Add Blacklist Clients</h4>
                            
                          </div>
                          
                          <section class="clr"></section>
                        </div>
					
					  <div class="right-my-account-blocks-inner">
					  
                                                        <div class="profie-bl1" style="width: 100%;">
                                                            <div class="profie-bl4-inner">

                                                                        <div class="form-profile">
                                                                            <div class="smart-wrap">
                                                                                <div class="smart-forms smart-container">

                                            <form action="<?php echo $this->webroot ?>escorts/add_to_blacklist" method="post" accept-charset="utf-8" class="ajaxform" id="add-model" enctype="multipart/form-data"> 
                                                <input type="hidden" name="from_id" value="<?php echo $this->Session->read('fuid'); ?>">
                                                
                                            <div class="first_half">    	

                                                <div class="form-profile-block">
                                                    <label class="pl">Customer List</label>
                                                        <div class="inputContainer">
                                                            <div class="section">
                                                            <label class="field select">
                                                            <select name="to_id" class="inputtext" id="eye_color_id" style="width:100%" required>
                                                                <option value="">Select Recipient</option>
                                                                <?php   
                                                                foreach ($userotherlists as $showusers) {
                                                                ?>
                                                                <option value="<?php echo $showusers['User']['id']?>"><?php echo $showusers['User']['name']?></option>
                                                                <?php           
                                                                }
                                                                ?>
                                                            </select>
                                                            <i class="arrow double"></i>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-profile-block">
                                                    <label class="pl">Phone:</label>
                                                    <div class="inputContainer">
                                                        <div class="section">
                                                            <label class="field">
                                                            <input type="text" placeholder="Phone" value="" class="gui-input" id="from" name="phone" required>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-profile-block">
                                                    <label class="pl">Country</label>
                                                        <div class="inputContainer">
                                                            <div class="section">
                                                            <!-- <label class="field select">
                                                            <select name="cntry_id" id="cntry_id" class="inputtext" style="width:100%" required>
                                                                <option value="">Select Country</option>
                                                                <?php   
                                                                foreach ($getallcountry as $showcntry) {
                                                                ?>
                                                                <option value="<?php echo $showcntry['Country']['id']?>"><?php echo $showcntry['Country']['name']?></option>
                                                                <?php           
                                                                }
                                                                ?>
                                                            </select> -->

                                                            <label class="field">
                                                            <?php echo $this->Form->input('country_id',array('empty'=>'Choose Country','label'=>false,'div'=>false,'options'=> $getallcountry, 'class'=>'gui-input','id'=>'cntry_id','required'=>'required','style'=>'width:288px;')); ?>
                                                        </label>
                                                            <i class="arrow double"></i>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-profile-block">
                                                    <label class="pl">Location</label>
                                                        <div class="inputContainer">
                                                            <div class="section">
                                                            <label class="field select">
                                                            <?php echo $this->Form->input('location_id',array('empty'=>'Choose Location','label'=>false,'div'=>false,'options'=>$getallloc, 'class'=>'gui-input','required'=>'required','id'=>'location_id')); ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            <div class="form-profile-block">
                                                <label class="pl">Customer Identity:</label>
                                                <div class="inputContainer">
                                                <div class="section">
                                                <label class="field prepend-icon" style="width: 80%;">
                                                <textarea name="cust_identity" id="introduction" class="gui-textarea" maxlength="1000"></textarea>

                                                </label>
                                                </div>
                                                </div>
                                            </div>

                                            </div>


                                            <div class="second_half">


                                            <div class="form-profile-block">
                                            <label class="pl">Email:</label>
                                            <div class="inputContainer">
                                            <div class="section">
                                            <label class="field">
                                            <input type="email" placeholder="Email" value="" class="gui-input" id="from" name="email" style="width:100%" required="">
                                            </label>
                                            </div>
                                            </div>
                                            </div>



                                            <div class="form-profile-block">
                                            <label class="pl">Your Comment:</label><div class="inputContainer">
                                            <div class="section">
                                            <label class="field prepend-icon" style="width: 80%;">
                                            <textarea placeholder="Tell something about Client" name="comment" id="introduction" class="gui-textarea" maxlength="1000"></textarea>
                                            <label class="field-icon" for="introduction"><i class="fa fa-comments"></i></label>
                                            <span class="input-hint">
                                            <strong>Hint:</strong> Don't be negative or off topic! just be awesome...
                                            </span>
                                            </label>
                                            </div>
                                            </div>
                                            </div>



                                            </div>

                                            <div class="form-profile-block">
                                            <label class="pl">&nbsp;</label>
                                            <div class="inputContainer">
                                            <input type="submit" class="buttonGrey" name="button" id="button" value="Black List" style=" width: auto !important;">
                                            </div>
                                            </div>

                                            </form>          
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                        </div>
                                                     
                                                        <div class="clr"></div>

                                                       
                                                        <div class="clr"></div>
                                                    </div>  


                                 
					</div>	
    
    
    <div class="clr"></div>
    
    
    
    
    
		
		 <input type="hidden" name="from_id" value="<?php echo $this->Session->read('fuid');?>">      
		 	<span id="input_hidden_fields"></span>
         <div class="select-filters-sort">
                          <div class="selectaa">
                            <h4>My Blacklist Clients</h4>
                            <!-- <ul>
                              <li><a class="select-all disabled" onclick="checkUncheckAllBlacklist('check')" href="#">All</a></li>
                              <li><a class="select-none disabled" onclick="checkUncheckAllBlacklist('uncheck')" href="#">None</a></li>
                            </ul> -->
                          </div>
                          <!-- <section class="cate"> <a onclick="doTask('delete')" href="#">Delete</a> <a onclick="doTask('read')" href="#">Mark Read</a> <a onclick="doTask('unread')" href="#">Mark Unread</a>
                            <section class="clr"></section>
                          </section> -->
                          <section class="clr"></section>
                        </div>
                 <div class="table-responsive for-msg">
							<table class="table table-vcenter">
								
							<?php if(!empty($user2)){ ?>
							<thead>
												<tr>
												<td>Sl No#</td>
												<td>Name</td>
												<td>Phone</td>
                                                <td>Location</td>
                                                <td>Customer Identity</td>
                                                <td>Details</td>
												<td>Action</td>
												</tr>
												</thead>
								<tbody>
											<?php
											$count = 1;	

                                            //pr($user2); exit;
											foreach ($getalldata as $showuser) {
											?>
												<tr>
												<td><?php echo $count; ?></td>
												<td><?php echo $showuser['User']['name']; ?></td>
												<td><?php echo $showuser['User']['phone_no']; ?></td>
                                                <td><?php echo $showuser['Location']['name'] . ',' .$showuser['Country']['name']; ?></td>

                                                <td><?php echo $showuser['Blacklist']['cust_identity']; ?></td>

                                                <td><?php echo $showuser['Blacklist']['comment']; ?></td>

<!-- <td><?php echo $this->Form->postLink(__('Remove from Blacklist'), array('action' => 'deleteblacklist', $getalldata[0]['Blacklist']['id']),array("class"=>"btn btn-danger"), __('Are you sure you want to Remove from blacklist?')); ?></td> -->
<td>
<?php echo $this->Form->postLink(__('Delete'), array('action' => 'deleteblacklist', $getalldata[0]['Blacklist']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete?')); ?></td>
                                            
												</tr>
												<?php 
												$count++;
												} 
												?>
											</tbody>

							<?php }else{ ?>

							 <div class="no-record" id="nomsg_show" >No Blacklisted User In you List</div>
                            <?php					
                            }
                            ?>

							
							</table>
                        </div>
				</div>
				
            </div>
	
					<div class="z-content">
					<div class="z-content-inner">
					
					</div>
					</div>
    <!-- Tab3 End-->
</div></div>
        

           </div>
</section>
          
          
                       
           
        
                <div class="clr"></div>
                </div>
</div>


 <div class="clr"></div>
</div>
 <div class="clr"></div>
</div>
 </section>
 <!--<div id="promo-bottom">
 
 </div>-->
</section>
</section>
</section>
</div>

    <div class="col-right">
       <?php echo $this->element("user_banner");?>
    </div>
</section>
<div class="clr"></div>

<style>
	.tom1 label {color: #666!important;}
	.for-msg label {width: 100%;}
	label.field.prepend-icon {width: 85%;}
	.smart-forms .select>select {padding:9px 39px;}
	.first_half {width:49%;float:left;}
	.second_half{width:51%;float:right;}
</style>

<script>
    // function get_location(id){
    //       $.ajax({
    //                         url: "<?php echo $this->webroot?>escorts/get_location",
    //                         type: "post",
    //                         data: {id:id},
    //                         success: function(newData){
    //                             $("#location_id").html(newData);
    //                             //location.href = 'my_account.php';   
    //                         }
    //                     });

    // }



    // $("#cntry_id").on('change', function () {
    //     var stId = $("#cntry_id").val();
    //     $.ajax({
    //         type: "POST",
    //         url: "<?php echo $this->webroot?>escorts/get_location/",
    //         //dataType: "json",
    //         data: {stId: stId}
    //     }).done(function (msg) {
    //         //getStList
    //         $('#location_id').html(msg);
    //     });

    // });
</script>

