@php use App\Helpers\Helpers;use App\Models\User; @endphp
    <!-- app-header -->
<header class="app-header">

    <!-- Start::main-header-container -->
    <div class="main-header-container container-fluid">

        <!-- Start::header-content-left -->
        <div class="header-content-left">

            <!-- Start::header-element -->
            <div class="header-element">
                <div class="horizontal-logo">
                    <a href="{{ route('dashboard') }}" class="header-logo">
                        <img src="{{ asset('assets/images/brand-logos/desktop-logo.png')}}" alt="logo"
                             class="desktop-logo">
                        <img src="{{ asset('assets/images/brand-logos/toggle-logo.png')}}" alt="logo"
                             class="toggle-logo">
                        <img src="{{ asset('assets/images/brand-logos/desktop-dark.png')}}" alt="logo"
                             class="desktop-dark">
                        <img src="{{ asset('assets/images/brand-logos/toggle-dark.png')}}" alt="logo"
                             class="toggle-dark">
                        <img src="{{ asset('assets/images/brand-logos/desktop-white.png')}}" alt="logo"
                             class="desktop-white">
                        <img src="{{ asset('assets/images/brand-logos/toggle-white.png')}}" alt="logo"
                             class="toggle-white">
                    </a>
                </div>
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element">
                <!-- Start::header-link -->
                <a aria-label="Hide Sidebar"
                   class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle"
                   data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
                <!-- End::header-link -->

                <!-- Start::header-search -->
                <div class="header-link header-search-element d-none d-lg-block">
                    <input type="text" class="form-control" id="typehead" placeholder="Search for results..."
                           autocomplete="off">
                    <button class="btn pe-1"><i class="fe fe-search" aria-hidden="true"></i></button>
                </div>
                <!-- End::header-search -->
            </div>
            <!-- End::header-element -->


        </div>
        <!-- End::header-content-left -->

        <!-- Start::header-content-right -->
        <div class="header-content-right">

            <!-- Start::header-element -->
            <div class="header-element header-search d-block d-lg-none">
                <!-- Start::header-link -->
                <a href="javascript:void(0);" class="header-link" data-bs-toggle="modal" data-bs-target="#searchModal">
                    <i class="ti ti-search header-link-icon"></i>
                </a>
                <!-- End::header-link -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element country-selector">
                <!-- Start::header-link|dropdown-toggle -->
                <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-auto-close="outside"
                   data-bs-toggle="dropdown">
                    <img src="{{ asset('assets/images/flags/us_flag.jpg')}}" alt="img" class="rounded-circle">
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <ul class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                            <span class="avatar avatar-xs lh-1 me-2">
                                <img src="{{ asset('assets/images/flags/us_flag.jpg')}}" alt="img">
                            </span>
                            English
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                            <span class="avatar avatar-xs lh-1 me-2">
                                <img src="{{ asset('assets/images/flags/spain_flag.jpg')}}" alt="img">
                            </span>
                            Spanish
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                            <span class="avatar avatar-xs lh-1 me-2">
                                <img src="{{ asset('assets/images/flags/french_flag.jpg')}}" alt="img">
                            </span>
                            French
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                            <span class="avatar avatar-xs lh-1 me-2">
                                <img src="{{ asset('assets/images/flags/germany_flag.jpg')}}" alt="img">
                            </span>
                            German
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                            <span class="avatar avatar-xs lh-1 me-2">
                                <img src="{{ asset('assets/images/flags/italy_flag.jpg')}}" alt="img">
                            </span>
                            Italian
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                            <span class="avatar avatar-xs lh-1 me-2">
                                <img src="{{ asset('assets/images/flags/russia_flag.jpg')}}" alt="img">
                            </span>
                            Russian
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element header-theme-mode">
                <!-- Start::header-link|layout-setting -->
                <a href="javascript:void(0);" class="header-link layout-setting">
                    <span class="light-layout">
                        <!-- Start::header-link-icon -->
                        <i class="ti ti-moon  header-link-icon"></i>
                        <!-- End::header-link-icon -->
                    </span>
                    <span class="dark-layout">
                        <!-- Start::header-link-icon -->
                        <i class="ti ti-sun header-link-icon"></i>
                        <!-- End::header-link-icon -->
                    </span>
                </a>
                <!-- End::header-link|layout-setting -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element cart-dropdown">
                <!-- Start::header-link|dropdown-toggle -->
                <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-auto-close="outside"
                   data-bs-toggle="dropdown">
                    <i class="ti ti-basket header-link-icon"></i>
                    <span class="badge bg-success rounded-pill header-icon-badge" id="cart-icon-badge">4</span>
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <!-- Start::main-header-dropdown -->
                <div class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                    <div class="p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 fs-17 fw-semibold">Cart Items</p>
                            <span class="badge bg-success-transparent" id="cart-data">4 Items</span>
                        </div>
                    </div>
                    <div>
                        <hr class="dropdown-divider">
                    </div>
                    <ul class="list-unstyled mb-0" id="header-cart-items-scroll">
                        <li class="dropdown-item">
                            <div class="d-flex align-items-start cart-dropdown-item">
                                <img src="{{ asset('assets/images/ecommerce/jpg/4.jpg')}}" alt="img"
                                     class="avatar avatar-md br-5 me-3">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-start justify-content-between mb-0">
                                        <div class="mb-0 fs-13">
                                            <a href="cart.html" class="text-muted fw-normal">SomeThing Phone</a>
                                        </div>
                                        <div>
                                            <a href="javascript:void(0);"
                                               class="header-cart-remove float-end dropdown-item-close"><i
                                                    class="ti ti-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="header-product-item justify-content-between">
                                        <span class="mb-1 fs-15">$1,299.00</span>
                                        <span class="fs-12 text-muted">Quantity 2</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex align-items-start cart-dropdown-item">
                                <img src="{{ asset('assets/images/ecommerce/jpg/5.jpg')}}" alt="img"
                                     class="avatar avatar-md br-5 me-3">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-start justify-content-between mb-0">
                                        <div class="mb-0 fs-13">
                                            <a href="cart.html" class="text-muted fw-normal">Camera Lence</a>
                                        </div>
                                        <div>
                                            <a href="javascript:void(0);"
                                               class="header-cart-remove float-end dropdown-item-close"><i
                                                    class="ti ti-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="header-product-item justify-content-between">
                                        <span class="mb-1 fs-15">$2,439.00</span>
                                        <span class="fs-12 text-muted">Quantity 1</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex align-items-start cart-dropdown-item">
                                <img src="{{ asset('assets/images/ecommerce/jpg/3.jpg')}}" alt="img"
                                     class="avatar avatar-md br-5 me-3">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-start justify-content-between mb-0">
                                        <div class="mb-0 fs-13">
                                            <a href="cart.html" class="text-muted fw-normal">Photo Frame</a>
                                        </div>
                                        <div>
                                            <a href="javascript:void(0);"
                                               class="header-cart-remove float-end dropdown-item-close"><i
                                                    class="ti ti-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="header-product-item justify-content-between">
                                        <span class="mb-1 fs-15">$1,699.00</span>
                                        <span class="fs-12 text-muted">Quantity 1</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex align-items-start cart-dropdown-item">
                                <img src="{{ asset('assets/images/ecommerce/jpg/2.jpg')}}" alt="img"
                                     class="avatar avatar-md br-5 me-3">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-start justify-content-between mb-0">
                                        <div class="mb-0 fs-13">
                                            <a href="cart.html" class="text-muted fw-normal">White Headphones</a>
                                        </div>
                                        <div>
                                            <a href="javascript:void(0);"
                                               class="header-cart-remove float-end dropdown-item-close"><i
                                                    class="ti ti-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="header-product-item justify-content-between">
                                        <span class="mb-1 fs-15">$3,299.00</span>
                                        <span class="fs-12 text-muted">Quantity 3</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="p-3 empty-header-item border-top">
                        <div class="d-grid">
                            <a href="checkout.html" class="btn btn-primary">Proceed to checkout</a>
                        </div>
                    </div>
                    <div class="p-5 empty-item d-none">
                        <div class="text-center">
                            <span class="avatar avatar-xl avatar-rounded bg-warning-transparent">
                                <i class="ri-shopping-cart-2-line fs-2"></i>
                            </span>
                            <h6 class="fw-bold mb-1 mt-3">Your Cart is Empty</h6>
                            <span class="mb-3 fw-normal fs-13 d-block">Add some items to make me happy :)</span>
                            <a href="products.html" class="btn btn-primary btn-wave btn-sm m-1" data-abc="true">continue
                                shopping <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End::main-header-dropdown -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element notifications-dropdown">
                <!-- Start::header-link|dropdown-toggle -->
                <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown"
                   data-bs-auto-close="outside" id="messageDropdown" aria-expanded="false">
                    <i class="ti ti-notification header-link-icon"></i>
                    <span class="badge bg-secondary rounded-pill header-icon-badge pulse pulse-secondary"
                          id="notification-icon-badge">5</span>
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <!-- Start::main-header-dropdown -->
                <div class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                    <div class="p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 fs-17 fw-semibold">Notifications</p>
                            <span class="badge bg-secondary-transparent" id="notifiation-data">5 Unread</span>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <ul class="list-unstyled mb-0" id="header-notification-scroll">
                        <li class="dropdown-item">
                            <div class="d-flex align-items-start">
                                <div class="pe-2">
                                    <span class="avatar avatar-md bg-primary"><i
                                            class="ti ti-folder fs-20 text-fixed-white"></i></span>
                                </div>
                                <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-0 fw-semibold"><a href="notifications.html">Your Order Has Been
                                                Shipped</a></p>
                                        <span
                                            class="text-muted fw-normal fs-12 header-notification-text">2 hours ago</span>
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);"
                                           class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i
                                                class="ti ti-x fs-16"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex align-items-start">
                                <div class="pe-2">
                                    <span class="avatar avatar-md bg-success"><i
                                            class="ti ti-truck-delivery fs-20 text-fixed-white"></i></span>
                                </div>
                                <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-0 fw-semibold"><a href="notifications.html">New Order Received</a>
                                        </p>
                                        <span
                                            class="text-muted fw-normal fs-12 header-notification-text">2 hours ago</span>
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);"
                                           class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i
                                                class="ti ti-x fs-16"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex align-items-start">
                                <div class="pe-2">
                                    <span class="avatar avatar-md bg-danger"><i
                                            class="ti ti-brand-dribbble fs-20 text-fixed-white"></i></span>
                                </div>
                                <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-0 fw-semibold"><a href="notifications.html">Project has been
                                                approved</a></p>
                                        <span
                                            class="text-muted fw-normal fs-12 header-notification-text">1 day ago</span>
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);"
                                           class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i
                                                class="ti ti-x fs-16"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex align-items-start">
                                <div class="pe-2">
                                    <span class="avatar avatar-md bg-info"><i
                                            class="ti ti-user-check fs-20 text-fixed-white"></i></span>
                                </div>
                                <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-0 fw-semibold"><a href="notifications.html">Account Has Been
                                                Verified</a></p>
                                        <span
                                            class="text-muted fw-normal fs-12 header-notification-text">5 hours ago</span>
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);"
                                           class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i
                                                class="ti ti-x fs-16"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex align-items-start">
                                <div class="pe-2">
                                    <span class="avatar avatar-md bg-secondary"><i
                                            class="ti ti-edit fs-20 text-fixed-white"></i></span>
                                </div>
                                <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-0 fw-semibold"><a href="notifications.html">Updates Available</a>
                                        </p>
                                        <span
                                            class="text-muted fw-normal fs-12 header-notification-text">10 hours ago</span>
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);"
                                           class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i
                                                class="ti ti-x fs-16"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="p-3 empty-header-item1 border-top">
                        <div class="d-grid">
                            <a href="notifications.html" class="btn btn-primary">View All</a>
                        </div>
                    </div>
                    <div class="p-5 empty-item1 d-none">
                        <div class="text-center">
                            <span class="avatar avatar-xl avatar-rounded bg-secondary-transparent">
                                <i class="ri-notification-off-line fs-2"></i>
                            </span>
                            <h6 class="fw-semibold mt-3">No New Notifications</h6>
                        </div>
                    </div>
                </div>
                <!-- End::main-header-dropdown -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element header-fullscreen">
                <!-- Start::header-link -->
                <a onclick="openFullscreen();" href="#" class="header-link">
                    <i class="ti ti-maximize full-screen-open header-link-icon"></i>
                    <i class="ti ti-arrows-maximize full-screen-close header-link-icon d-none"></i>
                </a>
                <!-- End::header-link -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element">
                <!-- Start::header-link|dropdown-toggle -->
                <a href="#" class="header-link dropdown-toggle" id="mainHeaderProfile" data-bs-toggle="dropdown"
                   data-bs-auto-close="outside" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <div class="me-sm-2 me-0">
                            <img
                                src="{{ Helpers::imageUrl(Auth::user()->avatar, User::IMAGE_UPLOAD_PATH) }}"
                                alt="img" width="32" height="32" class="rounded-circle">
                        </div>
                    </div>
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end"
                    aria-labelledby="mainHeaderProfile">
                    <li><a class="dropdown-item d-flex" href="profile.html"><i
                                class="ti ti-user-circle fs-18 me-2 op-7"></i>Profile ({{ Auth::user()->role->name }}
                            )</a></li>
                    <li><a class="dropdown-item d-flex" href="mail.html"><i class="ti ti-inbox fs-18 me-2 op-7"></i>Inbox
                            <span class="badge bg-warning-transparent ms-auto">37</span></a></li>
                    <li><a class="dropdown-item d-flex border-block-end" href="to-do-list.html"><i
                                class="ti ti-clipboard-check fs-18 me-2 op-7"></i>Task Manager</a></li>
                    <li><a class="dropdown-item d-flex" href="settings.html"><i
                                class="ti ti-adjustments-horizontal fs-18 me-2 op-7"></i>Settings</a></li>
                    <li><a class="dropdown-item d-flex" href="chat.html"><i class="ti ti-headset fs-18 me-2 op-7"></i>Support</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="dropdown-item d-flex text-danger">
                                <i class="ti ti-logout fs-18 me-2 op-7"></i>
                                <span class="align-middle">Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element">
                <!-- Start::header-link|switcher-icon -->
                <a href="#" class="header-link switcher-icon" data-bs-toggle="offcanvas"
                   data-bs-target="#switcher-canvas">
                    <i class="ti ti-settings header-link-icon"></i>
                </a>
                <!-- End::header-link|switcher-icon -->
            </div>
            <!-- End::header-element -->

        </div>
        <!-- End::header-content-right -->

    </div>
    <!-- End::main-header-container -->

</header>
<!-- /app-header -->
