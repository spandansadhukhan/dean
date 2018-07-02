
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('escort_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<h2 class="font-weight-normal">My Blog</h2>
					</div>
					<ul class="nav nav-tabs mt-4 tabParts">
					  <li class="active"><a data-toggle="tab" href="#home">My Blog List</a></li>
					  <li><a data-toggle="tab" href="#menu1">Post Blog</a></li>
					</ul>
					<div class="tab-content">
					  <div id="home" class="tab-pane in active">
					      <table class="table table-hover">
                                          <tr>
                                             <th>ID#</th>
                                             <th>Title:</th>
                                             <th>Post Date:</th>
                                              <th>Option</th> 
                                          </tr>
                                          <?php 
                                             $cnt = 1;
                                             //pr($allahppyhoursdata); exit;
                                             foreach($blogs as $blog) {
                                                  
                                             ?>
                                          <tr>
                                             <td><?php echo $cnt; ?></td>
                                             <td><?php echo $blog['Blog']['name']; ?></td>
                                             <td><?php echo date("d/m/Y",strtotime($blog['Blog']['post_date'])); ?></td>
                                             <td>
                                                 <a href="<?php echo $this->webroot; ?>blogs/edit/<?php echo $blog['Blog']['id']; ?>">Edit</a>
                                                 <a href="<?php echo $this->webroot; ?>blogs/delete/<?php echo $blog['Blog']['id']; ?>" onclick="return confirm('Are you want to remove this?')">Delete</a>
                                             </td>
                                          </tr>
                                          <?php 
                                             $cnt++;
                                             } ?>
                                       </table>
                                       <div class="paging" id="pagination" style=" margin-left:15px; text-align:left;">
                                        <?php
                                        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
                                        echo $this->Paginator->numbers(array('separator' => ''));
                                        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
                                        ?>
                                        </div>
					  </div>
					  <div id="menu1" class="tab-pane fade">
					    <form name="" method="POST" action="" enctype="multipart/form-data">
                                            		<!-- <table width="60%" class="servicetype"> -->
                                                    <div id="menu1" class="tab-pane in active">
					    					    
						<h3 class="mt-3">Upload Pictures</h3>
						<div class="mt-3">
							<section class="fileUpload buttonGrey">
                                                                            <span>Choose Photos</span>
                                                                            <input type="file" name="data[Blog][image]"  class="upload" id="imgInp" onchange="readURL(this)" />
                                                                            </section>
                                                                            <section>
                                                                                <img id="blah" alt="" style=" border: 1px " width="100" height="100" />
                                                                            </section>
						</div>
						<h3 class="mt-3">Ad Information</h3>
						<div class="emailAddress mt-4">
						
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Blog Title*:</label>
						    <div class="col-lg-8">
                                                        <input class="form-control text-field" id="staticEmail" placeholder="Ad Title" type="text" name="data[Blog][name]" required="">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Ad Description*:</label>
						    <div class="col-lg-8">
						      <textarea class="form-control" id="exampleTextarea" rows="3" name="data[Blog][contaent]"></textarea>
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