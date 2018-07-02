<?php ?>
<section id="contentsection">
   <div id="wait-div" class="wait-div">
   </div>
   <div class="col-left">
      <section id="wrapper">
         <section id="middle">
            <section id="middle-inner">
               <section class="all-pins-do">
                  <section id="searchResult" class="maintitle">
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
                                    <section>
                                       <h1>Post Blog</h1>
                                    </section>
                                    <div class="right-div">
                                        <form name="" method="POST" action="" enctype="multipart/form-data">
                                          <!-- <table width="60%" class="servicetype"> -->
                                          <table class="table servicetype">
                                             <tr>
                                                <td class="escortservice">Photo:</td>
                                                <td>
                                                   <section class="fileUpload buttonGrey">
                                                    <span>Choose Photos</span>
                                                    <input type="file" name="data[Blog][image]"  class="upload" id="imgInp"  />
                                                  </section>
                                                  <section>
                                                           <img id="blah" alt="" style=" border: 1px " width="100" height="100" />
                                                  </section>  
                                                    
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="escortservice">Blog Title:</td>
                                                <td>
                                                   <input type="text" name="data[Blog][name]" class="textbox" required>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="escortservice">Description:</td>
                                                <td>
                                                   <textarea rows="5" cols="150" name="data[Blog][contaent]"></textarea>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="escortservice"></td>
                                                <td>
                                                   <button type="submit" class="submit-button" name="submit"> Submit </button>
                                                </td>
                                             </tr>
                                          </table>
                                       </form>
                                       <h3>My Blogs</h3>
                                       <!-- <table width="100%" class="happyhourday"> -->
                                       <table class="table happyhourday">
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
      <?php echo $this->element('user_banner');?>   
   </div>
</section>
<div class="clr"></div>
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
$(function () {
        $("#imgInp").change(function(){
          readURL(this);
                    
});
        
        
    });    
    
    
    
</script>
