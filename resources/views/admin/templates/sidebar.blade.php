<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{asset('assets')}}/admin/index3.html" class="brand-link">
      <img src="{{asset('assets')}}/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">DAV</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>
                        Menu
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{url("admin/island")}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Island</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url("admin/destination")}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Destination</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url("admin/tour")}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tour</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url("admin/category")}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Category</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url("admin/product")}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Product</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
