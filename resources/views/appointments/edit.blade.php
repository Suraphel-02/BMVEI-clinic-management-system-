@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Appointment</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('appointment.update', $appointment->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row mb-3">
                            <label for="patient_id" class="col-md-4 col-form-label text-md-right">Patient</label>
                            <div class="col-md-6">
                                <select name="patient_id" id="patient_id" class="form-control" required>
                                    @foreach($patients as $patient)
                                        <option value="{{ $patient->id }}" {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>
                                            {{ $patient->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="doctor_id" class="col-md-4 col-form-label text-md-right">Doctor</label>
                            <div class="col-md-6">
                                <select name="doctor_id" id="doctor_id" class="form-control" required>
                                    @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}" {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>
                                            {{ $doctor->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="appointment_date" class="col-md-4 col-form-label text-md-right">Appointment Date</label>
                            <div class="col-md-6">
                                <input type="datetime-local" class="form-control" name="appointment_date" value="{{ date('Y-m-d\TH:i', strtotime($appointment->appointment_date)) }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="start_time" class="col-md-4 col-form-label text-md-right">Start Time</label>
                            <div class="col-md-6">
                                <input type="datetime-local" class="form-control" name="start_time" value="{{ date('Y-m-d\TH:i', strtotime($appointment->start_time)) }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="end_time" class="col-md-4 col-form-label text-md-right">End Time</label>
                            <div class="col-md-6">
                                <input type="datetime-local" class="form-control" name="end_time" value="{{ date('Y-m-d\TH:i', strtotime($appointment->end_time)) }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
                            <div class="col-md-6">
                                <select name="status" id="status" class="form-control" required>
                                    <option value="scheduled" {{ $appointment->status == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                                    <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="reason" class="col-md-4 col-form-label text-md-right">Reason</label>
                            <div class="col-md-6">
                                <textarea name="reason" id="reason" class="form-control" rows="3">{{ $appointment->reason }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="notes" class="col-md-4 col-form-label text-md-right">Notes</label>
                            <div class="col-md-6">
                                <textarea name="notes" id="notes" class="form-control" rows="3">{{ $appointment->notes }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Appointment
                                </button>
                                <a href="{{ route('appointment.index') }}" class="btn btn-secondary">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
