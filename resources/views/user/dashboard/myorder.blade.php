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
                                    <th scope="col">Package Name</th>
                                    <th scope="col">User Email</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Transaction Id</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($myorder as $item)
                                <tr>
                                    <th scope="row">{{$item->package_name}}</th>
                                    <th scope="row">{{$item->user_email}}</th>
                                    <th scope="row">{{$item->price}}</th>
                                    <th scope="row" style="color:green">{{$item->status}}</th>
                                    <th scope="row">{{$item->transaction_id}}</th>
                                   
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
