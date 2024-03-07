@extends('layouts.user.master')
@section('title')
    {{ 'User Dashboard | Laravel Auth ' }}
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <form action="{{route('user.make.pement')}}" method="POST">
                        @csrf
                        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="pk_test_51L1Q4WAIzqv6QO7WbF65f9XiKcZCgtmjJKOV0xZ2FiSu9E0SUzSv4Oww4ypuScqtuG0xEw38Rm3izV86U3GzCpA700fOuyGypr"
                            data-name="Web Shop" data-description="Your custom designed t-shirt" data-amount="1000"
                            data-currency="usd" data-label="Buy Package" data-image="https://web-builderit.com/img/logo.png"></script>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
