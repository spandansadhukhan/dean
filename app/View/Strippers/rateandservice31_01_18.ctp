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



<section id="contentsection">
<div id="wait-div" class="wait-div">
    <div class="wait-divin"> <span style="background: url('images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
                Please wait    ....</span> </span> </div>
</div>
<div class="col-left">
<section id="wrapper">
<section id="middle">
<section id="middle-inner">
<section class="all-pins-do">
    <section id="searchResult" class="maintitle"><h1>Rates &amp; Services</h1>
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
                            <?php echo $this->element('stripper_sidebar'); ?>
                            <div class="triangleBottomleft firstItem"></div>
                        </div>
                        <div class="right-my-account">
                            <div class="right-my-account-blocks">
                                <div class="detail-heading">
                                    <section class="title-left" style="float: none;">
                                        <h1 style="display:inline-block; float: left;">Rates & Services</h1>
                                        &nbsp;
                                        <select id="site_currency" name="site_currency" class="form-control" size="1" 
                                                onchange="getvalue(this.value)" style="float: right; width: auto;">
                                            <!--
                                            <option value="USD" >USD </option>
                                            <option value="EUR"  selected="selected" >EUR </option>
                                            <option value="CAD" >CAD </option>
                                            <option value="CHF" >CHF </option>
                                            <option value="GBP" >GBP </option>
                                            -->
                                            <option selected="selected" value="AUD" >AUD </option>
                                        </select>

                                    </section>
                                    <div class="clr"></div>
                                </div>
                                <div class="right-my-account-blocks-inner">
                                    <div class="profie-bl1">
                                        
                                        <div class="profie-bl1-inner">
                                            <div class="form-rates">
                                                <h3>Add New Services</h3>
                                                <div class="form-profile">
                                                    <div class="smart-wrap">
                                                        <form method="post" accept-charset="utf-8" class="ajaxform" id="form-ui4">
                                                            <input type="hidden" name="formtype" value="service" />
                                                            <input type="hidden" name="uid" value="<?php echo $user['Escort']['id']?>" />
                                                           
                                                            <input type="hidden" value="services_form" name="yes">
                                                            <div class="smart-forms smart-container">
                                                                <div class="form-profile-block">
                                                                    <label class="pl">Add Service: </label>
                                                                    <div class="inputContainer">
                                                                    <div class="section">
                                                                    <label class="field select">
                                                                        <select class="service_name" style="width:250px;" id="selectServ" onchange="add_services(this)">
                                                                        <option value="">Select Services</option>
                                                                        <?php foreach( $serv as $sk => $sv ){ ?>
                                                                            
                                                                            <?php if(array_key_exists($sk , $myServList)){ ?>
                                                                                <option id="rm_<?php echo $sk;?>" style="display: none" 
                                                                                        value="<?php echo $sk;?>"><?php echo $sv;?></option>
                                                                            <?php } else { ?>
                                                                            <option id="rm_<?php echo $sk;?>" value="<?php echo $sk;?>"><?php echo $sv;?></option>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                        
                                                                        <!--
                                                                        <option id="rm_11" value="11">Shower service (SS)</option>
                                                                        <option style="display:none" id="rm_10" value="10">Erotik massage (EM)</option>
                                                                        <option id="rm_9" value="9">Intimate massage (IntimitaM)</option>
                                                                        <option id="rm_8" value="8">Tantric (TAN)</option>
                                                                        <option style="display:none" id="rm_7" value="7">Cum in Mouth (CIM)</option>
                                                                        <option id="rm_6" value="6">French Kiss (FK)</option>
                                                                        <option id="rm_5" value="5">Cum on Face (CONF)</option>
                                                                        <option style="display:none" id="rm_4" value="4">Lingerie (LING)</option>
                                                                        <option id="rm_3" value="3">Masturbate (MSTB)</option>
                                                                        <option id="rm_2" value="2">Strap on (ST on)</option>
                                                                        <option id="rm_1" value="1">69 Position (69 P)</option>
                                                                        -->
                                                                    </select>
                                                                    <i class="arrow double"></i>                    
                                                                    </label>  
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                                <div  class="form-profile-block">
                                                                    <div id="servicediv"  >
                                                                        <div class="option-group field" id="serviceInput">
                                                                            
                                                                            <?php if(!empty($myServList)){ foreach($myServList as $skdt => $svdt){ ?>
                                                                            <div class="fleft city-title" id="service-li-id_<?php echo $skdt?>">
                                                                                <input style="opacity:0; position:absolute;" type="checkbox"  
                                                                                       checked="checked"  value="10" id="service<?php echo $skdt?>" 
                                                                                       name="services[]" onclick="deleteService('<?php echo $skdt?>')" >
                                                                                <label for="service10" style="color:#FEFFFF;">
                                                                                    <?php echo $svdt?>
                                                                                </label>
                                                                                <a class="icon-remove" onclick="deleteService('<?php echo $skdt?>')"></a>
                                                                            </div>                                                                            
                                                                            <?php } } ?>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <div class="clr"></div>
                                                                </div>
                                                                <section class="t1 t1-t">
                                                                    <label for="label" class="blank">&nbsp;</label>
                                                                    <section class="tbut" style="margin-left:135px">
                                                                        <input type="submit" value="Update" id="button" name="button" 
                                                                               class="buttonGrey">
                                                                    </section>
                                                                    <section class="clr"></section>
                                                                </section>
                                                            </div>
                                                        </form>		
                                                        <script>
          
                                                            function add_services(selectServ) {
                                                                var selectedText = selectServ.options[selectServ.selectedIndex].innerHTML;
                                                                var selectedValue = selectServ.value;
                                                                //alert("Selected Text: " + selectedText + " Value: " + selectedValue);
                                                                $("#serviceInput").append('<div class="fleft city-title" id="service-li-id_'+selectedValue+'">'+
                                                                               '<input style="opacity:0; position:absolute;" type="checkbox"'+
                                                                                       'checked="checked"  value="'+selectedValue+'" id="service'+selectedValue+'"'+
                                                                                       'name="services[]" onclick="removeService('+selectedValue+')" >'+
                                                                                '<label for="service'+selectedValue+'" style="color:#FEFFFF;">'+selectedText+
                                                                                '</label>'+
                                                                               '<a class="icon-remove" onclick="removeService('+selectedValue+')"></a>'+
                                                                            '</div>');
                                                                
                                                                $('#rm_'+selectedValue).css("display", "none"); 
                                                                $('#selectServ option[value=""]').prop('selected', true);
                                                            }
                                                            
                                                            function removeService(dt) {
                                                                //alert(dt);
                                                                $('#rm_'+dt).css("display", "block");
                                                                //$('#service-li-id_'+dt).css("display", "none"); 
                                                                $('#service-li-id_'+dt).remove();
                                                                $('#selectServ option[value=""]').prop('selected', true);
                                                                
                                                            }                                                            
                                                            
                                                            
                                                            function deleteService(dt) {
                                                                //alert(dt);
                                                                $('#rm_'+dt).css("display", "block");
                                                                //$('#service-li-id_'+dt).css("display", "none"); 
                                                                $('#service-li-id_'+dt).remove();
                                                                $('#selectServ option[value=""]').prop('selected', true);
                                                                
                                                            }                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            function add_category(selectCat) {
                                                                var selectedTextCat = selectCat.options[selectCat.selectedIndex].innerHTML;
                                                                var selectedValueCat = selectCat.value;
                                                                //alert("Selected Text: " + selectedTextCat + " Value: " + selectedValueCat);
                                                                $("#categoryInput").append('<div class="fleft city-title" id="category-li-id_'+selectedValueCat+'">'+
                                                                               '<input style="opacity:0; position:absolute;" type="checkbox"'+
                                                                                       'checked="checked"  value="'+selectedValueCat+'" id="category'+selectedValueCat+'"'+
                                                                                       'name="category[]" onclick="removeCategory('+selectedValueCat+')" >'+
                                                                                '<label for="category'+selectedValueCat+'" style="color:#FEFFFF;">'+selectedTextCat+
                                                                                '</label>'+
                                                                               '<a class="icon-remove" onclick="removeCategory('+selectedValueCat+')"></a>'+
                                                                            '</div>');
                                                                
                                                                $('#rmcat_'+selectedValueCat).css("display", "none"); 
                                                                $('#selectCat option[value=""]').prop('selected', true);
                                                            }
                                                            
                                                            function removeCategory(dtc) {
                                                                //alert(dt);
                                                                $('#rmcat_'+dtc).css("display", "block");
                                                                //$('#category-li-id_'+dt).css("display", "none"); 
                                                                $('#category-li-id_'+dtc).remove();
                                                                $('#selectCat option[value=""]').prop('selected', true);
                                                            }
                                                            
                                                            function deleteCategory(dtc) {
                                                                //alert(dt);
                                                                $('#rmcat_'+dtc).css("display", "block");
                                                                //$('#category-li-id_'+dt).css("display", "none"); 
                                                                $('#category-li-id_'+dtc).remove();
                                                                $('#selectCat option[value=""]').prop('selected', true);
                                                                
                                                            }                                                             
                                                        </script>                                                        
                                                        
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>

                                        <div class="profie-bl1-inner">
                                            <div class="form-rates">
                                                <h3>Add New Categories</h3>
                                                <div class="form-profile">
                                                    <div class="smart-wrap">
                                                        <form method="post" accept-charset="utf-8" class="ajaxform" id="form-ui12">
                                                            <input type="hidden" name="formtype" value="category" />
                                                            <input type="hidden" name="uid" value="<?php echo $user['Escort']['id']?>" />                                                            
                                                            
                                                            
                                                            <input type="hidden" value="category_form" name="yes">
                                                            <div class="smart-forms smart-container">
                                                                <div class="form-profile-block">
                                                                    <label class="pl">Add Category: </label>
                                                                    <div class="inputContainer">
                                                                    <div class="section">
                                                                    <label class="field select">
                                                                    <select class="category_name" style="width:250px;" id="selectCat" onchange="add_category(this)">
                                                                    <option value="">Select Categories</option>
                                                                    <?php foreach( $cat as $ck => $cv ){ ?>
                                                                    
                                                                    
                                                                            <?php if(array_key_exists($sk , $myCatList)){ ?>
                                                                                <option id="rmcat_<?php echo $ck;?>" style="display: none" 
                                                                                        value="<?php echo $ck;?>"><?php echo $cv;?></option>
                                                                                
                                                                            <?php } else { ?>
                                                                            <option id="rmcat_<?php echo $ck;?>" value="<?php echo $ck;?>"><?php echo $cv;?></option>
                                                                            <?php } ?>                                                                    
                                                                    
                                                                    
                                                                    
                                                                        
                                                                    <?php } ?>
                                                                    </select>
                                                                    <i class="arrow double"></i>                    
                                                                    </label>  
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                                <div  class="form-profile-block">
                                                                    <div id="categorydiv"  >
                                                                        <div class="option-group field" id="categoryInput">
                                                                            
                                                                           

                                                                            <?php if(!empty($myCatList)){ foreach($myCatList as $ckdt => $cvdt){ ?>
                                                                            <div class="fleft city-title" id="category-li-id_<?php echo $ckdt?>">
                                                                                    <input style="opacity:0; position:absolute;" type="checkbox"  
                                                                                    checked="checked" value="13" id="category<?php echo $ckdt?>" 
                                                                                    name="category[]" onclick="deleteCategory('<?php echo $ckdt?>')" >
                                                                                    <label for="category13" style="color:#FEFFFF;"><?php echo $cvdt?></label>
                                                                                    <a class="icon-remove" onclick="deleteCategory('<?php echo $ckdt?>')"></a>
                                                                            </div>
                                                                            <?php } } ?>                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <div class="clr"></div>
                                                                </div>
                                                                <section class="t1 t1-t">
                                                                    <label for="label" class="blank">&nbsp;</label>
                                                                    <section class="tbut" style="margin-left:135px">
                                                                        <input type="submit" value="Update" id="button" name="button" 
                                                                               class="buttonGrey">
                                                                    </section>
                                                                    <section class="clr"></section>
                                                                </section>
                                                            </div>
                                                        </form>								  
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                        
                                        
                                    </div>

                                    <div class="profie-bl-rightm">
                                        <div class="profie-bl2">
                                            <div class="profie-bl2-inner">
                                                <h3>Please Enter Rates: <small>(Rates in <span class="div1"></span> )</h3>
                                                <div class="form-rates">
                                                    <div class="table-responsive for-msg">
                                                        <table class="table table-vcenter table-striped">
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
                                                                        <div id="save_incall_outcall_charge_error30_Min_container" style="display:none;" class="error_message notification alert-error spacer-t5"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_error30_Min"></span></div>
                                                                        <div id="save_incall_outcall_charge_success30_Min_container" style="display:none;" class="success_message notification alert-success spacer-t10"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_success30_Min"></span></div>		
                                                                    </div>
                                                                    <form method="post" accept-charset="utf-8" id="add_incall_outcall_price_to_escort30_Min">
                                                                    <input type="hidden" name="formtype" value="rateadd" />
                                                                    <input type="hidden" name="uid" value="<?php echo $user['Escort']['id']?>" />                                                                        
                                                                        <table>	
                                                                            <tr>
                                                                                <td style="width: 120px;">30 Min</td>
                                                                                
                                                                                <td>
                                                                                    <input type="text" name="30min_incall" id="30min_incall" maxlength="6" 
                                                                                           value="<?php echo $user['Rate']['30min_incall'] ?>" />
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name="30min_outcall" id="30min_outcall" maxlength="6" 
                                                                                           value="<?php echo $user['Rate']['30min_outcall'] ?>" />
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
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            
                                                                                                                       
                                                            
                                                            
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div class="smart-forms">
                                                                        <div id="save_incall_outcall_charge_error30_Min_container" style="display:none;" class="error_message notification alert-error spacer-t5"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_error30_Min"></span></div>
                                                                        <div id="save_incall_outcall_charge_success30_Min_container" style="display:none;" class="success_message notification alert-success spacer-t10"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_success30_Min"></span></div>		
                                                                    </div>
                                                                    <form method="post" accept-charset="utf-8" id="add_incall_outcall_price_to_escort30_Min">
                                                                    <input type="hidden" name="formtype" value="rateadd" />
                                                                    <input type="hidden" name="uid" value="<?php echo $user['Escort']['id']?>" />                                                                        
                                                                        <table>	
                                                                            <tr>
                                                                                <td style="width: 120px;">1 Hour</td>
                                                                                
                                                                                <td>
                                                                                    <input type="text" name="1hr_incall" id="1hr_incall" maxlength="6" 
                                                                                           value="<?php echo $user['Rate']['1hr_incall'] ?>" />
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name="1hr_outcall" id="1hr_outcall" maxlength="6" 
                                                                                           value="<?php echo $user['Rate']['1hr_outcall'] ?>" />
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
                                                                    </form>
                                                                </td>
                                                            </tr>                                                             
                                                            
                                                            
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div class="smart-forms">
                                                                        <div id="save_incall_outcall_charge_error30_Min_container" style="display:none;" class="error_message notification alert-error spacer-t5"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_error30_Min"></span></div>
                                                                        <div id="save_incall_outcall_charge_success30_Min_container" style="display:none;" class="success_message notification alert-success spacer-t10"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_success30_Min"></span></div>		
                                                                    </div>
                                                                    <form method="post" accept-charset="utf-8" id="add_incall_outcall_price_to_escort30_Min">
                                                                    <input type="hidden" name="formtype" value="rateadd" />
                                                                    <input type="hidden" name="uid" value="<?php echo $user['Escort']['id']?>" />                                                                        
                                                                        <table>	
                                                                            <tr>
                                                                                <td style="width: 120px;">2 Hour</td>
                                                                                
                                                                                <td>
                                                                                    <input type="text" name="2hr_incall" id="2hr_incall" maxlength="6" 
                                                                                           value="<?php echo $user['Rate']['2hr_incall'] ?>" />
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name="2hr_outcall" id="2hr_outcall" maxlength="6" 
                                                                                           value="<?php echo $user['Rate']['2hr_outcall'] ?>" />
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
                                                                    </form>
                                                                </td>
                                                            </tr>                                   
                                                            
                                                            
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div class="smart-forms">
                                                                        <div id="save_incall_outcall_charge_error30_Min_container" style="display:none;" class="error_message notification alert-error spacer-t5"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_error30_Min"></span></div>
                                                                        <div id="save_incall_outcall_charge_success30_Min_container" style="display:none;" class="success_message notification alert-success spacer-t10"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_success30_Min"></span></div>		
                                                                    </div>
                                                                    <form method="post" accept-charset="utf-8" id="add_incall_outcall_price_to_escort30_Min">
                                                                    <input type="hidden" name="formtype" value="rateadd" />
                                                                    <input type="hidden" name="uid" value="<?php echo $user['Escort']['id']?>" />                                                                        
                                                                        <table>	
                                                                            <tr>
                                                                                <td style="width: 120px;">3 Hour</td>
                                                                                
                                                                                <td>
                                                                                    <input type="text" name="3hr_incall" id="3hr_incall" maxlength="6" 
                                                                                           value="<?php echo $user['Rate']['3hr_incall'] ?>" />
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name="3hr_outcall" id="3hr_outcall" maxlength="6" 
                                                                                           value="<?php echo $user['Rate']['3hr_outcall'] ?>" />
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
                                                                    </form>
                                                                </td>
                                                            </tr>                                                             
                                                            
                                                            
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div class="smart-forms">
                                                                        <div id="save_incall_outcall_charge_error30_Min_container" style="display:none;" class="error_message notification alert-error spacer-t5"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_error30_Min"></span></div>
                                                                        <div id="save_incall_outcall_charge_success30_Min_container" style="display:none;" class="success_message notification alert-success spacer-t10"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_success30_Min"></span></div>		
                                                                    </div>
                                                                    <form method="post" accept-charset="utf-8" id="add_incall_outcall_price_to_escort30_Min">
                                                                    <input type="hidden" name="formtype" value="rateadd" />
                                                                    <input type="hidden" name="uid" value="<?php echo $user['Escort']['id']?>" />                                                                        
                                                                        <table>	
                                                                            <tr>
                                                                                <td style="width: 120px;">Additional Hours</td>
                                                                                
                                                                                <td>
                                                                                    <input type="text" name="addhr_incall" id="addhr_incall" maxlength="6" 
                                                                                           value="<?php echo $user['Rate']['addhr_incall'] ?>" />
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name="addhr_outcall" id="addhr_outcall" maxlength="6" 
                                                                                           value="<?php echo $user['Rate']['addhr_outcall'] ?>" />
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
                                                                    </form>
                                                                </td>
                                                            </tr>                                                             <tr>
                                                                <td colspan="4">
                                                                    <div class="smart-forms">
                                                                        <div id="save_incall_outcall_charge_error30_Min_container" style="display:none;" class="error_message notification alert-error spacer-t5"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_error30_Min"></span></div>
                                                                        <div id="save_incall_outcall_charge_success30_Min_container" style="display:none;" class="success_message notification alert-success spacer-t10"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_success30_Min"></span></div>		
                                                                    </div>
                                                                    <form method="post" accept-charset="utf-8" id="add_incall_outcall_price_to_escort30_Min">
                                                                    <input type="hidden" name="formtype" value="rateadd" />
                                                                    <input type="hidden" name="uid" value="<?php echo $user['Escort']['id']?>" />                                                                        
                                                                        <table>	
                                                                            <tr>
                                                                                <td style="width: 120px;">Overnight</td>
                                                                                
                                                                                <td>
                                                                                    <input type="text" name="night_incall" id="night_incall" maxlength="6" 
                                                                                           value="<?php echo $user['Rate']['night_incall'] ?>" />
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name="night_outcall" id="night_outcall" maxlength="6" 
                                                                                           value="<?php echo $user['Rate']['night_outcall'] ?>" />
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
                                                                    </form>
                                                                </td>
                                                            </tr>                                                             
                                                            
                                                            
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div class="smart-forms">
                                                                        <div id="save_incall_outcall_charge_error30_Min_container" style="display:none;" class="error_message notification alert-error spacer-t5"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_error30_Min"></span></div>
                                                                        <div id="save_incall_outcall_charge_success30_Min_container" style="display:none;" class="success_message notification alert-success spacer-t10"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_success30_Min"></span></div>		
                                                                    </div>
                                                                    <form method="post" accept-charset="utf-8" id="add_incall_outcall_price_to_escort30_Min">
                                                                    <input type="hidden" name="formtype" value="rateadd" />
                                                                    <input type="hidden" name="uid" value="<?php echo $user['Escort']['id']?>" />                                                                        
                                                                        <table>	
                                                                            <tr>
                                                                                <td style="width: 120px;">1 Day</td>
                                                                                
                                                                                <td>
                                                                                    <input type="text" name="1day_incall" id="1day_incall" maxlength="6" 
                                                                                           value="<?php echo $user['Rate']['1day_incall'] ?>" />
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name="1day_outcall" id="1day_outcall" maxlength="6" 
                                                                                           value="<?php echo $user['Rate']['1day_outcall'] ?>" />
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
                                                                    </form>
                                                                </td>
                                                            </tr>                                                             
                                                            
                                                            
                                                            
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div class="smart-forms">
                                                                        <div id="save_incall_outcall_charge_error30_Min_container" style="display:none;" class="error_message notification alert-error spacer-t5"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_error30_Min"></span></div>
                                                                        <div id="save_incall_outcall_charge_success30_Min_container" style="display:none;" class="success_message notification alert-success spacer-t10"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_success30_Min"></span></div>		
                                                                    </div>
                                                                    <form method="post" accept-charset="utf-8" id="add_incall_outcall_price_to_escort30_Min">
                                                                    <input type="hidden" name="formtype" value="rateadd" />
                                                                    <input type="hidden" name="uid" value="<?php echo $user['Escort']['id']?>" />                                                                        
                                                                        <table>	
                                                                            <tr>
                                                                                <td style="width: 120px;">2 Day</td>
                                                                                
                                                                                <td>
                                                                                    <input type="text" name="2day_incall" id="2day_incall" maxlength="6" 
                                                                                           value="<?php echo $user['Rate']['2day_incall'] ?>" />
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name="2day_outcall" id="2day_outcall" maxlength="6" 
                                                                                           value="<?php echo $user['Rate']['2day_outcall'] ?>" />
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
                                                                    </form>
                                                                </td>
                                                            </tr>                                                             
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div class="smart-forms">
                                                                        <div id="save_incall_outcall_charge_error30_Min_container" style="display:none;" class="error_message notification alert-error spacer-t5"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_error30_Min"></span></div>
                                                                        <div id="save_incall_outcall_charge_success30_Min_container" style="display:none;" class="success_message notification alert-success spacer-t10"><a class="close-btn" onClick="close_div();" href="javascript:;">�</a><span id="save_incall_outcall_charge_success30_Min"></span></div>		
                                                                    </div>
                                                                    <form method="post" accept-charset="utf-8" id="add_incall_outcall_price_to_escort30_Min">
                                                                    <input type="hidden" name="formtype" value="rateadd" />
                                                                    <input type="hidden" name="uid" value="<?php echo $user['Escort']['id']?>" />                                                                        
                                                                        <table>	
                                                                            <tr>
                                                                                <td style="width: 120px;">Weekend</td>
                                                                                
                                                                                <td>
                                                                                    <input type="text" name="weekend_incall" id="weekend_incall" maxlength="6" 
                                                                                           value="<?php echo $user['Rate']['weekend_incall'] ?>" />
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name="weekend_outcall" id="weekend_outcall" maxlength="6" 
                                                                                           value="<?php echo $user['Rate']['weekend_outcall'] ?>" />
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
                                                                    </form>
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
    <section id="banners">
        <a class="banner200x333 promo" href="#"> <span class="advertiseText">Advertise<br />
                Here</span> <span class="targetText">Get targeted traffic<br>
                to your website</span>
            <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
        </a>
        <a class="banner200x333 promo" href="#"> <span class="advertiseText">Advertise<br />
                Here</span> <span class="targetText">Get targeted traffic<br>
                to your website</span>
            <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
        </a>
        <a class="banner200x200 promo" href="#"> <span class="advertiseText">Advertise<br />
                Here</span> <span class="targetText">Get targeted traffic<br>
                to your website</span>
            <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
        </a>
        <a class="banner200x200 promo" href="#"> <span class="advertiseText">Advertise<br />
                Here</span> <span class="targetText">Get targeted traffic<br>
                to your website</span>
            <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
        </a>
        <a class="banner200x100 promo" href="#"> <span class="advertiseText">Advertise<br />
                Here</span> <span class="targetText">Get targeted traffic<br>
                to your website</span>
            <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
        </a>
        <a class="banner200x100 promo" href="#"> <span class="advertiseText">Advertise<br />
                Here</span> <span class="targetText">Get targeted traffic<br>
                to your website</span>
            <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
        </a>
    </section>
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