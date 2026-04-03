<!-- Sidebar -->
<div class="bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
        <i class="fas fa-shoe-prints me-2"></i>Foot.hub Admin
    </div>
    <div class="list-group list-group-flush my-3">
        <a href="{{ route('admin.admin_dashboard') }}" class="list-group-item list-group-item-action bg-transparent second-text {{ Request::routeIs('admin.admin_dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
        </a>

        <!-- Categories Dropdown -->
        <a href="#categorySubmenu" data-bs-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action bg-transparent second-text fw-bold dropdown-toggle">
            <i class="fas fa-list me-2"></i>Categories
        </a>
        <ul class="collapse list-unstyled ps-4" id="categorySubmenu">
            <li>
                <a href="{{ route('admin.admin_add_category') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold {{ Request::routeIs('admin.admin_add_category') ? 'active' : '' }}">
                    <i class="fas fa-plus me-2"></i>Add Category
                </a>
            </li>
            <li>
                <a href="{{ route('admin.admin_manage_categories') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold {{ Request::routeIs('admin.admin_manage_categories') ? 'active' : '' }}">
                     <i class="fas fa-tasks me-2"></i>Manage Categories
                </a>
            </li>
        </ul>

        <!-- Products Dropdown -->
        <a href="#productSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action bg-transparent second-text fw-bold dropdown-toggle">
            <i class="fas fa-box-open me-2"></i>Products
        </a>
        <ul class="collapse list-unstyled ps-4" id="productSubmenu">
            <li>
                <a href="{{ route('admin.admin_add_product') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold {{ Request::routeIs('admin.admin_add_product') ? 'active' : '' }}">
                    <i class="fas fa-plus me-2"></i>Add Product
                </a>
            </li>
            <li>
                <a href="{{ route('admin.admin_manage_products') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold {{ Request::routeIs('admin.admin_manage_products') ? 'active' : '' }}">
                     <i class="fas fa-tasks me-2"></i>Manage Products
                </a>
            </li>
        </ul>



        <div class="sidebar-subheading text-uppercase fw-bold text-muted ms-3 mt-3 mb-2"
            style="font-size: 0.8rem;">Categories</div>
        <a href="{{ route('admin.admin_men') }}"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold {{ Request::routeIs('admin.admin_men') ? 'active' : '' }}">
            <i class="fas fa-male me-2"></i>Men
        </a>
        <a href="{{ route('admin.admin_women') }}"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold {{ Request::routeIs('admin.admin_women') ? 'active' : '' }}">
            <i class="fas fa-female me-2"></i>Women
        </a>
        <a href="{{ route('admin.admin_kids') }}"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold {{ Request::routeIs('admin.admin_kids') ? 'active' : '' }}">
            <i class="fas fa-child me-2"></i>Kids
        </a>
        <a href="{{ route('admin.admin_tennis') }}"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold {{ Request::routeIs('admin.admin_tennis') ? 'active' : '' }}">
            <i class="fas fa-table-tennis me-2"></i>Fila Tennis
        </a>
        <a href="{{ route('admin.admin_heritage') }}"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold {{ Request::routeIs('admin.admin_heritage') ? 'active' : '' }}">
            <i class="fas fa-landmark me-2"></i>Heritage
        </a>
        <a href="{{ route('admin.admin_sale') }}"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold {{ Request::routeIs('admin.admin_sale') ? 'active' : '' }}">
            <i class="fas fa-tags me-2"></i>Sale
        </a>
        <a href="{{ route('admin.admin_trending') }}"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold {{ Request::routeIs('admin.admin_trending') ? 'active' : '' }}">
            <i class="fas fa-fire me-2"></i>Trending Now
        </a>
        <a href="{{ route('admin.admin_new_arrivals') }}"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold {{ Request::routeIs('admin.admin_new_arrivals') ? 'active' : '' }}">
            <i class="fas fa-clock me-2"></i>New Arrivals
        </a>

        <div class="sidebar-subheading text-uppercase fw-bold text-muted ms-3 mt-3 mb-2"
            style="font-size: 0.8rem;">Management</div>
        <a href="{{ route('admin.admin_cart') }}"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold {{ Request::routeIs('admin.admin_cart') ? 'active' : '' }}">
            <i class="fas fa-shopping-cart me-2"></i>Manage Cart
        </a>
        <a href="{{ route('admin.admin_manage_orders') }}"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold {{ Request::routeIs('admin.admin_manage_orders') ? 'active' : '' }}">
            <i class="fas fa-box me-2"></i>Manage Orders
        </a>
        <a href="{{ route('admin.admin_wishlist') }}"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold {{ Request::routeIs('admin.admin_wishlist') ? 'active' : '' }}">
            <i class="fas fa-heart me-2"></i>Manage Wishlist
        </a>
        <a href="{{ route('admin.admin_users') }}"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold {{ Request::routeIs('admin.admin_users') ? 'active' : '' }}">
            <i class="fas fa-users me-2"></i>Manage Users
        </a>
        <a href="{{ route('admin.admin_contact_reports') }}"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold {{ Request::routeIs('admin.admin_contact_reports') ? 'active' : '' }}">
            <i class="fas fa-envelope me-2"></i>ManageContact
        </a>

        <a href="#"
            class="list-group-item list-group-item-action bg-transparent text-danger fw-bold mt-3 border-top">
            <i class="fas fa-power-off me-2"></i>Logout
        </a>
    </div>
</div>
<!-- /#sidebar-wrapper -->



