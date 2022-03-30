@extends('layout.app')
@section('content')
	 <div class="container">
		 <h2 class="text-center text-success mt-2 mb-2">Add New Doctor</h2>

		<form action="{{ route('doctor.store') }}" method="post">
			@csrf

			<div class="row">
			  <div class="col">
				  <label for="department_id">Department</label>
				<select class="form-control" name="department_id" id="department_id">
					<option value="0">Select Department</option>
					@foreach ($dpt as $d)
						<option value="{{ $d->id }}" {{ (old('department_id')==$d->id)?'selected':'' }}>{{ $d->name }}</option>
					@endforeach
				</select>
				   @error('customer_id')
					  <span style="color: red">{{ $message }}</span>
				   @enderror
			  </div>

			  <div class="col">
				  <label for="name">Name</label>
				<input type="text" value="{{ old('name') }}" class="form-control" placeholder="Name" name="name">
				    @error('name')
					    <span style="color: red">{{ $message }}</span>
				    @enderror
			  </div>
			</div>

			<div class="row mt-2">
				<div class="col">
					<label for="phone">Phone</label>
					<input type="text" value="{{ old('phone') }}" class="form-control" placeholder="Phone" name="phone">
					   @error('phone')
					     <span style="color: red">{{ $message }}</span>
				       @enderror
				</div>

				<div class="col">
					<label for="fee">Fee</label>
					<input type="text" value="{{ old('fee') }}" class="form-control" placeholder="Fee" name="fee">
					    @error('fee')
					      <span style="color: red">{{ $message }}</span>
				        @enderror
				</div>
			</div>

			<div class="row">
				<div class="d-grid">
					<label>&nbsp;</label>
					<input type="submit" class="btn btn-primary btn-block"></input>
				</div>
			</div>
		  </form>
	 </div>
	 @endsection
