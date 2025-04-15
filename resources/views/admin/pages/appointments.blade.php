@extends('layouts.admin_layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Appointments Management</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hovered" id="appointments-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Patient Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach($appointments as $appointment)
                                <tr style="color: black;">
                                    <td>{{ $appointment->id }}</td>
                                    <td></td>
                                    {{-- <td>{{ $appointment->patient->name }}</td> --}}
                                    <td>{{ $appointment->appointment_date }}</td>
                                    <td>{{ $appointment->appointment_time }}</td>
                                    <td>
                                        <span class="text-dark badge badge-{{ $appointment->status == 'pending' ? 'warning' : ($appointment->status == 'confirmed' ? 'success' : 'danger') }}">
                                            {{ ucfirst($appointment->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-success confirm-btn" data-id="{{ $appointment->id }}" {{ $appointment->status == 'confirmed' ? 'disabled' : '' }}>
                                            Confirm
                                        </button>
                                        <button class="btn btn-sm btn-danger cancel-btn" data-id="{{ $appointment->id }}" {{ $appointment->status == 'cancelled' ? 'disabled' : '' }}>
                                            Cancel
                                        </button>
                                        <button class="btn btn-sm btn-info view-btn" data-id="{{ $appointment->id }}">
                                            View Details
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- View Details Modal -->
<div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Appointment Details</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Details will be loaded here via AJAX -->
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    // Initialize DataTable
    $('#appointments-table').DataTable({
        order: [[2, 'desc']], // Sort by date column by default
    });

    // Confirm Appointment
    $('.confirm-btn').click(function() {
        let appointmentId = $(this).data('id');
        updateAppointmentStatus(appointmentId, 'confirmed');
    });

    // Cancel Appointment
    $('.cancel-btn').click(function() {
        let appointmentId = $(this).data('id');
        if(confirm('Are you sure you want to cancel this appointment?')) {
            updateAppointmentStatus(appointmentId, 'cancelled');
        }
    });

    // View Appointment Details
    $('.view-btn').click(function() {
        let appointmentId = $(this).data('id');
        loadAppointmentDetails(appointmentId);
    });

    function updateAppointmentStatus(id, status) {
        $.ajax({
            url: `/admin/appointments/${id}/status`,
            method: 'POST',
            data: {
                status: status,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if(response.success) {
                    location.reload();
                } else {
                    alert('Error updating appointment status');
                }
            }
        });
    }

    function loadAppointmentDetails(id) {
        $.ajax({
            url: `/admin/appointments/${id}`,
            method: 'GET',
            success: function(response) {
                $('#appointmentModal .modal-body').html(response);
                $('#appointmentModal').modal('show');
            }
        });
    }
});
</script>
@endpush
@endsection