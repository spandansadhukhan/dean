	
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('agent_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<h2 class="font-weight-normal">Post Banners</h2>
					</div>
					<div class="uploadPhotos mt-3 mb-3">
						<i class="fa fa-info-circle" aria-hidden="true"></i> Upload jpg, jpeg, png, gif photos only.
					</div>
<!--					<div class="draganddropPhoto mb-3">
						<img src="images/draganddropPhoto.jpg" class="img-fluid">
					</div>
					<div class="uploadPhotoBut">
						<button type="button" class="btn btn-primary btnPart">Upload Photos</button>
					</div>-->


                                       <?php echo $this->Form->create('Advertisement',array('enctype'=>'multipart/form-data','accept-charset'=>'utf-8','method'=>'post')); ?>             
                                                                        
                                                                        <section class="upc-tom1">
                                                                            <section class="clr"></section>
                                                                        </section>

                                                                        <section class="fileUpload buttonGrey">
                                                                            <span>Choose Photos</span>
                                                                            <input type="file" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" class="upload" />
                                                                        </section>


                                                                    <section id="im" >
                                                                        <img id="blah" alt="" style=" border: 1px " width="100" height="100"/>
                                                                    </section>
                                                                        
                                                                       <section class="tbut2 modediv"  style=" margin-top:9px;"> 
                                                                        <label for="label" style="width: auto;"> Resolutions: <span>*</span></label>
                                                                        <label class="option">
                                                                        <?php echo $this->Form->input("resolution", array('options'=>$resolutions,'empty'=>'Select','div'=>false,'label' => false));?>                                                      
									</label>
                                                                    </section> 
                                                                        

                                                                    <section class="tbut2 modediv"  style=" margin-top:9px;"> 
                                                                        <label for="label" style="width: auto;"> Durations: <span>*</span></label>
                                                                        <label class="option">
                                                                        <?php echo $this->Form->input("duration", array('options'=>$durations,'empty'=>'Select','div'=>false,'label' => false));?>                                                      
									</label>
                                                                    </section>


                                                                        <br />
                                                                        <section class="tbut2">
                                                                            <input type="submit" value="Upload Photos" name="button"  class="btn btn-primary btnPart " id="button_frm" >
                                                                        </section><br />
                                                                    <?php echo $this->Form->end();?>



					<div class="acntSetting p-1 mt-3 mb-3">
						<div class="row">
							<div class="col-lg-8">
								<p class="font-weight-normal manage-heading">Manage Banners</p>
							</div>
							<div class="col-lg-4">
								<div class="totalPhoto p-2 float-right">Total Photos <?php echo count($banner) ?></div>
							</div>
						</div>
					</div>
					<div class="photos">
						<div class="row">
                                                    
                                                    <?php foreach($banner as $photo){ ?>
							<div class="col-lg-3 mb-3">
								<div class="innerPhoto">
<!--                                                                    <section class="del" title="Delete Photo"> 
                                                                                            <a href="javascript:void(0);" onClick="deletephoto('<?php echo $photo['Advertisement']['id']?>')">
                                                                                                <i class="fa fa-trash-o"></i></a> 
                                                                                        </section>-->
									<img src="<?php echo $this->Html->url('/') ?>advertisement/<?php echo $photo['Advertisement']['image'] ?>" class="img-fluid">
								</div>
							</div>
                                                    <?php } ?>
<!--							<div class="col-lg-3 mb-3">
								<div class="innerPhoto">
									<img src="images/escort3.jpg" class="img-fluid">
								</div>
							</div>
							<div class="col-lg-3 mb-3">
								<div class="innerPhoto">
									<img src="images/escort4.jpg" class="img-fluid">
								</div>
							</div>
							
							<div class="col-lg-3 mb-3">
								<div class="innerPhoto">
									<img src="images/escort5.jpg" class="img-fluid">
								</div>
							</div>
							<div class="col-lg-3 mb-3">
								<div class="innerPhoto">
									<img src="images/escort6.png" class="img-fluid">
								</div>
							</div>
							<div class="col-lg-3 mb-3">
								<div class="innerPhoto">
									<img src="images/escort1.jpg" class="img-fluid">
								</div>
							</div>
							<div class="col-lg-3 mb-3">
								<div class="innerPhoto">
									<img src="images/escort2.jpg" class="img-fluid">
								</div>
							</div>-->
						</div>
					</div>	
					</div>
				</div>
			</div>
		</div>
	</section>
<script>
    function showdiv(param)
                                                                    
    {
        $(".modediv").hide();
        $(".modetext").removeAttr("required");
        
        if(param=='daily')
        {
            $("#daily_div").show();
            $("#daily_text").attr("required",true);
        }
        else
        {
            $("#weekly_div").show();
            $("#weekly_text").attr("required",true);
        }
    }
    function deletephoto(id) {

        if (confirm('Are you sure?')) {
            $.ajax({
                type: "POST",
                url: "<?php echo $this->Html->url('/'); ?>escorts/deletephoto/",
                //dataType: "json",
                data: {id: id}
            }).done(function (msg) {          
                $("#image_"+id).hide();
                window.location.href = "<?php echo Router::url(array('controller' => 'escorts', 'action' => 'mypphoto')); ?>";
            });
        }
    }
    
    
    
</script>


<style>
    .fileUpload {
        position: relative;
        overflow: hidden;
        margin: 10px 0;
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