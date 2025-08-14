@extends('layout')
@section('title', 'Appointment Management')
@section('header', 'Appointment list')

@section('content')
    <div class="card">
        <div class="card-body">
            <div id="appointment_table_wrapper" class="dataTables_wrapper dt-bootstrap4">

                <div class="row">
                    <div class="col-sm-12">
                        <table id="appointment_table" class="table table-bordered table-striped dataTable dtr-inline"
                            role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">
                                        Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">
                                        Start time</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                         end time</th>
                                     <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                         colspan="1" aria-label="Engine version: activate to sort column ascending">
                                         Patient Name</th>
                                     <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                         colspan="1" aria-label="Engine version: activate to sort column ascending">
                                         reason</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                        actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 1;
                                @endphp

                                @foreach ($appointments as $appointment)
                                    <tr role="row" class="{{ $counter % 2 == 0 ? 'even' : 'odd' }}">
                                        <td class="dtr-control sorting_1" tabindex="0">
                                            {{ $appointment['date'] }}</td>
                                        <td>{{ $appointment['start_time'] }}</td>
                                        <td>{{ $appointment['end_time'] }}</td>
                                         <td>{{ $appointment->patient->name }} {{ $appointment->patient->lastname }}</td>
                                         <td class="truncate">{{ $appointment['reason'] }}</td>

                                        <td
                                            style="padding-right: -3.25rem;border-right-width: 0px;height: 37px;width: 95.833px;">
                                            <a href="{{ route('appointment.edit', $appointment->id) }}"
                                                class="btn btn-info btn-sm"
                                                style="height: 41px;min-width: 46px;margin: 0px;padding: 0px;"
                                                title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('appointment.destroy', $appointment->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this appointment?')"
                                                    style="height: 41px;min-width: 46px;margin: 0px;padding: 0px;"
                                                    title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                    @php
                                        $counter++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="add-btn-container">
                <button type="button" class="  btn-success add-btn" data-toggle="modal"
                    data-target="#modal_add_appointment">
                    +
                </button>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    @include('modals._add_appointment')

@endsection
