<section id="contentsection">
<div id="wait-div" class="wait-div">
  <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
    Please wait    ....</span> </span> </div>
</div>

<div class="col-left">



<section id="wrapper">
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
                                                <a style="display:none;" href="#;" class="website_activate"></a>
                                                    <?php echo $this->element('club_sidebar'); ?>
                                                <div class="triangleBottomleft firstItem"></div>
                                            </div>
<div class="right-my-account">
<div class="right-my-account-blocks">
<div class="detail-heading">
    <section class="title-left">
            <h1 style="display:inline-block;">Add Post</h1>
            
          </section>
               
          
   
          
          <div class="clr"></div>
          </div>
           
          <div class="right-my-account-blocks-inner">
          <div class="detail-heading" style="background: none;display:none;">
		<section class="title-left" style="display:none;">
            <h1 style="display:inline-block;">Add  Blog</h1>
        </section>

          <div class="clr"></div>
          </div>
          <div class="tom1  for-tour">
                <form action="<?php echo $this->webroot?>clubs/blogadd" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui3" enctype="multipart/form-data">                    
                  <input type="hidden" name="user_id" value="<?php echo $this->Session->read('fuid');?>">
                  <div class="smart-forms">
            <section class="t1 t1-t" style="width: 100%">

            <label for="label" style=" width: 170px; margin-right: 10px;padding-top: 12px;color: #000!important;">Blog Title <span>*</span></label>
            <input id="title" class="inputtext" name="name" placeholder="Blog Title" style=" width: 72% !important;" type="text" required>

            <section class="clr" style="margin: 10px 0;"></section>  
            <label for="label" style=" width: 170px; margin-right: 10px;padding-top: 12px;color: #000!important;">Blog Content <span>*</span></label>


            <textarea class="pagecontent" name="contaent" placeholder="Enter Blog Content here" style="width: 72% !important;float:right;" required></textarea>   
            <section class="clr" style="margin: 10px 0;"></section>  

            <section class="fileUpload">
            <label for="label" style=" width: 170px; margin-right: 10px;padding-top: 12px;color: #000!important;">Choose a Photo</label>
            <input style=" width: 72% !important;" type="file" name="img" class="upload">
            </section>                                                           

            <section class="clr"></section>
            </section>

            <section class="tbut" style="margin-bottom: 10px;">
            <input class="buttonGrey" name="button" id="button" value="Upload" type="submit">
            </section>

                  </div>
                 </form>            
               <section class="clr"></section>
             
               </div>
              <div class="detail-heading" style="background: none;display:none;">
          <section class="title-left">
            <h1 style="display:none;">Gestione blog</h1>
            
          </section>
          
          <div class="clr"></div>
          </div>             
               <div class="smart-forms">
				   <div  class="notification alert-success spacer-t10" id="success" style="display:none"></div>                        
          </div>
          
              <div class="table-responsive for-msg" style="background: none;display:none;">
                <table class="table table-vcenter table-striped">
                  <thead>
                    <th style="width: 50px;">Sr. No.</th>
                    <th>Image</th>
                    <th>Blog Title</th>
                    <th>Posted Date</th>
                    <th>Comments</th>
                    <th>Option</th>
                  </thead>
                  <tbody>
                  </tbody>
                  <tr >
                    <td class="no-record" colspan="5">No Blog Found</td>
                  </tr>
                </table>
              </div>
          
          

                <div class="clr"></div>
                </div>
</div>


 <div class="clr"></div>
</div>
 <div class="clr"></div>
</div>
 </section>
 <!--<div id="promo-bottom">
 
 </div>-->
</section>
</section>
</section>

<script>
	$('.textarea').wysihtml5();
</script>
</div>
    <div class="col-right">
        <?php echo $this->element('user_banner'); ?>
    </div>
</section>
<div class="clr"></div>
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