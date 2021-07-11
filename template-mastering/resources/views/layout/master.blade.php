

@extends('layout.app')

@section('app_content')
<div class="wrapper">

    <!-- Preloader -->
    @includeIf('includes.preloader')

    <!-- Navbar -->
    @includeIf('includes.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @includeIf('includes.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

     @includeIf('includes.breadcumb')
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
              <!-- All content goes form here -->

            @yield('master_content')

          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
   @includeIf('includes.footer')
  </div>

  @endsection
