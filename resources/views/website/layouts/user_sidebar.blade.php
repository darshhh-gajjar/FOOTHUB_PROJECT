<div class="col-md-3">
    <div class="card border-0 shadow-sm rounded-0 mb-4">
        <div class="card-body p-4 text-center">
             <div class="bg-light rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                @if(Auth::check() && Auth::user()->image)
                    <img src="{{ asset('uploads/users/' . Auth::user()->image) }}" alt="Profile" class="rounded-circle w-100 h-100 object-fit-cover">
                @else
                    <i class="fas fa-user fs-2 text-navy"></i>
                @endif
             </div>
            <h6 class="fw-bold mb-0 text-navy">{{ Auth::check() ? Auth::user()->name : 'Guest User' }}</h6>
            <small class="text-muted">{{ Auth::check() ? Auth::user()->email : 'guest@example.com' }}</small>
        </div>
    </div>

    <div class="list-group rounded-0 border-0 shadow-sm">
        <a href="{{ route('profile') }}" class="list-group-item list-group-item-action border-0 {{ Request::routeIs('profile') ? 'active bg-navy text-white fw-bold' : 'text-dark' }}">
            <i class="fas fa-user-circle me-2 {{ Request::routeIs('profile') ? 'text-white' : 'text-muted' }}"></i> Profile Details
        </a>
        <a href="{{ route('my.orders') }}" class="list-group-item list-group-item-action border-0 {{ Request::routeIs('my.orders') ? 'active bg-navy text-white fw-bold' : 'text-dark' }}">
            <i class="fas fa-box me-2 {{ Request::routeIs('my.orders') ? 'text-white' : 'text-muted' }}"></i> My Orders
        </a>
        <a href="{{ route('my.addresses') }}" class="list-group-item list-group-item-action border-0 {{ Request::routeIs('my.addresses') ? 'active bg-navy text-white fw-bold' : 'text-dark' }}">
            <i class="fas fa-map-marker-alt me-2 {{ Request::routeIs('my.addresses') ? 'text-white' : 'text-muted' }}"></i> Addresses
        </a>
        <a href="{{ route('wishlist') }}" class="list-group-item list-group-item-action border-0 {{ Request::routeIs('wishlist') ? 'active bg-navy text-white fw-bold' : 'text-dark' }}">
            <i class="fas fa-heart me-2 {{ Request::routeIs('wishlist') ? 'text-white' : 'text-muted' }}"></i> Wishlist
        </a>
        
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="list-group-item list-group-item-action border-0 text-danger fw-bold w-100 text-start">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </button>
        </form>
    </div>
</div>
