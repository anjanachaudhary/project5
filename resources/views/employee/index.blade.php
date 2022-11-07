@extends('list')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Student</b></div>
			<div class="col col-md-6">
				<a href="{{ route('employees.create') }}" class="btn btn-success btn-sm float-end">create</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>firstname</th>
                        <th>lastname</th>
                        <th>email</th>
                        <th>address</th>
                        <th>gender</th>
                        <th>branch</th>
                        <th>hobby</th>
						<td><img src="/images/{{ $employee->image }}" width="100px"></td>
                        <th>action</th>
                    </tr>
			

				@foreach($employee as $row)

					<tr>
					    <td>{{ $row->id }}</td>
						<td>{{ $row->firstname }}</td>
                        <td>{{ $row->lastname }}</td>
                        <td>{{ $row->address }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->branch }}</td>
						<td>{{ $row->hobby }}</td>
						<td>{{ $row->gender }}</td>
						<td><img src="/images/{{ $employee->image }}" width="100px"></td>
						<td>
							<form method="post" action="{{ route('employeess.destroy', $row->id) }}">
								@csrf
								@method('DELETE')
								<a href="{{ route('employees.show', $row->id) }}" class="btn btn-primary btn-sm">View</a>
								<a href="{{ route('employees.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
								<input type="submit" class="btn btn-danger btn-sm" value="Delete" />
							</form>
							
						</td>
					</tr>

				@endforeach

			@else
				<tr>
					<td colspan="5" class="text-center">No Data Found</td>
				</tr>
			@endif
		</table>
		{!! $data->links() !!}
	</div>
</div>

@endsection
