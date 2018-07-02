<link rel="stylesheet" href="<?php echo $this->webroot; ?>css/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <!-- Modal -->
  
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
</script>

<script type="text/javascript">
    function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
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



<section id="contentsection">
<div id="wait-div" class="wait-div">
    <div class="wait-divin"> <span style="background: url('images/loading.gif') no-repeat;"> 
            <span style="margin-left:48px;">Please wait ....</span> </span> </div>
</div>
<div class="col-left">
    <section id="wrapper">
        <section id="middle">
            <section id="middle-inner">
                <section class="all-pins-do">
                    <section id="searchResult" class="maintitle">
                        <h1>Add Photo</h1>
                        <div class="clr"></div>
                        <section id="middle">
                            <section id="middle-inner">
                                <section class="all-pins-do">
                                    <div class="my-account-inner"><div class="sb-toggle-right navbar-right">
                                            <div class="navicon-line"></div>
                                            <div class="navicon-line"></div>
                                            <div class="navicon-line"></div>
                                        </div>
                                        <div class="left-my-account-menu-m">
                                            <div class="triangleBottomRight firstItem"></div>
                                            <style>
                                                .unreadCount {
                                                    background: linear-gradient(to bottom, #fdf6ca 0%, #fdf6ca 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
                                                    border-radius: 50%;
                                                    color: #620c29;
                                                    display: inline-block;
                                                    font-family: arial;
                                                    font-size: 12px;
                                                    font-weight: bold;
                                                    height: 20px;
                                                    line-height: 20px;
                                                    text-align: center;
                                                    width: 20px;
                                                    vertical-align:sub;
                                                }
                                            </style>
                                            <a style="display:none;" href="javascript:;" class="website_activate"></a>
                                            <?php echo $this->element('escort_sidebar'); ?>
                                            <div class="triangleBottomleft firstItem"></div>
                                        </div>
                                        <div class="right-my-account">
                                            <div class="right-my-account-blocks">
                                                <div class="detail-heading">
                                                    <section class="title-left">
                                                        <h1 style="display:inline-block;">My Photos</h1>
                                                    </section>
                                                    <div class="clr"></div>
                                                </div>
                                                <section class="alert ref-alert">
                                                    <i class="fa fa-info"></i> &nbsp;
                                                    Upload jpg, jpeg, png, gif photos only.
                                                    <br>
                                                </section>
                                                <section class="content-inner-box">
                                                    <section class="dashborad">
                                                        <section class="title-part">
                                                            <div class="detail-heading">
                                                                <section class="title-left">
                                                                    <h1 style="display:inline-block;">Upload Photos</h1>
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
                                                                    <section class="upc-tom1">
                                                                        <section class="clr"></section>
                                                                    </section>
                                                                    
                                                                    <section class="fileUpload buttonGrey">
                                                                        <span>Choose Photos</span>
                                                                        <input type="file" name="img"  class="upload" id="imgInp" />
                                                                    </section>
                                                                    
                                                                    <section>
                                                                        <img id="blah" alt="" style=" border: 1px " width="100" height="100" />
                                                                    </section>
                                                                    
                                                                    
                                                                    <br />
                                                                    <section class="tbut2">
                                                                        <input type="submit" value="Upload Photos" name="button" 
                                                                               class="buttonGrey" id="button_frm" >
                                                                    </section><br />
                                                                    <input type="checkbox" name="agree" value="0" required>I have read and understand these Terms and Conditions
                                                                </form>                
                                                            </section>
                                                            <div class="clear"></div>
                                                            
                                                            
                                                            <?php 
                                                           //pr($user['Photo']); exit;
                                                            if(!empty($user['Photo'])){ ?>
                                                            <div class="detail-heading">
                                                                <section class="title-left">
                                                                    <h1 style="display:inline-block;">Manage Photos</h1>
                                                                </section>
                                                                <div class="all-count" id="totalVideo">
                                                                    Total Photos   <span id="countp"> <?php echo count($user['Photo']) ?> </span>
                                                                </div>
                                                                <div class="clr"></div>
                                                            </div>
                                                            <section class="upc-mg-photos">
                                                                <section class="photo-list">
                                                                    <ul class="image-container">
                                                                        <?php foreach($user['Photo'] as $photo){ 
                                                                            if($photo['is_active'] == 1){
                                                                            ?>
                                                                        <li id="image_<?php echo $photo['id']?>">
                                                                            
                                                                        <section class="thumb7"><section class="thumb-inner">
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
                                                                    } ?> 

                                                                        
                                                                        
                                                                        
                                                                    </ul>
                                                                    <section class="no-record" style="display:none;" id="nophoto">No Photo Uploaded Yet.</section>
                                                                </section>
                                                                <div class="clr"></div>
                                                                <section class="pagination">
                                                                </section>
                                                            </section>
                                                            <section class="clr"></section>
                                                            <?php } ?>
                                                            
                                                            
                                                        </section>
                                                        <section class="clr"></section>
                                                    </section>
                                                </section>
                                                <section class="clr"></section>
                                            </div>
                                            <div class="clr"></div>
                                        </div>
                                        <div class="clr"></div>
                                    </div>
                                </section>
                            </section>
                        </section>
                    </section>
                    <div class="clr"></div>
                </section>
            </section>
        </section>
    </section>
</div>
<div class="col-right">
    <?php 
    echo $this->element("user_banner");
    ?>
</div>
</section>
<div class="clr"></div>


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
</script>


<style>
    .fileUpload {
        position: relative;
        overflow: hidden;
        margin: 10px;
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
