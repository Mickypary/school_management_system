@extends('admin.admin_master')

@section('admin')

 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Student Group</h3>
				  <!-- <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
				  <a href="{{ route('student.group.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Student Group</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
						<thead>
							<tr>
								<th width="5%">SL</th>
								<th>Name</th>
								<th width="15%">Action</th>
							</tr>
						</thead>
						<tbody>

							@foreach($allData as $key => $group)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $group->name }}</td>
								<td>
									<a href="{{ route('student.group.edit', $group->id) }}" class="btn btn-info">Edit</a>
									<a href="{{ route('student.group.delete', $group->id) }}" class="btn btn-danger" id="delete">Delete</a>
								</td>
							</tr>
							@endforeach
						</tbody>				  
						<tfoot>
							<!-- <tr>
								<th>Name</th>
								<th>Position</th>
								<th>Office</th>
								<th>Age</th>
								<th>Start date</th>
								<th>Salary</th>
							</tr> -->
						</tfoot>
					</table>
					</div>              
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->  



@endsection