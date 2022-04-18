@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <form action="{{ route('appointment.store') }}" method="POST">
                    @csrf

                    <div class="col">
                        <label for="appointment_date">Appointment Date</label>
                        <input type="date" name="appointment_date" value="{{ old('appointment_date') }}" class="form-control">
                            @error('appointment_date')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                    </div>

                    <div class="col">
                        <label for="department">Select Department</label>
                        <select class="form-control" name="department" id="department">
                            <option value="0">Select</option>
                                @foreach ($department as $d)
                                    <option value="{{ $d->id }}">{{ $d->name }}</option>
                                @endforeach
                        </select>
                               @error('department')
                                   <span style="color: red">{{ $message }}</span>
                               @enderror
                     </div>

                    <div class="col">
                        <label for="doctor_id">Select Doctor</label>
                        <span id="dr">
                            <select class="form-control" name="doctor_id" id="doctor_id">
                                <option value="0">Select</option>
                            </select>
                        </span>
                           @error('doctor_id')
                               <span style="color: red">{{ $message }}</span>
                           @enderror
                    </div>

                    <div class="col mb-2">
                        <label for="fee">Fee</label>
                        <input type="text" value="{{ old('fee') }}" name="fee" id="fee" class="form-control" placeholder="Fee">
                    </div>
                        @error('fee')
                         <span style="color: red">{{ $message }}</span>
                        @enderror

                    <h5 class="text-success">Patien Information</h5>
                    <div class="row mt-2 mb-2">
                        <div class="col">
                            <input type="text" value="{{ old('patient_name') }}" name="patient_name" id="patient_name" class="form-control"
                                placeholder="Patien Name">
                        </div>
                           @error('patient_name')
                             <span style="color: red">{{ $message }}</span>
                           @enderror

                        <div class="col">
                            <input type="text" value="{{ old('patient_phone') }}" name="patient_phone" id="patient_phone" class="form-control"
                                placeholder="Patien Phone">
                        </div>
                             @error('patient_phone')
                                <span style="color: red">{{ $message }}</span>
                             @enderror
                    </div>

                    <h5 class="text-success">Payment</h5>
                    <div class="row mt-2">
                        <div class="col">
                            <input type="text" value="{{ old('total_fee') }}" name="total_fee" id="total_fee" class="form-control"
                                placeholder="Total Fee">
                        </div>
                        @error('total_fee')
                        <span style="color: red">{{ $message }}</span>
                       @enderror
                        <div class="col">
                            <input type="text" value="{{ old('paid_amount') }}" name="paid_amount" id="paid_amount" class="form-control"
                                placeholder="Paid Amount">
                        </div>
                            @error('paid_amount')
                              <span style="color: red">{{ $message }}</span>
                            @enderror
                    </div>

                    <div class="row mt-1">
                        <div class="col">
                            <input type="submit" class="btn btn-primary btn-block">
                        </div>
                    </div>

                </form>
            </div>


            <div class="col-sm-6 bg-secondary mt-2 text-white">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>App. Date</th>
                            <th>Doctor</th>
                            <th>Fee</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($app as $i => $d)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $d->appointment_date }}</td>
                                <td>{{ $d->doctor->name }}</td>
                                <td>{{ $d->doctor->fee }}</td>
                                <td>
                                    <form action="{{ route('appointment.destroy', $d->id) }}" method="post"
                                        id="delete{{ $d->id }}">
                                        @csrf
                                        @method('delete')
                                        <a title="delete"
                                            onclick="document.getElementById('delete{{ $d->id }}').submit()"
                                            class="btn btn-danger">X</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#department').change(function() {
            let dpt = $(this).val()
            $.ajax({
                url: '{{ route('get_drs') }}',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: dpt,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    let ht = '<select class="form-control" name="doctor_id" id="drss">'
                    ht += '<option value="">Select Doctor</option>'
                    $.each(data, function(k, v) {
                        ht += '<option value="' + v.id + '">' + v.name + '</option>'
                    })
                    ht += '</select>'
                    $('#dr').html(ht)
                }
            })
        })
        $(document).on('change', '#drss', function() {
            let id = $(this).val()
            $.ajax({
                url: '{{ route('get_dr_fee') }}',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    $('#fee').val(data.fee)
                    $('#total_fee').val(data.fee)
                }
            })
        })
    })
</script>
