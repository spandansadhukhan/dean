
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('escort_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<h2 class="font-weight-normal">Set Tour Plans</h2>
					</div>
					<ul class="nav nav-tabs mt-4 tabParts">
					  <li class="active"><a data-toggle="tab" href="#home">My Tour List</a></li>
					  <li><a data-toggle="tab" href="#menu1">Post Tour</a></li>
					</ul>
					<div class="tab-content">
					  <div id="home" class="tab-pane in active">
					      <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID#</th>    
                                    <th>Location</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <!-- <th>Action</th> -->
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
                               <!--  <td><?php echo $this->Form->postLink(__('Delete'), array('action' => 'deleteescorttour', $happyhourdata['Escorttour']['id']), null, __('Are you sure you want to delete # %s?', $happyhourdata['Escorttour']['id'])); ?>
                                </td> -->
                                </tr>         
                                     <?php   
                                        $cnt++;        
                                                }
                                                ?>

                                   </tbody>
                               </table>
					  </div>
					  <div id="menu1" class="tab-pane fade">
					    <form method="post" action="<?php echo $this->webroot?>escorts/escort_tour_plans">
                   <input type="hidden" name="escort_id" value="<?php echo $this->Session->read('fuid'); ?>" >
                                                    <div id="menu1" class="tab-pane in active">
					    <h3>Location Information</h3>
					    <div class="emailAddress mt-4">
                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-lg-4 col-form-label">Country*:</label>
                                                    <div class="col-lg-8">
                                                       <select name="country_id" class="form-control">
                                                            <option value="">Select Country</option>                                                              <option value="158">New Zealand</option>
                                                       </select>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-lg-4 col-form-label">State*:</label>
                                                    <div class="col-lg-8">
                                                        <select name="state_id" class="form-control">
                                                            <option value="">Select State</option>                                                              <?php foreach ($allstates as $showstates) { ?>
                                    <option value="<?php echo $showstates['State']['id']?>"><?php echo $showstates['State']['name']?></option>
                               <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-lg-4 col-form-label">City*:</label>
                                                    <div class="col-lg-8">
                                                        <select name="city_id" class="form-control">
                                                            <option value="">Select City</option>                                                              <?php foreach ($allcities as $showcities) { ?>
                                <option value="<?php echo $showcities['City']['id']?>"><?php echo $showcities['City']['name']?></option>
                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                
					</div>
						
						<h3 class="mt-3">Other Information</h3>
						<div class="emailAddress mt-4">
						
						  
						  
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Phone No*:</label>
						    <div class="col-lg-8">
                                                        <input class="form-control text-field" id="staticEmail" placeholder="phone" type="text" name="phone" required="">
						    </div>
						  </div>
                                                    
                                                    <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Phone Instructions*:</label>
						    <div class="col-lg-8">
                                                        <input class="form-control text-field" id="staticEmail" placeholder="Phone Instructions" type="text" name="phone_instruction" required="">
						    </div>
						  </div>
                                                    
                                                    
						    <div class="form-group row">
						<label class="col-lg-4 col-form-label">Tour Date*:</label>
						<div class="col-lg-8 row">
                                                    <div class="col-lg-4">
							<input type="text" class="form-control text-field" placeholder="From" id="from" name="from">
                                                    </div>
                                                    <div class="col-lg-4">
							<input type="text" class="form-control text-field" placeholder="To" id="to" name="to">
                                                    </div>
						</div>
						<div class="clr"></div>
					</div>
						  
						  
					
                                                    <button type="submit" class="btn btn-primary">Add Tour</button>
					</div>
					  </div>
                                                    </form>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</section>




<style>
    .fileUpload {
        position: relative;
        overflow: hidden;
        margin: 10px 0px;
    }
    .fileUpload input.upload {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }
</style>

<script>
 function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}   
</script>	