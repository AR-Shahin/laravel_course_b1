<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('Backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('Backend') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          {{-- <li class="nav-item menu-open">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li> --}}
          <li class="nav-item">
            <a href="{{ route('admin.category.index') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Category</p>
            </a>
          </li>

        </li>
        <li class="nav-item">
            <a href="{{ route('admin.sub-category.index') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Sub Category</p>
            </a>
          </li>
          @canany(['isAdmin','isEditor'])
          <li class="nav-item">
            <a href="{{ route('admin.post.index') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Post</p>
            </a>
          </li>
          @endcan
        <li class="nav-item">
          <a href="{{ route('admin.tag.index') }}" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>Tags</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.slider.index') }}" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>Sliders</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.website.index') }}" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>Website Details</p>
          </a>
        </li>
        <li class="nav-item">
            <a href="/" class="nav-link" target="_blank">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Website</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.admin.index')}}" class="nav-link" target="_blank">
                <i class="nav-icon far fa-circle text-warning"></i>
                <p>Users</p>
              </a>
          </li>
          @auth('web')
          <li class="nav-item">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button class="btn btn-info btn-block" onclick=" return confirm('Are you sure to logout in your Dashboard!')">Logout</button>
            </form>
          </li>
          @endauth
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
