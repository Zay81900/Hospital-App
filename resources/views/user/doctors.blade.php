@extends('layouts.user_layout')

@section('content')

<div class="container py-5">
    <!-- Page Header with Animation -->
    <div class="text-center mb-5 animate__animated animate__fadeIn">
        <h1 class="display-4 fw-bold text-primary">Our Medical Experts</h1>
        <p class="lead text-muted">Find the right specialist for your healthcare needs</p>
    </div>

    <!-- Search and Filter Section with Enhanced UI -->
    <div class="row mb-5">
        <div class="col-md-8">
            <form action="{{ route('doctors.list') }}" method="GET" class="input-group input-group-lg shadow-sm rounded-pill overflow-hidden h-80">
                <input type="text" name="search" class="searchBar form-control border-0 ps-4" placeholder="Search doctors by name or specialization..." value="{{ request('search') }}">
                <button class="btn btn-primary px-4 rounded-end" type="submit">
                    <i class="fas fa-search"></i> Search
                </button>
            </form>
        </div>
        <div class="col-md-4">
            <form action="{{ route('doctors.list') }}" method="GET" id="filterForm" class="h-50">
                <div class="form-group h-50">
                    <select name="specialization" class="form-control form-control-lg h-100" onchange="this.form.submit()">
                        <option value="">All Specializations</option>
                        <option value="Cardiologist" {{ request('specialization') === 'Cardiologist' ? 'selected' : '' }}>Cardiology</option>
                        <option value="Neurologist" {{ request('specialization') === 'Neurologist' ? 'selected' : '' }}>Neurology</option>
                        <option value="Pediatrics" {{ request('specialization') === 'Pediatrics' ? 'selected' : '' }}>Pediatrics</option>
                        <option value="Orthopedic Surgeon" {{ request('specialization') === 'Orthopedic Surgeon' ? 'selected' : '' }}>Orthopedics</option>
                    </select>
                </div>
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
            </form>
        </div>
    </div>

    <!-- Doctors Grid with Enhanced Cards -->
    <div class="row g-4 mb-5">
        @if(isset($doctors) && count($doctors) > 0)
            @foreach ($doctors as $doctor)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-shadow transition-all doctor-card">
                    <div class="card-body text-center p-4">
                        <div class="position-relative mb-4">
                            <div class="doctor-image-container">
                                @if($doctor->profile_image)
                                    <img src="{{ asset("images/doctors/{$doctor->profile_image}") }}" class="rounded-circle doctor-image" alt="{{ $doctor->doctor_name }}">
                                @else
                                    <img src="images/doctors/default.jpeg" class="rounded-circle doctor-image" alt="Doctor">
                                @endif
                                <div class="doctor-overlay">
                                    <div class="doctor-social">
                                        <a href="#" class="text-white me-2"><i class="fab fa-linkedin"></i></a>
                                        <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                                        <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="position-absolute bottom-0 end-0">
                                <span class="badge bg-{{ $doctor->status === 'active' ? 'success' : 'danger' }} rounded-circle p-2">
                                    <i class="fas fa-{{ $doctor->status === 'active' ? 'check' : 'times' }} text-dark"></i>
                                </span>
                            </div>
                        </div>
                        <h5 class="card-title fw-bold mb-2">{{ $doctor->doctor_name }}</h5>
                        <p class="text-primary mb-3">{{ $doctor->specialization }}</p>
                        <div class="d-flex justify-content-center gap-2 mb-3">
                            <span class="badge bg-light text-primary border">{{ $doctor->qualification }}</span>
                            <span class="badge bg-light text-primary border">{{ $doctor->experience }} Years Experience</span>
                        </div>
                        <p class="card-text text-muted mb-4">{{ $doctor->bio ?? 'Specialized healthcare professional' }}</p>
                        <div class="d-grid gap-2">
                            <a href="#" class="btn btn-outline-primary btn-lg mb-2 view-profile-btn">View Profile</a>
                            <a href="#" class="btn btn-primary btn-lg book-appointment-btn">Book Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="col-12 text-center">
                <div class="no-results p-5">
                    <i class="fas fa-search fa-3x text-muted mb-3"></i>
                    <p class="text-muted">No doctors found matching your criteria.</p>
                </div>
            </div>
        @endif
    </div>

    <!-- Pagination -->
    @if(isset($doctors) && $doctors->hasPages())
    <div class="d-flex flex-column justify-content-center align-items-center mt-4 mb-5">
        {{ $doctors->links('vendor.pagination.bootstrap-5') }}
    </div>
    @endif


    <!-- Testimonials Section -->
    <div class="row mb-5">
        <div class="col-12 text-center mb-4">
            <h2 class="fw-bold">What Our Patients Say</h2>
            <p class="text-muted">Read testimonials from our satisfied patients</p>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm hover-shadow transition-all">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://via.placeholder.com/50" class="rounded-circle me-3" alt="Patient">
                        <div>
                            <h5 class="mb-0">John Doe</h5>
                            <small class="text-muted">Cardiology Patient</small>
                        </div>
                    </div>
                    <p class="card-text">"The doctors here are extremely professional and caring. I received excellent treatment for my heart condition."</p>
                    <div class="text-warning">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm hover-shadow transition-all">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://via.placeholder.com/50" class="rounded-circle me-3" alt="Patient">
                        <div>
                            <h5 class="mb-0">Sarah Smith</h5>
                            <small class="text-muted">Pediatrics Patient</small>
                        </div>
                    </div>
                    <p class="card-text">"The pediatric department is amazing! They made my child feel comfortable and provided excellent care."</p>
                    <div class="text-warning">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm hover-shadow transition-all">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://via.placeholder.com/50" class="rounded-circle me-3" alt="Patient">
                        <div>
                            <h5 class="mb-0">Mike Johnson</h5>
                            <small class="text-muted">Orthopedics Patient</small>
                        </div>
                    </div>
                    <p class="card-text">"The orthopedic team helped me recover from my sports injury. Their expertise is unmatched!"</p>
                    <div class="text-warning">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="row mb-5">
        <div class="col-12 text-center mb-4">
            <h2 class="fw-bold">Frequently Asked Questions</h2>
            <p class="text-muted">Find answers to common questions about our doctors and services</p>
        </div>
        <div class="col-lg-8 mx-auto">
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button rounded-3 shadow-sm transition-all p-1 mb-1" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" style="background: linear-gradient(45deg, #0575f5, #0490f4); color: white; font-weight: 500;">
                            How do I book an appointment with a doctor?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            You can book an appointment by clicking the "Book Appointment" button on any doctor's card. You'll be redirected to our appointment booking system where you can select your preferred date and time.
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed rounded-3 shadow-sm transition-all p-1 mb-1" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" style="background: linear-gradient(45deg, #0575f5, #0490f4); color: white; font-weight: 500;">
                            What insurance plans do you accept?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            We accept most major insurance plans. Please contact our billing department for specific information about your insurance provider.
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 shadow-sm">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed rounded-3 shadow-sm transition-all p-1 mb-1" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" style="background: linear-gradient(45deg, #0575f5, #0490f4); color: white; font-weight: 500;">
                            Can I get a second opinion from another doctor?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Yes, we encourage second opinions. You can request a consultation with another specialist within our hospital or transfer your medical records to another facility.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter Section -->
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5 text-center">
                    <h3 class="fw-bold mb-3">Stay Updated with Healthcare News</h3>
                    <p class="text-muted mb-4">Subscribe to our newsletter for the latest updates on our doctors, services, and healthcare tips.</p>
                    <form class="row g-3 justify-content-center">
                        <div class="col-md-12">
                            <div class="subscribe-form ">
                                <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                                    <input name="EMAIL" placeholder="Your email address" class="common-input p-2" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Your email address'" required="" type="email">
                                    <button class="btn btn-primary">Subscribe</button>
                                </form>
                            </div>
                        </div>
                        {{-- <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Subscribe Now</button>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
