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
                <li class="nav-header">اداره أنواع الحيوانات </li>
                <li class="nav-item">
                    <a href="{{route('animal-types.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>عرض انواع الحيوانات </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('animal-types.create')}}" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>أضافه نوع جديد</p>
                    </a>
                </li>
                <li class="nav-header"> أداره المدن والمناطق </li>
                <li class="nav-item">
                    <a href="{{route('cities.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>عرض المدن </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('cities.create')}}" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>أضافه مدينه جديده</p>
                    </a>
                </li>
                <li class="nav-header"> أداره انواع التطعيمات </li>
                <li class="nav-item">
                    <a href="{{route('vaccinations.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>عرض انواع التطعيمات </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('vaccinations.create')}}" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>أضافه نوع جديد</p>
                    </a>
                </li>
                <li class="nav-header"> أداره المختصين  </li>
                <li class="nav-item">
                    <a href="{{route('specialists.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>عرض جميع المختصين </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('specialists.create')}}" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>أضافه مختص جديد</p>
                    </a>
                </li>
                <li class="nav-header"> أداره العملاء  </li>
                <li class="nav-item">
                    <a href="{{route('clients.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>عرض جميع العملاء </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('clients.create')}}" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>أضافه عميل جديد</p>
                    </a>
                </li>
                <li class="nav-header"> أداره الطلبات  </li>
                <li class="nav-item">
                    <a href="{{route('orders.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>عرض جميع الطلبات </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('orders.create')}}" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>أضافه طلب جديد</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
