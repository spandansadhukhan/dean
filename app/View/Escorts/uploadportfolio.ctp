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
                     <h1> Manage Website Portfolios</h1>
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
                                                <h3>Websites Portfolio</h3>
                                                <div class="form-profile">
                                                   <div class="smart-wrap">
                                                      <div class="smart-forms smart-container">
                                                         <form action="" method="post" accept-charset="utf-8" class="" id="form1" 
                                                            enctype="multipart/form-data" accept-charset="utf-8" class="ajaxform" id="form-ui">
                                                            <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="#">\D7</a> <span class="ajax_message">Hello Message</span> </div>
                                                            <div class="form-profile-block">
                                                               <label class="pl"> Title:</label>
                                                               <div class="inputContainer">
                                                                  <div class="section" style="">
                                                                     <label class="field">
                                                                     <input type="text" id="last_name" required="required" name="data[Portfolio][title]" value="" maxlength="100" class="gui-input">
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="form-profile-block">
                                                               <label class="pl">Descriptions :</label>
                                                               <div class="inputContainer">
                                                                  <div class="section">
                                                                     <label class="field prepend-icon">
                                                                     <textarea name="data[Portfolio][descriptions]" class="" required style=" height:162px; width:561px;">
                                                                     </textarea>
                                                                     </label>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="form-profile-block" style=" width:80%;">
                                                               <label class="pl"></label>
                                                               <div class="inputContainer">
                                                                  <div class="section">
                                                                     <section class="fileUpload buttonGrey">
                                                                        <span>Upload Photo</span>
                                                                        <input type="file" name="data[Portfolio][image]"  class="upload" id="imgInp" onchange="readURL(this)"  />
                                                                     </section>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="form-profile-block">
                                                               <label class="pl"></label>
                                                               <div class="inputContainer">
                                                                  <div class="section">
                                                                     <label class="field prepend-icon">
                                                                        <img id="blah" alt="" style=" border: 1px " width="100" height="100" src="" />
                                                                  </div>
                                                               </div>
                                                            </div>
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
</style>

