<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-Frame-Options" content="deny">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description"
        content="The National Web Portal of Bangladesh (বাংলাদেশ) is the single window of all information and services for citizens and other stakeholders. Here the citizens can find all initiatives, achievements, investments, trade and business, policies, announcements, publications, statistics and others facts" />
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon1.ico') }}" type="img/x-icon" />
    <title>SPMMS</title>
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/buttons.bootstrap4.min.css') }}" type="text/css" />
    <!-- Responsive datatable examples -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.bootstrap4.min.css') }}" type="text/css" />
    <!-- Multi Item Selection examples -->
    <link rel="stylesheet" href="{{ asset('assets/css/select.bootstrap4.min.css') }}" type="text/css" />
    <!---------- google fonts ---------->
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900,Playfair+Display:400,700,700i,900"
        rel="stylesheet">
    <!---------- bangla font ---------->
    <link href="https://fonts.maateen.me/bangla/font.css" rel="stylesheet">
    <link href="https://fonts.maateen.me/adorsho-lipi/font.css" rel="stylesheet">
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
    <!-- Font Icons CSS-->
    <link href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css" rel="stylesheet">
    <!---------- fontawesome ---------->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/css/normalize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icon-font.min.css') }}">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!---------- animated css ---------->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <!--For all browser support -->
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
    <!-- style css-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="theme-stylesheet">
    <!-- Custom css - for your changes-->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

</head>

<body>
    <div class="page login-page">
        <div class="container d-flex align-items-center">
            <div class="form-holder has-shadow">
                <div class="row">
                    <!-- Logo & Information Panel-->
                    <div class="col-lg-6">
                        <div class="info d-flex align-items-center">
                            <div class="content text-center mx-auto mt-0 pt-0">
                                <div class="logo mt-0 pt-0">
                                    <img alt="Dashboard Logo" class="img-fluid rounded-circle"
                                        src="{{ asset('assets/img/BD-Logo.jpg') }}" height="160" width="160">
                                </div>
                                <h3 class="text-white py-1"> স্মার্ট প্রজেক্ট মনিটরিং ও ম্যানেজমেন্ট সিস্টেম </h3>
                                <h5 class="text-white"> জেলা প্রশাসন, নোয়াখালী </h5>
                            </div>
                        </div>
                    </div>
                    <!-- Form Panel    -->
                    <div class="col-lg-6 bg-white">
                        <div class="form d-flex align-items-center">
                            <div class="content">
                                <form
                                    class="validate-form  @if ($errors->any()) needs-validation was-validated @endif "
                                    id="login-form" action="{{ route('loginCheck') }}" method="post">
                                    @csrf
                                    <h3 class="mb-5 text-center text-muted"> Admin Login </h3>
                                    <div class="form-group">
                                        <input id="login-username" type="email" name="email"
                                            class="input-material @error('email') is-invalid @enderror " required>
                                        <label for="login-username" class="label-material">Email</label>
                                        @error('email')
                                            <div class="text-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="login-password" type="password" name="password"
                                            class="input-material" required>
                                        <label for="login-password" class="label-material">Password</label>
                                        @error('password')
                                            <div class="text-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary logBTN"
                                        style="border-bottom: 5px solid #00d03b;">
                                        Login
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyrights text-center my-3">
            <p>Design and Develop by: <a href="http://a4bbd.com/" target="_blank" class="external">www.a4bbd.com</a>
            </p>
        </div>
    </div>
    <!-- for custom.js -->
    <script src="js/custom.js"></script>
    <!-- Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="{{ asset('assets/js/tether.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.cookie.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="{{ asset('assets/js/charts-home.js') }}"></script>
    <script src="{{ asset('assets/js/front.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <!-- replace it by local Font Awesome-->
    <script src="https://use.fontawesome.com/99347ac47f.js"></script>
    <script src="{{ asset('assets/js/fontawesome.com/8918b93e7b.js') }}"></script>
    <script src="{{ asset('assets/js/fontawesome.js') }}"></script>
    <script src="https://kit.fontawesome.com/8918b93e7b.js"></script>
    <!-- Required datatable js -->
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.print.min.js') }}"></script>
    <!-- Key Tables -->
    <script src="{{ asset('assets/js/dataTables.keyTable.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Selection table -->
    <script src="{{ asset('assets/js/dataTables.select.min.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.app.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            // Default Datatable
            $('#datatable').DataTable();

            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf']
            });

            // Key Tables

            $('#key-table').DataTable({
                keys: true
            });

            // Responsive Datatable
            $('#responsive-datatable').DataTable();

            // Multi Selection Datatable
            $('#selection-datatable').DataTable({
                select: {
                    style: 'multi'
                }
            });

            table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        });
        window.onload = function() {
            @if (session()->has('message'))
                @if (session('type') == 'success')
                    alert('{{ session('message') }}');
                @endif
                @if (session('type') == 'warning')
                    alert('{{ session('message') }}');
                @endif
                @if (session('type') == 'danger')
                    alert('{{ session('message') }}');
                @endif
            @endif
        }
    </script>
</body>

</html>
