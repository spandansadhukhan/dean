<link rel="stylesheet" href="<?php echo $this->webroot; ?>css/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<section id="contentsection">
        <div class="col-left mt-4">
            <section id="container" class="container">
                <section id="middle">
                    <section id="middle-inner">
                        <section class="all-pins-do">
                            <div class="my-account-inner row">
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
                                .acntSetting h2{ width:100%;}
                            </style>
                            <a style="display:none;" href="javascript:;" class="website_activate"></a>
                            <?php echo $this->element('agent_sidebar'); ?>
                            <div class="triangleBottomleft firstItem"></div>
                       
                        <div class="right-my-account col-lg-9">
                            <div class="right-my-account-blocks">
                                <div class="detail-heading">
                                    <section class="title-left" style="float: none;">
                                        <div class="acntSetting p-1 d-flex justify-content-between align-items-center">
                                                    <h2 class="font-weight-normal">Rates & Services</h2>
                                                    <select id="site_currency" name="site_currency" class="form-control width120 text-white" size="1" onchange="getvalue(this.value)" style="float: right; width: auto;">
                                            
                                            <option selected="selected" value="NZD" >NZ </option>
                                        </select>
                                                    
                                        &nbsp;
                                        </div>
                                        

                                    </section>
                                    <div class="clr"></div>
                                </div>
                                <div class="right-my-account-blocks-inner">
                                   

                                    <div class="profie-bl-rightm">
                                        <div class="newServices">
                                            <div class="profie-bl2-inner">
                                                <h4 class="mb-4">Please Enter Rates<small class="font-12 ml-3">(Rates is EUR)</small></h4>
                                                <div class="form-rates">
                                                    <div class="table-responsive for-msg">
                                                        <table class="table tablePartss">
                                                            <tbody>
                                                            <thead>
                                                            <th style="width:120px;">Rates</th>
                                                            <th>Incall</th>
                                                            <th>Outcall</th>
                                                            <th>Actions</th>
                                                            </thead>											
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div class="smart-forms">
                                                                       	
                                                                    </div>
                                                                    <?php echo $this->Form->create('Rate',array('enctype'=>'multipart/form-data','class'=>'','id'=>'','accept-charset'=>'utf-8','method'=>'post')); ?>                                                                        
                                                                     <?php echo $this->Form->input("id");?>                                                      
                                                                        <table class="table tablePartss">	
                                                                            <tr>
                                                                                <td style="width: 120px;">30 Min</td>
                                                                                
                                                                                <td>
                                                                                  <?php echo $this->Form->input("30min_incall", array('required'=>'required','type'=>'text','maxlength'=>6,'div'=>false,'label' => false));?>                                                      
                                                                                </td>
                                                                                <td>
                                                                                  <?php echo $this->Form->input("30min_outcall", array('required'=>'required','type'=>'text','maxlength'=>6,'div'=>false,'label' => false));?>                                                      
                                                                                </td>
                                                                                
                                                                                <td>
                                                                                    <div class="config-group">
                                                                                        <div class="group">
                                                                                            <div class="button-box autoplay column-2">
                                                                                                                                
                                                                                                <input class="table-bt" style="display:block; width:auto;" type="submit" 
                                                                                                       name="submit" value="Update" >
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    <?php echo $this->Form->end();?>
                                                                </td>
                                                            </tr>
                                                            
                                                                                                                       
                                                            
                                                            
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div class="smart-forms">
                                                                        <div id="save_incall_outcall_charge_error30_Min_container" style="display:none;" class="error_message notification alert-error spacer-t5"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_error30_Min"></span></div>
                                                                        <div id="save_incall_outcall_charge_success30_Min_container" style="display:none;" class="success_message notification alert-success spacer-t10"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_success30_Min"></span></div>		
                                                                    </div>
                                                                    <?php echo $this->Form->create('Rate',array('enctype'=>'multipart/form-data','class'=>'','id'=>'','accept-charset'=>'utf-8','method'=>'post')); ?>                                                                        
                                                                     <?php echo $this->Form->input("id");?>                                                      
                                                                        <table class="table tablePartss">	
                                                                            <tr>
                                                                                <td style="width: 120px;">1 Hour</td>
                                                                                
                                                                                <td>
                                                                                  <?php echo $this->Form->input("1hr_incall", array('required'=>'required','type'=>'text','maxlength'=>6,'div'=>false,'label' => false));?>                                                      
                                                                                </td>
                                                                                <td>
                                                                                  <?php echo $this->Form->input("1hr_outcall", array('required'=>'required','type'=>'text','maxlength'=>6,'div'=>false,'label' => false));?>                                                      
                                                                                </td>
                                                                                
                                                                                <td>
                                                                                    <div class="config-group">
                                                                                        <div class="group">
                                                                                            <div class="button-box autoplay column-2">
                                                                                                                                
                                                                                                <input class="table-bt" style="display:block; width:auto;" type="submit" 
                                                                                                       name="submit" value="Update" >
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    <?php echo $this->Form->end();?>
                                                                </td>
                                                            </tr>                                                             
                                                            
                                                            
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div class="smart-forms">
                                                                        <div id="save_incall_outcall_charge_error30_Min_container" style="display:none;" class="error_message notification alert-error spacer-t5"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_error30_Min"></span></div>
                                                                        <div id="save_incall_outcall_charge_success30_Min_container" style="display:none;" class="success_message notification alert-success spacer-t10"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_success30_Min"></span></div>		
                                                                    </div>
                                                                    <?php echo $this->Form->create('Rate',array('enctype'=>'multipart/form-data','class'=>'','id'=>'','accept-charset'=>'utf-8','method'=>'post')); ?>                                                                        
                                                                     <?php echo $this->Form->input("id");?>                                                      
                                                                        <table class="table tablePartss">	
                                                                            <tr>
                                                                                <td style="width: 120px;">2 Hour</td>
                                                                                
                                                                                <td>
                                                                                  <?php echo $this->Form->input("2hr_incall", array('required'=>'required','type'=>'text','maxlength'=>6,'div'=>false,'label' => false));?>                                                      
                                                                                </td>
                                                                                <td>
                                                                                  <?php echo $this->Form->input("2hr_outcall", array('required'=>'required','type'=>'text','maxlength'=>6,'div'=>false,'label' => false));?>                                                      
                                                                                </td>
                                                                                
                                                                                <td>
                                                                                    <div class="config-group">
                                                                                        <div class="group">
                                                                                            <div class="button-box autoplay column-2">
                                                                                                                                  
                                                                                                <input class="table-bt" style="display:block; width:auto;" type="submit" 
                                                                                                       name="submit" value="Update" >
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    <?php echo $this->Form->end();?>
                                                                </td>
                                                            </tr>                                   
                                                            
                                                            
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div class="smart-forms">
                                                                        <div id="save_incall_outcall_charge_error30_Min_container" style="display:none;" class="error_message notification alert-error spacer-t5"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_error30_Min"></span></div>
                                                                        <div id="save_incall_outcall_charge_success30_Min_container" style="display:none;" class="success_message notification alert-success spacer-t10"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_success30_Min"></span></div>		
                                                                    </div>
                                                                    <?php echo $this->Form->create('Rate',array('enctype'=>'multipart/form-data','class'=>'','id'=>'','accept-charset'=>'utf-8','method'=>'post')); ?>                                                                        
                                                                     <?php echo $this->Form->input("id");?>                                                      
                                                                        <table class="table tablePartss">	
                                                                            <tr>
                                                                                <td style="width: 120px;">3 Hour</td>
                                                                                
                                                                                <td>
                                                                                  <?php echo $this->Form->input("3hr_incall", array('required'=>'required','type'=>'text','maxlength'=>6,'div'=>false,'label' => false));?>                                                      
                                                                                </td>
                                                                                <td>
                                                                                  <?php echo $this->Form->input("3hr_outcall", array('required'=>'required','type'=>'text','maxlength'=>6,'div'=>false,'label' => false));?>                                                      
                                                                                </td>
                                                                                
                                                                                <td>
                                                                                    <div class="config-group">
                                                                                        <div class="group">
                                                                                            <div class="button-box autoplay column-2">
                                                                                                                                  
                                                                                                <input class="table-bt" style="display:block; width:auto;" type="submit" 
                                                                                                       name="submit" value="Update" >
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    <?php echo $this->Form->end();?>
                                                                </td>
                                                            </tr>                                                             
                                                            
                                                            
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div class="smart-forms">
                                                                        <div id="save_incall_outcall_charge_error30_Min_container" style="display:none;" class="error_message notification alert-error spacer-t5"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_error30_Min"></span></div>
                                                                        <div id="save_incall_outcall_charge_success30_Min_container" style="display:none;" class="success_message notification alert-success spacer-t10"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_success30_Min"></span></div>		
                                                                    </div>
                                                                    <?php echo $this->Form->create('Rate',array('enctype'=>'multipart/form-data','class'=>'','id'=>'','accept-charset'=>'utf-8','method'=>'post')); ?>                                                                        
                                                                     <?php echo $this->Form->input("id");?>                                                      
                                                                        <table class="table tablePartss">	
                                                                            <tr>
                                                                                <td style="width: 120px;">Additional Hours</td>
                                                                                
                                                                                <td>
                                                                                    
                                                                                  <?php echo $this->Form->input("addhr_incall", array('required'=>'required','type'=>'text','maxlength'=>6,'div'=>false,'label' => false));?>                                                      
                                                                                </td>
                                                                                <td>
                                                                                    
                                                                                  <?php echo $this->Form->input("addhr_outcall", array('required'=>'required','type'=>'text','maxlength'=>6,'div'=>false,'label' => false));?>                                                      
                                                                                </td>
                                                                                
                                                                                <td>
                                                                                    <div class="config-group">
                                                                                        <div class="group">
                                                                                            <div class="button-box autoplay column-2">
                                                                                                                                 
                                                                                                <input class="table-bt" style="display:block; width:auto;" type="submit" 
                                                                                                       name="submit" value="Update" >
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    <?php echo $this->Form->end();?>
                                                                </td>
                                                            </tr>                                                             <tr>
                                                                <td colspan="4">
                                                                    <div class="smart-forms">
                                                                        <div id="save_incall_outcall_charge_error30_Min_container" style="display:none;" class="error_message notification alert-error spacer-t5"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_error30_Min"></span></div>
                                                                        <div id="save_incall_outcall_charge_success30_Min_container" style="display:none;" class="success_message notification alert-success spacer-t10"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_success30_Min"></span></div>		
                                                                    </div>
                                                                    <?php echo $this->Form->create('Rate',array('enctype'=>'multipart/form-data','class'=>'','id'=>'','accept-charset'=>'utf-8','method'=>'post')); ?>                                                                        
                                                                     <?php echo $this->Form->input("id");?>                                                      
                                                                    <table class="table tablePartss">	
                                                                            <tr>
                                                                                <td style="width: 120px;">Overnight</td>
                                                                                
                                                                                <td>
                                                                                    
                                                                                  <?php echo $this->Form->input("night_incall", array('required'=>'required','type'=>'text','maxlength'=>6,'div'=>false,'label' => false));?>                                                      

                                                                                </td>
                                                                                <td>
                                                                                    
                                                                                    <?php echo $this->Form->input("night_outcall", array('required'=>'required','type'=>'text','maxlength'=>6,'div'=>false,'label' => false));?>                                                      

                                                                                </td>
                                                                                
                                                                                <td>
                                                                                    <div class="config-group">
                                                                                        <div class="group">
                                                                                            <div class="button-box autoplay column-2">
                                                                                                                                  
                                                                                                <input class="table-bt" style="display:block; width:auto;" type="submit" 
                                                                                                       name="submit" value="Update" >
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    <?php echo $this->Form->end();?>
                                                                </td>
                                                            </tr>                                                             
                                                            
                                                            
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div class="smart-forms">
                                                                        <div id="save_incall_outcall_charge_error30_Min_container" style="display:none;" class="error_message notification alert-error spacer-t5"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_error30_Min"></span></div>
                                                                        <div id="save_incall_outcall_charge_success30_Min_container" style="display:none;" class="success_message notification alert-success spacer-t10"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_success30_Min"></span></div>		
                                                                    </div>
                                                                    <?php echo $this->Form->create('Rate',array('enctype'=>'multipart/form-data','class'=>'','id'=>'','accept-charset'=>'utf-8','method'=>'post')); ?>
                                                                     <?php echo $this->Form->input("id");?>                                                      
                                                                    <table class="table tablePartss">	
                                                                            <tr>
                                                                                <td style="width: 120px;">1 Day</td>
                                                                                
                                                                                <td>
                                                                                 <?php echo $this->Form->input("1day_incall", array('required'=>'required','type'=>'text','maxlength'=>6,'div'=>false,'label' => false));?>                                                      
                                                                                </td>
                                                                                <td>
                                                                                    
                                                                                    <?php echo $this->Form->input("1day_outcall", array('required'=>'required','type'=>'text','maxlength'=>6,'div'=>false,'label' => false));?>                                                      

                                                                                </td>
                                                                                
                                                                                <td>
                                                                                    <div class="config-group">
                                                                                        <div class="group">
                                                                                            <div class="button-box autoplay column-2">
                                                                                                                                   
                                                                                                <input class="table-bt" style="display:block; width:auto;" type="submit" 
                                                                                                       name="submit" value="Update" >
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    <?php echo $this->Form->end();?>
                                                                </td>
                                                            </tr>                                                             
                                                            
                                                            
                                                            
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div class="smart-forms">
                                                                        <div id="save_incall_outcall_charge_error30_Min_container" style="display:none;" class="error_message notification alert-error spacer-t5"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_error30_Min"></span></div>
                                                                        <div id="save_incall_outcall_charge_success30_Min_container" style="display:none;" class="success_message notification alert-success spacer-t10"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_success30_Min"></span></div>		
                                                                    </div>
                                                                    <?php echo $this->Form->create('Rate',array('enctype'=>'multipart/form-data','class'=>'','id'=>'','accept-charset'=>'utf-8','method'=>'post')); ?>
                                                                     <?php echo $this->Form->input("id");?>                                                      
                                                                        <table class="table tablePartss">	
                                                                            <tr>
                                                                                <td style="width: 120px;">2 Day</td>
                                                                                
                                                                                <td>
                                                                                  <?php echo $this->Form->input("2day_incall", array('required'=>'required','type'=>'text','maxlength'=>6,'div'=>false,'label' => false));?>                                                      

                                                                                </td>
                                                                                <td>
                                                                                     <?php echo $this->Form->input("2day_outcall", array('required'=>'required','type'=>'text','maxlength'=>6,'div'=>false,'label' => false));?>                                                      

                                                                                </td>
                                                                                
                                                                                <td>
                                                                                    <div class="config-group">
                                                                                        <div class="group">
                                                                                            <div class="button-box autoplay column-2">
                                                                                                <input type="hidden" id="currency_name_1" 
                                                                                                       name="curency" value="AUD"/>                                       
                                                                                                <input class="table-bt" style="display:block; width:auto;" type="submit" 
                                                                                                       name="submit" value="Update" >
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    <?php echo $this->Form->end();?>
                                                                </td>
                                                            </tr>                                                             
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div class="smart-forms">
                                                                        <div id="save_incall_outcall_charge_error30_Min_container" style="display:none;" class="error_message notification alert-error spacer-t5"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_error30_Min"></span></div>
                                                                        <div id="save_incall_outcall_charge_success30_Min_container" style="display:none;" class="success_message notification alert-success spacer-t10"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_success30_Min"></span></div>		
                                                                    </div>
                                                                    <?php echo $this->Form->create('Rate',array('enctype'=>'multipart/form-data','class'=>'','id'=>'','accept-charset'=>'utf-8','method'=>'post')); ?>
                                                                     <?php echo $this->Form->input("id");?>                                                      
                                                                        <table class="table tablePartss">	
                                                                            <tr>
                                                                                <td style="width: 120px;">Weekend</td>
                                                                                
                                                                                <td>
                                                                                   <?php echo $this->Form->input("weekend_incall", array('required'=>'required','type'=>'text','maxlength'=>6,'div'=>false,'label' => false));?>                                                      

                                                                                </td>
                                                                                <td>
                                                                                   <?php echo $this->Form->input("weekend_outcall", array('required'=>'required','type'=>'text','maxlength'=>6,'div'=>false,'label' => false));?>                                                      
                                                                                </td>
                                                                                
                                                                                <td>
                                                                                    <div class="config-group">
                                                                                        <div class="group">
                                                                                            <div class="button-box autoplay column-2">
                                                                                                <input type="hidden" id="currency_name_1" 
                                                                                                       name="curency" value="AUD"/>                                       
                                                                                                <input class="table-bt" style="display:block; width:auto;" type="submit" 
                                                                                                       name="submit" value="Update" >
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    <?php echo $this->Form->end();?>
                                                                </td>
                                                            </tr>                                                             
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clr"></div>
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
    <div class="clr" ></div>
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
    function saveAboutMe(id) {
        if ($("#about").val() == "") {
            alert("About You Cannot Empty!");
            $("#about").focus();
            return false;
        }
        var aboutData = $("#about").val();
        $.ajax({
            type: "POST",
            url: "<?php echo $this->Html->url('/'); ?>users/editEscortAbout/",
            //dataType: "json",
            data: {id: id, about: $("#about").val()}
        }).done(function (msg) {
            //$("#about").val(aboutData);
            //$("#myModal").modal('hide');
            window.location.href = "<?php echo Router::url(array('controller' => 'Users', 'action' => 'editescortprofile')); ?>";
        });
    }
</script>