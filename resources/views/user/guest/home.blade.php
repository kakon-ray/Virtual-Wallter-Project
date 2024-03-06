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
                                        <a href="" class="btn btn-success btn-sm">Purchase</a>
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
