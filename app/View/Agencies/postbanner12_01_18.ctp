<?php ?>

<link rel="stylesheet" href="/resources/demos/style.css">
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
                                                        <h1 style="display:inline-block;">Upload Banner</h1>
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
<!--                                                            <div class="detail-heading">
                                                                <section class="title-left">
                                                                    <h1 style="display:inline-block;">Upload Banner</h1>
                                                                </section>
                                                                <div class="clr"></div>
                                                            </div>-->
                                                            <section class="clr"></section>
                                                        </section>
                                                        <section class="content-box nre-span">
                                                            <section class="upc clear">
                                                              <?php echo $this->Form->create('User',array('enctype'=>'multipart/form-data','accept-charset'=>'utf-8','method'=>'post')); ?>
          
                                                                    <section class="upc-tom1">
                                                                        <section class="clr"></section>
                                                                    </section>
                                                                    
                                                                    
                                                                    <section class="fileUpload buttonGrey">
                                                                        <span>Choose Photos</span>
                                                                        <input type="file" name="data[Advertisement][image]" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" class="upload" />
                                                                    </section>
                                                                    
                                                                    <section>
                                                                        <img id="blah" alt="" style=" border: 1px " width="100" height="100" />
                                                                    </section>
                                                                   
                                                                    
                                                                    <section class="tbut2 modediv"  style=" margin-top:9px;"> 
                                                                        <label for="label" style="width: auto;"> Resolutions: <span>*</span></label>
                                                                        <label class="option">
                                                                        <?php echo $this->Form->input("resolution", array('options'=>$resolutions,'empty'=>'Select','div'=>false,'label' => false));?>                                                      
									</label>
                                                                    </section>
                                                                    
                                                                    <section class="tbut2 modediv"  style=" margin-top:9px;"> 
                                                                        <label for="label" style="width: auto;"> Durations: <span>*</span></label>
                                                                        <label class="option">
                                                                        <?php echo $this->Form->input("duration", array('options'=>$durations,'empty'=>'Select','div'=>false,'label' => false));?>                                                      
									</label>
                                                                    </section>
                                                                    
                                                                    <br />
                                                                    <section class="tbut2">
                                                                        <input type="submit" value="Upload Banner" name="button" 
                                                                               class="buttonGrey" id="button_frm" >
                                                                    </section><br />
                                                                    <?php echo $this->Form->end();?>
                                                            </section>
                                                            <div class="clear"></div>
                                                            
                                                            
                                                            
                                                            
                                                            
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
 <?php echo $this->element("user_banner");?>   
</div>
</section>
<div class="clr"></div>


<script>
    function showdiv(param)
                                                                    
    {
        $(".modediv").hide();
        $(".modetext").removeAttr("required");
        
        if(param=='daily')
        {
            $("#daily_div").show();
            $("#daily_text").attr("required",true);
        }
        else
        {
            $("#weekly_div").show();
            $("#weekly_text").attr("required",true);
        }
    }
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
</style>
