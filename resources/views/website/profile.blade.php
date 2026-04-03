@extends('website.layouts.app')

@section('title', 'My Profile - FILA India')

@section('content')
    <div class="container py-5">
        <div class="row g-4">
            <!-- Sidebar -->
            <!-- Sidebar -->
            @include('website.layouts.user_sidebar')

            <!-- Content -->
            <div class="col-md-9">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4 text-uppercase border-bottom pb-2 text-navy">Profile Details</h5>
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label small text-muted fw-bold">Full Name</label>
                                    <input type="text" name="name" class="form-control rounded-0 border-dark" value="{{ auth()->user()->name ?? '' }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small text-muted fw-bold">Email ID</label>
                                    <input type="email" class="form-control rounded-0 border-dark" value="{{ auth()->user()->email ?? '' }}" readonly>
                                    <small class="text-muted" style="font-size: 11px;">Email cannot be changed</small>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small text-muted fw-bold">Phone Number</label>
                                    <input type="tel" name="phone" class="form-control rounded-0 border-dark" value="{{ auth()->user()->phone ?? '' }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small text-muted fw-bold">Date of Birth</label>
                                    <input type="date" name="date_of_birth" class="form-control rounded-0 border-dark" value="{{ auth()->user()->date_of_birth ?? '' }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small text-muted fw-bold">Gender</label>
                                    <div class="d-flex gap-3 mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="male" value="Male" {{ (auth()->user()->gender ?? '') == 'Male' ? 'checked' : '' }}>
                                            <label class="form-check-label small" for="male">Male</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="female" value="Female" {{ (auth()->user()->gender ?? '') == 'Female' ? 'checked' : '' }}>
                                            <label class="form-check-label small" for="female">Female</label>
                                        </div>
                                         <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="other" value="Other" {{ (auth()->user()->gender ?? '') == 'Other' ? 'checked' : '' }}>
                                            <label class="form-check-label small" for="other">Other</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-navy px-4 fw-bold text-uppercase rounded-0">Save Details</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
