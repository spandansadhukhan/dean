
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('stripper_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<h2 class="font-weight-normal">My classified Ads</h2>
					</div>
					<ul class="nav nav-tabs mt-4 tabParts">
					  <li class="active"><a data-toggle="tab" href="#home">My classified Ads</a></li>
					  <li><a data-toggle="tab" href="#menu1">Post classified Ad</a></li>
					</ul>
					<div class="tab-content">
					  <div id="home" class="tab-pane in active">
					      <table class="table table-hover">
						    <thead>
						      <tr>
						        <th>Sr. No.</th>
						        <th>Ad Image</th>
						        <th>Ad Title</th>
						        <th>Ad description</th>
						        <th>Option</th>
						      </tr>
						    </thead>
						    <tbody>
                                                        <?php 
                                                               $cnt = 1;
                                                               if(!empty($classifieds))
                                                               {
                                                               foreach($classifieds as $classified) {
                                                                    
                                                        ?>
						      <tr>
						        <td><?php echo $cnt; ?></td>
                                                        <?php
                                                                            if(!empty($classified['Classified']['image']))
                                                                            {
                                                                            ?>
						        <td><div class="escortImage"><img src="<?php echo $this->webroot;?>job_images/<?php echo $classified['Classified']['image']; ?>" style=" height:100px; width:100px;"></div></td>
                                                                            <?php }else{ ?>
                                                        <td><div class="escortImage"><img src="<?php echo $this->webroot;?>noimage.png" style=" height:100px; width:100px;"></div></td>
                                                        
                                                        
                                                                            <?php } ?>
						        <td><?php echo $classified['Classified']['name']; ?></td>
						        <td><?php echo substr($classified['Classified']['description'],0,50); ?></td>
						        
						        <td>
<!--							       <button type="button" class="btn btn-primary btnPart"><i class="fa  fa-eye"></i></button>								   <button type="button" class="btn btn-primary btnPart"><i class="fa fa-times" aria-hidden="true"></i></button>-->
							       <button type="button" class="btn btn-primary btnPart"><i class="fa fa-trash-o" aria-hidden="true"></i><?php echo $this->Form->postLink(__('Delete'), array('controller'=>'classifieds','action' => 'deleteclassified', $classified['Classified']['id']), null, __('Are you sure you want to delete', $classified['Classified']['id'])); ?>
</button>
						        </td>
						      </tr>
                                                               <?php $cnt++; } }else{ ?>
                                                      
                                                      
                                                                <tr>
                                                                    <td colspan="5">No Classified Ads Found</td>
                                                                </tr>
                                                      
                                                               <?php } ?>
						    </tbody>
						  </table>
					  </div>
					  <div id="menu1" class="tab-pane fade">
					    <form name="set_happy_hours"   action="<?php echo $this->webroot; ?>classifieds/add" method="post" accept-charset="utf-8" class="" id="form1" enctype="multipart/form-data">
                                            		<!-- <table width="60%" class="servicetype"> -->
                                                    <div id="menu1" class="tab-pane in active">
					    
					    
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
                                                        <input class="form-control text-field" id="staticEmail" placeholder="Ad Title" type="text" name="data[Classified][name]" required="">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Ad Description*:</label>
						    <div class="col-lg-8">
						      <textarea class="form-control" id="exampleTextarea" rows="3" name="data[Classified][description]"></textarea>
						    </div>
						  </div>
						  
						  
					
                                                    <button type="submit" class="btn btn-primary">Submit</button>
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