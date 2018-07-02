<?php 



?>                                                        
<section class="main_body">
    <div class="container">
            <div class="row">
                    <div class="col-md-3">
                            <?php echo $this->element('user_sidebar'); ?>
                    </div>
                    <div class="col-md-9 whit_bg">
                        <div class="right_dash_board">
                                <div class="search_box">
                                        <h2>SEARCH TASKS</h2>
                                        <form name="searchTask" method="post" action="">
                                        <div class="row">
                                                <div class="form-group col-md-4 pad_0">
                                                    <label for="Keywords">Search By Keywords</label>
                                                    <input type="text" class="form-control" name="Keywords" id="Keywords" placeholder="Keywords" value="<?php echo isset($Keywords)?$Keywords:'';?>">
                                                </div>
                                                <div class="form-group col-md-2 pad_0">
                                                    <label for="Price">Price Min</label>
                                                    <input type="number" class="form-control" name="Price_Min"  placeholder="Price MIN" value="<?php echo isset($Price_Min)?$Price_Min:'';?>" >
                                                </div>
                                                <div class="form-group col-md-2 pad_0">
                                                    <label for="Price">Price Max</label>
                                                    <input type="number" class="form-control" name="Price_Max"  placeholder="Price MAX" value="<?php echo isset($Price_Max)?$Price_Max:'';?>" >
                                                </div>
                                                
                                                <div class="form-group col-md-2 pad_0">
                                                    <label for="TaskStatus">Status</label>
                                                    <select name="TaskStatus" class="form-control" id="TaskStatus">
                                                        <option value="">Select Option</option>
                                                        <option value="O" <?php echo ($TaskStatus=='O')?'selected="selected"':'';?>>Open</option>
                                                        <option value="A" <?php echo ($TaskStatus=='A')?'selected="selected"':'';?>>Accepted</option>
                                                        <option value="C" <?php echo ($TaskStatus=='C')?'selected="selected"':'';?>>Complete</option>
                                                    </select>
                                                </div>
                                                <div style=" clear:both;"></div>

                                                <div class="form-group col-md-2 pad_0">
                                                    <label for="EndDate">End Date</label>
                                                    <input type="text" class="form-control" name="EndDate" id="EndDate" placeholder="2016-12-25" value="<?php echo isset($EndDate)?$EndDate:'';?>">
                                                </div>
                                                <div class="form-group col-md-2 pad_0">
                                                    <label for="EndDate">Category</label>
                                                    <select name="Category" class="form-control">
                                                      <option value="">Filter By Category</option>
                                                           <?php
                                                           foreach($categories_lists as $cat_list){
                                                           ?>
                                                           <optgroup label="<?php echo $cat_list['Category']['name']?>">
                                                           <?php
                                                           if(isset( $cat_list['Children']))
                                                           {
                                                           for($i=0;$i<count($cat_list['Children']);$i++) 
                                                           {
                                                           ?>
                                                           <option value="<?php echo $cat_list['Children'][$i]['id']?>" <?php if(isset($Category) and $Category==$cat_list['Children'][$i]['id']){echo 'selected';}?>   ><?php echo $cat_list['Children'][$i]['name']?></option> 
                                                           <?php } ?>
                                                           <?php } ?>
                                                           </optgroup> 
                                                           <?php }?> 
                                                       </select>
                                                </div>
                                                <div class="form-group col-md-2 pad_0">
                                                    <label for="Location">Location</label>
                                                    <input type="text" class="form-control" name="task_location" value="<?php echo isset($task_location)?$task_location:'';?>" id="task_location" style="width:270px;">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    &nbsp;
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <button type="submit">SEARCH</button>
                                                </div>
                                        </div>
                                        </form>
                                </div>
                                <div class="result_task">
                                        <h2><b><?php echo count($TaskList);?></b> Result found</h2>
                                        <ul class="nav nav-tabs navbar-right" role="tablist">
                                            <li role="presentation" class="active"><a href="#List" aria-controls="List" role="tab" data-toggle="tab"><i class="fa fa-list-ul"></i></a></li>
                                            <li role="presentation"><a href="#Map" aria-controls="Posted" role="tab" data-toggle="tab"><i class="fa fa-map-marker"></i></a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="List">
                                        <div class="task_lists">
                                                <ul class="media-list">
                                                <?php 
                                                if(count($TaskList)>0){
                                                    foreach($TaskList as $val){
                                                ?>
                                                   <li class="media">
                                                    <div class="media-left">
                                                      <a href="<?php echo $this->webroot?>tasks/detail/<?php echo base64_encode($val['Task']['id']);?>">
                                                        <?php 
                                                          $UserProfile_img=isset($val['User']['profile_img'])?$val['User']['profile_img']:'';
											   $uploadImgPath = WWW_ROOT.'user_images';
											   if($UserProfile_img!='' && file_exists($uploadImgPath . '/' . $UserProfile_img)){
												  echo '<img src="'.$this->webroot.'user_images/'.$UserProfile_img.'" alt="" />';
											   }else{
												  echo '<img src="'.$this->webroot.'user_images/default.png" alt="" />';
											   }
                                                        ?>
                                                      </a>
                                                    </div>
                                                    <div class="media-body">
                                                       <a href="<?php echo $this->webroot?>tasks/detail/<?php echo base64_encode($val['Task']['id']);?>"><h4 class="media-heading"><?php echo $val['Task']['title'];?></h4></a>
                                                      <p><?php
                                                        if (strlen(strip_tags($val['Task']['description']))>180) {
                                                            echo substr(strip_tags($val['Task']['description']), 0,180).'...';
                                                        } else {
                                                            echo strip_tags($val['Task']['description']);

                                                        } 
                                                        ?></p>
                                                      <p>3 Comments | 1 offer | <i class="fa fa-eye"></i> <?php echo ($val['Task']['completed']==1)?'Online':'Offline';?></p>
                                                    </div>
                                                    <div class="media-right">
                                                        <button>Earn $<?php echo $val['Task']['total_rate'];?></button>
                                                    </div>
                                                  </li> 
                                                    
                                                <?php 
                                                    }
                                                }else{
                                                    echo '<li class="media"><p>No Task found.</p></li> ';
                                                }
                                                ?>
                                                </ul>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="Map">
                                        <div class="map">
                                                <img src="<?php echo $this->webroot;?>images/map.png" alt="" class="img-responsive" />
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
            </div>
    </div>
</section>

<script type="text/javascript">
    
    function initialize2() {
        var defaultBounds = new google.maps.LatLngBounds(
        new google.maps.LatLng(7.623887, 68.994141),
        new google.maps.LatLng(37.020098, 97.470703));

        var input1 = document.getElementById('task_location');
        var options = {
            bounds: defaultBounds,
            types: ['geocode'],
        };
        autocomplete1 = new google.maps.places.Autocomplete(input1, options);
    }
    
</script>

<script type="text/javascript">
    $(document).ready(function(){       
        $('#EndDate').datepicker({dateFormat: 'yy-mm-dd'});
        initialize2();
        
        
    });
</script>

