@extends('layout.app')
@section('content')

	 <div class="container">
		 <h2 class="text-center text-success mt-2 mb-2">Update Doctor's Informations</h2>
		<form action="{{ route('doctor.update',$doctor->id) }}" method="post">
			@csrf
			@method('PUT')

			<div class="row">
			  <div class="col">
				  <label for="department_id">Department</label>
				<select class="form-control" name="department_id" id="department_id">
					<option value="0">Select Department</option>
					@foreach ($dpt as $d)
						@if (old('department_id'))
						  <option value="{{ $d->id }}" {{ (old('department_id')==$d->id)?'selected':'' }}>{{ $d->name }}</option>	
						@else
						  <option value="{{ $d->id }}" {{ ($doctor->department_id ==$d->id)?'selected':'' }}>{{ $d->name }}</option>
						@endif
					@endforeach
				</select>
				      @error('customer_id')
					    <span style="color: red">{{ $message }}</span>
				      @enderror
			  </div>

			  <div class="col">
				  <label for="name">Name</label>
				<input type="text" value="@if(old($doctor->name)){{old($doctor->name)}} @else{{$doctor->name}}@endif" class="form-control" placeholder="Enter Name" name="name">
				@error('name')
					<span style="color: red">{{ $message }}</span>
				@enderror
			  </div>
			</div>

			<div class="row mt-2">
				<div class="col">
					<label for="phone">Phone</label>
					<input type="text" value="@if(old($doctor->phone)){{old($doctor->phone)}} @else{{$doctor->phone}}@endif" class="form-control" placeholder="Phone" name="phone">
					   @error('phone')
					     <span style="color: red">{{ $message }}</span>
				       @enderror
				</div>
				<div class="col">
					  <label for="fee">Fee</label>
					  <input type="text" value="@if(old($doctor->fee)){{old($doctor->fee)}} @else{{$doctor->fee}}@endif" class="form-control" placeholder="Fee" name="fee">
					    @error('fee')
					      <span style="color: red">{{ $message }}</span>
				        @enderror
				</div>
			</div>

			<div class="row">
				<div class="d-grid">
					<label>&nbsp;</label>
					<input type="submit" value="Save" class="btn btn-success btn-block"></input>
				</div>
			</div>
		  </form>
	 </div>
@endsection