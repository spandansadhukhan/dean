
    
	
	
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('agent_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<h2 class="font-weight-normal">My classified Ads</h2>
					</div>
					<ul class="nav nav-tabs mt-4 tabParts">
					  <li ><a data-toggle="tab" href="#home">My classified Ads</a></li>
					  <li class="active"><a data-toggle="tab" href="#menu1">Post classified Ad</a></li>
					</ul>
					<div class="tab-content">
					  <div id="home" class="tab-pane in active">
					      <table class="table table-hover">
						    <thead>
						      <tr>
                                                        <th>ID</th>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                        <th>Image</th>
                                                        <th>Action</th>
                                                      </tr>
						    </thead>
						    <tbody>
						      <?php 
                                                               $cnt = 1;
                                                               //pr($allahppyhoursdata); exit;
                                                               if(!empty($classifieds))
                                                               {
                                                               foreach($classifieds as $classified) {
                                                                    
                                                        ?>
                                            			<tr>
                                            				<td><?php echo $cnt; ?></td>
                                            				<td><?php echo $classified['Classified']['name']; ?></td>
                                            				<td><?php echo substr($classified['Classified']['description'],0,50); ?></td>
                                                                        <td>
                                                                            <?php
                                                                            if(!empty($classified['Classified']['image']))
                                                                            {
                                                                            ?>
                                                                            <img src="<?php echo $this->webroot;?>job_images/<?php echo $classified['Classified']['image']; ?>" style=" height:100px; width:100px;">
                                                                            <?php }else{?>
                                                                            <img src="<?php echo $this->webroot;?>noimage.png" style=" height:100px; width:100px;">
                                                                            <?php }?>
                                                                            
                                                                        </td>

                                            				
                                                             <td><?php echo $this->Form->postLink(__('Delete'), array('controller'=>'classifieds','action' => 'deleteclassified', $classified['Classified']['id']), null, __('Are you sure you want to delete # %s?', $classified['Classified']['id'])); ?></td> 
                                            			</tr>
                                                        <?php 
                                                            $cnt++;
                                                    } ?>
                                                               <?php }else{?>         
                                                                <tr>
                                                                    <td colspan="5">No Classified Ads Found</td>
                                                                </tr>
                                                               <?php }?>
						      
						    </tbody>
						  </table>
					  </div>
                                            
                                            
                                            
                                            
					  <div id="menu1" class="tab-pane ">
                                              
                                              <form name="set_happy_hours"   action="<?php echo $this->webroot; ?>classifieds/add" method="post" accept-charset="utf-8" class="" id="form1" 
                                                                      enctype="multipart/form-data">
                                              
					    
						<h3 class="mt-3">Upload Pictures</h3>
						<div class="mt-3">
							
                                                    <section class="fileUpload buttonGrey">
                                                                            <span>Choose Photos</span>
                                                                            <input type="file" name="data[Classified][image]"  class="upload" id="imgInp" onchange="readURL(this)" />
                                                                            </section>
                                                                            <section>
                                                                                <img id="blah" alt="" style=" border: 1px " width="100" height="100" />
                                                                            </section>    
                                                        
						</div>
						<h3 class="mt-3">Ad Information</h3>
						<div class="emailAddress mt-4">
						
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Ad Title*:</label>
						    <div class="col-lg-8">
						      
                                                      <input type="text" name="data[Classified][name]" class="form-control text-field textbox" required placeholder="Ad Title">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Ad Description*:</label>
						    <div class="col-lg-8">
						      
                                                      <textarea class="form-control" rows="5" cols="150" name="data[Classified][description]"></textarea>
						    </div>
						  </div>
						  
						  
					
					<button type="submit" class="btn btn-primary">Submit</button>
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