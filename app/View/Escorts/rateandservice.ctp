
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
	
	
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('escort_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1 d-flex justify-content-between align-items-center">
						<h2 class="font-weight-normal">Rates and Services</h2>
						<select class="form-control width120 text-white" name="site_currency" onchange="getvalue(this.value)" style="float: right; width: auto;">
                                                <option selected="selected" value="AUD" >NZ </option>
						</select>
					</div>
					<div class="row mt-3">
						<div class="col-lg-12">
							<div class="newServices p-4">
								<h4 class="mb-4">Add New Services</h4>
                                                                
                                                                <form method="post" accept-charset="utf-8" class="ajaxform" id="form-ui4">
                                                                    <input type="hidden" name="formtype" value="service" />
                                                            <input type="hidden" name="uid" value="<?php echo $user['Escort']['id']?>" />
                                                            <input type="hidden" value="services_form" name="yes">
                                                                
								<div class="form-group row">
								<label class="col-lg-12">Select Services:</label>
								<div class="col-lg-12">
								<select class="form-control selectField"  id="selectServ sel1" onchange="add_services(this)">
							    <option>Select Services</option>
							    <?php foreach( $serv as $sk => $sv ){ ?>
                                                                            
                                                                            <?php if(array_key_exists($sk , $myServList)){ ?>
                                                                                <option id="rm_<?php echo $sk;?>" style="display: none" 
                                                                                        value="<?php echo $sk;?>"><?php echo $sv;?></option>
                                                                            <?php } else { ?>
                                                                            <option id="rm_<?php echo $sk;?>" value="<?php echo $sk;?>"><?php echo $sv;?></option>
                                                                            <?php } ?>
                                                                        <?php } ?>
							  </select></div>
							</div>
                                                            
                                                            
                                                            
                                                            
<!--							    <div class="servicesList">
								<ul class="pl-0">
                                                                    
                                                                    <?php if(!empty($myServList)){ foreach($myServList as $skdt => $svdt){ ?>
									<li><a onclick="deleteService('<?php echo $skdt?>')"><?php echo $svdt?> <i class="fa fa-window-close ml-2 color-black"></i></a></li>
                                                                    <?php } } ?>
									
									<div class="clearfix"></div>
								</ul>
							</div>-->


                                                            
                                                            
                                                            
                                                            

                                                        <div  class="form-profile-block">
                                                                    <div id="servicediv"  >
                                                                        <div class="option-group field" id="serviceInput">
                                                                            
                                                                            <?php if(!empty($myServList)){ foreach($myServList as $skdt => $svdt){ ?>
                                                                            <div class="fleft city-title" id="service-li-id_<?php echo $skdt?>">
            <input style="opacity:0; position:absolute;" type="checkbox" checked="checked" value="10" id="service<?php echo $skdt?>"  name="services[]" onclick="deleteService('<?php echo $skdt?>')" >
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


							    <div class="mt-2 mb-4">
                                                                <button type="submit" class="btn btn-primary">Update</button>
							</div>
                                                                </form>
							</div>
							
						</div>
						<div class="col-lg-12">
							<div class="newServices p-4">
								<h4 class="mb-4">Please Enter Rates<small class="font-12 ml-3">(Rates is EUR)</small></h4>
                                                                
								<table class="table tablePartss">
									<tr>
										<th>Rates</th>
										<th>Incall</th>
										<th>Outcall</th>
										<th>Actions</th>
									</tr>
                                                                        
                                                                         
									<tr>
                                                                       <form method="post" accept-charset="utf-8" id="add_incall_outcall_price_to_escort30_Min">     
                                                                    <input type="hidden" name="formtype" value="rateadd" />
                                                                    <input type="hidden" name="uid" value="<?php echo $user['Escort']['id']?>" />
                                                                            
										<td>30 min</td>
                                                                                <td class="incall"><input type="text" name="30min_incall" id="30min_incall" class="form-control" maxlength="6" value="<?php echo $user['Rate']['30min_incall'] ?>" /></td>
										<td class="incall" ><input type="text" name="30min_outcall" id="30min_outcall" class="form-control" maxlength="6" value="<?php echo $user['Rate']['30min_outcall'] ?>" /></td>
										<td>
                                                                                    
                                                                                    <div class="config-group">
                                                                                        <div class="group">
                                                                                            <div class="button-box autoplay column-2">
                                                                                                <input type="hidden" id="currency_name_1" name="curency" value="AUD"/> 
                                                                                                <button type="submit" class="btn btn-primary" name="submit">Update</button>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                    
                                                                                    </td>
                                                                            </form>        
									</tr>
                                                                        
									
									<tr>
                                                                        <form method="post" accept-charset="utf-8" id="add_incall_outcall_price_to_escort30_Min">     
                                                                    <input type="hidden" name="formtype" value="rateadd" />
                                                                    <input type="hidden" name="uid" value="<?php echo $user['Escort']['id']?>" />
                                                                            
										<td>1 Hour</td>
                                                                                <td class="incall"><input type="text" name="1hr_incall" id="30min_incall" class="form-control" maxlength="6" value="<?php echo $user['Rate']['1hr_incall'] ?>" /></td>
										<td class="incall" ><input type="text" name="1hr_outcall" id="30min_outcall" class="form-control" maxlength="6" value="<?php echo $user['Rate']['1hr_outcall'] ?>" /></td>
										<td>
                                                                                    
                                                                                    <div class="config-group">
                                                                                        <div class="group">
                                                                                            <div class="button-box autoplay column-2">
                                                                                                <input type="hidden" id="currency_name_1" name="curency" value="AUD"/> 
                                                                                                <button type="submit" class="btn btn-primary" name="submit">Update</button>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                    
                                                                                    </td>
                                                                           </form>         
									</tr>
                                                                        
									
									<tr>
                                                                      <form method="post" accept-charset="utf-8" id="add_incall_outcall_price_to_escort30_Min">       
                                                                    <input type="hidden" name="formtype" value="rateadd" />
                                                                    <input type="hidden" name="uid" value="<?php echo $user['Escort']['id']?>" />
                                                                            
										<td>2 Hour</td>
                                                                                <td class="incall"><input type="text" name="2hr_incall" id="30min_incall" class="form-control" maxlength="6" value="<?php echo $user['Rate']['2hr_incall'] ?>" /></td>
										<td class="incall" ><input type="text" name="2hr_outcall" id="30min_outcall" class="form-control" maxlength="6" value="<?php echo $user['Rate']['2hr_outcall'] ?>" /></td>
										<td>
                                                                                    
                                                                                    <div class="config-group">
                                                                                        <div class="group">
                                                                                            <div class="button-box autoplay column-2">
                                                                                                <input type="hidden" id="currency_name_1" name="curency" value="AUD"/> 
                                                                                                <button type="submit" class="btn btn-primary" name="submit">Update</button>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                    
                                                                                    </td>
                                                                             </form>       
									</tr>
                                                                        
									 
									<tr>
                                                                      <form method="post" accept-charset="utf-8" id="add_incall_outcall_price_to_escort30_Min">      
                                                                    <input type="hidden" name="formtype" value="rateadd" />
                                                                    <input type="hidden" name="uid" value="<?php echo $user['Escort']['id']?>" />
                                                                            
										<td>3 Hour</td>
                                                                                <td class="incall"><input type="text" name="3hr_incall" id="30min_incall" class="form-control" maxlength="6" value="<?php echo $user['Rate']['3hr_incall'] ?>" /></td>
										<td class="incall" ><input type="text" name="3hr_outcall" id="30min_outcall" class="form-control" maxlength="6" value="<?php echo $user['Rate']['3hr_outcall'] ?>" /></td>
										<td>
                                                                                    
                                                                                    <div class="config-group">
                                                                                        <div class="group">
                                                                                            <div class="button-box autoplay column-2">
                                                                                                <input type="hidden" id="currency_name_1" name="curency" value="AUD"/> 
                                                                                                <button type="submit" class="btn btn-primary" name="submit">Update</button>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                    
                                                                                    </td>
                                                                          </form>          
									</tr>
                                                                        
                                                                        
									
									<tr>
                                                                      <form method="post" accept-charset="utf-8" id="add_incall_outcall_price_to_escort30_Min">       
                                                                    <input type="hidden" name="formtype" value="rateadd" />
                                                                    <input type="hidden" name="uid" value="<?php echo $user['Escort']['id']?>" />
                                                                            
										<td>Additional Hour</td>
                                                                                <td class="incall"><input type="text" name="addhr_incall" id="30min_incall" class="form-control" maxlength="6" value="<?php echo $user['Rate']['addhr_incall'] ?>" /></td>
										<td class="incall" ><input type="text" name="addhr_outcall" id="30min_outcall" class="form-control" maxlength="6" value="<?php echo $user['Rate']['addhr_outcall'] ?>" /></td>
										<td>
                                                                                    
                                                                                    <div class="config-group">
                                                                                        <div class="group">
                                                                                            <div class="button-box autoplay column-2">
                                                                                                <input type="hidden" id="currency_name_1" name="curency" value="AUD"/> 
                                                                                                <button type="submit" class="btn btn-primary" name="submit">Update</button>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                    
                                                                                    </td>
                                                                         </form>           
									</tr>
                                                                        
                                                                        
									 
									<tr>
                                                                        <form method="post" accept-charset="utf-8" id="add_incall_outcall_price_to_escort30_Min">    
                                                                    <input type="hidden" name="formtype" value="rateadd" />
                                                                    <input type="hidden" name="uid" value="<?php echo $user['Escort']['id']?>" />
                                                                            
										<td>Overnight</td>
                                                                                <td class="incall"><input type="text" name="night_incall" id="30min_incall" class="form-control" maxlength="6" value="<?php echo $user['Rate']['night_incall'] ?>" /></td>
										<td class="incall" ><input type="text" name="night_outcall" id="30min_outcall" class="form-control" maxlength="6" value="<?php echo $user['Rate']['night_outcall'] ?>" /></td>
										<td>
                                                                                    
                                                                                    <div class="config-group">
                                                                                        <div class="group">
                                                                                            <div class="button-box autoplay column-2">
                                                                                                <input type="hidden" id="currency_name_1" name="curency" value="AUD"/> 
                                                                                                <button type="submit" class="btn btn-primary" name="submit">Update</button>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                    
                                                                                    </td>
                                                                          </form>          
									</tr>
                                                                        
									<tr>
                                                                        <form method="post" accept-charset="utf-8" id="add_incall_outcall_price_to_escort30_Min">    
                                                                    <input type="hidden" name="formtype" value="rateadd" />
                                                                    <input type="hidden" name="uid" value="<?php echo $user['Escort']['id']?>" />
                                                                            
										<td>1 Day</td>
                                                                                <td class="incall"><input type="text" name="1day_incall" id="30min_incall" class="form-control" maxlength="6" value="<?php echo $user['Rate']['1day_incall'] ?>" /></td>
										<td class="incall" ><input type="text" name="1day_outcall" id="30min_outcall" class="form-control" maxlength="6" value="<?php echo $user['Rate']['1day_outcall'] ?>" /></td>
										<td>
                                                                                    
                                                                                    <div class="config-group">
                                                                                        <div class="group">
                                                                                            <div class="button-box autoplay column-2">
                                                                                                <input type="hidden" id="currency_name_1" name="curency" value="AUD"/> 
                                                                                                <button type="submit" class="btn btn-primary" name="submit">Update</button>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                    
                                                                                    </td>
                                                                          </form>          
									</tr>
									<tr>
                                                                        <form method="post" accept-charset="utf-8" id="add_incall_outcall_price_to_escort30_Min">    
                                                                    <input type="hidden" name="formtype" value="rateadd" />
                                                                    <input type="hidden" name="uid" value="<?php echo $user['Escort']['id']?>" />
                                                                            
										<td>2 Day</td>
                                                                                <td class="incall"><input type="text" name="2day_incall" id="30min_incall" class="form-control" maxlength="6" value="<?php echo $user['Rate']['2day_incall'] ?>" /></td>
										<td class="incall" ><input type="text" name="2day_outcall" id="30min_outcall" class="form-control" maxlength="6" value="<?php echo $user['Rate']['2day_outcall'] ?>" /></td>
										<td>
                                                                                    
                                                                                    <div class="config-group">
                                                                                        <div class="group">
                                                                                            <div class="button-box autoplay column-2">
                                                                                                <input type="hidden" id="currency_name_1" name="curency" value="AUD"/> 
                                                                                                <button type="submit" class="btn btn-primary" name="submit">Update</button>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                    
                                                                                    </td>
                                                                          </form>          
									</tr>
									<tr>
                                                                        <form method="post" accept-charset="utf-8" id="add_incall_outcall_price_to_escort30_Min">    
                                                                    <input type="hidden" name="formtype" value="rateadd" />
                                                                    <input type="hidden" name="uid" value="<?php echo $user['Escort']['id']?>" />
                                                                            
										<td>Weekend</td>
                                                                                <td class="incall"><input type="text" name="weekend_incall" id="30min_incall" class="form-control" maxlength="6" value="<?php echo $user['Rate']['weekend_incall'] ?>" /></td>
										<td class="incall" ><input type="text" name="weekend_outcall" id="30min_outcall" class="form-control" maxlength="6" value="<?php echo $user['Rate']['weekend_outcall'] ?>" /></td>
										<td>
                                                                                    
                                                                                    <div class="config-group">
                                                                                        <div class="group">
                                                                                            <div class="button-box autoplay column-2">
                                                                                                <input type="hidden" id="currency_name_1" name="curency" value="AUD"/> 
                                                                                                <button type="submit" class="btn btn-primary" name="submit">Update</button>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                    
                                                                                    </td>
                                                                          </form>          
									</tr>
								</table>
                                                                
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
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

