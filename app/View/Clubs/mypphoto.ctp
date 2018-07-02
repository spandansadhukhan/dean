
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('club_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<h2 class="font-weight-normal">Upload Photos</h2>
					</div>
					<div class="attention my-2 p-2">
						<p class="mb-0"><i class="fa fa-exclamation-triangle"></i> <b>Attention</b></p>
						<p class="mb-0">(Please upload jpg, jpeg,png, gif files only. You can upload photo upto 2 mb)</p>

					</div>
					<div class="uploadButton mb-2">
						<section class="upc clear">
                                                                <form action="" method="post" accept-charset="utf-8" class="" id="form1" 
                                                                      enctype="multipart/form-data">               
                                                                    <input type="hidden" name="uid" value="<?php echo $user['Club']['id']?>" />
                                                                    <section class="upc-tom1">
                                                                        <section class="clr"></section>
                                                                    </section>
                                                                    
                                                                    <section class="fileUpload buttonGrey">
                                                                        <span>Choose Photos</span>
                                                                        <input type="file" name="img"  class="upload" id="imgInp" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"/>
                                                                    </section>
                                                                    
                                                                    <section>
                                                                        <img id="blah" alt="" style=" border: 1px " width="100" height="100" />
                                                                    </section>
                                                                    
                                                                    
                                                                    <br />
                                                                    <section class="tbut2">
                                                                        <input type="submit" value="Upload Photos" name="button" 
                                                                               class="buttonGrey" id="button_frm" >
                                                                    </section><br />
                                                                    <!--<input type="checkbox" name="agree" value="0" >I have read and understand these Terms and Conditions-->
                                                                </form>                
                                                            </section>
					</div>
					<div class="clearfix"></div>
					<div class="acntSetting p-1 my-2">
						<h2 class="font-weight-normal">Manage Photos<span class="totalPhotos">Total Photos: <?php echo count($user['Photo']) ?></span></h2>
					</div>
					<div class="photos">
						<ul>
                                                    
                                                    
                                                    <?php foreach($user['Photo'] as $photo){ 
                                                                            //if($photo['is_active'] == 1){
                                                                            ?>
                                                    
                                                    
							<li><img src="<?php echo $this->Html->url('/') ?>user_images/<?php echo $photo['img'] ?>" class="img-fluid">
								<a href="javascript:void(0);" onClick="deletephoto('<?php echo $photo['id']?>')"><span class="trash"><i class="fa fa-trash-o"></i></span></a>
							</li>
                                                        
                                                        <?php 
                                                                        //}
                                                                    } ?> 
							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	
   
    <script>
    function deletephoto(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo $this->Html->url('/'); ?>clubs/deletephoto/",
            //dataType: "json",
            data: {id: id}
        }).done(function (msg) {          
            $("#image_"+id).hide();
            window.location.href = "<?php echo Router::url(array('controller' => 'clubs', 'action' => 'mypphoto')); ?>";
        });
    }
</script>


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
    .upc-mg-photos li
    {
        height:auto !important; 
    }
</style>
  