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
                            @if ($myorder->package_type == 'higher')
                                <a href="{{ route('user.passport.nationidcard') }}"
                                    class="list-group-item list-group-item-action py-2 ripple">
                                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Passport and ID Upload</span>
                                </a>
                            @endif

                            @if ($myorder->package_type == 'higher')
                                <a href="{{ route('user.passport.nationidcard.download') }}"
                                    class="list-group-item list-group-item-action py-2 ripple">
                                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Passport and ID Download</span>
                                </a>
                            @endif

                        </div>
                    </div>
                </nav>
                <!-- Sidebar -->


            </div>
            <div class="col-lg-9">

                <div class="row">
                    <div class="col-lg-6">
                        <a href="{{ route('user.pdf.download') }}" target="_blank" class="btn btn-primary w-100">Download
                            Passport and NID Pdf</a>
                    </div>
                    <div class="col-lg-6">
                        <a href="{{ route('user.zip.download') }}" class="btn btn-primary w-100">Download Passport and NID
                            ZIP</a>
                    </div>

                </div>

                <div class="row text-center">
                    <h2 class="py-5">Passport Front and Back Image</h2>
                    <div class="col-lg-6">
                        <img src="{{ $userinfomation->passport_front }}" class="img-fluid">
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ $userinfomation->passport_back }}" class="img-fluid">
                    </div>

                    <h2 class="py-5">National ID Card Front and Back Image</h2>
                    <div class="col-lg-6">
                        <img src="{{ $userinfomation->id_front }}" class="img-fluid">
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ $userinfomation->id_back }}" class="img-fluid">
                    </div>
                </div>


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
