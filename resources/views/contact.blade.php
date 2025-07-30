@extends('layouts.app')

@section('title', 'Beranda - HIPMI PT UPI Cibiru')

@section('content')
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="position-relative">
        <img src="{{ asset('images/yellow-fluid.png') }}" alt="" style="width: 340px">
        <div class="position-absolute bottom-0 start-50 translate-middle">
            <h1 class="hipmi-text text-center fs-1">Get Intouch</h1>
            <h6 class="text-warning fw-bold text-center">We would love to hear from you.</h6>
        </div>
    </div>
    

    <section class="py-5 bg-white">
        <div class="container">
            <div class="row g-4 align-items-stretch">

                <!-- Left Section: Contact Info -->
                <div class="col-md-6 d-flex">
                    <div class="text-white p-4 h-100 rounded shadow" style="background-image: url('{{ asset('images/background-contact.png') }}'); background-size: cover; background-position: center;">
                        <div class="p-5 rounded h-100 d-flex flex-column">
                            <div>
                                <h2 class="fw-bold">Don't hesitate to contact us for more information.</h2>
                                <p class="text-light mt-2">If you have questions, please contact us via the contact form or contact information on this page.</p>
                                <hr class="border-light">
                            </div>

                            <div class="mt-3">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-warning text-light rounded-circle d-flex justify-content-center align-items-center me-3 px-2 py-1">
                                        <i class="bi bi-whatsapp fs-5"></i>
                                    </div>
                                    <div>
                                        <h5><strong>Human Resource 1</strong></h5>
                                        <div>08*****</div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-warning text-light rounded-circle d-flex justify-content-center align-items-center me-3 px-2 py-1">
                                        <i class="bi bi-whatsapp fs-5"></i>
                                    </div>
                                    <div>
                                        <h5><strong>Human Resource 2</strong></h5>
                                        <div>08*****</div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="bg-warning text-light rounded-circle d-flex justify-content-center align-items-center me-3 px-2 py-1">
                                        <i class="bi bi-envelope-fill fs-5"></i>
                                    </div>
                                    <div>
                                        <h5><strong>Contact Us</strong></h5>
                                        <div>*****@hipmiptupicibiru</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Section: Contact Form -->
                <div class="col-md-6 d-flex">
                    <div class="bg-white p-5 rounded shadow w-100 h-100 d-flex flex-column">
                        <h2 class="fw-bold mb-4 text-primary">Send us a message</h2>

                        <form class="d-flex flex-column h-100 needs-validation" method="POST" action="#">
                            @csrf

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="name" class="form-label text-primary mb-2 fw-bold">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name" required>
                                </div>
                                <div class="col">
                                    <label for="phone" class="form-label text-primary mb-2 fw-bold">Phone</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label text-primary mb-2 fw-bold">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>

                            <div class="mb-3">
                                <label for="subject" class="form-label text-primary mb-2 fw-bold">Subject</label>
                                <input type="text" class="form-control" name="subject" placeholder="Subject">
                            </div>

                            <div class="mb-4 flex-grow-1">
                                <label for="message" class="form-label text-primary mb-2 fw-bold">Message</label>
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-custom-gradient px-4 py-2 rounded-pill fw-bold">Send</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
