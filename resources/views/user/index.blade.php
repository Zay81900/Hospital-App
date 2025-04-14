@extends('layouts.user_layout')
@section('content')

<div class="container">
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
</div>

<!-- Slider Area -->
<section class="slider">
    <div class="hero-slider">
        <!-- Start Single Slider -->
        <div class="single-slider" style="background-image:url('img/slider2.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="text">
                            <h1>We Provide <span>Medical</span> Services That You Can <span>Trust!</span></h1>
                            <p>We are committed to providing top-quality healthcare services with experienced doctors and state-of-the-art facilities. Your health and well-being are our priority. </p>
                            <div class="button">
                                <a href="#" class="btn">Get Appointment</a>
                                <a href="#" class="btn primary">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Slider -->
        <!-- Start Single Slider -->
        <div class="single-slider" style="background-image:url('img/slider.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="text">
                            <h1>We Provide <span>Medical</span> Services That You Can <span>Trust!</span></h1>
                            <p>With expert care and a patient-centered approach, we ensure you receive the best medical services for your health and well-being. </p>
                            <div class="button">
                                <a href="#" class="btn">Get Appointment</a>
                                <a href="#" class="btn primary">About Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start End Slider -->
        <!-- Start Single Slider -->
        <div class="single-slider" style="background-image:url('img/slider3.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="text">
                            <h1>We Provide <span>Medical</span> Services That You Can <span>Trust!</span></h1>
                            <p>Your health is our priority. We offer expert medical care with compassion, ensuring you receive the best treatment tailored to your needs. </p>
                            <div class="button">
                                <a href="#" class="btn">Get Appointment</a>
                                <a href="#" class="btn primary">Conatct Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Slider -->
    </div>
</section>
<!--/ End Slider Area -->

<!-- Start Schedule Area -->
<section class="schedule">
    <div class="container">
        <div class="schedule-inner">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 ">
                    <!-- single-schedule -->
                    <div class="single-schedule first">
                        <div class="inner">
                            <div class="icon">
                                <i class="fa fa-ambulance"></i>
                            </div>
                            <div class="single-content">
                                <span>Lorem Amet</span>
                                <h4>Emergency Cases</h4>
                                <p>In case of a medical emergency, our dedicated team is available to provide immediate assistance. Contact us for urgent care services.</p>
                                <a href="#">LEARN MORE<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- single-schedule -->
                    <div class="single-schedule middle">
                        <div class="inner">
                            <div class="icon">
                                <i class="icofont-prescription"></i>
                            </div>
                            <div class="single-content">
                                <span>Fusce Porttitor</span>
                                <h4>Doctors Timetable</h4>
                                <p>Check our doctors’ availability and schedule your appointment at a convenient time. We ensure minimal waiting time and quality care.</p>
                                <a href="#">LEARN MORE<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <!-- single-schedule -->
                    <div class="single-schedule last">
                        <div class="inner">
                            <div class="icon">
                                <i class="icofont-ui-clock"></i>
                            </div>
                            <div class="single-content">
                                <span>Donec luctus</span>
                                <h4>Opening Hours</h4>
                                <ul class="time-sidual">
                                    <li class="day">Monday - Fridayp <span>8.00-20.00</span></li>
                                    <li class="day">Saturday <span>9.00-18.30</span></li>
                                    <li class="day">Monday - Thusday <span>9.00-15.00</span></li>
                                </ul>
                                <a href="#">LEARN MORE<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/End Start schedule Area -->

<!-- Start Feautes -->
<section class="Feautes section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>We Are Always Ready to Help You & Your Family</h2>
                    <img src="img/section-img.png" alt="#">
                    <p>Our team is dedicated to providing expert medical care for you and your family. With compassionate service and advanced technology, we ensure the best healthcare experience.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-12">
                <!-- Start Single features -->
                <div class="single-features">
                    <div class="signle-icon">
                        <i class="icofont icofont-ambulance-cross"></i>
                    </div>
                    <h3>Emergency Help</h3>
                    <p>Immediate medical assistance is available 24/7. Our emergency response team is ready to provide urgent care when you need it most.</p>
                </div>
                <!-- End Single features -->
            </div>
            <div class="col-lg-4 col-12">
                <!-- Start Single features -->
                <div class="single-features">
                    <div class="signle-icon">
                        <i class="icofont icofont-medical-sign-alt"></i>
                    </div>
                    <h3>Enriched Pharmecy</h3>
                    <p>We offer a well-stocked pharmacy with quality medications and expert guidance to support your health and well-being.</p>
                </div>
                <!-- End Single features -->
            </div>
            <div class="col-lg-4 col-12">
                <!-- Start Single features -->
                <div class="single-features last">
                    <div class="signle-icon">
                        <i class="icofont icofont-stethoscope"></i>
                    </div>
                    <h3>Medical Treatment</h3>
                    <p>Our experienced doctors provide personalized treatment plans to ensure the best care for every patient, from diagnosis to recovery.</p>
                </div>
                <!-- End Single features -->
            </div>
        </div>
    </div>
</section>
<!--/ End Feautes -->

<!-- Start Fun-facts -->
<div id="fun-facts" class="fun-facts section overlay">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Fun -->
                <div class="single-fun">
                    <i class="icofont icofont-home"></i>
                    <div class="content">
                        <span class="counter">3468</span>
                        <p>Hospital Rooms</p>
                    </div>
                </div>
                <!-- End Single Fun -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Fun -->
                <div class="single-fun">
                    <i class="icofont icofont-user-alt-3"></i>
                    <div class="content">
                        <span class="counter">557</span>
                        <p>Specialist Doctors</p>
                    </div>
                </div>
                <!-- End Single Fun -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Fun -->
                <div class="single-fun">
                    <i class="icofont-simple-smile"></i>
                    <div class="content">
                        <span class="counter">4379</span>
                        <p>Happy Patients</p>
                    </div>
                </div>
                <!-- End Single Fun -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Fun -->
                <div class="single-fun">
                    <i class="icofont icofont-table"></i>
                    <div class="content">
                        <span class="counter">32</span>
                        <p>Years of Experience</p>
                    </div>
                </div>
                <!-- End Single Fun -->
            </div>
        </div>
    </div>
</div>
<!--/ End Fun-facts -->

<!-- Start Why choose -->
<section class="why-choose section" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>We Offer Different Services To Improve Your Health</h2>
                    <img src="img/section-img.png" alt="#">
                    <p>We provide a wide range of healthcare services designed to enhance your well-being. Our expert team is dedicated to delivering personalized and high-quality medical care.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-12">
                <!-- Start Choose Left -->
                <div class="choose-left">
                    <h3>Who We Are</h3>
                    <p>At our healthcare center, we prioritize patient care with a team of experienced professionals. </p>
                    <p>Our goal is to offer compassionate and innovative medical solutions tailored to your needs. </p>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list">
                                <li><i class="fa fa-caret-right"></i>Comprehensive Medical Services. </li>
                                <li><i class="fa fa-caret-right"></i>Experienced & Caring Professionals.</li>
                                <li><i class="fa fa-caret-right"></i>State-of-the-Art Facilities.</li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list">
                                <li><i class="fa fa-caret-right"></i>Personalized Treatment Plans. </li>
                                <li><i class="fa fa-caret-right"></i>24/7 Emergency Support.</li>
                                <li><i class="fa fa-caret-right"></i>Affordable & Accessible Healthcare.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Choose Left -->
            </div>
            <div class="col-lg-6 col-12">
                <!-- Start Choose Rights -->
                <div class="choose-right">
                    <div class="video-image">
                        <!-- Video Animation -->
                        <div class="promo-video">
                            <div class="waves-block">
                                <div class="waves wave-1"></div>
                                <div class="waves wave-2"></div>
                                <div class="waves wave-3"></div>
                            </div>
                        </div>
                        <!--/ End Video Animation -->
                        <a href="https://www.youtube.com/watch?v=RFVXy6CRVR4" class="video video-popup mfp-iframe"><i class="fa fa-play"></i></a>
                    </div>
                </div>
                <!-- End Choose Rights -->
            </div>
        </div>
    </div>
</section>
<!--/ End Why choose -->

<!-- Start Call to action -->
<section class="call-action overlay" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="content">
                    <h2>Do you need Emergency Medical Care? Call @ 1234 56789</h2>
                    <p>Our emergency medical team is available 24/7 to provide urgent care when you need it most. Don’t hesitate—reach out now for immediate assistance.</p>
                    <div class="button">
                        <a href="#" class="btn">Contact Now</a>
                        <a href="#" class="btn second">Learn More<i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Call to action -->

<!-- Start portfolio -->
<section class="portfolio section" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>We Maintain Cleanliness Rules Inside Our Hospital</h2>
                    <img src="img/section-img.png" alt="#">
                    <p>Our hospital maintains strict cleanliness protocols and hygiene standards to ensure a safe and healthy environment for all patients and staff.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="owl-carousel portfolio-slider">
                    <div class="single-pf">
                        <img src="img/pf1.jpg" alt="#">
                        <a href="portfolio-details.html" class="btn">View Details</a>
                    </div>
                    <div class="single-pf">
                        <img src="img/pf2.jpg" alt="#">
                        <a href="portfolio-details.html" class="btn">View Details</a>
                    </div>
                    <div class="single-pf">
                        <img src="img/pf3.jpg" alt="#">
                        <a href="portfolio-details.html" class="btn">View Details</a>
                    </div>
                    <div class="single-pf">
                        <img src="img/pf4.jpg" alt="#">
                        <a href="portfolio-details.html" class="btn">View Details</a>
                    </div>
                    <div class="single-pf">
                        <img src="img/pf1.jpg" alt="#">
                        <a href="portfolio-details.html" class="btn">View Details</a>
                    </div>
                    <div class="single-pf">
                        <img src="img/pf2.jpg" alt="#">
                        <a href="portfolio-details.html" class="btn">View Details</a>
                    </div>
                    <div class="single-pf">
                        <img src="img/pf3.jpg" alt="#">
                        <a href="portfolio-details.html" class="btn">View Details</a>
                    </div>
                    <div class="single-pf">
                        <img src="img/pf4.jpg" alt="#">
                        <a href="portfolio-details.html" class="btn">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End portfolio -->

<!-- Start service -->
<section class="services section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>We Offer Different Services To Improve Your Health</h2>
                    <img src="img/section-img.png" alt="#">
                    <p>We provide comprehensive healthcare services with state-of-the-art facilities and expert medical professionals to ensure your well-being.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="icofont icofont-prescription"></i>
                    <h4><a href="service-details.html">General Treatment</a></h4>
                    <p>Comprehensive medical care for various health conditions with personalized treatment plans and expert medical supervision.</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="icofont icofont-tooth"></i>
                    <h4><a href="service-details.html">Teeth Whitening</a></h4>
                    <p>Professional dental care services including teeth whitening, cleaning, and general dental health maintenance.</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="icofont icofont-heart-alt"></i>
                    <h4><a href="service-details.html">Heart Surgery</a></h4>
                    <p>Advanced cardiac care with experienced cardiologists and modern surgical facilities for heart-related procedures.</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="icofont icofont-listening"></i>
                    <h4><a href="service-details.html">Ear Treatment</a></h4>
                    <p>Specialized ear, nose, and throat treatments with modern diagnostic tools and expert ENT specialists.</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="icofont icofont-eye-alt"></i>
                    <h4><a href="service-details.html">Vision Problems</a></h4>
                    <p>Comprehensive eye care services including vision correction, eye disease treatment, and regular eye check-ups.</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="icofont icofont-blood"></i>
                    <h4><a href="service-details.html">Blood Transfusion</a></h4>
                    <p>Safe and efficient blood transfusion services with proper screening and monitoring procedures.</p>
                </div>
                <!-- End Single Service -->
            </div>
        </div>
    </div>
</section>
<!--/ End service -->

<!-- Pricing Table -->
<section class="pricing-table section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>We Provide You The Best Treatment In Reasonable Price</h2>
                    <img src="img/section-img.png" alt="#">
                    <p>We offer high-quality medical services at competitive prices, ensuring healthcare accessibility for all our patients.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Single Table -->
            <div class="col-lg-4 col-md-12 col-12">
                <div class="single-table">
                    <!-- Table Head -->
                    <div class="table-head">
                        <div class="icon">
                            <i class="icofont icofont-ui-cut"></i>
                        </div>
                        <h4 class="title">Plastic Surgery</h4>
                        <div class="price">
                            <p class="amount">$199<span>/ Per Visit</span></p>
                        </div>
                    </div>
                    <!-- Table List -->
                    <ul class="table-list">
                        <li><i class="icofont icofont-ui-check"></i>Initial Consultation</li>
                        <li><i class="icofont icofont-ui-check"></i>Treatment Planning</li>
                        <li class="cross"><i class="icofont icofont-ui-close"></i>Surgical Procedure</li>
                        <li class="cross"><i class="icofont icofont-ui-close"></i>Post-operative Care</li>
                        <li class="cross"><i class="icofont icofont-ui-close"></i>Follow-up Sessions</li>
                    </ul>
                    <div class="table-bottom">
                        <a class="btn" href="#">Book Now</a>
                    </div>
                    <!-- Table Bottom -->
                </div>
            </div>
            <!-- End Single Table-->
            <!-- Single Table -->
            <div class="col-lg-4 col-md-12 col-12">
                <div class="single-table">
                    <!-- Table Head -->
                    <div class="table-head">
                        <div class="icon">
                            <i class="icofont icofont-tooth"></i>
                        </div>
                        <h4 class="title">Teeth Whitening</h4>
                        <div class="price">
                            <p class="amount">$299<span>/ Per Visit</span></p>
                        </div>
                    </div>
                    <!-- Table List -->
                    <ul class="table-list">
                        <li><i class="icofont icofont-ui-check"></i>Dental Examination</li>
                        <li><i class="icofont icofont-ui-check"></i>Teeth Cleaning</li>
                        <li><i class="icofont icofont-ui-check"></i>Whitening Treatment</li>
                        <li class="cross"><i class="icofont icofont-ui-close"></i>Custom Whitening Kit</li>
                        <li class="cross"><i class="icofont icofont-ui-close"></i>Follow-up Care</li>
                    </ul>
                    <div class="table-bottom">
                        <a class="btn" href="#">Book Now</a>
                    </div>
                    <!-- Table Bottom -->
                </div>
            </div>
            <!-- End Single Table-->
            <!-- Single Table -->
            <div class="col-lg-4 col-md-12 col-12">
                <div class="single-table">
                    <!-- Table Head -->
                    <div class="table-head">
                        <div class="icon">
                            <i class="icofont-heart-beat"></i>
                        </div>
                        <h4 class="title">Heart Surgery</h4>
                        <div class="price">
                            <p class="amount">$399<span>/ Per Visit</span></p>
                        </div>
                    </div>
                    <!-- Table List -->
                    <ul class="table-list">
                        <li><i class="icofont icofont-ui-check"></i>Cardiac Consultation</li>
                        <li><i class="icofont icofont-ui-check"></i>Diagnostic Tests</li>
                        <li><i class="icofont icofont-ui-check"></i>Surgical Procedure</li>
                        <li><i class="icofont icofont-ui-check"></i>Post-surgery Care</li>
                        <li><i class="icofont icofont-ui-check"></i>Rehabilitation Program</li>
                    </ul>
                    <div class="table-bottom">
                        <a class="btn" href="#">Book Now</a>
                    </div>
                    <!-- Table Bottom -->
                </div>
            </div>
            <!-- End Single Table-->
        </div>
    </div>
</section>
<!--/ End Pricing Table -->



<!-- Start Blog Area -->
<section class="blog section" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Keep up with Our Most Recent Medical News</h2>
                    <img src="img/section-img.png" alt="#">
                    <p>Stay informed about the latest medical advancements, health tips, and hospital updates through our regular news articles.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Single Blog -->
                <div class="single-news">
                    <div class="news-head">
                        <img src="img/blog1.jpg" alt="#">
                    </div>
                    <div class="news-body">
                        <div class="news-content">
                            <div class="date">22 Aug, 2023</div>
                            <h2><a href="blog-single.html">New Advanced Medical Equipment Installation</a></h2>
                            <p class="text">We have recently installed state-of-the-art medical equipment to enhance our diagnostic and treatment capabilities.</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Single Blog -->
                <div class="single-news">
                    <div class="news-head">
                        <img src="img/blog2.jpg" alt="#">
                    </div>
                    <div class="news-body">
                        <div class="news-content">
                            <div class="date">15 Jul, 2023</div>
                            <h2><a href="blog-single.html">Tips for Maintaining Good Dental Health</a></h2>
                            <p class="text">Learn essential tips and practices for maintaining optimal dental health from our expert dentists.</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Single Blog -->
                <div class="single-news">
                    <div class="news-head">
                        <img src="img/blog3.jpg" alt="#">
                    </div>
                    <div class="news-body">
                        <div class="news-content">
                            <div class="date">05 Jan, 2023</div>
                            <h2><a href="blog-single.html">New Specialized Medical Services</a></h2>
                            <p class="text">We are proud to announce the launch of new specialized medical services to better serve our patients.</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
            </div>
        </div>
    </div>
</section>
<!-- End Blog Area -->

<!-- Start clients -->
<div class="clients overlay">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="owl-carousel clients-slider">
                    <div class="single-clients">
                        <img src="img/client1.png" alt="#">
                    </div>
                    <div class="single-clients">
                        <img src="img/client2.png" alt="#">
                    </div>
                    <div class="single-clients">
                        <img src="img/client3.png" alt="#">
                    </div>
                    <div class="single-clients">
                        <img src="img/client4.png" alt="#">
                    </div>
                    <div class="single-clients">
                        <img src="img/client5.png" alt="#">
                    </div>
                    <div class="single-clients">
                        <img src="img/client1.png" alt="#">
                    </div>
                    <div class="single-clients">
                        <img src="img/client2.png" alt="#">
                    </div>
                    <div class="single-clients">
                        <img src="img/client3.png" alt="#">
                    </div>
                    <div class="single-clients">
                        <img src="img/client4.png" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/Ens clients -->

<!-- Start Appointment -->
<section class="appointment">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>We Are Always Ready to Help You. Book An Appointment</h2>
                    <img src="img/section-img.png" alt="#">
                    <p>Schedule your appointment with our experienced medical professionals for personalized healthcare services.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                <form class="form" action="#">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <input name="name" type="text" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <input name="email" type="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <input name="phone" type="text" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <div class="nice-select form-control wide" tabindex="0"><span class="current">Department</span>
                                    <ul class="list">
                                        <li data-value="1" class="option selected ">Department</li>
                                        <li data-value="2" class="option">Cardiac Clinic</li>
                                        <li data-value="3" class="option">Neurology</li>
                                        <li data-value="4" class="option">Dentistry</li>
                                        <li data-value="5" class="option">Gastroenterology</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <div class="nice-select form-control wide" tabindex="0"><span class="current">Doctor</span>
                                    <ul class="list">
                                        <li data-value="1" class="option selected ">Doctor</li>
                                        <li data-value="2" class="option">Dr. Akther Hossain</li>
                                        <li data-value="3" class="option">Dr. Dery Alex</li>
                                        <li data-value="4" class="option">Dr. Jovis Karon</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <input type="text" placeholder="Date" id="datepicker">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <textarea name="message" placeholder="Write Your Message Here....."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-4 col-12">
                            <div class="form-group">
                                <div class="button">
                                    <button type="submit" class="btn">Book An Appointment</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-8 col-12">
                            <p>( We will be confirm by an Text Message )</p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-12 ">
                <div class="appointment-image">
                    <img src="img/contact-img.png" alt="#">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Appointment -->

<!-- Start Newsletter Area -->
<section class="newsletter section">
    <div class="container">
        <div class="row ">
            <div class="col-lg-6  col-12">
                <!-- Start Newsletter Form -->
                <div class="subscribe-text">
                    <h6>Sign up for newsletter</h6>
                    <p class="">Stay updated with the latest health tips, medical news, and hospital updates. Subscribe to our newsletter today!</p>
                </div>
                <!-- End Newsletter Form -->
            </div>
            <div class="col-lg-6  col-12">
                <!-- Start Newsletter Form -->
                <div class="subscribe-form ">
                    <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                        <input name="EMAIL" placeholder="Your email address" class="common-input" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Your email address'" required="" type="email">
                        <button class="btn btn-primary">Subscribe</button>
                    </form>
                </div>
                <!-- End Newsletter Form -->
            </div>
        </div>
    </div>
</section>
<!-- /End Newsletter Area -->

@endsection