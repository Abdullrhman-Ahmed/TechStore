@extends('layouts.app')

@section('content')
    <div class="container py-5 text-white">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold text-primary" style="font-family: 'Orbitron';">Get In Touch</h1>
            <p class="opacity-50">Have questions? We're here to help you.</p>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-lg-4">
                <div class="card bg-dark border-secondary p-4 h-100 rounded-4 shadow text-white">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-geo-alt fs-3 text-primary me-3"></i>
                        <h5 class="mb-0 fw-bold">Our Location</h5>
                    </div>
                    <p class="opacity-75">WE Applied Technology School, Egypt.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card bg-dark border-secondary p-4 h-100 rounded-4 shadow text-white">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-envelope fs-3 text-primary me-3"></i>
                        <h5 class="mb-0 fw-bold">Email Us</h5>
                    </div>
                    <p class="opacity-75">support@techstore.com</p>
                </div>
            </div>
            <div class="col-lg-8 mt-5">
                <form class="bg-dark p-5 rounded-4 border border-primary border-opacity-10 shadow-lg">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small opacity-50">Full Name</label>
                            <input type="text"
                                class="form-control bg-secondary bg-opacity-10 border-secondary text-white rounded-pill px-4">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small opacity-50">Email</label>
                            <input type="email"
                                class="form-control bg-secondary bg-opacity-10 border-secondary text-white rounded-pill px-4">
                        </div>
                        <div class="col-12 mt-4">
                            <label class="form-label small opacity-50">Your Message</label>
                            <textarea class="form-control bg-secondary bg-opacity-10 border-secondary text-white rounded-4 px-4" rows="4"></textarea>
                        </div>
                        <div class="col-12 mt-4 text-center">
                            <button type="button" class="btn btn-primary btn-lg px-5 rounded-pill shadow-lg fw-bold">Send
                                Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
