
    
	
	
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('escort_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<h2 class="font-weight-normal">Manage customer blacklist</h2>
					</div>
					<div class="email mt-3 p-2">
						<p>Add Customer to Blacklist</p>
					</div>
                                    
                                    
                                    <form action="<?php echo $this->webroot ?>escorts/add_to_blacklist" method="post" accept-charset="utf-8" class="ajaxform" id="add-model" enctype="multipart/form-data"> 
                                                <input type="hidden" name="from_id" value="<?php echo $this->Session->read('fuid'); ?>">
                                    
                                    
					<div class="row">
						<div class="col-lg-6">
							<div class="emailAddress mt-4">
                                                            
                                               <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 text-right col-form-label">Customer List*:</label>
						    <div class="col-lg-8">
						      <select class="form-control" name="to_id">
						      <option value="">Select Recipient</option>
                                                                <?php   
                                                                foreach ($userotherlists as $showusers) {
                                                                ?>
                                                                <option value="<?php echo $showusers['User']['id']?>"><?php echo $showusers['User']['name']?></option>
                                                                <?php           
                                                                }
                                                                ?>
						    </select>
						    </div>
						  </div>             
                                                            
                                                 <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 text-right col-form-label">Phone*:</label>
						    <div class="col-lg-8">
                                                      <input type="text" placeholder="Phone" value="" class="form-control text-field gui-input" id="from" name="phone" required>
						    </div>
						  </div>
                                                            
						<div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 text-right col-form-label">Country*:</label>
						    <div class="col-lg-8">
						      
                                                                <?php echo $this->Form->input('country_id',array('empty'=>'Choose Country','label'=>false,'div'=>false,'options'=> $getallcountry, 'class'=>'form-control','id'=>'cntry_id','required'=>'required')); ?>
						    
						    </div>
						  </div>
                                                            
                                                            
                                                            
                                                            
                                                            
						  
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 text-right col-form-label">Customer Identity*:</label>
						    <div class="col-lg-8">
						      <input type="text" name="cust_identity" class="form-control text-field" id="staticEmail" placeholder="Customer Identity">
						    </div>
						  </div>
						  
						  <div class="form-group row">
						    <label  class="col-lg-4 text-right col-form-label"></label>
						    <div class="col-lg-8">
                                                        <button type="submit" class="btn btn-primary btnPart">Add To Blacklist</button>
						    </div>
						  </div>
					</div>
						</div>
						<div class="col-lg-6">
							<div class="emailAddress mt-4">
						
						  
						  <div class="form-group row">
						    <label class="col-lg-4 text-right col-form-label">Location*:</label>
						    <div class="col-lg-8">
						       <?php echo $this->Form->input('location_id',array('empty'=>'Choose Location','label'=>false,'div'=>false,'options'=>$getallloc, 'class'=>'form-control','required'=>'required','id'=>'location_id')); ?>
						    </div>
						  </div>
                                                            
                                                <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 text-right col-form-label">Email*:</label>
						    <div class="col-lg-8">
                                                        <input type="email" placeholder="Email" value="" class="form-control text-field gui-input" id="from" name="email" required>
						    </div>
						  </div>            
						  
						  
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 text-right col-form-label">Your Comments*:</label>
						    <div class="col-lg-8">
						      <textarea class="form-control" name="comment" rows="5" id="comment"></textarea>
						    </div>
						  </div>
					</div>
						</div>
					</div>
                                    </form>      
                                                
					<h2 class="mt-3">Manage Blacklist</h2>
<!--					<div class="form-group row">
						<div class="col-lg-4">
							<input type="text" class="form-control text-field" placeholder="Name">
						</div>
						<div class="col-lg-4">
							<input type="text" class="form-control text-field" placeholder="Phone">
						</div>
						<div class="col-lg-2"><button type="button" class="btn btn-primary btnPart">Search</button></div>
					</div>-->
					<table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Customer Name</th>
        <th>Phone</th>
        <th>Location</th>
        <th>Customer Identity</th>
        <th>Details</th>
        <th>Options</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;

        if(!empty($getalldata)){
        foreach ($getalldata as $showuser) {
            ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $showuser['User']['name']; ?></td>
                <td><?php echo $showuser['User']['phone_no']; ?></td>
                <td><?php echo $showuser['Location']['name'] . ',' . $showuser['Country']['name']; ?></td>

                <td><?php echo $showuser['Blacklist']['cust_identity']; ?></td>

                <td><?php echo $showuser['Blacklist']['comment']; ?></td>

    <!-- <td><?php echo $this->Form->postLink(__('Remove from Blacklist'), array('action' => 'deleteblacklist', $getalldata[0]['Blacklist']['id']), array("class" => "btn btn-danger"), __('Are you sure you want to Remove from blacklist?')); ?></td> -->
                <td>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'deleteblacklist', $getalldata[0]['Blacklist']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete?')); ?></td>

            </tr>
            <?php
            $count++;
        }
        ?>
        <?php }else{ ?>
            
            <tr><td colspan="7">No Blacklisted User In you List</td></tr>
            
            <?php  } ?>
            
    </tbody>
                         
  </table>

				</div>
			</div>
		</div>
	</section>

