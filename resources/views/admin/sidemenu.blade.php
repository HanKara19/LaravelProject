<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <a href="{{ asset('assets') }}/admin/index.html" class="brand-link">
            <img
                src="{{ asset('assets') }}/admin/assets/img/AdminLTELogo.png"
                alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow"
            />
            <span class="brand-text fw-light">Admin Panel</span>
        </a>
    </div>
    <!--end::Sidebar Brand-->

    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
                class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview"
                role="navigation"
                aria-label="Main navigation"
                data-accordion="false"
                id="navigation"
            >

                <!-- Dashboard -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon bi bi-speedometer2"></i>
                        <p>Homepage</p>
                    </a>
                </li>

                <!-- Categories -->
                <li class="nav-item">
                    <a href="{{ route("admin.categories.index") }}" class="nav-link">
                        <i class="nav-icon bi bi-tags-fill"></i>
                        <p>Categories</p>
                    </a>
                </li>

                <!-- Products -->
                <li class="nav-item">
                    <a href="{{ route("admin.product.index") }}" class="nav-link">
                        <i class="nav-icon bi bi-box-seam-fill"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li class="nav-item">
    <a href="{{ route('admin.users.index') }}" class="nav-link">
        <i class="nav-icon bi bi-people"></i>
        <p>Users</p>
    </a>
</li>
                <!-- Reviews -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-star-fill"></i>
                        <p>Reviews</p>
                    </a>
                </li>

                <!-- Orders -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-cart-fill"></i>
                        <p>
                            Orders
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.orders.index', ['status' => 'pending']) }}" class="nav-link" class="nav-link">
                                <i class="nav-icon bi bi-cart-plus-fill"></i>
                                <p>New Orders</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.orders.index', ['status' => 'processing']) }}" class="nav-link" class="nav-link">
                                <i class="nav-icon bi bi-check-circle-fill"></i>
                                <p>Accepted Orders</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.orders.index', ['status' => 'processing']) }}" class="nav-link" class="nav-link">
                                <i class="nav-icon bi bi-truck"></i>
                                <p>On Shipping Orders</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.orders.index', ['status' => 'completed']) }}" class="nav-link" class="nav-link">
                                <i class="nav-icon bi bi-bag-check-fill"></i>
                                <p>Completed Orders</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.orders.index', ['status' => 'cancelled']) }}" class="nav-link" class="nav-link">
                                <i class="nav-icon bi bi-x-circle-fill"></i>
                                <p>Canceled Orders</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <!-- Others -->
                <li class="nav-header">OTHERS</li>

                <li class="nav-item">
                    <a href="{{ asset('assets') }}/admin/docs/faq.html" class="nav-link">
                        <i class="nav-icon bi bi-envelope-fill"></i>
                        <p>Contact Messages</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ asset('assets') }}/admin/docs/faq.html" class="nav-link">
                        <i class="nav-icon bi bi-patch-question-fill"></i>
                        <p>FAQ</p>
                    </a>
                </li>

                <!-- Preferences -->
                <li class="nav-header">PREFERENCES</li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-gear-fill"></i>
                        <p>Settings</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>Users</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-info-circle-fill"></i>
                        <p>Informational</p>
                    </a>
                </li>

            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->