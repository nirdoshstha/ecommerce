<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('assets/backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">E-commerce</span>
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

               <!--Menu-->
               <li class="nav-item {{request()->is('menu*') ? 'menu-open' :""}}">
                 <a href="#" class="nav-link {{request()->is('menu*') ? 'active' :""}}">
                   <i class="nav-icon fas fa-tachometer-alt"></i>
                   <p>
                     Menu
                     <i class="right fas fa-angle-left"></i>
                   </p>
                 </a>
                 <ul class="nav nav-treeview">
                   <li class="nav-item">
                     <a href="{{route('menu.index')}}" class="nav-link {{request()->is('menu') ? 'active' :""}}">
                       <i class="far fa-circle nav-icon"></i>
                       <p>List</p>
                     </a>
                   </li>
                   <li class="nav-item ">
                     <a href="{{route('menu.create')}}" class="nav-link {{request()->is('menu/create') ? 'active' :""}}">
                       <i class="far fa-circle nav-icon"></i>
                       <p>Create</p>
                     </a>
                   </li>

                 </ul>

               </li>

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

          <!--Coupon-->
          <li class="nav-item {{request()->is('coupon*') ? 'menu-open' :""}}">
            <a href="#" class="nav-link {{request()->is('coupon*') ? 'active' :""}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Coupon
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('coupon.index')}}" class="nav-link {{request()->is('coupon') ? 'active' :""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{route('coupon.create')}}" class="nav-link {{request()->is('coupon/create') ? 'active' :""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>

            </ul>

          </li>


          <!--Multple Images-->
          <li class="nav-item {{request()->is('product-images*') ? 'menu-open' :""}}">
            <a href="#" class="nav-link {{request()->is('product-images*') ? 'active' :""}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Multiple Images
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('product_images.index')}}" class="nav-link {{request()->is('product-images') ? 'active' :""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{route('product_images.create')}}" class="nav-link {{request()->is('product-images/create') ? 'active' :""}}">
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

          <!--Order-->
          <li class="nav-item {{request()->is('order*') ? 'menu-open' :""}}">
            <a href="#" class="nav-link {{request()->is('order*') ? 'active' :""}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Orders
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('order.index')}}" class="nav-link {{request()->is('order') ? 'active' :""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{route('order.create')}}" class="nav-link {{request()->is('order/create') ? 'active' :""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>

            </ul>

          </li>

          <!--Setting-->
          <li class="nav-item {{request()->is('attributes*') ? 'menu-open' :""}}">
            <a href="{{route('setting.create')}}" class="nav-link {{request()->is('setting/create') ? 'active' :""}}">
                <i class="fa fa-cog nav-icon"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>

          <!--User profile and Password Reset-->
          <li class="nav-item">
            <a href="{{route('user_profile.create')}}" class="nav-link">
                <i class="fa fa-cog nav-icon"></i>
              <p>
                User Profile
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
