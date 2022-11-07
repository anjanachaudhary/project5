@extends('list')

@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Student </b></div>
			<div class="col col-md-6">
				<a href="{{ route('employees.index') }}" class="btn btn-primary btn-sm float-end">View </a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>id</b></label>
			<div class="col-sm-10">
				{{ $employees->id}}
			</div>
		</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b> firstName</b></label>
			<div class="col-sm-10">
				{{ $employees->firstname }}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b> lastName</b></label>
			<div class="col-sm-10">
				{{ $employees->lastname }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>email</b></label>
			<div class="col-sm-10">
				{{ $employees->email }}
			</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>address</b></label>
			<div class="col-sm-10">
				{{ $employees->address }}
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b> Gender</b></label>
			<div class="col-sm-10">
				{{ $employees->gender }}
			</div>
         <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>branch</b></label>
			<div class="col-sm-10">
				{{ $employees->branch }}
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>hobby</b></label>
			<div class="col-sm-10">
				{{ $employees->hobby }}
		</div>

		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Image</b></label>
			<div class="col-sm-10">
			<img src="/images/{{ $employees->image }}" width="100px">
			      {{$employees->image}}
			</div>
		</div>
	</div>
</div>

@endsection('content')
