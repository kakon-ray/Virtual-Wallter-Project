@extends('layouts.admin.master')
@section('title')
    {{ 'Dashboard | Laravel Auth ' }}
@endsection

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('layouts.admin.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.admin.topnav')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="card p-5">
                        <form method="POST" action="{{ route('admin.package.submit') }}" id="packagecreate"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Package Name</label>
                                    <input required type="text" class="form-control" name="name"
                                        placeholder="Package Name">
                                </div>
                                <div class="col-lg-12 my-4">
                                    <label>Price</label>
                                    <input required type="text" class="form-control" name="price"
                                        placeholder="Package Price">
                                </div>
                                <div class="col-lg-12 my-4">
                                    <label>Packages Type</label>
                                    <select class="form-control" name="status" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="higher">higher</option>
                                        <option value="low">Low</option>
                                      </select>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
@endsection
