<link rel="stylesheet" href="<?php echo $this->webroot; ?>css/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>
    $(function () {
        $("#datepicker").datepicker({dateFormat: "yy-mm-dd", maxDate: "-216m"});
        $("#imgInp").change(function(){
        $max_img_upload=parseInt(<?php echo $max_img_upload; ?>);
        $user_uploaded_image=parseInt(<?php echo $user_uploaded_image; ?>);
        if($user_uploaded_image>=$max_img_upload)
        {
           
            $("#imgupload").modal("show");
            $("#button_frm").attr("disabled",true)
        }
        else
        {
          readURL(this);

        }    
                    
});
    });
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

<script type="text/javascript">
    function getCityList(cid) {
        //alert(cid);
        $.ajax({
            type: "POST",
            url: "<?php echo $this->Html->url('/'); ?>users/getCityListOfState/",
            //dataType: "json",
            data: {cid: cid}
        }).done(function (msg) {
            //alert(msg);
            // ctlt
            $("#ctlt").html(msg);
        });
    }


    function checkUsername(username) {
        if (/^[a-zA-Z0-9]*$/.test(username) == false) {
            $("#ugreen").hide('');
            $("#ured").show('');
            $("#ured").text(' Invalid Username!');
            //$("#username").attr("placeholder", username).val("").focus().blur();
            //BootstrapDialog.alert('Username contains invalid characters. Only letters or numbers please');
            return false;
        }

        if (username) {
            //$('#wait-div-username').show();
            $.ajax({
                type: "POST",
                url: "<?php echo $this->Html->url('/'); ?>users/checkusername/",
                //dataType: "json",
                data: {username: username}
            }).done(function (msg) {
                $('#wait-div-email').hide();
                if (msg == 1) {
                    $("#ugreen").hide('');
                    $("#ured").show('');
                    $("#ured").text('Username already exists!');
                    //BootstrapDialog.alert('Email already exists!. Try with another.');
                    $("#username").attr("placeholder", username).val("").focus().blur();
                } else if (msg == 0) {
                    $("#ured").hide('');
                    $("#ugreen").show('');
                    $("#ugreen").text('Username available');
                }
            });
        }
    }

    function validateEmail(email) {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }
    function checkEmail(email) {
        if (!validateEmail(email)) {
            $("#ugreene").hide('');
            $("#urede").show('');
            $("#urede").text(' Invalid Email!');
            //BootstrapDialog.alert('Invalid Email');
            return false;
        }

        if (email) {
            $('#wait-div-email').show();
            $.ajax({
                type: "POST",
                url: "<?php echo $this->Html->url('/'); ?>users/checkemail/",
                //dataType: "json",
                data: {email: email}
            }).done(function (msg) {
                $('#wait-div-email').hide();
                if (msg == 1) {
                    $("#ugreene").hide('');
                    $("#urede").show('');
                    $("#urede").text('Email already exists!');
                    //BootstrapDialog.alert('Email already exists!. Try with another.');
                    $("#email").attr("placeholder", email).val("").focus().blur();
                } else if (msg == 0) {
                    $("#urede").hide('');
                    $("#ugreene").show('');
                    $("#ugreene").text('Email available');
                }
            });
        }
    }
</script>
    
	
	
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('agent_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<h2 class="font-weight-normal">My Photos</h2>
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


                                       <form action="" method="post" accept-charset="utf-8" class="" id="form1" 
                                                                          enctype="multipart/form-data">               
                                                                        <input type="hidden" name="uid" value="<?php echo $user['Agent']['id']?>" />
                                                                        <section class="upc-tom1">
                                                                            <section class="clr"></section>
                                                                        </section>

                                                                        <section class="fileUpload buttonGrey">
                                                                            <span>Choose Photos</span>
                                                                            <input type="file" name="img" id="imgInp"  class="btn btn-primary btnPart upload" />
                                                                        </section>

<!--                                                                        <section>
                                                                            <img id="blah" alt="" style=" border: 1px " width="100" height="100" />
                                                                        </section>-->


                                                                        <br />
                                                                        <section class="tbut2">
                                                                            <input type="submit" value="Upload Photos" name="button"  class="btn btn-primary btnPart " id="button_frm" >
                                                                        </section><br />
                                                                    </form>



					<div class="acntSetting p-1 mt-3 mb-3">
						<div class="row">
							<div class="col-lg-8">
								<p class="font-weight-normal manage-heading">Manage Photos</p>
							</div>
							<div class="col-lg-4">
								<div class="totalPhoto p-2 float-right">Total Photos <?php echo count($user['Photo']) ?></div>
							</div>
						</div>
					</div>
					<div class="photos">
						<div class="row">
                                                    
                                                    <?php foreach($user['Photo'] as $photo){ ?>
							<div class="col-lg-3 mb-3">
								<div class="innerPhoto">
                                                                    <section class="del" title="Delete Photo"> 
                                                                                            <a href="javascript:void(0);" onClick="deletephoto('<?php echo $photo['id']?>')">
                                                                                                <i class="fa fa-trash-o"></i></a> 
                                                                                        </section>
									<img src="<?php echo $this->Html->url('/') ?>user_images/<?php echo $photo['img'] ?>" class="img-fluid">
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
    function deletephoto(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo $this->Html->url('/'); ?>agencies/deletephoto/",
            //dataType: "json",
            data: {id: id}
        }).done(function (msg) {
            $("#image_" + id).hide();
            window.location.href = "<?php echo Router::url(array('controller' => 'agencies', 'action' => 'mypphoto')); ?>";
        });
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