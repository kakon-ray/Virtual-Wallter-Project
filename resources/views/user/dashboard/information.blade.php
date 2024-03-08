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
                                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Passport and ID</span>
                                </a>
                            @endif

                            <a href="{{ route('user.passport.nationidcard.download') }}"
                                class="list-group-item list-group-item-action py-2 ripple">
                                <i class="fas fa-chart-area fa-fw me-3"></i><span>Passport and ID Download</span>
                            </a>

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
                    <h2>User Information</h2>
                </div>
                <form action="{{ route('user.information.submit') }}" id="information" method="POST">
                    @csrf
                    <input type="text" name="id" class="d-none" value="{{ Auth::guard('web')->user()->id }}">
                    <div class="row mb-4">
                        <div class="col">
                            <div data-mdb-input-init class="form-outline">
                                <input type="text" id="form6Example1" name="account_number" class="form-control"
                                    value="{{ $userinfomation->account_number }}" />
                                <label class="form-label" for="form6Example1">Bank Account</label>
                            </div>
                        </div>
                        <div class="col">
                            <div data-mdb-input-init class="form-outline">
                                <input type="text" id="form6Example2" name="card_number" class="form-control"
                                    value="{{ $userinfomation->card_number }}" />
                                <label class="form-label" for="form6Example2">Card</label>
                            </div>
                        </div>
                    </div>

                    <!-- Text input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" id="form6Example3" name="phone_number" class="form-control"
                            value="{{ $userinfomation->phone_number }}" />
                        <label class="form-label" for="form6Example3">Phone Number</label>
                    </div>

                    <!-- Text input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" id="form6Example4" name="contact" class="form-control"
                            value="{{ $userinfomation->contact }}" />
                        <label class="form-label" for="form6Example4">Contact</label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mb-4">Submit Information</button>
                </form>

            </div>
        </div>
    </div>
@endsection
