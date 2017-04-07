@include('admin.layouts.header')

  <div class="page-container">
    <div class="page-sidebar-wrapper">
      @include('admin.layouts.sidebar')
    </div>

    <div class="page-content-wrapper">
      <!-- BEGIN CONTENT BODY -->
      <div class="page-content">
        @yield('content')
      </div>
    </div>
  </div>
  <!-- END CONTAINER -->
  
@include('admin.layouts.footer')
