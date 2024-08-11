<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('adminAssets/new_admin/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('adminAssets/new_admin/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('adminAssets/new_admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('adminAssets/new_admin/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('adminAssets/new_admin/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('adminAssets/new_admin/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('adminAssets/new_admin/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('adminAssets/new_admin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('adminAssets/new_admin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  <link href="{{asset('adminAssets/new_admin/assets/css/style.css')}}" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{URL::to('admin/dashboard')}}" class="logo d-flex align-items-center">
        <img src="{{asset('adminAssets/new_admin/assets/img/logo.png')}}" alt="">
        <span class="d-none d-lg-block"></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
<nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="{{URL::to('admin/logout')}}">
            <i class="bi bi-box-arrow-right"></i>
            <span class="d-none d-md-block ps-2">Sign Out</span>
          </a><!-- End Profile Iamge Icon -->

          <!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav>
    
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{URL::to('admin/dashboard')}}" class="active">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav1" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Export</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav1" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        
          <li>
            <a href="{{URL::to('admin/export_form')}}">
              <i class="bi bi-circle"></i><span>Entry Export</span>
            </a>
          </li>
          
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav2" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Import</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav2" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        
          <li>
            <a href="{{URL::to('admin/import_form')}}">
              <i class="bi bi-circle"></i><span>Entry Import</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Forms Nav -->
 <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav3" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Search</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav3" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        
        
          <li>
            <a href="{{URL::to('admin/search_export')}}">
              <i class="bi bi-circle"></i><span>Search Export</span>
            </a>
          </li>
          <li>
            <a href="{{URL::to('admin/search_import')}}">
              <i class="bi bi-circle"></i><span>Search Import</span>
            </a>
          </li>
          
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li><a href="{{URL::to('admin/free_time')}}"><i class="bi bi-circle"></i><span>Free Time </span></a></li>
          <li><a href="{{URL::to('admin/bill_no_blank')}}"><i class="bi bi-circle"></i><span>Bill No. Blank</span></a></li>
          <li><a href="{{URL::to('admin/shipping_sec')}}"><i class="bi bi-circle"></i><span>Shipping Sec.</span></a></li>
        </ul>
      </li>
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">


    @yield('content')



  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>MSLPL</span></strong>. All Rights Reserved | Designed by <a href="https://thinktechsoftware.com/">THINKTECH SOFTWARE</a>
    </div>
    
  </footer><!-- End Footer -->

 <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- Vendor JS Files -->
  {{-- <script src="{{asset('adminAssets/new_admin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script> --}}
  <script src="{{asset('adminAssets/new_admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('adminAssets/new_admin/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('adminAssets/new_admin/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('adminAssets/new_admin/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('adminAssets/new_admin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('adminAssets/new_admin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('adminAssets/new_admin/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('adminAssets/new_admin/assets/js/main.js')}}"></script>

  <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

  <script>
     $('#example').DataTable();
  </script>


  @yield('js')

</body>

</html>