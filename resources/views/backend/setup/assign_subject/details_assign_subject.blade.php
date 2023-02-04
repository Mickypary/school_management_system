@extends('admin.admin_master')

@section('admin')

 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Assign Subject Details</h3>
				  <!-- <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
				  <a href="{{ route('fee.amount.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Assign Subject</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<h4><strong>Class: </strong>{{ $detailsData[0]['student_class']['name'] }}</h4>
					<div class="table-responsive">
					  <table id="" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
						<thead class="thead-light">
							<tr>
								<th width="5%">SL</th>
								<th>Subject</th>
								<th>Full Mark</th>
								<th>Pass Mark</th>
								<th>Subjective Mark</th>
							</tr>
						</thead>
						<tbody>

							@foreach($detailsData as $key => $details)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $details['subject']['name'] }}</td>
								<td>{{ $details->full_mark }}</td>
								<td>{{ $details->pass_mark }}</td>
								<td>{{ $details->subjective_mark }}</td>
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