@extends('layouts.user_layout')

@section('content')
<div class="container py-5">
    <!-- Page Header -->
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-primary">Our Medical Experts</h1>
        <p class="lead text-muted">Find the right specialist for your healthcare needs</p>
    </div>

    <!-- Search and Filter Section -->
    <div class="row mb-5">
        <div class="col-md-8">
            <div class="input-group input-group-lg shadow-sm">
                <input type="text" class="form-control border-0" placeholder="Search doctors by name or specialty...">
                <button class="btn btn-primary px-4" type="button">
                    <i class="fas fa-search"></i> Search
                </button>
            </div>
        </div>
        <div class="col-md-4">
            <select class="form-select form-select-lg shadow-sm border-0">
                <option selected>Filter by Department</option>
                <option>Cardiology</option>
                <option>Neurology</option>
                <option>Pediatrics</option>
                <option>Orthopedics</option>
            </select>
        </div>
    </div>

    <!-- Doctors Grid -->
    <div class="row g-4">
        <!-- Doctor Card 1 -->
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm hover-shadow transition-all">
                <div class="card-body text-center p-4">
                    <div class="position-relative mb-4">
                        <img src="https://via.placeholder.com/150" class="rounded-circle doctor-image" alt="Doctor">
                        <div class="position-absolute bottom-0 end-0">
                            <span class="badge bg-success rounded-circle p-2"><i class="fas fa-check"></i></span>
                        </div>
                    </div>
                    <h5 class="card-title fw-bold mb-2">Dr. Sarah Johnson</h5>
                    <p class="text-primary mb-3">Cardiologist</p>
                    <div class="d-flex justify-content-center gap-2 mb-3">
                        <span class="badge bg-light text-primary border">Heart Specialist</span>
                        <span class="badge bg-light text-primary border">15+ Years Experience</span>
                    </div>
                    <p class="card-text text-muted mb-4">Specialized in treating cardiovascular diseases and providing preventive care.</p>
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary btn-lg">View Profile</button>
                        <button class="btn btn-primary btn-lg">Book Appointment</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Doctor Card 2 -->
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm hover-shadow transition-all">
                <div class="card-body text-center p-4">
                    <div class="position-relative mb-4">
                        <img src="https://via.placeholder.com/150" class="rounded-circle doctor-image" alt="Doctor">
                        <div class="position-absolute bottom-0 end-0">
                            <span class="badge bg-success rounded-circle p-2"><i class="fas fa-check"></i></span>
                        </div>
                    </div>
                    <h5 class="card-title fw-bold mb-2">Dr. Michael Chen</h5>
                    <p class="text-primary mb-3">Neurologist</p>
                    <div class="d-flex justify-content-center gap-2 mb-3">
                        <span class="badge bg-light text-primary border">Brain Specialist</span>
                        <span class="badge bg-light text-primary border">12+ Years Experience</span>
                    </div>
                    <p class="card-text text-muted mb-4">Expert in treating neurological disorders and brain-related conditions.</p>
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary btn-lg">View Profile</button>
                        <button class="btn btn-primary btn-lg">Book Appointment</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Doctor Card 3 -->
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm hover-shadow transition-all">
                <div class="card-body text-center p-4">
                    <div class="position-relative mb-4">
                        <img src="https://via.placeholder.com/150" class="rounded-circle doctor-image" alt="Doctor">
                        <div class="position-absolute bottom-0 end-0">
                            <span class="badge bg-success rounded-circle p-2"><i class="fas fa-check"></i></span>
                        </div>
                    </div>
                    <h5 class="card-title fw-bold mb-2">Dr. Emily Rodriguez</h5>
                    <p class="text-primary mb-3">Pediatrician</p>
                    <div class="d-flex justify-content-center gap-2 mb-3">
                        <span class="badge bg-light text-primary border">Child Specialist</span>
                        <span class="badge bg-light text-primary border">10+ Years Experience</span>
                    </div>
                    <p class="card-text text-muted mb-4">Dedicated to providing comprehensive healthcare for children of all ages.</p>
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary btn-lg">View Profile</button>
                        <button class="btn btn-primary btn-lg">Book Appointment</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Doctor Card 4 -->
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm hover-shadow transition-all">
                <div class="card-body text-center p-4">
                    <div class="position-relative mb-4">
                        <img src="https://via.placeholder.com/150" class="rounded-circle doctor-image" alt="Doctor">
                        <div class="position-absolute bottom-0 end-0">
                            <span class="badge bg-success rounded-circle p-2"><i class="fas fa-check"></i></span>
                        </div>
                    </div>
                    <h5 class="card-title fw-bold mb-2">Dr. David Kim</h5>
                    <p class="text-primary mb-3">Orthopedic Surgeon</p>
                    <div class="d-flex justify-content-center gap-2 mb-3">
                        <span class="badge bg-light text-primary border">Bone Specialist</span>
                        <span class="badge bg-light text-primary border">18+ Years Experience</span>
                    </div>
                    <p class="card-text text-muted mb-4">Specialized in treating bone and joint conditions with advanced surgical techniques.</p>
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary btn-lg">View Profile</button>
                        <button class="btn btn-primary btn-lg">Book Appointment</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    {{-- <div class="row mt-5">
        <div class="col-12">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link border-0 mx-1" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                    </li>
                    <li class="page-item active"><a class="page-link border-0 mx-1 rounded-circle" href="#">1</a></li>
                    <li class="page-item"><a class="page-link border-0 mx-1 rounded-circle" href="#">2</a></li>
                    <li class="page-item"><a class="page-link border-0 mx-1 rounded-circle" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link border-0 mx-1" href="#"><i class="fas fa-chevron-right"></i></a>
                    </li>
                </ul>
            </nav>  
        </div>
    </div> --}}
</div>


@endsection
