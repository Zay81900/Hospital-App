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
                                    <th style="min-width: 190px; width: 190px;">Doctor Name</th>
                                    <th style="min-width: 190px; width: 190px;">Date</th>
                                    <th style="min-width: 150px; width: 150px;">Time</th>
                                    <th style="min-width: 140px; width: 140px;">Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach($appointments as $appointment)
                                <tr style="color: black;">
                                    <td>{{ $appointment->id }}</td>
                                    <td>{{ $appointment->patient->username }}</td>
                                    <td>{{ $appointment->doctor->doctor_name }}</td>
                                    <td>{{ $appointment->appointment_date }}</td>
                                    <td>{{ $appointment->appointment_time }}</td>
                                    <td>
                                        <span class="badge rounded-pill p-2 text-dark">
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

<!-- Updated Modal with detailed appointment information -->
<div class="modal fade" id="appointmentDetailsModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Appointment Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="appointment-info">
                    <div class="row mb-3">
                        <div class="col-4 fw-bold">Patient Name:</div>
                        <div class="col-8" id="modal-patient-name"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4 fw-bold">Doctor Name:</div>
                        <div class="col-8" id="modal-doctor-name"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4 fw-bold">Date:</div>
                        <div class="col-8" id="modal-date"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4 fw-bold">Time:</div>
                        <div class="col-8" id="modal-time"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4 fw-bold">Status:</div>
                        <div class="col-8">
                            <span id="modal-status" class="badge"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const viewButtons = document.querySelectorAll('.view-btn');
    viewButtons.forEach(button => {
        button.addEventListener('click', function() {
            const row = this.closest('tr');
            
            // Get data from the table row
            const patientName = row.cells[1].textContent.trim();
            const doctorName = row.cells[2].textContent.trim();
            const date = row.cells[3].textContent.trim();
            const time = row.cells[4].textContent.trim();
            const status = row.cells[5].querySelector('span').textContent.trim();
            
            // Update modal content
            document.getElementById('modal-patient-name').textContent = patientName;
            document.getElementById('modal-doctor-name').textContent = doctorName;
            document.getElementById('modal-date').textContent = date;
            document.getElementById('modal-time').textContent = time;
            
            // Update status with appropriate badge color
            const statusElement = document.getElementById('modal-status');
            statusElement.textContent = status;
            
            // Set badge color based on status
            statusElement.className = 'badge'; // Reset class
            if (status.toLowerCase() === 'pending') {
                statusElement.classList.add('bg-warning', 'text-dark');
            } else if (status.toLowerCase() === 'confirmed') {
                statusElement.classList.add('bg-success');
            } else if (status.toLowerCase() === 'cancelled') {
                statusElement.classList.add('bg-danger');
            }
            
            // Show modal
            const myModal = new bootstrap.Modal(document.getElementById('appointmentDetailsModal'));
            myModal.show();
        });
    });

    // Get CSRF token
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Confirm button functionality
    const confirmButtons = document.querySelectorAll('.confirm-btn');
    confirmButtons.forEach(button => {
        button.addEventListener('click', function() {
            const appointmentId = this.getAttribute('data-id');
            const row = this.closest('tr');
            
            if(confirm('Are you sure you want to confirm this appointment?')) {
                // Send AJAX request to update status
                $.ajax({
                    url: `/admin/appointments/${appointmentId}/update-status`,
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: {
                        status: 'confirmed'
                    },
                    success: function(response) {
                        if(response.success) {
                            // Update the status badge
                            const statusBadge = row.querySelector('td:nth-child(6) span');
                            statusBadge.className = 'text-dark badge badge-success';
                            statusBadge.textContent = 'Confirmed';
                            
                            // Disable confirm button and update cancel button
                            button.setAttribute('disabled', true);
                            row.querySelector('.cancel-btn').removeAttribute('disabled');
                            
                            // Show success message
                            alert('Appointment confirmed successfully!');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        alert('Error updating appointment status');
                    }
                });
            }
        });
    });

    // Cancel button functionality
    const cancelButtons = document.querySelectorAll('.cancel-btn');
    cancelButtons.forEach(button => {
        button.addEventListener('click', function() {
            const appointmentId = this.getAttribute('data-id');
            const row = this.closest('tr');
            
            if(confirm('Are you sure you want to cancel this appointment?')) {
                $.ajax({
                    url: `/admin/appointments/${appointmentId}/update-status`,
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: {
                        status: 'cancelled'
                    },
                    success: function(response) {
                        if(response.success) {
                            // Update the status badge
                            const statusBadge = row.querySelector('td:nth-child(6) span');
                            statusBadge.className = 'text-dark badge badge-danger';
                            statusBadge.textContent = 'Cancelled';
                            
                            // Disable cancel button and update confirm button
                            button.setAttribute('disabled', true);
                            row.querySelector('.confirm-btn').removeAttribute('disabled');
                            
                            // Show success message
                            alert('Appointment cancelled successfully!');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        alert('Error updating appointment status');
                    }
                });
            }
        });
    });
});
</script>
@endpush