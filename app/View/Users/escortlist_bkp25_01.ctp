	
<section class="middleBanner">
	<div class="container">
		<div class="row">
		<div class="col-lg-6">
			<div id="myCarousel" class="carousel slide bg-inverse w-100" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner carouselPart" role="listbox">
    <div class="carousel-item active">
        <div class="row">
        	<div class="col-lg-6">
        		<div class="roundedImage">
        			<img class="d-block w-100" src="<?php echo  $this->Html->url('/') ?>images/escort2.jpg">
        		</div>
        	</div>
        	<div class="col-lg-6">
        		<div class="carousel-caption">
          			<h3><span class="welcome script-font d-block">Welcome</span> Escort Directory</h3>
          			<p class="text-right book mb-0">Book</p>
          			<p class="text-right mb-0">Your <span>Dream Escort</span> today</p>
          			<p class="script-font">Sed ut perspiciatis unde omnis iste natus error si</p>
        		</div>
        	</div>
        </div>
    </div>

  </div>
  
</div>
		</div>
		<div class="col-lg-6">
			<div class="searchFilters">
				<h2>Search Filter</h2>
				<?php $base_url = array('controller' => 'users', 'action' => 'escortlist');?>
         <?php echo $this->Form->create("Filter",array('method'=>'post','url'=>$base_url,"id"=>'SearchForm'));?>
         <?php //echo $this->Form->input("name", array('id'=>'escort_name','type'=>'hidden','div'=>false));?>
					<div class="form-group row">
						<div class="col-lg-6">

                                                    <?php echo $this->Form->input("country_id", array('options'=>$showcountry,'class'=>'form-control selectField','id'=>'sel1','label' => false));?>
    					</div>
    					<div class="col-lg-6">
      						<?php echo $this->Form->input("city_id", array('options'=>$locationsarray,'empty'=>'Select Location','class'=>'form-control selectField','id'=>'sel1','label' => false));?>
    					</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
      						  <?php echo $this->Form->input("availability_id", array('options'=>$availabilities,'empty'=>'Availability','class'=>'form-control selectField','id'=>'sel1','label' => false));?>
    					</div>
    					<div class="col-lg-6">
      						<?php echo $this->Form->input("nationality_id", array('options'=>$nationalities,'empty'=>'Ethnicity','class'=>'form-control selectField','id'=>'sel1','label' => false));?> 
    					</div>
					</div>
                                
                                
                                        <div class="form-group row">
						<div class="col-lg-6">
      						  <?php echo $this->Form->input("age", array('options'=>$agearr,'empty'=>'Select Age','class'=>'form-control selectField','id'=>'sel1','label' => false));?>
    					</div>
    					<div class="col-lg-6">
      						<?php echo $this->Form->input("gender", array('options'=>$genders,'empty'=>'Gender','class'=>'form-control selectField','id'=>'sel1','label' => false));?> 
    					</div>
					</div>
                                
                                        <div class="form-group row">
						<div class="col-lg-6">
      						  <?php echo $this->Form->input("verifieds", array('options'=>$verifieds,'empty'=>'Verified','class'=>'form-control selectField','id'=>'sel1','label' => false));?> 
    					</div>
    					<div class="col-lg-6">
      						<?php echo $this->Form->input("service_id", array('options'=>$services,'empty'=>'Service','class'=>'form-control selectField','id'=>'sel1','label' => false));?>
    					</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
      						  <?php echo $this->Form->input("is_show_face", array('options'=>$showing_face,'empty'=>'Showing Face','class'=>'form-control selectField','id'=>'sel1','label' => false));?>
    					</div>
    					<div class="col-lg-6">
      						<?php echo $this->Form->input("height", array('options'=>$heights,'empty'=>'Height','class'=>'form-control selectField','id'=>'sel1','label' => false));?>
    					</div>
					</div>
					
                                
                                        <div class="form-group row">
						<div class="col-lg-6">
      						  <?php echo $this->Form->input("haircolor_id", array('options'=>$haircolors,"empty"=>"Hair Color",'class'=>'form-control selectField','id'=>'sel1','label' => false));?> 
    					</div>
    					<div class="col-lg-6">
      						<?php echo $this->Form->input("cup_size", array('options'=>$cups,'empty'=>'Size','class'=>'form-control selectField','id'=>'sel1','label' => false));?> 
    					</div>
					</div>
                                        <div class="form-group row">
						<div class="col-lg-6">
      						  <?php echo $this->Form->input("bust_size", array('options'=>$busts,'empty'=>'Bust','class'=>'form-control selectField','id'=>'sel1','label' => false));?>
    					</div>
<!--    					<div class="col-lg-6">
      						<div class="range-example-2"></div>
					         <div class="rangePart mt-3 mb-3">18-50</div> 
    					</div>-->
                                            
					</div>
					
					<button type="submit" class="btn btn-primary btn-block btnPart">Search</button>
                                        <button type="button" class="btn btn-primary btn-block btnPart" onclick="location.href='<?php echo $this->webroot;?>users/escortlist/<?php echo $type;?>'">Clear</button>
				<?php echo $this->Form->end();?>
			</div>
		</div>
	</div>
	</div>
</section>
<section class="mt-4">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="contLeftPart p-3 mb-3">
					<div class="row">
						<div class="col-lg-8">
							<h2>Escorts in <span class="d-block">New zealand</span></h2>
							<div class="girlCount p-2">
								<?php echo $total_escort;?> Girls
							</div>
						</div>
						<div class="col-lg-4">
							<img src="<?php echo  $this->Html->url('/') ?>images/10-2-new-zealand-flag-png-hd.png" class="img-fluid">
						</div>
					</div>
					<div class="cityHeading mt-2 p-2">Category:</div>
					<ul class="list-unstyled cityListing">
                                            
                                            
                                            
                                            <?php
                if(!empty($category)) {
                    foreach($category as $cat){
                ?>
              
						<li class="d-flex justify-content-between">
							<div class="cityname">
                                                            <a class="cityname" href="<?php echo $this->Html->url('/');?>users/escortlist/<?php echo $type;?>/<?php echo base64_encode($cat['Category']['id']);?>"><?php echo $cat['Category']['name'];?></a>
							</div>
							<div class="citycount">
								<?php echo $cat['Category']['count']?>
							</div>
						</li>
                                                <?php }} ?>

					</ul>
				</div>
				
				<div class="contLeftPart p-3">
					<div class="cityHeading mt-2 p-2">Emotional Aspects Related to Escorting</div>
					<div class="escortFood mt-4 mb-4 text-center">
						<img src="<?php echo  $this->Html->url('/') ?>images/food.jpg">
					</div>
					<p class="text-left color-white mb-0">14-07-2018</p>
					<p class="color-white mt-2 mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architect</p>			
					
				</div>
				<div class="cityHeading p-2">All Escort Lessions</div>
			</div>
			<div class="col-lg-6 ">
				<div class="middlePart">
					<div class="directoryEscortHeading d-flex justify-content-between p-2 mb-4">
					<h2 class="mb-0">The Directory Escorts</h2>
					<div class="button">
						<button type="button" class="btn btn-default">View All</button>
					</div>
				</div>
					<div class="row">
                                            
                                            
                                        <?php 
                                        if(!empty($list)){  
                                           foreach ($list as $showescortsdata) { ?>    
                                            
					<div class="col-lg-4 mb-2">
						<div class="bg-gray p-1 middleImage">
                                                    <?php if($showescortsdata['User']['profile_image'] != ''){ ?>
							<div class="middleImagePart" style="background:url('<?php echo  $this->webroot; ?>user_images/<?php echo $showescortsdata['User']['profile_image'];?>') no-repeat;" onclick="redirect_detaiils('<?php echo base64_encode($showescortsdata['User']['id']);?>');">
                                                    <?php }else{ ?>
                                                     <div class="middleImagePart" style="background:url('<?php echo  $this->webroot; ?>noimage.png') no-repeat;" onclick="redirect_detaiils('<?php echo base64_encode($showescortsdata['User']['id']);?>');">       
                                                            
                                                    <?php } ?>
                                                            <ul class="middleList">
								   <li>
								   	   <span class="icon"><img src="<?php echo  $this->Html->url('/') ?>images/icon1.png"></span>
								   </li>
								   <li>
								   	<span class="icon"><img src="<?php echo  $this->Html->url('/') ?>images/icon2.png"></span>
								   </li>
								   <li>
								   		<span class="icon"><img src="<?php echo  $this->Html->url('/') ?>images/icon3.png"></span>
								   </li>
								   <li>
								   		<span class="icon"><img src="<?php echo  $this->Html->url('/') ?>images/icon4.png"></span>
								   </li>
							    </ul>
							</div>
							<div class="d-flex justify-content-between girlName mt-2 mb-2">
								<h2 class="text-uppercase"><!--Patty--><?php echo $showescortsdata['User']['name']; ?></h2>
								<div class="flag"><img src="<?php echo  $this->Html->url('/') ?>images/flag.jpg"></div>
							</div>
							<div class="d-flex justify-content-between girlAge mt-2 mb-2">
                                                            <?php  
                                                    $date =  date('Y',strtotime($showescortsdata['User']['birthday']));
                                                    $age=date('Y')-$date;
                                                    ?>
								<p class="mb-0">Age: <?php echo $age; ?>years</p>
								<p class="mb-0">Oxford</p>
							</div>
							<div class="d-flex justify-content-between bottomRate mt-2 mb-2">
								<p class="mb-0">Rates from <?php if(!empty($showescortsdata['Rate'][0]['30min_incall'])){echo '&#128;'.$showescortsdata['Rate'][0]['30min_incall'];}else{echo 'No rate';} ?></p>
								<p class="mb-0"><i class="fa fa-thumbs-up" aria-hidden="true"></i>
</p>
							</div>
                                                            <span class="t2<?php echo $showescortsdata['User']['id'];?>" style="display:none;">
                                                            <?php 
                                                                if($this->Session->read('fuid')){
                                                            ?>    
                                                                <a href="javascript:void(0);" onclick="add_to_fav('<?php echo $showescortsdata['User']['id'];?>', '<?php echo $this->Session->read('fuid')?>')">
                                                            <?php }else{ ?>
                                                                    <a href="javascript:void(0);" class="pull-right" onclick="javascript:alert('Please Login to Add to Favorite!!');
                                                                            return false;">
                                                            <?php }?>    
                                                                        <img src="<?php echo  $this->Html->url('/') ?>images/thumbs_up.png" alt="" style="vertical-align:text-bottom;" title="4 Votes"  /></a>
                                                            </span>
						</div>
					</div>
                                            
                                            
                                        <?php } }else{
                                  echo '<h2 style="color:#fff">No results found</h2>';  

                                } ?> ?>   
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            

				</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="advertisePart mb-2">
					<img src="<?php echo  $this->Html->url('/') ?>images/bannerImage.jpg" class="img-fluid">
				</div>
				<div class="advertisePart mb-2">
					<img src="<?php echo  $this->Html->url('/') ?>images/bannerImage.jpg" class="img-fluid">
				</div>
				<div class="advertisePart mb-2">
					<img src="<?php echo  $this->Html->url('/') ?>images/bannerImage.jpg" class="img-fluid">
				</div>
				<div class="advertisePart mb-2">
					<img src="<?php echo  $this->Html->url('/') ?>images/bannerImage.jpg" class="img-fluid">
				</div>
				<div class="advertisePart mb-2">
					<img src="<?php echo  $this->Html->url('/') ?>images/bannerImage.jpg" class="img-fluid">
				</div>
				<div class="advertisePart mb-2">
					<img src="<?php echo  $this->Html->url('/') ?>images/bannerImage.jpg" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
</section>
<script>
$(document).ready(function(){
$("#user_name").keyup(function(){
$("#search_name").attr("value",$(this).val());
ajaxSearch();
});    
});    
function ajaxSearch()
{
    $.post("<?php echo $this->Html->url('/'); ?>users/ajax_search", $("#SearchCheck, #SearchForm").serialize(), function(msg){
    $("#display_result").html(msg);
    var offset=$("#offset").val();
    offset=offset+4;
    $("#offset").attr("value",offset);
    $("#page_counter").hide();
    $("#pagination").hide();
    
    });

}




</script>
<script>
function redirect_detaiils(id)
{
    location.href='<?php echo $this->Html->url('/');?>escort-details/'+id;
}    
</script>    
<style>
 .checkbox_search ul li {
    padding: 0 4px;
}
.escort-of-day ul, .escort-of-day h3 {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
}
.escort-of-day ul li {
    border: 0 none;
}
.escort-of-day h3 {
    line-height: 20px;
    padding-left: 0;
}   
</style>
    