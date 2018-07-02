
	
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				
                            <?php echo $this->element('stripper_sidebar'); ?>
                            
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<h2 class="font-weight-normal">Manage Videos</h2>
					</div>
					<div class="mt-4">
                                            
                                            <div class="attention my-2 p-2">
								<p class="mb-0"><i class="fa fa-exclamation-triangle"></i> <b>Attention</b></p>
								<p class="mb-0">(Please upload mp4, flv video files only, you can upload video upto 350 mb)</p>
							</div>
                                            
                                            
					  <div>
                                              <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="foema" enctype="multipart/form-data">						<input type="hidden" name="uid" value="<?php echo $user['Stripper']['id']?>" /> 
					  	  <div class="form-group row">
							  <label class="col-lg-2 col-form-label text-right">Video Title<span>*</span>:</label>
							  <div class="col-lg-10">
							    <input type="text" id="title" class="inputtext" name="video" placeholder="e.g. http://www.youtube.com/watch?v=abcd" style=" width: 72% !important;" required>
							  </div>
							</div>
                                                  
                                                  <section class="tbut">
                                                                                            <input type="submit" class="buttonGrey" name="button" id="button" value="Upload">
                                                                                        </section>
							
                                              </form>	
							
							
					  </div>
					  <div class="selectVideoFiles">
							<ul class="nav nav-tabs mt-4 tabParts">
<!--					  			<li><a data-toggle="tab" href="#home" >1.<i class="fa  fa-file-video-o mr-2"></i>Select Video File</a></li>-->
<!--					  			<li><a data-toggle="tab" href="#menu1" class="active"><i class="fa fa-cloud-upload mr-2"></i>Uploaded Video</a></li>-->
<!--					  			<li><a data-toggle="tab" href="#menu2" class="">3.<i class="fa fa-save mr-2"></i>Save Video</a></li>-->
							</ul>
							<div class="tab-content">
<!--					  <div id="home" class="tab-pane">
					  	dddd
					  </div>-->
					  <div id="menu1" class="tab-pane in active">
					    <div class="acntSetting p-1 d-flex justify-content-between align-items-center">
							<h2 class="font-weight-normal font-20 mb-0">Manage Videos</h2>
							<div class="totalPhotos">Total Videos: <?php echo count($user['UserVideo']) ?></div>
						</div>
                                              
						<!--<div class="nofileupload p-4 ">-->
                                                    <div class="photos">
							<ul class="image-container">
                                                                        
                                                                    <?php foreach($user['UserVideo'] as $vid){ ?>
                                                                    <li><iframe src="https://www.youtube.com/embed/<?php echo $vid['link']?>" class="img-fluid" frameborder="0" allowfullscreen></iframe>
								<a href="javascript:void(0);" onClick="deleteVideo('<?php echo $vid['id']?>')"><span class="trash"><i class="fa fa-trash-o"></i></span></a>
							</li>
                                                                    <?php } ?>                                                                       
                                                                    </ul>
                                                </div>
						<!--</div>-->
					  </div>
<!--					  <div id="menu2" class="tab-pane">
					  	dddd
					  </div>-->
					</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<script>
    function deleteVideo(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo $this->Html->url('/'); ?>Strippers/deletevideo/",
            //dataType: "json",
            data: {id: id}
        }).done(function (msg) {          
            $("#image_"+id).hide();
            window.location.href = "<?php echo Router::url(array('controller' => 'Strippers', 'action' => 'myvideo')); ?>";
        });
    }
</script>
	