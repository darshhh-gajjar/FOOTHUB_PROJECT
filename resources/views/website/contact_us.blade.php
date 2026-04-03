@extends('website.layouts.app')

@section('title', 'Contact Us | FILA India')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5">Contact Us</h1>
    <div class="row g-5">
        <div class="col-md-6">
            <h3 class="mb-4">Get in Touch</h3>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="/ins_contact" method="POST" class="p-4 border-0 shadow-sm bg-white rounded">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label text-muted small fw-bold text-uppercase">Name</label>
                    <input type="text" name="name" class="form-control rounded-0" id="name" placeholder="Your Name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label text-muted small fw-bold text-uppercase">Email</label>
                    <input type="email" name="email" class="form-control rounded-0" id="email" placeholder="name@example.com" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label text-muted small fw-bold text-uppercase">Message</label>
                    <textarea name="comment" class="form-control rounded-0" id="message" rows="5" placeholder="Your Message" required></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-danger rounded-0 px-4 w-100 fw-bold text-uppercase">Send Message</button>
            </form>
        </div>
        <div class="col-md-6">
            <h3 class="mb-4">Contact Information</h3>
            <p><strong>Address:</strong> 123 Sports Avenue, Mumbai, India</p>
            <p><strong>Phone:</strong> +91 123 456 7890</p>
            <p><strong>Email:</strong> support@filaindia.in</p>
            <div class="mt-4">
                <h5>Follow Us</h5>
                <a href="#" class="text-dark me-3"><i class="fab fa-facebook fa-2x"></i></a>
                <a href="#" class="text-dark me-3"><i class="fab fa-instagram fa-2x"></i></a>
                <a href="#" class="text-dark me-3"><i class="fab fa-twitter fa-2x"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection
