@php
    $prefix = Request::route()->getprefix();
    $route = Route::current()->getName();
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link" target="_blank" >
        <img src=""  class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text  f-w">E-commerce

      </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>

          @if(Auth::user()->category==1)
          <li class="nav-item has-treeview  {{ ($prefix=='/category')?'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview ">
              <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link  {{ ($route=='category.index')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item  ">
                <a href="{{ route('subcategory.index') }}" class="nav-link {{ ($route=='subcategory.index')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sub Category</p>
                </a>
              </li>
               <li class="nav-item  ">
                <a href="{{ route('childcategory.index') }}" class="nav-link {{ ($route=='childcategory.index')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Child Category</p>
                </a>
              </li>

              <li class="nav-item ">
                <a href="{{ route('brand.index') }}" class="nav-link {{ ($route=='brand.index')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brand</p>
                </a>
              </li>
                <li class="nav-item ">
                    <a href="{{ route('warehouse.index') }}" class="nav-link {{ ($route=='warehouse.index')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Warehouse</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('coupon.index') }}" class="nav-link {{ ($route=='coupon.index')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Coupon</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('campaign.index') }}" class="nav-link {{ ($route=='campaign.index')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Campaign</p>
                    </a>
                </li>
            </ul>
          </li>
          @endif

                      <li class="nav-item has-treeview {{ ($prefix=='/product')?'menu-open':'' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Product
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-info right">6</span>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('product.create') }}" class="nav-link {{ ($route=='product.create')?'active':'' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add New Product</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('product.index') }}" class="nav-link {{ ($route=='product.index')?'active':'' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All Product</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('product.show') }}" class="nav-link {{ ($route=='product.show')?'active':'' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show Product</p>
                        </a>
                    </li>

                </ul>
            </li>



            <li class="nav-item has-treeview {{ ($prefix=='/slider')?'menu-open':'' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Slider
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-info right">6</span>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">

                    <li class="nav-item">
                        <a href="{{ route('slider.index') }}" class="nav-link {{ ($route=='slider.index')?'active':'' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All List Slider</p>
                        </a>
                    </li>


                </ul>
            </li>


            <li class="nav-item has-treeview {{ ($prefix=='/seo')?'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Setting
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                      <a href="{{ route('seo.index') }}" class="nav-link {{ ($route=='seo.index')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SEO Setting</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('smtp.index') }}" class="nav-link {{ ($route=='smtp.index')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SMTP Setting</p>
                </a>
              </li>
               <li class="nav-item">
                   <a href="{{ route('page.index') }}" class="nav-link {{ ($route=='page.index')?'active':'' }}">

                   <i class="far fa-circle nav-icon"></i>
                  <p>Page Manage</p>
                </a>
              </li>

              <li class="nav-item">
                  <a href="{{ route('setting.index') }}" class="nav-link {{ ($route=='setting.index')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Website Setting </p>
                </a>
              </li>
            </ul>
          </li>



            <li class="nav-item has-treeview {{ ($prefix=='/pickup_point')?'menu-open':'' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Pickup Point
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-info right">6</span>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('pickup_point.index') }}" class="nav-link {{ ($route=='pickup_point.index')?'active':'' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pickup point</p>
                        </a>
                    </li>

                </ul>
            </li>



           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                User
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Role
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('role.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Role</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('role.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Role</p>
                </a>
              </li>

            </ul>
          </li>


         <li class="nav-header">PROFILE</li>

          <li class="nav-item">
            <a href="{{ route('admin.password.change') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p class="text">Password Change</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.logout') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Logout</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
