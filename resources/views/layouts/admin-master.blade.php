<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bookshop admin - Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('/')}}assets/img/favicon-2.png" type="image/x-icon">
    <!-- Custom fonts for this template-->
    <link href="{{asset('/')}}admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('/')}}admin/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Data Table -->
    <link href="{{asset('/')}}admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('admin/css/custom.css')}}" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    @include('layouts.includes.admin-sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @include('layouts.includes.admin-topbar')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            @yield('content')

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; <strong>tahmid-ni7</strong> <span id="year"></span></span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('/')}}admin/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('/')}}admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('/')}}admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('/')}}admin/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="{{asset('/')}}admin/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{asset('/')}}admin/js/demo/chart-area-demo.js"></script>
<script src="{{asset('/')}}admin/js/demo/chart-pie-demo.js"></script>
<!-- Page level plugins -->
<script src="{{asset('/')}}admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{asset('/')}}admin/js/demo/datatables-demo.js"></script>
@yield('script')
<script>
    $('#year').text(new Date().getFullYear())
</script>

</body>

</html>

