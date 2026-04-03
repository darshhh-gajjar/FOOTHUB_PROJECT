@extends('website.layouts.app')

@section('title', 'Checkout - Foot Hub')

@section('content')
<div class="container py-5">
    <div class="row g-5">
        <!-- Billing Details -->
        <div class="col-md-7 col-lg-8">
            <h4 class="mb-4 fw-bold text-navy text-uppercase">Billing Details</h4>
            <form class="needs-validation" novalidate>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label small fw-bold text-muted text-uppercase">First name</label>
                        <input type="text" class="form-control rounded-0" id="firstName" placeholder="" value="" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label small fw-bold text-muted text-uppercase">Last name</label>
                        <input type="text" class="form-control rounded-0" id="lastName" placeholder="" value="" required>
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label small fw-bold text-muted text-uppercase">Email</label>
                        <input type="email" class="form-control rounded-0" id="email" placeholder="you@example.com">
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label small fw-bold text-muted text-uppercase">Address</label>
                        <input type="text" class="form-control rounded-0" id="address" placeholder="1234 Main St" required>
                    </div>

                    <div class="col-md-5">
                        <label for="country" class="form-label small fw-bold text-muted text-uppercase">Country</label>
                        <select class="form-select rounded-0" id="country" required>
                            <option value="">Choose...</option>
                            <option>India</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="state" class="form-label small fw-bold text-muted text-uppercase">State</label>
                        <select class="form-select rounded-0" id="state" required>
                            <option value="">Choose...</option>
                            <option>Maharashtra</option>
                            <option>Delhi</option>
                            <option>Karnataka</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="zip" class="form-label small fw-bold text-muted text-uppercase">Zip</label>
                        <input type="text" class="form-control rounded-0" id="zip" placeholder="" required>
                    </div>
                </div>

                <hr class="my-4">

                <h4 class="mb-3 fw-bold text-navy text-uppercase">Payment</h4>
                <div class="my-3">
                    <div class="form-check">
                        <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                        <label class="form-check-label" for="credit">Credit card</label>
                    </div>
                    <div class="form-check">
                        <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                        <label class="form-check-label" for="debit">Debit card</label>
                    </div>
                    <div class="form-check">
                        <input id="upi" name="paymentMethod" type="radio" class="form-check-input" required>
                        <label class="form-check-label" for="upi">UPI</label>
                    </div>
                     <div class="form-check">
                        <input id="cod" name="paymentMethod" type="radio" class="form-check-input" required>
                        <label class="form-check-label" for="cod">Cash on Delivery</label>
                    </div>
                </div>

                <div class="row gy-3">
                    <div class="col-md-6">
                        <label for="cc-name" class="form-label small fw-bold text-muted text-uppercase">Name on card</label>
                        <input type="text" class="form-control rounded-0" id="cc-name" placeholder="" required>
                        <small class="text-muted">Full name as displayed on card</small>
                    </div>

                    <div class="col-md-6">
                        <label for="cc-number" class="form-label small fw-bold text-muted text-uppercase">Credit card number</label>
                        <input type="text" class="form-control rounded-0" id="cc-number" placeholder="" required>
                    </div>

                    <div class="col-md-3">
                        <label for="cc-expiration" class="form-label small fw-bold text-muted text-uppercase">Expiration</label>
                        <input type="text" class="form-control rounded-0" id="cc-expiration" placeholder="" required>
                    </div>

                    <div class="col-md-3">
                        <label for="cc-cvv" class="form-label small fw-bold text-muted text-uppercase">CVV</label>
                        <input type="text" class="form-control rounded-0" id="cc-cvv" placeholder="" required>
                    </div>
                </div>
            </form>
        </div>

        <!-- Order Summary -->
        <div class="col-md-5 col-lg-4">
            <div class="card border-0 bg-light rounded-0 p-4 sticky-top" style="top: 100px;">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-navy fw-bold text-uppercase">Your cart</span>
                    <span class="badge bg-danger rounded-pill">2</span>
                </h4>
                <ul class="list-group mb-3 rounded-0">
                    <li class="list-group-item d-flex justify-content-between lh-sm bg-transparent border-start-0 border-end-0 border-top-0">
                        <div>
                            <h6 class="my-0 fw-bold text-navy">Disruptor II Premium</h6>
                            <small class="text-muted">Size: 9</small>
                        </div>
                        <span class="text-muted">₹ 6,999</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm bg-transparent border-start-0 border-end-0">
                        <div>
                            <h6 class="my-0 fw-bold text-navy">Elegant Runner</h6>
                            <small class="text-muted">Size: 7</small>
                        </div>
                        <span class="text-muted">₹ 5,499</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between bg-transparent border-start-0 border-end-0">
                        <div class="text-success">
                            <h6 class="my-0 fw-bold">Promo code</h6>
                            <small>EXAMPLECODE</small>
                        </div>
                        <span class="text-success">-₹ 500</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between bg-transparent border-0 pt-3">
                        <span class="fw-bold text-navy fs-5">Total (INR)</span>
                        <span class="fw-bold text-navy fs-5">₹ 11,998</span>
                    </li>
                </ul>

                <button class="btn btn-danger w-100 py-3 fw-bold text-uppercase rounded-0 hover-lift shadow-sm" type="submit">Place Order</button>
            </div>
        </div>
    </div>
</div>
@endsection
