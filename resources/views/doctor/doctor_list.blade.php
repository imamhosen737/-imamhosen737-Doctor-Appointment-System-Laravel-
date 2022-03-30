@extends('layout.app')
@section('content')
    <div class="container">
        <h2 class="text-center text-success">Doctor List</h2>
		<P>
		<a class="btn btn-primary" href="{{ route('doctor.create') }}">Add Doctor</a>
		</P>

		<table class="table table-success table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    <th>SL</th>
                    <th>Department</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Fee</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $i => $doctor_data)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $doctor_data->department->name }}</td>
                        <td>{{ $doctor_data->name }}</td>
                        <td>{{ $doctor_data->phone }}</td>
                        <td>{{ $doctor_data->fee }}</td>
                        <td>
                            <form action="{{ route('doctor.destroy', $doctor_data->id) }}" method="post"
                                id="delete{{ $doctor_data->id }}">
                                @csrf
                                @method('delete')
                                <a href="{{ route('doctor.edit', $doctor_data->id) }}" class="btn btn-success">Edit</a> |
                                <a title="delete"
                                    onclick="document.getElementById('delete{{ $doctor_data->id }}').submit()" 
                                    class="btn btn-danger">Delete</a>
							</form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
	@endsection

