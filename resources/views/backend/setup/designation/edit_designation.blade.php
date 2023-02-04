@extends('admin.admin_master')

@section('admin')


<div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Designation</h4>
			  <!-- <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6> -->
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{ route('designation.update', $editData->id) }}">
						@csrf
					  <div class="row">
						<div class="col-12">

									<div class="form-group">
										<h5>Designation Name <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" value="{{ $editData->name, old('name') }}" name="name" class="form-control"> 
											@error('name')
												<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
									</div>




								</div>      <!-- End Col-MD-12  -->


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