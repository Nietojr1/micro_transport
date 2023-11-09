<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('assets/users/user.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Hi {{ Auth::user()->first_name }}</a>
        </div>
    </div>

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <i class="right fas fa-shop"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/users') }}" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>Users</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/vehicle') }}" class="nav-link">
                            <i class="nav-icon fa fa-truck"></i>
                            <p>Vehicle</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/reports') }}" class="nav-link">
                            <i class="nav-icon fa fa-print"></i>
                            <p>Reports</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <i class="nav-icon fa fa-xmark"></i>
                            <p>Sing out</p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
