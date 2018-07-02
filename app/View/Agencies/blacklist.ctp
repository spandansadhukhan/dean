
    
	
	
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('agent_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<h2 class="font-weight-normal">Manage customer blacklist</h2>
					</div>
					<div class="email mt-3 p-2">
						<p>Add Customer to Blacklist</p>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="emailAddress mt-4">
						<div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 text-right col-form-label">Name*:</label>
						    <div class="col-lg-8">
						      <input type="text" class="form-control text-field" id="staticEmail" placeholder="Name">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 text-right col-form-label">Phone*:</label>
						    <div class="col-lg-8">
						      <input type="text" class="form-control text-field" id="staticEmail" placeholder="Phone">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 text-right col-form-label">Customer Identity*:</label>
						    <div class="col-lg-8">
						      <input type="text" class="form-control text-field" id="staticEmail" placeholder="Customer Identity">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 text-right col-form-label">Image*:</label>
						    <div class="col-lg-8">
						      <input type="file">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 text-right col-form-label"></label>
						    <div class="col-lg-8">
						      <button type="button" class="btn btn-primary btnPart">Add To Blacklist</button>
						    </div>
						  </div>
					</div>
						</div>
						<div class="col-lg-6">
							<div class="emailAddress mt-4">
						<div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 text-right col-form-label">Email*:</label>
						    <div class="col-lg-8">
						      <input type="text" class="form-control text-field" id="staticEmail" placeholder="">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 text-right col-form-label">Country*:</label>
						    <div class="col-lg-8">
						      <select class="form-control">
						      <option>1</option>
						      <option>2</option>
						      <option>3</option>
						      <option>4</option>
						      <option>5</option>
						    </select>
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 text-right col-form-label">State/Provision/Region*:</label>
						    <div class="col-lg-8">
						      <select class="form-control">
						      <option>1</option>
						      <option>2</option>
						      <option>3</option>
						      <option>4</option>
						      <option>5</option>
						    </select>
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 text-right col-form-label">City*:</label>
						    <div class="col-lg-8">
						      <select class="form-control">
						      <option>1</option>
						      <option>2</option>
						      <option>3</option>
						      <option>4</option>
						      <option>5</option>
						    </select>
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 text-right col-form-label">Location/Suberb*:</label>
						    <div class="col-lg-8">
						      <select class="form-control">
						      <option>1</option>
						      <option>2</option>
						      <option>3</option>
						      <option>4</option>
						      <option>5</option>
						    </select>
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 text-right col-form-label">Your Comments*:</label>
						    <div class="col-lg-8">
						      <textarea class="form-control" rows="5" id="comment"></textarea>
						    </div>
						  </div>
					</div>
						</div>
					</div>
					<h2 class="mt-3">Manage Blacklist</h2>
					<div class="form-group row">
						<div class="col-lg-4">
							<input type="text" class="form-control text-field" placeholder="Name">
						</div>
						<div class="col-lg-4">
							<input type="text" class="form-control text-field" placeholder="Phone">
						</div>
						<div class="col-lg-2"><button type="button" class="btn btn-primary btnPart">Search</button></div>
					</div>
					<table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Customer Name</th>
        <th>Phone</th>
        <th>Location</th>
        <th>Customer Identity</th>
        <th>Blub Details</th>
        <th>Options</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>John</td>
        <td>0000000</td>
        <td>Pozman, United Kingdom</td>
        <td>ID</td>
        <td>Hi, This customer is blacklisted by me</td>
        <td><button type="button" class="btn btn-primary btnPart"><i class="fa  fa-eye"></i></button>							</td>
      </tr>
    </tbody>
  </table>
				</div>
			</div>
		</div>
	</section>

