
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('escort_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<h2 class="font-weight-normal">My Blog</h2>
					</div>
					<ul class="nav nav-tabs mt-4 tabParts">
					  <li class="active"><a data-toggle="tab" href="#home">Edit Blog</a></li>
					  
					</ul>
					<div class="tab-content">
					  
					  <div id="home" class="tab-pane in active">
					    <form name="" method="POST" action="" enctype="multipart/form-data">
                                            <input type="hidden" name="data[Blog][hide_img]" value="<?php echo $this->request->data["Blog"]["image"] ?>">  
                                            <input type="hidden" name="data[Blog][id]" value="<?php echo $this->request->data["Blog"]["id"] ?>"> 
                                                    <div id="menu1" class="tab-pane in active">
					    					    
						<h3 class="mt-3">Upload Pictures</h3>
						<div class="mt-3">
							<section class="fileUpload buttonGrey">
                                                                            <span>Choose Photos</span>
                                                                            <input type="file" name="data[Blog][image]"  class="upload" id="imgInp" onchange="readURL(this)" />
                                                                            </section>
                                                                            <section>
                                                                                <img id="blah" alt="" style=" border: 1px " width="100" height="100" src="<?php echo $this->webroot;  ?>blog_images/<?php echo $this->request->data["Blog"]["image"];?>"/>
                                                                            </section>
						</div>
						<h3 class="mt-3">Ad Information</h3>
						<div class="emailAddress mt-4">
						
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Blog Title*:</label>
						    <div class="col-lg-8">
                                                        <input class="form-control text-field" id="staticEmail" placeholder="Ad Title" type="text" name="data[Blog][name]" required="" value="<?php echo $this->request->data["Blog"]["name"];?>">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Ad Description*:</label>
						    <div class="col-lg-8">
						      <textarea class="form-control" id="exampleTextarea" rows="3" name="data[Blog][contaent]"><?php echo $this->request->data["Blog"]["contaent"];?></textarea>
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