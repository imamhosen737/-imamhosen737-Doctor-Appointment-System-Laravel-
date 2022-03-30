@extends('layout.app')
@section('content')
	
     <!-- datatable responsive css-->
     <link type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet">
     
    <div class="container">
        <h2 class="text-center text-success">Appointment List</h2>
		<table class="table table-success table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    <th>SL</th>
                    <th>Appointment No</th>
                    <th>Appointment Date</th>
                    <th>Doctor</th>
                    <th>Patien Name</th>
                    <th>Patien Phone</th>
                    <th>Total Fee</th>
                    <th>Paid Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($app_data as $i => $data)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $data->appointment_no }}</td>
                        <td>{{ $data->appointment_date }}</td>
                        <td>{{ $data->doctor_id  }}</td>
                        <td>{{ $data->patient_name }}</td>
                        <td>{{ $data->patient_phone }}</td>
                        <td>{{ $data->total_fee }}</td>
                        <td>{{ $data->paid_amount }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $app_data->links() !!}
    </div>
	@endsection
