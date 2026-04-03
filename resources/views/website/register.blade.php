@extends('website.layouts.app')

@section('title', 'Register - FILA India')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center align-items-center" style="min-height: 70vh;">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-sm rounded-0 p-4">
                <div class="text-center mb-4">
                    <h4 class="fw-bold text-uppercase mb-1 text-navy">Create Account</h4>
                    <p class="text-muted small">Join the FOOT HUB Community</p>
                </div>

                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-3 text-center">
                        <label class="form-label small fw-bold text-uppercase text-muted d-block">Profile Image</label>
                        <input type="file" name="image" class="form-control rounded-0 p-2 border-dark">
                    </div>

                    <div class="mb-3">
                         <label class="form-label small fw-bold text-uppercase text-muted">Full Name</label>
                         <input type="text" name="name" class="form-control rounded-0 p-2 border-dark" placeholder="Enter your full name" required>
                    </div>
                    <div class="mb-3">
                         <label class="form-label small fw-bold text-uppercase text-muted">Email Address</label>
                         <input type="email" name="email" class="form-control rounded-0 p-2 border-dark" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                         <label class="form-label small fw-bold text-uppercase text-muted">Mobile Number</label>
                         <input type="text" name="phone" class="form-control rounded-0 p-2 border-dark" placeholder="Enter your mobile number" required>
                    </div>
                     <div class="mb-3">
                         <label class="form-label small fw-bold text-uppercase text-muted">Password</label>
                         <input type="password" name="password" class="form-control rounded-0 p-2 border-dark" placeholder="Create a password" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase text-muted">Confirm Password</label>
                        <input type="password" name="password" class="form-control rounded-0 p-2 border-dark" placeholder="Confirm your password" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase text-muted">Address</label>
                        <input type="text" name="address" class="form-control rounded-0 p-2 border-dark" placeholder="Enter your address" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase text-muted">City</label>
                        <input type="text" name="city" class="form-control rounded-0 p-2 border-dark" placeholder="Enter your city" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase text-muted">State</label>
                        <input type="text" name="state" class="form-control rounded-0 p-2 border-dark" placeholder="Enter your state" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase text-muted">Pincode</label>
                        <input type="text" name="pincode" class="form-control rounded-0 p-2 border-dark" placeholder="Enter your pincode" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase text-muted">Country</label>
                        <input type="text" name="country" class="form-control rounded-0 p-2 border-dark" placeholder="Enter your country" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase text-muted">Gender</label>
                        <select name="gender" class="form-control rounded-0 p-2 border-dark" required>
                            <option name="gender" value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase text-muted">Date of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control rounded-0 p-2 border-dark" required>
                    </div>
                        
                    <button type="submit" name="submit" class="btn btn-navy w-100 fw-bold text-uppercase mb-3 rounded-0 py-2">Create Account</button>
                    
                     <div class="d-flex align-items-center justify-content-center gap-2 mb-4">
                        <hr class="flex-grow-1"> <span class="text-muted small">OR</span> <hr class="flex-grow-1">
                    </div>

                     <button type="button" class="btn btn-outline-dark w-100 mb-3 small fw-bold rounded-0 text-uppercase"><i class="fab fa-google me-2"></i> Continue with Google</button>
                     
                     <div class="text-center small">
                        Already have an account? <a href="{{ route('login') }}" class="text-decoration-none fw-bold text-navy">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
