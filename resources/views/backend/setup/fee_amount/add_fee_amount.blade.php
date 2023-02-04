@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


<div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Fee Amount</h4>
			  <!-- <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6> -->
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{ route('store.fee.amount') }}">
						@csrf
					  <div class="row">
						<div class="col-12 pary">

						<div class="add_item">

							
											

									<div class="form-group">
										<h5>Fee Category <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="fee_category_id" required="" class="form-control" aria-invalid="false">
												<option value="" selected disabled>Select Fee Category</option>
												@foreach($fee_categories as $category)
												<option value="{{ $category->id }}">{{ $category->name }}</option>
												@endforeach
											</select>
										</div>
									</div>   <!-- End Form Group -->


									<div class="row">
										<div class="col-md-5">
											<div class="form-group">
												<h5>Student Class <span class="text-danger">*</span></h5>
												<div class="controls">
												<select name="class_id[]" required="" class="form-control" aria-invalid="false">
													<option value="" selected disabled>Select Student Class</option>
													@foreach($classes as $class)
													<option value="{{ $class->id }}">{{ $class->name }}</option>
													@endforeach
												</select>
												</div>
											</div>   <!-- End Form Group -->
										</div>  <!-- End Col-MD-5 -->

										<div class="col-md-5">
											<div class="form-group">
												<h5>Amount <span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="text" value="{{ old('amount') }}" name="amount[]" class="form-control"> 
												</div>
											</div>
										</div>   <!-- End Col-MD-5 -->

										<div class="col-md-2" style="padding-top: 25px;">
											<span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
										</div>   <!-- End Col-MD-2 -->

									</div>  <!-- End Inner Row -->




								</div>      <!-- End Col-MD-12  -->




							</div>	    <!-- End Row -->

						</div>   <!-- End Add Item Div from above -->
							
							
						</div>



					  </div>


						
					
						
						<div class="text-xs-right">
							<!-- <button type="submit" class="btn btn-rounded btn-info">Submit</button> -->
							<input type="submit" href="" class="btn btn-rounded btn-info mb-5" value="Submit">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>



		  <div style="visibility: hidden;">
		  	<div class="whole_extra_item_add" id="whole_extra_item_add">
		  		<div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
		  			<div class="form-row">

		  				<div class="col-md-5">
							<div class="form-group">
								<h5>Student Class <span class="text-danger">*</span></h5>
								<div class="controls">
								<select name="class_id[]" required="" class="form-control" aria-invalid="false">
									<option value="" selected disabled>Select Student Class</option>
									@foreach($classes as $class)
									<option value="{{ $class->id }}">{{ $class->name }}</option>
									@endforeach
								</select>
								</div>
							</div>   <!-- End Form Group -->
						</div>  <!-- End Col-MD-5 -->

						<div class="col-md-5">
							<div class="form-group">
								<h5>Amount <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" value="{{ old('amount') }}" name="amount[]" class="form-control"> 
								</div>
							</div>
						</div>   <!-- End Col-MD-5 -->

						<div class="col-md-2" style="padding-top: 25px;">
							<span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
							<span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
						</div>   <!-- End Col-MD-2 -->

		  			</div>   <!-- End Form-row -->
		  		</div>
		  	</div>
		  </div>





		  <script type="text/javascript">
		  	$(document).ready(function() {
		  		var counter = 0;
		  		$(document).on('click', '.addeventmore', function() {
		  			// alert('God is good');
		  			var whole_extra_item_add = $('#whole_extra_item_add').html();
		  			$(this).closest('.add_item').append(whole_extra_item_add);
		  			counter++;
		  		});
		  		$(document).on('click', '.removeeventmore', function() {
		  			$(this).closest('.delete_whole_extra_item_add').remove();
		  			counter -= 1
		  		})
		  		
		  	});
		  </script>




@endsection