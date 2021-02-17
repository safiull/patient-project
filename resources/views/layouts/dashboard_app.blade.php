<!DOCTYPE html>
<html lang="en">
<head>
  <title>BRIT Medicare</title>

  <!-- jQuery -->
  <script src="{{ asset('dashboard_assets') }}/plugins/jquery/jquery.min.js"></script>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('dashboard_assets') }}/dist/img/AdminLTELogo.png">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('dashboard_assets') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('dashboard_assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('dashboard_assets') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('dashboard_assets') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dashboard_assets') }}/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="{{ asset('') }}css/style.css">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('home') }}" class="brand-link">
      <img src="{{ asset('dashboard_assets') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">BRIT Medicare</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item @yield('dashboard')">
            <a href="#" class="nav-link @yield('dashboard-active')">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('home') }}" class="nav-link @yield('dashboard-active')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item @yield('e-prescription')">
            <a href="#" class="nav-link @yield('e-prescription-active')">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('e_prescription') }}" class="nav-link @yield('e-prescription-active')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>E-Prescription</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item @yield('user')">
            <a href="#" class="nav-link @yield('user-active')">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('users') }}" class="nav-link @yield('user-active')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User list</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item @yield('patientlist')">
            <a href="#" class="nav-link @yield('patient-active')">
              <i class="nav-icon fas fa-procedures"></i>
              <p>
                Patient
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('patients') }}" class="nav-link @yield('patient-active')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Patient list</p>
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



@yield('dashboard_content')





  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2019-2020 <a target="_blank" href="https://www.equation-it.com/">Equation IT</a>.</strong>
    All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


<!-- Bootstrap -->
<script src="{{ asset('dashboard_assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- DataTables  & Plugins -->
<script src="{{ asset('dashboard_assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('dashboard_assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('dashboard_assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('dashboard_assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('dashboard_assets') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('dashboard_assets') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('dashboard_assets') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('dashboard_assets') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('dashboard_assets') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('dashboard_assets') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('dashboard_assets') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('dashboard_assets') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dashboard_assets') }}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dashboard_assets') }}/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

var dataTableButtons = [
    {
      extend:    'copy',
      text:      '<i class="fa fa-files-o"></i> Copy',
      titleAttr: 'Copy',
      className: 'btn btn-default btn-sm',
      exportOptions: {
          columns: ':visible:not(:last-child)'
      }
    },
    {
      extend:    'csv',
      text:      '<i class="fa fa-files-o"></i> CSV',
      titleAttr: 'CSV',
      className: 'btn btn-default btn-sm',
      exportOptions: {
          columns: ':visible:not(:last-child)'
      }
    },
    {
      extend:    'excel',
      text:      '<i class="fa fa-files-o"></i> Excel',
      titleAttr: 'Excel',
      className: 'btn btn-default btn-sm',
      exportOptions: {
          columns: ':visible:not(:last-child)'
      }
    },
    {
      extend:    'pdf',
      text:      '<i class="fa fa-file-pdf-o"></i> PDF',
      titleAttr: 'PDF',
      className: 'btn btn-default btn-sm',
      exportOptions: {
          columns: ':visible:not(:last-child)'
      }

    },               
    {
      extend:    'print',
      text:      '<i class="fa fa-print"></i> Print',
      titleAttr: 'Print',
      className: 'btn btn-default btn-sm',
      exportOptions: {
          columns: ':visible:not(:last-child)'
      }
    },  
];
</script>
</body>
</html>
