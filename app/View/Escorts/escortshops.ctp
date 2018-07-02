
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('escort_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<h2 class="font-weight-normal">My Private gallery</h2>
					</div>
					
					<div class="right-my-account">
                                            <div class="right-my-account-blocks">
                                                
                                               <!--  <section class="alert ref-alert">
                                                    <i class="fa fa-info"></i> &nbsp;
                                                    Upload jpg, jpeg, png, gif photos only.
                                                    <br>
                                                </section> -->
                                                <section class="content-inner-box">
                                                    <section class="dashborad">
                                                        <section class="title-part">
                                                            <div class="acntSetting p-1 my-2">
                                                                <section class="title-left">
                                                                    <h2 class="font-weight-normal">Upload Photos</h2>
                                                                </section>
                                                                <div class="clr"></div>
                                                            </div>
                                                            
                                                            <div class="attention my-2 p-2">
						<p class="mb-0"><i class="fa fa-exclamation-triangle"></i> <b>Attention</b></p>
						<p class="mb-0">(Please upload jpg, jpeg,png, gif files only. You can upload photo upto 2 mb)</p>

					</div>
                                                            
                                                            <section class="clr"></section>
                                                        </section>
                                                        <section class="content-box nre-span">
                                                            <section class="upc clear">
                                                                <form action="" method="post" accept-charset="utf-8" class="" id="form1" 
                                                                      enctype="multipart/form-data">               
                                                                    <input type="hidden" name="uid" value="<?php echo $user['Escort']['id']?>" />
                                                                    <input type="hidden" name="is_private" value="1" />
                                                                    <section class="upc-tom1">
                                                                        <section class="clr"></section>
                                                                    </section>
                                                                    
                                                                    <section class="fileUpload buttonGrey">
                                                                        <span>Choose Photos</span>
                                                                        <input type="file" name="img" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" class="upload" />
                                                                    </section>
                                                                    
                                                                    <section>
                                                                        <img id="blah" alt="" style=" border: 1px " width="100" height="100" />
                                                                    </section>
                                                                    
                                                                    
                                                                    <br />
                                                                    <section class="tbut2">
                                                                        <input type="submit" value="Upload Photos" name="button" class="buttonGrey" id="button_frm" >
                                                                    </section><br />
                                                                    <div class="option-group field">
                                                                    <p id="termsandcond" class="d-inline-block mr-4 mb-0 mt-2"><input type="checkbox" name="agree" id="box-9" value="0" id="terms"><label for="box-9">I have read and understand these Terms and Conditions</label></p>
                                                                    <br/>
                                                                    <p id="termsandcond" class="d-inline-block mr-4 mb-0 mt-2"><input type="checkbox" name="" id="box-19" value="0" onclick="already_understand();"><label for="box-19">Don’t Show me this as I have read and understand these Terms and Conditions</label></p>
                                                                    </div>
                                                                </form>                
                                                            </section>
                                                            <div class="clear"></div>
                                                            
                                                            
                                                            <?php //if(!empty($user['Photo'])){ 
                                                                if(!empty($userPhoto)){
                                                            ?>
                                                            <div class="acntSetting p-1 my-2">
                                                                <section class="title-left">
                                                                    <h2 class="font-weight-normal">Manage Photos<span class="totalPhotos">Total Photos: <?php echo count($user['Photo']) ?></span></h2>
                                                                </section>
                                                                
                                                                <div class="clr"></div>
                                                            </div>
                                                            <section class="upc-mg-photos">
                                                                <section class="photo-list">
                                                                    <ul class="image-container">
                                                                        <?php foreach($user['Photo'] as $photo){ 
                                                                            if($photo['is_active'] == 1 && $photo['is_private'] == 1){
                                                                                $test_var = explode('.', $photo['img']);
                                                                                if($test_var[1] != 'mp4'){
                                                                            ?>
                                                                        <li id="image_<?php echo $photo['id']?>">
                                                                            
                                                                        <section class="thumb7">
                                                                            <section class="thumb-inner">
                                                                        <section class="del" title="Delete Photo"> 
                                                                <a href="javascript:void(0);" onClick="deletephoto('<?php echo $photo['id']?>')">
                                                                                <i class="fa fa-trash-o"></i></a> 
                                                                        </section>
                                            <img src="<?php echo $this->Html->url('/') ?>user_images/<?php echo $photo['img'] ?>" alt="Escort Pic">
                                                                        </section> 
                                                                    </section>                                                                            

                                                                        </li>
                                                                        <?php 
                                                                            }

                                                                        }
                                                                    } 
                                                                    ?> 

                                                                    </ul>
                                                                  
                                                                </section>
                                                                <div class="clr"></div>
                                                                <section class="pagination">
                                                                </section>
                                                            </section>
                                                          
                                                            <?php }else{ ?>
                                                                  <!-- <section class="no-record" style="display:none;" id="nophoto"> -->
                                                                <p style="color:#EA4335; text-align:center;">No Photo Uploaded Yet.</p>
                                                                <!-- </section> -->
                                                           <?php } ?>
                                                            
                                                              <section class="clr"></section>
                                                        </section>
                                                        <section class="clr"></section>
                                                    </section>
                                                </section>
                                                <section class="clr"></section>

                                                <!-- Video Section starts here -->    

                                                 <section class="content-inner-box">
                                                    <section class="dashborad">
                                                        <section class="title-part">
                                                            <div class="acntSetting p-1 my-2">
                                                                <section class="title-left">
                                                                     <h2 class="font-weight-normal">Upload Videos</h2>
                                                                </section>
                                                                <div class="clr"></div>
                                                            </div>
                                                            <section class="clr"></section>
                                                        </section>
                                                        <section class="content-box nre-span">
                                                            <section class="upc clear">
                                                                <form action="" method="post" accept-charset="utf-8" class="" id="form1" 
                                                                      enctype="multipart/form-data">               
                                                                    <input type="hidden" name="uid" value="<?php echo $user['Escort']['id']?>" />
                                                                    <input type="hidden" name="is_private" value="1" />
                                                                    <section class="upc-tom1">
                                                                        <section class="clr"></section>
                                                                    </section>
                                                                    
                                                                    <section class="fileUpload buttonGrey">
                                                                        <span>Choose Videos</span>
                                                                        <input type="file" name="vid" class="upload" />
                                                                    </section>
                                                                    
                                                                   <!--  <section>
                                                                        <img id="blah" alt="" style=" border: 1px " width="100" height="100" />
                                                                    </section> -->
                                                                    
                                                                    
                                                                    <br />
                                                                    <section class="tbut2">
                                                                        <input type="submit" value="Upload Videos" name="button" class="buttonGrey" id="button_frm" >
                                                                    </section><br />
                                                                    <div class="option-group field">
                                                                    <p id="termsandcond" class="d-inline-block mr-4 mb-0 mt-2"><input type="checkbox" name="agree" id="box-10" value="0" id="terms"><label for="box-10">I have read and understand these Terms and Conditions</label></p>
                                                                    <br/>
                                                                    <p id="termsandcond" class="d-inline-block mr-4 mb-0 mt-2"><input type="checkbox" name="" id="box-11" value="0" onclick="already_understand();"><label for="box-11">Don’t Show me this as I have read and understand these Terms and Conditions</label></p>
                                                                    </div>                                                       
                                                                   
                                                                </form>                
                                                            </section>
                                                            <div class="clear"></div>
                                                            
                                                            
                                                            <?php //if(!empty($user['Photo'])){ 

                                                               // pr($userPhoto); exit;
                                                                if(!empty($userPhoto)){
                                                            ?>
                                                            <div class="detail-heading">
                                                                <section class="title-left">
                                                                    <h1 style="display:inline-block;">Manage Videos</h1>
                                                                </section>
                                                                <div class="all-count" id="totalVideo">
                                                                    Total Videos   <span id="countp"> <?php 
                                                                  //echo $user['Photo']['img'];
                                                                    echo count($user['Photo']) ?> </span>
                                                                </div>
                                                                <div class="clr"></div>
                                                            </div>
                                                            <section class="upc-mg-photos">
                                                                <section class="photo-list">
                                                                    <ul class="image-container">
                                                                        <?php foreach($user['Photo'] as $photo){ 
                                                                            if($photo['is_active'] == 1 && $photo['is_private'] == 1){
                                                                                $test_var = explode('.', $photo['img']);
                                                                                if($test_var[1] == 'mp4'){
                                                                            ?>
                                                                        <li id="image_<?php echo $photo['id']?>">
                                                                            
                                                                        <section class="thumb7">
                                                                            <section class="thumb-inner">
                                                                        <section class="del" title="Delete Photo"> 
                                                                <a href="javascript:void(0);" onClick="deletephoto('<?php echo $photo['id']?>')">
                                                                                <i class="fa fa-trash-o"></i></a> 
                                                                        </section>
                                                                        <!-- <img src="<?php echo $this->Html->url('/') ?>user_images/<?php echo $photo['img'] ?>" alt="Escort Pic"> -->
                                                                    <!-- <div class="embed-responsive embed-responsive-16by9">
                                                                    <iframe class="embed-responsive-item" src="<?php echo $this->webroot ?>user_images/<?php echo $user['Photo']['img']?>"></iframe>
                                                                    </div> -->
                                                                        <video width="248" controls>
                                                                            <source src="<?php echo $this->webroot ?>user_images/<?php echo $photo['img']?>" type="video/mp4">
                                                                        </video>


                                                                    </section> 
                                                                    </section>                                                                            

                                                                        </li>
                                                                        <?php 
                                                                                }
                                                                            }
                                                                        } 
                                                                    ?> 

                                                                    </ul>
                                                                  
                                                                </section>
                                                                <div class="clr"></div>
                                                                <section class="pagination">
                                                                </section>
                                                            </section>
                                                          
                                                            <?php }else{ ?>
                                                                  <!-- <section class="no-record" style="display:none;" id="nophoto"> -->
                                                                <p style="color:#EA4335; text-align:center;">No Video Uploaded Yet.</p>
                                                                <!-- </section> -->
                                                           <?php } ?>
                                                            
                                                              <section class="clr"></section>
                                                        </section>
                                                        <section class="clr"></section>
                                                    </section>
                                                </section>
                                                <section class="clr"></section>
                                            </div>
                                            <div class="clr"></div>
                                        </div>
					<div class="clearfix"></div>
					
					
				</div>
			</div>
		</div>
	</section>
	
   
    <script>
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

    function already_understand(){
        $("#terms").attr('checked');
        $("#termsandcond").hide();
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
  