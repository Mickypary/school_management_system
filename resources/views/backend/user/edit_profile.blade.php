@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


<div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Profile</h4>
			  <!-- <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6> -->
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
						@csrf
					  <div class="row">
						<div class="col-12">

							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<h5>User Role <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="usertype" disabled id="select" required="" class="form-control" aria-invalid="false">
												<option value="" selected disabled>Select Role</option>
												<option value="Admin" {{ ($editData->usertype == "Admin" ? "selected" : '') }}>Admin</option>
												<option value="User" {{ ($editData->usertype == 'User' ? 'selected' : '')}} >User</option>
											</select>
										</div>
									</div>
								</div>      <!-- End Col-MD-4  -->

								<div class="col-md-4">
									<div class="form-group">
										<h5>User Name <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="name" value="{{ $editData->name, old('name') }}" class="form-control" required="">
											@error('name')
												<span class="text-danger">{{ $message }}</span>
											@enderror  
										</div>
									</div>
								</div>   <!-- End Col-MD-4  -->

								<div class="col-md-4">
									<div class="form-group">
										<h5>Qualification <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" value="{{ $editData->qualification, old('qualification') }}" name="qualification" class="form-control" required=""> 
										</div>
									</div>
								</div>      <!-- End Col-MD-4  -->

							</div>	    <!-- End Row -->


							<div class="row">

								<div class="col-md-4">
									<div class="form-group">
										<h5>Join Date <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="date" name="join_date" value="{{ $editData->join_date, old('join_date') }}" class="form-control" required=""></div>
									</div>
								</div>   <!-- End Col-MD-4  -->

								<div class="col-md-4">
									<div class="form-group">
										<h5>Gender <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="gender" id="select" required="" class="form-control" aria-invalid="false">
												<option value="" selected disabled>Select Gender</option>
												<option value="Male" {{ ($editData->gender == "Male" ? "selected" : '') }}>Male</option>
												<option value="Female" {{ ($editData->gender == "Female" ? "selected" : '') }}>Female</option>
											</select>
										</div>
									</div>
								</div>      <!-- End Col-MD-4  -->

								<div class="col-md-4">
									<div class="form-group">
										<h5>Date Of Birth <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="date" value="{{ $editData->dob, old('dob') }}" name="dob" class="form-control" required=""></div>
									</div>
								</div>   <!-- End Col-MD-4  -->

							</div>	    <!-- End Row -->


							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<h5>Phone <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="phone" value="{{ $editData->phone, old('phone') }}" name="phone" class="form-control" required=""> 
										</div>
									</div>
								</div>      <!-- End Col-MD-4  -->

								<div class="col-md-4">
									<div class="form-group">
										<h5>Marital Status <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="marital_status" id="select" required="" class="form-control" aria-invalid="false">
												<option value="" selected disabled>Select</option>
												<option value="Married" {{ ($editData->marital_status == "Married" ? "selected" : '') }}>Married</option>
												<option value="Single" {{ ($editData->marital_status == 'Single' ? 'selected' : '')}} >Single</option>
											</select>
										</div>
									</div>
								</div>      <!-- End Col-MD-4  -->

								<div class="col-md-4">
									<div class="form-group">
										<h5>Address <span class="text-danger">*</span></h5>
										<div class="controls">
											<textarea name="address"  rows="4" id="textarea" class="form-control" required="" placeholder="House Address">{{ $editData->address, old('address') }}</textarea>
										</div>
									</div>
								</div>   <!-- End Col-MD-4  -->

							</div>	    <!-- End Row -->


							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<h5>Email <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="email" value="{{ $editData->email, old('email') }}" name="email" class="form-control" required="">
											@error('email')
												<span class="text-danger">{{ $message }}</span>
											@enderror 
										</div>
									</div>
								</div>      <!-- End Col-MD-4  -->


								<div class="col-md-4">
									<div class="form-group">
										<h5>State of Origin <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" value="{{ $editData->state_of_origin, old('state_of_origin') }}" name="state_of_origin" class="form-control" required="">
											@error('state_of_origin')
												<span class="text-danger">{{ $message }}</span>
											@enderror 
										</div>
									</div>
								</div>      <!-- End Col-MD-4  -->

								<div class="col-md-4">
									<div class="form-group">
										<h5>Profile Image <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="file" name="image" id="image" class="form-control"> 
										</div>
									</div>
									<div class="form-group">
										<div class="controls">
											<img id="showImage" src="{{ (!empty($user->image) ? url('upload/user_image/'.$user->image) : url('upload/no_image.jpg')) }}" style="height: 100px; width: 100px; border: 1px solid #000000">
										</div>
									</div>
								</div>   <!-- End Col-MD-4  -->

							</div>	    <!-- End Row -->
			
							
						
							
							
						</div>
					  </div>
						
					
						
						<div class="text-xs-right">
							<!-- <button type="submit" class="btn btn-rounded btn-info">Submit</button> -->
							<input type="submit" href="" class="btn btn-rounded btn-info mb-5" value="Update">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>




		  <script type="text/javascript">
		  	$(document).ready(function() {
		  		$('#image').change(function(e) {
		  			var reader = new FileReader();
		  			reader.onload = function(e) {
		  				$('#showImage').attr('src',e.target.result);
		  			}

		  			reader.readAsDataURL(e.target.files['0']);
		  		});
		  	});
		  </script>



@endsection