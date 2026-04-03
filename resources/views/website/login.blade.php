@extends('website.layouts.app')

@section('title', 'Login - FILA India')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center align-items-center" style="min-height: 60vh;">
        <div class="col-md-5 col-lg-4">
            <div class="card border-0 shadow-sm rounded-0 p-4">
                <div class="text-center mb-4">
                    <h4 class="fw-bold text-uppercase mb-1 text-navy">Login</h4>
                    <p class="text-muted small">Welcome back to FILA</p>
                </div>

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <div class="mb-3">
                         <label class="form-label small fw-bold text-uppercase text-muted">Email Address</label>
                         <input type="email" name="email" class="form-control rounded-0 p-2 border-dark" placeholder="Enter your email" required value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                         <div class="d-flex justify-content-between">
                            <label class="form-label small fw-bold text-uppercase text-muted">Password</label>
                            <a href="#" class="text-decoration-none small text-muted">Forgot?</a>
                         </div>
                         <input type="password" name="password" class="form-control rounded-0 p-2 border-dark" placeholder="Enter your password" required>
                    </div>
                    
                    <button type="submit" class="btn btn-navy w-100 fw-bold text-uppercase mb-3 rounded-0 py-2">Login</button>
                    
                    <div class="d-flex align-items-center justify-content-center gap-2 mb-4">
                        <hr class="flex-grow-1"> <span class="text-muted small">OR</span> <hr class="flex-grow-1">
                    </div>

                     <button type="button" class="btn btn-outline-dark w-100 mb-3 small fw-bold rounded-0 text-uppercase"><i class="fab fa-google me-2"></i> Continue with Google</button>
                     
                     <div class="text-center small">
                        New to FILA? <a href="{{ route('register') }}" class="text-decoration-none fw-bold text-navy">Create Account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
