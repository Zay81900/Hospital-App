@extends('layouts.admin_layout')

@section('content')
<div class="container">
    <h1>Welcome, {{ $doctor->doctor_name }}</h1>
    
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Appointments</h5>
                    <p class="card-text">{{ $stats['total_appointments'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pending Appointments</h5>
                    <p class="card-text">{{ $stats['pending_appointments'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Completed Appointments</h5>
                    <p class="card-text">{{ $stats['completed_appointments'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <h3>Recent Appointments</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Patient</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->user->username }}</td>
                    <td>{{ $appointment->appointment_date }}</td>
                    <td>{{ $appointment->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 