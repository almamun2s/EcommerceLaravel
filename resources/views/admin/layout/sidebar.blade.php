<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{ asset('admin/images/myPhoto2.jpg') }}" alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{ auth()->user()->name }}</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i>
                    Online</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li class="{{ request()->routeIs('admin.dashboard') ? 'mm-active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="fa-solid fa-table-columns"></i><span>Dashboard</span>
                    </a>
                </li>

                <li class="
                    @if (request()->routeIs('admin.category.index') ||
                            request()->routeIs('admin.category.edit') ||
                            request()->routeIs('admin.category.create')) mm-active @endif
                ">
                    <a href="{{ route('admin.category.index') }}" class="waves-effect">
                        <i class="fa-solid fa-list"></i><span>Category</span>
                    </a>
                </li>

                <li class="
                    @if (request()->routeIs('admin.product.index') ||
                            request()->routeIs('admin.product.edit') ||
                            request()->routeIs('admin.product.create')) mm-active @endif
                ">
                    <a href="{{ route('admin.product.index') }}" class="waves-effect">
                        <i class="fa-solid fa-shirt"></i><span>Product</span>
                    </a>
                </li>




            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
