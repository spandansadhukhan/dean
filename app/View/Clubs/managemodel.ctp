
	
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('club_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<h2 class="font-weight-normal">Manage Models</h2>
					</div>
					<ul class="nav nav-tabs mt-4 tabParts">
					  <li class="active"><a data-toggle="tab" href="#home">Manage Models</a></li>
					  <li ><a data-toggle="tab" href="#menu1">Add Models</a></li>
					</ul>
					<div class="tab-content">
					  <div id="home" class="tab-pane in active">

                                              
                                              <table class="table table-vcenter table-striped">
                            <thead>
	                            <th>Sl No.</th>	
	                            <th>Image</th>
	                            <th>Name</th>
	                            <th>Email</th>
	                            <th>Age</th>
	                            <th>Gender</th>
	                            <th>Eye Color</th>
	                            <th>Hair Color</th>
	                            <th class="text-center">Option</th>
                            </thead>
                                <tbody>
                                	<?php 
                                		$count = 1;
                                		
                                		if(!empty($membershipall)){
                                	foreach ($membershipall as $showmodel) { ?>
                                		<tr>
                                			<td><?php echo $count;?></td>
                                			<td><?php if($showmodel['User']['profile_image'] != ''){?> <img src="<?php echo $this->webroot?>user_images/<?php echo $showmodel['User']['profile_image']?>" height="50px" width="50px"/><?php }else{ ?>
                                			<img src="<?php echo $this->webroot?>noimage.png" height="50px" width="50px"/>	

                                			<?php } ?></td>
                                			<td><?php echo $showmodel['User']['name']; ?></td>
                                			<td><?php echo $showmodel['User']['email']; ?></td>
                                			<td><?php 
                                						$age = date('Y-m-d') - $showmodel['User']['birthday']; 

                                						echo $age;
                                		         ?></td>
                                			<td><?php echo $showmodel['User']['gender']; ?></td>
                                			<td><?php echo $showmodel['Eyecolor']['color_name']; ?></td>
                                			<td><?php echo $showmodel['Haircolor']['color_name']; ?></td>
                                			<td>
                                                            <div style="width:208px; text-align:center;">
                                                                <a href="<?php echo $this->webroot?>escort-details/<?php echo base64_encode($showmodel['User']['id']); ?>" class="btn btn-primary" target="_blank">View</a>
                                                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'deletemodel', $showmodel['User']['id']),array("class"=>"btn btn-danger"), __('Are you sure you want to Delete?')); ?>
                                                            </div>
                                                            
                        </td>
                                		</tr>
                                				
                                	<?php		
                                			$count++;
                                		}
                                	}else{
                                	?>
                                		<tr style=""><td colspan="9"><section class="no-record"> You have not added any model.</section></td></tr>
                                	<?php	
                                	}
                                	?>
                                	
                                </tbody>
                                
                            </table>
                                              
                                              
                                              
					  </div>
					  <div id="menu1" class="tab-pane ">
                                             
					  	<div class="mt-3 mb-3 jobHeading">
                                                     <form action="<?php echo $this->webroot ?>clubs/addescort" method="post" accept-charset="utf-8" class="ajaxform"  enctype="multipart/form-data"> 
					  		<h2>Add Model</h2>
					  		<div class="emailAddress mt-4">
						<div class="row">
							<div class="col-lg-12">
								 <div class="form-group row">
						    <label for="staticEmail" class="col-lg-3 col-form-label">Name*:</label>
						    <div class="col-lg-9">
						      
                                                      <input type="text" placeholder="Name" class="form-control text-field" id="from" name="name" required>
						    </div>
						  </div>
							</div>

						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group row">
						    <label for="staticEmail" class="col-lg-3 col-form-label">Bio*:</label>
						    <div class="col-lg-9">
						      
                                                      <textarea placeholder="Tell something about model" name="introduction" id="introduction" rows="5" class="form-control" maxLength="1000"></textarea>
						    </div>
						  </div>
							</div>
						</div> 
						
						
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group row">
						    <label for="staticEmail" class="col-lg-3 col-form-label">Gender*:</label>
						    
						      <div class="col-lg-9">
							<p class="d-inline-block mr-4 mb-0 mt-2">
							    <input id="test111"  value="M" name="gender" type="radio">
							    <label for="test111">Male</label>
							  </p>
							  <p class="d-inline-block mr-4 mb-0 mt-2">
							    <input id="test112"  value="F" name="gender"  type="radio">
							    <label for="test112">Female</label>
							  </p>
							  <p class="d-inline-block mr-4 mb-0 mt-2">
							    <input id="test113"  value="T" name="gender"  type="radio">
							    <label for="test113">Trans</label>
							  </p>
                        </div>
						    
						  </div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group row">
						    <label for="staticEmail" class="col-lg-3 col-form-label">Date of Birth*:</label>
						    <div class="col-lg-9">
						      <input type="text" placeholder="Date of Birth" class="form-control text-field datepicker" id="dob" name="dob">
						    </div>
						  </div>
							</div>
						</div>
                                                            
                                                            
                                                <div class="row">
							<div class="col-lg-12">
								<div class="form-group row">
						    <label for="staticEmail" class="col-lg-3 col-form-label">Email*:</label>
						    <div class="col-lg-9">
						      <input type="email" placeholder="Email" value="" class="form-control text-field" id="from" name="email" style="width:100%" required>
						    </div>
						  </div>
							</div>
						</div>
                                                            
                                                <div class="row">
							<div class="col-lg-12">
								<div class="form-group row">
						    <label for="staticEmail" class="col-lg-3 col-form-label">Ethnicity*:</label>
						    <div class="col-lg-9">
						      <select id="ethnicity" class="form-control " name="ethnicity_id" style="width:100%">
									<option value="">Select Ethnicity</option>
									<option  value="7">Indian</option>
									<option  value="5">White</option>
									<option  value="4">Mixed</option>
									<option  value="2">Black</option>
									<option  value="1">Asian</option>
							</select>
						    </div>
						  </div>
							</div>
						</div>
                                                    
                                                <div class="row">
							<div class="col-lg-12">
								<div class="form-group row">
						    <label for="staticEmail" class="col-lg-3 col-form-label">Experience*:</label>
						    <div class="col-lg-9">
						      <select name="experience" class="form-control" id="experience" style="width:100%">
                              <option value=""> Select Experience </option>
                              <option value="None" >None</option>
                              <option value="Some Experience" >Some Experience</option>
                              <option value="Very Experienced" >Very Experienced</option>
                            </select>
						    </div>
						  </div>
							</div>
						</div>
                                                <div class="row">
							<div class="col-lg-12">
								<div class="form-group row">
						    <label for="staticEmail" class="col-lg-3 col-form-label">Language Known*:</label>
						    <div class="col-lg-9">
						      <div class="option-group field">
							<p class="d-inline-block mr-4 mb-0 mt-2">
                            	<input type="checkbox" id="box-9" value="1" name="languages[]">
								<label for="box-9">Portugues</label>
						  	</p>
						  	<p class="d-inline-block mr-4 mb-0 mt-2">
                            	<input type="checkbox" id="box-19"  value="2" name="languages[]">
								<label for="box-19">Italiano</label>
						  	</p>

				</div>
						    </div>
						  </div>
							</div>
						</div>            
                                                            
                                                 <div class="row">
							<div class="col-lg-12">
								<div class="form-group row">
						    <label for="staticEmail" class="col-lg-3 col-form-label">Service Type*:</label>
						    <div class="col-lg-9">
						      <select name="availability" class="form-control" id="service_type" style="width:100%">
                              <option value=""> Select Service Type </option>
                              <option  value="Incall"> Incall Only </option>
                              <option  value="Incall/Outcall"> Incall/Outcall </option>
                              <option  value="Outcall"> Outcall Only </option>
                            </select>
						    </div>
						  </div>
							</div>
						</div> 
                                                            
                                                <div class="row">
							<div class="col-lg-12">
								<div class="form-group row">
						    <label for="staticEmail" class="col-lg-3 col-form-label">Height*:</label>
						    <div class="col-lg-9">
						      <select name="height" class="form-control"  id="height" style="width:100%">
                              <option value=""> Select Height </option>
								<option  value="150">
								4.92                              feet                              150                              cm</option>
								<option  value="151">
								4.95                              feet                              151                              cm</option>
								<option  value="152">
								4.99                              feet                              152                              cm</option>
								<option  value="153">
								5.02                              feet                              153                              cm</option>
								<option  value="154">
								5.05                              feet                              154                              cm</option>
								<option  value="155">
								5.09                              feet                              155                              cm</option>
								<option  value="156">
								5.12                              feet                              156                              cm</option>
								<option  value="157">
								5.15                              feet                              157                              cm</option>
								<option  value="158">
								5.18                              feet                              158                              cm</option>
								<option  value="159">
								5.22                              feet                              159                              cm</option>
								<option  value="160">
								5.25                              feet                              160                              cm</option>
								<option  value="161">
								5.28                              feet                              161                              cm</option>
								<option  value="162">
								5.31                              feet                              162                              cm</option>
								<option  value="163">
								5.35                              feet                              163                              cm</option>
								<option  value="164">
								5.38                              feet                              164                              cm</option>
								<option  value="165">
								5.41                              feet                              165                              cm</option>
								<option  value="166">
								5.45                              feet                              166                              cm</option>
								<option  value="167">
								5.48                              feet                              167                              cm</option>
								<option  value="168">
								5.51                              feet                              168                              cm</option>
								<option  value="169">
								5.54                              feet                              169                              cm</option>
								<option  value="170">
								5.58                              feet                              170                              cm</option>
								<option  value="171">
								5.61                              feet                              171                              cm</option>
								<option  value="172">
								5.64                              feet                              172                              cm</option>
								<option  value="173">
								5.68                              feet                              173                              cm</option>
								<option  value="174">
								5.71                              feet                              174                              cm</option>
								<option  value="175">
								5.74                              feet                              175                              cm</option>
								<option  value="176">
								5.77                              feet                              176                              cm</option>
								<option  value="177">
								5.81                              feet                              177                              cm</option>
								<option  value="178">
								5.84                              feet                              178                              cm</option>
								<option  value="179">
								5.87                              feet                              179                              cm</option>
								<option  value="180">
								5.91                              feet                              180                              cm</option>
								<option  value="181">
								5.94                              feet                              181                              cm</option>
								<option  value="182">
								5.97                              feet                              182                              cm</option>
								<option  value="183">
								6                              feet                              183                              cm</option>
								<option  value="184">
								6.04                              feet                              184                              cm</option>
								<option  value="185">
								6.07                              feet                              185                              cm</option>
								<option  value="186">
								6.1                              feet                              186                              cm</option>
								<option  value="187">
								6.14                              feet                              187                              cm</option>
								<option  value="188">
								6.17                              feet                              188                              cm</option>
								<option  value="189">
								6.2                              feet                              189                              cm</option>
								<option  value="190">
								6.23                              feet                              190                              cm</option>
								<option  value="191">
								6.27                              feet                              191                              cm</option>
								<option  value="192">
								6.3                              feet                              192                              cm</option>
								<option  value="193">
								6.33                              feet                              193                              cm</option>
								<option  value="194">
								6.36                              feet                              194                              cm</option>
								<option  value="195">
								6.4                              feet                              195                              cm</option>
								<option  value="196">
								6.43                              feet                              196                              cm</option>
								<option  value="197">
								6.46                              feet                              197                              cm</option>
								<option  value="198">
								6.5                              feet                              198                              cm</option>
								<option  value="199">
								6.53                              feet                              199                              cm</option>
								<option  value="200">
								6.56                              feet                              200                              cm</option>
								<option  value="201">
								6.59                              feet                              201                              cm</option>
								<option  value="202">
								6.63                              feet                              202                              cm</option>
								<option  value="203">
								6.66                              feet                              203                              cm</option>
								<option  value="204">
								6.69                              feet                              204                              cm</option>
								<option  value="205">
								6.73                              feet                              205                              cm</option>
								<option  value="206">
								6.76                              feet                              206                              cm</option>
								<option  value="207">
								6.79                              feet                              207                              cm</option>
								<option  value="208">
								6.82                              feet                              208                              cm</option>
								<option  value="209">
								6.86                              feet                              209                              cm</option>
								<option  value="210">
								6.89                              feet                              210                              cm</option>
								<option  value="211">
								6.92                              feet                              211                              cm</option>
								<option  value="212">
								6.96                              feet                              212                              cm</option>
								<option  value="213">
								6.99                              feet                              213                              cm</option>
								<option  value="214">
								7.02                              feet                              214                              cm</option>
								<option  value="215">
								7.05                              feet                              215                              cm</option>
								<option  value="216">
								7.09                              feet                              216                              cm</option>
								<option  value="217">
								7.12                              feet                              217                              cm</option>
								<option  value="218">
								7.15                              feet                              218                              cm</option>
								<option  value="219">
								7.18                              feet                              219                              cm</option>
                                                                                        </select>
						    </div>
						  </div>
							</div>
						</div> 
                                                    
                                                <div class="row">
							<div class="col-lg-12">
								<div class="form-group row">
						    <label for="staticEmail" class="col-lg-3 col-form-label">Weight*:</label>
						    <div class="col-lg-9">
						      <select name="weight" class="form-control" id="weight" style="width:100%">
                              <option value="">Select Weight</option>
                                                            <option  value="80">
                              80                              lbs                              36.4                             kg </option>
                                                            <option  value="81">
                              81                              lbs                              36.8                             kg </option>
                                                            <option  value="82">
                              82                              lbs                              37.3                             kg </option>
                                                            <option  value="83">
                              83                              lbs                              37.7                             kg </option>
                                                            <option  value="84">
                              84                              lbs                              38.2                             kg </option>
                                                            <option  value="85">
                              85                              lbs                              38.6                             kg </option>
                                                            <option  value="86">
                              86                              lbs                              39.1                             kg </option>
                                                            <option  value="87">
                              87                              lbs                              39.5                             kg </option>
                                                            <option  value="88">
                              88                              lbs                              40                             kg </option>
                                                            <option  value="89">
                              89                              lbs                              40.5                             kg </option>
                                                            <option  value="90">
                              90                              lbs                              40.9                             kg </option>
                                                            <option  value="91">
                              91                              lbs                              41.4                             kg </option>
                                                            <option  value="92">
                              92                              lbs                              41.8                             kg </option>
                                                            <option  value="93">
                              93                              lbs                              42.3                             kg </option>
                                                            <option  value="94">
                              94                              lbs                              42.7                             kg </option>
                                                            <option  value="95">
                              95                              lbs                              43.2                             kg </option>
                                                            <option  value="96">
                              96                              lbs                              43.6                             kg </option>
                                                            <option  value="97">
                              97                              lbs                              44.1                             kg </option>
                                                            <option  value="98">
                              98                              lbs                              44.5                             kg </option>
                                                            <option  value="99">
                              99                              lbs                              45                             kg </option>
                                                            <option  value="100">
                              100                              lbs                              45.5                             kg </option>
                                                            <option  value="101">
                              101                              lbs                              45.9                             kg </option>
                                                            <option  value="102">
                              102                              lbs                              46.4                             kg </option>
                                                            <option  value="103">
                              103                              lbs                              46.8                             kg </option>
                                                            <option  value="104">
                              104                              lbs                              47.3                             kg </option>
                                                            <option  value="105">
                              105                              lbs                              47.7                             kg </option>
                                                            <option  value="106">
                              106                              lbs                              48.2                             kg </option>
                                                            <option  value="107">
                              107                              lbs                              48.6                             kg </option>
                                                            <option  value="108">
                              108                              lbs                              49.1                             kg </option>
                                                            <option  value="109">
                              109                              lbs                              49.5                             kg </option>
                                                            <option  value="110">
                              110                              lbs                              50                             kg </option>
                                                            <option  value="111">
                              111                              lbs                              50.5                             kg </option>
                                                            <option  value="112">
                              112                              lbs                              50.9                             kg </option>
                                                            <option  value="113">
                              113                              lbs                              51.4                             kg </option>
                                                            <option  value="114">
                              114                              lbs                              51.8                             kg </option>
                                                            <option  value="115">
                              115                              lbs                              52.3                             kg </option>
                                                            <option  value="116">
                              116                              lbs                              52.7                             kg </option>
                                                            <option  value="117">
                              117                              lbs                              53.2                             kg </option>
                                                            <option  value="118">
                              118                              lbs                              53.6                             kg </option>
                                                            <option  value="119">
                              119                              lbs                              54.1                             kg </option>
                                                            <option  value="120">
                              120                              lbs                              54.5                             kg </option>
                                                            <option  value="121">
                              121                              lbs                              55                             kg </option>
                                                            <option  value="122">
                              122                              lbs                              55.5                             kg </option>
                                                            <option  value="123">
                              123                              lbs                              55.9                             kg </option>
                                                            <option  value="124">
                              124                              lbs                              56.4                             kg </option>
                                                            <option  value="125">
                              125                              lbs                              56.8                             kg </option>
                                                            <option  value="126">
                              126                              lbs                              57.3                             kg </option>
                                                            <option  value="127">
                              127                              lbs                              57.7                             kg </option>
                                                            <option  value="128">
                              128                              lbs                              58.2                             kg </option>
                                                            <option  value="129">
                              129                              lbs                              58.6                             kg </option>
                                                            <option  value="130">
                              130                              lbs                              59.1                             kg </option>
                                                            <option  value="131">
                              131                              lbs                              59.5                             kg </option>
                                                            <option  value="132">
                              132                              lbs                              60                             kg </option>
                                                            <option  value="133">
                              133                              lbs                              60.5                             kg </option>
                                                            <option  value="134">
                              134                              lbs                              60.9                             kg </option>
                                                            <option  value="135">
                              135                              lbs                              61.4                             kg </option>
                                                            <option  value="136">
                              136                              lbs                              61.8                             kg </option>
                                                            <option  value="137">
                              137                              lbs                              62.3                             kg </option>
                                                            <option  value="138">
                              138                              lbs                              62.7                             kg </option>
                                                            <option  value="139">
                              139                              lbs                              63.2                             kg </option>
                                                            <option  value="140">
                              140                              lbs                              63.6                             kg </option>
                                                            <option  value="141">
                              141                              lbs                              64.1                             kg </option>
                                                            <option  value="142">
                              142                              lbs                              64.5                             kg </option>
                                                            <option  value="143">
                              143                              lbs                              65                             kg </option>
                                                            <option  value="144">
                              144                              lbs                              65.5                             kg </option>
                                                            <option  value="145">
                              145                              lbs                              65.9                             kg </option>
                                                            <option  value="146">
                              146                              lbs                              66.4                             kg </option>
                                                            <option  value="147">
                              147                              lbs                              66.8                             kg </option>
                                                            <option  value="148">
                              148                              lbs                              67.3                             kg </option>
                                                            <option  value="149">
                              149                              lbs                              67.7                             kg </option>
                                                            <option  value="150">
                              150                              lbs                              68.2                             kg </option>
                                                            <option  value="151">
                              151                              lbs                              68.6                             kg </option>
                                                            <option  value="152">
                              152                              lbs                              69.1                             kg </option>
                                                            <option  value="153">
                              153                              lbs                              69.5                             kg </option>
                                                            <option  value="154">
                              154                              lbs                              70                             kg </option>
                                                            <option  value="155">
                              155                              lbs                              70.5                             kg </option>
                                                            <option  value="156">
                              156                              lbs                              70.9                             kg </option>
                                                            <option  value="157">
                              157                              lbs                              71.4                             kg </option>
                                                            <option  value="158">
                              158                              lbs                              71.8                             kg </option>
                                                            <option  value="159">
                              159                              lbs                              72.3                             kg </option>
                                                            <option  value="160">
                              160                              lbs                              72.7                             kg </option>
                                                            <option  value="161">
                              161                              lbs                              73.2                             kg </option>
                                                            <option  value="162">
                              162                              lbs                              73.6                             kg </option>
                                                            <option  value="163">
                              163                              lbs                              74.1                             kg </option>
                                                            <option  value="164">
                              164                              lbs                              74.5                             kg </option>
                                                            <option  value="165">
                              165                              lbs                              75                             kg </option>
                                                            <option  value="166">
                              166                              lbs                              75.5                             kg </option>
                                                            <option  value="167">
                              167                              lbs                              75.9                             kg </option>
                                                            <option  value="168">
                              168                              lbs                              76.4                             kg </option>
                                                            <option  value="169">
                              169                              lbs                              76.8                             kg </option>
                                                            <option  value="170">
                              170                              lbs                              77.3                             kg </option>
                                                            <option  value="171">
                              171                              lbs                              77.7                             kg </option>
                                                            <option  value="172">
                              172                              lbs                              78.2                             kg </option>
                                                            <option  value="173">
                              173                              lbs                              78.6                             kg </option>
                                                            <option  value="174">
                              174                              lbs                              79.1                             kg </option>
                                                            <option  value="175">
                              175                              lbs                              79.5                             kg </option>
                                                            <option  value="176">
                              176                              lbs                              80                             kg </option>
                                                            <option  value="177">
                              177                              lbs                              80.5                             kg </option>
                                                            <option  value="178">
                              178                              lbs                              80.9                             kg </option>
                                                            <option  value="179">
                              179                              lbs                              81.4                             kg </option>
                                                            <option  value="180">
                              180                              lbs                              81.8                             kg </option>
                                                            <option  value="181">
                              181                              lbs                              82.3                             kg </option>
                                                            <option  value="182">
                              182                              lbs                              82.7                             kg </option>
                                                            <option  value="183">
                              183                              lbs                              83.2                             kg </option>
                                                            <option  value="184">
                              184                              lbs                              83.6                             kg </option>
                                                            <option  value="185">
                              185                              lbs                              84.1                             kg </option>
                                                            <option  value="186">
                              186                              lbs                              84.5                             kg </option>
                                                            <option  value="187">
                              187                              lbs                              85                             kg </option>
                                                            <option  value="188">
                              188                              lbs                              85.5                             kg </option>
                                                            <option  value="189">
                              189                              lbs                              85.9                             kg </option>
                                                            <option  value="190">
                              190                              lbs                              86.4                             kg </option>
                                                            <option  value="191">
                              191                              lbs                              86.8                             kg </option>
                                                            <option  value="192">
                              192                              lbs                              87.3                             kg </option>
                                                            <option  value="193">
                              193                              lbs                              87.7                             kg </option>
                                                            <option  value="194">
                              194                              lbs                              88.2                             kg </option>
                                                            <option  value="195">
                              195                              lbs                              88.6                             kg </option>
                                                            <option  value="196">
                              196                              lbs                              89.1                             kg </option>
                                                            <option  value="197">
                              197                              lbs                              89.5                             kg </option>
                                                            <option  value="198">
                              198                              lbs                              90                             kg </option>
                                                            <option  value="199">
                              199                              lbs                              90.5                             kg </option>
                                                            <option  value="200">
                              200                              lbs                              90.9                             kg </option>
                                                            <option  value="201">
                              201                              lbs                              91.4                             kg </option>
                                                            <option  value="202">
                              202                              lbs                              91.8                             kg </option>
                                                            <option  value="203">
                              203                              lbs                              92.3                             kg </option>
                                                            <option  value="204">
                              204                              lbs                              92.7                             kg </option>
                                                            <option  value="205">
                              205                              lbs                              93.2                             kg </option>
                                                            <option  value="206">
                              206                              lbs                              93.6                             kg </option>
                                                            <option  value="207">
                              207                              lbs                              94.1                             kg </option>
                                                            <option  value="208">
                              208                              lbs                              94.5                             kg </option>
                                                            <option  value="209">
                              209                              lbs                              95                             kg </option>
                                                            <option  value="210">
                              210                              lbs                              95.5                             kg </option>
                                                            <option  value="211">
                              211                              lbs                              95.9                             kg </option>
                                                            <option  value="212">
                              212                              lbs                              96.4                             kg </option>
                                                            <option  value="213">
                              213                              lbs                              96.8                             kg </option>
                                                            <option  value="214">
                              214                              lbs                              97.3                             kg </option>
                                                            <option  value="215">
                              215                              lbs                              97.7                             kg </option>
                                                            <option  value="216">
                              216                              lbs                              98.2                             kg </option>
                                                            <option  value="217">
                              217                              lbs                              98.6                             kg </option>
                                                            <option  value="218">
                              218                              lbs                              99.1                             kg </option>
                                                            <option  value="219">
                              219                              lbs                              99.5                             kg </option>
                                                            <option  value="220">
                              220                              lbs                              100                             kg </option>
                                                            <option  value="221">
                              221                              lbs                              100.5                             kg </option>
                                                            <option  value="222">
                              222                              lbs                              100.9                             kg </option>
                                                            <option  value="223">
                              223                              lbs                              101.4                             kg </option>
                                                            <option  value="224">
                              224                              lbs                              101.8                             kg </option>
                                                            <option  value="225">
                              225                              lbs                              102.3                             kg </option>
                                                            <option  value="226">
                              226                              lbs                              102.7                             kg </option>
                                                            <option  value="227">
                              227                              lbs                              103.2                             kg </option>
                                                            <option  value="228">
                              228                              lbs                              103.6                             kg </option>
                                                            <option  value="229">
                              229                              lbs                              104.1                             kg </option>
                                                            <option  value="230">
                              230                              lbs                              104.5                             kg </option>
                                                            <option  value="231">
                              231                              lbs                              105                             kg </option>
                                                            <option  value="232">
                              232                              lbs                              105.5                             kg </option>
                                                            <option  value="233">
                              233                              lbs                              105.9                             kg </option>
                                                            <option  value="234">
                              234                              lbs                              106.4                             kg </option>
                                                            <option  value="235">
                              235                              lbs                              106.8                             kg </option>
                                                            <option  value="236">
                              236                              lbs                              107.3                             kg </option>
                                                            <option  value="237">
                              237                              lbs                              107.7                             kg </option>
                                                            <option  value="238">
                              238                              lbs                              108.2                             kg </option>
                                                            <option  value="239">
                              239                              lbs                              108.6                             kg </option>
                                                            <option  value="240">
                              240                              lbs                              109.1                             kg </option>
                                                            <option  value="241">
                              241                              lbs                              109.5                             kg </option>
                                                            <option  value="242">
                              242                              lbs                              110                             kg </option>
                                                            <option  value="243">
                              243                              lbs                              110.5                             kg </option>
                                                            <option  value="244">
                              244                              lbs                              110.9                             kg </option>
                                                            <option  value="245">
                              245                              lbs                              111.4                             kg </option>
                                                            <option  value="246">
                              246                              lbs                              111.8                             kg </option>
                                                            <option  value="247">
                              247                              lbs                              112.3                             kg </option>
                                                            <option  value="248">
                              248                              lbs                              112.7                             kg </option>
                                                            <option  value="249">
                              249                              lbs                              113.2                             kg </option>
                                                            <option  value="250">
                              250                              lbs                              113.6                             kg </option>
                                                            <option  value="251">
                              251                              lbs                              114.1                             kg </option>
                                                            <option  value="252">
                              252                              lbs                              114.5                             kg </option>
                                                            <option  value="253">
                              253                              lbs                              115                             kg </option>
                                                            <option  value="254">
                              254                              lbs                              115.5                             kg </option>
                                                            <option  value="255">
                              255                              lbs                              115.9                             kg </option>
                                                            <option  value="256">
                              256                              lbs                              116.4                             kg </option>
                                                            <option  value="257">
                              257                              lbs                              116.8                             kg </option>
                                                            <option  value="258">
                              258                              lbs                              117.3                             kg </option>
                                                            <option  value="259">
                              259                              lbs                              117.7                             kg </option>
                                                            <option  value="260">
                              260                              lbs                              118.2                             kg </option>
                                                            <option  value="261">
                              261                              lbs                              118.6                             kg </option>
                                                            <option  value="262">
                              262                              lbs                              119.1                             kg </option>
                                                            <option  value="263">
                              263                              lbs                              119.5                             kg </option>
                                                            <option  value="264">
                              264                              lbs                              120                             kg </option>
                                                            <option  value="265">
                              265                              lbs                              120.5                             kg </option>
                                                            <option  value="266">
                              266                              lbs                              120.9                             kg </option>
                                                            <option  value="267">
                              267                              lbs                              121.4                             kg </option>
                                                            <option  value="268">
                              268                              lbs                              121.8                             kg </option>
                                                            <option  value="269">
                              269                              lbs                              122.3                             kg </option>
                                                            <option  value="270">
                              270                              lbs                              122.7                             kg </option>
                                                            <option  value="271">
                              271                              lbs                              123.2                             kg </option>
                                                            <option  value="272">
                              272                              lbs                              123.6                             kg </option>
                                                            <option  value="273">
                              273                              lbs                              124.1                             kg </option>
                                                            <option  value="274">
                              274                              lbs                              124.5                             kg </option>
                                                            <option  value="275">
                              275                              lbs                              125                             kg </option>
                                                            <option  value="276">
                              276                              lbs                              125.5                             kg </option>
                                                            <option  value="277">
                              277                              lbs                              125.9                             kg </option>
                                                            <option  value="278">
                              278                              lbs                              126.4                             kg </option>
                                                            <option  value="279">
                              279                              lbs                              126.8                             kg </option>
                                                            <option  value="280">
                              280                              lbs                              127.3                             kg </option>
                                                            <option  value="281">
                              281                              lbs                              127.7                             kg </option>
                                                            <option  value="282">
                              282                              lbs                              128.2                             kg </option>
                                                            <option  value="283">
                              283                              lbs                              128.6                             kg </option>
                                                            <option  value="284">
                              284                              lbs                              129.1                             kg </option>
                                                            <option  value="285">
                              285                              lbs                              129.5                             kg </option>
                                                            <option  value="286">
                              286                              lbs                              130                             kg </option>
                                                            <option  value="287">
                              287                              lbs                              130.5                             kg </option>
                                                            <option  value="288">
                              288                              lbs                              130.9                             kg </option>
                                                            <option  value="289">
                              289                              lbs                              131.4                             kg </option>
                                                            <option  value="290">
                              290                              lbs                              131.8                             kg </option>
                                                            <option  value="291">
                              291                              lbs                              132.3                             kg </option>
                                                            <option  value="292">
                              292                              lbs                              132.7                             kg </option>
                                                            <option  value="293">
                              293                              lbs                              133.2                             kg </option>
                                                            <option  value="294">
                              294                              lbs                              133.6                             kg </option>
                                                            <option  value="295">
                              295                              lbs                              134.1                             kg </option>
                                                            <option  value="296">
                              296                              lbs                              134.5                             kg </option>
                                                            <option  value="297">
                              297                              lbs                              135                             kg </option>
                                                            <option  value="298">
                              298                              lbs                              135.5                             kg </option>
                                                            <option  value="299">
                              299                              lbs                              135.9                             kg </option>
                                                                                        </select>
						    </div>
						  </div>
							</div>
						</div>             
                                                            
                                               <div class="row">
							<div class="col-lg-12">
								<div class="form-group row">
						    <label for="staticEmail" class="col-lg-3 col-form-label">Body Type*:</label>
						    <div class="col-lg-9">
						      <select name="body_type" class="form-control" id="body_type" style="width:100%">
                              <option value=""> Select Body Type </option>
                                                             <option  value="1">
                              Athletic                              </option>
                                                            <option  value="3">
                              BBW                              </option>
                                                            <option  value="4">
                              Busty                              </option>
                                                            <option  value="6">
                              Petite                              </option>
                                                            <option  value="8">
                              Slim                              </option>
                                                                                        </select>
						    </div>
						  </div>
							</div>
						</div>
                                                            
                                                            
                                               <div class="row">
							<div class="col-lg-12">
								<div class="form-group row">
						    <label for="staticEmail" class="col-lg-3 col-form-label">Bust Size*:</label>
						    <div class="col-lg-9">
						      <select id="bust" class="form-control" name="bust" style="width:100%">
                              <option value=""> Select Bust Size </option>
                               <option value="Not Applicable" > Not Applicable </option>
                                                            <option  value="20">
                              20                              cm</option>
                                                            <option  value="21">
                              21                              cm</option>
                                                            <option  value="22">
                              22                              cm</option>
                                                            <option  value="23">
                              23                              cm</option>
                                                            <option  value="24">
                              24                              cm</option>
                                                            <option  value="25">
                              25                              cm</option>
                                                            <option  value="26">
                              26                              cm</option>
                                                            <option  value="27">
                              27                              cm</option>
                                                            <option  value="28">
                              28                              cm</option>
                                                            <option  value="29">
                              29                              cm</option>
                                                            <option  value="30">
                              30                              cm</option>
                                                            <option  value="31">
                              31                              cm</option>
                                                            <option  value="32">
                              32                              cm</option>
                                                            <option  value="33">
                              33                              cm</option>
                                                            <option  value="34">
                              34                              cm</option>
                                                            <option  value="35">
                              35                              cm</option>
                                                            <option  value="36">
                              36                              cm</option>
                                                            <option  value="37">
                              37                              cm</option>
                                                            <option  value="38">
                              38                              cm</option>
                                                            <option  value="39">
                              39                              cm</option>
                                                            <option  value="40">
                              40                              cm</option>
                                                            <option  value="41">
                              41                              cm</option>
                                                            <option  value="42">
                              42                              cm</option>
                                                            <option  value="43">
                              43                              cm</option>
                                                            <option  value="44">
                              44                              cm</option>
                                                            <option  value="45">
                              45                              cm</option>
                                                            <option  value="46">
                              46                              cm</option>
                                                            <option  value="47">
                              47                              cm</option>
                                                            <option  value="48">
                              48                              cm</option>
                                                            <option  value="49">
                              49                              cm</option>
                                                                                        </select>
						    </div>
						  </div>
							</div>
						</div>
                                                            <div class="row">
							<div class="col-lg-12">
								<div class="form-group row">
						    <label for="staticEmail" class="col-lg-3 col-form-label">Eye Color*:</label>
						    <div class="col-lg-9">
						      <select name="eye_color_id" class="form-control" id="eye_color_id" style="width:100%">
                                <option value=""> Select Eye Color </option>
                                                              <option  value="4">
                              Blue                              </option>
                                                            <option  value="5">
                              Gray                              </option>
                                                                                        </select>
						    </div>
						  </div>
							</div>
						</div>
                                                            
                                               <div class="row">
							<div class="col-lg-12">
								<div class="form-group row">
						    <label for="staticEmail" class="col-lg-3 col-form-label">Hair Color*:</label>
						    <div class="col-lg-9">
						      <select name="hair_color_id" class="form-control" id="hair_color_id" style="width:100%">
                              <option value=""> Select Hair Color </option>
                                                             <option  value="1">
                              Black                              </option>
                                                            <option  value="2">
                              Brown                              </option>
                                                            <option  value="3">
                              Blonde                              </option>
                                                            <option  value="5">
                              Red                              </option>
                                                                                        </select>
						    </div>
						  </div>
							</div>
						</div>             
                                                            
                                                <div class="row">
							<div class="col-lg-12">
								<div class="form-group row">
						    <label for="staticEmail" class="col-lg-3 col-form-label">Cup Size*:</label>
						    <div class="col-lg-9">
						      <select name="cup_size" class="form-control" id="cup_size" style="width:100%">
                              		<option value=""> Select Cup Size </option>
                              		<option value="30B">30B</option>
                              		<option value="30A">30A</option>
                              		<option value="30C">30C</option>
                              		<option value="30D">30D</option>
                              		<option value="34A">34A</option>
                              		<option value="34B">34B</option>
                              		<option value="34C">34C</option>
                              		<option value="34D">34D</option>
                              		<option value="35A">35A</option>
                               </select>
						    </div>
						  </div>
							</div>
						</div>             
                                                            
                                                <div class="row">
							<div class="col-lg-12">
								<div class="form-group row">
						    <label for="staticEmail" class="col-lg-3 col-form-label">Model Photo*:</label>
						    <div class="col-lg-9">
						      <input type="file" name="profile_img">
						    </div>
						  </div>
							</div>
						</div>             
                                                            
                                                            
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group row">
						    <label for="staticEmail" class="col-lg-3 col-form-label"></label>
						    <div class="col-lg-9">
						      <button type="submit" class="btn btn-primary btnPart">Add Model</button>
						    </div>
						  </div>
							</div>
						</div>     
					</div>
                                                        </form>
					  	</div>
                                          
					  </div>
					</div>
				</div>
			</div>
		</div>
	</section>
	