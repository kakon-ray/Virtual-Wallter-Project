@extends('layouts.user.guest')
@section('title')
    {{ 'Home | Laravel Auth ' }}
@endsection

@section('content')
    <section class="package">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 py-4">
                    <h2 class="text-center">Package</h2>
                </div>
                <div class="col-lg-12">
                    <div class="card p-2">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Purcse</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allPackage as $item)
                                <tr>
                                    <th scope="row">{{$item->name}}</th>
                                    <td>{{$item->price}}</td>
                                    <td>
                                        <form action="{{route('user.make.pement')}}" method="POST">
                                            @csrf
                                            <input type="text" name="price" value="{{$item->price}}" class="d-none">
                                            <input type="text" name="package_name" value="{{$item->name}}" class="d-none">
                                            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                                data-key="pk_test_51L1Q4WAIzqv6QO7WbF65f9XiKcZCgtmjJKOV0xZ2FiSu9E0SUzSv4Oww4ypuScqtuG0xEw38Rm3izV86U3GzCpA700fOuyGypr"
                                                data-name="Web Shop" data-description="Your custom designed t-shirt" data-amount="{{$item->price}}"
                                                data-currency="usd" data-label="Buy Package" data-image="https://web-builderit.com/img/logo.png"></script>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                        
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
