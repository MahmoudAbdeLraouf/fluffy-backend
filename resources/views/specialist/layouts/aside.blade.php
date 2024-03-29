<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
{{--        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">--}}
        <span class="brand-text font-weight-light">Fullfy</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Raouf</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-header"> أداره الطلبات </li>
                <li class="nav-item">
                    <a href="{{route('specialists.orders.new')}}" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>عرض الطلبات الجديده </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('specialists.orders.current')}}" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>عرض الطلبات الحاليه </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('specialists.orders.completed')}}" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>عرض الطلبات المنتهيه </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
