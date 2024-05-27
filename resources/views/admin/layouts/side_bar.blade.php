<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/dashboard') }}" class="brand-link" style="padding:20px 20px 20px 20px">
        <img style="width: 205px; height: 80px;" src="{{ asset('admin-assets/images/main-logo.png') }}" alt="RLM Logo">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin-assets/images/avatar.png') }}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="javascript:void(0);" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}"
                       class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/manage-sub-categories') }}"
                       class="nav-link ">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>Manage Sub-Categories</p>
                    </a>
                </li>
                {{--                <li class="nav-item">--}}
                {{--                    <a href="{{route('manage.sizes')}}"--}}
                {{--                       class="nav-link ">--}}
                {{--                        <i class="nav-icon fas fa-list-alt"></i>--}}
                {{--                        <p>Manage Image Size</p>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                <li class="nav-item">
                    <a href="{{ url('/manage-images') }}"
                       class="nav-link ">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>Manage Images</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/manage-blog') }}"
                       class="nav-link ">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>Manage Blog</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/manage-contact-us-users') }}"
                       class="nav-link ">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>Manage Contact-Us</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.user') }}"
                       class="nav-link ">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>Manage Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.order') }}"
                       class="nav-link ">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>Orders</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
