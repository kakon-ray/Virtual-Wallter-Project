<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title> @yield('title')</title>

        <!-- Custom fonts for this template-->
        <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/css/sb-admin-2.css') }}" rel="stylesheet">

        <style>
            .swalstyle {
                width: 300px !important;
                font-size: 10px !important;
            }

            .title {
                font-size: 20px;
                text-align: center;
                padding: 50px 30px;

            }

            .btn-submit {
                background: #ffffff;
                border: 1px solid #dddddd;
                color: #000000;
                padding: 10px 30px;
                transition: 0.4s;
                border-radius: 5px;
                margin-top: 10px
            }

            .btn-submit:hover {
                background: #0093e7;
                border-color: #0093e7;
                color: #ffffff;
            }

            .bg-gradient-info {
                background-color: #0093e7!important;
                background-image: linear-gradient(180deg, #0093e7 10%, #0093e7 100%)!important;
                background-size: cover!important;
            }

            .btn-info{
                background-color: #0093e7!important;
            }
        </style>
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

            <!-- Page Content -->
            <main>
                {{-- @include('Layouts.admin.navigation') --}}

                @yield('content')



            </main>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->

        <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

        <!-- Page level plugins -->
        <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>
        <!-- Page level custom scripts -->
        <script src="{{ asset('admin/js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('admin/js/demo/chart-pie-demo.js') }}"></script>
        <script src="{{ asset('admin/js/auth.js') }}"></script>

        {{-- datatables  --}}
        <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>
        <script src="{{ asset('admin/js/custome.js') }}"></script>

        <!-- sweetalert -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- axios -->
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


        {{-- <script>
            var desc;
            ClassicEditor
                .create(document.querySelector('#ck_editor'), {
                    ckfinder: {
                        uploadUrl: '{{ route('admin.image.upload') . '?_token=' . csrf_token() }}',
                    }
                })
                .then(editor => {
                    console.log(editor)
                })
                .catch(error => {
                    console.error(error);
                });
        </script> --}}

    </body>

</html>
