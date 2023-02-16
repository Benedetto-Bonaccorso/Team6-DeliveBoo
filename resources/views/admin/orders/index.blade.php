@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.partials.navbar')

            <div class="col table-responsive d-flex flex-column align-items-center mx-5">

                

                <table class="table table-orange">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Total Payment</th>
                            <th scope="col">Order Time</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($order as $displayedOrder)
                            <tr class="">
                                <td>{{ $displayedOrder->name }}</td>
                                <td>{{ $displayedOrder->address }}</td>
                                <td>{{ $displayedOrder->phone }}</td>
                                <td>{{ $displayedOrder->total_payment }}</td>
                                <td>{{ $displayedOrder->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
