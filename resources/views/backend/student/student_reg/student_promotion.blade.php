@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


<div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Student Promotion</h4>
			  <!-- <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6> -->
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{ route('promotion.student.reg', $editData->student_id) }}" enctype="multipart/form-data">
						@csrf

						<input type="hidden" name="id" value="{{ $editData->id }}">
					  <div class="row">  <!-- Main Row -->
						<div class="col-12">

							<div class="row">   <!-- First Row -->
								<div class="col-md-4">
									<div class="form-group">
										<h5>Student Name <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" value="{{ $editData['student']['name'], old('name') }}" name="name" class="form-control" required> 
											@error('name')
												<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
									</div>
								</div>  <!-- End Col-MD-4 -->

								<div class="col-md-4">
									<div class="form-group">
										<h5>Father's Name <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" value="{{ $editData['student']['fname'], old('fname') }}" name="fname" class="form-control" required> 
											@error('fname')
												<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
									</div>
								</div>  <!-- End Col-MD-4 -->

								<div class="col-md-4">
									<div class="form-group">
										<h5>Mother's Name <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" value="{{ $editData['student']['mname'], old('mname') }}" name="mname" class="form-control" required> 
											@error('mname')
												<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
									</div>
								</div>  <!-- End Col-MD-4 -->

							</div>   <!-- End First Row -->




							<div class="row">   <!-- Second Row -->
								<div class="col-md-4">
									<div class="form-group">
										<h5>Mobile No <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" value="{{ $editData['student']['mobile'], old('mobile') }}" name="mobile" class="form-control" required> 
											@error('mobile')
												<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
									</div>
								</div>  <!-- End Col-MD-4 -->

								<div class="col-md-4">
									<div class="form-group">
										<h5>Address <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" value="{{ $editData['student']['address'], old('address') }}" name="address" class="form-control" required> 
											@error('address')
												<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
									</div>
								</div>  <!-- End Col-MD-4 -->

								<div class="col-md-4">
									<div class="form-group">
										<h5>Gender <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="gender" id="gender" required="" class="form-control" aria-invalid="false">
												<option value="" selected disabled>Select Gender</option>
												<option value="Male" {{ ($editData['student']['gender'] == 'Male' ? 'selected' : '') }}>Male</option>
												<option value="Female" {{ ($editData['student']['gender'] == 'Female' ? 'selected' : '') }}>Female</option>
											</select> 
										</div>
									</div>
								</div>  <!-- End Col-MD-4 -->

							</div>   <!-- End Second Row -->




							<div class="row">   <!-- Third Row -->

								<div class="col-md-4">
									<div class="form-group">
										<h5>Religion <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="religion" id="religion" required="" class="form-control" aria-invalid="false">
												<option value="" selected disabled>Select Religion</option>
												<option value="Christianity" {{ ($editData['student']['religion'] == 'Christianity' ? 'selected' : '') }}>Christianity</option>
												<option value="Muslim" {{ ($editData['student']['religion'] == 'Muslim' ? 'selected' : '') }}>Muslim</option>
												<option value="Hindu" {{ ($editData['student']['religion'] == 'Hindu' ? 'selected' : '') }}>Hindu</option>
											</select> 
										</div>
									</div>
								</div>  <!-- End Col-MD-4 -->

								<div class="col-md-4">
									<div class="form-group">
										<h5>Date of Birth <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="date" value="{{ $editData['student']['dob'], old('dob') }}" name="dob" class="form-control" required> 
											@error('dob')
												<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
									</div>
								</div>  <!-- End Col-MD-4 -->

								<div class="col-md-4">
									<div class="form-group">
										<h5>Discount <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" value="{{ $editData['discount']['discount'], old('discount') }}" name="discount" class="form-control" required> 
											@error('discount')
												<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
									</div>
								</div>  <!-- End Col-MD-4 -->

							</div>   <!-- End Third Row -->




							<div class="row">   <!-- Fourth Row -->

								<div class="col-md-4">
									<div class="form-group">
										<h5>Year <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="year_id" required="" class="form-control" aria-invalid="false">
												<option value="" selected disabled>Select Year</option>
												@foreach($student_year as $year)
												<option value="{{ $year->id }}" {{ ($editData->year_id == $year->id ? 'selected' : '') }}>{{ $year->name }}</option>
												@endforeach
											</select> 
										</div>
									</div>
								</div>  <!-- End Col-MD-4 -->

								<div class="col-md-4">
									<div class="form-group">
										<h5>Class <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="class_id" required="" class="form-control" aria-invalid="false">
												<option value="" selected disabled>Select Class</option>
												@foreach($classes as $class)
												<option value="{{ $class->id }}" {{ ($editData->class_id == $class->id ? 'selected' : '') }}>{{ $class->name }}</option>
												@endforeach
											</select> 
										</div>
									</div>
								</div>  <!-- End Col-MD-4 -->

								<div class="col-md-4">
									<div class="form-group">
										<h5>Group <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="group_id" required="" class="form-control" aria-invalid="false">
												<option value="" selected disabled>Select Group</option>
												@foreach($groups as $group)
												<option value="{{ $group->id }}" {{ ($editData->group_id == $group->id ? 'selected' : '') }}>{{ $group->name }}</option>
												@endforeach
											</select> 
										</div>
									</div>
								</div>  <!-- End Col-MD-4 -->

							</div>   <!-- End Fourth Row -->





							<div class="row">   <!-- Fifth Row -->

								<div class="col-md-4">
									<div class="form-group">
										<h5>Shift <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="shift_id" required="" class="form-control" aria-invalid="false">
												<option value="" selected disabled>Select Shift</option>
												@foreach($shifts as $shift)
												<option value="{{ $shift->id }}" {{ ($editData->shift_id == $shift->id ? 'selected' : '') }}>{{ $shift->name }}</option>
												@endforeach
											</select> 
										</div>
									</div>
								</div>  <!-- End Col-MD-4 -->

								<div class="col-md-4">
									<div class="form-group">
										<h5>Profile Image <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="file" name="image" id="image" class="form-control"> 
										</div>
									</div>
								</div>  <!-- End Col-MD-4 -->

								<div class="col-md-4">
									<div class="form-group">
										<div class="controls">
											<img id="showImage" src="{{ (!empty($editData['student']['image']) ? url('upload/student_images/'.$editData['student']['image']) : url('upload/no_image.jpg')) }}" style="height: 100px; width: 100px; border: 1px solid #000000">
										</div>
									</div>
								</div>  <!-- End Col-MD-4 -->

							</div>   <!-- End Fifth Row -->

									




								</div>      <!-- End Col-MD-12  -->


							</div>	    <!-- End Main Row -->
							
							
						</div>
					  </div>
						
					
						
						<div class="text-xs-right">
							<!-- <button type="submit" class="btn btn-rounded btn-info">Submit</button> -->
							<input type="submit" href="" class="btn btn-rounded btn-info mb-5" value="Promote">
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