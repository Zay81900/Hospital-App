@extends('layouts.user_layout')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="row">
        <h2 class="display-4 fw-bold text-primary mb-5 mt-5" style="text-align: center">Book an Appointment</h2>
        <div class="col-md-6 mx-auto mt-5">
            <img src="images/appointment.jpg" class="appointment-image" alt="Doctor" style="width: 100%">
        </div>
        <div class="col-md-6">
            <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
                
                @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
                @endif
        
                @if(session('error'))
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    {{ session('error') }}
                </div>
                @endif
                
                <form action="{{ route('user.appointment.store') }}" method="POST" class="space-y-6" id="appointmentForm">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Personal Information -->
                        <div class="space-y-4">
                            <div class="form-group">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" name="patient_id" id="patient_id" value="{{ Auth::user()-> id }}" hidden>
                                <input type="text" name="name" id="name" required
                                    class="form-control"
                                    value="{{ old('name') }}">
                                <div id="nameError" class="form-error hidden"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" name="email" id="email" required
                                    class="form-control"
                                    value="{{ old('email') }}">
                                <div id="emailError" class="form-error hidden"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" name="phone" id="phone" required
                                    class="form-control"
                                    value="{{ old('phone') }}">
                                <div id="phoneError" class="form-error hidden"></div>
                            </div>
                        </div>
                        
                        <!-- Appointment Details -->
                        <div class="space-y-4">
                            {{-- <div class="form-group">
                                <label for="department" class="form-label">Department</label>
                                <select name="department" id="department" required
                                    class="form-control">
                                    <option value="">Select Department</option>
                                    <option value="cardiology" {{ old('department') == 'cardiology' ? 'selected' : '' }}>Cardiology</option>
                                    <option value="neurology" {{ old('department') == 'neurology' ? 'selected' : '' }}>Neurology</option>
                                    <option value="orthopedics" {{ old('department') == 'orthopedics' ? 'selected' : '' }}>Orthopedics</option>
                                    <option value="pediatrics" {{ old('department') == 'pediatrics' ? 'selected' : '' }}>Pediatrics</option>
                                    <option value="dermatology" {{ old('department') == 'dermatology' ? 'selected' : '' }}>Dermatology</option>
                                </select>
                                <div id="departmentError" class="form-error hidden"></div>
                            </div> --}}
                            
                            <div class="form-group">
                                <label for="doctor_id" class="form-label">Doctor</label>
                                <select name="doctor_id" id="doctor_id" required
                                    class="form-control">
                                    <option value="">Select Doctor</option>
                                    @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}" {{ old('doctor') == $doctor->id ? 'selected' : '' }}>
                                        {{ $doctor->doctor_name }}
                                    </option>
                                    @endforeach
                                </select>
                                <div id="doctorError" class="form-error hidden"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="appointment_date" class="form-label">Appointment Date</label>
                                <input type="date" name="appointment_date" id="appointment_date" required
                                    class="form-control"
                                    min="{{ date('Y-m-d') }}"
                                    value="{{ old('appointment_date') }}">
                                <div id="dateError" class="form-error hidden"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="appointment_time" class="form-label">Preferred Time</label>
                                <select name="appointment_time" id="appointment_time" required
                                    class="form-control">
                                    <option value="">Select Time</option>
                                    <option value="09:00" {{ old('appointment_time') == '09:00' ? 'selected' : '' }}>09:00 AM</option>
                                    <option value="10:00" {{ old('appointment_time') == '10:00' ? 'selected' : '' }}>10:00 AM</option>
                                    <option value="11:00" {{ old('appointment_time') == '11:00' ? 'selected' : '' }}>11:00 AM</option>
                                    <option value="12:00" {{ old('appointment_time') == '12:00' ? 'selected' : '' }}>12:00 PM</option>
                                    <option value="14:00" {{ old('appointment_time') == '14:00' ? 'selected' : '' }}>02:00 PM</option>
                                    <option value="15:00" {{ old('appointment_time') == '15:00' ? 'selected' : '' }}>03:00 PM</option>
                                    <option value="16:00" {{ old('appointment_time') == '16:00' ? 'selected' : '' }}>04:00 PM</option>
                                    <option value="17:00" {{ old('appointment_time') == '17:00' ? 'selected' : '' }}>05:00 PM</option>
                                </select>
                                <div id="timeError" class="form-error hidden"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="notes" class="form-label">Additional Information</label>
                        <textarea name="notes" id="notes" rows="4"
                            class="form-control"
                            placeholder="Please provide any additional information or concerns...">{{ old('message') }}</textarea>
                    </div>
                    
                    <div class="flex justify-end">
                        <button type="submit" id="submitButton"
                            class="btn btn-primary mb-5">
                            Book Appointment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<style>
.form-group {
    margin-bottom: 1rem;
}

.form-label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    color: #374151;
}

.form-control {
    display: block;
    width: 100%;
    padding: 0.5rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #374151;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #d1d5db;
    border-radius: 0.375rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.form-control:focus {
    border-color: #3b82f6;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25);
}

.form-control.is-invalid {
    border-color: #ef4444;
}

.form-error {
    color: #ef4444;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.5rem 1rem;
    font-size: 1rem;
    font-weight: 500;
    line-height: 1.5;
    text-align: center;
    text-decoration: none;
    white-space: nowrap;
    border-radius: 0.375rem;
    transition: all 0.15s ease-in-out;
}

.btn-primary {
    color: #fff;
    background-color: #3b82f6;
    border: 1px solid #3b82f6;
}

.btn-primary:hover {
    background-color: #2563eb;
    border-color: #2563eb;
}

.btn-primary:focus {
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25);
}

.btn-primary:disabled {
    opacity: 0.65;
    cursor: not-allowed;
}
</style>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('appointmentForm');
    const submitButton = document.getElementById('submitButton');
    const buttonText = document.getElementById('buttonText');
    const loadingSpinner = document.getElementById('loadingSpinner');

    // Real-time validation
    const inputs = form.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
        input.addEventListener('input', function() {
            validateField(this);
        });
        input.addEventListener('blur', function() {
            validateField(this);
        });
    });

    // Form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validate all fields before submission
        let isValid = true;
        inputs.forEach(input => {
            if (!validateField(input)) {
                isValid = false;
            }
        });

        if (!isValid) {
            return;
        }

        // Show loading state
        buttonText.classList.add('hidden');
        loadingSpinner.classList.remove('hidden');
        submitButton.disabled = true;

        // Submit form
        fetch(form.action, {
            method: 'POST',
            body: new FormData(form),
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = data.redirect;
            } else {
                // Show error messages
                Object.keys(data.errors).forEach(field => {
                    const errorDiv = document.getElementById(`${field}Error`);
                    if (errorDiv) {
                        errorDiv.textContent = data.errors[field][0];
                        errorDiv.classList.remove('hidden');
                        document.getElementById(field).classList.add('is-invalid');
                    }
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
        })
        .finally(() => {
            // Reset loading state
            buttonText.classList.remove('hidden');
            loadingSpinner.classList.add('hidden');
            submitButton.disabled = false;
        });
    });

    function validateField(field) {
        const errorDiv = document.getElementById(`${field.id}Error`);
        if (!errorDiv) return true;

        let isValid = true;
        let errorMessage = '';

        switch (field.id) {
            case 'name':
                if (!field.value.trim()) {
                    errorMessage = 'Name is required';
                    isValid = false;
                }
                break;
            case 'email':
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(field.value)) {
                    errorMessage = 'Please enter a valid email address';
                    isValid = false;
                }
                break;
            case 'phone':
                const phoneRegex = /^\+?[\d\s-]{10,}$/;
                if (!phoneRegex.test(field.value)) {
                    errorMessage = 'Please enter a valid phone number';
                    isValid = false;
                }
                break;
            case 'department':
            case 'doctor':
            case 'appointment_date':
            case 'appointment_time':
                if (!field.value) {
                    errorMessage = 'This field is required';
                    isValid = false;
                }
                break;
        }

        if (isValid) {
            errorDiv.classList.add('hidden');
            field.classList.remove('is-invalid');
        } else {
            errorDiv.textContent = errorMessage;
            errorDiv.classList.remove('hidden');
            field.classList.add('is-invalid');
        }

        return isValid;
    }

    // Dynamic doctor selection based on department
    document.getElementById('department').addEventListener('change', function() {
        const department = this.value;
        const doctorSelect = document.getElementById('doctor');
        
        // Show loading state
        doctorSelect.disabled = true;
        doctorSelect.innerHTML = '<option value="">Loading doctors...</option>';
        
        // Fetch doctors based on selected department
        fetch(`/api/doctors/${department}`)
            .then(response => response.json())
            .then(data => {
                doctorSelect.innerHTML = '<option value="">Select Doctor</option>';
                data.forEach(doctor => {
                    const option = document.createElement('option');
                    option.value = doctor.id;
                    option.textContent = doctor.name;
                    doctorSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error:', error);
                doctorSelect.innerHTML = '<option value="">Error loading doctors</option>';
            })
            .finally(() => {
                doctorSelect.disabled = false;
            });
    });
});
</script>
@endpush
@endsection