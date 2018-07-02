<section id="contentsection">
    <div id="wait-div" class="wait-div">
        <div class="wait-divin">  <span style="margin-left:48px;"> </span> </div>
    </div>
    <div class="col-left">
        <section class="container">
            <section id="middle">
                <section id="middle-inner">
                    <section class="all-pins-do">
                        <section id="searchResult" class="maintitle">
                            
                            <div class="clr"></div>
                            <section id="middle">
                                <section id="middle-inner">
                                    <section class="all-pins-do">
                                        <div class="my-account-inner">
                                            <div class="row">
                                            
                              
                                                
                                                <a style="display:none;" href="javascript:;" class="website_activate"></a>
                                                <?php
echo $this->element('escort_sidebar');
?>
											<div class="col-lg-9">
                    						<div class="right-my-account template_box">
                        <div class="right-my-account-blocks">
                            <div class="detail-heading">
                                <section class="acntSetting p-1">
                                    <h2>Manage Website</h2>
                                </section>
                                <div class="clr"></div>
                            </div>
                                      
                            <div class="right-my-account-blocks-inner">
                                     <div id="addBacklinkContainer">
                                    <div class="clr"></div>
                                    <br>
                                    <form action="#" method="post" accept-charset="utf-8" class="ajaxform" id="formui">                                    <div class="smart-forms">

                                    </div>
                                                                          <div class="tom1  back-step1" style="display:block;">
                                        <div class="clr"></div>
                                        
                                        <div class="tom1"  style="margin:10px auto 0 auto;">                  
                                            <section class="t1">
                                                <div class="smart-wrap">
                                                    <div class="smart-forms smart-container ">
                                            
                                                        <div class="section" style="margin: 0;">
                                                            
                                                            <div class="option-group field">
                                                                <?php
//print_r($escorts);

if (!empty($webtemplates)) {
    foreach ($webtemplates as $showescortsdata) {
?>    
                                                                <section class="current-temp">
                                                                    
                                                                    <section class="ctemp-pic">
                                                                        <a href="<?php
        echo $this->webroot;
?>escorts/createwebsite/<?php
        echo base64_encode($showescortsdata['WebsiteTemplate']['id']);
?>"> 
                                                                        <img src="<?php
        echo $this->webroot;
?>img/<?php
        echo $showescortsdata['WebsiteTemplate']['template'];
?>" width="100%" height="auto" alt="Template" class="img-fluid"></a>

                                                                    </section>
                                                                        
                                                                    <section class="ctemp-det">
                                                                        <h2><?php
        echo $showescortsdata['WebsiteTemplate']['name'];
?></h2>
                                                                        
                                                                        <a href="<?php
        echo $this->webroot;
?><?php echo $showescortsdata["WebsiteTemplate"]["dir_name"]; ?>/index.php?id=<?php echo base64_encode($this->Session->read('fuid'));?>" target="_blank" class="s_butt" title="View Profile"><i class="fa fa-eye"></i> </a> 
                                                                        
                                                                        <a href="#"  onclick="removeTemplate()"   class="s_butt" title="Remove Template"><i class="fa fa-trash-o"></i></a>
                                                                        
                                                                    </section>
                                                                    
                                                                    <section class="clr"></section>
                                                                </section>

                                <?php
    }
    
} else {
    echo 'No results found';
    
}
?>
                                                                   <section class="clr"></section>
                                                            </div>
                                                            <section class="clr"></section>
                                                        </div>
                                                        <section class="clr"></section>
                                                    </div>
                                                </div>
                                                
                                                <section class="clr"></section>
                                            </section>                  
                                        </div>                            
                                    </div>
                                    
                                    <div class="tom1  back-step1" style="display:none;">
                                        <div class="detail-heading">
                                            <section class="title-left">
                                                <h1 style="display:inline-block;">Choose Other Template</h1>
                                            </section>
                                            <div class="clr"></div>
                                        </div>
                                        <input type="hidden" name="choose_template_id" id="checkme" value=""> 
                                        <input type="hidden" name="template_page" id="checkme" value="changetemplate"> 
                                        <div class="tom1"  style="margin:10px auto 0 auto;">                  
                                            <section class="t1">
                                                <div class="smart-wrap">
                                                    <div class="smart-forms smart-container ">
                                            
                                                        <div class="section" style="margin: 0;">
                                                            
                                                            <div class="option-group field">
                                                                
                                                                <section class="temp-select">
                                                                    <ul>
                                                                                                                                                                                                                  <li>
                                                                        <div class="view view-eighth"> <img src="<?php echo $this->webroot;?>images/images/temp-4-small.jpg" width="322" height="262" alt="Template">
                                                                            <div class="mask">
                                                                                <h2>Silver Template</h2>
                                                                                 <p>Silver Template1</p>                                                                                <span>Price :
                                                                                    <samp>
                                                                                                                                                                                Free                                                                                                                                                                            </samp> 
                                                                                </span> 
                                                                                <a class="buttonGrey fancybox-effects-a" href="<?php
echo $this->webroot;
?>images/temp-4-small.jpg" data-fancybox-group="gallery"><img style="display: inline-block; margin: 3px 8px 0 0; vertical-align: text-top" src="<?php echo $this->webroot;?>images/images/preview-icon.png" width="16" height="16" alt="preview-icon"> Preview </a>
                                                                                <a href="#" class="buttonGrey" onclick="selectTemplate(1)"><img style="display: inline-block; margin: 3px 8px 0 0; vertical-align: text-top" src="<?php echo $this->webroot;?>images/images/check-icon.png" width="16" height="16" alt="check-icon">Select  </a> 
                                                                            </div>
                                                                        </div>
                                                                      </li>
                                                                                                                                                                                                                                                                                        <li>
                                                                        <div class="view view-eighth"> <img src="images/temp-3-small1.jpg" width="322" height="262" alt="Template">
                                                                            <div class="mask">
                                                                                <h2>Template English</h2>
                                                                                 <p>Template English</p>                                                                                <span>Price :
                                                                                    <samp>
                                                                                                                                                                                20.00                                                                                                
                                                                                            EUR                                                                                                                                                                                                                                                                        </samp> 
                                                                                </span> 
                                                                                <a class="buttonGrey fancybox-effects-a" href="<?php echo $this->webroot;?>images/images/temp-3-small1.jpg" data-fancybox-group="gallery"><img style="display: inline-block; margin: 3px 8px 0 0; vertical-align: text-top" src="<?php echo $this->webroot;?>images/images/preview-icon.png" width="16" height="16" alt="preview-icon"> Preview </a>
                                                                                <a href="#" class="buttonGrey" onclick="selectTemplate(2)"><img style="display: inline-block; margin: 3px 8px 0 0; vertical-align: text-top" src="<?php echo $this->webroot;?>images/images/check-icon.png" width="16" height="16" alt="check-icon">Select  </a> 
                                                                            </div>
                                                                        </div>
                                                                      </li>
                                                                                                                                                                                                                                                                                                                                                            </ul>
                                                                    <section class="clr"></section>
                                                                </section>
                                                                
                                                            </div>
                                                        
                                                        </div>
                                                    
                                                    </div>
                                                </div>
                                                <section class="clr"></section>
                                            </section>                  
                                        </div>                            
                                        
                                        <section class="clr"></section>
                                    </div>
                                    </form>                                    <div class="clr"></div>
                                </div>
                                                                <div class="clr"></div>
                            </div>
                            
                        </div>
                        
                        <div class="clr"></div>
                    </div>
											</div>
											</div>

                     <div class="clr"></div>

                                            
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
                <textarea name="about" id="about" rows="10" cols="100" style="width:98%;" ><?php
echo $user['User']['about'];
?></textarea>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="saveAboutMe('<?php
echo $this->Session->read('fuid');
?>');" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function add_to_fav(cid, uid) {
//var user_id = <?php
echo $this->Session->read('fuid');
?>;
//alert("<?php
echo $this->webroot;
?>pages/addtofavqq");


$.ajax({
    type: "POST",
    url: "<?php
echo $this->webroot;
?>pages/addtofavqq",
    data: {cid: cid, uid: uid},
    success: function (msg) {
        if (msg == 1) {
            $(".t2cid").hide();
            alert('Added to your favorite List');
            return false;
        } else {
            alert('Already Added to your favorite List');
            return false;
        }
    }
})
}
</script>
<style>
.current-temp {margin: 10px 0px 15px 0;}
.s_butt i{ font-size:20px; margin-right:15px;
}
</style>