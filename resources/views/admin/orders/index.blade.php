@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row orders">
            @include('admin.partials.navbar')

            <div class="col table table-hover table-responsive d-flex flex-column align-items-center mx-5">



                <table class="table table-orange">
                    <thead>
                        <tr>
                            <th class="border-0 ps-2"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Total Payment</th>
                            <th scope="col">Order Time</th>
                        </tr>
                    </thead>
                    <tbody id="accordionExample" class="accordion table-group-divider">
                        @foreach ($order as $displayedOrder)
                            <tr class="accordion-header" id="headingOne" class="accordion-button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <td class="border-0 ps-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="9"
                                        fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                </td>
                                <td class="p-2 pe-3 ps-0">

                                    <span>{{ $displayedOrder->name }}</span>
                                </td>
                                <td class="p-2 pe-3 ps-0 text-center">{{ $displayedOrder->address }}</td>
                                <td class="p-2 pe-3 ps-0 text-center">{{ $displayedOrder->phone }}</td>
                                <td class="p-2 pe-3 ps-0 text-center">{{ $displayedOrder->total_payment }}</td>
                                <td class="p-2 pe-3 ps-0 text-center">{{ $displayedOrder->created_at }}</td>


                            </tr>
                            <tr>
                                <th class="border-0 ps-2">
                                </th>
                                <td colspan="5" id="collapseOne" class="p-0 accordion-collapse collapse sow"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">


                                    <table class="table table-responsive table-orange accordion-body">
                                        <thead>
                                            <tr>


                                                <th scope="col first ">Name</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($displayedOrder->dishes as $dish)
                                                <tr>
                                                    <td style="width:40%" class="">{{ $dish[0]->name }}</td>
                                                    <td>{{ $dish[0]->price }}</td>
                                                    <td class="">{{ $dish['qty'] }}</td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </td>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>

    </div>
    </div>
@endsection
