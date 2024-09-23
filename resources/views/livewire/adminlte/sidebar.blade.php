<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>
                @if (Auth::User()->role == "root" || Auth::User()->role == "admin")
                <li class="nav-header">Hardware Managemen</li>
                <li class="nav-item">
                    <a href="{{ route('admin.vesselview.index', ['index' => 'view']) }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Vessel Management
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.pmview.index', ['index' => 'view']) }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            PM Management
                        </p>
                    </a>
                </li>
                @endif
                <li class="nav-header">Monitoring</li>
                <li class="nav-item">
                    <a href="{{ route('admin.checkView') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Realtime Checking Machine
                        </p>
                    </a>
                </li>

                @if (Auth::User()->role == "root" || Auth::User()->role == "admin")
                <li class="nav-header">Form Input</li>
                <li class="nav-item">
                    <a href="{{ route('admin.connectP2V') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Connet PM to Vessel
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.dailycheck') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Daily Check
                        </p>
                    </a>
                </li>
                @endif

                @if (Auth::User()->role == "root")
                <li class="nav-header">User</li>
                <li class="nav-item">
                    <a href="{{ route('admin.listUser') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Management User
                        </p>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>