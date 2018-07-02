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
                                                <?php echo $this->element('agent_sidebar'); ?>
                                                <div class="triangleBottomleft firstItem"></div>
                                            </div>
                                            <div class="right-my-account">
                                            	<section>
										           <h1>Post Classified Ads</h1>
										        </section>
                                            	<div class="right-div">
                                                    <form name="set_happy_hours"   action="<?php echo $this->webroot; ?>classifieds/add" method="post" accept-charset="utf-8" class="" id="form1" 
                                                                      enctype="multipart/form-data">
                                            		<!-- <table width="60%" class="servicetype"> -->
                                                    <table class="table servicetype">
                                            			<tr>
                                            				<td class="escortservice">Name:</td>
                                            				<td>
                                            					<input type="text" name="data[Classified][name]" class="textbox" required>
                                            				</td>
                                            			</tr>
                                                                
                                                                <tr>
                                            				<td class="escortservice">Photo:</td>
                                                                        <td>
                                                                            <section class="fileUpload buttonGrey">
                                                                            <span>Choose Photos</span>
                                                                            <input type="file" name="data[Classified][image]"  class="upload" id="imgInp" onchange="readURL(this)" />
                                                                            </section>
                                                                            <section>
                                                                                <img id="blah" alt="" style=" border: 1px " width="100" height="100" />
                                                                            </section>
                                                                        </td>
                                            			</tr>
                                            			
                                            			<tr>
                                            				<td class="escortservice">Description:</td>
                                            				<td>
                                            					<textarea rows="5" cols="150" name="data[Classified][description]"></textarea>
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

                                                    <h3>My Classified Ads</h3>
                                            		 <table width="100%" class="happyhourday"> 
                                                    <table class="table happyhourday">
                                            			<tr>
                                                            <th>ID#</th>
                                            				<th>Title</th>
                                            				<th>Description</th>
                                            				<th>Image</th>
                                            				<th>Action</th>

                                            			</tr>
                                                        <?php 
                                                               $cnt = 1;
                                                               //pr($allahppyhoursdata); exit;
                                                               if(!empty($classifieds))
                                                               {
                                                               foreach($classifieds as $classified) {
                                                                    
                                                        ?>
                                            			<tr>
                                            				<td><?php echo $cnt; ?></td>
                                            				<td><?php echo $classified['Classified']['name']; ?></td>
                                            				<td><?php echo substr($classified['Classified']['description'],0,50); ?></td>
                                                                        <td>
                                                                            <?php
                                                                            if(!empty($classified['Classified']['image']))
                                                                            {
                                                                            ?>
                                                                            <img src="<?php echo $this->webroot;?>job_images/<?php echo $classified['Classified']['image']; ?>" style=" height:100px; width:100px;">
                                                                            <?php }else{?>
                                                                            <img src="<?php echo $this->webroot;?>noimage.png" style=" height:100px; width:100px;">
                                                                            <?php }?>
                                                                            
                                                                        </td>

                                            				
                                                             <td><?php echo $this->Form->postLink(__('Delete'), array('controller'=>'classifieds','action' => 'deleteclassified', $classified['Classified']['id']), null, __('Are you sure you want to delete # %s?', $classified['Classified']['id'])); ?></td> 
                                            			</tr>
                                                        <?php 
                                                            $cnt++;
                                                    } ?>
                                                               <?php }else{?>         
                                                                <tr>
                                                                    <td colspan="5">No Classified Ads Found</td>
                                                                </tr>
                                                               <?php }?>
                                                                
                                            		</table>
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