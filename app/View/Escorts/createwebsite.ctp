

<?php
   ?>
<link rel="stylesheet" href="<?php echo $this->webroot; ?>css/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>
   $(function () {
       $("#datepicker").datepicker({dateFormat: "yy-mm-dd", maxDate: "-216m"});
   });
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
<style>
   .t1 span {
   color: #ff0000;
   }
</style>
<section id="contentsection">
   <div id="wait-div" class="wait-div">
      <div class="wait-divin"> <span style="background: url('images/loading.gif') no-repeat;"> <span style="margin-left:48px;"> Please wait ....</span> </span> </div>
   </div>
   <div class="col-left">
      <section id="wrapper">
         <section id="middle">
            <section id="middle-inner">
               <section class="all-pins-do">
                  <section id="searchResult" class="maintitle">
                     <h1> My Website </h1>
                     <div class="clr"></div>
                     <section id="middle">
                        <section id="middle-inner">
                           <section class="all-pins-do">
                              <div class="my-account-inner">
                                 <div class="sb-toggle-right navbar-right">
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
                                          <div class="clr"></div>
                                       </div>
                                       <div class="right-my-account-blocks-inner">
                                          <div class="profie-bl1" style="width: 100%;">
                                             <div class="profie-bl1-inner">
                                                <h3>Website Information</h3>
                                                <div class="form-profile">
                                                   <div class="smart-wrap">
                                                      <div class="smart-forms smart-container">
                                                         <form action="" method="post" accept-charset="utf-8" class="" id="form1" 
                                                            enctype="multipart/form-data" accept-charset="utf-8" class="ajaxform" id="form-ui">
                                                            <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="#">\D7</a> <span class="ajax_message">Hello Message</span> </div>
                                                            <div class="form-profile-block" style=" width:80%;">
                                                               <label class="pl"></label>
                                                               <div class="inputContainer">
                                                                  <div class="section">
                                                                     <label class="field prepend-icon">
                                                                        <section class="fileUpload buttonGrey">
                                                                           <span>Upload Banner</span>
                                                                           <input type="file" name="data[Morebanner][image]"  class="upload" id="imgInp" onchange="readURL(this)"  />
                                                                        </section>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                           
                                                            <div class="form-profile-block">
                                                            <label class="pl"></label>
                                                            <div class="inputContainer">
                                                            <div class="section">
                                                            <label class="field prepend-icon">
                                                            <img id="blah" alt="" style=" border: 1px " width="100" height="100" src="<?php echo !empty($this->request->data["UserInformation"]["banner_image"])?$this->webroot.'websitedir/'.$this->request->data["UserInformation"]["banner_image"]:'' ?>" />
                                                            </div>
                                                            </div>
                                                            </div>
                                                             <section class="upc-mg-photos">
                                                            <section class="photo-list">
                                                            <?php 
                                                            if(!empty($userbanners))
                                                            {
                                                            ?>    
                                                            <ul class="image-container">
                                                            <?php foreach($userbanners as $photo){ 
                                                               ?>
                                                            <li id="image_<?php echo $photo["Morebanner"]['id']?>">
                                                            <section class="thumb7"><section class="thumb-inner">
                                                            <section class="del" title="Delete Photo"> 
                                                                <a href="<?php echo $this->webroot; ?>escorts/deletewebbanner/<?php echo $photo["Morebanner"]['id']?>" 
                                                                   onclick="return confirm('Are  you want to remove this?')"> 
                                                            <i class="fa fa-trash-o"></i></a> 
                                                            </section>
                                                            <img src="<?php echo $this->Html->url('/') ?>user_banners/<?php echo $photo["Morebanner"]['image'] ?>" alt="Escort Pic">
                                                            </section> 
                                                            </section>                                                                            
                                                            </li>
                                                            <?php 
                                                              
                                                               }
                                                            }
                                                               ?> 
                                                            </ul>
                                                            </section>
                                                            <div class="clr"></div>
                                                            <section class="pagination">
                                                            </section>
                                                            </section>
                                                            <div class="form-profile-block">
                                                            <label class="pl">&nbsp;</label>
                                                            <div class="inputContainer">
                                                            <input type="submit" class="buttonGrey" name="button" id="button" value="Save">
                                                            </div>
                                                            </div>
                                                         </form>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class=" clearfix"></div>
                                          <div class="detail-heading">
                                             <section class="title-left">
                                                <h1 style="display:inline-block;">Manage Website Photos</h1>
                                             </section>
                                             <a class="all-count" id="totalVideo" href="<?php echo $this->webroot; ?>escorts/uploadgallery">
                                             Add Photos   
                                             </a>
                                             
                                             <div class="clr"></div>
                                               <section class="upc-mg-photos">
                                                            <section class="photo-list">
                                                            <?php 
                                                            if(!empty($moreimages))
                                                            {
                                                            ?>    
                                                            <ul class="image-container">
                                                            <?php foreach($moreimages as $photo){ 
                                                               ?>
                                                            <li id="image_<?php echo $photo["Moreimage"]['id']?>">
                                                            <section class="thumb7"><section class="thumb-inner">
                                                            <section class="del" title="Delete Photo"> 
                                                                <a href="<?php echo $this->webroot; ?>escorts/webimagedelete/<?php echo $photo["Moreimage"]['id']?>" 
                                                                   onclick="return confirm('Are  you want to remove this?')"> 
                                                            <i class="fa fa-trash-o"></i></a> 
                                                            </section>
                                                            <img src="<?php echo $this->Html->url('/') ?>user_webimages/<?php echo $photo["Moreimage"]['image'] ?>" alt="Escort Pic">
                                                            </section> 
                                                            </section>                                                                            
                                                            </li>
                                                            <?php 
                                                              
                                                               }
                                                            }
                                                               ?> 
                                                            </ul>
                                                            </section>
                                                            <div class="clr"></div>
                                                            <section class="pagination">
                                                            </section>
                                                            </section>
                                          </div>
                                          
                                           <div class="detail-heading">
                                             <section class="title-left">
                                                <h1 style="display:inline-block;">Manage Website Social Link</h1>
                                             </section>
                                             <form name="set_happy_hours" method="POST" action="<?php echo $this->webroot;?>escorts/save_socialsetting">
                                                        <input name="data[SocialSetting][id]" value="<?php echo !empty($this->request->data["SocialSetting"]["id"])?$this->request->data["SocialSetting"]["id"]:"" ?>" type="hidden">
                                            		<!-- <table width="60%" class="servicetype"> -->
                                                    <table class="table servicetype">
                                            			<tbody>
                                                                        <tr>
                                                                                <td class="escortservice">Facebook Link:</td>
                                                                                <td>
                                                                                    <input type="text" name="data[SocialSetting][fb_link]" required="" 
                                                                                           value="<?php echo !empty($this->request->data["SocialSetting"]["fb_link"])?$this->request->data["SocialSetting"]["fb_link"]:"" ?>">
                                                                                </td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td class="escortservice">Twitter Link:</td>
                                                                                <td>
                                                                                    <input type="text" name="data[SocialSetting][twitt_link]" required="" value="<?php echo !empty($this->request->data["SocialSetting"]["twitt_link"])?$this->request->data["SocialSetting"]["twitt_link"]:"" ?>">
                                                                                </td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td class="escortservice">Google+ Link:</td>
                                                                                <td>
                                                                                    <input type="text" name="data[SocialSetting][google_link]" required="" value="<?php echo !empty($this->request->data["SocialSetting"]["google_link"])?$this->request->data["SocialSetting"]["google_link"]:"" ?>">
                                                                                </td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td class="escortservice"></td>
                                                                                <td>
                                                                                        <button type="submit" class="submit-button" name="submit"> Submit </button>
                                                                                </td>
                                                                        </tr>
                                            		</tbody>
                                                    </table>
                                                    </form>
                                             
                                             <div class="clr"></div>
                                               <section class="upc-mg-photos">
                                                          
                                                <div class="clr"></div>

                                                </section>
                                          </div>
                                          
                                          
                                          <div class=" clearfix"></div>

                                          <div class="detail-heading">
                                             <section class="title-left">
                                                <h1 style="display:inline-block;">Manage Portfolio</h1>
                                             </section>
                                             <a class="all-count" id="totalVideo" href="<?php echo $this->webroot; ?>escorts/uploadportfolio">
                                             Add Portfolio   
                                             </a>
                                             
                                             <div class="clr"></div>
                                               <section class="upc-mg-photos">
                                                            <section class="photo-list">
                                                            <?php 
                                                            if(!empty($portfolios))
                                                            {
                                                            ?>    
                                                            <ul class="image-container">
                                                            <?php foreach($portfolios as $photo){ 
                                                               ?>
                                                            <li id="image_<?php echo $photo["Portfolio"]['id']?>">
                                                            <section class="thumb7"><section class="thumb-inner">
                                                            <section class="del" title="Delete Photo"> 
                                                                <a href="<?php echo $this->webroot; ?>escorts/deleteportfolio/<?php echo $photo["Portfolio"]['id']?>" 
                                                                   onclick="return confirm('Are  you want to remove this?')"> 
                                                            <i class="fa fa-trash-o"></i></a> 
                                                            </section>
                                                            <img src="<?php echo $this->Html->url('/') ?>portfolio/<?php echo $photo["Portfolio"]['image'] ?>" alt="Escort Pic">
                                                            </section> 
                                                            </section>                                                                            
                                                            </li>
                                                            <?php 
                                                              
                                                               }
                                                            }
                                                               ?> 
                                                            </ul>
                                                            </section>
                                                            <div class="clr"></div>
                                                            <section class="pagination">
                                                            </section>
                                                            </section>
                                          </div>
                                          <div class="clr"></div>
                                          <div class="profie-bl3">
                                          </div>
                                          <div class="clr"></div>
                                       </div>
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
      <?php echo $this->element("user_banner"); ?>  
   </div>
</section>
<div class="clr"></div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">About You</h4>
         </div>
         <div class="modal-body">
            <textarea name="about" id="about" rows="10" cols="100" style="width:98%;" ><?php echo $userinfos['User']['about'] ?></textarea>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" onclick="saveAboutMe('<?php echo $this->Session->read('fuid') ?>');" class="btn btn-primary">Save changes</button>
         </div>
      </div>
   </div>
</div>
<style>
   .form-profile-block label.pl {
   width:103px;
   }
</style>
<!-- Modal End -->
<style>
   .modal-backdrop.in {position: relative;}
</style>
<script>
   function saveAboutMe(id) {
       if ($("#about").val() == "") {
           alert("About You Cannot Empty!");
           $("#about").focus();
           return false;
       }
       var aboutData = $("#about").val();
       $.ajax({
           type: "POST",
           url: "<?php echo $this->Html->url('/'); ?>escorts/editEscortAbout/",
           //dataType: "json",
           data: {id: id, about: $("#about").val()}
       }).done(function (msg) {
           //$("#about").val(aboutData);
           //$("#myModal").modal('hide');
           window.location.href = "<?php echo Router::url(array('controller' => 'Escorts', 'action' => 'editescortprofile')); ?>";
       });
   }
</script>
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
<!--<script>
   $('.pagecontent').summernote({height: 300});
   </script>-->
<script>
   $(document).ready(function () {
       $('#summernote').summernote();
       $('.pagecontent').summernote({
           height: 150, // set editor height
           width: 600,
           minHeight: null, // set minimum height of editor
           maxHeight: null, // set maximum height of editor
           focus: true, // set focus to editable area after initializing summernote
       });
   });
   
</script>
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
   
   function deletephoto(id)
   {
       var tt=confirm("Are you want to remove this?");
       if(tt)
       {
           $.get("<?php echo $this->webroot; ?>escorts/deletewebbanner/"+id,function(data){
            location.reload();   
           });
       }
       else
       {
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

