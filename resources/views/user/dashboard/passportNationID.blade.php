@extends('layouts.user.guest')
@section('title')
    {{ 'User Dashboard | Laravel Auth ' }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <!-- Sidebar -->
                <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
                    <div class="position-sticky">
                        <div class="list-group list-group-flush mx-3 mt-4">
                            <a href="{{ route('user.dashboard') }}" class="list-group-item list-group-item-action py-2 ripple"
                                aria-current="true">
                                <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>User Information</span>
                            </a>
                            @if($myorder->package_type == 'higher')
                                <a href="{{ route('user.passport.nationidcard') }}"
                                    class="list-group-item list-group-item-action py-2 ripple">
                                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Passport and ID</span>
                                </a>
                            @endif

                            <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                                    class="fas fa-lock fa-fw me-3"></i><span>Password</span></a>
                            <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                                    class="fas fa-chart-line fa-fw me-3"></i><span>Analytics</span></a>
                            <a href="#" class="list-group-item list-group-item-action py-2 ripple">
                                <i class="fas fa-chart-pie fa-fw me-3"></i><span>SEO</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                                    class="fas fa-chart-bar fa-fw me-3"></i><span>Orders</span></a>
                            <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                                    class="fas fa-globe fa-fw me-3"></i><span>International</span></a>
                            <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                                    class="fas fa-building fa-fw me-3"></i><span>Partners</span></a>
                            <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                                    class="fas fa-calendar fa-fw me-3"></i><span>Calendar</span></a>
                            <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                                    class="fas fa-users fa-fw me-3"></i><span>Users</span></a>
                            <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                                    class="fas fa-money-bill fa-fw me-3"></i><span>Sales</span></a>
                        </div>
                    </div>
                </nav>
                <!-- Sidebar -->


            </div>
            <div class="col-lg-9">
                <div class="text-center py-5">
                    <h2>Passport Image Upload</h2>
                </div>
                <form action="{{ route('user.information.submit') }}" id="information" method="POST">
                    @csrf
                    <input type="text" name="id" class="d-none" value="{{ Auth::guard('web')->user()->id }}">
                    <div class="row mb-4">

                        <div class="col">
                            <label class="form-label">Passport Front Image</label>
                            <input type="file" name="image" required="" accept="image/*" class="dropify">
                        </div>
                        <div class="col">
                            <label class="form-label">Passport Back Image</label>
                            <input type="file" name="image" required="" accept="image/*" class="dropify">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mb-4">Submit Information</button>
                </form>


                <div class="text-center py-5">
                    <h2>National Id Image Upload</h2>
                </div>
                <form action="{{ route('user.information.submit') }}" id="information" method="POST">
                    @csrf
                    <input type="text" name="id" class="d-none" value="{{ Auth::guard('web')->user()->id }}">
                    <div class="row mb-4">

                        <div class="col">
                            <label class="form-label">Passport Front Image</label>
                            <input type="file" name="image" required="" accept="image/*" class="dropify">
                        </div>
                        <div class="col">
                            <label class="form-label">Passport Back Image</label>
                            <input type="file" name="image" required="" accept="image/*" class="dropify">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mb-4">Submit Information</button>
                </form>

            </div>
        </div>
    </div>

    {{-- image upload --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <script src="{{ asset('public/backend') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>


    <script type="text/javascript">
        //thumbline image upload 
        $('.dropify').dropify(); //dropify image
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });
    </script>
@endsection
