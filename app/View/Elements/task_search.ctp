<?php ?>
<div class="col-md-4">
 					<div class="left_search_sec">
 						<div class="search_box">
 							<h2>SEARCH TASKS</h2>
 							<form action="<?php echo $this->webroot?>tasks" method="post" name="formsearch" id="formsearch" >
 							<div class="row">
 								<div class="form-group col-md-12">
								    <label for="exampleInputEmail1">Search By Keywords</label>
								    <input type="text" name="Keywords" id="Keywords" placeholder="Keywords" value="<?php echo isset($Keywords)?$Keywords:'';?>" class="form-control">
								</div>
								<div class="form-group col-md-12">
								    <label for="exampleInputPassword1">Status</label>
								    <select name="TaskStatus" class="form-control" id="TaskStatus">
                                                        <option value="">Select Option</option>
                                                        <option value="O" <?php echo ($TaskStatus=='O')?'selected="selected"':'';?>>Open</option>
                                                        <option value="A" <?php echo ($TaskStatus=='A')?'selected="selected"':'';?>>Accepted</option>
                                                        <option value="C" <?php echo ($TaskStatus=='C')?'selected="selected"':'';?>>Complete</option>
                                                    </select>
								</div>
								<div class="form-group col-md-12">
								    <label for="exampleInputPassword1">End Date</label>
								    <input type="text" class="form-control" name="EndDate" id="EndDate" placeholder="2016-12-25" value="<?php echo isset($EndDate)?$EndDate:'';?>">
								</div>
                                                                <div class="form-group col-md-12">
								    <label for="exampleInputPassword1">Category</label>
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
								<div class="form-group col-md-12">
								    <label for="exampleInputPassword1">Location</label>
								    <input type="text" class="form-control" name="task_location" id="task_location"  value="<?php echo isset($task_location)?$task_location:'';?>">
								</div>
								<div class="form-group col-md-12">
								    <label for="exampleInputPassword1">By price range</label>
								    <div class="form-inline " >
								    		<div class="input-group">
										 <div class="input-group-addon">$</div>
										 <input type="number" min="0" value="<?php echo isset($MinPrice)?$MinPrice:0;?>" name="MinPrice" id="MinPrice" class="form-control col-sm-6" style="width:45%;margin-right:20px;" />
									     </div> 
									     
									     <div class="input-group">
										 <div class="input-group-addon">$</div>
										 <input type="number" min="0" value="<?php echo isset($MaxPrice)?$MaxPrice:0;?>" name="MaxPrice" id="MaxPrice" class="form-control col-sm-6" style="width:45%;margin-right:20px;" />
									     </div> 
								    
								   
								    </div>
								</div>
								
								<div class="form-group col-md-12">
								   <button type="submit" name="search" value="search" >SEARCH</button>
								</div>
 							</div>
							</form>
 						</div>
 					</div>
 				</div>


