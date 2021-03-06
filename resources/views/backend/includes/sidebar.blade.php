<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('assets/backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{optional(auth()->user())->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library --

          <!--Category-->
          <li class="nav-item {{request()->is('category*') ? 'menu-open' :""}}">
            <a href="#" class="nav-link {{request()->is('category*') ? 'active' :""}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link {{request()->is('category') ? 'active' :""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{route('category.create')}}" class="nav-link {{request()->is('category/create') ? 'active' :""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>

            </ul>

          </li>

          <!--Subcategory-->
          <li class="nav-item {{request()->is('sub-category*') ? 'menu-open' :""}}">
            <a href="#" class="nav-link {{request()->is('sub-category*') ? 'active' :""}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Subcategory
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('sub_category.index')}}" class="nav-link {{request()->is('sub-category') ? 'active' :""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{route('sub_category.create')}}" class="nav-link {{request()->is('sub-category/create') ? 'active' :""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>

            </ul>

          </li>

          <!--Products-->
          <li class="nav-item {{request()->is('products*') ? 'menu-open' :""}}">
            <a href="#" class="nav-link {{request()->is('products*') ? 'active' :""}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Products
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('products.index')}}" class="nav-link {{request()->is('products') ? 'active' :""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{route('products.create')}}" class="nav-link {{request()->is('products/create') ? 'active' :""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>

            </ul>

          </li>

          <!--Tags-->
          <li class="nav-item {{request()->is('tags*') ? 'menu-open' :""}}">
            <a href="#" class="nav-link {{request()->is('tags*') ? 'active' :""}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tags
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('tags.index')}}" class="nav-link {{request()->is('tags') ? 'active' :""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{route('tags.create')}}" class="nav-link {{request()->is('tags/create') ? 'active' :""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>

            </ul>

          </li>

          <!--Attributes-->
          <li class="nav-item {{request()->is('attributes*') ? 'menu-open' :""}}">
            <a href="#" class="nav-link {{request()->is('attributes*') ? 'active' :""}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Attributes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('attributes.index')}}" class="nav-link {{request()->is('attributes') ? 'active' :""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{route('attributes.create')}}" class="nav-link {{request()->is('attributes/create') ? 'active' :""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>

            </ul>

          </li>

          <!--Attributes-->
          <li class="nav-item {{request()->is('attributes*') ? 'menu-open' :""}}">
            <a href="{{route('setting.create')}}" class="nav-link {{request()->is('setting/create') ? 'active' :""}}">
                <i class="fa fa-cog nav-icon"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

          </li>

          <li class="nav-item menu-open">
            <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          <i class="nav-icon fas fa-sign-out-alt"></i>{{ __('Logout') }}
         </a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
