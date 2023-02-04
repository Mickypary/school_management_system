@extends('admin.admin_master')

@section('admin')

 <div class="col-12">





 	<div class="box">
					<div class="box-body box-profile">            
					  <div class="row">
						<div class="col-12">
							<div>
								<p>Email :<span class="text-gray pl-10">{{ $user->email }}</span> </p>
								<p>Phone :<span class="text-gray pl-10">{{ $user->phone }}</span></p>
								<p>Qualification :<span class="text-gray pl-10">{{ $user->qualification }}</span></p>
								<p>Address :<span class="text-gray pl-10">{{ $user->address }}</span></p>
							</div>
						</div>
					  </div>
					</div>
					<!-- /.box-body -->
				  </div>



 	<div class="box box-widget widget-user">
					<!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="widget-user-header bg-black">
					  <h3 class="widget-user-username">User Name: {{ $user->name }}</h3>

					  <a href="{{ route('profile.edit') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Edit Profile</a>

					  <h6 class="widget-user-desc">User Role: {{ $user->role }}</h6>
					  
					</div>
					<div class="widget-user-image">
					  <img class="rounded-circle" src="{{ (!empty($user->image) ? url('upload/user_image/'.$user->image) : url('upload/no_image.jpg')) }}" alt="User Avatar" style="height: 100px; width: 100px">
					</div><br>
					<div class="box-footer">
					  <div class="row">
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">DOB</h5>
							<span class="description-text">{{ $user->dob }}</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4 br-1 bl-1">
						  <div class="description-block">
							<h5 class="description-header">Marital Status</h5>
							<span class="description-text">{{ $user->marital_status }}</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">Date of Joining</h5>
							<span class="description-text">{{ $user->join_date }}</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
					  </div>
					  <!-- /.row -->


					</div>
				  </div>

 </div>



@endsection