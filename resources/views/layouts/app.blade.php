
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title ?? 'ATMP App'}}</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('backend/images/logo/logo.png')}}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- CSRF_TOKEN -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/simple-datatables/style.css')}}">

    <link rel="stylesheet" href="{{asset('backend/vendors/iconly/bold.css')}}">

    <link rel="stylesheet" href="{{asset('backend/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('backend/images/favicon.svg')}}" type="image/x-icon">
    <!-- Calendar -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
    @yield('header')
</head>

<body>
    <div id="app">
        @include('layouts.partials.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            @yield('content')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- SweetAlert -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">
        $(function() {
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            });

            $('.swalDefaultSuccess').show(function() {
            Toast.fire({
                icon: 'success',
                title: '{{Session::get('alert')}}'
            })
            });
            $('.swalDefaultInfo').show(function() {
            Toast.fire({
                icon: 'info',
                title: '{{Session::get('alert')}}'
            })
            });
            $('.swalDefaultError').show(function() {
            Toast.fire({
                icon: 'error',
                title: '{{Session::get('alert')}}'
            })
            });
            $('.swalDefaultWarning').show(function() {
            Toast.fire({
                icon: 'warning',
                title: '{{Session::get('alert')}}'
            })
            });
            $('.swalDefaultQuestion').show(function() {
            Toast.fire({
                icon: 'question',
                title: '{{Session::get('alert')}}'
            })
            });
        });
    </script>

    <script src="{{asset('backend/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('backend/vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset('backend/js/pages/dashboard.js')}}"></script>

    <script src="{{asset('backend/js/main.j')}}s"></script>
    <!-- SweetAlert
    ============================================ -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Calendar -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <!-- Datatable -->
    <script src="{{asset('backend/vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    @yield('footer')
</body>

</html>